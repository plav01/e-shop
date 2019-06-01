<?php
	
	session_start();

	if(!isset($_SESSION['username']))
	{

		header("Location:login.php");
	}

	include("../includes/dbcon.php");

	include("header/header.php");

?>

	<nav class="navbar cat navbar-expand-sm navbar-dark bg-dark sticky-top shadow" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        
        <div class="container">

            <a class="navbar-brand text-light" href="index.php"><strong>Admin Panel&nbsp<i class="fas fa-cog fa-spin"></i></strong>
            </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    
        <ul class="navbar-nav ml-auto">
        	<?php
        		if(!isset($_SESSION['username']))
        		{
        		?>
        		<li class="nav-item dropdown active px-sm-3">
                	<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-user-circle"></i>&nbspWelcome 
                	</a>
            	</li>
            	<?php
        		}
        		else
        		{
        		?>
        			<li class='nav-item dropdown active px-sm-3'>
                        <a class='nav-link dropdown-toggle text-warning' data-toggle='dropdown' href='#'><i class='fas fa-user-circle'></i>
                            <?=ucwords($_SESSION['username'])?>
                        </a>

                        <div class='dropdown-menu rounded-0'>
                            <div class='container'>
                                <div class='row'>
                                    <div class='dropdown-divider'></div>   
                                    <div class='col-sm'>   
                                        <a class='dropdown-item text-danger' href='../customer_logout.php'><i class='fas fa-sign-out-alt'></i>&nbspLogout</a>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </li>
        			<?php
        		}
        	?>
        	
        </ul>

        </div>

    </div>
</nav>


<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          	<div class="sidebar-sticky">
            	<ul class="nav flex-column">
            		
              		<li class="nav-item">
                		<a class="nav-link active" href="#">      
                  		Dashboard&nbsp <i class="fa fa-wrench fa-spin"></i>
                		</a>
              		</li>
              	</ul>


              		<div class="shw">
              		<a href="javascript:void(0)" class="clk" style="text-decoration: none;">
            			<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              			<b>Orders</b><i class="fas fa-plus-circle text-info"></i>
            			</h6>		
            		</a>        		
	           			<ul class="nav flex-column shw" style="display: none;">
            				<li class="nav-item">
                				<a class="nav-link" href="index.php?orders">
                  				&nbsp&nbsp<i class="fas fa-file-alt feather"></i>&nbspOrders
                				</a>
              				</li>
              			</ul>
              		</div>


                  <div class="shw">
                  <a href="javascript:void(0)" class="clk" style="text-decoration: none;">
                  <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <b>Customers</b><i class="fas fa-plus-circle text-info"></i>
                  </h6>   
                </a>            
                  <ul class="nav flex-column shw" style="display: none;">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?view_customers">
                          &nbsp&nbsp<i class="fas fa-user-alt feather"></i>&nbspCustomers
                        </a>
                      </li>
                    </ul>
                  </div>


              		<div class="shw">
              		<a href="javascript:void(0)" class="clk" style="text-decoration: none;">
            			<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              			<b>Insert</b><i class="fas fa-plus-circle text-info"></i>
            			</h6>		
            		</a>
            		<ul class="nav flex-column shw" style="display: none;">
              			<li class="nav-item">
                			<a class="nav-link" href="index.php?insert_product">
                  			&nbsp&nbspProducts
                			</a>
              			</li>
              			<li class="nav-item">
                			<a class="nav-link" href="index.php?insert_category">
                  			&nbsp&nbspCategory
                			</a>
              			</li>
              			
              			
            		</ul>
            	</div>


            	<div class="shw">
            	<a href="javascript:void(0)" class="clk" style="text-decoration: none;">
            		<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              		<b>Edit</b><i class="fas fa-plus-circle text-info"></i>
            		</h6>		
            	</a>
            	<ul class="nav flex-column mb-2 shw" style="display: none;">
              		<li class="nav-item">
                		<a class="nav-link" href="index.php?edit_product">
                  		&nbsp&nbspProducts
                		</a>
              		</li>
              		<li class="nav-item">
                		<a class="nav-link" href="index.php?edit_category">
                  		&nbsp&nbspCategory
                		</a>
              		</li>
            	</ul>
            </div>


            	<div class="shw">
            	<a href="javascript:void(0)" class="clk" style="text-decoration: none;">
            		<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              		<b>View</b><i class="fas fa-plus-circle text-info"></i>
            		</h6>		
            	</a>
            	<ul class="nav flex-column mb-2 shw" style="display: none;">
              		<li class="nav-item">
                		<a class="nav-link" href="index.php?view_product">
                  		&nbsp&nbspProducts
                		</a>
              		</li>
              		<li class="nav-item">
                		<a class="nav-link" href="index.php?view_category">
                  		&nbsp&nbspCategory
                		</a>
              		</li>
            	</ul>
            </div>


            	<div class="shw">
            	<a href="javascript:void(0)" class="clk" style="text-decoration: none;">
            		<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              		<b>Delete</b><i class="fas fa-plus-circle text-info"></i>
            		</h6>		
            	</a>
            	<ul class="nav flex-column mb-2 shw" style="display: none;">
              		<li class="nav-item">
                		<a class="nav-link" href="index.php?delete_product">
                  		&nbsp&nbspProducts
                		</a>
              		</li>
              		<li class="nav-item">
                		<a class="nav-link" href="index.php?delete_category">
                  		&nbsp&nbspCategory
                		</a>
              		</li> 
            	</ul>
            </div>
            	
            	<div class="shw mb-4">
            		<a href="javascript:void(0)" class="clk" style="text-decoration: none;">
            			<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              			<b>Settings</b> <i class="fas fa-plus-circle text-info"></i>
            			</h6>		
            		</a>
            		<ul class="nav flex-column mb-2 shw" style="display: none;">
              		<li class="nav-item">
                		<a class="nav-link" href="#">
                  		&nbsp&nbspEdit Profile
                		</a>
              		</li>
              		<li class="nav-item">
                		<a class="nav-link" href="index.php?change_password">
                  		&nbsp&nbspChange Password
                		</a>
              		</li>  
            	</ul>	
            	</div>
            	
          	</div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2 text-dark">Dashboard</h1>
            
          </div>

          <?php
          
          if(isset($_GET['insert_product']))
          {
            include("insert_product.php");
          }
          if(isset($_GET['insert_category']))
          {
            include("insert_category.php");
          }

          if(isset($_GET['view_product']))
          {
            include("view_product.php");
          }
          if(isset($_GET['view_category']))
          {
            include("view_category.php");
          }

          if(isset($_GET['edit_product']))
          {
            include("edit_product.php");
          }
          if(isset($_GET['edit_category']))
          {
            include("edit_category.php");
          }
          if(isset($_GET['edit_pro']))
          {
            include("edit_pro.php");
          }
          if(isset($_GET['edit_cat']))
          {
            include("edit_cat.php");
          }


          if(isset($_GET['delete_product']))
          {
            include("delete_product.php");
          }
          if(isset($_GET['delete_category']))
          {
            include("delete_category.php");
          }

          if(isset($_GET['change_password']))
          {
            include("change_password.php");
          }

          if(isset($_GET['orders']))
          {
            include("orders.php");
          }

          if(isset($_GET['view_customers']))
          {
            include("view_customers.php");
          }
        ?>
          
      	</main>



      	<script type="text/javascript">
      		$(document).ready(function(){
      			$(".clk").click(function(){
      				$(this).parent().find(".shw").toggle();
      			});
      		});
      	</script>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>