<?php

if (session_status() === PHP_SESSION_NONE){session_start();}

$prod = new Product();

$cartQuan = $prod ->cartQuan();
$cartList = $prod ->listCart($cartQuan);


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop all your electronic needs and save big! | ABDGameStore.com</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
    include_once 'navbar.php';
    ?>

    <div class="wrapper">
        <div class="container cart">
            <div class="product location">
                <p><a href="?controller=user&action=myaccount">Account</a> / <b>Cart</b></p>
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
                $hasProduct = false;
                if(count($cartList) != 0){
                $hasProduct =  true;
                }
                $discountFlag = false;
                $discountMsg = "";
                $discount_percentage = 1;
                
                if (isset($_POST['discountBtn'])) {
                    $allDiscounts = new Discount();
                    $allDiscounts = $allDiscounts -> listDiscounts();
                    foreach ($allDiscounts as $discount) {
                        if ($discount -> Discount_Name == $_POST['discountInput']) {
                            $discountFlag = true;
                            $discountMsg = "Coupon Successfully Applied!";
                            $discount_percentage = $discount -> Discount_Percentage;
                        }
                    }
                    if ($discountFlag == false) {
                        $discountMsg = "Invalid Coupon.";
                    }
                }

                if($hasProduct) {
                foreach($cartList as $cl) {
                    $quantity = $cartQuan[$cl ->Prod_ID];
                    $price = $cl -> Prod_Client_Price;
                    $price *= $quantity;
                    if ($discountFlag == true) {
                        $price *= $discount_percentage;
                    }
                    $subTotal += $price;
                    $tax = $subTotal *.15;
                    $total = $subTotal *1.15;
                    echo '
                    <form action="?controller=product&action=remove-cart" method="POST">
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
                            <input type="hidden" name="p_id" value='.$cl ->Prod_ID.'>
                            <input type="submit" class="cart-subtotal remove" value="X">
                           
                        </div>
                        </div>
                    </form>
                    ';
                }
                }
                ?>
                
                <button id="return-to-shop" onclick="window.location = '?controller=home&action=index';">Return To Shop</button>
            </div>
            <div class="cart discount">
                <div class="cart discount left">
                    <form method="POST">
                        <input type="text" name="discountInput" id="discountInput" placeholder="Coupon Code">
                        <button type="submit" id="discountBtn" name="discountBtn">Apply Coupon</button>
                        <p><?php echo $discountMsg; ?></p>
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
                    <div class="shipping">
                        <label for="">Tax</label>
                        <p>$<?php if($hasProduct) echo $tax; ?></p>
                    </div>
                    <div class="total">
                        <label for="">Total</label>
                        <p>$<?php if($hasProduct)echo $total; ?></p>
                    </div>
                    <div class="checkout-btn">
                        <form action="?controller=product&action=checkout" method="POST">
                            <input type="hidden" value="<?php echo $discount_percentage ?>" name="discountPOST">
                           <?php if($hasProduct) echo '<button type="submit">Proceed to checkout</button>'; ?>
                        </form>
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
