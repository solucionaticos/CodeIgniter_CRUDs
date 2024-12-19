<?php
defined('BASEPATH') OR exit('No esta permitido el acceso directo a este script.');

class Front01 extends MY_Controller {

    public $parametros;  
  
    public function __construct() {
        parent::__construct();
		$this->ctrSegAdmin();
    }

    public function index() {  
		$this->parametros['plantilla'] = '3dcontrolesBlank';
        $this->parametros['vista'] = $this->config->item('adminPath') . '/mantenimientos/front01';
        $this->parametros['datos']['titulo'] = 'Front V.0.1';
        $this->parametros['datos']['subtitulo'] = '';
        $this->parametros['datos']['breadcrumb'] = '';			
        $this->load->view('plantilla_admin', $this->parametros);			
	}

}
