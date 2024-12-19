<?php
defined("BASEPATH") OR exit("Direct access to this script is not allowed.");
/**
 * @author: Solucionaticos.com
 * @name: Projects
 * @version: 1.0
 * @date: 2019-08-28 21:10:27 
 * */

class Ci_datatables extends MY_Controller {

    public $proyecto = 0;
    public $version = 0;
    public $tabla = 0;
    public $campo = 0;
    public $crud = 0;

    //-- Construct --------
    public function __construct() {
        parent::__construct();
        //$this->ctrSegAdmin(); // Administrative Security Control
        // $this->load->library("grocery_CRUD"); // GroceryCrud library
        //$this->_prjControl();
        $this->load->helper('file');
    }

    public function index() {

        $projectVersionTitle = $this->admin_design->_projectVersionTitle();

        if ($this->session->has_userdata('project')) {
            $project = $this->session->userdata('project');
        }
        if ($this->session->has_userdata('version')) {
            $version = $this->session->userdata('version');
        }

		$cruds = $this->Model->getRowsJoin(
			'cruds c', 
			'c.id, c.script, c.carpeta_1, c.carpeta_2, GROUP_CONCAT(cp.nombre) fields, c.path, c.fecha_generacion, c.tabla, t.nombre tabla_nombre',  
			array(
				'cruds_detalles cd' => array('cd.crud = c.id',''),
				'campos cp' => array('cd.campo = cp.id',''),
				'tablas t' => array('cd.tabla = t.id',''),
			), 
			array('c.proyecto' => $project, 'c.version' => $version), 'c.id ASC', 'c.id');


        $css = '';
        $js = '';
        if ($projectVersionTitle != 'None') {
            $css = '
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">';

	        $proyVar = '<script>var proyVar ={"base_url":"http:\/\/localhost:8888\/'.$this->config->item('projectPath').'\/","language":"spanish","lang":"es"};var proyVarS ={"sgctn":"ci_csrf_token","sgch":""};</script>';

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
'paging': false,
		'order': [[ 3, 'asc' ]],
		'columnDefs': [ {'targets': 0,'orderable': false}, {'targets': 1,'orderable': false}, {'targets': 4,'orderable': false} ],
        dom: 'Bfrtip',
        buttons: [
        { extend: 'copyHtml5', footer: true },
        { extend: 'excelHtml5', footer: true },
        { extend: 'csvHtml5', footer: true },
        { extend: 'pdfHtml5', footer: true }
        ]
    });

	$('#selectAll').change(function () {
		if ( $('#selectAll').prop('checked') ) {
			$('.selectRow').each(function() {
				$(this).prop('checked', true);
			});
		} else {
			$('.selectRow').each(function() {
				$(this).prop('checked', false);
			});
		}
	});

