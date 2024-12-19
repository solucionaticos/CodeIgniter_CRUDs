<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Tablas extends MY_Controller {

	public $parameters;
	public $path;
	public $breadcrumb;

public $path_rel;
public $rel_proyecto;
public $rel_proyecto_nombre;
public $rel_version;
public $rel_version_nombre;

	public function __construct() {
		parent::__construct();
		// $this->ctrSegAdmin();

$this->path = 'admin/cruds/tablas';
$this->path_rel = 'admin/cruds/tablas_list';

	}

	public function index() {
		echo "Tablas";
	}

public function new($rel_version) {

$this->rel_version = $rel_version;
$this->parameters['data']['rel_version'] = $this->rel_version;
$row_rel_version = $this->Model->getRow('versiones', $this->rel_version);
$this->rel_version_nombre = $row_rel_version->nombre;

$this->rel_proyecto = $row_rel_version->proyecto;
$this->parameters['data']['rel_proyecto'] = $this->rel_proyecto;
$row_rel_proyecto = $this->Model->getRow('proyectos', $this->rel_proyecto);
$this->rel_proyecto_nombre = $row_rel_proyecto->nombre;

$this->parameters['path_rel'] = $this->path_rel;
$this->load->library('breadcrumb');
$this->parameters['breadcrumb'] = $this->breadcrumb->tablas();

		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'new';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Tablas';
		$this->parameters['subtitle'] = ''; 
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->admin_design->layout3($this->parameters);

	}

	public function edit($id) {
		$this->parameters['data']['id'] = $id;

$row_rel_tabla = $this->Model->getRow('tablas', $id);

$this->rel_version = $row_rel_tabla->version;
$this->parameters['data']['rel_version'] = $this->rel_version;
$row_rel_version = $this->Model->getRow('versiones', $this->rel_version);
$this->rel_version_nombre = $row_rel_version->nombre;

$this->rel_proyecto = $row_rel_version->proyecto;
$this->parameters['data']['rel_proyecto'] = $this->rel_proyecto;
$row_rel_proyecto = $this->Model->getRow('proyectos', $this->rel_proyecto);
$this->rel_proyecto_nombre = $row_rel_proyecto->nombre;

$row_tabla = $this->Model->getRow('tablas', $id);
$this->parameters['data']['campos'] = $row_tabla->campos;

$this->parameters['path_rel'] = $this->path_rel;
$this->load->library('breadcrumb');
$this->parameters['breadcrumb'] = $this->breadcrumb->tablas();

		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'edit';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Tablas';
		$this->parameters['subtitle'] = ''; 
		$this->parameters['head_title'] = $this->parameters['title'];

		$this->admin_design->layout3($this->parameters);

	}

	public function getRecord () {
		$post = $this->input->post(NULL, TRUE);
		$row = $this->Model->getRow('tablas', $post['id']);
		// $data = array('registro'=>$row, 'tksec'=>$this->security->get_csrf_hash());
		$data = array('row'=>$row);
		echo json_encode($data);      
	}

	public function insert () {

		$post = $this->input->post(NULL, TRUE);

$this->rel_proyecto = 0;
$this->rel_version = 0;
if (isset($post["rel_version"])) {
	$this->rel_version = $post["rel_version"];
	$row_rel_version = $this->Model->getRow('versiones', $this->rel_version);
	$this->rel_proyecto = $row_rel_version->proyecto;
}

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
"proyecto" => $this->rel_proyecto,
"version" => $this->rel_version,
					"nombre" => $post["nombre"],
					"etiqueta" => $post["etiqueta"],
					"comentarios" => $post["comentarios"]);

				$id = $this->Model->insert('tablas', $data);
				if ($id > 0) {

//Actualizacion
$count_rows = $this->Model->records('tablas', '', '', array('version'=>$this->rel_version));
$this->Model->update('versiones', array("tablas" => $count_rows), $this->rel_version);


					$data_campo = array(
						"usuario" => 1,
"proyecto" => $this->rel_proyecto,
"version" => $this->rel_version,
						"sql_linea" => '',
						"tabla" => $id,
						"nombre" => 'id',
						"etiqueta" => 'Id',
						"tipo_dato" => 'int',
						"tamano" => '11',
						"sin_signo" => '5',
						"no_nulo" => '4',
						"defecto" => '5',
						"defecto_valor" => '',
						"comentario" => '5',
						"comentario_valor" => '',
						"tipo_campo" => '23',
						"tipo_entrada" => '36',
						"tipo_entrada_parametro" => '',
						"archivo" => '5',
						"archivo_ruta" => '',
						"relacion_datos" => '0',
						"relacion_tabla" => '0',
						"relacion_campo" => '0',
						"relacion_nombre" => '',
						"relacion_condicion" => '',
						"relacion_orden" => '',
						"relacion_etiqueta_nm" => '',
						"relacion_tabla_n" => '0',
						"relacion_campo_n" => '0',
						"relacion_tabla_m" => '0',
						"relacion_campo_m_tabla_a" => '0',
						"relacion_campo_m_tabla_b" => '0',
						"relacion_campo_m_prioridad" => '0',
						"relacion_campo_nm_condicion" => '',
						"orden" => '1',
						"llave_primaria" => '4',
						"autonumerico" => '4',
						"indice" => '5',
						"unico" => '5',
						"comentarios" => '',      
						"lista" => '5',
						"etiqueta_lista" => 'Id',
						"orden_lista" => '1',
						"nuevo" => '5',
						"etiqueta_nuevo" => 'Id',
						"orden_nuevo" => '1',
						"editar" => '5',
						"etiqueta_editar" => 'Id',
						"orden_editar" => '1',
						"filtros" => '5',
						"etiqueta_filtros" => 'Id',
						"orden_filtros" => '1'
					);
					$this->Model->insert('campos', $data_campo);

//Actualizacion
$this->Model->update('tablas', array("campos" => 1), $id);


					$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>'.$this->lang->line('be_crud_the_record_was_successfully_inserted')); 
					$this->session->set_flashdata('alertType', 'success'); // success, info, warning, danger

redirect(base_url() . $this->path_rel . '/' . $this->rel_version);

				} else {
					$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_crud_the_record_could_not_be_inserted').'<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
				}     
			}

		} else {
			$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_crud_no_data_was_received').'<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
		}

