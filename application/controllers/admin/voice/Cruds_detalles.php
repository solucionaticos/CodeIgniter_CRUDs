<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Cruds_detalles extends MY_Controller {

	public $parameters;
	public $path;
	public $breadcrumb;

	public function __construct() {
		parent::__construct();
		// $this->ctrSegAdmin();
		$this->path = 'admin/voice/cruds_detalles';
		$this->breadcrumb = '
		<ol class="breadcrumb">
			<li><a href="'.base_url().'"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li><a href="'.base_url().'admin/voice/tablas"></i> Tablas</a></li>
			<li><a href="'.base_url().'admin/voice/tablas/edit/'.$this->session->userdata('be_tabla').'"></i> Tabla:'.$this->session->userdata('be_tabla_nombre').'</a></li>
			<li><a href="'.base_url().'admin/voice/cruds"></i> Cruds</a></li>
			<li><a href="'.base_url().'admin/voice/cruds/edit/'.$this->session->userdata('be_crud').'"></i> Crud:'.$this->session->userdata('be_crud_nombre').'</a></li>
			<li class="active">Cruds Campos</li>
		</ol>';
	}

	public function index() {
		$this->parameters['template'] = 'ssp';
		$this->parameters['type'] = 'list';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Cruds Campos';
		$this->parameters['subtitle'] = '';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = $this->breadcrumb; 

		$this->admin_design->layout3($this->parameters);
	}

	public function new() {


		$table_campos = $this->Model->getRowsJoin("campos", "id,nombre nombre", array(), array(), "nombre" );
		$this->parameters["data"]["table_campos"] = $table_campos;
		$table_datos_valores_si_no = $this->Model->getRowsJoin("datos_valores", "id, nombre", array(), array("dato"=>3), "nombre ASC" );
		$this->parameters["data"]["table_datos_valores_si_no"] = $table_datos_valores_si_no;
		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'new';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Cruds Campos';
		$this->parameters['subtitle'] = '';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = $this->breadcrumb;

		$this->admin_design->layout3($this->parameters);
	}

	public function edit($id) {
		$this->parameters['data']['id'] = $id;

		$table_campos = $this->Model->getRowsJoin("campos", "id,nombre nombre", array(), array(), "nombre" );
		$this->parameters["data"]["table_campos"] = $table_campos;
		$table_datos_valores_si_no = $this->Model->getRowsJoin("datos_valores", "id, nombre", array(), array("dato"=>3), "nombre ASC" );
		$this->parameters["data"]["table_datos_valores_si_no"] = $table_datos_valores_si_no;
		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'edit';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Cruds Campos';
		$this->parameters['subtitle'] = '';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = $this->breadcrumb;

		$this->admin_design->layout3($this->parameters);
	}

	public function getRecord () {
		$post = $this->input->post(NULL, TRUE);
		$row = $this->Model->getRow('cruds_detalles', $post['id']);
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
						"crud" => $this->session->userdata('be_crud'),
						"tabla" => $this->session->userdata('be_tabla'),
						"campo" => $post["campo"],
						"lista" => $post["lista"],
						"nuevo" => $post["nuevo"],
						"editar" => $post["editar"],
						"ver" => $post["ver"],
						"exportar" => $post["exportar"],
						"imprimir" => $post["imprimir"],);
				$id = $this->Model->insert('cruds_detalles', $data);
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
				
				$data = array(
						"campo" => $post["campo"],
						"lista" => $post["lista"],
						"nuevo" => $post["nuevo"],
						"editar" => $post["editar"],
						"ver" => $post["ver"],
						"exportar" => $post["exportar"],
						"imprimir" => $post["imprimir"],);
				if ($this->Model->update('cruds_detalles', $data, $post['id'])) {
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
					$this->Model->delete('cruds_detalles', $id);
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
		$table = 'cruds_detalles';

		// Table's primary key
		$primaryKey = 'id';

		// Array of database columns
		$columns = array(array( 'db' => 'id', 'dt' => 0, 'field' => 'id', 'formatter' => function($d, $row) {return '<input type="checkbox" id="fila_' . $d . '" class="selection" cod="' . $d . '">';}),array( 'db' => 'id', 'dt' => 1, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-primary btn-xs btnEdit" cod="' . $d . '"><span class="glyphicon glyphicon-pencil"></span></button>';}), array( 'db' => 'id', 'dt' => 2, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-red btnDelete" cod="' . $d . '"><span class="glyphicon glyphicon-trash"></span></button>';}), 
			array( 'db' => 'campo', 'dt' => 3, 'field' => 'campo',
				"formatter" => function($d, $row) {
									$campo_name = "";
									$campo_data = $this->Model->getRow("campos", $d);
									if ($campo_data) {
										$campo_name = $campo_data->nombre;
									} 
									return $campo_name;
								}
							 ),
			array( 'db' => 'lista', 'dt' => 4, 'field' => 'lista',
				"formatter" => function($d, $row) {
									$lista_name = "";
									$lista_data = $this->Model->getRow("datos_valores", $d);
									if ($lista_data) {
										$lista_name = $lista_data->nombre;
									} 
									return $lista_name;
								}
							 ),array( 'db' => 'nuevo', 'dt' => 5, 'field' => 'nuevo',
				"formatter" => function($d, $row) {
									$nuevo_name = "";
									$nuevo_data = $this->Model->getRow("datos_valores", $d);
									if ($nuevo_data) {
										$nuevo_name = $nuevo_data->nombre;
									} 
									return $nuevo_name;
								}
							 ),array( 'db' => 'editar', 'dt' => 6, 'field' => 'editar',
				"formatter" => function($d, $row) {
									$editar_name = "";
									$editar_data = $this->Model->getRow("datos_valores", $d);
									if ($editar_data) {
										$editar_name = $editar_data->nombre;
									} 
									return $editar_name;
								}
							 ),array( 'db' => 'ver', 'dt' => 7, 'field' => 'ver',
				"formatter" => function($d, $row) {
									$ver_name = "";
									$ver_data = $this->Model->getRow("datos_valores", $d);
									if ($ver_data) {
										$ver_name = $ver_data->nombre;
									} 
									return $ver_name;
								}
							 ),);

		$sql_details = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db'   => $this->db->database,
			'host' => $this->db->hostname
		);

		$joinQuery = "FROM $table";
		$extraWhere = "proyecto = '".$this->session->userdata('project')."' 
						AND version = '".$this->session->userdata('version')."'
						AND tabla = '".$this->session->userdata('be_tabla')."'
						AND crud = '".$this->session->userdata('be_crud')."'";
		$groupBy = ""; //"`u`.`datos`";
		$having = ""; //"`u`.`valor` >= 140000";

		//$_GET['tksec'] = $this->security->get_csrf_hash();  

		echo json_encode(
			SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
		);
	}

}