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
	                    	<label class="control-label col-sm-2" for="cliente_id_i">Cliente Id:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="cliente_id_i" name="cliente_id">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="referido_i">Referido:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="referido_i" name="referido">
	                    	</div>
	                    </div>
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
	                    	<label class="control-label col-sm-2" for="correo_i">Correo:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="correo_i" name="correo">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="telefono_i">Telefono:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="telefono_i" name="telefono">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="compania_i">Compania:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="compania_i" name="compania">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="posicion_i">Posicion:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="posicion_i" name="posicion">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="pais_id_i">Pais Id:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="pais_id_i" name="pais_id">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="pais_estado_id_i">Pais Estado Id:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="pais_estado_id_i" name="pais_estado_id">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="ciudad_i">Ciudad:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="ciudad_i" name="ciudad">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="direccion_1_i">Direccion 1:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="direccion_1_i" name="direccion_1">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="direccion_2_i">Direccion 2:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="direccion_2_i" name="direccion_2">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="idioma_id_i">Idioma Id:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="idioma_id_i" name="idioma_id">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="plan_id_i">Plan Id:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="plan_id_i" name="plan_id">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="plazo_meses_i">Plazo Meses:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="plazo_meses_i" name="plazo_meses">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="moneda_id_i">Moneda Id:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="moneda_id_i" name="moneda_id">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="subtotal_i">Subtotal:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="subtotal_i" name="subtotal">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="descuento_id_i">Descuento Id:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="descuento_id_i" name="descuento_id">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="descuento_i">Descuento:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="descuento_i" name="descuento">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="impuesto_i">Impuesto:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="impuesto_i" name="impuesto">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="envio_i">Envio:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="envio_i" name="envio">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="total_i">Total:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="total_i" name="total">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="ip_i">Ip:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="ip_i" name="ip">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="ip_pais_i">Ip Pais:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="ip_pais_i" name="ip_pais">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="fecha_correo_i">Fecha Correo:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="fecha_correo_i" name="fecha_correo">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="fecha_creacion_i">Fecha Creacion:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="fecha_creacion_i" name="fecha_creacion">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="fecha_orden_i">Fecha Orden:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="fecha_orden_i" name="fecha_orden">
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
