
<?php
    session_start();
    $user = $data[0];
    $uID = $_SESSION['id'];

    if(isset($_POST['submit'])){
        
            $user -> update($user,$uID);
    }
    
    if(isset($_POST['log_sub'])){
        unset($_SESSION['id']);
        header('Location: ?controller=home&action=index');
    }

?>


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
        <div class="container account">
            <div class="account info">
                <h4>Manage my Account</h4>
                <div class="stack 1">
                    <a href="?controller=user&action=myaccount">My Profile</a>
                    <a href="?controller=user&action=editAddress&id=<?php echo $uID ?>">Address Book</a>
                    <a href="?controller=user&action=editPayment">My Payment Options</a>
                </div>
                <h4>My Orders</h4>
                <div class="stack 2">
                    <a href="?controller=user&action=myreturns">My Returns</a>
                    <a href="?controller=user7action=mycancel">My Cancellations</a> 
                </div>
            </div>
            <div class="account edit">
                <h3>Edit Your Profile</h3>
                <form action="" method="POST">
                    <p id="first_name">First Name</p>
                    <p id="last_name">Last Name</p>
                    <div class="stack-input first">
                        <input type="text" name="F_Name" id="F_Name" placeholder="<?php echo $user->F_Name ?>">
                    </div>
                    <div class="stack-input second">
                        <input type="text" name="L_Name" id="L_Name" placeholder="<?php echo $user->L_Name ?>">
                    </div>
                    <p id="email">Email</p>
                    <p id="phone">Phone(Optional)</p>
                    <div class="stack-input third">
                        <input type="text" name="U_Email" id="U_Email" placeholder="<?php echo $user->U_Email ?>">
                    </div>
                    <div class="stack-input fourth">
                        <input type="text" name="Phone_Num" id="Phone_Num" placeholder="<?php echo $user->Phone_Num ?>">
                    </div>
                    <p>Change Password</p>
                    <label for="">Current password: <?php echo $user->U_Pass ?></label><br>
                    <input type="password" name="new_pass" id="New_Pass" placeholder="New Password"><br>
                    <input type="password" name="c_new_pass" id="New_Pass_Conf" placeholder="Confirm New Password"><br>
                    <button type="submit" id="cancel-profile">Cancel</button>
                    <button type="submit" name="submit" id="save-profile">Save Changes</button>
                </form>
                <br><br>
                <form action="" method="POST">
                        <button type="submit" name="log_sub">Log out</button>
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