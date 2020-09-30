<?php
session_start();
unset($_SESSION['idcus']);
header('location:index.php');

?>