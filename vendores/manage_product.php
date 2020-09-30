<?php
ob_start();
include ('../includes/vendor-header.php');
include ('../config/db.php');

if(isset($_POST['sub'])){
  
  $image_name=$_FILES['img']['name'];
  $tmp_name= $_FILES['img']['tmp_name'];
  $img_type  = $_FILES['img']['type'];
  $allowed_type = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');
  

        $pro_name=$_POST['proname'];
        $sub_id=$_POST['subtid'];
        //echo $sub_id;
        
        $cat_id=$_POST['catid'];
        $pro_price=$_POST['price'];
        $pro_desc=$_POST['descr'];
        $pro_qty=$_POST['qty'];
        $ven_id= $_SESSION['vid'];
        
        $pro_feature=$_POST['feature'];

        if(!in_array($img_type, $allowed_type)) {
            echo 'error';
           
        } 

  else {

    $path='images/'; 


    move_uploaded_file($tmp_name,$path.$image_name);
 $query="INSERT INTO products (product_name,product_price,product_desc,cat_id,sub_id,vendor_id,product_image,qty,statuss,feature) values ( '$pro_name','$pro_price','$pro_desc','$cat_id','$sub_id','$ven_id','$image_name','$pro_qty','allowed','$pro_feature')";

mysqli_query($conn,$query);
header('location:manage_product.php');
  }
}//isset
?>

<?php
if(isset($_GET['idd'])){
    $id=$_GET['idd'];
    $query= "DELETE FROM products where product_id= {$id}";
    if(mysqli_query($conn,$query));
    //unlink($image_name);
    header('location:manage_product.php');
    }

?>

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Add new Product</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">New Product</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post"  enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                                <input id="cc-name" name="proname" type="text" class="form-control" required  value="">
                                            </div>

                                            <?php
                                          echo  '<div class="form-group has-success">';
                                          echo      '<label for="cc-name" class="control-label mb-1">Category ID </label>';
                                          echo      '<select id="cc-id" name="catid"   class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on category" required>';
                                                   
                                           // $query="SELECT * FROM category INNER JOIN vendor ON category.cat_id=vendor.cat_id  ";// join is not assolution
                                           
                                            
                                                $query5="SELECT * FROM category";
                                                $result2=mysqli_query($conn,$query5);
                                                while($yy= mysqli_fetch_assoc($result2)){

                                            

                                                echo '<option >' . $yy['cat_id'] .' - '. $yy['cat_name'].'</option>';
                                            }
                                              echo  '</select>';
                                               
                                            echo   '</div>';

                                            ?>

                                            <!-- CHOOSE SUB CATEGORY-->
                                            <?php
                                          echo  '<div class="form-group has-success">';
                                          echo      '<label for="cc-name" class="control-label mb-1">Sub Category  </label>';
                                          echo      '<select id="cc-id" name="subtid"   class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on category">';
                                                   
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
                                           
                                          <!--start-->
                                         <div class="form-group has-success">
                                         <label for="cc-name" class="control-label mb-1">feature </label>
                                                <select id="cc-id" name="feature"   class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on category" required>
                                                   
                                            
                                        

                                                <option id="yes" >Yes</option>
                                                <option id="no" >No</option>
                                                
                                            
                                              </select>
                                               
                                            </div>

                                            <!-- end -->




                                            <!-- End -->

                                            <div class="form-group">
                                                <label for="cc-img" class="control-label mb-1">Price</label>
                                                <input id="cc-price" name="price" type="number" class="form-control cc-number identified visa" value="" data-val="true"
                                                  required  >
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-img" class="control-label mb-1">Quantity</label>
                                                <input id="cc-price" name="qty" type="number" class="form-control cc-number identified visa" value="" data-val="true"
                                                required  >
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Discreption</label>
                                                <textarea id="cc-name" name="descr" type="text" class="form-control" required value=""></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-image" class="control-label mb-1">Product image</label>
                                                <input id="cc-img" name="img" type="file" class="form-control" required  >
                                            </div>
                                                
                    
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="sub" >
                                                    
                                                    <span id="payment-button-amount">Add</span>
                                                    
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

<!--list of products-->
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                      <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <h2>List Of Products</h2>
                                        <thead>
                                            <tr>
                                                <th>pro-id</th>
                                                <th>Name</th>
                                                <th>pro-image</th>
                                        
                                                <th>price</th>
                                                <th>qty</th>
                                                <th>description</th>
                                                <th>Cat-id</th>
                                                <th>ediet & delete</th>
                                                <th>stutus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                            $ven_id= $_SESSION['vid'];
                                            $query="SELECT * FROM products where vendor_id= $ven_id";
                                            $result=mysqli_query($conn,$query);
                                            //WHERE cat_id=$pro['cat_id']
                                            
                                            while($pro= mysqli_fetch_assoc($result)){
                                                $query1="SELECT * FROM category WHERE cat_id=$pro[cat_id]";
                                                $result1=mysqli_query($conn,$query1);
                                                $try=mysqli_fetch_assoc($result1);
                                               
                                                
                                         echo ' <tr>';
                                         echo  "<td>{$pro['product_id']}</td>";
                                         echo "<td>{$pro['product_name']}</td>";
                                         echo "<td><img src='images/{$pro['product_image']}' style='width:50px;border-radius: 25%;'></td>";
                                         echo "<td>{$pro['product_price']}</td>";
                                         echo "<td>{$pro['qty']}</td>";
                                         echo  "<td>{$pro['product_desc']}</td>";
                                         echo  "<td>{$try['cat_name']}</td>";
                                         echo  "<td><a href='ediet_product.php?id={$pro['product_id']}'><i class='fa fa-edit' style='font-size:36px'></i></a>
                                                    <a href='manage_product.php?idd={$pro['product_id']}'><i class='fa fa-trash-o' style='font-size:36px;color:red'></a></i>
                                         </td>";
                                         echo  "<td>{$pro['statuss']}</td>";
                                          //"<td>{$pro['admain_id']}</td>";
                                              
                                          echo  '</tr>';
                                            } 
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
</div>
</div>
</div>


<?php include ('../includes/admain-footer.php'); ?>