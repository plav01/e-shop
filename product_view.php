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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.js"integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>

    <title>Welcome to e-shop</title>

    <link rel="stylesheet" type="text/css" href="styles/style.css">

    <link rel="stylesheet" type="text/css" href="styles/view.css">

</head>
<body>

    <nav class="navbar cat navbar-expand-sm navbar-dark bg-primary sticky-top shadow" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        
        <div class="container">

            <a class="navbar-brand text-warning" href="index.php"><i class="fas fa-shopping-bag fa-2x"></i>
            <b class="text-light">e-Shop</b></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            

            <form class="input-group w-50 mx-sm-5" action="results.php" method="get">

                <input type="search" name="user_query" size="40px" class="form-control border-right-0 rounded-0" placeholder="Type to search products and more">

                    <div class="input-group-append">
                        <button class="btn input-group-text border-left-0 rounded-0" style="background-color: white;" type="submit" name="search"><i class="fas fa-search text-info"></i></button>
                    </div>
            </form>
            
        <ul class="navbar-nav ml-auto">    
    
            <li class="nav-item dropdown active px-sm-3">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-user-circle"></i>
                    <?php

                        if(!isset($_SESSION['customer_email']))
                        {
                            echo "<strong>&nbspWelcome</strong>";
                        }
                        else
                        {
                            echo "<strong>".$_SESSION['customer_email']."</strong>";
                        }

                    ?>
                </a>
                <div class="dropdown-menu rounded-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm dropdown-item"><strong>Your Account</strong></div>
                            <div class="col-sm dropdown-item"><p>Access account and manage orders</p></div>

                            <?php

                            if (!isset($_SESSION['customer_email'])) {
                                
                                echo "<div class='col'>
                                        <a class='btn btn-success rounded-0' href='customer/customer_login.php' role='button'><strong>Login</strong></a>
                                    </div>";

                                echo "<div class='col'>
                                        <a class='btn btn-info rounded-0 float-right' href='customer_register.php' role='button'><strong>Sign Up</strong></a>
                                    </div>";
                            }

                            else
                            {
                                echo "<a class='btn btn-danger ml-sm-3' href='customer_logout.php'><i class='fas fa-sign-out-alt'></i>&nbspLogout</a>";
                            }
                        
                        
                        ?>
                    </div>
                </div>
                </div>
            </li>
            <li class="nav-item dropdown active px-sm-3">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><strong>More</strong></a>
                <div class="dropdown-menu rounded-0">

                    <a class='dropdown-item' href='customer/my_account.php'><i class='far fa-user'></i>&nbspMy Account</a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><i class="fas fa-phone-square"></i>&nbsp</i>Contact Us</a>
                </div>
            </li>
            <li class="nav-item active px-sm-3">
                <a class="nav-link" href="cart.php"><i class="fas fa-cart-arrow-down"></i>&nbsp<strong>Cart</strong>&nbsp<span class="badge badge-pill badge-danger"><span class="text-white"><?php items(); ?></span></span></a>
            </li>
        </ul>

        </div>

        </div>
    </nav>
		
		<div id="parallax-slider-container" class="parallax-slider-container">
			<div class="parallax-bg"></div>
			<div>
				<ul class="parallax-slider">
					<li id="slide-1" class="slide"><img src="images/slide-1.jpg" /></li>
					<li id="slide-2" class="slide"><img src="images/slide-2.jpg" /></li>
					<li id="slide-3" class="slide"><img src="images/slide-3.jpg" /></li>
					<li id="slide-4" class="slide"><img src="images/slide-4.jpg" /></li>
					<li id="slide-5" class="slide"><img src="images/slide-5.jpg" /></li>
					<li id="slide-6" class="slide"><img src="images/slide-6.jpg" /></li>
				</ul>
				<ul class="thumb-img-container">
					<li id="1" class="thumb-img"><img src="images/slide-thumb-1.jpg" /></li>
					<li id="2" class="thumb-img"><img src="images/slide-thumb-2.jpg" /></li>
					<li id="3" class="thumb-img"><img src="images/slide-thumb-3.jpg" /></li>
					<li id="4" class="thumb-img"><img src="images/slide-thumb-4.jpg" /></li>
					<li id="5" class="thumb-img"><img src="images/slide-thumb-5.jpg" /></li>
					<li id="6" class="thumb-img"><img src="images/slide-thumb-6.jpg" /></li>
				</ul>
			</div>
		</div>

		
		<script type="text/javascript" src="jquery-1.11.2.min.js"></script>
		<script>
			$(document).ready(function(){
					var sliderIndex;
					initSlider();	
					$(".thumb-img").on("click",function(){
						sliderIndex = $(this).attr("id");
						runParallax(sliderIndex);
					});					
			});
			function runParallax(sliderIndex) {				
				var windowWidth = $(window).width();
				var slideWidth = $(".slide").width();
				var slideLeft = (windowWidth/2)-(slideWidth/2);
				var sliderImageCount = parseInt($(".slide").length); 
				
				if(sliderIndex>0) {
					$(".parallax-bg").css("width",sliderImageCount*windowWidth);
					$( ".parallax-bg" ).animate({
						left: "-"+parseInt((sliderIndex-1)*slideWidth)
					  }, 1500 );
					
					for(i=1,j=sliderIndex-1;(i<=sliderIndex&&j>=1);i++,j--) {
						$("#slide-"+i).animate({left:"-"+parseInt(j*windowWidth)}, 1500);
					}
					$("#slide-"+sliderIndex).animate({left:slideLeft}, 1500);
					for(i=++sliderIndex,counter=1;i<=sliderImageCount;i++,counter++){
						$("#slide-"+i).animate({left:parseInt(counter*windowWidth)}, 1500);
					}
				}
			}
			function initSlider() {
				var windowWidth = $(window).width();
				var slideWidth = $(".slide").width();
				var slideLeft = (windowWidth/2)-(slideWidth/2);
				var sliderImageCount = parseInt($(".slide").length); 
				for(i=1;i<=sliderImageCount;i++) {
					$("#slide-"+i).css({left:(i*windowWidth)});
				}
				$("#slide-1").css("left",slideLeft+"px");
			}
		</script>


	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>