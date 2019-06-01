<!DOCTYPE html>
<html lang="en">
<head>

    <style type="text/css">
        .w-100
            {
                height: 350px;
            }
        @media only screen and (max-width: 500px)
        {
            .w-100
            {
                height: unset !important;
            }
        }

    </style>

	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="styles/style.css">

    <title>Welcome to e-shop</title>

    <script type="text/javascript">
    function show()
    {
       $('#exampleModalCenter').modal('hide');
    }
    </script>



</head>
<body>

    <nav class="navbar cat navbar-expand-sm navbar-dark bg-primary sticky-top" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        
        <div class="container">

            <a class="navbar-brand" href="index.php"><i class="fas fa-shopping-bag fa-2x"></i>
            <b>e-Shop</b></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
        
            <form class="form-inline ml-auto mt-sm-2 mt-lg-0" action="results.php" method="get">
                <input class="form-control" size="50px" type="search" name="user_query" placeholder="Type to search products and more">
                <div class="input-group">
                    <div class="input-group-append">
                        <span class="input-group-icon"><button class="btn btn-success" type="submit" name="search"><i class="fas fa-search"></i></button></span>
                    </div>
                </div>
            </form>
            
        <ul class="navbar-nav mr-auto ml-auto">    
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-user-circle"></i></a>
                <div class="dropdown-menu">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm dropdown-item"><b>Your Account</b></div>
                            <div class="col-sm dropdown-item"><p>Access account and manage orders</p></div>
                        <div class="col">
                            <button type="button" class="btn btn-success float-sm-left" data-toggle="modal" data-target="#exampleModalCenter"><b>Login</b></button>
                        </div>
                        <div class="col"><button type="button" class="btn btn-info float-sm-right" data-toggle="modal" data-target="#modalsignup"><b>Signup</b></button></div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

        </div>

        </div>
    </nav>

    <script type="text/javascript">
      
    </script>

    

    <div class="container-fluid shadow">
      
      
        <div id="carousel01" class="carousel slide" data-ride="carousel">
          
            <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="row mb-3">
                    <div class="col-3">
                      <div class="card text-warning">
                        <img src="admin/product_images/cannon.jpg" class="img-fluid img-thumbnail shadow" id="zoom" alt="...">
                      <div class="card-img-overlay">
                        
                        <h5 class="card-title"><strong>Camera Pallav</strong></h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <button class="btn btn-success float-sm-right">Add to cart</button>
                      </div>
                    </div>
                  </div>
                  <div class="col-3">
                    <img class="img-fluid img-thumbnail" src="admin/product_images/cannon.jpg" alt="First Carousel">
                  </div>
                  <div class="col-3">
                    <img class="img-fluid img-thumbnail" src="admin/product_images/cannon.jpg" alt="First Carousel">
                  </div>
                  <div class="col-3">
                    <img class="img-fluid img-thumbnail" src="admin/product_images/cannon.jpg" alt="First Carousel">
                  </div>
                </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                    <div class="col-3">
                    <img class="d-block w-100 img-fluid img-thumbnail" src="admin/product_images/cannon.jpg" alt="First Carousel">
                  </div>
                  <div class="col-3">
                    <img class="d-block w-100 img-fluid img-thumbnail" src="admin/product_images/cannon.jpg" alt="First Carousel">
                  </div>
                  <div class="col-3">
                    <img class="d-block w-100 img-fluid img-thumbnail" src="admin/product_images/cannon.jpg" alt="First Carousel">
                  </div>
                  <div class="col-3">
                    <img class="d-block w-100 img-fluid img-thumbnail" src="admin/product_images/cannon.jpg" alt="First Carousel">
                  </div>
                </div>
                </div>
                </div>
                   
            </div>
            <button class="carousel-control-prev btn btn-dark w-auto" href="#carousel01" role="button" data-slide="prev" style="height: 90px;margin-top: 190px">
                <span class="carousel-control-prev-icon" aria-hidden="true" ></span>
            </button>
            <button class="carousel-control-next btn btn-primary w-auto" href="#carousel01" role="button" data-slide="next" style="height: 90px;margin-top: 190px">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                
            </button>
        </div>
       
         
    </div>
    



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>



<!--


<div class='col-sm-3 mt-sm-3'>

                <div class='card border-info' style='height:430px'>

                    <div class='card-body p-sm-1 mt-sm-0'>
          <picture>

                      <source srcset='admin/product_images/$pro_image' type='image/svg+xml'>

                        <a href='details.php?pro_id=$pro_id'><img src='admin/product_images/$pro_image' class='img-fluid img-thumbnail' alt='...'>
                        </a>

                  </picture>

                    <h5 class='card-title'>$pro_title</h5>

                    <p class='card-text'>Price: Rs $pro_price</p>

                    <p class='card-text'>$pro_desc</p>

                    <a href='index.php?add_cart=$pro_id' class='btn btn-success'>Add to cart</a>

                    </div>

                </div>

            </div>


            -->