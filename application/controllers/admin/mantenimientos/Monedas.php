<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monedas extends MY_Controller {

    public function __construct() {
        parent::__construct();
				$this->ctrSegAdmin();
				if ($this->session->userdata($this->config->item('raiz') . 'be_usuario_id') > 1) redirect($this->config->item('adminPath') . '/informacion');
				$this->load->library('grocery_CRUD');
    }
	
    public function index() {
        $crud = new grocery_CRUD();
				$crud->set_language($this->session->userdata($this->config->item('raiz') . 'be_lang_value'));
        $crud->set_table($this->config->item('raiz_bd') . 'monedas');
      
				$crud->set_relation('mostrar', $this->config->item('raiz_bd') . 'datos_valores', 'nombre', 'dato = (SELECT id FROM ' . $this->config->item('raiz_bd') . 'datos WHERE codigo = "si_no")', 'nombre ASC');
      
        $crudTabla = $crud->render();
        $this->crudver($crudTabla, 'Datos');
    }	

}