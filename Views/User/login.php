<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop all your electronic needs and save big! | ABDGameStore.com</title>
    <link rel="stylesheet" href="../../styles.css">
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
                        <a href="index.html" id="logo">ABD Game Store</a>
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
                        <a href="account.html" id="account">
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
        <div class="container login">
            <h1>Login in</h1><br>
            <h5>Enter your details below</h5><br>
            <div class="login form">
                <form action="">
                    <input type="text" name="" id="" placeholder="Email" required><br><br>
                    <input type="password" name="" id="" placeholder="Password" required><br><br>
                    <button type="submit">Log in</button>
                    <a href="faq.html">Forgot Password?</a>
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

<script src="../../app.js"></script>

</body>
</html>