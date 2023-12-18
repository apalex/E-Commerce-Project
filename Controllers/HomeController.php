<?php

include_once 'Models/Product.php';
include_once "Models/User.php";

class HomeController {

    function route() {
        $action = (isset($_GET['action'])) ? $_GET['action'] : "index";

        $this -> render($action);
    }

    function render($view) {
        if (file_exists("Views/Home/$view.php")) {
            include "Views/Home/$view.php";
        } else {
            Header("Location: ?controller=home&action=error");
        }
    }
}

?>
