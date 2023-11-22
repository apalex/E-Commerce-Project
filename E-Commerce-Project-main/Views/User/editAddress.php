<?php
    session_start();
    $user = $data[0];
    $uID = $_SESSION['id'];
    $addList = $user -> address_list;
    
    
    if(isset($_POST['submit'])){
     
       $address = $_POST['Address'];
       $city = $_POST['City'];
       $postal = $_POST['Zip_Code'];
       $country = $_POST['country'];
       $AU_ID = $_POST['AU_ID'];
       
       if($address == "" || $city == "" || $postal == "" || $country == ""){
            echo "<script>alert('Please fill out all fields')</script>";
           
       }else{
        $user -> updateAddress($AU_ID,$address,$city,$postal,$country);

        
       }
    }
  
    if(isset($_POST['addButton'])){
        $user -> addAddress();
   
    }

    if(isset($_POST['delete-address'])){
        if(count($addList) == 1){
            echo"<script>alert('Must have at least one Address')</script>";
        }else{
        $user -> deleteAddress($_POST['AU_ID']);
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

            

    <div class="wrapper">
        <div class="container account">
            <div class="account info">
                <h4>Manage my Account</h4>
                <div class="stack 1">
                    <a href="?controller=user&action=myaccount">My Profile</a>
                    <a href="">Address Book</a>
                    <a href="">My Payment Options</a>
                </div>
                <h4>My Orders</h4>
                <div class="stack 2">
                    <a href="">My Returns</a>
                    <a href="">My Cancellations</a>
                </div>
            </div>
            <div class="account address">
            <h3>Edit Your Address</h3>
            <?php
                foreach($addList as $au){
           echo '
                
                <form action="" method="POST">
                    <p id="Address_One">Address</p>
                    <p id="city_1">City</p>
                    <div class="stack-input first">
                        <input type="text" name="Address" id="Address_1" value="' . $au->address . '">
                    </div>
                    <div class="stack-input second">
                        <input type="text" name="City" id="City" value="'. $au->city .'">
                    </div>
                    <p id="Address_Two">Zip Code</p>
                    
                    <div class="stack-input third">
                    <input type="text" name="Zip_Code" id="Zip_Code" value="'. $au->postal .'">
                    </div>
                    <div class="stack-input fourth">
                        
                    </div>
                    <p>Current country: '. $au -> country .'<p>
                    <p>Countries</p>
                    <div class="stack-input five">
                        <select id="countries" name ="country">
                            <option value = "" >-- Select a Country --</option>
                            <option value="Canada">Canada</option>
                        </select>
                    </div>
                    <button type="submit" id="cancel-profile">Cancel</button>
                    <button type="submit" id="save-profile" name="submit">Save Changes</button>
                    <button type="submit id="delete-address" name="delete-address">Delete</button>
                    <input name="AU_ID" type="hidden" value="'. $au -> UA_ID .'"></input>
                </form>
            ';
                }
                
            ?>
            <form action="" method="POST">
            <input type="submit" name="addButton" value="Add Address">
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
                <td><a href="" class="footerLinkStyle">Login</a></td>
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
                <td><a href="?controller=home&action=index" class="footerLinkStyle">Shop</a></td>
                <td><a href="contact.html" class="footerLinkStyle">Contact</a></td>
            </tr>
        </table>
    </footer>

<script src="app.js"></script>

</body>
</html>
