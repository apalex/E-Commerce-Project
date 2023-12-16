
<!-- <?php
//  include "mysqldatabase.php";
// session_start();
// $log_path;
// $cart_path;
// $button;
// if(isset($_SESSION["id"])){
//     $log_path = "myaccount&id=". $_SESSION['id']. "";
//     $cart_path = "cart";
//     $button = "<button type='submit' name='log_sub'>Log out</button>";
// }else{
//     $log_path = "login";
//     $cart_path= "login";
//     $button = "";
// }



// if(isset($_POST['log_sub'])){
//     unset($_SESSION['id']);
//     header('Location: ?controller=home&action=index');
// }

// $prod = new Product();

// $pList = $prod -> listProducts();

?> -->


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
        <div class="container checkout">
            <div class="checkout location">
                <p>Account / My Account / View Cart / <b>Checkout</b></p>
            </div>
            <div class="checkout box">
                <form action="">
                    <div class="checkout details">
                        <h1>Payment Details</h1>
                        <div class="payment-details">
                            <input type="text" placeholder="Name on Card">
                            <input type="text" placeholder="Card Number">
                            <input type="text" placeholder="CVV">
                            <select name="" id="">
                                <option disabled selected>YY</option>
                            </select>
                            <select name="" id="">
                                <option value="">MM</option>
                            </select>
                        </div>
                    </div>
                    <div class="checkout products-total">
                        <!-- <div class="product-scroll-box">
                            <div class="product box">
                                <div class="checkout product-info">
                                    <img src="images/razer_ornata_v3.jpg" width=100 heigth=100>
                                    <p id="product-name-checkout">Razer Ornata V3</p>
                                    <p id="product-price-checkout">$150</p>
                                </div>
                            </div>
                            <div class="product box">
                                <div class="checkout product-info">
                                    <img src="images/razer_ornata_v3.jpg" width=100 heigth=100>
                                    <p id="product-name-checkout">Razer Ornata V3</p>
                                    <p id="product-price-checkout">$250</p>
                                </div>
                            </div>
                        </div>
                        <div class="checkout total-sub">
                            <p id="product-left-total">Subtotal:</p>
                            <p id="product-right-money">$400</p>
                        </div>
                        <div class="checkout total-ship">
                            <p id="product-left-total">Shipping:</p>
                            <p id="product-right-money">Free</p>
                        </div>
-->
                        <div class="checkout total-amt"> 
                            <p id="product-left-total">Total:</p>
                            <p id="product-right-money">$<?php echo $data[0];?></p>
                        </div>
                        <button type="submit" id="Place-Order">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="push">
        </div>
    </div>

            <!-- <?php
                       
        foreach($pList as $d){
        echo"<a href='?controller=product&action=view&id=". $d-> Prod_ID."'>" . $d-> Prod_Name . "</a> <br>";
        }
                    ?> -->
            
        <?php
        include_once 'footer.php';
        ?>

<script src="app.js"></script>

</body>
</html>
