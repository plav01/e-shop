<?php
	
	include("includes/dbcon.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to e-Shop</title>
</head>
<body>

	<?php

		$ip = getRealIpAddr();

		$get_customer = "select * from customer where customer_ip='$ip'";

		$run_customer = mysqli_query($con, $get_customer);

		$customer = mysqli_fetch_array($run_customer);

		$customer_id = $customer['customer_id'];

	?>

	<div class="container">

	<picture>

        <source srcset='images/paypal.png' type='image/svg+xml'>

            <img src='images/paypal.png' class='img-fluid img-thumbnail' alt='...'>
            
    </picture>

    <a href="order.php?c_id=<?php echo $customer_id; ?>">Cash on Delivery</a>
    <a href="index.php">home</a>

	</div>

</body>
</html>
