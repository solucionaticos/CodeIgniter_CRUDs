<?php
defined("BASEPATH") OR exit("No esta permitido el acceso directo a este script.");
/**
 * @autor: Solucionaticos.com
 * @nombre: Campos_validaciones
 * @version: 1.0
 * @fecha: 2019-09-13 16:48:40 
 * */

class Campos_validaciones extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("campos_validaciones"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("id","usuario","proyecto","version","tabla","campo","validacion","parametro","created_at","updated_at");
        //-- Nuevo --------
        $crud->add_fields("id","usuario","proyecto","version","tabla","campo","validacion","parametro","created_at","updated_at");
        //-- Editar --------
        $crud->edit_fields("id","usuario","proyecto","version","tabla","campo","validacion","parametro","created_at","updated_at");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("usuario","Usuario");
        $crud->display_as("proyecto","Proyecto");
        $crud->display_as("version","Version");
        $crud->display_as("tabla","Tabla");
        $crud->display_as("campo","Campo");
        $crud->display_as("validacion","Validacion");
        $crud->display_as("parametro","Parametro");
        $crud->display_as("created_at","Created At");
        $crud->display_as("updated_at","Updated At");
        //-- Validaciones --------
        $crud->set_rules("proyecto","Proyecto","required");
        $crud->set_rules("version","Version","required");
        $crud->set_rules("tabla","Tabla","required");
        $crud->set_rules("campo","Campo","required");
        //-- Tipos de Campos --------
        $crud->field_type("id", "numeric");
        $crud->field_type("usuario", "numeric");
        $crud->field_type("proyecto", "numeric");
        $crud->field_type("version", "numeric");
        $crud->field_type("tabla", "numeric");
        $crud->field_type("campo", "numeric");
        $crud->field_type("validacion", "numeric");
        $crud->field_type("parametro", "string");
        $crud->field_type("created_at", "datetime");
        $crud->field_type("updated_at", "datetime");
        //-- Relaciones 1-N --------
        $crud->set_relation("proyecto", "proyectos","id");
        $crud->set_relation("version", "versiones","id");
        $crud->set_relation("tabla", "tablas","id");
        $crud->set_relation("campo", "campos","id");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "campos_validaciones_before_insert"));
        $crud->callback_before_update(array($this, "campos_validaciones_before_update"));
        $crud->callback_before_delete(array($this, "campos_validaciones_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "campos_validaciones_after_insert"));
        $crud->callback_after_update(array($this, "campos_validaciones_after_update"));
        $crud->callback_after_delete(array($this, "campos_validaciones_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->crudShow($crudTabla, "Campos_validaciones"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function campos_validaciones_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function campos_validaciones_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function campos_validaciones_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function campos_validaciones_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function campos_validaciones_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function campos_validaciones_after_delete($id) {


        return true;
    }

}
