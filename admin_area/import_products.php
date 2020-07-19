<?php
session_start();

if(!isset($_SESSION['user_email'])){
   
    echo "<script>window.open('login.php?not_admin=You ara not an admin!', '_self')</script>";

} else {
?>
<html>
    <head>
        <title>This is admin panel</title>
        <link rel="stylesheet" href="styles/style.css" media="all"> 
        <script src="../js/jquery.min.js"></script>
        <script src="../js/functions.js"></script>
				<link rel="stylesheet" href="styles/import_products.css">
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
										<a href="import_products.php">Import products</a>
										<a href="logout.php">Admin logout</a>    
						</div>

				<div class="body-import">	
				<h2 align="center">Import products from CSV file into database</h2>
				<br/>
				<div id="response"
        class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
        <?php if(!empty($message)) { echo $message; } ?>
        </div>
					<div class="outer-scontainer">
							<div>
								<form id="frmCSVImport" action="functions/functions.php" method="post" enctype="multipart/form-data">
										<div class="input-row">
												<label>Choose CSV File</label> 
												<input type="file" name="file" id="file" accept="">
												<button id="submit" name="import" class="btn-submit">Import</button>              
										</div>
								</form>
							</div>
					</div>
				</div>
		</div>
</body>
</html>

<?php } ?>

<script>
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {

	    $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
        	    //$("#response").addClass("error");
        	    //$("#response").addClass("display-block");
            //$("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            alert("Please select a CSV file or invalid file type!");
						return false;
        }
        return true;
    });
});
</script>