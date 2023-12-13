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
            $errors = array();

            if(isset($_POST['submit'])){
            
            $email = $_POST['EMAIL'];
            $passwd = $_POST['PASSWD'];
            
            $sql = "SELECT * FROM User_Info WHERE U_Email = '$email'";
            
            $result = $conn ->query($sql);
            
            if ($result -> num_rows == 1) {
                $row = $result -> fetch_assoc();
                $hash = $row['U_Pass'];
                if (password_verify($passwd, $hash)) {
                    $_SESSION['id'] = $row['U_ID'];
                    header('Location: ?controller=home&action=index&id=' . $_SESSION['id']);
                } else {
                   $errors['password'] = false;
                   $this -> render("login",$errors);
                }
            }else{
                $errors['email'] = false;                    
                $this -> render("login",$errors);
            }
            }
//
// Insert action
//
        }else if($action == "insert"){
            global $conn;
            $user = new User();
            $test =  $user -> insertUser();

            $F_NAME = $_POST['F_NAME'];
            $L_NAME = $_POST['L_NAME'];
            $EMAIL = $_POST['EMAIL'];
            $PASSWD = $_POST['PASSWD'];
            $C_PASSWD = $_POST['C_PASSWD'];

            if($test['success']){
                $hash = password_hash($PASSWD, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `user_info`(`F_Name`, `L_Name`, `U_Email`,`U_Pass`,`Role_ID`) VALUES ('$F_NAME','$L_NAME','$EMAIL','$hash','1')";
                $conn -> query($sql);
        
                $lastInsertedID = mysqli_insert_id($conn);
                $_SESSION['id'] = $lastInsertedID;
                $sql = "SET @u_id = LAST_INSERT_ID()";
                $conn -> query($sql);
        
                $sql = "INSERT INTO user_address (U_ID) VALUES (@u_id);";
                $conn ->query($sql);
        
                header('Location: ?controller=home&action=index');
                
            }else{
                $this -> render("registration",$test);
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