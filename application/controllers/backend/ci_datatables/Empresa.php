<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Empresa extends MY_Controller {

	public $parameters;

	public function __construct() {
		parent::__construct();
		// $this->ctrSegAdmin();
	}

	public function index() {
		$this->parameters['plantilla'] = 'datatables';
		$this->parameters['vista'] = 'backend/ci_datatables/empresa';
		$this->parameters['datos']['titulo'] = 'Empresa';
		$this->parameters['datos']['subtitulo'] = ''; 

		$tabla_datos_paises = $this->Model->registros("datos_paises", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_paises"] = $tabla_datos_paises;
		$tabla_datos_paises_estados = $this->Model->registros("datos_paises_estados", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_paises_estados"] = $tabla_datos_paises_estados;
		$tabla_datos_ciudades = $this->Model->registros("datos_ciudades", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_ciudades"] = $tabla_datos_ciudades;
		$this->admin_design->layout('database', 'backend/ci_datatables/empresa', $this->parameters, 'Empresa');
	}

	public function traerRegistro () {
		$post = $this->input->post(NULL, TRUE);
		$registro = $this->Model->registro('empresa', $post['id']);
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
						"razon_social" => $post["razon_social"],
						"numero_identificacion" => $post["numero_identificacion"],
						"telefono_1" => $post["telefono_1"],
						"telefono_2" => $post["telefono_2"],
						"correo" => $post["correo"],
						"pais_id" => $post["pais_id"],
						"estado_id" => $post["estado_id"],
						"ciudad_id" => $post["ciudad_id"],
						"direccion_1" => $post["direccion_1"],
						"direccion_2" => $post["direccion_2"],);

				$id = $this->Model->insertar('empresa', $datos);
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
		redirect('/backend/ci_datatables/empresa');
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
						"razon_social" => $post["razon_social"],
						"numero_identificacion" => $post["numero_identificacion"],
						"telefono_1" => $post["telefono_1"],
						"telefono_2" => $post["telefono_2"],
						"correo" => $post["correo"],
						"pais_id" => $post["pais_id"],
						"estado_id" => $post["estado_id"],
						"ciudad_id" => $post["ciudad_id"],
						"direccion_1" => $post["direccion_1"],
						"direccion_2" => $post["direccion_2"],);

				if ($this->Model->actualizar('empresa', $datos, $post['id'])) {
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
		redirect('/backend/ci_datatables/empresa');   
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
					$this->Model->eliminar('empresa', $id);
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
		redirect('/backend/ci_datatables/empresa');   
	}

	public function lista () {

		$registros = $this->Model->registros('empresa');
    
  	$datosJson = '
  		{	
  			"data":[';  
    $datosJsonReg = '';
    foreach ($registros as $key => $registro) {


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


          $datosJsonReg .= '["<input type=\"checkbox\" id=\"fila_'.$registro["id"].'\" class=\"seleccion\" cod=\"'.$registro["id"].'\">", "<button type=\"button\" class=\"btn btn-default btn-xs text-light-blue btnEditar\" cod=\"'.$registro["id"].'\"><span class=\"glyphicon glyphicon-pencil\"></span></button>", "<button type=\"button\" class=\"btn btn-default btn-xs text-red btnEliminar\" cod=\"'.$registro["id"].'\"><span class=\"glyphicon glyphicon-trash\"></span></button>", "'.$registro["razon_social"].'","'.$registro["numero_identificacion"].'","'.$registro["telefono_1"].'","'.$registro["telefono_2"].'","'.$registro["correo"].'","'.$registro["pais_id"].'","'.$registro["estado_id"].'","'.$registro["ciudad_id"].'","'.$registro["direccion_1"].'","'.$registro["direccion_2"].'"],';

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
		$table = 'empresa';

		// Table's primary key
		$primaryKey = 'id';

		// Array of database columns
		$columns = array(array( 'db' => 'id', 'dt' => 0, 'field' => 'id', 'formatter' => function($d, $row) {return '<input type="checkbox" id="fila_' . $d . '" class="seleccion" cod="' . $d . '">';}),array( 'db' => 'id', 'dt' => 1, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-light-blue btnEditar" cod="' . $d . '"><span class="glyphicon glyphicon-pencil"></span></button>';}), array( 'db' => 'id', 'dt' => 2, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-red btnEliminar" cod="' . $d . '"><span class="glyphicon glyphicon-trash"></span></button>';}), array( 'db' => 'razon_social', 'dt' => 3, 'field' => 'razon_social' ),array( 'db' => 'numero_identificacion', 'dt' => 4, 'field' => 'numero_identificacion' ),array( 'db' => 'telefono_1', 'dt' => 5, 'field' => 'telefono_1' ),array( 'db' => 'telefono_2', 'dt' => 6, 'field' => 'telefono_2' ),array( 'db' => 'correo', 'dt' => 7, 'field' => 'correo' ),array( 'db' => 'pais_id', 'dt' => 8, 'field' => 'pais_id' ),array( 'db' => 'estado_id', 'dt' => 9, 'field' => 'estado_id' ),array( 'db' => 'ciudad_id', 'dt' => 10, 'field' => 'ciudad_id' ),array( 'db' => 'direccion_1', 'dt' => 11, 'field' => 'direccion_1' ),array( 'db' => 'direccion_2', 'dt' => 12, 'field' => 'direccion_2' ),);

		$sql_details = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db'   => $this->db->database,
			'host' => $this->db->hostname
		);

		$joinQuery = "FROM empresa";
		$extraWhere = ""; //"`u`.`valor` >= 90000";
		$groupBy = ""; //"`u`.`datos`";
		$having = ""; //"`u`.`valor` >= 140000";

		$_GET['tksec'] = $this->security->get_csrf_hash();  

		echo json_encode(
			SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
		);
	}

}