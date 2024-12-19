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

                <?php echo form_open('backend/ci_datatables_ssp/empleados/guardar', array('id' => 'forma_g', 'class' => 'form-horizontal')); ?>              

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
                    	<label class="control-label col-sm-2" for="clave_g">Clave:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="clave_g" name="clave">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="correo_g">Correo:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="correo_g" name="correo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="documento_tipo_id_g">Documento Tipo Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="documento_tipo_id_g" name="documento_tipo_id" >
<?php foreach ($data["datos"]["tabla_datos_documento_tipos"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="documento_numero_g">Documento Numero:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="documento_numero_g" name="documento_numero">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="documento_fecha_expedicion_g">Documento Fecha Expedicion:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control datepicker" id="documento_fecha_expedicion_g" name="documento_fecha_expedicion">
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
                    	<label class="control-label col-sm-2" for="estado_id_g">Estado Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="estado_id_g" name="estado_id" >
<?php foreach ($data["datos"]["tabla_datos_paises_estados"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="ciudad_id_g">Ciudad Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="ciudad_id_g" name="ciudad_id" >
<?php foreach ($data["datos"]["tabla_datos_ciudades"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="direccion_1_g">Direccion 1:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="direccion_1_g" name="direccion_1">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="direccion_2_g">Direccion 2:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="direccion_2_g" name="direccion_2">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="nacimiento_fecha_g">Nacimiento Fecha:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control datepicker" id="nacimiento_fecha_g" name="nacimiento_fecha">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="nacimiento_pais_id_g">Nacimiento Pais Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="nacimiento_pais_id_g" name="nacimiento_pais_id" >
<?php foreach ($data["datos"]["tabla_datos_paises"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="nacimiento_ciudad_id_g">Nacimiento Ciudad Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="nacimiento_ciudad_id_g" name="nacimiento_ciudad_id" >
<?php foreach ($data["datos"]["tabla_datos_ciudades"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="numero_posicion_g">Numero Posicion:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="numero_posicion_g" name="numero_posicion">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="posicion_g">Posicion:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="posicion_g" name="posicion">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="vicepresidencia_g">Vicepresidencia:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="vicepresidencia_g" name="vicepresidencia">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="moneda_id_g">Moneda Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="moneda_id_g" name="moneda_id" >
<?php foreach ($data["datos"]["tabla_datos_monedas"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="sueldo_g">Sueldo:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="sueldo_g" name="sueldo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="centro_costo_id_g">Centro Costo Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="centro_costo_id_g" name="centro_costo_id" >
<?php foreach ($data["datos"]["tabla_empresa_centros_costo"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="frecuencia_pago_id_g">Frecuencia Pago Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="frecuencia_pago_id_g" name="frecuencia_pago_id" >
<?php foreach ($data["datos"]["tabla_datos_frecuencias_pagos"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="compania_g">Compania:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="compania_g" name="compania">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="genero_id_g">Genero Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="genero_id_g" name="genero_id" >
<?php foreach ($data["datos"]["tabla_datos_generos"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="estado_civil_id_g">Estado Civil Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="estado_civil_id_g" name="estado_civil_id" >
<?php foreach ($data["datos"]["tabla_datos_estado_civiles"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="contratos_tipos_id_g">Contratos Tipos Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="contratos_tipos_id_g" name="contratos_tipos_id" >
<?php foreach ($data["datos"]["tabla_datos_contratos_tipos"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="fecha_finalizacion_g">Fecha Finalizacion:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control datepicker" id="fecha_finalizacion_g" name="fecha_finalizacion">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="correo_externo_g">Correo Externo:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="correo_externo_g" name="correo_externo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="correo_interno_g">Correo Interno:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="correo_interno_g" name="correo_interno">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="nomina_area_id_g">Nomina Area Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="nomina_area_id_g" name="nomina_area_id" >
<?php foreach ($data["datos"]["tabla_empresa_nomina_areas"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="banda_salarial_g">Banda Salarial:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="banda_salarial_g" name="banda_salarial">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="jefe_codigo_g">Jefe Codigo:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="jefe_codigo_g" name="jefe_codigo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="jefe_nombre_g">Jefe Nombre:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="jefe_nombre_g" name="jefe_nombre">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="banco_deposito_id_g">Banco Deposito Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="banco_deposito_id_g" name="banco_deposito_id" >
<?php foreach ($data["datos"]["tabla_datos_bancos"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="banco_deposito_tipo_cuenta_id_g">Banco Deposito Tipo Cuenta Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="banco_deposito_tipo_cuenta_id_g" name="banco_deposito_tipo_cuenta_id" >
<?php foreach ($data["datos"]["tabla_datos_banco_tipos_cuenta"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="banco_deposito_cuenta_g">Banco Deposito Cuenta:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="banco_deposito_cuenta_g" name="banco_deposito_cuenta">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="eps_g">Eps:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="eps_g" name="eps">
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
                    	<label class="control-label col-sm-2" for="arl_id_g">Arl Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="arl_id_g" name="arl_id" >
<?php foreach ($data["datos"]["tabla_datos_arls"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="fondo_cesantias_id_g">Fondo Cesantias Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="fondo_cesantias_id_g" name="fondo_cesantias_id" >
<?php foreach ($data["datos"]["tabla_datos_fondos_cesantias"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="fondo_pensiones_id_g">Fondo Pensiones Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="fondo_pensiones_id_g" name="fondo_pensiones_id" >
<?php foreach ($data["datos"]["tabla_datos_fondos_pensiones"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="afc_entidad_id_g">Afc Entidad Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="afc_entidad_id_g" name="afc_entidad_id" >
<?php foreach ($data["datos"]["tabla_datos_afc_entidades"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="afc_cuenta_id_g">Afc Cuenta Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="afc_cuenta_id_g" name="afc_cuenta_id" >
<?php foreach ($data["datos"]["tabla_datos_afc_cuentas"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="fondo_pensiones_voluntario_id_g">Fondo Pensiones Voluntario Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="fondo_pensiones_voluntario_id_g" name="fondo_pensiones_voluntario_id" >
<?php foreach ($data["datos"]["tabla_datos_fondos_pensiones_voluntarios"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="celular_g">Celular:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="celular_g" name="celular">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="telefono_emergencia_g">Telefono Emergencia:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="telefono_emergencia_g" name="telefono_emergencia">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="tipo_medida_id_g">Tipo Medida Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="tipo_medida_id_g" name="tipo_medida_id" >
<?php foreach ($data["datos"]["tabla_datos_tipos_medidas"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="tipo_compensacion_variable_id_g">Tipo Compensacion Variable Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="tipo_compensacion_variable_id_g" name="tipo_compensacion_variable_id" >
<?php foreach ($data["datos"]["tabla_datos_tipos_compensaciones_variables"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="procentaje_compensacion_variable_g">Procentaje Compensacion Variable:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="procentaje_compensacion_variable_g" name="procentaje_compensacion_variable">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="nivel_educativo_g">Nivel Educativo:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="nivel_educativo_g" name="nivel_educativo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="especialidad_g">Especialidad:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="especialidad_g" name="especialidad">
                    	</div>
                    </div>

				    <div class="form-group"> 
				        <div class="col-sm-offset-2 col-sm-10">
				            <button type="submit" class="btn btn-primary">Actualizar y volver a la lista</button>
				            <a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/backend/ci_datatables_ssp/empleados" class="btn btn-default">Cancelar</a>
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
