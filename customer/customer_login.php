<?php

    @session_start();

    include("includes/dbcon.php");

?>  

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../styles/style.css">

    <script src="https://code.jquery.com/jquery-3.3.1.js"integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>

    <title>Welcome to e-shop</title>

</head>

<body>

<nav class="navbar cat navbar-expand-sm navbar-dark bg-primary sticky-top" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">      
    <div class="container">

        <a class="navbar-brand text-warning" href="../index.php"><i class="fas fa-shopping-bag fa-2x"></i>&nbsp<strong class="text-light">e-Shop</strong></a>

    </div>
</nav>


<div class="jumbotron jumbotron-fluid">
    <div class="container  w-50 shadow-lg bg-white px-5 py-4">
        
        <h3 class="display-6 text-center text-muted">Login & Continue Shopping</h3><br>

        <div id="logErr">
            <?php
            if(isset($_COOKIE['error'])) 
            {
                echo  $_COOKIE['error'] ;
            } 
            ?>
        </div>

        <div id="login_form">
            <form class="was-validated" action="../checkout.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label><i class="fas fa-envelope"></i>&nbspEmail Id:</label>
                    <input class="form-control rounded-0" type="email" name="c_email" placeholder="username or email" required>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-lock"></i>&nbspPassword:</label>
                    <input class="form-control rounded-0" type="Password" name="c_pass" placeholder="xxxxxxxxxx" required>
                </div>
                <div class="custom-control custom-checkbox">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="checkbox" class="custom-control-input" id="customControlValidation1">
                            <label class="custom-control-label" for="customControlValidation1">Remember Me</label>
                        </div>
                        <div class="col-sm-6">
                            <a href="javascript:void(0)" id="forgot_pass" class="float-sm-right text-danger"><b>Forgot Password</b></a>
                        </div>
                    </div>
                </div><br>
                <div class="form-group text-center mb-sm-4">
                    <button type="submit" name="c_login" class="btn btn-success w-50 rounded-0 shadow-lg">Login</button>
                </div>
                <hr style="background-color:darkgrey;">
            
                <div class="form-group text-center mt-sm-4">
                    <a href="../customer_register.php" class="btn btn-primary w-50 rounded-0 shadow-lg">New to e-Shop? SignUp</a>
                </div>
            </form>
        </div>

        <div id="forgot_form" style="display: none;">
            <h6 class="display-5 text-muted">Enter your Email-Id to get your Password</h6>
            <form class="was-validated" action="" method="post">
                <div class="form-group">
                    <label><i class="fas fa-envelope text-success"></i>&nbspEmail Id:</label>
                    <input class="form-control rounded-0" type="email" id="c_email" placeholder="username or email" required>
                </div>
                <div class="form-group text-center mb-sm-4">
                    <button type="submit" class="btn btn-success w-50 rounded-0 shadow-lg">Send Email</button>
                </div>
            </form>
        </div>

    </div>
</div>
    
    
<?php

    if(isset($_POST['c_login'])){

        $customer_email = $_POST['c_email'];

        $customer_password = $_POST['c_pass'];

        $sel_customer = "select * from customer where customer_email='$customer_email' AND customer_password='$customer_password'";

        $run_customer = mysqli_query($con, $sel_customer);

        $check_customer = mysqli_num_rows($run_customer);

        $get_ip = getRealIpAddr();
        
        $sel_cart = "select * from cart where ip_add='$get_ip'";

        $run_cart = mysqli_query($con, $sel_cart);

        $check_cart = mysqli_num_rows($run_cart);

        if ($check_customer==0) {
            
            echo "<script>alert('Password and Email address not match..! Please try again')</script>";

            exit();
        }

        if ($check_customer==1 AND $check_cart==0) {

            $_SESSION['customer_email'] = $customer_email;
            
            echo "<script>window.open('customer/my_account.php','_self')</script>";
        }

        else{

            $_SESSION['customer_email'] = $customer_email;

            echo "<script>alert('Successfully loggedin')</script>";

            header('location:checkout.php');
        }
        
    }

?>


<script type="text/javascript">
    $(document).ready(function(){
        $('#forgot_pass').click(function(){
            $('#login_form').hide();
            $('#forgot_form').show();
        });
     });
</script>

<script type="text/javascript">
    setInterval(function(){
        $('#logErr').hide();
    },2000);
</script>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>