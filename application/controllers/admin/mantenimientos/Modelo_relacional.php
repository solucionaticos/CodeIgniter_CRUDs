<?php
defined('BASEPATH') OR exit('No esta permitido el acceso directo a este script.');

class Modelo_relacional extends MY_Controller {

	public $parametros;  

	public function __construct() {
		parent::__construct();
		$this->ctrSegAdmin();
/*
        if (!$this->session->has_userdata('project')) {
            redirect($this->config->item('adminPath') . '/database/tables_fields');
        }
*/
	}

	public function index() {  

		$projectVersionTitle = $this->admin_design->_projectVersionTitle();

		$tablas = $this->Model->registros($this->config->item('raiz_bd') . 'tablas', 'id, nombre', array( 'proyecto'=>$this->session->userdata('project'), 'version'=>$this->session->userdata('version') ), 'id ASC' );
		$campos = $this->Model->registros($this->config->item('raiz_bd') . 'campos', 'tabla, relacion_tabla', array('proyecto'=>$this->session->userdata('project'), 'version'=>$this->session->userdata('version'), 'relacion_tabla >'=>0 ));

        $css = '
        <link rel="stylesheet" href="' . base_url() . 'assets/css/' . $this->config->item('projectPath') . '/global/view.css">
		<link rel="stylesheet" href="' . base_url() . 'assets/css/' . $this->config->item('projectPath') . '/mantenimientos/three/vista.css">
        ';
        $proyVar = '<script>var proyVar ={"base_url":"http:\/\/localhost:8888\/'.$this->config->item('projectPath').'\/","language":"spanish","lang":"es"};var proyVarS ={"sgctn":"ci_csrf_token","sgch":""};</script>';
        $txtVar = '';
        $js = '';

        $data = array(
            'css' => $css,
            'proyVar' => $proyVar,
            'txtVar' => $txtVar,
            'js' => $js,
            'projectVersionTitle' => $projectVersionTitle,
            'subtitulo' => '',
            'tablas' => $tablas,
            'campos' => $campos
        );

        $this->admin_design->_load_layout_3D($this->config->item('adminPath') . '/mantenimientos/modelo_relacional', $data);

	}
}
