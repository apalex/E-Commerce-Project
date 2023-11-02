<?php

include_once "mysqldatabase.php";

class User {
    public $U_ID;
    public $U_Email;
    public $U_Pass;
    public $F_Name;
    public $L_Name;
    public $Phone_Num;
    public $Created_On;
    public $Modified_On;
    public $Is_User_Admin;

    function __construct($id = -1) {
        global $conn;

        $this -> $U_ID = $id;
        if ($id < 0) {
            $this -> $U_Email = "";
            $this -> $U_Pass = "";
            $this -> $F_Name = "";
            $this -> $L_Name = "";
            $this -> $Phone_Num = 0;
            $this -> $Created_On = null;
            $this -> $Modified_On = null;
            $this -> $Is_User_Admin = false;
        } else {
            $sql = "SELECT * FROM `User_Info` WHERE `U_ID` = " . $id;
            $result = $conn -> query($sql);

            $data = $result -> fetch_assoc();

            $this -> $U_ID = $id;
            $this -> $U_Email = $data['U_Email'];
            $this -> $U_Pass = $data['U_Pass'];
            $this -> $F_Name = $data['F_Name'];
            $this -> $L_Name = $data['L_Name'];
            $this -> $Phone_Num = $data['Phone_Num'];
            $this -> $Created_On = $data['Created_On'];
            $this -> $Modified_On = $data['Modified_On'];
            $this -> $Is_User_Admin = $data['Is_User_Admin'];
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
            $user -> U_Email = $row['U_Email'];
            $user -> U_Pass = $row['U_Pass'];
            $user -> F_Name = $row['F_Name'];
            $user -> L_Name = $row['L_Name'];
            $user -> Phone_Num = $row['Phone_Num'];
            $user -> Created_On = $row['Created_On'];
            $user -> Modified_On = $row['Modified_On'];
            $user -> Is_User_Admin = $row['Is_User_Admin'];

            array_push($list, $user);
        }
        return $list;
    }

    function updateEmail($id, $U_Email) {
        global $conn;
        
        $sql = "UPDATE `User_Info` SET `U_Email` = `$U_Email` WHERE `User_Info` . `U_ID` = $id;";
        $conn = query($sql);

        var_dump($conn -> $error);
    }

    function updatePassword($id, $U_Pass) {
        global $conn;

        $sql = "UPDATE `User_Info` SET `U_Pass` = `$U_Pass` WHERE `User_Info` . `U_ID` = $id;";
        $conn = query($sql);

        var_dump($conn -> $error);
    }

    function updateEditUser($id, $F_Name, $L_Name, $Phone_Num) {
        global $conn;
        
        $sql = "UPDATE `User_Info` SET `F_Name` = `$F_Name`, `L_Name` = `$L_Name`, `Phone_Num` = `$Phone_Num` WHERE `User_Info` . `U_ID` = $id;";
        $conn = query($sql);

        var_dump($conn -> $error);
    }

    function updateUser($id, $U_Email, $U_Pass, $F_Name, $L_Name, $Phone_Num, $Created_On, $Modified_On, $Is_User_Admin) {
        global $conn;

        $sql = "UPDATE `User_Info` SET `U_Email` = `$U_Email`, `U_Pass` = `$U_Pass`, `F_Name` = `$F_Name`, `L_Name` = `$L_Name`, `Phone_Num` = `$Phone_Num`, `Created_On` = `$Created_On`, `Modified_On` = `$Modified_On`, `Is_User_Admin` = `$Is_User_Admin` WHERE `User_Info` . `U_ID` = $id;";
        $conn = query($sql);

        var_dump($conn -> $error);
    }

    function insertUser($U_Email, $U_Pass, $F_Name, $L_Name, $Phone_Num, $Created_On, $Modified_On, $Is_User_Admin) {
        global $conn;
        
        $sql = "INSERT INTO `User_Info` (`U_Email`, `U_Pass`, `F_Name`, `L_Name`, `Phone_Num`, `Created_On`, `Modified_On`, `Is_User_Admin`) VALUES (`$U_Email`, `$U_Pass`, `$F_Name`, `$L_Name`, `$Phone_Num`, `$Created_On`, `$Modified_On`, `$Is_User_Admin`);";
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