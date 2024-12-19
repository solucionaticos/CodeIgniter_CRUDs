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

                <?php echo form_open('backend/ci_datatables_ssp/usuarios_actividad/guardar', array('id' => 'forma_g', 'class' => 'form-horizontal')); ?>              

                    <input type='hidden' id='id_g' name='id'>
                    
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="usuario_id_g">Usuario Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="usuario_id_g" name="usuario_id" >
<?php foreach ($data["datos"]["tabla_usuarios"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="fecha_ingreso_g">Fecha Ingreso:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="fecha_ingreso_g" name="fecha_ingreso">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="ip_g">Ip:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="ip_g" name="ip">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="pais_id_g">Pais Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="pais_id_g" name="pais_id" >
<?php foreach ($data["datos"]["tabla_datos_paises"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="dispositivo_id_g">Dispositivo Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="dispositivo_id_g" name="dispositivo_id" >
<?php foreach ($data["datos"]["tabla_datos_dispositivos"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="agente_id_g">Agente Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="agente_id_g" name="agente_id" >
<?php foreach ($data["datos"]["tabla_datos_agentes"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="fecha_ultima_accion_g">Fecha Ultima Accion:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="fecha_ultima_accion_g" name="fecha_ultima_accion">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="permanencia_g">Permanencia:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="permanencia_g" name="permanencia">
                    	</div>
                    </div>

				    <div class="form-group"> 
				        <div class="col-sm-offset-2 col-sm-10">
				            <button type="submit" class="btn btn-primary">Actualizar y volver a la lista</button>
				            <a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/backend/ci_datatables_ssp/usuarios_actividad" class="btn btn-default">Cancelar</a>
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
