<?php

include_once "Models/User.php";

class UserController {

    function route() {
        $controller = $_GET['controller'];
        $action = (isset($_GET['action'])) ? $_GET['action'] : "index";
        $id = (isset($_GET['id'])) ? intval($_GET['id']) : -1;

        if ($action == "index") {
            $users = User::listUsers();
            $this -> render("index", $users);
        } else {
            $user = new User($id);
            $this -> render($action, array($user));
        }

        
    if($action == "login"){
        $this -> render("login");
    }
    }


    function render($view, $data = []) {
        extract($data);

      include_once "Views/User/$view.php";
    }

}

?>
