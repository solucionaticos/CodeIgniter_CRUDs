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
	                    	<label class="control-label col-sm-2" for="nombre_i">Nombre:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="nombre_i" name="nombre">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="apellidos_i">Apellidos:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="apellidos_i" name="apellidos">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="compania_i">Empresa:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="compania_i" name="compania">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="correo_i">Correo:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="correo_i" name="correo">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="tipo_documento_id_i">Tipo Documento:</label>
	                    	<div class="col-sm-10">
	                    		<select class="form-control" id="tipo_documento_id_i" name="tipo_documento_id" >
<?php foreach ($data["table_datos_documento_tipos"] as $row) { ?>
	                    			<option value="<?=$row['id']?>"><?=$row['nombre']?></option>
<?php } ?>
	                    		</select>
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="documento_i">No. Documento:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="documento_i" name="documento">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="telefono_i">Teléfono:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="telefono_i" name="telefono">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="pais_id_i">País:</label>
	                    	<div class="col-sm-10">
	                    		<select class="form-control" id="pais_id_i" name="pais_id" >
<?php foreach ($data["table_datos_paises"] as $row) { ?>
	                    			<option value="<?=$row['id']?>"><?=$row['nombre']?></option>
<?php } ?>
	                    		</select>
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="ciudad_id_i">Ciudad:</label>
	                    	<div class="col-sm-10">
	                    		<select class="form-control" id="ciudad_id_i" name="ciudad_id" >
<?php foreach ($data["table_datos_ciudades"] as $row) { ?>
	                    			<option value="<?=$row['id']?>"><?=$row['nombre']?></option>
<?php } ?>
	                    		</select>
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="direccion_1_i">Dirección Principal:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="direccion_1_i" name="direccion_1">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="direccion_2_i">Dirección Secundaria:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="direccion_2_i" name="direccion_2">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="estado_cliente_id_i">Estado Cliente:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="estado_cliente_id_i" name="estado_cliente_id">
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
