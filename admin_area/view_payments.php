<?php
session_start();

if(!isset($_SESSION['user_email'])){
   
    echo "<script>window.open('login.php?not_admin=You ara not an admin!', '_self')</script>";

} else {

?>

<div style="width:900px;" align="center">
    <h3>Payment Information</h3><br />  
    
    FROM DATE: <input type="date" name="from_date" id="from_date" />  
    
    TO DATE: <input type="date" name="to_date" id="to_date" />  
    
    <input type="button" name="filter" id="filter" value="Filter" class="button button1" />  
    
    <br />
</div> 

<table width="795" align="center" bgcolor="pink" id="printTable">
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
    </tr>
    <?php
    include("includes/db.php");

    $get_orders = "SELECT * FROM orders";

    $run_orders = mysqli_query($con, $get_orders);

    $i = 0;

    while($row_order = mysqli_fetch_array($run_orders)){

        $invoice_no = $row_order['invoice_no'];
        $pro_id = $row_order['product_id'];
        $customer_id = $row_order['customer_id'];
        $date = $row_order['order_date'];
        $qty = $row_order['qty'];
        $order_status = $row_order['order_status'];

        $product = "SELECT * FROM products WHERE product_id='$pro_id'";

        $run_product = mysqli_query($con, $product);

        $row_product = mysqli_fetch_array($run_product);

        $pro_title = $row_product['product_title'];

        $pro_price = $row_product['product_price'];

        $amount = $pro_price * $qty;

        $i++;

?>
    <tr align="center"> 
        <td><?php echo $i; ?></td>
        <td><?php echo $invoice_no; ?></td>  
        <td><?php echo $pro_title; ?></td>        
        <td><?php echo $date; ?></td>
        <td><?php echo $amount; ?></td>
        <td><?php echo $order_status; ?></td>        
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
                          url:"search_payments.php",  
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