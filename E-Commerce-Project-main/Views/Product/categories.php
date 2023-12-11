<?php

include "mysqldatabase.php";

session_start();

$categories = new Product();
$categories = $categories -> searchCategories();

$start = 0;
$rows_per_page = 12;
global $conn;
$records = $conn -> query("SELECT * FROM `Product_Info`;");
$num_rows = $records -> num_rows;
$pages = ceil($num_rows / $rows_per_page);

if (isset($_GET['page'])) {
    $page = $_GET['page'] - 1;
    $start = $page * $rows_per_page;
}

if(isset($_GET['category'])) {
    $category = new Product();
    $category = $category -> searchCategory($_GET['category'], $start, $rows_per_page);
} else {
    $category = new Product();
    $category = $category -> listAllCategories($start, $rows_per_page);
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
        <p><a href="?controller=home&action=index">Home</a> / <a href="?controller=product&action=categories&page=1">Categories</a> / <b><?php 
        if(isset($_GET['category'])) {
            $cat = ucfirst($_GET['category']);
            echo "{$cat}";
        } else {
            echo "All";
        } ?>
        </b></p>
        <div class="container categories">
            <div class="product-categories">
                <h1>Categories</h1>
                <a href="?controller=product&action=categories&page=1">All</a>
                <?php
                foreach($categories as $c) {
                    $lower = strtolower($c -> Prod_Category);
                    echo "
                    <a href='?controller=product&action=categories&category={$lower}&page=1'>
                    {$c -> Prod_Category}
                    </a>
                    ";
                }
                ?>
            </div>
            <div class="product-boxes-categories">
            <ol class="ol-product-case">
                <?php
                foreach($category as $product) {
                    echo 
                    '<li class="li-product-item">
                        <div class="product-inside-list">
                            <a href="?controller=product&action=view&id='. $product -> Prod_ID .'">
                                <img src="'. $product -> Prod_Image_Path .'">
                            </a>
                            <div class="li-product-bottom">
                                <p id="list-product-name">'. $product -> Prod_Name .'</p>
                                <p id="list-product-price">'. $product -> Prod_Client_Price .'$</p>
                            </div>
                        </div>
                    </li>
                    ';
                }
                ?>
            </ol>
            </div>
        </div>
        <div class="pagination">
                <p>Page <?php echo $page + 1 ?> of <?php echo $pages ?></p>
                <a href="?controller=product&action=categories&page=1">First</a>
                <?php if(isset($_GET['page']) && $_GET['page'] > 1) {
                    $previous = $_GET['page'] - 1;
                    echo "<a href='?controller=product&action=categories&page={$previous}'>Previous</a>";
                } else {
                    echo "Previous";
                } ?>
                <div class="page-numbers">
                    <?php
                    for ($i = 1; $i <= $pages; $i++) {
                        echo "<a href='?controller=product&action=categories&page={$i}'>$i</a>";
                    }
                    ?>
                </div>
                <?php

                if (!isset($_GET['page'])) {
                    ?>
                    <a href="?controller=product&action=categories&page=2">Next</a>
                    <?php
                } else {
                    if ($_GET['page'] >= $pages) {
                        ?>
                        <a>Next</a>
                        <?php
                    } else {
                        $next = $_GET['page'] + 1;
                        echo "<a href='?controller=product&action=categories&page={$next}'>Next</a>";
                    }
                }

                ?>
                <a href="?controller=product&action=categories&page=<?php echo $pages ?>">Last</a>
            </div>
        <div class="push"></div>
    </div>

    <?php include_once "footer.php"; ?>

<script src="app.js"></script>

</body>
</html>
