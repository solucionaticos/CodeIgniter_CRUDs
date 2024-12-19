<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php foreach($css_files as $file): ?>
<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<?php if ( $this->session->flashdata('alertMessage') ) { ?>
  <div class="alert alert-<?php echo $this->session->flashdata('alertType'); ?> alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $this->session->flashdata('alertMessage'); ?>
  </div>
<?php } ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $title; ?>
  </h1>
  <?php echo $breadCrumbs; ?>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Tables</a></li>
    <li class="active">Data tables</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">      

  <div class="row">
      <div class="col-xs-12">
          <div class="box box-primary box-solid">
              <div class="box-header with-border">
                  <h3 class="box-title">Lista</h3>
              </div>

              <!-- Default box -->
              <div class="box-body">
              <?php echo $tabs; ?>
              <?php echo $output; ?>
              <?php
              if ($code == 1) {
                if ($state == "edit" or $state == "read") {
                  echo $html;
                }
              }
              ?>
              </div>
              <!-- /.box-body -->

          </div>
          <!-- /.box -->
      </div>
      <!-- /.col -->
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->