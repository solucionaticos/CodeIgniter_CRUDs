<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Administradores_actividad_detalle extends MY_Controller {

	public $parameters;

	public function __construct() {
		parent::__construct();
		// $this->ctrSegAdmin();
	}

	public function index() {
		$this->parameters['template'] = 'ssp';
		$this->parameters['type'] = 'list';
		$this->parameters['path'] = $this->config->item('adminPath') . '/database2/administradores_actividad_detalle';
		$this->parameters['title'] = 'Administradores actividad detalle';
		$this->parameters['subtitle'] = 'List';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = '
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Tables</a></li>
			<li class="active">Data tables</li>
		</ol>'; 

		$this->admin_design->layout2($this->parameters);
	}

	public function new() {
		$tabla_actividades = $this->Model->registros('administradores_actividad', 'id, ip', array(), 'ip ASC' ); 
		$this->parameters['data']['tabla_actividades'] = $tabla_actividades;		

		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'new';
		$this->parameters['path'] = $this->config->item('adminPath') . '/database2/administradores_actividad_detalle';
		$this->parameters['title'] = 'Administradores actividad detalle';
		$this->parameters['subtitle'] = 'New';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = '
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Tables</a></li>
			<li class="active">Data tables</li>
		</ol>'; 

		$this->admin_design->layout2($this->parameters);

	}


	public function edit($id) {
		//$registro = $this->Model->registro('administradores_actividad_detalle', $id);
		//$this->parameters['data']['registro'] = $registro;	


		$this->parameters['data']['id'] = $id;

		$tabla_actividades = $this->Model->registros('administradores_actividad', 'id, ip', array(), 'ip ASC' ); 
		$this->parameters['data']['tabla_actividades'] = $tabla_actividades;		

		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'edit';
		$this->parameters['path'] = $this->config->item('adminPath') . '/database2/administradores_actividad_detalle';
		$this->parameters['title'] = 'Administradores actividad detalle';
		$this->parameters['subtitle'] = 'Edit';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = '
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Tables</a></li>
			<li class="active">Data tables</li>
		</ol>'; 

		$this->admin_design->layout2($this->parameters);

	}


	public function getRecord () {
		$post = $this->input->post(NULL, TRUE);
		$registro = $this->Model->registro('administradores_actividad_detalle', $post['id']);
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
      
			$this->form_validation->set_rules('usuario', 'Usuario', 'required|xss_clean');
			$this->form_validation->set_rules('actividad', 'Actividad', 'required|xss_clean');
			$this->form_validation->set_rules('fecha', 'Fecha', 'required|xss_clean');
			$this->form_validation->set_rules('ruta', 'Ruta', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.validation_errors().'<br><b>'.$this->lang->line('be_please_try_again').'</b>');
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				
			} else {
        
				$datos = array('usuario' => $post['usuario'],'actividad' => $post['actividad'],'fecha' => $post['fecha'],'ruta' => $post['ruta'],);

				$id = $this->Model->insertar('administradores_actividad_detalle', $datos);
				if ($id > 0) {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El registro se ingresó exitosamente.'); 
					$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
					redirect(base_url() . $this->config->item('adminPath') . '/database2/administradores_actividad_detalle');
				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible ingresar el registro.<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				}     
			}

		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No se recibieron datos.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
		}
		redirect(base_url() . $this->config->item('adminPath') . '/database2/administradores_actividad_detalle/new');
	}

	public function update () {
		$post = $this->input->post(NULL, TRUE);
		if (!empty($post)) {
			foreach ($post as $key => $value) {
				$post[$key] = $this->security->xss_clean($value);
			}
      
			$this->form_validation->set_rules('usuario', 'Usuario', 'required|xss_clean');
			$this->form_validation->set_rules('actividad', 'Actividad', 'required|xss_clean');
			$this->form_validation->set_rules('fecha', 'Fecha', 'required|xss_clean');
			$this->form_validation->set_rules('ruta', 'Ruta', 'required|xss_clean');
      
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.validation_errors().'<br><b>'.$this->lang->line('be_please_try_again').'</b>');
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
			} else {
        
				$datos = array('usuario' => $post['usuario'],'actividad' => $post['actividad'],'fecha' => $post['fecha'],'ruta' => $post['ruta'],);

				if ($this->Model->actualizar('administradores_actividad_detalle', $datos, $post['id'])) {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El registro se guardo exitosamente.'); 
					$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
					redirect(base_url() . $this->config->item('adminPath') . '/database2/administradores_actividad_detalle');
				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible guardar el registro.<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				}     

			}
		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No se recibieron datos.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
		}
		redirect(base_url() . $this->config->item('adminPath') . '/database2/administradores_actividad_detalle/edit/'.$post['id']);   
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
					$this->Model->eliminar('administradores_actividad_detalle', $id);
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
		redirect(base_url() . $this->config->item('adminPath') . '/database2/administradores_actividad_detalle');   
	}

  
  
	public function list () {

		$registros = $this->Model->registros('administradores_actividad_detalle');
    
	  	$datosJson = '
	  		{	
	  			"data":[';  
	    $datosJsonReg = '';
	    foreach ($registros as $key => $registro) {
	      
	          $datosJsonReg .='["<input type=\"checkbox\" id=\"fila_'.$registro['id'].'\" class=\"seleccion\" cod=\"'.$registro['id'].'\">", "<button type=\"button\" class=\"btn btn-default btn-xs text-light-blue btnEditar\" cod=\"'.$registro['id'].'\"><span class=\"glyphicon glyphicon-pencil\"></span></button>", "<button type=\"button\" class=\"btn btn-default btn-xs text-red btnEliminar\" cod=\"'.$registro['id'].'\"><span class=\"glyphicon glyphicon-trash\"></span></button>","'.$registro['usuario'].'","'.$registro['actividad'].'","'.$registro['fecha'].'","'.$registro['ruta'].'"],';

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
		$table = 'administradores_actividad_detalle';

		// Table's primary key
		$primaryKey = 'id';

		// Array of database columns
		$columns = array(
			array( 'db' => 'id', 'dt' => 0, 'field' => 'id', 'formatter' => function($d, $row) {return '<input type="checkbox" id="fila_' . $d . '" class="seleccion" cod="' . $d . '">';}),
			array( 'db' => 'id', 'dt' => 1, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-light-blue btnEditar" cod="' . $d . '"><span class="glyphicon glyphicon-pencil"></span></button>';}), 
			array( 'db' => 'id', 'dt' => 2, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-red btnEliminar" cod="' . $d . '"><span class="glyphicon glyphicon-trash"></span></button>';}),
			array( 'db' => 'usuario', 'dt' => 3, 'field' => 'usuario' ),
			array( 'db' => 'actividad', 'dt' => 4, 'field' => 'actividad' ),
			array( 'db' => 'fecha', 'dt' => 5, 'field' => 'fecha' ),
			array( 'db' => 'ruta', 'dt' => 6, 'field' => 'ruta' ),);

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
