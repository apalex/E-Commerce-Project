<?php

include_once "Models/User.php";

class UserController {

    function route() {
       
        $action = (isset($_GET['action'])) ? $_GET['action'] : "index";
        $id = (isset($_GET['id'])) ? intval($_GET['id']) : -1;

       
            $user = new User($id);
            $this -> render($action, array($user));
       

        if($action == "update"){
            $user -> update();
        }

   

        

    }


    function render($view, $data = []) {
        extract($data);

        if (file_exists("Views/User/$view.php")) {
            include_once "Views/User/$view.php";
        } else {
            Header("Location: ?controller=home&action=error");
        }
    }

}

?>