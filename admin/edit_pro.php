<?php

  include("../includes/dbcon.php");

  if(isset($_GET['edit_pro']))
  {
    $edit_id = $_GET['edit_pro'];

    $get_edit = "select * from products where product_id='$edit_id'";

    $run_edit = mysqli_query($con, $get_edit);

    $row_edit = mysqli_fetch_array($run_edit);

    $update_id = $row_edit['product_id'];

    $p_title = $row_edit['product_title'];

    $cat_id = $row_edit['cat_id'];

    $p_image1 = $row_edit['product_img1'];

    $p_image2 = $row_edit['product_img2'];

    $p_image3 = $row_edit['product_img3'];

    $p_image4 = $row_edit['product_img4'];

    $p_price = $row_edit['product_price'];

    $p_desc = $row_edit['product_desc'];

    $p_keyword = $row_edit['product_keyword'];
  }

  $get_cat = "select * from categories where cat_id='$cat_id'";

  $run_cat = mysqli_query($con, $get_cat);

  $cat_row = mysqli_fetch_array($run_cat);

  $cat_edit_title = $cat_row['cat_title'];

?>

<div class="container table-small border shadow-sm text-dark">
    <h2 class="text-center">Update or Edit Category</h2>
      <form class="form-group" action="" method="post" enctype="multipart/form-data">
        <table class="table table-bordered text-center w-100 mx-sm-auto">
        
          <tbody>

            <tr>
              <td>  
                <label><b>Product Title</b></label>
              </td>
              <td>
                <input class="form-control" type="text" name="product_title" placeholder="Enter Product Title" value="<?php echo $p_title; ?>">
              </td>
            </tr>
        
            <tr>
              <td>
                <label><b>Product Category</b></label>
              </td>
              <td>
                <select class="form-control" name="product_cat">
                <option value="<?php echo $cat_id; ?>"><?php echo $cat_edit_title; ?></option>
                <?php

                $get_cats = "SELECT * FROM categories";
                $run_cats = mysqli_query($con,$get_cats);

                while($row_cats=mysqli_fetch_assoc($run_cats))
                {
                $cat_id = $row_cats['cat_id'];
                $cat_title = $row_cats['cat_title'];

                echo "<option value='$cat_id'>$cat_title</option>";
                }
                ?>
                </select>
              </td>
            </tr>
        
        
            <tr>
              <td>
                <label><b>Product Image 1</b></label>
              </td>
              <td>
                <img src="product_images/<?php echo $p_image1; ?>" width="160px">
                <input class="form-control-file" type="file" name="product_img1">

              </td>
            </tr>


            <tr>
              <td>
                <label><b>Product Image 2</b></label>
              </td>
              <td>
                <img src="product_images/<?php echo $p_image2; ?>" width="120px">
                <input class="form-control-file" type="file" name="product_img2">
              </td>
            </tr>
            
            <tr>
              <td>
                <label><b>Product Image 3</b></label>
              </td>
              <td>
                <img src="product_images/<?php echo $p_image3; ?>" width="120px">
                <input class="form-control-file" type="file" name="product_img3">
              </td>
            </tr>

            <tr>
              <td>
                <label><b>Product Image 4</b></label>
              </td>
              <td>
                <img src="product_images/<?php echo $p_image4; ?>" width="120px">
                <input class="form-control-file" type="file" name="product_img4">
              </td>
            </tr>

            <tr>
              <td>
                <label><b>Product Price</b></label>
              </td>
              <td>
                <input class="form-control" type="text" name="product_price" placeholder="Enter Product Price" value="<?php echo $p_price; ?>">
              </td>
            </tr>

          <tr>
            <td>
              <label><b>Product Description</b></label>
            </td>
            <td>
              <input class="form-control" type="text" name="product_desc" placeholder="Enter Product Description" value="<?php echo $p_desc; ?>">
            </td>
          </tr>

          <tr>
            <td>
              <label><b>Product Keyword</b></label>
            </td>
            <td>
              <input class="form-control" type="text" name="product_keyword" placeholder="Enter Product Keyword" value="<?php echo $p_keyword; ?>">
            </td>
          </tr>
        </tbody>
      </table>
      <div class="text-center pb-sm-3">
      <input class="btn btn-success rounded-0 shadow-lg" type="submit" name="update_product" value="Save Changes">
    </div>
    </form>
  </div>
    

<?php
   
   if(isset($_POST['update_product']))
   {
     $product_title = $_POST['product_title'];
     $product_cat = $_POST['product_cat'];
     $product_price = $_POST['product_price'];
     $product_desc = $_POST['product_desc'];
     $status = 'on';
     $product_keyword = $_POST['product_keyword'];
     
     $product_img1 = $_FILES['product_img1']['name'];
     $product_img2 = $_FILES['product_img2']['name'];
     $product_img3 = $_FILES['product_img3']['name'];
     $product_img4 = $_FILES['product_img4']['name'];
     
     $temp_name1 = $_FILES['product_img1']['tmp_name'];
     $temp_name2 = $_FILES['product_img2']['tmp_name'];
     $temp_name3 = $_FILES['product_img3']['tmp_name'];
     $temp_name4 = $_FILES['product_img4']['tmp_name'];
     
     if($product_title=='' OR $product_cat=='' OR $product_price=='' OR $product_desc=='' OR $product_keyword=='' OR $product_img1=='')
     {
       echo "<script>alert('Please fill all fields.')</script>";

       exit();
     }
     else
     {
       move_uploaded_file($temp_name1,"product_images/$product_img1");
       move_uploaded_file($temp_name2,"product_images/$product_img2");
       move_uploaded_file($temp_name3,"product_images/$product_img3");
       move_uploaded_file($temp_name3,"product_images/$product_img4");
       
       $update_product = "update products set cat_id='$product_cat', date='NOW()', product_title='$product_title', product_img1='$product_img1', product_img2='$product_img2', product_img3='$product_img3', product_img4='$product_img4', product_price='$product_price', product_desc='$product_desc', product_keyword='$product_keyword' where product_id='$update_id'";
       
       $run_update = mysqli_query($con,$update_product);
       
       if($run_update)
       {
         echo "<script>alert('Product updated successfully.')</script>";

         echo "<script>window.open('index.php?edit_product','_self')</script>";
       }
       else{
        echo "<script>alert('wrong')</script>";
       }
     }
   }


?>