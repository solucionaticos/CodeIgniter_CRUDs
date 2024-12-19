<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Campos extends MY_Controller {

	public $parameters;
	public $path;
	public $breadcrumb;
	public $tabla_tipo_dato = array ('char'=>'char',
									'varchar'=>'varchar',
									'tinytext'=>'tinytext',
									'text'=>'text',
									'mediumtext'=>'mediumtext',
									'longtext'=>'longtext',
									'tinyint'=>'tinyint',
									'smallint'=>'smallint',
									'mediumint'=>'mediumint',
									'int'=>'int',
									'bigint'=>'bigint',
									'float'=>'float',
									'double'=>'double',
									'decimal'=>'decimal',
									'date'=>'date',
									'datetime'=>'datetime',
									'timestamp'=>'timestamp',
									'time'=>'time');

public $path_rel;
public $rel_proyecto;
public $rel_proyecto_nombre;
public $rel_version;
public $rel_version_nombre;
public $rel_tabla;
public $rel_tabla_nombre;

	public function __construct() {
		parent::__construct();
		// $this->ctrSegAdmin();

$this->path = 'admin/cruds/campos';
$this->path_rel = 'admin/cruds/campos_list';

	}

	public function index() {
		echo "Campos";
	}

public function new($rel_tabla) {

$this->rel_tabla = $rel_tabla;
$this->parameters['data']['rel_tabla'] = $this->rel_tabla;
$row_rel_tabla = $this->Model->getRow('tablas', $this->rel_tabla);
$this->rel_tabla_nombre = $row_rel_tabla->nombre;

$this->rel_version = $row_rel_tabla->version;
$this->parameters['data']['rel_version'] = $this->rel_version;
$row_rel_version = $this->Model->getRow('versiones', $this->rel_version);
$this->rel_version_nombre = $row_rel_version->nombre;

$this->rel_proyecto = $row_rel_version->proyecto;
$this->parameters['data']['rel_proyecto'] = $this->rel_proyecto;
$row_rel_proyecto = $this->Model->getRow('proyectos', $this->rel_proyecto);
$this->rel_proyecto_nombre = $row_rel_proyecto->nombre;

$this->parameters['path_rel'] = $this->path_rel;
$this->load->library('breadcrumb');
$this->parameters['breadcrumb'] = $this->breadcrumb->campos();

	    $tabla_datos_valores_estado = $this->Model->getRowsJoin('datos_valores', 'id, nombre', array(), array('dato'=>3), 'orden DESC' ); 
	    $this->parameters['data']['tabla_datos_valores_si_no'] = $tabla_datos_valores_estado;
	    $this->parameters['data']['tabla_tipo_dato'] = $this->tabla_tipo_dato;
		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'new';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Campos';
		$this->parameters['subtitle'] = ''; 
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->admin_design->layout3($this->parameters);

	}

	public function edit($id) {
	    $this->parameters['data']['id'] = $id;

$row_rel_campos = $this->Model->getRow('campos', $id);

$this->rel_tabla = $row_rel_campos->tabla;
$this->parameters['data']['rel_tabla'] = $this->rel_tabla;
$row_rel_tabla = $this->Model->getRow('tablas', $this->rel_tabla);
$this->rel_tabla_nombre = $row_rel_tabla->nombre;

$this->rel_version = $row_rel_tabla->version;
$this->parameters['data']['rel_version'] = $this->rel_version;
$row_rel_version = $this->Model->getRow('versiones', $this->rel_version);
$this->rel_version_nombre = $row_rel_version->nombre;

$this->rel_proyecto = $row_rel_version->proyecto;
$this->parameters['data']['rel_proyecto'] = $this->rel_proyecto;
$row_rel_proyecto = $this->Model->getRow('proyectos', $this->rel_proyecto);
$this->rel_proyecto_nombre = $row_rel_proyecto->nombre;

$this->parameters['path_rel'] = $this->path_rel;		
$this->load->library('breadcrumb');
$this->parameters['breadcrumb'] = $this->breadcrumb->campos();

	    $tabla_datos_valores_si_no = $this->Model->getRowsJoin('datos_valores', 'id, nombre', array(), array('dato'=>3), 'orden DESC' ); 
	    $this->parameters['data']['tabla_datos_valores_si_no'] = $tabla_datos_valores_si_no;
	    $this->parameters['data']['tabla_tipo_dato'] = $this->tabla_tipo_dato;
		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'edit';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Campos';
		$this->parameters['subtitle'] = ''; 
		$this->parameters['head_title'] = $this->parameters['title'];
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

$this->rel_proyecto = 0;
$this->rel_version = 0;
$this->rel_tabla = 0;
if (isset($post["rel_tabla"])) {
	$this->rel_tabla = $post["rel_tabla"];
	$row_rel_tabla = $this->Model->getRow('tablas', $this->rel_tabla);
	$this->rel_version = $row_rel_tabla->version;
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


                // -----------------
                $tipo_campo = 24; // VARCHAR
                $tipo_entrada = 42; // STRING
                if ($post["tipo_dato"] == 'int') {
                    $tipo_campo = 23; // INT
                    $tipo_entrada = 36; // NUMERIC
                } else {
                    $tipo_campo = 24; // VARCHAR
                    if ($post["tipo_dato"] == 'text') {
                        $tipo_entrada = 41; // TEXT
                    } else {
                        $tipo_entrada = 42; // STRING
                    }
                }

                $data = array(
                    "usuario" => 1,
"proyecto" => $this->rel_proyecto,
"version" => $this->rel_version,
"tabla" => $this->rel_tabla,
					"nombre" => $post["nombre"],
					"etiqueta" => $post["etiqueta"],
                    "tipo_dato" => $post["tipo_dato"],
                    "tamano" => $post["tamano"],
                    "sin_signo" => '5',
                    "no_nulo" => '4',
                    "defecto" => '5',
                    "defecto_valor" => '',
                    "comentario" => '5',
                    "comentario_valor" => '',
                    "tipo_campo" => $tipo_campo,
                    "tipo_entrada" => $tipo_entrada,
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
                    "orden" => $post["orden"],
                    "llave_primaria" => $post["llave_primaria"],
                    "autonumerico" => $post["llave_primaria"],
                    "indice" => '5',
                    "unico" => '5',
                    "comentarios" => $post["comentarios"],      
                    "lista" => '4',
                    "etiqueta_lista" => $post["etiqueta"],
                    "orden_lista" => $post["orden"],
                    "nuevo" => '4',
                    "etiqueta_nuevo" => $post["etiqueta"],
                    "orden_nuevo" => $post["orden"],
                    "editar" => '4',
                    "etiqueta_editar" => $post["etiqueta"],
                    "orden_editar" => $post["orden"],
                    "filtros" => '5',
                    "etiqueta_filtros" => $post["etiqueta"],
                    "orden_filtros" => $post["orden"]
                );


				$id = $this->Model->insert('campos', $data);
				if ($id > 0) {


//Actualizacion
$count_rows = $this->Model->records('campos', '', '', array('tabla'=>$this->rel_tabla));
$this->Model->update('tablas', array("campos" => $count_rows), $this->rel_tabla);


					$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>'.$this->lang->line('be_crud_the_record_was_successfully_inserted')); 
					$this->session->set_flashdata('alertType', 'success'); // success, info, warning, danger

redirect(base_url() . $this->path_rel . '/' . $this->rel_tabla);

				} else {
					$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_crud_the_record_could_not_be_inserted').'<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
				}     
			}
		} else {
			$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_crud_no_data_was_received').'<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
		}

if ($this->rel_tabla > 0) {
	redirect(base_url() . $this->path . '/new/' . $this->rel_tabla);
} else {
	redirect(base_url() . 'admin/cruds/proyectos');
}

	}

	public function update () {
		$post = $this->input->post(NULL, TRUE);

$this->rel_proyecto = 0;
$this->rel_version = 0;
$this->rel_tabla = 0;
if (isset($post["rel_tabla"])) {
	$this->rel_tabla = $post["rel_tabla"];
	$row_rel_tabla = $this->Model->getRow('tablas', $this->rel_tabla);
	$this->rel_version = $row_rel_tabla->version;
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

                // -----------------
                $tipo_campo = 24; // VARCHAR
                $tipo_entrada = 42; // STRING
                if ($post["tipo_dato"] == 'int') {
                    $tipo_campo = 23; // INT
                    $tipo_entrada = 36; // NUMERIC
                } else {
                    $tipo_campo = 24; // VARCHAR
                    if ($post["tipo_dato"] == 'text') {
                        $tipo_entrada = 41; // TEXT
                    } else {
                        $tipo_entrada = 42; // STRING
                    }
                }

                $data = array(
					"nombre" => $post["nombre"],
					"etiqueta" => $post["etiqueta"],
                    "tipo_dato" => $post["tipo_dato"],
                    "tamano" => $post["tamano"],
                    "tipo_campo" => $tipo_campo,
                    "tipo_entrada" => $tipo_entrada,
                    "orden" => $post["orden"],
                    "llave_primaria" => $post["llave_primaria"],
                    "autonumerico" => $post["llave_primaria"],
                    "comentarios" => $post["comentarios"],      
                    "etiqueta_lista" => $post["etiqueta"],
                    "orden_lista" => $post["orden"],
                    "etiqueta_nuevo" => $post["etiqueta"],
                    "orden_nuevo" => $post["orden"],
                    "etiqueta_editar" => $post["etiqueta"],
                    "orden_editar" => $post["orden"],
                    "etiqueta_filtros" => $post["etiqueta"],
                    "orden_filtros" => $post["orden"]
                );

				if ($this->Model->update('campos', $data, $post['id'])) {
					$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>'.$this->lang->line('be_crud_the_record_was_updated_successfully')); 
					$this->session->set_flashdata('alertType', 'success'); // success, info, warning, danger

redirect(base_url() . $this->path_rel . '/' . $this->rel_tabla);

				} else {
					$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4'.$this->lang->line('be_crud_the_record_could_not_be_updated').'<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
				}     
			}
		} else {
			$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_crud_no_data_was_received').'<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
		}

