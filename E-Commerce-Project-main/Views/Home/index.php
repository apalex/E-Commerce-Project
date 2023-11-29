
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
    <section class="slide-container">
            <div class="slider-wrapper">
                <div class="slider">
                    <img id="slide-1" src="images/razer_ornata_v3.jpg">
                    <img id="slide-2" src="images/razer_iskur_gaming_chair.jpg">
                    <img id="slide-3" src="images/razer_gaming_mouse.jpg">
                </div>
                <div class="slider-nav">
                    <a href="#slide-1"></a>
                    <a href="#slide-2"></a>
                    <a href="#slide-3"></a>
                </div>
            </div>
        </section>

    <section class="carousselProduct">
        <h2 class="productCategory">Flash Deals</h2>
        <button class="preBtn"><img src="images/next.png" alt=""></button>
        <button class="nxtBtn"><img src="images/next.png" alt=""></button>
        <div class="productContainer">
            <div class="productCard">
                <div class="productImage">
                    <span class="discountTag">50% off</span>
                    <img src="images/razer_gaming_mouse.jpg" class="productThumb" alt="">
                    <button class="cardBtn">add to cart</button>
                </div>
                <div class="productInfo">
                    <h2 class="productBrand">Brand</h2>
                    <p class="productShortDescription">short desription</p>
                    <span class="price">$20</span><span class="actualPrice">40</span>
                </div>
            </div>
            <div class="productCard">
                <div class="productImage">
                    <span class="discountTag">50% off</span>
                    <img src="images/adesso_xtream_microphone.jpg" class="productThumb" alt="">
                    <button class="cardBtn">add to cart</button>
                </div>
                <div class="productInfo">
                    <h2 class="productBrand">Brand</h2>
                    <p class="productShortDescription">short desription</p>
                    <span class="price">$20</span><span class="actualPrice">40</span>
                </div>
            </div>
            <div class="productCard">
                <div class="productImage">
                    <span class="discountTag">50% off</span>
                    <img src="images/asus_rog_azoth75.jpg" class="productThumb" alt="">
                    <button class="cardBtn">add to cart</button>
                </div>
                <div class="productInfo">
                    <h2 class="productBrand">Brand</h2>
                    <p class="productShortDescription">short desription</p>
                    <span class="price">$20</span><span class="actualPrice">40</span>
                </div>
            </div>
            <div class="productCard">
                <div class="productImage">
                    <span class="discountTag">50% off</span>
                    <img src="images/blue_yeti_microphone.jpg" class="productThumb" alt="">
                    <button class="cardBtn">add to cart</button>
                </div>
                <div class="productInfo">
                    <h2 class="productBrand">Brand</h2>
                    <p class="productShortDescription">short desription</p>
                    <span class="price">$20</span><span class="actualPrice">40</span>
                </div>
            </div>
            <div class="productCard">
                <div class="productImage">
                    <span class="discountTag">50% off</span>
                    <img src="images/enhance_gaming_keyboard.jpg" class="productThumb" alt="">
                    <button class="cardBtn">add to cart</button>
                </div>
                <div class="productInfo">
                    <h2 class="productBrand">Brand</h2>
                    <p class="productShortDescription">short desription</p>
                    <span class="price">$20</span><span class="actualPrice">40</span>
                </div>
            </div>
            <div class="productCard">
                <div class="productImage">
                    <span class="discountTag">50% off</span>
                    <img src="images/hyperx_cloudalpha_headset.jpg" class="productThumb" alt="">
                    <button class="cardBtn">add to cart</button>
                </div>
                <div class="productInfo">
                    <h2 class="productBrand">Brand</h2>
                    <p class="productShortDescription">short desription</p>
                    <span class="price">$20</span><span class="actualPrice">40</span>
                </div>
            </div>
            <div class="productCard">
                <div class="productImage">
                    <span class="discountTag">50% off</span>
                    <img src="images/lg_32gn600_monitor.jpg" class="productThumb" alt="">
                    <button class="cardBtn">add to cart</button>
                </div>
                <div class="productInfo">
                    <h2 class="productBrand">Brand</h2>
                    <p class="productShortDescription">short desription</p>
                    <span class="price">$20</span><span class="actualPrice">40</span>
                </div>
            </div>
            <div class="productCard">
                <div class="productImage">
                    <span class="discountTag">50% off</span>
                    <img src="images/logitech_g314_keyboard.jpg" class="productThumb" alt="">
                    <button class="cardBtn">add to cart</button>
                </div>
                <div class="productInfo">
                    <h2 class="productBrand">Brand</h2>
                    <p class="productShortDescription">short desription</p>
                    <span class="price">$20</span><span class="actualPrice">40</span>
                </div>
            </div>
            <div class="productCard">
                <div class="productImage">
                    <span class="discountTag">50% off</span>
                    <img src="images/nerdi_stereo_headset.jpg" class="productThumb" alt="">
                    <button class="cardBtn">add to cart</button>
                </div>
                <div class="productInfo">
                    <h2 class="productBrand">Brand</h2>
                    <p class="productShortDescription">short desription</p>
                    <span class="price">$20</span><span class="actualPrice">40</span>
                </div>
            </div>
            <div class="productCard">
                <div class="productImage">
                    <span class="discountTag">50% off</span>
                    <img src="images/razer_gaming_mouse.jpg" class="productThumb" alt="">
                    <button class="cardBtn">add to cart</button>
                </div>
                <div class="productInfo">
                    <h2 class="productBrand">Brand</h2>
                    <p class="productShortDescription">short desription</p>
                    <span class="price">$20</span><span class="actualPrice">40</span>
                </div>
            </div>
            <div class="productCard">
                <div class="productImage">
                    <span class="discountTag">50% off</span>
                    <img src="images/razer_gaming_mouse.jpg" class="productThumb" alt="">
                    <button class="cardBtn">add to cart</button>
                </div>
                <div class="productInfo">
                    <h2 class="productBrand">Brand</h2>
                    <p class="productShortDescription">short desription</p>
                    <span class="price">$20</span><span class="actualPrice">40</span>
                </div>
            </div>
            <div class="productCard">
                <div class="productImage">
                    <span class="discountTag">50% off</span>
                    <img src="images/razer_gaming_mouse.jpg" class="productThumb" alt="">
                    <button class="cardBtn">add to cart</button>
                </div>
                <div class="productInfo">
                    <h2 class="productBrand">Brand</h2>
                    <p class="productShortDescription">short desription</p>
                    <span class="price">$20</span><span class="actualPrice">40</span>
                </div>
            </div>
        </div>
    </section>
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
<script src='caroussel.js'></script>
</body>
</html>
