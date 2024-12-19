<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Proyectos extends MY_Controller {

	public $parameters;
	public $path;
	public $breadcrumb;

	public function __construct() {
		parent::__construct();
		// $this->ctrSegAdmin();
		$this->path = 'admin/cruds/proyectos';
		$this->breadcrumb = '
		<ol class="breadcrumb">
		<li><a href="'.base_url().'"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active"><a href="'.base_url().'admin/cruds/proyectos"></i> Proyectos</a></li>
		</ol>';		
	}

	public function index() {

		// Actualizacion
		$rows = $this->Model->getRowsJoin('proyectos', 'id');
		foreach ($rows as $row) {
			$count_rows = $this->Model->records('versiones', '', '', array('proyecto'=>$row['id']));
			$this->Model->update('proyectos', array("versiones" => $count_rows), $row['id']);
		}

		$this->parameters['template'] = 'ssp';
		$this->parameters['type'] = 'list';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Proyectos';
		$this->parameters['subtitle'] = '<span style="color:red;"><b>Es posible que los cambios que se hagan aqui no actualicen las definiciones del proyecto/version</b></span>'; //$this->admin_design->_projectVersionTitle();
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = $this->breadcrumb; 

		$this->admin_design->layout3($this->parameters);
	}

	public function new() {

		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'new';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Proyectos';
		$this->parameters['subtitle'] = ''; //$this->admin_design->_projectVersionTitle();
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = $this->breadcrumb;

		$this->admin_design->layout3($this->parameters);

	}

	public function edit($id) {
		$this->parameters['data']['id'] = $id;

$row_proyecto = $this->Model->getRow('proyectos', $id);
$this->parameters['data']['versiones'] = $row_proyecto->versiones;

		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'edit';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Proyectos';
		$this->parameters['subtitle'] = ''; //$this->admin_design->_projectVersionTitle();
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = $this->breadcrumb;

		$this->admin_design->layout3($this->parameters);

	}

	public function getRecord () {
		$post = $this->input->post(NULL, TRUE);
		$row = $this->Model->getRow('proyectos', $post['id']);
		// $data = array('registro'=>$row, 'tksec'=>$this->security->get_csrf_hash());
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
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.validation_errors().'<br><b>'.$this->lang->line('be_please_try_again').'</b>');
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				
			} else {
				
				$data = array(
						"nombre" => $post["nombre"],
						"descripcion" => $post["descripcion"],
						"created_at" => $this->config->item('YmdHis'));

				$id = $this->Model->insert('proyectos', $data);
				if ($id > 0) {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El registro se ingresó exitosamente.'); 
					$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
					redirect(base_url() . $this->path);
				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible ingresar el registro.<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				}     
			}

		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No se recibieron datos.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
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
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.validation_errors().'<br><b>'.$this->lang->line('be_please_try_again').'</b>');
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
			} else {
				
				$data = array(
						"nombre" => $post["nombre"],
						"descripcion" => $post["descripcion"],
						"updated_at" => $this->config->item('YmdHis'));

				if ($this->Model->update('proyectos', $data, $post['id'])) {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El registro se guardo exitosamente.'); 
					$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
					redirect(base_url() . $this->path);
				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible guardar el registro.<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				}     

			}
		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No se recibieron datos.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
		}
		redirect(base_url() . $this->path . '/edit/'.$post['id']);   
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
				$result = false;          
				foreach ($mat_id as $id) {
					$this->Model->delete('proyectos', $id);
					$this->Model->delete('versiones', '', '', array('proyecto' => $id));
					$this->Model->delete('menus', '', '', array('proyecto' => $id));
					$this->Model->delete('menus_enlaces', '', '', array('proyecto' => $id));
					$this->Model->delete('sqls', '', '', array('project' => $id));
					$this->Model->delete('tablas', '', '', array('proyecto' => $id));
					$this->Model->delete('campos', '', '', array('proyecto' => $id));
					$this->Model->delete('campos_validaciones', '', '', array('proyecto' => $id));

					$result = true;
				}

				if ($result) {
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
		redirect(base_url() . $this->path);   
	}

	public function list_ssp () {
		$this->load->library('SSP');

		// DB table to use
		$table = 'proyectos';

		// Table's primary key
		$primaryKey = 'id';

		// Array of database columns
		$columns = array(
			array( 'db' => 'id', 'dt' => 0, 'field' => 'id', 'formatter' => function($d, $row) {return '<input type="checkbox" id="fila_' . $d . '" class="selection" cod="' . $d . '">';}),
			array( 'db' => 'id', 'dt' => 1, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-primary btn-xs btnEdit" cod="' . $d . '" title="'.$this->lang->line('be_crud_edit').'"><span class="glyphicon glyphicon-pencil"></span></button>';}), 
			array( 'db' => 'id', 'dt' => 2, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-red btnDelete" cod="' . $d . '" title="'.$this->lang->line('be_crud_delete').'"><span class="glyphicon glyphicon-trash"></span></button>';}), 
			array( 'db' => 'nombre', 'dt' => 3, 'field' => 'nombre' ),
			array( 'db' => 'descripcion', 'dt' => 4, 'field' => 'descripcion' ),

array( 'db' => 'versiones', 
	'dt' => 5, 
	'field' => 'id', 
	'formatter' => function($d, $row) {return '<div class="btn-group tdCommands"><a href="' . base_url() . 'admin/cruds/versiones_list/' . $d . '" class="btn btn-info btn-xs" cod="' . $d . '" title="Versiones">Versiones: ' .$row['versiones']. '</a></div>';}), 

		);

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