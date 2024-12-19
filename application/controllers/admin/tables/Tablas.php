<?php
defined("BASEPATH") OR exit("No esta permitido el acceso directo a este script.");
/**
 * @autor: Solucionaticos.com
 * @nombre: Tablas
 * @version: 1.0
 * @fecha: 2019-09-13 16:48:40 
 * */

class Tablas extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("tablas"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("id","usuario","proyecto","version","nombre","etiqueta","comentarios","antes_insertar","antes_actualizar","antes_eliminar","despues_insertar","despues_actualizar","despues_eliminar");
        //-- Nuevo --------
        $crud->add_fields("id","usuario","proyecto","version","nombre","etiqueta","comentarios","antes_insertar","antes_actualizar","antes_eliminar","despues_insertar","despues_actualizar","despues_eliminar");
        //-- Editar --------
        $crud->edit_fields("id","usuario","proyecto","version","nombre","etiqueta","comentarios","antes_insertar","antes_actualizar","antes_eliminar","despues_insertar","despues_actualizar","despues_eliminar");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("usuario","Usuario");
        $crud->display_as("proyecto","Proyecto");
        $crud->display_as("version","Version");
        $crud->display_as("nombre","Nombre");
        $crud->display_as("etiqueta","Etiqueta");
        $crud->display_as("comentarios","Comentarios");
        $crud->display_as("antes_insertar","Antes Insertar");
        $crud->display_as("antes_actualizar","Antes Actualizar");
        $crud->display_as("antes_eliminar","Antes Eliminar");
        $crud->display_as("despues_insertar","Despues Insertar");
        $crud->display_as("despues_actualizar","Despues Actualizar");
        $crud->display_as("despues_eliminar","Despues Eliminar");
        //-- Validaciones --------
        $crud->set_rules("proyecto","Proyecto","required");
        $crud->set_rules("version","Version","required");
        //-- Tipos de Campos --------
        $crud->field_type("id", "numeric");
        $crud->field_type("usuario", "numeric");
        $crud->field_type("proyecto", "numeric");
        $crud->field_type("version", "numeric");
        $crud->field_type("nombre", "string");
        $crud->field_type("etiqueta", "string");
        $crud->field_type("comentarios", "text");
        $crud->field_type("antes_insertar", "text");
        $crud->field_type("antes_actualizar", "text");
        $crud->field_type("antes_eliminar", "text");
        $crud->field_type("despues_insertar", "text");
        $crud->field_type("despues_actualizar", "text");
        $crud->field_type("despues_eliminar", "text");
        //-- Relaciones 1-N --------
        $crud->set_relation("proyecto", "proyectos","id");
        $crud->set_relation("version", "versiones","id");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "tablas_before_insert"));
        $crud->callback_before_update(array($this, "tablas_before_update"));
        $crud->callback_before_delete(array($this, "tablas_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "tablas_after_insert"));
        $crud->callback_after_update(array($this, "tablas_after_update"));
        $crud->callback_after_delete(array($this, "tablas_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->crudShow($crudTabla, "Tablas"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function tablas_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function tablas_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function tablas_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function tablas_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function tablas_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function tablas_after_delete($id) {


        return true;
    }

}
