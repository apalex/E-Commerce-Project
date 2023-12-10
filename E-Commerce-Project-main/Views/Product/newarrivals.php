<?php

include 'mysqldatabase.php';

$product = new Product;

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

$product = $product -> listNewArrivals($start, $rows_per_page);

// Tried doing the criteria select option, doesn't work
// if (isset($_POST['orderby'])) {
//     $option = $_POST['orderby'];
//     if ($option == "newest") {
//         $product = $product -> listNewArrivals();
//     } elseif ($option == "oldest") {
//         $product = $product -> listOldest();
//     } elseif ($option == "a-z") {
//         $product = $product -> listAlphabetical();
//     } elseif ($option == "high") {
//         $product = $product -> listHightoLow();
//     } elseif ($option == "low") {
//         $product = $product -> listLowtoHigh();
//     }
// }

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
                    <select name="orderby">
                        <option value="newest" >Newest</option>
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
            <div class="pagination">
                <p>Page <?php echo $page + 1 ?> of <?php echo $pages ?></p>
                <a href="?controller=product&action=newarrivals&page=1">First</a>
                <?php if(isset($_GET['page']) && $_GET['page'] > 1) {
                    $previous = $_GET['page'] - 1;
                    echo "<a href='?controller=product&action=newarrivals&page={$previous}'>Previous</a>";
                } else {
                    echo "Previous";
                } ?>
                <div class="page-numbers">
                    <?php
                    for ($i = 1; $i <= $pages; $i++) {
                        echo "<a href='?controller=product&action=newarrivals&page={$i}'>$i</a>";
                    }
                    ?>
                </div>
                <?php

                if (!isset($_GET['page'])) {
                    ?>
                    <a href="?controller=product&action=newarrivals&page=2">Next</a>
                    <?php
                } else {
                    if ($_GET['page'] >= $pages) {
                        ?>
                        <a>Next</a>
                        <?php
                    } else {
                        $next = $_GET['page'] + 1;
                        echo "<a href='?controller=product&action=newarrivals&page={$next}'>Next</a>";
                    }
                }

                ?>
                <a href="?controller=product&action=newarrivals&page=<?php echo $pages ?>">Last</a>
            </div>
        </div>
        <div class="push"></div>
    </div>

    <?php
    include_once 'footer.php';
    ?>

<script src="app.js"></script>

</body>
</html>