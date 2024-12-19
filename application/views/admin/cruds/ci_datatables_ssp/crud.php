  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Codeigniter + Datatables.net + SSP
        <small>Project: <?php echo $projectVersionTitle; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/ci_datatables_ssp">Codeigniter + Datatables.net + SSP</a></li>
        <li class="active">CRUD</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Crud: <?php echo $folder, '/', $file; ?></h3>

        </div>
        <div class="box-body">

          <a href="<?php echo base_url() .$this->config->item('adminPath'); ?>/cruds/ci_datatables_ssp/generate/<?php echo $id; ?>" class="btn btn-block btn-info btn-lg">Generate Codeigniter + Datatables.net + SSP</a>

        </div>
      </div>

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Controller</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <textarea id="controlador" name="controlador" rows="30"><?php echo $code_controller; ?></textarea>
        </div>
      </div>

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">View List</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <textarea id="vista_list" name="vista_list" rows="30"><?php echo $code_view_list; ?></textarea>
        </div>
      </div>

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">View New</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <textarea id="vista_new" name="vista_new" rows="30"><?php echo $code_view_new; ?></textarea>
        </div>
      </div>

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">View Edit</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <textarea id="vista_edit" name="vista_edit" rows="30"><?php echo $code_view_edit; ?></textarea>
        </div>
      </div>


      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">.js List</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <textarea id="js_list" name="js_list" rows="30"><?php echo $code_js_list; ?></textarea>
        </div>
      </div>

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">.js New</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <textarea id="js_new" name="js_new" rows="30"><?php echo $code_js_new; ?></textarea>
        </div>
      </div>

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">.js Edit</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <textarea id="js_edit" name="js_edit" rows="30"><?php echo $code_js_edit; ?></textarea>
        </div>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->