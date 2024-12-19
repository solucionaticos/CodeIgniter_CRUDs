  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tables & Fields
        <small>Project: <?php echo $projectVersionTitle; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tables & Fields</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header with-border">

        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="<?php echo $tab_project; ?>"><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database/tables_fields">Project</a></li>
            <li class="<?php echo $tab_sql; ?>"><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database/tables_fields/sql">SQL</a></li>
            <li class="<?php echo $tab_data; ?>"><a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database/tables_fields/data">Data</a></li>
          </ul>
          <div class="tab-content">

            <div class="tab-pane <?php echo $tab_project; ?>" id="tab_1-1">

            </div>

            <div class="tab-pane <?php echo $tab_sql; ?>" id="tab_1-2">

<?php if ($projectVersionTitle != 'None') { ?>
<?php echo $form; ?>

                <div class="box-body">
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">SQL</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="sql" name="sql" placeholder="Type SQL" rows="20"></textarea>
<!--
<textarea id="codigo_sql" style="height: 350px; width: 100%;" name="test_1"><?=$codigoApache?></textarea>
-->
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-info pull-right">Go!</button>
                </div>
                <!-- /.box-footer -->
              </form>

<?php } ?>

            </div>

            <div class="tab-pane <?php echo $tab_data; ?>" id="tab_1-3">

            </div>
          </div>
        </div>

      </div>
    </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->