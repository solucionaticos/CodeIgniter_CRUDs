<?php
defined("BASEPATH") OR exit("Direct access to this script is not allowed.");
/**
 * @author: Solucionaticos.com
 * @name: Projects
 * @version: 1.0
 * @date: 2019-08-29 18:10:27 
 * */

class Tables_fields extends MY_Controller {

    //-- Construct --------
    public function __construct() {
        parent::__construct();
        // $this->ctrSegAdmin(); // Administrative Security Control
        // $this->load->library("grocery_CRUD"); // GroceryCrud library
    }

    public function index() {

        $projectVersionTitle = $this->admin_design->_projectVersionTitle();
        // $projectVersionTitle = "Nombre del Proyecto seleccionado, si hay uno seleccionado";

        $projects = $this->Model->getRowsJoin('proyectos');

        $js = "
<script type='text/javascript'>
$(function() {
    $('#project').change(function () {
        var project = $(this).val();

        $.ajax({
            url: \"" . base_url() . $this->config->item('adminPath') . "/database/tables_fields/versions\",
            cache: false,
            type: \"post\",
            data: {\"project\":project},
            dataType: \"json\",
            success:function(rows) {
                var version = '<select class=\"form-control\" id=\"version\" name=\"version\">'
                version += '<option value=\"0\"></option>'
                for(register of rows) {
                    version += '<option value=\"'+register.id+'\">'+register.nombre+'</option>'
                }
                version += '</select>';
                $('#selectVersion').html(version)
            }
        });

    });
} );    
</script>
";

        $attributes = array(
            'id' => 'form',
            'class' => 'form-horizontal'
        );
        //$form = form_open($this->config->item('adminPath') . '/database/tables_fields/project_validate', $attributes);
        $form = form_open($this->config->item('adminPath') . '/database/tables_fields/project_validate', $attributes);

        $data = array(
            'js' => $js,
            'tab_project' => 'active',
            'tab_sql' => '',
            'tab_data' => '', 
            'projects' => $projects, 
            'form' => $form,
            'projectVersionTitle' => $projectVersionTitle
        );

        //$this->admin_design->_load_layout($this->config->item('adminPath') . '/database/tables_fields/project', $data);
        $this->admin_design->_load_layout($this->config->item('adminPath') . '/database/tables_fields/project', $data);
    }


    public function project_validate () {
        $post = $this->input->post(NULL, TRUE);

        $projectVersionTitle = '';
        $projecName = '';
        $versionName = '';
        $newVersion = trim($post['new_version']);

        if ($post['project'] > '0') {
            $proyect = $this->Model->getRow('proyectos', $post['project']);
            $projecName = $proyect->nombre;

            if ($post['version'] > '0') {
                $version = $this->Model->getRow('versiones', $post['version']);
                $versionName = $version->nombre;
            } else {
                $versionName = $newVersion;
                $dataInsert = array(
                    'proyecto' => $post['project'],
                    'nombre' => $versionName
                );
                $post['version'] = $this->Model->insert('versiones', $dataInsert);
            }

            if ($versionName != '') {
                $projectVersionTitle = $projecName . ' ' . $versionName;
                $dataSession = array(
                    'project' => $post['project'],
                    'version' => $post['version'],
                    'new_version' => $newVersion,
                    'projectVersionTitle' => $projectVersionTitle,
                    'crud_tabla' => 0,
                    'tabla_filtro' => 0
                );
            } else {
                $dataSession = array(
                    'project' => 0,
                    'version' => 0,
                    'new_version' => '',
                    'projectVersionTitle' => '',
                    'crud_tabla' => 0,
                    'tabla_filtro' => 0
                );
            }
        } else {
            $dataSession = array(
                'project' => 0,
                'version' => 0,
                'new_version' => '',
                'projectVersionTitle' => '',
                'crud_tabla' => 0,
                'tabla_filtro' => 0
            );
        }

        $this->session->set_userdata($dataSession);

        redirect(base_url() . $this->config->item('adminPath') . '/database/tables_fields');

    }

    public function versions() {
        $post = $this->input->post(NULL, TRUE);

        $versions = $this->Model->getRowsJoin('versiones', 
            'id, nombre', 
            array(), 
            array('proyecto'=>$post['project']));

        echo json_encode($versions);

    }

    public function sql() {
        //$this->admin_design->_prjControl();

        $projectVersionTitle = $this->admin_design->_projectVersionTitle();

        $attributes = array(
            'id' => 'form',
            'class' => 'form-horizontal'
        );
        $form = form_open($this->config->item('adminPath') . '/database/tables_fields/sql_validate', $attributes);


        $js = '
<script language="Javascript" type="text/javascript" src="' . base_url() . 'assets/plugins/edit_area/edit_area_full.js"></script>
<script language="Javascript" type="text/javascript">
$(function () {
    editAreaLoader.init({
      id: "sql" // id of the textarea to transform    
      ,start_highlight: true  // if start with highlight
      ,allow_resize: "both"
      ,allow_toggle: true
      ,word_wrap: false
      ,language: "en"
      ,syntax: "sql"  
    });
});
</script>';

        $data = array(
            'js' => $js, 
            'tab_project' => '',
            'tab_sql' => 'active',
            'tab_data' => '',
            'form' => $form,
            'projectVersionTitle' => $projectVersionTitle
        );

        $this->admin_design->_load_layout($this->config->item('adminPath') . '/database/tables_fields/sql', $data);
    }


    public function sql_validate () {
        ini_set('max_execution_time', 0);
        $post = $this->input->post(NULL, TRUE);

        $project = 0;
        $version = 0;

        if ($this->session->has_userdata('project')) {
            $project = $this->session->userdata('project');
        }
        if ($this->session->has_userdata('version')) {
            $version = $this->session->userdata('version');
        }

        $this->Model->delete('tablas', '', '', array('proyecto' => $project, 'version' => $version));
        $this->Model->delete('campos', '', '', array('proyecto' => $project, 'version' => $version));

        $mat_lineas_sql = explode("\n", $post['sql']);
        foreach ($mat_lineas_sql as $key => $value) {
            $value = trim($value);
            if ($value === "" 
                or $value[0] === ")" 
                or $value[0] === "#") {

            } else {
                $sql_linea = trim(htmlentities($value)); // A2

                if ( substr($sql_linea,-1,1) == ',' ) {
                    $sql_linea = substr($sql_linea,0,-1);
                }
                $mat_tipo_campo_completo = explode("`", $sql_linea);
                if (count($mat_tipo_campo_completo)) {

                    $tipo_campo_completo = '';
                    if (isset($mat_tipo_campo_completo[2]))
                        $tipo_campo_completo = strtolower(trim($mat_tipo_campo_completo[2]));

                    $nombre = '';
                    if (isset($mat_tipo_campo_completo[1]))
                       $nombre = $mat_tipo_campo_completo[1];
                    $etiqueta = ucwords(str_ireplace("_"," ",$nombre));          
                    $dataFields1 = array(
                        'usuario' => 1,
                        'proyecto' => $project,
                        'version' => $version,
                        'sql_linea' => $sql_linea,
                        'nombre' => $nombre,
                        'etiqueta' => $etiqueta,
                        'etiqueta_lista' => $etiqueta,
                        'etiqueta_nuevo' => $etiqueta,
                        'etiqueta_editar' => $etiqueta,
                        'etiqueta_filtros' => $etiqueta,
                        'lista' => 4,
                        'nuevo' => 4,
                        'editar' => 4,
                        'filtros' => 5,
                        'llave_primaria' => '5',
                        'indice' => '5',
                        'unico' => '5'
                    );
                    $this->Model->insert('campos', $dataFields1);                    
                }
            }
        }
  
  
        $fields = $this->Model->getRowsJoin('campos', 
            '',
            array(),
            array(
                'proyecto' => $project,
                'version' => $version
                ),
            'id');

        if (count($fields)) {
            $tabla_anterior_id = 0;
            $orden = 0;
            foreach ($fields as $key => $row) {

                $eliminar = false;
                $tabla_id = 0; 
                $tabla = ''; // C2   

                $tipo_dato = 0; // B2 
                if (strtolower(substr($row["sql_linea"],0,12)) === "create table") {
                    $tipo_dato = 1;
                    $eliminar = true;
                } elseif (strtolower(substr($row["sql_linea"],0,2)) === "--") {
                    $tipo_dato = 3;
                    $eliminar = true;
                } elseif (strtolower(substr($row["sql_linea"],0,2)) === "/*") {
                    $tipo_dato = 3;
                    $eliminar = true;
                } else {
                    $tipo_dato = 2;
                }              

                if ($tipo_dato == 1) {
                    $mat_tabla = explode("`", $row["sql_linea"]);
                    if (isset($mat_tabla[1])) {
                        $tabla = $mat_tabla[1];
                        $etiqueta = ucwords(str_ireplace("_"," ",$tabla));  
                        $dataTables2 = array(
                            'usuario' => 1,
                            'proyecto' => $project,
                            'version' => $version,
                            'nombre' => $tabla,
                            'etiqueta' => $etiqueta
                        );
                        $tabla_id = $this->Model->insert('tablas', $dataTables2);
                        $tabla_anterior_id = $tabla_id;
                        $orden = 0;
                    }
                }

                if ($tipo_dato == 2) {
                    $tabla_id = $tabla_anterior_id;
                }

                $dataFieldsUpdate11 = array(
                    'tabla' => $tabla_id,
                    'orden' => $orden,
                    'orden_lista' => $orden,
                    'orden_nuevo' => $orden,
                    'orden_editar' => $orden,
                    'orden_filtros' => $orden
                );

                $this->Model->update('campos', $dataFieldsUpdate11, $row['id']);

                $mat = explode("`",$row["sql_linea"]);

                if (isset($mat[1])) {
                    $campo = $mat[1];
                    if (strtolower(substr($row["sql_linea"], 0, 12)) === 'primary key ') {
                        // PRIMARY KEY (`num`),
                        $eliminar = true;

                        $dataFieldsUpdate12 = array(
                            'llave_primaria' => '4'
                        );
                        $this->Model->update('campos', $dataFieldsUpdate12, '', '', array('tabla' => $tabla_id, 'nombre' => $campo, 'proyecto' => $project, 'version' => $version));

                    }
                    if (strtolower(substr($row["sql_linea"], 0, 4)) === 'key ') {
                        // KEY `active` (`active`),
                        $eliminar = true;

                        $dataFieldsUpdate13 = array(
                            'indice' => '4'
                        );
                        $this->Model->update('campos', $dataFieldsUpdate13, '', '', array('tabla' => $tabla_id, 'nombre' => $campo, 'proyecto' => $project, 'version' => $version));

                    }
                    if (strtolower(substr($row["sql_linea"], 0, 11)) === 'unique key ') {
                        //  UNIQUE KEY `cust_code` (`cust_code`),
                        $eliminar = true;

                        $dataFieldsUpdate14 = array(
                            'unico' => '4'
                        );
                        $this->Model->update('campos', $dataFieldsUpdate14, '', '', array('tabla' => $tabla_id, 'nombre' => $campo, 'proyecto' => $project, 'version' => $version));

                    }
                    
                }

                if ($eliminar) {
                    $this->Model->delete('campos', '', '', array('id' => $row['id']));
                }         
              
                $orden++;
            }
        }
  
        $fields = $this->Model->getRowsJoin('campos', 
            '',
            array(),
            array(
                'proyecto' => $project,
                'version' => $version
                ),
            'id');

        if (count($fields)) {
            foreach ($fields as $key => $row) {
   
                //$nombre = '';
                //$etiqueta = '';
                $autonumerico = 5;
                $llave_primaria = 5;
                $sin_signo = 5;
                $no_nulo = 5;
                $defecto = 5;
                $defecto_valor = '';
                $comentario = 5;
                $comentario_valor = '';
                $tipo_campo_completo = ''; 
                $tipo_dato = '';
                $tamano = '';
                $archivo = 5;

                $sql_linea = trim($row["sql_linea"]);
                if ( substr($sql_linea,-1,1) == ',' ) {
                    $sql_linea = substr($sql_linea,0,-1);
                }
                $mat_tipo_campo_completo = explode("`", $sql_linea);
                $tipo_campo_completo = '';
                if (isset($mat_tipo_campo_completo[2]))
                    $tipo_campo_completo = strtolower(trim($mat_tipo_campo_completo[2]));

                if ( strstr($tipo_campo_completo,"auto_increment") ) {
                    $autonumerico = 4;
                }
              
                if ( strstr($tipo_campo_completo,"auto_increment") ) {
                    $llave_primaria = 4;
                }
              
                if ( strstr($tipo_campo_completo," unsigned") ) {
                    $sin_signo = 4;
                }
              
                if ( strstr($tipo_campo_completo,"not null") ) {
                    $no_nulo = 4;
                }
              
                $sql_linea_aux = '';
                if ( strstr($tipo_campo_completo," comment ") ) {
                    $comentario = 4;
                    $mat_comment = explode(" COMMENT ", $sql_linea);

                    if (count($mat_comment)) {
                        $comentario_valor = '';
                        if (isset($mat_comment[1]))
                            $comentario_valor = $mat_comment[1];
                        $comentario_valor = str_ireplace('"',"''",$comentario_valor);
                        if ( strstr($tipo_campo_completo," default ") ) {
                            $defecto = 4;
                            $sql_linea_aux = '';
                            if (isset($mat_comment[0]))
                                $sql_linea_aux = $mat_comment[0];
                        }                        
                    }

                }
                if ( strstr($tipo_campo_completo," default ") ) {
                    $defecto = 4;
                }
                $defecto_valor = '';
                if ($defecto == 4) {
                    $mat_default = explode(" DEFAULT ", $sql_linea_aux);
                    if (isset( $mat_default[1])) {
                        $defecto_valor = $mat_default[1];
                        $defecto_valor = str_ireplace('"',"''",$defecto_valor);                        
                    }
                }

                $mat_campo = explode(" ", $sql_linea);
                $tipo_dato = '';
                if (isset($mat_campo[1])) {
                    $tipo_dato = $mat_campo[1];    
                }

                if (substr($tipo_dato,0,3) == 'set') {
                    $tipo_dato = 'set';
                }

                $mat_campo = explode("(", $tipo_dato);
                $tipo_dato = trim($mat_campo[0]);
                if (isset($mat_campo[1])) {
                    $tamano = substr(trim($mat_campo[1]),0,-1);
                }        

                $tipo_campo = 0;
                $tipo_entrada = 0;
                switch ($tipo_dato) {

                   case 'tinyint': //A very small integer
                    $tipo_campo = 23;
                    $tipo_entrada = 36;
                    break;
                   case 'smallint': //A small integer
                    $tipo_campo = 23;
                    $tipo_entrada = 36;
                    break;
                   case 'mediumint': //A medium-sized integer
                    $tipo_campo = 23;
                    $tipo_entrada = 36;
                    break;
                   case 'int': //A standard integer
                    $tipo_campo = 23;
                    $tipo_entrada = 36;
                    break;
                   case 'bigint': //A large integer
                    $tipo_campo = 23;
                    $tipo_entrada = 36;
                    break;
                   case 'decimal': //A fixed-point number
                    $tipo_campo = 23;
                    $tipo_entrada = 36;
                    break;
                   case 'float': //A single-precision floating point number
                    $tipo_campo = 23;
                    $tipo_entrada = 36;
                    break;
                   case 'double': //A double-precision floating point number
                    $tipo_campo = 23;
                    $tipo_entrada = 36;
                    break;
                   case 'bit': //A bit field
                    $tipo_campo = 23;
                    $tipo_entrada = 36;
                    break;

                   case 'char': //A fixed-length nonbinary (character) string
                    $tipo_campo = 24;
                    $tipo_entrada = 42;
                    break;
                   case 'varchar': //A variable-length non-binary string
                    $tipo_campo = 24;
                    $tipo_entrada = 42;
                    break;
                   case 'binary': //A fixed-length binary string
                    $tipo_campo = 24;
                    $tipo_entrada = 42;
                    break;
                   case 'varbinary': //A variable-length binary string
                    $tipo_campo = 24;
                    $tipo_entrada = 42;
                    break;
                   case 'tinyblob': //A very small blob (binary large object)
                    $tipo_campo = 24;
                    $tipo_entrada = 42;
                    break;
                   case 'blob': //A small blob
                    $tipo_campo = 24;
                    $tipo_entrada = 42;
                    break;
                   case 'mediumblob': //A medium-sized blob
                    $tipo_campo = 24;
                    $tipo_entrada = 42;
                    break;
                   case 'longblob': //A large blob
                    $tipo_campo = 24;
                    $tipo_entrada = 42;
                    break;
                   case 'tinytext': //A very small non-binary string
                    $tipo_campo = 24;
                    $tipo_entrada = 42;
                    break;
                   case 'text': //A small non-binary string
                    $tipo_campo = 25;
                    $tipo_entrada = 41;
                    break;
                   case 'mediumtext': //A medium-sized non-binary string
                    $tipo_campo = 24;
                    $tipo_entrada = 41;
                    break;
                   case 'longtext': //A large non-binary string
                    $tipo_campo = 24;
                    $tipo_entrada = 41;
                    break;
                   case 'enum': //An enumeration; each column value may be assigned one enumeration member
                    $tipo_campo = 24;
                    $tipo_entrada = 32;
                    break;
                   case 'set': //A set; each column value may be assigned zero or more set members
                    $tipo_campo = 24;
                    $tipo_entrada = 33;
                    break;

                   case 'date': //A date value in ccyy-mm-dd format
                    $tipo_campo = 26;
                    $tipo_entrada = 38;
                    break;
                   case 'time': //A time value in hh:mm:ss format
                    $tipo_campo = 26;
                    $tipo_entrada = 38;
                    break;
                   case 'datetime': //A date and time value inccyy-mm-dd hh:mm:ssformat
                    $tipo_campo = 27;
                    $tipo_entrada = 39;
                    break;
                   case 'timestamp': //A timestamp value in ccyy-mm-dd hh:mm:ss format
                    $tipo_campo = 27;
                    $tipo_entrada = 39;
                    break;
                   case 'year': //A year value in ccyy or yy format
                    $tipo_campo = 26;
                    $tipo_entrada = 38;
                    break;

                }

                $dataFieldsUpdate31 = array(
                    'autonumerico' => $autonumerico, 
                    'llave_primaria' => $llave_primaria, 
                    'sin_signo' => $sin_signo, 
                    'no_nulo' => $no_nulo, 
                    'defecto' => $defecto,  
                    'defecto_valor' => $defecto_valor,  
                    'comentario' => $comentario,  
                    'comentario_valor' => $comentario_valor,
                    'tipo_dato' => $tipo_dato, 
                    'tipo_campo' => $tipo_campo, 
                    'tipo_entrada' => $tipo_entrada, 
                    'tamano' => $tamano, 
                    'archivo' => $archivo 
                );
                $this->Model->update('campos', $dataFieldsUpdate31, $row["id"]);

            }
        }

        $this->_cruds();

        redirect(base_url() . $this->config->item('adminPath') . '/database/tables_fields/data');

    }


    function _cruds() {

        $project = 0;
        $version = 0;

        if ($this->session->has_userdata('project')) {
            $project = $this->session->userdata('project');
        }
        if ($this->session->has_userdata('version')) {
            $version = $this->session->userdata('version');
        }

        // $this->Model->delete('cruds', '', '', array('proyecto' => $project, 'version' => $version));
        // $this->Model->delete('cruds_detalles', '', '', array('proyecto' => $project, 'version' => $version));
        $this->Model->delete('campos_validaciones', '', '', array('proyecto' => $project, 'version' => $version));

        // $tables = $this->Model->registros('tablas', 'id, nombre', array( 'proyecto'=>$this->session->userdata('project'), 'version'=>$this->session->userdata('version') ), 'id ASC' );
        // foreach ($tables as $key => $regTable) {

        //     $dataCrudInsert = array(
        //         'usuario' => 1,
        //         'proyecto' => $project,
        //         'version' => $version,
        //         'script' => $regTable['nombre'],
        //         'titulo' => $regTable['nombre'],
        //         'ambiente' => '8',
        //         'carpeta_1' => 'backend',
        //         'tabla' => $regTable['id'],
        //         'nuevo' => '4',
        //         'editar' => '4',
        //         'ver' => '4',
        //         'borrar' => '4',
        //         'exportar' => '4',
        //         'imprimir' => '4',
        //         'tipo_crud' => '10'
        //     );
        //     $crud = $this->Model->insert('cruds', $dataCrudInsert);
        //     if (isset($fields)) unset($fields);
        //     $fields = $this->Model->registros('campos', 'id', array('tabla'=>$regTable['id'] ), 'id ASC');
        //     foreach ($fields as $key => $regField) {

        //         $dataCrudDetInsert = array(
        //             'usuario' => 1,
        //             'proyecto' => $project,
        //             'version' => $version,
        //             'crud' => $crud,
        //             'tabla' => $regTable['id'],
        //             'campo' => $regField['id'],
        //             'lista' => '4',
        //             'nuevo' => '4',
        //             'editar' => '4',
        //             'ver' => '4',
        //             'exportar' => '4',
        //             'imprimir' => '4'
        //         );
        //         $this->Model->insert('cruds_detalles', $dataCrudDetInsert);
        //     }            
        // }

    }

    public function data() {
        // $this->_prjControl();

        $projectVersionTitle = $this->admin_design->_projectVersionTitle();

        $css = '';
        $js = '';
        if ($projectVersionTitle != 'None') {
            $css = '
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">';

            $js = '
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>';

            $js .= "
<script type='text/javascript'>
$(document).ready(function() {
    $('#lista').DataTable({
        initComplete: function () {
              this.api().columns([1,2,3,5,6,7,8,9 ,10,11,13,15, 17,18, 20, 22,23,24,25, 29,30,31,32,33,34]).every( function () {
                  var column = this;
                  var select = $('<select><option value=\"\"></option></select>')
                      .appendTo( $(column.footer()).empty() )
                      .on( 'change', function () {
                          var val = $.fn.dataTable.util.escapeRegex(
                              $(this).val()
                          );
                          column
                              .search( val ? '^'+val+'$' : '', true, false )
                              .draw();
                      } );
                  column.data().unique().sort().each( function ( d, j ) {
                      select.append( '<option value=\"'+d+'\">'+d+'</option>' )
                  } );
              } );
        },   
        dom: 'Bfrtip',
        buttons: [
        { extend: 'copyHtml5', footer: true },
        { extend: 'excelHtml5', footer: true },
        { extend: 'csvHtml5', footer: true },
        { extend: 'pdfHtml5', footer: true }
        ]
    });
} );    
</script>
";
        }

        $project = 0;
        $version = 0;

        if ($this->session->has_userdata('project')) {
            $project = $this->session->userdata('project');
        }
        if ($this->session->has_userdata('version')) {
            $version = $this->session->userdata('version');
        }

        $fields = $this->Model->getRowsJoin('campos', 
            '',
            array(),
            array(
                'proyecto' => $project,
                'version' => $version
                ));

        $mat_sino[5] = 'No';
        $mat_sino[4] = 'Si';

        foreach ($fields as $key => $row) {
            $fields[$key]['tabla'] = $this->admin_design->_getName('tablas', $row['tabla'], $project, $version);
            $fields[$key]['tipo_campo'] = $this->Model->getRow('datos_valores', $row['tipo_campo'])->nombre;
            $fields[$key]['tipo_entrada'] = $this->Model->getRow('datos_valores', $row['tipo_entrada'])->nombre;
            $fields[$key]['relacion_datos'] = $this->Model->getRow('datos', $row['relacion_datos'])->nombre;
            $fields[$key]['relacion_datos'] = $this->Model->getRow('datos', $row['relacion_datos'])->nombre;
            $fields[$key]['relacion_tabla'] = $this->admin_design->_getName('tablas', $row['relacion_tabla'], $project, $version);
            $fields[$key]['relacion_tabla_n'] = $this->admin_design->_getName('tablas', $row['relacion_tabla_n'], $project, $version);
            $fields[$key]['relacion_tabla_m'] = $this->admin_design->_getName('tablas', $row['relacion_tabla_m'], $project, $version);
            $fields[$key]['relacion_campo'] = $this->admin_design->_getName('campos', $row['relacion_campo'], $project, $version);
            $fields[$key]['relacion_nombre'] = $this->admin_design->_getName('campos', $row['relacion_nombre'], $project, $version);
            $fields[$key]['relacion_campo_n'] = $this->admin_design->_getName('campos', $row['relacion_campo_n'], $project, $version);
            $fields[$key]['relacion_campo_m_tabla_a'] = $this->admin_design->_getName('campos', $row['relacion_campo_m_tabla_a'], $project, $version);
            $fields[$key]['relacion_campo_m_tabla_b'] = $this->admin_design->_getName('campos', $row['relacion_campo_m_tabla_b'], $project, $version);
            $fields[$key]['relacion_campo_m_prioridad'] = $this->admin_design->_getName('campos', $row['relacion_campo_m_prioridad'], $project, $version);

            $fields[$key]['autonumerico'] = $mat_sino[$row["autonumerico"]];
            $fields[$key]['llave_primaria'] = $mat_sino[$row["llave_primaria"]];
            $fields[$key]['unico'] = $mat_sino[$row["unico"]];
            $fields[$key]['indice'] = $mat_sino[$row["indice"]];
            $fields[$key]['sin_signo'] = $mat_sino[$row["sin_signo"]];
            $fields[$key]['no_nulo'] = $mat_sino[$row["no_nulo"]];
            $fields[$key]['defecto'] = $mat_sino[$row["defecto"]];
            $fields[$key]['comentario'] = $mat_sino[$row["comentario"]];
            $fields[$key]['archivo'] = $mat_sino[$row["archivo"]];
        }

        $data = array(
            'css' => $css,
            'js' => $js,
            'tab_project' => '',
            'tab_sql' => '',
            'tab_data' => 'active',
            'fields' => $fields,
            'projectVersionTitle' => $projectVersionTitle
        );

        $this->admin_design->_load_layout($this->config->item('adminPath') . '/database/tables_fields/data', $data);

    }

}