<?php
defined("BASEPATH") OR exit("Direct access to this script is not allowed.");
/**
 * @author: Solucionaticos.com
 * @name: Projects
 * @version: 1.0
 * @date: 2019-08-28 21:10:27 
 * */

class Links extends MY_Controller {

    //-- Construct --------
    public function __construct() {
        parent::__construct();
        $this->ctrSegAdmin(); // Administrative Security Control
        // $this->load->library("grocery_CRUD"); // GroceryCrud library
    }

    public function index() {

		$data = array(
			'class_header' => 'nav_header_home',
			'value_header' => 'nav-link-active',
			'class_footer' => 'nav_footer_home',
			'value_footer' => 'active'
		);

		// Views
		$this->admin_design->_load_layout($this->config->item('adminPath') . '/links/links', $data);

    }

}