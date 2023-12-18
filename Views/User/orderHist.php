<?php
include "mysqldatabase.php";
include_once "Models/Product.php";
global $conn;
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
    <p><a href="?controller=user&action=myaccount&id=<?php echo $_SESSION['id']; ?>">My Account</a> / <b>Order History</b></p>
        <div class="container account">
            <div class="account info">
                <h4>Manage my Account</h4>
                <div class="stack 1">
                    <a href="?controller=user&action=myaccount&id=<?php echo $uID?>">My Profile</a>
                    <a href="?controller=user&action=editAddress&id=<?php echo $uID ?>">Address Book</a>
                 
                </div>
                <h4>My Orders</h4>
                <div class="stack 2">
                    <a href="?controller=user&action=orderHist&id=<?php echo $uID?>">My Orders</a>
                    <!-- <a href="?controller=user&action=cancellations&id=<?php echo $uID?>">My Cancellations</a>  -->
                </div>
            </div>
            <div class="account hist">
                <table class="orderTable">
                    <tr>
                        <th>Order Number</th>
                        <th>Product</th>
                        <th>Date of Purchase</th>
                        <th>Expected Delivery Date</th>
                    </tr>
                
                    <?php
                 
                    $sql = "SELECT * FROM `order_details` WHERE `U_ID` = $uID AND `is_canceled` = 0";
                    $result = $conn -> query($sql);
   
                    $row = $result -> fetch_assoc();

  // var_dump($row);
                  while($row = $result -> fetch_assoc()){
                    $prod = new Product($row['Prod_ID']);
                    echo '
                 <tr>
                    <td>'. $row['Order_ID'] .'</td>
                    <td>'. $prod -> Prod_Name .'</td>
                    <td>'. $row['Date_of_Purchase'] .'</td>
                    <td>'. $row['Date_of_expected_delivery'] .'</td>
                 </tr>
                 ';
                  }
                    ?>
                        
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