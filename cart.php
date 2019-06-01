<?php

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
            
            <li class="nav-item active px-sm-3">
                <a class="nav-link" href="cart.php"><i class="fas fa-cart-arrow-down"></i>&nbsp<strong>Cart</strong>&nbsp<span class="badge badge-pill badge-danger"><span class="text-white"><?php items(); ?></span></span></a>
            </li>
        </ul>

        </div>

        </div>
    </nav>


    <div class="container-fluid bg-light mt-3">
        
        <div class="container text-center">

            <form action="cart.php" method="post" enctype="multipart/form-data">
            
            <table class="table">
                
                <thead class="thead bg-info text-light shadow">
                    
                    <tr>
                        
                        <th>Remove</th>

                        <th>Product(s)</th>

                        <th>Quantity</th>

                        <th>Total Price</th>

                    </tr>

                </thead>

                <?php
                                    
                    $ip_add = getRealIpAddr();
    
                    $total =0;
    
                    $sel_price = "select * from cart where ip_add='$ip_add'";
    
                    $run_price = mysqli_query($db,$sel_price);
    
                    while($record = mysqli_fetch_assoc($run_price))
                    {
                        $pro_id = $record['p_id'];
        
                        $pro_price = "select * from products where product_id='$pro_id'";
        
                        $run_pro_price = mysqli_query($con,$pro_price);
        
                    while($p_price=mysqli_fetch_assoc($run_pro_price))
                    {
                        $product_price = array($p_price['product_price']);
                            
                        $only_price = $p_price['product_price'];
                                    
                        $product_title = $p_price['product_title'];
                                    
                        $product_image = $p_price['product_img1'];
            
                        $values = array_sum($product_price);
            
                        $total +=$values;
                                  
                ?>

                <tbody>
                    
                    <tr>
                        
                        <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>

                        <td>
                            
                            <picture>

                            <source srcset='admin/product_images/<?php echo $product_image; ?>' type='image/svg+xml'>

                                <a href='product_view.php?pro_id=<?php echo $pro_id; ?>'>

                                    <img src='admin/product_images/<?php echo $product_image; ?>' class='img-fluid img-thumbnail' style='width: 160px;' alt='...'>

                                    <br><?php echo $product_title; ?>

                                </a>

                            </picture>

                        </td>

                        <td><input type="text" name="qty" value="1" size="1px" class="text-center"></td>
                        
                        <?php

                        if(isset($_POST['update']))

                        {
                            
                        $qty = $_POST['qty'];
                                                
                        $insert_qty = "update cart set qty='$qty' where ip_add='$ip_add'";
                                                
                        $run_qty = mysqli_query($con,$insert_qty);
                                                
                        $total = $total*$qty;
                        }
                        ?>

                        <td><?php echo 'Rs'.' '.$only_price.'/-' ?></td>

                        <?php

                            }
                        }

                        ?>

                    </tr>
                </tbody>
            </table>

            
            <div class="row">
                <div class="col-sm">
                    <b class="float-sm-right px-sm-2">Sub Total:- <?php echo 'Rs'.' '.$total.'/-' ?></b>
                </div>
            </div>

            <div class="row mt-sm-3">
                <div class="col-sm-4">
                    <button class="btn btn-warning text-light rounded-0 shadow" type="submit" name="update"><b>Update Cart</b></button>
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-success rounded-0 shadow" type="submit" name="continue"><b>Continue Shopping</b></button>
                </div>
                <div class="col-sm-4">
                    <a href="checkout.php" class="btn btn-primary rounded-0 shadow"><b>Buy Now</b></a>
                </div>
            </div>
        </form>


            <?php
                            
            function updatecart()
            {
                global $con;
            if(isset($_POST['update']))
            {
            foreach($_POST['remove'] as $remove_id)
            {
            $delete_products = "delete from cart where p_id='$remove_id'";
                                    
            $run_delete = mysqli_query($con,$delete_products);
                                    
            if($run_delete)
            {
                echo "<script>window.open('cart.php','_self')</script>";
                                    }
            }
                                
            }
            if(isset($_POST['continue']))
            {
                echo "<script>window.open('index.php','_self')</script>";
            }
                }
            echo @$up_cart = updatecart();
            ?>

        </div>
    </div>


<?php
    
    include("footer/footer.php");

?>