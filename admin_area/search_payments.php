<script src="../js/functions.js"></script>
<?php  
 //search_payments.php
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
                            <td colspan="6"><h2>View payments here</h2></td>
                    </tr>        
                    <tr align="center" bgcolor="skyblue">
                        <th>No</th>
                        <th>Invoice No</th>
                        <th>Product title</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>                            
										</tr>'; 
										  
	if(mysqli_num_rows($result) > 0){ 			
		while($row = mysqli_fetch_array($result)){
			$invoice_no = $row['invoice_no'];
			$product_id = $row['product_id'];
			$customer_id = $row['customer_id'];
			$order_date = $row['order_date'];
			$qty = $row['qty'];
			$order_status = $row['order_status'];		
			
			$product = "SELECT * FROM products WHERE product_id='$product_id'";

			$run_product = mysqli_query($con, $product);

			$row_product = mysqli_fetch_array($run_product);

			$pro_title = $row_product['product_title'];
			
			$pro_price = $row_product['product_price'];
			
			$amount = $pro_price * $qty;
			
			$i++;
			
			$output .= '<tr align="center"> 
							<td>' . $i . '</td>
							<td>' . $invoice_no . '</td>  
							<td>' . $pro_title . '</td>        
							<td>' . $order_date . '</td>
							<td>' . $amount . '</td>
							<td>' . $order_status . '</td>        
						</tr>';
		}
	} else { 
		$output .= '<tr align="center">  
						<td colspan="6"><h2>No payment Found</h2></td>  
					</tr>';	
	}
	$output .= '</table>';
	$output .= '<br><div align="center"><button class="button button1">Print</button></div>';  
	echo $output; 
 }
 ?>

<script>
$('button').on('click',function(){
    printData();
})
</script>