<?php

    session_start();
    
    include("includes/dbcon.php");

    include("functions/functions.php");

    include("header/header.php");

?>


    <nav class="navbar cat navbar-expand-sm navbar-dark bg-primary sticky-top shadow" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        
        <div class="container">

            <a class="navbar-brand text-warning" href="index.php"><i class="fas fa-shopping-bag fa-2x"></i>
            <b class="text-light">e-Shop</b></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            

            <form class="input-group w-50 mx-sm-2" action="results.php" method="get">

                <input type="search" name="user_query" size="70px" class="form-control border-right-0 rounded-0" placeholder="Type to search products and more">

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
                                echo "<a class='btn btn-danger ml-sm-3' href='customer_logout.php' rounded-0 shadow><i class='fas fa-sign-out-alt'></i>&nbspLogout</a>";
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

    <div class="container-fluid bg-light shadow mt-2">
        <div class="container">
        <div class="row p-sm-2 text-center">
            <?php

                getcategories();

            ?>
        </div>
        </div>
    </div>

    <div class="container-fluid mt-3 shadow">
        <div id="carousel01" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel01" data-slide-to="0" class="active"></li>
                <li data-target="#carousel01" data-slide-to="1"></li>
                <li data-target="#carousel01" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="images/1.jpg" alt="First Carousel">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/2.jpg" alt="Second Carousel">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/3.jpg" alt="Third Carousel">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel01" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Prev</span>
            </a>
            <a class="carousel-control-next" href="#carousel01" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


<!--Code for content-area where products-->

    <div class="container-fluid mt-sm-3 bg-light">

        <!--Spinner Start-->
        <div class="shadow p-2 mt-sm-3 bg-warning">
            <div class="row">
                <div class="col">
                    <div class="loader shadow"></div>
                </div>
                <div class="col">
                    <h3 class="text-muted float-right" style="margin: 13px">Ex-plore iTems</h3>
                </div>
            </div>
        </div>
        <!--Spinner Close-->

        <div class='row'>

            
            <?php

                getCategoriesPro();

                getPro();

                cart();

            ?>

        </div>

    </div>


<?php
    
    include("footer/footer.php");

?>


