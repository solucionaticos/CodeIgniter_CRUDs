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

                <?php echo form_open('backend/ci_datatables_ssp/usuarios/insert', array('id' => 'forma_i', 'class' => 'form-horizontal')); ?>  

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
                    	<label class="control-label col-sm-2" for="correo_i">Correo:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="correo_i" name="correo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="clave_i">Clave:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="clave_i" name="clave">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="foto_i">Foto:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="foto_i" name="foto">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="perfil_id_i">Perfil Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="perfil_id_i" name="perfil_id" >
<?php foreach ($data["datos"]["tabla_datos_usuarios_perfiles"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="fecha_ultimo_ingreso_i">Fecha Ultimo Ingreso:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="fecha_ultimo_ingreso_i" name="fecha_ultimo_ingreso">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="ip_i">Ip:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="ip_i" name="ip">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="fecha_creacion_i">Fecha Creacion:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="fecha_creacion_i" name="fecha_creacion">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="activo_i">Activo:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="activo_i" name="activo">
                    	</div>
                    </div>

                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">

				            <button type="submit" class="btn btn-success">Guardar y volver a la lista</button>
				            <a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/backend/ci_datatables_ssp/usuarios" class="btn btn-default">Cancelar</a>

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