	$('#generateSelectRows').click(function () {
		var ids = '';
		$('.selectRow').each(function() {
		    if ( $(this).prop('checked') ) {
		    	ids += $(this).val() + ',';
		    }
		});
		ids += '0';
		$.ajax({
			url: proyVar.base_url + proyVar.admin_path + '/cruds/ci_datatables/generate_list_ids',	
			cache: false,
			type: 'post',
			data: {'ids':ids},
			success:function(datos) {
				//tksec = datos.tksec;
				location.href = proyVar.base_url +  + '/cruds/ci_datatables';
			}
		});

	});

} );    
</script>
";
        }

		$data = array(
			'css' => $css, 
            'proyVar' => $proyVar,
			'js' => $js, 
			'class_header' => 'nav_header_home',
			'value_header' => 'nav-link-active',
			'class_footer' => 'nav_footer_home',
			'value_footer' => 'active',
            'projectVersionTitle' => $projectVersionTitle,
            'cruds' => $cruds 
		);

		// Views
		$this->admin_design->_load_layout($this->config->item('adminPath') . '/cruds/ci_datatables/cruds', $data);

    }

    public function crud($id) {

        $projectVersionTitle = $this->admin_design->_projectVersionTitle();

        $css = '
<style>
	textarea {
		width:100%;
	}
</style>';

        $js = '
<script language="Javascript" type="text/javascript" src="' . base_url() . 'assets/plugins/edit_area/edit_area_full.js"></script>
<script language="Javascript" type="text/javascript">
$(function () {
	editAreaLoader.init({
		id: "controlador"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "php"	
	}); 
	editAreaLoader.init({
		id: "vista"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "php"	
	}); 
	editAreaLoader.init({
		id: "js"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "js"	
	}); 
	editAreaLoader.init({
		id: "css"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "css"	
	}); 

	setTimeout(function(){ $("#logoAdmin").focus(); }, 3000);
});
</script>';

        $CIDatatables = $this->_codeCIDatatables($id);

		$code_controller = $CIDatatables['code_controller'];
		$code_view = $CIDatatables['code_view'];
		$code_js = $CIDatatables['code_js'];
		$code_css = $CIDatatables['code_css'];

		$folder = $CIDatatables['folder'];
		$file = $CIDatatables['file'];

// -------------------------------------------------------------------------------------

$code_view = str_replace("textarea","areatext",$code_view);

        $data = array(
        	'css' => $css, 
            'js' => $js, 
            'projectVersionTitle' => $projectVersionTitle, 
			'code_controller' => $code_controller, 
			'code_view' => $code_view, 
			'code_js' => $code_js, 
			'code_css' => $code_css, 
            'id' => $id,
            'folder' => $folder, 
            'file' => $file, 

        );

        $this->admin_design->_load_layout($this->config->item('adminPath') . '/cruds/ci_datatables/crud', $data);

    }

    public function crud_cruds($id) {

        $projectVersionTitle = $this->admin_design->_projectVersionTitle();

        $css = '
<style>
	textarea {
		width:100%;
	}
</style>';

        $js = '
<script language="Javascript" type="text/javascript" src="' . base_url() . 'assets/plugins/edit_area/edit_area_full.js"></script>
<script language="Javascript" type="text/javascript">
$(function () {
	editAreaLoader.init({
		id: "controlador"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "php"	
	}); 
	editAreaLoader.init({
		id: "vista"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "php"	
	}); 
	editAreaLoader.init({
		id: "js"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "js"	
	}); 
	editAreaLoader.init({
		id: "css"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "css"	
	}); 

	setTimeout(function(){ $("#logoAdmin").focus(); }, 3000);
});
</script>';

        $CIDatatables = $this->_codeCIDatatables($id);

		$code_controller = $CIDatatables['code_controller'];
		$code_view = $CIDatatables['code_view'];
		$code_js = $CIDatatables['code_js'];
		$code_css = $CIDatatables['code_css'];

		$folder = $CIDatatables['folder'];
		$file = $CIDatatables['file'];

// -------------------------------------------------------------------------------------

$code_view = str_replace("textarea","areatext",$code_view);

        $data = array(
        	'css' => $css, 
            'js' => $js, 
            'projectVersionTitle' => $projectVersionTitle, 
			'code_controller' => $code_controller, 
			'code_view' => $code_view, 
			'code_js' => $code_js, 
			'code_css' => $code_css, 
            'id' => $id,
            'folder' => $folder, 
            'file' => $file, 

        );

        $this->admin_design->_load_layout($this->config->item('adminPath') . '/cruds/ci_datatables/crud_cruds', $data);

    }

    public function generate($id) {

		$this->_generateCode($id);
		redirect($this->config->item('adminPath') . '/cruds/ci_datatables/crud/' . $id);

    }

    public function generate_cruds($id) {

		$this->_generateCode($id);
		redirect($this->config->item('adminPath') . '/cruds/ci_datatables/crud_cruds/' . $id);

    }

	public function generate_list($id) {

		$this->_generateCode($id);
		redirect($this->config->item('adminPath') . '/cruds/ci_datatables');

    }

	public function generate_list_ids() {
	    $post = $this->input->post();

	    $ids = $post['ids'];
	    $listIds = explode(',', $ids);
	    foreach ($listIds as $id) {
	    	if ($id != '0') $this->_generateCode($id);
	    }
		redirect($this->config->item('adminPath') . '/cruds/ci_datatables');
	}

	public function generate_list_ids_cruds() {
	    $post = $this->input->post();

	    $ids = $post['ids'];
	    $listIds = explode(',', $ids);
	    foreach ($listIds as $id) {
	    	if ($id != '0') $this->_generateCode($id);
	    }
	}

    function _generateCode($id) {

        $CIDatatables = $this->_codeCIDatatables($id);

        $path = '';

		$folder_1 = $CIDatatables['folder_1'];
		$folder_2 = $CIDatatables['folder_2'];
		$file = $CIDatatables['file'];
		$code_controller = $CIDatatables['code_controller'];
		$code_view = $CIDatatables['code_view'];
		$code_js = $CIDatatables['code_js'];
		$code_css = $CIDatatables['code_css'];
		$project_name = (trim($CIDatatables['projectName']));
		$version_name = (trim($CIDatatables['versionName']));
		$tableName = (trim($CIDatatables['tableName']));


		$path = 'assets/cruds/ci_datatables/' . $project_name;
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}
		$path .= '/' . $version_name;
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		$path .= '/application';
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		// ---------------------------------------------------------------------------------------------------------		
		// $code_controller
		// ---------------------------------------------------------------------------------------------------------		

		$path .= '/controllers';
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		$path .= '/' . $folder_1;
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		if (trim($folder_2) != '') {
			$path .= '/' . $folder_2;
			if (!is_dir($path)) {
				mkdir('./' . $path, 0777, TRUE);
			}			
		}

		$pathFile = './' . $path . '/' . ucfirst($file);
		if ( !write_file($pathFile, $code_controller)) {
			echo 'Unable to write the file: ' . $pathFile;
			die();
		}

		// ---------------------------------------------------------------------------------------------------------		
		// $code_view
		// ---------------------------------------------------------------------------------------------------------		
		$path = 'assets/cruds/ci_datatables/' . $project_name . '/' . $version_name . '/application';

		$path .= '/views';
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		$path .= '/' . $folder_1;
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		if (trim($folder_2) != '') {
			$path .= '/' . $folder_2;
			if (!is_dir($path)) {
				mkdir('./' . $path, 0777, TRUE);
			}			
		}

		$pathFile = './' . $path . '/' . $file;
		if ( !write_file($pathFile, $code_view)) {
			echo 'Unable to write the file: ' . $pathFile;
			die();
		}

		// ---------------------------------------------------------------------------------------------------------		
		// $code_js
		// ---------------------------------------------------------------------------------------------------------		
		$path = 'assets/cruds/ci_datatables/' . $project_name . '/' . $version_name;

		$path .= '/assets';
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		$path .= '/js';
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		$path .= '/' . $folder_1;
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		if (trim($folder_2) != '') {
			$path .= '/' . $folder_2;
			if (!is_dir($path)) {
				mkdir('./' . $path, 0777, TRUE);
			}			
		}

		$path .= '/' . $tableName;
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		$pathFile = './' . $path . '/' . 'view.js';
		if ( !write_file($pathFile, $code_js)) {
			echo 'Unable to write the file: ' . $pathFile;
			die();
		}

		// ---------------------------------------------------------------------------------------------------------		
		// $code_css
		// ---------------------------------------------------------------------------------------------------------		
		$path = 'assets/cruds/ci_datatables/' . $project_name . '/' . $version_name;

		$path .= '/assets';
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		$path .= '/css';
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		$path .= '/' . $folder_1;
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		if (trim($folder_2) != '') {
			$path .= '/' . $folder_2;
			if (!is_dir($path)) {
				mkdir('./' . $path, 0777, TRUE);
			}			
		}

		$path .= '/' . $tableName;
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		$pathFile = './' . $path . '/' . 'view.css';
		if ( !write_file($pathFile, $code_css)) {
			echo 'Unable to write the file: ' . $pathFile;
			die();
		}

		// ---------------------------------------------------------------------------------------------------------		
		// Update CRUDS
		// ---------------------------------------------------------------------------------------------------------		

		$path = 'assets/cruds/' . $project_name . '/' . $version_name;

		$data = array(
			'path' => $path,
			'code_controller_ci_datatable' => $code_controller,
			'code_view_ci_datatable' => $code_view,
			'code_js_ci_datatable' => $code_js,
			'code_css_ci_datatable' => $code_css,
			'fecha_generacion' => date('Y-m-d H:i:s'),
			'script' => ucfirst($file),
		);
		$this->Model->update('cruds', $data, $id);

    }

    function _codeCIDatatables($id) {

        $crud = $this->Model->getRow('cruds', $id);

        if ( $crud ) {

	        // --------------------------------------------------------------
	        $tableRow = $this->Model->getRow('tablas', $crud->tabla);
	        $tableName = $tableRow->nombre;
	        $crudClass = ucfirst($tableName);

			$script = ucwords($tableName) . '.php';
            $tabla = $crud->tabla;

			$ambiente = $this->config->item('adminPath') . '/';
			if ($crud->ambiente == 9) {
				$ambiente = 'front/';
			}
		
			$carpeta_1 = $crud->carpeta_1;
			$carpeta_2 = $crud->carpeta_2;
			$path = trim($carpeta_1);
			if (trim($carpeta_2) != '') $path .= '/' . $carpeta_2;

			$crudTitulo = $crud->titulo;
			$crudTitulo = ucwords(str_replace("_", " ", $crudTitulo));

			$crudNuevo = $crud->nuevo;
			$crudEditar = $crud->editar;
			$crudVer = $crud->ver;
			$crudBorrar = $crud->borrar;
			$crudExportar = $crud->exportar;
			$crudImprimir = $crud->imprimir;

	        // --------------------------------------------------------------
			$projectRow = $this->Model->getRow('proyectos', $crud->proyecto);
			$versionRow = $this->Model->getRow('versiones', $crud->version);
			$projectName = $projectRow->nombre;
			$versionName = $versionRow->nombre;

			$tableId = 'id';
			$countRow = 3;

			$crud_form_open = 'form_open';
			$crud_set_rules = '';
			$crud_set_relation = '';
			$crud_set_relation_list = '';
			$crud_set_field_upload = '';
			$crud_insert_data_post = '';
			$crud_list = '';
			$crud_list_ssp = '';
			$crud_labels_list = '';
			$crud_data_new = '';
			$crud_data_edit = '';
			$crud_js_rules = '';

	        // --------------------------------------------------------------
			if ($crud->proyecto > 0 and $crud->version > 0 and $crud->tabla > 0) {

				$regCampos = $this->Model->registros('campos', '', 
				array('usuario'=>1, 
					'proyecto'=>$crud->proyecto, 
					'version'=>$crud->version, 
					'tabla'=>$crud->tabla), 
					'orden ASC');
				if ( count($regCampos) ) {
					foreach ($regCampos as $regCampo) {

						$relationTable = '';
						$relationFieldId = '';
						$relationFieldText = '';

						if ($regCampo['nombre'] != 'id') {
							$crud_labels_list .= '                                <th>' . $regCampo['etiqueta'] . '</th>
';
						}

						// - Nombre del campo que es la llave primaria ------------------------------
						if ($regCampo['llave_primaria'] == 4) {
							$tableId = $regCampo['nombre'];
						}


						// - Relaciones 1-N de los campos ---------------------------------------------
						if ($regCampo['relacion_datos'] > 0) {
							$relacion_codigo = $this->Model->registro('datos', $regCampo['relacion_datos']);
							$crud_set_relation .= '
$tabla_datos_valores_'.$relacion_codigo->codigo.' = $this->Model->registros("datos_valores", "id, nombre", array("dato"=>'.$regCampo['relacion_datos'].'), "nombre ASC" );
$this->parameters["datos"]["tabla_datos_valores_'.$relacion_codigo->codigo.'"] = $tabla_datos_valores_'.$relacion_codigo->codigo.';';

							$crud_set_relation_list .= '
          $'.$regCampo['nombre'].' = $this->Model->registro("datos_valores", $registro["'.$regCampo['nombre'].'"]);
          if ($'.$regCampo['nombre'].') {
             $registro["'.$regCampo['nombre'].'"] = $'.$regCampo['nombre'].'->nombre;
          } 
';

							$relationTable = 'tabla_datos_valores_'.$relacion_codigo->codigo;
							$relationFieldId = 'id';
							$relationFieldText = 'nombre';

						} elseif ($regCampo['relacion_tabla'] > 0 and $regCampo['relacion_campo'] > 0 and $regCampo['relacion_nombre'] > 0) {

							$relacion_tabla = $this->Model->registro('tablas', $regCampo['relacion_tabla']);
							$relacion_campo = $this->Model->registro('campos', $regCampo['relacion_campo']);
							$relacion_nombre = $this->Model->registro('campos', $regCampo['relacion_nombre']);

							$crud_set_relation_list .= '
          $'.$regCampo['nombre'].' = $this->Model->registro("'.$relacion_tabla->nombre.'", $registro["'.$regCampo['nombre'].'"]);
          if ($'.$regCampo['nombre'].') {
             $registro["'.$regCampo['nombre'].'"] = $'.$regCampo['nombre'].'->nombre;
          } 
';

							$relationTable = 'tabla_'.$relacion_tabla->nombre;
							$relationFieldId = $relacion_campo->nombre;
							$relationFieldText = 'nombre';

							if (trim($regCampo['relacion_condicion']) == '' and trim($regCampo['relacion_orden']) == '') {
								$crud_set_relation .= '
		$tabla_'.$relacion_tabla->nombre.' = $this->Model->registros("'.$relacion_tabla->nombre.'", "'.$relacion_campo->nombre.','.$relacion_nombre->nombre.' nombre", array(), "'.$relacion_nombre->nombre.'" );
		$this->parameters["datos"]["tabla_'.$relacion_tabla->nombre.'"] = $tabla_'.$relacion_tabla->nombre.';';
							} else {
								if (trim($regCampo['relacion_condicion']) != '' and trim($regCampo['relacion_orden']) == '') {
									if (substr_count(trim($regCampo['relacion_condicion']),'array') > 0) {
										$crud_set_relation .= '
		$tabla_'.$relacion_tabla->nombre.' = $this->Model->registros("'.$relacion_tabla->nombre.'", "'.$relacion_campo->nombre.','.$relacion_nombre->nombre.' nombre", '.trim($regCampo['relacion_condicion']).', "'.$relacion_nombre->nombre.'" );
		$this->parameters["datos"]["tabla_'.$relacion_tabla->nombre.'"] = $tabla_'.$relacion_tabla->nombre.';';
									} else {
										$crud_set_relation .= '
		$tabla_'.$relacion_tabla->nombre.' = $this->Model->registros("'.$relacion_tabla->nombre.'", "'.$relacion_campo->nombre.','.$relacion_nombre->nombre.' nombre", "'.trim($regCampo['relacion_condicion']).'", "'.$relacion_nombre->nombre.'" );
		$this->parameters["datos"]["tabla_'.$relacion_tabla->nombre.'"] = $tabla_'.$relacion_tabla->nombre.';';
									}
								} else {
									if (trim($regCampo['relacion_condicion']) == '' and trim($regCampo['relacion_orden']) != '') {
										$crud_set_relation .= '
		$tabla_'.$relacion_tabla->nombre.' = $this->Model->registros("'.$relacion_tabla->nombre.'", "'.$relacion_campo->nombre.','.$relacion_nombre->nombre.' nombre", array(), "'.trim($regCampo['relacion_orden']).'" );
		$this->parameters["datos"]["tabla_'.$relacion_tabla->nombre.'"] = $tabla_'.$relacion_tabla->nombre.';';
									} else {
										if (substr_count(trim($regCampo['relacion_condicion']),'array') > 0) {
											$crud_set_relation .= '
		$tabla_'.$relacion_tabla->nombre.' = $this->Model->registros("'.$relacion_tabla->nombre.'", "'.$relacion_campo->nombre.','.$relacion_nombre->nombre.' nombre", '.trim($regCampo['relacion_condicion']).', "'.trim($regCampo['relacion_orden']).'" );
		$this->parameters["datos"]["tabla_'.$relacion_tabla->nombre.'"] = $tabla_'.$relacion_tabla->nombre.';';
										} else {
											$crud_set_relation .= '
		$tabla_'.$relacion_tabla->nombre.' = $this->Model->registros("'.$relacion_tabla->nombre.'", "'.$relacion_campo->nombre.','.$relacion_nombre->nombre.' nombre", "'.trim($regCampo['relacion_condicion']).'", "'.trim($regCampo['relacion_orden']).'" );
		$this->parameters["datos"]["tabla_'.$relacion_tabla->nombre.'"] = $tabla_'.$relacion_tabla->nombre.';';
										}
									}
								}
							}
						}

						// - Campos formulario nuevo / editar ------------------------------
						if ($regCampo['nombre'] != 'id') {
							$crud_data_new .= '
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="' . $regCampo['nombre'] . '_i">' . $regCampo['etiqueta'] . ':</label>
                    	<div class="col-sm-10">';
                    		$crud_data_edit .= '
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="' . $regCampo['nombre'] . '_g">' . $regCampo['etiqueta'] . ':</label>
                    	<div class="col-sm-10">';
                    	}

						// - Carga de archivos ---------------------------------------------
						if ($regCampo['archivo'] == 4) {
							$crud_data_new .= '
	                    	<input type="file" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
	                    	$crud_data_edit .= '
	                    	<input type="file" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
	                    } elseif ($relationTable != '') {
	                    	$multiple = '';
	                    	if ($regCampo['tipo_entrada'] == 35) { // multiple
	                    		$multiple = 'multiple';
	                    	}
							$crud_data_new .= '
	                    	<select class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '" '.$multiple.'>
<?php foreach ($data["datos"]["'.$relationTable.'"] as $registro) { ?>
	                    		<option value="<?=$registro[\''.$relationFieldId.'\']?>"><?=$registro[\''.$relationFieldText.'\']?></option>
<?php } ?>
	                    	</select>';
							$crud_data_edit .= '
	                    	<select class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '" '.$multiple.'>
<?php foreach ($data["datos"]["'.$relationTable.'"] as $registro) { ?>
	                    		<option value="<?=$registro[\''.$relationFieldId.'\']?>"><?=$registro[\''.$relationFieldText.'\']?></option>
<?php } ?>
	                    	</select>';
						} else {

							switch ($regCampo['tipo_entrada']) {
								case 29: // hidden
									$crud_data_new .= '
	                    	<input type="hidden" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
									$crud_data_edit .= '
	                    	<input type="hidden" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
									break;
								case 30: // invisible
									$crud_data_new .= '
	                    	<input type="hidden" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
									$crud_data_edit .= '
	                    	<input type="hidden" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
									break;
								case 31: // password
									$crud_data_new .= '
	                    	<input type="password" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
									$crud_data_edit .= '
	                    	<input type="password" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
									break;
								case 32: // enum
									$crud_data_new .= '
	                    	<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
									$crud_data_edit .= '
	                    	<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
									break;
								case 33: // set
									$crud_data_new .= '
	                    	<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
									$crud_data_edit .= '
	                    	<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
									break;
								case 34: // dropdown
									$crud_data_new .= '
	                    	<select class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">
	                    	</select>';
									$crud_data_edit .= '
	                    	<select class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">
	                    	</select>';
									break;
								case 35: // multiselect
									$crud_data_new .= '
	                    	<select class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '" multiple>
	                    	</select>';
									$crud_data_edit .= '
	                    	<select class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '" multiple>
	                    	</select>';
								case 36: // numeric
									if ($regCampo['nombre'] != 'id') {
										$crud_data_new .= '
	                    	<input type="number" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
										$crud_data_edit .= '
	                    	<input type="number" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
	                    			}
									break;
								case 37: // active/inactive
									$crud_data_new .= '
	                    	<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
									$crud_data_edit .= '
	                    	<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
									break;
								case 38: // date
									$crud_data_new .= '
	                    	<input type="text" class="form-control datepicker" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
									$crud_data_edit .= '
	                    	<input type="text" class="form-control datepicker" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
									break;
								case 39: // datetime
									$crud_data_new .= '
	                    	<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
									$crud_data_edit .= '
	                    	<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
									break;
								case 40: // readonly
									$crud_data_new .= '
	                    	<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '" readonly="readonly">';
									$crud_data_edit .= '
	                    	<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '" readonly="readonly">';
									break;
								case 41: // text
									$crud_data_new .= '
	                    	<textarea class="form-control" rows="5" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '"></textarea>';
									$crud_data_edit .= '
	                    	<textarea class="form-control" rows="5" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '"></textarea>';
									break;
								case 42: // string
									$crud_data_new .= '
	                    	<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
									$crud_data_edit .= '
	                    	<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
									break;
								default:
									$crud_data_new .= '
	                    	<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
									$crud_data_edit .= '
	                    	<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
									break;
							}

						}

						if ($regCampo['nombre'] != 'id') {
							$crud_data_new .= '
                    	</div>
                    </div>';
							$crud_data_edit .= '
                    	</div>
                    </div>';
                		}


						// - Validaciones de los campos ---------------------------------------------
						$regCampoValidaciones = $this->Model->registros('campos_validaciones', '', 
						array('usuario'=>1, 
							'proyecto'=>$crud->proyecto, 
							'version'=>$crud->version,
							'tabla'=>$crud->tabla, 
							'campo'=> $regCampo['id'])); 
						if ( count($regCampoValidaciones) ) {
							$crud_js_rules .= '			' . $regCampo['nombre'] . ' {
';
							$crud_js_rules_params = '';
							foreach ($regCampoValidaciones as $regCampoValidacion) {
								if ($regCampoValidacion['validacion'] > 0) {
									$validacion = $this->Model->registro('datos_valores', $regCampoValidacion['validacion']);

									$parametro = '';

									$crud_js_rules_params_type = '';
									$crud_js_rules_params_value = '';
									if ($validacion->auxiliar_3 == 'true') {
										$crud_js_rules_params_value = 'true';
									}

									if ( trim($regCampoValidacion['parametro']) != '' ) {
										$parametro = '['.trim($regCampoValidacion['parametro']).']';

										if ($validacion->auxiliar_3 == '#') {
											$crud_js_rules_params_value = '"'.trim($regCampoValidacion['parametro']).'"';
										} else {
											$crud_js_rules_params_value = trim($regCampoValidacion['parametro']);
										}
									} 

									$crud_set_rules .= '			$crud->set_rules("'. $regCampo['nombre'] . '","' . $regCampo['etiqueta'] . '","' . $validacion->auxiliar_1 . $parametro . '");' . "\n";

									$crud_js_rules_params_type = '				' . $validacion->auxiliar_2;
									$crud_js_rules_params .= $crud_js_rules_params_type . ': ' . $crud_js_rules_params_value . ',
';

								}
							}
							$crud_js_rules .= $crud_js_rules_params . '			},
';
						}



						// - Carga de archivos ---------------------------------------------
						if ($regCampo['archivo'] == 4) {
							$crud_form_open = 'form_open_multipart';
							$crud_set_field_upload .= '
				$config["upload_path"] = "'. $regCampo['archivo_ruta'] .'";
				// $config["allowed_types"] = "gif|jpg|png|jpeg";
				$config["max_size"] = 2048;
				$this->load->library("upload", $config); 
				$this->upload->initialize($config);
				$post["'. $regCampo['nombre'] .'"] = "";
				if ($this->upload->do_upload("'. $regCampo['nombre'] .'")) {
					$data_'. $regCampo['nombre'] .' = array("upload_data" => $this->upload->data());
					$post["'. $regCampo['nombre'] .'"] = $data_'. $regCampo['nombre'] .'["upload_data"]["file_name"];
				}';
						}


						if ($regCampo['nombre'] != 'id') {
							// - Arreglo de datos para insertar ---------------------------------------------
							$crud_insert_data_post .= '
						"'. $regCampo['nombre'] .'" => $post["'. $regCampo['nombre'] .'"],';


							// - Lista de campos para el reporte ---------------------------------------------
							$crud_list .= '"\'.$registro["'. $regCampo['nombre'] .'"].\'",';


							// - Lista SSP de campos para el reporte -----------------------------------------
							$crud_list_ssp .= 'array( \'db\' => \''. $regCampo['nombre'] .'\', \'dt\' => '.$countRow.', \'field\' => \''. $regCampo['nombre'] .'\' ),';
							$countRow++;
						}

					} // fin -foreach
				} // fin - if
			} // fin - if
	        // --------------------------------------------------------------


			$code_controller = <<<'KIL'
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class ((clase)) extends MY_Controller {

	public $parameters;

	public function __construct() {
		parent::__construct();
		// $this->ctrSegAdmin();
	}

	public function index() {
		$this->parameters['plantilla'] = 'datatables';
		$this->parameters['vista'] = '((path))/((tabla))';
		$this->parameters['datos']['titulo'] = '((titulo))';
		$this->parameters['datos']['subtitulo'] = ''; 
((controlador_relaciones))
		$this->admin_design->layout('database', '((path))/((tabla))', $this->parameters, '((titulo))');
	}

	public function traerRegistro () {
		$post = $this->input->post(NULL, TRUE);
		$registro = $this->Model->registro('((tabla))', $post['id']);
		$datos = array('registro'=>$registro, 'tksec'=>$this->security->get_csrf_hash());
		echo json_encode($datos);      
	}

	public function ingresar () {
		$post = $this->input->post(NULL, TRUE);
		if (!empty($post)) {
			foreach ($post as $key => $value) {
				$post[$key] = $this->security->xss_clean($value);
			}
      
			$this->form_validation->set_rules('id', 'ID', 'xss_clean');
((php_reglas))
      
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.validation_errors().'<br><b>'.$this->lang->line('be_please_try_again').'</b>');
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
			} else {

				((controlador_subir))
        
				((controlador_datos))

				$id = $this->Model->insertar('((tabla))', $datos);
				if ($id > 0) {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El registro se ingresó exitosamente.'); 
					$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible ingresar el registro.<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				}     
			}
		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No se recibieron datos.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
		}
		redirect('/((path))/((tabla))');
	}

	public function guardar () {
		$post = $this->input->post(NULL, TRUE);
		if (!empty($post)) {
			foreach ($post as $key => $value) {
				$post[$key] = $this->security->xss_clean($value);
			}

			$this->form_validation->set_rules('id', 'ID', 'xss_clean');
((php_reglas))
      
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.validation_errors().'<br><b>'.$this->lang->line('be_please_try_again').'</b>');
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
			} else {

				((controlador_subir))
        
				((controlador_datos))

				if ($this->Model->actualizar('((tabla))', $datos, $post['id'])) {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El registro se guardo exitosamente.'); 
					$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible guardar el registro.<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				}     

			}
		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No se recibieron datos.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
		}
		redirect('/((path))/((tabla))');   
	}

	public function eliminar () {
		$post = $this->input->post(NULL, TRUE);
		if (!empty($post)) {
			foreach ($post as $key => $value) {
				$post[$key] = $this->security->xss_clean($value);
			}
			$this->form_validation->set_rules('id', 'ID', 'required|trim|xss_clean');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.validation_errors().'<br><b>'.$this->lang->line('be_please_try_again').'</b>');
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
			} else {

				$mat_id = explode(";", $post['id']); 
				$proceso = false;          
				foreach ($mat_id as $id) {
					$this->Model->eliminar('((tabla))', $id);
					$proceso = true;
				}

				if ($proceso) {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El(los) registro(s) se eliminó(aron) exitosamente.'); 
					$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible eliminar el(los) registro(s).<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				}     

			}
		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No se recibieron datos.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
		}
		redirect('/((path))/((tabla))');   
	}

	public function lista () {

		$registros = $this->Model->registros('((tabla))');
    
  	$datosJson = '
  		{	
  			"data":[';  
    $datosJsonReg = '';
    foreach ($registros as $key => $registro) {

((controlador_relaciones_lista))

          ((controlador_lista))

    }
    if ($datosJsonReg != '') {
          $datosJson .= substr($datosJsonReg, 0, -1);
    }
		
		$datosJson .= ']
		}';

		echo $datosJson;
    
	}
      
  
	public function lista_ssp () {
		$this->load->library('SSP');

		// DB table to use
		$table = '((tabla))';

		// Table's primary key
		$primaryKey = 'id';

		// Array of database columns
		((controlador_lista_ssp))

		$sql_details = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db'   => $this->db->database,
			'host' => $this->db->hostname
		);

		$joinQuery = "FROM ((tabla))";
		$extraWhere = ""; //"`u`.`valor` >= 90000";
		$groupBy = ""; //"`u`.`datos`";
		$having = ""; //"`u`.`valor` >= 140000";

		$_GET['tksec'] = $this->security->get_csrf_hash();  

		echo json_encode(
			SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
		);
	}

}
KIL;

			$code_controller = str_replace("((tabla))",$tableName,$code_controller);
			$code_controller = str_replace("((titulo))",$crudTitulo,$code_controller);
			$code_controller = str_replace("((clase))",$crudClass,$code_controller);
			$code_controller = str_replace("((plantilla))",'datatables',$code_controller);
			$code_controller = str_replace("((path))",$path,$code_controller);

			$code_controller = str_replace("((php_reglas))",$crud_set_rules,$code_controller);
			$code_controller = str_replace("((controlador_relaciones))",$crud_set_relation,$code_controller);

			$code_controller = str_replace("((controlador_relaciones_lista))",$crud_set_relation_list,$code_controller);

			$code_controller = str_replace("((controlador_subir))",$crud_set_field_upload,$code_controller);

			$crud_insert_data_post = '
				$datos = array(' . $crud_insert_data_post . ');';
			$code_controller = str_replace("((controlador_datos))",$crud_insert_data_post,$code_controller);

			$crud_list = substr($crud_list, 0, -1);
			$crud_list_btns = '"<input type=\"checkbox\" id=\"fila_\'.$registro["'.$tableId.'"].\'\" class=\"seleccion\" cod=\"\'.$registro["'.$tableId.'"].\'\">", "<button type=\"button\" class=\"btn btn-default btn-xs text-light-blue btnEditar\" cod=\"\'.$registro["'.$tableId.'"].\'\"><span class=\"glyphicon glyphicon-pencil\"></span></button>", "<button type=\"button\" class=\"btn btn-default btn-xs text-red btnEliminar\" cod=\"\'.$registro["'.$tableId.'"].\'\"><span class=\"glyphicon glyphicon-trash\"></span></button>"';
			$crud_list = '$datosJsonReg .= \'['.$crud_list_btns.', '.$crud_list.'],\';';
			$code_controller = str_replace("((controlador_lista))",$crud_list,$code_controller);


			$crud_list_ssp = $crud_list_ssp;
			$crud_list_ssp_btns = 'array( \'db\' => \''.$tableId.'\', \'dt\' => 0, \'field\' => \''.$tableId.'\', \'formatter\' => function($d, $row) {return \'<input type="checkbox" id="fila_\' . $d . \'" class="seleccion" cod="\' . $d . \'">\';}),array( \'db\' => \''.$tableId.'\', \'dt\' => 1, \'field\' => \''.$tableId.'\', \'formatter\' => function($d, $row) {return \'<button type="button" class="btn btn-default btn-xs text-light-blue btnEditar" cod="\' . $d . \'"><span class="glyphicon glyphicon-pencil"></span></button>\';}), array( \'db\' => \''.$tableId.'\', \'dt\' => 2, \'field\' => \''.$tableId.'\', \'formatter\' => function($d, $row) {return \'<button type="button" class="btn btn-default btn-xs text-red btnEliminar" cod="\' . $d . \'"><span class="glyphicon glyphicon-trash"></span></button>\';})';
			$crud_list_ssp = '$columns = array('.$crud_list_ssp_btns.', '.$crud_list_ssp.');';
			$code_controller = str_replace("((controlador_lista_ssp))",$crud_list_ssp,$code_controller);


