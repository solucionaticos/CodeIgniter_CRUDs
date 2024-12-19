<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Breadcrumb {

	public function campos() {
		$CI =& get_instance();

		return '
			<ol class="breadcrumb">
				<li><a href="'.base_url().'"><i class="fa fa-dashboard"></i> Inicio</a></li>
				<li><a href="'.base_url().'admin/cruds/proyectos"></i> Proyectos</a></li>
				<li class="breadcrumb-name"><a href="'.base_url().'admin/cruds/proyectos/edit/'.$CI->rel_proyecto.'"></i> Proyecto: <b>'.$CI->rel_proyecto_nombre.'</b></a></li>
				<li><a href="'.base_url().'admin/cruds/versiones_list/'.$CI->rel_proyecto.'"></i> Versiones</a></li>
				<li class="breadcrumb-name"><a href="'.base_url().'admin/cruds/versiones/edit/'.$CI->rel_version.'"></i> Versión: <b>'.$CI->rel_version_nombre.'</b></a></li>
				<li><a href="'.base_url().'admin/cruds/tablas_list/'.$CI->rel_version.'"></i> Tablas</a></li>
				<li class="breadcrumb-name"><a href="'.base_url().'admin/cruds/tablas/edit/'.$CI->rel_tabla.'"></i> Tabla: <b>'.$CI->rel_tabla_nombre.'</b></a></li>
				<li class="active"><a href="'.base_url().'admin/cruds/campos_list/'.$CI->rel_tabla.'"></i> Campos</a></li>
			</ol>';

	}

	public function tablas() {
		$CI =& get_instance();

		return '
			<ol class="breadcrumb">
				<li><a href="'.base_url().'"><i class="fa fa-dashboard"></i> Inicio</a></li>
				<li><a href="'.base_url().'admin/cruds/proyectos"></i> Proyectos</a></li>
				<li class="breadcrumb-name"><a href="'.base_url().'admin/cruds/proyectos/edit/'.$CI->rel_proyecto.'"></i> Proyecto: <b>'.$CI->rel_proyecto_nombre.'</b></a></li>
				<li><a href="'.base_url().'admin/cruds/versiones_list/'.$CI->rel_proyecto.'"></i> Versiones</a></li>
				<li class="breadcrumb-name"><a href="'.base_url().'admin/cruds/versiones/edit/'.$CI->rel_version.'"></i> Versión: <b>'.$CI->rel_version_nombre.'</b></a></li>
				<li class="active"><a href="'.base_url().'admin/cruds/tablas_list/'.$CI->rel_version.'"></i> Tablas</a></li>
			</ol>';

	}

	public function versiones() {
		$CI =& get_instance();

		return '
			<ol class="breadcrumb">
				<li><a href="'.base_url().'"><i class="fa fa-dashboard"></i> Inicio</a></li>
				<li><a href="'.base_url().'admin/cruds/proyectos"></i> Proyectos</a></li>
				<li class="breadcrumb-name"><a href="'.base_url().'admin/cruds/proyectos/edit/'.$CI->rel_proyecto.'"></i> Proyecto: <b>'.$CI->rel_proyecto_nombre.'</b></a></li>
				<li class="active"><a href="'.base_url().'admin/cruds/versiones_list/'.$CI->rel_proyecto.'"></i> Versiones</a></li>
			</ol>';

	}

}
