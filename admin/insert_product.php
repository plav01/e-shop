<?php

	include("../includes/dbcon.php");

?>

<div class="container table-small border shadow-sm text-dark">
		<h2 class="text-center">Insert New Products</h2>
			<form class="form-group" action="insert_product.php" method="post" enctype="multipart/form-data">
				<table class="table table-bordered text-center w-100 mx-sm-auto">
				
					<tbody>

						<tr>
							<td>	
								<label><b>Product Title</b></label>
							</td>
							<td>
								<input class="form-control" type="text" name="product_title" placeholder="Enter Product Title">
							</td>
						</tr>
				
						<tr>
							<td>
								<label><b>Product Category</b></label>
							</td>
							<td>
								<select class="form-control" name="product_cat">
								<option>Choose Category</option>
								<?php

								$get_cats = "SELECT * FROM categories";
								$run_cats = mysqli_query($con,$get_cats);

								while($row_cats=mysqli_fetch_assoc($run_cats))
								{
								$cat_id = $row_cats['cat_id'];
								$cat_title = $row_cats['cat_title'];

								echo "<option value='$cat_id'>$cat_title</option>";
								}
								?>
								</select>
							</td>
						</tr>
				
				
						<tr>
							<td>
								<label><b>Product Image 1</b></label>
							</td>
							<td>
								<input class="form-control-file" type="file" name="product_img1">
							</td>
						</tr>


						<tr>
							<td>
								<label><b>Product Image 2</b></label>
							</td>
							<td>
								<input class="form-control-file" type="file" name="product_img2">
							</td>
						</tr>
						
						<tr>
							<td>
								<label><b>Product Image 3</b></label>
							</td>
							<td>
								<input class="form-control-file" type="file" name="product_img3">
							</td>
						</tr>

						<tr>
							<td>
								<label><b>Product Image 4</b></label>
							</td>
							<td>
								<input class="form-control-file" type="file" name="product_img4">
							</td>
						</tr>

						<tr>
							<td>
								<label><b>Product Price</b></label>
							</td>
							<td>
								<input class="form-control" type="text" name="product_price" placeholder="Enter Product Price">
							</td>
						</tr>

					<tr>
						<td>
							<label><b>Product Description</b></label>
						</td>
						<td>
							<input class="form-control" type="text" name="product_desc" placeholder="Enter Product Description">
						</td>
					</tr>

					<tr>
						<td>
							<label><b>Product Keyword</b></label>
						</td>
						<td>
							<input class="form-control" type="text" name="product_keyword" placeholder="Enter Product Keyword">
						</td>
					</tr>
				</tbody>
			</table>
			<div class="text-center pb-sm-3">
			<input class="btn btn-success rounded-0 shadow-lg" type="submit" name="submit" value="Submit Product Details">
		</div>
		</form>
	</div>
		

<?php
   
   if(isset($_POST['submit']))
   {
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
		   echo "<script>alert('Please fill all fields.')</script>";

		   echo "<script>window.open('index.php?insert_product','_self')</script>";

		   
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
			   echo "<script>alert('Product inserted successfully.')</script>";

			   echo "<script>window.open('index.php?insert_product','_self')</script>";
		   }
		   else{
		   	echo "<script>alert('wrong')</script>";
		   }
	   }
   }


?>