// -------------------------------------------------------------------------------------
			$code_view = <<<'KIL'
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
// Bloque de codigo para presentar mensajes de alerta
if ( $this->session->flashdata('alertaMensaje') ) {
?>
<section class="content-header">
	<div class="alert alert-<?php echo $this->session->flashdata('alertaTipo'); ?> alert-dismissible">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	    <?php echo $this->session->flashdata('alertaMensaje'); ?>
	</div>
</section>
<?php
}
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $data['datos']['titulo']; ?>
    <small><?php echo $data['datos']['subtitulo']; ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Tables</a></li>
    <li class="active">Data tables</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Lista</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="btn-groupx" style="margin-bottom: 10px;">
                    <button type="button" class="btn btn-default text-green" id="btnNuevo"><span class="glyphicon glyphicon-plus"></span> Nuevo</button>
                    <button type="button" class="btn btn-default text-light-blue" id="btnEditar"><span class="glyphicon glyphicon-pencil"></span> Editar</button>
                    <button type="button" class="btn btn-default text-red" id="btnEliminar"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
                </div> 
                <div class="table-responsive">
                    <!-- dt-responsive -->
                    <table id="lista" class="table table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th class="tdSeleccion"><input type="checkbox" id="seleccionarTodos"></th>
                                <th class="tdBotones"></th>
                                <th class="tdBotones"></th>  
