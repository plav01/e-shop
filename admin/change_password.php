<main role="main" class="ml-sm-auto px-4 text-dark">

	<h3 class="text-center">Change Password</h3>
  
    <div class="row">
      <div class="mb-3">
      	<div class='card flex-md-row mb-4 shadow-sm h-md-250 notice box'>
        <div class='card-body d-flex flex-column align-items-start justify-content-center'>
        <form method="post" class="was-validated">
	
		<div class="form-group">
			<label><strong>Enter Current Password</strong></label>
			<input class="form-control" type="password" name="old_pass" required="#">
		</div>

		<div class="form-group">
			<label><strong>Enter New Password</strong></label>
			<input class="form-control" type="password" name="new_pass" required="#">
			<span><small class="text-danger"><b>*mandatory to use one uppercase, symbol and number</b></small></span>
		</div>

		<div class="form-group">
			<label><strong>Enter New Password Again</strong></label>
			<input class="form-control" type="password" name="new_pass_again" required="#">
			<span><small class="text-danger"><b>*mandatory to use one uppercase, symbol and number</b></small></span>
		</div>
		
		<div class="form-group">
            <button type="submit" name="change_pass" class="btn btn-outline-success form-control">Save</button>
        </div>
		</form>
	</div>
</div>
      </div>
    </div>          
</main>

<script type="text/javascript">
	$(document).ready(function(){
		$(".box").mouseenter(function(){
			$(this).addClass("shadow");
		});
		$(".box").mouseleave(function(){
			$(this).removeClass("shadow");
		});
	});
</script>


<?php
	
	include("../includes/dbcon.php");

	$a = $_SESSION['username'];

	if(isset($_POST['change_pass']))
	{
		$old_pass = $_POST['old_pass'];

		$new_pass = $_POST['new_pass'];

		$new_pass_again = $_POST['new_pass_again'];

		$get_real_pass = "select * from admin where password='$old_pass'";

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
			$update_pass = "update admin set password='$new_pass' where username='$a'";

			$run_pass = mysqli_query($con, $update_pass);

			echo "<script>alert('Your password has been successfully changed.')</script>";

			echo "<script>window.open('index.php','_self')</script>";
		}
	}

?>