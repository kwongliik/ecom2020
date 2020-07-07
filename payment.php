<div>
<?php 
include("includes/db.php");

/*$total = 0;

global $con;

$ip = getIp();

$sel_price = "SELECT * FROM cart WHERE ip_add='$ip'";

$run_price = mysqli_query($con, $sel_price);

while($p_price=mysqli_fetch_array($run_price)){

	$pro_id = $p_price['p_id'];

	$pro_price = "SELECT * FROM products WHERE product_id='$pro_id'";

	$run_pro_price = mysqli_query($con, $pro_price);

	while($pp_price = mysqli_fetch_array($run_pro_price)){

		$product_price = array($pp_price['product_price']);

		$product_name = $pp_price['product_title'];

		$values = array_sum($product_price);

		$total += $values;
	}

}

// getting Quantity of the product 
$get_qty = "select * from cart where p_id='$pro_id'";
$run_qty = mysqli_query($con, $get_qty); 
$row_qty = mysqli_fetch_array($run_qty); 
$qty = $row_qty['qty'];
if($qty==0){
	 $qty=1;
}
else {
	 $qty=$qty;
	 $total = $total*$qty;
}*/

?>
<h2 align="center" style="padding:2px;">Pay now with Paypal:</h2>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
	<input type="hidden" name="cmd" value="_cart">
  	<input type="hidden" name="upload" value="1">
	<!-- Identify your business so that you can collect the payments. -->
	<input type="hidden" name="business" value="businessdavid@shop.com">

	<!-- Saved buttons use the "secure click" command -->
	<!--<input type="hidden" name="cmd" value="_s-xclick">-->

	<!-- Saved buttons are identified by their button IDs -->
	<!--input type="hidden" name="hosted_button_id" value="221"-->

	<!-- Specify details about the item that buyers will purchase. -->
	<!--input type="hidden" name="item_number" value="<?php echo $pro_id; ?>"-->
    <!--input type="hidden" name="amount" value="<?php echo $total; ?>"-->
    <!--input type="hidden" name="quantity" value="<?php echo $qty; ?>"-->
	<!--input type="hidden" name="currency_code" value="USD"-->

	<!--input type="hidden" name="return" value="https://camhu.ddns.net/ecom2020/paypal_success.php"-->
	<!--input type="hidden" name="cancel_return" value="https://camhu.ddns.net/ecom2020/paypal_cancel.php"-->

	<!-- Saved buttons display an appropriate button image. -->
	<input type="image" name="submit"
	src="https://secure.digitalblasphemy.com/graphics/paypal-checkout-button.png"
	alt="PayPal - The safer, easier way to pay online">
	<img alt="" width="1" height="1"
	src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
	
<?php

$i = 0;


$ip_add = getIp();

$get_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";

$run_cart = mysqli_query($con,$get_cart);

while($row_cart = mysqli_fetch_array($run_cart)){

$pro_id = $row_cart['p_id'];

$pro_qty = $row_cart['qty'];

//$pro_price = $row_cart['p_price'];

$get_products = "select * from products where product_id='$pro_id'";

$run_products = mysqli_query($con,$get_products);

$row_products = mysqli_fetch_array($run_products);

$pro_title = $row_products['product_title'];

$pro_price = $row_products['product_price'];

$i++;

?>


<input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $pro_title; ?>" >

<input type="hidden" name="item_number_<?php echo $i; ?>" value="<?php echo $i; ?>" >

<input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo $pro_price; ?>" >

<input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $pro_qty; ?>" >


<?php } ?>

</form>

</div>