<?php
defined("BASEPATH") OR exit("No esta permitido el acceso directo a este script.");
/**
 * @autor: Solucionaticos.com
 * @nombre: Languages
 * @version: 1.0
 * @fecha: 2019-09-13 16:48:40 
 * */

class Languages extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("languages"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("id","name","own_name","code","value","recaptcha","active","lang_default","created_at","updated_at");
        //-- Nuevo --------
        $crud->add_fields("id","name","own_name","code","value","recaptcha","active","lang_default","created_at","updated_at");
        //-- Editar --------
        $crud->edit_fields("id","name","own_name","code","value","recaptcha","active","lang_default","created_at","updated_at");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("name","Name");
        $crud->display_as("own_name","Own Name");
        $crud->display_as("code","Code");
        $crud->display_as("value","Value");
        $crud->display_as("recaptcha","Recaptcha");
        $crud->display_as("active","Active");
        $crud->display_as("lang_default","Lang Default");
        $crud->display_as("created_at","Created At");
        $crud->display_as("updated_at","Updated At");
        //-- Tipos de Campos --------
        $crud->field_type("id", "numeric");
        $crud->field_type("name", "string");
        $crud->field_type("own_name", "string");
        $crud->field_type("code", "string");
        $crud->field_type("value", "string");
        $crud->field_type("recaptcha", "string");
        $crud->field_type("active", "numeric");
        $crud->field_type("lang_default", "numeric");
        $crud->field_type("created_at", "datetime");
        $crud->field_type("updated_at", "datetime");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "languages_before_insert"));
        $crud->callback_before_update(array($this, "languages_before_update"));
        $crud->callback_before_delete(array($this, "languages_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "languages_after_insert"));
        $crud->callback_after_update(array($this, "languages_after_update"));
        $crud->callback_after_delete(array($this, "languages_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->crudShow($crudTabla, "Languages"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function languages_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function languages_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function languages_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function languages_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function languages_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function languages_after_delete($id) {


        return true;
    }

}
