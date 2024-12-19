<?php
defined("BASEPATH") OR exit("No esta permitido el acceso directo a este script.");
/**
 * @autor: Solucionaticos.com
 * @nombre: Campos
 * @version: 1.0
 * @fecha: 2019-09-13 16:48:40 
 * */

class Campos extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("campos"); // Tabla del Crud
        //-- Lista --------
        $crud->columns("id","usuario","proyecto","version","sql_linea","tabla","nombre","etiqueta","tipo_dato","tamano","sin_signo","no_nulo","defecto","defecto_valor","comentario","comentario_valor","tipo_campo","tipo_entrada","tipo_entrada_parametro","archivo","archivo_ruta","relacion_datos","relacion_tabla","relacion_campo","relacion_nombre","relacion_condicion","relacion_orden","relacion_etiqueta_nm","relacion_tabla_n","relacion_campo_n","relacion_tabla_m","relacion_campo_m_tabla_a","relacion_campo_m_tabla_b","relacion_campo_m_prioridad","relacion_campo_nm_condicion","orden","llave_primaria","autonumerico","indice","unico","comentarios","created_at","updated_at");
        //-- Nuevo --------
        $crud->add_fields("id","usuario","proyecto","version","sql_linea","tabla","nombre","etiqueta","tipo_dato","tamano","sin_signo","no_nulo","defecto","defecto_valor","comentario","comentario_valor","tipo_campo","tipo_entrada","tipo_entrada_parametro","archivo","archivo_ruta","relacion_datos","relacion_tabla","relacion_campo","relacion_nombre","relacion_condicion","relacion_orden","relacion_etiqueta_nm","relacion_tabla_n","relacion_campo_n","relacion_tabla_m","relacion_campo_m_tabla_a","relacion_campo_m_tabla_b","relacion_campo_m_prioridad","relacion_campo_nm_condicion","orden","llave_primaria","autonumerico","indice","unico","comentarios","created_at","updated_at");
        //-- Editar --------
        $crud->edit_fields("id","usuario","proyecto","version","sql_linea","tabla","nombre","etiqueta","tipo_dato","tamano","sin_signo","no_nulo","defecto","defecto_valor","comentario","comentario_valor","tipo_campo","tipo_entrada","tipo_entrada_parametro","archivo","archivo_ruta","relacion_datos","relacion_tabla","relacion_campo","relacion_nombre","relacion_condicion","relacion_orden","relacion_etiqueta_nm","relacion_tabla_n","relacion_campo_n","relacion_tabla_m","relacion_campo_m_tabla_a","relacion_campo_m_tabla_b","relacion_campo_m_prioridad","relacion_campo_nm_condicion","orden","llave_primaria","autonumerico","indice","unico","comentarios","created_at","updated_at");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("usuario","Usuario");
        $crud->display_as("proyecto","Proyecto");
        $crud->display_as("version","Version");
        $crud->display_as("sql_linea","Sql Linea");
        $crud->display_as("tabla","Tabla");
        $crud->display_as("nombre","Nombre");
        $crud->display_as("etiqueta","Etiqueta");
        $crud->display_as("tipo_dato","Tipo Dato");
        $crud->display_as("tamano","Tamano");
        $crud->display_as("sin_signo","Sin Signo");
        $crud->display_as("no_nulo","No Nulo");
        $crud->display_as("defecto","Defecto");
        $crud->display_as("defecto_valor","Defecto Valor");
        $crud->display_as("comentario","Comentario");
        $crud->display_as("comentario_valor","Comentario Valor");
        $crud->display_as("tipo_campo","Tipo Campo");
        $crud->display_as("tipo_entrada","Tipo Entrada");
        $crud->display_as("tipo_entrada_parametro","Tipo Entrada Parametro");
        $crud->display_as("archivo","Archivo");
        $crud->display_as("archivo_ruta","Archivo Ruta");
        $crud->display_as("relacion_datos","Relacion Datos");
        $crud->display_as("relacion_tabla","Relacion Tabla");
        $crud->display_as("relacion_campo","Relacion Campo");
        $crud->display_as("relacion_nombre","Relacion Nombre");
        $crud->display_as("relacion_condicion","Relacion Condicion");
        $crud->display_as("relacion_orden","Relacion Orden");
        $crud->display_as("relacion_etiqueta_nm","Relacion Etiqueta Nm");
        $crud->display_as("relacion_tabla_n","Relacion Tabla N");
        $crud->display_as("relacion_campo_n","Relacion Campo N");
        $crud->display_as("relacion_tabla_m","Relacion Tabla M");
        $crud->display_as("relacion_campo_m_tabla_a","Relacion Campo M Tabla A");
        $crud->display_as("relacion_campo_m_tabla_b","Relacion Campo M Tabla B");
        $crud->display_as("relacion_campo_m_prioridad","Relacion Campo M Prioridad");
        $crud->display_as("relacion_campo_nm_condicion","Relacion Campo Nm Condicion");
        $crud->display_as("orden","Orden");
        $crud->display_as("llave_primaria","Llave Primaria");
        $crud->display_as("autonumerico","Autonumerico");
        $crud->display_as("indice","Indice");
        $crud->display_as("unico","Unico");
        $crud->display_as("comentarios","Comentarios");
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
        $crud->field_type("sql_linea", "string");
        $crud->field_type("tabla", "numeric");
        $crud->field_type("nombre", "string");
        $crud->field_type("etiqueta", "string");
        $crud->field_type("tipo_dato", "string");
        $crud->field_type("tamano", "string");
        $crud->field_type("sin_signo", "numeric");
        $crud->field_type("no_nulo", "numeric");
        $crud->field_type("defecto", "numeric");
        $crud->field_type("defecto_valor", "string");
        $crud->field_type("comentario", "numeric");
        $crud->field_type("comentario_valor", "string");
        $crud->field_type("tipo_campo", "numeric");
        $crud->field_type("tipo_entrada", "numeric");
        $crud->field_type("tipo_entrada_parametro", "string");
        $crud->field_type("archivo", "numeric");
        $crud->field_type("archivo_ruta", "string");
        $crud->field_type("relacion_datos", "numeric");
        $crud->field_type("relacion_tabla", "numeric");
        $crud->field_type("relacion_campo", "numeric");
        $crud->field_type("relacion_nombre", "numeric");
        $crud->field_type("relacion_condicion", "string");
        $crud->field_type("relacion_orden", "string");
        $crud->field_type("relacion_etiqueta_nm", "string");
        $crud->field_type("relacion_tabla_n", "numeric");
        $crud->field_type("relacion_campo_n", "numeric");
        $crud->field_type("relacion_tabla_m", "numeric");
        $crud->field_type("relacion_campo_m_tabla_a", "numeric");
        $crud->field_type("relacion_campo_m_tabla_b", "numeric");
        $crud->field_type("relacion_campo_m_prioridad", "numeric");
        $crud->field_type("relacion_campo_nm_condicion", "string");
        $crud->field_type("orden", "numeric");
        $crud->field_type("llave_primaria", "numeric");
        $crud->field_type("autonumerico", "numeric");
        $crud->field_type("indice", "numeric");
        $crud->field_type("unico", "numeric");
        $crud->field_type("comentarios", "text");
        $crud->field_type("created_at", "datetime");
        $crud->field_type("updated_at", "datetime");
        //-- Relaciones 1-N --------
        $crud->set_relation("proyecto", "proyectos","id");
        $crud->set_relation("version", "versiones","id");
        $crud->set_relation("tabla", "tablas","id");
        $crud->set_relation("sin_signo", "datos_valores","nombre", "dato = (SELECT id FROM " . "datos WHERE codigo = 'si_no')", "orden ASC, nombre ASC");

        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "campos_before_insert"));
        $crud->callback_before_update(array($this, "campos_before_update"));
        $crud->callback_before_delete(array($this, "campos_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "campos_after_insert"));
        $crud->callback_after_update(array($this, "campos_after_update"));
        $crud->callback_after_delete(array($this, "campos_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->crudShow($crudTabla, "Campos"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function campos_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function campos_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }


        return $post;
    }

    //-- Antes de Eliminar --------
    public function campos_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }


        return true;
    }

    //-- Despues de Insertar --------
    public function campos_after_insert($post,$id) {


        return true;
    }

    //-- Despues de Actualizar --------
    public function campos_after_update($post,$id) {


        return true;
    }

    //-- Despues de Eliminar --------
    public function campos_after_delete($id) {


        return true;
    }

}
