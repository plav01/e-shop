<?php
include("includes/dbcon.php");
   
	  
	  
		   $insert_product = "select * from products";
		   
		   $run_product = mysqli_query($con,$insert_product);

		   
		   
		   if(mysqli_num_rows($run_product)>0)
		   {
		   		while($row=mysqli_fetch_array($run_product)){

		   			$arr[] = $row;

		   		}
		   		die(json_encode($arr));
		   }
		  
	  
   


?>