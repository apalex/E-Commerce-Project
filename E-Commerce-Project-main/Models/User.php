<?php

include "mysqldatabase.php";

class User {
    public $U_ID;
    public $Role_ID;
    public $U_Email;
    public $U_Pass;
    public $F_Name;
    public $L_Name;
    public $Phone_Num;
    public $Created_On;
    public $Modified_On;
    public $address_list;

    function __construct($id = -1) {
        global $conn;

        
        $this -> U_ID = $id;
        if ($id < 0) {
            $this -> Role_ID = 0;
            $this -> U_Email = "";
            $this -> U_Pass = "";
            $this -> F_Name = "";
            $this -> L_Name = "";
            $this -> Phone_Num = 0;
            $this -> Created_On = null;
            $this -> Modified_On = null;
        } else {
            $sql = "SELECT * FROM `User_Info` WHERE `U_ID` = " . $id;
            $result = $conn -> query($sql);

            $data = $result -> fetch_assoc();

            $this -> U_ID = $id;
            $this -> Role_ID = $data['Role_ID'];
            $this -> U_Email = $data['U_Email'];
            $this -> U_Pass = $data['U_Pass'];
            $this -> F_Name = $data['F_Name'];
            $this -> L_Name = $data['L_Name'];
            $this -> Phone_Num = $data['Phone_Num'];
            $this -> Created_On = $data['Created_On'];
            $this -> Modified_On = $data['Modified_On'];
            $AU = new User_Address($id);
            $this -> address_list = $AU -> listAddress($id);
        }
    }

    public static function listUsers() {
        global $conn;
        $list = array();

        $sql = "SELECT * FROM `User_Info`";
        $result = $conn -> query($sql);

        while ($row = $result -> fetch_assoc()) {
            $user = new User();
            $user -> U_ID = $row['U_ID'];
            $user -> Role_ID = $row['Role_ID'];
            $user -> U_Email = $row['U_Email'];
            $user -> U_Pass = $row['U_Pass'];
            $user -> F_Name = $row['F_Name'];
            $user -> L_Name = $row['L_Name'];
            $user -> Phone_Num = $row['Phone_Num'];
            $user -> Created_On = $row['Created_On'];
            $user -> Modified_On = $row['Modified_On'];

            array_push($list, $user);
        }
        return $list;
    }

    function updateEmail($id, $U_Email) {
        global $conn;
        
        $sql = "UPDATE `user_Info` SET `U_Email` = '$U_Email' WHERE `U_ID` = $id;";
        $conn -> query($sql);

        if($conn -> connect_error) {
            die("Connection failed: " . $conn -> connect_error);
        }
    }

    function updatePassword($id, $U_Pass) {
        global $conn;

        $sql = "UPDATE `User_Info` SET `U_Pass` = '$U_Pass' WHERE`U_ID` = $id;";
        $conn -> query($sql);

        if($conn -> connect_error) {
            die("Connection failed: " . $conn -> connect_error);
        }
        
    }

    function update_fname($id, $F_Name) {
        global $conn;
        
        $sql = "UPDATE `User_Info` SET `F_Name` = '$F_Name' WHERE `U_ID` = $id;";
        $conn -> query($sql);

        if($conn -> connect_error) {
            die("Connection failed: " . $conn -> connect_error);
        }
    }


    function update_lname($id, $L_Name) {
        global $conn;
        
        $sql = "UPDATE `User_Info` SET `L_Name` = '$L_Name' WHERE `U_ID` = $id;";
        $conn -> query($sql);

        if($conn -> connect_error) {
            die("Connection failed: " . $conn -> connect_error);
        }
    }


    function update_phoneNum($id, $Phone_Num) {
        global $conn;
        
        $sql = "UPDATE `User_Info` SET `Phone_Num` = '$Phone_Num' WHERE `U_ID` = $id;";
        $conn -> query($sql);

        if($conn -> connect_error) {
            die("Connection failed: " . $conn -> connect_error);
        }
    }

