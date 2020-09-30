<?php
ob_start();
include ('../includes/admain-header.php'); 
include ('../config/db.php');
//===================================insert new  category 
if(isset($_POST['sub'])){

//Add
  
    
     $image_name=$_FILES['imgg']['name'];
     $tmp_name= $_FILES['imgg']['tmp_name'];
     $img_type  = $_FILES['imgg']['type'];
    // $path='images/category/';

     $allowed_type = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');
     
     



     
     $catname =$_POST['category-name'];
     //I get the image from $image_name;
     $catdesc =$_POST['descreption'];

     if(empty($_POST['category-name'])){
        $a= 'empty name ';
        }
        
    if(empty($_POST['descreption'])){
        
          $d= 'empty description';
          } 

   if(!in_array($img_type, $allowed_type)) {
            echo 'error';
           
        } 

  else {


    $path='images/category/'; 
    move_uploaded_file($tmp_name,$path.$image_name);
$query="INSERT INTO category(cat_name,cat_image,cat_desc) values('$catname','$image_name','$catdesc')";
mysqli_query($conn,$query);

   header("location:manage_category.php");
}
}//submit
?>

<?php
// ==================================== Delete  

if(isset($_GET['iddelete'])){
$id=$_GET['iddelete'];
$query= "DELETE FROM category where cat_id= {$id}";
if(mysqli_query($conn,$query));
//unlike('images/category/'.$image_name);
$query= "DELETE FROM products where cat_id= {$id}";
if(mysqli_query($conn,$query));
header('location:manage_category.php');
}

?>
<?php
//Code for Ediet

if(isset($_GET['idediet'])){
   
$id=$_GET['idediet'];
$query="SELECT * FROM category where cat_id= {$id}";
$result=mysqli_query($conn,$query);
$cat=mysqli_fetch_assoc($result);
echo "<br><br><br>";

}

if(isset($_POST['sub2'])){
    $id=$_GET['idediet'];

    $catname =$_POST['category-name'];
    $image_name =$cat['cat_image'];
 if($_FILES['imgg']['error']==0){
  $image_name=$_FILES['imgg']['name'];
  $tmp_name= $_FILES['imgg']['tmp_name'];
  $path='images/category/';
  
  move_uploaded_file($tmp_name,$path.$image_name);
 }
    $query="UPDATE category SET cat_name='$catname',
                                cat_image='$image_name'
                             where cat_id= {$id} ";
    mysqli_query($conn,$query);
  
    }


?>



<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Add new category</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">New Category</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                         
                                            <div class="form-group has-success">
                                            <p class="error"><?php if(isset($a)) echo $a;?></p>
                                                <label for="cc-name" class="control-label mb-1">Category- Name </label>
                                                <input id="cc-name" required  name="category-name" type="text" class="form-control cc-name valid" data-val="true" 
                                                        value="<?php if(isset($_GET['idediet'])){echo $cat['cat_name'] ;}?>">
                                                                                                                  
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-img" class="control-label mb-1">Category image</label>
                                                <input id="cc-img" name="imgg" type="file" class="form-control cc-number identified visa" value="<?php if(isset($_GET['idediet'])){ echo $cat['cat_image'] ;} ?>"> 
                                                 <span><?php if(isset($_GET['idediet'])) echo($cat['cat_image']);?><?php if(isset($error)) echo $error;?></span>
                                                
                                            </div>
                                            <div class="form-group">
                                            <p class="error"><?php if(isset($d)) echo $d;?></p>
                                                <label for="cc-img" class="control-label mb-1">Category description</label>
                                                <input id="cc-img" name="descreption" type="text" class="form-control cc-number identified visa" value="<?php if(isset($_GET['idediet'])){ echo $cat['cat_desc'] ;} ?>"> 
                                                 
                                                
                                            </div>
                                           
                                                
                    
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="sub"  style="
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
                                                    if(isset($_GET['idediet']))
                                                     echo 'display:block;';
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
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>image</th>
                                                <th>Ediet category</th>
                                                <th>Delete category</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        <?php
                                        
                                       $query="SELECT * FROM category";
                                       $result=mysqli_query($conn,$query);
                                       while($category= mysqli_fetch_assoc($result)){

                                            
                                
                                             echo  '<tr>';
                                             echo    "<td>{$category['cat_id']}</td>";
                                             echo    "<td>{$category['cat_name']}</td>";
                                             echo    "<td><img src='images/category/{$category['cat_image']}' style='width:80px;height:60px;'></td>";
                                            
                                            
                                         echo   "<td><a href='manage_category.php?idediet={$category['cat_id']}'><i class='fa fa-edit' style='font-size:36px'></a></i></td>";
                                         echo   "<td><a href='manage_category.php?iddelete={$category['cat_id']}'><i class='fa fa-trash-o' style='font-size:36px;color:red'></a></i></td>";
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
