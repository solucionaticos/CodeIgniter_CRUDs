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

                <?php echo form_open('backend/campos/insert', array('id' => 'forma_i', 'class' => 'form-horizontal')); ?>  

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
                    	<label class="control-label col-sm-2" for="sql_linea_i">Sql Linea:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="sql_linea_i" name="sql_linea">
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
                    	<label class="control-label col-sm-2" for="nombre_i">Nombre:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="nombre_i" name="nombre">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="etiqueta_i">Etiqueta:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="etiqueta_i" name="etiqueta">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="tipo_dato_i">Tipo Dato:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="tipo_dato_i" name="tipo_dato">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="tamano_i">Tamano:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="tamano_i" name="tamano">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="sin_signo_i">Sin Signo:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="sin_signo_i" name="sin_signo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="no_nulo_i">No Nulo:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="no_nulo_i" name="no_nulo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="defecto_i">Defecto:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="defecto_i" name="defecto">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="defecto_valor_i">Defecto Valor:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="defecto_valor_i" name="defecto_valor">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="comentario_i">Comentario:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="comentario_i" name="comentario">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="comentario_valor_i">Comentario Valor:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="comentario_valor_i" name="comentario_valor">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="tipo_campo_i">Tipo Campo:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="tipo_campo_i" name="tipo_campo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="tipo_entrada_i">Tipo Entrada:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="tipo_entrada_i" name="tipo_entrada">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="tipo_entrada_parametro_i">Tipo Entrada Parametro:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="tipo_entrada_parametro_i" name="tipo_entrada_parametro">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="archivo_i">Archivo:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="archivo_i" name="archivo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="archivo_ruta_i">Archivo Ruta:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="archivo_ruta_i" name="archivo_ruta">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_datos_i">Relacion Datos:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="relacion_datos_i" name="relacion_datos">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_tabla_i">Relacion Tabla:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="relacion_tabla_i" name="relacion_tabla">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_campo_i">Relacion Campo:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="relacion_campo_i" name="relacion_campo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_nombre_i">Relacion Nombre:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="relacion_nombre_i" name="relacion_nombre">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_condicion_i">Relacion Condicion:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="relacion_condicion_i" name="relacion_condicion">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_orden_i">Relacion Orden:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="relacion_orden_i" name="relacion_orden">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_etiqueta_nm_i">Relacion Etiqueta Nm:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="relacion_etiqueta_nm_i" name="relacion_etiqueta_nm">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_tabla_n_i">Relacion Tabla N:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="relacion_tabla_n_i" name="relacion_tabla_n">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_campo_n_i">Relacion Campo N:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="relacion_campo_n_i" name="relacion_campo_n">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_tabla_m_i">Relacion Tabla M:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="relacion_tabla_m_i" name="relacion_tabla_m">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_campo_m_tabla_a_i">Relacion Campo M Tabla A:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="relacion_campo_m_tabla_a_i" name="relacion_campo_m_tabla_a">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_campo_m_tabla_b_i">Relacion Campo M Tabla B:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="relacion_campo_m_tabla_b_i" name="relacion_campo_m_tabla_b">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_campo_m_prioridad_i">Relacion Campo M Prioridad:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="relacion_campo_m_prioridad_i" name="relacion_campo_m_prioridad">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_campo_nm_condicion_i">Relacion Campo Nm Condicion:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="relacion_campo_nm_condicion_i" name="relacion_campo_nm_condicion">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="orden_i">Orden:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="orden_i" name="orden">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="llave_primaria_i">Llave Primaria:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="llave_primaria_i" name="llave_primaria">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="autonumerico_i">Autonumerico:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="autonumerico_i" name="autonumerico">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="indice_i">Indice:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="indice_i" name="indice">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="unico_i">Unico:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="unico_i" name="unico">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="comentarios_i">Comentarios:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="comentarios_i" name="comentarios"></textarea>
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
				            <a href="<?php echo base_url(); ?>backend/campos" class="btn btn-default">Cancelar</a>

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
