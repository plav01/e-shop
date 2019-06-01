<?php

	include("../includes/dbcon.php");

?>

<div class="container-fluid text-dark">

	<h3 class="text-center">Edit Categories</h3>

	<table class="table table-striped">
		
		<thead class="text-center">
			<tr>
				<th scope="col">Category Id</th>
				<th scope="col">Category Title</th>
				<th scope="col">Edit</th>
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
						<td><a href='index.php?edit_cat=$c_id' class='text-info'><i class='fas fa-edit'></i></a></td>
					</tr>
				</tbody>

			";
		}

	?>
		
	</table>
		
</div>