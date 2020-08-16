<?php

require_once "vendor/autoload.php";

if (!empty($_REQUEST)) {
	$controller = "sorteio\Controller\\" . $_REQUEST['controller'] . "Controller";
	if (class_exists($controller)) {
		$entidade = new $controller($_REQUEST);
		$action = $_REQUEST['action'];

		if (empty($action)) {
			$action = "index";
		}

		$aDados = [];
		if (method_exists($controller, $action)) {
			$aDados['request'] = $_REQUEST;
			if (isset($_FILES['arquivo'])) {
				$aDados['files'] = $_FILES['arquivo'];
			}
			$entidade->$action($aDados);
		}
	}

} else {
	include_once "home.php";
}