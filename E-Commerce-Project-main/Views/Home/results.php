<?php

include "mysqldatabase.php";

$prod = new Product();
$search = $_POST['search'];
$product = $prod -> searchProducts($search);

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
        <p><a href="?controller=home&action=index">Home</a> / <b>Results</b></p>
        <div class="container results">
            <h1>Result(s)</h1>
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
                if (count($product) === 0) {
                    echo "<br>";
                    echo "No matching query were found";
                }
                ?>
            </ol>
        </div>
        <div class="push"></div>
    </div>

    <?php include_once "footer.php"; ?>
    <script src="app.js"></script>
</body>
</html>