<?php

$controller = (isset($_GET['controller'])) ? $_GET['controller'] : "home";
$action = (isset($_GET['action'])) ? $_GET['action'] : "index";
$id = (isset($_GET['Id'])) ? intval($_GET['Id']) : -1;

$controllerName = ucfirst($controller) . "Controller";

include_once "Controllers/$controllerName.php";
$contr = new $controllerName();
$contr -> route();

?>
