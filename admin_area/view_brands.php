<?php
session_start();

if(!isset($_SESSION['user_email'])){
   
    echo "<script>window.open('login.php?not_admin=You ara not an admin!', '_self')</script>";

} else {

?>

<table width="795" align="center" bgcolor="pink">
    <tr align="center">
        <td colspan="6"><h2>View all brands here</h2></td>
    </tr>        
    <tr align="center" bgcolor="skyblue">
        <th>Brand ID</th>
        <th>Brand Title</th>
        <th>Edit</th>
        <th>Delete</th>    
    </tr>
    <?php
    include("includes/db.php");

    $get_brand = "SELECT * FROM brands";

    $run_brand = mysqli_query($con, $get_brand);

    while($row_brand = mysqli_fetch_array($run_brand)){

        $brand_id = $row_brand['brand_id'];
        $brand_title = $row_brand['brand_title'];
    
    ?>
    <tr align="center">
        <td><?php echo $brand_id; ?></td>
        <td><?php echo $brand_title; ?></td>
        <td><a href="index.php?edit_brand=<?php echo $brand_id; ?>">Edit</a></td>
        <td><a href="delete_brand.php?delete_brand=<?php echo $brand_id; ?>">Delete</a></td>
    </tr>
    <?php } ?>
</table>

<?php } ?>