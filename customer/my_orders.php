<?php

	include("includes/dbcon.php");

	// Getting Customer Id
	$c = $_SESSION['customer_email'];

	$get_c = "SELECT * FROM `customer` WHERE `customer_email`='$c'";

	$run_c = mysqli_query($db, $get_c);

	$row_c = mysqli_fetch_array ($run_c);

	$customer_id = $row_c['customer_id'];

?>
<h3 class="text-muted border-bottom">Order Details</h3>
<table class="table table-hover">
	<thead class="bg-secondary text-light">
		<tr>
			<th scope="col">Order no.</th>
			<th scope="col">Due Amount</th>
			<th scope="col">Invoice no</th>
			<th scope="col">Total Products</th>
			<th scope="col">Order Date</th>
			<th scope="col">Paid/Unpaid</th>
			<th scope="col">Satus</th>
		</tr>
	</thead>
	<tbody>
			<?php
				$get_orders ="select * from customer_orders where customer_id='$customer_id'";

				$run_orders = mysqli_query($con, $get_orders);

				$i=0;

				while($row_orders=mysqli_fetch_array($run_orders))
				{
					$order_id = $row_orders['order_id'];
					$due_amount = $row_orders['due_amount'];
					$invoice_no = $row_orders['invoice_no'];
					$products = $row_orders['total_products'];
					$date = $row_orders['order_date'];
					$status = $row_orders['order_status'];

					$i++;

					if($status=='Pending'){

						$status = 'Unpaid';
					}
					else
					{
						$status ='Paid';
					}

					echo "
						<tr>
							<td>$i</td>
							<td>$due_amount</td>
							<td>$invoice_no</td>
							<td>$products</td>
							<td>$date</td>
							<td>$status</td>
							<td><a href='confirm.php?order_id=$order_id'>Confirm if Paid</td>
						</tr>
					";
				}
			?>
	</tbody>
</table>
