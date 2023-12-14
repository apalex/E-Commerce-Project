<?php
include "mysqldatabase.php";

   if (session_status() === PHP_SESSION_NONE){session_start();}
    $user = $data[0];
    $uID = $_SESSION['id'];

    if(isset($_POST['submit'])){
        
            $user -> update($user,$uID);
    }
    
    if(isset($_POST['log_sub'])){
        unset($_SESSION['id']);
        header('Location: ?controller=home&action=index');
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
        <div class="container account">
            <div class="account info">
                <h4>Manage my Account</h4>
                <div class="stack 1">
                    <a href="?controller=user&action=myaccount&id=<?php echo $uID?>">My Profile</a>
                    <a href="?controller=user&action=editAddress&id=<?php echo $uID ?>">Address Book</a>
                    <a href="?controller=user&action=editPayment">My Payment Options</a>
                </div>
                <h4>My Orders</h4>
                <div class="stack 2">
                    <a href="?controller=user&action=orderHist">My Orders</a>
                    <a href="?controller=user&action=returns">My Returns</a>
                    <a href="?controller=user&action=cancellations">My Cancellations</a> 
                </div>
            </div>
            <div class="account return">
                <table class="orderTable">
                    <tr>
                        <th>Order Number</th>
                        <th>Product</th>
                        <th>Date of Purchase</th>
                        <th>Expected Delivery Date</th>
                    </tr>
                    <?php foreach ($order as $o): ?>
                        <tr>
                            <td><?= $o -> Order_ID ?></td>
                            <td><?= $o -> Prod_ID ?></td>
                            <td><?= $o -> Date_of_purchase ?></td>
                            <td><?= $o -> Date_of_expected_delivery ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
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