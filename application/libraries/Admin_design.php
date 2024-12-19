<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_design {

	public function vars() {
		$CI =& get_instance();

		$data = array(
			'path_template_admin' => base_url() . $CI->config->item('pathAssetsTemplateAdmin'),
			'path_template_front' => base_url() . $CI->config->item('pathAssetsTemplateFront'),
			'version' => $CI->config->item('version'),
			'Y' => $CI->config->item('Y'),
			'projectUrl' => $CI->config->item('projectUrl'),
			'projectName' => $CI->config->item('projectName')
		);

		return $data;
	}

	public function htmls($data) {
		$CI =& get_instance();

		$footer = $CI->parser->parse($CI->config->item('pathViewTemplateAdmin') . 'layout/htmlFooter', $data, true);
		$menuMain = $CI->parser->parse($CI->config->item('pathViewTemplateAdmin') . 'layout/htmlMenuMain', $data, true);
		$menuTop = $CI->parser->parse($CI->config->item('pathViewTemplateAdmin') . 'layout/htmlMenuTop', $data, true);
		$navMessages = $CI->parser->parse($CI->config->item('pathViewTemplateAdmin') . 'layout/htmlNavMessages', $data, true);
		$navNotifications = $CI->parser->parse($CI->config->item('pathViewTemplateAdmin') . 'layout/htmlNavNotifications', $data, true);
		$navTasks = $CI->parser->parse($CI->config->item('pathViewTemplateAdmin') . 'layout/htmlNavTasks', $data, true);
		$searchForm = $CI->parser->parse($CI->config->item('pathViewTemplateAdmin') . 'layout/htmlSearchForm', $data, true);

		$data = array(
			'footer' => $footer,
			'menuMain' => $menuMain,
			'menuTop' => $menuTop,
			'navMessages' => $navMessages,
			'navNotifications' => $navNotifications,
			'navTasks' => $navTasks,
			'searchForm' => $searchForm
		);

		return $data;
	}

    public function layout($type, $path, $data, $title = '', $breadCrumbs = '', $tabs = '', $state = '', $code = 0, $html = '', $menu = '') {
		$CI =& get_instance();

		$path_template_admin = base_url() . $CI->config->item('pathAssetsTemplateAdmin');

		$data_design = $CI->admin_design->vars();

		$CrudData['head_title'] = $title;

		$headData['version'] = $CI->config->item('version');
		$headData['Y'] = $CI->config->item('Y');
		$headData['projectUrl'] = $CI->config->item('projectUrl');
		$headData['projectName'] = $CI->config->item('projectName');

		$htmls = $CI->admin_design->htmls($headData);

		$headData['menuMain'] = $htmls['menuMain'];
		$headData['menuTop'] = $htmls['menuTop'];
		$headData['navMessages'] = $htmls['navMessages'];
		$headData['navNotifications'] = $htmls['navNotifications'];
		$headData['navTasks'] = $htmls['navTasks'];
		$headData['searchForm'] = $htmls['searchForm'];

// ----------------------------------------------------------------------------------------------------------------

        $headData['head_title'] = $title;
        $headData['path_template_admin'] = $path_template_admin;
        $headData['breadCrumbs'] = $breadCrumbs;
        $headData['menu'] = $menu;

		$css = '';
		$css_default = 'assets/css/' . $path . '/view.css';
		if (file_exists($css_default)) {
		    $css = "\n" . '  <link rel="stylesheet" href="' . base_url() . $css_default . '?v=' . $CI->config->item('version') . '">';
		}
        $headData['css'] = $css;

		$script = '';
		$script_default = 'assets/js/' . $path . '/view.js';
		if (file_exists($script_default)) {
		    $script = '<script src="' . base_url() . $script_default . '?v=' . $CI->config->item('version') . '"></script>';
		}
        $footData['script'] = $script;

        $footData['path_template_admin'] = $path_template_admin;
		$footData['footer'] = $htmls['footer'];
		$proyVar = array(
			'base_url' => base_url(),
			'admin_path' => $CI->config->item('adminPath'),
			'language' =>  $CI->session->userdata('be_lang_value'),
			'lang' =>  $CI->session->userdata('be_lang_code'),
		);
		$footData['proyVar'] = '<script>var proyVar =' . json_encode($proyVar) . ';var proyVarS ={"sgctn":"'.$CI->security->get_csrf_token_name().'","sgch":"'.$CI->security->get_csrf_hash().'"};</script>';
		$footData['txtVar'] = '<script>var txtVar =' .  json_encode($CI->lang->language) . ';</script>';

        $CrudData['title'] = $title;
        $CrudData['tabs'] = $tabs;
        $CrudData['state'] = $state;
        $CrudData['code'] = $code;
        $CrudData['html'] = $html;
        $CrudData['data'] = $data;

        $CI->parser->parse($CI->config->item('pathViewTemplateAdmin') . 'layout/'.$type.'Head', $headData);
        $CI->parser->parse($path, $CrudData);
        $CI->parser->parse($CI->config->item('pathViewTemplateAdmin') . 'layout/'.$type.'Footer', $footData);

    }



    public function layout2($data) {
		$CI =& get_instance();
// ----------------------------------------------------------------------------------------------------------------
		$path = (isset($data['path'])) ? $data['path'] : '';
		$path_template_admin = base_url() . $CI->config->item('pathAssetsTemplateAdmin');
// ----------------------------------------------------------------------------------------------------------------
		$template = (isset($data['template'])) ? $data['template'] : '';
		$type = (isset($data['type'])) ? $data['type'] : '';
// ----------------------------------------------------------------------------------------------------------------
		switch ($template) {
			case 'ssp':
				$head_files = '
<!-- Ionicons -->
<link rel="stylesheet" href="'.$path_template_admin.'bower_components/Ionicons/css/ionicons.min.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="'.$path_template_admin.'plugins/datepicker/datepicker3.css">
<!-- Theme style -->
<link rel="stylesheet" href="'.$path_template_admin.'dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="'.$path_template_admin.'dist/css/skins/skin-blue.min.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<!-- dataTables -->
<link rel="stylesheet" type="text/css" href="'.$path_template_admin.'plugins/ssp/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="'.$path_template_admin.'plugins/ssp/resources/syntax/shCore.css">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="'.$path_template_admin.'bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="'.$path_template_admin.'bower_components/font-awesome/css/font-awesome.min.css">

<!-- Global SSP -->
<link rel="stylesheet" href="' . base_url() . 'assets/css/' . $CI->config->item('adminPath') . '/global_ssp.css?v=' . $CI->config->item('version') . '">
';

				$footer_files = '
<!-- jQuery -->		
<script type="text/javascript" language="javascript" src="'.$path_template_admin.'plugins/ssp/media/js/jquery.js"></script>
<!-- dataTables -->		
<script type="text/javascript" language="javascript" src="'.$path_template_admin.'plugins/ssp/media/js/jquery.dataTables.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="'.$path_template_admin.'bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="'.$path_template_admin.'plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- sweetalert2 -->
<script src="'.$path_template_admin.'plugins/sweetalert2/sweetalert2.all.js"></script>
<!-- SlimScroll -->
<script src="'.$path_template_admin.'bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="'.$path_template_admin.'bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="'.$path_template_admin.'dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="'.$path_template_admin.'dist/js/demo.js"></script>
<!-- jQuery Validation Plugin -->
<script src="'.$path_template_admin.'plugins/jquery-validation/jquery.validate.min.js"></script>
<!-- dataTables -->
<script type="text/javascript" language="javascript" src="'.$path_template_admin.'plugins/ssp/resources/syntax/shCore.js"></script>';
				break;

			case 'form':
				$head_files = '
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="'.$path_template_admin.'bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="'.$path_template_admin.'bower_components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="'.$path_template_admin.'bower_components/Ionicons/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="'.$path_template_admin.'dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="'.$path_template_admin.'dist/css/skins/_all-skins.min.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<!-- bootstrap datepicker -->
<link rel="stylesheet" href="'.$path_template_admin.'plugins/datepicker/datepicker3.css">';


				$footer_files = '
<!-- jQuery 3 -->
<script src="'.$path_template_admin.'bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="'.$path_template_admin.'bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="'.$path_template_admin.'bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="'.$path_template_admin.'dist/js/adminlte.min.js"></script>
<!-- sweetalert2 -->
<script src="'.$path_template_admin.'plugins/sweetalert2/sweetalert2.all.js"></script>
<!-- jQuery Validation Plugin -->
<script src="'.$path_template_admin.'plugins/jquery-validation/jquery.validate.min.js"></script>

<!-- bootstrap datepicker -->
<script src="'.$path_template_admin.'plugins/datepicker/bootstrap-datepicker.js"></script>

';
				break;
			
			default:
				$head_files = '';
				$footer_files = '';
				break;
		}		
// ----------------------------------------------------------------------------------------------------------------
		$data_design = $CI->admin_design->vars();
// ----------------------------------------------------------------------------------------------------------------
		$headData['path_template_admin'] = $path_template_admin;

		$headData['version'] = $CI->config->item('version');
		$headData['Y'] = $CI->config->item('Y');
		$headData['projectUrl'] = $CI->config->item('projectUrl');
		$headData['projectName'] = $CI->config->item('projectName');
// ----------------------------------------------------------------------------------------------------------------
		$htmls = $CI->admin_design->htmls($headData);
// ----------------------------------------------------------------------------------------------------------------
		$headData['menuMain'] = $htmls['menuMain'];
		$headData['menuTop'] = $htmls['menuTop'];
		$headData['navMessages'] = $htmls['navMessages'];
		$headData['navNotifications'] = $htmls['navNotifications'];
		$headData['navTasks'] = $htmls['navTasks'];
		$headData['searchForm'] = $htmls['searchForm'];
// ----------------------------------------------------------------------------------------------------------------
        $headData['head_title'] = $data['head_title'];
        $headData['menu'] = (isset($data['menu'])) ? $data['menu'] : '';
		$headData['head_files'] = $head_files;
// ----------------------------------------------------------------------------------------------------------------
		$css = '';
		$css_default = 'assets/css/' . $path . '/'.$type.'.css';
		if (file_exists($css_default)) {
		    $css = "\n" . '  <link rel="stylesheet" href="' . base_url() . $css_default . '?v=' . $CI->config->item('version') . '">';
		}
        $headData['css'] = $css;
// ----------------------------------------------------------------------------------------------------------------
		$script = '';
		$script_default = 'assets/js/' . $path . '/'.$type.'.js';
		if (file_exists($script_default)) {
		    $script = '<script src="' . base_url() . $script_default . '?v=' . $CI->config->item('version') . '"></script>';
		}
        $footerData['script'] = $script;
// ----------------------------------------------------------------------------------------------------------------
        $footerData['path_template_admin'] = $path_template_admin;
		$footerData['footer'] = $htmls['footer'];
		$proyVar = array(
			'base_url' => base_url(),
			'admin_path' => $CI->config->item('adminPath'),
			'language' =>  $CI->session->userdata('be_lang_value'),
			'lang' =>  $CI->session->userdata('be_lang_code'),
		);
		$footerData['proyVar'] = '<script>var proyVar =' . json_encode($proyVar) . ';var proyVarS ={"sgctn":"'.$CI->security->get_csrf_token_name().'","sgch":"'.$CI->security->get_csrf_hash().'"};</script>';
		$footerData['txtVar'] = '<script>var txtVar =' .  json_encode($CI->lang->language) . ';</script>';
		$footerData['footer_files'] = $footer_files;
// ----------------------------------------------------------------------------------------------------------------
        $bodyData['title'] = (isset($data['title'])) ? $data['title'] : '';
        $bodyData['subtitle'] = (isset($data['subtitle'])) ? $data['subtitle'] : '';
        $bodyData['breadcrumb'] = (isset($data['breadcrumb'])) ? $data['breadcrumb'] : '';
        $bodyData['tabs'] = (isset($data['tabs'])) ? $data['tabs'] : '';
        $bodyData['state'] = (isset($data['state'])) ? $data['state'] : '';
        $bodyData['code'] = (isset($data['code'])) ? $data['code'] : '';
        $bodyData['html'] = (isset($data['html'])) ? $data['html'] : '';
        $bodyData['data'] = (isset($data['data'])) ? $data['data'] : '';
        $bodyData['base_url'] = base_url();
// ----------------------------------------------------------------------------------------------------------------
		//$template = (isset($data['template'])) ? $data['template'] : '';
// ----------------------------------------------------------------------------------------------------------------
        $CI->parser->parse($CI->config->item('pathViewTemplateAdmin') . 'layout/templateHead', $headData);
        $CI->parser->parse($path . '/' . $type, $bodyData);
        $CI->parser->parse($CI->config->item('pathViewTemplateAdmin') . 'layout/templateFooter', $footerData);
    }


    public function layout3($data, $body = array()) {
		$CI =& get_instance();
// ----------------------------------------------------------------------------------------------------------------
		$path = (isset($data['path'])) ? $data['path'] : '';
		$path_rel = (isset($data['path_rel'])) ? $data['path_rel'] : '';
		$path_rel_view = (isset($data['path_rel_view'])) ? $data['path_rel_view'] : '';
		$path_template_admin = base_url() . $CI->config->item('pathAssetsTemplateAdmin');
// ----------------------------------------------------------------------------------------------------------------
		$template = (isset($data['template'])) ? $data['template'] : '';
		$type = (isset($data['type'])) ? $data['type'] : '';
// ----------------------------------------------------------------------------------------------------------------
		switch ($template) {

			case 'assistants':

				$head_files = '
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="'.$path_template_admin.'bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="'.$path_template_admin.'bower_components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="'.$path_template_admin.'bower_components/Ionicons/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="'.$path_template_admin.'dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="'.$path_template_admin.'dist/css/skins/_all-skins.min.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<!-- bootstrap datepicker -->
<link rel="stylesheet" href="'.$path_template_admin.'plugins/datepicker/datepicker3.css">

<!-- Global -->
<link rel="stylesheet" href="' . base_url() . 'assets/css/' . $CI->config->item('adminPath') . '/global.css?v=' . $CI->config->item('version') . '">

<!-- DataTables -->
<link rel="stylesheet" href="' . base_url() . 'assets/templates/admin/AdminLTE-2.4.18/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<!-- jQuery 3 -->
<script src="'.$path_template_admin.'bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="'.$path_template_admin.'bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="'.$path_template_admin.'bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="'.$path_template_admin.'dist/js/adminlte.min.js"></script>
<!-- sweetalert2 -->
<script src="'.$path_template_admin.'plugins/sweetalert2/sweetalert2.all.js"></script>

<!-- bootstrap datepicker -->
<script src="'.$path_template_admin.'plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap datepicker Lang -->
<script src="'.$path_template_admin.'plugins/datepicker/locales/bootstrap-datepicker.'.$CI->config->item('lang').'.js"></script>
<!-- bootstrap datepicker -->
<script src="'.$path_template_admin.'plugins/datepicker/datepicker.js"></script>

<!-- jQuery Validation Plugin -->
<script src="'.$path_template_admin.'plugins/jquery-validation/jquery.validate.min.js"></script>

<!-- DataTables -->
<script src="' . base_url() . 'assets/templates/admin/AdminLTE-2.4.18/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="' . base_url() . 'assets/templates/admin/AdminLTE-2.4.18/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

';

				$footer_files = '
';

				break;

			case 'ssp':
				$head_files = '
<!-- Ionicons -->
<link rel="stylesheet" href="'.$path_template_admin.'bower_components/Ionicons/css/ionicons.min.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="'.$path_template_admin.'plugins/datepicker/datepicker3.css">
<!-- Theme style -->
<link rel="stylesheet" href="'.$path_template_admin.'dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="'.$path_template_admin.'dist/css/skins/skin-blue.min.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<!-- dataTables -->
<link rel="stylesheet" type="text/css" href="'.$path_template_admin.'plugins/ssp/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="'.$path_template_admin.'plugins/ssp/resources/syntax/shCore.css">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="'.$path_template_admin.'bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="'.$path_template_admin.'bower_components/font-awesome/css/font-awesome.min.css">
<!-- Global SSP -->
<link rel="stylesheet" href="' . base_url() . 'assets/css/' . $CI->config->item('adminPath') . '/global_ssp.css?v=' . $CI->config->item('version') . '">
';

				$footer_files = '
<!-- jQuery -->		
<script type="text/javascript" language="javascript" src="'.$path_template_admin.'plugins/ssp/media/js/jquery.js"></script>
<!-- dataTables -->		
<script type="text/javascript" language="javascript" src="'.$path_template_admin.'plugins/ssp/media/js/jquery.dataTables.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="'.$path_template_admin.'bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="'.$path_template_admin.'plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- sweetalert2 -->
<script src="'.$path_template_admin.'plugins/sweetalert2/sweetalert2.all.js"></script>
<!-- SlimScroll -->
<script src="'.$path_template_admin.'bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="'.$path_template_admin.'bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="'.$path_template_admin.'dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="'.$path_template_admin.'dist/js/demo.js"></script>
<!-- jQuery Validation Plugin -->
<script src="'.$path_template_admin.'plugins/jquery-validation/jquery.validate.min.js"></script>
<!-- dataTables -->
<script type="text/javascript" language="javascript" src="'.$path_template_admin.'plugins/ssp/resources/syntax/shCore.js"></script>
<!-- List -->
<script type="text/javascript" language="javascript" src="' . base_url() . 'assets/js/crud/list.js"></script>';

				break;

			case 'form':
				$head_files = '
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="'.$path_template_admin.'bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="'.$path_template_admin.'bower_components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="'.$path_template_admin.'bower_components/Ionicons/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="'.$path_template_admin.'dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="'.$path_template_admin.'dist/css/skins/_all-skins.min.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<!-- bootstrap datepicker -->
<link rel="stylesheet" href="'.$path_template_admin.'plugins/datepicker/datepicker3.css">

<!-- Global -->
<link rel="stylesheet" href="' . base_url() . 'assets/css/' . $CI->config->item('adminPath') . '/global.css?v=' . $CI->config->item('version') . '">
';


				$footer_files = '
<!-- jQuery 3 -->
<script src="'.$path_template_admin.'bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="'.$path_template_admin.'bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="'.$path_template_admin.'bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="'.$path_template_admin.'dist/js/adminlte.min.js"></script>
<!-- sweetalert2 -->
<script src="'.$path_template_admin.'plugins/sweetalert2/sweetalert2.all.js"></script>

<!-- bootstrap datepicker -->
<script src="'.$path_template_admin.'plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap datepicker Lang -->
<script src="'.$path_template_admin.'plugins/datepicker/locales/bootstrap-datepicker.'.$CI->config->item('lang').'.js"></script>
<!-- bootstrap datepicker -->
<script src="'.$path_template_admin.'plugins/datepicker/datepicker.js"></script>

<!-- jQuery Validation Plugin -->
<script src="'.$path_template_admin.'plugins/jquery-validation/jquery.validate.min.js"></script>';
				if ($CI->config->item('lang') == 'es') {
					$footer_files .= '
<!-- jQuery Validation Lang -->
<script src="'.$path_template_admin.'plugins/jquery-validation/lang/es.js"></script>';
				}

				if ($type == 'new') {
// 					$footer_files .= '
// <!-- New -->
// <script type="text/javascript" language="javascript" src="' . base_url() . 'assets/js/crud/new.js"></script>';
				}
				if ($type == 'edit') {
					$footer_files .= '
<!-- Edit -->
<script type="text/javascript" language="javascript" src="' . base_url() . 'assets/js/crud/edit.js"></script>';
				}


				break;
			
			default:
				$head_files = '';
				$footer_files = '';
				break;
		}		
// ----------------------------------------------------------------------------------------------------------------
		$data_design = $CI->admin_design->vars();

// ----------------------------------------------------------------------------------------------------------------
		$headData['path_template_admin'] = $path_template_admin;

		$headData['version'] = $CI->config->item('version');
		$headData['Y'] = $CI->config->item('Y');
		$headData['projectUrl'] = $CI->config->item('projectUrl');
		$headData['projectName'] = $CI->config->item('projectName');
// ----------------------------------------------------------------------------------------------------------------
		$htmls = $CI->admin_design->htmls($headData);
// ----------------------------------------------------------------------------------------------------------------
		$headData['menuMain'] = $htmls['menuMain'];
		$headData['menuTop'] = $htmls['menuTop'];
		$headData['navMessages'] = $htmls['navMessages'];
		$headData['navNotifications'] = $htmls['navNotifications'];
		$headData['navTasks'] = $htmls['navTasks'];
		$headData['searchForm'] = $htmls['searchForm'];
// ----------------------------------------------------------------------------------------------------------------
        $headData['head_title'] = $data['head_title'];
        $headData['menu'] = (isset($data['menu'])) ? $data['menu'] : '';
		$headData['head_files'] = $head_files;
// ----------------------------------------------------------------------------------------------------------------
		$css = '';

		if (!is_array($type)) {
			if ($path_rel_view == 'list') {
				$css_default = 'assets/css/' . $path_rel . '/'.$type.'.css';
			} else {
				$css_default = 'assets/css/' . $path . '/'.$type.'.css';
			}
			
			if (file_exists($css_default)) {
			    $css = "\n" . '  <link rel="stylesheet" href="' . base_url() . $css_default . '?v=' . $CI->config->item('version') . '">';
			}
		}

        $headData['css'] = $css;
// ----------------------------------------------------------------------------------------------------------------
		$script = '';

		if (!is_array($type)) {
			if ($path_rel_view == 'list') {
				$script_default = 'assets/js/' . $path_rel . '/'.$type.'.js';
			} else {
				$script_default = 'assets/js/' . $path . '/'.$type.'.js';
			}
			
			if (file_exists($script_default)) {
			    $script = '<script src="' . base_url() . $script_default . '?v=' . $CI->config->item('version') . '"></script>';
			}
		}

        $footerData['script'] = $script;
// ----------------------------------------------------------------------------------------------------------------
        $footerData['path_template_admin'] = $path_template_admin;
		$footerData['footer'] = $htmls['footer'];
		$proyVar = array(
			'base_url' => base_url(), 
			'admin_path' => $CI->config->item('adminPath'), 
			'language' =>  $CI->session->userdata('be_lang_value'), 
			'lang' =>  $CI->config->item('lang'), 
			'path' => $path, 
			'path_rel' => $path_rel,
			'dateFormat' => $CI->config->item('dateFormat'),
			'datatablesLang' => $CI->config->item('datatablesLang')
		);

		// Datatables Lang -> https://cdn.datatables.net/plug-ins/1.10.15/i18n/

		$footerData['proyVar'] = '<script>var proyVar =' . json_encode($proyVar) . ';</script>';

//		$footerData['proyVar'] = '<script>var proyVar =' . json_encode($proyVar) . ';var proyVarS ={"sgctn":"'.$CI->security->get_csrf_token_name().'","sgch":"'.$CI->security->get_csrf_hash().'"};</script>';

		$footerData['txtVar'] = '<script>var txtVar =' .  json_encode($CI->lang->language) . ';</script>';

		$footerData['footer_files'] = $footer_files;
// ----------------------------------------------------------------------------------------------------------------
        $bodyData['title'] = (isset($data['title'])) ? $data['title'] : '';
        $bodyData['subtitle'] = (isset($data['subtitle'])) ? $data['subtitle'] : '';
        $bodyData['breadcrumb'] = (isset($data['breadcrumb'])) ? $data['breadcrumb'] : '';
        $bodyData['tabs'] = (isset($data['tabs'])) ? $data['tabs'] : '';
        $bodyData['state'] = (isset($data['state'])) ? $data['state'] : '';
        $bodyData['code'] = (isset($data['code'])) ? $data['code'] : '';
        $bodyData['html'] = (isset($data['html'])) ? $data['html'] : '';
        $bodyData['data'] = (isset($data['data'])) ? $data['data'] : '';
        $bodyData['base_url'] = base_url();
        $bodyData['path'] = $path;
        $bodyData['path_rel'] = $path_rel;
// ----------------------------------------------------------------------------------------------------------------
		//$template = (isset($data['template'])) ? $data['template'] : '';
// ----------------------------------------------------------------------------------------------------------------

        $view_path = $path;
        if ($path_rel_view == 'list') {
	        $view_path = $path_rel;
        }

        $CI->parser->parse($CI->config->item('pathViewTemplateAdmin') . 'layout/templateHead', $headData);
        if (count($body)) {

        	if (is_array($type)) {
		        foreach ($type as $vista) {
			        $CI->parser->parse($view_path . '/' .$vista, $body);
		        }
        	} else {
		        $CI->parser->parse($view_path . '/' . $type, $body);
        	}

        } else {
	        $CI->parser->parse($view_path . '/' . $type, $bodyData);
        }
        $CI->parser->parse($CI->config->item('pathViewTemplateAdmin') . 'layout/templateFooter', $footerData);
    }


    public function crudShow($crudTable, $title, $breadCrumbs = '', $css = '', $script = '', $tabs = '', $state = '', $code = 0, $html = '', $menu = '') {
    	$CI =& get_instance();

		$data_design = $CI->admin_design->vars();

		$data['head_title'] = 'Database';

		$headData['version'] = $CI->config->item('version');
		$headData['Y'] = $CI->config->item('Y');
		$headData['projectUrl'] = $CI->config->item('projectUrl');
		$headData['projectName'] = $CI->config->item('projectName');

		$htmls = $CI->admin_design->htmls($headData);

		$headData['menuMain'] = $htmls['menuMain'];
		$headData['menuTop'] = $htmls['menuTop'];
		$headData['navMessages'] = $htmls['navMessages'];
		$headData['navNotifications'] = $htmls['navNotifications'];
		$headData['navTasks'] = $htmls['navTasks'];
		$headData['searchForm'] = $htmls['searchForm'];

// ----------------------------------------------------------------------------------------------------------------

        $headData['head_title'] = $title;
        $headData['path_template_admin'] = base_url() . $CI->config->item('pathAssetsTemplateAdmin');
        $headData['breadCrumbs'] = $breadCrumbs;
        $headData['css'] = $css;
        $headData['menu'] = $menu;

        $footData['script'] = $script;
        $footData['path_template_admin'] = base_url() . $CI->config->item('pathAssetsTemplateAdmin');
		$footData['footer'] = $htmls['footer'];

        $crudTableData['title'] = $title;
        $crudTableData['css_files'] = $crudTable->css_files;
        $crudTableData['js_files'] = $crudTable->js_files;
        $crudTableData['tabs'] = $tabs;
        $crudTableData['output'] = $crudTable->output;
        $crudTableData['state'] = $state;
        $crudTableData['code'] = $code;
        $crudTableData['html'] = $html;

        $CI->parser->parse($CI->config->item('pathViewTemplateAdmin') . 'layout/groceryHead', $headData);
        $CI->load->view($CI->config->item('pathViewTemplateAdmin') . 'grocery',$crudTableData);
        $CI->parser->parse($CI->config->item('pathViewTemplateAdmin') . 'layout/groceryFooter', $footData);
    }

// ----------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------

    public function _prjControl() {
    	$CI =& get_instance();
        if (!$CI->session->has_userdata('project')) {
            redirect('backend/database/tables_fields');
        }
    }
  
    public function ctrSegAdmin() {
    	$CI =& get_instance();
        if ( !$CI->session->has_userdata('be_user_id') ) {
            // Error. You must authenticate to enter the application
            $CI->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> Chyba </h4>Chcete-li jej zadat, musíte ověřit svou aplikaci');
            $CI->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
            redirect ($CI->config->item('adminPath'));
        }
    }

    public function _load_layout($template, $data) {
    	$CI =& get_instance();
        $CI->load->view('templates/'.$CI->config->item('adminPath').'/header', $data);
        $CI->load->view('templates/'.$CI->config->item('adminPath').'/menu', $data);
        $CI->load->view($template, $data);
        $CI->load->view('templates/'.$CI->config->item('adminPath').'/footer', $data);
    }

    function _load_layout_table($template, $data) {
    	$CI =& get_instance();
        $CI->load->view('templates/'.$CI->config->item('adminPath').'/headerTable', $data);
        $CI->load->view('templates/'.$CI->config->item('adminPath').'/menu', $data);
        $CI->load->view($template, $data);
        $CI->load->view('templates/'.$CI->config->item('adminPath').'/footerTable', $data);
    }

    function _load_layout_3D($template, $data) {
    	$CI =& get_instance();
        // $CI->load->view('templates/'.$CI->config->item('adminPath').'/header3D', $data);
        // $CI->load->view('templates/'.$CI->config->item('adminPath').'/menu', $data);
        // $CI->load->view($template, $data);
        // $CI->load->view('templates/'.$CI->config->item('adminPath').'/footer3D', $data);

        $CI->load->view('templates/'.$CI->config->item('adminPath').'/header3D', $data);
        $CI->load->view($template, $data);
        $CI->load->view('templates/'.$CI->config->item('adminPath').'/footer3D', $data);

    }

    function _projectVersionTitle() {
    	$CI =& get_instance();
        $projectVersionTitle = 'Ninguno';
        if ($CI->session->has_userdata('project')) {
            if ($CI->session->userdata('project') > '0') {
                $projectVersionTitle = $CI->session->userdata('projectVersionTitle');
            }
        }

        return $projectVersionTitle;

    }

    function _getName($table, $id, $project, $version) {
    	$CI =& get_instance();
        $tableName = '';
        $table = $CI->Model->getRowsJoin($table, 
            '',
            array(),
            array(
                'id' => $id,
                'proyecto' => $project,
                'version' => $version
                ));
        if (count($table)) {
            $tableName = $table[0]['nombre'];
        }
        return $tableName;
    }

}