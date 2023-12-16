<?php
    if (session_status() === PHP_SESSION_NONE){session_start();}
    $user = $data[0];
   
    $uID = $_SESSION['id'];
    $addList = $user -> address_list;
    
    
    
    if(isset($_POST['submit'])){
     
       $address = $_POST['Address'];
       $city = $_POST['City'];
       $postal = $_POST['Zip_Code'];
       $country = $_POST['country'];
       $AU_ID = $_POST['AU_ID'];
       
       if($address == "" || $city == "" || $postal == "" || $country == ""){
            echo "<script>alert('Please fill out all fields')</script>";
           
       }else{
        $user -> updateAddress($AU_ID,$address,$city,$postal,$country);

        
       }
    }
  
    if(isset($_POST['addButton'])){
         if(count($addList) == 3){
            echo"<script>alert('Cannot have more then 3 addresses')</script>";
        }else{
            $user -> addAddress();
        }
    }

    if(isset($_POST['delete-address'])){
        if(count($addList) == 1){
            echo"<script>alert('Must have at least one Address')</script>";
        
        }
        else{
        $user -> deleteAddress($_POST['AU_ID']);
        }
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
                    <a href="?controller=user&action=myaccount&id=<?php echo $uID?>">My Profile</a>
                    <a href="?controller=user&action=editAddress&id=<?php echo $uID ?>">Address Book</a>
                   
                </div>
                <h4>My Orders</h4>
                <div class="stack 2">
                    <a href="?controller=user&action=orderHist&id=<?php echo $uID?>">My Orders</a>
                    <a href="?controller=user&action=returns&id=<?php echo $uID?>">My Returns</a>
                    <a href="?controller=user&action=cancellations&id=<?php echo $uID?>">My Cancellations</a> 
                </div>
            </div>
            <div class="account address">
            <h3>Edit Your Address</h3>
            <?php
            if(isset($addList)){
                foreach($addList as $au){
           echo '
                
                <form action="" method="POST">
                    <p id="Address_One">Address</p>
                    <p id="city_1">City</p>
                    <div class="stack-input first">
                        <input type="text" name="Address" id="Address_1" value="' . $au->address . '">
                    </div>
                    <div class="stack-input second">
                        <input type="text" name="City" id="City" value="'. $au->city .'">
                    </div>
                    <p id="Address_Two">Zip Code</p>
                    
                    <div class="stack-input third">
                    <input type="text" name="Zip_Code" id="Zip_Code" value="'. $au->postal .'">
                    </div>
                    <div class="stack-input fourth">
                        
                    </div>
                    <p>Current country: '. $au -> country .'<p>
                    <p>Countries</p>
                    <div class="stack-input five">
                        <select id="" name ="country">
                            <option value = "" >-- Select a Country --</option>
                            <option value="Canada">Canada</option>
                            <option value="USA">USA</option>
                        </select>
                    </div>
                    <button type="submit" id="cancel-profile">Cancel</button>
                    <button type="submit" id="save-profile" name="submit">Save Changes</button>
                    <button type="submit id="delete-address" name="delete-address">Delete</button>
                    <input name="AU_ID" type="hidden" value="'. $au -> UA_ID .'"></input>
                </form>
            ';
                }
            }
            ?>
            <form action="" method="POST">
            <input type="submit" name="addButton" value="Add Address">
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
