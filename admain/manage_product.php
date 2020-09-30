<?php
ob_start();
include ('../includes/admain-header.php');
include ('../config/db.php');


?>
<?php
// blocked product to view

if(isset($_GET['block'])){
    // echo '<br><br><br><br>';
   // echo "hgghgggggggggghhh";
$id=$_GET['block'];
$new='blocked';
$update="UPDATE  products SET statuss ='blocked' where product_id= {$id}";
//$update="DELETE FROM products where product_id= {$id}";
if(mysqli_query($conn,$update));
//mysqli_query($conn,$update);
 //header('location:manage_category.php');
}//end 

if(isset($_GET['unblock'])){
    
$id=$_GET['unblock'];
$new='unblocked';
$update="UPDATE  products SET statuss ='allowed' where product_id= {$id}";
//$update="DELETE FROM products where product_id= {$id}";
if(mysqli_query($conn,$update));


}

?>

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
                                                <th>pro Name</th>
                                                <th>vendor Name</th>
                                                <th>pro-image</th>
                                        
                                                <th>price</th>
                                                <th>description</th>
                                                <th>Category name</th>
                                                <th>Status</th>
                                                <th>Curent-Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                 /*       $queryy="SELECT * FROM category";
                                        $rest=mysqli_query($conn,$query);

                                          $query="SELECT * FROM products";
                                          $result=mysqli_query($conn,$query);
                                          while($product=mysqli_fetch_assoc($result)){ */
                                            $query="SELECT * FROM products";
                                            $result=mysqli_query($conn,$query);
                                           
                                            
                                            while($product= mysqli_fetch_assoc($result)){
                                                $query1="SELECT * FROM category WHERE cat_id=$product[cat_id]";
                                                $result1=mysqli_query($conn,$query1);
                                                $try=mysqli_fetch_assoc($result1);
                                                
                                                $query3="SELECT * FROM vendor WHERE vendor_id=$product[vendor_id]";
                                                $result3=mysqli_query($conn,$query3);
                                                $ven=mysqli_fetch_assoc($result3);
                                           
                                      echo      "<tr>
                                                <td>{$product['product_id']}</td>
                                                
                                                <td>{$product['product_name']}</td>
                                                <td>{$ven['fullname']}</td>
                                                <td><img src='../vendores/images/{$product['product_image']}'></td>
                                                <td >{$product['product_price']}</td>
                                                <td>{$product['product_desc']}</td>
                                                <td>{$try['cat_name']}</td>
                                                <td><a href='manage_product.php?block={$product['product_id']}'><i class='fas fa-lock' style='font-size:30px;color:red;'></a></i>
                                                <a href='manage_product.php?unblock={$product['product_id']}'><i class='fas fa-unlock' style='font-size:30px;color:green;'></a></i></td>
                                                <td>{$product['statuss']}</td>
                                            </tr>";
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




<?php
include ('../includes/admain-footer.php');
?>