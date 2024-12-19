  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Codeigniter + GroceryCRUDs
        <small>Project: <?php echo $projectVersionTitle; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/cruds">CRUDs</a></li>
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

          <a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/ci_grocerycrud/generate_cruds/<?php echo $id; ?>" class="btn btn-block btn-info btn-lg">Generate Codeigniter + GroceryCRUDs</a>
          <br>

          <textarea class="form-control" id="php" name="php" placeholder="Type PHP" rows="30"><?php echo $code; ?></textarea>

        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->