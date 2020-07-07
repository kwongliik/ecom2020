<div>
<?php 
include("includes/db.php");

?>
<h2 align="center" style="padding:2px;">Pay now with Paypal:</h2>

<form action="" method="post">
	<input type="submit" name="submit" value="Pay Now">
		
<?php
if(isset($_POST['submit']) && isset($_SESSION['customer_email'])){
$customer_email = $_SESSION['customer_email'];

$ip_add = getIp();

$invoice_no = mt_rand();

$status = "paid";

$get_c_id = "SELECT * FROM customers WHERE customer_email = '$customer_email'";

$run_c_id = mysqli_query($con, $get_c_id);

$row_c_id = mysqli_fetch_array($run_c_id);

$customer_id = $row_c_id['customer_id'];

//echo "$customer_email" . "<br>";
//echo "$ip_add" . "<br>";
//echo "$invoice_no" . "<br>";
//echo "$status" . "<br>";
//echo "$customer_id" . "<br>";

$get_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";

$run_cart = mysqli_query($con,$get_cart);

while($row_cart = mysqli_fetch_array($run_cart)){

$pro_id = $row_cart['p_id'];

$pro_qty = $row_cart['qty'];

$insert_customer_order = "INSERT INTO orders (invoice_no, product_id, customer_id, order_date, qty, order_status) values ('$invoice_no', '$pro_id', '$customer_id', NOW(), '$pro_qty', '$status')";

//echo $insert_customer_order . "<br>";
$run_customer_order = mysqli_query($con, $insert_customer_order);

$delete_cart = "DELETE FROM cart WHERE ip_add='$ip_add' AND p_id ='$pro_id'";

//echo $delete_cart . "<br>";
$run_delete = mysqli_query($con, $delete_cart);
 
} 
}

if($run_customer_order && $run_delete){
	echo "<script>alert('Your order has been submitted. Thanks ')</script>";

	echo "<script>window.open('payment_success.php','_self')</script>";
}

?>

</form>

</div>