<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Variables extends MY_Controller {

 public $variable = 0;

 public function __construct() {
    parent::__construct();
    $this->ctrSegAdmin();
    if ($this->session->userdata($this->config->item('raiz') . 'be_usuario_id') > 1) redirect($this->config->item('adminPath') . '/informacion');
    $this->load->library('grocery_CRUD');
}

public function index() {
    $crud = new grocery_CRUD();
    $crud->set_language($this->session->userdata($this->config->item('raiz') . 'be_lang_value'));

    $crud->set_table($this->config->item('raiz_bd') . 'languages_variables');
    $crud->columns('environment', 'name', 'records');
    $crud->required_fields('environment', 'name');
    $crud->add_fields('environment', 'name');
    $crud->edit_fields('environment', 'name');
    $crud->set_relation('environment', $this->config->item('raiz_bd') . 'datos_valores', '{nombre} ({auxiliar_1})', 'dato = (SELECT id FROM ' . $this->config->item('raiz_bd') . 'datos WHERE codigo = "ambientes")', 'nombre ASC');
    $crud->callback_before_insert(array($this, 'variables_before_insert'));
    $crud->callback_before_update(array($this, 'variables_before_update'));
    $crud->add_action('Values', site_url('assets/iconos/configurar.png'), $this->config->item('adminPath') . '/mantenimientos/variables/variables_values');

    $crud->unique_fields(array('name'));
    //$this->form_validation->set_rules('site_code', 'Site code', 'required|_unique_code_no');
    //$crud->set_rules('name','Name','required|_unique_code_name'); 

    $crudTabla = $crud->render();

    $css = '
    <style>
	#field-name {background-color: #e2ffea;}
    </style>';

    $script = '
    <script>
       $(function () {
          $("#field-name").change(function () {
             var value = $(this).val().toLowerCase();
             value = value.replace(/[^a-zA-Z0-9]/g,"_");			
             $(this).val(value);
         });
     });
 </script>';

 $this->crudver($crudTabla, 'Variables', '', $css, $script);
}	

/*
public function _unique_code_name($name) {
    $CI =& get_instance();
    $CI->form_validation->set_message('_unique_code_name', 'the values must be unique');
    $environment = $CI->input->post('environment');
    $query=$CI->db->query("select 1 from " . $this->config->item('raiz_bd') . "languages_variables where environment=$environment_no and name='$name'");
    if ($query->num_rows==0){
        return TRUE;
    }else{
        return FALSE;
    }
}
*/

public function variables_before_insert ($post, $id = null) {
    foreach ($post as $key => $value) {
        $post[$key] = $this->security->xss_clean($value);
    }
    return $post;
}

public function variables_before_update ($post, $id = null) {
    foreach ($post as $key => $value) {
        $post[$key] = $this->security->xss_clean($value);
    }
    return $post;
}

public function variables_values($id) {
    $this->variable = $id;
    $crud = new grocery_CRUD();
    $crud->set_language($this->session->userdata($this->config->item('raiz') . 'be_lang_value'));

    $crud->set_table($this->config->item('raiz_bd') . 'languages_variables_values');
    $crud->where('variable', $id);		

    $crud->columns('language', 'value');
    $crud->add_fields('variable', 'language', 'value');
    $crud->edit_fields('language', 'value');

    $crud->required_fields('language', 'value');
    $crud->field_type('variable', 'hidden');

    $crud->set_relation('language', $this->config->item('raiz_bd') . 'languages', 'name');

    $crud->callback_after_insert(array($this, 'variables_values_after_insert'));
    $crud->callback_after_delete(array($this, 'variables_values_after_delete'));
    $crud->callback_before_insert(array($this, 'variables_values_before_insert'));
    $crud->callback_before_update(array($this, 'variables_values_before_update'));
    $crudTabla = $crud->render();
        // --------------------------------------------------------------
    $parentName = '';
    $dato = $this->Modelo->registro($this->config->item('raiz_bd') . 'languages_variables', $id);
    if ( count($dato) ) {
      $environment_root = $this->Modelo->registro($this->config->item('raiz_bd') . 'datos_valores', $dato->environment);				
      $parentName = $environment_root->auxiliar_1 . $dato->name;
  } else {
    $parentName = "Data not found";
}

        // --------------------------------------------------------------
$this->crudver($crudTabla, 'Values from: $this->lang->line(\'' . $parentName . '\')', '
    <ol class="breadcrumb">
        <li><a href="'.base_url().$this->config->item('adminPath') . '/mantenimientos/variables">Variables</a></li>
        <li class="active">Values</li>
    </ol>');		
}

public function variables_values_before_insert ($post, $id = null) {
    foreach ($post as $key => $value) {
        $post[$key] = $this->security->xss_clean($value);
    }
    $post['variable'] = $this->variable;
    return $post;
}   

public function variables_values_before_update ($post, $id = null) {
    foreach ($post as $key => $value) {
        $post[$key] = $this->security->xss_clean($value);
    }           
    return $post;
}  		

function variables_values_after_insert($post_array,$primary_key) {
 $records = $this->Modelo->records($this->config->item('raiz_bd') . 'languages_variables_values', $this->variable, 'variable');
 $data['records'] = $records;
 $this->Modelo->actualizar($this->config->item('raiz_bd') . 'languages_variables', $data, $this->variable);
}

public function variables_values_after_delete($primary_key) {
 $records = $this->Modelo->records($this->config->item('raiz_bd') . 'languages_variables_values', $this->variable, 'variable');
 $data['records'] = $records;
 $this->Modelo->actualizar($this->config->item('raiz_bd') . 'languages_variables', $data, $this->variable);
}

}