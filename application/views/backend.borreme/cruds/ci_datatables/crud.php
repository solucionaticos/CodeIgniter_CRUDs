  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Codeigniter + Datatables.net
        <small>Project: <?php echo $projectVersionTitle; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/ci_datatables">Codeigniter + Datatables.net</a></li>
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

          <a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/ci_datatables/generate/<?php echo $id; ?>" class="btn btn-block btn-info btn-lg">Generate Codeigniter + Datatables.net</a>

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
          <h3 class="box-title">View</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <textarea id="vista" name="vista" rows="30"><?php echo $code_view; ?></textarea>
        </div>
      </div>

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">.js</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <textarea id="js" name="js" rows="30"><?php echo $code_js; ?></textarea>
        </div>
      </div>

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">.css</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <textarea id="css" name="css" rows="30"><?php echo $code_css; ?></textarea>
        </div>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->