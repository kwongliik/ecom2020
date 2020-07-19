<?php
include("../includes/db.php");

if(isset($_POST["import"])){
		
		$filename=$_FILES["file"]["tmp_name"];		

		 if($_FILES["file"]["size"] > 0)
		{
		  	$file = fopen($filename, "r");
	      while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	      {


	        $sql = "INSERT INTO products (product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords) 
                   VALUES ('$getData[0]','$getData[1]','$getData[2]','$getData[3]','$getData[4]','$getData[5]','$getData[6]')";
                
			$result = mysqli_query($con, $sql);
					
	    	}			
			fclose($file);	
		}
		if($result){
			echo "<script>alert('Products have been imported!')</script>";		
			echo "<script>window.open('../index.php?view_products', '_self')</script>";
		}

			/*if(!isset($result))
			{
				echo "<script type='text/javascript'>
						alert('Invalid File:Please Upload CSV File.');
						//window.location = '../index.php';
						</script>";
				header('Location: import_products.php'); exit;		
			}
			else {
					echo "<script type='text/javascript'>
					alert('CSV File has been successfully Imported.');
					//window.location = '../index.php?view_products';
					</script>";
					header('Location: ../index.php'); exit;
			}*/
}
?>