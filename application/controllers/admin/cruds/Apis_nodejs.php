<?php
defined("BASEPATH") OR exit("Direct access to this script is not allowed.");
/**
 * @author: Solucionaticos.com
 * @name: Projects
 * @version: 1.0
 * @date: 2019-08-28 21:10:27 
 * */

class Apis_nodejs extends MY_Controller {

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
			url: proyVar.base_url + proyVar.admin_path + '/cruds/apis_nodejs/generate_list_ids',	
			cache: false,
			type: 'post',
			data: {'ids':ids},
			success:function(datos) {
				//tksec = datos.tksec;
				location.href = proyVar.base_url + proyVar.admin_path + '/cruds/apis_nodejs';
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
            'cruds' => $cruds, 
            'folder' => 'asdzxcqwe',  
            'file' => '123asdzxcqwe321',  
		);

		// Views
		$this->admin_design->_load_layout($this->config->item('adminPath') . '/cruds/apis_nodejs/cruds', $data);

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
		id: "make_model"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "txt"	
	}); 

	editAreaLoader.init({
		id: "make_controller"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "txt"	
	}); 

	editAreaLoader.init({
		id: "routes"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "js"	
	}); 

	editAreaLoader.init({
		id: "models"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "js"	
	}); 

	editAreaLoader.init({
		id: "migrations"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "js"	
	}); 

	editAreaLoader.init({
		id: "controllers"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "js"	
	}); 

	editAreaLoader.init({
		id: "validators_store"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "js"	
	}); 

	editAreaLoader.init({
		id: "validators_update"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "js"	
	}); 

	editAreaLoader.init({
		id: "shield"	// id of the textarea to transform		
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

		$code_make_model = $CIDatatables['code_make_model'];
		$code_make_controller = $CIDatatables['code_make_controller'];
		$code_routes = $CIDatatables['code_routes'];
		$code_models = $CIDatatables['code_models'];
		$code_migrations = $CIDatatables['code_migrations'];
		$code_controllers = $CIDatatables['code_controllers'];
		$code_shield = $CIDatatables['code_shield'];

		$code_validators_store = $CIDatatables['code_validators_store'];
		$code_validators_update = $CIDatatables['code_validators_update'];

		$folder = $CIDatatables['folder'];
		$tableName = $CIDatatables['tableName'];
		$tableNameCamelCase = $CIDatatables['tableNameCamelCase'];

// -------------------------------------------------------------------------------------

        $data = array(
        	'css' => $css, 
            'js' => $js, 
            'projectVersionTitle' => $projectVersionTitle, 
            'tableName' => $tableName, 
            'tableNameCamelCase' => $tableNameCamelCase, 
			'code_make_model' => $code_make_model, 
			'code_make_controller' => $code_make_controller, 
			'code_routes' => $code_routes, 
			'code_models' => $code_models, 
			'code_migrations' => $code_migrations, 
			'code_controllers' => $code_controllers,
			'code_shield' => $code_shield,

			'code_validators_store' => $code_validators_store, 
			'code_validators_update' => $code_validators_update, 

            'id' => $id,
            'folder' => 'asdzxcqwe',  
            'file' => '123asdzxcqwe321',  
        );

        $this->admin_design->_load_layout($this->config->item('adminPath') . '/cruds/apis_nodejs/crud', $data);

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
		id: "make_model"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "txt"	
	}); 

	editAreaLoader.init({
		id: "make_controller"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "txt"	
	}); 

	editAreaLoader.init({
		id: "routes"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "js"	
	}); 

	editAreaLoader.init({
		id: "models"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "js"	
	}); 

	editAreaLoader.init({
		id: "migrations"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "js"	
	}); 

	editAreaLoader.init({
		id: "controllers"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "js"	
	}); 

	editAreaLoader.init({
		id: "validators_store"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "js"	
	}); 

	editAreaLoader.init({
		id: "validators_update"	// id of the textarea to transform		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: true
		,word_wrap: true
		,language: "es"
		,syntax: "js"	
	}); 

	editAreaLoader.init({
		id: "shield"	// id of the textarea to transform		
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

		$code_make_model = $CIDatatables['code_make_model'];
		$code_make_controller = $CIDatatables['code_make_controller'];
		$code_routes = $CIDatatables['code_routes'];
		$code_models = $CIDatatables['code_models'];
		$code_migrations = $CIDatatables['code_migrations'];
		$code_controllers = $CIDatatables['code_controllers'];
		$code_shield = $CIDatatables['code_shield'];

		$code_validators_store = $CIDatatables['code_validators_store'];
		$code_validators_update = $CIDatatables['code_validators_update'];

		$folder = $CIDatatables['folder'];
		$tableName = $CIDatatables['tableName'];
		$tableNameCamelCase = $CIDatatables['tableNameCamelCase'];

// -------------------------------------------------------------------------------------

        $data = array(
        	'css' => $css, 
            'js' => $js, 
            'projectVersionTitle' => $projectVersionTitle, 
            'tableName' => $tableName, 
            'tableNameCamelCase' => $tableNameCamelCase, 
			'code_make_model' => $code_make_model, 
			'code_make_controller' => $code_make_controller, 
			'code_routes' => $code_routes, 
			'code_models' => $code_models, 
			'code_migrations' => $code_migrations, 
			'code_controllers' => $code_controllers, 
			'code_shield' => $code_shield,

			'code_validators_store' => $code_validators_store, 
			'code_validators_update' => $code_validators_update, 

            'id' => $id,
            'folder' => 'asdzxcqwe',  
            'file' => '123asdzxcqwe321',  
        );

        $this->admin_design->_load_layout($this->config->item('adminPath') . '/cruds/apis_nodejs/crud_cruds', $data);

    }

    public function generate($id) {

		$this->_generateCode($id);
		redirect($this->config->item('adminPath') . '/cruds/apis_nodejs/crud/' . $id);

    }

    public function generate_cruds($id) {

		$this->_generateCode($id);
		redirect($this->config->item('adminPath') . '/cruds/apis_nodejs/crud_cruds/' . $id);

    }


	public function generate_list($id) {

		$this->_generateCode($id);
		redirect($this->config->item('adminPath') . '/cruds/apis_nodejs');

    }

	public function generate_list_ids() {
	    $post = $this->input->post();

	    $ids = $post['ids'];
	    $listIds = explode(',', $ids);
	    foreach ($listIds as $id) {
	    	if ($id != '0') $this->_generateCode($id);
	    }
		redirect($this->config->item('adminPath') . '/cruds/apis_nodejs');
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

		$code_make_model = $CIDatatables['code_make_model'];
		$code_make_controller = $CIDatatables['code_make_controller'];
		$code_routes = $CIDatatables['code_routes'];
		$code_models = $CIDatatables['code_models'];
		$code_migrations = $CIDatatables['code_migrations'];
		$code_controllers = $CIDatatables['code_controllers'];
		$code_validators_store = $CIDatatables['code_validators_store'];
		$code_validators_update = $CIDatatables['code_validators_update'];
		$code_shield = $CIDatatables['code_shield'];

		$project_name = (trim($CIDatatables['projectName']));
		$version_name = (trim($CIDatatables['versionName']));
		$tableName = (trim($CIDatatables['tableName']));
		$tableNameCamelCase = (trim($CIDatatables['tableNameCamelCase']));

		$path = 'assets/cruds/apis_nodejs/' . $project_name;
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}
		$path .= '/' . $version_name;
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		$path .= '/server';
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		// ---------------------------------------------------------------------------------------------------------		
		// /server/ssh/model/$tableName.ssh
		// $code_make_model
		// ---------------------------------------------------------------------------------------------------------		

		$path .= '/ssh';
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		$path .= '/model';
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		$pathFile = './' . $path . '/' . $tableName . '.ssh';
		if ( !write_file($pathFile, $code_make_model)) {
			echo 'Unable to write the file: ' . $pathFile;
			die();
		}

		// ---------------------------------------------------------------------------------------------------------		
		// /server/ssh/controller/$tableName.ssh
		// $code_make_controller
		// ---------------------------------------------------------------------------------------------------------		
		$path = 'assets/cruds/apis_nodejs/' . $project_name . '/' . $version_name . '/server/ssh';

		$path .= '/controller';
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		$pathFile = './' . $path . '/' . $tableName . '.ssh';
		if ( !write_file($pathFile, $code_make_controller)) {
			echo 'Unable to write the file: ' . $pathFile;
			die();
		}

		// ---------------------------------------------------------------------------------------------------------		
		// /server/start/routes/$tableName.js
		// $code_routes
		// ---------------------------------------------------------------------------------------------------------		
		$path = 'assets/cruds/apis_nodejs/' . $project_name . '/' . $version_name . '/server';

		$path .= '/start';
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		$path .= '/routes';
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		$pathFile = './' . $path . '/' . $tableName . '.js';
		if ( !write_file($pathFile, $code_routes)) {
			echo 'Unable to write the file: ' . $pathFile;
			die();
		}


		// ---------------------------------------------------------------------------------------------------------		
		// /server/app/Models/$tableNameCamelCase.js
		// $code_models
		// ---------------------------------------------------------------------------------------------------------		
		$path = 'assets/cruds/apis_nodejs/' . $project_name . '/' . $version_name . '/server';

		$path .= '/app';
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		$path .= '/Models';
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		$pathFile = './' . $path . '/' . $tableNameCamelCase . '.js';
		if ( !write_file($pathFile, $code_models)) {
			echo 'Unable to write the file: ' . $pathFile;
			die();
		}


		// ---------------------------------------------------------------------------------------------------------		
		// /server/app/database/migrations/1568415009919_$tableName.js
		// $code_migrations
		// ---------------------------------------------------------------------------------------------------------		
		$path = 'assets/cruds/apis_nodejs/' . $project_name . '/' . $version_name . '/server';

		$path .= '/database';
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		$path .= '/migrations';
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		$pathFile = './' . $path . '/' . round(microtime(true) * 1000) . '_' . $tableName . '.js';
		if ( !write_file($pathFile, $code_migrations)) {
			echo 'Unable to write the file: ' . $pathFile;
			die();
		}


		// ---------------------------------------------------------------------------------------------------------		
		// /server/app/Controllers/Http/$tableNameCamelCaseController.js
		// $code_controllers
		// ---------------------------------------------------------------------------------------------------------		
		$path = 'assets/cruds/apis_nodejs/' . $project_name . '/' . $version_name . '/server/app';

		$path .= '/Controllers';
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		$path .= '/Http';
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		$pathFile = './' . $path . '/' . $tableNameCamelCase . 'Controller.js';
		if ( !write_file($pathFile, $code_controllers)) {
			echo 'Unable to write the file: ' . $pathFile;
			die();
		}


		// ---------------------------------------------------------------------------------------------------------		
		// /server/app/Validators/StoreAddons_City.js
		// $code_validators_store
		// ---------------------------------------------------------------------------------------------------------		
		$path = 'assets/cruds/apis_nodejs/' . $project_name . '/' . $version_name . '/server/app';

		$path .= '/Validators';
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		$pathFile = './' . $path . '/Store' . $tableNameCamelCase . '.js';
		if ( !write_file($pathFile, $code_validators_store)) {
			echo 'Unable to write the file: ' . $pathFile;
			die();
		}


		// ---------------------------------------------------------------------------------------------------------		
		// /server/app/Validators/UpdateAddons_City.js
		// $code_validators_update
		// ---------------------------------------------------------------------------------------------------------		
		$path = 'assets/cruds/apis_nodejs/' . $project_name . '/' . $version_name . '/server/app/Validators';

		$pathFile = './' . $path . '/Update' . $tableNameCamelCase . '.js';
		if ( !write_file($pathFile, $code_validators_update)) {
			echo 'Unable to write the file: ' . $pathFile;
			die();
		}


		// ---------------------------------------------------------------------------------------------------------		
		// /server/config/shield.js
		// $code_shield
		// ---------------------------------------------------------------------------------------------------------		
		$path = 'assets/cruds/apis_nodejs/' . $project_name . '/' . $version_name . '/server';

		$path .= '/config';
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		$pathFile = './' . $path . '/shield.js';
		if ( !write_file($pathFile, $code_shield)) {
			echo 'Unable to write the file: ' . $pathFile;
			die();
		}


		// ---------------------------------------------------------------------------------------------------------		
		// Update CRUDS
		// ---------------------------------------------------------------------------------------------------------		

		$path = 'assets/cruds/' . $project_name . '/' . $version_name;

		$data = array(
			'path' => $path,
			'fecha_generacion' => date('Y-m-d H:i:s'),
		);


		$this->Model->update('cruds', $data, $id);

    }

    function _codeCIDatatables($id) {

        $crud = $this->Model->getRow('cruds', $id);

		$code_make_model = '';
		$code_make_controller = '';
		$code_routes = '';
		$code_models = '';
		$code_fields = '';
		$code_migrations = '';
		$code_controllers = '';
		$code_shield = '';

		$code_validators_store = '';
		$code_validators_update = '';

        if ( $crud ) {

	        // --------------------------------------------------------------
	        $tableRow = $this->Model->getRow('tablas', $crud->tabla);
	        $tableName = $tableRow->nombre;
	        $crudClass = ucfirst($tableName);
            $crud_js_rules = '';

			$arrTableRow = explode('_', $tableName);
			$tableNameCamelCase = '';
			foreach($arrTableRow as $word) {
				$tableNameCamelCase .= ucwords($word) . '_';
			}
			if ($tableNameCamelCase != '') {
				$tableNameCamelCase = substr($tableNameCamelCase, 0, -1);	
			}

			$code_controllers_fields = '';

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

						$code_models .= '"' . $regCampo['nombre'] . '",';
						$code_fields .= '"' . $regCampo['nombre'] . '",';

						$relationTable = '';
						$relationFieldId = '';
						$relationFieldText = '';

						$code_controllers_fields .= '    '.$tableName.'.' . $regCampo['nombre'] . ' = '.$tableName.'Info.' . $regCampo['nombre'] . ';
';

						// - Nombre del campo que es la llave primaria ------------------------------
						if ($regCampo['llave_primaria'] == 4) {
							$tableId = $regCampo['nombre'];
						}

						// - Nombre del campo que es la llave primaria ------------------------------
						if ($regCampo['llave_primaria'] == 4) {
							$code_migrations .= '      table.increments("' . $regCampo['nombre'] . '", ' . $regCampo['tamano'] . ')
';
						} else {
							if ($regCampo['tipo_dato']=="int") {
								$code_migrations .= '      table.integer("' . $regCampo['nombre'] . '", ' . $regCampo['tamano'] . ').notNullable()
';
							}
							if ($regCampo['tipo_dato']=="char") {
								$code_migrations .= '      table.string("' . $regCampo['nombre'] . '", ' . $regCampo['tamano'] . ').notNullable()
';
							}
							if ($regCampo['tipo_dato']=="varchar") {
								$code_migrations .= '      table.string("' . $regCampo['nombre'] . '", ' . $regCampo['tamano'] . ').notNullable()
';
							}
							if ($regCampo['tipo_dato']=="tinyint") {
								$code_migrations .= '      table.integer("' . $regCampo['nombre'] . '", ' . $regCampo['tamano'] . ').notNullable()
';
							}
							if ($regCampo['tipo_dato']=="smallint") {
								$code_migrations .= '      table.integer("' . $regCampo['nombre'] . '", ' . $regCampo['tamano'] . ').notNullable()
';
							}
							if ($regCampo['tipo_dato']=="date") {
								$code_migrations .= '      table.date("' . $regCampo['nombre'] . '").notNullable()
';
							}
							if ($regCampo['tipo_dato']=="datetime") {
								$code_migrations .= '      table.datetime("' . $regCampo['nombre'] . '").notNullable()
';
							}
							if ($regCampo['tipo_dato']=="decimal") {
								$code_migrations .= '      table.integer("' . $regCampo['nombre'] . '", ' . $regCampo['tamano'] . ').notNullable()
';
							}
							if ($regCampo['tipo_dato']=="text") {
								$code_migrations .= '      table.text("' . $regCampo['nombre'] . '").notNullable()
';
							}
							if ($regCampo['tipo_dato']=="tinyblob") {
								$code_migrations .= '      table.text("' . $regCampo['nombre'] . '").notNullable()
';
							}
							if ($regCampo['tipo_dato']=="timestamp") {
								$code_migrations .= '      table.timestamps("' . $regCampo['nombre'] . '").notNullable()
';
							}
							if ($regCampo['tipo_dato']=="blob") {
								$code_migrations .= '      table.text("' . $regCampo['nombre'] . '", ' . $regCampo['tamano'] . ').notNullable()
';
							}
							if ($regCampo['tipo_dato']=="float") {
								$code_migrations .= '      table.float("' . $regCampo['nombre'] . '", ' . $regCampo['tamano'] . ').notNullable()
';
							}
							if ($regCampo['tipo_dato']=="set") {
								$code_migrations .= '      table.enu("' . $regCampo['nombre'] . '", [' . $regCampo['tamano'] . ']).notNullable()
';
							}
						}

						// - Validaciones de los campos ---------------------------------------------
						$regCampoValidaciones = $this->Model->registros('campos_validaciones', '', 
						array('usuario'=>1, 
							'proyecto'=>$crud->proyecto, 
							'version'=>$crud->version,
							'tabla'=>$crud->tabla, 
							'campo'=> $regCampo['id'])); 
						if ( count($regCampoValidaciones) ) {
							$crud_js_rules .= '      ' . $regCampo['nombre'] . ': \'';
							$crud_js_rules_params = '';
							foreach ($regCampoValidaciones as $regCampoValidacion) {
								if ($regCampoValidacion['validacion'] > 0) {
                                    if ($regCampoValidacion['validacion'] != 13 and $regCampoValidacion['validacion'] != 14) {
    									$validacion = $this->Model->registro('datos_valores', $regCampoValidacion['validacion']);

    									$crud_js_rules_params_type = '';
    									$crud_js_rules_params_value = '';

    									if ( trim($regCampoValidacion['parametro']) != '' ) {
    										$crud_js_rules_params_value = trim($regCampoValidacion['parametro']);
    									} 

    									$crud_js_rules_params_type = $validacion->auxiliar_4;
                                        if ($crud_js_rules_params_value != '') {
                                            $crud_js_rules_params .= $crud_js_rules_params_type . ':' . $crud_js_rules_params_value . '|';
                                        } else {
                                            $crud_js_rules_params .= $crud_js_rules_params_type . '|';
                                        }
                                    }
								}
							}
                            if (trim($crud_js_rules_params) != '') $crud_js_rules_params = substr($crud_js_rules_params, 0, -1);
							$crud_js_rules .= $crud_js_rules_params . '\',
';
						}


					} // fin -foreach
				} // fin - if
			} // fin - if
	        // --------------------------------------------------------------

			$code_make_model = 'adonis make:model '.$tableNameCamelCase.' --migration';
			$code_make_controller = 'adonis make:controller '.$tableNameCamelCase;

			$code_routes = 'Route.group(() => {
    Route.get("/'.$tableName.'", "'.$tableNameCamelCase.'Controller.index");
    Route.get("/'.$tableName.'/:id", "'.$tableNameCamelCase.'Controller.show");
    Route.get("/'.$tableName.'/:field/:value", "'.$tableNameCamelCase.'Controller.findBy");
    Route.get("/'.$tableName.'/:field/:operator/:value", "'.$tableNameCamelCase.'Controller.queryWhere");
    Route.get("/'.$tableName.'_getCount/:field/:operator/:value", "'.$tableNameCamelCase.'Controller.queryWheregetCount");
    Route.post("/'.$tableName.'", "'.$tableNameCamelCase.'Controller.store");
    Route.put("/'.$tableName.'/:id", "'.$tableNameCamelCase.'Controller.update");
    Route.delete("/'.$tableName.'/:id", "'.$tableNameCamelCase.'Controller.destroy");
    Route.delete("/'.$tableName.'/:field/:operator/:value", "'.$tableNameCamelCase.'Controller.deletes");
    Route.delete("/'.$tableName.'", "'.$tableNameCamelCase.'Controller.truncate");
}).prefix("api/v1");';

			if (trim($code_models) != '') {
				$code_models = substr($code_models, 0, -1);
			}

			$code_models = '
