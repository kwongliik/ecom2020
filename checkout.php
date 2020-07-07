<?php session_start(); ?>
<!DOCTYPE html>
<?php 

include("functions/functions.php");

?>
<html>
    <head>
        <title>My Online Shop</title>
        <link rel="stylesheet" href="styles/style.css" media="all">
        <!--link rel="stylesheet" href="css/bootstrap.min.css"-->
        <script src="js/jquery.min.js"></script>
        <!--script src="js/popper.min.js"--><!--/script-->
        <script src="js/bootstrap.min.js"></script>
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
                            Total price: <?php total_price(); ?> <a href="cart.php" style="color:yellow">Go to cart</a>
                        </span>
                    </div>
                    
                    <div id="products_box">
    
                        <?php                
                        
                        if(!isset($_SESSION['customer_email'])){

                            include("customer_login.php");

                        } else {        

                            include("payment2.php");

                        } 

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