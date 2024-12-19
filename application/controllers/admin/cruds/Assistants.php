<?php
defined("BASEPATH") OR exit("Direct access to this script is not allowed.");
/**
 * @author: Solucionaticos.com
 * @name: Asistenetes
 * @version: 1.0
 * @date: 2020-05-25 22:44:27 
 * */

// Ajuste en la base de datos: https://matomo.org/faq/troubleshooting/faq_183/


class Assistants extends MY_Controller {

    public $parameters;
    public $path;
    public $breadcrumb;

    public function __construct() {
        parent::__construct();
        ini_set('max_execution_time', 0);
    }

    public function index() {

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();

        $data['tab'] = -1;
        $data['tab_class'][0] = '';
        $data['tab_class'][1] = '';
        $data['tab_class'][2] = '';
        $data['tab_class'][3] = '';

        $resultado = '';
        // if (isset($_SESSION['resultado'])) {
        if ( $this->session->flashdata('resultado') ) {
            $resultado = $this->session->flashdata('resultado');
            $resultado = '
            <div class="alert alert-info">
              <strong>Info!</strong> '.$resultado.'
            </div>';
        }
        $data['resultado'] = $resultado;

        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data);

	}

	// - Proyectos - Inicio -------------------------------------------------------------

    public function proyectos() {

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();

        $data['tab'] = 0;
        $data['tab_class'][0] = ' class="active"';
        $data['tab_class'][1] = '';
        $data['tab_class'][2] = '';
        $data['tab_class'][3] = '';

        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/proyectos', 'admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Proyectos';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data);

    }

    public function proyectos_procesos() {

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();
        $data['project'] = $this->session->userdata('project');
        $data['version'] = $this->session->userdata('version');
        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');        

        $data['tab'] = 0;
        $data['tab_class'][0] = ' class="active"';
        $data['tab_class'][1] = '';
        $data['tab_class'][2] = '';
        $data['tab_class'][3] = '';

        $data['tab_proyectos'] = 0;
        $data['tab_class_proyectos'][0] = ' class="active"';

        $registros = $this->Model->getRowsJoin('proyectos');
        $data['registros'] = $registros;

        $resultado = '';
        if ( $this->session->flashdata('resultado') ) {
            $resultado = $this->session->flashdata('resultado');
            $resultado = '
            <div class="alert alert-info">
              <strong>Info!</strong> '.$resultado.'
            </div>';
        }
        $data['resultado'] = $resultado;

        // $this->parser->parse('admin/cruds/assistants/cabeza', $data);
        // $this->parser->parse('admin/cruds/assistants/proyectos_tabs', $data);
        // $this->parser->parse('admin/cruds/assistants/proyectos_procesos', $data);
        // $this->parser->parse('admin/cruds/assistants/pie', $data);

        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/proyectos_tabs', 'admin/cruds/assistants/proyectos_procesos','admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Proyectos';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data);

    }


	// - Proyectos - Fin ----------------------------------------------------------------

	// - Versiones - Inicio -------------------------------------------------------------
    public function versiones() {

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();

    	$data['tab'] = 1;
        $data['tab_class'][0] = '';
        $data['tab_class'][1] = ' class="active"';
        $data['tab_class'][2] = '';
        $data['tab_class'][3] = '';
        // $this->parser->parse('admin/cruds/assistants/cabeza', $data);
        // $this->parser->parse('admin/cruds/assistants/versiones', $data);
        // $this->parser->parse('admin/cruds/assistants/pie', $data);

        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/versiones', 'admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Proyectos';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data);



	}


    public function versiones_procesos() {

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();
        $data['project'] = $this->session->userdata('project');
        $data['version'] = $this->session->userdata('version');
        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');        

        $data['tab'] = 1;
        $data['tab_class'][0] = '';
        $data['tab_class'][1] = ' class="active"';
        $data['tab_class'][2] = '';
        $data['tab_class'][3] = '';

        $data['tab_versiones'] = 0;
        $data['tab_class_versiones'][0] = ' class="active"';
        $data['tab_class_versiones'][1] = '';
        $data['tab_class_versiones'][2] = '';
        $data['tab_class_versiones'][3] = '';
        $data['tab_class_versiones'][4] = '';
        $data['tab_class_versiones'][5] = '';

        $registros = $this->Model->getRowsJoin('proyectos p', 'p.nombre proyecto_nombre, v.id, v.proyecto, v.nombre, v.descripcion', array('versiones v' => array('p.id = v.proyecto','')) );
        $data['registros'] = $registros;

        $resultado = '';
        if ( $this->session->flashdata('resultado') ) {
            $resultado = $this->session->flashdata('resultado');
            $resultado = '
            <div class="alert alert-info">
              <strong>Info!</strong> '.$resultado.'
            </div>';
        }
        $data['resultado'] = $resultado;

        // $this->parser->parse('admin/cruds/assistants/cabeza', $data);
        // $this->parser->parse('admin/cruds/assistants/versiones_tabs', $data);
        // $this->parser->parse('admin/cruds/assistants/versiones_procesos', $data);
        // $this->parser->parse('admin/cruds/assistants/pie', $data);

        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/versiones_tabs', 'admin/cruds/assistants/versiones_procesos','admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Proyectos';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data);



    }


    public function versiones_copiar_definiciones() {

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();
        $data['project'] = $this->session->userdata('project');
        $data['version'] = $this->session->userdata('version');
        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');        

        $data['tab'] = 1;
        $data['tab_class'][0] = '';
        $data['tab_class'][1] = ' class="active"';
        $data['tab_class'][2] = '';
        $data['tab_class'][3] = '';

        $data['tab_versiones'] = 2;
        $data['tab_class_versiones'][0] = '';
        $data['tab_class_versiones'][1] = '';
        $data['tab_class_versiones'][2] = ' class="active"';
        $data['tab_class_versiones'][3] = '';
        $data['tab_class_versiones'][4] = '';
        $data['tab_class_versiones'][5] = '';

        $proyectos = $this->Model->registros('proyectos', 'id, nombre', array(), 'nombre' );
        // $versiones = $this->Model->registros('versiones', 'id, proyecto, nombre', array('id !=' => $version), 'nombre' );

        $data['proyectos'] = $proyectos;
        // $data['versiones'] = $versiones;

        $resultado = '';
        if ( $this->session->flashdata('resultado') ) {
            $resultado = $this->session->flashdata('resultado');
            $resultado = '
            <div class="alert alert-info">
              <strong>Info!</strong> '.$resultado.'
            </div>';
        }
        $data['resultado'] = $resultado;

        // $this->parser->parse('admin/cruds/assistants/cabeza', $data);
        // $this->parser->parse('admin/cruds/assistants/versiones_tabs', $data);
        // $this->parser->parse('admin/cruds/assistants/versiones_copiar_definiciones', $data);
        // $this->parser->parse('admin/cruds/assistants/pie', $data);


        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/versiones_tabs', 'admin/cruds/assistants/versiones_copiar_definiciones','admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Proyectos';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data);


    }

    public function versiones_copiar_definiciones_procesar() {

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        ini_set('max_execution_time', 0);
        $post = $this->input->post();

        $post['proyecto'] = $this->session->userdata('project');
        $post['version'] = $this->session->userdata('version');

        $this->session->set_flashdata('resultado', 'No hizo nada.');

        if ( $post['copiar_version'] == $post['version'] ) {
            $this->session->set_flashdata('resultado', 'No hizo nada xq es la misma versión.');
        } else {

            if ( trim($post['copiar_proyecto']) != '' and  trim($post['copiar_version']) != ''  ) {

                // - Tablas - Inicio --------------------------------------------
                $copiar_de = $this->Model->getRowsJoin('tablas', '', array(), "proyecto = $post[copiar_proyecto] AND `version` = $post[copiar_version]");
                foreach ($copiar_de as $key => $reg_copiar_de) {
                    $pegar_en = $this->Model->getRowsJoin('tablas', 'id', array(), "proyecto = $post[proyecto] AND `version` = $post[version] AND nombre = '$reg_copiar_de[nombre]'");
                    if (count($pegar_en)) {
                        $data_table = array(
                            'etiqueta' => $reg_copiar_de['etiqueta'],
                            'comentarios' => $reg_copiar_de['comentarios'],
                            'antes_insertar' => $reg_copiar_de['antes_insertar'],
                            'antes_actualizar' => $reg_copiar_de['antes_actualizar'],
                            'antes_eliminar' => $reg_copiar_de['antes_eliminar'],
                            'despues_insertar' => $reg_copiar_de['despues_insertar'],
                            'despues_actualizar' => $reg_copiar_de['despues_actualizar'],
                            'despues_eliminar' => $reg_copiar_de['despues_eliminar']
                        );
                        $this->Model->actualizar('tablas', $data_table, $pegar_en[0]['id'] );
                    }
                }
                // - Tablas - Fin -----------------------------------------------

                // - Campos - Inicio -----------------------------------------------
                $copiar_de = $this->Model->getRowsJoin('campos c', 't.nombre AS nombreTabla, c.id, c.tabla, c.archivo, c.archivo_ruta, c.nombre, c.relacion_datos, c.relacion_tabla, c.relacion_campo, c.relacion_nombre, c.relacion_condicion, c.relacion_orden, c.lista, c.nuevo, c.editar, c.filtros, c.etiqueta_lista, c.etiqueta_nuevo, c.etiqueta_editar, c.etiqueta_filtros, c.orden_lista, c.orden_nuevo, c.orden_editar, c.orden_filtros', array('tablas t' => array('c.tabla = t.id','')), "c.proyecto = $post[copiar_proyecto] AND c.`version` = $post[copiar_version]" ); //  AND c.nombre LIKE '%_id'

                foreach ($copiar_de as $key => $reg_copiar_de) {

                    $pegar_en = $this->Model->getRowsJoin('campos c', 'c.id, c.tabla', array('tablas t' => array('c.tabla = t.id','')), "c.proyecto = $post[proyecto] AND c.`version` = $post[version] AND c.nombre = '$reg_copiar_de[nombre]' AND t.nombre = '$reg_copiar_de[nombreTabla]'" );

                    if (count($pegar_en)) {
                        // - Copiar Relaciones, Etiquetas y Orden - Inicio -----------------------------------------------------------------------------------

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
                            'relacion_tabla' => $relacion_tabla,
                            'relacion_campo' => $relacion_campo,
                            'relacion_nombre' => $relacion_nombre,
                            'relacion_condicion' => $reg_copiar_de['relacion_condicion'],
                            'relacion_orden' => $reg_copiar_de['relacion_orden'],
                            'archivo' => $reg_copiar_de['archivo'], 
                            'archivo_ruta' => $reg_copiar_de['archivo_ruta'], 
                            'lista' => $reg_copiar_de['lista'], 
                            'nuevo' => $reg_copiar_de['nuevo'], 
                            'editar' => $reg_copiar_de['editar'], 
                            'filtros' => $reg_copiar_de['filtros'], 
                            'etiqueta_lista' => $reg_copiar_de['etiqueta_lista'], 
                            'etiqueta_nuevo' => $reg_copiar_de['etiqueta_nuevo'], 
                            'etiqueta_editar' => $reg_copiar_de['etiqueta_editar'], 
                            'etiqueta_filtros' => $reg_copiar_de['etiqueta_filtros'], 
                            'orden_lista' => $reg_copiar_de['orden_lista'], 
                            'orden_nuevo' => $reg_copiar_de['orden_nuevo'], 
                            'orden_editar' => $reg_copiar_de['orden_editar'],
                            'orden_filtros' => $reg_copiar_de['orden_filtros']
                        );
                        $this->Model->actualizar('campos', $data, $pegar_en[0]['id'] );
                        // - Copiar Relaciones, Etiquetas y Orden - Fin --------------------------------------------------------------------------------------

                        // - Copiar Validaciones - Inicio -----------------------------------------------------------------------------------

                        // Borra las validaciones de este campo en el proyecto nuevo si tiene
                        $this->Model->delete('campos_validaciones', '', '', array('campo' => $pegar_en[0]['id']) );

                        // Lee las validaciones de este campo en el proyecto anterior
                        $validaciones_copiar_de = $this->Model->getRowsJoin('campos_validaciones', '', array(), array('campo' => $reg_copiar_de['id']) ); 

                        foreach ($validaciones_copiar_de as $key => $reg_validaciones_copiar_de) {
                            // crea las validaciones de este campo en el nuevo proyecto
                            $data = array(
                                'usuario' => 1,
                                'proyecto' => $post['proyecto'],
                                'version' => $post['version'],
                                'tabla' => $pegar_en[0]['tabla'],
                                'campo' => $pegar_en[0]['id'],
                                'validacion' => $reg_validaciones_copiar_de['validacion'], 
                                'parametro' => $reg_validaciones_copiar_de['parametro'] 
                            );
                            $this->Model->insert('campos_validaciones', $data);

                        }
                        // - Copiar Validaciones - Fin --------------------------------------------------------------------------------------

                    }
                }
                // - Campos - Fin --------------------------------------------------

                $this->session->set_flashdata('resultado', 'Proceso terminado con éxito!');

            }

        }

        redirect(base_url() . 'admin/cruds/assistants/versiones_copiar_definiciones');

    }


    public function versiones_copiar_tablas() {

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();
        $data['project'] = $this->session->userdata('project');
        $data['version'] = $this->session->userdata('version');
        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');        

        $data['tab'] = 1;
        $data['tab_class'][0] = '';
        $data['tab_class'][1] = ' class="active"';
        $data['tab_class'][2] = '';
        $data['tab_class'][3] = '';

        $data['tab_versiones'] = 1;
        $data['tab_class_versiones'][0] = '';
        $data['tab_class_versiones'][1] = ' class="active"';
        $data['tab_class_versiones'][2] = '';
        $data['tab_class_versiones'][3] = '';
        $data['tab_class_versiones'][4] = '';
        $data['tab_class_versiones'][5] = '';

        $registros = $this->Model->getRowsJoin('tablas', '', array(), "proyecto = ".$data['project']." AND `version` = ".$data['version'] );
        $data['registros'] = $registros;

        $proyectos = $this->Model->registros('proyectos', 'id, nombre', array(), 'nombre' );
        // $versiones = $this->Model->registros('versiones', 'id, proyecto, nombre', array('id !=' => $version), 'nombre' );

        $data['proyectos'] = $proyectos;
        // $data['versiones'] = $versiones;

        $resultado = '';
        if ( $this->session->flashdata('resultado') ) {
            $resultado = $this->session->flashdata('resultado');
            $resultado = '
            <div class="alert alert-info">
              <strong>Info!</strong> '.$resultado.'
            </div>';
        }
        $data['resultado'] = $resultado;

        // $this->parser->parse('admin/cruds/assistants/cabeza', $data);
        // $this->parser->parse('admin/cruds/assistants/versiones_tabs', $data);
        // $this->parser->parse('admin/cruds/assistants/versiones_copiar_tablas', $data);
        // $this->parser->parse('admin/cruds/assistants/pie', $data);


        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/versiones_tabs', 'admin/cruds/assistants/versiones_copiar_tablas','admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Proyectos';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data);


    }


    public function versiones_copiar_tablas_procesar() {

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        ini_set('max_execution_time', 0);
        $post = $this->input->post();

        $this->session->set_flashdata('resultado', 'No hizo nada.');

        if (isset($post['seleccion1'])) {
            
            foreach ($post['seleccion1'] as $tabla1_id) {
                $reg_tabla1 = $this->Model->getRow('tablas', $tabla1_id);
                $data_tabla1 = array(
                    'usuario' => 1,
                    'proyecto' => $this->session->userdata('project'),
                    'version' => $this->session->userdata('version'),
                    'nombre' => $reg_tabla1->nombre,
                    'etiqueta' => $reg_tabla1->etiqueta,
                    'comentarios' => $reg_tabla1->comentarios,
                    'antes_insertar' => $reg_tabla1->antes_insertar,
                    'antes_actualizar' => $reg_tabla1->antes_actualizar,
                    'antes_eliminar' => $reg_tabla1->antes_eliminar,
                    'despues_insertar' => $reg_tabla1->despues_insertar,
                    'despues_actualizar' => $reg_tabla1->despues_actualizar,
                    'despues_eliminar' => $reg_tabla1->despues_eliminar
                );
                $tabla2_id = $this->Model->insert('tablas', $data_tabla1);
            }

            foreach ($post['seleccion1'] as $tabla1_id) {

                $reg_tabla1 = $this->Model->getRow('tablas', $tabla1_id);

                $reg_tabla2 = $this->Model->registros('tablas', 'id', array('proyecto'=>$this->session->userdata('project'), 'version'=>$this->session->userdata('version'), 'nombre' => $reg_tabla1->nombre));
                $tabla2_id = $reg_tabla2[0]['id'];

                $campos1 = $this->Model->getRowsJoin('campos', '', array(), "tabla = ".$tabla1_id, 'id');


//-------------->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>                
                foreach ($campos1 as $reg_campos1) {

                    // -------------------------------------------------------------------------------------
                    $relacion_tabla = 0;
                    $relacion_campo = 0;
                    $relacion_nombre = 0;

                    $relacion_tabla_copiar_de = $this->Model->registro('tablas', $reg_campos1['relacion_tabla']);
                    if ($relacion_tabla_copiar_de) {
                        $relacion_tabla_nombre = $relacion_tabla_copiar_de->nombre;
                        $relacion_tabla_ctr = $this->Model->registros('tablas', 'id', array('proyecto'=>$this->session->userdata('project'), 'version'=>$this->session->userdata('version'), 'nombre' => $relacion_tabla_nombre));
                        if (count($relacion_tabla_ctr)) {
                            $relacion_tabla = $relacion_tabla_ctr[0]['id'];
                        }
                    }
                    // ---------------------------------------------------------------------------------------

                    $data_campo1 = array(
                        'usuario' => 1,
                        'proyecto' => $this->session->userdata('project'),
                        'version' => $this->session->userdata('version'),
                        'tabla' => $tabla2_id,
                        'nombre' => $reg_campos1['nombre'],
                        'etiqueta' => $reg_campos1['etiqueta'],
                        'tipo_dato' => $reg_campos1['tipo_dato'],
                        'tamano' => $reg_campos1['tamano'],
                        'sin_signo' => $reg_campos1['sin_signo'],
                        'no_nulo' => $reg_campos1['no_nulo'],
                        'defecto' => $reg_campos1['defecto'],
                        'defecto_valor' => $reg_campos1['defecto_valor'],
                        'comentario' => $reg_campos1['comentario'],
                        'comentario_valor' => $reg_campos1['comentario_valor'],
                        'tipo_campo' => $reg_campos1['tipo_campo'],
                        'tipo_entrada' => $reg_campos1['tipo_entrada'],
                        'tipo_entrada_parametro' => $reg_campos1['tipo_entrada_parametro'],
                        'archivo' => $reg_campos1['archivo'],
                        'archivo_ruta' => $reg_campos1['archivo_ruta'],
                        'relacion_datos' => $reg_campos1['relacion_datos'],
                        'relacion_tabla' => $relacion_tabla,
                        'relacion_campo' => $relacion_campo,
                        'relacion_nombre' => $relacion_nombre,
                        'relacion_condicion' => $reg_campos1['relacion_condicion'],
                        'relacion_orden' => $reg_campos1['relacion_orden'],
                        'relacion_etiqueta_nm' => $reg_campos1['relacion_etiqueta_nm'],
                        'relacion_tabla_n' => $reg_campos1['relacion_tabla_n'],
                        'relacion_campo_n' => $reg_campos1['relacion_campo_n'],
                        'relacion_tabla_m' => $reg_campos1['relacion_tabla_m'],
                        'relacion_campo_m_tabla_a' => $reg_campos1['relacion_campo_m_tabla_a'],
                        'relacion_campo_m_tabla_b' => $reg_campos1['relacion_campo_m_tabla_b'],
                        'relacion_campo_m_prioridad' => $reg_campos1['relacion_campo_m_prioridad'],
                        'relacion_campo_nm_condicion' => $reg_campos1['relacion_campo_nm_condicion'],
                        'orden' => $reg_campos1['orden'],
                        'llave_primaria' => $reg_campos1['llave_primaria'],
                        'autonumerico' => $reg_campos1['autonumerico'],
                        'indice' => $reg_campos1['indice'],
                        'unico' => $reg_campos1['unico'],
                        'comentarios' => $reg_campos1['comentarios'],
                        'lista' => $reg_campos1['lista'],
                        'etiqueta_lista' => $reg_campos1['etiqueta_lista'],
                        'orden_lista' => $reg_campos1['orden_lista'],
                        'nuevo' => $reg_campos1['nuevo'],
                        'etiqueta_nuevo' => $reg_campos1['etiqueta_nuevo'],
                        'orden_nuevo' => $reg_campos1['orden_nuevo'],
                        'editar' => $reg_campos1['editar'],
                        'etiqueta_editar' => $reg_campos1['etiqueta_editar'],
                        'orden_editar' => $reg_campos1['orden_editar'],
                        'filtros' => $reg_campos1['filtros'],
                        'etiqueta_filtros' => $reg_campos1['etiqueta_filtros'],
                        'orden_filtros' => $reg_campos1['orden_filtros']
                    );
                    $campo2_id = $this->Model->insert('campos', $data_campo1);

                    $campos_validaciones1 = $this->Model->getRowsJoin('campos_validaciones', '', array(), array('campo' => $reg_campos1['id']) ); 
                    foreach ($campos_validaciones1 as $key => $reg_campos_validaciones1) {
                        $data_reg_campos_validaciones1 = array(
                            'usuario' => 1,
                            'proyecto' => $this->session->userdata('project'),
                            'version' => $this->session->userdata('version'),
                            'tabla' => $tabla2_id,
                            'campo' => $campo2_id,
                            'validacion' => $reg_campos_validaciones1['validacion'], 
                            'parametro' => $reg_campos_validaciones1['parametro'] 
                        );
                        $this->Model->insert('campos_validaciones', $data_reg_campos_validaciones1);
                    }
                }
//-------------->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>                
            }

// -------------------------------------------------------
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// -------------------------------------------------------

            foreach ($post['seleccion1'] as $tabla1_id) {

                $reg_tabla1 = $this->Model->getRow('tablas', $tabla1_id);

                $reg_tabla2 = $this->Model->registros('tablas', 'id', array('proyecto'=>$this->session->userdata('project'), 'version'=>$this->session->userdata('version'), 'nombre' => $reg_tabla1->nombre));
                // Id de la tabla nueva
                $tabla2_id = $reg_tabla2[0]['id'];

                $campos1 = $this->Model->getRowsJoin('campos', 'nombre, relacion_tabla, relacion_campo, relacion_nombre', array(), "relacion_tabla > 0 AND tabla = ".$tabla1_id, 'id');

                foreach ($campos1 as $reg_campos1) {

                    // -------------------------------------------------------------------------------------
                    $relacion_tabla = 0;
                    $relacion_campo = 0;
                    $relacion_nombre = 0;

                    $relacion_tabla_copiar_de = $this->Model->registro('tablas', $reg_campos1['relacion_tabla']);
                    if ($relacion_tabla_copiar_de) {
                        $relacion_tabla_nombre = $relacion_tabla_copiar_de->nombre;
                        $relacion_tabla_ctr = $this->Model->registros('tablas', 'id', array('proyecto'=>$this->session->userdata('project'), 'version'=>$this->session->userdata('version'), 'nombre' => $relacion_tabla_nombre));
                        if (count($relacion_tabla_ctr)) {
                            $relacion_tabla = $relacion_tabla_ctr[0]['id'];

                            $relacion_campo_copiar_de = $this->Model->registro('campos', $reg_campos1['relacion_campo']);
                            if ($relacion_campo_copiar_de) {
                                $relacion_campo_nombre = $relacion_campo_copiar_de->nombre;

                                $relacion_campo_ctr = $this->Model->registros('campos', 'id', array(
                                    'proyecto'=>$this->session->userdata('project'), 
                                    'version'=>$this->session->userdata('version'), 
                                    'tabla'=>$relacion_tabla, 
                                    'nombre' => $relacion_campo_nombre));
                                if (count($relacion_campo_ctr)) {
                                    $relacion_campo = $relacion_campo_ctr[0]['id'];
                                }

                            }

                            $relacion_nombre_copiar_de = $this->Model->registro('campos', $reg_campos1['relacion_nombre']);
                            if ($relacion_nombre_copiar_de) {
                                $relacion_nombre_nombre = $relacion_nombre_copiar_de->nombre;

                                $relacion_nombre_ctr = $this->Model->registros('campos', 'id', array(
                                    'proyecto'=>$this->session->userdata('project'), 
                                    'version'=>$this->session->userdata('version'), 
                                    'tabla'=>$relacion_tabla, 
                                    'nombre' => $relacion_nombre_nombre));
                                if (count($relacion_nombre_ctr)) {
                                    $relacion_nombre = $relacion_nombre_ctr[0]['id'];
                                }

                            }

                        }
                    }
                    // ---------------------------------------------------------------------------------------

                    $campo_actual = $this->Model->registros('campos', 'id', array(
                                        'proyecto'=>$this->session->userdata('project'), 
                                        'version'=>$this->session->userdata('version'), 
                                        'tabla'=>$tabla2_id, 
                                        'nombre' => $reg_campos1['nombre']));
                    if (count($campo_actual)) {
                        $campo_actual_id = $campo_actual[0]['id'];
                        $data_campo1 = array(
                            'relacion_campo' => $relacion_campo,
                            'relacion_nombre' => $relacion_nombre,
                        );
                        $this->Model->update('campos', $data_campo1, $campo_actual_id);
                    }

                }

            }

// -------------------------------------------------------
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// -------------------------------------------------------

            $this->session->set_flashdata('resultado', 'Proceso terminado con éxito!');
        }

        if (isset($post['seleccion2'])) {
            foreach ($post['seleccion2'] as $tabla2_id) {
                echo $tabla2_id . ', ';
                // Borra las validaciones de esta tabla
                $this->Model->delete('sqls', '', '', array(
                    'tabla' => $tabla2_id, 
                    'project' => $this->session->userdata('project'), 
                    'version' => $this->session->userdata('version')
                ) );
                // Borra las validaciones de esta tabla
                $this->Model->delete('campos_validaciones', '', '', array(
                    'tabla' => $tabla2_id, 
                    'proyecto' => $this->session->userdata('project'), 
                    'version' => $this->session->userdata('version')
                ) );
                // Borra las validaciones de esta tabla
                $this->Model->delete('campos', '', '', array(
                    'tabla' => $tabla2_id, 
                    'proyecto' => $this->session->userdata('project'), 
                    'version' => $this->session->userdata('version')
                ) );
                // Borra la tabla
                $this->Model->delete('tablas', '', '', array(
                    'id' => $tabla2_id, 
                    'proyecto' => $this->session->userdata('project'), 
                    'version' => $this->session->userdata('version')
                ) );
            }

            $this->session->set_flashdata('resultado', 'Proceso terminado con éxito!');
        }

        redirect(base_url() . 'admin/cruds/assistants/versiones_copiar_tablas');

    }



    public function versiones_generar_sqls() {

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();
        $data['project'] = $this->session->userdata('project');
        $data['version'] = $this->session->userdata('version');
        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');        

        $data['tab'] = 1;
        $data['tab_class'][0] = '';
        $data['tab_class'][1] = ' class="active"';
        $data['tab_class'][2] = '';
        $data['tab_class'][3] = '';

        $data['tab_versiones'] = 3;
        $data['tab_class_versiones'][0] = '';
        $data['tab_class_versiones'][1] = '';
        $data['tab_class_versiones'][2] = '';
        $data['tab_class_versiones'][3] = ' class="active"';
        $data['tab_class_versiones'][4] = '';
        $data['tab_class_versiones'][5] = '';

        $i = 0;
        $datos = array();
        $tablas = $this->Model->registros('tablas', '', array('proyecto' => $data['project'], 'version' => $data['version']), 'nombre' );
        foreach ($tablas as $regTablas) {
            $sql = '';
            $tabla_campos = '';
            $llave_primaria = '';
            $indice = '';
            $unico = '';

            $datos[$i]['tabla_nombre'] = $regTablas['nombre'];

            $campos = $this->Model->registros('campos', '', array('tabla' => $regTablas['id']), 'orden');

            foreach ($campos as $regCampos) {
                if ($regCampos['llave_primaria'] == 4) {
                    $llave_primaria = $regCampos['nombre'];
                }

                if ($regCampos['unico'] == 4) {
                    $unico .= "UNIQUE KEY `".$regCampos['nombre']."` (`".$regCampos['nombre']."`), 
";
                }

                if ($regCampos['indice'] == 4) {
                    $indice .= "KEY `".$regCampos['nombre']."` (`".$regCampos['nombre']."`), 
";
                }

                $auto_increment = '';
                if ($regCampos['autonumerico'] == 4) {
                    $auto_increment = "AUTO_INCREMENT ";
                }

                $comentario = '';
                if ($regCampos['comentario'] == 4) {
                    $comentario = "COMMENT " . $regCampos['comentario_valor'] . " ";
                }

                $defecto = '';
                if ($regCampos['defecto'] == 4) {
                    if ( trim($regCampos['defecto_valor']) != '' ) {
                        $defecto = "DEFAULT '" . $regCampos['defecto_valor'] . "' ";
                    } else {

                        if (trim($regCampos['tipo_dato']) == 'date' or trim($regCampos['tipo_dato']) == 'datetime') {
                            $defecto = "DEFAULT CURRENT_TIMESTAMP ";
                        }

                    }
                }

                $unsigned = '';
                if ($regCampos['tipo_dato'] == 4) {
                    $unsigned = 'unsigned ';
                }

                $not_null = '';
                if ($regCampos['no_nulo'] == 4) {
                    $not_null = 'NOT NULL ';
                }                

                $tipo_dato = $regCampos['tipo_dato'];
                if ( trim($regCampos['tamano']) != '' ) {
                    $tipo_dato .= '(' . trim($regCampos['tamano']) . ') ';
                } else {
                    $tipo_dato .= ' ';
                }
                
                $def_campo = trim($tipo_dato . $unsigned . $not_null . $defecto . $auto_increment . $comentario);
                $tabla_campos .= '  `' . $regCampos['nombre'] . '` ' . $def_campo . ', 
';

            }

            $primary_key = '';
            if ($llave_primaria != '') {
                $primary_key = "  PRIMARY KEY (`".$llave_primaria."`) USING BTREE, ";
            }


            $create_table = trim($tabla_campos . $primary_key . $unico . $indice);
            $create_table = substr($create_table, 0, -1);

            $sql = "
CREATE TABLE IF NOT EXISTS `" . $regTablas['nombre'] . "` (
  $create_table
) ENGINE=InnoDB CHARSET='utf8mb4';"; // utf8_general_ci

            $datos[$i]['tabla_sql'] = $sql;

            $i++;

        }

        $data['datos'] = $datos;

        // $this->parser->parse('admin/cruds/assistants/cabeza', $data);
        // $this->parser->parse('admin/cruds/assistants/versiones_tabs', $data);
        // $this->parser->parse('admin/cruds/assistants/versiones_generar_sqls', $data);
        // $this->parser->parse('admin/cruds/assistants/pie', $data);

        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/versiones_tabs', 'admin/cruds/assistants/versiones_generar_sqls','admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Proyectos';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data);


    }


    public function versiones_comparar_bds() {

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();
        $data['project'] = $this->session->userdata('project');
        $data['version'] = $this->session->userdata('version');
        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');        

        $data['tab'] = 1;
        $data['tab_class'][0] = '';
        $data['tab_class'][1] = ' class="active"';
        $data['tab_class'][2] = '';
        $data['tab_class'][3] = '';

        $data['tab_versiones'] = 3;
        $data['tab_class_versiones'][0] = '';
        $data['tab_class_versiones'][1] = '';
        $data['tab_class_versiones'][2] = '';
        $data['tab_class_versiones'][3] = '';
        $data['tab_class_versiones'][4] = '';
        $data['tab_class_versiones'][5] = ' class="active"';


        $i = 0;
        $datos_bds = array();


        // Estos datos los puede traer del proyecto

        $proyecto = $this->Model->registro('proyectos', $this->session->userdata('project'));

        $ver_bds = false;
        if ($proyecto) {
            if ($proyecto->base_de_datos != '') {
                $ver_bds = true;
                $config_app = array(
                    'hostname' => 'localhost',
                    'username' => $proyecto->usuario,
                    'password' => $proyecto->clave,
                    'database' => $proyecto->base_de_datos,
                    'dbdriver' => 'mysqli',
                    'dbprefix' => '',
                    'pconnect' => FALSE,
                    'db_debug' => TRUE
                );



echo "<pre>Base_de_datos: " . $proyecto->base_de_datos . "</pre>"; 



                $this->db = $this->load->database($config_app, TRUE);

                // Aqui toca ver si la BDs si existe y se puede ver para seleccionarla
                $tables = $this->db->list_tables();

                foreach ($tables as $table) {
                    $datos_bds[$i]['tabla_nombre'] = str_replace("_", " ", $table);

                    $fields = $this->db->field_data($table);

                    $table_fields = "
                    <table class='table table-striped table-bordered table-hover table-condensed listas'>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Tamaño</th>
                            </tr>
                        </thead>
                        <tbody>";
                    foreach ($fields as $field) {
                       $table_fields .= "<tr>";
                       $table_fields .= "<td>" . $field->name . "</td>";
                       $table_fields .= "<td>" . $field->type . "</td>";
                       $table_fields .= "<td>" . $field->max_length . "</td>";
                       $table_fields .= "</tr>";
                    }
                    $table_fields .= "
                        </tbody>
                    </table>";

                    $datos_bds[$i]['tabla_sql'] = $table_fields;

                    $i++;
                }

                $data['datos'][0] = $datos_bds;

            }
        }

        if (!$ver_bds) {
            $data['datos'][0] = $datos_bds;
        }

        $i = 0;
        $datos = array();

        $this->db = $this->load->database('development', true);

        $tablas = $this->Model->registros('tablas', '', array('proyecto' => $data['project'], 'version' => $data['version']), 'nombre' );
        foreach ($tablas as $regTablas) {
            $sql = '';
            $tabla_campos = '';
            $llave_primaria = '';
            $indice = '';
            $unico = '';

            $datos[$i]['tabla_nombre'] = str_replace("_", " ", $regTablas['nombre']);



            $table_fields = "
            <table class='table table-striped table-bordered table-hover table-condensed listas'>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Tamaño</th>
                    </tr>
                </thead>
                <tbody>";

            $campos = $this->Model->registros('campos', '', array('tabla' => $regTablas['id']), 'orden');
            foreach ($campos as $regCampos) {
                if ($regCampos['llave_primaria'] == 4) {
                    $llave_primaria = $regCampos['nombre'];
                }

                if ($regCampos['unico'] == 4) {
                    $unico .= "UNIQUE KEY `".$regCampos['nombre']."` (`".$regCampos['nombre']."`), 
";
                }

                if ($regCampos['indice'] == 4) {
                    $indice .= "KEY `".$regCampos['nombre']."` (`".$regCampos['nombre']."`), 
";
                }

                $auto_increment = '';
                if ($regCampos['autonumerico'] == 4) {
                    $auto_increment = "AUTO_INCREMENT ";
                }

                $comentario = '';
                if ($regCampos['comentario'] == 4) {
                    $comentario = "COMMENT '" . $regCampos['comentario_valor'] . "' ";
                }

                $defecto = '';
                if ($regCampos['defecto'] == 4) {
                    $defecto = "DEFAULT '" . $regCampos['defecto_valor'] . "' ";
                }

                $unsigned = '';
                if ($regCampos['tipo_dato'] == 4) {
                    $unsigned = 'unsigned ';
                }

                $not_null = '';
                if ($regCampos['no_nulo'] == 4) {
                    $not_null = 'NOT NULL ';
                }                

                $tipo_dato = $regCampos['tipo_dato'];
                if ( trim($regCampos['tamano']) != '' ) {
                    $tipo_dato .= '(' . trim($regCampos['tamano']) . ') ';
                } else {
                    $tipo_dato .= ' ';
                }
                
                $def_campo = trim($tipo_dato . $unsigned . $not_null . $defecto . $auto_increment . $comentario);
                $tabla_campos .= '  `' . $regCampos['nombre'] . '` ' . $def_campo . ', 
';

               $table_fields .= "<tr>";
               $table_fields .= "<td>" . $regCampos['nombre'] . "</td>";
               $table_fields .= "<td>" . $regCampos['tipo_dato'] . "</td>";
               $table_fields .= "<td>" . trim($regCampos['tamano']) . "</td>";
               $table_fields .= "</tr>";

            }

            $table_fields .= "
                </tbody>
            </table>";


//             $primary_key = '';
//             if ($llave_primaria != '') {
//                 $primary_key = "  PRIMARY KEY (`".$llave_primaria."`) USING BTREE, ";
//             }


//             $create_table = trim($tabla_campos . $primary_key . $unico . $indice);
//             $create_table = substr($create_table, 0, -1);

//             $sql = "
// CREATE TABLE IF NOT EXISTS `" . $regTablas['nombre'] . "` (
//   $create_table
// ) ENGINE=InnoDB CHARSET='utf8mb4';"; // utf8_general_ci

//             $table_fields .= "
//                 </tbody>
//             </table>";

            $datos[$i]['tabla_sql'] = $table_fields;

            //$datos[$i]['tabla_sql'] = $sql;

            $i++;

        }

        $data['datos'][1] = $datos;


        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/versiones_tabs', 'admin/cruds/assistants/versiones_comparar_bds','admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Proyectos';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data);

    }


    public function versiones_generar_menus() {

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();
        $data['project'] = $this->session->userdata('project');
        $data['version'] = $this->session->userdata('version');
        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');        

        $data['tab'] = 1;
        $data['tab_class'][0] = '';
        $data['tab_class'][1] = ' class="active"';
        $data['tab_class'][2] = '';
        $data['tab_class'][3] = '';

        $data['tab_versiones'] = 4;
        $data['tab_class_versiones'][0] = '';
        $data['tab_class_versiones'][1] = '';
        $data['tab_class_versiones'][2] = '';
        $data['tab_class_versiones'][3] = '';
        $data['tab_class_versiones'][4] = ' class="active"';
        $data['tab_class_versiones'][5] = '';

        $menu_seleccionado = 0;
        if ($this->session->has_userdata('menu_seleccionado')) {
            $menu_seleccionado = $this->session->userdata('menu_seleccionado');
        }
        $data['menu_seleccionado'] = $menu_seleccionado;

        $menus = $this->Model->registros('menus', '', array('proyecto' => $data['project'], 'version' => $data['version']), 'nombre' );
        $data['menus'] = $menus;

        $menus_enlaces = $this->Model->registros('menus_enlaces', '', array('proyecto' => $data['project'], 'version' => $data['version'], 'menu' => $menu_seleccionado), 'orden' );
        $data['menus_enlaces'] = $menus_enlaces;

        $proyectos = $this->Model->registros('proyectos', 'id, nombre', array(), 'nombre' );
        $data['proyectos'] = $proyectos;

        $resultado = '';
        if ( $this->session->flashdata('resultado') ) {
            $resultado = $this->session->flashdata('resultado');
            $resultado = '
            <div class="alert alert-info">
              <strong>Info!</strong> '.$resultado.'
            </div>';
        }
        $data['resultado'] = $resultado;

        // $this->parser->parse('admin/cruds/assistants/cabeza', $data);
        // $this->parser->parse('admin/cruds/assistants/versiones_tabs', $data);
        // $this->parser->parse('admin/cruds/assistants/versiones_generar_menus', $data);
        // $this->parser->parse('admin/cruds/assistants/pie', $data);

        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/versiones_tabs', 'admin/cruds/assistants/versiones_generar_menus','admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Proyectos';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data);

    }

    public function versiones_generar_menus_borrar($id) {

        $this->Model->delete('menus_enlaces', $id);
        redirect(base_url() . 'admin/cruds/assistants/versiones_generar_menus');            

    }


    public function versiones_generar_menus_guardar_menu() {
        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $post = $this->input->post();

        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');

        $menu_seleccionado = 0;
        if ($this->session->has_userdata('menu_seleccionado')) {
            $menu_seleccionado = $this->session->userdata('menu_seleccionado');
        }

        if ($post['enlace_id'] == 0) {

            $codigo = 'E-' . str_pad(mt_rand(0, 9999999), 7, '0', STR_PAD_LEFT);

            $data = array(
                'usuario' => 1,
                'proyecto' => $proyecto,
                'version' => $version,
                'menu' => $menu_seleccionado,
                'codigo' => $codigo,
                'nombre' => $post['nombre'],
                'enlace' => $post['enlace'],
                'depende_de' => $post['depende_de'],
                'orden' => $post['orden']
            );
            $this->Model->insert('menus_enlaces', $data);
        } else {
            $data = array(
                'nombre' => $post['nombre'],
                'enlace' => $post['enlace'],
                'depende_de' => $post['depende_de'],
                'orden' => $post['orden']
            );
            $this->Model->update('menus_enlaces', $data, $post['enlace_id']);
        }


        redirect(base_url() . 'admin/cruds/assistants/versiones_generar_menus');
    }

    public function versiones_generar_menus_crear_menu() {
        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $post = $this->input->post();

        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');

        $data = array(
            'usuario' => 1,
            'proyecto' => $proyecto,
            'version' => $version,
            'nombre' => $post['nombre']
        );
        $menu = $this->Model->insert('menus', $data);

        $this->session->set_userdata('menu_seleccionado', $menu);

        redirect(base_url() . 'admin/cruds/assistants/versiones_generar_menus');
    }

    public function versiones_generar_menus_seleccionar_menu() {
        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $post = $this->input->post();

        $this->session->set_userdata('menu_seleccionado', $post['menu']);
        redirect(base_url() . 'admin/cruds/assistants/versiones_generar_menus');
    }

    public function versiones_generar_menus_copiar_menu() {
        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');

        $menu_seleccionado = 0;
        if ($this->session->has_userdata('menu_seleccionado')) {
            $menu_seleccionado = $this->session->userdata('menu_seleccionado');
            if ($menu_seleccionado > 0) {
                $post = $this->input->post();
                $menu = $this->Model->registro('menus', $post['copiar_menu']);
                if (isset($menu->nombre)) {
                    $menus_enlaces = $this->Model->registros('menus_enlaces', '', array('proyecto' => $post['copiar_proyecto'], 'version' => $post['copiar_version'], 'menu' => $post['copiar_menu']), 'orden' );

                    foreach ($menus_enlaces as $regEnlaces) {
                        $data = array(
                            'usuario' => 1,
                            'proyecto' => $proyecto,
                            'version' => $version,
                            'menu' => $menu_seleccionado,
                            'codigo' => $regEnlaces['codigo'],
                            'nombre' => $regEnlaces['nombre'],
                            'enlace' => $regEnlaces['enlace'],
                            'depende_de' => $regEnlaces['depende_de'],
                            'orden' => $regEnlaces['orden']
                        );
                        $this->Model->insert('menus_enlaces', $data);
                    }

                }
            }
        }

        redirect(base_url() . 'admin/cruds/assistants/versiones_generar_menus');

    }


    public function traer_tablas() {
        $post = $this->input->post();
        $tablas = $this->Model->registros('tablas', '', array('proyecto'=>$post['proyecto'], 'version'=>$post['version']), 'nombre');
        echo json_encode(array('tablas'=>$tablas));
    }


	// - Versiones - Fin  ---------------------------------------------------------------

    // - Seleccionar Proyecto + Version - Inicio ----------------------------------------
    public function selprojver () {
        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();
        $projects = $this->Model->getRowsJoin('proyectos', '', array(), array(), 'nombre');
        $data['projects'] = $projects;

        $data['tab'] = -1;
        $data['tab_class'][0] = '';
        $data['tab_class'][1] = '';
        $data['tab_class'][2] = '';
        $data['tab_class'][3] = '';

        // $this->parser->parse('admin/cruds/assistants/cabeza', $data);
        // $this->parser->parse('admin/cruds/assistants/selprojver', $data);
        // $this->parser->parse('admin/cruds/assistants/pie', $data);

        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/selprojver', 'admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Proyectos';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data);


    }

    public function traer_version() {
        $post = $this->input->post();
        $versions = $this->Model->registros('versiones', '', array('proyecto'=>$post['proyecto']), 'nombre DESC');
        echo json_encode(array('versions'=>$versions));
    }

    public function traer_menu() {
        $post = $this->input->post();
        $menus = $this->Model->registros('menus', '', array('version'=>$post['version']), 'nombre DESC');
        echo json_encode(array('menus'=>$menus));
    }


    public function traer_crud_dependiente() {
        $post = $this->input->post();
        $cruds_dependientes = $this->Model->registros('cruds_dependientes', '', array('version'=>$post['version']), 'nombre DESC');
        echo json_encode(array('cruds_dependientes'=>$cruds_dependientes));
    }


    public function projver($project, $version, $redir) {
        $reg_project = $this->Model->getRow('proyectos', $project);
        $reg_version = $this->Model->getRow('versiones', $version);
        $projecName = $reg_project->nombre;
        $versionName = $reg_version->nombre;
        $projectVersionTitle = $projecName . ' ' . $versionName;
        $dataSession = array(
            'project' => $project,
            'version' => $version,
            'projectVersionTitle' => $projectVersionTitle,
            'crud_tabla' => 0,
            'tabla_filtro' => 0,
            'archivo_seleccionado' => 0,
            'tabla_seleccionada_id' => 0 
        );
        $this->session->set_userdata($dataSession);

        $this->session->set_flashdata('resultado', "Se seleccionó el Proyecto: " . $projecName . " y la Versión: " . $versionName);

        if ($redir == 'a') {
            redirect(base_url() . 'admin/cruds/assistants');
        }
        if ($redir == 'v') {
            redirect(base_url() . 'admin/cruds/assistants/versiones_procesos');
        }


    }

    public function borrar_projver($proyecto, $version, $redir) {

        $projecName = '';
        if ($proyecto > 0) {
            $reg_project = $this->Model->getRow('proyectos', $proyecto);
            $projecName = $reg_project->nombre;
        }

        $versionName = 'Todas';
        if ($version > 0) {
            $reg_version = $this->Model->getRow('versiones', $version);
            $versionName = $reg_version->nombre;
        }

        if ($version > 0) {
            // $this->Model->delete('cruds_detalles', '', '', array('proyecto' => $proyecto, 'version' => $version));
            // $this->Model->delete('cruds', '', '', array('proyecto' => $proyecto, 'version' => $version));
            $this->Model->delete('campos_validaciones', '', '', array('proyecto' => $proyecto, 'version' => $version));
            $this->Model->delete('campos', '', '', array('proyecto' => $proyecto, 'version' => $version));
            $this->Model->delete('tablas', '', '', array('proyecto' => $proyecto, 'version' => $version));
            $this->Model->delete('versiones', '', '', array('proyecto' => $proyecto, 'id' => $version));
            // $this->Model->delete('proyectos', $proyecto);
            $this->Model->delete('menus', '', '', array('proyecto' => $proyecto, 'version' => $version) );
            $this->Model->delete('menus_enlaces', '', '', array('proyecto' => $proyecto, 'version' => $version) );
        } else {
            // $this->Model->delete('cruds_detalles', '', '', array('proyecto' => $proyecto));
            // $this->Model->delete('cruds', '', '', array('proyecto' => $proyecto));
            $this->Model->delete('campos_validaciones', '', '', array('proyecto' => $proyecto));
            $this->Model->delete('campos', '', '', array('proyecto' => $proyecto));
            $this->Model->delete('tablas', '', '', array('proyecto' => $proyecto));
            $this->Model->delete('versiones', '', '', array('proyecto' => $proyecto));
            $this->Model->delete('proyectos', $proyecto);
            $this->Model->delete('menus', '', '', array('proyecto' => $proyecto) );
            $this->Model->delete('menus_enlaces', '', '', array('proyecto' => $proyecto) );
        }

        $this->session->set_flashdata('resultado', "Se eliminó el Proyecto: " . $projecName . " y la Versión: " . $versionName);

        if ($redir == 'v') {
            redirect(base_url() . 'admin/cruds/assistants/versiones_procesos');            
        }
        if ($redir == 'p') {
            redirect(base_url() . 'admin/cruds/assistants/proyectos_procesos');
        }

    }

    // - Seleccionar Proyecto + Version - Fin ----------------------------------------


	// - Tablas - Inicio ----------------------------------------------------------------
    public function tablas() {

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();
        $data['project'] = $this->session->userdata('project');
        $data['version'] = $this->session->userdata('version');

    	$data['tab'] = 2;
        $data['tab_class'][0] = '';
        $data['tab_class'][1] = '';
        $data['tab_class'][2] = ' class="active"';
        $data['tab_class'][3] = '';

        // $this->parser->parse('admin/cruds/assistants/cabeza', $data);
        // $this->parser->parse('admin/cruds/assistants/tablas', $data);
        // $this->parser->parse('admin/cruds/assistants/pie', $data);

        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/tablas', 'admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Proyectos';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data);


	}

    public function tablas_etiquetas_notas() {

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();
        $data['project'] = $this->session->userdata('project');
        $data['version'] = $this->session->userdata('version');
        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');        

        $data['tab'] = 2;
        $data['tab_class'][0] = '';
        $data['tab_class'][1] = '';
        $data['tab_class'][2] = ' class="active"';
        $data['tab_class'][3] = '';

        $data['tab_tablas'] = 0;
        $data['tab_class_tablas'][0] = ' class="active"';
        $data['tab_class_tablas'][1] = '';
        $data['tab_class_tablas'][2] = '';
        $data['tab_class_tablas'][3] = '';
        $data['tab_class_tablas'][4] = '';

        $registros = $this->Model->getRowsJoin('tablas', '', array(), "proyecto = ".$data['project']." AND `version` = ".$data['version'] );
        $data['registros'] = $registros;

        $mat_pks = array();
        $pks = $this->Model->getRowsJoin('campos', 'tabla, nombre', array(), "llave_primaria = 4 AND proyecto = ".$data['project']." AND `version` = ".$data['version'] );
        foreach ($pks as $reg_pks) {
            $mat_pks[$reg_pks['tabla']] = $reg_pks['nombre'];
        }
        $data['mat_pks'] = $mat_pks;

        // $this->parser->parse('admin/cruds/assistants/cabeza', $data);
        // $this->parser->parse('admin/cruds/assistants/tablas_tabs', $data);
        // $this->parser->parse('admin/cruds/assistants/tablas_etiquetas_notas', $data);
        // $this->parser->parse('admin/cruds/assistants/pie', $data);

        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/tablas_tabs', 'admin/cruds/assistants/tablas_etiquetas_notas', 'admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Proyectos';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data);

    }

    public function tablas_etiquetas_notas_procesar() {

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $post = $this->input->post();

        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');
        
        if (isset($post['seleccion'])) {

            if ( count($post['seleccion']) > 1 ) {
                foreach ($post['seleccion'] as $tabla) {
                    $regTabla = $this->Model->getRow('tablas', $tabla);
                    $tablaNombre = $regTabla->nombre;
                    $etiqueta = ucwords(str_ireplace("_"," ",$tablaNombre));  
                    $data = array(
                        'etiqueta' => $etiqueta
                    );
                    $this->Model->update('tablas', $data, $tabla);
                }

            } else {
                foreach ($post['seleccion'] as $tabla) {
                    $data = array(
                        'etiqueta' => $post['etiqueta'],
                        'comentarios' => $post['comentarios'],
                        'antes_insertar' => $post['antes_insertar'],
                        'antes_actualizar' => $post['antes_actualizar'],
                        'antes_eliminar' => $post['antes_eliminar'],
                        'despues_insertar' => $post['despues_insertar'],
                        'despues_actualizar' => $post['despues_actualizar'],
                        'despues_eliminar' => $post['despues_eliminar']
                    );

                    $this->Model->update('tablas', $data, $tabla);
                }
            }

        }

        redirect(base_url() . 'admin/cruds/assistants/tablas_etiquetas_notas');

    }


    public function tablas_ver_cruds() {

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();
        $data['project'] = $this->session->userdata('project');
        $data['version'] = $this->session->userdata('version');
        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');        

        $data['tab'] = 2;
        $data['tab_class'][0] = '';
        $data['tab_class'][1] = '';
        $data['tab_class'][2] = ' class="active"';
        $data['tab_class'][3] = '';

        $data['tab_tablas'] = 3;
        $data['tab_class_tablas'][0] = '';
        $data['tab_class_tablas'][1] = '';
        $data['tab_class_tablas'][2] = '';
        $data['tab_class_tablas'][3] = ' class="active"';
        $data['tab_class_tablas'][4] = '';

        $tablas = $this->Model->registros('tablas', '', array('proyecto'=>$proyecto, 'version'=>$version), 'nombre');
        $data['tablas'] = $tablas;

        $tabla_seleccionada = 0;
        if ($this->session->has_userdata('tabla_seleccionada')) {
            $tabla_seleccionada = $this->session->userdata('tabla_seleccionada');
        }
        $data['tabla_seleccionada'] = $tabla_seleccionada;

        $tabla_nombre = '';
        $tabla_etiqueta = '';
        $lista_etiquetas = array();
        $nuevo_etiquetas = array();
        $editar_etiquetas = array();
        $filtros_etiquetas = array();

        if ($tabla_seleccionada > 0) {
            $tabla = $this->Model->registro('tablas', $tabla_seleccionada);
            if ($tabla) {
                $tabla_nombre = $tabla->nombre;
                $tabla_etiqueta = $tabla->etiqueta;
                $lista_etiquetas = $this->Model->registros('campos', 'etiqueta_lista', array('tabla'=>$tabla_seleccionada, 'lista' => 4), 'orden_lista');
                $nuevo_etiquetas = $this->Model->registros('campos', 'etiqueta_nuevo, nombre', array('tabla'=>$tabla_seleccionada, 'nuevo' => 4), 'orden_nuevo');
                $editar_etiquetas = $this->Model->registros('campos', 'etiqueta_editar, nombre', array('tabla'=>$tabla_seleccionada, 'editar' => 4), 'orden_editar');
                $filtros_etiquetas = $this->Model->registros('campos', 'etiqueta_filtros, nombre', array('tabla'=>$tabla_seleccionada, 'filtros' => 4), 'orden_filtros');
            }
        }

        $registros_relaciones_lista = $this->Model->getRowsJoin('campos c', 't.nombre AS nombreTabla, c.*', array('tablas t' => array('c.tabla = t.id','')), "c.tabla = ".$tabla_seleccionada." AND c.nombre LIKE '%_id' AND lista = 4", 'orden_lista');
        $data['registros_relaciones_lista'] = $registros_relaciones_lista;

        $registros_relaciones_nuevo = $this->Model->getRowsJoin('campos c', 't.nombre AS nombreTabla, c.*', array('tablas t' => array('c.tabla = t.id','')), "c.tabla = ".$tabla_seleccionada." AND c.nombre LIKE '%_id' AND nuevo = 4", 'orden_nuevo');
        $data['registros_relaciones_nuevo'] = $registros_relaciones_nuevo;

        $registros_relaciones_editar = $this->Model->getRowsJoin('campos c', 't.nombre AS nombreTabla, c.*', array('tablas t' => array('c.tabla = t.id','')), "c.tabla = ".$tabla_seleccionada." AND c.nombre LIKE '%_id' AND editar = 4", 'orden_editar');
        $data['registros_relaciones_editar'] = $registros_relaciones_editar;

        $registros_relaciones_filtros = $this->Model->getRowsJoin('campos c', 't.nombre AS nombreTabla, c.*', array('tablas t' => array('c.tabla = t.id','')), "c.tabla = ".$tabla_seleccionada." AND c.nombre LIKE '%_id' AND filtros = 4", 'orden_filtros');
        $data['registros_relaciones_filtros'] = $registros_relaciones_filtros;

        $tablas_relaciones = $this->Model->registros('tablas', 'id, nombre', array('proyecto'=>$proyecto, 'version'=>$version), 'nombre' );
        $data['tablas_relaciones'] = $tablas_relaciones;
        $campos_relaciones = $this->Model->registros('campos', 'id, nombre, tabla', array('proyecto'=>$proyecto, 'version'=>$version), 'tabla, orden' );
        $data['campos_relaciones'] = $campos_relaciones;

        $data['tabla_nombre'] = $tabla_nombre;
        $data['tabla_etiqueta'] = $tabla_etiqueta;

        $data['lista_etiquetas'] = $lista_etiquetas;
        $data['nuevo_etiquetas'] = $nuevo_etiquetas;
        $data['editar_etiquetas'] = $editar_etiquetas;
        $data['filtros_etiquetas'] = $filtros_etiquetas;

// ----------------------------------------------------------------------------------------------------------------------------------------------
        $registros_nuevo = $this->Model->getRowsJoin('campos c', 't.nombre AS nombreTabla, t.etiqueta AS etiquetaTabla, c.*', array('tablas t' => array('c.tabla = t.id','')), "tabla = ".$tabla_seleccionada." AND c.nuevo = 4", "orden_nuevo");
        $validaciones_nuevo = $this->Model->registros('datos_valores', '', array('dato' => 7), 'nombre' );
        $data['registros_nuevo'] = $registros_nuevo;

        $validaciones_cabeceras_nuevo = '';
        foreach ($validaciones_nuevo as $registro) {
            $validaciones_cabeceras_nuevo .= '<th>' . $registro['nombre'] . '</th>';
        }

        $validaciones_datos_nuevo = array();
        foreach ($registros_nuevo as $reg1) {
            foreach ($validaciones_nuevo as $reg2) {
                $valor = '';
                $campos_validaciones_nuevo = $this->Model->getRowsJoin('campos_validaciones', '', array(), array('tabla' => $reg1['tabla'], 'campo' => $reg1['id'], 'validacion' => $reg2['id']) );
                if (count($campos_validaciones_nuevo)) {
                    if ($reg2['auxiliar_3'] == 'true') {
                        $valor = 'Si';            
                    } else {
                        $valor = $campos_validaciones_nuevo[0]['parametro'];
                    }
                }
                $validaciones_datos_nuevo[$reg1['id']][$reg2['id']] = $valor;
            }
        }

        $data['validaciones_cabeceras_nuevo'] = $validaciones_cabeceras_nuevo;
        $data['validaciones_datos_nuevo'] = $validaciones_datos_nuevo;

// ----------------------------------------------------------------------------------------------------------------------------------------------
        $registros_editar = $this->Model->getRowsJoin('campos c', 't.nombre AS nombreTabla, t.etiqueta AS etiquetaTabla, c.*', array('tablas t' => array('c.tabla = t.id','')), "tabla = ".$tabla_seleccionada." AND c.editar = 4", "orden_editar");
        $validaciones_editar = $this->Model->registros('datos_valores', '', array('dato' => 7), 'nombre' );
        $data['registros_editar'] = $registros_editar;

        $validaciones_cabeceras_editar = '';
        foreach ($validaciones_editar as $registro) {
            $validaciones_cabeceras_editar .= '<th>' . $registro['nombre'] . '</th>';
        }

        $validaciones_datos_editar = array();
        foreach ($registros_editar as $reg1) {
            foreach ($validaciones_editar as $reg2) {
                $valor = '';
                $campos_validaciones_editar = $this->Model->getRowsJoin('campos_validaciones', '', array(), array('tabla' => $reg1['tabla'], 'campo' => $reg1['id'], 'validacion' => $reg2['id']) );
                if (count($campos_validaciones_editar)) {
                    if ($reg2['auxiliar_3'] == 'true') {
                        $valor = 'Si';            
                    } else {
                        $valor = $campos_validaciones_editar[0]['parametro'];
                    }
                }
                $validaciones_datos_editar[$reg1['id']][$reg2['id']] = $valor;
            }
        }

        $data['validaciones_cabeceras_editar'] = $validaciones_cabeceras_editar;
        $data['validaciones_datos_editar'] = $validaciones_datos_editar;


// ----------------------------------------------------------------------------------------------------------------------------------------------
        $registros_filtros = $this->Model->getRowsJoin('campos c', 't.nombre AS nombreTabla, t.etiqueta AS etiquetaTabla, c.*', array('tablas t' => array('c.tabla = t.id','')), "tabla = ".$tabla_seleccionada." AND c.filtros = 4", "orden_filtros");
        $validaciones_filtros = $this->Model->registros('datos_valores', '', array('dato' => 7), 'nombre' );
        $data['registros_filtros'] = $registros_filtros;

        $validaciones_cabeceras_filtros = '';
        foreach ($validaciones_filtros as $registro) {
            $validaciones_cabeceras_filtros .= '<th>' . $registro['nombre'] . '</th>';
        }

        $validaciones_datos_filtros = array();
        foreach ($registros_filtros as $reg1) {
            foreach ($validaciones_filtros as $reg2) {
                $valor = '';
                $campos_validaciones_filtros = $this->Model->getRowsJoin('campos_validaciones', '', array(), array('tabla' => $reg1['tabla'], 'campo' => $reg1['id'], 'validacion' => $reg2['id']) );
                if (count($campos_validaciones_filtros)) {
                    if ($reg2['auxiliar_3'] == 'true') {
                        $valor = 'Si';            
                    } else {
                        $valor = $campos_validaciones_filtros[0]['parametro'];
                    }
                }
                $validaciones_datos_filtros[$reg1['id']][$reg2['id']] = $valor;
            }
        }

        $data['validaciones_cabeceras_filtros'] = $validaciones_cabeceras_filtros;
        $data['validaciones_datos_filtros'] = $validaciones_datos_filtros;


        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/tablas_tabs', 'admin/cruds/assistants/tablas_ver_cruds', 'admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Proyectos';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data);

    }

    public function tablas_ver_cruds_seleccionar_tabla() {
        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $post = $this->input->post();

        $this->session->set_userdata('tabla_seleccionada', $post['tabla']);
        redirect(base_url() . 'admin/cruds/assistants/tablas_ver_cruds');
    }

    public function tablas_importar_datos() {

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();
        $data['project'] = $this->session->userdata('project');
        $data['version'] = $this->session->userdata('version');
        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');        

        $data['tab'] = 2;
        $data['tab_class'][0] = '';
        $data['tab_class'][1] = '';
        $data['tab_class'][2] = ' class="active"';
        $data['tab_class'][3] = '';

        $data['tab_tablas'] = 4;
        $data['tab_class_tablas'][0] = '';
        $data['tab_class_tablas'][1] = '';
        $data['tab_class_tablas'][2] = '';
        $data['tab_class_tablas'][3] = '';
        $data['tab_class_tablas'][4] = ' class="active"';

        $registros = $this->Model->getRowsJoin(
            'importar_datos id', 
            'id.id, id.archivo, id.descripcion, id.tabla, id.fecha, id.encabezado, id.separador, id.calificador_texto, t.nombre AS tabla_nombre', 
            array('tablas t' => array('id.tabla = t.id', 'left')), 
            "id.proyecto = ".$proyecto." AND id.version = ".$version );
        $data['importar_datos'] = $registros;

        $archivo_seleccionado = 0;
        if ($this->session->has_userdata('archivo_seleccionado')) {
            $archivo_seleccionado = $this->session->userdata('archivo_seleccionado');
        }
        $data['archivo_seleccionado'] = $archivo_seleccionado;

        $tabla_seleccionada_id = 0;
        if ($this->session->has_userdata('tabla_seleccionada_id')) {
            $tabla_seleccionada_id = $this->session->userdata('tabla_seleccionada_id');
        }
        $data['tabla_seleccionada_id'] = $tabla_seleccionada_id;

        $archivo = array();
        $plano = '';
        $archivo_nombre = 'Ninguno';
        $archivo_nombre_sin_extension = '';
        $encabezado = 0;
        $tabla_seleccionada_nombre = '';

        $algoritmo = '';
        $algoritmo_generado = '';
        $sql = '';
        $sql_generado = '';
        $fecha = '';
        $tabla_generada = 0;

        if ($archivo_seleccionado > 0) {
            $importar_datos = $this->Model->getRow('importar_datos', $archivo_seleccionado);
            $archivo_nombre = $importar_datos->archivo;
            $mat_archivo_nombre = explode('.', $archivo_nombre);
            $archivo_nombre_sin_extension = $mat_archivo_nombre[0];
            $encabezado = $importar_datos->encabezado;
            $algoritmo = $importar_datos->algoritmo;
            $algoritmo_generado = $importar_datos->algoritmo_generado;
            $sql = $importar_datos->sql;
            $sql_generado = $importar_datos->sql_generado;
            $tabla_generada = $importar_datos->tabla_generada;
            $fecha = $importar_datos->fecha;
            $fecha = str_replace("-", "", $fecha);
            $fecha = str_replace(" ", "", $fecha);
            $fecha = str_replace(":", "", $fecha);

            $archivo = $this->leer_archivo ('./importar_datos/', $importar_datos->archivo, $importar_datos->separador, $importar_datos->calificador_texto);
            $plano = $this->leer_archivo_plano ('./importar_datos/', $importar_datos->archivo);
            $tabla = $this->Model->getRow('tablas', $tabla_seleccionada_id);
            if ($tabla) {
                $tabla_seleccionada_nombre = $tabla->nombre;
            }
        }
        $data['archivo'] = $archivo;
        $data['plano'] = $plano;
        $data['archivo_nombre'] = $archivo_nombre;
        $data['archivo_nombre_sin_extension'] = $archivo_nombre_sin_extension;
        $data['encabezado'] = $encabezado;

        $data['algoritmo'] = $algoritmo;
        $data['algoritmo_generado'] = $algoritmo_generado;
        $data['sql'] = $sql;
        $data['sql_generado'] = $sql_generado;
        $data['tabla_generada'] = $tabla_generada;
        $data['fecha'] = $fecha;

        $data['tabla_seleccionada_nombre'] = $tabla_seleccionada_nombre;

        $data['encabezados'] = array(0 => 'No', 1 => 'Si');
        $data['separadores'] = array(1 => 'Coma', 2 => 'Punto y Coma', 3 => 'Tabulador');
        $data['calificadores_texto'] = array(1 => 'Ninguno', 2 => 'Comillas', 3 => 'Dobles Comillas');

        $tablas = $this->Model->registros('tablas', '', array('proyecto' => $data['project'], 'version' => $data['version']), 'nombre' );
        $data['tablas'] = $tablas;

        $campos = $this->Model->registros('campos', 'id, nombre', array('tabla' => $tabla_seleccionada_id), 'nombre' );
        $data['campos'] = $campos;

        // $this->parser->parse('admin/cruds/assistants/cabeza', $data);
        // $this->parser->parse('admin/cruds/assistants/tablas_tabs', $data);
        // $this->parser->parse('admin/cruds/assistants/tablas_importar_datos', $data);
        // $this->parser->parse('admin/cruds/assistants/pie', $data);

        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/tablas_tabs', 'admin/cruds/assistants/tablas_importar_datos', 'admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Proyectos';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data);

    }

    public function tablas_importar_datos_guardar_generar_formulas() {
        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $post = $this->input->post();

        $sql = $post['sql'];
        $sql_generado = '';
        $algoritmo = $post['algoritmo'];
        $algoritmo_generado = '';

        $archivo_seleccionado = 0;
        if ($this->session->has_userdata('archivo_seleccionado')) {
            $archivo_seleccionado = $this->session->userdata('archivo_seleccionado');

            $importar_datos = $this->Model->getRow('importar_datos', $archivo_seleccionado);
            $encabezado = $importar_datos->encabezado;

            $archivo = $this->leer_archivo ('./importar_datos/', $importar_datos->archivo, $importar_datos->separador, $importar_datos->calificador_texto);

            $mat_datos = array();
            $registro = 0;
            if (count($archivo)) {

                if ($encabezado == 0) {
                    foreach ($archivo as $key => $filas) {

                        if ($key == 0) {
                            $i = 0;
                            $j = 0;
                            foreach ($filas as $valor) {
                                $i++;
                                $mat_datos[$registro][$j] = "Columna_$i";
                                $j++;
                            }
                            $registro++;
                        } 

                        $j = 0;
                        foreach ($filas as $valor) {
                            $mat_datos[$registro][$j] = $valor;
                            $j++;
                        }
                        $registro++;

                    }
                }

                if ($encabezado == 1) {
                    foreach ($archivo as $key => $filas) {
                        if ($key == 0) {

                            $j = 0;
                            foreach ($filas as $valor) {
                                $valor = str_replace("'", " ", $valor);
                                $mat_datos[$registro][$j] = $valor;
                                $j++;
                            }
                            $registro++;

                        } else {
                            if (count($filas) > 1) {

                                $j = 0;
                                foreach ($filas as $valor) {
                                    $mat_datos[$registro][$j] = $valor;
                                    $j++;
                                }
                                $registro++;

                            }
                        }
                    }
                }
            }

            $algoritmo_data_import = '';
            foreach ($mat_datos as $mr_id => $mat_registros) {
                if ($mr_id > 0) {
                    foreach ($mat_registros as $mca_id => $mat_campos_alg) {
                        $algoritmo_data_import .= "\$import[".$mr_id."][".$mca_id."] = '".str_replace("'","´",$mat_campos_alg)."';
";
                    }
                }
            }

            $algoritmo_formula = $algoritmo;
            $mat_campos_0 = $mat_datos[0];
            foreach ($mat_campos_0 as $key => $value) {
                if (stripos($sql, '<<'.$value.'>>')) {
                    $algoritmo_formula = str_replace('<<'.$value.'>>', $key, $algoritmo_formula);
                }
            }

            $algoritmo_generado = "
$algoritmo_data_import

foreach (\$import as \$reg) {
    $algoritmo_formula;
}
";

            foreach ($mat_datos as $key0 => $mat_campos) {
                if ($key0 > 0) {
                    $sql_gen_det = $sql;
                    foreach ($mat_campos as $key => $value) {
                        foreach ($mat_campos_0 as $key2 => $campo_formula) {
                            if ($key2 == $key) {
                                if (stripos($sql, '<<'.$campo_formula.'>>')) {
                                    $sql_gen_det = str_replace('<<'.$campo_formula.'>>', $value, $sql_gen_det);
                                }
                            }
                        }
                    }
                    $sql_generado .= $sql_gen_det . "
";
                }
            }

// ---------------------------------------------------------------------------------------------------

            $data = array(
                'algoritmo' => $post['algoritmo'],
                'algoritmo_generado' => $algoritmo_generado,
                'sql' => $post['sql'],
                'sql_generado' => $sql_generado
            );

            $this->Model->update('importar_datos', $data, $post['archivo_seleccionado']);

        }

        redirect(base_url() . 'admin/cruds/assistants/tablas_importar_datos');

    }

    public function tablas_importar_datos_crear_tabla($id) {
        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

// ---------------------------------------------------------------------------------------------------

        $importar_datos = $this->Model->getRow('importar_datos', $id);

        $proyecto = $importar_datos->proyecto;
        $version = $importar_datos->version;

        $archivo_nombre = $importar_datos->archivo;
        $mat_archivo_nombre = explode('.', $archivo_nombre);
        $archivo_nombre_sin_extension = $mat_archivo_nombre[0];
        $encabezado = $importar_datos->encabezado;
        $fecha = $importar_datos->fecha;
        $fecha = str_replace("-", "", $fecha);
        $fecha = str_replace(" ", "", $fecha);
        $fecha = str_replace(":", "", $fecha);
        $archivo = $this->leer_archivo ('./importar_datos/', $importar_datos->archivo, $importar_datos->separador, $importar_datos->calificador_texto);
        $mat_campos_nombres = array();
        $mat_campos_tipos = array();
        $mat_campos_tamanos = array();
        if (count($archivo)) {
            if ($encabezado == 0) {
                foreach ($archivo as $key => $filas) {
                    if ($key == 0) {
                        $i = 0;
                        $k = 0;
                        foreach ($filas as $valor) {
                            $i++;
                            $mat_campos_nombres[$k] = "columna_$i";
                            $mat_campos_tamanos[$k] = 0;
                            $mat_campos_tipos[$k] = '';
                            $k++;
                        }
                    } 
                    $k = 0;
                    foreach ($filas as $valor) {
                        $largo_campo = strlen($valor);
                        if ($mat_campos_tamanos[$k] < $largo_campo) {
                            $mat_campos_tamanos[$k] = $largo_campo; 
                        }
                        if (trim($valor) != '') {
                            if ($mat_campos_tipos[$k] != 'varchar') {
                                $campos_tipos = 'varchar';
                                if (is_numeric($valor)) {
                                    $campos_tipos = 'int';
                                }
                                $mat_campos_tipos[$k] = $campos_tipos;
                            }
                        }
                        $k++;
                    }
                }
            }
            if ($encabezado == 1) {
                foreach ($archivo as $key => $filas) {
                    if ($key == 0) {
                        $k = 0;
                        foreach ($filas as $valor) {
                            $mat_campos_nombres[$k] = texttovar($valor);
                            $mat_campos_tamanos[$k] = 0;
                            $mat_campos_tipos[$k] = '';
                            $k++;
                        }
                    } else {
                        if (count($filas) > 1) {
                            $k = 0;
                            foreach ($filas as $valor) {
                                $largo_campo = strlen($valor);
                                if ($mat_campos_tamanos[$k] < $largo_campo) {
                                    $mat_campos_tamanos[$k] = $largo_campo; 
                                }
                                if (trim($valor) != '') {
                                    if ($mat_campos_tipos[$k] != 'varchar') {
                                        $campos_tipos = 'varchar';
                                        if (is_numeric($valor)) {
                                            $campos_tipos = 'int';
                                        }
                                        $mat_campos_tipos[$k] = $campos_tipos;
                                    }
                                }
                                $k++;
                            }
                        }
                    }
                }
            }



            // Importar Datos
            $data_id = array(
                'tabla_generada' => 1
            );
            $this->Model->update('importar_datos', $data_id, $id);


            // Tablas
            $nombre = "imp_".$fecha."_" . texttovar($archivo_nombre_sin_extension);
            $etiqueta = ucwords(str_ireplace("_"," ",$nombre));
            $data_tabla = array(
                "usuario" => 1,
                "proyecto" => $proyecto,
                "version" => $version,
                "nombre" => $nombre,
                "etiqueta" => $etiqueta
            );

            $tabla_id = $this->Model->insert('tablas', $data_tabla);
            if ($id > 0) {

                // Campos
                $data_campo_id = array(
                    "usuario" => 1,
                    "proyecto" => $proyecto,
                    "version" => $version,
                    "sql_linea" => '',
                    "tabla" => $tabla_id,
                    "nombre" => 'id',
                    "etiqueta" => 'Id',
                    "tipo_dato" => 'int',
                    "tamano" => '11',
                    "sin_signo" => '5',
                    "no_nulo" => '4',
                    "defecto" => '5',
                    "defecto_valor" => '',
                    "comentario" => '5',
                    "comentario_valor" => '',
                    "tipo_campo" => '23',
                    "tipo_entrada" => '36',
                    "tipo_entrada_parametro" => '',
                    "archivo" => '5',
                    "archivo_ruta" => '',
                    "relacion_datos" => '0',
                    "relacion_tabla" => '0',
                    "relacion_campo" => '0',
                    "relacion_nombre" => '',
                    "relacion_condicion" => '',
                    "relacion_orden" => '',
                    "relacion_etiqueta_nm" => '',
                    "relacion_tabla_n" => '0',
                    "relacion_campo_n" => '0',
                    "relacion_tabla_m" => '0',
                    "relacion_campo_m_tabla_a" => '0',
                    "relacion_campo_m_tabla_b" => '0',
                    "relacion_campo_m_prioridad" => '0',
                    "relacion_campo_nm_condicion" => '',
                    "orden" => '1',
                    "llave_primaria" => '4',
                    "autonumerico" => '4',
                    "indice" => '5',
                    "unico" => '5',
                    "comentarios" => '',      
                    "lista" => '5',
                    "etiqueta_lista" => 'Id',
                    "orden_lista" => '1',
                    "nuevo" => '5',
                    "etiqueta_nuevo" => 'Id',
                    "orden_nuevo" => '1',
                    "editar" => '5',
                    "etiqueta_editar" => 'Id',
                    "orden_editar" => '1',
                    "filtros" => '5',
                    "etiqueta_filtros" => 'Id',
                    "orden_filtros" => '1'
                );
                $this->Model->insert('campos', $data_campo_id);


                $orden = 1;
                foreach ($mat_campos_nombres as $key => $campo_nombre) {
                    $orden++;
                    $campo_tamano = $mat_campos_tamanos[$key] * 1;
                    $campo_tipo = $mat_campos_tipos[$key];
                    if ($campo_tipo == '') $campo_tipo = 'varchar';
                    if ($campo_tipo == 'varchar') {
                        if ($campo_tamano > 0) {
                            if ($campo_tamano < 7) {
                                $campo_tipo = 'char';
                                $campo_tamano = 10;
                            } else {
                                $campo_tamano = (round($campo_tamano/10))*10+10;
                            }
                            if ($campo_tamano >= 250) {
                                $campo_tipo = 'text';
                                $campo_tamano = '';
                            }
                        } else {
                            $campo_tipo = 'char';
                            $campo_tamano = 10;
                        }
                    }
                    if ($campo_tipo == 'int') {
                        if ($campo_tamano > 10) {
                            $campo_tipo = 'varchar';
                            $campo_tamano = (round($campo_tamano/10))*10+10;
                        } else {
                            $campo_tamano = '11';   
                        }
                    }       

                    $nombre = texttovar($campo_nombre);
                    $etiqueta = ucwords(str_ireplace("_"," ",$nombre));

                    // -----------------
                    $tipo_campo = 0;
                    $tipo_entrada = 0;
                    if ($campo_tipo == 'int') {
                        $tipo_campo = 23; // INT
                        $tipo_entrada = 36; // NUMERIC
                    } else {
                        $tipo_campo = 24; // VARCHAR
                        if ($campo_tipo == 'text') {
                            $tipo_entrada = 41; // TEXT
                        } else {
                            $tipo_entrada = 42; // STRING
                        }
                    }

                    $lista = 4;
                    if ($orden > 7) {
                        $lista = 5;
                    }

                    $data_campo = array(
                        "usuario" => 1,
                        "proyecto" => $proyecto,
                        "version" => $version,
                        "tabla" => $tabla_id,
                        "nombre" => $nombre,
                        "etiqueta" => $etiqueta,
                        "tipo_dato" => $campo_tipo,
                        "tamano" => $campo_tamano,
                        "sin_signo" => '5',
                        "no_nulo" => '4',
                        "defecto" => '5',
                        "defecto_valor" => '',
                        "comentario" => '5',
                        "comentario_valor" => '',
                        "tipo_campo" => $tipo_campo,
                        "tipo_entrada" => $tipo_entrada,
                        "tipo_entrada_parametro" => '',
                        "archivo" => '5',
                        "archivo_ruta" => '',
                        "relacion_datos" => '0',
                        "relacion_tabla" => '0',
                        "relacion_campo" => '0',
                        "relacion_nombre" => '',
                        "relacion_condicion" => '',
                        "relacion_orden" => '',
                        "relacion_etiqueta_nm" => '',
                        "relacion_tabla_n" => '0',
                        "relacion_campo_n" => '0',
                        "relacion_tabla_m" => '0',
                        "relacion_campo_m_tabla_a" => '0',
                        "relacion_campo_m_tabla_b" => '0',
                        "relacion_campo_m_prioridad" => '0',
                        "relacion_campo_nm_condicion" => '',
                        "orden" => $orden,
                        "llave_primaria" => '5',
                        "autonumerico" => '5',
                        "indice" => '5',
                        "unico" => '5',
                        "comentarios" => '',      
                        "lista" => $lista,
                        "etiqueta_lista" => $etiqueta,
                        "orden_lista" => $orden,
                        "nuevo" => 4,
                        "etiqueta_nuevo" => $etiqueta,
                        "orden_nuevo" => $orden,
                        "editar" => 4,
                        "etiqueta_editar" => $etiqueta,
                        "orden_editar" => $orden,
                        "filtros" => 5,
                        "etiqueta_filtros" => $etiqueta,
                        "orden_filtros" => $orden
                    );

                    $id = $this->Model->insert('campos', $data_campo);
// -----------------

                }

            }

        }

// ---------------------------------------------------------------------------------------------------

        redirect(base_url() . 'admin/cruds/assistants/tablas_importar_datos');
    }


    function leer_archivo_plano ($dir, $archivo) {
        $plano = read_file($dir . $archivo);
        return $plano;
    }

    function leer_archivo ($dir, $archivo, $separador, $calificador_texto) {
        $datos = read_file($dir . $archivo);
        $mat_datos = explode("\n", $datos);
        $mat_filas = array();

        $sep = '';
        if ($separador == 1) $sep = ',';
        if ($separador == 2) $sep = ';';
        if ($separador == 3) $sep = "\t";

        foreach ($mat_datos as $filas) {
            $mat_fix = explode($sep, $filas);

            $cal_txt = '';
            if ($calificador_texto == 2) $cal_txt = "'"; 
            if ($calificador_texto == 3) $cal_txt = '"';

            foreach ($mat_fix as $key => $valor) {
                $valor = trim(utf8_encode($valor));
                $mat_fix[$key] = $valor;

                if ($cal_txt != '') {
                    if ($valor != '') {
                        $num_caracteres = strlen($valor) - 1;
                        if ($valor[0] == $cal_txt and $valor[$num_caracteres] == $cal_txt) {
                            $valor = substr ($valor, 0, - 1);
                            $num_caracteres = strlen($valor);
                            $valor = substr($valor, 1, $num_caracteres);
                            $mat_fix[$key] = $valor;
                        }
                    }
                }

            }

            $mat_filas[] = $mat_fix;
        }

        return $mat_filas;
    }

    public function tablas_importar_datos_seleccionar_archivo($archivo) {
        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $post = $this->input->post();

        $this->session->set_userdata('archivo_seleccionado', $archivo);

        $importar_datos = $this->Model->getRow('importar_datos', $archivo);

        $this->session->set_userdata('tabla_seleccionada_id', $importar_datos->tabla);

        redirect(base_url() . 'admin/cruds/assistants/tablas_importar_datos');
    }

    public function tablas_importar_datos_borrar_archivo($archivo) {
        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $post = $this->input->post();

        if ($this->session->has_userdata('archivo_seleccionado')) {
            if ($this->session->userdata('archivo_seleccionado') == $archivo) {
                $this->session->unset_userdata('archivo_seleccionado');
            }
        }

        $importar_datos = $this->Model->getRow('importar_datos', $archivo);
        $archivo_nombre = $importar_datos->archivo;

        $file = "./importar_datos/" . $archivo_nombre;
        if (!unlink($file)) {
            echo ("Error deleting $file");
        } else {
            echo ("Deleted $file");
        }

        $this->Model->delete('importar_datos', $archivo);

        redirect(base_url() . 'admin/cruds/assistants/tablas_importar_datos');
    }

    public function tablas_importar_datos_subir_archivo() {
        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $post = $this->input->post();

        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');

        if ($post['cod'] == '0') {
            $config["upload_path"] = "./importar_datos/";
            $config["allowed_types"] = "csv|txt";
            $config["max_size"] = 2048;
            $this->load->library("upload", $config); 
            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('archivo') ) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $upload_data = array('upload_data' => $this->upload->data());
                $data = array(
                    'usuario' =>  1,
                    'proyecto' => $proyecto,
                    'version' => $version,
                    'tabla' => $post['tabla'],
                    'archivo' => $upload_data['upload_data']['file_name'],
                    'encabezado' => $post['encabezado'],
                    'separador' => $post['separador'],
                    'calificador_texto' => $post['calificador_texto'],
                    'descripcion' => $post['descripcion'],
                    'fecha' => date('Y-m-d H:i:s')
                );
                $this->Model->insert('importar_datos', $data);
            }
        } else {

            if (trim($post['descripcion']) != '') {
                $data = array(
                    'tabla' => $post['tabla'],
                    'encabezado' => $post['encabezado'],
                    'separador' => $post['separador'],
                    'calificador_texto' => $post['calificador_texto'],
                    'descripcion' => $post['descripcion']
                );
            } else {
                $data = array(
                    'tabla' => $post['tabla'],
                    'encabezado' => $post['encabezado'],
                    'separador' => $post['separador'],
                    'calificador_texto' => $post['calificador_texto']
                );
            }

            $this->Model->update('importar_datos', $data, $post['cod']);

            $this->session->set_userdata('archivo_seleccionado', $post['cod']);
            $this->session->set_userdata('tabla_seleccionada_id', $post['tabla']);

        }

        redirect(base_url() . 'admin/cruds/assistants/tablas_importar_datos');

    }


    public function tablas_cruds_dependientes() {

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();
        $data['project'] = $this->session->userdata('project');
        $data['version'] = $this->session->userdata('version');
        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');        

        $data['tab'] = 2;
        $data['tab_class'][0] = '';
        $data['tab_class'][1] = '';
        $data['tab_class'][2] = ' class="active"';
        $data['tab_class'][3] = '';

        $data['tab_tablas'] = 2;
        $data['tab_class_tablas'][0] = '';
        $data['tab_class_tablas'][1] = '';
        $data['tab_class_tablas'][2] = ' class="active"';
        $data['tab_class_tablas'][3] = '';
        $data['tab_class_tablas'][4] = '';

        $crud_dependiente_seleccionado = 0;
        if ($this->session->has_userdata('crud_dependiente_seleccionado')) {
            $crud_dependiente_seleccionado = $this->session->userdata('crud_dependiente_seleccionado');
        }
        $data['crud_dependiente_seleccionado'] = $crud_dependiente_seleccionado;

        // $menus = $this->Model->registros('menus', '', array('proyecto' => $data['project'], 'version' => $data['version']), 'nombre' );
        // $data['menus'] = $menus;


        $menus_enlaces = $this->Model->registros('menus_enlaces', '', array('proyecto' => $data['project'], 'version' => $data['version']), 'orden' );
        $data['menus_enlaces'] = $menus_enlaces;


        $tablas = $this->Model->registros('tablas', '', array('proyecto' => $data['project'], 'version' => $data['version']), 'nombre' );
        $data['tablas'] = $tablas;

        $cruds_dependientes = $this->Model->registros('cruds_dependientes', '', array('proyecto' => $data['project'], 'version' => $data['version']), 'nombre' );
        $data['cruds_dependientes'] = $cruds_dependientes;

// LA PRIMERA VEZ "DEPENDE DE" UTILIZA LA LISTA DE "tablas"
// LA SIGUIENTES VECES UTILIZA "cruds_dependientes_detalles"

        $cruds_dependientes_detalles = $this->Model->registros('cruds_dependientes_detalles', '', array('proyecto' => $data['project'], 'version' => $data['version'], 'crud_dependiente' => $crud_dependiente_seleccionado), 'depende_de_tabla_nombre' );
        $data['cruds_dependientes_detalles'] = $cruds_dependientes_detalles;

        $proyectos = $this->Model->registros('proyectos', 'id, nombre', array(), 'nombre' );
        $data['proyectos'] = $proyectos;

        $resultado = '';
        if ( $this->session->flashdata('resultado') ) {
            $resultado = $this->session->flashdata('resultado');
            $resultado = '
            <div class="alert alert-info">
              <strong>Info!</strong> '.$resultado.'
            </div>';
        }
        $data['resultado'] = $resultado;

        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/tablas_tabs', 'admin/cruds/assistants/tablas_cruds_dependientes','admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Proyectos';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data);

    }

    public function traer_cruds_dependientes_tablas_dependientes() {
        $post = $this->input->post();
        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');   

        $tabla_nombre = $this->Model->getRowsJoin('cruds_dependientes_detalles', 'tabla', array(), array('proyecto' => $proyecto, 'version' => $version, 'codigo' => $post['codigo']));

        $relacion_tabla = $this->Model->getRowsJoin('tablas', 'id', array(), array('proyecto' => $proyecto, 'version' => $version, 'nombre' => $tabla_nombre[0]['tabla']));

        $depende_de_campos = $this->Model->getRowsJoin('campos', 'nombre, etiqueta_lista AS etiqueta', array(), array('proyecto' => $proyecto, 'version' => $version, 'tabla' => $relacion_tabla[0]['id']));

        $tablas = $this->Model->getRowsJoin('campos c', 't.nombre AS tabla_relacion, t.etiqueta', 
            array('tablas t' => array('c.tabla = t.id','')), 
            array('c.proyecto' => $proyecto, 'c.version' => $version, 'c.relacion_tabla' => $relacion_tabla[0]['id']));

        echo json_encode(array('tablas'=>$tablas, 'tabla_nombre' => $tabla_nombre[0]['tabla'], 'depende_de_campos' => $depende_de_campos));
    }

    public function traer_cruds_dependientes_crud_relacion() {
        $post = $this->input->post();
        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');   

        $tabla = $this->Model->getRowsJoin('tablas', 'id, etiqueta', array(), array('proyecto' => $proyecto, 'version' => $version, 'nombre' => $post['tabla']));
        $campos_relacion = $this->Model->getRowsJoin('campos', 'nombre, etiqueta_lista AS etiqueta', array(), array('proyecto' => $proyecto, 'version' => $version, 'tabla' => $tabla[0]['id']));

        echo json_encode(array('tabla_etiqueta' => $tabla[0]['etiqueta'], 'campos_relacion' => $campos_relacion));
    }


    public function tablas_cruds_dependientes_borrar($id) {

        $this->Model->delete('cruds_dependientes_detalles', $id);
        redirect(base_url() . 'admin/cruds/assistants/tablas_cruds_dependientes');            

    }


    public function tablas_cruds_dependientes_guardar_crud_dependiente() {
        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $post = $this->input->post();

        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');

        $crud_dependiente_seleccionado = 0;
        if ($this->session->has_userdata('crud_dependiente_seleccionado')) {
            $crud_dependiente_seleccionado = $this->session->userdata('crud_dependiente_seleccionado');
        }

        $codigo = 'CD-' . str_pad(mt_rand(0, 9999999), 7, '0', STR_PAD_LEFT);
        if (isset($post['tabla_inicial'])) {
            $tablas = $this->Model->registros('tablas', '', array('proyecto' => $proyecto, 'version' => $version, 'nombre' => $post['tabla_inicial']));
            $data = array(
                'usuario' => 1,
                'proyecto' => $proyecto,
                'version' => $version,
                'crud_dependiente' => $crud_dependiente_seleccionado,
                'codigo' => $codigo,
                'tabla' => $post['tabla_inicial'],
                'etiqueta' => $tablas[0]['etiqueta']
            );
            $this->Model->insert('cruds_dependientes_detalles', $data);
        } else {
            $data = array(
                'usuario' => 1,
                'proyecto' => $proyecto,
                'version' => $version,
                'crud_dependiente' => $crud_dependiente_seleccionado,
                'codigo' => $codigo,
                'depende_de' => $post['depende_de'],
                'depende_de_tabla_nombre' => $post['depende_de_tabla_nombre'],
                'depende_de_campo_relacion' => $post['depende_de_campo_relacion'],
                'depende_de_campo_nombre' => $post['depende_de_campo_nombre'],
                'depende_de_campo_num_registros' => $post['depende_de_campo_num_registros'],
                'tabla' => $post['tabla'],
                'etiqueta' => $post['etiqueta'],
                'campo_relacion' => $post['campo_relacion']
            );

            $this->Model->insert('cruds_dependientes_detalles', $data);
        }


        redirect(base_url() . 'admin/cruds/assistants/tablas_cruds_dependientes');
    }

    public function tablas_cruds_dependientes_crear_crud_dependiente() {
        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $post = $this->input->post();

        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');

        $data = array(
            'usuario' => 1,
            'proyecto' => $proyecto,
            'version' => $version,
            'nombre' => $post['nombre']
        );
        $menu = $this->Model->insert('cruds_dependientes', $data);

        $this->session->set_userdata('crud_dependiente_seleccionado', $menu);

        redirect(base_url() . 'admin/cruds/assistants/tablas_cruds_dependientes');
    }

    public function tablas_cruds_dependientes_seleccionar_crud_dependiente() {
        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $post = $this->input->post();

        $this->session->set_userdata('crud_dependiente_seleccionado', $post['crud_dependiente']);
        redirect(base_url() . 'admin/cruds/assistants/tablas_cruds_dependientes');
    }

    // public function tablas_cruds_dependientes_copiar_crud_dependiente() {
    //     if ( !$this->session->has_userdata('project') ) {
    //         redirect( base_url() . "admin/cruds/assistants/selprojver" );
    //     }

    //     $proyecto = $this->session->userdata('project');
    //     $version = $this->session->userdata('version');

    //     $crud_dependiente_seleccionado = 0;
    //     if ($this->session->has_userdata('crud_dependiente_seleccionado')) {
    //         $crud_dependiente_seleccionado = $this->session->userdata('crud_dependiente_seleccionado');
    //         if ($crud_dependiente_seleccionado > 0) {
    //             $post = $this->input->post();
    //             $menu = $this->Model->registro('cruds_dependientes', $post['copiar_crud_dependiente']);
    //             if (isset($menu->nombre)) {

    //                 $cruds_dependientes_detalles = $this->Model->registros('cruds_dependientes_detalles', '',
    //                      array('proyecto' => $post['copiar_proyecto'], 
    //                         'version' => $post['copiar_version'], 
    //                         'crud_dependiente' => $post['copiar_crud_dependiente']), 'id' );

    //                 foreach ($cruds_dependientes_detalles as $regDetalles) {
    //                     $data = array(
    //                         'usuario' => 1,
    //                         'proyecto' => $proyecto,
    //                         'version' => $version,
    //                         'crud_dependiente' => $crud_dependiente_seleccionado,
    //                         'codigo' => $regDetalles['codigo'],
    //                         'depende_de' => $regDetalles['depende_de'], 
    //                         'tabla' => $regDetalles['tabla'], 
    //                         'etiqueta' => $regDetalles['etiqueta'], 
    //                         'campo_relacion' => $regDetalles['campo_relacion'], 
    //                         'depende_de_tabla_nombre' => $regDetalles['depende_de_tabla_nombre'], 
    //                         'depende_de_campo_relacion' => $regDetalles['depende_de_campo_relacion'], 
    //                         'depende_de_campo_nombre' => $regDetalles['depende_de_campo_nombre'], 
    //                         'depende_de_campo_num_registros' => $regDetalles['depende_de_campo_num_registros'], 
    //                     );
    //                     $this->Model->insert('cruds_dependientes_detalles', $data);
    //                 }

    //             }
    //         }
    //     }

    //     redirect(base_url() . 'admin/cruds/assistants/tablas_cruds_dependientes');

    // }



	// - Tablas - Fin  ------------------------------------------------------------------

	// - Campos - Inicio ----------------------------------------------------------------
    public function campos() { 

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();
        $data['project'] = $this->session->userdata('project');
        $data['version'] = $this->session->userdata('version');

        $data['tab'] = 2;
        $data['tab_class'][0] = '';
        $data['tab_class'][1] = '';
        $data['tab_class'][2] = '';
        $data['tab_class'][3] = ' class="active"';

        // $this->parser->parse('admin/cruds/assistants/cabeza', $data);
        // $this->parser->parse('admin/cruds/assistants/campos', $data);
        // $this->parser->parse('admin/cruds/assistants/pie', $data);

        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/campos', 'admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Proyectos';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data);

    }

    public function campos_lista() { 

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();
        $data['project'] = $this->session->userdata('project');
        $data['version'] = $this->session->userdata('version');
        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');        

        $data['tab'] = 3;
        $data['tab_class'][0] = '';
        $data['tab_class'][1] = '';
        $data['tab_class'][2] = '';
        $data['tab_class'][3] = ' class="active"';

        $data['tab_campos'] = 0;
        $data['tab_class_campos'][0] = ' class="active"';
        $data['tab_class_campos'][1] = '';
        $data['tab_class_campos'][2] = '';
        $data['tab_class_campos'][3] = '';
        $data['tab_class_campos'][4] = '';
        $data['tab_class_campos'][5] = '';
        $data['tab_class_campos'][6] = '';
        $data['tab_class_campos'][7] = '';

        $tablas = $this->Model->registros('tablas', 'id, nombre', array('proyecto'=>$data['project'], 'version'=>$data['version']), 'nombre' );
        $data['tablas'] = $tablas;

        $data['crud'] = 'lista';

        $crud_tabla = 0;
        if ($this->session->has_userdata('crud_tabla')) {
            $crud_tabla = $this->session->userdata('crud_tabla');
        }
        $data['crud_tabla'] = $crud_tabla;

        // $this->parser->parse('admin/cruds/assistants/cabeza', $data);
        // $this->parser->parse('admin/cruds/assistants/campos_tabs', $data);
        // $this->parser->parse('admin/cruds/assistants/campos_crud', $data);
        // $this->parser->parse('admin/cruds/assistants/pie', $data);

        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/campos_tabs', 'admin/cruds/assistants/campos_crud', 'admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Proyectos';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data);

    }

    public function campos_nuevo() { 

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();
        $data['project'] = $this->session->userdata('project');
        $data['version'] = $this->session->userdata('version');
        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');        

        $data['tab'] = 3;
        $data['tab_class'][0] = '';
        $data['tab_class'][1] = '';
        $data['tab_class'][2] = '';
        $data['tab_class'][3] = ' class="active"';

        $data['tab_campos'] = 1;
        $data['tab_class_campos'][0] = '';
        $data['tab_class_campos'][1] = ' class="active"';
        $data['tab_class_campos'][2] = '';
        $data['tab_class_campos'][3] = '';
        $data['tab_class_campos'][4] = '';
        $data['tab_class_campos'][5] = '';
        $data['tab_class_campos'][6] = '';
        $data['tab_class_campos'][7] = '';

        $tablas = $this->Model->registros('tablas', 'id, nombre', array('proyecto'=>$data['project'], 'version'=>$data['version']), 'nombre' );
        $data['tablas'] = $tablas;

        $data['crud'] = 'nuevo';

        $crud_tabla = 0;
        if ($this->session->has_userdata('crud_tabla')) {
            $crud_tabla = $this->session->userdata('crud_tabla');
        }
        $data['crud_tabla'] = $crud_tabla;

        // $this->parser->parse('admin/cruds/assistants/cabeza', $data);
        // $this->parser->parse('admin/cruds/assistants/campos_tabs', $data);
        // $this->parser->parse('admin/cruds/assistants/campos_crud', $data);
        // $this->parser->parse('admin/cruds/assistants/pie', $data);

        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/campos_tabs', 'admin/cruds/assistants/campos_crud', 'admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Proyectos';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data);


    }

    public function campos_editar() { 

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();
        $data['project'] = $this->session->userdata('project');
        $data['version'] = $this->session->userdata('version');
        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');        

        $data['tab'] = 3;
        $data['tab_class'][0] = '';
        $data['tab_class'][1] = '';
        $data['tab_class'][2] = '';
        $data['tab_class'][3] = ' class="active"';

        $data['tab_campos'] = 2;
        $data['tab_class_campos'][0] = '';
        $data['tab_class_campos'][1] = '';
        $data['tab_class_campos'][2] = ' class="active"';
        $data['tab_class_campos'][3] = '';
        $data['tab_class_campos'][4] = '';
        $data['tab_class_campos'][5] = '';
        $data['tab_class_campos'][6] = '';
        $data['tab_class_campos'][7] = '';

        $tablas = $this->Model->registros('tablas', 'id, nombre', array('proyecto'=>$data['project'], 'version'=>$data['version']), 'nombre' );
        $data['tablas'] = $tablas;

        $data['crud'] = 'editar';

        $crud_tabla = 0;
        if ($this->session->has_userdata('crud_tabla')) {
            $crud_tabla = $this->session->userdata('crud_tabla');
        }
        $data['crud_tabla'] = $crud_tabla;
        
        // $this->parser->parse('admin/cruds/assistants/cabeza', $data);
        // $this->parser->parse('admin/cruds/assistants/campos_tabs', $data);
        // $this->parser->parse('admin/cruds/assistants/campos_crud', $data);
        // $this->parser->parse('admin/cruds/assistants/pie', $data);

        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/campos_tabs', 'admin/cruds/assistants/campos_crud', 'admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Campos - Filtrar';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data);        

    }



    public function campos_filtros() { 

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();
        $data['project'] = $this->session->userdata('project');
        $data['version'] = $this->session->userdata('version');
        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');        

        $data['tab'] = 3;
        $data['tab_class'][0] = '';
        $data['tab_class'][1] = '';
        $data['tab_class'][2] = '';
        $data['tab_class'][3] = ' class="active"';

        $data['tab_campos'] = 2;
        $data['tab_class_campos'][0] = '';
        $data['tab_class_campos'][1] = '';
        $data['tab_class_campos'][2] = '';
        $data['tab_class_campos'][3] = '';
        $data['tab_class_campos'][4] = '';
        $data['tab_class_campos'][5] = '';
        $data['tab_class_campos'][6] = '';
        $data['tab_class_campos'][7] = ' class="active"';

        $tablas = $this->Model->registros('tablas', 'id, nombre', array('proyecto'=>$data['project'], 'version'=>$data['version']), 'nombre' );
        $data['tablas'] = $tablas;

        $data['crud'] = 'filtros';

        $crud_tabla = 0;
        if ($this->session->has_userdata('crud_tabla')) {
            $crud_tabla = $this->session->userdata('crud_tabla');
        }
        $data['crud_tabla'] = $crud_tabla;

        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/campos_tabs', 'admin/cruds/assistants/campos_crud', 'admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Proyectos';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data);        

    }



    public function traer_campos() {
        $post = $this->input->post();
        $this->session->set_userdata('crud_tabla', $post['tabla']);        
        $campos = $this->Model->registros('campos', '', array('tabla'=>$post['tabla']), 'orden_' . $post['crud'] );
        echo json_encode(array('campos'=>$campos));
    }

    public function actualiza_dato_campos() {
        $post = $this->input->post();
        $datos[$post['campo']] = $post['valor'];

        if ($post['lista'] == '1') $datos['etiqueta_lista'] = $post['valor'];
        if ($post['nuevo'] == '1') $datos['etiqueta_nuevo'] = $post['valor'];
        if ($post['editar'] == '1') $datos['etiqueta_editar'] = $post['valor'];
        if ($post['filtros'] == '1') $datos['etiqueta_filtros'] = $post['valor'];

        $this->Model->actualizar('campos', $datos, $post['id'] );
    }

    public function orden_campos() {
        $post = $this->input->post();

        if ($post['orden'] != '0') {
            $i = 0;
            $mat_orden = explode(',', $post['orden']);
            foreach ($mat_orden as $key => $id) {
                $i++;
                $this->Model->actualizar('campos', array('orden_' . $post['crud'] => $i), $id);
            }
        }
        
    }

    public function campos_etiquetas() {

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();
        $data['project'] = $this->session->userdata('project');
        $data['version'] = $this->session->userdata('version');
        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');        

        $data['tab'] = 3;
        $data['tab_class'][0] = '';
        $data['tab_class'][1] = '';
        $data['tab_class'][2] = '';
        $data['tab_class'][3] = ' class="active"';

        $data['tab_campos'] = 3;
        $data['tab_class_campos'][0] = '';
        $data['tab_class_campos'][1] = '';
        $data['tab_class_campos'][2] = '';
        $data['tab_class_campos'][3] = ' class="active"';
        $data['tab_class_campos'][4] = '';
        $data['tab_class_campos'][5] = '';
        $data['tab_class_campos'][6] = '';
        $data['tab_class_campos'][7] = '';

        $registros = $this->Model->getRowsJoin('campos c', 't.nombre AS nombreTabla, t.etiqueta AS etiquetaTabla, c.*', array('tablas t' => array('c.tabla = t.id','')), "c.proyecto = ".$data['project']." AND c.`version` = ".$data['version'] );
        $data['registros'] = $registros;

        // $this->parser->parse('admin/cruds/assistants/cabeza', $data);
        // $this->parser->parse('admin/cruds/assistants/campos_tabs', $data);
        // $this->parser->parse('admin/cruds/assistants/campos_etiquetas', $data);
        // $this->parser->parse('admin/cruds/assistants/pie', $data);

        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/campos_tabs', 'admin/cruds/assistants/campos_etiquetas', 'admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Proyectos';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data);        

    }

    public function campos_etiquetas_procesar() {

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $post = $this->input->post();

        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');
        
        if (isset($post['seleccion'])) {
            foreach ($post['seleccion'] as $campo) {
                $data = array(
                    'etiqueta_lista' => $post['etiqueta'],
                    'etiqueta_nuevo' => $post['etiqueta'],
                    'etiqueta_editar' => $post['etiqueta'],
                    'etiqueta_filtros' => $post['etiqueta'],
                    'comentarios' => $post['comentarios'],
                );
                $this->Model->update('campos', $data, $campo);
            }
        }

        redirect(base_url() . 'admin/cruds/assistants/campos_etiquetas');

    }

    public function campos_validaciones() {

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();
        $data['project'] = $this->session->userdata('project');
        $data['version'] = $this->session->userdata('version');
        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');        

        $data['tab'] = 3;
        $data['tab_class'][0] = '';
        $data['tab_class'][1] = '';
        $data['tab_class'][2] = '';
        $data['tab_class'][3] = ' class="active"';

        $data['tab_campos'] = 4;
        $data['tab_class_campos'][0] = '';
        $data['tab_class_campos'][1] = '';
        $data['tab_class_campos'][2] = '';
        $data['tab_class_campos'][3] = '';
        $data['tab_class_campos'][4] = ' class="active"';
        $data['tab_class_campos'][5] = '';
        $data['tab_class_campos'][6] = '';
        $data['tab_class_campos'][7] = '';

        $registros = $this->Model->getRowsJoin('campos c', 't.nombre AS nombreTabla, t.etiqueta AS etiquetaTabla, c.*', array('tablas t' => array('c.tabla = t.id','')), "c.proyecto = ".$data['project']." AND c.`version` = ".$data['version'] );
        $validaciones = $this->Model->registros('datos_valores', '', array('dato' => 7), 'nombre' );

        $data['registros'] = $registros;
        $data['validaciones'] = $validaciones;

        $validaciones_cabeceras = '';
        $lista_filtros = '';
        $filtro = 6;
        foreach ($validaciones as $registro) {
            $validaciones_cabeceras .= '<th>' . $registro['nombre'] . '</th>';
            $filtro++;
            $lista_filtros .= ',' . $filtro;
        }

        $validaciones_datos = array();
        foreach ($registros as $reg1) {
            foreach ($validaciones as $reg2) {
                $valor = '';
                $campos_validaciones = $this->Model->getRowsJoin('campos_validaciones', '', array(), array('proyecto' => $proyecto, 'version' => $version, 'tabla' => $reg1['tabla'], 'campo' => $reg1['id'], 'validacion' => $reg2['id']) );
                if (count($campos_validaciones)) {
                    if ($reg2['auxiliar_3'] == 'true') {
                        $valor = 'Si';            
                    } else {
                        $valor = $campos_validaciones[0]['parametro'];
                    }
                }
                $validaciones_datos[$reg1['id']][$reg2['id']] = $valor;
            }
        }

        $data['validaciones_cabeceras'] = $validaciones_cabeceras;
        $data['validaciones_datos'] = $validaciones_datos;
        $data['lista_filtros'] = $lista_filtros;

        // $this->parser->parse('admin/cruds/assistants/cabeza', $data);
        // $this->parser->parse('admin/cruds/assistants/campos_tabs', $data);
        // $this->parser->parse('admin/cruds/assistants/campos_validaciones', $data);
        // $this->parser->parse('admin/cruds/assistants/pie', $data);

        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/campos_tabs', 'admin/cruds/assistants/campos_validaciones', 'admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Proyectos';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data);         

    }

    function campos_validaciones_procesar() {

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $post = $this->input->post();

        $proyecto = $this->session->userdata('project');
        $version = $this->session->userdata('version');
        
        if (isset($post['seleccion'])) {
            foreach ($post['seleccion'] as $campo) {

                $data = array(
                    'archivo' => 5,
                    'archivo_ruta' => ''
                );
                $this->Model->update('campos', $data, $campo);

                $registro = $this->Model->getRow('campos', $campo);
                $tabla = $registro->tabla;
                $this->Model->delete('campos_validaciones', '', '', 
                    array('proyecto' => $proyecto, 'version' => $version, 'tabla' => $tabla, 'campo' => $campo));
                if (isset($post['validaciones'])) {
                    foreach ($post['validaciones'] as $validacion => $value) {
                        $parametro = $post['parametros'][$validacion];

                        if ($validacion == 999) {
                            $data = array(
                                'archivo' => 4,
                                'archivo_ruta' => $parametro
                            );
                            $this->Model->update('campos', $data, $campo);
                        } else {
                            $data = array(
                                'usuario' => 1,
                                'proyecto' => $proyecto,
                                'version' => $version,
                                'tabla' => $tabla,
                                'campo' => $campo,
                                'validacion' => $validacion,
                                'parametro' => $parametro
                            );
                            $this->Model->insert('campos_validaciones', $data);
                        }

                    }
                }
            }
        }

        redirect(base_url() . 'admin/cruds/assistants/campos_validaciones');

    }

    public function campos_relaciones_1n() {

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();
        $data['project'] = $this->session->userdata('project');
        $data['version'] = $this->session->userdata('version');

        $data['tab'] = 3;
        $data['tab_class'][0] = '';
        $data['tab_class'][1] = '';
        $data['tab_class'][2] = '';
        $data['tab_class'][3] = ' class="active"';

        $data['tab_campos'] = 5;
        $data['tab_class_campos'][0] = '';
        $data['tab_class_campos'][1] = '';
        $data['tab_class_campos'][2] = '';
        $data['tab_class_campos'][3] = '';
        $data['tab_class_campos'][4] = '';
        $data['tab_class_campos'][5] = ' class="active"';
        $data['tab_class_campos'][6] = '';
        $data['tab_class_campos'][7] = '';

        $registros = $this->Model->getRowsJoin('campos c', 't.nombre AS nombreTabla, c.*', array('tablas t' => array('c.tabla = t.id','')), "c.proyecto = ".$data['project']." AND c.`version` = ".$data['version']." AND c.tipo_dato = 'int'" );

// echo "<pre>";
// print_r($registros);
// echo "</pre>";


        $tablas = $this->Model->registros('tablas', 'id, nombre', array('proyecto'=>$data['project'], 'version'=>$data['version']), 'nombre' );
        $campos = $this->Model->registros('campos', 'id, nombre, tabla', array('proyecto'=>$data['project'], 'version'=>$data['version']), 'tabla, orden' );

        $proyectos = $this->Model->registros('proyectos', 'id, nombre', array(), 'nombre' );
        $versiones = $this->Model->registros('versiones', 'id, proyecto, nombre', array(), 'nombre' );

        $data['registros'] = $registros;
        $data['tablas'] = $tablas;
        $data['campos'] = $campos;

        $data['proyectos'] = $proyectos;
        $data['versiones'] = $versiones;

        // $this->parser->parse('admin/cruds/assistants/cabeza', $data);
        // $this->parser->parse('admin/cruds/assistants/campos_tabs', $data);
        // $this->parser->parse('admin/cruds/assistants/campos_relaciones_1n', $data);
        // $this->parser->parse('admin/cruds/assistants/pie', $data);

        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/campos_tabs', 'admin/cruds/assistants/campos_relaciones_1n', 'admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Proyectos';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data); 

    }   

    function campos_relaciones_1n_procesar() {

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        // ini_set('max_execution_time', 0);
        $post = $this->input->post();

        $post['proyecto'] = $this->session->userdata('project');
        $post['version'] = $this->session->userdata('version');

        if ( trim($post['copiar_proyecto']) != '' and  trim($post['copiar_version']) != ''  ) {

            $copiar_de = $this->Model->getRowsJoin('campos c', 't.nombre AS nombreTabla, c.id, c.tabla, c.archivo, c.archivo_ruta, c.nombre, c.relacion_datos, c.relacion_tabla, c.relacion_campo, c.relacion_nombre, c.relacion_condicion, c.relacion_orden, c.lista, c.nuevo, c.editar, c.filtros, c.etiqueta_lista, c.etiqueta_nuevo, c.etiqueta_editar, c.etiqueta_filtros, c.orden_lista, c.orden_nuevo, c.orden_editar, c.orden_filtros', array('tablas t' => array('c.tabla = t.id','')), "c.proyecto = $post[copiar_proyecto] AND c.`version` = $post[copiar_version]" ); //  AND c.nombre LIKE '%_id'

            foreach ($copiar_de as $key => $reg_copiar_de) {

                $pegar_en = $this->Model->getRowsJoin('campos c', 'c.id, c.tabla', array('tablas t' => array('c.tabla = t.id','')), "c.proyecto = $post[proyecto] AND c.`version` = $post[version] AND c.nombre = '$reg_copiar_de[nombre]' AND t.nombre = '$reg_copiar_de[nombreTabla]'" );

                if (count($pegar_en)) {
// - Copiar Relaciones, Etiquetas y Orden - Inicio -----------------------------------------------------------------------------------

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
                        'relacion_tabla' => $relacion_tabla,
                        'relacion_campo' => $relacion_campo,
                        'relacion_nombre' => $relacion_nombre,
                        'relacion_condicion' => $reg_copiar_de['relacion_condicion'],
                        'relacion_orden' => $reg_copiar_de['relacion_orden'],
                        'archivo' => $reg_copiar_de['archivo'], 
                        'archivo_ruta' => $reg_copiar_de['archivo_ruta'], 
                        'lista' => $reg_copiar_de['lista'], 
                        'nuevo' => $reg_copiar_de['nuevo'], 
                        'editar' => $reg_copiar_de['editar'], 
                        'filtros' => $reg_copiar_de['filtros'], 
                        'etiqueta_lista' => $reg_copiar_de['etiqueta_lista'], 
                        'etiqueta_nuevo' => $reg_copiar_de['etiqueta_nuevo'], 
                        'etiqueta_editar' => $reg_copiar_de['etiqueta_editar'], 
                        'etiqueta_filtros' => $reg_copiar_de['etiqueta_filtros'], 
                        'orden_lista' => $reg_copiar_de['orden_lista'], 
                        'orden_nuevo' => $reg_copiar_de['orden_nuevo'], 
                        'orden_editar' => $reg_copiar_de['orden_editar'],
                        'orden_filtros' => $reg_copiar_de['orden_filtros']
                    );
                    $this->Model->actualizar('campos', $data, $pegar_en[0]['id'] );

// - Copiar Relaciones, Etiquetas y Orden - Fin --------------------------------------------------------------------------------------


// - Copiar Validaciones - Inicio -----------------------------------------------------------------------------------

// Borra las validaciones de este campo en el proyecto nuevo si tiene
                    $this->Model->delete('campos_validaciones', '', '', array('campo' => $pegar_en[0]['id']) );

// Lee las validaciones de este campo en el proyecto anterior
                    $validaciones_copiar_de = $this->Model->getRowsJoin('campos_validaciones', '', array(), array('campo' => $reg_copiar_de['id']) ); 

                    foreach ($validaciones_copiar_de as $key => $reg_validaciones_copiar_de) {
                        // crea las validaciones de este campo en el nuevo proyecto
                        $data = array(
                            'usuario' => 1,
                            'proyecto' => $post['proyecto'],
                            'version' => $post['version'],
                            'tabla' => $pegar_en[0]['tabla'],
                            'campo' => $pegar_en[0]['id'],
                            'validacion' => $reg_validaciones_copiar_de['validacion'], 
                            'parametro' => $reg_validaciones_copiar_de['parametro'] 
                        );
                        $this->Model->insert('campos_validaciones', $data);

                    }
// - Copiar Validaciones - Fin --------------------------------------------------------------------------------------

                }
            }

        } else {
            $data = array(
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

        redirect(base_url() . 'admin/cruds/assistants/campos_relaciones_1n');

    }

    public function campos_tipos_datos() {

        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $data['projectVersionTitle'] = $this->admin_design->_projectVersionTitle();
        $data['project'] = $this->session->userdata('project');
        $data['version'] = $this->session->userdata('version');

        $data['tab'] = 3;
        $data['tab_class'][0] = '';
        $data['tab_class'][1] = '';
        $data['tab_class'][2] = '';
        $data['tab_class'][3] = ' class="active"';

        $data['tab_campos'] = 6;
        $data['tab_class_campos'][0] = '';
        $data['tab_class_campos'][1] = '';
        $data['tab_class_campos'][2] = '';
        $data['tab_class_campos'][3] = '';
        $data['tab_class_campos'][4] = '';
        $data['tab_class_campos'][5] = '';
        $data['tab_class_campos'][6] = ' class="active"';
        $data['tab_class_campos'][7] = '';

        $registros = $this->Model->getRowsJoin('campos c', 't.nombre AS nombreTabla, t.etiqueta AS etiquetaTabla, c.*', array('tablas t' => array('c.tabla = t.id','')), "c.proyecto = ".$data['project']." AND c.`version` = ".$data['version'] );
        $sqls = $this->Model->getRowsJoin('sqls', 'sql', array(), "status_id = 0 AND project = ".$data['project']." AND `version` = ".$data['version'], 'created_at DESC' );

        $data['registros'] = $registros;
        $data['sqls'] = $sqls;

        // $this->parser->parse('admin/cruds/assistants/cabeza', $data);
        // $this->parser->parse('admin/cruds/assistants/campos_tabs', $data);
        // $this->parser->parse('admin/cruds/assistants/campos_tipos_datos', $data);
        // $this->parser->parse('admin/cruds/assistants/pie', $data);        

        $this->parameters['template'] = 'assistants';
        $this->parameters['type'] = array('admin/cruds/assistants/assistants_cabeza', 'admin/cruds/assistants/campos_tabs', 'admin/cruds/assistants/campos_tipos_datos', 'admin/cruds/assistants/assistants_pie');
        $this->parameters['path'] = '';
        $this->parameters['title'] = 'Asistentes - Proyectos';
        $this->parameters['subtitle'] = $this->admin_design->_projectVersionTitle();
        $this->parameters['head_title'] = $this->parameters['title'];
        $this->parameters['breadcrumb'] = $this->breadcrumb; 

        $this->admin_design->layout3($this->parameters, $data); 


    }

    public function campos_tipos_datos_procesar() {
        if ( !$this->session->has_userdata('project') ) {
            redirect( base_url() . "admin/cruds/assistants/selprojver" );
        }

        $post = $this->input->post();

        $sql = '';
        foreach ($post['seleccion'] as $campo_id) {

            $campo = $this->Model->getRowsJoin('campos c', 't.nombre AS nombreTabla, c.*', array('tablas t' => array('c.tabla = t.id','')), array("c.id" => $campo_id) );

            $nombreTabla = $campo[0]['nombreTabla'];
            $nombreCampo = $campo[0]['nombre'];

            if ($post['tipo'] == 'date' or $post['tipo'] == 'datetime' or $post['tipo'] == 'timestamp' or $post['tipo'] == 'time' or $post['tipo'] == 'float' or $post['tipo'] == 'longtext' or $post['tipo'] == 'mediumtext' or $post['tipo'] == 'text' or $post['tipo'] == 'tinytext') {
                $tipo_tamano = $post['tipo'];
                $post['tamano'] = '';
            } else {
                $tipo_tamano = $post['tipo'] . '(' . $post['tamano'] . ')';
            }

            if (trim($post['nombre']) != '') {
                $data = array(
                    'nombre' => trim($post['nombre']), 
                    'tipo_dato' => $post['tipo'], 
                    'tamano' => trim($post['tamano'])
                );
                $nombreCampoActualizar = trim($post['nombre']);
            } else {
                $data = array(
                    'tipo_dato' => $post['tipo'],
                    'tamano' => trim($post['tamano'])
                );
                $nombreCampoActualizar = $nombreCampo;
            }
            $this->Model->update('campos', $data, $campo_id);

            $sql = "ALTER TABLE `$nombreTabla` CHANGE COLUMN `$nombreCampo` `$nombreCampoActualizar` $tipo_tamano NOT NULL;";

            $tabla_id = $campo[0]['tabla'];

            $data_sqls = array(
                'user' => 1,
                'project' => $this->session->userdata('project'),
                'version' => $this->session->userdata('version'),
                'tabla' => $tabla_id,
                'campo' => $campo_id,
                'sql' => $sql,
                'status_id' => 0,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->Model->insert('sqls', $data_sqls);

        }

        redirect(base_url() . 'admin/cruds/assistants/campos_tipos_datos');

    }

	// - Campos - Fin  ------------------------------------------------------------------

}