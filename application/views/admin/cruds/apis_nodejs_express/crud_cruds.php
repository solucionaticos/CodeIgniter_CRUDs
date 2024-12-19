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
        <li><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/cruds">CRUDs</a></li>
        <li class="active">CRUD</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">APIs Node.js Code:</h3>
        </div>
        <div class="box-body">
          <a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/apis_nodejs_express/generate_cruds/<?php echo $id; ?>" class="btn btn-block btn-info btn-lg">Generate APIs Node.js Express</a>
        </div>
      </div>

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Make Model (SSH): /server/ssh/model/<?php echo $tableName; ?>.ssh</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <textarea id="make_model" name="make_model" style="background-color: black; color: #58FA58;"><?php echo $code_make_model; ?></textarea>
        </div>
      </div>

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Make Controller (SSH): /server/ssh/controller/<?php echo $tableName; ?>.ssh</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <textarea id="make_controller" name="make_controller" style="background-color: black; color: #58FA58;"><?php echo $code_make_controller; ?></textarea>
        </div>
      </div>

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Routes: /server/start/routes.js</h3>
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
          <h3 class="box-title">Models: /server/app/Models/<?php echo $tableNameCamelCase; ?>.js</h3>
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
          <h3 class="box-title">Migrations: /server/app/database/migrations/<?php echo round(microtime(true) * 1000) . '_' . $tableName . '.js'; ?></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <textarea id="migrations" name="migrations" rows="13"><?php echo $code_migrations; ?></textarea>
        </div>
      </div>

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Controllers: /server/app/Controllers/Http/<?php echo $tableNameCamelCase; ?>Controller.js</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <textarea id="controllers" name="controllers" rows="13"><?php echo $code_controllers; ?></textarea>
        </div>
      </div>

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Validators Store: /server/app/Validators/Store<?php echo $tableNameCamelCase; ?>.js</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <textarea id="validators_store" name="validators_store" rows="13"><?php echo $code_validators_store; ?></textarea>
        </div>
      </div>

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Validators Update: /server/app/Validators/Update<?php echo $tableNameCamelCase; ?>.js</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <textarea id="validators_update" name="validators_update" rows="13"><?php echo $code_validators_update; ?></textarea>
        </div>
      </div>

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Config shield: /server/config/shield.js</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <textarea id="shield" name="shield" rows="13"><?php echo $code_shield; ?></textarea>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->