<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// http://jsfiddle.net/Solucionaticos/xmofm0gq/1/
class Variables_codigo extends MY_Controller {

    public $language = 0;
  
    public function __construct() {
        parent::__construct();
				$this->ctrSegAdmin();
    }

    function _remap($param) {
        $this->index($param);
    }
  
    public function index($id) {  
				$idLanguage = $this->uri->segment(4);
				$this->language = $idLanguage;
        // --------------------------------------------------------------
        $nameLang = $valueLang = '';
        $language = $this->Modelo->registro($this->config->item('raiz_bd') . 'languages', $this->language);
        if ( count($language) ) {
            $nameLang = $language->name;
						$valueLang = $language->value;
        } else {
            $nameLang = "Name not found";
						$valueLang = 'Value not found';
				}
        // --------------------------------------------------------------
				$codigoPHPBackendWrite = '<?php' . "\n";
				$codigoPHPBackendWrite .= 'defined("BASEPATH") OR exit("No direct script access allowed");' . "\n" . "\n";
				$codigoPHPBackend = '
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

';
				$languages_variables = $this->Modelo->registros($this->config->item('raiz_bd') . 'languages_variables', '', array('environment'=>8, 'records > '=>0), 'name' );
				if (count($languages_variables)) {
						foreach($languages_variables as $record) {
								$languages_variables_values = $this->Modelo->registros($this->config->item('raiz_bd') . 'languages_variables_values', '', array('variable'=>$record['id'], 'language'=>$this->language));
								$value = '';
								if (count($languages_variables_values)) {
										$value = $languages_variables_values[0]['value'];
								}
								$codigoPHPBackendWrite .= '$lang[\'be_' . $record['name'] . '\'] = "' . $value . '";' . "\n";
								$codigoPHPBackend .= '$lang[\'be_' . $record['name'] . '\'] = "' . $value . '";' . "\n";
						}
				}
			
        $codigoPHPFrontendWrite = '<?php' . "\n";
        $codigoPHPFrontendWrite .= 'defined("BASEPATH") OR exit("No direct script access allowed");' . "\n" . "\n";
        $codigoPHPFrontend = '
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

';
				$languages_variables = $this->Modelo->registros($this->config->item('raiz_bd') . 'languages_variables', '', array('environment'=>9, 'records > '=>0), 'name' );
				if (count($languages_variables)) {
						foreach($languages_variables as $record) {
								$languages_variables_values = $this->Modelo->registros($this->config->item('raiz_bd') . 'languages_variables_values', '', array('variable'=>$record['id'], 'language'=>$this->language));
								$value = '';
								if (count($languages_variables_values)) {
										$value = $languages_variables_values[0]['value'];
								}
								$codigoPHPFrontendWrite .= '$lang[\'fe_' . $record['name'] . '\'] = "' . $value . '";' . "\n";
								$codigoPHPFrontend .= '$lang[\'fe_' . $record['name'] . '\'] = "' . $value . '";' . "\n";
						}
				}
			
				$file = $this->uri->segment(5);
				$operation = $this->uri->segment(6);
				if ($file != '' and $operation != '') {
						if ($file == 8 and $operation == 'w') {
								if (write_file('application/language/'.$valueLang.'/backend_lang.php', $codigoPHPBackendWrite, 'w')) {
										$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El script fue creado.'); 
										$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
								} else {
										$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible crear el script.');
										$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
								}
						}
						if ($file == 9 and $operation == 'w') {
								if (write_file('application/language/'.$valueLang.'/frontend_lang.php', $codigoPHPBackendWrite, 'w')) {
										$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>El script fue creado.'); 
										$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
								} else {
										$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible crear el script.');
										$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
								}
						}					
				}
			
				$this->parametros['plantilla'] = 'codigo';
        $this->parametros['vista'] = $this->config->item('adminPath') . '/mantenimientos/language_code';
        $this->parametros['datos']['titulo'] = 'Codes (from language: "' . $nameLang . '")';
        $this->parametros['datos']['subtitulo'] = '';
        $this->parametros['datos']['breadcrumb'] = '
            <ol class="breadcrumb">
                <li><a href="'.base_url().$this->config->item('adminPath') . '/mantenimientos/languages">Languages</a></li>
                <li class="active">Codes</li>
            </ol>';
        $this->parametros['datos']['id'] = $this->language;
        $this->parametros['datos']['language'] = $valueLang;
        $this->parametros['datos']['codigoPHPBackend'] = $codigoPHPBackend;
        $this->parametros['datos']['codigoPHPFrontend'] = $codigoPHPFrontend;
        $this->load->view('plantilla_admin', $this->parametros);			
		}
	
}
