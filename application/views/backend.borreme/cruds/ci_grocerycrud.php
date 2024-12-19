  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Codeigniter + GroceryCRUD
        <small>Project: <?php echo $projectVersionTitle; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Codeigniter + GroceryCRUD/li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Cruds</h3>
        </div>
        <div class="box-body">


              <div class="table-responsive">
                <table id="lista" class="table table-striped table-bordered table-hover table-condensed">
                    <thead>
                        <tr>

                            <th>ID</th>
                            <th>Table</th>
                            <th style="width:100px;">Commands</th>

                        </tr>
                    </thead>
                    <tbody>
<?php

if (count($cruds)) {
    foreach ($cruds as $key => $row) {
?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["script"]; ?></td>
                            <td>
                              <a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/ci_grocerycrud/crud/<?php echo $row["id"]; ?>" class="btn btn-block btn-success btn-xs">CRUD</a>
                            </td>
                        </tr>
<?php
    }
}
?>
                    </tbody>
                    <tfoot>
                        <tr>

                            <th>ID</th>
                            <th>Table</th>
                            <th>Commands</th>

                        </tr>
                    </tfoot>
                </table>
              </div>

        </div>
        <!-- /.box-body -->

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->