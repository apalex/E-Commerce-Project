
<?php
    session_start();
    $user = $data[0];
    $uID = $_SESSION['id'];

    if(isset($_POST['submit'])){
        
            $user -> update($user,$uID);
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
    <header>
        <div class="page-content-inner">
            <div class="header-inner top">
                <div class="section-left">
                    <div class="header-nav side-bar" id="sidenav">
                        <a href="javascript:void(0)" onclick="closeNav()" id="closeNavBar"><img src="images/x.png" width="21" height="21"></a>
                        <a href="newarrivals.html">New Arrivals</a>
                        <a href="bestsellers.html">Best Sellers</a>
                        <a href="allsellers.html">All Sellers</a>
                        <a href="about.html">About</a>
                        <a href="contact.html">Contact</a>
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
                        <a href="cart.html" id="shopping-cart">
                            <img src="images/shopping-cart.png" alt="Shopping Cart" width="30" height="40">
                        </a>
                    </div>
                    <div class="header-nav account">
                        <a href="" id="account">
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
                                <a href="index.html">
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

    <div class="wrapper">
        <div class="container account">
            <div class="account info">
                <h4>Manage my Account</h4>
                <div class="stack 1">
                    <a href="">My Profile</a>
                    <a href="">Address Book</a>
                    <a href="">My Payment Options</a>
                </div>
                <h4>My Orders</h4>
                <div class="stack 2">
                    <a href="">My Returns</a>
                    <a href="">My Cancellations</a> 
                </div>
            </div>
            <div class="account edit">
                <h3>Edit Your Profile</h3>
                <form action="" method="POST">
                    <!-- If value of input for Fname, Lname, Email, Phone Number 
                    is == to the value in database, means no changes made,
                    however if != then means its different. For the Password,
                    its if is current pass, new pass, and confirm pass are not empty,
                    and are correct field. -->
                    <p id="first_name">First Name</p>
                    <p id="last_name">Last Name</p>
                    <div class="stack-input first">
                        <input type="text" name="F_Name" id="F_Name" placeholder="<?php echo $user->F_Name ?>">
                    </div>
                    <div class="stack-input second">
                        <input type="text" name="L_Name" id="L_Name" placeholder="<?php echo $user->L_Name ?>">
                    </div>
                    <p id="email">Email</p>
                    <p id="phone">Phone(Optional)</p>
                    <div class="stack-input third">
                        <input type="text" name="U_Email" id="U_Email" placeholder="<?php echo $user->U_Email ?>">
                    </div>
                    <div class="stack-input fourth">
                        <input type="text" name="Phone_Num" id="Phone_Num" placeholder="<?php echo $user->Phone_Num ?>">
                    </div>
                    <p>Change Password</p>
                    <label for="">Current password: <?php echo $user->U_Pass ?></label><br>
                    <input type="password" name="new_pass" id="New_Pass" placeholder="New Password"><br>
                    <input type="password" name="c_new_pass" id="New_Pass_Conf" placeholder="Confirm New Password"><br>
                    <button type="submit" id="cancel-profile">Cancel</button>
                    <button type="submit" name="submit" id="save-profile">Save Changes</button>
                </form>
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
                <td><a href="login.html" class="footerLinkStyle">Login</a></td>
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
