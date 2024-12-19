<?php
defined("BASEPATH") OR exit("No direct script access allowed");
/**
 * @autor: Solucionaticos.com
 * @nombre: Cuentas_facturas.php
 * @version: 1.0
 * @fecha: 2020-02-18 21:55:53 
 * */

class Cuentas_facturas extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        // $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("cuentas_facturas"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("numero_factura","fecha_factura","concepto","subtotal","impuesto","total","archivo");
        //-- Nuevo --------
        $crud->add_fields("numero_factura","fecha_factura","concepto","subtotal","impuesto","total","archivo");
        //-- Editar --------
        $crud->edit_fields("numero_factura","fecha_factura","concepto","subtotal","impuesto","total","archivo");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("numero_factura","Numero Factura");
        $crud->display_as("fecha_factura","Fecha Factura");
        $crud->display_as("concepto","Concepto");
        $crud->display_as("subtotal","Subtotal");
        $crud->display_as("impuesto","Impuesto");
        $crud->display_as("total","Total");
        $crud->display_as("archivo","Archivo");
        //-- Tipos de Campos --------
        $crud->field_type("id", "numeric");
        $crud->field_type("numero_factura", "string");
        $crud->field_type("fecha_factura", "date");
        $crud->field_type("concepto", "text");
        $crud->field_type("subtotal", "numeric");
        $crud->field_type("impuesto", "numeric");
        $crud->field_type("total", "numeric");
        $crud->field_type("archivo", "string");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "cuentas_facturas_before_insert"));
        $crud->callback_before_update(array($this, "cuentas_facturas_before_update"));
        $crud->callback_before_delete(array($this, "cuentas_facturas_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "cuentas_facturas_after_insert"));
        $crud->callback_after_update(array($this, "cuentas_facturas_after_update"));
        $crud->callback_after_delete(array($this, "cuentas_facturas_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->admin_design->crudShow($crudTabla, "Cuentas_facturas"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function cuentas_facturas_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function cuentas_facturas_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function cuentas_facturas_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function cuentas_facturas_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function cuentas_facturas_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function cuentas_facturas_after_delete($id) {


        return true;
    }

}
