<?php
session_start();

if(!isset($_SESSION['user_email'])){
   
    echo "<script>window.open('login.php?not_admin=You ara not an admin!', '_self')</script>";

} else {

?>

<form action="" method="post" style="padding:80px;">
    <b>Insert new categoty:</b>
    <input type="text" name="new_cat" required>
    <input type="submit" name="add_cat" value="Add category">
</form>

<?php
include("includes/db.php");

if(isset($_POST['add_cat'])){
    
    $new_cat = $_POST['new_cat'];

    $insert_cat = "INSERT INTO categories (cat_title) VALUE ('$new_cat')";

    $run_cat = mysqli_query($con, $insert_cat);

    if($run_cat){

        echo "<script>alert('New category has been inserted!')</script>";
        echo "<script>window.open('index.php?view_cats','_self')</script>";

    }
}
?>

<?php } ?>