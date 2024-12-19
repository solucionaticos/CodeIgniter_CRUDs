<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Pais extends MY_Controller {

	public $parameters;

	public function __construct() {
		parent::__construct();
		// $this->ctrSegAdmin();
	}

	public function index() {
		$this->parameters['plantilla'] = 'datatables';
		$this->parameters['vista'] = $this->config->item('adminPath') . '/database2/pais';
		$this->parameters['datos']['titulo'] = 'Pais';
		$this->parameters['datos']['subtitulo'] = ''; 

		$this->admin_design->layout('ssp', $this->config->item('adminPath') . '/database2/pais', $this->parameters, 'Pais');
	}


	public function lista () {

		$registros = $this->Model->registros('pais');
    
  	$datosJson = '
  		{	
  			"data":[';  
    $datosJsonReg = '';
    foreach ($registros as $key => $registro) {



          $datosJsonReg .= '["<input type=\"checkbox\" id=\"fila_'.$registro["id"].'\" class=\"seleccion\" cod=\"'.$registro["id"].'\">", "<button type=\"button\" class=\"btn btn-default btn-xs text-light-blue btnEditar\" cod=\"'.$registro["id"].'\"><span class=\"glyphicon glyphicon-pencil\"></span></button>", "<button type=\"button\" class=\"btn btn-default btn-xs text-red btnEliminar\" cod=\"'.$registro["id"].'\"><span class=\"glyphicon glyphicon-trash\"></span></button>", "'.$registro["nombre"].'","'.$registro["abrev"].'"],';

    }
    if ($datosJsonReg != '') {
          $datosJson .= substr($datosJsonReg, 0, -1);
    }
		
		$datosJson .= ']
		}';

		echo $datosJson;
    
	}
      
  
	public function lista_ssp () {
		$this->load->library('SSP');

		// DB table to use
		$table = 'pais';

		// Table's primary key
		$primaryKey = 'id';

		// Array of database columns
		$columns = array(array( 'db' => 'id', 'dt' => 0, 'field' => 'id', 'formatter' => function($d, $row) {return '<input type="checkbox" id="fila_' . $d . '" class="seleccion" cod="' . $d . '">';}),array( 'db' => 'id', 'dt' => 1, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-light-blue btnEditar" cod="' . $d . '"><span class="glyphicon glyphicon-pencil"></span></button>';}), array( 'db' => 'id', 'dt' => 2, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-red btnEliminar" cod="' . $d . '"><span class="glyphicon glyphicon-trash"></span></button>';}), array( 'db' => 'nombre', 'dt' => 3, 'field' => 'nombre' ),array( 'db' => 'abrev', 'dt' => 4, 'field' => 'abrev' ),);

		$sql_details = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db'   => $this->db->database,
			'host' => $this->db->hostname
		);

		$joinQuery = "FROM pais";
		$extraWhere = ""; //"`u`.`valor` >= 90000";
		$groupBy = ""; //"`u`.`datos`";
		$having = ""; //"`u`.`valor` >= 140000";

		$_GET['tksec'] = $this->security->get_csrf_hash();  

		echo json_encode(
			SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
		);
	}

}