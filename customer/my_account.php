<?php session_start(); ?>
<!DOCTYPE>
<?php 

include("functions/functions.php");

?>
<html>
    <head>
        <title>My Online Shop</title>
        <link rel="stylesheet" href="styles/style.css" media="all">
        <script src="../js/jquery.min.js"></script>
        <script src="../js/functions.js"></script>
        <style>
            .button {
                background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 4px 24px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 14px;
                margin: 4px 2px;
                transition-duration: 0.4s;
                cursor: pointer;
                border-radius: 8px;
            }

            .button1 {	
            background-color: white; 
            color: black; 
            border: 2px solid #4CAF50;
            }

            .button1:hover {
            background-color: #4CAF50;
            color: white;
            }
        </style>
    </head>
    <body>
        <!-- Main container starts here -->
        <div class="main_wrapper">

            <!-- Header starts here -->
            <div class="header_wrapper">
                <a href="../index.php"><img id="logo" src="images/logo.gif"></a>
                <img id="banner" src="images/ad_banner.gif"> 
            </div>
            <!-- Header ends here -->

            <!-- Navigation bar starts -->
            <div class="menubar">
                <ul id="menu">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../all_products.php">All Products</a></li>
                    <li><a href="my_account.php">My Account</a></li>
                    <li><a href="../customer_register.php">Sign Up</a></li>
                    <li><a href=<?php if(isset($_SESSION['customer_email'])){echo "../cart.php";} else {echo "#";} ?>>Shopping Cart</a></li>
                    <li><a href="../contact_us.php">Contact Us</a></li>
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
                    <div id="sidebar_title">My account</div>
                    <ul id="cats">

                    <?php

                    $user = $_SESSION['customer_email'];

                    $get_img = "SELECT * FROM customers WHERE customer_email='$user'";

                    $run_img = mysqli_query($con, $get_img);

                    $row_img = mysqli_fetch_array($run_img);

                    $c_image = $row_img['customer_image'];

                    $c_name = $row_img['customer_name'];

                    if(!empty($user)){

                        echo "<p style='text-align:center;'><img src='customer_images/$c_image' width='150' height='150'></p>";

                    }else{

                        echo "";
                    }
                    
                    ?>
                        <li><a href="my_account.php?my_orders">My orders</a></li>
                        <li><a href="my_account.php?edit_account">Edit account</a></li>
                        <li><a href="my_account.php?change_pass">Change password</a></li>
                        <li><a href="my_account.php?delete_account">Delete account</a></li>
                        <li><a href="../logout.php">Logout</a></li>
                    </ul>
                </div>

                <div id="content_area">

                <?php cart(); ?>

                    <div id="shopping_cart">
                        <span style="float:right; font-size:17px; padding:5px; line-height:40px;">
                            
                            <?php 

                                if(isset($_SESSION['customer_email'])){
                                    echo "<b>Welcome: </b> " . $_SESSION['customer_email'];
                                }

                            ?>
                                            
                            <?php
                            if(!isset($_SESSION['customer_email'])){

                                echo "<a href='../checkout.php' style='color:orange;'>Login</a>";

                            } else {

                                echo "<a href='../logout.php' style='color:orange;'>Logout</a>";

                            }
                            ?>                        
                        </span>
                    </div>
                    
                    <div id="products_box">
    
                        <?php 
                        
                        if(!isset($_GET['my_orders'])){
                            if(!isset($_GET['edit_account'])){
                                if(!isset($_GET['change_pass'])){
                                    if(!isset($_GET['delete_account'])){                                        
                                        if(isset($_SESSION['customer_email'])){
                                            echo "<h2 style='padding:20px;'>Welcome $c_name</h2><br>";
                                            echo "<b>You can see your order's progress by clicking this <a href='my_account.php?my_orders'>link</a></b>";
                                        }
                                        
                                    }
                                }
                            }
                        }

                        ?>

                        <?php
                        if(isset($_SESSION['customer_email'])){
                            if(isset($_GET['edit_account'])){
                                include("edit_account.php");
                            }                        

                            if(isset($_GET['change_pass'])){
                                include("change_pass.php");
                            }

                            if(isset($_GET['delete_account'])){
                                include("delete_account.php");
                            }

                            if(isset($_GET['my_orders'])){
                                include("my_orders.php");
                            }
                        }else{

                            echo "<h2 style='padding:20px;'>Welcome. Login first!</h2>";

                        }
                        ?>
                        
                    </div>
                </div>
            </div>
            <!-- Content wrapper ends -->

            <div id="footer">
                <h2 style="text-align: center; padding-top:30px;">&copy; 2020 by pyhu.ddns.net</h2>
            
            </div>
        </div>
    <!-- Main container ends here -->
    </body>
</html>

<script>
$('button').on('click',function(){
printData();
});
</script>