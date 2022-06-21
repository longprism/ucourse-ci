  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <a href="<?php echo base_url() ?>course/index/<?php echo $beforeidcrs ?>#task" class="btn btn-outline-primary rounded-circle">
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
          Assignment
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <h3 class="text-Secondary mb-3"> <?php echo $task[0]->nmtask ?></h3>
              <div class="text-muted">
                <p class="text-sm"><?php echo $task[0]->date_created ?>
                  <b class="d-block">Deadline <?php echo $task[0]->deadline ?></b>
                </p>
              </div>
              <p class="text-muted"><?php echo $task[0]->descrt ?></p> 
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <div class="card">
                <div class="card-body">
                  <?php if (count($userdt) == 0) { ?>
                    <span class="text-lg">File Upload</span>
                    <form action="<?php echo base_url() ?>course/inputtask/<?php echo $beforeidcrs ?>/<?php echo $task[0]->idtask ?>" 
                    class="dropzone my-3" id="my-tugas"></form>
                  <?php } else { ?>
                    <span class="text-lg">Grade <?php echo $userdt[0]->taskgrade ?>/100</span>
                    <div class="mt-3 mb-4">
                      <a href="<?php echo base_url(); ?>course/download/<?php echo $userdt[0]->file_name ?>" class="link-white text-sm">
                        <i class="fas fa-link mr-1"></i><?php echo $userdt[0]->file_name ?>
                      </a>
                    </div>
                    <button class="btn btn-outline-primary btn-block">
                      <b>Submitted at <?php echo $userdt[0]->submitted_at ?></b>
                    </button>
                  <?php }?>
                </div>
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
