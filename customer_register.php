<?php
    
    session_start();
    
    include("includes/dbcon.php");

    include("functions/functions.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="styles/style.css">

    <title>Welcome to e-shop</title>

</head>
<body>

    <nav class="navbar cat navbar-expand-sm navbar-dark bg-primary sticky-top shadow" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        
        <div class="container">

            <a class="navbar-brand text-warning" href="index.php"><i class="fas fa-shopping-bag fa-2x"></i>
            <b class="text-light">e-Shop</b></a>

        </div>
    </nav>
    


<!--Code for content-area where login 0r payment form appear-->

    <div class="jumbotron jumbotron-fluid">
    <div class="container  w-50 shadow-lg bg-white px-5 py-4">
        
        <h3 class="display-6 text-center text-muted">Register & access your account</h3><br>

        <div id="logErr">
            <?php
            if(isset($_COOKIE['error'])) 
            {
                echo  $_COOKIE['error'] ;
            } 
           
            ?>
        </div>

        <div id="login_form">
            <form class="was-validated" action="customer_register.php" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label>First Name</label>
                        <input type="text" name="customer_fname" class="form-control rounded-0" placeholder="First Name">
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Last Name</label>
                        <input type="text" name="customer_lname" class="form-control rounded-0" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="customer_email" class="form-control rounded-0" placeholder="eg:- abc@gmail.com">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="customer_password" class="form-control rounded-0" placeholder="eg:- xxxxxxxxxx">
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label>Country</label>
                            <select class="form-control rounded-0" name="customer_country">
                                <option selected="">Choose Country</option>
                                <option>India</option>
                            </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>State</label>
                            <select class="form-control rounded-0" name="customer_state">
                                <option selected="">Choose State</option>
                                <option>New Delhi</option>
                                <option>Mumbai</option>
                                <option>Chennai</option>
                                <option>Kolkata</option>
                            </select>
                    </div>
                        </div>
                        <div class="form-group">
                            <label>Contact No.</label>
                            <input type="tel" name="customer_contact" class="form-control rounded-0" placeholder="eg:- 9999999999">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="customer_address" class="form-control rounded-0" placeholder="eg:- C-30, Mayur Vihar, New Delhi">
                        </div>
                        <div class="form-group">
                            <label>Choose Image</label>
                            <input type="file" name="customer_image" class="form-control rounded-0">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" name="signup" class="btn btn-success form-control rounded-0 w-50 shadow-lg">Register</button>
                        </div>
                        <hr style="background-color:darkgrey;">
                        <div class="form-group text-center">
                            <a href="customer/customer_login.php" class="btn btn-primary rounded-0 form-control w-50 shadow-lg">Back to Login</a>
                        </div>
            </form>
        </div>

    </div>
</div>


<!--Footer-->
    <div class="container-fluid mt-2" style="background-color: black;">
      <div class="row">
        <div class="col-sm-3 text-center mt-5 mb-5">
          <a class="navbar-brand text-warning" href="index.php"><i class="fas fa-shopping-bag fa-2x"></i>
            <b class="text-light">e-Shop</b></a>
            <p class="text-center text-white-50 mt-1"><small>e-Shop - Online Shopping Store</small></p>
              <div class="text-light">
                <a class="text-light" title="Facebook" href="#" style="text-decoration: none;">
                  <i class="fab fa-facebook-square fa-2x p-2"></i>
                </a>
                <a class="text-light" title="Youtube" href="#" style="text-decoration: none;">
                  <i class="fab fa-youtube-square fa-2x p-2"></i>
                </a>
                <a class="text-light" title="Twitter" href="#" style="text-decoration: none;">
                  <i class="fab fa-twitter-square fa-2x p-2"></i>
                </a>
                <a class="text-light" title="Github" href="#" style="text-decoration: none;">
                  <i class="fab fa-github-square fa-2x p-2"></i>
                </a>
              </div>
        </div>
        <div class="col-sm-4 text-center mt-5 mb-5">
          <p class="text-light"><small><strong>CONTACT <span class="text-info">INFO</span></strong></small></p>
          <p class="text-white-50"><small><i class="fas fa-map-marker-alt text-danger"></i>&nbspHouse No. 263, Radio Station Rd, Kathitand Ratu, Ranchi</small></p>
          <p class="text-white-50"><i class="fas fa-phone text-success"><small></i>&nbsp+91-9065945575</small></p>
          <p class="text-white-50"><small><i class="fas fa-envelope text-warning"></i>&nbsppallavrj001@gmail.com</small></p>
        </div>
        <div class="col-sm-5 text-center mt-5 mb-5">
          <p class="text-light"><small><strong>OUR <span class="text-warning">SOCIAL FEED</span></strong></small></p>
          <div class="row">
            <div class="col-sm-12 p-sm-1">
              <img src="images/f2.jpg" class="img-fluid border-info" alt="Responsive image" style="width: 120px;">
              <img src="images/f1.jpg" class="img-fluid border-info" alt="Responsive image" style="width: 120px;">
              <img src="images/f3.jpg" class="img-fluid border-info" alt="Responsive image" style="width: 120px;">
              <img src="images/f4.jpg" class="img-fluid border-info" alt="Responsive image" style="width: 120px;">
            </div>
            <div class="col-sm-12 px-1">
              <img src="images/f7.jpg" class="img-fluid border-info" alt="Responsive image" style="width: 120px;">
              <img src="images/f6.jpg" class="img-fluid border-info" alt="Responsive image" style="width: 120px;">
              <img src="images/f5.jpg" class="img-fluid border-info" alt="Responsive image" style="width: 120px;">
              <img src="images/f9.jpg" class="img-fluid border-info" alt="Responsive image" style="width: 120px;">
            </div>
        </div>
    </div>    
  </div>
</div>  

<nav class="nav navbar-light bg-dark mb-1 pb-1 d-flex justify-content-center">
  <p class="text-white-50 mt-3">Copyright © 2019 e-Shop. <span class="text-light"><small>All rights reserved.</small></span></p>
</nav>
    

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>


<?php
    
    if(isset($_POST['signup']))
    {
        $c_fname = $_POST['customer_fname'];
        $c_lname = $_POST['customer_lname'];
        $c_email = $_POST['customer_email'];
        $c_pass = $_POST['customer_password'];
        $c_country = $_POST['customer_country'];
        $c_state = $_POST['customer_state'];
        $c_contact = $_POST['customer_contact'];
        $c_add = $_POST['customer_address'];
        $tar="customer/customer_photos/";
        $target= $tar.basename($_FILES["customer_image"]["name"]);
        $img_names=basename($_FILES["customer_image"]["name"]);

        $c_ip = getRealIpAddr();

        $check=mysqli_query($con,"select * from customer where customer_email='$c_email'");
        $run=mysqli_fetch_assoc($check);

        if(mysqli_num_rows($check)>0)
        {
            echo "<script>alert('email already exist please signup from different email')</script>";
            echo "<script>window.open('customer_register.php','_self')</script>";
        }
        else
        {
            $insert_customer = "INSERT INTO `customer`(`customer_fname`, `customer_lname`, `customer_email`, `customer_password`, `customer_country`, `customer_state`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES ('$c_fname','$c_lname','$c_email','$c_pass','$c_country','$c_state','$c_contact','$c_add','$img_names','$c_ip')";

            $run_customer = mysqli_query($con, $insert_customer);

            move_uploaded_file($_FILES['customer_image']['tmp_name'],$target);

            $sel_cart = "select * from cart where ip_add='$c_ip'";

            $run_cart = mysqli_query($con, $sel_cart);

            $check_cart = mysqli_num_rows($run_cart);

            if($check_cart>0){

                $_SESSION['customer_email']=$c_email;

                echo "<script>alert('Account Created Successfully..!')</script>";

                echo "<script>window.open('checkout.php','_self')</script>";

            }
            else
            {
                echo "<script>alert('Account Created Successfully..!')</script>";

                echo "<script>window.open('index.php','_self')</script>"; 
            }
        }

    }

?>