<?php

include "mysqldatabase.php";
if (session_status() === PHP_SESSION_NONE){session_start();}
$log_path;
$cart_path;
$log_out_button;
if(isset($_SESSION["id"])) {
    global $conn;
    $sql = "SELECT * FROM `User_Info` WHERE U_ID = {$_SESSION['id']}";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();
    if ($row['Permissions'] == 'Admin') {
        $log_path = "admin&id=". $_SESSION['id']. "";
    } else {
        $log_path = "myaccount&id=". $_SESSION['id']. "";
    }
    $cart_path = "?controller=product&action=cart";
    $log_out_button = "<button type='submit' name='log_sub'>Log out</button>";
} else {
    $log_path = "login";
    $cart_path= "?controller=user&action=login";
    $log_out_button = "";
}

if(isset($_POST['log_sub'])){
   session_destroy();
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
                        <a href="?controller=product&action=newarrivals&page=1&criteria=newest">New Arrivals</a>
                        <a href="?controller=product&action=allsellers&store=all">All Sellers</a>
                        <a href="?controller=home&action=about">About</a>
                        <a href="?controller=home&action=contact">Contact</a>
                        
                            <form action="" method="POST">
                           <?php echo $log_out_button ?>
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
                            </form>
                    </div>
                </div>
                <div class="section-right">
                    <div class="header-nav languages">
                        <select id="languages">
                            <option disabled selected>Languages</option>
                            <option>English</option>
                            <option>French</option>
                        </select>
                    </div>
                    <div class="header-nav cart">
                        <a href="<?php echo $cart_path ?>" id="shopping-cart">
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
                                    <a href="?controller=product&action=categories&page=1">
                                        Categories
                                        <i>
                                            <img src="images/caret-down.png" width="20px" height="20px">
                                        </i>
                                    </a>
                                    <div class="dropdown_content">
                                        <a href="?controller=product&action=categories&category=headset&page=1">Headphones</a>
                                        <a href="?controller=product&action=categories&category=microphone&page=1">Microphones</a>
                                        <a href="?controller=product&action=categories&category=keyboard&page=1">Keyboards</a>
                                        <a href="?controller=product&action=categories&category=mouse&page=1">Mouses</a>
                                        <a href="?controller=product&action=categories&category=headset&page=1">Monitors</a>
                                        <a href="?controller=product&action=categories&category=accessories&page=1">Accessories</a>
                                    </div>
                                </div>
                            </div>
                            <div class="header-nav services">
                                <a href="?controller=home&action=about">
                                    About
                                </a>
                            </div>
                            <div class="header-nav store-locator">
                                <a href="?controller=home&action=contact">
                                    Contact Us
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="header-discount">
                <p><b>USE COUPON 'CHRISTMAS' FOR 10% OFF ALL PURCHASES!</b></p>
            </div>
        </div>
    </header>
</html>
