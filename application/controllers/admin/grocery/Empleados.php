<?php
defined("BASEPATH") OR exit("No direct script access allowed");
/**
 * @autor: Solucionaticos.com
 * @nombre: Empleados.php
 * @version: 1.0
 * @fecha: 2020-01-06 18:57:53 
 * */

class Empleados extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        // $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("empleados"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("nombres","apellidos","doc_identidad","genero_id","estado_civil_id","fecha_nacimiento","nacionalidad","email","clave","pais_id","estado_id","ciudad_id","direccion_1","direccion_2","activo");
        //-- Nuevo --------
        $crud->add_fields("nombres","apellidos","doc_identidad","genero_id","estado_civil_id","fecha_nacimiento","nacionalidad","email","clave","pais_id","estado_id","ciudad_id","direccion_1","direccion_2","activo");
        //-- Editar --------
        $crud->edit_fields("nombres","apellidos","doc_identidad","genero_id","estado_civil_id","fecha_nacimiento","nacionalidad","email","clave","pais_id","estado_id","ciudad_id","direccion_1","direccion_2","activo");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("nombres","Nombres");
        $crud->display_as("apellidos","Apellidos");
        $crud->display_as("doc_identidad","Doc Identidad");
        $crud->display_as("genero_id","Genero Id");
        $crud->display_as("estado_civil_id","Estado Civil Id");
        $crud->display_as("fecha_nacimiento","Fecha Nacimiento");
        $crud->display_as("nacionalidad","Nacionalidad");
        $crud->display_as("email","Email");
        $crud->display_as("clave","Clave");
        $crud->display_as("pais_id","Pais Id");
        $crud->display_as("estado_id","Estado Id");
        $crud->display_as("ciudad_id","Ciudad Id");
        $crud->display_as("direccion_1","Direccion 1");
        $crud->display_as("direccion_2","Direccion 2");
        $crud->display_as("activo","Activo");
        //-- Tipos de Campos --------
        $crud->field_type("id", "numeric");
        $crud->field_type("nombres", "string");
        $crud->field_type("apellidos", "string");
        $crud->field_type("doc_identidad", "numeric");
        $crud->field_type("genero_id", "numeric");
        $crud->field_type("estado_civil_id", "numeric");
        $crud->field_type("fecha_nacimiento", "date");
        $crud->field_type("nacionalidad", "string");
        $crud->field_type("email", "string");
        $crud->field_type("clave", "string");
        $crud->field_type("pais_id", "numeric");
        $crud->field_type("estado_id", "numeric");
        $crud->field_type("ciudad_id", "numeric");
        $crud->field_type("direccion_1", "string");
        $crud->field_type("direccion_2", "string");
        $crud->field_type("activo", "numeric");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "empleados_before_insert"));
        $crud->callback_before_update(array($this, "empleados_before_update"));
        $crud->callback_before_delete(array($this, "empleados_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "empleados_after_insert"));
        $crud->callback_after_update(array($this, "empleados_after_update"));
        $crud->callback_after_delete(array($this, "empleados_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->admin_design->crudShow($crudTabla, "Empleados"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function empleados_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function empleados_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function empleados_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function empleados_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function empleados_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function empleados_after_delete($id) {


        return true;
    }

}
