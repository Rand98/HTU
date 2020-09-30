<?php
define('DB_HOST','127.0.0.1');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_NAME','htu project');

$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if ($conn->connect_errno) {
 echo "cannot connect " . $mysqli->connect_error;
}
//Or 
/*$conn = mysqli_connect("localhost","root","","htu");
if(!$conn){
    die("cannot coonect to server");
}*/