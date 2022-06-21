  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <a href="<?php echo base_url() ?>dashboard" class="btn btn-outline-primary rounded-circle">
            <span class="fa fa-arrow-left"></span>
          </a>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#detail" data-toggle="tab">Course Detail</a></li>
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Student Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#materials" data-toggle="tab">Materials</a></li>
                  <li class="nav-item"><a class="nav-link" href="#task" data-toggle="tab">Task</a></li>
                  <li class="nav-item"><a class="nav-link" href="#permission" data-toggle="tab">Permission</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="detail">
                    <h3 class="text-Secondary mb-3"><?php echo $courseadmin[0]->nmcourse ?></h3>
                    <div class="text-muted">
                      <p class="text-sm"><?php echo $courseadmin[0]->date_created ?>
                        <b class="d-block"><?php echo $courseadmin[0]->fullname ?></b>
                      </p>
                    </div>
                    <p class="text-muted"><?php echo $courseadmin[0]->descr ?></p> 
                  </div>
                  <div class="tab-pane" id="activity">
                    <table class="table table-hover text-nowrap projects">
                      <thead>
                        <tr>
                          <th style="width: 3%"></th>
                          <th>Name</th>
                          <th>Task</th>
                          <th>Submitted At</th>
                          <th>File</th>
                          <th>Grade</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($donetask as $dt) { ?>
                        <tr>
                          <td>
                            <ul class="list-inline">
                              <li class="list-inline-item">
                                <img alt="Avatar" class="table-avatar" src="<?php echo base_url(); ?>imgs/<?php echo $dt->pprofile ?>">
                              </li>
                            </ul>
                          </td>
                          <td><?php echo $dt->fullname ?></td>
                          <td><?php echo $dt->nmtask ?></td>
                          <td><span class="tag tag-success"><?php echo $dt->submitted_at ?></span></td>
                          <td><a href="<?php echo base_url(); ?>dashboard/download/<?php echo $dt->file_name ?>" class="link-white text-sm">
                            <i class="fas fa-link mr-1"></i>
                            <?php echo $dt->file_name ?></a>
                          </td>
                          <?php if (!$dt->graded) { ?>
                          <td>
                            <form action="<?php echo base_url() ?>dashboard/grading/<?php echo $dt->idcourse ?>" method="post">
                              <div class="input-group">
                                <input name="taskgrade" type="text" class="form-control form-control-sm" style="max-width: 100px;" 
                                maxlength="3" placeholder="out of 100">
                                <input type="hidden" name="username" value="<?php echo $dt->username ?>">
                                <input type="hidden" name="idtask" value="<?php echo $dt->idtask ?>">
                                <div class="input-group-append">
                                  <button type="submit" class="btn btn-sm btn-info">Submit</button>
                                </div>
                              </div>
                            </form>
                          </td>
                          <?php } else { ?>
                          <td><?php echo $dt->taskgrade ?>/100</td>
                          <?php } ?>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="materials">
                    <form action="<?php echo base_url(); ?>dashboard/creatematerial/<?php echo $courseadmin[0]->idcourse ?>" method="post" id="material1" class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input name="nmmateri" type="text" class="form-control" id="inputName" placeholder="Material Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-12">
                          <textarea name="descrm" id="summernote" style="height: 100px;"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-12">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                    <hr class="mb-3">
                    <table class="table table-hover text-nowrap">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Course Material</th>
                          <th>Date Created</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($materi as $m) { ?>
                        <tr>
                          <td><?php echo $m->idmateri ?></td>
                          <td><?php echo $m->nmmateri ?></td>
                          <td><?php echo $m->date_created ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="task">
                    <form action="<?php echo base_url() ?>/dashboard/createtask/<?php echo $courseadmin[0]->idcourse ?>" 
                    class="form-horizontal" method="post">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input name="nmtask" type="text" class="form-control" id="inputName" placeholder="Task Name" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group mb-3 date" id="deadline1" data-target-input="nearest">
                          <div class="input-group-append" data-target="#deadline1" data-toggle="datetimepicker">
                            <div class="input-group-text">
                              <i class="fa fa-calendar"></i>
                            </div>
                          </div>
                          <input name="deadline" type="text" class="form-control datetimepicker-input" 
                          data-target="#deadline1" placeholder="Deadline" required/>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-12">
                          <textarea name="descrt" id="summernote1" style="height: 100px;" required></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-12">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                    <hr class="mb-3">
                    <table class="table table-hover text-nowrap">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Task</th>
                          <th>Deadline</th>
                          <th>Accomplishments</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($task as $t) { ?>
                        <tr>
                          <td><?php echo $t->thisid ?></td>
                          <td><?php echo $t->nmtask ?></td>
                          <td><?php echo $t->deadline ?></td>
                          <td><?php echo $t->counttask."/".$countstudent ?> had done their task</td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="permission">
                    <table class="table table-hover text-nowrap projects">
                      <thead>
                        <tr>
                          <th style="width: 3%"></th>
                          <th>Name</th>
                          <th>Requested At</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($permission as $p) { ?>
                        <tr>
                          <td><ul class="list-inline">
                              <li class="list-inline-item">
                                <img alt="Avatar" class="table-avatar" src="<?php echo base_url(); ?>imgs/<?php echo $p->pprofile ?>">
                              </li>
                          </ul></td>
                          <td><?php echo $p->fullname ?></td>
                          <td><span class="tag tag-success"><?php echo $p->requested_at ?></span></td>
                          <td>
                            <form action="<?php echo base_url(); ?>dashboard/accept/<?php echo $courseadmin[0]->idcourse ?>" method="post">
                              <input type="hidden" name="username" value="<?php echo $p->username ?>">
                              <button name="join" value="1" type="submit" class="btn btn-sm btn-success">Accept</button>
                              <button name="join" value="0" type="submit" class="btn btn-sm btn-danger">Decline</button>
                            </form>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-3">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white"
                   style="background: url('<?php echo base_url(); ?>imgs/<?php echo $courseadmin[0]->imgcover ?>') center center;
                          background-size: cover;">
                <h3 class="widget-user-username text-right"><?php echo $courseadmin[0]->nmcourse ?></h3>
                <h5 class="widget-user-desc text-right"><?php echo $courseadmin[0]->specialty ?></h5>
              </div>
              <button data-toggle="modal" data-target="#banner" class="btn btn-success btn-block rounded-0">
                <b>Change Banner</b>
              </button>
              <div class="modal fade" id="banner">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h6 class="modal-title">Change Banner</h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="/<?php echo base_url(); ?>" id="my-banner" class="dropzone"></form>
                    </div>
                    <div class="modal-footer justify-content-right">
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
              <div class="card-footer pt-3">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo $countstudent ?></h5>
                      <span class="text-sm">Students</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo $countmateri ?></h5>
                      <span class="text-sm">Material</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo $counttask ?></h5>
                      <span class="text-sm">Task</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Student List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php foreach ($student as $st) { ?>
                <div class="user-block mb-4">
                  <img class="img-circle img-bordered-sm" src="<?php echo base_url(); ?>imgs/<?php echo $st->pprofile; ?>" alt="user image">
                  <span class="username">
                    <a href="javascript:void(0)"><?php echo $st->fullname; ?></a>
                  </span>
                  <span class="description">Joined <?php echo date('Y-m-d', strtotime($st->requested_at)); ?></span>
                </div>
                <?php } ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
