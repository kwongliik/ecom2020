<script src="../js/functions.js"></script>
<?php  
 //search_my_orders.php
 include 'includes/db.php';
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {    
	  //$customer_id = $_POST['customer_id'];  
      $output = '';  
      $query = "SELECT * FROM orders  
           			WHERE order_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'";  
	  
		$result = mysqli_query($con, $query);
		$output .= '<table width="770" align="center" bgcolor="pink" id="printTable">
						<tr align="center">
								<td colspan="6"><h2>Your orders details</h2></td>
						</tr>        
						<tr align="center" bgcolor="skyblue">
							<th>No</th>
							<th>Product</th>
							<th>Qty</th>
							<th>Invoice #</th>
							<th>Date</th>
							<th>Status</th>						   
						</tr>';   
	if(mysqli_num_rows($result) > 0){ 			
		while($row = mysqli_fetch_array($result)){
			$product_id = $row['product_id'];
			$qty = $row['qty'];
			$invoice_no = $row['invoice_no'];
			$date = $row['order_date'];
			$status = $row['order_status'];
						
			$product = "SELECT * FROM products WHERE product_id='$product_id'";
						
			$run_product = mysqli_query($con, $product);

			$row_product = mysqli_fetch_array($run_product);

			$product_title = $row_product['product_title'];
			
			$product_image = $row_product['product_image'];

			$i++;
								
			$output .= '<tr align="center">
							<td>' . $i . '</td>
							<td>' . $product_title . '<br>' .
							'<img src="../admin_area/product_images/' . $product_image . '" width="50" height="50" /></td>' .
							'<td>' . $qty . '</td>
							<td>' . $invoice_no . '</td>
							<td>' . $date . '</td>
							<td>' . $status . '</td>				
						</tr>';                
		}
	} else { 
		 $output .= '<tr align="center">  
						<td colspan="6"><h2>No Order Found</h2></td>  
					</tr>';  
	}
	$output .= '</table>';
	
	echo $output; 
 }
 ?>