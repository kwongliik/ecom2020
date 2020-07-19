<?php
session_start();

if(!isset($_SESSION['user_email'])){
   
    echo "<script>window.open('login.php?not_admin=You ara not an admin!', '_self')</script>";

} else {

?>

<div style="width:900px;" align="center">
    <h3>Order Information</h3><br />  
    
    FROM DATE: <input type="date" name="from_date" id="from_date" placeholder="From Date" />  
    
    TO DATE: <input type="date" name="to_date" id="to_date" placeholder="To Date" />  
    
    <input type="button" name="filter" id="filter" value="Filter" class="button button1" />  
    
    <br />
</div> 

	<table width="795" align="center" bgcolor="pink" id="printTable">
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
    </tr>
    <?php
    include("includes/db.php");

    $get_orders = "SELECT * FROM orders";

    $run_orders = mysqli_query($con, $get_orders);

    $i = 0;

    while($row_order = mysqli_fetch_array($run_orders)){

        $order_id = $row_order['order_id'];
        $invoice_no = $row_order['invoice_no'];
        $product_id = $row_order['product_id'];
        $customer_id = $row_order['customer_id'];
        $date = $row_order['order_date'];
        $qty = $row_order['qty'];

        $pro_title = "SELECT product_title FROM products WHERE product_id='$product_id'";
    
        $run_pro_title = mysqli_query($con, $pro_title);

        $row_pro_title = mysqli_fetch_array($run_pro_title);

        $product_title = $row_pro_title['product_title'];

        $c_name = "SELECT customer_name FROM customers WHERE customer_id='$customer_id'";

        $run_c_name = mysqli_query($con, $c_name);

        $row_c_name = mysqli_fetch_array($run_c_name);

        $customer_name = $row_c_name['customer_name'];

        $i++;

    ?>
    <tr align="center">
        <td><?php echo $i; ?></td>
        <td><?php echo $invoice_no; ?></td>
        <td><?php echo $product_title; ?></td>
        <td><?php echo $customer_name; ?></td>
        <td><?php echo $date; ?></td>
        <td><?php echo $qty; ?></td>                
        <td><a href="delete_order.php?delete_order=<?php echo $order_id; ?>">Delete</a></td>
    </tr>
    <?php } ?>
	</table>
<br />
<div align="center">
	<button class="button button1">Print</button>
</div>
<?php } ?>

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
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"search_orders.php",  
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

