<?php
defined("BASEPATH") OR exit("No esta permitido el acceso directo a este script.");
/**
 * @autor: Solucionaticos.com
 * @nombre: Cruds
 * @version: 1.0
 * @fecha: 2019-09-13 16:48:40 
 * */

class Cruds extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("cruds"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("id","usuario","proyecto","version","tabla","path","script","code_controller_ci_grocerycrud","code_controller_ci_datatable","code_view_ci_datatable","code_js_ci_datatable","code_css_ci_datatable","titulo","ambiente","carpeta_1","carpeta_2","lista_orden_campo","lista_orden_direccion","lista_condicion_campo","lista_condicion_valor","nuevo","editar","ver","borrar","exportar","imprimir","tipo_crud","js","css","fecha_registro","fecha_generacion","created_at","updated_at");
        //-- Nuevo --------
        $crud->add_fields("id","usuario","proyecto","version","tabla","path","script","code_controller_ci_grocerycrud","code_controller_ci_datatable","code_view_ci_datatable","code_js_ci_datatable","code_css_ci_datatable","titulo","ambiente","carpeta_1","carpeta_2","lista_orden_campo","lista_orden_direccion","lista_condicion_campo","lista_condicion_valor","nuevo","editar","ver","borrar","exportar","imprimir","tipo_crud","js","css","fecha_registro","fecha_generacion","created_at","updated_at");
        //-- Editar --------
        $crud->edit_fields("id","usuario","proyecto","version","tabla","path","script","code_controller_ci_grocerycrud","code_controller_ci_datatable","code_view_ci_datatable","code_js_ci_datatable","code_css_ci_datatable","titulo","ambiente","carpeta_1","carpeta_2","lista_orden_campo","lista_orden_direccion","lista_condicion_campo","lista_condicion_valor","nuevo","editar","ver","borrar","exportar","imprimir","tipo_crud","js","css","fecha_registro","fecha_generacion","created_at","updated_at");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("usuario","Usuario");
        $crud->display_as("proyecto","Proyecto");
        $crud->display_as("version","Version");
        $crud->display_as("tabla","Tabla");
        $crud->display_as("path","Path");
        $crud->display_as("script","Script");
        $crud->display_as("code_controller_ci_grocerycrud","Code Controller Ci Grocerycrud");
        $crud->display_as("code_controller_ci_datatable","Code Controller Ci Datatable");
        $crud->display_as("code_view_ci_datatable","Code View Ci Datatable");
        $crud->display_as("code_js_ci_datatable","Code Js Ci Datatable");
        $crud->display_as("code_css_ci_datatable","Code Css Ci Datatable");
        $crud->display_as("titulo","Titulo");
        $crud->display_as("ambiente","Ambiente");
        $crud->display_as("carpeta_1","Carpeta 1");
        $crud->display_as("carpeta_2","Carpeta 2");
        $crud->display_as("lista_orden_campo","Lista Orden Campo");
        $crud->display_as("lista_orden_direccion","Lista Orden Direccion");
        $crud->display_as("lista_condicion_campo","Lista Condicion Campo");
        $crud->display_as("lista_condicion_valor","Lista Condicion Valor");
        $crud->display_as("nuevo","Nuevo");
        $crud->display_as("editar","Editar");
        $crud->display_as("ver","Ver");
        $crud->display_as("borrar","Borrar");
        $crud->display_as("exportar","Exportar");
        $crud->display_as("imprimir","Imprimir");
        $crud->display_as("tipo_crud","Tipo Crud");
        $crud->display_as("js","Js");
        $crud->display_as("css","Css");
        $crud->display_as("fecha_registro","Fecha Registro");
        $crud->display_as("fecha_generacion","Fecha Generacion");
        $crud->display_as("created_at","Created At");
        $crud->display_as("updated_at","Updated At");
        //-- Validaciones --------
        $crud->set_rules("proyecto","Proyecto","required");
        $crud->set_rules("version","Version","required");
        $crud->set_rules("tabla","Tabla","required");
        //-- Tipos de Campos --------
        $crud->field_type("id", "numeric");
        $crud->field_type("usuario", "numeric");
        $crud->field_type("proyecto", "numeric");
        $crud->field_type("version", "numeric");
        $crud->field_type("tabla", "numeric");
        $crud->field_type("path", "string");
        $crud->field_type("script", "string");
        $crud->field_type("code_controller_ci_grocerycrud", "text");
        $crud->field_type("code_controller_ci_datatable", "text");
        $crud->field_type("code_view_ci_datatable", "text");
        $crud->field_type("code_js_ci_datatable", "text");
        $crud->field_type("code_css_ci_datatable", "text");
        $crud->field_type("titulo", "string");
        $crud->field_type("ambiente", "numeric");
        $crud->field_type("carpeta_1", "string");
        $crud->field_type("carpeta_2", "string");
        $crud->field_type("lista_orden_campo", "numeric");
        $crud->field_type("lista_orden_direccion", "numeric");
        $crud->field_type("lista_condicion_campo", "numeric");
        $crud->field_type("lista_condicion_valor", "string");
        $crud->field_type("nuevo", "numeric");
        $crud->field_type("editar", "numeric");
        $crud->field_type("ver", "numeric");
        $crud->field_type("borrar", "numeric");
        $crud->field_type("exportar", "numeric");
        $crud->field_type("imprimir", "numeric");
        $crud->field_type("tipo_crud", "numeric");
        $crud->field_type("js", "text");
        $crud->field_type("css", "text");
        $crud->field_type("fecha_registro", "datetime");
        $crud->field_type("fecha_generacion", "datetime");
        $crud->field_type("created_at", "datetime");
        $crud->field_type("updated_at", "datetime");
        //-- Relaciones 1-N --------
        $crud->set_relation("proyecto", "proyectos","id");
        $crud->set_relation("version", "versiones","id");
        $crud->set_relation("tabla", "tablas","id");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "cruds_before_insert"));
        $crud->callback_before_update(array($this, "cruds_before_update"));
        $crud->callback_before_delete(array($this, "cruds_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "cruds_after_insert"));
        $crud->callback_after_update(array($this, "cruds_after_update"));
        $crud->callback_after_delete(array($this, "cruds_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->crudShow($crudTabla, "Cruds"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function cruds_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function cruds_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function cruds_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function cruds_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function cruds_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function cruds_after_delete($id) {


        return true;
    }

}