"use strict"

const Model = use("Model");

class '.$tableNameCamelCase.' extends Model {
    static get table () {
        return "'.$tableName.'"; 
    }

    static get primaryKey () {
        return "'.$tableId.'"; 
    }

    static get visible () {
        return ['.$code_models.']; 
    }
}

module.exports = '.$tableNameCamelCase.';
';


$code_migrations = '
"use strict"

const Schema = use("Schema")

class '.$tableNameCamelCase.'Schema extends Schema {
  up () {
    this.create("'.$tableName.'", (table) => {
'.$code_migrations.'
      table.timestamps()
    })
  }

  down () {
    this.drop("'.$tableName.'")
  }
}

module.exports = '.$tableNameCamelCase.'Schema';


$code_controllers = '
"use strict"

const '.$tableNameCamelCase.' = use("App/Models/'.$tableNameCamelCase.'")
class '.$tableNameCamelCase.'Controller {
  async index ({response}) {
    let '.$tableName.' = await '.$tableNameCamelCase.'.all()

    return response.json('.$tableName.')
  }

  async show ({params, response}) {
    const '.$tableName.' = await '.$tableNameCamelCase.'.find(params.id)
    if (!'.$tableName.') {
        return response.status(404).json({data: "Resource not found"})
    }
    return response.json('.$tableName.')
  }

