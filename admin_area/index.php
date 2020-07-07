<?php
session_start();

if(!isset($_SESSION['user_email'])){
   
    echo "<script>window.open('login.php?not_admin=You ara not an admin!', '_self')</script>";

} else {

?>

<!DOCTYPE>

<html>
    <head>
        <title>This is admin panel</title>
        <link rel="stylesheet" href="styles/style.css" media="all"> 
        <script src="../js/jquery.min.js"></script>      
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
        <script src="../js/print.js"></script>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">                 
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
        <div class="main_wrapper">
            <div id="header"></div>
            <div id="right">
                <h2 style="text-align:center;">Manage contents</h2>
                    <a href="index.php?insert_product">Insert new product</a>
                    <a href="index.php?view_products">View all products</a>
                    <a href="index.php?insert_cat">Insert new category</a>
                    <a href="index.php?view_cats">View all categories</a>
                    <a href="index.php?insert_brand">Insert new brand</a>
                    <a href="index.php?view_brands">View all brands</a>
                    <a href="index.php?view_customers">View customers</a>
                    <a href="index.php?view_orders">View orders</a>
                    <a href="index.php?view_payments">View payments</a>
                    <a href="index.php?import_products">Import products</a>
                    <a href="logout.php">Admin logout</a>    
            </div>
            <div id="left">
            
            <h2 style="color:red; text-align:center;"><?php echo @$_GET['logged_in']; ?></h2>
                <?php
                if(isset($_GET['insert_product'])){

                    include("insert_product.php");

                }

                if(isset($_GET['view_products'])){

                    include("view_products.php");

                }

                if(isset($_GET['edit_pro'])){

                    include("edit_pro.php");

                }

                if(isset($_GET['insert_cat'])){

                    include("insert_cat.php");

                }

                if(isset($_GET['view_cats'])){

                    include("view_cats.php");

                }

                if(isset($_GET['edit_cat'])){

                    include("edit_cat.php");

                }

                if(isset($_GET['insert_brand'])){

                    include("insert_brand.php");

                }

                if(isset($_GET['view_brands'])){

                    include("view_brands.php");

                }

                if(isset($_GET['edit_brand'])){

                    include("edit_brand.php");

                }

                if(isset($_GET['view_customers'])){

                    include("view_customers.php");

                }

                if(isset($_GET['view_orders'])){

                    include("view_orders.php");

                }

                if(isset($_GET['view_payments'])){

                    include("view_payments.php");

                }

                if(isset($_GET['import_products'])){

                    include("import_products.php");

                }

                ?>
            </div>
        </div>
    
    </body>
</html>

<?php } ?>

<script>
$('button').on('click',function(){
    printData();
})
</script>