((vista_lista))
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<!-- Modal Nuevo - Inicio -->
<div class="modal fade" id="modalNuevo" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #008d4c !important;">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title" style="color:white;">Nuevo</h4>
            </div>
            <div class="modal-body">
                <?php echo ((form_open))('((path))/((tabla))/ingresar', array('id' => 'forma_i', 'class' => 'form-horizontal')); ?>  

                    <input type='hidden' id='id_i' name='id' value='0'>
                    ((vista_nuevo))

                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Ingresar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>  
<!-- Modal Nuevo - Fin -->

<!-- Modal Editar - Inicio -->
<div class="modal fade" id="modalEditar" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #357ca5 !important;">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title" style="color:white;">Editar</h4>
            </div>
            <div class="modal-body">

                <?php echo ((form_open))('((path))/((tabla))/guardar', array('id' => 'forma_g', 'class' => 'form-horizontal')); ?>              

                    <input type='hidden' id='id_g' name='id'>
                    ((vista_editar))

                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>  
<!-- Modal Editar - Fin -->

<!-- Modal Eliminar - Inicio -->
<div class="modal fade" id="modalEliminar" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #d33724 !important;">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title" style="color:white">Confirmación de Eliminación</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('((path))/((tabla))/eliminar', array('id' => 'forma_e', 'class' => 'form-horizontal')); ?> 
                    <input type='hidden' id='id_e' name='id'>          
                    <p class="lead text-danger text-center">Esta seguro de eliminar el(los) registro(s)?<br><br><button type="button" class="btn btn-lg btn-danger">Si, eliminar el(los) registro(s)</button></p>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>  