if ($this->rel_tabla > 0) {
	redirect(base_url() . $this->path . '/edit/' . $post['id']);
} else {
	redirect(base_url() . 'admin/cruds/proyectos');
}

	}

	public function delete () {
		$post = $this->input->post(NULL, TRUE);

$this->rel_tabla = 0;
if (isset($post["rel_tabla"])) {
	$this->rel_tabla = $post["rel_tabla"];
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
					$this->Model->delete('campos', $id);
					$this->Model->delete('campos_validaciones', '', '', array('campo' => $id));

					$result = true;
				}
				if ($result) {

//Actualizacion
$count_rows = $this->Model->records('campos', '', '', array('tabla'=>$this->rel_tabla));
$this->Model->update('tablas', array("campos" => $count_rows), $this->rel_tabla);


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

if ($this->rel_tabla > 0) {
	redirect(base_url() . $this->path_rel . '/' . $this->rel_tabla);
} else {
	redirect(base_url() . 'admin/cruds/proyectos');
}

 
	}

public function list_ssp ($rel_tabla) {
		$this->load->library('SSP');

		// DB table to use
		$table = 'campos';

		// Table's primary key
		$primaryKey = 'id';

		// Array of database columns
		$columns = array(array( 'db' => 'id', 'dt' => 0, 'field' => 'id', 'formatter' => function($d, $row) {return '<input type="checkbox" id="fila_' . $d . '" class="selection" cod="' . $d . '">';}),

array( 
	'db' => 'id', 
	'dt' => 1, 
	'field' => 'id', 
	'formatter' => function($d, $row) {
		return '<button type="button" class="btn btn-primary btn-xs btnEdit_rel" cod="' . $d . '"><span class="glyphicon glyphicon-pencil"></span></button>';}), 

			array( 'db' => 'id', 'dt' => 2, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-red btnDelete" cod="' . $d . '"><span class="glyphicon glyphicon-trash"></span></button>';}), 
			array( 'db' => 'nombre', 'dt' => 3, 'field' => 'nombre' ),
			array( 'db' => 'etiqueta', 'dt' => 4, 'field' => 'etiqueta', ),
			array( 'db' => 'comentarios', 'dt' => 5, 'field' => 'comentarios' ),
			array( 'db' => 'orden', 'dt' => 6, 'field' => 'orden' ), );

		$sql_details = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db'   => $this->db->database,
			'host' => $this->db->hostname
		);

		$joinQuery = "FROM $table";
$extraWhere = "tabla = '".$rel_tabla."'";
		$groupBy = ""; //"`u`.`datos`";
		$having = ""; //"`u`.`valor` >= 140000";

		//$_GET['tksec'] = $this->security->get_csrf_hash();  

		echo json_encode(
			SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
		);
	}

}