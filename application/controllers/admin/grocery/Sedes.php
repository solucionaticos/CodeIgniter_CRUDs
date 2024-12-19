<?php
defined("BASEPATH") OR exit("No direct script access allowed");
/**
 * @autor: Solucionaticos.com
 * @nombre: Sedes.php
 * @version: 1.0
 * @fecha: 2020-01-06 19:13:00 
 * */

class Sedes extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        // $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("sedes"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("nombre","telefono","email","pais_id","estado_id","ciudad_id","direccion_1","direccion_2");
        //-- Nuevo --------
        $crud->add_fields("nombre","telefono","email","pais_id","estado_id","ciudad_id","direccion_1","direccion_2");
        //-- Editar --------
        $crud->edit_fields("nombre","telefono","email","pais_id","estado_id","ciudad_id","direccion_1","direccion_2");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("nombre","Nombre");
        $crud->display_as("telefono","Telefono");
        $crud->display_as("email","Email");
        $crud->display_as("pais_id","Pais Id");
        $crud->display_as("estado_id","Estado Id");
        $crud->display_as("ciudad_id","Ciudad Id");
        $crud->display_as("direccion_1","Direccion 1");
        $crud->display_as("direccion_2","Direccion 2");
        //-- Tipos de Campos --------
        $crud->field_type("id", "numeric");
        $crud->field_type("nombre", "string");
        $crud->field_type("telefono", "string");
        $crud->field_type("email", "string");
        $crud->field_type("direccion_1", "string");
        $crud->field_type("direccion_2", "string");
        //-- Relaciones 1-N --------
        $crud->set_relation("pais_id", "pais","nombre");
        $crud->set_relation("estado_id", "estado","nombre");
        $crud->set_relation("ciudad_id", "ciudad","nombre");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "sedes_before_insert"));
        $crud->callback_before_update(array($this, "sedes_before_update"));
        $crud->callback_before_delete(array($this, "sedes_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "sedes_after_insert"));
        $crud->callback_after_update(array($this, "sedes_after_update"));
        $crud->callback_after_delete(array($this, "sedes_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->admin_design->crudShow($crudTabla, "Sedes"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function sedes_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function sedes_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function sedes_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function sedes_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function sedes_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function sedes_after_delete($id) {


        return true;
    }

}
