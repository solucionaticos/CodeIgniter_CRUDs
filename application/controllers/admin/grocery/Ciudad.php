<?php
defined("BASEPATH") OR exit("No direct script access allowed");
/**
 * @autor: Solucionaticos.com
 * @nombre: Ciudad.php
 * @version: 1.0
 * @fecha: 2020-01-06 18:57:53 
 * */

class Ciudad extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        // $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("ciudad"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("nombre","estado_id");
        //-- Nuevo --------
        $crud->add_fields("nombre","estado_id");
        //-- Editar --------
        $crud->edit_fields("nombre","estado_id");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("nombre","Nombre");
        $crud->display_as("estado_id","Estado Id");
        //-- Tipos de Campos --------
        $crud->field_type("id", "numeric");
        $crud->field_type("nombre", "string");
        //-- Relaciones 1-N --------
        $crud->set_relation("estado_id", "estado","nombre");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "ciudad_before_insert"));
        $crud->callback_before_update(array($this, "ciudad_before_update"));
        $crud->callback_before_delete(array($this, "ciudad_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "ciudad_after_insert"));
        $crud->callback_after_update(array($this, "ciudad_after_update"));
        $crud->callback_after_delete(array($this, "ciudad_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->admin_design->crudShow($crudTabla, "Ciudad"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function ciudad_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function ciudad_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function ciudad_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function ciudad_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function ciudad_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function ciudad_after_delete($id) {


        return true;
    }

}
