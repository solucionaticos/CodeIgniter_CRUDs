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
	        <div class="box box-primary box-solid">
	            <div class="box-header with-border">
	                <h3 class="box-title"><?php echo $this->lang->line('be_crud_edit_record'); ?></h3>
	            </div>
	            <!-- /.box-header -->

                <div id="overlay-section">
                    <br /><br /><br /><br />
                </div>

	            <div class="box-body">

	                <?php echo form_open($path . '/update', array('id' => 'form_g', 'class' => 'form-horizontal')); ?>              

                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('be_crud_update_and_return_to_the_list'); ?></button>
                                <a href="<?php echo base_url() . $path; ?>" class="btn btn-default"><?php echo $this->lang->line('be_crud_cancel'); ?></a>
                            </div>
                        </div>

	                    <input type='hidden' id='id_g' name='id' value="<?php echo $data['id']; ?>">
	                    
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="cliente_cuenta_id_g">Cliente Cuenta:</label>
	                    	<div class="col-sm-10">
	                    		<select class="form-control" id="cliente_cuenta_id_g" name="cliente_cuenta_id" >
<?php foreach ($data["table_clientes_cuentas"] as $row) { ?>
	                    			<option value="<?=$row['id']?>"><?=$row['nombre']?></option>
<?php } ?>
	                    		</select>
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="empleado_id_g">Empleado:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="empleado_id_g" name="empleado_id">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="tipo_familiar_id_g">Tipo de Familiar:</label>
	                    	<div class="col-sm-10">
	                    		<select class="form-control" id="tipo_familiar_id_g" name="tipo_familiar_id" >
<?php foreach ($data["table_datos_familiares_tipos"] as $row) { ?>
	                    			<option value="<?=$row['id']?>"><?=$row['nombre']?></option>
<?php } ?>
	                    		</select>
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="nombre_g">Nombre:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="nombre_g" name="nombre">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="documento_tipo_id_g">Documento Tipo Id:</label>
	                    	<div class="col-sm-10">
	                    		<select class="form-control" id="documento_tipo_id_g" name="documento_tipo_id" >
<?php foreach ($data["table_datos_documento_tipos"] as $row) { ?>
	                    			<option value="<?=$row['id']?>"><?=$row['nombre']?></option>
<?php } ?>
	                    		</select>
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="documento_numero_g">Documento Numero:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="documento_numero_g" name="documento_numero">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="nacimiento_fecha_g">Fecha de Nacimiento:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control datepicker" id="nacimiento_fecha_g" name="nacimiento_fecha">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="nacimiento_pais_id_g">País de Nacimiento:</label>
	                    	<div class="col-sm-10">
	                    		<select class="form-control" id="nacimiento_pais_id_g" name="nacimiento_pais_id" >
<?php foreach ($data["table_datos_paises"] as $row) { ?>
	                    			<option value="<?=$row['id']?>"><?=$row['nombre']?></option>
<?php } ?>
	                    		</select>
	                    	</div>
	                    </div>

                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('be_crud_update_and_return_to_the_list'); ?></button>
                                <a href="<?php echo base_url() . $path; ?>" class="btn btn-default"><?php echo $this->lang->line('be_crud_cancel'); ?></a>
                            </div>
                        </div>

	                </form>

	            </div>

                <div class="overlay">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>

	        </div>
	    </div>
	</div>  

</section>
<!-- /.content -->
