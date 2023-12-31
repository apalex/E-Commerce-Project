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
                <p><a href="?controller=user&action=myaccount&id=<?php echo $_SESSION['id']; ?>">Account</a> / <a href="?controller=product&action=cart">View Cart</a> / <b>Checkout</b></p>
            </div>
            <div class="checkout box">
               
                    <div class="checkout details">
                        <h1>Payment Details</h1>
                        <div class="payment-details">
                            <input type="text" placeholder="Name on Card">
                            <input type="text" placeholder="Card Number">
                            <input type="text" placeholder="CVV">
                            <select name="" id="">
                                <option disabled selected>YY</option>
                                <option>24</option>
                                <option>25</option>
                                <option>26</option>
                                <option>27</option>
                                <option>28</option>

                            </select>
                            <select name="" id="">
                                <option value="" disabled selected>MM</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                            </select>
                        </div>
                    </div>
                    <div class="checkout products-total">
                        <div class="checkout total-amt"> 
                            <p id="product-left-total">Total:</p>
                            <p id="product-right-money">$<?php echo $data[0];?></p>
                        </div>
                        <form action="?controller=product&action=addOrder" method="POST">
                        <button type="submit" id="Place-Order">Place Order</button>
                        </form>
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
