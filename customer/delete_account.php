<h4 class="text-muted mt-sm-3">Do you really want to Delete Account</h4><br><br>

<form method="post" action="">
	<div class="form-row">
		<div class="form-group col-sm-4">
			
         		<button type="submit" name="yes" class="btn btn-danger form-control shadow">Yes, I want to Delete</button>
         	
        </div>

        <div class="form-group col-sm-4">
			
         	<button type="submit" name="no" class="btn btn-success form-control shadow">No, I Denied</button>
         	
        </div>
    </div>
</form>

<?php
	
	include("includes/dbcon.php");

	$c= $_SESSION['customer_email'];

	if(isset($_POST['yes']))
	{
		$delete_customer = "delete from customer where customer_email='$c'";

		$run_delete = mysqli_query($con, $delete_customer);

		if($run_delete)
		{
			session_destroy();

			echo "<script>alert('Your Account has been deleted. Good Bye !')</script>";

			echo "<script>window.open('../index.php','_self')</script>";
		}
		if(isset($_POST['no']))
		{
			echo "<script>window.open('my_account.php','_self')</script>";
		}
	}

?>