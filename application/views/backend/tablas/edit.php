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

                <?php echo form_open('backend/tablas/update', array('id' => 'forma_g', 'class' => 'form-horizontal')); ?>              

                    <input type='hidden' id='id_g' name='id' value="<?php echo $data['id']; ?>">
                    
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="usuario_g">Usuario:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="usuario_g" name="usuario">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="proyecto_g">Proyecto:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="proyecto_g" name="proyecto" >
<?php foreach ($data["tabla_proyectos"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="version_g">Version:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="version_g" name="version" >
<?php foreach ($data["tabla_versiones"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
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
                    	<label class="control-label col-sm-2" for="etiqueta_g">Etiqueta:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="etiqueta_g" name="etiqueta">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="comentarios_g">Comentarios:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="comentarios_g" name="comentarios"></textarea>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="antes_insertar_g">Antes Insertar:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="antes_insertar_g" name="antes_insertar"></textarea>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="antes_actualizar_g">Antes Actualizar:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="antes_actualizar_g" name="antes_actualizar"></textarea>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="antes_eliminar_g">Antes Eliminar:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="antes_eliminar_g" name="antes_eliminar"></textarea>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="despues_insertar_g">Despues Insertar:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="despues_insertar_g" name="despues_insertar"></textarea>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="despues_actualizar_g">Despues Actualizar:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="despues_actualizar_g" name="despues_actualizar"></textarea>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="despues_eliminar_g">Despues Eliminar:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="despues_eliminar_g" name="despues_eliminar"></textarea>
                    	</div>
                    </div>

				    <div class="form-group"> 
				        <div class="col-sm-offset-2 col-sm-10">
				            <button type="submit" class="btn btn-primary">Actualizar y volver a la lista</button>
				            <a href="<?php echo base_url(); ?>backend/tablas" class="btn btn-default">Cancelar</a>
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
