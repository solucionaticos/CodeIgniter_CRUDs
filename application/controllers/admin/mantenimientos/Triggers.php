<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Triggers extends MY_Controller {

    public $parametros;  
  
    public function __construct() {
        parent::__construct();
				$this->ctrSegAdmin();
		    $this->load->helper('cookie');
    }

    public function index() {
        $this->parametros['plantilla'] = 'tabla';
        $this->parametros['vista'] = $this->config->item('adminPath') . '/mantenimientos/triggers';
        $this->parametros['datos']['titulo'] = 'Triggers';
        $this->parametros['datos']['subtitulo'] = '';
        $tablas = $this->Modelo->registros($this->config->item('raiz_bd') . 'tablas', 'id, nombre', array(), 'nombre' );
        $this->parametros['datos']['tablas'] = $tablas;
        $this->load->view('plantilla_admin', $this->parametros);   
    }

}