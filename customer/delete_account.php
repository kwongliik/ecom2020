<br>
<h2 style="text-align:center;">Do you really want to DELETE your account?</h2>
<form action="" method="post">
    <br>
    <input type="submit" name="yes" value="Yes, I want">
    <input type="submit" name="no" value="No, I was joking">
</form>

<?php
$user = $_SESSION['customer_email'];

if(isset($_POST['yes'])){

    $delete_customer = "DELETE FROM customers WHERE customer_email='$user'";

    $run_delete_customer = mysqli_query($con, $delete_customer);

    if($run_delete_customer){

        session_destroy(); 
        echo "<script>alert('We are really sorry, your account has been deleted!')</script>";
        echo "<script>window.open('../index.php', '_self')</script>";
             
    }
}

if(isset($_POST['no'])){

    echo "<script>alert('Oh! Do not joke again...')</script>";
    echo "<script>window.open('my_account.php', '_self')</script>";

}

?>