
<?php
    //include "mysqldatabase.php";
    session_start();
    $log_path;
    if(isset($_SESSION["id"])){
        $log_path = "myaccount";
    }else{
        $log_path = "login";
    }
 $product = $data[0];

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
    <header>
        <div class="page-content-inner">
            <div class="header-inner top">
                <div class="section-left">
                    <div class="header-nav side-bar" id="sidenav">
                        <a href="javascript:void(0)" onclick="closeNav()" id="closeNavBar"><img src="images/x.png" width="21" height="21"></a>
                        <a href="newarrivals.php">New Arrivals</a>
                        <a href="bestsellers.php">Best Sellers</a>
                        <a href="allsellers.php">All Sellers</a>
                        <a href="../Home/about.php">About</a>
                        <a href="../Home/contact.php">Contact</a>
                        <a href="">Logout</a>
                    </div>
                    <div class="header-nav hamburger-icon">
                        <span onclick="openNav()">
                            <a>
                                <img src="images/hamburger.png" width="30" height="30">
                            </a>
                        </span>
                    </div>
                    <div class="header-nav logo">
                        <a href="?controller=home&action=index" id="logo">ABD Game Store</a>
                    </div>
                    <div class="header-nav search-bar">
                        <form action="">
                            <input type="text" placeholder="What are you looking for?" id="searchbox">
                            <button type="submit" id="searchbtn"><img src="images/search.png" width="28" height="28"></button>
                        </form>
                    </div>
                </div>
                <div class="section-right">
                    <div class="header-nav countries">
                        <select id="countries">
                            <option disabled selected>Countries</option>
                        </select>
                    </div>
                    <div class="header-nav cart">
                        <a href="cart.php" id="shopping-cart">
                            <img src="images/shopping-cart.png" alt="Shopping Cart" width="30" height="40">
                        </a>
                    </div>
                    <div class="header-nav account">
                        <a href="?controller=user&action=<?php echo $log_path?> " id="account">
                            <img src="images/account.png" alt="Account" width="32" height="32">
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="header-inner bottom">
                <div class="container">
                    <div>
                        <div class="column">
                            <div class="header-nav home">
                                <a href="../Home/index.php">
                                    Home
                                </a>
                            </div>
                            <div class="header-nav categories">
                                <div class="cat_dropdown">
                                    <a>
                                        Categories
                                        <i>
                                            <img src="<?php echo $product -> Prod_Image_Path?>" width="20px" height="20px">
                                        </i>
                                    </a>
                                    <div class="dropdown_content">
                                        <a href="">PC Parts</a>
                                        <a href="">Accessories</a>
                                        <a href="">Laptops</a>
                                        <a href="">Consoles</a>
                                        <a href="">Monitors</a>
                                    </div>
                                </div>
                            </div>
                            <div class="header-nav services">
                                <a href="../Home/services.php">
                                    Services
                                </a>
                            </div>
                            <div class="header-nav store-locator">
                                <a href="../Home/storelocator.php">
                                    Store Locator
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="wrapper">
        <div class="product container">
            <div class="product location">
                <!-- Instead of hard coding product name here, pull from SQL table product_name -->
                <p>Home / Product / Keyboard / <b><?php echo $product -> Prod_Name ?></b></p>
            </div>
            <div class="product box">
                <div class="product image">
                    <div class="product image top">
                        <img src="images/razer_ornata_v3.jpg" alt="">
                    </div>
                    <div class="product image bottom">
                        <!-- Make a carousel here -->
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
                            <p><?php echo $product-> Prod_Comments?></p>
                        </div>
                    </div>
                    <div class="product add">
                        <div class="product qty-buy-heart">
                            <form action="">
                                <input type="text" value="1">
                                <input type="button" name="" id="">
                            </form>
                        </div>
                        <div class="product delivery">
                            <div class="product delivery free">
                                <p>Free Delivery</p>
                            </div>
                            <div class="product delivery return">
                                <p>Return Delivery</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="push">
        </div>
    </div>

    <footer>
        <table class="footerTable">
            <tr>
                <th>ABD Game Store</th>
                <th>Support</th>
                <th>Account</th>
                <th>Quick Link</th>
            </tr>
            <tr>
                <td>Subscribe</td>
                <td><address>Sainte Croix Ave, Saint Laurent, QC</address></td>
                <td><a href="" class="footerLinkStyle">My Account</a></td>
                <td><a href="" class="footerLinkStyle">Privacy Policy</a></td>
            </tr>
            <tr>
                <td>Get 10% off your first order</td>
                <td><address><a href="mailto:abdgamestore@gmail.com">abdgamestore@gmail.com</a></address></td>
                <td><a href="?controller=user&action=login" class="footerLinkStyle">Login</a></td>
                <td><a href="TOU.html" class="footerLinkStyle">Terms Of Use</a></td>
            </tr>
            <tr>
                <td><input type="text" id="c_email" name="c_name" placeholder="Enter your email"><button></button></td>
                <td><a href="tel:123-456-7890">123-456-7890</a></td>
                <td><a href="" class="footerLinkStyle">Cart</a></td>
                <td><a href="FAQ.html" class="footerLinkStyle">FAQ</a></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><a href="index.html" class="footerLinkStyle">Shop</a></td>
                <td><a href="contact.html" class="footerLinkStyle">Contact</a></td>
            </tr>
        </table>
    </footer>

<script src="app.js"></script>

</body>
</html>
