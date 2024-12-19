<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Languages extends MY_Controller {

    public function __construct() {
        parent::__construct();
				$this->ctrSegAdmin();
				if ($this->session->userdata($this->config->item('raiz') . 'be_usuario_id') > 1) redirect($this->config->item('adminPath') . '/informacion');
				$this->load->library('grocery_CRUD');
    }

    public function index() {
        $crud = new grocery_CRUD();
		$crud->set_language($this->session->userdata($this->config->item('raiz') . 'be_lang_value'));
			
        $crud->set_table($this->config->item('raiz_bd') . 'languages');
/*
        $crud->display_as('name','Name');
        $crud->display_as('code','Code');
        $crud->display_as('own_name','Own Name');
        $crud->display_as('value','Value');
        $crud->display_as('recaptcha','reCaptcha');
        $crud->display_as('active','Active');   
        $crud->display_as('lang_default','Default');   
*/
//				$crud->set_relation('active', $this->config->item('raiz_bd') . 'datos_valores', 'nombre', 'dato = (SELECT id FROM ' . $this->config->item('raiz_bd') . 'datos WHERE codigo = "activo_inactivo")', 'nombre ASC');
//				$crud->set_relation('lang_default', $this->config->item('raiz_bd') . 'datos_valores', 'nombre', 'dato = (SELECT id FROM ' . $this->config->item('raiz_bd') . 'datos WHERE codigo = "si_no")', 'nombre ASC');
/*			
        $crud->add_action('Códigos', site_url('assets/iconos/space1.png'), $this->config->item('adminPath') . '/mantenimientos/variables_codigo');			
		$crud->callback_before_update(array($this,'xss_clean'));
		$crud->callback_before_insert(array($this,'xss_clean'));			
*/
        $crudTabla = $crud->render();
        $this->crudver($crudTabla, 'Languages');
    }

		function xss_clean($post_array, $primary_key = null) {
				foreach ($post_array as $key => $value) {
						$post_array[$key] = $this->security->xss_clean($value);
				}
				return $post_array;
		}	
	
}