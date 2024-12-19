<?php
defined("BASEPATH") OR exit("No direct script access allowed");
/**
 * @autor: Solucionaticos.com
 * @nombre: Empleados_familiares.php
 * @version: 1.0
 * @fecha: 2020-02-18 21:55:53 
 * */

class Empleados_familiares extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        // $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("empleados_familiares"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("empleado_id","tipo_familiar_id","nombre","documento_tipo_id","documento_numero","nacimiento_fecha","nacimiento_pais_id");
        //-- Nuevo --------
        $crud->add_fields("empleado_id","tipo_familiar_id","nombre","documento_tipo_id","documento_numero","nacimiento_fecha","nacimiento_pais_id");
        //-- Editar --------
        $crud->edit_fields("empleado_id","tipo_familiar_id","nombre","documento_tipo_id","documento_numero","nacimiento_fecha","nacimiento_pais_id");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("empleado_id","Empleado Id");
        $crud->display_as("tipo_familiar_id","Tipo Familiar Id");
        $crud->display_as("nombre","Nombre");
        $crud->display_as("documento_tipo_id","Documento Tipo Id");
        $crud->display_as("documento_numero","Documento Numero");
        $crud->display_as("nacimiento_fecha","Nacimiento Fecha");
        $crud->display_as("nacimiento_pais_id","Nacimiento Pais Id");
        //-- Tipos de Campos --------
        $crud->field_type("id", "numeric");
        $crud->field_type("nombre", "string");
        $crud->field_type("documento_numero", "string");
        $crud->field_type("nacimiento_fecha", "date");
        //-- Relaciones 1-N --------
        $crud->set_relation("empleado_id", "empleados","nombre");
        $crud->set_relation("tipo_familiar_id", "datos_familiares_tipos","nombre");
        $crud->set_relation("documento_tipo_id", "datos_documento_tipos","nombre");
        $crud->set_relation("nacimiento_pais_id", "datos_paises","nombre");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "empleados_familiares_before_insert"));
        $crud->callback_before_update(array($this, "empleados_familiares_before_update"));
        $crud->callback_before_delete(array($this, "empleados_familiares_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "empleados_familiares_after_insert"));
        $crud->callback_after_update(array($this, "empleados_familiares_after_update"));
        $crud->callback_after_delete(array($this, "empleados_familiares_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->admin_design->crudShow($crudTabla, "Empleados_familiares"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function empleados_familiares_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function empleados_familiares_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function empleados_familiares_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function empleados_familiares_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function empleados_familiares_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function empleados_familiares_after_delete($id) {


        return true;
    }

}
