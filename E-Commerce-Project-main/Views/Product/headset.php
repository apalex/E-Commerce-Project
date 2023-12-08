<?php

include "mysqldatabase.php";

session_start();

$categories = new Product();
$categories = $categories -> searchCategories();

$headsets = new Product();
$headsets = $headsets -> searchHeadsets();

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

    <?php include_once "navbar.php"; ?>

    <div class="wrapper">
        <p><a href="?controller=product&action=newarrivals">Products</a> / <b>Headsets</b></p>
        <div class="container categories">
            <div class="product-categories">
                <h1>Categories</h1>
                <?php
                foreach($categories as $c) {
                    echo '
                    <a href="?controller=product&action='. strtolower($c -> Prod_Category) .'">
                    '.$c -> Prod_Category.'
                    </a>
                    ';
                }
                ?>
            </div>
            <div class="product-boxes-categories">
            <ol class="ol-product-case">
                <?php
                foreach($headsets as $h) {
                    echo 
                    '<li class="li-product-item">
                        <div class="product-inside-list">
                            <a href="?controller=product&action=view&id='. $h -> Prod_ID .'">
                                <img src="'. $h -> Prod_Image_Path .'">
                            </a>
                            <div class="li-product-bottom">
                                <p id="list-product-name">'. $h -> Prod_Name .'</p>
                                <p id="list-product-price">'. $h -> Prod_Client_Price .'$</p>
                            </div>
                        </div>
                    </li>
                    ';
                }
                ?>
            </ol>
            </div>
        </div>
        <div class="push"></div>
    </div>

    <?php include_once "footer.php"; ?>

<script src="app.js"></script>

</body>
</html>