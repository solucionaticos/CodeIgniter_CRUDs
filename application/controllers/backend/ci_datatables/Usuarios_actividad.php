<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Usuarios_actividad extends MY_Controller {

	public $parameters;

	public function __construct() {
		parent::__construct();
		// $this->ctrSegAdmin();
	}

	public function index() {
		$this->parameters['plantilla'] = 'datatables';
		$this->parameters['vista'] = 'backend/ci_datatables/usuarios_actividad';
		$this->parameters['datos']['titulo'] = 'Usuarios Actividad';
		$this->parameters['datos']['subtitulo'] = ''; 

		$tabla_usuarios = $this->Model->registros("usuarios", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_usuarios"] = $tabla_usuarios;
		$tabla_datos_paises = $this->Model->registros("datos_paises", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_paises"] = $tabla_datos_paises;
		$tabla_datos_dispositivos = $this->Model->registros("datos_dispositivos", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_dispositivos"] = $tabla_datos_dispositivos;
		$tabla_datos_agentes = $this->Model->registros("datos_agentes", "id,nombre nombre", array(), "nombre" );
		$this->parameters["datos"]["tabla_datos_agentes"] = $tabla_datos_agentes;
		$this->admin_design->layout('database', 'backend/ci_datatables/usuarios_actividad', $this->parameters, 'Usuarios Actividad');
	}

	public function traerRegistro () {
		$post = $this->input->post(NULL, TRUE);
		$registro = $this->Model->registro('usuarios_actividad', $post['id']);
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
						"usuario_id" => $post["usuario_id"],
						"fecha_ingreso" => $post["fecha_ingreso"],
						"ip" => $post["ip"],
						"pais_id" => $post["pais_id"],
						"dispositivo_id" => $post["dispositivo_id"],
						"agente_id" => $post["agente_id"],
						"fecha_ultima_accion" => $post["fecha_ultima_accion"],
						"permanencia" => $post["permanencia"],);

				$id = $this->Model->insertar('usuarios_actividad', $datos);
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
		redirect('/backend/ci_datatables/usuarios_actividad');
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
						"usuario_id" => $post["usuario_id"],
						"fecha_ingreso" => $post["fecha_ingreso"],
						"ip" => $post["ip"],
						"pais_id" => $post["pais_id"],
						"dispositivo_id" => $post["dispositivo_id"],
						"agente_id" => $post["agente_id"],
						"fecha_ultima_accion" => $post["fecha_ultima_accion"],
						"permanencia" => $post["permanencia"],);

				if ($this->Model->actualizar('usuarios_actividad', $datos, $post['id'])) {
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
		redirect('/backend/ci_datatables/usuarios_actividad');   
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
					$this->Model->eliminar('usuarios_actividad', $id);
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
		redirect('/backend/ci_datatables/usuarios_actividad');   
	}

	public function lista () {

		$registros = $this->Model->registros('usuarios_actividad');
    
  	$datosJson = '
  		{	
  			"data":[';  
    $datosJsonReg = '';
    foreach ($registros as $key => $registro) {


          $usuario_id = $this->Model->registro("usuarios", $registro["usuario_id"]);
          if ($usuario_id) {
             $registro["usuario_id"] = $usuario_id->nombre;
          } 

          $pais_id = $this->Model->registro("datos_paises", $registro["pais_id"]);
          if ($pais_id) {
             $registro["pais_id"] = $pais_id->nombre;
          } 

          $dispositivo_id = $this->Model->registro("datos_dispositivos", $registro["dispositivo_id"]);
          if ($dispositivo_id) {
             $registro["dispositivo_id"] = $dispositivo_id->nombre;
          } 

          $agente_id = $this->Model->registro("datos_agentes", $registro["agente_id"]);
          if ($agente_id) {
             $registro["agente_id"] = $agente_id->nombre;
          } 


          $datosJsonReg .= '["<input type=\"checkbox\" id=\"fila_'.$registro["id"].'\" class=\"seleccion\" cod=\"'.$registro["id"].'\">", "<button type=\"button\" class=\"btn btn-default btn-xs text-light-blue btnEditar\" cod=\"'.$registro["id"].'\"><span class=\"glyphicon glyphicon-pencil\"></span></button>", "<button type=\"button\" class=\"btn btn-default btn-xs text-red btnEliminar\" cod=\"'.$registro["id"].'\"><span class=\"glyphicon glyphicon-trash\"></span></button>", "'.$registro["usuario_id"].'","'.$registro["fecha_ingreso"].'","'.$registro["ip"].'","'.$registro["pais_id"].'","'.$registro["dispositivo_id"].'","'.$registro["agente_id"].'","'.$registro["fecha_ultima_accion"].'","'.$registro["permanencia"].'"],';

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
		$table = 'usuarios_actividad';

		// Table's primary key
		$primaryKey = 'id';

		// Array of database columns
		$columns = array(array( 'db' => 'id', 'dt' => 0, 'field' => 'id', 'formatter' => function($d, $row) {return '<input type="checkbox" id="fila_' . $d . '" class="seleccion" cod="' . $d . '">';}),array( 'db' => 'id', 'dt' => 1, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-light-blue btnEditar" cod="' . $d . '"><span class="glyphicon glyphicon-pencil"></span></button>';}), array( 'db' => 'id', 'dt' => 2, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-red btnEliminar" cod="' . $d . '"><span class="glyphicon glyphicon-trash"></span></button>';}), array( 'db' => 'usuario_id', 'dt' => 3, 'field' => 'usuario_id' ),array( 'db' => 'fecha_ingreso', 'dt' => 4, 'field' => 'fecha_ingreso' ),array( 'db' => 'ip', 'dt' => 5, 'field' => 'ip' ),array( 'db' => 'pais_id', 'dt' => 6, 'field' => 'pais_id' ),array( 'db' => 'dispositivo_id', 'dt' => 7, 'field' => 'dispositivo_id' ),array( 'db' => 'agente_id', 'dt' => 8, 'field' => 'agente_id' ),array( 'db' => 'fecha_ultima_accion', 'dt' => 9, 'field' => 'fecha_ultima_accion' ),array( 'db' => 'permanencia', 'dt' => 10, 'field' => 'permanencia' ),);

		$sql_details = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db'   => $this->db->database,
			'host' => $this->db->hostname
		);

		$joinQuery = "FROM usuarios_actividad";
		$extraWhere = ""; //"`u`.`valor` >= 90000";
		$groupBy = ""; //"`u`.`datos`";
		$having = ""; //"`u`.`valor` >= 140000";

		$_GET['tksec'] = $this->security->get_csrf_hash();  

		echo json_encode(
			SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
		);
	}

}