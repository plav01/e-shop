<?php
    
    session_start();
    
    include("includes/dbcon.php");

    include("functions/functions.php");

?>


<!--Code for content-area where login 0r payment form appear-->

    <div class="container-fluid mt-sm-3 bg-light">


        <?php

            if (!isset($_SESSION['customer_email'])) {
                include("customer/customer_login.php");
            }
            else{
                include("payments_options.php");
            }
        ?>

    </div>
