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

                <?php echo form_open('backend/ci_datatables_ssp/empleados/insert', array('id' => 'forma_i', 'class' => 'form-horizontal')); ?>  

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
                    	<label class="control-label col-sm-2" for="clave_i">Clave:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="clave_i" name="clave">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="correo_i">Correo:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="correo_i" name="correo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="documento_tipo_id_i">Documento Tipo Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="documento_tipo_id_i" name="documento_tipo_id" >
<?php foreach ($data["datos"]["tabla_datos_documento_tipos"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="documento_numero_i">Documento Numero:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="documento_numero_i" name="documento_numero">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="documento_fecha_expedicion_i">Documento Fecha Expedicion:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control datepicker" id="documento_fecha_expedicion_i" name="documento_fecha_expedicion">
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
                    	<label class="control-label col-sm-2" for="estado_id_i">Estado Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="estado_id_i" name="estado_id" >
<?php foreach ($data["datos"]["tabla_datos_paises_estados"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="ciudad_id_i">Ciudad Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="ciudad_id_i" name="ciudad_id" >
<?php foreach ($data["datos"]["tabla_datos_ciudades"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="direccion_1_i">Direccion 1:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="direccion_1_i" name="direccion_1">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="direccion_2_i">Direccion 2:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="direccion_2_i" name="direccion_2">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="nacimiento_fecha_i">Nacimiento Fecha:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control datepicker" id="nacimiento_fecha_i" name="nacimiento_fecha">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="nacimiento_pais_id_i">Nacimiento Pais Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="nacimiento_pais_id_i" name="nacimiento_pais_id" >
<?php foreach ($data["datos"]["tabla_datos_paises"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="nacimiento_ciudad_id_i">Nacimiento Ciudad Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="nacimiento_ciudad_id_i" name="nacimiento_ciudad_id" >
<?php foreach ($data["datos"]["tabla_datos_ciudades"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="numero_posicion_i">Numero Posicion:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="numero_posicion_i" name="numero_posicion">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="posicion_i">Posicion:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="posicion_i" name="posicion">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="vicepresidencia_i">Vicepresidencia:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="vicepresidencia_i" name="vicepresidencia">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="moneda_id_i">Moneda Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="moneda_id_i" name="moneda_id" >
<?php foreach ($data["datos"]["tabla_datos_monedas"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="sueldo_i">Sueldo:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="sueldo_i" name="sueldo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="centro_costo_id_i">Centro Costo Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="centro_costo_id_i" name="centro_costo_id" >
<?php foreach ($data["datos"]["tabla_empresa_centros_costo"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="frecuencia_pago_id_i">Frecuencia Pago Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="frecuencia_pago_id_i" name="frecuencia_pago_id" >
<?php foreach ($data["datos"]["tabla_datos_frecuencias_pagos"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="compania_i">Compania:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="compania_i" name="compania">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="genero_id_i">Genero Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="genero_id_i" name="genero_id" >
<?php foreach ($data["datos"]["tabla_datos_generos"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="estado_civil_id_i">Estado Civil Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="estado_civil_id_i" name="estado_civil_id" >
<?php foreach ($data["datos"]["tabla_datos_estado_civiles"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="contratos_tipos_id_i">Contratos Tipos Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="contratos_tipos_id_i" name="contratos_tipos_id" >
<?php foreach ($data["datos"]["tabla_datos_contratos_tipos"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="fecha_finalizacion_i">Fecha Finalizacion:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control datepicker" id="fecha_finalizacion_i" name="fecha_finalizacion">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="correo_externo_i">Correo Externo:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="correo_externo_i" name="correo_externo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="correo_interno_i">Correo Interno:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="correo_interno_i" name="correo_interno">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="nomina_area_id_i">Nomina Area Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="nomina_area_id_i" name="nomina_area_id" >
<?php foreach ($data["datos"]["tabla_empresa_nomina_areas"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="banda_salarial_i">Banda Salarial:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="banda_salarial_i" name="banda_salarial">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="jefe_codigo_i">Jefe Codigo:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="jefe_codigo_i" name="jefe_codigo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="jefe_nombre_i">Jefe Nombre:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="jefe_nombre_i" name="jefe_nombre">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="banco_deposito_id_i">Banco Deposito Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="banco_deposito_id_i" name="banco_deposito_id" >
<?php foreach ($data["datos"]["tabla_datos_bancos"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="banco_deposito_tipo_cuenta_id_i">Banco Deposito Tipo Cuenta Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="banco_deposito_tipo_cuenta_id_i" name="banco_deposito_tipo_cuenta_id" >
<?php foreach ($data["datos"]["tabla_datos_banco_tipos_cuenta"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="banco_deposito_cuenta_i">Banco Deposito Cuenta:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="banco_deposito_cuenta_i" name="banco_deposito_cuenta">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="eps_i">Eps:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="eps_i" name="eps">
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
                    	<label class="control-label col-sm-2" for="arl_id_i">Arl Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="arl_id_i" name="arl_id" >
<?php foreach ($data["datos"]["tabla_datos_arls"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="fondo_cesantias_id_i">Fondo Cesantias Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="fondo_cesantias_id_i" name="fondo_cesantias_id" >
<?php foreach ($data["datos"]["tabla_datos_fondos_cesantias"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="fondo_pensiones_id_i">Fondo Pensiones Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="fondo_pensiones_id_i" name="fondo_pensiones_id" >
<?php foreach ($data["datos"]["tabla_datos_fondos_pensiones"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="afc_entidad_id_i">Afc Entidad Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="afc_entidad_id_i" name="afc_entidad_id" >
<?php foreach ($data["datos"]["tabla_datos_afc_entidades"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="afc_cuenta_id_i">Afc Cuenta Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="afc_cuenta_id_i" name="afc_cuenta_id" >
<?php foreach ($data["datos"]["tabla_datos_afc_cuentas"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="fondo_pensiones_voluntario_id_i">Fondo Pensiones Voluntario Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="fondo_pensiones_voluntario_id_i" name="fondo_pensiones_voluntario_id" >
<?php foreach ($data["datos"]["tabla_datos_fondos_pensiones_voluntarios"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="celular_i">Celular:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="celular_i" name="celular">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="telefono_emergencia_i">Telefono Emergencia:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="telefono_emergencia_i" name="telefono_emergencia">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="tipo_medida_id_i">Tipo Medida Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="tipo_medida_id_i" name="tipo_medida_id" >
<?php foreach ($data["datos"]["tabla_datos_tipos_medidas"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="tipo_compensacion_variable_id_i">Tipo Compensacion Variable Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="tipo_compensacion_variable_id_i" name="tipo_compensacion_variable_id" >
<?php foreach ($data["datos"]["tabla_datos_tipos_compensaciones_variables"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="procentaje_compensacion_variable_i">Procentaje Compensacion Variable:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="procentaje_compensacion_variable_i" name="procentaje_compensacion_variable">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="nivel_educativo_i">Nivel Educativo:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="nivel_educativo_i" name="nivel_educativo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="especialidad_i">Especialidad:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="especialidad_i" name="especialidad">
                    	</div>
                    </div>

                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">

				            <button type="submit" class="btn btn-success">Guardar y volver a la lista</button>
				            <a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/backend/ci_datatables_ssp/empleados" class="btn btn-default">Cancelar</a>

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
