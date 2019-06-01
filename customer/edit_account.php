<?php

	@session_start();

    include("includes/dbcon.php");

	if(isset($_GET['edit_account']))
	{
		$c_email = $_SESSION['customer_email'];

		$get_customer = "SELECT * FROM customer WHERE customer_email='$c_email'";

		$run_customer = mysqli_query($con, $get_customer);

		$row = mysqli_fetch_array($run_customer);

		$id = $row['customer_id'];

		$fname = $row['customer_fname'];

		$lname = $row['customer_lname'];

		$email = $row['customer_email'];

		$pass = $row['customer_password'];

		$country = $row['customer_country'];

		$state = $row['customer_state'];

		$contact = $row['customer_contact'];

		$address = $row['customer_address'];

		$image = $row['customer_image'];

	}
	
?>

<form action="" method="post" class="was-validated w-75" enctype="mulipart/data-form">
	<div class="form-row">
        <div class="form-group col-sm-6">
            <label>First Name</label>
            <input type="text" name="customer_fname" class="form-control" value="<?php echo $fname; ?>">
        </div>
        <div class="form-group col-sm-6">
            <label>Last Name</label>
            <input type="text" name="customer_lname" class="form-control" value="<?php echo $lname; ?>">
        </div>
    </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="customer_email" class="form-control" value="<?php echo $email; ?>">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="customer_password" class="form-control" placeholder="eg:- xxxxxxxxxx">
        </div>
    <div class="form-row">
        <div class="form-group col-sm-6">
            <label>Country</label>
            <select class="form-control" name="customer_country">
                <option selected="" value="<?php echo $country; ?>"><?php echo $country ?></option>
                <option>India</option>
            </select>
        </div>
        <div class="form-group col-sm-6">
            <label>State</label>
            <select class="form-control" name="customer_state">
                <option selected="" value="<?php echo $state; ?>"><?php echo $state; ?></option>
                <option>New Delhi</option>
                <option>Mumbai</option>
                <option>Chennai</option>
                <option>Kolkata</option>
            </select>
        </div>
    </div>
        <div class="form-group">
            <label>Contact No.</label>
            <input type="tel" name="customer_contact" class="form-control" placeholder="eg:- 9999999999" value="<?php echo $contact; ?>">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="customer_address" class="form-control" placeholder="eg:- C-30, Mayur Vihar, New Delhi" value="<?php echo $address; ?>">
        </div>
        <div class="form-group">
            <label>Choose Image</label>
            <input type="file" name="customer_image" class="form-control" value="<?php echo $image; ?>">
        </div>
        <div class="form-group">
            <button type="submit" name="update_account" class="btn btn-success form-control">Save</button>
        </div>
</form>

<?php

	if(isset($_POST['update_account']))
	{
		$update_id = $id;

		$customer_fname = $_POST['customer_fname'];

		$customer_lname = $_POST['customer_lname'];

		$customer_email = $_POST['customer_email'];

		$customer_password = $_POST['customer_password'];

		$customer_country = $_POST['customer_country'];

		$customer_state = $_POST['customer_state'];

		$customer_contact = $_POST['customer_contact'];

		$customer_address = $_POST['customer_address'];

		$customer_image = $_FILES['customer_image']['name'];

		$customer_image_tmp = $_FILES['customer_image']['tmp_name'];

		move_uploaded_file($customer_image_tmp,"customer/customer_photos/");

		$update_c = "UPDATE `customer` SET `customer_fname`='$customer_fname',`customer_lname`='$customer_lname',`customer_email`='customer_email',`customer_password`='$customer_password',`customer_country`='$customer_country',`customer_state`='$customer_state',`customer_contact`='$customer_contact',`customer_address`='$customer_address',`customer_image`='$customer_image', WHERE customer_id='$update_id'";

		$run_c = mysqli_query($con, $update_c);

		if($run_c)
		{
			echo "<script>alert('Your account has been updated.!')</script>";

			echo "<script>window.open('my_account.php','_self')</script>";
		}
	}

?>