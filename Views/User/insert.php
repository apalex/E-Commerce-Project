<?php
USE PHPMailer\PHPMailer\PHPMailer;
USE PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

include 'C:\xampp\htdocs\Clone\E-Commerce-Project\phpmailer\vendor';

if (session_status() === PHP_SESSION_NONE){session_start();}

$servername = "localhost";
$username = "root";
$password = "";
$database = "electronics_store";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn -> connect_error) {
    die("Connection failed: " . $conn -> connect_error);
} else {
    $F_NAME = $_POST['F_NAME'];
    $L_NAME = $_POST['L_NAME'];
    $EMAIL = $_POST['EMAIL'];
    $PASSWD = $_POST['PASSWD'];
    $C_PASSWD = $_POST['C_PASSWD'];

    $errors = [];
    $data = [];
    // Checks if is empty and RegEx
    if (empty($F_NAME)) {
        $errors['first_name'] = "First Name is required";
    } elseif (!preg_match("#^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,}+$#", $F_NAME)) {
        $errors['first_name'] = "2 Letters minimum required for first name";
    }
    if (empty($L_NAME)) {
        $errors['last_name'] = "Last Name is required";
    } elseif (!preg_match("#^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,}+$#", $L_NAME)) {
        $errors['last_name'] = "2 Letters minimum required last name";
    }
    if (empty($EMAIL)) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($EMAIL, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }
    if (empty($PASSWD)) {
        $errors['password'] = "Password is required";
    }
    if (empty($C_PASSWD)) {
        $errors['check_password'] = "Password confirmation is required";
    }
    if(!empty($PASSWD) && !empty($C_PASSWD)) {
        if (!preg_match("#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$#", $PASSWD)) {
            $errors['password'] = "8 characters minimum, 1 uppercase letter, 1 lowercase letter, 1 special character required for password";
        } elseif ($PASSWD != $C_PASSWD) {
            $errors['check_password'] = "Passwords do not match";
        }
    }

    //

    if(!empty($errors)) {
        $data['success'] = false;
        $data['errors'] = $errors;
        // header("Location: ?controller=user&action=registration");
    } else {
        $data['success'] = true;
        $data['message'] = "Successfully made an account!";

        // Password Hashing
        $hash = password_hash($PASSWD, PASSWORD_DEFAULT);

        // SQL Prepared Statement
        $stmt = $conn -> prepare("INSERT INTO `User_Info` (`F_Name`, `L_Name`, `U_Email`,`U_Pass`,`Role_ID`) VALUES (?, ?, ?, ?, ?)");
        $stmt -> bind_param("sss", $F_NAME, $L_NAME, $EMAIL, $hash, '1');
        $stmt -> execute();
        $stmt -> close();
    
        $lastInsertedID = mysqli_insert_id($conn);
        $_SESSION['id'] = $lastInsertedID;
        $sql = "SET @u_id = LAST_INSERT_ID()";
        $conn -> query($sql);

        // PHPMailer
        $mail = new PHPMailer(true);
        
        // Server settings
        $mail -> SMTPDebug = 1;
        $mail -> isSMTP();
        $mail -> Host = 'smtp.gmail.com';
        $mail -> SMTPAuth = true;
        $mail -> Username = 'user@example.com';
        $mail -> Password = 'password';
        $mail -> SMTPSecure = 'tls';
        $mail -> Port = 587;

        // Recipient
        $mail -> setFrom('ABDGamestore@gmail.com'); // Sender
        $mail -> addAddress($EMAIL); // Receiver

        // Content
        $mail -> isHTML(true);
        $mail -> Subject = '<Strong>Welcome to ABDGamestore.com!</Strong>';
        $mail -> Body = 'You have successfully created an account on ABDGamestore.com!';
        $mail -> AltBody = strip_tags($body);

        if ($mail -> send()) {
            echo "Email has been sent!";
        } else {
            echo "Message could not be sent.";
            echo "Error: {$mail -> ErrorInfo}";
        }
        //     $sql ="
        //     UPDATE User_Info
        //     SET Role_ID = @u_id
        //     WHERE U_ID = @u_id;
        //     ";
    
        //    $conn -> query($sql);
    
           
    
            $sql = "INSERT INTO user_address (U_ID) VALUES (@u_id);";
            $conn -> query($sql);
    
            // $sql = "SET @role_id = LAST_INSERT_ID()";
            // $conn ->query($sql);
    
            // $sql ="
            // UPDATE user_info
            // SET Role_ID = @role_id
            // WHERE U_ID = @u_id;
            // ";
            // $conn ->query($sql);
            if($conn -> connect_error) {
                die("Connection failed: " . $conn -> connect_error);
            }
            var_dump($conn);
            echo "Account created successfully";
        // header('Location: ?controller=home&action=index');
            
    }

    // if ($PASSWD != $C_PASSWD) {
    //     echo "Passwords do not match";
    //     header('Location: ?controller=user&action=registration');
    // }
    // else {
    //     $hash = password_hash($PASSWD, PASSWORD_DEFAULT);
    //     $sql = "INSERT INTO `user_info`(`F_Name`, `L_Name`, `U_Email`,`U_Pass`,`Role_ID`) VALUES ('$F_NAME','$L_NAME','$EMAIL','$hash','1')";
    //     $conn -> query($sql);

    //     $lastInsertedID = mysqli_insert_id($conn);
    //     $_SESSION['id'] = $lastInsertedID;
    //     $sql = "SET @u_id = LAST_INSERT_ID()";
    //     $conn -> query($sql);

    // //     $sql ="
    // //     UPDATE User_Info
    // //     SET Role_ID = @u_id
    // //     WHERE U_ID = @u_id;
    // //     ";

    // //    $conn -> query($sql);

       

    //     $sql = "INSERT INTO user_address (U_ID) VALUES (@u_id);";
    //     $conn ->query($sql);

    //     // $sql = "SET @role_id = LAST_INSERT_ID()";
    //     // $conn ->query($sql);

    //     // $sql ="
    //     // UPDATE user_info
    //     // SET Role_ID = @role_id
    //     // WHERE U_ID = @u_id;
    //     // ";
    //     // $conn ->query($sql);
    //     if($conn -> connect_error) {
    //         die("Connection failed: " . $conn -> connect_error);
    //     }
    //     var_dump($conn);
    //     echo "Account created successfully";
    // header('Location: ?controller=home&action=index');
        
    // }
}
?>

