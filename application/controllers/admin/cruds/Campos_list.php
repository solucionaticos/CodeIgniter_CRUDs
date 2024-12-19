<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Campos_list extends MY_Controller {

	public $parameters;
	public $path;
	public $breadcrumb;

public $path_rel;
public $rel_proyecto;
public $rel_proyecto_nombre;
public $rel_version;
public $rel_version_nombre;
public $rel_tabla;
public $rel_tabla_nombre;

	public function __construct() {
		parent::__construct();
		// $this->ctrSegAdmin();

$this->path = 'admin/cruds/campos_list';
$this->path_rel = 'admin/cruds/campos';

	}

function _remap($param) {
    $this->index($param);
}

public function index($rel_tabla) {

$this->rel_tabla = $rel_tabla;
$this->parameters['data']['rel_tabla'] = $this->rel_tabla;
$row_rel_tabla = $this->Model->getRow('tablas', $this->rel_tabla);
$this->rel_tabla_nombre = $row_rel_tabla->nombre;

$this->rel_version = $row_rel_tabla->version;
$this->parameters['data']['rel_version'] = $this->rel_version;
$row_rel_version = $this->Model->getRow('versiones', $this->rel_version);
$this->rel_version_nombre = $row_rel_version->nombre;

$this->rel_proyecto = $row_rel_version->proyecto;
$this->parameters['data']['rel_proyecto'] = $this->rel_proyecto;
$row_rel_proyecto = $this->Model->getRow('proyectos', $this->rel_proyecto);
$this->rel_proyecto_nombre = $row_rel_proyecto->nombre;

$this->parameters['path_rel'] = $this->path_rel;
$this->parameters['path_rel_view'] = 'list';
$this->load->library('breadcrumb');
$this->parameters['breadcrumb'] = $this->breadcrumb->campos();

		$this->parameters['template'] = 'ssp';
		$this->parameters['type'] = 'list';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Campos';
		$this->parameters['subtitle'] = ''; 
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->admin_design->layout3($this->parameters);

	}

}
