<?php

include_once 'Models/Product.php';
include_once "Models/User.php";
//alex has a small penis
class HomeController {

    function route() {
        $controller = (isset($_GET['contoller'])) ? $_GET['controller'] : "home" ;
        $action = (isset($_GET['action'])) ? $_GET['action'] : "index";

        $this -> render($action);
    }

    function render($view) {
        include "Views/Home/$view.php";
    }
}

?>