if ($this->rel_version > 0) {
	redirect(base_url() . $this->path . '/new/' . $this->rel_version);
} else {
	redirect(base_url() . 'admin/cruds/proyectos');
}

	}


	public function update () {
		$post = $this->input->post(NULL, TRUE);

$this->rel_proyecto = 0;
$this->rel_version = 0;
if (isset($post["rel_version"])) {
	$this->rel_version = $post["rel_version"];
	$row_rel_version = $this->Model->getRow('versiones', $this->rel_version);
	$this->rel_proyecto = $row_rel_version->proyecto;
}

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
					"nombre" => $post["nombre"],
					"etiqueta" => $post["etiqueta"],
					"comentarios" => $post["comentarios"]);

				if ($this->Model->update('tablas', $data, $post['id'])) {
					$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>'.$this->lang->line('be_crud_the_record_was_updated_successfully')); 
					$this->session->set_flashdata('alertType', 'success'); // success, info, warning, danger

redirect(base_url() . $this->path_rel . '/' . $this->rel_version);

				} else {
					$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4'.$this->lang->line('be_crud_the_record_could_not_be_updated').'<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
				}     

			}
		} else {
			$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_crud_no_data_was_received').'<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
		}

if ($this->rel_version > 0) {
	redirect(base_url() . $this->path . '/edit/'.$post['id']);
} else {
	redirect(base_url() . 'admin/cruds/proyectos');
}

	}

	public function delete () {
		$post = $this->input->post(NULL, TRUE);

$this->rel_version = 0;
if (isset($post["rel_version"])) {
	$this->rel_version = $post["rel_version"];
}

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
					$this->Model->delete('tablas', $id);
					$this->Model->delete('campos', '', '', array('tabla' => $id));
					$this->Model->delete('campos_validaciones', '', '', array('tabla' => $id));

					$result = true;
				}

				if ($result) {

//Actualizacion
$count_rows = $this->Model->records('tablas', '', '', array('version'=>$this->rel_version));
$this->Model->update('versiones', array("tablas" => $count_rows), $this->rel_version);


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

if ($this->rel_version > 0) {
	redirect(base_url() . $this->path_rel . '/' . $this->rel_version);
} else {
	redirect(base_url() . 'admin/cruds/proyectos');
}

	}

public function list_ssp ($rel_version) {
		$this->load->library('SSP');

		// DB table to use
		$table = 'tablas';

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
			array( 'db' => 'etiqueta', 'dt' => 4, 'field' => 'etiqueta' ),
			array( 'db' => 'comentarios', 'dt' => 5, 'field' => 'comentarios' ),

array( 
	'db' => 'campos', 
	'dt' => 6, 
	'field' => 'id', 
	'formatter' => function($d, $row) {
		return '<div class="btn-group tdCommands"><a href="' . base_url() . 'admin/cruds/campos_list/' . $d . '" class="btn btn-info btn-xs" cod="' . $d . '" title="Campos">Campos ' .$row['campos']. '</a></div>';}), );

		$sql_details = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db'   => $this->db->database,
			'host' => $this->db->hostname
		);

		$joinQuery = "FROM $table";
$extraWhere = "version = '".$rel_version."'";
		$groupBy = ""; //"`u`.`datos`";
		$having = ""; //"`u`.`valor` >= 140000";

		//$_GET['tksec'] = $this->security->get_csrf_hash();  

		echo json_encode(
			SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
		);
	}

}