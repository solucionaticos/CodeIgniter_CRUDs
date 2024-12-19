<?php
defined("BASEPATH") OR exit("Direct access to this script is not allowed.");
/**
 * @author: Solucionaticos.com
 * @name: Projects
 * @version: 1.0
 * @date: 2019-08-28 21:10:27 
 * */

class Ci_grocerycrud extends MY_Controller {

    public $proyecto = 0;
    public $version = 0;
    public $tabla = 0;
    public $campo = 0;
    public $crud = 0;

    //-- Construct --------
    public function __construct() {
        parent::__construct();
        // $this->ctrSegAdmin(); // Administrative Security Control
        // $this->load->library("grocery_CRUD"); // GroceryCrud library
        // $this->_prjControl();
        $this->load->helper('file');
    }

    public function index() {

        $projectVersionTitle = $this->admin_design->_projectVersionTitle();
        // $projectVersionTitle = "Nombre del Proyecto seleccionado, si hay uno seleccionado";

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
<link rel="stylesheet" href="'.base_url().'assets/templates/'.$this->config->item('adminPath').'/'.$this->config->item('adminTemplatePath').'/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">';

	        $proyVar = '<script>var proyVar ={"base_url":"http:\/\/localhost:8888\/'.$this->config->item('projectPath').'\/","language":"spanish","lang":"es"};var proyVarS ={"sgctn":"ci_csrf_token","sgch":""};</script>';

			$js = '
<script src="'.base_url().'assets/templates/'.$this->config->item('adminPath').'/'.$this->config->item('adminTemplatePath').'/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="'.base_url().'assets/templates/'.$this->config->item('adminPath').'/'.$this->config->item('adminTemplatePath').'/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
';


            $js .= "
<script type='text/javascript'>
$(document).ready(function() {
    $('#lista').DataTable({
'paging': false,
		'order': [[ 3, 'asc' ]],
		'columnDefs': [ {'targets': 0,'orderable': false}, {'targets': 1,'orderable': false}, {'targets': 2,'orderable': false} ]
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
			url: proyVar.base_url + proyVar.admin_path + '/cruds/ci_grocerycrud/generate_list_ids',	
			cache: false,
			type: 'post',
			data: {'ids':ids},
			success:function(datos) {
				//tksec = datos.tksec;
				location.href = proyVar.base_url + proyVar.admin_path + '/cruds/ci_grocerycrud';
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
		$this->admin_design->_load_layout($this->config->item('adminPath') + '/cruds/ci_grocerycrud/cruds', $data);
    }

    public function crud($id) {

        $projectVersionTitle = $this->admin_design->_projectVersionTitle();

        $js = '
<script language="Javascript" type="text/javascript" src="' . base_url() . 'assets/plugins/edit_area/edit_area_full.js"></script>
<script language="Javascript" type="text/javascript">
$(function () {
    editAreaLoader.init({
      id: "php" // id of the textarea to transform    
      ,start_highlight: true  // if start with highlight
      ,allow_resize: "both"
      ,allow_toggle: true
      ,word_wrap: false
      ,language: "en"
      ,syntax: "sql"  
    });

	setTimeout(function(){ $("#logoAdmin").focus(); }, 3000);
});
</script>';

        $CIGroceryCRUD = $this->_codeCIGroceryCRUD($id);

        $data = array(
            'js' => $js, 
            'projectVersionTitle' => $projectVersionTitle, 
            'folder' => $CIGroceryCRUD['folder'], 
            'file' => ucfirst($CIGroceryCRUD['file']), 
            'code' => $CIGroceryCRUD['code'],
            'projectName' => $CIGroceryCRUD['projectName'],
            'versionName' => $CIGroceryCRUD['versionName'],
            'id' => $id
        );

        $this->admin_design->_load_layout($this->config->item('adminPath') + '/cruds/ci_grocerycrud/crud', $data);

    }

    public function crud_cruds($id) {

        $projectVersionTitle = $this->admin_design->_projectVersionTitle();

        $js = '
<script language="Javascript" type="text/javascript" src="' . base_url() . 'assets/plugins/edit_area/edit_area_full.js"></script>
<script language="Javascript" type="text/javascript">
$(function () {
    editAreaLoader.init({
      id: "php" // id of the textarea to transform    
      ,start_highlight: true  // if start with highlight
      ,allow_resize: "both"
      ,allow_toggle: true
      ,word_wrap: false
      ,language: "en"
      ,syntax: "sql"  
    });

	setTimeout(function(){ $("#logoAdmin").focus(); }, 3000);
});
</script>';

        $CIGroceryCRUD = $this->_codeCIGroceryCRUD($id);

        $data = array(
            'js' => $js, 
            'projectVersionTitle' => $projectVersionTitle, 
            'folder' => $CIGroceryCRUD['folder'], 
            'file' => ucfirst($CIGroceryCRUD['file']), 
            'code' => $CIGroceryCRUD['code'],
            'projectName' => $CIGroceryCRUD['projectName'],
            'versionName' => $CIGroceryCRUD['versionName'],
            'id' => $id
        );

        $this->admin_design->_load_layout($this->config->item('adminPath') + '/cruds/ci_grocerycrud/crud_cruds', $data);

    }

    public function generate($id) {

		$this->_generateCode($id);
		redirect($this->config->item('adminPath') + '/cruds/ci_grocerycrud/crud/' . $id);

    }

    public function generate_cruds($id) {

		$this->_generateCode($id);
		redirect($this->config->item('adminPath') + '/cruds/ci_grocerycrud/crud_cruds/' . $id);

    }

	public function generate_list($id) {

		$this->_generateCode($id);
		redirect($this->config->item('adminPath') + '/cruds/ci_grocerycrud');

    }

	public function generate_list_ids() {
	    $post = $this->input->post();

	    $ids = $post['ids'];
	    $listIds = explode(',', $ids);
	    foreach ($listIds as $id) {
	    	if ($id != '0') $this->_generateCode($id);
	    }
		redirect($this->config->item('adminPath') + '/cruds/ci_grocerycrud');
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

        $CIGroceryCRUD = $this->_codeCIGroceryCRUD($id);

		$path = '';

		$code = $CIGroceryCRUD['code'];
		$project_name = (trim($CIGroceryCRUD['projectName']));
		$version_name = (trim($CIGroceryCRUD['versionName']));
		// $folder = (trim($CIGroceryCRUD['folder']));
		$folder_1 = (trim($CIGroceryCRUD['folder_1']));
		$folder_2 = (trim($CIGroceryCRUD['folder_2']));
		$file = $CIGroceryCRUD['file'];

		$path = 'assets/cruds/ci_grocerycrud/' . $project_name;
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}
		$path .= '/' . $version_name;
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}

		// ---------------------------------------------------------------------------------------------------------		
		// application > controllers
		// ---------------------------------------------------------------------------------------------------------		
		$path .= '/application';
		if (!is_dir($path)) {
			mkdir('./' . $path, 0777, TRUE);
		}
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
		if ( !write_file($pathFile, $code)) {
			echo 'Unable to write the file: ' . $pathFile;
			die();
		} else {
			$data = array(
				'path' => $path,
				'script' => $file,
				'code_controller_ci_grocerycrud' => $code,
				'fecha_generacion' => date('Y-m-d H:i:s')
			);
			$this->Model->update('cruds', $data, $id);
		}

    }


    function _codeCIGroceryCRUD($id) {


		$codigoPHP = '';

        $this->crud = $id;

        // --------------------------------------------------------------
        $nombreCrud = $ambiente = $carpeta_1 = $carpeta_2 = $crudTitulo = $crud_order_by = $crud_where = '';
		$crudNuevo = $crudEditar = $crudVer = $crudBorrar = $crudExportar = $crudImprimir = 0;
        $crud = $this->Model->registro('cruds', $this->crud);

        if ( $crud ) {

            $nombreCrud = $crud->script;
			$script = ucwords($crud->script);
            $this->tabla = $crud->tabla;

			$ambiente = $this->config->item('adminPath') . '/';
			if ($crud->ambiente == 9) {
				$ambiente = 'front/';
			}
		
			$carpeta_1 = $crud->carpeta_1;
			$carpeta_2 = $crud->carpeta_2;
			$crudTitulo = $crud->titulo;

			$crudNuevo = $crud->nuevo;
			$crudEditar = $crud->editar;
			$crudVer = $crud->ver;
			$crudBorrar = $crud->borrar;
			$crudExportar = $crud->exportar;
			$crudImprimir = $crud->imprimir;

		} else {
            $nombreCrud = "CRUD no encontrado";
			$script = 'No encontrado';
            $this->tabla = 0;
			$crudTitulo = 'Sin Titulo';
        }
        // --------------------------------------------------------------
        $nombreTabla= '';
        $tabla = $this->Model->registro('tablas', $this->tabla);
        if ( $tabla ) {
            $nombreTabla = $tabla->nombre;
            $this->proyecto = $tabla->proyecto;
            $this->version = $tabla->version;
        } else {
            $nombreTabla = "Tabla no encontrada";
            $this->proyecto = 0;
            $this->version = 0;
        }
        // --------------------------------------------------------------
        $nombreProyecto= '';
        $proyecto = $this->Model->registro('proyectos', $this->proyecto);
        if ( $proyecto ) {
            $nombreProyecto = $proyecto->nombre;
        } else {
            $nombreProyecto = "Proyecto no encontrado";
        }
        // --------------------------------------------------------------

		// - Ordenamiento ---------------------------------------------
		if ($crud->lista_orden_campo > 0) {
			$lista_orden_direccion = 'asc';
			if ($crud->lista_orden_direccion == 44) {
				$lista_orden_direccion = 'desc';
			}
			$lista_orden_campo = $this->Model->registro('campos', $crud->lista_orden_campo);
			$crud_order_by = '        //-- Ordenamiento --------' . "\n" . '        $crud->order_by("'.$lista_orden_campo->nombre.'", "'.$lista_orden_direccion.'");' . "\n";
		}
		
		// - Filtro ---------------------------------------------
		if ($crud->lista_condicion_campo > 0 and trim($crud->lista_condicion_valor) != '') {
			$lista_condicion_campo = $this->Model->registro('campos', $crud->lista_condicion_campo);
			$crud_where = '        //-- Filtro --------' . "\n" . '        $crud->where("'.$lista_condicion_campo->nombre.'", '.trim($crud->lista_condicion_valor).');' . "\n";
		}
	
		// - Operaciones ---------------------------------------------
		$operaciones = '';
		$operaciones .= ($crudNuevo == 5 ? '        $crud->unset_add();' . "\n" : '');
		$operaciones .= ($crudEditar == 5 ? '        $crud->unset_edit();' . "\n" : '');
		$operaciones .= ($crudVer == 5 ? '        $crud->unset_read();' . "\n" : '');
		$operaciones .= ($crudBorrar == 5 ? '        $crud->unset_delete();' . "\n" : '');
		$operaciones .= ($crudExportar == 5 ? '        $crud->unset_export();' . "\n" : '');
		$operaciones .= ($crudImprimir == 5 ? '        $crud->unset_print();' . "\n" : '');
		$operaciones = ($operaciones != '' ? '        //-- Operaciones --------' . "\n" . $operaciones : '');

		// - Campos ---------------------------------------------
		$crud_unique_fields = $crud_columns = $crud_add_fields = $crud_edit_fields = $crud_display_as = $crud_set_field_upload = $crud_set_relation = $crud_set_relation_n_n = $crud_field_type = $crud_set_rules = '';

		if ($this->proyecto > 0 and $this->tabla > 0) {
			$regCampos = $this->Model->registros('campos', '', 
			array('usuario'=>1, 
				'proyecto'=>$this->proyecto, 
				'version'=>$this->version, 
				'tabla'=>$this->tabla), 
				'orden ASC');
			if ( count($regCampos) ) {
				foreach ($regCampos as $regCampo) {
					// - Detalles del CRUD ---------------------------------------------
					$regCrudDetalle = $this->Model->registros('cruds_detalles', '',
					array('usuario'=>1, 
						 'proyecto'=>$this->proyecto, 
						 'version'=>$this->version, 
						 'crud'=>$this->crud, 
						 'tabla'=>$this->tabla, 
						 'campo'=> $regCampo['id']));
					if (count($regCrudDetalle)) {
						if ($regCampo['nombre'] != 'id') {
							// - Campos de la Lista ---------------------------------------------
							if ($regCrudDetalle[0]['lista'] == 4) {
								$crud_columns .= '"' . $regCampo['nombre'] . '",';
							}
							// - Campos del formulario Nuevo ---------------------------------------------
							if ($regCrudDetalle[0]['nuevo'] == 4) {
								$crud_add_fields .= '"' . $regCampo['nombre'] . '",'; 
							}
							// - Campos del formulario Editar ---------------------------------------------
							if ($regCrudDetalle[0]['editar'] == 4) {
								$crud_edit_fields .= '"' . $regCampo['nombre'] . '",'; 
							}
						}
					}

					// - Etiquetas de los campos ---------------------------------------------
					$crud_display_as .= '        $crud->display_as("' . $regCampo['nombre'] . '","' . $regCampo['etiqueta'] . '");' . "\n";

					// - Validaciones de los campos ---------------------------------------------
					$regCampoValidaciones = $this->Model->registros('campos_validaciones', '', 
					array('usuario'=>1, 
						'proyecto'=>$this->proyecto, 
						'version'=>$this->version,
						'tabla'=>$this->tabla, 
						'campo'=> $regCampo['id'])); 
					if ( count($regCampoValidaciones) ) {
						foreach ($regCampoValidaciones as $regCampoValidacion) {
							if ($regCampoValidacion['validacion'] > 0) {
								$validacion = $this->Model->registro('datos_valores', $regCampoValidacion['validacion']);
								$parametro = '';
								if ( trim($regCampoValidacion['parametro']) != '' ) {
									$parametro = '['.trim($regCampoValidacion['parametro']).']';
								}
								$crud_set_rules .= '        $crud->set_rules("'. $regCampo['nombre'] . '","' . $regCampo['etiqueta'] . '","' . $validacion->auxiliar_1 . $parametro . '");' . "\n";
							}
						}
					}

/*
$regCampoValidacion['validacion']
$regCampoValidacion['parametro']
  
12->Requerido
13->Tamaño Mínimo
14->Tamaño Máximo
15->Valor Mínimo
16->Valor Máximo
17->Correo
18->URL
20->Número
21->Igual a...
*/
/*

-- Validaciones - Inicio ---------------------------- >>>>
php
-----------------------
$crud->set_rules('lista','Lista','required');        
$crud->set_rules('buyPrice','buy Price','numeric');
$crud->set_rules('quantityInStock','Quantity In Stock','integer');
$crud->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
$crud->set_rules('correo', 'Correo', 'required|valid_email|is_unique[usuarios.correo]');    
$crud->set_rules('username', 'Username', array('required', 'min_length[5]'));
$crud->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
$crud->set_rules('password', 'Password', 'trim|required|min_length[8]');
$crud->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
$crud->set_rules('email', 'Email', 'trim|required|valid_email');

php
-----------------------
required
matches[form_item]
---is_unique[table.field] -> para esto es el campo de campos.unico
min_length[3]
max_length[12]
less_than[8]
greater_than[8]
numeric
valid_url
valid_email

js
-----------------------
required
equalTo
---
minlength
maxlength
min
max
number
url
email



Rule	Parameter	Description	Example
required	No	Returns FALSE if the form element is empty.	 
matches	Yes	Returns FALSE if the form element does not match the one in the parameter.	matches[form_item]
min_length	Yes	Returns FALSE if the form element is shorter then the parameter value.	min_length[6]
max_length	Yes	Returns FALSE if the form element is longer then the parameter value.	max_length[12]
exact_length	Yes	Returns FALSE if the form element is not exactly the parameter value.	exact_length[8]
alpha	No	Returns FALSE if the form element contains anything other than alphabetical characters.	 
alpha_numeric	No	Returns FALSE if the form element contains anything other than alpha-numeric characters.	 
alpha_dash	No	Returns FALSE if the form element contains anything other than alpha-numeric characters, underscores or dashes.	 
numeric	No	Returns FALSE if the form element contains anything other than numeric characters.	 
integer	No	Returns FALSE if the form element contains anything other than an integer.	 
valid_email	No	Returns FALSE if the form element does not contain a valid email address.	 
valid_emails	No	Returns FALSE if any value provided in a comma separated list is not a valid email.	 
valid_ip	No	Returns FALSE if the supplied IP is not valid.	 
valid_base64	No	Returns FALSE if the supplied string contains anything other than valid Base64 characters.


-- Validaciones - Fin ---------------------------- <<<<<<
*/	

					// - Carga de archivos ---------------------------------------------
					if ($regCampo['archivo'] == 4) {
						$crud_set_field_upload .= '        $crud->set_field_upload("'. $regCampo['nombre'] .'","'. $regCampo['archivo_ruta'] .'");' . "\n";
					}

					// - Tipos de campos ---------------------------------------------
					if ($regCampo['tipo_entrada'] > 0) {
						$tipo_entrada_parametro = '';
						if (trim($regCampo['tipo_entrada_parametro']) != '') {
							$tipo_entrada_parametro = ', ' . trim($regCampo['tipo_entrada_parametro']);
						}
						$tipo_entrada = $this->Model->registro('datos_valores', $regCampo['tipo_entrada']);

						if ($regCampo['relacion_datos'] == 0 and $regCampo['relacion_tabla'] == 0 and $regCampo['relacion_campo'] == 0) {
							$crud_field_type .= '        $crud->field_type("'.$regCampo['nombre'].'", "'.$tipo_entrada->nombre.'"'.$tipo_entrada_parametro.');' . "\n";
						}

					}

					// - Relaciones 1-N de los campos ---------------------------------------------
					if ($regCampo['relacion_datos'] > 0) {
						$relacion_codigo = $this->Model->registro('datos', $regCampo['relacion_datos']);
						$crud_set_relation .= '        $crud->set_relation("'.$regCampo['nombre'].'", "datos_valores","nombre", "dato = (SELECT id FROM " . "datos WHERE codigo = \''.$relacion_codigo->codigo.'\')", "orden ASC, nombre ASC");' . "\n";
					} elseif ($regCampo['relacion_tabla'] > 0 and $regCampo['relacion_campo'] > 0) {
						$relacion_tabla = $this->Model->registro('tablas', $regCampo['relacion_tabla']);
						// $relacion_campo = $this->Model->registro('campos', $regCampo['relacion_campo']);
						$relacion_campo = $this->Model->registro('campos', $regCampo['relacion_nombre']);

						if (trim($regCampo['relacion_condicion']) == '' and trim($regCampo['relacion_orden']) == '') {
							$crud_set_relation .= '        $crud->set_relation("'.$regCampo['nombre'].'", "'.$relacion_tabla->nombre.'","'.$relacion_campo->nombre.'");' . "\n";
						} else {
							if (trim($regCampo['relacion_condicion']) != '' and trim($regCampo['relacion_orden']) == '') {
								if (substr_count(trim($regCampo['relacion_condicion']),'array') > 0) {
									$crud_set_relation .= '        $crud->set_relation("'.$regCampo['nombre'].'", "'.$relacion_tabla->nombre.'","'.$relacion_campo->nombre.'",'.trim($regCampo['relacion_condicion']).');' . "\n";
								} else {
									$crud_set_relation .= '        $crud->set_relation("'.$regCampo['nombre'].'", "'.$relacion_tabla->nombre.'","'.$relacion_campo->nombre.'","'.trim($regCampo['relacion_condicion']).'");' . "\n";
								}
							} else {
								if (trim($regCampo['relacion_orden']) != '') {
									if (substr_count(trim($regCampo['relacion_condicion']),'array') > 0) {
										$crud_set_relation .= '        $crud->set_relation("'.$regCampo['nombre'].'", "'.$relacion_tabla->nombre.'","'.$relacion_campo->nombre.'",'.trim($regCampo['relacion_condicion']).',"'.trim($regCampo['relacion_orden']).'");' . "\n";
									} else {
										$crud_set_relation .= '        $crud->set_relation("'.$regCampo['nombre'].'", "'.$relacion_tabla->nombre.'","'.$relacion_campo->nombre.'","'.trim($regCampo['relacion_condicion']).'","'.trim($regCampo['relacion_orden']).'");' . "\n";
									} 
								}
							}
						}
					}

					// - Relaciones N-M de la tabla ---------------------------------------------
					if (trim($regCampo['relacion_etiqueta_nm']) != '' 
							and $regCampo['relacion_tabla_n'] > 0
							and $regCampo['relacion_campo_n'] > 0
							and $regCampo['relacion_tabla_m'] > 0
							and $regCampo['relacion_campo_m_tabla_a'] > 0
							and $regCampo['relacion_campo_m_tabla_b'] > 0) {

						$relacion_tabla_n = $this->Model->registro('tablas', $regCampo['relacion_tabla_n']);
						$relacion_campo_n = $this->Model->registro('campos', $regCampo['relacion_campo_n']);								
						$relacion_tabla_m = $this->Model->registro('tablas', $regCampo['relacion_tabla_m']);
						$relacion_campo_m_tabla_a = $this->Model->registro('campos', $regCampo['relacion_campo_m_tabla_a']);								
						$relacion_campo_m_tabla_b = $this->Model->registro('campos', $regCampo['relacion_campo_m_tabla_b']);								
						
						$relacion_campo_m_prioridad = '';
						if ($regCampo['relacion_campo_m_prioridad'] > 0) {
							$relacion_campo_m_prioridad = $this->Model->registro('campos', $regCampo['relacion_campo_m_prioridad']);
							$relacion_campo_m_prioridad = ', "'.$relacion_campo_m_prioridad->nombre.'"';
						}
						
						$relacion_campo_nm_condicion = '';
						if (trim($regCampo['relacion_campo_nm_condicion']) != '') {
							$relacion_campo_nm_condicion = ', "'.trim($regCampo['relacion_campo_nm_condicion']).'"';
							if ($relacion_campo_m_prioridad == '') $relacion_campo_nm_condicion = ', ""' . $relacion_campo_nm_condicion;
						}

						$crud_set_relation_n_n = '        $crud->set_relation_n_n("'.trim($regCampo['relacion_etiqueta_nm']).'", "'.$relacion_tabla_m->nombre.'", "'.$relacion_tabla_n->nombre.'", "'.$relacion_campo_m_tabla_a->nombre.'", "'.$relacion_campo_m_tabla_b->nombre.'", "'.$relacion_campo_n->nombre.'" ' . $relacion_campo_m_prioridad . $relacion_campo_nm_condicion . ');' . "\n";

						$crud_columns .= '"' . trim($regCampo['relacion_etiqueta_nm']) . '",';
						$crud_add_fields .= '"' . trim($regCampo['relacion_etiqueta_nm']) . '",'; 
						$crud_edit_fields .= '"' . trim($regCampo['relacion_etiqueta_nm']) . '",'; 								
						
					}

					// - Campos unicos ---------------------------------------------
					if ($regCampo['unico'] == 4) {
						$crud_unique_fields .= '"' . $regCampo['nombre'] . '",';
					}
					
				} // fin foreach
			}
		}


		if ($crud_columns != '') { 
			$crud_columns = substr($crud_columns, 0, -1);
			$crud_columns = '        //-- Lista --------' . "\n        " . '$crud->columns('.$crud_columns.');' . "\n";
		}
		if ($crud_add_fields != '') {
			$crud_add_fields = substr($crud_add_fields, 0, -1);
			$crud_add_fields = '        //-- Nuevo --------' . "\n        " . '$crud->add_fields('.$crud_add_fields.');' . "\n";
		}
		if ($crud_edit_fields != '') {
			$crud_edit_fields = substr($crud_edit_fields, 0, -1);
			$crud_edit_fields = '        //-- Editar --------' . "\n        " . '$crud->edit_fields('.$crud_edit_fields.');' . "\n";
		}
		if ($crud_display_as != '') {
			$crud_display_as = '        //-- Etiquetas --------' . "\n" . $crud_display_as;
		}
		if ($crud_set_rules != '') {
			$crud_set_rules = '        //-- Validaciones --------' . "\n" . $crud_set_rules;
		}
		if ($crud_set_field_upload != '') {
			$crud_set_field_upload = '        //-- Subir Archivo --------' . "\n" . $crud_set_field_upload;
		}
		if ($crud_field_type != '') {
			$crud_field_type = '        //-- Tipos de Campos --------' . "\n" . $crud_field_type;
		}
		if ($crud_set_relation != '') {
			$crud_set_relation = '        //-- Relaciones 1-N --------' . "\n" . $crud_set_relation;
		}
		if ($crud_set_relation_n_n != '') {
			$crud_set_relation_n_n = '        //-- Relaciones N-M --------' . "\n" . $crud_set_relation_n_n;
		}
		if ($crud_unique_fields != '') {
			$crud_unique_fields = substr($crud_unique_fields, 0, -1);
			$crud_unique_fields = '        //-- Campo Unico --------' . "\n        " . '$crud->unique_fields(array('.$crud_unique_fields.'));' . "\n";
		}

//$tabla->antes_insertar
//	$crud->field_type('fecha_prueba', 'hidden'); -> este campo debe estar en $crud->add_fields
		// y se debe poner esta instruccion antes de $crudTabla = $crud->render(); // Render del Crud
//public function subcategorias_before_insert ($post) {
//	$post['fecha_prueba'] = $this->config->item('YmdHis');

			
        $codigoPHP = '<?php
defined("BASEPATH") OR exit("No direct script access allowed");
/**
 * @autor: Solucionaticos.com
 * @nombre: '.$script.'
 * @version: 1.0
 * @fecha: '.$this->config->item('YmdHis').' 
 * */

class '.ucfirst($nombreTabla).' extends MY_Controller {

    //-- Constructor --------
    public function __construct() {
        parent::__construct();
        // $this->ctrSegAdmin(); // Control de Seguridad Administrativa
        $this->load->library("grocery_CRUD"); // Carga de la libreria GroceryCrud
    }

    //-- Metodo Principal --------
    public function index() {
        $crud = new grocery_CRUD(); // Definicion del CRUD
        $crud->set_table("'.$nombreTabla.'"); // Tabla del Crud
'.$crud_order_by.$crud_where.$operaciones.$crud_columns.$crud_add_fields.$crud_edit_fields.$crud_display_as.$crud_set_rules.$crud_set_field_upload.$crud_field_type.$crud_set_relation.$crud_set_relation_n_n.$crud_unique_fields.'
        //-- Metodos (Antes de...)
        $crud->callback_before_insert(array($this, "'.$nombreTabla.'_before_insert"));
        $crud->callback_before_update(array($this, "'.$nombreTabla.'_before_update"));
        $crud->callback_before_delete(array($this, "'.$nombreTabla.'_before_delete"));

        //-- Metodos (Despues de...) 
        $crud->callback_after_insert(array($this, "'.$nombreTabla.'_after_insert"));
        $crud->callback_after_update(array($this, "'.$nombreTabla.'_after_update"));
        $crud->callback_after_delete(array($this, "'.$nombreTabla.'_after_delete"));

        $crudTabla = $crud->render(); // Render del Crud
        $this->admin_design->crudShow($crudTabla, "'.ucfirst($crudTitulo).'"); // Presentacion del Crud
    }

    //-- Antes de Insertar --------
    public function '.$nombreTabla.'_before_insert ($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }
'.$tabla->antes_insertar.'

        return $post;
    }   
    
    //-- Antes de Actualizar --------
    public function '.$nombreTabla.'_before_update ($post, $id) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }
'.$tabla->antes_actualizar.'

        return $post;
    }

    //-- Antes de Eliminar --------
    public function '.$nombreTabla.'_before_delete($id) {
        $error = false;
        if ($error) {
            return false;
        }
'.$tabla->antes_eliminar.'

        return true;
    }

    //-- Despues de Insertar --------
    public function '.$nombreTabla.'_after_insert($post,$id) {
'.$tabla->despues_insertar.'

        return true;
    }

    //-- Despues de Actualizar --------
    public function '.$nombreTabla.'_after_update($post,$id) {
'.$tabla->despues_actualizar.'

        return true;
    }

    //-- Despues de Eliminar --------
    public function '.$nombreTabla.'_after_delete($id) {
'.$tabla->despues_eliminar.'

        return true;
    }

}
';

		$projectRow = $this->Model->getRow('proyectos', $crud->proyecto);
		$versionRow = $this->Model->getRow('versiones', $crud->version);
		$projectName = $projectRow->nombre;
		$versionName = $versionRow->nombre;

		$carpetas = $carpeta_1;
		if ($carpeta_2 != '') $carpetas .= '/' . $carpeta_2;

		return array(
			'folder' => $carpetas,
			'folder_1' => $carpeta_1,
			'folder_2' => $carpeta_2,
			'file' =>  strtolower($script),
			'code' => $codigoPHP,
			'projectName' => $projectName,
			'versionName' => $versionName,
		);

    }

}