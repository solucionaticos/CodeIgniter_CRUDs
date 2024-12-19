<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Versiones extends MY_Controller {

	public $parameters;	
	public $path;
	public $breadcrumb;

public $path_rel;
public $rel_proyecto;
public $rel_proyecto_nombre;

	public function __construct() {
		parent::__construct();
		// $this->ctrSegAdmin();

$this->path = 'admin/cruds/versiones';
$this->path_rel = 'admin/cruds/versiones_list';

	}

  	public function index() {  
		echo "Versiones";
	}	

public function new($rel_proyecto) {

$this->rel_proyecto = $rel_proyecto;
$this->parameters['data']['rel_proyecto'] = $this->rel_proyecto;
$row_rel_proyecto = $this->Model->getRow('proyectos', $this->rel_proyecto);
$this->rel_proyecto_nombre = $row_rel_proyecto->nombre;

$this->parameters['path_rel'] = $this->path_rel;
$this->load->library('breadcrumb');
$this->parameters['breadcrumb'] = $this->breadcrumb->versiones();

		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'new';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Versiones';
		$this->parameters['subtitle'] = ''; 
		$this->parameters['head_title'] = $this->parameters['title'];

		$this->admin_design->layout3($this->parameters);

	}

	public function edit($id) {
		$this->parameters['data']['id'] = $id;

$row_rel_version = $this->Model->getRow('versiones', $id);

$this->rel_proyecto = $row_rel_version->proyecto;
$this->parameters['data']['rel_proyecto'] = $this->rel_proyecto;
$row_rel_proyecto = $this->Model->getRow('proyectos', $this->rel_proyecto);
$this->rel_proyecto_nombre = $row_rel_proyecto->nombre;

$row_version = $this->Model->getRow('versiones', $id);
$this->parameters['data']['tablas'] = $row_version->tablas;

$this->parameters['path_rel'] = $this->path_rel;
$this->load->library('breadcrumb');
$this->parameters['breadcrumb'] = $this->breadcrumb->versiones();

		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'edit';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Versiones';
		$this->parameters['subtitle'] = ''; 
		$this->parameters['head_title'] = $this->parameters['title'];

		$this->admin_design->layout3($this->parameters);

	}

	public function getRecord () {
		$post = $this->input->post(NULL, TRUE);
		$row = $this->Model->getRow('versiones', $post['id']);
		// $data = array('registro'=>$row, 'tksec'=>$this->security->get_csrf_hash());
		$data = array('row'=>$row);
		echo json_encode($data);        
	}

	public function insert () {

		$post = $this->input->post(NULL, TRUE);

$this->rel_proyecto = 0;
if (isset($post["rel_proyecto"])) {
	$this->rel_proyecto = $post["rel_proyecto"];
}

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
"proyecto" => $this->rel_proyecto,
						"nombre" => $post["nombre"],
						"descripcion" => $post["descripcion"],
						"created_at" => $this->config->item('YmdHis'));

				$id = $this->Model->insert('versiones', $data);
				if ($id > 0) {

// Actualizacion
$count_rows = $this->Model->records('versiones', '', '', array('proyecto'=>$this->rel_proyecto));
$this->Model->update('proyectos', array("versiones" => $count_rows), $this->rel_proyecto);


					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El registro se ingresó exitosamente.'); 
					$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
					
redirect(base_url() . $this->path_rel . '/' . $this->rel_proyecto);

				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible ingresar el registro.<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				}     
			}

		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No se recibieron datos.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
		}

if ($this->rel_proyecto > 0) {
	redirect(base_url() . $this->path . '/new/' . $this->rel_proyecto);
} else {
	redirect(base_url() . 'admin/cruds/proyectos');
}

	}


	public function update () {
		$post = $this->input->post(NULL, TRUE);

$this->rel_proyecto = 0;
if (isset($post["rel_proyecto"])) {
	$this->rel_proyecto = $post["rel_proyecto"];
}

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

				if ($this->Model->update('versiones', $data, $post['id'])) {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El registro se guardo exitosamente.'); 
					$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger

redirect(base_url() . $this->path_rel . '/' . $this->rel_proyecto);

				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible guardar el registro.<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				}     

			}
		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No se recibieron datos.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
		}
		   

if ($this->rel_proyecto > 0) {
	redirect(base_url() . $this->path . '/edit/'.$post['id']);
} else {
	redirect(base_url() . 'admin/cruds/proyectos');
}


	}

	public function delete () {
		$post = $this->input->post(NULL, TRUE);

$this->rel_proyecto = 0;
if (isset($post["rel_proyecto"])) {
	$this->rel_proyecto = $post["rel_proyecto"];
}

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
					$this->Model->delete('versiones', $id);
					$this->Model->delete('menus', '', '', array('version' => $id));
					$this->Model->delete('menus_enlaces', '', '', array('version' => $id));
					$this->Model->delete('sqls', '', '', array('project' => $id));
					$this->Model->delete('tablas', '', '', array('version' => $id));
					$this->Model->delete('campos', '', '', array('version' => $id));
					$this->Model->delete('campos_validaciones', '', '', array('version' => $id));

					$result = true;
				}

				if ($result) {

//Actualizacion
$count_rows = $this->Model->records('versiones', '', '', array('proyecto'=>$this->rel_proyecto));
$this->Model->update('proyectos', array("versiones" => $count_rows), $this->rel_proyecto);


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
		   

if ($this->rel_proyecto > 0) {
	redirect(base_url() . $this->path_rel . '/' . $this->rel_proyecto);
} else {
	redirect(base_url() . 'admin/cruds/proyectos');
}


	}

  
public function list_ssp ($rel_proyecto) {
		$this->load->library('SSP');

		// DB table to use
		$table = 'versiones';

		// Table's primary key
		$primaryKey = 'id';

		// Array of database columns
		$columns = array(
			array( 'db' => 'id', 'dt' => 0, 'field' => 'id', 'formatter' => function($d, $row) {return '<input type="checkbox" id="fila_' . $d . '" class="selection" cod="' . $d . '">';}),

array( 
	'db' => 'id', 
	'dt' => 1, 
	'field' => 'id', 
	'formatter' => function($d, $row) {
		return '<button type="button" class="btn btn-primary btn-xs btnEdit_rel" cod="' . $d . '" title="'.$this->lang->line('be_crud_edit').'"><span class="glyphicon glyphicon-pencil"></span></button>';}), 

			array( 'db' => 'id', 'dt' => 2, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-red btnDelete" cod="' . $d . '" title="'.$this->lang->line('be_crud_delete').'"><span class="glyphicon glyphicon-trash"></span></button>';}), 
			array( 'db' => 'nombre', 'dt' => 3, 'field' => 'nombre' ),
			array( 'db' => 'descripcion', 'dt' => 4, 'field' => 'descripcion' ),

array( 
	'db' => 'tablas', 
	'dt' => 5, 
	'field' => 'id', 
	'formatter' => function($d, $row) {
		return '<div class="btn-group tdCommands"><a href="' . base_url() . 'admin/cruds/tablas_list/' . $d . '" class="btn btn-info btn-xs" cod="' . $d . '" title="Tablas">Tablas ' .$row['tablas']. '</a></div>';}), );

		$sql_details = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db'   => $this->db->database,
			'host' => $this->db->hostname
		);

		$joinQuery = "FROM $table";
$extraWhere = "proyecto = '".$rel_proyecto."'";
		$groupBy = ""; //"`u`.`datos`";
		$having = ""; //"`u`.`valor` >= 140000";

		//$_GET['tksec'] = $this->security->get_csrf_hash();  

		echo json_encode(
			SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
		);
	}

}