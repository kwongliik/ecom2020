<?php session_start(); ?>

<!DOCTYPE html>
<?php 

include("functions/functions.php");
include("includes/db.php");

?>
<html>
    <head>
        <title>My Online Shop</title>
        <link rel="stylesheet" href="styles/style.css" media="all">
    </head>
    <body>
        <!-- Main container starts here -->
        <div class="main_wrapper">

            <!-- Header starts here -->
            <div class="header_wrapper">
                <a href="index.php"><img id="logo" src="images/logo.gif"></a>
                <img id="banner" src="images/ad_banner.gif"> 
            </div>
            <!-- Header ends here -->

            <!-- Navigation bar starts -->
            <div class="menubar">
                <ul id="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="all_products.php">All Products</a></li>
                    <li><a href="customer/my_account.php">My Account</a></li>
                    <li><a href="customer_register.php">Sign Up</a></li>
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
                <div id="form">
                    <form method="get" action="results.php" enctype="multipart/form-data">
                        <input type="text" name="user_query" placeholder="Search a product" />
                        <input type="submit" name="search" value="Search" />
                    </form>
                </div>
            </div>
            <!-- Navigation bar ends -->

            <!-- Content wrapper starts -->
            <div class="content_wrapper">
                <div id="sidebar">
                    <div id="sidebar_title">Categories</div>
                    <ul id="cats">
                        <?php getCats(); ?>
                    </ul>
                    <div id="sidebar_title">Brands</div>
                    <ul id="cats">
                        <?php getBrands(); ?>
                    </ul>
                </div>
                <div id="content_area">

                <?php cart(); ?>

                    <div id="shopping_cart">
                        <span style="float:right; font-size:17px; padding:5px; line-height:40px;">
                            
                        <?php 

                        if(isset($_SESSION['customer_email'])){
                            echo "<b>Welcome: </b> " . $_SESSION['customer_email'] . "<b style='color:yellow;'> Your</b>";
                        } else {
                            echo "<b>Welcome guest:</b>";
                        }

                        ?>
                            
                            <b style="color:yellow">Shopping cart -</b> Total items: <?php total_items(); ?> 
                            Total price: <?php total_price(); ?> <a href="index.php" style="color:yellow">Back to shop</a>
                            
                            <?php
                            if(!isset($_SESSION['customer_email'])){

                                echo "<a href='checkout.php' style='color:orange;'>Login</a>";

                            } else {

                                echo "<a href='logout.php' style='color:orange;'>Logout</a>";

                            }
                            ?>

                        </span>
                    </div>
                    
                    <div id="products_box">
                    
                        <form action="" method="post" enctype="multipart/form-data">
                            <table align="center" width="700" bgcolor="skyblue">
                                
                                <tr align="center">
                                    <th>Remove</th>
                                    <th>Product(s)</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Subtotal</th>
                                </tr>

                                <?php 
                                    
                                    $total = 0;

                                    $subtotal = 0;

                                    global $con;

                                    $ip = getIp();

                                    $sel_price = "SELECT * FROM cart WHERE ip_add='$ip'";

                                    $run_price = mysqli_query($con, $sel_price);

                                    while($p_price=mysqli_fetch_array($run_price)){

                                        $pro_id = $p_price['p_id'];                                        

                                        $pro_qty = $p_price['qty'];                                        

                                        $pro_price = "SELECT * FROM products WHERE product_id='$pro_id'";

                                        $run_pro_price = mysqli_query($con, $pro_price);

                                        while($pp_price = mysqli_fetch_array($run_pro_price)){

                                            //$product_price = array($pp_price['product_price']);
                                            
                                            $product_title = $pp_price['product_title'];

                                            $product_image = $pp_price['product_image'];

                                            $single_price = $pp_price['product_price'];
                                            
                                            //$values = array_sum($product_price);
                                            
                                            //$total += $values;

                                            $subtotal = $single_price * $pro_qty;
                                            
                                            $total += $subtotal; 
                                            
                                            $_SESSION['pro_qty'] = $pro_qty;
                                ?>

                                <tr align="center">
                                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                                    <td><?php echo $product_title; ?><br>
                                        <img src="admin_area/product_images/<?php echo $product_image; ?>" width="60" height="60">
                                    </td>
                                    <td><input type="text" size="4" name="quantity" value="<?php echo $_SESSION['pro_qty']; ?>" data-product_id="<?php echo $pro_id; ?>" class="quantity"></td>                                    
                                    <td><?php echo "$" . $single_price; ?></td>
                                    <td><?php echo "$" . $subtotal; ?></td>
                                </tr>

                                <?php
                                        }
                                    }                    
                                ?>

                                <tr align="right">
                                    <td colspan="4" align="right"><b>Sub Total:</b></td>
                                    <td><?php echo "$" . $total; ?></td>
                                </tr>

                                <tr align="center">
                                    <!--<td><input type="submit" name="remove_item" value="Remove item"></td>-->
                                    <td colspan="2"><input type="submit" name="update_cart" value="Update cart"></td>
                                    <td><input type="submit" name="continue" value="Continue shopping"></td>
                                    <td><button><a href="checkout.php" style="text-decoration:none; color:black;">Checkout</a></button></td>
                                </tr>                        

                            </table>                        
                        </form>
                    
                        <?php

                        //function updatecart(){
                            //global $con;

                            $ip = getIp();

                            if(isset($_POST['update_cart'])){
                                foreach($_POST['remove'] as $remove_id){
                                    
                                    $delete_product = "DELETE FROM cart WHERE p_id='$remove_id' AND ip_add='$ip'";

                                    $run_delete = mysqli_query($con, $delete_product);

                                    if($run_delete){

                                        echo "<script>window.open('cart.php', '_self')</script>";

                                    }

                                }

                            }

                            if(isset($_POST['continue'])){

                                echo "<script>window.open('index.php', '_self')</script>";

                            }
                            
                        //}

                        //echo @$up_cart = updatecart();
        
                        ?>

                    </div>
                </div>
            </div>
            <!-- Content wrapper ends -->

            <div id="footer">
                <h2 style="text-align: center; padding-top:30px;">&copy; 2019 by camhu.ddns.net</h2>
            
            </div>
        </div>
    <!-- Main container ends here -->
    </body>
</html>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

<script>

$(document).ready(function(data){

$(document).on('keyup', '.quantity', function(){

var id = $(this).data("product_id");

var quantity = $(this).val();

if(quantity  != ''){

$.ajax({

url:"change.php",

method:"POST",

data:{id:id, quantity:quantity},

success:function(data){

$("body").load('cart_body.php');

}




});


}




});




});

</script>