    function updateUser($id, $Role_ID, $U_Email, $U_Pass, $F_Name, $L_Name, $Phone_Num, $Created_On, $Modified_On) {
        global $conn;

        $sql = "UPDATE `User_Info` SET `Role_ID` = `$Role_ID`, `U_Email` = `$U_Email`, `U_Pass` = `$U_Pass`, `F_Name` = `$F_Name`, `L_Name` = `$L_Name`, `Phone_Num` = `$Phone_Num`, `Created_On` = `$Created_On`, `Modified_On` = `$Modified_On` WHERE `User_Info` . `U_ID` = $id;";
        $conn = query($sql);

        var_dump($conn -> $error);
    }

    function update($u, $uID){
    
        if($_POST['U_Email'] != "" ){            
            $email= $_POST['U_Email'];
              // var_dump($email);
            $u -> updateEmail($uID,$email);
     
        header('Location: ?controller=user&action=myaccount&id=' . $uID);
        }
        
        if($_POST['new_pass'] != ""){
            $newpass = $_POST['new_pass'];
            $cnfrm = $_POST['c_new_pass'];
            if($newpass != $cnfrm){
                echo "<script>alert('Confirm password does not match')</script>";
            }else{
                $u-> updatePassword($uID,$newpass);
                header('Location: ?controller=user&action=myaccount&id=' . $uID);
            }

        }

        if($_POST['F_Name'] != ""){
            $fname = $_POST['F_Name'];

            $u -> update_fname($uID,$fname);
            header('Location: ?controller=user&action=myaccount&id=' . $uID);
        }

        if($_POST['L_Name'] != ""){
            $lname = $_POST['L_Name'];

            $u -> update_lname($uID,$lname);
            header('Location: ?controller=user&action=myaccount&id=' . $uID);
        }
        
        if($_POST['Phone_Num'] != ""){
            $pNum = $_POST['Phone_Num'];

            $u -> update_phoneNum($uID,$pNum);
            header('Location: ?controller=user&action=myaccount&id=' . $uID);
        }

    }