<!-- Modal Eliminar - Fin -->

</section>
<!-- /.content -->

KIL;

			$code_view = str_replace("((tabla))",$tableName,$code_view);
			$code_view = str_replace("((path))",$path,$code_view);
			$code_view = str_replace("((form_open))",$crud_form_open,$code_view);
			$code_view = str_replace("((vista_lista))",$crud_labels_list,$code_view);
			$code_view = str_replace("((vista_nuevo))",$crud_data_new,$code_view);
			$code_view = str_replace("((vista_editar))",$crud_data_edit,$code_view);

// -------------------------------------------------------------------------------------
			$code_js = <<<'KIL'
$(document).ready(function() {
	jQuery.extend(jQuery.validator.messages, {
		required: "Este campo es obligatorio.",
		remote: "Por favor, rellena este campo.",
		email: "Por favor, escribe una dirección de correo válida",
		url: "Por favor, escribe una URL válida.",
		date: "Por favor, escribe una fecha válida.",
		dateISO: "Por favor, escribe una fecha (ISO) válida.",
		number: "Por favor, escribe un número entero válido.",
		digits: "Por favor, escribe sólo dígitos.",
		creditcard: "Por favor, escribe un número de tarjeta válido.",
		equalTo: "Por favor, escribe el mismo valor de nuevo.",
		accept: "Por favor, escribe un valor con una extensión aceptada.",
		maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
		minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
		rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
		range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
		max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
		min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
	});
});