  async findBy ({params, response}) {
    const '.$tableName.' = await '.$tableNameCamelCase.'.findBy(params.field,params.value)
    if (!'.$tableName.') {
        return response.status(404).json({data: "Resource not found"})
    }
    return response.json('.$tableName.')
  }

  async queryWhere ({params, response}) {
    var operator = "="
    if (params.operator == "equal_to") operator = "="
    if (params.operator == "not_equal") operator = "!="        
    if (params.operator == "greater_than") operator = ">"
    if (params.operator == "less_than") operator = "<"
    if (params.operator == "greater_than_or_equal_to") operator = ">="
    if (params.operator == "less_than_or_equal_to") operator = "<="

    const '.$tableName.' = await '.$tableNameCamelCase.'
    .query()
    .where(params.field, operator, params.value)
    .fetch()

    if (!'.$tableName.') {
        return response.status(404).json({data: "Resource not found"})
    }
    return response.json('.$tableName.')
  }  

  async queryWheregetCount ({params, response}) {
    var operator = "="
    if (params.operator == "equal_to") operator = "="
    if (params.operator == "not_equal") operator = "!="        
    if (params.operator == "greater_than") operator = ">"
    if (params.operator == "less_than") operator = "<"
    if (params.operator == "greater_than_or_equal_to") operator = ">="
    if (params.operator == "less_than_or_equal_to") operator = "<="

    const '.$tableName.' = await '.$tableNameCamelCase.'
    .query()
    .where(params.field, operator, params.value)
    .getCount()

    if (!'.$tableName.') {
        return response.status(404).json({data: "Resource not found"})
    }
    return response.json('.$tableName.')
  }  

