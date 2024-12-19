<?php
defined("BASEPATH") OR exit("Direct access to this script is not allowed.");
/**
 * @author: Solucionaticos.com
 * @name: Projects
 * @version: 1.0
 * @date: 2019-08-28 21:10:27 
 * */

class Relational_models extends MY_Controller {

    //-- Construct --------
    public function __construct() {
        parent::__construct();
        // $this->ctrSegAdmin(); // Administrative Security Control
        // $this->load->library("grocery_CRUD"); // GroceryCrud library
        // $this->_prjControl();
    }

    public function index() {

		$projectVersionTitle = $this->admin_design->_projectVersionTitle();

		$tablas = $this->Model->registros('tablas', 'id, nombre', array( 'proyecto'=>$this->session->userdata('project'), 'version'=>$this->session->userdata('version') ), 'id ASC' );
		$campos = $this->Model->registros('campos', 'tabla, relacion_tabla', array('proyecto'=>$this->session->userdata('project'), 'version'=>$this->session->userdata('version'), 'relacion_tabla >'=>0 ));

        $css = '
        <link rel="stylesheet" href="' . base_url() . 'assets/css/'.$this->config->item('adminPath').'/global/view.css">
        ';

        $proyVar = '<script>var proyVar ={"base_url":"http:\/\/localhost:8888\/'.$this->config->item('projectPath').'\/","language":"spanish","lang":"es"};var proyVarS ={"sgctn":"ci_csrf_token","sgch":""};</script>';
        $txtVar = '';
        $js = '
<script>
$(function () {
    $("#btn_tabla_filtro").click(function () {
        var tabla_filtro = $("#tabla_filtro").val();
        window.location.href = "'.base_url().'admin/database/relational_models/tabla_filtro/"+tabla_filtro;
    });
});
</script>
';

        $tabla_filtro = 0;
        if ($this->session->has_userdata('tabla_filtro')) {
            $tabla_filtro = $this->session->userdata('tabla_filtro');;
        }

        $data = array(
            'css' => $css,
            'proyVar' => $proyVar,
            'txtVar' => $txtVar,
            'js' => $js,
            'projectVersionTitle' => $projectVersionTitle,
            'subtitulo' => '',
            'tablas' => $tablas,
            'campos' => $campos,
            'tabla_filtro' => $tabla_filtro
        );

        $this->admin_design->_load_layout_3D($this->config->item('adminPath') . '/database/relational_models', $data);

    }

    public function tabla_filtro($tabla) {
        $this->session->set_userdata('tabla_filtro', $tabla);
        redirect(base_url() . "admin/database/relational_models");
    }

}