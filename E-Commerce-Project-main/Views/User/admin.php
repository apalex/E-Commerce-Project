<?php
include "mysqldatabase.php";

session_start();

$user = new User();

if(isset($_POST['search_button'])) {
    $query = $_POST['search'];
    $userList = $user -> searchUser($query);
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
                <a href="">Stores</a>
            </div>
        </div>
        <div class="admin user">
            <h3>Search User</h3>
            <form action="" method="POST">
                <p id="first_name">User or Email</p>
                <input type="search" name="search">
                <button type="submit" id="search" name="search_button">Search</button>
            </form>
            <h3>Result</h3>
            <form action="" method="POST">
                <p id="first_name">First Name</p>
                <p id="last_name">Last Name</p>
                <div class="stack-input first">
                    <input type="text" name="F_Name" id="F_Name" value="<?php echo $userList -> F_Name ?>">
                </div>
                <div class="stack-input second">
                    <input type="text" name="L_Name" id="L_Name" value="<?php echo $userList -> L_Name ?>">
                </div>
                <p id="email">Email</p>
                <p id="phone">Phone</p>
                <div class="stack-input third">
                    <input type="text" name="U_Email" id="U_Email" value="<?php echo $userList -> U_Email?>">
                </div>
                <div class="stack-input fourth">
                    <input type="text" name="Phone_Num" id="Phone_Num" value="<?php echo $userList -> Phone_Num?>">
                </div>
                <p>Password</p>
                <input type="text" name="U_Pass" id="U_Pass" value="<?php echo $userList -> U_Pass?>"><br>
                <p>User ID</p>
                <input type="text" name="U_ID" id="U_ID" value="<?php echo $userList -> U_ID ?>" readonly>
                <h3>Permissions</h3>
                <p>Role</p>
                <input type="text" name="Role_Name" id="Role_name" value="<?php echo $userList -> Role_ID?>">
                <button type="submit" id="save-changes">Save</button>
            </form>
        </div>
    </div>


<script src="app.js"></script>

</body>
</html>
