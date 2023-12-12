<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop all your electronic needs and save big! | ABDGameStore.com</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <?php
    include_once 'navbar.php';
    ?>

    <div class="wrapper">
        <div class="container registration">
            <h1>Create an Account</h1><br>
            <h5>Enter your details below</h5><br>
            <div class="registration form">
                <form action="?controller=user&action=insert" method="POST" id="registrationForm" autocomplete="off">
                    <input type="text" name="F_NAME" id="f_nameRegister" placeholder="First Name" required><label class="error-registration">ERROR HERE</label><br><br>
                    <input type="text" name="L_NAME" id="l_nameRegister" placeholder="Last Name" required><label class="error-registration">ERROR HERE</label><br><br>
                    <input type="text" name="EMAIL" id="emailRegister" placeholder="Email" required><label class="error-registration">ERROR HERE</label><br><br>
                    <input type="password" name="PASSWD" id="passwdRegister" placeholder="Password" required><label display="true" class="error-registration">ERROR HERE</label><br><br>
                    <input type="password" name="C_PASSWD" id="" placeholder="Confirm Password" required><label class="error-registration">ERROR HERE</label><br><br><br>
                    <?php 
                    if(isset($_SESSION['errors'])){
                        $errors = $_SESSION['errors'];
                        foreach($errors as $e){
                            echo"<p><FONT COLOR='RED'>$e</p>";
                        }
                    }
                    ?>
                    <button type="submit">Create Account</button>
                    <p><FONT COLOR='BLACK'>Already have an account? <a href="?controller=user&action=login">Login In</a></p>
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
