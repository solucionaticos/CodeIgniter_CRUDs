<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Empleados_familiares extends MY_Controller {

	public $parameters;

	public function __construct() {
		parent::__construct();
		// $this->ctrSegAdmin();
	}

	public function index() {
		$this->parameters['template'] = 'ssp';
		$this->parameters['type'] = 'list';
		$this->parameters['path'] = $this->config->item('adminPath') . '/backend/ci_datatables_ssp/empleados_familiares';
		$this->parameters['title'] = 'Empleados Familiares';
		$this->parameters['subtitle'] = '';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = '
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li class="active">Empleados Familiares</li>
		</ol>'; 

		$this->admin_design->layout2($this->parameters);
	}

	public function new() {


		$tabla_empleados = $this->Model->registros("empleados", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_empleados"] = $tabla_empleados;
		$tabla_datos_familiares_tipos = $this->Model->registros("datos_familiares_tipos", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_familiares_tipos"] = $tabla_datos_familiares_tipos;
		$tabla_datos_documento_tipos = $this->Model->registros("datos_documento_tipos", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_documento_tipos"] = $tabla_datos_documento_tipos;
		$tabla_datos_paises = $this->Model->registros("datos_paises", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_paises"] = $tabla_datos_paises;

		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'new';
		$this->parameters['path'] = $this->config->item('adminPath') . '/backend/ci_datatables_ssp/empleados_familiares';
		$this->parameters['title'] = 'Empleados Familiares';
		$this->parameters['subtitle'] = 'New';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = '
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li class="active">Empleados Familiares</li>
		</ol>'; 

		$this->admin_design->layout2($this->parameters);

	}

	public function edit($id) {
		$this->parameters['data']['id'] = $id;


		$tabla_empleados = $this->Model->registros("empleados", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_empleados"] = $tabla_empleados;
		$tabla_datos_familiares_tipos = $this->Model->registros("datos_familiares_tipos", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_familiares_tipos"] = $tabla_datos_familiares_tipos;
		$tabla_datos_documento_tipos = $this->Model->registros("datos_documento_tipos", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_documento_tipos"] = $tabla_datos_documento_tipos;
		$tabla_datos_paises = $this->Model->registros("datos_paises", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_paises"] = $tabla_datos_paises;

		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'edit';
		$this->parameters['path'] = $this->config->item('adminPath') . '/backend/ci_datatables_ssp/empleados_familiares';
		$this->parameters['title'] = 'Empleados Familiares';
		$this->parameters['subtitle'] = 'Edit';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = '
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Empleados Familiares</li>
		</ol>'; 

		$this->admin_design->layout2($this->parameters);

	}

	public function getRecord () {
		$post = $this->input->post(NULL, TRUE);
		$registro = $this->Model->registro('empleados_familiares', $post['id']);
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
						"empleado_id" => $post["empleado_id"],
						"tipo_familiar_id" => $post["tipo_familiar_id"],
						"nombre" => $post["nombre"],
						"documento_tipo_id" => $post["documento_tipo_id"],
						"documento_numero" => $post["documento_numero"],
						"nacimiento_fecha" => $post["nacimiento_fecha"],
						"nacimiento_pais_id" => $post["nacimiento_pais_id"],);

				$id = $this->Model->insertar('empleados_familiares', $datos);
				if ($id > 0) {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El registro se ingresó exitosamente.'); 
					$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
					redirect(base_url() . $this->config->item('adminPath') . '/backend/ci_datatables_ssp/empleados_familiares');
				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible ingresar el registro.<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				}     
			}

		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No se recibieron datos.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
		}
		redirect(base_url() . $this->config->item('adminPath') . '/backend/ci_datatables_ssp/empleados_familiares/new');
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
						"empleado_id" => $post["empleado_id"],
						"tipo_familiar_id" => $post["tipo_familiar_id"],
						"nombre" => $post["nombre"],
						"documento_tipo_id" => $post["documento_tipo_id"],
						"documento_numero" => $post["documento_numero"],
						"nacimiento_fecha" => $post["nacimiento_fecha"],
						"nacimiento_pais_id" => $post["nacimiento_pais_id"],);

				if ($this->Model->actualizar('empleados_familiares', $datos, $post['id'])) {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El registro se guardo exitosamente.'); 
					$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
					redirect(base_url() . $this->config->item('adminPath') . '/backend/ci_datatables_ssp/empleados_familiares');
				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible guardar el registro.<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				}     

			}
		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No se recibieron datos.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
		}
		redirect(base_url() . $this->config->item('adminPath') . '/backend/ci_datatables_ssp/empleados_familiares/edit/'.$post['id']);   
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
					$this->Model->eliminar('empleados_familiares', $id);
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
		redirect(base_url() . $this->config->item('adminPath') . '/backend/ci_datatables_ssp/empleados_familiares');   
	}

  
	public function list () {

		$registros = $this->Model->registros('empleados_familiares');
    
	  	$datosJson = '
	  		{	
	  			"data":[';  
	    $datosJsonReg = '';
	    foreach ($registros as $key => $registro) {

			
          $empleado_id = $this->Model->registro("empleados", $registro["empleado_id"]);
          if ($empleado_id) {
             $registro["empleado_id"] = $empleado_id->nombre;
          } 

          $tipo_familiar_id = $this->Model->registro("datos_familiares_tipos", $registro["tipo_familiar_id"]);
          if ($tipo_familiar_id) {
             $registro["tipo_familiar_id"] = $tipo_familiar_id->nombre;
          } 

          $documento_tipo_id = $this->Model->registro("datos_documento_tipos", $registro["documento_tipo_id"]);
          if ($documento_tipo_id) {
             $registro["documento_tipo_id"] = $documento_tipo_id->nombre;
          } 

          $nacimiento_pais_id = $this->Model->registro("datos_paises", $registro["nacimiento_pais_id"]);
          if ($nacimiento_pais_id) {
             $registro["nacimiento_pais_id"] = $nacimiento_pais_id->nombre;
          } 


			$datosJsonReg .= '["<input type=\"checkbox\" id=\"fila_'.$registro["id"].'\" class=\"seleccion\" cod=\"'.$registro["id"].'\">", "<button type=\"button\" class=\"btn btn-default btn-xs text-light-blue btnEditar\" cod=\"'.$registro["id"].'\"><span class=\"glyphicon glyphicon-pencil\"></span></button>", "<button type=\"button\" class=\"btn btn-default btn-xs text-red btnEliminar\" cod=\"'.$registro["id"].'\"><span class=\"glyphicon glyphicon-trash\"></span></button>", "'.$registro["empleado_id"].'","'.$registro["tipo_familiar_id"].'","'.$registro["nombre"].'","'.$registro["documento_tipo_id"].'","'.$registro["documento_numero"].'","'.$registro["nacimiento_fecha"].'","'.$registro["nacimiento_pais_id"].'"],';

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
		$table = 'empleados_familiares';

		// Table's primary key
		$primaryKey = 'id';

		// Array of database columns
		$columns = array(array( 'db' => 'id', 'dt' => 0, 'field' => 'id', 'formatter' => function($d, $row) {return '<input type="checkbox" id="fila_' . $d . '" class="seleccion" cod="' . $d . '">';}),array( 'db' => 'id', 'dt' => 1, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-light-blue btnEditar" cod="' . $d . '"><span class="glyphicon glyphicon-pencil"></span></button>';}), array( 'db' => 'id', 'dt' => 2, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-red btnEliminar" cod="' . $d . '"><span class="glyphicon glyphicon-trash"></span></button>';}), array( 'db' => 'empleado_id', 'dt' => 3, 'field' => 'empleado_id' ),array( 'db' => 'tipo_familiar_id', 'dt' => 4, 'field' => 'tipo_familiar_id' ),array( 'db' => 'nombre', 'dt' => 5, 'field' => 'nombre' ),array( 'db' => 'documento_tipo_id', 'dt' => 6, 'field' => 'documento_tipo_id' ),array( 'db' => 'documento_numero', 'dt' => 7, 'field' => 'documento_numero' ),array( 'db' => 'nacimiento_fecha', 'dt' => 8, 'field' => 'nacimiento_fecha' ),array( 'db' => 'nacimiento_pais_id', 'dt' => 9, 'field' => 'nacimiento_pais_id' ),);

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