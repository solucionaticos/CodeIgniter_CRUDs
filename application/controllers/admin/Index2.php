<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index2 extends MY_Controller {

	public $parameters;

	public function index()
	{
		$data_design = $this->admin_design->vars();

		$this->parameters['head_title'] = 'Dashboard 2';

		$this->parameters['path_template_admin'] = $data_design['path_template_admin'];
		$this->parameters['version'] = $data_design['version'];
		$this->parameters['Y'] = $data_design['Y'];
		$this->parameters['projectUrl'] = $data_design['projectUrl'];
		$this->parameters['projectName'] = $data_design['projectName'];

		$htmls = $this->admin_design->htmls($this->parameters);

		$this->parameters['footer'] = $htmls['footer'];
		$this->parameters['menuMain'] = $htmls['menuMain'];
		$this->parameters['menuTop'] = $htmls['menuTop'];
		$this->parameters['navMessages'] = $htmls['navMessages'];
		$this->parameters['navNotifications'] = $htmls['navNotifications'];
		$this->parameters['navTasks'] = $htmls['navTasks'];
		$this->parameters['searchForm'] = $htmls['searchForm'];

		$this->admin_design->layout('index2', $this->config->item('pathViewTemplateAdmin') . 'index2', $this->parameters);

	}
}
