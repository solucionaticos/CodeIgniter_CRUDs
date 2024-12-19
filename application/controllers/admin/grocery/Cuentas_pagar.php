<?php
defined("BASEPATH") OR exit("No direct script access allowed");
/**
 * @autor: Solucionaticos.com
 * @nombre: Cuentas_pagar.php
 * @version: 1.0
 * @fecha: 2020-01-06 18:57:53 
 * */

class Cuentas_pagar extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        // $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("cuentas_pagar"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("monto","fecha_caducidad","pagado");
        //-- Nuevo --------
        $crud->add_fields("monto","fecha_caducidad","pagado");
        //-- Editar --------
        $crud->edit_fields("monto","fecha_caducidad","pagado");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("monto","Monto");
        $crud->display_as("fecha_caducidad","Fecha Caducidad");
        $crud->display_as("pagado","Pagado");
        //-- Tipos de Campos --------
        $crud->field_type("id", "numeric");
        $crud->field_type("monto", "numeric");
        $crud->field_type("fecha_caducidad", "datetime");
        $crud->field_type("pagado", "numeric");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "cuentas_pagar_before_insert"));
        $crud->callback_before_update(array($this, "cuentas_pagar_before_update"));
        $crud->callback_before_delete(array($this, "cuentas_pagar_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "cuentas_pagar_after_insert"));
        $crud->callback_after_update(array($this, "cuentas_pagar_after_update"));
        $crud->callback_after_delete(array($this, "cuentas_pagar_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->admin_design->crudShow($crudTabla, "Cuentas_pagar"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function cuentas_pagar_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function cuentas_pagar_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function cuentas_pagar_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function cuentas_pagar_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function cuentas_pagar_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function cuentas_pagar_after_delete($id) {


        return true;
    }

}