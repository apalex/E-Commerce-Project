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
        <div class="container login">
            <h1>Login in</h1><br>
            <h5>Enter your details below</h5><br>
            <div class="login form">
                <form action="?controller=user&action=logged" method="POST">
                    <input type="text" name="EMAIL" placeholder="Email" required><label id="error-login">ERROR HERE</label><br><br>
                    <input type="password" name="PASSWD" placeholder="Password" required><label id="error-login">ERROR HERE</label><br><br>
                    <button name = 'submit' type="submit">Log in</button>
                    <?php                
                    if(isset($data['email'])){
                        echo "<p>Email is Invalid</p>";
                    }
                    if(isset($data['password'])){
                        echo "<p>Password is Invalid</p>";
                    }
                    ?>
                    <a href="?controller=home&action=contact">Forgot Password?</a>
                    <br>
                    <a href="?controller=user&action=registration">Dont have an account?</a>
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

