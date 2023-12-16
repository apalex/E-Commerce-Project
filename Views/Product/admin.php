<?php
include "mysqldatabase.php";

if (session_status() === PHP_SESSION_NONE){session_start();}

$product = new Product();

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

// Add a Product
if (isset($_POST['add-product-admin'])) {
    $PNAME = $_POST['Admin_Product_Name'];
    $CPRICE = $_POST['Admin_Product_Client'];
    $MPRICE = $_POST['Admin_Product_Manufacturer'];
    $PDETAILS = $_POST['Admin_Product_Details'];
    $PSTOCK = $_POST['Admin_Product_Stock'];
    $PCATEGORY = $_POST['Admin_Product_Category'];
    $PIMAGEPATH = $_POST['Admin_Product_ImagePath'];
    $PIMAGE = $_FILES['Admin_Product_Image']['name'];
    $product = $product -> insertProduct($PNAME, $CPRICE, $MPRICE, $PDETAILS, '', $PSTOCK, $PCATEGORY, $PIMAGEPATH);
    $tempname = $_FILES['Admin_Product_Image']['tmp_name'];
    $folder = "images/{$PIMAGE}";
    move_uploaded_file($tempname, $folder);
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
            <h3>Add Product</h3>
            <form method="POST" enctype="multipart/form-data">
                <p id="first_name">Name</p>
                <input type="text" name="Admin_Product_Name">
                <p id="first_name">Client Price</p>
                <input type="text" name="Admin_Product_Client">
                <p id="first_name">Manufacturer Price</p>
                <input type="text" name="Admin_Product_Manufacturer">
                <p id="first_name">Details</p>
                <input type="text" name="Admin_Product_Details">
                <p id="first_name">Stock</p>
                <input type="text" name="Admin_Product_Stock">
                <p id="first_name">Category</p>
                <input type="text" name="Admin_Product_Category">
                <p id="first_name">Image Path</p>
                <input type="text" name="Admin_Product_ImagePath">
                <p id="first_name">Image</p>
                <input type="file" name="Admin_Product_Image">
                <button type="submit" id="search" name="add-product-admin">Add</button>
            </form>
            <h3>Search Product(s)</h3>
            <form action="" method="POST">
                <p id="first_name">Name</p>
                <input type="search" name="searchAdminProd">
                <button type="submit" id="search" name="search_admin_products">Search</button>
            </form>
        </div>
        <h3>Result</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <th>Image</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Client Price</th>
                    <th>Manufacturer Price</th>
                    <th>Details</th>
                    <th>Stock</th>
                    <th>Category</th>
                    <th>Image Path</th>
                </tr>
                <?php
          
                if(isset($_POST['search_admin_products'])){
                foreach($product as $p) {
                    echo '<tr>
                        <td><img src="'. $p -> Prod_Image_Path .'" width=100 heigth=100></td>
                        <td width=100 heigth=100><input type="text" value="'. $p -> Prod_ID .'" readonly></td>
                        <td width=100 heigth=100><input type="text" value="'. $p -> Prod_Name .'"></td>
                        <td><input type="text" value="'. $p -> Prod_Client_Price .'"></td>
                        <td><input type="text" value="'. $p -> Prod_Manufacturer_Price .'"></td>
                        <td><input type="text" value="'. $p -> Prod_Details .'"></td>
                        <td><input type="text" value="'. $p -> Prod_Stock .'"></td>
                        <td><input type="text" value="'. $p -> Prod_Category .'"></td>
                        <td><input type="text" value="'. $p -> Prod_Image_Path .'" readonly></td>
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
