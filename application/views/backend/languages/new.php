<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    {title}
    <small>{subtitle}</small>
  </h1>
  {breadcrumb}
</section>

<?php
// Bloque de codigo para presentar mensajes de alerta
if ( $this->session->flashdata('alertaMensaje') ) {
?>
<section class="content-header">
	<div class="alert alert-<?php echo $this->session->flashdata('alertaTipo'); ?> alert-dismissible">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	    <?php echo $this->session->flashdata('alertaMensaje'); ?>
	</div>
</section>
<?php
}
?>

<!-- Main content -->
<section class="content">

<div class="row">
    <div class="col-xs-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Lista</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <?php echo form_open('backend/languages/insert', array('id' => 'forma_i', 'class' => 'form-horizontal')); ?>  

                    <input type='hidden' id='id_i' name='id' value='0'>
                    
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="name_i">Name:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="name_i" name="name">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="own_name_i">Own Name:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="own_name_i" name="own_name">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="code_i">Code:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="code_i" name="code">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="value_i">Value:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="value_i" name="value">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="recaptcha_i">Recaptcha:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="recaptcha_i" name="recaptcha">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="active_i">Active:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="active_i" name="active">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="lang_default_i">Lang Default:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="lang_default_i" name="lang_default">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="created_at_i">Created At:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="created_at_i" name="created_at">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="updated_at_i">Updated At:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="updated_at_i" name="updated_at">
                    	</div>
                    </div>

                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">

				            <button type="submit" class="btn btn-success">Guardar y volver a la lista</button>
				            <a href="<?php echo base_url(); ?>backend/languages" class="btn btn-default">Cancelar</a>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>  
<!-- Modal Nuevo - Fin -->

</section>
<!-- /.content -->
