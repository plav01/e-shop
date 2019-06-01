<?php
    
    session_start();

    include("header/header.php");

    include("../includes/dbcon.php");

?>

    <nav class="navbar cat navbar-expand-sm navbar-dark bg-dark sticky-top shadow" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        
        <div class="container">

            <a class="navbar-brand text-light" href="index.php"><h3>Admin Panel&nbsp<i class="fas fa-cog fa-spin"></i></h3>
            </a>

        </div>

    </div>
</nav>


<div class="container w-25 bg-info mt-5 rounded-0 cntnr shadow-lg"><br>
    <h3 class="text-light display-6"><center>Admin Login</center></h3><br>
  <div id="login_form">
        <form class="was-validated" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="text-light"><i class="fas fa-envelope"></i>&nbspUsername:</label>
                <input class="form-control rounded-0" type="text" name="username" placeholder="username" required>
            </div>
            <div class="form-group">
                <label class="text-light"><i class="fas fa-lock"></i>&nbspPassword:</label>
                <input class="form-control rounded-0" type="Password" name="u_pass" placeholder="xxxxxxxxxx" required>
            </div>
            
            <hr>
            <div class="form-group text-center mb-sm-4">
                <button type="submit" name="u_login" class="btn btn-success w-75 rounded-0 shadow-lg">Login</button><br><br>
            </div>
        </form>
    </div>
</div>
</div>



<script type="text/javascript">
    $(document).ready(function(){
        $(".cntnr").mouseenter(function(){
            $(this).addClass("shadow-lg");
        });
        $(".cntnr").mouseleave(function(){
            $(this).removeClass("shadow-lg");
        });
    });
</script>
</body>
</html>



<?php

    if(isset($_POST['u_login'])){

        $username = $_POST['username'];

        $password = $_POST['u_pass'];

        $sel = "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";

        $run = mysqli_query($con, $sel);

        $check = mysqli_num_rows($run);

        if ($check==0) {
            
            echo "<script>alert('Password and Username address not match..! Please try again')</script>";

            exit();
        }

        else
        {

            $_SESSION['username'] = $username;

            echo "<script>alert('Successfully loggedin')</script>";

            echo "<script>window.open('index.php','_self')</script>";
        }
        
    }

?>