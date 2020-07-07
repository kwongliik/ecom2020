<?php
    $con = mysqli_connect("localhost","root","mysql","ecom2020");
    
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>