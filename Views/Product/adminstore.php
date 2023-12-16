<?php
include "mysqldatabase.php";

if (session_status() === PHP_SESSION_NONE){session_start();}

$store = new Store();

if(isset($_POST['search_admin_stores'])) {
    $query = $_POST['searchAdminStore'];
    $store = $store -> searchStore($query);
}

if (isset($_POST['input_admin_store'])) {
    $Store_Name = $_POST['inputStoreName'];
    $Store_Location = $_POST['inputStoreLocation'];
    $store = $store -> inputStore_Info($Store_Name, $Store_Location);
}

if (isset($_POST['input_admin_store_product'])) {
    $Store_ID = $_POST['inputStoreID'];
    $Prod_ID = $_POST['inputStoreProdID'];
    $store = $store -> inputStore_Product($Store_ID, $Prod_ID);
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
                <a href="?controller=product&action=adminstore">Stores</a>
            </div>
            
        </div>
        <div class="admin user">
            <h3>Add a Store</h3>
            <form method="POST">
            <p id="first_name">Name</p>
            <input type="text" name="inputStoreName">
            <p id="first_name">Location</p>
            <input type="text" name="inputStoreLocation">
            <button type="submit" id="search" name="input_admin_store">Add</button>
            </form>
            <h3>Associate a Store and Product</h3>
            <form method="POST">
                <p id="first_name">Store ID</p>
                <input type="text" name="inputStoreID">
                <p id="first_name">Product ID</p>
                <input type="text" name="inputStoreProdID">
                <button type="submit" id="search" name="input_admin_store_product">Add</button>
            </form>
            <h3>Search Store(s)</h3>
            <form action="" method="POST">
                <p id="first_name">Name</p>
                <input type="search" name="searchAdminStore">
                <button type="submit" id="search" name="search_admin_stores">Search</button>
            </form>
        </div>
        <h3>Result for <?php echo (isset($_POST['searchAdminStore']) ? $_POST['searchAdminStore'] : 'None') ?></h3>

        <form action="" method="POST">
            <table>
                <tr>
                    <th>Store ID</th>
                    <th>Store Name</th>
                    <th>Store Location</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Manufacturer Price</th>
                    <th>Image</th>
                </tr>
                <?php
          
                if(isset($_POST['search_admin_stores'])) {
                foreach($store as $s) {
                    echo '<tr>
                        <td width=100 heigth=100><input type="text" value="'. $s -> Store_ID .'" readonly></td>
                        <td width=100 heigth=100><input type="text" value="'. $s -> Store_Name .'"></td>
                        <td width=100 heigth=100><input type="text" value="'. $s -> Store_Location .'"></td>
                        <td><input type="text" value="'. $s -> Prod_ID .'" readonly></td>
                        <td width=100 heigth=100><input type="text" value="'. $s -> Prod_Name .'"></td>
                        <td width=100 heigth=100><input type="text" value="'. $s -> Prod_Manufacturer_Price .'"></td>
                        <td><img src="'. $s -> Prod_Image_Path .'" width=100 heigth=100></td>
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
