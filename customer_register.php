<?php session_start(); ?>
<!DOCTYPE>
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
                        <span style="float:right; font-size:18px; padding:5px; line-height:40px;">
                            Welcome guest! <b style="color:yellow">Shopping cart -</b> Total items: <?php total_items(); ?> 
                            Total price: <?php total_price(); ?> <a href="cart.php" style="color:yellow">Go to cart</a>
                        </span>
                    </div>
                    
                        <form action="customer_register.php" method="post" enctype="multipart/form-data">
                            
                            <table align="center" width="750">
                            
                                <tr align="center">
                                    <td colspan="6"><h2>Create an account</h2></td>
                                </tr>

                                <tr>
                                    <td align="right">Customer name:</td>
                                    <td><input type="text" name="c_name" required></td>
                                </tr>

                                <tr>
                                    <td align="right">Customer Email:</td>
                                    <td><input type="text" name="c_email" required></td>
                                </tr>

                                <tr>
                                    <td align="right">Customer password:</td>
                                    <td><input type="password" name="c_pass" required></td>
                                </tr>

                                <tr>
                                    <td align="right">Customer Image:</td>
                                    <td><input type="file" name="c_image" required></td>
                                </tr>

                                <tr>
                                    <td align="right">Customer country:</td>
                                    <td>
                                        <select name="c_country">
                                            <option>Select a country</option>
                                            <option>Malaysia</option>
                                            <option>Indonesia</option>
                                            <option>Thailand</option>
                                            <option>Vietnam</option>
                                            <option>Philipine</option>
                                            <option>China</option>
                                            <option>Japan</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="right">Customer city:</td>
                                    <td><input type="text" name="c_city" required></td>
                                </tr>
                            
                                <tr>
                                    <td align="right">Customer contact:</td>
                                    <td><input type="text" name="c_contact" required></td>
                                </tr>

                                <tr>
                                    <td align="right">Customer address:</td>
                                    <td><input type="text" name="c_address" required></td>
                                </tr>
                            
                                <tr align="center">
                                    <td colspan="6"><input type="submit" name="register" value="Create account"></td>
                                </tr>

                            </table>
                                        
                        </form>

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

<?php
if(isset($_POST['register'])){

    $ip = getIp();

    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    $c_country = $_POST['c_country'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];

    move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");

    $insert_c = "INSERT INTO customers (customer_ip, customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image) 
    VALUES ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";

    $run_c = mysqli_query($con, $insert_c);

    $sel_cart = "SELECT * FROM cart WHERE ip_add='$ip'";

    $run_cart = mysqli_query($con, $sel_cart);

    $check_cart = mysqli_num_rows($run_cart);

    if($check_cart == 0){
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('Account has been created successfully. Thanks!')</script>";
        echo "<script>window.open('customer/my_account.php', '_self')</script>";
    } else {
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('Account has been created successfully. Thanks!')</script>";
        echo "<script>window.open('checkout.php', '_self')</script>";
    }
}

?>