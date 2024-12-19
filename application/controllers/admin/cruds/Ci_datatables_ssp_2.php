<?php
defined("BASEPATH") OR exit("Direct access to this script is not allowed.");
/**
 * @author: Solucionaticos.com
 * @name: Projects
 * @version: 1.0
 * @date: 2019-08-28 21:10:27 
 * */

class Ci_datatables_ssp_2 extends MY_Controller {

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

//         $projectVersionTitle = $this->admin_design->_projectVersionTitle();

//         if ($this->session->has_userdata('project')) {
//             $project = $this->session->userdata('project');
//         }
//         if ($this->session->has_userdata('version')) {
//             $version = $this->session->userdata('version');
//         }

// 		$cruds = $this->Model->getRowsJoin(
// 			'cruds c', 
// 			'c.id, c.script, c.carpeta_1, c.carpeta_2, GROUP_CONCAT(cp.nombre) fields, c.path, c.fecha_generacion, c.tabla, t.nombre tabla_nombre',  
// 			array(
// 				'cruds_detalles cd' => array('cd.crud = c.id',''),
// 				'campos cp' => array('cd.campo = cp.id',''),
// 				'tablas t' => array('cd.tabla = t.id',''),
// 			), 
// 			array('c.proyecto' => $project, 'c.version' => $version), 'c.id ASC', 'c.id');


//         $css = '';
//         $js = '';
//         if ($projectVersionTitle != 'None') {
//             $css = '
// <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
// <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">';

// 	        $proyVar = '<script>var proyVar ={"base_url":"http:\/\/localhost:8888\/'.$this->config->item('projectPath').'\/","language":"spanish","lang":"es"};var proyVarS ={"sgctn":"ci_csrf_token","sgch":""};</script>';

//             $js = '
// <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
// <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
// <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
// <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
// <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
// <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
// <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>';

//             $js .= "
// <script type='text/javascript'>
// $(document).ready(function() {
//     $('#lista').DataTable({
// 'paging': false,
// 		'order': [[ 3, 'asc' ]],
// 		'columnDefs': [ {'targets': 0,'orderable': false}, {'targets': 1,'orderable': false}, {'targets': 4,'orderable': false} ],
//         dom: 'Bfrtip',
//         buttons: [
//         { extend: 'copyHtml5', footer: true },
//         { extend: 'excelHtml5', footer: true },
//         { extend: 'csvHtml5', footer: true },
//         { extend: 'pdfHtml5', footer: true }
//         ]
//     });

// 	$('#selectAll').change(function () {
// 		if ( $('#selectAll').prop('checked') ) {
// 			$('.selectRow').each(function() {
// 				$(this).prop('checked', true);
// 			});
// 		} else {
// 			$('.selectRow').each(function() {
// 				$(this).prop('checked', false);
// 			});
// 		}
// 	});

// 	$('#generateSelectRows').click(function () {
// 		var ids = '';
// 		$('.selectRow').each(function() {
// 		    if ( $(this).prop('checked') ) {
// 		    	ids += $(this).val() + ',';
// 		    }
// 		});
// 		ids += '0';
// 		$.ajax({
// 			url: proyVar.base_url + proyVar.admin_path + '/cruds/ci_datatables_ssp_2/generate_list_ids',	
// 			cache: false,
// 			type: 'post',
// 			data: {'ids':ids},
// 			success:function(data) {
// 				//tksec = data.tksec;
// 				location.href = proyVar.base_url +  + '/cruds/ci_datatables_ssp_2';
// 			}
// 		});

// 	});

// } );    
// </script>
// ";
//         }

// 		$data = array(
// 			'css' => $css, 
//             'proyVar' => $proyVar,
// 			'js' => $js, 
// 			'class_header' => 'nav_header_home',
// 			'value_header' => 'nav-link-active',
// 			'class_footer' => 'nav_footer_home',
// 			'value_footer' => 'active',
//             'projectVersionTitle' => $projectVersionTitle,
//             'cruds' => $cruds 
// 		);

// 		// Views
// 		$this->admin_design->_load_layout($this->config->item('adminPath') . '/cruds/ci_datatables_ssp_2/cruds', $data);

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
		id: "vista_list"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "php"	
	}); 

	editAreaLoader.init({
		id: "vista_new"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "php"	
	}); 

	editAreaLoader.init({
		id: "vista_edit"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "php"	
	}); 	

	editAreaLoader.init({
		id: "js_list"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "js"	
	}); 

	editAreaLoader.init({
		id: "js_new"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "js"	
	}); 

	editAreaLoader.init({
		id: "js_edit"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "js"	
	}); 

	setTimeout(function(){ $("#logoAdmin").focus(); }, 3000);
});
</script>';

        $CIDatatables = $this->_codeCIDatatables($id);

		$code_controller = $CIDatatables['code_controller'];
		$code_view_list = $CIDatatables['code_view_list'];
		$code_view_new = $CIDatatables['code_view_new'];
		$code_view_edit = $CIDatatables['code_view_edit'];
		$code_js_list = $CIDatatables['code_js_list'];
		$code_js_new = $CIDatatables['code_js_new'];
		$code_js_edit = $CIDatatables['code_js_edit'];

		$folder = $CIDatatables['folder'];
		$file = $CIDatatables['file'];

// -------------------------------------------------------------------------------------

		$code_view_list = str_replace("textarea","areatext",$code_view_list);
		$code_view_new = str_replace("textarea","areatext",$code_view_new);
		$code_view_edit = str_replace("textarea","areatext",$code_view_edit);

        $data = array(
        	'css' => $css, 
            'js' => $js, 
            'projectVersionTitle' => $projectVersionTitle, 
			'code_controller' => $code_controller, 
			'code_view_list' => $code_view_list, 
			'code_view_new' => $code_view_new, 
			'code_view_edit' => $code_view_edit, 
			'code_js_list' => $code_js_list, 
			'code_js_new' => $code_js_new, 
			'code_js_edit' => $code_js_edit, 
            'id' => $id,
            'folder' => $folder, 
            'file' => $file, 

        );

        $this->admin_design->_load_layout($this->config->item('adminPath') . '/cruds/ci_datatables_ssp_2/crud', $data);

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
		id: "vista_list"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "php"	
	}); 

	editAreaLoader.init({
		id: "vista_new"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "php"	
	}); 

	editAreaLoader.init({
		id: "vista_edit"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "php"	
	}); 	

	editAreaLoader.init({
		id: "js_list"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "js"	
	}); 

	editAreaLoader.init({
		id: "js_new"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "js"	
	}); 

	editAreaLoader.init({
		id: "js_edit"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "js"	
	}); 


	setTimeout(function(){ $("#logoAdmin").focus(); }, 3000);
});
</script>';

        $CIDatatables = $this->_codeCIDatatables($id);

		$code_controller = $CIDatatables['code_controller'];
		$code_view_list = $CIDatatables['code_view_list'];
		$code_view_new = $CIDatatables['code_view_new'];
		$code_view_edit = $CIDatatables['code_view_edit'];
		$code_js_list = $CIDatatables['code_js_list'];
		$code_js_new = $CIDatatables['code_js_new'];
		$code_js_edit = $CIDatatables['code_js_edit'];

		$folder = $CIDatatables['folder'];
		$file = $CIDatatables['file'];

