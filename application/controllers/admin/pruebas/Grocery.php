<?php
defined("BASEPATH") OR exit("No esta permitido el acceso directo a este script.");
/**
 * @autor: Solucionaticos.com
 * @nombre: Offices
 * @version: 1.0
 * @fecha: 2019-12-15 06:16:46 
 * */

class Grocery extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        //$this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {

        $this->session->set_userdata('be_user_id', 1);
        $this->session->set_userdata('be_user_name', 'Administrator');

        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("offices"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("officeCode","city","phone","addressLine1","addressLine2","state","country","postalCode","territory");
        //-- Nuevo --------
        $crud->add_fields("officeCode","city","phone","addressLine1","addressLine2","state","country","postalCode","territory");
        //-- Editar --------
        $crud->edit_fields("officeCode","city","phone","addressLine1","addressLine2","state","country","postalCode","territory");
        //-- Etiquetas --------
        $crud->display_as("officeCode","OfficeCode");
        $crud->display_as("city","City");
        $crud->display_as("phone","Phone");
        $crud->display_as("addressLine1","AddressLine1");
        $crud->display_as("addressLine2","AddressLine2");
        $crud->display_as("state","State");
        $crud->display_as("country","Country");
        $crud->display_as("postalCode","PostalCode");
        $crud->display_as("territory","Territory");
        //-- Tipos de Campos --------
        $crud->field_type("officeCode", "numeric");
        $crud->field_type("city", "string");
        $crud->field_type("phone", "string");
        $crud->field_type("addressLine1", "string");
        $crud->field_type("addressLine2", "string");
        $crud->field_type("state", "string");
        $crud->field_type("country", "string");
        $crud->field_type("postalCode", "string");
        $crud->field_type("territory", "string");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "offices_before_insert"));
        $crud->callback_before_update(array($this, "offices_before_update"));
        $crud->callback_before_delete(array($this, "offices_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "offices_after_insert"));
        $crud->callback_after_update(array($this, "offices_after_update"));
        $crud->callback_after_delete(array($this, "offices_after_delete"));

        //$crud->unset_jquery();

        $crudTabla = $crud->render(); // Render del Crud
        $this->admin_design->crudShow($crudTabla, "Offices");

    }

    //-- Antes de Insertar --------
    public function offices_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function offices_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function offices_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function offices_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function offices_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function offices_after_delete($id) {


        return true;
    }

}