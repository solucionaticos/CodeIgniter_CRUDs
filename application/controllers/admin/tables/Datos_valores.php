<?php
defined("BASEPATH") OR exit("No esta permitido el acceso directo a este script.");
/**
 * @autor: Solucionaticos.com
 * @nombre: Datos_valores
 * @version: 1.0
 * @fecha: 2019-09-13 16:48:40 
 * */

class Datos_valores extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("datos_valores"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("id","dato","nombre","auxiliar_1","auxiliar_2","auxiliar_3","orden","created_at","updated_at");
        //-- Nuevo --------
        $crud->add_fields("id","dato","nombre","auxiliar_1","auxiliar_2","auxiliar_3","orden","created_at","updated_at");
        //-- Editar --------
        $crud->edit_fields("id","dato","nombre","auxiliar_1","auxiliar_2","auxiliar_3","orden","created_at","updated_at");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("dato","Dato");
        $crud->display_as("nombre","Nombre");
        $crud->display_as("auxiliar_1","Auxiliar 1");
        $crud->display_as("auxiliar_2","Auxiliar 2");
        $crud->display_as("auxiliar_3","Auxiliar 3");
        $crud->display_as("orden","Orden");
        $crud->display_as("created_at","Created At");
        $crud->display_as("updated_at","Updated At");
        //-- Validaciones --------
        $crud->set_rules("dato","Dato","required");
        $crud->set_rules("nombre","Nombre","required");
        //-- Tipos de Campos --------
        $crud->field_type("id", "numeric");
        $crud->field_type("dato", "numeric");
        $crud->field_type("nombre", "string");
        $crud->field_type("auxiliar_1", "string");
        $crud->field_type("auxiliar_2", "string");
        $crud->field_type("auxiliar_3", "string");
        $crud->field_type("orden", "string");
        $crud->field_type("created_at", "datetime");
        $crud->field_type("updated_at", "datetime");
        //-- Relaciones 1-N --------
        $crud->set_relation("dato", "datos","id");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "datos_valores_before_insert"));
        $crud->callback_before_update(array($this, "datos_valores_before_update"));
        $crud->callback_before_delete(array($this, "datos_valores_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "datos_valores_after_insert"));
        $crud->callback_after_update(array($this, "datos_valores_after_update"));
        $crud->callback_after_delete(array($this, "datos_valores_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->crudShow($crudTabla, "Datos_valores"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function datos_valores_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function datos_valores_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function datos_valores_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function datos_valores_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function datos_valores_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function datos_valores_after_delete($id) {


        return true;
    }

}
