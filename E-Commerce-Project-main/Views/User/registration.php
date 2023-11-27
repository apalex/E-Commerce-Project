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
        <div class="container registration">
            <h1>Create an Account</h1><br>
            <h5>Enter your details below</h5><br>
            <div class="registration form">
                <form action="?controller=user&action=insert" method="POST">
                    <input type="text" name="F_NAME" id="" placeholder="First Name" required><br><br>
                    <input type="text" name="L_NAME" id="" placeholder="Last Name" required><br><br>
                    <input type="text" name="EMAIL" id="" placeholder="Email" required><br><br>
                    <input type="password" name="PASSWD" id="" placeholder="Password" required><br><br>
                    <input type="password" name="C_PASSWD" id="" placeholder="Confirm Password" required><br><br><br>
                    <button type="submit">Create Account</button>
                    <p>Already have an account? <a href="?controller=user&action=login">Login In</a></p>
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