    function insertUser() {
        global $conn;

        $F_NAME = $_POST['F_NAME'];
        $L_NAME = $_POST['L_NAME'];
        $EMAIL = $_POST['EMAIL'];
        $PASSWD = $_POST['PASSWD'];
        $C_PASSWD = $_POST['C_PASSWD'];
    
        $errors = [];
        $data = [];
        // Checks if is empty and RegEx
        if (empty($F_NAME)) {
            $errors['first_name'] = "First Name is required";
        } elseif (!preg_match("#^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,}+$#", $F_NAME)) {
            $errors['first_name'] = "2 Letters minimum required for first name";
        }
        if (empty($L_NAME)) {
            $errors['last_name'] = "Last Name is required";
        } elseif (!preg_match("#^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,}+$#", $L_NAME)) {
            $errors['last_name'] = "2 Letters minimum required last name";
        }
        if (empty($EMAIL)) {
            $errors['email'] = "Email is required";
        } elseif (!filter_var($EMAIL, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format";
        }
        if (empty($PASSWD)) {
            $errors['password'] = "Password is required";
        }
        if (empty($C_PASSWD)) {
            $errors['check_password'] = "Password confirmation is required";
        }
        if(!empty($PASSWD) && !empty($C_PASSWD)) {
            if (!preg_match("#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$#", $PASSWD)) {
                $errors['password'] = "8 characters minimum, 1 uppercase letter, 1 lowercase letter, 1 special character required for password";
            } elseif ($PASSWD != $C_PASSWD) {
                $errors['check_password'] = "Passwords do not match";
            }
        }
    
        //
    
        if(!empty($errors)) {
            $data['success'] = false;
            $data['errors'] = $errors;
            
            return $data;
        } else {
           $data['success'] = true;
           return $data;
            
        }
    
    }

    function deleteUser($id) {
        global $conn;

        $sql = "DELETE FROM `User_Info` WHERE `U_ID` = `$id`;";
        $conn = query($sql);

        var_dump($conn -> $error);
    }

    function updateAddress($AU,$address,$city,$zipcode,$country){
        global $conn;
        $U_ID = $this -> U_ID;
        
        $sql = "UPDATE `User_address` SET 
        `Address_1` = '$address', 
        `City` = '$city', 
        `Zip_Code` = '$zipcode', 
        `country` = '$country'
         WHERE `UA_ID` = $AU;";

         $conn -> query($sql);
          header('Location: ?controller=user&action=editAddress&id=' . $U_ID);
         if($conn -> connect_error) {
            die("Connection failed: " . $conn -> connect_error);
        }
       
    }



    function addAddress(){
        global $conn;
        $U_ID = $this -> U_ID;

        $sql="INSERT INTO User_address (U_ID) VALUES ('$U_ID')";
        $conn -> query($sql);

        header('Location: ?controller=user&action=editAddress&id=' . $U_ID);
        if($conn -> connect_error) {
           die("Connection failed: " . $conn -> connect_error);
       }
    }

    function deleteAddress($UA_ID){
        global $conn;
        $U_ID = $this -> U_ID;

        $sql = "DELETE FROM User_address WHERE UA_ID = $UA_ID";
        $conn -> query($sql);

        header('Location: ?controller=user&action=editAddress&id=' . $U_ID);
        if($conn -> connect_error) {
           die("Connection failed: " . $conn -> connect_error);
       }
    }

    function searchUser($search) {
        global $conn;
        $list = array();


        if (is_numeric($search)) {
            $num = (int)$search;
            $sql = "SELECT * FROM `User_Info` WHERE U_ID = $num;";
        } else {
            $sql = "SELECT * FROM `User_Info` WHERE U_Email = '$search';";
        }

        $result = $conn -> query($sql);
        $row = $result -> fetch_assoc();
        $user = new User();
        $user -> U_ID = $row['U_ID'];
        $user -> Role_ID = $row['Role_ID'];
        $user -> U_Email = $row['U_Email'];
        $user -> U_Pass = $row['U_Pass'];
        $user -> F_Name = $row['F_Name'];
        $user -> L_Name = $row['L_Name'];
        $user -> Phone_Num = $row['Phone_Num'];
        $user -> Created_On = $row['Created_On'];
        $user -> Modified_On = $row['Modified_On'];

        return $user;
    }

    function searchUserRole($search) {
        global $conn;
        $sql = "SELECT P.Role_Name FROM `User_Info` U JOIN `User_Groups_Perms` P ON U.$search = P.Role_ID;";

        $result = $conn -> query($sql);

        return $result;
    }

}

class User_Address {
    public $UA_ID;
    public $U_ID;
    public $address;
    public $city;
    public $postal;
    public $country;

    function __construct($id = -1){
        global $conn;

        $this -> U_ID = $id;
        if($id < 0){
            $this -> UA_ID = 0;
            $this -> address = 0;
            $this -> city = "";
            $this -> postal = "";
            $this -> country = "";
        } else {
            $sql = "SELECT * FROM `user_address` WHERE `U_ID` = " . $id;
            $result = $conn -> query($sql);

            $data = $result -> fetch_assoc();
            $this -> UA_ID = $data["UA_ID"];
            $this -> U_ID = $id;
            $this -> address = $data["Address_1"];
            $this -> City = $data["City"];
            $this -> Zip_Code = $data["Zip_Code"];
            $this -> country = $data["Country"];
        }
    }

    public static function listAddress($id) {
        global $conn;
        $list = array();
            
        $sql = "SELECT * FROM `user_address` WHERE `U_ID` = " . $id;
        $result = $conn -> query($sql);
    
        while ($row = $result -> fetch_assoc()) {
            $user_add = new User_Address($id);
            $user_add -> UA_ID = $row["UA_ID"];
            $user_add -> U_ID = $row['U_ID'];
            $user_add -> address = $row["Address_1"];
            $user_add -> city = $row["City"];
            $user_add -> postal = $row["Zip_Code"];
            $user_add -> country = $row["Country"];
    
            array_push($list, $user_add);
        }
        return $list;
    }


}

class User_Groups_Perms {
    public $Role_ID;
    public $Role_Name;

    // public __construct($id = -1) {
    //     global $conn;
    // }

}

?>