$(function () {
	var tksec = proyVarS.sgch;

	//Date picker
	$('.datepicker').datepicker({
		format: 'yyyy-mm-dd',
		todayBtn: "linked",
		language: "es",
		todayHighlight: true,
		autoclose: true
	});  

  
	$('#lista').DataTable({
		"ajax":proyVar.base_url + "((path))/((tabla))/lista",
		'deferRender': true,
		'retrieve': true,
		'processing': true,   
		"language": {
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
		},
		'order': [[ 3, 'asc' ]],
		'columnDefs': [ {'targets': 0,'orderable': false}, {'targets': 1,'orderable': false}, {'targets': 2,'orderable': false} ]  
	});

	$("#seleccionarTodos").click(function () {
		var checkedCtr = $(this).prop("checked");
		$(".seleccion").each(function () {
			$(this).prop("checked", checkedCtr);
		});
	});

	$("#btnNuevo").click(function(){
		$("#modalNuevo").modal({backdrop: "static"});
	});

	$("#btnEditar").click(function(){
		var id ="";
		$(".seleccion").each(function () {
			if ($(this).prop("checked")) {
				id = $(this).attr("cod");
				return false;
			}
		});
		if (id !== "") {
			$("#id_g").val(id);
			traerRegistro(id);
		} else {
			swal({
				type: 'error',
				title: 'Ups...',
				text: 'Debes seleccionar un registro'
			});
		}
	});

	$(document).on("click", ".btnEditar", function(){
		var id ="";
		id = $(this).attr("cod");
		$("#id_g").val(id);
		traerRegistro(id);
	});

	function traerRegistro(id) {
		$.ajax({
			url: proyVar.base_url + "((path))/((tabla))/traerRegistro",
			cache: false,
			dataType: "json",
			type: "post",
			data: {"id":id, slcnts:tksec},
			success:function(datos) {
				tksec = datos.tksec;
				if (datos.registro != null) {
					for (var campoId in datos.registro) {
						if ( $("#"+campoId+"_g") ) {
							var tipo = $("#"+campoId+"_i").attr("type");
							if (tipo != "file") {
								$("#"+campoId+"_g").val(datos.registro[campoId]);
							} 
						}
					}
					$("#modalEditar").modal({backdrop: "static"});
				} else {
					swal({
						type: 'error',
						title: 'Ups...',
						text: 'No fue posible cargar el registro'
					});  
				}
			},
			error: function (request, status, error) {
				swal({
					type: 'error',
					title: 'Ups...',
					text: request.responseText
				});                    
			}
		});
	}

	$("#btnEliminar").click(function(){
		var id ="";
		$(".seleccion").each(function () {
			if ($(this).prop("checked")) {
				id += $(this).attr("cod") + ";";
			}
		});
		if (id !== "") {
			id += "0";
			$("#id_e").val(id);
			swal({
				title: 'Seguro que deseas eliminar?',
				text: "No podras revertir esta operación!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Si, eliminar!'
			}).then((result) => {
				if (result.value) {
					if (result.value) {
						$("#forma_e").submit();
					}
				}
			});
		} else {
			swal({
				type: 'error',
				title: 'Ups...',
				text: 'Debes seleccionar al menos un registro'
			});              
		}
	});

	$(document).on("click", ".btnEliminar", function(){
		var id ="";
		id = $(this).attr("cod");
		$("#id_e").val(id);
		swal({
			title: 'Seguro que deseas eliminar?',
			text: "No podras revertir esta operación!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, eliminar!'
		}).then((result) => {
			if (result.value) {
				$("#forma_e").submit();
			}
		});
	});      

	$( "#forma_i" ).validate( {
		rules: {
((js_reglas))
		},
		errorElement: "em",
		errorPlacement: function ( error, element ) {
			error.addClass( "help-block" );
			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.parent( "label" ) );
			} else {
				error.insertAfter( element );
			}
		},
		highlight: function ( element, errorClass, validClass ) {
			$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
		},
		unhighlight: function (element, errorClass, validClass) {
			$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
		}
	} );    

	$( "#forma_g" ).validate( {
		rules: {
((js_reglas))
		},
		errorElement: "em",
		errorPlacement: function ( error, element ) {
			error.addClass( "help-block" );
			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.parent( "label" ) );
			} else {
				error.insertAfter( element );
			}
		},
		highlight: function ( element, errorClass, validClass ) {
			$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
		},
		unhighlight: function (element, errorClass, validClass) {
			$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
		}
	} ); 

});
KIL;


			$code_js = str_replace("((tabla))",$tableName,$code_js);
			$code_js = str_replace("((path))",$path,$code_js);
			$code_js = str_replace("((js_reglas))",$crud_js_rules,$code_js);

