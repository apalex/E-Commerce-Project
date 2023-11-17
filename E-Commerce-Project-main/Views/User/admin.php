<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop all your electronic needs and save big! | ABDGameStore.com</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
    include_once 'navbar.php';
    ?>

    <div class="wrapper">
        <div class="container admin">
            <div class="admin categories">
                <div class="admin categories selection">
                    <a href="">Users</a>
                    <a href="">Products</a>
                    <a href="">Stores</a>
                    <a href="">Discount</a>
                </div>
            </div>
            <div class="admin user">
                <h3>Search User</h3>
                <form action="">
                    <p id="first_name">User or Email</p>
                    <input type="text" id="">
                    <button type="submit" id="search">Search</button>
                </form>
                <h3>Result</h3>
                <form action="">
                    <p id="first_name">First Name</p>
                    <p id="last_name">Last Name</p>
                    <div class="stack-input first">
                        <input type="text" name="F_Name" id="F_Name" placeholder="SQL F_Name Here">
                    </div>
                    <div class="stack-input second">
                        <input type="text" name="L_Name" id="L_Name" placeholder="SQL L_Name Here">
                    </div>
                    <p id="email">Email</p>
                    <p id="phone">Phone</p>
                    <div class="stack-input third">
                        <input type="text" name="U_Email" id="U_Email" placeholder="SQL U_Email Here">
                    </div>
                    <div class="stack-input fourth">
                        <input type="text" name="Phone_Num" id="Phone_Num" placeholder="SQL Phone_Num Number Here">
                    </div>
                    <p>Change Password</p>
                    <input type="text" name="U_Pass" id="U_Pass" placeholder="Password"><br>
                    <p>User ID</p>
                    <input type="text" name="U_ID" id="U_ID" placeholder="U_ID">
                    <h3>Permissions</h3>
                    <p>Role_Name</p>
                    <input type="text" name="Role_Name" id="Role_name" placeholder="Role_Name">
                    <button type="submit" id="save-changes">Save</button>
                </form>
            </div>
        </div>
        <div class="push">
        </div>
    </div>

    <?php
    include_once 'footer.php';
    ?>

<script src="app.js"></script>

</body>
</html>
