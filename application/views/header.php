<?php
  if (!isset($user)) {
    $user=null;
  }
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>U-Course</title>

  <link rel="icon" href="<?php echo base_url(); ?>imgs/logoclean.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/adminlte.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/summernote/summernote-bs4.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/dropzone/min/dropzone.min.css">
</head>
<style type="text/css">
  .class-bg {        
    background-position: center;
    background-size: cover;
  }
  .info-hover:hover {
    outline: solid 1px #007bff;
    outline-style: groove;
  }
  .no-decor {
    text-decoration: none;
  }
</style>
<body class="hold-transition layout-top-nav layout-footer-fixed layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-primary navbar-dark">
    <div class="container">
      <a href="<?php echo base_url(); ?>home" class="navbar-brand">
        <img src="<?php echo base_url(); ?>imgs/logoclean.png" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .8">
        <span class="brand-text font-weight-light">U-Course</span>
      </a>

      <!-- <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index3.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Contact</a>
          </li>
        </ul>
      </div> -->

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto" id="navbarCollapse">
        <?php if ($user==null) { ?>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>login" class="nav-link">Login</a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>register" class="nav-link">Register</a>
        </li>
        <?php } else { ?>
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url(); ?>imgs/<?php echo $user[0]->pprofile; ?>" class="user-image img-circle elevation-2" alt="User Image">
            <span class="d-none d-md-inline"><?php echo $user[0]->username; ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-primary">
            <img src="<?php echo base_url(); ?>imgs/<?php echo $user[0]->pprofile; ?>" class="img-circle elevation-2" alt="User Image">
        
              <p>
              <?php echo $user[0]->fullname; ?> - <?php echo $user[0]->profesi; ?>
                <small>Joined in <?php echo $user[0]->date_joined; ?></small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <a href="#" class="btn btn-default btn-flat">Profile</a>
              <a href="<?php echo base_url(); ?>home/logout/<?php echo $user[0]->username; ?>" class="btn btn-default btn-flat float-right">Sign out</a>
            </li>
          </ul>
        </li>
        <?php } ?>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

