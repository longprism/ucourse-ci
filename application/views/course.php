  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <a href="<?php echo base_url() ?>" class="btn btn-outline-primary rounded-circle">
            <span class="fa fa-arrow-left"></span>
          </a>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content container">
      <!-- Default box -->
      <div class="card">
        <div class="card-header p-2">
          <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" href="#material" data-toggle="tab">Material</a></li>
          <li class="nav-item"><a class="nav-link" href="#task" data-toggle="tab">Task</a></li>
          </ul>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="tab-content">
                <div class="tab-pane active" id="material">
                  <div class="col-12">
                    <?php $i =1; ?>
                    <?php foreach ($materi as $m) { ?>
                    <a class="mb-2" href="<?php echo base_url() ?>course/module/<?php echo $coursedetail[0]->idcourse ?>/<?php echo $m->idmateri ?>">
                      <div class="info-box info-hover">
                        <div class="info-box-content" style="background-color:">
                          <span class="info-box-text">Module <?php echo $i++." - ".$m->nmmateri ?></span>
                        </div>
                        <span class="fa fa-arrow-right my-auto mr-3"></span>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </a>
                    <?php } ?>
                  </div>
                  <!-- /.col -->
                </div>
                <div class="tab-pane" id="task">
                  <div class="col-12">
                    <?php foreach ($task as $t) { ?>
                    <a class="mb-2" href="<?php echo base_url() ?>course/task/<?php echo $coursedetail[0]->idcourse ?>/<?php echo $t->idtask ?>">
                      <div class="info-box info-hover">
                        <div class="info-box-content" style="background-color:">
                          <span class="info-box-text">Task - <?php echo $t->nmtask ?></span>
                        </div>
                        <span class="fa fa-file-alt my-auto mr-3"></span>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </a>
                    <?php } ?>
                  </div>
                  <!-- /.col -->
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><?php echo $coursedetail[0]->nmcourse ?></h3>
              <p class="text-muted text-justify"><?php echo $coursedetail[0]->descr ?></p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Course Owner
                  <b class="d-block"><?php echo $coursedetail[0]->fullname ?></b>
                </p>
                <p class="text-sm">Creation Date
                  <b class="d-block"><?php echo $coursedetail[0]->date_created ?></b>
                </p>
              </div>

              <h5 class="mt-5 text-muted">Course Detail</h5>
              <ul class="list-unstyled">
                <li>
                  <span class="btn-link text-secondary">
                    <i class="far fa-fw fa-user"></i> 
                    <?php echo $studentcount ?> Students
                  </span>
                </li>
                <li>
                  <span class="btn-link text-secondary">
                    <i class="far fa-fw fa-copy"></i> 
                    <?php echo $taskcount ?> Learning Materials
                  </span>
                </li>
                <li>
                  <span class="btn-link text-secondary">
                    <i class="fa fa-fw fa-paperclip"></i>
                    <?php echo $matericount ?> Task Assignments
                  </span>
                </li>
              </ul>
              <div class="text-center mt-5 mb-3">
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
