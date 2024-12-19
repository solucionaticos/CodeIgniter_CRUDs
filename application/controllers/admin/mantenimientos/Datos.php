<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datos extends MY_Controller {

	public $dato = 0;
	
    public function __construct() {
        parent::__construct();
				$this->ctrSegAdmin();
				if ($this->session->userdata($this->config->item('raiz') . 'be_usuario_id') > 1) redirect($this->config->item('adminPath') . '/informacion');
				$this->load->library('grocery_CRUD');
    }
	
    public function index() {
        $crud = new grocery_CRUD();
				$crud->set_language($this->session->userdata($this->config->item('raiz') . 'be_lang_value'));
			
        $crud->set_table($this->config->item('raiz_bd') . 'datos');
				$crud->columns('nombre', 'codigo', 'numero_registros');
				$crud->required_fields('nombre', 'codigo');
				$crud->add_fields('nombre', 'codigo');
				$crud->edit_fields('nombre', 'codigo');
        $crud->callback_before_insert(array($this, 'datos_before_insert'));
        $crud->callback_before_update(array($this, 'datos_before_update'));
				$crud->add_action('Valores', site_url('assets/iconos/configurar.png'), $this->config->item('adminPath') . '/mantenimientos/datos/datos_valores');
        $crudTabla = $crud->render();
        $this->crudver($crudTabla, 'Datos');
    }	
	
    public function datos_before_insert ($post, $id = null) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }
        return $post;
    }
    
    public function datos_before_update ($post, $id = null) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }
        return $post;
    }
	
		public function datos_valores($id) {
				$this->dato = $id;
        $crud = new grocery_CRUD();
				$crud->set_language($this->session->userdata($this->config->item('raiz') . 'be_lang_value'));
			
        $crud->set_table($this->config->item('raiz_bd') . 'datos_valores');
        $crud->where('dato', $id);			
        $crud->columns('id', 'nombre', 'auxiliar_1', 'auxiliar_2', 'auxiliar_3', 'orden');
				$crud->add_fields('dato', 'nombre', 'auxiliar_1', 'auxiliar_2', 'auxiliar_3', 'orden');
        $crud->edit_fields('nombre', 'auxiliar_1', 'auxiliar_2', 'auxiliar_3', 'orden');
			
				$crud->required_fields('nombre', 'codigo');
        $crud->field_type('dato', 'hidden');

				$crud->callback_after_insert(array($this, 'datos_valores_after_insert'));
				$crud->callback_after_delete(array($this, 'datos_valores_after_delete'));
        $crud->callback_before_insert(array($this, 'datos_valores_before_insert'));
        $crud->callback_before_update(array($this, 'datos_valores_before_update'));
				$crudTabla = $crud->render();
        // --------------------------------------------------------------
        $nombreDato = '';
        $dato = $this->Modelo->registro($this->config->item('raiz_bd') . 'datos', $id);
        if ( count($dato) ) {
            $nombreDato = $dato->nombre;
        } else {
            $nombreDato = "Dato no encontrado";
        }
        // --------------------------------------------------------------
        $this->crudver($crudTabla, 'Datos (de: "' . $nombreDato . '")', '
            <ol class="breadcrumb">
                <li><a href="'.base_url().$this->config->item('adminPath') . '/mantenimientos/datos">Datos</a></li>
                <li class="active">Valores</li>
            </ol>');		
		}

    public function datos_valores_before_insert ($post, $id = null) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }
				$post['dato'] = $this->dato;
        return $post;
    }   
    
    public function datos_valores_before_update ($post, $id = null) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }           
        return $post;
    }  		
		
		function datos_valores_after_insert($post_array,$primary_key) {
			$numero_registros = $this->Modelo->filasDatos($this->dato);
			$data['numero_registros'] = $numero_registros;
			$this->Modelo->actualizar($this->config->item('raiz_bd') . 'datos', $data, $this->dato);
		}

		public function datos_valores_after_delete($primary_key) {
			$numero_registros = $this->Modelo->filasDatos($this->dato);
			$data['numero_registros'] = $numero_registros;
			$this->Modelo->actualizar($this->config->item('raiz_bd') . 'datos', $data, $this->dato);
		}

}