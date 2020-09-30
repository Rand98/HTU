<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
<style>
.error{
    color:red;
}
</style>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
           <!-- HEADER MOBILE-->
           <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                           
                        </li>
                        <li>
                            <a href="manage_admain.php">
                                <i class="fas fa-chart-bar"></i>Manage Admain</a>
                        </li>
                        <li>
                            <a href="manage_vendor.php">
                                <i class="fas fa-chart-bar"></i>Manage vendor</a>
                        </li>
                        <li>
                            <a href="manage_category.php">
                                <i class="fas fa-chart-bar"></i>Manage category</a>
                        </li>
                        <li>
                            <a href="manage_sub category.php">
                                <i class="fas fa-chart-bar"></i>Manage sub-category</a>
                        </li>
                        <li>
                            <a href="manage_product.php">
                                <i class="fas fa-chart-bar"></i>Manage product</a>
                        </li>
                        
                        </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            </li>
                                
                       
                        <li>
                            <a href="manage_admain.php">
                                <i class="fas fa-chart-bar"></i>Manage Admin</a>
                        </li>
                        <li>
                            <a href="manage_vendor.php">
                                <i class="fas fa-chart-bar"></i>mange_vendor</a>
                        </li>
                        <li>
                            <a href="manage_category.php">
                                <i class="fas fa-chart-bar"></i>Manage Category</a>
                        </li>
                        <li>
                            <a href="manage_sub category.php">
                                <i class="fas fa-chart-bar"></i>Manage Sub-Category</a>
                        </li>
                        <li>
                            <a href="manage_product.php">
                                <i class="fas fa-chart-bar"></i>Manage product</a>
                        </li>
                        <!--<li>
                            <a href="listofproducts.php">
                                <i class="fas fa-chart-bar"></i>List of product</a>
                                manage_product.php
                        </li>-
                        <li>
                            <a href="manage_users.php">
                                <i class="fas fa-chart-bar"></i>Manage Customers</a>
                        </li>-->
                        
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                       <!--     <img src="images/icon/avatar-01.jpg" alt="John Doe" />-->
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['adname'] ;?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                            <!--        <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />-->
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $_SESSION['adname'] ;?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $_SESSION['ademail'] ;?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                              <!--      <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>-->
                                                </div>
                                                <div class="account-dropdown__item">
                                             <!--       <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>-->
                                                </div>
                                                <div class="account-dropdown__item">
                                               <!--     <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>-->
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->