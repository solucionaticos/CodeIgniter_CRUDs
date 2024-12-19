  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        APIs Node.js Express
        <small>Project: <?php echo $projectVersionTitle; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/apis_nodejs_express">APIs Node.js Express</a></li>
        <li class="active">CRUD</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">APIs Node.js Express Code:</h3>
        </div>
        <div class="box-body">
          <a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/apis_nodejs_express/generate/<?php echo $id; ?>" class="btn btn-block btn-info btn-lg">Generate APIs Node.js Express</a>
        </div>
      </div>

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Route: /routes/<?php echo $tableName; ?>.js</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <textarea id="routes" name="routes" rows="13"><?php echo $code_routes; ?></textarea>
        </div>
      </div>

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Model: /bin/src/app/Models/<?php echo $tableNameCamelCase; ?>Model.js</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <textarea id="models" name="models" rows="13"><?php echo $code_models; ?></textarea>
        </div>
      </div>

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Controller: /bin/src/app/Http/Controllers/<?php echo $tableNameCamelCase; ?>Controller.js</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <textarea id="controllers" name="controllers" rows="13"><?php echo $code_controllers; ?></textarea>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->