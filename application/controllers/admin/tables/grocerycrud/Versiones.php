<?php
defined("BASEPATH") OR exit("No esta permitido el acceso directo a este script.");
/**
 * @autor: Solucionaticos.com
 * @nombre: Versiones
 * @version: 1.0
 * @fecha: 2019-09-13 16:48:40 
 * */

class Versiones extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("versiones"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("id","proyecto","nombre");
        //-- Nuevo --------
        $crud->add_fields("id","proyecto","nombre");
        //-- Editar --------
        $crud->edit_fields("id","proyecto","nombre");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("proyecto","Proyecto");
        $crud->display_as("nombre","Nombre");
        //-- Validaciones --------
        $crud->set_rules("proyecto","Proyecto","required");
        $crud->set_rules("nombre","Nombre","required");
        //-- Tipos de Campos --------
        $crud->field_type("id", "numeric");
        $crud->field_type("proyecto", "numeric");
        $crud->field_type("nombre", "string");
        //-- Relaciones 1-N --------
        $crud->set_relation("proyecto", "proyectos","id");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "versiones_before_insert"));
        $crud->callback_before_update(array($this, "versiones_before_update"));
        $crud->callback_before_delete(array($this, "versiones_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "versiones_after_insert"));
        $crud->callback_after_update(array($this, "versiones_after_update"));
        $crud->callback_after_delete(array($this, "versiones_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->crudShow($crudTabla, "Versiones"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function versiones_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function versiones_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function versiones_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function versiones_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function versiones_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function versiones_after_delete($id) {


        return true;
    }

}
