<?php

	include("../includes/dbcon.php");

?>

<div class="container-fluid text-dark">

	<h3 class="text-center">All Categories</h3>

	<table class="table table-striped">
		
		<thead class="text-center">
			<tr>
				<th scope="col">Id</th>
				<th scope="col">Category Title</th>
				<th scope="col">Delete</th>
			</tr>
		</thead>

		<?php

		$i=0;

		$get_cat = "select * from categories";

		$run_cat = mysqli_query($con, $get_cat);

		while ($row=mysqli_fetch_array($run_cat)) 
		{
			$c_id = $row['cat_id'];

			$c_title = $row['cat_title'];

			$i++;

			echo "

				<tbody class='text-center bg-light'>
					<tr>
						<td> $i </td>
						<td> $c_title </td>
						<td>
							<form action='' method='post'>
							<button type='submit' name='submit' class='btn text-danger btn-sm'><i class='fas fa-trash-alt'></i></button>
							</form>
						</td>
					</tr>
				</tbody>

			";
		}

	?>
		
	</table>
	
	
</div>


<?php
  
  if(isset($_POST['submit']))
  {

    $delete = "delete from categories where cat_id='$c_id'";

    $run_delete = mysqli_query($con, $delete);

    if($run_delete)
    {
     
      echo "<script>alert('Category has been deleted')</script>";

      echo "<script>window.open('index.php?delete_category','_self')</script>";
    }
  }
?>