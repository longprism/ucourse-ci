<?php
  if (!isset($user)) {
    $user=null;
  }
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8 mt-lg-0 mt-sm-4">
            <h2 class="text-center display-5 mb-4">Search more than 1,000 courses</h2>
            <div class="row mb-4">
              <div class="col-md-8 offset-md-2">
                <div class="input-group">
                  <input id="searchhome" onkeyup="searchFunc()" type="search" class="form-control form-control-lg" placeholder="Type your keywords here">
                </div>
              </div>
            </div>
            <div class="row" id="rowcatalog">
              <?php foreach ($course as $c) { ?>
              <div class="col-sm-4 mb-3 coursecat">
                <div class="class-bg position-relative p-3 pr-4 bg-gray" 
                style="height: 180px;background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), 
                url('<?php echo base_url(); ?>imgs/<?php echo $c->imgcover ?>');">
                  <div class="ribbon-wrapper ribbon">
                    <div class="ribbon bg-<?php echo $c->color ?>">
                      <?php echo $c->specialty ?> 
                    </div>
                  </div>
                  <?php echo $c->nmcourse ?> <br />
                  <small><?php echo $c->fullname ?></small><br />
                  <?php if (isset($user)) { ?>
                    <?php if ($c->userincourse == $user[0]->username && $c->userisjoined == true) { ?>
                      <a href="<?php echo base_url() ?>course/index/<?php echo $c->thisidc ?>" class="btn btn-xs btn-success">Open</a>
                    <?php } else { ?>
                      <?php if ($c->userincourse == $user[0]->username && $c->userisjoined == false) { ?>
                        <a href="javascript:void(0)" class="btn btn-xs btn-secondary disabled">Waiting Approval</a>
                      <?php } else { ?>
                        <form id="joinform" action="<?php echo base_url() ?>home/join" method="POST">
                          <input type="hidden" name="username" value="<?php echo $user[0]->username ?>">
                        </form>
                        <button form="joinform" type="submit" name="join1" value="<?php echo $c->thisidc ?>" class="btn btn-xs btn-info">
                          Join Class
                        </button>
                      <?php } ?>
                    <?php } ?>
                    <?php if ($c->owner == $user[0]->username) { ?>
                      <a href="<?php echo base_url() ?>dashboard/course/<?php echo $c->thisidc ?>" class="btn btn-xs btn-danger">Manage</a>
                    <?php } ?>
                  <?php } ?>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
          <!-- /.col-md-7 -->
          <div class="col-lg-4 mt-lg-0 mt-sm-4">
            <?php if ($user==null) { ?>              
            <div class="alert alert-info alert-dismissible">                
                <h5><i class="icon fas fa-info"></i>Hey there, newcomers!</h5>
                You currently signed as guest. <a href="<?php base_url() ?>login">Login</a> 
                or <a href="<?php base_url() ?>register">Register</a> to use our features!
            </div>
            <?php } else { ?>
            <div class="card card-success card-outline">
              <div class="card-body">
                <h6 class="card-title mb-2">Welcome to Ucourse, <?php echo $user[0]->username ?>!</h6>
                <p class="card-text">Let's get started by picking any courses you liked. 
                  Just click any course on the left and wait for your teacher to accept you!
                </p>
              </div>
            </div>
            <?php if (!$user[0]->is_teacher) { ?>
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Join us!</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title mb-2">Feeling like sharing your knowledge? </h6>          
                <p class="card-text">Click button down below to get started and make your very own course!</p>
                <a href="<?php base_url() ?>home/be_lecturer/<?php echo $user[0]->username ?>" class="btn btn-primary">
                  Sign up as Lecturer
                </a>
              </div>
            </div>
            <?php } elseif ($user[0]->is_teacher)  { ?>
            <div class="card card-danger card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Teacher Dashboard</h5>
              </div>
              <div class="card-body">
                <p class="card-text">Oh hey, you're a teacher! Click button below to create and manage your courses</p>
                <a href="<?php base_url() ?>dashboard" class="btn btn-danger">Go To Dashboard</a>
              </div>
            </div>
            <?php } ?>
            <?php } ?>
            <!-- PRODUCT LIST -->
            <?php if ($user!=null || isset($attended)) { ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Attended Course</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  <?php foreach ($attended as $at) { ?>
                  <li class="item">
                    <div class="product-img">
                      <img src="<?php echo base_url(); ?>imgs/<?php echo $at->imgcover ?>" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="<?php echo base_url(); ?>course/index/<?php echo $at->idcourse ?>" class="product-title"><?php echo $at->nmcourse ?>
                        <span class="badge badge-success float-right">Joined</span></a>
                      <span class="product-description">
                      <?php echo $at->fullname ?>
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                  <?php } ?>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <?php } ?>
          </div>
          <!-- /.col-md-5 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