// -------------------------------------------------------------------------------------

		$code_view_list = str_replace("textarea","areatext",$code_view_list);
		$code_view_new = str_replace("textarea","areatext",$code_view_new);
		$code_view_edit = str_replace("textarea","areatext",$code_view_edit);

        $data = array(
        	'css' => $css, 
            'js' => $js, 
            'projectVersionTitle' => $projectVersionTitle, 
			'code_controller' => $code_controller, 
			'code_view_list' => $code_view_list, 
			'code_view_new' => $code_view_new, 
			'code_view_edit' => $code_view_edit, 
			'code_js_list' => $code_js_list, 
			'code_js_new' => $code_js_new, 
			'code_js_edit' => $code_js_edit, 
            'id' => $id,
            'folder' => $folder, 
            'file' => $file, 

        );

        $this->admin_design->_load_layout($this->config->item('adminPath') . '/cruds/ci_datatables_ssp_2/crud_cruds', $data);

    }

    public function generate($id) {

		$this->_generateCode($id);
		redirect($this->config->item('adminPath') . '/cruds/ci_datatables_ssp_2/crud/' . $id);

    }

    public function generate_cruds($id) {

		$this->_generateCode($id);
		redirect($this->config->item('adminPath') . '/cruds/ci_datatables_ssp_2/crud_cruds/' . $id);

    }

	public function generate_list($id) {

		$this->_generateCode($id);
		redirect($this->config->item('adminPath') . '/cruds/ci_datatables_ssp_2');

    }

	public function generate_list_ids() {
	    $post = $this->input->post();

	    $ids = $post['ids'];
	    $listIds = explode(',', $ids);
	    foreach ($listIds as $id) {
	    	if ($id != '0') $this->_generateCode($id);
	    }
		redirect($this->config->item('adminPath') . '/cruds/ci_datatables_ssp_2');
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

		$code_view_list = $CIDatatables['code_view_list'];
		$code_view_new = $CIDatatables['code_view_new'];
		$code_view_edit = $CIDatatables['code_view_edit'];

		$code_js_list = $CIDatatables['code_js_list'];
		$code_js_new = $CIDatatables['code_js_new'];
		$code_js_edit = $CIDatatables['code_js_edit'];

		$project_name = (trim($CIDatatables['projectName']));
		$version_name = (trim($CIDatatables['versionName']));
		$tableName = (trim($CIDatatables['tableName']));


		$path = 'assets/cruds/ci_datatables_ssp_2/' . $project_name;
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
		$path = 'assets/cruds/ci_datatables_ssp_2/' . $project_name . '/' . $version_name . '/application';

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

		$path .= '/' . $tableName;
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}
		
		$pathFile = './' . $path . '/' . 'list.php';
		if ( !write_file($pathFile, $code_view_list)) {
			echo 'Unable to write the file: ' . $pathFile;
			die();
		}
		$pathFile = './' . $path . '/' . 'new.php';
		if ( !write_file($pathFile, $code_view_new)) {
			echo 'Unable to write the file: ' . $pathFile;
			die();
		}
		$pathFile = './' . $path . '/' . 'edit.php';
		if ( !write_file($pathFile, $code_view_edit)) {
			echo 'Unable to write the file: ' . $pathFile;
			die();
		}

		// ---------------------------------------------------------------------------------------------------------		
		// $code_js
		// ---------------------------------------------------------------------------------------------------------		
		$path = 'assets/cruds/ci_datatables_ssp_2/' . $project_name . '/' . $version_name;

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

		$pathFile = './' . $path . '/' . 'list.js';
		if ( !write_file($pathFile, $code_js_list)) {
			echo 'Unable to write the file: ' . $pathFile;
			die();
		}
		$pathFile = './' . $path . '/' . 'new.js';
		if ( !write_file($pathFile, $code_js_new)) {
			echo 'Unable to write the file: ' . $pathFile;
			die();
		}
		$pathFile = './' . $path . '/' . 'edit.js';
		if ( !write_file($pathFile, $code_js_edit)) {
			echo 'Unable to write the file: ' . $pathFile;
			die();
		}


		// ---------------------------------------------------------------------------------------------------------		
		// Update CRUDS
		// ---------------------------------------------------------------------------------------------------------		

		// $path = 'assets/cruds/' . $project_name . '/' . $version_name;

		// $data = array(
		// 	'path' => $path,
		// 	'code_controller_ci_datatable' => $code_controller,
		// 	'fecha_generacion' => date('Y-m-d H:i:s'),
		// 	'script' => ucfirst($file),
		// );
		// $this->Model->update('cruds', $data, $id);

    }

    function _codeCIDatatables($id) {

        $crud = $this->Model->getRow('tablas', $id);

        if ( $crud ) {

	        // --------------------------------------------------------------
	        $tableRow = $this->Model->getRow('tablas', $crud->id);
	        $tableName = $tableRow->nombre;
	        $crudClass = ucfirst($tableName);

			$script = ucwords($tableName) . '.php';
            $tabla = $crud->id;

			$ambiente = $this->config->item('adminPath') . '/';
			if (8 == 9) {
				$ambiente = 'front/';
			}
		
$carpeta_1 = 'backend'; //$crud->carpeta_1;
// $carpeta_1 = 'client'; //$crud->carpeta_1;
// $carpeta_1 = 'employee'; //$crud->carpeta_1;
$menu_main = 'backend';


			$carpeta_2 = ''; //$crud->carpeta_2;
			$path = trim($carpeta_1);
			if (trim($carpeta_2) != '') $path .= '/' . $carpeta_2;

			$crudTitulo = $crud->etiqueta;
			// $crudTitulo = ucwords(str_replace("_", " ", $crudTitulo));

			// $crudNuevo = $crud->nuevo;
			// $crudEditar = $crud->editar;
			// $crudVer = $crud->ver;
			// $crudBorrar = $crud->borrar;
			// $crudExportar = $crud->exportar;
			// $crudImprimir = $crud->imprimir;

	        // --------------------------------------------------------------
			$projectRow = $this->Model->getRow('proyectos', $crud->proyecto);
			$versionRow = $this->Model->getRow('versiones', $crud->version);
			$projectName = $projectRow->nombre;
			$versionName = $versionRow->nombre;

			$tableId = 'id';
			$countRow = 3;

			$crud_form_open_nuevo = 'form_open';
			$crud_form_open_editar = 'form_open';

			$crud_set_relation_nuevo = '';
			$crud_set_relation_editar = '';
			$crud_set_relation_list = '';

$crud_set_rules_nuevo = '';
$crud_set_field_upload_nuevo = '';
$crud_insert_data_post_nuevo = '';
$crud_js_rules_nuevo = '';

$crud_set_rules_editar = '';
$crud_set_field_upload_editar = '';
$crud_insert_data_post_editar = '';
$crud_js_rules_editar = '';

			$crud_list = '';

			


			$mat_lista_1 = array();
			$mat_lista_2 = array();
			$mat_nuevo = array();
			$mat_editar = array();


$mat_labels_list = array();
$mat_labels_new = array();
$mat_labels_edit = array();

	        // --------------------------------------------------------------
			if ($crud->proyecto > 0 and $crud->version > 0 and $crud->id > 0) {


// cruds_detalles

				// $regCampos = $this->Model->registros('campos', '', 
				// array('usuario'=>1, 
				// 	'proyecto'=>$crud->proyecto, 
				// 	'version'=>$crud->version, 
				// 	'tabla'=>$crud->tabla), 
				// 	'orden ASC');
// ---------------------------------------------------------------------------------------------------
				// $regCampos = $this->Model->getRowsJoin(
				// 	'cruds_detalles cd', 
				// 	'cd.lista, cd.nuevo, cd.editar, cd.ver, cd.exportar, cd.imprimir, c.*',  
				// 	array(
				// 		'campos c' => array('cd.campo = c.id','')
				// 	), 
				// 	array('cd.crud' => $id), 'c.orden ASC');

				$regCampos = $this->Model->getRowsJoin('campos c', 'c.*', array(), array('c.tabla' => $id), 'c.orden ASC');

// select cd.lista, cd.nuevo, cd.editar, cd.ver, cd.exportar, cd.imprimir, c.* 
// from cruds_detalles cd 
// inner join campos c on cd.campo = c.id
// where cd.crud = 749
// order by c.orden;

// ---------------------------------------------------------------------------------------------------


				if ( count($regCampos) ) {
					foreach ($regCampos as $regCampo) {

						$crud_list_ssp_1 = '';
						$crud_list_ssp_2 = '';
$crud_labels_list = '';
$crud_data_new = '';
$crud_data_edit = '';
						$relationTable = '';
						$relationFieldId = '';
						$relationFieldText = '';
						$crud_list_ssp_formatter = '';

if ($regCampo['lista'] == 4) {
						if ($regCampo['nombre'] != 'id') {
							$crud_labels_list = '                                    <th>' . $regCampo['etiqueta_lista'] . '</th>
';
							$mat_labels_list[$regCampo['orden_lista']] = $crud_labels_list;
						}
}

						// - Nombre del campo que es la llave primaria ------------------------------
						if ($regCampo['llave_primaria'] == 4) {
							$tableId = $regCampo['nombre'];
						}

						$relacion_tabla = $this->Model->registro('tablas', $regCampo['relacion_tabla']);
						$relacion_campo = $this->Model->registro('campos', $regCampo['relacion_campo']);
						$relacion_nombre = $this->Model->registro('campos', $regCampo['relacion_nombre']);

						// - Relaciones 1-N de los campos ---------------------------------------------
						if ($regCampo['relacion_datos'] > 0) {
							$relacion_codigo = $this->Model->registro('datos', $regCampo['relacion_datos']);

if ($regCampo['nuevo'] == 4) {
							$crud_set_relation_nuevo .= '
		$table_datos_valores_'.$relacion_codigo->codigo.' = $this->Model->getRowsJoin("datos_valores", "id, nombre", array(), array("dato"=>'.$regCampo['relacion_datos'].'), "nombre ASC" );
		$this->parameters["data"]["table_datos_valores_'.$relacion_codigo->codigo.'"] = $table_datos_valores_'.$relacion_codigo->codigo.';';
}
if ($regCampo['editar'] == 4) {
							$crud_set_relation_editar .= '
		$table_datos_valores_'.$relacion_codigo->codigo.' = $this->Model->getRowsJoin("datos_valores", "id, nombre", array(), array("dato"=>'.$regCampo['relacion_datos'].'), "nombre ASC" );
		$this->parameters["data"]["table_datos_valores_'.$relacion_codigo->codigo.'"] = $table_datos_valores_'.$relacion_codigo->codigo.';';
}

// 							$crud_set_relation_list .= '
//           $'.$regCampo['nombre'].' = $this->Model->getRow("datos_valores", $row["'.$regCampo['nombre'].'"]);
//           if ($'.$regCampo['nombre'].') {
//              $row["'.$regCampo['nombre'].'"] = $'.$regCampo['nombre'].'->nombre;
//           } 
// ';

if ($regCampo['lista'] == 4) {
							$crud_list_ssp_formatter = ',
				"formatter" => function($d, $row) {
									$'.$regCampo['nombre'].'_name = "";
									$'.$regCampo['nombre'].'_data = $this->Model->getRow("datos_valores", $d);
									if ($'.$regCampo['nombre'].'_data) {
										$'.$regCampo['nombre'].'_name = $'.$regCampo['nombre'].'_data->nombre;
									} 
									return $'.$regCampo['nombre'].'_name;
								}
							';
}

							$relationTable = 'table_datos_valores_'.$relacion_codigo->codigo;
							$relationFieldId = 'id';
							$relationFieldText = 'nombre';

						} elseif ($regCampo['relacion_tabla'] > 0 and $regCampo['relacion_campo'] > 0 and $regCampo['relacion_nombre'] > 0) {

							// $relacion_tabla = $this->Model->registro('tablas', $regCampo['relacion_tabla']);
							// $relacion_campo = $this->Model->registro('campos', $regCampo['relacion_campo']);
							// $relacion_nombre = $this->Model->registro('campos', $regCampo['relacion_nombre']);

// 							$crud_set_relation_list .= '
//           $'.$regCampo['nombre'].' = $this->Model->getRow("'.$relacion_tabla->nombre.'", $row["'.$regCampo['nombre'].'"]);
//           if ($'.$regCampo['nombre'].') {
//              $row["'.$regCampo['nombre'].'"] = $'.$regCampo['nombre'].'->'.$relacion_nombre->nombre.';
//           } 
// ';

							$relationTable = 'table_'.$relacion_tabla->nombre;
							$relationFieldId = $relacion_campo->nombre;
							$relationFieldText = 'nombre';

if ($regCampo['lista'] == 4) {
							$crud_list_ssp_formatter = ',
				"formatter" => function($d, $row) {
									$'.$regCampo['nombre'].'_name = "";
									$'.$regCampo['nombre'].'_data = $this->Model->getRow("'.$relacion_tabla->nombre.'", $d);
									if ($'.$regCampo['nombre'].'_data) {
										$'.$regCampo['nombre'].'_name = $'.$regCampo['nombre'].'_data->'.$relacion_nombre->nombre.';
									} 
									return $'.$regCampo['nombre'].'_name;
								}
							';
}

if ($regCampo['nuevo'] == 4) {
							if (trim($regCampo['relacion_condicion']) == '' and trim($regCampo['relacion_orden']) == '') {
								$crud_set_relation_nuevo .= '
		$table_'.$relacion_tabla->nombre.' = $this->Model->getRowsJoin("'.$relacion_tabla->nombre.'", "'.$relacion_campo->nombre.','.$relacion_nombre->nombre.' nombre", array(), array(), "'.$relacion_nombre->nombre.'" );
		$this->parameters["data"]["table_'.$relacion_tabla->nombre.'"] = $table_'.$relacion_tabla->nombre.';';
							} else {
								if (trim($regCampo['relacion_condicion']) != '' and trim($regCampo['relacion_orden']) == '') {
									if (substr_count(trim($regCampo['relacion_condicion']),'array') > 0) {
										$crud_set_relation_nuevo .= '
		$table_'.$relacion_tabla->nombre.' = $this->Model->getRowsJoin("'.$relacion_tabla->nombre.'", "'.$relacion_campo->nombre.','.$relacion_nombre->nombre.' nombre", array(), '.trim($regCampo['relacion_condicion']).', "'.$relacion_nombre->nombre.'" );
		$this->parameters["data"]["table_'.$relacion_tabla->nombre.'"] = $table_'.$relacion_tabla->nombre.';';
									} else {
										$crud_set_relation_nuevo .= '
		$table_'.$relacion_tabla->nombre.' = $this->Model->getRowsJoin("'.$relacion_tabla->nombre.'", "'.$relacion_campo->nombre.','.$relacion_nombre->nombre.' nombre", array(), "'.trim($regCampo['relacion_condicion']).'", "'.$relacion_nombre->nombre.'" );
		$this->parameters["data"]["table_'.$relacion_tabla->nombre.'"] = $table_'.$relacion_tabla->nombre.';';
									}
								} else {
									if (trim($regCampo['relacion_condicion']) == '' and trim($regCampo['relacion_orden']) != '') {
										$crud_set_relation_nuevo .= '
		$table_'.$relacion_tabla->nombre.' = $this->Model->getRowsJoin("'.$relacion_tabla->nombre.'", "'.$relacion_campo->nombre.','.$relacion_nombre->nombre.' nombre", array(), array(), "'.trim($regCampo['relacion_orden']).'" );
		$this->parameters["data"]["table_'.$relacion_tabla->nombre.'"] = $table_'.$relacion_tabla->nombre.';';
									} else {
										if (substr_count(trim($regCampo['relacion_condicion']),'array') > 0) {
											$crud_set_relation_nuevo .= '
		$table_'.$relacion_tabla->nombre.' = $this->Model->getRowsJoin("'.$relacion_tabla->nombre.'", "'.$relacion_campo->nombre.','.$relacion_nombre->nombre.' nombre", array(), '.trim($regCampo['relacion_condicion']).', "'.trim($regCampo['relacion_orden']).'" );
		$this->parameters["data"]["table_'.$relacion_tabla->nombre.'"] = $table_'.$relacion_tabla->nombre.';';
										} else {
											$crud_set_relation_nuevo .= '
		$table_'.$relacion_tabla->nombre.' = $this->Model->getRowsJoin("'.$relacion_tabla->nombre.'", "'.$relacion_campo->nombre.','.$relacion_nombre->nombre.' nombre", array(), "'.trim($regCampo['relacion_condicion']).'", "'.trim($regCampo['relacion_orden']).'" );
		$this->parameters["data"]["table_'.$relacion_tabla->nombre.'"] = $table_'.$relacion_tabla->nombre.';';
										}
									}
								}
							}
}

if ($regCampo['editar'] == 4) {
							if (trim($regCampo['relacion_condicion']) == '' and trim($regCampo['relacion_orden']) == '') {
								$crud_set_relation_editar .= '
		$table_'.$relacion_tabla->nombre.' = $this->Model->getRowsJoin("'.$relacion_tabla->nombre.'", "'.$relacion_campo->nombre.','.$relacion_nombre->nombre.' nombre", array(), array(), "'.$relacion_nombre->nombre.'" );
		$this->parameters["data"]["table_'.$relacion_tabla->nombre.'"] = $table_'.$relacion_tabla->nombre.';';
							} else {
								if (trim($regCampo['relacion_condicion']) != '' and trim($regCampo['relacion_orden']) == '') {
									if (substr_count(trim($regCampo['relacion_condicion']),'array') > 0) {
										$crud_set_relation_editar .= '
		$table_'.$relacion_tabla->nombre.' = $this->Model->getRowsJoin("'.$relacion_tabla->nombre.'", "'.$relacion_campo->nombre.','.$relacion_nombre->nombre.' nombre", array(), '.trim($regCampo['relacion_condicion']).', "'.$relacion_nombre->nombre.'" );
		$this->parameters["data"]["table_'.$relacion_tabla->nombre.'"] = $table_'.$relacion_tabla->nombre.';';
									} else {
										$crud_set_relation_editar .= '
		$table_'.$relacion_tabla->nombre.' = $this->Model->getRowsJoin("'.$relacion_tabla->nombre.'", "'.$relacion_campo->nombre.','.$relacion_nombre->nombre.' nombre", array(), "'.trim($regCampo['relacion_condicion']).'", "'.$relacion_nombre->nombre.'" );
		$this->parameters["data"]["table_'.$relacion_tabla->nombre.'"] = $table_'.$relacion_tabla->nombre.';';
									}
								} else {
									if (trim($regCampo['relacion_condicion']) == '' and trim($regCampo['relacion_orden']) != '') {
										$crud_set_relation_editar .= '
		$table_'.$relacion_tabla->nombre.' = $this->Model->getRowsJoin("'.$relacion_tabla->nombre.'", "'.$relacion_campo->nombre.','.$relacion_nombre->nombre.' nombre", array(), array(), "'.trim($regCampo['relacion_orden']).'" );
		$this->parameters["data"]["table_'.$relacion_tabla->nombre.'"] = $table_'.$relacion_tabla->nombre.';';
									} else {
										if (substr_count(trim($regCampo['relacion_condicion']),'array') > 0) {
											$crud_set_relation_editar .= '
		$table_'.$relacion_tabla->nombre.' = $this->Model->getRowsJoin("'.$relacion_tabla->nombre.'", "'.$relacion_campo->nombre.','.$relacion_nombre->nombre.' nombre", array(), '.trim($regCampo['relacion_condicion']).', "'.trim($regCampo['relacion_orden']).'" );
		$this->parameters["data"]["table_'.$relacion_tabla->nombre.'"] = $table_'.$relacion_tabla->nombre.';';
										} else {
											$crud_set_relation_editar .= '
		$table_'.$relacion_tabla->nombre.' = $this->Model->getRowsJoin("'.$relacion_tabla->nombre.'", "'.$relacion_campo->nombre.','.$relacion_nombre->nombre.' nombre", array(), "'.trim($regCampo['relacion_condicion']).'", "'.trim($regCampo['relacion_orden']).'" );
		$this->parameters["data"]["table_'.$relacion_tabla->nombre.'"] = $table_'.$relacion_tabla->nombre.';';
										}
									}
								}
							}
}

						}

						// - Campos formulario nuevo / editar ------------------------------
						if ($regCampo['nombre'] != 'id') {

if ($regCampo['nuevo'] == 4) {
							$crud_data_new .= '
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="' . $regCampo['nombre'] . '_i">' . $regCampo['etiqueta_nuevo'] . ':</label>
	                    	<div class="col-sm-10">';

						// - Carga de archivos ---------------------------------------------
						if ($regCampo['archivo'] == 4) {
							$crud_data_new .= '
	                    		<input type="file" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
	                    } elseif ($relationTable != '') {
	                    	$multiple = '';
	                    	if ($regCampo['tipo_entrada'] == 35) { // multiple
	                    		$multiple = 'multiple';
	                    	}
							$crud_data_new .= '
	                    		<select class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '" '.$multiple.'>
<?php foreach ($data["'.$relationTable.'"] as $row) { ?>
	                    			<option value="<?=$row[\''.$relationFieldId.'\']?>"><?=$row[\''.$relationFieldText.'\']?></option>
<?php } ?>
	                    		</select>';
						} else {

							switch ($regCampo['tipo_entrada']) {
								case 29: // hidden
									$crud_data_new .= '
	                    		<input type="hidden" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
									break;
								case 30: // invisible
									$crud_data_new .= '
	                    		<input type="hidden" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
									break;
								case 31: // password
									$crud_data_new .= '
	                    		<input type="password" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
									break;
								case 32: // enum
									$crud_data_new .= '
	                    		<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
									break;
								case 33: // set
									$crud_data_new .= '
	                    		<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
									break;
								case 34: // dropdown
									$crud_data_new .= '
		                    	<select class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">
		                    	</select>';
									break;
								case 35: // multiselect
									$crud_data_new .= '
		                    	<select class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '" multiple>
		                    	</select>';
								case 36: // numeric
									if ($regCampo['nombre'] != 'id') {
										$crud_data_new .= '
	                    		<input type="number" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
	                    			}
									break;
								case 37: // active/inactive
									$crud_data_new .= '
	                    		<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
									break;
								case 38: // date
									$crud_data_new .= '
	                    		<input type="text" class="form-control datepicker" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
									break;
								case 39: // datetime
									$crud_data_new .= '
	                    		<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
									break;
								case 40: // readonly
									$crud_data_new .= '
	                    		<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '" readonly="readonly">';
									break;
								case 41: // text
									$crud_data_new .= '
	                    		<textarea class="form-control" rows="5" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '"></textarea>';
									break;
								case 42: // string
									$crud_data_new .= '
	                    		<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
									break;
								default:
									$crud_data_new .= '
	                    		<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_i" name="' . $regCampo['nombre'] . '">';
									break;
							}

						}



}

if ($regCampo['editar'] == 4) {
                    		$crud_data_edit .= '
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="' . $regCampo['nombre'] . '_g">' . $regCampo['etiqueta_editar'] . ':</label>
	                    	<div class="col-sm-10">';

						// - Carga de archivos ---------------------------------------------
						if ($regCampo['archivo'] == 4) {
	                    	$crud_data_edit .= '
	                    		<input type="file" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
	                    } elseif ($relationTable != '') {
	                    	$multiple = '';
	                    	if ($regCampo['tipo_entrada'] == 35) { // multiple
	                    		$multiple = 'multiple';
	                    	}
							$crud_data_edit .= '
	                    		<select class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '" '.$multiple.'>
<?php foreach ($data["'.$relationTable.'"] as $row) { ?>
	                    			<option value="<?=$row[\''.$relationFieldId.'\']?>"><?=$row[\''.$relationFieldText.'\']?></option>
<?php } ?>
	                    		</select>';
						} else {

							switch ($regCampo['tipo_entrada']) {
								case 29: // hidden
									$crud_data_edit .= '
	                    		<input type="hidden" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
									break;
								case 30: // invisible
									$crud_data_edit .= '
	                    		<input type="hidden" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
									break;
								case 31: // password
									$crud_data_edit .= '
	                    		<input type="password" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
									break;
								case 32: // enum
									$crud_data_edit .= '
	                    		<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
									break;
								case 33: // set
									$crud_data_edit .= '
	                    		<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
									break;
								case 34: // dropdown
									$crud_data_edit .= '
		                    	<select class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">
		                    	</select>';
									break;
								case 35: // multiselect
									$crud_data_edit .= '
		                    	<select class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '" multiple>
		                    	</select>';
								case 36: // numeric
									if ($regCampo['nombre'] != 'id') {
										$crud_data_edit .= '
	                    		<input type="number" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
	                    			}
									break;
								case 37: // active/inactive
									$crud_data_edit .= '
	                    		<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
									break;
								case 38: // date
									$crud_data_edit .= '
	                    		<input type="text" class="form-control datepicker" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
									break;
								case 39: // datetime
									$crud_data_edit .= '
	                    		<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
									break;
								case 40: // readonly
									$crud_data_edit .= '
	                    		<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '" readonly="readonly">';
									break;
								case 41: // text
									$crud_data_edit .= '
	                    		<textarea class="form-control" rows="5" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '"></textarea>';
									break;
								case 42: // string
									$crud_data_edit .= '
	                    		<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
									break;
								default:
									$crud_data_edit .= '
	                    		<input type="text" class="form-control" id="' . $regCampo['nombre'] . '_g" name="' . $regCampo['nombre'] . '">';
									break;
							}

						}

}


                    	}


						if ($regCampo['nombre'] != 'id') {
if ($regCampo['nuevo'] == 4) {
							$crud_data_new .= '
	                    	</div>
	                    </div>';
	                    	$mat_labels_new[$regCampo['orden_nuevo']] = $crud_data_new;
}
if ($regCampo['editar'] == 4) {
							$crud_data_edit .= '
	                    	</div>
	                    </div>';
	                    	$mat_labels_edit[$regCampo['orden_editar']] = $crud_data_edit;
}	                    	
                		}

if ($regCampo['nuevo'] == 4) {

						// - Validaciones de los campos ---------------------------------------------
						$regCampoValidaciones = $this->Model->registros('campos_validaciones', '', 
						array('usuario'=>1, 
							'proyecto'=>$crud->proyecto, 
							'version'=>$crud->version,
							'tabla'=>$crud->id, 
							'campo'=> $regCampo['id'])); 
						if ( count($regCampoValidaciones) ) {
							$crud_js_rules_nuevo .= '			' . $regCampo['nombre'] . ' {
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

									$crud_set_rules_nuevo .= '			$this->form_validation->set_rules("'. $regCampo['nombre'] . '","' . $regCampo['etiqueta_nuevo'] . '","' . $validacion->auxiliar_1 . $parametro . '");' . "\n";

									$crud_js_rules_params_type = '				' . $validacion->auxiliar_2;
									$crud_js_rules_params .= $crud_js_rules_params_type . ': ' . $crud_js_rules_params_value . ',
';

								}
							}
							$crud_js_rules_nuevo .= $crud_js_rules_params . '			},
';
						}

}

if ($regCampo['editar'] == 4) {

						// - Validaciones de los campos ---------------------------------------------
						$regCampoValidaciones = $this->Model->registros('campos_validaciones', '', 
						array('usuario'=>1, 
							'proyecto'=>$crud->proyecto, 
							'version'=>$crud->version,
							'tabla'=>$crud->id, 
							'campo'=> $regCampo['id'])); 
						if ( count($regCampoValidaciones) ) {
							$crud_js_rules_editar .= '			' . $regCampo['nombre'] . ' {
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

									$crud_set_rules_editar .= '			$this->form_validation->set_rules("'. $regCampo['nombre'] . '","' . $regCampo['etiqueta_nuevo'] . '","' . $validacion->auxiliar_1 . $parametro . '");' . "\n";

									$crud_js_rules_params_type = '				' . $validacion->auxiliar_2;
									$crud_js_rules_params .= $crud_js_rules_params_type . ': ' . $crud_js_rules_params_value . ',
';

								}
							}
							$crud_js_rules_editar .= $crud_js_rules_params . '			},
';
						}

}


						// - Carga de archivos ---------------------------------------------
						if ($regCampo['archivo'] == 4) {

if ($regCampo['nuevo'] == 4) {
							$crud_form_open_nuevo = 'form_open_multipart';
							$crud_set_field_upload_nuevo .= '
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
if ($regCampo['editar'] == 4) {
							$crud_form_open_editar = 'form_open_multipart';
							$crud_set_field_upload_editar .= '
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


						}







						if ($regCampo['nombre'] != 'id') {

if ($regCampo['lista'] == 4) {
							// - Lista de campos para el reporte ---------------------------------------------
							// $crud_list .= '"\'.$row["'. $regCampo['nombre'] .'"].\'",';

							// - Lista SSP de campos para el reporte -----------------------------------------
							// $crud_list_ssp .= 'array( \'db\' => \''. $regCampo['nombre'] .'\', \'dt\' => '.$countRow.', \'field\' => \''. $regCampo['nombre'] .'\''.$crud_list_ssp_formatter.' ),';
							$crud_list_ssp_1 = 'array( \'db\' => \''. $regCampo['nombre'] .'\', \'dt\' => ';
							$crud_list_ssp_2 = ', \'field\' => \''. $regCampo['nombre'] .'\''.$crud_list_ssp_formatter.' ),';

							// $countRow++;
}
if ($regCampo['nuevo'] == 4) {
							// - Arreglo de datos para insertar ---------------------------------------------
							$crud_insert_data_post_nuevo .= '
						"'. $regCampo['nombre'] .'" => $post["'. $regCampo['nombre'] .'"],';

}
if ($regCampo['editar'] == 4) {
							// - Arreglo de datos para actualizar ---------------------------------------------
							$crud_insert_data_post_editar .= '
						"'. $regCampo['nombre'] .'" => $post["'. $regCampo['nombre'] .'"],';

}

if ($regCampo['lista'] == 4) {
			$mat_lista_1[$regCampo['orden_lista']] = $crud_list_ssp_1;
			$mat_lista_2[$regCampo['orden_lista']] = $crud_list_ssp_2;
}

						}

// if ($regCampo['lista'] == 4) {
// 			$mat_lista_1[$regCampo['orden_lista']] = $crud_list_ssp_1;
// 			$mat_lista_2[$regCampo['orden_lista']] = $crud_list_ssp_2;
// }

if ($regCampo['nuevo'] == 4) {
			$mat_nuevo[$regCampo['orden_nuevo']] = 111;
}
if ($regCampo['editar'] == 4) {
			$mat_editar[$regCampo['orden_editar']] = 222;
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
	public $path;
	public $breadcrumb;

	public function __construct() {
		parent::__construct();
		// $this->ctrSegAdmin();
		$this->path = '((path))/((tabla))';
		$this->breadcrumb = '
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li class="active">((titulo))</li>
		</ol>';
	}

	public function index() {
// --------------------------------------------------------------------------------		
		$this->parameters['project_folder'] = '((path))';
		$this->parameters['menu_main'] = '((menu_main))';
// --------------------------------------------------------------------------------		
		$this->parameters['template'] = 'ssp';
		$this->parameters['type'] = 'list';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = '((titulo))';
		$this->parameters['subtitle'] = '';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = $this->breadcrumb; 

		$this->admin_design->layout3($this->parameters);
	}

	public function new() {
// --------------------------------------------------------------------------------		
		$this->parameters['project_folder'] = '((path))';
		$this->parameters['menu_main'] = '((menu_main))';
// --------------------------------------------------------------------------------		
((controlador_relaciones_nuevo))
		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'new';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = '((titulo))';
		$this->parameters['subtitle'] = '';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = $this->breadcrumb;

		$this->admin_design->layout3($this->parameters);
	}

	public function edit($id) {
// --------------------------------------------------------------------------------		
		$this->parameters['project_folder'] = '((path))';
		$this->parameters['menu_main'] = '((menu_main))';
// --------------------------------------------------------------------------------		
		$this->parameters['data']['id'] = $id;
((controlador_relaciones_editar))
		$this->parameters['template'] = 'form';
		$this->parameters['type'] = 'edit';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = '((titulo))';
		$this->parameters['subtitle'] = '';
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->parameters['breadcrumb'] = $this->breadcrumb;

		$this->admin_design->layout3($this->parameters);
	}

	public function getRecord () {
		$post = $this->input->post(NULL, TRUE);
		$row = $this->Model->getRow('((tabla))', $post['id']);
		// $data = array('row'=>$row, 'tksec'=>$this->security->get_csrf_hash());
		$data = array('row'=>$row);
		echo json_encode($data);      
	}

	public function insert () {
		$post = $this->input->post(NULL, TRUE);
		if (!empty($post)) {
			foreach ($post as $key => $value) {
				$post[$key] = $this->security->xss_clean($value);
			}
			$this->form_validation->set_rules('id', 'ID', 'xss_clean');
((php_reglas_nuevo))
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.validation_errors().'<br><b>'.$this->lang->line('be_please_try_again').'</b>');
				$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
			} else {
				((controlador_subir_nuevo))
				((controlador_datos_nuevo))
				$id = $this->Model->insert('((tabla))', $data);
				if ($id > 0) {
					$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>'.$this->lang->line('be_crud_the_record_was_successfully_inserted')); 
					$this->session->set_flashdata('alertType', 'success'); // success, info, warning, danger
					redirect(base_url() . $this->path);
				} else {
					$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_crud_the_record_could_not_be_inserted').'<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
				}     
			}
		} else {
			$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_crud_no_data_was_received').'<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
		}
		redirect(base_url() . $this->path . '/new');
	}

	public function update () {
		$post = $this->input->post(NULL, TRUE);
		if (!empty($post)) {
			foreach ($post as $key => $value) {
				$post[$key] = $this->security->xss_clean($value);
			}
			$this->form_validation->set_rules('id', 'ID', 'xss_clean');
((php_reglas_editar))
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.validation_errors().'<br><b>'.$this->lang->line('be_please_try_again').'</b>');
				$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
			} else {
				((controlador_subir_editar))
				((controlador_datos_editar))
				if ($this->Model->update('((tabla))', $data, $post['id'])) {
					$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>'.$this->lang->line('be_crud_the_record_was_updated_successfully')); 
					$this->session->set_flashdata('alertType', 'success'); // success, info, warning, danger
					redirect(base_url() . $this->path);
				} else {
					$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4'.$this->lang->line('be_crud_the_record_could_not_be_updated').'<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
				}     
			}
		} else {
			$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_crud_no_data_was_received').'<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
		}
		redirect(base_url() . $this->path . '/edit/' . $post['id']);   
	}

	public function delete () {
		$post = $this->input->post(NULL, TRUE);
		if (!empty($post)) {
			foreach ($post as $key => $value) {
				$post[$key] = $this->security->xss_clean($value);
			}
			$this->form_validation->set_rules('id', 'ID', 'required|trim|xss_clean');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.validation_errors().'<br><b>'.$this->lang->line('be_please_try_again').'</b>');
				$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
			} else {
				$mat_id = explode(";", $post['id']); 
				$result = false;          
				foreach ($mat_id as $id) {
					$this->Model->delete('((tabla))', $id);
					$result = true;
				}
				if ($result) {
					$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>'.$this->lang->line('be_crud_the_records_were_successfully_deleted')); 
					$this->session->set_flashdata('alertType', 'success'); // success, info, warning, danger
				} else {
					$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_crud_records_could_not_be_deleted').'<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
				}     
			}
		} else {
			$this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_crud_no_data_was_received').'.<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
		}
		redirect(base_url() . $this->path);    
	}

	public function list_ssp () {
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

		$joinQuery = "FROM $table";
		$extraWhere = ""; //"`u`.`valor` >= 90000";
		$groupBy = ""; //"`u`.`datos`";
		$having = ""; //"`u`.`valor` >= 140000";

		//$_GET['tksec'] = $this->security->get_csrf_hash();  

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
			$code_controller = str_replace("((menu_main))",$menu_main,$code_controller);

			$code_controller = str_replace("((controlador_relaciones_nuevo))", $crud_set_relation_nuevo, $code_controller);
			$code_controller = str_replace("((controlador_relaciones_editar))", $crud_set_relation_editar, $code_controller);

			// $code_controller = str_replace("((controlador_relaciones_lista))",$crud_set_relation_list,$code_controller);

			// Nuevo
			$code_controller = str_replace("((php_reglas_nuevo))",$crud_set_rules_nuevo,$code_controller);
			$code_controller = str_replace("((controlador_subir_nuevo))",$crud_set_field_upload_nuevo,$code_controller);
			$crud_insert_data_post_nuevo = '
							$data = array(' . $crud_insert_data_post_nuevo . ');';
			$code_controller = str_replace("((controlador_datos_nuevo))",$crud_insert_data_post_nuevo, $code_controller);

			// Editar
			$code_controller = str_replace("((php_reglas_editar))",$crud_set_rules_editar,$code_controller);
			$code_controller = str_replace("((controlador_subir_editar))",$crud_set_field_upload_editar,$code_controller);
			$crud_insert_data_post_editar = '
							$data = array(' . $crud_insert_data_post_editar . ');';
			$code_controller = str_replace("((controlador_datos_editar))",$crud_insert_data_post_editar,$code_controller);


			// $crud_list = substr($crud_list, 0, -1);
			// $crud_list_btns = '"<input type=\"checkbox\" id=\"fila_\'.$row["'.$tableId.'"].\'\" class=\"selection\" cod=\"\'.$row["'.$tableId.'"].\'\">", "<button type=\"button\" class=\"btn btn-primary btn-xs btnEdit\" cod=\"\'.$row["'.$tableId.'"].\'\"><span class=\"glyphicon glyphicon-pencil\"></span></button>", "<button type=\"button\" class=\"btn btn-default btn-xs text-red btnDelete\" cod=\"\'.$row["'.$tableId.'"].\'\"><span class=\"glyphicon glyphicon-trash\"></span></button>"';
			// $crud_list = '$dataJsonReg .= \'['.$crud_list_btns.', '.$crud_list.'],\';';
			// $code_controller = str_replace("((controlador_lista))",$crud_list,$code_controller);


			//$crud_list_ssp = $crud_list_ssp;

			$crud_list_ssp_orden = '';

			ksort($mat_lista_1);

			foreach ($mat_lista_1 as $key => $lista_campos) {
				$crud_list_ssp_orden .= $lista_campos . $countRow . $mat_lista_2[$key];
				$countRow++;
			}

			$crud_list_ssp_btns = 'array( \'db\' => \''.$tableId.'\', \'dt\' => 0, \'field\' => \''.$tableId.'\', \'formatter\' => function($d, $row) {return \'<input type="checkbox" id="fila_\' . $d . \'" class="selection" cod="\' . $d . \'">\';}),array( \'db\' => \''.$tableId.'\', \'dt\' => 1, \'field\' => \''.$tableId.'\', \'formatter\' => function($d, $row) {return \'<button type="button" class="btn btn-primary btn-xs btnEdit" cod="\' . $d . \'"><span class="glyphicon glyphicon-pencil"></span></button>\';}), array( \'db\' => \''.$tableId.'\', \'dt\' => 2, \'field\' => \''.$tableId.'\', \'formatter\' => function($d, $row) {return \'<button type="button" class="btn btn-default btn-xs text-red btnDelete" cod="\' . $d . \'"><span class="glyphicon glyphicon-trash"></span></button>\';})';
			$crud_list_ssp = '$columns = array('.$crud_list_ssp_btns.', '.$crud_list_ssp_orden.');';
			$code_controller = str_replace("((controlador_lista_ssp))",$crud_list_ssp,$code_controller);


// -------------------------------------------------------------------------------------
			$code_view_list = <<<'KIL'
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {title}
        <small>{subtitle}</small>
    </h1>
    {breadcrumb}
</section>

<?php
if ( $this->session->flashdata('alertMessage') ) {
?>
<!-- Alert Messages -->
<section class="content-header">
    <div class="alert alert-<?php echo $this->session->flashdata('alertType'); ?> alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $this->session->flashdata('alertMessage'); ?>
    </div>
</section>
<?php
}
?>

<!-- Main content -->
<section class="content">

	<div class="row">
	    <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $this->lang->line('be_crud_list'); ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="btnCommands">
                        <a href="<?php echo base_url() . $path; ?>/new" class="btn btn-default text-green" id="btnNew"><span class="glyphicon glyphicon-plus"></span> <?php echo $this->lang->line('be_crud_new'); ?></a>
                        <button type="button" class="btn btn-default text-red" id="btnDelete"><span class="glyphicon glyphicon-trash"></span> <?php echo $this->lang->line('be_crud_delete'); ?></button>
                    </div> 
                    <div class="table-responsive">
	                    <!-- dt-responsive -->
	                    <table id="list" class="table table-bordered table-striped" width="100%">
	                        <thead>
	                            <tr>
	                                <th class="tdSelection"><input type="checkbox" id="selectAll"></th>
	                                <th class="tdButtons"></th>
	                                <th class="tdButtons"></th>  
((vista_lista))
	                            </tr>
	                        </thead>

	                        <tfoot>
	                            <tr>
	                                <th class="tdSelection"></th>
	                                <th class="tdButtons"></th>
	                                <th class="tdButtons"></th>  
((vista_lista))
	                            </tr>
	                        </tfoot>

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

</section>
<!-- /.content -->

<?php echo form_open($path . '/delete', array('id' => 'form_e', 'class' => 'form-horizontal')); ?> 
    <input type='hidden' id='id_e' name='id'>
</form>

KIL;


			$crud_labels_list = '';
			ksort($mat_labels_list);
			foreach ($mat_labels_list as $labels_list) {
				$crud_labels_list .= $labels_list;
			}

			// $code_view_list = str_replace("((tabla))",$tableName,$code_view_list);
			// $code_view_list = str_replace("((path))",$path,$code_view_list);
			// $code_view_list = str_replace("((form_open))",$crud_form_open,$code_view_list);
			$code_view_list = str_replace("((vista_lista))",$crud_labels_list,$code_view_list);
			//$code_view_list = str_replace("((vista_nuevo))",$crud_data_new,$code_view_list);
			//$code_view_list = str_replace("((vista_editar))",$crud_data_edit,$code_view_list);

// $code_view_list


// $code_view_new
// -------------------------------------------------------------------------------------
			$code_view_new = <<<'KIL'
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {title}
        <small>{subtitle}</small>
    </h1>
    {breadcrumb}
</section>

<?php
if ( $this->session->flashdata('alertMessage') ) {
?>
<!-- Alert Messages -->
<section class="content-header">
    <div class="alert alert-<?php echo $this->session->flashdata('alertType'); ?> alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $this->session->flashdata('alertMessage'); ?>
    </div>
</section>
<?php
}
?>

<!-- Main content -->
<section class="content">

	<div class="row">
	    <div class="col-xs-12">
	        <div class="box box-success box-solid">
	            <div class="box-header with-border">
	                <h3 class="box-title"><?php echo $this->lang->line('be_crud_new_record'); ?></h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">

	                <?php echo ((form_open_nuevo))($path . '/insert', array('id' => 'form_i', 'class' => 'form-horizontal')); ?>  

                        <div class="form-group"> 
                           <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success"><?php echo $this->lang->line('be_crud_insert_and_return_to_the_list'); ?></button>
                                <a href="<?php echo base_url() . $path; ?>" class="btn btn-default"><?php echo $this->lang->line('be_crud_cancel'); ?></a>
                            </div>
                        </div>

	                    <input type='hidden' id='id_i' name='id' value='0'>
	                    ((vista_nuevo))

                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success"><?php echo $this->lang->line('be_crud_insert_and_return_to_the_list'); ?></button>
                                <a href="<?php echo base_url() . $path; ?>" class="btn btn-default"><?php echo $this->lang->line('be_crud_cancel'); ?></a>
                            </div>
                        </div>

	                </form>

	            </div>
	        </div>
	    </div>
	</div>  

</section>
<!-- /.content -->

KIL;

			$crud_data_new = '';
			ksort($mat_labels_new);
			foreach ($mat_labels_new as $labels_new) {
				$crud_data_new .= $labels_new;
			}

			//$code_view_new = str_replace("((tabla))",$tableName,$code_view_new);
			//$code_view_new = str_replace("((path))",$path,$code_view_new);
			$code_view_new = str_replace("((form_open_nuevo))",$crud_form_open_nuevo,$code_view_new);
			//$code_view_new = str_replace("((vista_lista))",$crud_labels_list,$code_view_new);
			$code_view_new = str_replace("((vista_nuevo))",$crud_data_new,$code_view_new);
			//$code_view_new = str_replace("((vista_editar))",$crud_data_edit,$code_view_new);

// $code_view_edit
// -------------------------------------------------------------------------------------
			$code_view_edit = <<<'KIL'
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {title}
        <small>{subtitle}</small>
    </h1>
    {breadcrumb}
</section>

<?php
if ( $this->session->flashdata('alertMessage') ) {
?>
<!-- Alert Messages -->
<section class="content-header">
	<div class="alert alert-<?php echo $this->session->flashdata('alertType'); ?> alert-dismissible">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	    <?php echo $this->session->flashdata('alertMessage'); ?>
	</div>
</section>
<?php
}
?>

<!-- Main content -->
<section class="content">

	<div class="row">
	    <div class="col-xs-12">
	        <div class="box box-primary box-solid">
	            <div class="box-header with-border">
	                <h3 class="box-title"><?php echo $this->lang->line('be_crud_edit_record'); ?></h3>
	            </div>
	            <!-- /.box-header -->

                <div id="overlay-section">
                    <br /><br /><br /><br />
                </div>

	            <div class="box-body">

	                <?php echo ((form_open_editar))($path . '/update', array('id' => 'form_g', 'class' => 'form-horizontal')); ?>              

                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('be_crud_update_and_return_to_the_list'); ?></button>
                                <a href="<?php echo base_url() . $path; ?>" class="btn btn-default"><?php echo $this->lang->line('be_crud_cancel'); ?></a>
                            </div>
                        </div>

	                    <input type='hidden' id='id_g' name='id' value="<?php echo $data['id']; ?>">
	                    ((vista_editar))

                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('be_crud_update_and_return_to_the_list'); ?></button>
                                <a href="<?php echo base_url() . $path; ?>" class="btn btn-default"><?php echo $this->lang->line('be_crud_cancel'); ?></a>
                            </div>
                        </div>

	                </form>

	            </div>

                <div class="overlay">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>

	        </div>
	    </div>
	</div>  

</section>
<!-- /.content -->

KIL;

			$crud_data_edit = '';
			ksort($mat_labels_edit);
			foreach ($mat_labels_edit as $labels_edit) {
				$crud_data_edit .= $labels_edit;
			}

			// $code_view_edit = str_replace("((tabla))",$tableName,$code_view_edit);
			// $code_view_edit = str_replace("((path))",$path,$code_view_edit);
			$code_view_edit = str_replace("((form_open_editar))",$crud_form_open_editar,$code_view_edit);
			//$code_view_edit = str_replace("((vista_lista))",$crud_labels_list,$code_view_edit);
			//$code_view_edit = str_replace("((vista_nuevo))",$crud_data_new,$code_view_edit);
			$code_view_edit = str_replace("((vista_editar))",$crud_data_edit,$code_view_edit);

// -------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------

			$code_js_list = <<<'KIL'
$(function () {

	$('#list').DataTable( {
		"processing": true,
		"serverSide": true,
		"ajax": proyVar.base_url + proyVar.path + "/list_ssp",
		"order": [[ 3, "asc" ]],
		"columnDefs": [ {"targets": 0,"orderable": false}, {"targets": 1,"orderable": false}, {"targets": 2,"orderable": false} ],
		"iDisplayLength": 25,
		"language": {
			"url": proyVar.datatablesLang 
		}
	});

});
KIL;


			// $code_js_list = str_replace("((tabla))",$tableName,$code_js_list);
			// $code_js_list = str_replace("((path))",$path,$code_js_list);
			// $code_js_list = str_replace("((js_reglas_nuevo))",$crud_js_rules_nuevo,$code_js_list);

// $code_js_list

// $code_js_new
			$code_js_new = <<<'KIL'
$(function () {

	$( "#form_i" ).validate( {
		rules: {
((js_reglas_nuevo))
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

			// $code_js_new = str_replace("((tabla))",$tableName,$code_js_new);
			// $code_js_new = str_replace("((path))",$path,$code_js_new);
			$code_js_new = str_replace("((js_reglas_nuevo))",$crud_js_rules_nuevo,$code_js_new);

// $code_js_edit
			$code_js_edit = <<<'KIL'
$(function () {

	$( "#form_g" ).validate( {
		rules: {
((js_reglas_editar))
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


			// $code_js_edit = str_replace("((tabla))",$tableName,$code_js_edit);
			// $code_js_edit = str_replace("((path))",$path,$code_js_edit);
			$code_js_edit = str_replace("((js_reglas_editar))",$crud_js_rules_editar,$code_js_edit);


/*
$línea = str_replace("((js_reglas))",$combinar[$indice]['js_reglas'],$línea);
*/

		}

		return array(
			'folder' => $path,
			'folder_1' => $carpeta_1,
			'folder_2' => $carpeta_2,
			'file' => strtolower($script),
			'code_controller' => $code_controller,

			'code_view_list' => $code_view_list,
			'code_view_new' => $code_view_new,
			'code_view_edit' => $code_view_edit,

			'code_js_list' => $code_js_list,
			'code_js_new' => $code_js_new,
			'code_js_edit' => $code_js_edit,

			'projectName' => $projectName,
			'versionName' => $versionName,
			'tableName' => $tableName,
		);


	}

}