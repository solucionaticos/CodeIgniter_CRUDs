<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Cruds_detalles extends MY_Controller {

	public $parameters;

	public function __construct() {
		parent::__construct();
		// $this->ctrSegAdmin();
	}

	public function index() {
		$this->parameters['template'] = 'ssp';
		$this->parameters['type'] = 'list';
		$this->parameters['path'] = 'backend/cruds_detalles';
		$this->parameters['title'] = 'Cruds Detalles';
		$this->parameters['subtitle'] = '';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = '
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li class="active">Cruds Detalles</li>
		</ol>'; 

		$this->admin_design->layout2($this->parameters);
	}

	public function new() {


		$tabla_proyectos = $this->Model->registros("proyectos", "id,nombre nombre", array(), "nombre" );
		$this->parameters["data"]["tabla_proyectos"] = $tabla_proyectos;
		$tabla_versiones = $this->Model->registros("versiones", "id,nombre nombre", array(), "nombre" );
		$this->parameters["data"]["tabla_versiones"] = $tabla_versiones;
		$tabla_cruds = $this->Model->registros("cruds", "id,script nombre", array(), "script" );
		$this->parameters["data"]["tabla_cruds"] = $tabla_cruds;
		$tabla_tablas = $this->Model->registros("tablas", "id,nombre nombre", array(), "nombre" );
		$this->parameters["data"]["tabla_tablas"] = $tabla_tablas;
		$tabla_campos = $this->Model->registros("campos", "id,nombre nombre", array(), "nombre" );
		$this->parameters["data"]["tabla_campos"] = $tabla_campos;
$tabla_datos_valores_si_no = $this->Model->registros("datos_valores", "id, nombre", array("dato"=>3), "nombre ASC" );
$this->parameters["data"]["tabla_datos_valores_si_no"] = $tabla_datos_valores_si_no;
$tabla_datos_valores_si_no = $this->Model->registros("datos_valores", "id, nombre", array("dato"=>3), "nombre ASC" );
$this->parameters["data"]["tabla_datos_valores_si_no"] = $tabla_datos_valores_si_no;
$tabla_datos_valores_si_no = $this->Model->registros("datos_valores", "id, nombre", array("dato"=>3), "nombre ASC" );
$this->parameters["data"]["tabla_datos_valores_si_no"] = $tabla_datos_valores_si_no;
$tabla_datos_valores_si_no = $this->Model->registros("datos_valores", "id, nombre", array("dato"=>3), "nombre ASC" );
$this->parameters["data"]["tabla_datos_valores_si_no"] = $tabla_datos_valores_si_no;
$tabla_datos_valores_si_no = $this->Model->registros("datos_valores", "id, nombre", array("dato"=>3), "nombre ASC" );
$this->parameters["data"]["tabla_datos_valores_si_no"] = $tabla_datos_valores_si_no;
$tabla_datos_valores_si_no = $this->Model->registros("datos_valores", "id, nombre", array("dato"=>3), "nombre ASC" );
$this->parameters["data"]["tabla_datos_valores_si_no"] = $tabla_datos_valores_si_no;

		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'new';
		$this->parameters['path'] = 'backend/cruds_detalles';
		$this->parameters['title'] = 'Cruds Detalles';
		$this->parameters['subtitle'] = 'New';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = '
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li class="active">Cruds Detalles</li>
		</ol>'; 

		$this->admin_design->layout2($this->parameters);

	}

	public function edit($id) {
		$this->parameters['data']['id'] = $id;


		$tabla_proyectos = $this->Model->registros("proyectos", "id,nombre nombre", array(), "nombre" );
		$this->parameters["data"]["tabla_proyectos"] = $tabla_proyectos;
		$tabla_versiones = $this->Model->registros("versiones", "id,nombre nombre", array(), "nombre" );
		$this->parameters["data"]["tabla_versiones"] = $tabla_versiones;
		$tabla_cruds = $this->Model->registros("cruds", "id,script nombre", array(), "script" );
		$this->parameters["data"]["tabla_cruds"] = $tabla_cruds;
		$tabla_tablas = $this->Model->registros("tablas", "id,nombre nombre", array(), "nombre" );
		$this->parameters["data"]["tabla_tablas"] = $tabla_tablas;
		$tabla_campos = $this->Model->registros("campos", "id,nombre nombre", array(), "nombre" );
		$this->parameters["data"]["tabla_campos"] = $tabla_campos;
$tabla_datos_valores_si_no = $this->Model->registros("datos_valores", "id, nombre", array("dato"=>3), "nombre ASC" );
$this->parameters["data"]["tabla_datos_valores_si_no"] = $tabla_datos_valores_si_no;
$tabla_datos_valores_si_no = $this->Model->registros("datos_valores", "id, nombre", array("dato"=>3), "nombre ASC" );
$this->parameters["data"]["tabla_datos_valores_si_no"] = $tabla_datos_valores_si_no;
$tabla_datos_valores_si_no = $this->Model->registros("datos_valores", "id, nombre", array("dato"=>3), "nombre ASC" );
$this->parameters["data"]["tabla_datos_valores_si_no"] = $tabla_datos_valores_si_no;
$tabla_datos_valores_si_no = $this->Model->registros("datos_valores", "id, nombre", array("dato"=>3), "nombre ASC" );
$this->parameters["data"]["tabla_datos_valores_si_no"] = $tabla_datos_valores_si_no;
$tabla_datos_valores_si_no = $this->Model->registros("datos_valores", "id, nombre", array("dato"=>3), "nombre ASC" );
$this->parameters["data"]["tabla_datos_valores_si_no"] = $tabla_datos_valores_si_no;
$tabla_datos_valores_si_no = $this->Model->registros("datos_valores", "id, nombre", array("dato"=>3), "nombre ASC" );
$this->parameters["data"]["tabla_datos_valores_si_no"] = $tabla_datos_valores_si_no;

		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'edit';
		$this->parameters['path'] = 'backend/cruds_detalles';
		$this->parameters['title'] = 'Cruds Detalles';
		$this->parameters['subtitle'] = 'Edit';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = '
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Cruds Detalles</li>
		</ol>'; 

		$this->admin_design->layout2($this->parameters);

	}

	public function getRecord () {
		$post = $this->input->post(NULL, TRUE);
		$registro = $this->Model->registro('cruds_detalles', $post['id']);
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
						"crud" => $post["crud"],
						"tabla" => $post["tabla"],
						"campo" => $post["campo"],
						"lista" => $post["lista"],
						"nuevo" => $post["nuevo"],
						"editar" => $post["editar"],
						"ver" => $post["ver"],
						"exportar" => $post["exportar"],
						"imprimir" => $post["imprimir"],);

				$id = $this->Model->insertar('cruds_detalles', $datos);
				if ($id > 0) {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El registro se ingresó exitosamente.'); 
					$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
					redirect(base_url() . 'backend/cruds_detalles');
				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible ingresar el registro.<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				}     
			}

		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No se recibieron datos.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
		}
		redirect(base_url() . 'backend/cruds_detalles/new');
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
						"crud" => $post["crud"],
						"tabla" => $post["tabla"],
						"campo" => $post["campo"],
						"lista" => $post["lista"],
						"nuevo" => $post["nuevo"],
						"editar" => $post["editar"],
						"ver" => $post["ver"],
						"exportar" => $post["exportar"],
						"imprimir" => $post["imprimir"],);

				if ($this->Model->actualizar('cruds_detalles', $datos, $post['id'])) {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El registro se guardo exitosamente.'); 
					$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
					redirect(base_url() . 'backend/cruds_detalles');
				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible guardar el registro.<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				}     

			}
		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No se recibieron datos.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
		}
		redirect(base_url() . 'backend/cruds_detalles/edit/'.$post['id']);   
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
					$this->Model->eliminar('cruds_detalles', $id);
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
		redirect(base_url() . 'backend/cruds_detalles');   
	}

  
	public function list () {

		$registros = $this->Model->registros('cruds_detalles');
    
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

          $crud = $this->Model->registro("cruds", $registro["crud"]);
          if ($crud) {
             $registro["crud"] = $crud->script;
          } 

          $tabla = $this->Model->registro("tablas", $registro["tabla"]);
          if ($tabla) {
             $registro["tabla"] = $tabla->nombre;
          } 

          $campo = $this->Model->registro("campos", $registro["campo"]);
          if ($campo) {
             $registro["campo"] = $campo->nombre;
          } 

          $lista = $this->Model->registro("datos_valores", $registro["lista"]);
          if ($lista) {
             $registro["lista"] = $lista->nombre;
          } 

          $nuevo = $this->Model->registro("datos_valores", $registro["nuevo"]);
          if ($nuevo) {
             $registro["nuevo"] = $nuevo->nombre;
          } 

          $editar = $this->Model->registro("datos_valores", $registro["editar"]);
          if ($editar) {
             $registro["editar"] = $editar->nombre;
          } 

          $ver = $this->Model->registro("datos_valores", $registro["ver"]);
          if ($ver) {
             $registro["ver"] = $ver->nombre;
          } 

          $exportar = $this->Model->registro("datos_valores", $registro["exportar"]);
          if ($exportar) {
             $registro["exportar"] = $exportar->nombre;
          } 

          $imprimir = $this->Model->registro("datos_valores", $registro["imprimir"]);
          if ($imprimir) {
             $registro["imprimir"] = $imprimir->nombre;
          } 


			$datosJsonReg .= '["<input type=\"checkbox\" id=\"fila_'.$registro["id"].'\" class=\"seleccion\" cod=\"'.$registro["id"].'\">", "<button type=\"button\" class=\"btn btn-default btn-xs text-light-blue btnEditar\" cod=\"'.$registro["id"].'\"><span class=\"glyphicon glyphicon-pencil\"></span></button>", "<button type=\"button\" class=\"btn btn-default btn-xs text-red btnEliminar\" cod=\"'.$registro["id"].'\"><span class=\"glyphicon glyphicon-trash\"></span></button>", "'.$registro["usuario"].'","'.$registro["proyecto"].'","'.$registro["version"].'","'.$registro["crud"].'","'.$registro["tabla"].'","'.$registro["campo"].'","'.$registro["lista"].'","'.$registro["nuevo"].'","'.$registro["editar"].'","'.$registro["ver"].'","'.$registro["exportar"].'","'.$registro["imprimir"].'"],';

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
		$table = 'cruds_detalles';

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
							 ),array( 'db' => 'crud', 'dt' => 6, 'field' => 'crud',
				"formatter" => function($d, $row) {
									$crud_name = "";
									$crud_data = $this->Model->registro("cruds", $d);
									if ($crud_data) {
										$crud_name = $crud_data->script;
									} 
									return $crud_name;
								}
							 ),array( 'db' => 'tabla', 'dt' => 7, 'field' => 'tabla',
				"formatter" => function($d, $row) {
									$tabla_name = "";
									$tabla_data = $this->Model->registro("tablas", $d);
									if ($tabla_data) {
										$tabla_name = $tabla_data->nombre;
									} 
									return $tabla_name;
								}
							 ),array( 'db' => 'campo', 'dt' => 8, 'field' => 'campo',
				"formatter" => function($d, $row) {
									$campo_name = "";
									$campo_data = $this->Model->registro("campos", $d);
									if ($campo_data) {
										$campo_name = $campo_data->nombre;
									} 
									return $campo_name;
								}
							 ),array( 'db' => 'lista', 'dt' => 9, 'field' => 'lista',
				"formatter" => function($d, $row) {
									$lista_name = "";
									$lista_data = $this->Model->registro("datos_valores", $d);
									if ($lista_data) {
										$lista_name = $lista_data->nombre;
									} 
									return $lista_name;
								}
							 ),array( 'db' => 'nuevo', 'dt' => 10, 'field' => 'nuevo',
				"formatter" => function($d, $row) {
									$nuevo_name = "";
									$nuevo_data = $this->Model->registro("datos_valores", $d);
									if ($nuevo_data) {
										$nuevo_name = $nuevo_data->nombre;
									} 
									return $nuevo_name;
								}
							 ),array( 'db' => 'editar', 'dt' => 11, 'field' => 'editar',
				"formatter" => function($d, $row) {
									$editar_name = "";
									$editar_data = $this->Model->registro("datos_valores", $d);
									if ($editar_data) {
										$editar_name = $editar_data->nombre;
									} 
									return $editar_name;
								}
							 ),array( 'db' => 'ver', 'dt' => 12, 'field' => 'ver',
				"formatter" => function($d, $row) {
									$ver_name = "";
									$ver_data = $this->Model->registro("datos_valores", $d);
									if ($ver_data) {
										$ver_name = $ver_data->nombre;
									} 
									return $ver_name;
								}
							 ),array( 'db' => 'exportar', 'dt' => 13, 'field' => 'exportar',
				"formatter" => function($d, $row) {
									$exportar_name = "";
									$exportar_data = $this->Model->registro("datos_valores", $d);
									if ($exportar_data) {
										$exportar_name = $exportar_data->nombre;
									} 
									return $exportar_name;
								}
							 ),array( 'db' => 'imprimir', 'dt' => 14, 'field' => 'imprimir',
				"formatter" => function($d, $row) {
									$imprimir_name = "";
									$imprimir_data = $this->Model->registro("datos_valores", $d);
									if ($imprimir_data) {
										$imprimir_name = $imprimir_data->nombre;
									} 
									return $imprimir_name;
								}
							 ),);

		$sql_details = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db'   => $this->db->database,
			'host' => $this->db->hostname
		);


// 752 -> Campos

		$joinQuery = "FROM $table";
		$extraWhere = "crud = 752"; //"`u`.`valor` >= 90000";
		$groupBy = ""; //"`u`.`datos`";
		$having = ""; //"`u`.`valor` >= 140000";

		//$_GET['tksec'] = $this->security->get_csrf_hash();  

		echo json_encode(
			SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
		);
	}

}