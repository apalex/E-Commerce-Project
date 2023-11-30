<?php
include "mysqldatabase.php";

session_start();

$product = new Product();

if(isset($_POST['search_admin_products'])) {
    $query = $_POST['searchAdminProd'];
    $product = $product -> searchProducts($query);


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


    <div class="container admin">
        <div class="admin categories">
            <div class="admin categories selection">
                <a href="?controller=user&action=admin">Users</a>
                <a href="?controller=product&action=admin">Products</a>
                <a href="?controller=store&action=admin">Stores</a>
            </div>
            
        </div>
        <div class="admin user">
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
                    <th>Comments</th>
                    <th>Stock</th>
                    <th>Category</th>
                    <th>Image Path</th>
                </tr>
                <?php
          
                if(isset($_POST['search_admin_products'])){
                foreach($product as $p) {
                    echo '<tr>
                        <td><img src="'. $p -> Prod_Image_Path .'" width=100 heigth=100></td>
                        <td width=100 heigth=100><input type="text" value="'. $p -> Prod_ID .'"></td>
                        <td width=100 heigth=100><input type="text" value="'. $p -> Prod_Name .'"></td>
                        <td><input type="text" value="'. $p -> Prod_Client_Price .'"></td>
                        <td><input type="text" value="'. $p -> Prod_Manufacturer_Price .'"></td>
                        <td><input type="text" value="'. $p -> Prod_Details .'"></td>
                        <td><input type="text" value="'. $p -> Prod_Comments .'"></td>
                        <td><input type="text" value="'. $p -> Prod_Stock .'"></td>
                        <td><input type="text" value="'. $p -> Prod_Category .'"></td>
                        <td><input type="text" value="'. $p -> Prod_Image_Path .'"></td>
                    </tr>';
                }
            }
                ?>
            </table>
            <button type="submit" id="save-changes">Save</button>
        </form>
    </div>
<script src="app.js"></script>

</body>
</html>
