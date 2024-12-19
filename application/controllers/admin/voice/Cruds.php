<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Cruds extends MY_Controller {

	public $parameters;
	public $path;
	public $breadcrumb;

	public function __construct() {
		parent::__construct();
		// $this->ctrSegAdmin();
		$this->path = 'admin/voice/cruds';
		$this->breadcrumb = '
		<ol class="breadcrumb">
			<li><a href="'.base_url().'"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li><a href="'.base_url().'admin/voice/tablas"></i> Tablas</a></li>
			<li><a href="'.base_url().'admin/voice/tablas/edit/'.$this->session->userdata('be_tabla').'"></i> Tabla:'.$this->session->userdata('be_tabla_nombre').'</a></li>
			<li class="active">Cruds</li>
		</ol>';
	}

	public function index() {
		$this->parameters['template'] = 'ssp';
		$this->parameters['type'] = 'list';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Cruds';
		$this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = $this->breadcrumb; 

		$this->admin_design->layout3($this->parameters);
	}

	public function new() {

		$table_datos_valores_si_no = $this->Model->getRowsJoin("datos_valores", "id, nombre", array(), array("dato"=>3), "nombre ASC" );
		$this->parameters["data"]["table_datos_valores_si_no"] = $table_datos_valores_si_no;

		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'new';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Cruds';
		$this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = $this->breadcrumb;

		$this->admin_design->layout3($this->parameters);
	}

	public function edit($id) {
		$this->parameters['data']['id'] = $id;

		$table_datos_valores_si_no = $this->Model->getRowsJoin("datos_valores", "id, nombre", array(), array("dato"=>3), "nombre ASC" );
		$this->parameters["data"]["table_datos_valores_si_no"] = $table_datos_valores_si_no;

		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'edit';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Cruds';
		$this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = $this->breadcrumb;

		$this->admin_design->layout3($this->parameters);
	}

	public function getRecord () {
		$post = $this->input->post(NULL, TRUE);
		$row = $this->Model->getRow('cruds', $post['id']);
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
						"tabla" => $this->session->userdata('be_tabla'),
						"path" => $post["path"],
						"script" => $post["script"],
						"titulo" => $post["titulo"],
						"ambiente" => $post["ambiente"],
						"carpeta_1" => $post["carpeta_1"],
						"carpeta_2" => $post["carpeta_2"],
						"lista_orden_campo" => $post["lista_orden_campo"],
						"lista_orden_direccion" => $post["lista_orden_direccion"],
						"lista_condicion_campo" => $post["lista_condicion_campo"],
						"lista_condicion_valor" => $post["lista_condicion_valor"],
						"nuevo" => $post["nuevo"],
						"editar" => $post["editar"],
						"ver" => $post["ver"],
						"borrar" => $post["borrar"],
						"exportar" => $post["exportar"],
						"imprimir" => $post["imprimir"],
						"tipo_crud" => $post["tipo_crud"],
						"js" => $post["js"],
						"css" => $post["css"],);
				$id = $this->Model->insert('cruds', $data);
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
						"path" => $post["path"],
						"script" => $post["script"],
						"titulo" => $post["titulo"],
						"ambiente" => $post["ambiente"],
						"carpeta_1" => $post["carpeta_1"],
						"carpeta_2" => $post["carpeta_2"],
						"lista_orden_campo" => $post["lista_orden_campo"],
						"lista_orden_direccion" => $post["lista_orden_direccion"],
						"lista_condicion_campo" => $post["lista_condicion_campo"],
						"lista_condicion_valor" => $post["lista_condicion_valor"],
						"nuevo" => $post["nuevo"],
						"editar" => $post["editar"],
						"ver" => $post["ver"],
						"borrar" => $post["borrar"],
						"exportar" => $post["exportar"],
						"imprimir" => $post["imprimir"],
						"tipo_crud" => $post["tipo_crud"],
						"js" => $post["js"],
						"css" => $post["css"],);
				if ($this->Model->update('cruds', $data, $post['id'])) {
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
					$this->Model->delete('cruds', $id);
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
		$table = 'cruds';

		// Table's primary key
		$primaryKey = 'id';

		// Array of database columns
		$columns = array(array( 'db' => 'id', 'dt' => 0, 'field' => 'id', 'formatter' => function($d, $row) {return '<input type="checkbox" id="fila_' . $d . '" class="selection" cod="' . $d . '">';}),array( 'db' => 'id', 'dt' => 1, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-primary btn-xs btnEdit" cod="' . $d . '"><span class="glyphicon glyphicon-pencil"></span></button>';}), array( 'db' => 'id', 'dt' => 2, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-red btnDelete" cod="' . $d . '"><span class="glyphicon glyphicon-trash"></span></button>';}), 

							 array( 'db' => 'script', 'dt' => 3, 'field' => 'script' ),
							 array( 'db' => 'titulo', 'dt' => 4, 'field' => 'titulo' ),

							 array( 'db' => 'carpeta_1', 'dt' => 5, 'field' => 'carpeta_1' ),
							 array( 'db' => 'carpeta_2', 'dt' => 6, 'field' => 'carpeta_2' ),

							 array( 'db' => 'nuevo', 'dt' => 7, 'field' => 'nuevo',
				"formatter" => function($d, $row) {
									$nuevo_name = "";
									$nuevo_data = $this->Model->getRow("datos_valores", $d);
									if ($nuevo_data) {
										$nuevo_name = $nuevo_data->nombre;
									} 
									return $nuevo_name;
								}
							 ),
							 array( 'db' => 'editar', 'dt' => 8, 'field' => 'editar',
				"formatter" => function($d, $row) {
									$editar_name = "";
									$editar_data = $this->Model->getRow("datos_valores", $d);
									if ($editar_data) {
										$editar_name = $editar_data->nombre;
									} 
									return $editar_name;
								}
							 ),
							 array( 'db' => 'ver', 'dt' => 9, 'field' => 'ver',
				"formatter" => function($d, $row) {
									$ver_name = "";
									$ver_data = $this->Model->getRow("datos_valores", $d);
									if ($ver_data) {
										$ver_name = $ver_data->nombre;
									} 
									return $ver_name;
								}
							 ),
							 array( 'db' => 'borrar', 'dt' => 10, 'field' => 'borrar',
				"formatter" => function($d, $row) {
									$borrar_name = "";
									$borrar_data = $this->Model->getRow("datos_valores", $d);
									if ($borrar_data) {
										$borrar_name = $borrar_data->nombre;
									} 
									return $borrar_name;
								}
							 ),
			array( 'db' => 'id', 'dt' => 11, 'field' => 'id', 'formatter' => function($d, $row) {return '<div class="btn-group tdCommands"><a href="' . base_url() . $this->path. '/cruds_detalles/' . $d . '" class="btn btn-info btn-xs" cod="' . $d . '" title="Campos">Crud Campos</a></div>';}),

							);

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


// -------------------------------------------------

	public function cruds_detalles($tabla) {
		$this->session->set_userdata('be_crud', $tabla);
		$row = $this->Model->getRow('cruds', $tabla);
		$this->session->set_userdata('be_crud_nombre', $row->titulo);
		redirect(base_url() .'admin/voice/cruds_detalles');
	}	

}