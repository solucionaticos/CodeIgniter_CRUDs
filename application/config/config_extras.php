<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set("America/Bogota");

// Proyect Name
$config['projectName']  = 'Solucionaticos';
$config['projectUrl']  = 'https://www.solucionaticos.com';
$config['projectPath']  = 'solucionaticos20200128';
$config['adminPath']  = 'admin';
$config['frontPath']  = 'front';

// Version
$config['version'] = '1.0.0.0';

// Paths
$admin_template = 'AdminLTE-2.4.18/'; // 'AdminLTE-3.0.1/';
$config['pathViewTemplateAdmin'] = $config['adminPath'] . '/' . $admin_template;
$config['pathAssetsTemplateAdmin'] = 'assets/templates/'.$config['adminPath'].'/' . $admin_template;
$config['adminTemplatePath'] = 'AdminLTE-2.4.18';

$front_template = 'dostart-v1.3/';
$config['pathViewTemplateFront'] = $config['frontPath'] . '/' . $front_template;
$config['pathAssetsTemplateFront'] = 'assets/templates/'.$config['frontPath'].'/' . $front_template;

//$this->config->item('path_template_admin')

// Date
$config['YmdHis']  = date('Y-m-d H:i:s');
$config['Ymd2His'] = date('Y-m-d H:i:s', strtotime('+2 hours'));
$config['Y6md']    = date('Y-m-d', strtotime('+6 months'));
$config['Ymd']     = date('Y-m-d');
$config['Y']       = date('Y');
$config['dateFormat'] = 'yyyy-mm-dd';

// Time
$config['1minute'] = 60;
$config['1hour']   = 60*60;
$config['1day']    = 60*60*24;
$config['1week']   = 60*60*24*7;
$config['1month']  = 60*60*24*30;
$config['1year']   = 60*60*24*365;

// Language
$config['lang']    = 'es';
$config['datatablesLang'] = "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json";


// $config['email_smtp_host'] = 'smtp.sendgrid.net';
// $config['email_smtp_user'] = 'apikey';
// $config['email_smtp_pass'] = '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';
// $config['email_smtp_port'] = '587';
// $config['email_smtp_user_name'] = 'Solucionaticos';
// $config['correo_escribenos'] = 'info@solucionaticos.com'; 

$config['email_smtp_host'] = 'smtp.zoho.com'; // 'ssl://smtp.zoho.com';
$config['email_smtp_user'] = 'info@solucionaticos.com';
$config['email_smtp_pass'] = '@madoR1974';
$config['email_smtp_port'] = '465';
$config['email_company'] = 'info@solucionaticos.com';
$config['email_company_name'] = 'Solucionaticos'; 
$config['email_bbc'] = 'info@solucionaticos.com';

$config['ruta_fuentes_produccion'] = '/home/runcloud/webapps/solucionaticos/assets/fonts/';
$config['ruta_fuentes_desarrollo'] = 'D:\ProyectosPHP\solucionaticos.com\assets\fonts'  . '\\';
