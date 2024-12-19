<?php
defined("BASEPATH") OR exit("Direct access to this script is not allowed.");
/**
 * @author: Solucionaticos.com
 * @name: Projects
 * @version: 1.0
 * @date: 2019-08-28 21:10:27 
 * */

class Validations extends MY_Controller {

    //-- Construct --------
    public function __construct() {
        parent::__construct();
        // $this->ctrSegAdmin(); // Administrative Security Control
        // $this->load->library("grocery_CRUD"); // GroceryCrud library
        // $this->_prjControl();
    }

    public function index() {
        $projectVersionTitle = $this->admin_design->_projectVersionTitle();
        // $projectVersionTitle = "Nombre del Proyecto seleccionado, si hay uno seleccionado";

        $datos = $this->Model->registros('datos', 'id, nombre', array('id > '=>0), 'nombre' );
        $tablas = $this->Model->registros('tablas', 'id, nombre', array('proyecto'=>$this->session->userdata('project'), 'version'=>$this->session->userdata('version')), 'nombre' );
        $campos = $this->Model->registros('campos', 'id, nombre, tabla', array('proyecto'=>$this->session->userdata('project'), 'version'=>$this->session->userdata('version')), 'tabla, orden' );

        $datos_si_no = $this->Model->registros('datos_valores', 'id, nombre', 'dato = (SELECT id FROM ' . 'datos WHERE codigo = "si_no")', 'orden DESC');     
        $datos_tipos_datos = $this->Model->registros('datos_valores', 'id, nombre', 'dato = (SELECT id FROM ' . 'datos WHERE codigo = "tiposdatos")', 'nombre');
        $datos_tipos_campos = $this->Model->registros('datos_valores', 'id, nombre', 'dato = (SELECT id FROM ' . 'datos WHERE codigo = "tiposcampos")', 'nombre');
        $datos_validaciones = $this->Model->registros('datos_valores', 'id, nombre', 'dato = (SELECT id FROM ' . 'datos WHERE codigo = "validaciones")', 'nombre');

        $css = '<link rel="stylesheet" href="' . base_url() . 'assets/css/'.$this->config->item('adminPath').'/global/view.css">';
        $proyVar = '<script>var proyVar ={"base_url":"' . base_url() . '","admin_path":"'.$this->config->item('adminPath').'","language":"spanish","lang":"es"};var proyVarS ={"sgctn":"ci_csrf_token","sgch":""};</script>';
        $txtVar = '';
        $js = '
<!-- Sticky -->
<script src="' . base_url() . 'assets/plugins/sticky/jquery.sticky.js"></script>
<script>
  $(document).ready(function(){
    $("#sticker").sticky({topSpacing:0});
  });
</script>

<!-- Validations -->
<script src="' . base_url() . 'assets/js/'.$this->config->item('adminPath').'/database/validations/view.js"></script>
';

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

        $this->admin_design->_load_layout_table($this->config->item('adminPath') . '/database/validations', $data);

    }

