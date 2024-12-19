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

<!-- Modal Editar - Inicio -->
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Lista</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <?php echo form_open_multipart('backend/ci_datatables_ssp/cuentas_cobrar/guardar', array('id' => 'forma_g', 'class' => 'form-horizontal')); ?>              

                    <input type='hidden' id='id_g' name='id'>
                    
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="factura_id_g">Factura Id:</label>
                    	<div class="col-sm-10">
	                    	<input type="file" class="form-control" id="factura_id_g" name="factura_id">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="monto_g">Monto:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="monto_g" name="monto" >
<?php foreach ($data["datos"]["tabla_datos_arls"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="fecha_caducidad_g">Fecha Caducidad:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="fecha_caducidad_g" name="fecha_caducidad">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="pagado_g">Pagado:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="pagado_g" name="pagado">
                    	</div>
                    </div>

				    <div class="form-group"> 
				        <div class="col-sm-offset-2 col-sm-10">
				            <button type="submit" class="btn btn-primary">Actualizar y volver a la lista</button>
				            <a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/backend/ci_datatables_ssp/cuentas_cobrar" class="btn btn-default">Cancelar</a>
				        </div>
				    </div>

				</form>


            </div>
        </div>
    </div>
</div>  
<!-- Modal Editar - Fin -->

</section>
<!-- /.content -->
