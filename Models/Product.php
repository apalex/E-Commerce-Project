<?php

include_once "mysqldatabase.php";

class Product {
    public $Prod_ID;
    public $Prod_Name;
    public $Prod_Client_Price;
    public $Prod_Manufacturer_Price;
    public $Prod_Details;
    public $Prod_Comments;
    public $Prod_Stock;
    public $Prod_Category;
    public $Prod_Image_Path;

    function __construct($id = -1) {
        global $conn;

        $this -> Prod_ID = $id;
        if ($id < 0) {
            $this -> Prod_Name = "";
            $this -> Prod_Client_Price = 0;
            $this -> Prod_Manufacturer_Price = 0;
            $this -> Prod_Details = "";
            $this -> Prod_Comments = "";
            $this -> Prod_Stock = 0;
            $this -> Prod_Category = "";
            $this -> Prod_Image_Path = "";
        } else {
            $sql = "SELECT * FROM `product_info` WHERE `Prod_ID` = " . $id;
            $result = $conn -> query($sql);

            $data = $result -> fetch_assoc();

            $this -> Prod_ID = $id;
            $this -> Prod_Name = $data['Prod_Name'];
            $this -> Prod_Client_Price = $data['Prod_Client_Price'];
            $this -> Prod_Manufacturer_Price = $data['Prod_Manufacturer_Price'];
            $this -> Prod_Details = $data['Prod_Details'];
            $this -> Prod_Comments = $data['Prod_Comments'];
            $this -> Prod_Stock = $data['Prod_Stock'];
            $this -> Prod_Category = $data['Prod_Category'];
            $this -> Prod_Image_Path = $data['Prod_Image_Path'];
        }
    }

    public static function listProducts() {
        global $conn;
        $list = array();

        $sql = "SELECT * FROM `Product_Info`";
        $result = $conn -> query($sql);

        while ($row = $result -> fetch_assoc()) {
            $product = new Product();
            $product -> Prod_ID = $row['Prod_ID'];
            $product -> Prod_Name = $row['Prod_Name'];
            $product -> Prod_Client_Price = $row['Prod_Client_Price'];
            $product -> Prod_Manufacturer_Price = $row['Prod_Manufacturer_Price'];
            $product -> Prod_Details = $row['Prod_Details'];
            $product -> Prod_Comments = $row['Prod_Comments'];
            $product -> Prod_Stock = $row['Prod_Stock'];
            $product -> Prod_Category = $row['Prod_Category'];
            $product -> Prod_Image_Path = $row['Prod_Image_Path'];

            array_push($list, $product);
        }
        return $list;
    }

    function updateProduct($id, $Prod_Name, $Prod_Client_Price, $Prod_Manufacturer_Price, $Prod_Details, $Prod_Comments, $Prod_Stock, $Prod_Category, $Prod_Image_Path) {
        global $conn;

        $sql = "UPDATE `Product_Info` SET `Prod_Name` = `$Prod_Name`, `Prod_Client_Price` = `$Prod_Client_Price`, `Prod_Manufacturer_Price` = `$Prod_Manufacturer_Price`, `Prod_Details` = `$Prod_Details`, `Prod_Comments` = `$Prod_Comments`, `Prod_Stock` = `$Prod_Stock`, `Prod_Category` = `$Prod_Category`, `Prod_Image_Path` = `$Prod_Image_Path` WHERE `Product_Info` . `Prod_ID` = $id;";
        $conn = query($sql);

        var_dump($conn -> $error);
    }

    function insertProduct($Prod_Name, $Prod_Client_Price, $Prod_Manufacturer_Price, $Prod_Details, $Prod_Comments, $Prod_Stock, $Prod_Category, $Prod_Image_Path) {
        global $conn;
        
        $sql = "INSERT INTO `Product_Info` (`Prod_Name`, `Prod_Client_Price`, `Prod_Manufacturer_Price`, `Prod_Details`, `Prod_Comments`, `Prod_Stock`, `Prod_Category`, `Prod_Image_Path`) VALUES (`$Prod_Name`, `$Prod_Client_Price`, `$Prod_Manufacturer_Price`, `$Prod_Details`, `$Prod_Comments`, `$Prod_Stock`, `$Prod_Category`, `$Prod_Image_Path`);";
        $conn = query($sql);

        var_dump($conn -> $error);
    }

    function deleteProduct($id) {
        global $conn;

        $sql = "DELETE FROM `Product_Info` WHERE `Prod_ID` = `$id`;";
        $conn = query($sql);

        var_dump($conn -> $error);
    }

}

?>
