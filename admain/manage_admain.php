<?php
ob_start();
include ('../includes/admain-header.php'); 
include ('../config/db.php');

//insert new  admain 
if(isset($_POST['submit'])){
$fullname =$_POST['fullname'];
$email    =$_POST['email'];
$password =md5($_POST['password']);

if(!preg_match("/^[a-zA-Z-' ]*$/",($_POST['fullname']))) {

    $b= "Only letters and white space allowed";
       } else{


$query="INSERT INTO admin(admin_email,admin_pass,fullname) values('$email','$password','$fullname')";
mysqli_query($conn,$query);

header('location:manage_admain.php');
//echo $fullname ,$email ,$password ;
       }//else
}//=========================================end of insert prosess

 ?>
<?php 
//delete
if(isset($_GET['iddelete'])){
$id=$_GET['iddelete'];
$query= "DELETE FROM admin where admin_id= {$id}";
if(mysqli_query($conn,$query));
header("location:manage_admain.php");

}
?>
<?php
//ediet

echo '<br><br><br>';
if(isset($_GET['idediet'])){
    $id=$_GET['idediet'];
    $query="SELECT * FROM admin where admin_id= {$id}";
    $result=mysqli_query($conn,$query);
    $admin=mysqli_fetch_assoc($result);

}

if(isset($_POST['sub2'])){
    $id=$_GET['idediet'];

    $fullname =$_POST['fullname'];
    $email    =$_POST['email'];
    $password =md5($_POST['password']);

 
    $query="UPDATE  admin SET admin_email ='$email',
                              admin_pass= '$password',
                              fullname='$fullname'
                                    where admin_id= {$id}";
mysqli_query($conn,$query);
header("location:manage_admain.php");

    }//End Updated

?>
                              <!------------------ Form----------------------->
<div class="main-content">
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Admian Form</div>
                                    <div class="card-body card-block">
                                        <form action="#" method="post" class="">
                                            <div class="form-group">
                                            <p class="error"><?php if(isset($b)) echo $b;?></p>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>                                                     
                                                    </div>                                                  
                                                    <input type="text" id="username" required name="fullname" placeholder="Fullname" class="form-control" value="<?php if(isset($_GET['idediet'])){echo $admin['fullname'] ;}?>">
                                                 
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                    <input type="email" id="email" required name="email" placeholder="Email" class="form-control" value="<?php if(isset($_GET['idediet'])){echo $admin['admin_email'] ;}?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-asterisk"></i>
                                                    </div>
                                                 
                                                    <input type="password" id="pass" required name="password" placeholder="Password" class="form-control" value="<?php if(isset($_GET['idediet'])){echo $admin['admin_pass'] ;}?>">
                                                </div>
                                            </div>
                                            <div class="form-actions form-group">
                                                <button type="submit" class="btn btn-success btn-sm" name="submit" style="
                                                 <?php  
                                                    if(isset($_GET['idediet'])) echo 'display:none;';
                                                    else echo 'display: block;';
                                                         ?>
                                                         ">
                                                
                                                Submit</button>
                                            </div>
                                            <div class="form-actions form-group">
                                                <button type="submit" class="btn btn-success btn-sm" name="sub2" style="
                                                 <?php  
                                                    if(isset($_GET['idediet'])) echo 'display:block;';
                                                    else echo 'display: none;';
                                                         ?>
                                                         ">
                                                
                                                Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
</div>
</div>
<div>
    <div>
                           
       <!-- VIEW ADMINS-->                   
       <div class="main-content">
           
        -       <div class="section__content section__content--p30">
                    <div class="container-fluid">
                      <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <h2>Admins List</h2>
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Edite</th>
                                                <th>Delete</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                       $query="SELECT * FROM admin";
                                       $result=mysqli_query($conn,$query);
                                       while($admin= mysqli_fetch_assoc($result)){

                                            
                                
                                             echo  '<tr>';
                                             echo     "<td>{$admin['admin_id']}</td>";
                                             echo    "<td>{$admin['fullname']}</td>";
                                             echo    "<td>{$admin['admin_email']}</td>"; 
                                             echo    "<td ><a href='manage_admain.php?idediet={$admin['admin_id']}'><i class='fa fa-edit' style='font-size:36px'></i></a></td>";
                                             echo    "<td><a href='manage_admain.php?iddelete={$admin['admin_id']}'><i class='fa fa-trash-o' style='font-size:36px;color:red'></a></i></td>";
                                             
                                             echo  '</tr>';
                                            //header('location:manage_admain.php');
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


            
                                    
                        