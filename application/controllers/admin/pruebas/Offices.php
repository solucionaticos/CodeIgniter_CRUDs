<?php
defined("BASEPATH") OR exit("No esta permitido el acceso directo a este script.");

class Offices extends MY_Controller {

	public $parameters;

	public function __construct() {
		parent::__construct();
		//$this->ctrSegAdmin();
	}

	public function index() {

//		$data = $this->Model->registros('offices', '', array() );
//		$this->parametros['datos']['lista'] = $data;	

		$this->admin_design->layout('database', $this->config->item('adminPath') . '/pruebas/offices', $this->parameters, 'Offices', $this->config->item('adminPath') . '/pruebas/offices');	
	}

	public function traerRegistro () {
		$post = $this->input->post(NULL, TRUE);
		$registro = $this->Model->registro('offices', $post['id'], 'officeCode');
		$datos = array('registro'=>$registro, 'tksec'=>$this->security->get_csrf_hash());
		echo json_encode($datos);      
	}

	public function ingresar () {
		$post = $this->input->post(NULL, TRUE);
		if (!empty($post)) {
			foreach ($post as $key => $value) {
				$post[$key] = $this->security->xss_clean($value);
			}

			$this->form_validation->set_rules('officeCode', 'office Code', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.validation_errors().'<br><b>'.$this->lang->line('be_please_try_again').'</b>');
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
			} else {
				
				$datos = array(
					"officeCode" => $post["officeCode"],
					"city" => $post["city"],
					"phone" => $post["phone"],
					"addressLine1" => $post["addressLine1"],
					"addressLine2" => $post["addressLine2"],
					"state" => $post["state"],
					"country" => $post["country"],
					"postalCode" => $post["postalCode"],
					"territory" => $post["territory"],);

				$id = $this->Model->insertar('offices', $datos);
				if ($id > 0) {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El registro se ingresó exitosamente.'); 
					$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible ingresar el registro.<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				}     
			}
		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No se recibieron datos.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
		}
		redirect(base_url() . $this->config->item('adminPath') . '/pruebas/offices');
	}

	public function guardar () {
		$post = $this->input->post(NULL, TRUE);
		if (!empty($post)) {
			foreach ($post as $key => $value) {
				$post[$key] = $this->security->xss_clean($value);
			}
      
			$this->form_validation->set_rules('officeCode', 'office Code', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.validation_errors().'<br><b>'.$this->lang->line('be_please_try_again').'</b>');
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
			} else {

				$datos = array(
					"officeCode" => $post["officeCode"],
					"city" => $post["city"],
					"phone" => $post["phone"],
					"addressLine1" => $post["addressLine1"],
					"addressLine2" => $post["addressLine2"],
					"state" => $post["state"],
					"country" => $post["country"],
					"postalCode" => $post["postalCode"],
					"territory" => $post["territory"],);

				if ($this->Model->actualizar('offices', $datos, $post['id'], 'officeCode')) {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El registro se guardo exitosamente.'); 
					$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible guardar el registro.<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				}     

			}
		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No se recibieron datos.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
		}
		redirect(base_url() . $this->config->item('adminPath') . '/pruebas/offices');   
	}

	public function eliminar () {
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
					$this->Model->eliminar('offices', $id, 'officeCode');
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
		redirect(base_url() . $this->config->item('adminPath') . '/pruebas/offices');   
	}

  
  
	public function lista () {

		$registros = $this->Model->registros('offices');
    
  	$datosJson = '
  		{	
  			"data":[';  
    $datosJsonReg = '';
    foreach ($registros as $key => $registro) {
      
          $datosJsonReg .= '["<input type=\"checkbox\" id=\"fila_'.$registro["officeCode"].'\" class=\"seleccion\" cod=\"'.$registro["officeCode"].'\">", "<button type=\"button\" class=\"btn btn-default btn-xs text-light-blue btnEditar\" cod=\"'.$registro["officeCode"].'\"><span class=\"glyphicon glyphicon-pencil\"></span></button>", "<button type=\"button\" class=\"btn btn-default btn-xs text-red btnEliminar\" cod=\"'.$registro["officeCode"].'\"><span class=\"glyphicon glyphicon-trash\"></span></button>", "'.$registro["officeCode"].'","'.$registro["city"].'","'.$registro["phone"].'","'.$registro["addressLine1"].'","'.$registro["addressLine2"].'","'.$registro["state"].'","'.$registro["country"].'","'.$registro["postalCode"].'","'.$registro["territory"].'"],';

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
		$table = 'offices';

		// Table's primary key
		$primaryKey = 'id';

		// Array of database columns
		$columns = array(array( 'db' => 'officeCode', 'dt' => 0, 'field' => 'officeCode', 'formatter' => function($d, $row) {return '<input type="checkbox" id="fila_' . $d . '" class="seleccion" cod="' . $d . '">';}),array( 'db' => 'officeCode', 'dt' => 1, 'field' => 'officeCode', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-light-blue btnEditar" cod="' . $d . '"><span class="glyphicon glyphicon-pencil"></span></button>';}), array( 'db' => 'officeCode', 'dt' => 2, 'field' => 'officeCode', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-red btnEliminar" cod="' . $d . '"><span class="glyphicon glyphicon-trash"></span></button>';}), array( 'db' => 'officeCode', 'dt' => 3, 'field' => 'officeCode' ),array( 'db' => 'city', 'dt' => 4, 'field' => 'city' ),array( 'db' => 'phone', 'dt' => 5, 'field' => 'phone' ),array( 'db' => 'addressLine1', 'dt' => 6, 'field' => 'addressLine1' ),array( 'db' => 'addressLine2', 'dt' => 7, 'field' => 'addressLine2' ),array( 'db' => 'state', 'dt' => 8, 'field' => 'state' ),array( 'db' => 'country', 'dt' => 9, 'field' => 'country' ),array( 'db' => 'postalCode', 'dt' => 10, 'field' => 'postalCode' ),array( 'db' => 'territory', 'dt' => 11, 'field' => 'territory' ),);

		$sql_details = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db'   => $this->db->database,
			'host' => $this->db->hostname
		);

		$joinQuery = "FROM offices";
		$extraWhere = ""; //"`u`.`valor` >= 90000";
		$groupBy = ""; //"`u`.`datos`";
		$having = ""; //"`u`.`valor` >= 140000";

		$_GET['tksec'] = $this->security->get_csrf_hash();  

		echo json_encode(
			SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
		);
	}

}