    public function campos() {
        $post = $this->input->post();
        $campos = $this->Model->registros('campos', 'id, etiqueta, tipo_dato, tipo_campo', array('tabla'=>$post['tabla'], 'proyecto'=>$post['project'], 'version'=>$post['version']), 'orden' );
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
        $datos['usuario'] = 1;
        $datos['proyecto'] = $this->session->userdata('project');
        $datos['version'] = $this->session->userdata('version');

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

// -----------------------------------------------------------------------------------------------------------


    public function campos_validaciones_relaciones($p, $v) {
        $registros = $this->Model->getRowsJoin('campos c', 't.nombre AS nombreTabla, c.*', array('tablas t' => array('c.tabla = t.id','')), "c.proyecto = $p AND c.`version` = $v AND c.nombre LIKE '%_id'" );
        // $campos = $this->Model->registros('campos c', '', "c.proyecto = $p AND c.`version` = $v AND c.nombre LIKE '%_id%'", '' );
        // echo json_encode($campos);

        $datos = $this->Model->registros('datos', 'id, nombre', array('id > '=>0), 'nombre' );
        $tablas = $this->Model->registros('tablas', 'id, nombre', array('proyecto'=>$p, 'version'=>$v), 'nombre' );
        $campos = $this->Model->registros('campos', 'id, nombre, tabla', array('proyecto'=>$p, 'version'=>$v), 'tabla, orden' );

        $data['registros'] = $registros;
        $data['datos'] = $datos;
        $data['tablas'] = $tablas;
        $data['campos'] = $campos;
        $data['proyecto'] = $p;
        $data['version'] = $v;

        $this->parser->parse('admin/database/validation/campos_validaciones_relaciones', $data);

    }

    function campos_validaciones_relaciones_actualizar() {
        $post = $this->input->post();

        if ( trim($post['copiar_proyecto']) != '' and  trim($post['copiar_version']) != ''  ) {

            $copiar_de = $this->Model->getRowsJoin('campos c', 't.nombre AS nombreTabla, c.nombre, c.relacion_datos, c.relacion_tabla, c.relacion_campo, c.relacion_nombre, c.relacion_condicion, c.relacion_orden', array('tablas t' => array('c.tabla = t.id','')), "c.proyecto = $post[copiar_proyecto] AND c.`version` = $post[copiar_version] AND c.nombre LIKE '%_id'" );

            foreach ($copiar_de as $key => $reg_copiar_de) {

                $pegar_en = $this->Model->getRowsJoin('campos c', 'c.id', array('tablas t' => array('c.tabla = t.id','')), "c.proyecto = $post[proyecto] AND c.`version` = $post[version] AND c.nombre = '$reg_copiar_de[nombre]' AND t.nombre = '$reg_copiar_de[nombreTabla]'" );

                if (count($pegar_en)) {

                    $relacion_tabla = 0;
                    $relacion_campo = 0;
                    $relacion_nombre = 0;

                    $relacion_tabla_copiar_de = $this->Model->registro('tablas', $reg_copiar_de['relacion_tabla']);
                    if ($relacion_tabla_copiar_de) {
                        $relacion_tabla_nombre = $relacion_tabla_copiar_de->nombre;

                        $relacion_tabla_ctr = $this->Model->registros('tablas', 'id', array('proyecto'=>$post['proyecto'], 'version'=>$post['version'], 'nombre' => $relacion_tabla_nombre));
                        if (count($relacion_tabla_ctr)) {
                            $relacion_tabla = $relacion_tabla_ctr[0]['id'];

                            $relacion_campo_copiar_de = $this->Model->registro('campos', $reg_copiar_de['relacion_campo']);
                            if ($relacion_campo_copiar_de) {
                                $relacion_campo_nombre = $relacion_campo_copiar_de->nombre;
                                $relacion_campo_ctr = $this->Model->registros('campos', 'id', array('proyecto'=>$post['proyecto'], 'version'=>$post['version'], 'tabla'=>$relacion_tabla, 'nombre' => $relacion_campo_nombre));
                                if (count($relacion_campo_ctr)) {
                                    $relacion_campo = $relacion_campo_ctr[0]['id'];
                                }
                            }
                            $relacion_nombre_copiar_de = $this->Model->registro('campos', $reg_copiar_de['relacion_nombre']);
                            if ($relacion_nombre_copiar_de) {
                                $relacion_nombre_nombre = $relacion_nombre_copiar_de->nombre;
                                $relacion_nombre_ctr = $this->Model->registros('campos', 'id', array('proyecto'=>$post['proyecto'], 'version'=>$post['version'], 'tabla'=>$relacion_tabla, 'nombre' => $relacion_nombre_nombre));
                                if (count($relacion_nombre_ctr)) {
                                    $relacion_nombre = $relacion_nombre_ctr[0]['id'];
                                }
                            }
                        }

                    }

                    $data = array(
                        'relacion_datos' => $reg_copiar_de['relacion_datos'],
                        'relacion_tabla' => $relacion_tabla,
                        'relacion_campo' => $relacion_campo,
                        'relacion_nombre' => $relacion_nombre,
                        'relacion_condicion' => $reg_copiar_de['relacion_condicion'],
                        'relacion_orden' => $reg_copiar_de['relacion_orden']
                    );
                    $this->Model->actualizar('campos', $data, $pegar_en[0]['id'] );
                }

            }

        } else {
            $data = array(
                'relacion_datos' => $post['r_datos'],
                'relacion_tabla' => $post['r_tabla'],
                'relacion_campo' => $post['r_campo'],
                'relacion_nombre' => $post['r_nombre'],
                'relacion_condicion' => $post['r_condicion'],
                'relacion_orden' => $post['r_orden']
            );

            if (isset($post['seleccion'])) {
                foreach ($post['seleccion'] as $id) {
                    $this->Model->actualizar('campos', $data, $id );
                }
            }
        }

        redirect(base_url() . 'admin/database/validations/campos_validaciones_relaciones/'.$post['proyecto'].'/'.$post['version']);

    }


}