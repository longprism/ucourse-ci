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
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/adminlte.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/summernote/summernote-bs4.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/dropzone/min/dropzone.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?php echo base_url(); ?>" class="h1">
      <img src="<?php echo base_url(); ?>imgs/logo.png" alt="" style="width: 30%">  
    </a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register new account</p>

      <div class="alert alert-danger alert-dismissible" style="display: <?php echo ($msg==3)?'':'none' ?>">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        Couldn't upload file!
      </div>
      <div class="alert alert-danger alert-dismissible" style="display: <?php echo ($msg==2)?'':'none' ?>">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        Couldn't register account!
      </div>
      <div class="alert alert-danger alert-dismissible" style="display: <?php echo ($msg==1)?'':'none' ?>">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        Username already used!
      </div>

      <form enctype="multipart/form-data" action="<?php echo base_url() ?>register/validation" method="post">
        <div class="input-group mb-3">
          <input name="username" type="text" class="form-control" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="fullname" type="text" class="form-control" placeholder="Fullname" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="far fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 date" id="birthdate1" data-target-input="nearest">
          <input name="birthdate" type="text" class="form-control datetimepicker-input" data-target="#birthdate1" placeholder="Birthdate" required/>
          <div class="input-group-append" data-target="#birthdate1" data-toggle="datetimepicker">
            <div class="input-group-text">
              <i class="fa fa-calendar"></i>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="profession" type="text" class="form-control" placeholder="Profession" required >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-user-tie"></span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="education" class="form-control" rows="3" placeholder="Education" required></textarea>
        </div>
        <div class="input-group mb-3">
          <input name="origin" type="text" class="form-control" placeholder="Place of Origin" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-home"></span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="skills" class="form-control" rows="3" placeholder="Skills" required></textarea>
        </div>
        <div class="form-group">
          <div class="custom-file">
            <input name="avatar" type="file" class="custom-file-input" id="pprofile" required>
            <label class="custom-file-label" for="pprofile">Choose Avatar</label>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <p class="mb-1 text-center">
        <a href="">Back</a>
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
<!-- InputMask -->
<script src="<?php echo base_url(); ?>plugins/moment/moment.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url();?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- dropzonejs -->
<script src="<?php echo base_url(); ?>plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
<script text="type/javascript">
  //Date picker
  $('#birthdate1').datetimepicker({
      format: 'L'
  });
  $("input[name='username']").keypress(function( e ) {
  if(e.which === 32) 
      return false;
  });
</script>
</body>
</html>
