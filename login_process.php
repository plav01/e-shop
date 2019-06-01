<?php
    if(!isset($_SESSION))
    {
      session_start();
    }

    $conn=mysqli_connect("localhost","root","","e-shop");
    $email=$_POST['c_email'];
    $password=$_POST['c_pass'];
    $codes = array('customer');
  // print_r($codes);
    
       $select="select * from ".$codes." where customer_email='$email' && customer_password='$password'";
       $query=mysqli_query($conn,$select);
       if(mysqli_num_rows($query)>0)
        {
            $Q=mysqli_fetch_assoc($query);
            $_SESSION['email']=$email;
            $_SESSION['name']=$Q['fname'].' '.$Q['lname'];
            $_SESSION['user_type'] = $deco;
            if($codes=='customer')
            {
                echo "<script>alert('Successfully logged-in')</script>";

                echo "<script>window.open('my_account.php','_self')</script>";
            }
            else
            {
                echo "<script>alert('Login failed')</script>";

            }
            die;
        }
    
    $cookie_name="error";
    $cookie_value="<p class='text-danger'><b>Email Id and Password not match..!Please try again.</b></p>";
    setcookie($cookie_name, $cookie_value, time() + (5), "/");
    header('location:customer/my_account.php');
    
?>