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
?>
<html>
<header>
        <div class="page-content-inner">
            <div class="header-inner top">
                <div class="section-left">
                    <div class="header-nav side-bar" id="sidenav">
                        <a href="javascript:void(0)" onclick="closeNav()" id="closeNavBar"><img src="images/x.png" width="21" height="21"></a>
                        <a href="newarrivals.html">New Arrivals</a>
                        <a href="bestsellers.html">Best Sellers</a>
                        <a href="allsellers.html">All Sellers</a>
                        <a href="?controller=home&action=about">About</a>
                        <a href="?controller=home&action=contact">Contact</a>
                        
                            <form action="" method="POST">
                           <?php echo $button ?>
                            </form>
                    
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
                       <form action="?controller=home&action=results" method="POST">
                            <input type="search" placeholder="Search" id="searchbox" name="search"></input>
                         
                            <button id="searchbtn" type="submit">
                         <img src="images/search.png" alt="Search" width="28" height="28">
                            </button>
                    </div>
                </div>
                <div class="section-right">
                    <div class="header-nav countries">
                        <select id="countries">
                            <option disabled selected>Countries</option>
                        </select>
                    </div>
                    <div class="header-nav cart">
                        <a href="?controller=user&action=<?php echo $cart_path ?>" id="shopping-cart">
                            <img src="images/shopping-cart.png" alt="Shopping Cart" width="30" height="40">
                        </a>
                    </div>
                    <div class="header-nav account">
                        <a href="?controller=user&action=<?php echo $log_path?>" id="account">
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
                                <a href="?controller=home&action=index">
                                    Home
                                </a>
                            </div>
                            <div class="header-nav categories">
                                <div class="cat_dropdown">
                                    <a>
                                        Categories
                                        <i>
                                            <img src="images/caret-down.png" width="20px" height="20px">
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
                                <a href="services.html">
                                    Services
                                </a>
                            </div>
                            <div class="header-nav store-locator">
                                <a href="store_locator.html">
                                    Store Locator
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</html>
