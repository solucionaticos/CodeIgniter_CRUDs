<?php
defined("BASEPATH") OR exit("No direct script access allowed");
/**
 * @autor: Solucionaticos.com
 * @nombre: Usuarios_actividad_detalle.php
 * @version: 1.0
 * @fecha: 2020-02-18 21:55:53 
 * */

class Usuarios_actividad_detalle extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        // $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("usuarios_actividad_detalle"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("usuario_id","actividad_id","fecha","ruta_id");
        //-- Nuevo --------
        $crud->add_fields("usuario_id","actividad_id","fecha","ruta_id");
        //-- Editar --------
        $crud->edit_fields("usuario_id","actividad_id","fecha","ruta_id");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("usuario_id","Usuario Id");
        $crud->display_as("actividad_id","Actividad Id");
        $crud->display_as("fecha","Fecha");
        $crud->display_as("ruta_id","Ruta Id");
        //-- Tipos de Campos --------
        $crud->field_type("id", "numeric");
        $crud->field_type("fecha", "datetime");
        //-- Relaciones 1-N --------
        $crud->set_relation("usuario_id", "usuarios","nombre");
        $crud->set_relation("actividad_id", "usuarios_actividad","id");
        $crud->set_relation("ruta_id", "datos_rutas","nombre");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "usuarios_actividad_detalle_before_insert"));
        $crud->callback_before_update(array($this, "usuarios_actividad_detalle_before_update"));
        $crud->callback_before_delete(array($this, "usuarios_actividad_detalle_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "usuarios_actividad_detalle_after_insert"));
        $crud->callback_after_update(array($this, "usuarios_actividad_detalle_after_update"));
        $crud->callback_after_delete(array($this, "usuarios_actividad_detalle_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->admin_design->crudShow($crudTabla, "Usuarios_actividad_detalle"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function usuarios_actividad_detalle_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function usuarios_actividad_detalle_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function usuarios_actividad_detalle_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function usuarios_actividad_detalle_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function usuarios_actividad_detalle_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function usuarios_actividad_detalle_after_delete($id) {


        return true;
    }

}
