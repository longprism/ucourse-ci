<?php
  if (isset($msg)) {
    $msg=$msg;
  } else {
    $msg = null;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>U-Course</title>

  
  <link rel="icon" href="<?php echo base_url(); ?>imgs/logo.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url(); ?>imgs/logo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1">
      <img src="<?php echo base_url(); ?>imgs/logo.png" alt="" style="width: 30%">  
    </a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Log in to proceed!</p>

      <div class="alert alert-danger alert-dismissible" style="display: <?php echo ($msg==2)?'':'none' ?>">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        Wrong Password!
      </div>
      <div class="alert alert-danger alert-dismissible" style="display: <?php echo ($msg==1)?'':'none' ?>">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        Username not found!
      </div>

      <form action="<?php echo base_url()?>login/validation" method="post">
        <div class="input-group mb-3">
          <input name="username" type="text" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1 text-center">
        <a href="<?php echo base_url() ?>register">Haven't signed yet? Click here to sign up!</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
</body>
</html>
