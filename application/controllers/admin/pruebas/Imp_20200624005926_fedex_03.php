<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Imp_20200624005926_fedex_03 extends MY_Controller {

	public $parameters;
	public $path;
	public $breadcrumb;

	public function __construct() {
		parent::__construct();
		// $this->ctrSegAdmin();
		$this->path = 'admin/pruebas/imp_20200624005926_fedex_03';
		$this->breadcrumb = '
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li class="active">Imp 20200624005926 Fedex 03</li>
		</ol>';
	}

	public function index() {
		$this->parameters['template'] = 'ssp';
		$this->parameters['type'] = 'list';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Imp 20200624005926 Fedex 03';
		$this->parameters['subtitle'] = '';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = $this->breadcrumb; 

		$this->admin_design->layout3($this->parameters);
	}

	public function new() {

		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'new';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Imp 20200624005926 Fedex 03';
		$this->parameters['subtitle'] = '';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = $this->breadcrumb;

		$this->admin_design->layout3($this->parameters);
	}

	public function edit($id) {
		$this->parameters['data']['id'] = $id;

		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'edit';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Imp 20200624005926 Fedex 03';
		$this->parameters['subtitle'] = '';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = $this->breadcrumb;

		$this->admin_design->layout3($this->parameters);
	}

	public function getRecord () {
		$post = $this->input->post(NULL, TRUE);
		$row = $this->Model->getRow('imp_20200624005926_fedex_03', $post['id']);
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
						"tracking_nbr" => $post["tracking_nbr"],
						"ship__p_u__date" => $post["ship__p_u__date"],
						"service_type" => $post["service_type"],
						"ship_co_nm" => $post["ship_co_nm"],
						"ship_city" => $post["ship_city"],
						"ship_zip" => $post["ship_zip"],
						"ship_state" => $post["ship_state"],
						"ship_country_territory" => $post["ship_country_territory"],
						"recip_co_nm" => $post["recip_co_nm"],
						"recip_addr" => $post["recip_addr"],
						"recip_city" => $post["recip_city"],
						"recip_zip" => $post["recip_zip"],
						"recip_state" => $post["recip_state"],
						"recip_country_territory" => $post["recip_country_territory"],
						"nbr_of_pcs" => $post["nbr_of_pcs"],
						"recip_addr_qty" => $post["recip_addr_qty"],
						"weight" => $post["weight"],
						"dim_wgt" => $post["dim_wgt"],
						"reference" => $post["reference"],
						"p_o__nbr" => $post["p_o__nbr"],
						"invoice_nbr" => $post["invoice_nbr"],
						"department_nbr" => $post["department_nbr"],
						"shipment_id_nbr" => $post["shipment_id_nbr"],
						"status" => $post["status"],
						"cntrymanufact1" => $post["cntrymanufact1"],
						"cntrymanufact2" => $post["cntrymanufact2"],
						"cntrymanufact3" => $post["cntrymanufact3"],
						"cntrymanufact4" => $post["cntrymanufact4"],
						"harmonizedcd1" => $post["harmonizedcd1"],
						"harmonizedcd2" => $post["harmonizedcd2"],
						"harmonizedcd3" => $post["harmonizedcd3"],
						"harmonizedcd4" => $post["harmonizedcd4"],
						"spechandling1" => $post["spechandling1"],
						"spechandling2" => $post["spechandling2"],
						"spechandling3" => $post["spechandling3"],
						"spechandling4" => $post["spechandling4"],
						"child_tracking_nbr" => $post["child_tracking_nbr"],
						"child_status" => $post["child_status"],
						"child_customer_nbr" => $post["child_customer_nbr"],
						"child_recip_co_nm" => $post["child_recip_co_nm"],
						"child_recip_city" => $post["child_recip_city"],
						"child_recip_address" => $post["child_recip_address"],
						"child_recip_country" => $post["child_recip_country"],
						"child_recip_state" => $post["child_recip_state"],
						"child_recip_zip" => $post["child_recip_zip"],
						"child_serv_type" => $post["child_serv_type"],
						"child_spechandling1" => $post["child_spechandling1"],
						"child_spechandling2" => $post["child_spechandling2"],
						"child_spechandling3" => $post["child_spechandling3"],
						"child_spechandling4" => $post["child_spechandling4"],
						"orig_pcctver" => $post["orig_pcctver"],
						"dest_pcctver" => $post["dest_pcctver"],
						"status_add_l_info" => $post["status_add_l_info"],
						"tcn" => $post["tcn"],
						"bill_of_lading_nbr" => $post["bill_of_lading_nbr"],
						"partner_carrier_nbr" => $post["partner_carrier_nbr"],
						"rma" => $post["rma"],
						"shipper_reference" => $post["shipper_reference"],
						"appointment_delivery" => $post["appointment_delivery"],
						"opco_flag" => $post["opco_flag"],
						"return_authoriz_nm" => $post["return_authoriz_nm"],
						"return_tracking_nbr" => $post["return_tracking_nbr"],
						"cod_remit_nbr" => $post["cod_remit_nbr"],);
				$id = $this->Model->insert('imp_20200624005926_fedex_03', $data);
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
						"tracking_nbr" => $post["tracking_nbr"],
						"ship__p_u__date" => $post["ship__p_u__date"],
						"service_type" => $post["service_type"],
						"ship_co_nm" => $post["ship_co_nm"],
						"ship_city" => $post["ship_city"],
						"ship_zip" => $post["ship_zip"],
						"ship_state" => $post["ship_state"],
						"ship_country_territory" => $post["ship_country_territory"],
						"recip_co_nm" => $post["recip_co_nm"],
						"recip_addr" => $post["recip_addr"],
						"recip_city" => $post["recip_city"],
						"recip_zip" => $post["recip_zip"],
						"recip_state" => $post["recip_state"],
						"recip_country_territory" => $post["recip_country_territory"],
						"nbr_of_pcs" => $post["nbr_of_pcs"],
						"recip_addr_qty" => $post["recip_addr_qty"],
						"weight" => $post["weight"],
						"dim_wgt" => $post["dim_wgt"],
						"reference" => $post["reference"],
						"p_o__nbr" => $post["p_o__nbr"],
						"invoice_nbr" => $post["invoice_nbr"],
						"department_nbr" => $post["department_nbr"],
						"shipment_id_nbr" => $post["shipment_id_nbr"],
						"status" => $post["status"],
						"cntrymanufact1" => $post["cntrymanufact1"],
						"cntrymanufact2" => $post["cntrymanufact2"],
						"cntrymanufact3" => $post["cntrymanufact3"],
						"cntrymanufact4" => $post["cntrymanufact4"],
						"harmonizedcd1" => $post["harmonizedcd1"],
						"harmonizedcd2" => $post["harmonizedcd2"],
						"harmonizedcd3" => $post["harmonizedcd3"],
						"harmonizedcd4" => $post["harmonizedcd4"],
						"spechandling1" => $post["spechandling1"],
						"spechandling2" => $post["spechandling2"],
						"spechandling3" => $post["spechandling3"],
						"spechandling4" => $post["spechandling4"],
						"child_tracking_nbr" => $post["child_tracking_nbr"],
						"child_status" => $post["child_status"],
						"child_customer_nbr" => $post["child_customer_nbr"],
						"child_recip_co_nm" => $post["child_recip_co_nm"],
						"child_recip_city" => $post["child_recip_city"],
						"child_recip_address" => $post["child_recip_address"],
						"child_recip_country" => $post["child_recip_country"],
						"child_recip_state" => $post["child_recip_state"],
						"child_recip_zip" => $post["child_recip_zip"],
						"child_serv_type" => $post["child_serv_type"],
						"child_spechandling1" => $post["child_spechandling1"],
						"child_spechandling2" => $post["child_spechandling2"],
						"child_spechandling3" => $post["child_spechandling3"],
						"child_spechandling4" => $post["child_spechandling4"],
						"orig_pcctver" => $post["orig_pcctver"],
						"dest_pcctver" => $post["dest_pcctver"],
						"status_add_l_info" => $post["status_add_l_info"],
						"tcn" => $post["tcn"],
						"bill_of_lading_nbr" => $post["bill_of_lading_nbr"],
						"partner_carrier_nbr" => $post["partner_carrier_nbr"],
						"rma" => $post["rma"],
						"shipper_reference" => $post["shipper_reference"],
						"appointment_delivery" => $post["appointment_delivery"],
						"opco_flag" => $post["opco_flag"],
						"return_authoriz_nm" => $post["return_authoriz_nm"],
						"return_tracking_nbr" => $post["return_tracking_nbr"],
						"cod_remit_nbr" => $post["cod_remit_nbr"],);
				if ($this->Model->update('imp_20200624005926_fedex_03', $data, $post['id'])) {
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
					$this->Model->delete('imp_20200624005926_fedex_03', $id);
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
		$table = 'imp_20200624005926_fedex_03';

		// Table's primary key
		$primaryKey = 'id';

		// Array of database columns
		$columns = array(array( 'db' => 'id', 'dt' => 0, 'field' => 'id', 'formatter' => function($d, $row) {return '<input type="checkbox" id="fila_' . $d . '" class="selection" cod="' . $d . '">';}),array( 'db' => 'id', 'dt' => 1, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-primary btn-xs btnEdit" cod="' . $d . '"><span class="glyphicon glyphicon-pencil"></span></button>';}), array( 'db' => 'id', 'dt' => 2, 'field' => 'id', 'formatter' => function($d, $row) {return '<button type="button" class="btn btn-default btn-xs text-red btnDelete" cod="' . $d . '"><span class="glyphicon glyphicon-trash"></span></button>';}), array( 'db' => 'tracking_nbr', 'dt' => 3, 'field' => 'tracking_nbr' ),array( 'db' => 'ship__p_u__date', 'dt' => 4, 'field' => 'ship__p_u__date' ),array( 'db' => 'service_type', 'dt' => 5, 'field' => 'service_type' ),array( 'db' => 'ship_co_nm', 'dt' => 6, 'field' => 'ship_co_nm' ),array( 'db' => 'ship_city', 'dt' => 7, 'field' => 'ship_city' ),array( 'db' => 'ship_zip', 'dt' => 8, 'field' => 'ship_zip' ),);

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