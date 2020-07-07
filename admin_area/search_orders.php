<script src="../js/print.js"></script>
<?php  
 //search_orders.php
 include 'includes/db.php';
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {      
      $output = '';  
      $query = "  
           SELECT * FROM orders  
           WHERE order_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'";  
	  
		$result = mysqli_query($con, $query);
		$output .= '<table width="795" align="center" bgcolor="pink" id="printTable">
						<tr align="center">
								<td colspan="6"><h2>View orders here</h2></td>
						</tr>        
						<tr align="center" bgcolor="skyblue">
							<th>No</th>
							<th>Invoice No</th>
							<th>Product title</th>
							<th>Customer name</th>
							<th>Date</th>
							<th>Quantity</th>          
							<th>Delete</th>    
						</tr>';   
	if(mysqli_num_rows($result) > 0){ 			
		while($row = mysqli_fetch_array($result)){
			$order_id = $row['order_id'];
			$invoice_no = $row['invoice_no'];
			$product_id = $row['product_id'];
			$customer_id = $row['customer_id'];
			$date = $row['order_date'];
			$qty = $row['qty'];			
			
			$pro_title = "SELECT product_title FROM products WHERE product_id='$product_id'";
						
			$run_pro_title = mysqli_query($con, $pro_title);

			$row_pro_title = mysqli_fetch_array($run_pro_title);

			$product_title = $row_pro_title['product_title'];			

			$c_name = "SELECT customer_name FROM customers WHERE customer_id='$customer_id'";

			$run_c_name = mysqli_query($con, $c_name);

			$row_c_name = mysqli_fetch_array($run_c_name);

			$customer_name = $row_c_name['customer_name'];			
	
			$i++;
								
			$output .= '<tr align="center">
							<td>' . $i . '</td>
							<td>' . $invoice_no . '</td>
							<td>' . $product_title . '</td>
							<td>' . $customer_name . '</td>
							<td>' . $date . '</td>
							<td>' . $qty . '</td>                
							<td><a href="delete_order.php?delete_order=' . $order_id . '">Delete</a></td>
						</tr>';                
		}
	} else { 
		 $output .= '<tr align="center">  
						<td colspan="6"><h2>No Order Found</h2></td>  
					</tr>';  
	}
	$output .= '</table>';
	$output .= '<br><button class="button button1">Print</button>';  
	echo $output; 
 }
 ?>

<script>
$('button').on('click',function(){
    printData();
})
</script>