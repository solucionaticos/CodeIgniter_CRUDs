  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CRUDs
        <small>Project: <?php echo $projectVersionTitle; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Codeigniter + GroceryCRUDs</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">CRUDs</h3>
        </div>
        <div class="box-body">
              <div class="row">
                <div class="col-sm-6 col-md-5">

                  <div class="input-group">
                    <span class="input-group-addon text-green">Type of Generation:</span>
                    <select class="form-control" id="typeGeneration">
                      <option value="0">Select one...</option>
                      <option value="1">CI GroceryCrud</option>
                      <option value="2">CI Datatable</option>
                      <option value="3">Node.js APIs Adonis</option>
                      <option value="4">Node.js APIs Express</option>
                    </select>
                    <div class="input-group-btn">
                      <button class="btn btn-success" type="button" id="generateSelectRows">Generate</button>
                    </div>
                  </div>

                </div>
              </div>

              <br>
              <br>

              <div class="table-responsive">
                <table id="lista" class="table table-striped table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th style="width:20px;"><input type="checkbox" class="selectAll"></th>
                            <th>CRUD</th>
                            <th>Commands</th>
                            <th>Table</th>
                            <th>Fields</th>
                            <th>Path 1</th>
                            <th>Path 2</th>
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

                              <select class="form-control" id="crud_<?php echo $row["id"]; ?>" style="width:120px;">
                                <option value="0"></option>
                                <option value="1">CI GroceryCrud</option>
                                <option value="2">CI Datatable</option>
                                <option value="3">Node.js APIs Adonis</option>
                                <option value="4">Node.js APIs Express</option>
                              </select>

                            </td>

                            <td>
                                <select class="form-control command" style="width:80px;" crud_id="<?php echo $row["id"]; ?>">
                                  <option value="0"></option>
                                  <option value="1">Preview</option>
                                  <option value="2">Generate</option>
                                </select>
                            </td>

                            <td><?php echo $row["tabla_nombre"]; ?></td>
                            <td><marquee direction="left" scrollamount="7"><?php echo str_replace(",",", ",$row["fields"]); ?></marquee></td>
                            <td><?php echo $row["carpeta_1"]; ?></td>
                            <td><?php echo $row["carpeta_2"]; ?></td>

                        </tr>
<?php
    }
}
?>
                    </tbody>
                    <tfoot>
                        <tr>

                            <th style="width:20px;"><input type="checkbox" class="selectAll"></th>
                            <th>CRUD</th>
                            <th>Commands</th>
                            <th>Table</th>
                            <th>Fields</th>
                            <th>Path 1</th>
                            <th>Path 2</th>

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