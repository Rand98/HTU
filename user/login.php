<?php
session_start();/////// Don't forget it
include ('../config/db.php');

if(isset($_POST['submit'])){
$email = trim($_POST['email']);
$password = md5($_POST['psw']);
$query = "SELECT * from customer where  cus_email = '{$email}' and cus_pass='{$password}'";


//$row  = get_data($query);
$result=mysqli_query($conn,$query);
$row1=mysqli_fetch_assoc($result);

if(!empty($row1['cus_id'])){
$_SESSION['idcus']=$row1['cus_id'];
//echo $_SESSION['idc'];
header('location:checkout.php');
} else {
    $error="Admin Not Exiest";
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
  /* The image used 
  background-image: url("99.jpg");*/

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
  margin-right:390px;
  max-width: 700px;
  
  padding: 16px;
  background-color: white;


  
/*
  width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;*/
}

/* Full-width input fields */
input[type=text], input[type=password] ,input[type=email]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: white;
}

input[type=text]:focus, input[type=password]:focus {
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
  font-size:20px;
  opacity: 0.9;
  border-radius: 29px;
}

.btn:hover {
  opacity: 1;
}
a{
    color:red;
}
</style>
</head>
<body>


<div class="bg-img">
  <form action="" class="container" method="post">
    <h1>Login</h1>
    
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" class="btn" name="submit">Login</button><br>
    <div><br>
    Don't you have account?<a href="regester.php"> Sign Up Here</a>
    </div>
  </form>
</div>




