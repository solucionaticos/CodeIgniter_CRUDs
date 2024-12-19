<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Versiones_list extends MY_Controller {

	public $parameters;	
	public $path;
	public $breadcrumb;

public $path_rel;
public $rel_proyecto;
public $rel_proyecto_nombre;

	public function __construct() {
		parent::__construct();
		// $this->ctrSegAdmin();

$this->path = 'admin/cruds/versiones_list';
$this->path_rel = 'admin/cruds/versiones';

	}

function _remap($param) {
    $this->index($param);
}

public function index($rel_proyecto) {

$this->rel_proyecto = $rel_proyecto;
$this->parameters['data']['rel_proyecto'] = $this->rel_proyecto;
$row_rel_proyecto = $this->Model->getRow('proyectos', $this->rel_proyecto);
$this->rel_proyecto_nombre = $row_rel_proyecto->nombre;

$this->parameters['path_rel'] = $this->path_rel;
$this->parameters['path_rel_view'] = 'list';
$this->load->library('breadcrumb');
$this->parameters['breadcrumb'] = $this->breadcrumb->versiones();

// Actualizacion
$rows = $this->Model->getRowsJoin('versiones', 'id', array(), array('proyecto'=>$this->rel_proyecto));
foreach ($rows as $row) {
	$count_rows = $this->Model->records('tablas', '', '', array('version'=>$row['id']));
	$this->Model->update('versiones', array("tablas" => $count_rows), $row['id']);
}

		$this->parameters['template'] = 'ssp';
		$this->parameters['type'] = 'list';
		$this->parameters['path'] = $this->path;
		$this->parameters['title'] = 'Versiones';
		$this->parameters['subtitle'] = ''; 
		$this->parameters['head_title'] = $this->parameters['title'];
		$this->admin_design->layout3($this->parameters);
	}

}