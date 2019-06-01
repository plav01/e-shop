<h4 class="text-muted mt-sm-3">Change Password</h4>

<form method="post" class="w-50 was-validated">
	
		<div class="form-group">
			<label>Enter Current Password</label>
			<input class="form-control" type="password" name="old_pass" required="#">
		</div>

		<div class="form-group">
			<label>Enter New Password</label>
			<input class="form-control" type="password" name="new_pass" required="#">
		</div>

		<div class="form-group">
			<label>Enter New Password Again</label>
			<input class="form-control" type="password" name="new_pass_again" required="#">
		</div>
		
		<div class="form-group">
            <button type="submit" name="change_pass" class="btn btn-success form-control">Save</button>
        </div>
</form>

<?php
	
	include("includes/dbcon.php");

	$c = $_SESSION['customer_email'];

	if(isset($_POST['change_pass']))
	{
		$old_pass = $_POST['old_pass'];

		$new_pass = $_POST['new_pass'];

		$new_pass_again = $_POST['new_pass_again'];


		$get_real_pass = "select * from customer where customer_password='$old_pass'";

		$run_real_pass = mysqli_query($con, $get_real_pass);

		$check_pass = mysqli_num_rows($run_real_pass);


		if($check_pass==0)
		{
			echo "<script>alert('Your current password is not valid, try again.')</script>";
			exit();
		}
		if($new_pass!=$new_pass_again)
		{
			echo "<script>alert('New password did not match, try again')</script>";
			exit();
		}
		else
		{
			$update_pass = "update customer set customer_password='$new_pass' where customer_email='$c'";

			$run_pass = mysqli_query($con, $update_pass);

			echo "<script>alert('Your password has been successfully changed.')</script>";

			echo "<script>window.open('my_account.php','_self')</script>";
		}
	}

?>