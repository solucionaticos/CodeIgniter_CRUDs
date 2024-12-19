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

                <?php echo form_open('backend/cruds/update', array('id' => 'forma_g', 'class' => 'form-horizontal')); ?>              

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
                    	<label class="control-label col-sm-2" for="tabla_g">Tabla:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="tabla_g" name="tabla" >
<?php foreach ($data["tabla_tablas"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="path_g">Path:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="path_g" name="path">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="script_g">Script:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="script_g" name="script">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="code_controller_ci_grocerycrud_g">Code Controller Ci Grocerycrud:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="code_controller_ci_grocerycrud_g" name="code_controller_ci_grocerycrud"></textarea>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="code_controller_ci_datatable_g">Code Controller Ci Datatable:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="code_controller_ci_datatable_g" name="code_controller_ci_datatable"></textarea>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="code_view_ci_datatable_g">Code View Ci Datatable:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="code_view_ci_datatable_g" name="code_view_ci_datatable"></textarea>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="code_js_ci_datatable_g">Code Js Ci Datatable:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="code_js_ci_datatable_g" name="code_js_ci_datatable"></textarea>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="code_css_ci_datatable_g">Code Css Ci Datatable:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="code_css_ci_datatable_g" name="code_css_ci_datatable"></textarea>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="titulo_g">Titulo:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="titulo_g" name="titulo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="ambiente_g">Ambiente:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="ambiente_g" name="ambiente">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="carpeta_1_g">Carpeta 1:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="carpeta_1_g" name="carpeta_1">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="carpeta_2_g">Carpeta 2:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="carpeta_2_g" name="carpeta_2">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="lista_orden_campo_g">Lista Orden Campo:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="lista_orden_campo_g" name="lista_orden_campo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="lista_orden_direccion_g">Lista Orden Direccion:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="lista_orden_direccion_g" name="lista_orden_direccion">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="lista_condicion_campo_g">Lista Condicion Campo:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="lista_condicion_campo_g" name="lista_condicion_campo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="lista_condicion_valor_g">Lista Condicion Valor:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="lista_condicion_valor_g" name="lista_condicion_valor">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="nuevo_g">Nuevo:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="nuevo_g" name="nuevo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="editar_g">Editar:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="editar_g" name="editar">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="ver_g">Ver:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="ver_g" name="ver">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="borrar_g">Borrar:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="borrar_g" name="borrar">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="exportar_g">Exportar:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="exportar_g" name="exportar">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="imprimir_g">Imprimir:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="imprimir_g" name="imprimir">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="tipo_crud_g">Tipo Crud:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="tipo_crud_g" name="tipo_crud">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="js_g">Js:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="js_g" name="js"></textarea>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="css_g">Css:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="css_g" name="css"></textarea>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="fecha_registro_g">Fecha Registro:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="fecha_registro_g" name="fecha_registro">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="fecha_generacion_g">Fecha Generacion:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="fecha_generacion_g" name="fecha_generacion">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="created_at_g">Created At:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="created_at_g" name="created_at">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="updated_at_g">Updated At:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="updated_at_g" name="updated_at">
                    	</div>
                    </div>

				    <div class="form-group"> 
				        <div class="col-sm-offset-2 col-sm-10">
				            <button type="submit" class="btn btn-primary">Actualizar y volver a la lista</button>
				            <a href="<?php echo base_url(); ?>backend/cruds" class="btn btn-default">Cancelar</a>
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
