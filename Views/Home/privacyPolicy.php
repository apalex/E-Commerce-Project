<?php
include "mysqldatabase.php";
session_start();
$log_path;
$cart_path;
$button;
if(isset($_SESSION["id"])){
    $log_path = "myaccount&id=". $_SESSION['id']. "";
    $cart_path = "cart";
    $button = "<button type='submit' name='log_sub'>Log out</button>";
}else{
    $log_path = "login";
    $cart_path= "login";
    $button = "";
}


if(isset($_POST['log_sub'])){
    unset($_SESSION['id']);
    header('Location: ?controller=home&action=index');
}

$prod = new Product();

$pList = $prod -> listProducts();

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
        <p><a href="?controller=home&action=index">Home</a> / <b>Privacy Policy</b></p>
        <div class="containerPP">
            <h3>Privacy Policy</h3>
            <p><strong>Who are we?</strong></p>
            <p><span>ABD Game Store (Sainte Croix Ave, Saint Laurent, QC) along with our affiliates and subsidiaries are committed to safeguarding the privacy of our customers and users (“you”).</span></p>
            <br>
            <p><strong>About this privacy policy</strong></p>
            <p><span>This privacy policy tells you about how we use, protect and disclose your personal data that we have collected using both offline means (e.g. via phone, post, in-person meetings and other correspondence) and online means, such as when you use any website or mobile application owned or operated by ABD Game Store</span></p>
            <p><span>You acknowledge that your personal data (including personal data collected through your use of our services, and the Site), will be collected, stored, shared and processed in accordance with this privacy policy.</span></p>
            <p><span>The Site may contain links to other third-party websites or applications. Please be aware that these websites and applications may collect information about you. These websites and applications may have their own privacy notices or policies. We encourage you to be aware when you leave the Site and to read the privacy statements of each and every website and application that you use.</span></p>
            <p><span>To the extent any linked websites or applications you visit are not owned or operated by ABD, please be aware that we are not responsible or liable for the websites’ or applications’ content, any use of the websites or applications, or the privacy and security practices and policies of those websites or applications</span></p>        
        </div>
        <div class="push">
        </div>
    </div>
            
    <?php
    include_once 'footer.php';
    ?>

<script src="app.js"></script>
<script src='caroussel.js'></script>
</body>
</html>