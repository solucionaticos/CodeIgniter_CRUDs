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
	                    	<label class="control-label col-sm-2" for="cliente_id_g">Cliente Id:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="cliente_id_g" name="cliente_id">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="referido_g">Referido:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="referido_g" name="referido">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="nombre_g">Nombre:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="nombre_g" name="nombre">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="apellidos_g">Apellidos:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="apellidos_g" name="apellidos">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="correo_g">Correo:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="correo_g" name="correo">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="telefono_g">Telefono:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="telefono_g" name="telefono">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="compania_g">Compania:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="compania_g" name="compania">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="posicion_g">Posicion:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="posicion_g" name="posicion">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="pais_id_g">Pais Id:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="pais_id_g" name="pais_id">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="pais_estado_id_g">Pais Estado Id:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="pais_estado_id_g" name="pais_estado_id">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="ciudad_g">Ciudad:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="ciudad_g" name="ciudad">
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
	                    	<label class="control-label col-sm-2" for="idioma_id_g">Idioma Id:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="idioma_id_g" name="idioma_id">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="plan_id_g">Plan Id:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="plan_id_g" name="plan_id">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="plazo_meses_g">Plazo Meses:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="plazo_meses_g" name="plazo_meses">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="moneda_id_g">Moneda Id:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="moneda_id_g" name="moneda_id">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="subtotal_g">Subtotal:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="subtotal_g" name="subtotal">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="descuento_id_g">Descuento Id:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="descuento_id_g" name="descuento_id">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="descuento_g">Descuento:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="descuento_g" name="descuento">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="impuesto_g">Impuesto:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="impuesto_g" name="impuesto">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="envio_g">Envio:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="envio_g" name="envio">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="total_g">Total:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="total_g" name="total">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="ip_g">Ip:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="ip_g" name="ip">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="ip_pais_g">Ip Pais:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="ip_pais_g" name="ip_pais">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="fecha_correo_g">Fecha Correo:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="fecha_correo_g" name="fecha_correo">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="fecha_creacion_g">Fecha Creacion:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="fecha_creacion_g" name="fecha_creacion">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="fecha_orden_g">Fecha Orden:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="fecha_orden_g" name="fecha_orden">
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
