<?php

$store = new Store();
$sellers = $store -> listStores();

if (isset($_GET['store'])) {
    $seller_prod = new Store();
    $seller_prod = $seller_prod -> searchStore($_GET['store']);
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

    <?php include_once "navbar.php"; ?>

    <div class="wrapper">
        <p><a href="?controller=home&action=index">Home</a> / All Sellers <b>
        <div class="container categories">
            <div class="product-categories">
                <h1>Sellers</h1>
                <a href="?controller=product&action=allsellers&store=all">All</a>
                <?php
                foreach($sellers as $s) {
                    $lower = strtolower($s -> Store_Name);
                    echo "
                    <a href='?controller=product&action=allsellers&store={$lower}'>
                    {$s -> Store_Name}
                    </a>
                    ";
                }
                ?>
            </div>
            <div class="product-boxes-categories">
            <ol class="ol-product-case">
                <?php
                if ($_GET['store'] == 'all') {
                    $prod = new Product();
                    $prod = $prod -> listProducts();
                    foreach($prod as $product) {
                        echo 
                        '<li class="li-product-item">
                            <div class="product-inside-list">
                                <a href="?controller=product&action=view&id='. $product -> Prod_ID .'">
                                    <img src="'. $product -> Prod_Image_Path .'">
                                </a>
                                <div class="li-product-bottom">
                                    <p id="list-product-name">'. $product -> Prod_Name .'</p>
                                </div>
                            </div>
                        </li>
                        ';
                    }
                } else {
                    foreach($seller_prod as $product) {
                        echo 
                        '<li class="li-product-item">
                            <div class="product-inside-list">
                                <a href="?controller=product&action=view&id='. $product -> Prod_ID .'">
                                    <img src="'. $product -> Prod_Image_Path .'">
                                </a>
                                <div class="li-product-bottom">
                                    <p id="list-product-name">'. $product -> Prod_Name .'</p>
                                </div>
                            </div>
                        </li>
                        ';
                    }
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
