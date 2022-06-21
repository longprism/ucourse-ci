  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <a href="<?php base_url() ?>home" class="btn btn-outline-primary rounded-circle">
            <span class="fa fa-arrow-left"></span>
          </a>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 mt-lg-0 mt-sm-4">
            <h2 class="text-center display-5 mb-4">My Course</h2>
            <div class="row">
              <div class="col-sm-4 mb-3">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#createcourse">
                  <div class="info-box mb-3 bg-info" style="height: 180px;">
                    <span class="info-box-icon"><i class="fas fa-plus"></i></span>
  
                    <div class="info-box-content">
                      <span class="info-box-text">Create course</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                </a>
                <div class="modal fade" id="createcourse">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h6 class="modal-title">Create new course</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" id="create1" action="<?php base_url() ?>dashboard/create" method="post">
                          <div class="input-group mb-3">
                            <input name="nmcourse" type="text" class="form-control" placeholder="Course Name" required>
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-school"></span>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <textarea name="descr" class="form-control" rows="3" placeholder="Description" required></textarea>
                          </div>
                          <div class="form-group">
                            <label for="special1">Select Type Course</label>
                            <select id="special1" name="specialty" class="form-control">
                              <?php foreach ($special as $spc) { ?>
                              <option value="<?php echo $spc->idspc ?>"><?php echo $spc->specialty ?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <div class="custom-file">
                              <input name="banner" type="file" class="custom-file-input" id="banner1" required>
                              <label class="custom-file-label" for="banner1">Choose Banner</label>
                            </div>
                          </div>
                          <input name="username" value="<?php echo $user[0]->username ?>" type="hidden">
                        </form>
                      </div>
                      <div class="modal-footer justify-content-right">
                        <button form="create1" type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
              </div>
              <?php foreach ($course as $crs) { ?>
              <div class="col-sm-4 mb-3">
                <div class="class-bg position-relative p-3 pr-4 bg-gray rounded" 
                style="height: 180px;background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), 
                url('<?php base_url(); ?>imgs/<?php echo $crs->imgcover ?>');">
                  <?php echo $crs->nmcourse ?><br />
                  <a href="<?php base_url(); ?>dashboard/course/<?php echo $crs->idcourse ?>" class="btn btn-xs btn-info mt-2">Manage</a>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

