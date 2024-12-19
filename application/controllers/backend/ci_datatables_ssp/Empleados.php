<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Empleados extends MY_Controller {

	public $parameters;

	public function __construct() {
		parent::__construct();
		// $this->ctrSegAdmin();
	}

	public function index() {
		$this->parameters['template'] = 'ssp';
		$this->parameters['type'] = 'list';
		$this->parameters['path'] = $this->config->item('adminPath') . '/backend/ci_datatables_ssp/empleados';
		$this->parameters['title'] = 'Empleados';
		$this->parameters['subtitle'] = '';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = '
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li class="active">Empleados</li>
		</ol>'; 

		$this->admin_design->layout2($this->parameters);
	}

	public function new() {


		$tabla_datos_documento_tipos = $this->Model->registros("datos_documento_tipos", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_documento_tipos"] = $tabla_datos_documento_tipos;
		$tabla_datos_paises = $this->Model->registros("datos_paises", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_paises"] = $tabla_datos_paises;
		$tabla_datos_paises_estados = $this->Model->registros("datos_paises_estados", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_paises_estados"] = $tabla_datos_paises_estados;
		$tabla_datos_ciudades = $this->Model->registros("datos_ciudades", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_ciudades"] = $tabla_datos_ciudades;
		$tabla_datos_paises = $this->Model->registros("datos_paises", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_paises"] = $tabla_datos_paises;
		$tabla_datos_ciudades = $this->Model->registros("datos_ciudades", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_ciudades"] = $tabla_datos_ciudades;
		$tabla_datos_monedas = $this->Model->registros("datos_monedas", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_monedas"] = $tabla_datos_monedas;
		$tabla_empresa_centros_costo = $this->Model->registros("empresa_centros_costo", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_empresa_centros_costo"] = $tabla_empresa_centros_costo;
		$tabla_datos_frecuencias_pagos = $this->Model->registros("datos_frecuencias_pagos", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_frecuencias_pagos"] = $tabla_datos_frecuencias_pagos;
		$tabla_datos_generos = $this->Model->registros("datos_generos", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_generos"] = $tabla_datos_generos;
		$tabla_datos_estado_civiles = $this->Model->registros("datos_estado_civiles", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_estado_civiles"] = $tabla_datos_estado_civiles;
		$tabla_datos_contratos_tipos = $this->Model->registros("datos_contratos_tipos", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_contratos_tipos"] = $tabla_datos_contratos_tipos;
		$tabla_empresa_nomina_areas = $this->Model->registros("empresa_nomina_areas", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_empresa_nomina_areas"] = $tabla_empresa_nomina_areas;
		$tabla_datos_bancos = $this->Model->registros("datos_bancos", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_bancos"] = $tabla_datos_bancos;
		$tabla_datos_banco_tipos_cuenta = $this->Model->registros("datos_banco_tipos_cuenta", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_banco_tipos_cuenta"] = $tabla_datos_banco_tipos_cuenta;
		$tabla_datos_arls = $this->Model->registros("datos_arls", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_arls"] = $tabla_datos_arls;
		$tabla_datos_fondos_cesantias = $this->Model->registros("datos_fondos_cesantias", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_fondos_cesantias"] = $tabla_datos_fondos_cesantias;
		$tabla_datos_fondos_pensiones = $this->Model->registros("datos_fondos_pensiones", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_fondos_pensiones"] = $tabla_datos_fondos_pensiones;
		$tabla_datos_afc_entidades = $this->Model->registros("datos_afc_entidades", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_afc_entidades"] = $tabla_datos_afc_entidades;
		$tabla_datos_afc_cuentas = $this->Model->registros("datos_afc_cuentas", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_afc_cuentas"] = $tabla_datos_afc_cuentas;
		$tabla_datos_fondos_pensiones_voluntarios = $this->Model->registros("datos_fondos_pensiones_voluntarios", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_fondos_pensiones_voluntarios"] = $tabla_datos_fondos_pensiones_voluntarios;
		$tabla_datos_tipos_medidas = $this->Model->registros("datos_tipos_medidas", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_tipos_medidas"] = $tabla_datos_tipos_medidas;
		$tabla_datos_tipos_compensaciones_variables = $this->Model->registros("datos_tipos_compensaciones_variables", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_tipos_compensaciones_variables"] = $tabla_datos_tipos_compensaciones_variables;

		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'new';
		$this->parameters['path'] = $this->config->item('adminPath') . '/backend/ci_datatables_ssp/empleados';
		$this->parameters['title'] = 'Empleados';
		$this->parameters['subtitle'] = 'New';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = '
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li class="active">Empleados</li>
		</ol>'; 

		$this->admin_design->layout2($this->parameters);

	}

	public function edit($id) {
		$this->parameters['data']['id'] = $id;


		$tabla_datos_documento_tipos = $this->Model->registros("datos_documento_tipos", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_documento_tipos"] = $tabla_datos_documento_tipos;
		$tabla_datos_paises = $this->Model->registros("datos_paises", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_paises"] = $tabla_datos_paises;
		$tabla_datos_paises_estados = $this->Model->registros("datos_paises_estados", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_paises_estados"] = $tabla_datos_paises_estados;
		$tabla_datos_ciudades = $this->Model->registros("datos_ciudades", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_ciudades"] = $tabla_datos_ciudades;
		$tabla_datos_paises = $this->Model->registros("datos_paises", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_paises"] = $tabla_datos_paises;
		$tabla_datos_ciudades = $this->Model->registros("datos_ciudades", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_ciudades"] = $tabla_datos_ciudades;
		$tabla_datos_monedas = $this->Model->registros("datos_monedas", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_monedas"] = $tabla_datos_monedas;
		$tabla_empresa_centros_costo = $this->Model->registros("empresa_centros_costo", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_empresa_centros_costo"] = $tabla_empresa_centros_costo;
		$tabla_datos_frecuencias_pagos = $this->Model->registros("datos_frecuencias_pagos", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_frecuencias_pagos"] = $tabla_datos_frecuencias_pagos;
		$tabla_datos_generos = $this->Model->registros("datos_generos", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_generos"] = $tabla_datos_generos;
		$tabla_datos_estado_civiles = $this->Model->registros("datos_estado_civiles", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_estado_civiles"] = $tabla_datos_estado_civiles;
		$tabla_datos_contratos_tipos = $this->Model->registros("datos_contratos_tipos", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_contratos_tipos"] = $tabla_datos_contratos_tipos;
		$tabla_empresa_nomina_areas = $this->Model->registros("empresa_nomina_areas", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_empresa_nomina_areas"] = $tabla_empresa_nomina_areas;
		$tabla_datos_bancos = $this->Model->registros("datos_bancos", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_bancos"] = $tabla_datos_bancos;
		$tabla_datos_banco_tipos_cuenta = $this->Model->registros("datos_banco_tipos_cuenta", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_banco_tipos_cuenta"] = $tabla_datos_banco_tipos_cuenta;
		$tabla_datos_arls = $this->Model->registros("datos_arls", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_arls"] = $tabla_datos_arls;
		$tabla_datos_fondos_cesantias = $this->Model->registros("datos_fondos_cesantias", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_fondos_cesantias"] = $tabla_datos_fondos_cesantias;
		$tabla_datos_fondos_pensiones = $this->Model->registros("datos_fondos_pensiones", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_fondos_pensiones"] = $tabla_datos_fondos_pensiones;
		$tabla_datos_afc_entidades = $this->Model->registros("datos_afc_entidades", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_afc_entidades"] = $tabla_datos_afc_entidades;
		$tabla_datos_afc_cuentas = $this->Model->registros("datos_afc_cuentas", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_afc_cuentas"] = $tabla_datos_afc_cuentas;
		$tabla_datos_fondos_pensiones_voluntarios = $this->Model->registros("datos_fondos_pensiones_voluntarios", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_fondos_pensiones_voluntarios"] = $tabla_datos_fondos_pensiones_voluntarios;
		$tabla_datos_tipos_medidas = $this->Model->registros("datos_tipos_medidas", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_tipos_medidas"] = $tabla_datos_tipos_medidas;
		$tabla_datos_tipos_compensaciones_variables = $this->Model->registros("datos_tipos_compensaciones_variables", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_tipos_compensaciones_variables"] = $tabla_datos_tipos_compensaciones_variables;

		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'edit';
		$this->parameters['path'] = $this->config->item('adminPath') . '/backend/ci_datatables_ssp/empleados';
		$this->parameters['title'] = 'Empleados';
		$this->parameters['subtitle'] = 'Edit';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = '
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Empleados</li>
		</ol>'; 

		$this->admin_design->layout2($this->parameters);

	}

	public function getRecord () {
		$post = $this->input->post(NULL, TRUE);
		$registro = $this->Model->registro('empleados', $post['id']);
		// $datos = array('registro'=>$registro, 'tksec'=>$this->security->get_csrf_hash());
		$datos = array('registro'=>$registro);
		echo json_encode($datos);      
	}

	public function insert () {

		$post = $this->input->post(NULL, TRUE);
		if (!empty($post)) {
			foreach ($post as $key => $value) {
				$post[$key] = $this->security->xss_clean($value);
			}
      
			$this->form_validation->set_rules('id', 'ID', 'xss_clean');


			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.validation_errors().'<br><b>'.$this->lang->line('be_please_try_again').'</b>');
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				
			} else {
        
				
        
				
				$datos = array(
						"nombre" => $post["nombre"],
						"apellidos" => $post["apellidos"],
						"clave" => $post["clave"],
						"correo" => $post["correo"],
						"documento_tipo_id" => $post["documento_tipo_id"],
						"documento_numero" => $post["documento_numero"],
						"documento_fecha_expedicion" => $post["documento_fecha_expedicion"],
						"pais_id" => $post["pais_id"],
						"estado_id" => $post["estado_id"],
						"ciudad_id" => $post["ciudad_id"],
						"direccion_1" => $post["direccion_1"],
						"direccion_2" => $post["direccion_2"],
						"nacimiento_fecha" => $post["nacimiento_fecha"],
						"nacimiento_pais_id" => $post["nacimiento_pais_id"],
						"nacimiento_ciudad_id" => $post["nacimiento_ciudad_id"],
						"numero_posicion" => $post["numero_posicion"],
						"posicion" => $post["posicion"],
						"vicepresidencia" => $post["vicepresidencia"],
						"moneda_id" => $post["moneda_id"],
						"sueldo" => $post["sueldo"],
						"centro_costo_id" => $post["centro_costo_id"],
						"frecuencia_pago_id" => $post["frecuencia_pago_id"],
						"compania" => $post["compania"],
						"genero_id" => $post["genero_id"],
						"estado_civil_id" => $post["estado_civil_id"],
						"contratos_tipos_id" => $post["contratos_tipos_id"],
						"fecha_finalizacion" => $post["fecha_finalizacion"],
						"correo_externo" => $post["correo_externo"],
						"correo_interno" => $post["correo_interno"],
						"nomina_area_id" => $post["nomina_area_id"],
						"banda_salarial" => $post["banda_salarial"],
						"jefe_codigo" => $post["jefe_codigo"],
						"jefe_nombre" => $post["jefe_nombre"],
						"banco_deposito_id" => $post["banco_deposito_id"],
						"banco_deposito_tipo_cuenta_id" => $post["banco_deposito_tipo_cuenta_id"],
						"banco_deposito_cuenta" => $post["banco_deposito_cuenta"],
						"eps" => $post["eps"],
						"fecha_creacion" => $post["fecha_creacion"],
						"activo" => $post["activo"],
						"arl_id" => $post["arl_id"],
						"fondo_cesantias_id" => $post["fondo_cesantias_id"],
						"fondo_pensiones_id" => $post["fondo_pensiones_id"],
						"afc_entidad_id" => $post["afc_entidad_id"],
						"afc_cuenta_id" => $post["afc_cuenta_id"],
						"fondo_pensiones_voluntario_id" => $post["fondo_pensiones_voluntario_id"],
						"celular" => $post["celular"],
						"telefono_emergencia" => $post["telefono_emergencia"],
						"tipo_medida_id" => $post["tipo_medida_id"],
						"tipo_compensacion_variable_id" => $post["tipo_compensacion_variable_id"],
						"procentaje_compensacion_variable" => $post["procentaje_compensacion_variable"],
						"nivel_educativo" => $post["nivel_educativo"],
						"especialidad" => $post["especialidad"],);

				$id = $this->Model->insertar('empleados', $datos);
				if ($id > 0) {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El registro se ingresó exitosamente.'); 
					$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
					redirect(base_url() . $this->config->item('adminPath') . '/backend/ci_datatables_ssp/empleados');
				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible ingresar el registro.<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				}     
			}

		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No se recibieron datos.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
		}
		redirect(base_url() . $this->config->item('adminPath') . '/backend/ci_datatables_ssp/empleados/new');
	}


	public function update () {
		$post = $this->input->post(NULL, TRUE);
		if (!empty($post)) {
			foreach ($post as $key => $value) {
				$post[$key] = $this->security->xss_clean($value);
			}
      
			$this->form_validation->set_rules('id', 'ID', 'xss_clean');

      
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.validation_errors().'<br><b>'.$this->lang->line('be_please_try_again').'</b>');
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
			} else {
        
				
        
				
				$datos = array(
						"nombre" => $post["nombre"],
						"apellidos" => $post["apellidos"],
						"clave" => $post["clave"],
						"correo" => $post["correo"],
						"documento_tipo_id" => $post["documento_tipo_id"],
						"documento_numero" => $post["documento_numero"],
						"documento_fecha_expedicion" => $post["documento_fecha_expedicion"],
						"pais_id" => $post["pais_id"],
						"estado_id" => $post["estado_id"],
						"ciudad_id" => $post["ciudad_id"],
						"direccion_1" => $post["direccion_1"],
						"direccion_2" => $post["direccion_2"],
						"nacimiento_fecha" => $post["nacimiento_fecha"],
						"nacimiento_pais_id" => $post["nacimiento_pais_id"],
						"nacimiento_ciudad_id" => $post["nacimiento_ciudad_id"],
						"numero_posicion" => $post["numero_posicion"],
						"posicion" => $post["posicion"],
						"vicepresidencia" => $post["vicepresidencia"],
						"moneda_id" => $post["moneda_id"],
						"sueldo" => $post["sueldo"],
						"centro_costo_id" => $post["centro_costo_id"],
						"frecuencia_pago_id" => $post["frecuencia_pago_id"],
						"compania" => $post["compania"],
						"genero_id" => $post["genero_id"],
						"estado_civil_id" => $post["estado_civil_id"],
						"contratos_tipos_id" => $post["contratos_tipos_id"],
						"fecha_finalizacion" => $post["fecha_finalizacion"],
						"correo_externo" => $post["correo_externo"],
						"correo_interno" => $post["correo_interno"],
						"nomina_area_id" => $post["nomina_area_id"],
						"banda_salarial" => $post["banda_salarial"],
						"jefe_codigo" => $post["jefe_codigo"],
						"jefe_nombre" => $post["jefe_nombre"],
						"banco_deposito_id" => $post["banco_deposito_id"],
						"banco_deposito_tipo_cuenta_id" => $post["banco_deposito_tipo_cuenta_id"],
						"banco_deposito_cuenta" => $post["banco_deposito_cuenta"],
						"eps" => $post["eps"],
						"fecha_creacion" => $post["fecha_creacion"],
						"activo" => $post["activo"],
						"arl_id" => $post["arl_id"],
						"fondo_cesantias_id" => $post["fondo_cesantias_id"],
						"fondo_pensiones_id" => $post["fondo_pensiones_id"],
						"afc_entidad_id" => $post["afc_entidad_id"],
						"afc_cuenta_id" => $post["afc_cuenta_id"],
						"fondo_pensiones_voluntario_id" => $post["fondo_pensiones_voluntario_id"],
						"celular" => $post["celular"],
						"telefono_emergencia" => $post["telefono_emergencia"],
						"tipo_medida_id" => $post["tipo_medida_id"],
						"tipo_compensacion_variable_id" => $post["tipo_compensacion_variable_id"],
						"procentaje_compensacion_variable" => $post["procentaje_compensacion_variable"],
						"nivel_educativo" => $post["nivel_educativo"],
						"especialidad" => $post["especialidad"],);

				if ($this->Model->actualizar('empleados', $datos, $post['id'])) {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El registro se guardo exitosamente.'); 
					$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
					redirect(base_url() . $this->config->item('adminPath') . '/backend/ci_datatables_ssp/empleados');
				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible guardar el registro.<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				}     

			}
		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No se recibieron datos.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
		}
		redirect(base_url() . $this->config->item('adminPath') . '/backend/ci_datatables_ssp/empleados/edit/'.$post['id']);   
	}

	public function delete () {
		$post = $this->input->post(NULL, TRUE);
		if (!empty($post)) {
			foreach ($post as $key => $value) {
				$post[$key] = $this->security->xss_clean($value);
			}
			$this->form_validation->set_rules('id', 'ID', 'required|trim|xss_clean');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.validation_errors().'<br><b>'.$this->lang->line('be_please_try_again').'</b>');
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
			} else {

				$mat_id = explode(";", $post['id']); 
				$proceso = false;          
				foreach ($mat_id as $id) {
					$this->Model->eliminar('empleados', $id);
					$proceso = true;
				}

				if ($proceso) {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El(los) registro(s) se eliminó(aron) exitosamente.'); 
					$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible eliminar el(los) registro(s).<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				}     

			}
		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No se recibieron datos.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
		}
		redirect(base_url() . $this->config->item('adminPath') . '/backend/ci_datatables_ssp/empleados');   
	}

  
	public function list () {

		$registros = $this->Model->registros('empleados');
    
	  	$datosJson = '
	  		{	
	  			"data":[';  
	    $datosJsonReg = '';
	    foreach ($registros as $key => $registro) {

			
          $documento_tipo_id = $this->Model->registro("datos_documento_tipos", $registro["documento_tipo_id"]);
          if ($documento_tipo_id) {
             $registro["documento_tipo_id"] = $documento_tipo_id->nombre;
          } 

          $pais_id = $this->Model->registro("datos_paises", $registro["pais_id"]);
          if ($pais_id) {
             $registro["pais_id"] = $pais_id->nombre;
          } 

          $estado_id = $this->Model->registro("datos_paises_estados", $registro["estado_id"]);
          if ($estado_id) {
             $registro["estado_id"] = $estado_id->nombre;
          } 

          $ciudad_id = $this->Model->registro("datos_ciudades", $registro["ciudad_id"]);
          if ($ciudad_id) {
             $registro["ciudad_id"] = $ciudad_id->nombre;
          } 

          $nacimiento_pais_id = $this->Model->registro("datos_paises", $registro["nacimiento_pais_id"]);
          if ($nacimiento_pais_id) {
             $registro["nacimiento_pais_id"] = $nacimiento_pais_id->nombre;
          } 

          $nacimiento_ciudad_id = $this->Model->registro("datos_ciudades", $registro["nacimiento_ciudad_id"]);
          if ($nacimiento_ciudad_id) {
             $registro["nacimiento_ciudad_id"] = $nacimiento_ciudad_id->nombre;
          } 

          $moneda_id = $this->Model->registro("datos_monedas", $registro["moneda_id"]);
          if ($moneda_id) {
             $registro["moneda_id"] = $moneda_id->nombre;
          } 

          $centro_costo_id = $this->Model->registro("empresa_centros_costo", $registro["centro_costo_id"]);
          if ($centro_costo_id) {
             $registro["centro_costo_id"] = $centro_costo_id->nombre;
          } 

          $frecuencia_pago_id = $this->Model->registro("datos_frecuencias_pagos", $registro["frecuencia_pago_id"]);
          if ($frecuencia_pago_id) {
             $registro["frecuencia_pago_id"] = $frecuencia_pago_id->nombre;
          } 

          $genero_id = $this->Model->registro("datos_generos", $registro["genero_id"]);
          if ($genero_id) {
             $registro["genero_id"] = $genero_id->nombre;
          } 

          $estado_civil_id = $this->Model->registro("datos_estado_civiles", $registro["estado_civil_id"]);
          if ($estado_civil_id) {
             $registro["estado_civil_id"] = $estado_civil_id->nombre;
          } 

          $contratos_tipos_id = $this->Model->registro("datos_contratos_tipos", $registro["contratos_tipos_id"]);
          if ($contratos_tipos_id) {
             $registro["contratos_tipos_id"] = $contratos_tipos_id->nombre;
          } 

          $nomina_area_id = $this->Model->registro("empresa_nomina_areas", $registro["nomina_area_id"]);
          if ($nomina_area_id) {
             $registro["nomina_area_id"] = $nomina_area_id->nombre;
          } 

          $banco_deposito_id = $this->Model->registro("datos_bancos", $registro["banco_deposito_id"]);
          if ($banco_deposito_id) {
             $registro["banco_deposito_id"] = $banco_deposito_id->nombre;
          } 

          $banco_deposito_tipo_cuenta_id = $this->Model->registro("datos_banco_tipos_cuenta", $registro["banco_deposito_tipo_cuenta_id"]);
          if ($banco_deposito_tipo_cuenta_id) {
             $registro["banco_deposito_tipo_cuenta_id"] = $banco_deposito_tipo_cuenta_id->nombre;
          } 

          $arl_id = $this->Model->registro("datos_arls", $registro["arl_id"]);
          if ($arl_id) {
             $registro["arl_id"] = $arl_id->nombre;
          } 

          $fondo_cesantias_id = $this->Model->registro("datos_fondos_cesantias", $registro["fondo_cesantias_id"]);
          if ($fondo_cesantias_id) {
             $registro["fondo_cesantias_id"] = $fondo_cesantias_id->nombre;
          } 

          $fondo_pensiones_id = $this->Model->registro("datos_fondos_pensiones", $registro["fondo_pensiones_id"]);
          if ($fondo_pensiones_id) {
             $registro["fondo_pensiones_id"] = $fondo_pensiones_id->nombre;
          } 

          $afc_entidad_id = $this->Model->registro("datos_afc_entidades", $registro["afc_entidad_id"]);
          if ($afc_entidad_id) {
             $registro["afc_entidad_id"] = $afc_entidad_id->nombre;
          } 

          $afc_cuenta_id = $this->Model->registro("datos_afc_cuentas", $registro["afc_cuenta_id"]);
          if ($afc_cuenta_id) {
             $registro["afc_cuenta_id"] = $afc_cuenta_id->nombre;
          } 

          $fondo_pensiones_voluntario_id = $this->Model->registro("datos_fondos_pensiones_voluntarios", $registro["fondo_pensiones_voluntario_id"]);
          if ($fondo_pensiones_voluntario_id) {
             $registro["fondo_pensiones_voluntario_id"] = $fondo_pensiones_voluntario_id->nombre;
          } 

          $tipo_medida_id = $this->Model->registro("datos_tipos_medidas", $registro["tipo_medida_id"]);
          if ($tipo_medida_id) {
             $registro["tipo_medida_id"] = $tipo_medida_id->nombre;
          } 

          $tipo_compensacion_variable_id = $this->Model->registro("datos_tipos_compensaciones_variables", $registro["tipo_compensacion_variable_id"]);
          if ($tipo_compensacion_variable_id) {
             $registro["tipo_compensacion_variable_id"] = $tipo_compensacion_variable_id->nombre;
          } 


			$datosJsonReg .= '["<input type=\"checkbox\" id=\"fila_'.$registro["id"].'\" class=\"seleccion\" cod=\"'.$registro["id"].'\">", "<button type=\"button\" class=\"btn btn-default btn-xs text-light-blue btnEditar\" cod=\"'.$registro["id"].'\"><span class=\"glyphicon glyphicon-pencil\"></span></button>", "<button type=\"button\" class=\"btn btn-default btn-xs text-red btnEliminar\" cod=\"'.$registro["id"].'\"><span class=\"glyphicon glyphicon-trash\"></span></button>", "'.$registro["nombre"].'","'.$registro["apellidos"].'","'.$registro["clave"].'","'.$registro["correo"].'","'.$registro["documento_tipo_id"].'","'.$registro["documento_numero"].'","'.$registro["documento_fecha_expedicion"].'","'.$registro["pais_id"].'","'.$registro["estado_id"].'","'.$registro["ciudad_id"].'","'.$registro["direccion_1"].'","'.$registro["direccion_2"].'","'.$registro["nacimiento_fecha"].'","'.$registro["nacimiento_pais_id"].'","'.$registro["nacimiento_ciudad_id"].'","'.$registro["numero_posicion"].'","'.$registro["posicion"].'","'.$registro["vicepresidencia"].'","'.$registro["moneda_id"].'","'.$registro["sueldo"].'","'.$registro["centro_costo_id"].'","'.$registro["frecuencia_pago_id"].'","'.$registro["compania"].'","'.$registro["genero_id"].'","'.$registro["estado_civil_id"].'","'.$registro["contratos_tipos_id"].'","'.$registro["fecha_finalizacion"].'","'.$registro["correo_externo"].'","'.$registro["correo_interno"].'","'.$registro["nomina_area_id"].'","'.$registro["banda_salarial"].'","'.$registro["jefe_codigo"].'","'.$registro["jefe_nombre"].'","'.$registro["banco_deposito_id"].'","'.$registro["banco_deposito_tipo_cuenta_id"].'","'.$registro["banco_deposito_cuenta"].'","'.$registro["eps"].'","'.$registro["fecha_creacion"].'","'.$registro["activo"].'","'.$registro["arl_id"].'","'.$registro["fondo_cesantias_id"].'","'.$registro["fondo_pensiones_id"].'","'.$registro["afc_entidad_id"].'","'.$registro["afc_cuenta_id"].'","'.$registro["fondo_pensiones_voluntario_id"].'","'.$registro["celular"].'","'.$registro["telefono_emergencia"].'","'.$registro["tipo_medida_id"].'","'.$registro["tipo_compensacion_variable_id"].'","'.$registro["procentaje_compensacion_variable"].'","'.$registro["nivel_educativo"].'","'.$registro["especialidad"].'"],';

	    }
	    if ($datosJsonReg != '') {
	          $datosJson .= substr($datosJsonReg, 0, -1);
	    }
		
		$datosJson .= ']
		}';

		echo $datosJson;
    
	}

	public function list_ssp () {
		$this->load->library('SSP');

		// DB table to use
		$table = 'empleados';

		// Table's primary key
		$primaryKey = 'id';

		// Array of database columns
		$columns = array(array( 'db' => 'id', 'dt' => 0, 'field' => 'id', 'formatter' => function($d, $row) {return '<input type="checkbox" id="fila_' . $d . '" class="seleccion" cod="' . $d . '">';}),array( 'db' => 'id', 'dt' => 1, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-light-blue btnEditar" cod="' . $d . '"><span class="glyphicon glyphicon-pencil"></span></button>';}), array( 'db' => 'id', 'dt' => 2, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-red btnEliminar" cod="' . $d . '"><span class="glyphicon glyphicon-trash"></span></button>';}), array( 'db' => 'nombre', 'dt' => 3, 'field' => 'nombre' ),array( 'db' => 'apellidos', 'dt' => 4, 'field' => 'apellidos' ),array( 'db' => 'clave', 'dt' => 5, 'field' => 'clave' ),array( 'db' => 'correo', 'dt' => 6, 'field' => 'correo' ),array( 'db' => 'documento_tipo_id', 'dt' => 7, 'field' => 'documento_tipo_id' ),array( 'db' => 'documento_numero', 'dt' => 8, 'field' => 'documento_numero' ),array( 'db' => 'documento_fecha_expedicion', 'dt' => 9, 'field' => 'documento_fecha_expedicion' ),array( 'db' => 'pais_id', 'dt' => 10, 'field' => 'pais_id' ),array( 'db' => 'estado_id', 'dt' => 11, 'field' => 'estado_id' ),array( 'db' => 'ciudad_id', 'dt' => 12, 'field' => 'ciudad_id' ),array( 'db' => 'direccion_1', 'dt' => 13, 'field' => 'direccion_1' ),array( 'db' => 'direccion_2', 'dt' => 14, 'field' => 'direccion_2' ),array( 'db' => 'nacimiento_fecha', 'dt' => 15, 'field' => 'nacimiento_fecha' ),array( 'db' => 'nacimiento_pais_id', 'dt' => 16, 'field' => 'nacimiento_pais_id' ),array( 'db' => 'nacimiento_ciudad_id', 'dt' => 17, 'field' => 'nacimiento_ciudad_id' ),array( 'db' => 'numero_posicion', 'dt' => 18, 'field' => 'numero_posicion' ),array( 'db' => 'posicion', 'dt' => 19, 'field' => 'posicion' ),array( 'db' => 'vicepresidencia', 'dt' => 20, 'field' => 'vicepresidencia' ),array( 'db' => 'moneda_id', 'dt' => 21, 'field' => 'moneda_id' ),array( 'db' => 'sueldo', 'dt' => 22, 'field' => 'sueldo' ),array( 'db' => 'centro_costo_id', 'dt' => 23, 'field' => 'centro_costo_id' ),array( 'db' => 'frecuencia_pago_id', 'dt' => 24, 'field' => 'frecuencia_pago_id' ),array( 'db' => 'compania', 'dt' => 25, 'field' => 'compania' ),array( 'db' => 'genero_id', 'dt' => 26, 'field' => 'genero_id' ),array( 'db' => 'estado_civil_id', 'dt' => 27, 'field' => 'estado_civil_id' ),array( 'db' => 'contratos_tipos_id', 'dt' => 28, 'field' => 'contratos_tipos_id' ),array( 'db' => 'fecha_finalizacion', 'dt' => 29, 'field' => 'fecha_finalizacion' ),array( 'db' => 'correo_externo', 'dt' => 30, 'field' => 'correo_externo' ),array( 'db' => 'correo_interno', 'dt' => 31, 'field' => 'correo_interno' ),array( 'db' => 'nomina_area_id', 'dt' => 32, 'field' => 'nomina_area_id' ),array( 'db' => 'banda_salarial', 'dt' => 33, 'field' => 'banda_salarial' ),array( 'db' => 'jefe_codigo', 'dt' => 34, 'field' => 'jefe_codigo' ),array( 'db' => 'jefe_nombre', 'dt' => 35, 'field' => 'jefe_nombre' ),array( 'db' => 'banco_deposito_id', 'dt' => 36, 'field' => 'banco_deposito_id' ),array( 'db' => 'banco_deposito_tipo_cuenta_id', 'dt' => 37, 'field' => 'banco_deposito_tipo_cuenta_id' ),array( 'db' => 'banco_deposito_cuenta', 'dt' => 38, 'field' => 'banco_deposito_cuenta' ),array( 'db' => 'eps', 'dt' => 39, 'field' => 'eps' ),array( 'db' => 'fecha_creacion', 'dt' => 40, 'field' => 'fecha_creacion' ),array( 'db' => 'activo', 'dt' => 41, 'field' => 'activo' ),array( 'db' => 'arl_id', 'dt' => 42, 'field' => 'arl_id' ),array( 'db' => 'fondo_cesantias_id', 'dt' => 43, 'field' => 'fondo_cesantias_id' ),array( 'db' => 'fondo_pensiones_id', 'dt' => 44, 'field' => 'fondo_pensiones_id' ),array( 'db' => 'afc_entidad_id', 'dt' => 45, 'field' => 'afc_entidad_id' ),array( 'db' => 'afc_cuenta_id', 'dt' => 46, 'field' => 'afc_cuenta_id' ),array( 'db' => 'fondo_pensiones_voluntario_id', 'dt' => 47, 'field' => 'fondo_pensiones_voluntario_id' ),array( 'db' => 'celular', 'dt' => 48, 'field' => 'celular' ),array( 'db' => 'telefono_emergencia', 'dt' => 49, 'field' => 'telefono_emergencia' ),array( 'db' => 'tipo_medida_id', 'dt' => 50, 'field' => 'tipo_medida_id' ),array( 'db' => 'tipo_compensacion_variable_id', 'dt' => 51, 'field' => 'tipo_compensacion_variable_id' ),array( 'db' => 'procentaje_compensacion_variable', 'dt' => 52, 'field' => 'procentaje_compensacion_variable' ),array( 'db' => 'nivel_educativo', 'dt' => 53, 'field' => 'nivel_educativo' ),array( 'db' => 'especialidad', 'dt' => 54, 'field' => 'especialidad' ),);

		$sql_details = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db'   => $this->db->database,
			'host' => $this->db->hostname
		);


		$joinQuery = "FROM $table";
		$extraWhere = ""; //"`u`.`valor` >= 90000";
		$groupBy = ""; //"`u`.`datos`";
		$having = ""; //"`u`.`valor` >= 140000";

		//$_GET['tksec'] = $this->security->get_csrf_hash();  

		echo json_encode(
			SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
		);
	}

}