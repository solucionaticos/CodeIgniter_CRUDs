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
	                    	<label class="control-label col-sm-2" for="nombre_g">Nombre:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="nombre_g" name="nombre">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="telefono_1_g">Teléfono 1:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="telefono_1_g" name="telefono_1">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="telefono_2_g">Teléfono 2:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="telefono_2_g" name="telefono_2">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="correo_g">Correo:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="correo_g" name="correo">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="pais_id_g">País:</label>
	                    	<div class="col-sm-10">
	                    		<select class="form-control" id="pais_id_g" name="pais_id" >
<?php foreach ($data["table_datos_paises"] as $row) { ?>
	                    			<option value="<?=$row['id']?>"><?=$row['nombre']?></option>
<?php } ?>
	                    		</select>
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="estado_id_g">Estado:</label>
	                    	<div class="col-sm-10">
	                    		<select class="form-control" id="estado_id_g" name="estado_id" >
<?php foreach ($data["table_sistema_tipo_datos_valores"] as $row) { ?>
	                    			<option value="<?=$row['id']?>"><?=$row['nombre']?></option>
<?php } ?>
	                    		</select>
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="ciudad_id_g">Ciudad:</label>
	                    	<div class="col-sm-10">
	                    		<select class="form-control" id="ciudad_id_g" name="ciudad_id" >
<?php foreach ($data["table_datos_ciudades"] as $row) { ?>
	                    			<option value="<?=$row['id']?>"><?=$row['nombre']?></option>
<?php } ?>
	                    		</select>
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="direccion_1_g">Direccion 1:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="direccion_1_g" name="direccion_1">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="direccion_2_g">Direccion 2:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="direccion_2_g" name="direccion_2">
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
