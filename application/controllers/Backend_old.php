<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_old extends MY_Controller {

	public $parameters;

	public function index()
	{

		$data_design = $this->admin_design->vars();

		$this->parameters['head_title'] = 'Login';

		$this->parameters['path_template_admin'] = $data_design['path_template_admin'];
		$this->parameters['version'] = $data_design['version'];
		$this->parameters['Y'] = $data_design['Y'];
		$this->parameters['projectUrl'] = $data_design['projectUrl'];
		$this->parameters['projectName'] = $data_design['projectName'];
		
		$this->admin_design->layout('login', $this->config->item('pathViewTemplateAdmin') . 'login', $this->parameters);

	}
	
}
