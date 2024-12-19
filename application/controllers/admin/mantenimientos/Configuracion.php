<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracion extends MY_Controller {

    public $parametros;  
  
    public function __construct() {
        parent::__construct();
    	$this->ctrSegAdmin();
	    $this->load->helper('cookie');
/*
        if (!$this->session->has_userdata('project')) {
            redirect($this->config->item('adminPath') . '/database/tables_fields');
        }
*/
    }

    public function index() {
        $projectVersionTitle = $this->admin_design->_projectVersionTitle();

        $datos = $this->Model->registros('datos', 'id, nombre', array('id > '=>0), 'nombre' );
        $tablas = $this->Model->registros('tablas', 'id, nombre', array('proyecto'=>$this->session->userdata('project'), 'version'=>$this->session->userdata('version')), 'nombre' );
        $campos = $this->Model->registros('campos', 'id, nombre, tabla', array('proyecto'=>$this->session->userdata('project'), 'version'=>$this->session->userdata('version')), 'tabla, orden' );

        $datos_si_no = $this->Model->registros('datos_valores', 'id, nombre', 'dato = (SELECT id FROM ' . 'datos WHERE codigo = "si_no")', 'orden DESC');     
        $datos_tipos_datos = $this->Model->registros('datos_valores', 'id, nombre', 'dato = (SELECT id FROM ' . 'datos WHERE codigo = "tiposdatos")', 'nombre');
        $datos_tipos_campos = $this->Model->registros('datos_valores', 'id, nombre', 'dato = (SELECT id FROM ' . 'datos WHERE codigo = "tiposcampos")', 'nombre');
        $datos_validaciones = $this->Model->registros('datos_valores', 'id, nombre', 'dato = (SELECT id FROM ' . 'datos WHERE codigo = "validaciones")', 'nombre');

        $css = '<link rel="stylesheet" href="' . base_url() . 'assets/css/'.$this->config->item('projectPath').'/global/view.css">';
        $proyVar = '<script>var proyVar ={"base_url":"http:\/\/localhost:8888\/'.$this->config->item('projectPath').'\/","language":"spanish","lang":"es"};var proyVarS ={"sgctn":"ci_csrf_token","sgch":""};</script>';
        $txtVar = '';
        $js = '<script src="' . base_url() . 'assets/js/'.$this->config->item('projectPath').'/mantenimientos/configuracion/vista.js"></script>';

        $data = array(
            'css' => $css,
            'proyVar' => $proyVar,
            'txtVar' => $txtVar,
            'js' => $js,
            'projectVersionTitle' => $projectVersionTitle,
            'subtitulo' => '',
            'datos' => $datos,
            'tablas' => $tablas,
            'campos' => $campos,
            'datos_si_no' => $datos_si_no,
            'datos_tipos_datos' => $datos_tipos_datos,
            'datos_tipos_campos' => $datos_tipos_campos,
            'datos_validaciones' => $datos_validaciones,
        );

        $this->admin_design->_load_layout_table($this->config->item('adminPath') . '/mantenimientos/configuracion', $data);

    }

    public function campos() {
        $post = $this->input->post();
        $campos = $this->Model->registros('campos', 'id, etiqueta, tipo_dato, tipo_campo', array('tabla'=>$post['tabla']), 'orden' );
        echo json_encode(array('tksec'=>$this->security->get_csrf_hash(), 'campos'=>$campos));
    }

    public function campo() {
        $post = $this->input->post();
        $campo = $this->Model->registro('campos', $post['id'] );
        $campo_validaciones = $this->Model->registros('campos_validaciones', '', array("tabla"=>$post['tabla'], "campo"=>$post['id']) );
        echo json_encode(array('tksec'=>$this->security->get_csrf_hash(), 'campo'=>$campo, 'campo_validaciones'=>$campo_validaciones));
    }

    public function relacion_campo() {
        $post = $this->input->post();
        $relaciones = $this->Model->registros('campos', 'id', array("tabla"=>$post['campo_relacion_tabla'], "llave_primaria"=>4) );
        echo json_encode(array('tksec'=>$this->security->get_csrf_hash(), 'relaciones'=>$relaciones));
    }    

    public function actdato() {
        $post = $this->input->post();
        $datos[$post['campo']] = $post['valor'];
        $campo = $this->Model->actualizar('campos', $datos, $post['id'] );
        echo "ok";
    }

    public function insvalidacion() {
        $post = $this->input->post();
        $datos['tabla'] = $post['tabla'];
        $datos['campo'] = $post['campo'];
        $id = $this->Model->insertar('campos_validaciones', $datos );
        echo json_encode(array('tksec'=>$this->security->get_csrf_hash(), 'id'=>$id));
    }

    public function actvalidacion() {
        $post = $this->input->post();
        $datos[$post['campo']] = $post['valor'];
        $campo = $this->Model->actualizar('campos_validaciones', $datos, $post['id'] );
        echo "ok";
    }

    public function delvalidacion() {
        $post = $this->input->post();
        $campo = $this->Model->eliminar('campos_validaciones', $post['id'] );
        echo $post['id'];
    }

}