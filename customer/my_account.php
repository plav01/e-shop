<?php

    session_start();

    if(!isset($_SESSION['customer_email']))
    {

        header("Location:customer_login.php");
    }
    
    include("includes/dbcon.php");

    include("../functions/functions.php");

    include("header/header.php");

?>


    <nav class="navbar cat navbar-expand-sm navbar-dark bg-primary sticky-top" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        
        <div class="container">

            <a class="navbar-brand shadow" href="../index.php"><i class="fas fa-shopping-bag fa-2x text-warning"></i>
            <b>e-Shop</b></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            
            <form class="form-inline ml-auto mt-2 mt-lg-0" action="results.php" method="get">
            
                <input class="form-control" size="40px" type="search" name="user_query" placeholder="Type to search products and more">
                <div class="input-group">
                    <div class="input-group-append">
                        <span class="input-group-icon"><button class="btn btn-info" type="submit"><i class="fas fa-search"></i></button></span>
                    </div>
                </div>
            
            </form>
            
        <ul class="navbar-nav ml-auto">    
            
            <li class="nav-item dropdown active px-sm-3">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-user-circle"></i>
                    <?php

                        if(!isset($_SESSION['customer_email']))
                        {
                            echo "<b>&nbspWelcome</b>";
                        }
                        else
                        {
                            echo "<b>".$_SESSION['customer_email']."</b>";
                        }

                    ?>
                </a>
                <div class="dropdown-menu">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm dropdown-item"><b>Your Account</b></div>
                            <div class="col-sm dropdown-item"><p>Access account and manage orders</p></div>

                            <?php

                            if (!isset($_SESSION['customer_email'])) {
                                
                                echo "<div class='col'>
                                        <button type='button' class='btn btn-success float-left shadow' data-toggle='modal' data-target='#exampleModalCenter'><b>Login</b></button>
                                    </div>";

                                echo "<div class='col'>
                                        <button type='button' class='btn btn-info float-right shadow' data-toggle='modal' data-target='#modalsignup'><b>Signup</b></button>
                                    </div>";
                            }

                            else
                            {
                                echo "<a class='btn btn-danger ml-sm-3 shadow' href='customer_logout.php'><i class='fas fa-sign-out-alt'></i>&nbspLogout</a>";
                            }
                        
                        
                        ?>
                    </div>
                </div>
                </div>
            </li>
            <li class="nav-item dropdown active px-sm-3">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><b>More</b></a>
                <div class="dropdown-menu">

                    <?php

                    if(!isset($_SESSION['customer_email'])){

                    echo "<a class='dropdown-item' href='customer/my_account.php'><i class='far fa-user'></i>&nbspMy Account</a>";

                    }

                    else{

                    echo "<a class='dropdown-item' href='customer_logout.php'><i class='fas fa-sign-out-alt'></i>&nbspLogout</a>";
                    }

                    ?>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><i class="fas fa-phone-square"></i>&nbsp</i>Contact Us</a>
                </div>
            </li>
            
        </ul>

        </div>

        </div>
    </nav>


    <div class="container-fluid">
        <div class="row mt-sm-3">

            <div class="col-sm-3 bg-light">
                <div class="list-group" id="list-tab" role="tablist">
                    <h4 class="list-group-item list-group-item-action border-0 bg-secondary text-light">Manage Account</h4>

                   

                    <a class="border-0 list-group-item list-group-item-action bg-secondary text-light" href="change_pic.php">
                        
                        <?php

                        $user_session = $_SESSION['customer_email'];

                        $get_customer_pic = "select * from customer where customer_email='$user_session'";

                        $run_customer = mysqli_query($con, $get_customer_pic);

                        $row_customer = mysqli_fetch_array($run_customer);

                        $customer_pic = $row_customer['customer_image'];
 
                        echo "<img class='img-thumbnail img-fluid' src='customer_photos/$customer_pic'";
                        ?>
                        <a href='change_pic.php'>Change Photo</b>
                    </a>

                    <a class="border-0 list-group-item list-group-item-action bg-secondary text-light" href="my_account.php?my_orders">My Orders</a>

                    <a class="border-0 list-group-item list-group-item-action bg-secondary text-light" href="my_account.php?edit_account">Edit Account</a>

                    <a class="border-0 list-group-item list-group-item-action bg-secondary text-light" href="my_account.php?change_pass">Change Password</a>

                    <a class="border-0 list-group-item list-group-item-action bg-secondary text-light" href="my_account.php?delete_account">Delete Account</a>

                </div>
            </div>
            <div class="col-sm-9 bg-light">
                <?php

                    getDefault();

                ?>  
                <?php

                    if(isset($_GET['my_orders']))
                    {
                        include("my_orders.php");
                    }
                    if(isset($_GET['edit_account']))
                    {
                        include("edit_account.php");
                    }
                    if(isset($_GET['change_pass']))
                    {
                        include("change_pass.php");
                    }
                    if(isset($_GET['delete_account']))
                    {
                        include("delete_account.php");
                    }
                ?>              
            </div>
        </div>
    </div>




    


<?php
    
    include("footer/footer.php");

?>