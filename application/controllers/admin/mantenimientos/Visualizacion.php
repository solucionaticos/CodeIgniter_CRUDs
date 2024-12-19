<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visualizacion extends MY_Controller {

    public $parametros;  
  
    public function __construct() {
        parent::__construct();
        $this->ctrSegAdmin();
        $this->load->helper('cookie');
    }

    public function index() {
        $this->parametros['plantilla'] = 'tabla';
        $this->parametros['vista'] = $this->config->item('adminPath') . '/mantenimientos/visualizacion';
        $this->parametros['datos']['titulo'] = 'Visualización';
        $this->parametros['datos']['subtitulo'] = '';
        $tablas = $this->db->list_tables();
        $tablasInfo = array();

       foreach ($tablas as $regTabla) {
            $tablasInfo[] = array('nombre'=>$regTabla, 'registros'=>$this->db->count_all_results($regTabla));
        }
        $this->parametros['datos']['tablasInfo'] = $tablasInfo;
        $this->load->view('plantilla_admin', $this->parametros);   
    }

    public function tabla() {
        $post = $this->input->post();
        $campos = array();
        $datos = array();
        $listaCampos = $this->db->field_data($post['tabla']);
        foreach ($listaCampos as $registro) {
            $campos[] = $registro;
        }
        $datos = array('campos'=>$campos, 'tksec'=>$this->security->get_csrf_hash());
			
        echo json_encode($datos);
    }
    
    public function indices() {
        $post = $this->input->post();
        $campos = array('Non_unique', 'Key_name', 'Seq_in_index', 'Column_name', 'Collation', 'Cardinality', 'Sub_part', 'Packed', 'Null', 'Index_type', 'Comment', 'Index_comment');
        $datos = array();
        $tabla = array();
				$query = $this->db->query('SHOW INDEX FROM ' . $post['tabla'] . ' FROM ' . $this->db->database);
				while ($row = $query->unbuffered_row()) {
						$datos[] = $row;
				}	
        $tabla = array('campos'=>$campos, 'datos'=>$datos, 'tksec'=>$this->security->get_csrf_hash());
        echo json_encode($tabla);
    }
	
	public function relaciones() {
        $post = $this->input->post();
        $campos = array('CONSTRAINT_NAME', 'COLUMN_NAME', 'REFERENCED_TABLE_NAME', 'REFERENCED_COLUMN_NAME');
        $datos = array();
        $tabla = array();
		$query = $this->db->query('SELECT CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE REFERENCED_TABLE_SCHEMA IS NOT NULL AND TABLE_NAME = "' . $post['tabla'] . '"');
		while ($row = $query->unbuffered_row()) {
			$datos[] = $row;
		}	
        $tabla = array('campos'=>$campos, 'datos'=>$datos, 'tksec'=>$this->security->get_csrf_hash());
        echo json_encode($tabla);
	}
	
    public function datos() {
        $post = $this->input->post();
		$this->session->set_userdata($this->config->item('raiz') . 'be_crud_tabla', $post['tabla']);
        echo json_encode(array('tksec'=>$this->security->get_csrf_hash()));
    }
	
    public function crud() {
        $this->clearSearchCookies();
        $tabla = $this->session->userdata($this->config->item('raiz') . 'be_crud_tabla');
        $this->load->library('grocery_CRUD');
        $crud = new grocery_CRUD();
        $crud->set_language($this->session->userdata($this->config->item('raiz') . 'be_lang_value'));

        $crud->set_table($tabla);
        $crud->unset_operations();
        $crudTabla = $crud->render();
        $tabs = '
        <a href="'.base_url().$this->config->item('adminPath') . '/mantenimientos/configuracion" class="btn btn-default">Configuración</a>
        <a href="'.base_url().$this->config->item('adminPath') . '/mantenimientos/visualizacion" class="btn btn-primary">Visualización</a>
        <a href="'.base_url().$this->config->item('adminPath') . '/mantenimientos/triggers" class="btn btn-default">Triggers</a>
        <a href="'.base_url().$this->config->item('adminPath') . '/mantenimientos/importar" class="btn btn-default">Importar</a> 
        <a href="'.base_url().$this->config->item('adminPath') . '/mantenimientos/cruds" class="btn btn-default">CRUDs</a>
        <a href="'.base_url().$this->config->item('adminPath') . '/mantenimientos/modelo_relacional" class="btn btn-default">Modelo Relacional</a>
        <br><br>';

        $this->crudver($crudTabla, 'Tabla: ' . $tabla, 'Miga de pan', '', '', $tabs);
    }

    public function clearSearchCookies() {
        //Check if the referer is not same as this page then clear the cookies
        $thisurl = site_url() . $this->config->item('projectPath') . "/mantenimientos/basedatos/crud";
        if(array_key_exists('HTTP_REFERER', $_SERVER)) {
            $refering_url = $_SERVER['HTTP_REFERER'];
            if($refering_url != '') {
                if(substr($refering_url, 0, strlen($thisurl)) == $thisurl) {
                    //Fine to go with .. since it is the same one continued in here
                } else {
                    $this->deleteSearchCookies();
                }
            } else {
                $this->deleteSearchCookies();
            }    
        } else {
            $this->deleteSearchCookies();
        }
    }

	public function deleteSearchCookies() {
        foreach ($_COOKIE as $key=>$val) {
            if(stripos($key, 'crud_page') !== FALSE) {
                delete_cookie($key);
            }
            if(stripos($key, 'per_page') !== FALSE) {
                delete_cookie($key);
            }
            if(stripos($key, 'hidden_ordering') !== FALSE) {
                delete_cookie($key);
            }
            if(stripos($key, 'search_text') !== FALSE) {
                delete_cookie($key);
            }
            if(stripos($key, 'search_field') !== FALSE) {
                delete_cookie($key);
            }
        }
    }

	
/*
	  public function datos() {
        $post = $this->input->post();
        $campos = array();
        $datos = array();
        $tabla = array();
        $fields = $this->db->list_fields($post['tabla']);
        foreach ($fields as $field) {
           $campos[] = $field;
        }
        $datos = $this->Modelo->registros($post['tabla']);
        $tabla = array('campos'=>$campos, 'datos'=>$datos, 'tksec'=>$this->security->get_csrf_hash());
        echo json_encode($tabla);
    }
*/
	
	
/*
    public function ssp() {
        $post = $this->input->post();
        $this->load->library('ssp');    
        $table = $post['tabla'];
        $primaryKey = 'id';

        $i = 0;
        $columns = array();
        $listaCampos = $this->db->field_data($table);
        foreach ($listaCampos as $registro) {
            $columns[] = array( 'db' => $registro->name, 'dt' => $i, 'field' => $registro->name );
            $i++;
        }

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );

        $post['tksec'] = $this->security->get_csrf_hash();
        echo json_encode(
            $this->ssp->simple( $post, $sql_details, $table, $primaryKey, $columns)
        );

    }
*/
}