<?php
defined("BASEPATH") OR exit("No direct script access allowed");
/**
 * @autor: Solucionaticos.com
 * @nombre: Empleados_documentos.php
 * @version: 1.0
 * @fecha: 2020-01-06 18:57:53 
 * */

class Empleados_documentos extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        // $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("empleados_documentos"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("empleado_id","nombre","descripcion","ruta_archivo","tipo","fecha_creacion");
        //-- Nuevo --------
        $crud->add_fields("empleado_id","nombre","descripcion","ruta_archivo","tipo","fecha_creacion");
        //-- Editar --------
        $crud->edit_fields("empleado_id","nombre","descripcion","ruta_archivo","tipo","fecha_creacion");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("empleado_id","Empleado Id");
        $crud->display_as("nombre","Nombre");
        $crud->display_as("descripcion","Descripcion");
        $crud->display_as("ruta_archivo","Ruta Archivo");
        $crud->display_as("tipo","Tipo");
        $crud->display_as("fecha_creacion","Fecha Creacion");
        //-- Tipos de Campos --------
        $crud->field_type("id", "numeric");
        $crud->field_type("nombre", "string");
        $crud->field_type("descripcion", "string");
        $crud->field_type("ruta_archivo", "string");
        $crud->field_type("tipo", "string");
        $crud->field_type("fecha_creacion", "datetime");
        //-- Relaciones 1-N --------
        $crud->set_relation("empleado_id", "empleados","nombres");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "empleados_documentos_before_insert"));
        $crud->callback_before_update(array($this, "empleados_documentos_before_update"));
        $crud->callback_before_delete(array($this, "empleados_documentos_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "empleados_documentos_after_insert"));
        $crud->callback_after_update(array($this, "empleados_documentos_after_update"));
        $crud->callback_after_delete(array($this, "empleados_documentos_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->admin_design->crudShow($crudTabla, "Empleados_documentos"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function empleados_documentos_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function empleados_documentos_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function empleados_documentos_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function empleados_documentos_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function empleados_documentos_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function empleados_documentos_after_delete($id) {


        return true;
    }

}
