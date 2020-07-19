<div style="width:900px;" align="center">
    <h3>Order Information</h3><br />  
    
    FROM DATE: <input type="date" name="from_date" id="from_date" placeholder="yyyy-mm-dd" />  
    
    TO DATE: <input type="date" name="to_date" id="to_date" placeholder="yyyy-mm-dd" />  
    
	<!--input type="hidden" name="customer_id" id="customer_id" value="<?php echo $customer_id; ?>"-->
    <input type="button" name="filter" id="filter" value="Filter" class="button button1" />  
    
    <br />
</div>

<div id="left">
	<table width="770" align="center" bgcolor="pink" id="printTable"> 
		<tr align="center">
			<td colspan="6"><h2>Your Orders details:</h2></td>
		</tr>
		<tr align="center" bgcolor="skyblue">
			<th>No</th>
			<th>Product</th>
			<th>qty</th>
			<th>Invoice No</th>
			<th>Date</th>
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
</div>
<?php //echo $customer_id; ?>
<br />

<button class="button button1">Print</button>

<script>  
      $(document).ready(function(){  
           /*$.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });*/  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
				var to_date = $('#to_date').val();
				//var customer_id = $('#customer_id').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"search_my_orders.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#left').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>