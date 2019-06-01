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

    <link rel="stylesheet" type="text/css" href="styles/style.css">

    <title>Welcome to e-shop</title>

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


    <!--Code for Categories-->

    <div class="container-fluid bg-light">
        <div class="container">
        <div class="row p-sm-2 text-center">
            <?php

                getcategories();

            ?>
        </div>
        </div>
    </div>


    <!--Code for Search Items-->

    <div class="container-fluid">

        <div class='row mt-sm-3'>

            <?php 

                if(isset($_GET['search'])){
                                
                    $user_keyword = $_GET['user_query'];
                                
                    $get_product = "SELECT * FROM `products` WHERE `product_keyword` LIKE '%$user_keyword%'";
                            
                    $run_products = mysqli_query($con, $get_product);

                    $count =mysqli_num_rows($run_products);

                    if($count==0){

                    ?>
                    <div class='col-12 text-center px-sm-5'>
                    <div class='alert alert-danger' role='alert'>
                    <h4 class='alert-heading'>Alert!</h4>
                    <p><strong>Oops</strong> Something went wrong. Product not found.</p>
                    <blockquote>
                        <p>
                            <strong>Please try again.</strong>
                        </p>
                    </blockquote>
                    </div>
                    </div>

                    <?php

                    }

                    while($row_products=mysqli_fetch_assoc($run_products))
                    {   
                        $pro_id = $row_products['product_id'];
                        $pro_title = $row_products['product_title'];
                        $pro_cat = $row_products['cat_id'];
                        $pro_desc = $row_products['product_desc'];
                        $pro_price = $row_products['product_price'];
                        $pro_image = $row_products['product_img1'];
                                
                    echo "
                    
                        <div class='col-sm-3'>

                            <div class='card border-info' style='height:430px'>

                                <div class='card-body p-sm-1 mt-sm-0'>

                                    <picture>

                                        <source srcset='admin/product_images/$pro_image' type='image/svg+xml'>

                                            <a href='details.php?pro_id=$pro_id'><img src='admin/product_images/$pro_image' class='img-fluid img-thumbnail' alt='...' style='width:297px;height:275px'>
                                            </a>

                                    </picture>

                                    <h5 class='card-title'>$pro_title</h5>

                                    <p class='card-text'>Price: Rs $pro_price</p>

                                    <a href='index.php?add_cart=$pro_id' class='btn btn-success'>Add to cart</a>


                                </div>

                            </div>

                        </div>

                        
                    ";

                        }

                        }

                        ?>
            </div>

    </div>
    		



    <!--Footer-->
    <div class="container-fluid mt-3 bg-info">
        <div class="container text-light text-left">
            <br>
        </div>
        <div class="text-center text-light p-sm-1"><p><b>© 2017-2018 e-Shop.com</b></p></div>
    </div>


    
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>


