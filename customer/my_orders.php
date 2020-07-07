<table width="770" align="center" bgcolor="pink" id="printTable"> 
	<tr align="center">
		<td colspan="6"><h2>Your Orders details:</h2></td>
	</tr>
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Product (S)</th>
		<th>Quantity</th>
		<th>Invoice No</th>
		<th>Order Date</th>
		<th>Status</th>
	</tr>
	<?php 
	include("includes/db.php");

	$c_email = $_SESSION['customer_email'];
	$get_customer = "SELECT * FROM customers WHERE customer_email='$c_email'";
	$run_customer = mysqli_query($con, $get_customer);
	$row_customer = mysqli_fetch_array($run_customer);
	$customer_id = $row_customer['customer_id'];
	
	$get_order = "SELECT * FROM orders WHERE customer_id='$customer_id'";
	$run_order = mysqli_query($con, $get_order); 
	$i = 0;
	while ($row_order=mysqli_fetch_array($run_order)){
		$pro_id = $row_order['product_id'];
		$qty = $row_order['qty'];		
		$invoice_no = $row_order['invoice_no'];
		$order_date = $row_order['order_date'];
		$status = $row_order['order_status'];
		$i++;
		
		$get_pro = "SELECT * FROM products WHERE product_id='$pro_id'";
		$run_pro = mysqli_query($con, $get_pro); 
		$row_pro=mysqli_fetch_array($run_pro); 
		$pro_image = $row_pro['product_image']; 
		$pro_title = $row_pro['product_title'];
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td>
		<?php echo $pro_title;?><br>
		<img src="../admin_area/product_images/<?php echo $pro_image;?>" width="50" height="50" />
		</td>
		<td><?php echo $qty;?></td>
		<td><?php echo $invoice_no;?></td>
		<td><?php echo $order_date;?></td>
		<td><?php echo $status;?></td>
	</tr>
	<?php } ?>
</table>
<?php //echo $customer_id; ?>
<br />
<br />

<button>Print me</button>