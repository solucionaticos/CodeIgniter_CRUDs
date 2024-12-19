<?php
defined("BASEPATH") OR exit("No direct script access allowed");
/**
 * @autor: Solucionaticos.com
 * @nombre: Usuarios.php
 * @version: 1.0
 * @fecha: 2020-02-18 21:55:53 
 * */

class Usuarios extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        // $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("usuarios"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("nombre","apellidos","correo","clave","foto","perfil_id","fecha_ultimo_ingreso","ip","fecha_creacion","activo");
        //-- Nuevo --------
        $crud->add_fields("nombre","apellidos","correo","clave","foto","perfil_id","fecha_ultimo_ingreso","ip","fecha_creacion","activo");
        //-- Editar --------
        $crud->edit_fields("nombre","apellidos","correo","clave","foto","perfil_id","fecha_ultimo_ingreso","ip","fecha_creacion","activo");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("nombre","Nombre");
        $crud->display_as("apellidos","Apellidos");
        $crud->display_as("correo","Correo");
        $crud->display_as("clave","Clave");
        $crud->display_as("foto","Foto");
        $crud->display_as("perfil_id","Perfil Id");
        $crud->display_as("fecha_ultimo_ingreso","Fecha Ultimo Ingreso");
        $crud->display_as("ip","Ip");
        $crud->display_as("fecha_creacion","Fecha Creacion");
        $crud->display_as("activo","Activo");
        //-- Tipos de Campos --------
        $crud->field_type("id", "numeric");
        $crud->field_type("nombre", "string");
        $crud->field_type("apellidos", "string");
        $crud->field_type("correo", "string");
        $crud->field_type("clave", "string");
        $crud->field_type("foto", "string");
        $crud->field_type("fecha_ultimo_ingreso", "datetime");
        $crud->field_type("ip", "string");
        $crud->field_type("fecha_creacion", "datetime");
        $crud->field_type("activo", "numeric");
        //-- Relaciones 1-N --------
        $crud->set_relation("perfil_id", "datos_usuarios_perfiles","nombre");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "usuarios_before_insert"));
        $crud->callback_before_update(array($this, "usuarios_before_update"));
        $crud->callback_before_delete(array($this, "usuarios_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "usuarios_after_insert"));
        $crud->callback_after_update(array($this, "usuarios_after_update"));
        $crud->callback_after_delete(array($this, "usuarios_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->admin_design->crudShow($crudTabla, "Usuarios"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function usuarios_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function usuarios_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function usuarios_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function usuarios_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function usuarios_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function usuarios_after_delete($id) {


        return true;
    }

}
