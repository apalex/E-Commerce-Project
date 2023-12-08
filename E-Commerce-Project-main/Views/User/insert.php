<?php
session_start();

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

    if ($PASSWD != $C_PASSWD) {
        echo "Passwords do not match";
        header('Location: ?controller=user&action=registration');
    } else {
        // $hash = password_hash($PASSWD, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `user_info`(`F_Name`, `L_Name`, `U_Email`,`U_Pass`,`Role_ID`) VALUES ('$F_NAME','$L_NAME','$EMAIL','$PASSWD','1')";
        $conn -> query($sql);

        $lastInsertedID = mysqli_insert_id($conn);
        $_SESSION['id'] = $lastInsertedID;
        $sql = "SET @u_id = LAST_INSERT_ID()";
        $conn -> query($sql);

    //     $sql ="
    //     UPDATE User_Info
    //     SET Role_ID = @u_id
    //     WHERE U_ID = @u_id;
    //     ";

    //    $conn -> query($sql);

       

        $sql = "INSERT INTO user_address (U_ID) VALUES (@u_id);";
        $conn ->query($sql);

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
    header('Location: ?controller=home&action=index');
        
    }
}
?>

