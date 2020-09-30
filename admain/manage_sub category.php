<?php
ob_start();
include ('../includes/admain-header.php'); 
include ('../config/db.php');
//===================================insert new  admain 
if(isset($_POST['sub'])){

//Add
   
     $subname =$_POST['sub-name'];   
      $cat_id=$_POST['catid'];
     $catname =$_POST['catname'];



$query="INSERT INTO sub_category(cat_id,sub_cat_name,cat_name) values('$cat_id','$subname','$catname')";
mysqli_query($conn,$query);

   header("location:manage_sub category.php");
}
?>

<?php
// ==================================== Delete  

if(isset($_GET['iddelete'])){
$id=$_GET['iddelete'];
$query= "DELETE FROM sub_category where sub_id= {$id}";
if(mysqli_query($conn,$query));

header('location:manage_sub category.php');
}

?>
<?php
//Code for Ediet

if(isset($_GET['idediet'])){
   
    $id=$_GET['idediet'];
$query="SELECT * FROM sub_category where sub_id= {$id}";
$result=mysqli_query($conn,$query);
$cat=mysqli_fetch_assoc($result);


}

if(isset($_POST['sub2'])){
    $id=$_GET['idediet'];

    $catid =$_POST['catid'];
    $catname =$_POST['catname'];
    $subname =$_POST['sub-name'];
    
 
    $query="UPDATE sub_category SET cat_name='$catname',
                                    cat_id='$catid',
                                    sub_cat_name='$subname'
                             where sub_id= {$id} ";
    mysqli_query($conn,$query);
   // header("location:manage_category.php");
    }


?>



<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Add Sub category</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Sub Category</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post"  enctype="multipart/form-data">
                                          
                                            <?php
                                          echo  '<div class="form-group has-success">';
                                          echo      '<label for="cc-name" class="control-label mb-1">Category ID </label>';
                                          echo      '<select id="cc-id" name="catid" select="selected"  class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on category">';
                                               
                                            $query="SELECT * FROM category";
                                            $result=mysqli_query($conn,$query);
                                            while($catname= mysqli_fetch_assoc($result)){

                                                echo '<option>' . $catname['cat_id'] .' - '. $catname['cat_name'].'</option>';
                                            }
                                              echo  '</select>';
                                               
                                            echo   '</div>';

                                            ?>
                                            
                                            <?php
                                          echo  '<div class="form-group has-success">';
                                          echo      '<label for="cc-name" class="control-label mb-1">Category Name </label>';
                                          echo      '<select id="cc-id" name="catname"   class="form-control cc-name valid" data-val="true" required>';
                                                   
                                            $query="SELECT * FROM category";
                                            $result=mysqli_query($conn,$query);
                                            while($catname= mysqli_fetch_assoc($result)){

                                                echo '<option >'. $catname['cat_name'].'</option>';
                                            }
                                              echo  '</select>';
                                               
                                            echo   '</div>';

                                            ?>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Sub- Name </label>
                                                <input id="cc-name" name="sub-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on category"
                                                    autocomplete="cc-name" required value="<?php if(isset($_GET['idediet'])){echo $cat['sub_cat_name'] ;}?>">
                                                                                                                  
                                            </div>

                                            
                                          <!--  <div class="form-group">
                                                <label for="cc-img" class="control-label mb-1">Category image</label>
                                                <input id="cc-img" name="imgg" type="file" class="form-control cc-number identified visa" value="<?php //if(isset($_GET['idediet'])){ echo $cat['cat_image'] ;} ?>"> 
                                                 
                                                
                                            </div>-->
                                            
                                           
                                                
                    
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="sub" style=" 
                                                <?php  
                                                    if(isset($_GET['idediet'])) echo 'display:none;';
                                                    else echo 'display: block;';
                                                         ?>
                                                         ">
                                                    <span id="payment-button-amount">Add</span>
                                                    
                                                </button>
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="sub2" style="
                                                <?php  
                                                    if(isset($_GET['idediet'])) echo 'display:block;';
                                                    else echo 'display: none;';
                                                         ?>
                                                         ">
                                                    <span id="payment-button-amount">update</span>
                                                    
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

<!--list of categories -->

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                      <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <h2>List Of Categories</h2>
                                        <thead>
                                            <tr>
                                                <th>Sub-ID</th>
                                                <th>Category-Name</th>
                                                <th>sub-name</th>
                                               <!-- <th>image</th>-->
                                                <th>Ediet category</th>
                                                <th>Delete category</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        <?php
                                        
                                       $query="SELECT * FROM sub_category";
                                       $result=mysqli_query($conn,$query);
                                       while($category= mysqli_fetch_assoc($result)){

                                            
                                
                                             echo  '<tr>';
                                             echo    "<td>{$category['sub_id']}</td>";
                                             echo    "<td>{$category['cat_name']}</td>";
                                             echo    "<td>{$category['sub_cat_name']}</td>";
                                           //  echo    "<td><img src='images/category/{$category['cat_image']}' style='width:80px;height:60px;'></td>";
                                            
                                            
                                         echo   "<td><a href='manage_sub category.php?idediet={$category['sub_id']}'><i class='fa fa-edit' style='font-size:36px'></a></i></td>";
                                         echo   "<td><a href='manage_sub category.php?iddelete={$category['sub_id']}'><i class='fa fa-trash-o' style='font-size:36px;color:red'></a></i></td>";
                                         echo '</tr>';
                                           
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