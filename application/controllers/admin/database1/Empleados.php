<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Empleados extends MY_Controller {

	public $parameters;

	public function __construct() {
		parent::__construct();
		// $this->ctrSegAdmin();
	}

	public function index() {
		$this->parameters['plantilla'] = 'datatables';
		$this->parameters['vista'] = $this->config->item('adminPath') . '/database1/empleados';
		$this->parameters['datos']['titulo'] = 'Empleados';
		$this->parameters['datos']['subtitulo'] = ''; 

		$this->admin_design->layout('database', $this->config->item('adminPath') . '/database1/empleados', $this->parameters, 'Empleados');
	}

	public function traerRegistro () {
		$post = $this->input->post(NULL, TRUE);
		$registro = $this->Model->registro('empleados', $post['id']);
		$datos = array('registro'=>$registro, 'tksec'=>$this->security->get_csrf_hash());
		echo json_encode($datos);      
	}

	public function ingresar () {
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
						"nombres" => $post["nombres"],
						"apellidos" => $post["apellidos"],
						"doc_identidad" => $post["doc_identidad"],
						"genero_id" => $post["genero_id"],
						"estado_civil_id" => $post["estado_civil_id"],
						"fecha_nacimiento" => $post["fecha_nacimiento"],
						"nacionalidad" => $post["nacionalidad"],
						"email" => $post["email"],
						"clave" => $post["clave"],
						"pais_id" => $post["pais_id"],
						"estado_id" => $post["estado_id"],
						"ciudad_id" => $post["ciudad_id"],
						"direccion_1" => $post["direccion_1"],
						"direccion_2" => $post["direccion_2"],
						"activo" => $post["activo"],);

				$id = $this->Model->insertar('empleados', $datos);
				if ($id > 0) {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El registro se ingresó exitosamente.'); 
					$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible ingresar el registro.<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				}     
			}
		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No se recibieron datos.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
		}
		redirect(base_url() . $this->config->item('adminPath') . '/database1/empleados');
	}

	public function guardar () {
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
						"nombres" => $post["nombres"],
						"apellidos" => $post["apellidos"],
						"doc_identidad" => $post["doc_identidad"],
						"genero_id" => $post["genero_id"],
						"estado_civil_id" => $post["estado_civil_id"],
						"fecha_nacimiento" => $post["fecha_nacimiento"],
						"nacionalidad" => $post["nacionalidad"],
						"email" => $post["email"],
						"clave" => $post["clave"],
						"pais_id" => $post["pais_id"],
						"estado_id" => $post["estado_id"],
						"ciudad_id" => $post["ciudad_id"],
						"direccion_1" => $post["direccion_1"],
						"direccion_2" => $post["direccion_2"],
						"activo" => $post["activo"],);

				if ($this->Model->actualizar('empleados', $datos, $post['id'])) {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El registro se guardo exitosamente.'); 
					$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible guardar el registro.<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				}     

			}
		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No se recibieron datos.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
		}
		redirect(base_url() . $this->config->item('adminPath') . '/database1/empleados');   
	}

	public function eliminar () {
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
		redirect(base_url() . $this->config->item('adminPath') . '/database1/empleados');   
	}

	public function lista () {

		$registros = $this->Model->registros('empleados');
    
  	$datosJson = '
  		{	
  			"data":[';  
    $datosJsonReg = '';
    foreach ($registros as $key => $registro) {



          $datosJsonReg .= '["<input type=\"checkbox\" id=\"fila_'.$registro["id"].'\" class=\"seleccion\" cod=\"'.$registro["id"].'\">", "<button type=\"button\" class=\"btn btn-default btn-xs text-light-blue btnEditar\" cod=\"'.$registro["id"].'\"><span class=\"glyphicon glyphicon-pencil\"></span></button>", "<button type=\"button\" class=\"btn btn-default btn-xs text-red btnEliminar\" cod=\"'.$registro["id"].'\"><span class=\"glyphicon glyphicon-trash\"></span></button>", "'.$registro["nombres"].'","'.$registro["apellidos"].'","'.$registro["doc_identidad"].'","'.$registro["genero_id"].'","'.$registro["estado_civil_id"].'","'.$registro["fecha_nacimiento"].'","'.$registro["nacionalidad"].'","'.$registro["email"].'","'.$registro["clave"].'","'.$registro["pais_id"].'","'.$registro["estado_id"].'","'.$registro["ciudad_id"].'","'.$registro["direccion_1"].'","'.$registro["direccion_2"].'","'.$registro["activo"].'"],';

    }
    if ($datosJsonReg != '') {
          $datosJson .= substr($datosJsonReg, 0, -1);
    }
		
		$datosJson .= ']
		}';

		echo $datosJson;
    
	}
      
  
	public function lista_ssp () {
		$this->load->library('SSP');

		// DB table to use
		$table = 'empleados';

		// Table's primary key
		$primaryKey = 'id';

		// Array of database columns
		$columns = array(array( 'db' => 'id', 'dt' => 0, 'field' => 'id', 'formatter' => function($d, $row) {return '<input type="checkbox" id="fila_' . $d . '" class="seleccion" cod="' . $d . '">';}),array( 'db' => 'id', 'dt' => 1, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-light-blue btnEditar" cod="' . $d . '"><span class="glyphicon glyphicon-pencil"></span></button>';}), array( 'db' => 'id', 'dt' => 2, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-red btnEliminar" cod="' . $d . '"><span class="glyphicon glyphicon-trash"></span></button>';}), array( 'db' => 'nombres', 'dt' => 3, 'field' => 'nombres' ),array( 'db' => 'apellidos', 'dt' => 4, 'field' => 'apellidos' ),array( 'db' => 'doc_identidad', 'dt' => 5, 'field' => 'doc_identidad' ),array( 'db' => 'genero_id', 'dt' => 6, 'field' => 'genero_id' ),array( 'db' => 'estado_civil_id', 'dt' => 7, 'field' => 'estado_civil_id' ),array( 'db' => 'fecha_nacimiento', 'dt' => 8, 'field' => 'fecha_nacimiento' ),array( 'db' => 'nacionalidad', 'dt' => 9, 'field' => 'nacionalidad' ),array( 'db' => 'email', 'dt' => 10, 'field' => 'email' ),array( 'db' => 'clave', 'dt' => 11, 'field' => 'clave' ),array( 'db' => 'pais_id', 'dt' => 12, 'field' => 'pais_id' ),array( 'db' => 'estado_id', 'dt' => 13, 'field' => 'estado_id' ),array( 'db' => 'ciudad_id', 'dt' => 14, 'field' => 'ciudad_id' ),array( 'db' => 'direccion_1', 'dt' => 15, 'field' => 'direccion_1' ),array( 'db' => 'direccion_2', 'dt' => 16, 'field' => 'direccion_2' ),array( 'db' => 'activo', 'dt' => 17, 'field' => 'activo' ),);

		$sql_details = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db'   => $this->db->database,
			'host' => $this->db->hostname
		);

		$joinQuery = "FROM empleados";
		$extraWhere = ""; //"`u`.`valor` >= 90000";
		$groupBy = ""; //"`u`.`datos`";
		$having = ""; //"`u`.`valor` >= 140000";

		$_GET['tksec'] = $this->security->get_csrf_hash();  

		echo json_encode(
			SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
		);
	}

}