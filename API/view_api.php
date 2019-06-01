<?php
		include("includes/dbcon.php");

		$get_pro = "select * from products";

		$run_pro = mysqli_query($con, $get_pro);

		if(mysqli_num_rows($run_pro)>0){

			while ($row=mysqli_fetch_array($run_pro)) 
		{
			$p_id = $row['product_id'];

			$p_title = $row['product_title'];

			$p_img = $row['product_img1'];

			$p_price = $row['product_price'];

			$p_status = $row['product_status'];

			$msg[] = $row;
		}

		die(json_encode($msg));
		}
		else{

			die (json_encode(array('information' => "Not Valid", )));
		}

		

	?>