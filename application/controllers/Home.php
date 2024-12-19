<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	public function index()
	{
		$this->load->view('home');
	}

	public function index1() {
		redirect($this->config->item('adminPath') . '/index1');
	}

}
