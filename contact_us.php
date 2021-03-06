<?php session_start(); ?>
<!DOCTYPE html>
<?php 

include("functions/functions.php");

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
                    <li><a href=<?php if(isset($_SESSION['customer_email'])){echo "cart.php";} else {echo "#";} ?>>Shopping Cart</a></li>
                    <li><a href="contact_us.php">Contact Us</a></li>
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
                            Total price: <?php total_price(); ?> <a href="cart.php" style="color:yellow">Go to cart</a>

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
    
                        <h2>This is a e-commerce website selling different kind of electronic products.</h2><br>
                        <h2>You can contact us using following information:</h2><br>
                        <h2>Address: SMK Tung Hua, Jln Tun Abg Hj Openg, 96000 Sibu, Sarawak, Malaysia</h2><br>
                        <h2>Telephone: 084-333555</h2><br>
                        <h2>E-mail: smktunghua@yahoo.com</h2><br>
                        <h2>Website: <a href="https://camhu.ddns.net/ecom2020">www.ecommerce.com.my</a></h2>
                    
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