

<?php
include "mysqldatabase.php";

$prod = new Product();

$search = $_POST['search'];

$prodsearch = $prod -> searchProducts($search);



    foreach($prodsearch as $p){
        echo "<img src= '". $p->Prod_Image_Path ."' height='75' width='75'>";
        echo"<a href='?controller=product&action=view&id=". $p-> Prod_ID."'>" . $p-> Prod_Name . "</a> <br>";
        }
?>