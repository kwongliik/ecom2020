<?php
$con = mysqli_connect("localhost", "root", "mysql", "ecom2020");

if(mysqli_connect_errno()){
    echo "The connection was not established: " . mysqli_connect_error();
}

if(isset($_POST["Import"])){
		
		$filename=$_FILES["file"]["tmp_name"];		


		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {


	           $sql = "INSERT INTO products (product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords) 
                   VALUES ('$getData[0]','$getData[1]','$getData[2]','$getData[3]','$getData[4]','$getData[5]','$getData[6]')";
                echo $sql . "<br>";
                $result = mysqli_query($con, $sql);
				if(!isset($result))
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"../index.php\"
						  </script>";		
				}
				else {
					  echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"../index.php?view_products\"
					</script>";
				}
	         }
			
	         fclose($file);	
		  }
}	 

/*if(isset($_POST["Export"])){
	
	header('Content-Type: text/csv; charset=utf-8');  
	header('Content-Disposition: attachment; filename=data.csv');  
	$output = fopen("php://output", "w");  
	fputcsv($output, array('ID', 'First Name', 'Last Name', 'Email', 'Joining Date'));  
	$query = "SELECT * from employeeinfo ORDER BY emp_id DESC";  
	$result = mysqli_query($con, $query);  
	while($row = mysqli_fetch_assoc($result))  
	{  
		 fputcsv($output, $row);  
	}  
	fclose($output);  
}*/

/*function get_all_records(){
		//$con = getdb();
		require "includes/db.php";
		$Sql = "SELECT * FROM employeeinfo";
		$result = mysqli_query($con, $Sql);  


		if (mysqli_num_rows($result) > 0) {
			echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
							<thead><tr><th>EMP ID</th>
													<th>First Name</th>
													<th>Last Name</th>
													<th>Email</th>
													<th>Registration Date</th>
												</tr></thead><tbody>";


			while($row = mysqli_fetch_assoc($result)) {

					echo "<tr><td>" . $row['emp_id']."</td>
										<td>" . $row['firstname']."</td>
										<td>" . $row['lastname']."</td>
										<td>" . $row['email']."</td>
										<td>" . $row['reg_date']."</td></tr>";        
			}
		
			echo "</tbody></table></div>";
			
} else {
			echo "you have no records";
}
}*/
 ?>