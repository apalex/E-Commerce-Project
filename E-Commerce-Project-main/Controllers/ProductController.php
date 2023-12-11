<?php

include_once "Models/Product.php";

class ProductController {
    function route() {
        $action = (isset($_GET['action'])) ? $_GET['action'] : "index";
        $id = (isset($_GET['id'])) ? intval($_GET['id']) : -1;
        if (session_status() === PHP_SESSION_NONE){session_start();}
        if ($action == "remove-cart") {
            unset($_SESSION["cart"][$_POST['p_id']]);
           // var_dump($_SESSION["cart"]);
            header("Location: ?controller=product&action=cart");
        } else {
            $product = new Product($id);
            $this -> render($action, array($product));
        }
    }

    function render($view, $data = []) {
        extract($data);

        if(file_exists("Views/Product/$view.php")) {
            include "Views/Product/$view.php";
        } else {
            Header("Location: ?controller=home&action=error");
        }
    }

}

?>