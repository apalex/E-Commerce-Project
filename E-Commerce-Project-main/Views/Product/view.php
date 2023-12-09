
<?php
include "mysqldatabase.php";
    session_start();
   
    $log_path;
    $product = $data[0];

    if(isset($_SESSION["id"])){
        $uid = $_SESSION['id'];
        $log_path = "myaccount&id=" . $uid;
    }else{
        $log_path = "login"; 
    }

    if(isset($_POST["cart-submit"])){

        if(isset($_SESSION["id"])){
        $quan = $_POST["quantity"];
        $p_id = $product -> Prod_ID;
        $_SESSION["cart"]["$p_id"] = $quan;
        //var_dump($_SESSION["cart"]);

        }else{
            header('Location: ?controller=user&action=login');
        }
        
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
    <?php
    include_once 'navbar.php';
    ?>

    <div class="wrapper">
        <div class="product container">
            <div class="product location">
                <p>Home / Product / <?php echo $product-> Prod_Category?> / <b><?php echo $product -> Prod_Name ?></b></p>
            </div>
            <div class="product box">
                <div class="product image">
                    <div class="product image top">
                        <img src= <?php echo $product -> Prod_Image_Path?> alt="">
                    </div>
                </div>
                <div class="product info">
                    <div class="product desc">
                        <div class="product name">
                            <h2><?php echo $product -> Prod_Name?></h2>
                        </div>
                        <div class="product stars">

                        </div>
                        <div class="product price">
                            <h1>$<?php echo $product->Prod_Client_Price ?></h1>
                        </div>
                        <div class="product comments">
                            <p><?php echo $product-> Prod_Details?></p>
                        </div>
                    </div>
                    <div class="product add">
                        <div class="product qty-buy-heart">
                         <form action="" method="POST">
                            <select name="quantity" id="">
                                <option value="" placeholder="Select a Quantity" disabled>Select a Quantity</option>
                                <?php
                                for($i = 1; $i<= $product -> Prod_Stock; $i++){
                                    echo"<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                                <button id="add-to-cart" type="submit" name="cart-submit">Add to Cart</button>
                            </form>
                        </div>
                        <div class="product delivery">
                            <div class="product free">
                                <img src="images/freedelivery.png">
                                <p>Free Delivery</p>
                            </div>
                            <div class="product return">
                                <img src="images/returndelivery.jpg">
                                <p>Return Delivery</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="more-products">
            <h3>More Products</h3>
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
