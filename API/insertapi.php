<?php
include("includes/dbcon.php");
   
	   $product_title = $_POST['product_title'];
	   $product_cat = $_POST['product_cat'];
	   $product_price = $_POST['product_price'];
	   $product_desc = $_POST['product_desc'];
	   $status = 'on';
	   $product_keyword = $_POST['product_keyword'];
	   
	   $product_img1 = $_FILES['product_img1']['name'];
	   $product_img2 = $_FILES['product_img2']['name'];
	   $product_img3 = $_FILES['product_img3']['name'];
	   $product_img4 = $_FILES['product_img4']['name'];
	   
	   $temp_name1 = $_FILES['product_img1']['tmp_name'];
	   $temp_name2 = $_FILES['product_img2']['tmp_name'];
	   $temp_name3 = $_FILES['product_img3']['tmp_name'];
	   $temp_name4 = $_FILES['product_img4']['tmp_name'];
	   
	   if($product_title=='' OR $product_cat=='' OR $product_price=='' OR $product_desc=='' OR $product_keyword=='' OR $product_img1=='')
	   {
		   $msg="Please fill all fields.";
	   }
	   else
	   {
		   move_uploaded_file($temp_name1,"product_images/$product_img1");
		   move_uploaded_file($temp_name2,"product_images/$product_img2");
		   move_uploaded_file($temp_name3,"product_images/$product_img3");
		   
		   $insert_product = "INSERT INTO `products`(`cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_img4`, `product_price`, `product_desc`, `product_keyword`, `product_status`) VALUES ('$product_cat',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_img4','$product_price','$product_desc','$product_keyword','$status')";
		   
		   $run_product = mysqli_query($con,$insert_product);
		   
		   if($run_product)
		   {
               $msg="Product inserted successfully";		   }
		   else{
		   	$msg="wrong";
		   }
	   }
   die(json_encode(array('msg' =>$msg)));


?>