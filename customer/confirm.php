<?php
	
	session_start();

	include("includes/dbcon.php");

	if(isset($_GET['order_id']))
	{
		$order_id = $_GET['order_id'];
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>
<body>

	<nav class="navbar cat navbar-expand-sm navbar-dark bg-primary sticky-top" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        
        <div class="container">

            <a class="navbar-brand shadow text-warning" href="../index.php"><i class="fas fa-shopping-bag fa-2x"></i>
            <b class="text-light">e-Shop</b></a>

        </div>

    </nav>
	
	<div class="container w-25 shadow mt-sm-5">
		<h3 class="text-primary border-bottom">Proceed to Confirm Payment&nbsp<i class="fas fa-rupee-sign"></i></h3>
		<form class="was-validated" action="confirm.php?update_id=<?php echo $order_id; ?>" method="post">
				<div class="form-group">
					<label><i class="fas fa-file-alt"></i>&nbspInvoice No.</label>
					<input class="form-control" type="text" name="invoice_no">
				</div>

				<div class="form-group">
					<label><i class="fas fa-rupee-sign"></i>&nbspAmount</label>
					<input class="form-control" type="text" name="amount">
				</div>

				<div class="form-group">
					<label><i class="fas fa-money-check"></i>&nbspSelect Payment Options</label>
					<select class="form-control" name="payment_method">
						<option>Select Payment Mode</option>
						<option>Through UPI</option>
						<option>SBI</option>
						<option>HDFC</option>
						<option>Paypal</option>
					</select>
				</div>

				<div class="form-group">
					<label><i class="fas fa-id-card"></i>&nbspTransaction ID</label>
					<input class="form-control" type="text" name="tr">
				</div>

				<div class="form-group">
					<label><i class="far fa-calendar-alt"></i>&nbspPayment Date</label>
					<input class="form-control" type="date" name="date">
				</div>

				<div class="form-group pb-3">
                    <button type="submit" name="confirm" class="btn btn-success form-control" value="Confirm Payment">Confirm Payment</button>
                </div>
		</form>
	</div>


	 <!--Footer-->
    <div class="container-fluid mt-3 bg-info">
        <div class="container text-light text-left">
            <br>
        </div>
        <div class="text-center text-light p-sm-1"><p><b>© 2017-2018 e-Shop.com</b></p></div>
    </div>


	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>

<?php
	
	if(isset($_POST['confirm']))
	{
		$update_id = $_GET['update_id'];

		$invoice = $_POST['invoice_no'];

		$amount = $_POST['amount'];

		$payment_method = $_POST['payment_method'];

		$trn_id = $_POST['tr'];

		$date = $_POST['date'];

		$complete = 'Completed';

		$insert_payment = "INSERT INTO `payments`(`invoice_no`, `amount`, `payment_mode`, `trn_id`, `payment_date`) VALUES ('$invoice','$amount','$payment_method','$trn_id','$date')";

		$run_payment = mysqli_query($con, $insert_payment);

		if($run_payment)
		{
			echo "<h4 class='text-success text-center'>Payment received, you get your order soon. Thank You..!</h4>";
		}
		$update_order = "UPDATE `customer_orders` SET `order_status`='Completed' WHERE `order_id`='$update_id'";

		$run_order = mysqli_query($con, $update_order);
	}

?>