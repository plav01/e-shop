<?php

	$db = mysqli_connect("localhost","root","","e-shop");


	/*This function is used for categories list*/
	function getcategories()
	{
		global $db;
		$get_cats = "SELECT * FROM categories";
		$run_cats = mysqli_query($db,$get_cats);

		while($row_cats=mysqli_fetch_assoc($run_cats))
		{
			$cat_id = $row_cats['cat_id'];
			$cat_title = $row_cats['cat_title'];

			echo "<div class='col-sm-2'><a href='index.php?cat_id=$cat_id'>$cat_title</a></div>";
		}
	}


	/*This function is used for to get categories item*/
	function getCategoriesPro()
	{	
	    global $db;
			
		if(isset($_GET['cat_id'])){
			
		$cat_id = $_GET['cat_id'];

		$get_cat_pro = "SELECT * FROM `products` WHERE `cat_id`='$cat_id'";
							
		$run_cat_pro = mysqli_query($db,$get_cat_pro);
		
		$count =mysqli_num_rows($run_cat_pro);
		
		if($count==0){
			echo "<h3 class='text-danger px-sm-5'>No Products found in this category..!</h3>";
		}
							
	    while($row_cat_pro=mysqli_fetch_assoc($run_cat_pro))
			{
				$pro_id = $row_cat_pro['product_id'];
				$pro_title = $row_cat_pro['product_title'];
				$pro_cat = $row_cat_pro['cat_id'];
			    $pro_desc = $row_cat_pro['product_desc'];
				$pro_price = $row_cat_pro['product_price'];
			    $pro_image = $row_cat_pro['product_img1'];
								
				echo "

				 <div class='container-fluid shadow'>
				 	<div id='carousel01' class='carousel slide' data-ride='carousel'>
				 		<div class='carousel-inner'>
				 			<div class='row'>
				 				<div class='col'>
				 					<div class='card text-warning'>
				 						<img src='admin/product_images/cannon.jpg' class='img-fluid img-thumbnail shadow' id='zoom' alt='...''>
				 							<div class='card-img-overlay'>
				 								<h5 class='card-title'>$pro_title</h5>

                    							<p class='card-text'>Price: Rs $pro_price</p>

                    							<p class='card-text'>$pro_desc</p>

                    							<a href='index.php?add_cart=$pro_id' class='btn btn-success'>Add to cart</a>
				 							</div>
				 					</div>
				 				</div>
				 			</div>
				 		</div>
				 	</div>
				 </div>
				
            
					";
			}
		}
	}



    /*This function is used for to show all products*/

	function getPro()
	{	
	    global $db;
		
		if(!isset($_GET['cat_id'])){
        
		$get_product = "select * from products order by rand()";
							
		$run_products = mysqli_query($db,$get_product);
							
	    while($row_products=mysqli_fetch_assoc($run_products))
			{
				$pro_id = $row_products['product_id'];
				$pro_title = $row_products['product_title'];
				$pro_cat = $row_products['cat_id'];
			    $pro_desc = $row_products['product_desc'];
				$pro_price = $row_products['product_price'];
			    $pro_image = $row_products['product_img1'];
								
				echo "

				<div class='col-sm-3 mt-sm-3'>

				<div class='shadow'>

                <div class='card border-info' style='height:430px'>

                    <div class='card-body p-sm-1 mt-sm-0'>
					<picture>

                    	<source srcset='admin/product_images/$pro_image' type='image/svg+xml'>

                    		<a href='details.php?pro_id=$pro_id'><img src='admin/product_images/$pro_image' class='img-fluid img-thumbnail border-radius' alt='...' style='width:297px;height:275px'>
                    		</a>

                	</picture>

                		<h5 class='card-title'>$pro_title</h5>

                		<p class='card-text'>Price: Rs $pro_price</p>

                		

                		<a href='index.php?add_cart=$pro_id' class='btn btn-success shadow'>Add to cart</a>

                    </div>

                </div>
                </div>

            </div>
			";
			}
		}

	}


