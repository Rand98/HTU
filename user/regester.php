<?php

include ('../config/db.php');

if(isset($_POST['submit'])){
$email = trim($_POST['email']);
$password = md5($_POST['psw']);
$mobile = trim($_POST['mobile']);
$addr =trim($_POST['address']);

$name = trim($_POST['name']);
if(empty($_POST['name'])){
  $a= 'empty name ';
  }
 elseif (!preg_match("/^[a-zA-Z-' ]*$/",($_POST['name']))) {

    $b= "Only letters and white space allowed";
  }
else{
$query="INSERT INTO `customer`(`cun_name`, `cus_email`, `cus_pass`, `mobile`, `addresss`) VALUES ('$name','$email','$password','$mobile','$addr')";

$result=mysqli_query($conn,$query);


header('location:login.php');
}

}





?>







<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-img {
  /* The image used */
  background-image: url("ty.jpg");

  min-height: 750px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  background-color:#F8F8FF;
}

/* Add styles to the form container */
.container {
  position: absolute;
  right: 0;
  margin: 100px;
  margin-right:360px;
  max-width: 700px;
   
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] ,input[type=email]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
input[type=text]:focus{
    background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  border-radius: 29px;
  font-size:20px;
}

.btn:hover {
  opacity: 1;
}
a{
    color:red;
}
.error{
  color:red;
}
</style>
</head>
<body>


<div class="bg-img">
  <form action="" class="container" method="post">
    <h1>Sign Up</h1>
        
    
    <label for="email"><b>Name</b></label>
    <p class="error"><?php  if(isset($a)) echo $a;?><?php if(isset($b)) echo $b;?></p>
    <input type="text" placeholder="Enter your name" name="name" >
    

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="email"><b>Mobile</b></label>
    <input type="text" placeholder="mobile number" name="mobile" required>

    <label for="email"><b>Address</b></label>
    <input type="text" placeholder="fill an address" name="address" required>


    <button type="submit" class="btn" name="submit">Register</button><br>
    <div>
    
    </div>
  </form>
</div>



</body>
</html>