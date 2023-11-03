<?php

include_once 'Models/Product.php';
include_once "Models/User.php";

class HomeController {

    function route() {
        $this -> render("index");
    }

    function render($view, $data = []) {
        include "Views/Home/$view.php";
    }
}

?>
