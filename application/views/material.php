  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <a href="<?php echo base_url() ?>course/index/<?php echo $beforeidcrs ?>" class="btn btn-outline-primary rounded-circle">
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
          Learning Materials
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2">
              <h3 class="text-Secondary mb-3"> <?php echo $materi[0]->nmmateri ?></h3>
              <div class="text-muted">
                <p class="text-sm"><?php echo $materi[0]->date_created ?>
                  <b class="d-block"><?php echo $materi[0]->fullname ?></b>
                </p>
              </div>
              <p class="text-muted"><?php echo $materi[0]->descrm ?></p> 
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
