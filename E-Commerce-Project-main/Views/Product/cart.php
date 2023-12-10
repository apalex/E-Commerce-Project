<?php

session_start();

$prod = new Product();

$cartQuan = $prod ->cartQuan();
$cartList = $prod ->listCart($cartQuan);

if (isset($_POST['']))

// $cartKeys = array_keys($_SESSION["cart"]);
// $cartQuan = $_SESSION["cart"];


// $cartList = array();


//     global $conn;

// foreach($cartKeys as $k){
//     $sql = "SELECT * FROM `Product_Info` WHERE `Prod_ID` = " . $k;
//     $result = $conn -> query($sql);
//     $row = $result -> fetch_assoc();
//     $product = new Product();
//     $product -> Prod_ID = $row['Prod_ID'];
//     $product -> Prod_Name = $row['Prod_Name'];
//     $product -> Prod_Client_Price = $row['Prod_Client_Price'];
//     $product -> Prod_Manufacturer_Price = $row['Prod_Manufacturer_Price'];
//     $product -> Prod_Details = $row['Prod_Details'];
//     $product -> Prod_Comments = $row['Prod_Comments'];
//     $product -> Prod_Stock = $row['Prod_Stock'];
//     $product -> Prod_Category = $row['Prod_Category'];
//     $product -> Prod_Image_Path = $row['Prod_Image_Path'];

//     array_push($cartList, $product);
// }


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
        <div class="container cart">
            <div id="cart location">
                <p>Account / My Account / <b>View Cart</b></p>
            </div>
            <div class="cart box">
                <div class="cart frame">
                    <p>Product</p>
                    <p>Price</p>
                    <p>Quantity</p>
                    <p>Subtotal</p>
                </div>
             

                <?php 
                $subTotal = 0;
                
                foreach($cartList as $cl) {
                    $quantity = $cartQuan[$cl ->Prod_ID];
                    $price = $cl -> Prod_Client_Price;
                    $price *= $quantity; 
                    $subTotal += $price; 
                    
                    echo '
                    <form action="" method="POST">
                        <div class="cart products">
                            <div>
                                <img src="'. $cl -> Prod_Image_Path .'" alt="">
                                <h6>'. $cl -> Prod_Name .'</h6>
                            </div>
                        <div>
                            <p>$'.$cl -> Prod_Client_Price .'</p>
                        </div>
                        <div>
                            <p>'. $quantity .'</p>
                        </div>
                        <div>
                            <p id="cart-subtotal-x">$'.$subTotal.'</p>
                            <input type="button" id="cart-subtotal-remove">
                        </div>
                        </div>
                    </form>
                    ';
                }
                
                ?>
                
                <button id="return-to-shop" onclick="window.location = '?controller=home&action=index';">Return To Shop</button>
            </div>
            <div class="cart discount">
                <div class="cart discount left">
                    <form action="">
                        <input type="text" name="" id="discountInput" placeholder="Coupon Code">
                        <button id="discountBtn">Apply Coupon</button>
                    </form>
                </div>
                <div class="cart discount right">
                    <h3>Cart Total</h3>
                    <div class="subtotal">
                        <label for="">Subtotal</label>
                        <p>$<?php echo $subTotal; ?></p>
                    </div>
                    <div class="shipping">
                        <label for="">Shipping</label>
                        <p>Free</p>
                    </div>
                    <div class="total">
                        <label for="">Total</label>
                        <p>1600$</p>
                    </div>
                    <div class="checkout-btn">
                        <button type="submit">Proceed to checkout</button>
                    </div>
                </div>
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
