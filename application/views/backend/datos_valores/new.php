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

                <?php echo form_open('backend/datos_valores/insert', array('id' => 'forma_i', 'class' => 'form-horizontal')); ?>  

                    <input type='hidden' id='id_i' name='id' value='0'>
                    
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="dato_i">Dato:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="dato_i" name="dato" >
<?php foreach ($data["tabla_datos"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="nombre_i">Nombre:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="nombre_i" name="nombre">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="auxiliar_1_i">Auxiliar 1:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="auxiliar_1_i" name="auxiliar_1">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="auxiliar_2_i">Auxiliar 2:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="auxiliar_2_i" name="auxiliar_2">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="auxiliar_3_i">Auxiliar 3:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="auxiliar_3_i" name="auxiliar_3">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="auxiliar_4_i">Auxiliar 4:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="auxiliar_4_i" name="auxiliar_4">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="orden_i">Orden:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="orden_i" name="orden">
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
				            <a href="<?php echo base_url(); ?>backend/datos_valores" class="btn btn-default">Cancelar</a>

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
