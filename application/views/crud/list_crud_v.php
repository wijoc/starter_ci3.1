<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Page CRUD</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo site_url('Page_c') ?>"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('Crud_c') ?>"><i class="fas fa-cubes"></i> CRUD</a></li>
          <li class="breadcrumb-item active">Read</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-10">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0">List Data</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table-data">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Field 1</th>
                            <th>Field 2</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Field 1</th>
                            <th>Field 2</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->