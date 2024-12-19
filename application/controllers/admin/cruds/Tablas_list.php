<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Tablas_list extends MY_Controller {

	public $parameters;	
	public $path;
	public $breadcrumb;

public $path_rel;
public $rel_proyecto;
public $rel_proyecto_nombre;
public $rel_version;
public $rel_version_nombre;

	public function __construct() {
		parent::__construct();
		// $this->ctrSegAdmin();

$this->path = 'admin/cruds/tablas_list';
$this->path_rel = 'admin/cruds/tablas';

	}

function _remap($param) {
    $this->index($param);
}

public function index($rel_version) {

$this->rel_version = $rel_version;
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
$this->parameters['breadcrumb'] = $this->breadcrumb->tablas();

// Actualizacion
$rows = $this->Model->getRowsJoin('tablas', 'id', array(), array('version'=>$this->rel_version));
foreach ($rows as $row) {
	$count_rows = $this->Model->records('campos', '', '', array('tabla'=>$row['id']));
	$this->Model->update('tablas', array("campos" => $count_rows), $row['id']);
}

		$this->parameters['template'] = 'ssp';
		$this->parameters['type'] = 'list';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Tablas';
		$this->parameters['subtitle'] = ''; 
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->admin_design->layout3($this->parameters);

	}

}