<?php

$controller = (isset($_GET['controller'])) ? $_GET['controller'] : "home";
$controllerName = ucfirst($controller) . "Controller";

include_once "Controllers/$controllerName.php";
$contr = new $controllerName();
$contr -> route();

?>
