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

                <?php echo form_open('backend/cruds/insert', array('id' => 'forma_i', 'class' => 'form-horizontal')); ?>  

                    <input type='hidden' id='id_i' name='id' value='0'>
                    
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="usuario_i">Usuario:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="usuario_i" name="usuario">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="proyecto_i">Proyecto:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="proyecto_i" name="proyecto" >
<?php foreach ($data["tabla_proyectos"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="version_i">Version:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="version_i" name="version" >
<?php foreach ($data["tabla_versiones"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="tabla_i">Tabla:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="tabla_i" name="tabla" >
<?php foreach ($data["tabla_tablas"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="path_i">Path:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="path_i" name="path">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="script_i">Script:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="script_i" name="script">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="code_controller_ci_grocerycrud_i">Code Controller Ci Grocerycrud:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="code_controller_ci_grocerycrud_i" name="code_controller_ci_grocerycrud"></textarea>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="code_controller_ci_datatable_i">Code Controller Ci Datatable:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="code_controller_ci_datatable_i" name="code_controller_ci_datatable"></textarea>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="code_view_ci_datatable_i">Code View Ci Datatable:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="code_view_ci_datatable_i" name="code_view_ci_datatable"></textarea>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="code_js_ci_datatable_i">Code Js Ci Datatable:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="code_js_ci_datatable_i" name="code_js_ci_datatable"></textarea>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="code_css_ci_datatable_i">Code Css Ci Datatable:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="code_css_ci_datatable_i" name="code_css_ci_datatable"></textarea>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="titulo_i">Titulo:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="titulo_i" name="titulo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="ambiente_i">Ambiente:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="ambiente_i" name="ambiente">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="carpeta_1_i">Carpeta 1:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="carpeta_1_i" name="carpeta_1">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="carpeta_2_i">Carpeta 2:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="carpeta_2_i" name="carpeta_2">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="lista_orden_campo_i">Lista Orden Campo:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="lista_orden_campo_i" name="lista_orden_campo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="lista_orden_direccion_i">Lista Orden Direccion:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="lista_orden_direccion_i" name="lista_orden_direccion">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="lista_condicion_campo_i">Lista Condicion Campo:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="lista_condicion_campo_i" name="lista_condicion_campo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="lista_condicion_valor_i">Lista Condicion Valor:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="lista_condicion_valor_i" name="lista_condicion_valor">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="nuevo_i">Nuevo:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="nuevo_i" name="nuevo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="editar_i">Editar:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="editar_i" name="editar">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="ver_i">Ver:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="ver_i" name="ver">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="borrar_i">Borrar:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="borrar_i" name="borrar">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="exportar_i">Exportar:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="exportar_i" name="exportar">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="imprimir_i">Imprimir:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="imprimir_i" name="imprimir">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="tipo_crud_i">Tipo Crud:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="tipo_crud_i" name="tipo_crud">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="js_i">Js:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="js_i" name="js"></textarea>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="css_i">Css:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="css_i" name="css"></textarea>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="fecha_registro_i">Fecha Registro:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="fecha_registro_i" name="fecha_registro">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="fecha_generacion_i">Fecha Generacion:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="fecha_generacion_i" name="fecha_generacion">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="created_at_i">Created At:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="created_at_i" name="created_at">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="updated_at_i">Updated At:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="updated_at_i" name="updated_at">
                    	</div>
                    </div>

                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">

				            <button type="submit" class="btn btn-success">Guardar y volver a la lista</button>
				            <a href="<?php echo base_url(); ?>backend/cruds" class="btn btn-default">Cancelar</a>

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
