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
              <li class="breadcrumb-item active"><?php if(in_array('update', $assets)) { echo 'Update'; } else { echo 'Insert'; } ?></li>
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
                <h5 class="m-0"><?php if(in_array('update', $assets)) { echo 'Update'; } else { echo 'Insert'; } ?></h5>
              </div>
              <form class="form-horizontal" id="form-crud" action="<?php if(in_array('update', $assets)){ echo base_url('Crud_c/update/'.$id); } else { echo base_url('Crud_c/store'); } ?>">
                <div class="card-body">

                  <!-- Form-part Input Text / Number -->
                    <div class="form-group row">
                      <label for="input-field-1" class="col-sm-3 col-form-label">Field 1 - Text / Number<a class="float-right"> : </a></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control float-right" name="postField1" id="input-field-1" placeholder="Input text atau number" <?php if(in_array('update', $assets)){ echo 'value="'.$data[0]['crud_field_1'].'"'; } ?>>
                        <small id="error-field-1" class="error-msg" style="display:none; color:red; font-style: italic"></small>
                      </div>
                    </div>

                  <!-- Form-part Input Select -->
                    <div class="form-group row">
                      <label for="input-field-2" class="col-sm-3 col-form-label">Field 2 - Select <a class="float-right"> : </a></label>
                      <div class="col-sm-8">
                        <select class="form-control float-right" name="postField2" id="input-field-2">
                          <option> -- Pilih Isi -- </option>
                          <option value="opt1" <?php if(in_array('update', $assets) && $data[0]['crud_field_2'] === 'opt1'){ echo 'selected="selected"'; } ?>"> Option 1 </option>
                          <option value="opt2" <?php if(in_array('update', $assets) && $data[0]['crud_field_2'] === 'opt2'){ echo 'selected="selected"'; } ?>"> Option 2 </option>
                          <option value="opt3" <?php if(in_array('update', $assets) && $data[0]['crud_field_2'] === 'opt3'){ echo 'selected="selected"'; } ?>"> Option 3 </option>
                          <option value="opt4" <?php if(in_array('update', $assets) && $data[0]['crud_field_2'] === 'opt4'){ echo 'selected="selected"'; } ?>"> Option 4 </option>
                        </select>
                        <small id="error-field-2" class="error-msg" style="display:none; color:red; font-style: italic"></small>
                      </div>
                    </div>
                </div>
                <div class="card-footer">
                  <div class="float-right">
                    <button type="reset" class="btn btn-secondary"><b> Reset </b></button>
                    <!-- <button type="submit" class="btn btn-primary" onclick="submitAjax('<?php if(in_array('update', $assets)){ echo base_url('Crud_c/update/'.$id); } else { echo base_url('Crud_c/store/'); } ?>')"><b> Simpan </b></button> -->
                    <button type="submit" class="btn btn-primary"><b> Simpan </b></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->