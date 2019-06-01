<?php

	include("../includes/dbcon.php");

?>

<div class="container-fluid text-dark">

	<h3 class="text-center">Edit Products</h3>

	<table class="table table-striped">
		
		<thead class="text-center">
			<tr>
				<th scope="col">Product Id</th>
				<th scope="col">Product Title</th>
				<th scope="col">Product Image</th>
				<th scope="col">Product Price</th>
				<th scope="col">Total Sold</th>
				<th scope="col">Product Status</th>
				<th scope="col">Edit</th>
			</tr>
		</thead>

		<?php

		$i=0;

		$get_pro = "select * from products";

		$run_pro = mysqli_query($con, $get_pro);

		while ($row=mysqli_fetch_array($run_pro)) 
		{
			$p_id = $row['product_id'];

			$p_title = $row['product_title'];

			$p_img = $row['product_img1'];

			$p_price = $row['product_price'];

			$p_status = $row['product_status'];

			$i++;


			echo "

				<tbody class='text-center bg-light'>
					<tr>
						<td> $i </td>
						<td> $p_title </td>
						<td> <img src='product_images/$p_img' style='width:60px;'> </td>
						<td> $p_price </td>
						<td></td>
						<td> $p_status </td>
						<td><a href='index.php?edit_pro=$p_id' class='text-info'><i class='fas fa-edit'></i></a></td>
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
    $delete = "delete from products where product_id='$p_id'";

    $run_delete = mysqli_query($con, $delete);

    if($run_delete)
    {
     
      echo "<script>alert('Product has been deleted.')</script>";

      echo "<script>window.open('index.php?delete_product','_self')</script>";
    }
  }
?>