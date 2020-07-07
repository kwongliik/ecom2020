<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Payment successful!</title>
    </head>
    <body>
        <h2>Welcome <?php echo $_SESSION['customer_email']; ?></h2>
        <h3>Your payment was successful, please go to your account</h3>
        <h3><a href="customer/my_account.php">Go to your account</a></h3>
        
    </body>
</html>