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
                    <a href="">Address Book</a>
                    <a href="">My Payment Options</a>
                </div>
                <h4>My Orders</h4>
                <div class="stack 2">
                    <a href="">My Returns</a>
                    <a href="">My Cancellations</a>
                </div>
            </div>
            <div class="account address">
                <h3>Edit Your Address</h3>
                <form action="">
                    <p id="Address_One">Address 1</p>
                    <p id="city_1">City</p>
                    <div class="stack-input first">
                        <input type="text" name="Address_1" id="Address_1" placeholder="SQL Address_1 Here">
                    </div>
                    <div class="stack-input second">
                        <input type="text" name="City" id="City" placeholder="SQL City Here">
                    </div>
                    <p id="Address_Two">Address 2</p>
                    <p id="zip">Zip Code</p>
                    <div class="stack-input third">
                        <input type="text" name="Address_2" id="Address_2" placeholder="SQL Address_2 Here">
                    </div>
                    <div class="stack-input fourth">
                        <input type="text" name="Zip_Code" id="Zip_Code" placeholder="SQL Zip_Code Here">
                    </div>
                    <p>Countries</p>
                    <div class="stack-input five">
                        <select id="countries">
                            <option disabled selected>-- Select a Country --</option>
                        </select>
                    </div>
                    <button type="submit" id="cancel-profile">Cancel</button>
                    <button type="submit" id="save-profile">Save Changes</button>
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
