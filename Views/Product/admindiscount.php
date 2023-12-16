<?php
include "mysqldatabase.php";

if (session_status() === PHP_SESSION_NONE){session_start();}

$discount = new Discount();

// Search a Product
if(isset($_POST['search_admin_products'])) {
    $query = $_POST['searchAdminProd'];
    $product = $product -> searchProducts($query);
}

$log_out_button = "<button type='submit' name='log_sub'>Log out</button>";
if(isset($_POST['log_sub'])){
    unset($_SESSION['id']);
    header('Location: ?controller=home&action=index');
}

// Add a Discount
if (isset($_POST['add-discount-admin'])) {
    $Discount_Name = $_POST['Admin_Discount_Name'];
    $Discount_Percentage = $_POST['Admin_Discount_Percentage'];
    $Discount_Usage = $_POST['Admin_Discount_Usage'];
    $discount = $discount -> insertDiscount($Discount_Name, $Discount_Percentage, $Discount_Usage);
}

// Delete a Discount
if (isset($_POST['delete_admin_discount'])) {
    $discount = $discount -> deleteDiscount($_POST['delete_discount']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page ABDStore.com</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <a href="?controller=home&action=index">ABDGamestore.com</a>
    <div class="container admin">
        <div class="admin categories">
            <div class="admin categories selection">
                <a href="?controller=user&action=admin">Users</a>
                <a href="?controller=product&action=admin">Products</a>
                <a href="?controller=product&action=adminstore">Stores</a>
                <a href="?controller=product&action=admindiscount">Discounts</a>
                <form action="" method="POST">
                    <?php echo $log_out_button ?>
                </form>
            </div>
        </div>
        <div class="admin user">
            <h3>Add Discount</h3>
            <form method="POST">
                <p id="first_name">Name</p>
                <input type="text" name="Admin_Discount_Name">
                <p id="first_name">Percentage in decimals (0.00)</p>
                <input type="text" name="Admin_Discount_Percentage">
                <p id="first_name">Usage</p>
                <input type="text" name="Admin_Discount_Usage">
                <button type="submit" id="search" name="add-discount-admin">Add</button>
            </form>
            <h3>Delete Discount</h3>
            <form action="" method="POST">
                <p id="first_name">Discount ID</p>
                <input type="search" name="delete_discount">
                <button type="submit" id="search" name="delete_admin_discount">Delete</button>
            </form>
        </div>
        <h3>Discount List</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <th>Discount ID</th>
                    <th>Name</th>
                    <th>Percentage</th>
                    <th>Usage</th>
                    <form method="POST">
                        <button type="submit" id="search" name="list_discounts">List</button>
                    </form>
                </tr>
                <?php
                if (isset($_POST['list_discounts'])) {
                    $discount = $discount -> listDiscounts();
                    foreach($discount as $d) {
                        echo '<tr>
                            <td width=100 heigth=100><input type="text" value="'. $d -> Discount_ID .'" readonly></td>
                            <td width=100 heigth=100><input type="text" value="'. $d -> Discount_Name .'"></td>
                            <td><input type="text" value="'. $d -> Discount_Percentage .'"></td>
                            <td><input type="text" value="'. $d -> Discount_Usage .'"></td>
                        </tr>';
                    }
                }
                ?>
            </table>
        </form>
    </div>
<script src="app.js"></script>

</body>
</html>
