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
        <li class="active">Codeigniter + Datatables.net</li>
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

              <button type="button" class="btn btn-block btn-info btn-lg" id="generateSelectRows">Generate Codeigniter + Datatables.net</button>
              <br>

              <div class="table-responsive">
                <table id="lista" class="table table-striped table-bordered table-hover table-condensed">
                    <thead>
                        <tr>

                            <th style="width:20px;"><input type="checkbox" id="selectAll"></th>
                            <th style="width:100px;">Commands</th>
                            <th>Path 1</th>
                            <th>Path 2</th>
                            <th>Table</th>
                            <th>Fields</th>
                            <th>Script</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
<?php

if (count($cruds)) {
    foreach ($cruds as $key => $row) {
?>
                        <tr>
                            <td>
                              <input type="checkbox" class="selectRow" value="<?php echo $row["id"]; ?>">
                            </td>
                            <td>
                              <a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/ci_datatables/crud/<?php echo $row["id"]; ?>" class="btn btn-block btn-success btn-xs">CRUD</a>
                              <a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/cruds/ci_datatables/generate_list/<?php echo $row["id"]; ?>" class="btn btn-block btn-info btn-xs">Generate</a>
                            </td>
                            <td><?php echo $row["carpeta_1"]; ?></td>
                            <td><?php echo $row["carpeta_2"]; ?></td>
                            <td><?php echo $row["tabla_nombre"]; ?></td>
                            <td><marquee direction="left" scrollamount="7"><?php echo str_replace(",",", ",$row["fields"]); ?></marquee></td>

                            <td><?php if ($row["fecha_generacion"] != '0000-00-00 00:00:00') echo $row["script"]; ?></td>
                            <td><?php if ($row["fecha_generacion"] != '0000-00-00 00:00:00') echo $row["fecha_generacion"]; ?></td>

                        </tr>
<?php
    }
}
?>
                    </tbody>
                    <tfoot>
                        <tr>

                            <th>ID</th>
                            <th>Commands</th>
                            <th>Path 1</th>
                            <th>Path 2</th>
                            <th>Table</th>
                            <th>Fields</th>
                            <th>Script</th>
                            <th>Created at</th>

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
