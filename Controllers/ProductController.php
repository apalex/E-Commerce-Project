<?php
include_once "Models/User.php";
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
        }else if($action== "addComment"){
            $product = new Product();
            
            $p_id = $_POST['p_id'];
            $u_id = $_POST['u_id'];
            $comment = $_POST['comment'];

            $product -> addComment($p_id,$u_id,$comment);

            header("Location: ?controller=product&action=view&id=$p_id");


            
        }else if($action == "checkout"){
            if (session_status() === PHP_SESSION_NONE){session_start();}

            $prod = new Product();
            $user = new User($_SESSION['id']);
            $cartQuan = $prod ->cartQuan();
            $cartList = $prod ->listCart($cartQuan);
            $data = [$cartQuan,$cartList,$user];
            $this -> render("checkout",$data);

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