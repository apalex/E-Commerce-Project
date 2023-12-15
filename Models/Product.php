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
    public $Comments_List;

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
            $pc = new Comments();
            $this -> Comments_List = $pc -> listProdComments($id);
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

    function updateProduct($Prod_ID, $Prod_Name, $Prod_Client_Price, $Prod_Manufacturer_Price, $Prod_Details, $Prod_Comments, $Prod_Stock, $Prod_Category) {
        global $conn;

        $sql = "UPDATE `Product_Info` SET `Prod_Name` = '$Prod_Name', `Prod_Client_Price` = $Prod_Client_Price, `Prod_Manufacturer_Price` = $Prod_Manufacturer_Price, `Prod_Details` = '$Prod_Details', `Prod_Comments` = '$Prod_Comments', `Prod_Stock` = $Prod_Stock, `Prod_Category` = '$Prod_Category' WHERE `Prod_ID` = $Prod_ID;";
        $conn = query($sql);
    }

    function insertProduct($Prod_Name, $Prod_Client_Price, $Prod_Manufacturer_Price, $Prod_Details, $Prod_Comments, $Prod_Stock, $Prod_Category, $Prod_Image_Path) {
        global $conn;
        $sql = "INSERT INTO `product_info` (`Prod_Name`, `Prod_Client_Price`, `Prod_Manufacturer_Price`, `Prod_Details`, `Prod_Comments`, `Prod_Stock`, `Prod_Category`, `Prod_Image_Path`) VALUES ('$Prod_Name', $Prod_Client_Price, $Prod_Manufacturer_Price, '$Prod_Details', '$Prod_Comments', $Prod_Stock, '$Prod_Category', '$Prod_Image_Path')";
        $conn -> query($sql);
    }

    function deleteProduct($id) {
        global $conn;

        $sql = "DELETE FROM `Product_Info` WHERE `Prod_ID` = `$id`;";
        $conn = query($sql);

        var_dump($conn -> $error);
    }

    function addComment($p_id,$u_id,$comment){
        global $conn;

        $sql = "INSERT INTO `Product_Comments` (Prod_ID,U_ID,COMMENT) VALUES ('$p_id','$u_id','$comment');";
        $conn -> query($sql);


    }
    
    function searchProducts($search){
        global $conn;
        $list = array();

        $sql = "SELECT * FROM `Product_Info` WHERE Prod_Name LIKE '%$search%'";
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


    function cartQuan(){
        $cartQuan = array();
        if(isset($_SESSION["cart"])){
            $cartQuan = $_SESSION["cart"];
        }
        
        return $cartQuan;
    }

    function listCart($cartQuan){
        $cartList = array();
        if(isset($_SESSION["cart"])){
         
        

        $cartKeys = array_keys($_SESSION["cart"]);
        
        $cartList = array();

            global $conn;

        foreach($cartKeys as $k){
            $sql = "SELECT * FROM `Product_Info` WHERE `Prod_ID` = " . $k;
            $result = $conn -> query($sql);
            $row = $result -> fetch_assoc();
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

            array_push($cartList, $product);
        }
    }
        return $cartList;
    }

    function listNewArrivals($start, $rows) {
        global $conn;
        $list = array();

        $sql = "SELECT * FROM `Product_Info` ORDER BY `Prod_ID` DESC LIMIT $start, $rows;";
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

    function listOldest($start, $rows) {
        global $conn;
        $list = array();

        $sql = "SELECT * FROM `Product_Info` ORDER BY `Prod_ID` ASC LIMIT $start, $rows;";
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

    function listAlphabetical($start, $rows) {
        global $conn;
        $list = array();

        $sql = "SELECT * FROM `Product_Info` ORDER BY `Prod_Name` ASC LIMIT $start, $rows;";
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

    function listHightoLow($start, $rows) {
        global $conn;
        $list = array();

        $sql = "SELECT * FROM `Product_Info` ORDER BY `Prod_Client_Price` DESC LIMIT $start, $rows;";
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

    function listLowtoHigh($start, $rows) {
        global $conn;
        $list = array();

        $sql = "SELECT * FROM `Product_Info` ORDER BY `Prod_Client_Price` ASC LIMIT $start, $rows;";
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

    function listAllCategories($start, $rows) {
        global $conn;
        $list = array();

        $sql = "SELECT * FROM `Product_Info` ORDER BY `Prod_Category` LIMIT $start, $rows;";
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

    function searchCategories() {
        global $conn;
        $list = array();

        $sql = "SELECT DISTINCT `Prod_Category` FROM `Product_Info`;";
        $result = $conn -> query($sql);
        while ($row = $result -> fetch_assoc()) {
            $product = new Product();
            $product -> Prod_ID = '';
            $product -> Prod_Name = '';
            $product -> Prod_Client_Price = '';
            $product -> Prod_Manufacturer_Price = '';
            $product -> Prod_Details = '';
            $product -> Prod_Comments = '';
            $product -> Prod_Stock = '';
            $product -> Prod_Category = $row['Prod_Category'];
            $product -> Prod_Image_Path = '';

            array_push($list, $product);
        }
        return $list;
    }

    function searchCategory($category, $start, $rows) {
        global $conn;
        $list = array();

        $sql = "SELECT * FROM `Product_Info` WHERE `Prod_Category` = '$category' LIMIT $start, $rows;";
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

    function randomProduct() {
        global $conn;
        $list = array();

        $sql = "SELECT * FROM `Product_Info` ORDER BY RAND() LIMIT 1;";
        $result = $conn -> query($sql);
        $row = $result -> fetch_assoc();
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

        return $list;
    }

}

class Discount {
    public $Discount_ID;
    public $Prod_ID;
    public $Discount_Percentage;
    public $Discount_Usage;

    function __construct($id = -1) {
        global $conn;

        $this -> Discount_ID = $id;

        if ($id < 0) {
            $this -> Prod_ID = 0;
            $this -> Discount_Eliglibility = false;
            $this -> Discount_Percentage = 0;
            $this -> Discount_Usage = 0;
        } else {
            $sql = "SELECT * FROM `Discount` WHERE `Discount_ID` = " . $id;
            $result = $conn -> query($sql);

            $data = $result -> fetch_assoc();

            $this -> Discount_ID = $id;
            $this -> Prod_ID = $data['Prod_ID'];
            $this -> Discount_Percentage = $data['Discount_Percentage'];
            $this -> Discount_Usage = $data['Discount_Usage'];
        }
    }

    function listDiscounts() {
        global $conn;
        $list = array();

        $sql = "SELECT * FROM `Discount`";
        $result = $conn -> query($sql);

        while ($row = $result -> fetch_assoc()) {
            $discount = new Discount();
            $discount -> Discount_ID = $row['Discount_ID'];
            $discount -> Prod_ID = $row['Prod_ID'];
            $discount -> Discount_Percentage = $row['Discount_Percentage'];
            $discount -> Discount_Usage = $row['Discount_Usage'];

            array_push($list, $discount);
        }
        return $list;
    }

    function insertDiscount($id, $Prod_ID, $Discount_Percentage, $Discount_Usage) {
        global $conn;
        
        $sql = "INSERT INTO `Discount` (`Discount_ID`, `Prod_ID`, `Discount_Percentage`, `Discount_Usage`) VALUES (`$id`, `$Prod_ID`, `$Discount_Percentage`, `$Discount_Usage`);";
        $conn = query($sql);

        var_dump($conn -> $error);
    }

    function updateDiscount($Prod_ID, $Discount_Percentage, $Discount_Usage) {
        global $conn;
    
        $sql = "UPDATE `Discount` SET `Prod_ID` = `$Prod_ID`, `Discount_Percentage` = `$Discount_Percentage`, `Discount_Usage` = `$Discount_Usage`;";
        $conn =  query($sql);

        var_dump($conn -> $error);
    }

    function deleteDiscount($id) {
        global $conn;
    
        $sql = "DELETE FROM `Discount` WHERE `Discount_ID` = `$id`;";

        $conn = query($sql);

        var_dump($conn -> $error);
    }

    function searchDiscount($search){
        global $conn;
        $list = array();

        $sql = "SELECT * FROM `Discount` WHERE Discount_ID = '$search';";
        $result = $conn -> query($sql);

        $row = $result -> fetch_assoc();
        $discount = new Discount();
        $discount -> Discount_ID = $row['Discount_ID'];
        $discount -> Prod_ID = $row['Prod_ID'];
        $discount -> Discount_Percentage = $row['Discount_Percentage'];
        $discount -> Discount_Usage = $row['Discount_Usage'];

        array_push($list, $discount);

        return $list;
    }

}


    class Comments{
        public $prod_comment_id;
        public $prod_id;
        public $u_id;
        public $comment;

        function __construct($id = -1){
            global $conn;

            $this -> prod_comment_id = $id;
            if($id<0){
                $this -> prod_comment_id = 0;
                $this -> prod_id = 0;
                $this -> u_id = 0;
                $this -> comment = "";
            }else{
            $sql = "SELECT * FROM Product_Comments WHERE `prod_comment_id` = $id";
            
            $result = $conn -> query($sql);
            
            $data = $result -> fetch_assoc();

            $this -> prod_comment_id = $data['prod_comment_id'];
            $this -> prod_id = $data['prod_id'];
            $this -> u_id = $data['u_id'];
            $this -> comment = $data['prod_comment_id'];
            }
        }

        function listProdComments($prod_id){
            global $conn;
            $list = array();
            $sql = "SELECT * FROM Product_Comments WHERE `Prod_id` = $prod_id";
            
            $result = $conn -> query($sql);
            
            while($row = $result -> fetch_assoc()){
                $comm = new Comments();
                
                $comm -> prod_comment_id = $row['Prod_Comment_Id'];
                $comm -> prod_id = $row['Prod_ID'];
                $comm -> u_id = $row['U_ID'];
                $comm -> comment = $row['COMMENT'];

                array_push($list,$comm);
            }
            return $list;
        }
    }

?>
