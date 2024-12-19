<?php
defined("BASEPATH") OR exit("No esta permitido el acceso directo a este script.");
/**
 * @autor: Solucionaticos.com
 * @nombre: Datos
 * @version: 1.0
 * @fecha: 2019-09-13 16:48:40 
 * */

class Datos extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("datos"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("id","nombre","codigo","numero_registros","created_at","updated_at");
        //-- Nuevo --------
        $crud->add_fields("id","nombre","codigo","numero_registros","created_at","updated_at");
        //-- Editar --------
        $crud->edit_fields("id","nombre","codigo","numero_registros","created_at","updated_at");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("nombre","Nombre");
        $crud->display_as("codigo","Codigo");
        $crud->display_as("numero_registros","Numero Registros");
        $crud->display_as("created_at","Created At");
        $crud->display_as("updated_at","Updated At");
        //-- Validaciones --------
        $crud->set_rules("nombre","Nombre","required");
        $crud->set_rules("codigo","Codigo","required");
        //-- Tipos de Campos --------
        $crud->field_type("id", "numeric");
        $crud->field_type("nombre", "string");
        $crud->field_type("codigo", "string");
        $crud->field_type("numero_registros", "numeric");
        $crud->field_type("created_at", "datetime");
        $crud->field_type("updated_at", "datetime");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "datos_before_insert"));
        $crud->callback_before_update(array($this, "datos_before_update"));
        $crud->callback_before_delete(array($this, "datos_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "datos_after_insert"));
        $crud->callback_after_update(array($this, "datos_after_update"));
        $crud->callback_after_delete(array($this, "datos_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->crudShow($crudTabla, "Datos"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function datos_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function datos_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function datos_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function datos_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function datos_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function datos_after_delete($id) {


        return true;
    }

}
