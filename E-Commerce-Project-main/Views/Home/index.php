
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
        <div class="push">
        </div>
    </div>

            <?php
                       
        foreach($pList as $d){
        echo"<a href='?controller=product&action=view&id=". $d-> Prod_ID."'>" . $d-> Prod_Name . "</a> <br>";
        }
                    ?>
            
    <?php
    include_once 'footer.php';
    ?>

<script src="app.js"></script>

</body>
</html>
