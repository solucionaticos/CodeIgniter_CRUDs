<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Tablas extends MY_Controller {

	public $parameters;

	public function __construct() {
		parent::__construct();
		// $this->ctrSegAdmin();
	}

	public function index() {
		$this->parameters['template'] = 'ssp';
		$this->parameters['type'] = 'list';
		$this->parameters['path'] = 'backend/tablas';
		$this->parameters['title'] = 'Tablas';
		$this->parameters['subtitle'] = '';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = '
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li class="active">Tablas</li>
		</ol>'; 

		$this->admin_design->layout2($this->parameters);
	}

	public function new() {


		$tabla_proyectos = $this->Model->registros("proyectos", "id,nombre nombre", array(), "nombre" );
		$this->parameters["data"]["tabla_proyectos"] = $tabla_proyectos;
		$tabla_versiones = $this->Model->registros("versiones", "id,nombre nombre", array(), "nombre" );
		$this->parameters["data"]["tabla_versiones"] = $tabla_versiones;

		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'new';
		$this->parameters['path'] = 'backend/tablas';
		$this->parameters['title'] = 'Tablas';
		$this->parameters['subtitle'] = 'New';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = '
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li class="active">Tablas</li>
		</ol>'; 

		$this->admin_design->layout2($this->parameters);

	}

	public function edit($id) {
		$this->parameters['data']['id'] = $id;


		$tabla_proyectos = $this->Model->registros("proyectos", "id,nombre nombre", array(), "nombre" );
		$this->parameters["data"]["tabla_proyectos"] = $tabla_proyectos;
		$tabla_versiones = $this->Model->registros("versiones", "id,nombre nombre", array(), "nombre" );
		$this->parameters["data"]["tabla_versiones"] = $tabla_versiones;

		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'edit';
		$this->parameters['path'] = 'backend/tablas';
		$this->parameters['title'] = 'Tablas';
		$this->parameters['subtitle'] = 'Edit';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = '
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Tablas</li>
		</ol>'; 

		$this->admin_design->layout2($this->parameters);

	}

	public function getRecord () {
		$post = $this->input->post(NULL, TRUE);
		$registro = $this->Model->registro('tablas', $post['id']);
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
      
			$this->form_validation->set_rules('id', 'ID', 'xss_clean');


			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.validation_errors().'<br><b>'.$this->lang->line('be_please_try_again').'</b>');
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				
			} else {
        
				
        
				
				$datos = array(
						"usuario" => $post["usuario"],
						"proyecto" => $post["proyecto"],
						"version" => $post["version"],
						"nombre" => $post["nombre"],
						"etiqueta" => $post["etiqueta"],
						"comentarios" => $post["comentarios"],
						"antes_insertar" => $post["antes_insertar"],
						"antes_actualizar" => $post["antes_actualizar"],
						"antes_eliminar" => $post["antes_eliminar"],
						"despues_insertar" => $post["despues_insertar"],
						"despues_actualizar" => $post["despues_actualizar"],
						"despues_eliminar" => $post["despues_eliminar"],);

				$id = $this->Model->insertar('tablas', $datos);
				if ($id > 0) {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El registro se ingresó exitosamente.'); 
					$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
					redirect(base_url() . 'backend/tablas');
				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible ingresar el registro.<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				}     
			}

		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No se recibieron datos.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
		}
		redirect(base_url() . 'backend/tablas/new');
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
        
				
        
				
				$datos = array(
						"usuario" => $post["usuario"],
						"proyecto" => $post["proyecto"],
						"version" => $post["version"],
						"nombre" => $post["nombre"],
						"etiqueta" => $post["etiqueta"],
						"comentarios" => $post["comentarios"],
						"antes_insertar" => $post["antes_insertar"],
						"antes_actualizar" => $post["antes_actualizar"],
						"antes_eliminar" => $post["antes_eliminar"],
						"despues_insertar" => $post["despues_insertar"],
						"despues_actualizar" => $post["despues_actualizar"],
						"despues_eliminar" => $post["despues_eliminar"],);

				if ($this->Model->actualizar('tablas', $datos, $post['id'])) {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El registro se guardo exitosamente.'); 
					$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
					redirect(base_url() . 'backend/tablas');
				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible guardar el registro.<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				}     

			}
		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No se recibieron datos.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
		}
		redirect(base_url() . 'backend/tablas/edit/'.$post['id']);   
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
					$this->Model->eliminar('tablas', $id);
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
		redirect(base_url() . 'backend/tablas');   
	}

  
	public function list () {

		$registros = $this->Model->registros('tablas');
    
	  	$datosJson = '
	  		{	
	  			"data":[';  
	    $datosJsonReg = '';
	    foreach ($registros as $key => $registro) {

			
          $proyecto = $this->Model->registro("proyectos", $registro["proyecto"]);
          if ($proyecto) {
             $registro["proyecto"] = $proyecto->nombre;
          } 

          $version = $this->Model->registro("versiones", $registro["version"]);
          if ($version) {
             $registro["version"] = $version->nombre;
          } 


			$datosJsonReg .= '["<input type=\"checkbox\" id=\"fila_'.$registro["id"].'\" class=\"seleccion\" cod=\"'.$registro["id"].'\">", "<button type=\"button\" class=\"btn btn-default btn-xs text-light-blue btnEditar\" cod=\"'.$registro["id"].'\"><span class=\"glyphicon glyphicon-pencil\"></span></button>", "<button type=\"button\" class=\"btn btn-default btn-xs text-red btnEliminar\" cod=\"'.$registro["id"].'\"><span class=\"glyphicon glyphicon-trash\"></span></button>", "'.$registro["usuario"].'","'.$registro["proyecto"].'","'.$registro["version"].'","'.$registro["nombre"].'","'.$registro["etiqueta"].'","'.$registro["comentarios"].'","'.$registro["antes_insertar"].'","'.$registro["antes_actualizar"].'","'.$registro["antes_eliminar"].'","'.$registro["despues_insertar"].'","'.$registro["despues_actualizar"].'","'.$registro["despues_eliminar"].'"],';

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
		$table = 'tablas';

		// Table's primary key
		$primaryKey = 'id';

		// Array of database columns
		$columns = array(array( 'db' => 'id', 'dt' => 0, 'field' => 'id', 'formatter' => function($d, $row) {return '<input type="checkbox" id="fila_' . $d . '" class="seleccion" cod="' . $d . '">';}),array( 'db' => 'id', 'dt' => 1, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-light-blue btnEditar" cod="' . $d . '"><span class="glyphicon glyphicon-pencil"></span></button>';}), array( 'db' => 'id', 'dt' => 2, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-red btnEliminar" cod="' . $d . '"><span class="glyphicon glyphicon-trash"></span></button>';}), array( 'db' => 'usuario', 'dt' => 3, 'field' => 'usuario' ),array( 'db' => 'proyecto', 'dt' => 4, 'field' => 'proyecto',
				"formatter" => function($d, $row) {
									$proyecto_name = "";
									$proyecto_data = $this->Model->registro("proyectos", $d);
									if ($proyecto_data) {
										$proyecto_name = $proyecto_data->nombre;
									} 
									return $proyecto_name;
								}
							 ),array( 'db' => 'version', 'dt' => 5, 'field' => 'version',
				"formatter" => function($d, $row) {
									$version_name = "";
									$version_data = $this->Model->registro("versiones", $d);
									if ($version_data) {
										$version_name = $version_data->nombre;
									} 
									return $version_name;
								}
							 ),array( 'db' => 'nombre', 'dt' => 6, 'field' => 'nombre' ),array( 'db' => 'etiqueta', 'dt' => 7, 'field' => 'etiqueta' ),array( 'db' => 'comentarios', 'dt' => 8, 'field' => 'comentarios' ),array( 'db' => 'antes_insertar', 'dt' => 9, 'field' => 'antes_insertar' ),array( 'db' => 'antes_actualizar', 'dt' => 10, 'field' => 'antes_actualizar' ),array( 'db' => 'antes_eliminar', 'dt' => 11, 'field' => 'antes_eliminar' ),array( 'db' => 'despues_insertar', 'dt' => 12, 'field' => 'despues_insertar' ),array( 'db' => 'despues_actualizar', 'dt' => 13, 'field' => 'despues_actualizar' ),array( 'db' => 'despues_eliminar', 'dt' => 14, 'field' => 'despues_eliminar' ),);

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