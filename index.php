<?php

require_once("api/api.php");

$url = $_SERVER["REQUEST_URI"];

if (strpos($url, "api")) {
	if (stripos($url, "?")) {
		$params = explode("?", $url);
		mb_parse_str(end($params), $params);

		$url = strstr($url, "?", true);
	}

	$urlArr = explode("/", $url);

	$ApiObj = new ApiMethods();

	switch (end($urlArr)) {
		case "generate":
			print_r($ApiObj->generate());
			break;

		case "retrieve":
			if (isset($params) && count($params) == 1 && array_key_exists("id", $params)) {
				print_r($ApiObj->retrieve($params["id"]));
				break;
			}
		
		default:
			echo "Api Error";
			break;
	}

}