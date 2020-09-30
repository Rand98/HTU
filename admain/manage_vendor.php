<?php
ob_start();
include ('../includes/admain-header.php');
include ('../config/db.php');

//insert new  vendor 
if(isset($_POST['submit'])){

    $vendorname    =$_POST['vname'];
    $vendoremail   =$_POST['vemail']; 
    $vpassword     =md5($_POST['pass']);

    
    if(empty($_POST['vname'])){
        $a= 'empty name ';
        }
       elseif(!preg_match("/^[a-zA-Z-' ]*$/",($_POST['vname']))) {

       $b= "Only letters and white space allowed";
          }
       elseif(empty($_POST['vemail'])){
  
           $c= 'empty email ';
       } 
    elseif(empty($_POST['pass'])){
        
          $d= 'empty pass';
          } 

  else {
    $query="INSERT INTO vendor(vendor_email,vendor_pass,fullname) values('$vendoremail','$vpassword','$vendorname')";
    mysqli_query($conn,$query);
    
    header('location:manage_vendor.php');
    }//end else
    
      }//=========================================end of insert prosess

?>
<?php
//Delete vendor and delete his products

if(isset($_GET['iddelete'])){
    $id=$_GET['iddelete'];
    $query= "DELETE FROM vendor where vendor_id= {$id}";
    if(mysqli_query($conn,$query));
    $query3= "DELETE FROM products where vendor_id= {$id}";
    if(mysqli_query($conn,$query3));
    header("location:manage_vendor.php");
    
    }


?>

<?php
//UPdate

if(isset($_GET['idediet'])){
    $id=$_GET['idediet'];
    $query="SELECT * FROM vendor where vendor_id= {$id}";
    $result=mysqli_query($conn,$query);
    $v=mysqli_fetch_assoc($result);

}

if(isset($_POST['sub2'])){
    $id=$_GET['idediet'];

    $vendorname    =$_POST['vname'];
    $vendoremail   =$_POST['vemail']; 
    $vpassword     =md5($_POST['pass']);
    
 
    $query="UPDATE  vendor SET fullname ='$vendorname',
                               vendor_pass= '$vpassword',
                               vendor_email= '$vendoremail'
                               where vendor_id= {$id}";
    mysqli_query($conn,$query);
    header("location:manage_vendor.php");

    }//End Updated





?>
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Add new Vendor</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">New Vendor</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post"  enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Vendor Name</label>
                                                <input  name="vname" required  id="cc-name" type="text"  class="form-control"  value="<?php if(isset($_GET['idediet'])){echo $v['fullname'] ;}?> " >
                                               
                                               <p class="error"><?php if(isset($a)) echo $a;?><?php if(isset($b)) echo $b;?></p>
                                            </div>

                                            
                                            
                                          <div class="form-group has-success">
                                             <label for="cc-name" class="control-label mb-1">Vendor Email </label>
                                            <input type="email" id="cc-id" name="vemail"   class="form-control cc-name valid" value="<?php if(isset($_GET['idediet'])){echo $v['vendor_email'] ;}?>" required="">
                                            <p class="error"><?php if(isset($c)) echo $c;?></p>     
                                               </div>
                                               
                                               <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1" required>Set Password</label>
                                                
                                            <input  id="cc-pass" name="pass" type="password" class="form-control"   value="<?php if(isset($_GET['idediet'])){echo $v['vendor_pass'] ;}?>"required>
                                            <p class="error"><?php if(isset($d)) echo $d;?></p>
                                            </div>

                                           
                                            
                                        
                                             

                                                
                    
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit" style="
                                                    
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
                                                    <span id="payment-button-amount">UPDATE</span>
                                                    
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

          <!-- ============================== List of Vindores ================ -->
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                      <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <h2>List Of Vendores</h2>
                                        <thead>
                                            <tr>
                                                <th>Vendor id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                        
                                               <!-- <th>Password</th>-->
                                               
                                                <th>Edit & Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                        <?php
                                            $query="SELECT * FROM vendor";
                                            $result=mysqli_query($conn,$query);
                                            //WHERE cat_id=$pro['cat_id']
                                            
                                            while($vendor= mysqli_fetch_assoc($result)){
                                                
                                               
                                                
                                         echo ' <tr>';
                                         echo  "<td>{$vendor['vendor_id']}</td>";
                                         echo "<td>{$vendor['fullname']}</td>";
                                         
                                         echo "<td>{$vendor['vendor_email']}</td>";
                                      //   echo  "<td>{$vendor['vendor_pass']}</td>";
                                        
                                         echo  "<td><a href='manage_vendor.php?idediet={$vendor['vendor_id']}'><i class='fa fa-edit' style='font-size:36px'></i></a>
                                                    <a href='manage_vendor.php?iddelete={$vendor['vendor_id']}'><i class='fa fa-trash-o' style='font-size:36px;color:red'></a></i>
                                         </td>";
                                         
                                              
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




<?php
include ('../includes/admain-footer.php');
?>