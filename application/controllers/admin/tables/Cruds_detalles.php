<?php
defined("BASEPATH") OR exit("No esta permitido el acceso directo a este script.");
/**
 * @autor: Solucionaticos.com
 * @nombre: Cruds_detalles
 * @version: 1.0
 * @fecha: 2019-09-13 16:48:40 
 * */

class Cruds_detalles extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("cruds_detalles"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("id","usuario","proyecto","version","crud","tabla","campo","lista","nuevo","editar","ver","exportar","imprimir","created_at","updated_at");
        //-- Nuevo --------
        $crud->add_fields("id","usuario","proyecto","version","crud","tabla","campo","lista","nuevo","editar","ver","exportar","imprimir","created_at","updated_at");
        //-- Editar --------
        $crud->edit_fields("id","usuario","proyecto","version","crud","tabla","campo","lista","nuevo","editar","ver","exportar","imprimir","created_at","updated_at");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("usuario","Usuario");
        $crud->display_as("proyecto","Proyecto");
        $crud->display_as("version","Version");
        $crud->display_as("crud","Crud");
        $crud->display_as("tabla","Tabla");
        $crud->display_as("campo","Campo");
        $crud->display_as("lista","Lista");
        $crud->display_as("nuevo","Nuevo");
        $crud->display_as("editar","Editar");
        $crud->display_as("ver","Ver");
        $crud->display_as("exportar","Exportar");
        $crud->display_as("imprimir","Imprimir");
        $crud->display_as("created_at","Created At");
        $crud->display_as("updated_at","Updated At");
        //-- Tipos de Campos --------
        $crud->field_type("id", "numeric");
        $crud->field_type("usuario", "numeric");
        $crud->field_type("proyecto", "numeric");
        $crud->field_type("version", "numeric");
        $crud->field_type("crud", "numeric");
        $crud->field_type("tabla", "numeric");
        $crud->field_type("campo", "numeric");
        $crud->field_type("lista", "numeric");
        $crud->field_type("nuevo", "numeric");
        $crud->field_type("editar", "numeric");
        $crud->field_type("ver", "numeric");
        $crud->field_type("exportar", "numeric");
        $crud->field_type("imprimir", "numeric");
        $crud->field_type("created_at", "datetime");
        $crud->field_type("updated_at", "datetime");
        //-- Relaciones 1-N --------
        $crud->set_relation("proyecto", "proyectos","id");
        $crud->set_relation("version", "versiones","id");
        $crud->set_relation("crud", "cruds","id");
        $crud->set_relation("tabla", "tablas","id");
        $crud->set_relation("campo", "tablas","id");
        $crud->set_relation("lista", "datos_valores","nombre", "dato = (SELECT id FROM " . "datos WHERE codigo = 'si_no')", "orden ASC, nombre ASC");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "cruds_detalles_before_insert"));
        $crud->callback_before_update(array($this, "cruds_detalles_before_update"));
        $crud->callback_before_delete(array($this, "cruds_detalles_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "cruds_detalles_after_insert"));
        $crud->callback_after_update(array($this, "cruds_detalles_after_update"));
        $crud->callback_after_delete(array($this, "cruds_detalles_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->crudShow($crudTabla, "Cruds_detalles"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function cruds_detalles_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function cruds_detalles_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function cruds_detalles_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function cruds_detalles_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function cruds_detalles_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function cruds_detalles_after_delete($id) {


        return true;
    }

}
