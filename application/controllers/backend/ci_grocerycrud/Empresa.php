<?php
defined("BASEPATH") OR exit("No direct script access allowed");
/**
 * @autor: Solucionaticos.com
 * @nombre: Empresa.php
 * @version: 1.0
 * @fecha: 2020-02-18 21:55:53 
 * */

class Empresa extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        // $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("empresa"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("razon_social","numero_identificacion","telefono_1","telefono_2","correo","pais_id","estado_id","ciudad_id","direccion_1","direccion_2");
        //-- Nuevo --------
        $crud->add_fields("razon_social","numero_identificacion","telefono_1","telefono_2","correo","pais_id","estado_id","ciudad_id","direccion_1","direccion_2");
        //-- Editar --------
        $crud->edit_fields("razon_social","numero_identificacion","telefono_1","telefono_2","correo","pais_id","estado_id","ciudad_id","direccion_1","direccion_2");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("razon_social","Razon Social");
        $crud->display_as("numero_identificacion","Numero Identificacion");
        $crud->display_as("telefono_1","Telefono 1");
        $crud->display_as("telefono_2","Telefono 2");
        $crud->display_as("correo","Correo");
        $crud->display_as("pais_id","Pais Id");
        $crud->display_as("estado_id","Estado Id");
        $crud->display_as("ciudad_id","Ciudad Id");
        $crud->display_as("direccion_1","Direccion 1");
        $crud->display_as("direccion_2","Direccion 2");
        //-- Tipos de Campos --------
        $crud->field_type("id", "numeric");
        $crud->field_type("razon_social", "string");
        $crud->field_type("numero_identificacion", "string");
        $crud->field_type("telefono_1", "string");
        $crud->field_type("telefono_2", "string");
        $crud->field_type("correo", "string");
        $crud->field_type("direccion_1", "string");
        $crud->field_type("direccion_2", "string");
        //-- Relaciones 1-N --------
        $crud->set_relation("pais_id", "datos_paises","nombre");
        $crud->set_relation("estado_id", "datos_paises_estados","nombre");
        $crud->set_relation("ciudad_id", "datos_ciudades","nombre");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "empresa_before_insert"));
        $crud->callback_before_update(array($this, "empresa_before_update"));
        $crud->callback_before_delete(array($this, "empresa_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "empresa_after_insert"));
        $crud->callback_after_update(array($this, "empresa_after_update"));
        $crud->callback_after_delete(array($this, "empresa_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->admin_design->crudShow($crudTabla, "Empresa"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function empresa_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function empresa_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function empresa_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function empresa_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function empresa_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function empresa_after_delete($id) {


        return true;
    }

}
