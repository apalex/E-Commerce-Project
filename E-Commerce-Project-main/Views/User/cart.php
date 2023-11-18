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
                <div class="cart products">
                    <div>
                        <img src="images/razer_ornata_v3.jpg" alt="">
                    </div>
                    <div>
                        <p>1600$</p>
                    </div>
                    <div>
                        <select name="">
                            <option value="">1</option>
                        </select>
                    </div>
                    <div>
                        <p>1600$</p>
                    </div>
                </div>
                <div class="cart products">
                    <div>
                        <img src="images/razer_ornata_v3.jpg" alt="">
                    </div>
                    <div>
                        <p>1600$</p>
                    </div>
                    <div>
                        <select name="">
                            <option value="">1</option>
                        </select>
                    </div>
                    <div>
                        <p>1600$</p>
                    </div>
                </div>
                <button>Return To Shop</button>
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
                        <p>1600$</p>
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
