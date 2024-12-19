<?php
defined("BASEPATH") OR exit("No direct script access allowed");
/**
 * @autor: Solucionaticos.com
 * @nombre: Empleados.php
 * @version: 1.0
 * @fecha: 2020-02-18 21:55:53 
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
        $crud->columns("nombre","apellidos","clave","correo","documento_tipo_id","documento_numero","documento_fecha_expedicion","pais_id","estado_id","ciudad_id","direccion_1","direccion_2","nacimiento_fecha","nacimiento_pais_id","nacimiento_ciudad_id","numero_posicion","posicion","vicepresidencia","moneda_id","sueldo","centro_costo_id","frecuencia_pago_id","compania","genero_id","estado_civil_id","contratos_tipos_id","fecha_finalizacion","correo_externo","correo_interno","nomina_area_id","banda_salarial","jefe_codigo","jefe_nombre","banco_deposito_id","banco_deposito_tipo_cuenta_id","banco_deposito_cuenta","eps","fecha_creacion","activo","arl_id","fondo_cesantias_id","fondo_pensiones_id","afc_entidad_id","afc_cuenta_id","fondo_pensiones_voluntario_id","celular","telefono_emergencia","tipo_medida_id","tipo_compensacion_variable_id","procentaje_compensacion_variable","nivel_educativo","especialidad");
        //-- Nuevo --------
        $crud->add_fields("nombre","apellidos","clave","correo","documento_tipo_id","documento_numero","documento_fecha_expedicion","pais_id","estado_id","ciudad_id","direccion_1","direccion_2","nacimiento_fecha","nacimiento_pais_id","nacimiento_ciudad_id","numero_posicion","posicion","vicepresidencia","moneda_id","sueldo","centro_costo_id","frecuencia_pago_id","compania","genero_id","estado_civil_id","contratos_tipos_id","fecha_finalizacion","correo_externo","correo_interno","nomina_area_id","banda_salarial","jefe_codigo","jefe_nombre","banco_deposito_id","banco_deposito_tipo_cuenta_id","banco_deposito_cuenta","eps","fecha_creacion","activo","arl_id","fondo_cesantias_id","fondo_pensiones_id","afc_entidad_id","afc_cuenta_id","fondo_pensiones_voluntario_id","celular","telefono_emergencia","tipo_medida_id","tipo_compensacion_variable_id","procentaje_compensacion_variable","nivel_educativo","especialidad");
        //-- Editar --------
        $crud->edit_fields("nombre","apellidos","clave","correo","documento_tipo_id","documento_numero","documento_fecha_expedicion","pais_id","estado_id","ciudad_id","direccion_1","direccion_2","nacimiento_fecha","nacimiento_pais_id","nacimiento_ciudad_id","numero_posicion","posicion","vicepresidencia","moneda_id","sueldo","centro_costo_id","frecuencia_pago_id","compania","genero_id","estado_civil_id","contratos_tipos_id","fecha_finalizacion","correo_externo","correo_interno","nomina_area_id","banda_salarial","jefe_codigo","jefe_nombre","banco_deposito_id","banco_deposito_tipo_cuenta_id","banco_deposito_cuenta","eps","fecha_creacion","activo","arl_id","fondo_cesantias_id","fondo_pensiones_id","afc_entidad_id","afc_cuenta_id","fondo_pensiones_voluntario_id","celular","telefono_emergencia","tipo_medida_id","tipo_compensacion_variable_id","procentaje_compensacion_variable","nivel_educativo","especialidad");
        //-- Etiquetas --------
        $crud->display_as("id","Id");
        $crud->display_as("nombre","Nombre");
        $crud->display_as("apellidos","Apellidos");
        $crud->display_as("clave","Clave");
        $crud->display_as("correo","Correo");
        $crud->display_as("documento_tipo_id","Documento Tipo Id");
        $crud->display_as("documento_numero","Documento Numero");
        $crud->display_as("documento_fecha_expedicion","Documento Fecha Expedicion");
        $crud->display_as("pais_id","Pais Id");
        $crud->display_as("estado_id","Estado Id");
        $crud->display_as("ciudad_id","Ciudad Id");
        $crud->display_as("direccion_1","Direccion 1");
        $crud->display_as("direccion_2","Direccion 2");
        $crud->display_as("nacimiento_fecha","Nacimiento Fecha");
        $crud->display_as("nacimiento_pais_id","Nacimiento Pais Id");
        $crud->display_as("nacimiento_ciudad_id","Nacimiento Ciudad Id");
        $crud->display_as("numero_posicion","Numero Posicion");
        $crud->display_as("posicion","Posicion");
        $crud->display_as("vicepresidencia","Vicepresidencia");
        $crud->display_as("moneda_id","Moneda Id");
        $crud->display_as("sueldo","Sueldo");
        $crud->display_as("centro_costo_id","Centro Costo Id");
        $crud->display_as("frecuencia_pago_id","Frecuencia Pago Id");
        $crud->display_as("compania","Compania");
        $crud->display_as("genero_id","Genero Id");
        $crud->display_as("estado_civil_id","Estado Civil Id");
        $crud->display_as("contratos_tipos_id","Contratos Tipos Id");
        $crud->display_as("fecha_finalizacion","Fecha Finalizacion");
        $crud->display_as("correo_externo","Correo Externo");
        $crud->display_as("correo_interno","Correo Interno");
        $crud->display_as("nomina_area_id","Nomina Area Id");
        $crud->display_as("banda_salarial","Banda Salarial");
        $crud->display_as("jefe_codigo","Jefe Codigo");
        $crud->display_as("jefe_nombre","Jefe Nombre");
        $crud->display_as("banco_deposito_id","Banco Deposito Id");
        $crud->display_as("banco_deposito_tipo_cuenta_id","Banco Deposito Tipo Cuenta Id");
        $crud->display_as("banco_deposito_cuenta","Banco Deposito Cuenta");
        $crud->display_as("eps","Eps");
        $crud->display_as("fecha_creacion","Fecha Creacion");
        $crud->display_as("activo","Activo");
        $crud->display_as("arl_id","Arl Id");
        $crud->display_as("fondo_cesantias_id","Fondo Cesantias Id");
        $crud->display_as("fondo_pensiones_id","Fondo Pensiones Id");
        $crud->display_as("afc_entidad_id","Afc Entidad Id");
        $crud->display_as("afc_cuenta_id","Afc Cuenta Id");
        $crud->display_as("fondo_pensiones_voluntario_id","Fondo Pensiones Voluntario Id");
        $crud->display_as("celular","Celular");
        $crud->display_as("telefono_emergencia","Telefono Emergencia");
        $crud->display_as("tipo_medida_id","Tipo Medida Id");
        $crud->display_as("tipo_compensacion_variable_id","Tipo Compensacion Variable Id");
        $crud->display_as("procentaje_compensacion_variable","Procentaje Compensacion Variable");
        $crud->display_as("nivel_educativo","Nivel Educativo");
        $crud->display_as("especialidad","Especialidad");
        //-- Tipos de Campos --------
        $crud->field_type("id", "numeric");
        $crud->field_type("nombre", "string");
        $crud->field_type("apellidos", "string");
        $crud->field_type("clave", "string");
        $crud->field_type("correo", "string");
        $crud->field_type("documento_numero", "string");
        $crud->field_type("documento_fecha_expedicion", "date");
        $crud->field_type("direccion_1", "string");
        $crud->field_type("direccion_2", "string");
        $crud->field_type("nacimiento_fecha", "date");
        $crud->field_type("numero_posicion", "string");
        $crud->field_type("posicion", "string");
        $crud->field_type("vicepresidencia", "string");
        $crud->field_type("sueldo", "numeric");
        $crud->field_type("compania", "string");
        $crud->field_type("fecha_finalizacion", "date");
        $crud->field_type("correo_externo", "string");
        $crud->field_type("correo_interno", "string");
        $crud->field_type("banda_salarial", "string");
        $crud->field_type("jefe_codigo", "string");
        $crud->field_type("jefe_nombre", "string");
        $crud->field_type("banco_deposito_cuenta", "string");
        $crud->field_type("eps", "string");
        $crud->field_type("fecha_creacion", "datetime");
        $crud->field_type("activo", "numeric");
        $crud->field_type("celular", "string");
        $crud->field_type("telefono_emergencia", "string");
        $crud->field_type("procentaje_compensacion_variable", "numeric");
        $crud->field_type("nivel_educativo", "string");
        $crud->field_type("especialidad", "string");
        //-- Relaciones 1-N --------
        $crud->set_relation("documento_tipo_id", "datos_documento_tipos","nombre");
        $crud->set_relation("pais_id", "datos_paises","nombre");
        $crud->set_relation("estado_id", "datos_paises_estados","nombre");
        $crud->set_relation("ciudad_id", "datos_ciudades","nombre");
        $crud->set_relation("nacimiento_pais_id", "datos_paises","nombre");
        $crud->set_relation("nacimiento_ciudad_id", "datos_ciudades","nombre");
        $crud->set_relation("moneda_id", "datos_monedas","nombre");
        $crud->set_relation("centro_costo_id", "empresa_centros_costo","nombre");
        $crud->set_relation("frecuencia_pago_id", "datos_frecuencias_pagos","nombre");
        $crud->set_relation("genero_id", "datos_generos","nombre");
        $crud->set_relation("estado_civil_id", "datos_estado_civiles","nombre");
        $crud->set_relation("contratos_tipos_id", "datos_contratos_tipos","nombre");
        $crud->set_relation("nomina_area_id", "empresa_nomina_areas","nombre");
        $crud->set_relation("banco_deposito_id", "datos_bancos","nombre");
        $crud->set_relation("banco_deposito_tipo_cuenta_id", "datos_banco_tipos_cuenta","nombre");
        $crud->set_relation("arl_id", "datos_arls","nombre");
        $crud->set_relation("fondo_cesantias_id", "datos_fondos_cesantias","nombre");
        $crud->set_relation("fondo_pensiones_id", "datos_fondos_pensiones","nombre");
        $crud->set_relation("afc_entidad_id", "datos_afc_entidades","nombre");
        $crud->set_relation("afc_cuenta_id", "datos_afc_cuentas","nombre");
        $crud->set_relation("fondo_pensiones_voluntario_id", "datos_fondos_pensiones_voluntarios","nombre");
        $crud->set_relation("tipo_medida_id", "datos_tipos_medidas","nombre");
        $crud->set_relation("tipo_compensacion_variable_id", "datos_tipos_compensaciones_variables","nombre");

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