/*This function is used to show customer IP address*/
//function for getting the IP address
	
function getRealIpAddr()
	{
		if(!empty($_SERVER['HTTP_CLIENT_IP']))
	//check ip from share internet
	{
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}
	elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	//to check ip is pass from proxy
	{
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else
	{
		$ip=$_SERVER['REMOTE_ADDR'];
	}
	return $ip;
	}


/*Getting the default customers */
	
function getDefault()
{
	global $db;

	$c = $_SESSION['customer_email'];

	$get_c = "SELECT * FROM `customer` WHERE `customer_email`='$c'";

	$run_c = mysqli_query($db, $get_c);

	$row_c = mysqli_fetch_array ($run_c);

		$customer_id = $row_c['customer_id'];

		if(!isset($_GET['my_orders'])){
			if(!isset($_GET['edit_account'])){
				if(!isset($_GET['change_pass'])){
					if(!isset($_GET['delete_account'])){

						$get_orders = "select * from customer_orders where customer_id='$customer_id' AND order_status='pending'";

					$run_orders = mysqli_query($db, $get_orders);

					$count_orders = mysqli_num_rows($run_orders);

					if($count_orders>0){

						echo "
					<div>
						<h2 class='text-danger border-bottom'>Important !</h2>
						<h4>You have ($count_orders) Pending Orders.</h4>


						<h4>Please see your orders details by clicking this<a href='my_account.php?my_orders'>&nbspClick Here </h4>


					</div>
					";
				}
				else
				{
					echo "<div>
						<h2 class='text-danger border-bottom'>Important!</h2>

						<h4>You have no Pending Orders.</h4>

						<h4>Please see your orders history by clicking this<a href='my_account.php?my_orders'>&nbspClick Here
						</h4>
					</div>";
				}
			}
		}
	}
}

}


/*This function is used to add products to cart*/
function cart()
{
    if(isset($_GET['add_cart']))
{
	global $db;
	
	$ip_add = getRealIpAddr();
	
	$p_id = $_GET['add_cart'];
	
	$check_pro = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
	
	$run_check = mysqli_query($db,$check_pro);
	
	if(mysqli_num_rows($run_check)>0)
	{
		echo "";
	}
	else
	{
		$q = "insert into cart (p_id,ip_add) values ('$p_id','$ip_add')";
		
		$run_q = mysqli_query($db,$q);
		
		echo "<script>window.open('index.php','_self')</script>";
	}
}
}


/*This product is used to get how many items are added*/
function items()
{
	if(isset($_GET['add_cart']))
	{
		global $db;
		
		$ip_add = getRealIpAddr();
		
		$get_items = "select * from cart where ip_add='$ip_add'";
		
		$run_items = mysqli_query($db,$get_items);
		
		$count_items = mysqli_num_rows($run_items);
	}
	else
	{
		global $db;
		
		$ip_add = getRealIpAddr();
		
		$get_items = "select * from cart where ip_add='$ip_add'";
		
		$run_items = mysqli_query($db,$get_items);
		
		$count_items = mysqli_num_rows($run_items);
	}
	echo $count_items;
}


/*This function is used to add total price of the product*/
function total_price()
{
	$ip_add = getRealIpAddr();
	
	global $db;
	
	$total =0;
	
	$sel_price = "select * from cart where ip_add='$ip_add'";
	
	$run_price = mysqli_query($db,$sel_price);
	
	while($record = mysqli_fetch_assoc($run_price))
	{
		$pro_id = $record['p_id'];
		
		$pro_price = "select * from products where product_id='$pro_id'";
		
		$run_pro_price = mysqli_query($db,$pro_price);
		
		while($p_price=mysqli_fetch_assoc($run_pro_price))
		{
			$product_price = array($p_price['product_price']);
			
			$values = array_sum($product_price);
			
			$total +=$values;
		}
	}
	echo 'Rs'.' '.$total.'/-';
}




?>