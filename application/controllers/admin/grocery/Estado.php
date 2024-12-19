<?php
defined("BASEPATH") OR exit("No direct script access allowed");
/**
 * @autor: Solucionaticos.com
 * @nombre: Estado.php
 * @version: 1.0
 * @fecha: 2020-01-06 18:57:53 
 * */

class Estado extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        // $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("estado"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("nombre","pais_id");
        //-- Nuevo --------
        $crud->add_fields("nombre","pais_id");
        //-- Editar --------
        $crud->edit_fields("nombre","pais_id");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("nombre","Nombre");
        $crud->display_as("pais_id","Pais Id");
        //-- Tipos de Campos --------
        $crud->field_type("id", "numeric");
        $crud->field_type("nombre", "string");
        //-- Relaciones 1-N --------
        $crud->set_relation("pais_id", "pais","nombre");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "estado_before_insert"));
        $crud->callback_before_update(array($this, "estado_before_update"));
        $crud->callback_before_delete(array($this, "estado_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "estado_after_insert"));
        $crud->callback_after_update(array($this, "estado_after_update"));
        $crud->callback_after_delete(array($this, "estado_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->admin_design->crudShow($crudTabla, "Estado"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function estado_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function estado_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function estado_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function estado_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function estado_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function estado_after_delete($id) {


        return true;
    }

}
