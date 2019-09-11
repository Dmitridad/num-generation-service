<?php

class ApiMethods {

	public $id = array();
	public $number;

	public function generate()
	{
		require_once('./database/db.php');
		$randomValue = rand();

		$dbObj = new Database();
		$insertResult = $dbObj->makeInsert("INSERT INTO num_generation (number) VALUES ($randomValue)");
		$selectResult = $dbObj->makeSelect("SELECT id FROM num_generation WHERE number = $randomValue");

		foreach ($selectResult as $value) {
			$this->id = array('id' => $value['id']);
		}

		return json_encode($this->id);
	}

	public function retrieve($id)
	{
		require_once('./database/db.php');
		$dbObj = new Database();

		$selectResult = $dbObj->makeSelect("SELECT number FROM num_generation WHERE id = $id");
		
		foreach ($selectResult as $key => $value) {
			$this->number = $value['number'];
		}

		return $this->number;
	}
}