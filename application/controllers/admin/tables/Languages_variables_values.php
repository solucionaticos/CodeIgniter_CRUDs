<?php
defined("BASEPATH") OR exit("No esta permitido el acceso directo a este script.");
/**
 * @autor: Solucionaticos.com
 * @nombre: Languages_variables_values
 * @version: 1.0
 * @fecha: 2019-09-13 16:48:40 
 * */

class Languages_variables_values extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("languages_variables_values"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("id","variable","language","value","created_at","updated_at");
        //-- Nuevo --------
        $crud->add_fields("id","variable","language","value","created_at","updated_at");
        //-- Editar --------
        $crud->edit_fields("id","variable","language","value","created_at","updated_at");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("variable","Variable");
        $crud->display_as("language","Language");
        $crud->display_as("value","Value");
        $crud->display_as("created_at","Created At");
        $crud->display_as("updated_at","Updated At");
        //-- Tipos de Campos --------
        $crud->field_type("id", "numeric");
        $crud->field_type("variable", "numeric");
        $crud->field_type("language", "numeric");
        $crud->field_type("value", "string");
        $crud->field_type("created_at", "datetime");
        $crud->field_type("updated_at", "datetime");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "languages_variables_values_before_insert"));
        $crud->callback_before_update(array($this, "languages_variables_values_before_update"));
        $crud->callback_before_delete(array($this, "languages_variables_values_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "languages_variables_values_after_insert"));
        $crud->callback_after_update(array($this, "languages_variables_values_after_update"));
        $crud->callback_after_delete(array($this, "languages_variables_values_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->crudShow($crudTabla, "Languages_variables_values"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function languages_variables_values_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function languages_variables_values_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function languages_variables_values_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function languages_variables_values_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function languages_variables_values_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function languages_variables_values_after_delete($id) {


        return true;
    }

}
