<?php

include "mysqldatabase.php";
if (session_status() === PHP_SESSION_NONE){session_start();}
$log_path;
$cart_path;
if(isset($_SESSION["id"])) {
    $log_path = "myaccount&id=". $_SESSION['id']. "";
    $cart_path = "cart";
} else {
    $log_path = "login";
    $cart_path= "login";
}

?>

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
                <td><a href="?controller=user&action=<?php echo $log_path?>" class="footerLinkStyle">My Account</a></td>
                <td><a href="?controller=home&action=privacypolicy" class="footerLinkStyle">Privacy Policy</a></td>
            </tr>
            <tr>
                <td>Get 10% off your first order</td>
                <td><address><a href="mailto:abdgamestore@gmail.com">abdgamestore@gmail.com</a></address></td>
                <td><a href="?controller=user&action=<?php echo $log_path?>" class="footerLinkStyle">Login</a></td>
                <td><a href="?controller=home&action=TOU" class="footerLinkStyle">Terms Of Use</a></td>
            </tr>
            <tr>
                <td><input type="text" id="c_email" name="c_name" placeholder="Enter your email"><button type="submit" id="submit">Submit</button></td>
                <td><a href="tel:123-456-7890">123-456-7890</a></td>
                <td><a href="?controller=user&action=<?php echo $cart_path ?>" class="footerLinkStyle">Cart</a></td>
                <td><a href="?controller=home&action=faq" class="footerLinkStyle">FAQ</a></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><a href="?controller=home&action=index" class="footerLinkStyle">Shop</a></td>
                <td><a href="?controller=home&action=contact" class="footerLinkStyle">Contact</a></td>
            </tr>
        </table>
</footer>
