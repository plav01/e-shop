<?php
	
	include("../includes/dbcon.php");

	if(isset($_GET['edit_cat']))
	{
		$cat_id = $_GET['edit_cat'];

		$edit_cat = "select * from categories where cat_id='$cat_id'";

		$run_edit = mysqli_query($con, $edit_cat);

		$row_edit = mysqli_fetch_array($run_edit);

		$cat_edit_id = $row_edit['cat_id'];

		$cat_title = $row_edit['cat_title'];
	}

?>


<div class="container table-small border shadow-sm text-dark">
    <h2 class="text-center">Update or Edit Product</h2>
      	<form class="form-group" action="" method="post" enctype="multipart/form-data">
        	<table class="table table-bordered text-center w-100 mx-sm-auto">
        
          		<tbody>

           			<tr>
              			<td>  
                			<label><b>Category Title</b></label>
              			</td>
              			<td>
                			<input class="form-control" type="text" name="cat_title1" placeholder="Enter Category Title" value="<?php echo $cat_title; ?>">
              			</td>
            		</tr>
        		</tbody>
      		</table>
      		<div class="text-center pb-sm-3">
      			<input class="btn btn-success rounded-0 shadow-lg" type="submit" name="update_category" value="Update Category">
    		</div>
    	</form>
</div>


<?php

	if(isset($_POST['update_cat']))
	{
		$cat_title123 = $_POST['cat_title1'];
		
			$update_cat = "update categories set cat_title='$cat_title123' where cat_id='$cat_edit_id'";

			$run_update = mysqli_query($con, $update_cat);

			if($run_update == true)
			{
				echo "<script>alert('Category Updated successfully.')</script>";

         		echo "<script>window.open('index.php?edit_category','_self')</script>";
			}
			else
			{
				echo "<script>alert('Wrong')</script>";
			}
		
	}

?>