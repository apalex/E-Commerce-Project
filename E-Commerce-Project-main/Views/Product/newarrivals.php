<?php

include 'mysqldatabase.php';

$product = new Product;


// $selectOption = "newest";
$product = $product -> listNewArrivals();

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
        <div class="container new-arrivals">
            <div class="title-new-arrivals">
                <h1>New Arrivals</h1>
                <form action="" method="POST">
                    <select name="orderby" id="">
                        <option value="newest" selected >Newest</option>
                        <option value="oldest">Oldest</option>
                        <option value="a-z">By Brand: A-Z</option>
                        <option value="high">Pricing: High to Low</option>
                        <option value="low">Pricing: Low to High</option>
                    </select>
                </form>
            </div>
            <ol class="ol-product-case">
                <?php
                foreach($product as $p) {
                    echo 
                    '<li class="li-product-item">
                        <div class="product-inside-list">
                            <a href="?controller=product&action=view&id='. $p -> Prod_ID .'">
                                <img src="'. $p -> Prod_Image_Path .'">
                            </a>
                            <div class="li-product-bottom">
                                <p id="list-product-name">'. $p -> Prod_Name .'</p>
                                <p id="list-product-price">'. $p -> Prod_Client_Price .'$</p>
                            </div>
                        </div>
                    </li>
                    ';
                }
                ?>
            </ol>
        </div>
        <div class="push"></div>
    </div>

    <?php
    include_once 'footer.php';
    ?>

<script src="app.js"></script>

</body>
</html>