<?php
    
    @session_start();

	include("header/header.php");

    include("includes/dbcon.php");

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top">

	<div class="container">

		<a class="navbar-brand" href="index.php" style="font-family: Bauhaus93;font-size: 25px;">Self-iT</a>

	</div>

</nav>

<div class="jumbotron jumbotron-fluid">
	<div class="container  w-50 shadow-lg bg-light px-5 py-5">
		<h3 class="display-5 text-center text-muted">Log in and get to work</h3><br>

		<div id="hhh">
         	
           <!--<form class="was-validated" action="index.php" method="post">  -->

            <div class="form-group was-validated">
                <label><i class="fas fa-envelope text-success"></i>&nbspEmail Id:</label>
                <input class="form-control rounded-0" type="email" id="u_email" placeholder="username or email" required>
            </div>

            <div class="form-group was-validated">
                <label><i class="fas fa-lock text-danger"></i>&nbspPassword:</label>
                <input class="form-control rounded-0" type="Password" id="u_pass" placeholder="xxxxxxxxxx" required>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customControlValidation1">
                <label class="custom-control-label" for="customControlValidation1">Remember Me</label>
                    <a href="javascript:void(0)" id="qqq" class="float-sm-right text-danger"><b>Forgot Password</b></a>
            </div><br>
                            
            <div class="form-group text-center mb-sm-4">
                <button type="submit" id="u_login" class="btn btn-success w-50 rounded-0 shadow-lg">Login</button>
            </div>

            <hr style="background-color:darkgrey;">
            
            <div class="form-group text-center mt-sm-4">
                <a href="register.php" class="btn btn-primary w-50 rounded-0 shadow-lg">New to IT-hub? SignUp</a>
            </div>
                        
        <!--  </form> -->

        <script type="text/javascript">
    $(document).ready(function(){
        $('#u_login').click(function(){
            var email = $('#u_email').val();
            var pass = $('#u_pass').val();
         
            $.ajax({
                url:'API/login.php',
                type:'POST',
                data:{u_email:email,u_pass:pass},
                success:function(res)
                        {
                            res= JSON.parse(res);
                            /*console.log(res.msg);*/
                            if(res.msg==1)
                            {
                                window.location.href="developer.php";
                            }
                            else
                            {
                                
                            }

                        }
            });
        });
    });
</script>       

         </div>

         <script type="text/javascript">
         	$(document).ready(function(){
         		$('#qqq').click(function(){
         			$('#hhh').hide();
         			$('#sss').show();
         		});
         	});
         </script>

<div id="sss" style="display: none;">
         <form action='' method='post'>
        			<div class='form-group was-validated'>
        			<p>Enter our email to get our password</p>
                	<label><i class='fas fa-envelope'></i>&nbspEmail Id:</label>
                	<input class='form-control rounded-0' type='email' name='c_email' placeholder='username or email' required>
            </div>
            </form>
        </div>

       
	</div>
</div>


<?php

	include("footer/footer.php")

?>