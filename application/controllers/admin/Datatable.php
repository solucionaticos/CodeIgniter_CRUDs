<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends CI_Controller {

	public $parameters;

	public function index()
	{
		$data_design = $this->admin_design->vars();

		$this->parameters['head_title'] = 'Database';

		$this->parameters['path_template_admin'] = base_url() . $this->config->item('pathAssetsTemplateAdmin');
		$this->parameters['version'] = $this->config->item('version');
		$this->parameters['Y'] = $this->config->item('Y');
		$this->parameters['projectUrl'] = $this->config->item('projectUrl');
		$this->parameters['projectName'] = $this->config->item('projectName');

		$htmls = $this->admin_design->htmls($this->parameters);

		$this->parameters['footer'] = $htmls['footer'];
		$this->parameters['menuMain'] = $htmls['menuMain'];
		$this->parameters['menuTop'] = $htmls['menuTop'];
		$this->parameters['navMessages'] = $htmls['navMessages'];
		$this->parameters['navNotifications'] = $htmls['navNotifications'];
		$this->parameters['navTasks'] = $htmls['navTasks'];
		$this->parameters['searchForm'] = $htmls['searchForm'];

		$this->admin_design->layout('database', $this->config->item('pathViewTemplateAdmin') . 'database', $this->parameters);

	}
}
