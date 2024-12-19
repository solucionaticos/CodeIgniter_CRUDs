<?php
defined("BASEPATH") OR exit("No direct script access allowed");
/**
 * @autor: Solucionaticos.com
 * @nombre: Usuarios_actividad.php
 * @version: 1.0
 * @fecha: 2020-02-18 21:55:53 
 * */

class Usuarios_actividad extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        // $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("usuarios_actividad"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("usuario_id","fecha_ingreso","ip","pais_id","dispositivo_id","agente_id","fecha_ultima_accion","permanencia");
        //-- Nuevo --------
        $crud->add_fields("usuario_id","fecha_ingreso","ip","pais_id","dispositivo_id","agente_id","fecha_ultima_accion","permanencia");
        //-- Editar --------
        $crud->edit_fields("usuario_id","fecha_ingreso","ip","pais_id","dispositivo_id","agente_id","fecha_ultima_accion","permanencia");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("usuario_id","Usuario Id");
        $crud->display_as("fecha_ingreso","Fecha Ingreso");
        $crud->display_as("ip","Ip");
        $crud->display_as("pais_id","Pais Id");
        $crud->display_as("dispositivo_id","Dispositivo Id");
        $crud->display_as("agente_id","Agente Id");
        $crud->display_as("fecha_ultima_accion","Fecha Ultima Accion");
        $crud->display_as("permanencia","Permanencia");
        //-- Tipos de Campos --------
        $crud->field_type("id", "numeric");
        $crud->field_type("fecha_ingreso", "datetime");
        $crud->field_type("ip", "string");
        $crud->field_type("fecha_ultima_accion", "datetime");
        $crud->field_type("permanencia", "numeric");
        //-- Relaciones 1-N --------
        $crud->set_relation("usuario_id", "usuarios","nombre");
        $crud->set_relation("pais_id", "datos_paises","nombre");
        $crud->set_relation("dispositivo_id", "datos_dispositivos","nombre");
        $crud->set_relation("agente_id", "datos_agentes","nombre");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "usuarios_actividad_before_insert"));
        $crud->callback_before_update(array($this, "usuarios_actividad_before_update"));
        $crud->callback_before_delete(array($this, "usuarios_actividad_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "usuarios_actividad_after_insert"));
        $crud->callback_after_update(array($this, "usuarios_actividad_after_update"));
        $crud->callback_after_delete(array($this, "usuarios_actividad_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->admin_design->crudShow($crudTabla, "Usuarios_actividad"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function usuarios_actividad_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function usuarios_actividad_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function usuarios_actividad_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function usuarios_actividad_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function usuarios_actividad_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function usuarios_actividad_after_delete($id) {


        return true;
    }

}
