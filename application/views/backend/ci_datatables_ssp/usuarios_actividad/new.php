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

                <?php echo form_open('backend/ci_datatables_ssp/usuarios_actividad/insert', array('id' => 'forma_i', 'class' => 'form-horizontal')); ?>  

                    <input type='hidden' id='id_i' name='id' value='0'>
                    
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="usuario_id_i">Usuario Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="usuario_id_i" name="usuario_id" >
<?php foreach ($data["datos"]["tabla_usuarios"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="fecha_ingreso_i">Fecha Ingreso:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="fecha_ingreso_i" name="fecha_ingreso">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="ip_i">Ip:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="ip_i" name="ip">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="pais_id_i">Pais Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="pais_id_i" name="pais_id" >
<?php foreach ($data["datos"]["tabla_datos_paises"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="dispositivo_id_i">Dispositivo Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="dispositivo_id_i" name="dispositivo_id" >
<?php foreach ($data["datos"]["tabla_datos_dispositivos"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="agente_id_i">Agente Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="agente_id_i" name="agente_id" >
<?php foreach ($data["datos"]["tabla_datos_agentes"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="fecha_ultima_accion_i">Fecha Ultima Accion:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="fecha_ultima_accion_i" name="fecha_ultima_accion">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="permanencia_i">Permanencia:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="permanencia_i" name="permanencia">
                    	</div>
                    </div>

                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">

				            <button type="submit" class="btn btn-success">Guardar y volver a la lista</button>
				            <a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/backend/ci_datatables_ssp/usuarios_actividad" class="btn btn-default">Cancelar</a>

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
