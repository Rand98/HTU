<?php
ob_start();
include ('../includes/vendor-header.php');
include ('../config/db.php');

if(isset($_POST['sub'])){
   // unlink($image_name);
    $image_name=$_FILES['img']['name'];
    $tmp_name= $_FILES['img']['tmp_name'];
    $path='images/'; 
    move_uploaded_file($tmp_name,$path.$image_name);

        $pro_name= $_POST['proname'];
        $cat_id=    $_POST['catid'];
        $pro_price=$_POST['price'];
        $pro_desc=$_POST['descr'];
        $pro_qty=$_POST['qty'];
        $pro_sub=$_POST['subtid'];
        $pro_fea=$_POST['feature'];
        $x=$_GET['id'];
echo '<br><br><br>';
//echo $x;
$query="UPDATE products SET product_name='$pro_name',
product_price  ='$pro_price',
product_desc  ='$pro_desc',
product_image ='$image_name',
cat_id         ='$cat_id',
sub_id          = '$pro_sub',
feature         ='$pro_fea',
qty           ='$pro_qty'
WHERE product_id =$x";

mysqli_query($conn,$query);
header("location:manage_product.php");

}
//cat_id= '$cat_id',
//fetch old

$query="SELECT * FROM products where product_id= {$_GET['id']}";

$result=mysqli_query($conn,$query);
$pro=mysqli_fetch_assoc($result);
$x=$_GET['id'];


?>




<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Update Prodact</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Ediet Product</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post"  enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                                <input id="cc-name" name="proname" type="text" class="form-control" required value="<?php echo $pro['product_name'] ;?>">
                                            </div>
                                           
                                            <?php
                                          echo  '<div class="form-group has-success">';
                                          echo      '<label for="cc-name" class="control-label mb-1">Category ID </label>';
                                          echo      '<select id="cc-id" name="catid" required class="form-control cc-name valid" data-val="true" value="">';
                                                   
                                            $query="SELECT * FROM category";
                                            $result=mysqli_query($conn,$query);
                                            while($catname= mysqli_fetch_assoc($result)){

                                                echo '<option >' . $catname['cat_id'] .' - '. $catname['cat_name'].'</option>';
                                            }
                                              echo  '</select>';
                                               
                                            echo   '</div>';

                                            ?>


                                            <!-- CHOOSE SUB CATEGORY-->
                                            <?php
                                          echo  '<div class="form-group has-success">';
                                          echo      '<label for="cc-name" class="control-label mb-1">Sub Category  </label>';
                                          echo      '<select id="cc-id" name="subtid" required  class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on category">';
                                                   
                                            //$query="SELECT * FROM category INNER JOIN vendor ON category.cat_id=vendor.cat_id ";// join is not assolution
                                            
                                            
                                         // $query="SELECT * FROM sub_category INNER JOIN vendor ON sub_category.cat_id=vendor.cat_id ";
                                            
                                               $query1="SELECT * FROM sub_category";
                                               $result=mysqli_query($conn,$query1);
                                               $try=mysqli_fetch_assoc($result);

                                            //$result=mysqli_query($conn,$query);
                                            while($try= mysqli_fetch_assoc($result)){

                                                echo '<option >' . $try['sub_id'] .' - '. $try['cat_name'].' - '. $try['sub_cat_name'].'</option>';
                                                
                                            }
                                              echo  '</select>';
                                               
                                            echo   '</div>';

                                            ?>
                                            <!--end-->

                                            <!--start-->
                                         <div class="form-group has-success">
                                         <label for="cc-name" class="control-label mb-1">feature </label>
                                                <select id="cc-id" name="feature"   class="form-control cc-name valid" required>
                                                   
                                            
                                        

                                                <option id="yes" >Yes</option>
                                                <option id="no" >No</option>
                                                
                                            
                                              </select>
                                               
                                            </div>

                                            <!-- end -->


                                            <div class="form-group">
                                                <label for="cc-price" class="control-label mb-1">Price</label>
                                                <input id="cc-price" name="price" type="number" required class="form-control cc-number identified visa"  data-val="true" value="<?php echo $pro['product_price'] ;?>">
                                                   
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-img" class="control-label mb-1">Quantity</label>
                                                <input id="cc-price" name="qty" type="number" required class="form-control cc-number identified visa" value="<?php echo $pro['qty'] ;?>" data-val="true"
                                                    >
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-area" class="control-label mb-1">Discreption</label>
                                                <input type="text" id="cc-name" name="descr" required class="form-control"  value="<?php echo $pro['product_desc'] ;?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-image" class="control-label mb-1">Product image</label>
                                                <input id="cc-img" name="img" type="file" required class="form-control" aria-required="true" value="" >
                                            </div>
                                                
                    
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="sub" >
                                                    
                                                    <span id="payment-button-amount">Update</span>
                                                    
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
</div>
</div>
</div>
</div>
<?php include ('../includes/admain-footer.php'); ?>