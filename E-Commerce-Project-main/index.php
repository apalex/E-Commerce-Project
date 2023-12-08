<?php

$controller = (isset($_GET['controller'])) ? $_GET['controller'] : "home";


$controllerName = ucfirst($controller) . "Controller";

if (file_exists("Controllers/$controllerName.php")) {
    include_once "Controllers/$controllerName.php";
    $contr = new $controllerName();
    $contr -> route();
} else {
    Header("Location: ?controller=home&action=error");
}

?>