  async store ({request, response}) {
    const '.$tableName.'Info = request.only(['.$code_fields.' ])

    const '.$tableName.' = new '.$tableNameCamelCase.'()
'.$code_controllers_fields.'
    await '.$tableName.'.save()

    return response.status(201).json('.$tableName.')
  }

  async update ({params, request, response}) {
    const '.$tableName.'Info = request.only(['.$code_fields.' ])

    const '.$tableName.' = await '.$tableNameCamelCase.'.find(params.id)
    if (!'.$tableName.') {
      return response.status(404).json({data: "Resource not found"})
    }
'.$code_controllers_fields.'
    await '.$tableName.'.save()

    return response.status(200).json('.$tableName.')
  }

  async destroy ({params, response}) {
    const '.$tableName.' = await '.$tableNameCamelCase.'.find(params.id)
    if (!'.$tableName.') {
      return response.status(404).json({data: "Resource not found"})
    }
    await '.$tableName.'.delete()

    return response.status(204).json(null)
  }

  async deletes ({params, response}) {
    var operator = "="
    if (params.operator == "equal_to") operator = "="
    if (params.operator == "not_equal") operator = "!="        
    if (params.operator == "greater_than") operator = ">"
    if (params.operator == "less_than") operator = "<"
    if (params.operator == "greater_than_or_equal_to") operator = ">="
    if (params.operator == "less_than_or_equal_to") operator = "<="

    const '.$tableName.' = await '.$tableNameCamelCase.'
    .query()
    .where(params.field, operator, params.value)
    .delete()

    if (!'.$tableName.') {
        return response.status(404).json({data: "Resource not found"})
    }
    return response.status(204).json(null)
  }  

