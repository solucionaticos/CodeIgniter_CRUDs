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

                <?php echo form_open('backend/campos/update', array('id' => 'forma_g', 'class' => 'form-horizontal')); ?>              

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
                    	<label class="control-label col-sm-2" for="sql_linea_g">Sql Linea:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="sql_linea_g" name="sql_linea">
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
                    	<label class="control-label col-sm-2" for="tipo_dato_g">Tipo Dato:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="tipo_dato_g" name="tipo_dato">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="tamano_g">Tamano:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="tamano_g" name="tamano">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="sin_signo_g">Sin Signo:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="sin_signo_g" name="sin_signo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="no_nulo_g">No Nulo:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="no_nulo_g" name="no_nulo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="defecto_g">Defecto:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="defecto_g" name="defecto">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="defecto_valor_g">Defecto Valor:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="defecto_valor_g" name="defecto_valor">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="comentario_g">Comentario:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="comentario_g" name="comentario">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="comentario_valor_g">Comentario Valor:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="comentario_valor_g" name="comentario_valor">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="tipo_campo_g">Tipo Campo:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="tipo_campo_g" name="tipo_campo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="tipo_entrada_g">Tipo Entrada:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="tipo_entrada_g" name="tipo_entrada">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="tipo_entrada_parametro_g">Tipo Entrada Parametro:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="tipo_entrada_parametro_g" name="tipo_entrada_parametro">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="archivo_g">Archivo:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="archivo_g" name="archivo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="archivo_ruta_g">Archivo Ruta:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="archivo_ruta_g" name="archivo_ruta">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_datos_g">Relacion Datos:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="relacion_datos_g" name="relacion_datos">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_tabla_g">Relacion Tabla:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="relacion_tabla_g" name="relacion_tabla">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_campo_g">Relacion Campo:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="relacion_campo_g" name="relacion_campo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_nombre_g">Relacion Nombre:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="relacion_nombre_g" name="relacion_nombre">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_condicion_g">Relacion Condicion:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="relacion_condicion_g" name="relacion_condicion">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_orden_g">Relacion Orden:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="relacion_orden_g" name="relacion_orden">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_etiqueta_nm_g">Relacion Etiqueta Nm:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="relacion_etiqueta_nm_g" name="relacion_etiqueta_nm">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_tabla_n_g">Relacion Tabla N:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="relacion_tabla_n_g" name="relacion_tabla_n">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_campo_n_g">Relacion Campo N:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="relacion_campo_n_g" name="relacion_campo_n">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_tabla_m_g">Relacion Tabla M:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="relacion_tabla_m_g" name="relacion_tabla_m">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_campo_m_tabla_a_g">Relacion Campo M Tabla A:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="relacion_campo_m_tabla_a_g" name="relacion_campo_m_tabla_a">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_campo_m_tabla_b_g">Relacion Campo M Tabla B:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="relacion_campo_m_tabla_b_g" name="relacion_campo_m_tabla_b">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_campo_m_prioridad_g">Relacion Campo M Prioridad:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="relacion_campo_m_prioridad_g" name="relacion_campo_m_prioridad">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="relacion_campo_nm_condicion_g">Relacion Campo Nm Condicion:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="relacion_campo_nm_condicion_g" name="relacion_campo_nm_condicion">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="orden_g">Orden:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="orden_g" name="orden">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="llave_primaria_g">Llave Primaria:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="llave_primaria_g" name="llave_primaria">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="autonumerico_g">Autonumerico:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="autonumerico_g" name="autonumerico">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="indice_g">Indice:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="indice_g" name="indice">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="unico_g">Unico:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="unico_g" name="unico">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="comentarios_g">Comentarios:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="comentarios_g" name="comentarios"></textarea>
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
				            <a href="<?php echo base_url(); ?>backend/campos" class="btn btn-default">Cancelar</a>
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
