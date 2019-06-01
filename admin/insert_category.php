<?php

	include("../includes/dbcon.php");

?>

<div class="container table-small border shadow-sm text-dark">
		<h2 class="text-center">Insert New Category</h2>
			<form class="form-group" action="insert_category.php" method="post" enctype="multipart/form-data">
				<table class="table table-bordered text-center w-100 mx-sm-auto">
				
					<tbody>

						<tr>
							<td>	
								<label><b>Category Title</b></label>
							</td>
							<td>
								<input class="form-control" type="text" name="category_title" placeholder="Enter Category Title">
							</td>
						</tr>	
					</tbody>
				</table>
			<div class="text-center pb-sm-3">
			<input class="btn btn-success rounded-0 shadow-lg" type="submit" name="submit" value="Submit Category">
		</div>
		</form>
	</div>
		

<?php
   
   if(isset($_POST['submit']))
   {
	   $title = $_POST['category_title'];
	   
	   if($title=='')
	   {
		   echo "<script>alert('Please fill all fields.')</script>";

		   echo "<script>window.open('index.php?insert_category','_self')</script>";

		   
	   }
	   else
	   {
		   
		   $insert_categories = "INSERT INTO `categories`(`cat_title`) VALUES ('$title')";
		   
		   $run_categories = mysqli_query($con,$insert_categories);
		   
		   if($run_categories)
		   {
			   echo "<script>alert('Category inserted successfully.')</script>";

			   echo "<script>window.open('index.php?insert_category','_self')</script>";
		   }
		   else{
		   	echo "<script>alert('wrong')</script>";
		   }
	   }
   }


?>