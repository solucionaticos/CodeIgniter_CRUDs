<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Campos extends MY_Controller {

	public $parameters;
	public $path;
	public $breadcrumb;

	public function __construct() {
		parent::__construct();
		// $this->ctrSegAdmin();
		$this->path = 'admin/voice/campos';
		$this->breadcrumb = '
		<ol class="breadcrumb">
			<li><a href="'.base_url().'"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li><a href="'.base_url().'admin/voice/tablas"></i> Tablas</a></li>
			<li><a href="'.base_url().'admin/voice/tablas/edit/'.$this->session->userdata('be_tabla').'"></i> Tabla:'.$this->session->userdata('be_tabla_nombre').'</a></li>
			<li class="active">Campos</li>
		</ol>';
	}

	public function index() {
		$this->parameters['template'] = 'ssp';
		$this->parameters['type'] = 'list';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Campos';
		$this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = $this->breadcrumb; 

		$this->admin_design->layout3($this->parameters);
	}

	public function new() {

		// $tabla_proyectos = $this->Model->getRowsJoin("proyectos", "id,nombre nombre", array(), array(), "nombre" );
		// $this->parameters["data"]["tabla_proyectos"] = $tabla_proyectos;
		// $tabla_versiones = $this->Model->getRowsJoin("versiones", "id,nombre nombre", array(), array(), "nombre" );
		// $this->parameters["data"]["tabla_versiones"] = $tabla_versiones;
		// $tabla_tablas = $this->Model->getRowsJoin("tablas", "id,nombre nombre", array(), array(), "nombre" );
		// $this->parameters["data"]["tabla_tablas"] = $tabla_tablas;

		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'new';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Campos';
		$this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = $this->breadcrumb;

		$this->admin_design->layout3($this->parameters);
	}

	public function edit($id) {
		$this->parameters['data']['id'] = $id;

		// $tabla_proyectos = $this->Model->getRowsJoin("proyectos", "id,nombre nombre", array(), array(), "nombre" );
		// $this->parameters["data"]["tabla_proyectos"] = $tabla_proyectos;
		// $tabla_versiones = $this->Model->getRowsJoin("versiones", "id,nombre nombre", array(), array(), "nombre" );
		// $this->parameters["data"]["tabla_versiones"] = $tabla_versiones;
		// $tabla_tablas = $this->Model->getRowsJoin("tablas", "id,nombre nombre", array(), array(), "nombre" );
		// $this->parameters["data"]["tabla_tablas"] = $tabla_tablas;

		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'edit';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Campos';
		$this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = $this->breadcrumb;

		$this->admin_design->layout3($this->parameters);
	}

	public function getRecord () {
		$post = $this->input->post(NULL, TRUE);
		$row = $this->Model->getRow('campos', $post['id']);
		// $data = array('row'=>$row, 'tksec'=>$this->security->get_csrf_hash());
		$data = array('row'=>$row);
		echo json_encode($data);      
	}

	public function insert () {
		$post = $this->input->post(NULL, TRUE);
		if (!empty($post)) {
			foreach ($post as $key => $value) {
				$post[$key] = $this->security->xss_clean($value);
			}
			$this->form_validation->set_rules('id', 'ID', 'xss_clean');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.validation_errors().'<br><b>'.$this->lang->line('be_please_try_again').'</b>');
				$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
			} else {
				
				
				$data = array(

					"usuario" => 1,
					"proyecto" => $this->session->userdata('project'),
					"version" => $this->session->userdata('version'),
					"sql_linea" => $post["sql_linea"],
					"tabla" => $this->session->userdata('be_tabla'),
					"nombre" => $post["nombre"],
					"etiqueta" => $post["etiqueta"],
					"tipo_dato" => $post["tipo_dato"],
					"tamano" => $post["tamano"],
					"sin_signo" => $post["sin_signo"],
					"no_nulo" => $post["no_nulo"],
					"defecto" => $post["defecto"],
					"defecto_valor" => $post["defecto_valor"],
					"comentario" => $post["comentario"],
					"comentario_valor" => $post["comentario_valor"],
					"tipo_campo" => $post["tipo_campo"],
					"tipo_entrada" => $post["tipo_entrada"],
					"tipo_entrada_parametro" => $post["tipo_entrada_parametro"],);
				$id = $this->Model->insert('campos', $data);
				if ($id > 0) {
					$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>'.$this->lang->line('be_crud_the_record_was_successfully_inserted')); 
					$this->session->set_flashdata('alertType', 'success'); // success, info, warning, danger
					redirect(base_url() . $this->path);
				} else {
					$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_crud_the_record_could_not_be_inserted').'<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
				}     
			}
		} else {
			$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_crud_no_data_was_received').'<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
		}
		redirect(base_url() . $this->path . '/new');
	}

	public function update () {
		$post = $this->input->post(NULL, TRUE);
		if (!empty($post)) {
			foreach ($post as $key => $value) {
				$post[$key] = $this->security->xss_clean($value);
			}
			$this->form_validation->set_rules('id', 'ID', 'xss_clean');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.validation_errors().'<br><b>'.$this->lang->line('be_please_try_again').'</b>');
				$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
			} else {
				
				
				// $data = array(
				// 		"sql_linea" => $post["sql_linea"],
				// 		"nombre" => $post["nombre"],
				// 		"etiqueta" => $post["etiqueta"],
				// 		"tipo_dato" => $post["tipo_dato"],
				// 		"tamano" => $post["tamano"],
				// 		"sin_signo" => $post["sin_signo"],
				// 		"no_nulo" => $post["no_nulo"],
				// 		"defecto" => $post["defecto"],
				// 		"defecto_valor" => $post["defecto_valor"],
				// 		"comentario" => $post["comentario"],
				// 		"comentario_valor" => $post["comentario_valor"],
				// 		"tipo_campo" => $post["tipo_campo"],
				// 		"tipo_entrada" => $post["tipo_entrada"],
				// 		"tipo_entrada_parametro" => $post["tipo_entrada_parametro"],);



				$data = array(
						"nombre" => $post["nombre"],
						"etiqueta" => $post["etiqueta"],
						"tipo_dato" => $post["tipo_dato"],
						"tamano" => $post["tamano"],
						"llave_primaria" => $post["llave_primaria"],);
				if ($this->Model->update('campos', $data, $post['id'])) {
					$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>'.$this->lang->line('be_crud_the_record_was_updated_successfully')); 
					$this->session->set_flashdata('alertType', 'success'); // success, info, warning, danger
					redirect(base_url() . $this->path);
				} else {
					$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4'.$this->lang->line('be_crud_the_record_could_not_be_updated').'<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
				}     
			}
		} else {
			$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_crud_no_data_was_received').'<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
		}
		redirect(base_url() . $this->path . '/edit/' . $post['id']);   
	}

	public function delete () {
		$post = $this->input->post(NULL, TRUE);
		if (!empty($post)) {
			foreach ($post as $key => $value) {
				$post[$key] = $this->security->xss_clean($value);
			}
			$this->form_validation->set_rules('id', 'ID', 'required|trim|xss_clean');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.validation_errors().'<br><b>'.$this->lang->line('be_please_try_again').'</b>');
				$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
			} else {
				$mat_id = explode(";", $post['id']); 
				$result = false;          
				foreach ($mat_id as $id) {
					$this->Model->delete('campos', $id);
					$result = true;
				}
				if ($result) {
					$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>'.$this->lang->line('be_crud_the_records_were_successfully_deleted')); 
					$this->session->set_flashdata('alertType', 'success'); // success, info, warning, danger
				} else {
					$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_crud_records_could_not_be_deleted').'<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
				}     
			}
		} else {
			$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_crud_no_data_was_received').'.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
		}
		redirect(base_url() . $this->path);    
	}

	public function list_ssp () {
		$this->load->library('SSP');

		// DB table to use
		$table = 'campos';

		// Table's primary key
		$primaryKey = 'id';

		// Array of database columns
		$columns = array(array( 'db' => 'id', 'dt' => 0, 'field' => 'id', 'formatter' => function($d, $row) {return '<input type="checkbox" id="fila_' . $d . '" class="selection" cod="' . $d . '">';}),array( 'db' => 'id', 'dt' => 1, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-primary btn-xs btnEdit" cod="' . $d . '"><span class="glyphicon glyphicon-pencil"></span></button>';}), array( 'db' => 'id', 'dt' => 2, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-red btnDelete" cod="' . $d . '"><span class="glyphicon glyphicon-trash"></span></button>';}), 
			array( 'db' => 'nombre', 'dt' => 3, 'field' => 'nombre' ),
			array( 'db' => 'etiqueta', 'dt' => 4, 'field' => 'etiqueta', ),
			array( 'db' => 'orden', 'dt' => 5, 'field' => 'orden' ), );

		$sql_details = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db'   => $this->db->database,
			'host' => $this->db->hostname
		);

		$joinQuery = "FROM $table";
		$extraWhere = "proyecto = '".$this->session->userdata('project')."' 
						AND version = '".$this->session->userdata('version')."'
						AND tabla = '".$this->session->userdata('be_tabla')."'";
		$groupBy = ""; //"`u`.`datos`";
		$having = ""; //"`u`.`valor` >= 140000";

		//$_GET['tksec'] = $this->security->get_csrf_hash();  

		echo json_encode(
			SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
		);
	}

}