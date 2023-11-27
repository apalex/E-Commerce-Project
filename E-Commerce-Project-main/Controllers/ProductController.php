<?php

include_once "Models/Product.php";

class ProductController {
    function route() {
        $controller = $_GET['controller'];
        $action = (isset($_GET['action'])) ? $_GET['action'] : "index";
        $id = (isset($_GET['id'])) ? intval($_GET['id']) : -1;

        if ($action == "index") {
            $products = Product::listProducts();
            $this -> render("index", $products);
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