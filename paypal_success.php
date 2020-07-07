<?php session_start(); ?>
<?php
$tx = $_GET['tx'];

?>
<!--DOCTYPE-->
<html>
    <head>
        <title>Payment successful!</title>
    </head>
    <body>
        <h2>Welcome <?php echo $_SESSION['customer_email']; ?></h2>
        <h3>Your payment was successful, please go to your account</h3>
        <h3><a href="https://camhu.ddns.net/ecom2020/customer/my_account.php">Go to your account</a></h3>
        <form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
        <input type="hidden" name="cmd" value="_notify-synch">
        <input type="hidden" name="tx" value="<?php echo $tx; ?>">
        <input type="hidden" name="at" value="CM61ElfaB42qjmdWF1f7Pwy08_AsMOWPp59SgBASzzXPd7nbCIaua0SZ6bK">
        <input type="submit" value="PDT">
        </form>
    </body>
</html>