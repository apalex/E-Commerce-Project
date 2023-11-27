

<?php
session_start();
include "mysqldatabase.php";

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

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop all your electronic needs and save big! | ABDGameStore.com</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
        include_once 'navbar.php';
    ?>

    <div class="wrapper">
        <div class="container login">
            <h1>Login in</h1><br>
            <h5>Enter your details below</h5><br>
            <div class="login form">
                <form action="" method="POST">
                    <input type="text" name="EMAIL" placeholder="Email" required><br><br>
                    <input type="password" name="PASSWD" placeholder="Password" required><br><br>
                    <button name = 'submit' type="submit">Log in</button>
                    <a href="?controller=home&action=contact">Forgot Password?</a>
                    <br>
                    <a href="?controller=user&action=registration">Dont have an account?</a>
                </form>
            </div>
        </div>
        <div class="push">
        </div>
    </div>

    <?php
        include_once 'footer.php';
    ?>

<script src="app.js"></script>

</body>
</html>

