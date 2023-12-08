<?php

include_once "Models/User.php";
include "mysqldatabase.php";
session_start();

class UserController {

    function route() {
       
        $action = (isset($_GET['action'])) ? $_GET['action'] : "login";
        $id = (isset($_GET['id'])) ? intval($_GET['id']) : -1;
       
           
       

      if($action == "logged"){
            global $conn;
            
            if(isset($_POST['submit'])){
            
            $email = $_POST['EMAIL'];
            $passwd = $_POST['PASSWD'];
            
            $sql = "SELECT * FROM User_Info WHERE U_Email = '$email' AND U_Pass = '$passwd'";
            
            $result = $conn ->query($sql);
            
            if($result->num_rows ==1){
                $row = $result->fetch_assoc();
                $_SESSION['id'] = $row['U_ID'];
                header('Location: ?controller=home&action=index&id=' . $_SESSION['id']);
            }else{
                echo"account does not exist";
            }
            }

        }
        else{
            
            $user = new User($id);
            $this -> render($action, array($user));
        }

    }


    function render($view, $data = []) {
        extract($data);
        include_once "Views/User/$view.php";
        if (file_exists("Views/User/$view.php")) {
            include_once "Views/User/$view.php";
        } else {
            Header("Location: ?controller=home&action=error");
        }
    }

}

?>