/*
$línea = str_replace("((js_reglas))",$combinar[$indice]['js_reglas'],$línea);
*/

// -------------------------------------------------------------------------------------
			$code_css = <<<'KIL'
tbody tr td {
	white-space: nowrap;
}
.tdSeleccion {
	width:35px !important;
}
.tdBotones {
	width:35px !important;
}
.campoEditar:hover {
	color:blue;cursor: pointer;
}
.campoTexto {
	width: 200px !important;
}
.campoNumero {
	width: 70px !important;
}
.campoArea {
	width: 300px !important;
}
.campoLista {
	width: 160px !important;
}
.campoFechaLarga {
	width: 160px !important;
}
.glyphicon.normal-right-spinner {
	-webkit-animation: glyphicon-spin-r 2s infinite linear;
	animation: glyphicon-spin-r 2s infinite linear;
}      
@-webkit-keyframes glyphicon-spin-r {
	0% {
		-webkit-transform: rotate(0deg);
		transform: rotate(0deg);
	}

	100% {
		-webkit-transform: rotate(359deg);
		transform: rotate(359deg);
	}
}
@keyframes glyphicon-spin-r {
	0% {
		-webkit-transform: rotate(0deg);
		transform: rotate(0deg);
	}

	100% {
		-webkit-transform: rotate(359deg);
		transform: rotate(359deg);
	}
} 
KIL;
// -------------------------------------------------------------------------------------

		}



		return array(
			'folder' => $path,
			'folder_1' => $carpeta_1,
			'folder_2' => $carpeta_2,
			'file' => strtolower($script),
			'code_controller' => $code_controller,
			'code_view' => $code_view,
			'code_js' => $code_js,
			'code_css' => $code_css,
			'projectName' => $projectName,
			'versionName' => $versionName,
			'tableName' => $tableName,
		);

	}

}