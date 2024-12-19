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
if ( $this->session->flashdata('alertMessage') ) {
?>
<!-- Alert Messages -->
<section class="content-header">
    <div class="alert alert-<?php echo $this->session->flashdata('alertType'); ?> alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $this->session->flashdata('alertMessage'); ?>
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
	                <h3 class="box-title"><?php echo $this->lang->line('be_crud_new_record'); ?></h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">

	                <?php echo form_open($path . '/insert', array('id' => 'form_i', 'class' => 'form-horizontal')); ?>  

                        <div class="form-group"> 
                           <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success"><?php echo $this->lang->line('be_crud_insert_and_return_to_the_list'); ?></button>
                                <a href="<?php echo base_url() . $path; ?>" class="btn btn-default"><?php echo $this->lang->line('be_crud_cancel'); ?></a>
                            </div>
                        </div>

	                    <input type='hidden' id='id_i' name='id' value='0'>
	                    
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="cliente_cuenta_id_i">Cliente Cuenta:</label>
	                    	<div class="col-sm-10">
	                    		<select class="form-control" id="cliente_cuenta_id_i" name="cliente_cuenta_id" >
<?php foreach ($data["table_clientes_cuentas"] as $row) { ?>
	                    			<option value="<?=$row['id']?>"><?=$row['nombre']?></option>
<?php } ?>
	                    		</select>
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="empleado_id_i">Empleado:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="empleado_id_i" name="empleado_id">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="tipo_solicitud_id_i">Tipo de Solicitud:</label>
	                    	<div class="col-sm-10">
	                    		<select class="form-control" id="tipo_solicitud_id_i" name="tipo_solicitud_id" >
<?php foreach ($data["table_datos_tiempo_extra_vacaciones_tipo_solicitud"] as $row) { ?>
	                    			<option value="<?=$row['id']?>"><?=$row['nombre']?></option>
<?php } ?>
	                    		</select>
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="cantidad_i">Cantidad:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="cantidad_i" name="cantidad">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="fecha_i">Fecha:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control datepicker" id="fecha_i" name="fecha">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="comentario_i">Comentario:</label>
	                    	<div class="col-sm-10">
	                    		<textarea class="form-control" rows="5" id="comentario_i" name="comentario"></textarea>
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="archivo_i">Archivo:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="archivo_i" name="archivo">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="fecha_creacion_i">Fecha Creación:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="fecha_creacion_i" name="fecha_creacion">
	                    	</div>
	                    </div>

                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success"><?php echo $this->lang->line('be_crud_insert_and_return_to_the_list'); ?></button>
                                <a href="<?php echo base_url() . $path; ?>" class="btn btn-default"><?php echo $this->lang->line('be_crud_cancel'); ?></a>
                            </div>
                        </div>

	                </form>

	            </div>
	        </div>
	    </div>
	</div>  

</section>
<!-- /.content -->
