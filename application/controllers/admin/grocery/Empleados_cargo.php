<?php
defined("BASEPATH") OR exit("No direct script access allowed");
/**
 * @autor: Solucionaticos.com
 * @nombre: Empleados_cargo.php
 * @version: 1.0
 * @fecha: 2020-01-06 18:57:53 
 * */

class Empleados_cargo extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        // $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("empleados_cargo"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("empleado_id","fecha_ingreso","fecha_fin_prueba","fecha_permanencia","titulo_profesional","tipo_empleado","categoria","sede_id");
        //-- Nuevo --------
        $crud->add_fields("empleado_id","fecha_ingreso","fecha_fin_prueba","fecha_permanencia","titulo_profesional","tipo_empleado","categoria","sede_id");
        //-- Editar --------
        $crud->edit_fields("empleado_id","fecha_ingreso","fecha_fin_prueba","fecha_permanencia","titulo_profesional","tipo_empleado","categoria","sede_id");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("empleado_id","Empleado Id");
        $crud->display_as("fecha_ingreso","Fecha Ingreso");
        $crud->display_as("fecha_fin_prueba","Fecha Fin Prueba");
        $crud->display_as("fecha_permanencia","Fecha Permanencia");
        $crud->display_as("titulo_profesional","Titulo Profesional");
        $crud->display_as("tipo_empleado","Tipo Empleado");
        $crud->display_as("categoria","Categoria");
        $crud->display_as("sede_id","Sede Id");
        //-- Tipos de Campos --------
        $crud->field_type("id", "numeric");
        $crud->field_type("fecha_ingreso", "date");
        $crud->field_type("fecha_fin_prueba", "date");
        $crud->field_type("fecha_permanencia", "date");
        $crud->field_type("titulo_profesional", "numeric");
        $crud->field_type("tipo_empleado", "numeric");
        $crud->field_type("categoria", "string");
        //-- Relaciones 1-N --------
        $crud->set_relation("empleado_id", "empleados","nombres");
        $crud->set_relation("sede_id", "sedes","nombre");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "empleados_cargo_before_insert"));
        $crud->callback_before_update(array($this, "empleados_cargo_before_update"));
        $crud->callback_before_delete(array($this, "empleados_cargo_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "empleados_cargo_after_insert"));
        $crud->callback_after_update(array($this, "empleados_cargo_after_update"));
        $crud->callback_after_delete(array($this, "empleados_cargo_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->admin_design->crudShow($crudTabla, "Empleados_cargo"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function empleados_cargo_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function empleados_cargo_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function empleados_cargo_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function empleados_cargo_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function empleados_cargo_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function empleados_cargo_after_delete($id) {


        return true;
    }

}
