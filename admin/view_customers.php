<?php

	include("../includes/dbcon.php");

?>


<div class="container-fluid text-dark">

	<h3 class="text-center">All Customers</h3>

	<table class="table table-striped">
		
		<thead class="text-center">
			<tr>
				<th scope="col">S.No.</th>
				<th scope="col">Name</th>
				<th scope="col">Email</th>
				<th scope="col">Image</th>
				<th scope="col">Country</th>
				<th scope="col">Delete</th>
			</tr>
		</thead>

		<?php

		$i=0;

		$get_customer = "select * from customer";

		$run_customer = mysqli_query($con, $get_customer);

		while ($row=mysqli_fetch_array($run_customer)) 
		{
			$c_id = $row['customer_id'];

			$c_name = $row['customer_fname'].' '.$row['customer_lname'];

			$c_email = $row['customer_email'];

			$c_img = $row['customer_image'];

			$c_country = $row['customer_country'];

			$i++;


			echo "

				<tbody class='text-center bg-light'>
					<tr>
						<td> $i </td>
						<td> $c_name </td>
						<td> $c_email </td>
						<td> <img src='../customer/customer_photos/$c_img' style='width:60px;'> </td>
						<td> $c_country</td>
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

    $delete = "delete from customer where customer_id='$c_id'";

    $run_delete = mysqli_query($con, $delete);

    if($run_delete)
    {
     
      echo "<script>alert('Customer has been deleted')</script>";

      echo "<script>window.open('index.php?view_customers','_self')</script>";
    }
  }
?>