  async truncate ({response}) {
    const '.$tableName.' = await '.$tableNameCamelCase.'.truncate()

    return response.status(204).json(null)
  }

}

module.exports = '.$tableNameCamelCase.'Controller
';

			$code_validators_store = '
"use strict"

class Store'.$tableNameCamelCase.' {

  get rules () {
    return {
'.$crud_js_rules.'
    }
  }

  get messages () {
    return {
      required: "{{ field }} is required to register!",
      min:      "{{ field }} is too short!",
      max:      "{{ field }} is too long!",
      unique:   "{{ field }} is used!",
      same :    "Password must match!"
    }
  }


}

module.exports = Store'.$tableNameCamelCase;




			$code_validators_update = '
"use strict"

class Update'.$tableNameCamelCase.' {

  get rules () {
    return {
'.$crud_js_rules.'
    }
  }

  get messages () {
    return {
      required: "{{ field }} is required to register!",
      min:      "{{ field }} is too short!",
      max:      "{{ field }} is too long!",
      unique:   "{{ field }} is used!",
      same :    "Password must match!"
    }
  }

}

module.exports = Update'.$tableNameCamelCase;

			$code_shield = '
"use strict"

module.exports = {
  csp: {
    directives: {
    },
    reportOnly: false,
    setAllHeaders: false,
    disableAndroid: true
  },

  xss: {
    enabled: true,
    enableOnOldIE: false
  },

  xframe: "DENY",

  nosniff: true,

  noopen: true,

  csrf: {
    enable: true,
    methods: ["POST", "PUT", "DELETE"],
    filterUris: [
      "/api/v1/'.$tableName.'",
    ],
    cookieOptions: {
      httpOnly: false,
      sameSite: true,
      path: "/",
      maxAge: 7200
    }
  }
}';


		}

		return array(
			'folder' => $path,
			'folder_1' => $carpeta_1,
			'folder_2' => $carpeta_2,

			'code_make_model' => $code_make_model, 
			'code_make_controller' => $code_make_controller, 
			'code_routes' => $code_routes, 
			'code_models' => $code_models, 
			'code_migrations' => $code_migrations, 
			'code_controllers' => $code_controllers, 
			'code_shield' => $code_shield, 

			'code_validators_store' => $code_validators_store, 
			'code_validators_update' => $code_validators_update, 

			'projectName' => $projectName,
			'versionName' => $versionName,
			'tableName' => $tableName,
			'tableNameCamelCase' => $tableNameCamelCase, 
		);

	}

}