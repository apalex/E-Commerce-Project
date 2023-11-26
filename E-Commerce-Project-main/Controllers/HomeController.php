<?php

include_once 'Models/Product.php';
include_once "Models/User.php";

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
