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

                <?php echo form_open('backend/ci_datatables_ssp/usuarios/guardar', array('id' => 'forma_g', 'class' => 'form-horizontal')); ?>              

                    <input type='hidden' id='id_g' name='id'>
                    
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
                    	<label class="control-label col-sm-2" for="clave_g">Clave:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="clave_g" name="clave">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="foto_g">Foto:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="foto_g" name="foto">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="perfil_id_g">Perfil Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="perfil_id_g" name="perfil_id" >
<?php foreach ($data["datos"]["tabla_datos_usuarios_perfiles"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="fecha_ultimo_ingreso_g">Fecha Ultimo Ingreso:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="fecha_ultimo_ingreso_g" name="fecha_ultimo_ingreso">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="ip_g">Ip:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="ip_g" name="ip">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="fecha_creacion_g">Fecha Creacion:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="fecha_creacion_g" name="fecha_creacion">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="activo_g">Activo:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="activo_g" name="activo">
                    	</div>
                    </div>

				    <div class="form-group"> 
				        <div class="col-sm-offset-2 col-sm-10">
				            <button type="submit" class="btn btn-primary">Actualizar y volver a la lista</button>
				            <a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/backend/ci_datatables_ssp/usuarios" class="btn btn-default">Cancelar</a>
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
