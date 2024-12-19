<?php
defined("BASEPATH") OR exit("Direct access to this script is not allowed.");
/**
 * @author: Solucionaticos.com
 * @name: Cruds
 * @version: 1.0
 * @date: 2019-08-28 21:10:27 
 * */

class Cruds extends MY_Controller {

    public $proyecto = 0;
    public $version = 0;
    public $tabla = 0;
    public $campo = 0;
    public $crud = 0;

    //-- Construct --------
    public function __construct() {
        parent::__construct();
        //$this->ctrSegAdmin(); // Administrative Security Control
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

/*
		$cruds = $this->Model->getRowsJoin(
			'cruds c', 
			'c.id, c.script, c.carpeta_1, c.carpeta_2, GROUP_CONCAT(cp.nombre) fields, c.path, c.fecha_generacion, c.tabla, t.nombre tabla_nombre',  
			array(
				'cruds_detalles cd' => array('cd.crud = c.id',''),
				'campos cp' => array('cd.campo = cp.id',''),
				'tablas t' => array('cd.tabla = t.id',''),
			), 
			array('c.proyecto' => $project, 'c.version' => $version), 'c.id ASC', 'c.id');
*/

		$cruds = $this->Model->getRowsJoin(
			'tablas t', 
			't.id, t.nombre, GROUP_CONCAT(c.nombre) fields',  
			array(
				'campos c' => array('c.tabla = t.id','')
			), 
			array('t.proyecto' => $project, 't.version' => $version), 't.nombre', 't.id');

        $css = '';
        $js = '';
        if ($projectVersionTitle != 'None') {

//			$css = '
//<link rel="stylesheet" href="'.base_url().'assets/templates/'.$this->config->item('adminPath').'/'.$this->config->item('adminTemplatePath').'/plugins/datatables/dataTables.bootstrap.css">';

// 			$css = '
// <link rel="stylesheet" href="'.base_url().'assets/templates/'.$this->config->item('adminPath').'/'.$this->config->item('adminTemplatePath').'/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">';

$css = '
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">';



			$proyVar = array(
				'base_url' => base_url(),
				'admin_path' => $this->config->item('adminPath'),
				'language' =>  $this->session->userdata('be_lang_value'),
				'lang' =>  $this->session->userdata('be_lang_code'),
			);

	        $proyVar = '<script>var proyVar =' . json_encode($proyVar) . ';var proyVarS ={"sgctn":"ci_csrf_token","sgch":""};</script>';

//            $js = '
//<script src="'.base_url().'assets/templates/'.$this->config->item('adminPath').'/'.$this->config->item('adminTemplatePath').'/plugins/datatables/jquery.dataTables.min.js"></script>
//<script src="'.base_url().'assets/templates/'.$this->config->item('adminPath').'/'.$this->config->item('adminTemplatePath').'/plugins/datatables/dataTables.bootstrap.min.js"></script>';

// 			$js = '
// <script src="'.base_url().'assets/templates/'.$this->config->item('adminPath').'/'.$this->config->item('adminTemplatePath').'/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
// <script src="'.base_url().'assets/templates/'.$this->config->item('adminPath').'/'.$this->config->item('adminTemplatePath').'/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
// ';

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
		'columnDefs': [ {'targets': 0,'orderable': false}, {'targets': 1,'orderable': false}, {'targets': 2,'orderable': false}, {'targets': 4,'orderable': false} ]
    });

	$('.selectAll').change(function () {
		if ( $(this).prop('checked') ) {
			$('.selectAll').prop('checked', true);
			$('.selectRow').each(function() {
				$(this).prop('checked', true);
			});
		} else {
			$('.selectAll').prop('checked', false);
			$('.selectRow').each(function() {
				$(this).prop('checked', false);
			});
		}
	});

	$('#generateSelectRows').click(function () {

		var typeGeneration = $('#typeGeneration').val();
		if (typeGeneration != '0') {

			var script = '';
			if (typeGeneration == '1') script = 'ci_grocerycrud';
			if (typeGeneration == '2') script = 'ci_datatables';
			if (typeGeneration == '3') script = 'ci_datatables_ssp';
			if (typeGeneration == '4') script = 'apis_nodejs';
			if (typeGeneration == '5') script = 'apis_nodejs_express';
			if (typeGeneration == '6') script = 'ci_datatables_ssp_2';

			var ids = '';
			$('.selectRow').each(function() {
			    if ( $(this).prop('checked') ) {
			    	ids += $(this).val() + ',';
			    }
			});
			ids += '0';
			$.ajax({
				url: proyVar.base_url + proyVar.admin_path + '/cruds/' + script + '/generate_list_ids_cruds',	
				cache: false,
				type: 'post',
				data: {'ids':ids},
				success:function(datos) {
					location.href = proyVar.base_url + proyVar.admin_path + '/cruds/cruds';
				}
			});
		}



	});

	$('.command').change(function () {
		var command = $(this).val();
		var crud_id = $(this).attr('crud_id');
		var typeGeneration = $('#crud_'+crud_id).val();
		console.log('ID: ', crud_id, 'Command:', command, 'Crud:', typeGeneration);

		if (typeGeneration != '0') {

			if (command == '1') {
				var script = '';
				if (typeGeneration == '1') script = 'ci_grocerycrud';
				if (typeGeneration == '2') script = 'ci_datatables';
				if (typeGeneration == '3') script = 'ci_datatables_ssp';
				if (typeGeneration == '4') script = 'apis_nodejs';
				if (typeGeneration == '5') script = 'apis_nodejs_express';
				if (typeGeneration == '6') script = 'ci_datatables_ssp_2';
				location.href = proyVar.base_url + proyVar.admin_path + '/cruds/' + script + '/crud_cruds/' + crud_id;
			}

			if (command == '2') {
				var script = '';
				if (typeGeneration == '1') script = 'ci_grocerycrud';
				if (typeGeneration == '2') script = 'ci_datatables';
				if (typeGeneration == '3') script = 'ci_datatables_ssp';
				if (typeGeneration == '4') script = 'apis_nodejs';
				if (typeGeneration == '5') script = 'apis_nodejs_express';
				if (typeGeneration == '6') script = 'ci_datatables_ssp_2';
				var ids = '';
				ids = crud_id;
				$.ajax({
					url: proyVar.base_url + proyVar.admin_path + '/cruds/' + script + '/generate_list_ids_cruds',	
					cache: false,
					type: 'post',
					data: {'ids':ids},
					success:function(datos) {
						location.href = proyVar.base_url + proyVar.admin_path + '/cruds/cruds';
					}
				});

			}

		}

	})

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
		$this->admin_design->_load_layout($this->config->item('adminPath') . '/cruds/cruds', $data);
    }
}