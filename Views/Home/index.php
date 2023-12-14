
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
    include_once 'navbar.php';
    ?>

    <div class="wrapper">
        <div class="advert-section">
            <div class="top-content">
                <div id="carousel" class="carousel slide" data-bs-ride="carousel">
            
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carousel" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carousel" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carousel" data-bs-slide-to="2"></li>
                        <li data-bs-target="#carousel" data-bs-slide-to="3"></li>
                        <li data-bs-target="#carousel" data-bs-slide-to="4"></li>
                        <li data-bs-target="#carousel" data-bs-slide-to="5"></li>
                    </ol>
            
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://i.ytimg.com/vi/MkH2D4f5_2s/maxresdefault.jpg" class="d-block w-100" alt="slide-img-1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://i.pinimg.com/originals/b6/8e/2c/b68e2cf6e46522ce889d84854014fab0.jpg" class="d-block w-100" alt="slide-img-2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://mir-s3-cdn-cf.behance.net/project_modules/1400/8b05f528503599.55c33cfbb9b16.png" class="d-block w-100" alt="slide-img-3">
                        </div>
                        <div class="carousel-item">
                            <img src="https://i.ytimg.com/vi/Tk1HNPtIgUg/maxresdefault.jpg" class="d-block w-100" alt="slide-img-4">
                        </div>
                        <div class="carousel-item">
                            <img src="https://i5.walmartimages.ca/images/Enlarge/821/984/6000203821984.jpg?odnHeight=612&odnWidth=612&odnBg=FFFFFF" class="d-block w-100" alt="slide-img-5">
                        </div>
                        <div class="carousel-item">
                            <img src="https://dlcdnwebimgs.asus.com/files/media/2C7F3DE4-F638-4ED3-8A25-83ABBBFF5F3F/v1/img/video/ROG-Azoth-product-video-thumbnail.jpg" class="d-block w-100" alt="slide-img-6">
                        </div>
                    </div>
            
                    <a class="carousel-control-prev" href="#carousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="featured-products">
            <h2>Featured Products</h2>
            <ol class="ol-product-case">
                <?php
                for ($i = 0; $i < 4; $i++) {
                    $randomProd = new Product();
                    $randomProd = $randomProd -> randomProduct();
                    foreach($randomProd as $random) {
                        echo 
                        '<li class="li-product-item">
                            <div class="product-inside-list">
                                <a href="?controller=product&action=view&id='. $random -> Prod_ID .'">
                                    <img src="'. $random -> Prod_Image_Path .'">
                                </a>
                                <div class="li-product-bottom">
                                    <p id="list-product-name">'. $random -> Prod_Name .'</p>
                                    <p id="list-product-price">'. $random -> Prod_Client_Price .'$</p>
                                </div>
                            </div>
                        </li>
                        ';
                    }
                }
                ?>
            </ol>
        </div>
        <div class="browse-categories">
            <h3>Browse By Category</h3>
            <div class="category-parent">
                <?php

                $categories = new Product();
                $categories = $categories -> searchCategories();

                foreach($categories as $c) {
                    echo "
                    <div class='category-box'>
                        <a href='?controller=product&action=categories&page=1&category={$c -> Prod_Category}'>{$c -> Prod_Category}</a>
                    </div>
                    ";
                }

                 ?>
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
