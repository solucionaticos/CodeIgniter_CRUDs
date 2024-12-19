<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cruds extends MY_Controller {

    public $parametros;  
  
    public function __construct() {
        parent::__construct();
				$this->ctrSegAdmin();
		    $this->load->helper('cookie');
    }

    public function index() {
        $this->parametros['plantilla'] = 'tabla';
        $this->parametros['vista'] = $this->config->item('adminPath') . '/mantenimientos/cruds';
        $this->parametros['datos']['titulo'] = 'Cruds';
        $this->parametros['datos']['subtitulo'] = '';
        $tablas = $this->Modelo->registros($this->config->item('raiz_bd') . 'tablas', 'id, nombre', array(), 'nombre' );
        $this->parametros['datos']['tablas'] = $tablas;
        $this->load->view('plantilla_admin', $this->parametros);   
    }

}