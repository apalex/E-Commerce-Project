
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
        <div class="container checkout">
            <div class="checkout location">
                <p><a href="?controller=user&action=myaccount&id=<?php echo $_SESSION['id']; ?>">Account</a> / <a href="?controller=product&action=cart">View Cart</a> / <b>Checkout</b></p>
            </div>
            <?php $user = $data[2]?>
            <div class="checkout box">
                

                    <div class="checkout details">
                        <h1>Shipping Details</h1>
                        <!-- <h3>Information:<h3> -->
                       <h4>Name:</h4>
                        <p><?php echo $user -> F_Name . " "; echo $user -> L_Name;?></p>
                       
                        <h4>Address:</h4>
                       <?php
                       $addList = $user -> address_list;
                      
                      if($addList[0] -> address != null){
                        foreach($addList as $al){
                            if($al -> address != null){
                            echo'
                            <input type= "radio" class= "checkout radio"name = "address' .$al->UA_ID.'"></input>
                            <p>Address: '. $al -> address .'</p>
                            <p>'. $al -> city .'</p>
                            <p>'. $al -> postal .'</p>
                            <p>'. $al -> country .'</p>
                            
                            ';
                            }
                            
                        }
                    }else{
                        echo '<a href="?controller=user&action=editAddress&id='.$_SESSION['id'].'"> Please fill out at least one address </a>';
                    }

                       ?> 
                       
                        

                       
                    </div>
                    <div class="checkout products-total">
                        <div class="product-scroll-box">
                           

                        <?php 

                         $cartQuan = $data[0];
                         $cartList = $data[1]; 
                $subTotal = 0;
                
                foreach($cartList as $cl) {
                    $quantity = $cartQuan[$cl ->Prod_ID];
                    $price = $cl -> Prod_Client_Price;
                    $price *= $quantity;
                    $discount = $data[3];
                    $price *= $discount;
                    $subTotal += $price; 
                    $tax = $subTotal *.15;
                    $total = $subTotal *1.15;
                    
                    echo '
                   
                    <div class="product checkout box">
                                <div class="checkout product-info">
                                    <img src="' . $cl -> Prod_Image_Path .'">
                                    <p id="product-name-checkout">'. $cl -> Prod_Name . '</p>
                                    <p id="product-price-checkout">$'. $subTotal .'</p>
                                </div>
                            </div>
                   
                    ';
                }
                
                ?>

                        </div>
              
                        <div class="checkout total-sub">
                            <p id="product-left-total">Subtotal:</p>
                            <p id="product-right-money">$<?php echo $subTotal?></p>
                        </div>
                        <div class="checkout total-ship">
                            <p id="product-left-total">Shipping:</p>
                            <p id="product-right-money">Free</p>
                        </div>
                        <div class="checkout total-amt">
                            <p id="product-left-total">Total:</p>
                            <p id="product-right-money">$<?php echo $total?></p>
                        </div>

                        <form action="?controller=user&action=paymentdetails" method="POST">
                            <input type= "hidden" name="total" value="<?php echo $total?>">
                        <button type="submit" id="Place-Order">Proceed to Payment Details</button>
                        </form>
                    </div>
             
            </div>
        </div>
        <div class="push">
        </div>
    </div>

            <?php
                       
        // foreach($pList as $d){
        // echo"<a href='?controller=product&action=view&id=". $d-> Prod_ID."'>" . $d-> Prod_Name . "</a> <br>";
        // }
                    ?>
            


    <?php
    include_once 'footer.php';
    ?>

<script src="app.js"></script>

</body>
</html>
