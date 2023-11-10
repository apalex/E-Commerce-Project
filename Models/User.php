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

    function updateEditUser($id, $F_Name, $L_Name, $Phone_Num) {
        global $conn;
        
        $sql = "UPDATE `User_Info` SET `F_Name` = `$F_Name`, `L_Name` = `$L_Name`, `Phone_Num` = `$Phone_Num` WHERE `User_Info` . `U_ID` = $id;";
        $conn = query($sql);

        var_dump($conn -> $error);
    }

    function updateUser($id, $Role_ID, $U_Email, $U_Pass, $F_Name, $L_Name, $Phone_Num, $Created_On, $Modified_On) {
        global $conn;

        $sql = "UPDATE `User_Info` SET `Role_ID` = `$Role_ID`, `U_Email` = `$U_Email`, `U_Pass` = `$U_Pass`, `F_Name` = `$F_Name`, `L_Name` = `$L_Name`, `Phone_Num` = `$Phone_Num`, `Created_On` = `$Created_On`, `Modified_On` = `$Modified_On` WHERE `User_Info` . `U_ID` = $id;";
        $conn = query($sql);

        var_dump($conn -> $error);
    }

    function insertUser($Role_ID, $U_Email, $U_Pass, $F_Name, $L_Name, $Phone_Num, $Created_On, $Modified_On) {
        global $conn;
        
        $sql = "INSERT INTO `User_Info` (`Role_ID`, `U_Email`, `U_Pass`, `F_Name`, `L_Name`, `Phone_Num`, `Created_On`, `Modified_On`) VALUES (`$Role_ID`, `$U_Email`, `$U_Pass`, `$F_Name`, `$L_Name`, `$Phone_Num`, `$Created_On`, `$Modified_On`);";
        $conn = query($sql);

        var_dump($conn -> $error);
    }

    function deleteUser($id) {
        global $conn;

        $sql = "DELETE FROM `User_Info` WHERE `U_ID` = `$id`;";
        $conn = query($sql);

        var_dump($conn -> $error);
    }
}

?>
