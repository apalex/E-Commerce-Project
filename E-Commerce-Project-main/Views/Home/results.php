

<?php
include "mysqldatabase.php";



include_once "navbar.php";

$prod = new Product();

$search = $_POST['search'];

$prodsearch = $prod -> searchProducts($search);



    foreach($prodsearch as $p){
        echo "<img src= '". $p->Prod_Image_Path ."' height='75' width='75'>";
        echo"<a href='?controller=product&action=view&id=". $p-> Prod_ID."'>" . $p-> Prod_Name . "</a> <br>";
        }
?>

<html>
    <head>
    <link rel="stylesheet" href="styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
</html>