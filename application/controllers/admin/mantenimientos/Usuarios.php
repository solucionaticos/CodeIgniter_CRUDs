<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends MY_Controller {

	public $usuario = 0;
	public $tablaNombre = 'mantenimientos';
	public $tablaTitulo = 'Mantenimiento';

	public function __construct() {
		parent::__construct();
		$this->ctrSegAdmin();
		if ($this->session->userdata($this->config->item('raiz') . 'be_usuario_id') > 1) redirect($this->config->item('adminPath') . '/informacion');
		$this->load->library('grocery_CRUD');
	}

	public function index() {
		$crud = new grocery_CRUD();
		$crud->set_language($this->session->userdata($this->config->item('raiz') . 'be_lang_value'));

		$crud->set_table($this->config->item('raiz_bd') . $this->tablaNombre);
		$crud->columns('nombre', 'apellidos', 'correo', 'foto', 'language', 'estado', 'fecha_ingreso', 'fecha_ultimo_ingreso', 'ultima_ip', 'fecha_activacion', 'fecha_cambio_clave');     
		$crud->fields('nombre', 'apellidos', 'correo', 'foto', 'language', 'fecha_nacimiento', 'pais', 'departamento', 'ciudad', 'telefono', 'facebook', 'whatsapp', 'skype', 'instagram', 'google', 'linkdn', 'estado', 'fecha_ingreso', 'fecha_cambio_clave');

		$state_code = $crud->getState();
		if($state_code == 'add') {
		}
		if($state_code == 'edit') {
			$crud->field_type('correo', 'hidden');
		}

		$crud->set_rules('correo', 'Correo', 'required|valid_email|callback_correo_validacion['.$state_code.']');

		$crud->set_rules('nombre', 'Nombre', 'required');			
		$crud->set_rules('apellidos', 'Apellidos', 'required');	
//		$crud->set_rules('perfil', 'Perfil', 'required');		
		$crud->set_rules('estado', 'Estado', 'required');			

//		$crud->set_relation('perfil', $this->config->item('raiz_bd') . 'datos_valores', 'nombre', 'dato = (SELECT id FROM ' . $this->config->item('raiz_bd') . 'datos WHERE codigo = "perfiles") AND auxiliar_1 = "usuarios"', 'orden ASC');
		$crud->set_relation('estado', $this->config->item('raiz_bd') . 'datos_valores', 'nombre', 'dato = (SELECT id FROM ' . $this->config->item('raiz_bd') . 'datos WHERE codigo = "activo_inactivo")', 'nombre ASC');  // Estado
		$crud->set_relation('language', $this->config->item('raiz_bd') . 'languages', 'name');

		$crud->set_field_upload('foto','assets/fotos/' . $this->tablaNombre );
		$crud->add_action('Actividad', site_url('assets/iconos/configurar.png'), $this->config->item('adminPath') . '/'.$this->tablaNombre.'/usuarios/actividad');
		$crud->add_action('Enviar Credenciales', site_url('assets/iconos/llave.png'), $this->config->item('adminPath') . '/'.$this->tablaNombre.'/usuarios/envio_credenciales');

		$crud->field_type('fecha_ingreso', 'hidden');
		$crud->field_type('fecha_cambio_clave', 'hidden');
		$crud->callback_before_insert(array($this, 'usuario_before_insert'));
		$crud->callback_before_update(array($this, 'usuario_before_update'));

		$crudTabla = $crud->render();
		$this->crudver($crudTabla, 'Usuarios ('.$this->tablaTitulo.')');

	}

	public function correo_validacion($correo, $state_code) {
		if ($state_code == 'insert_validation') {
			$correoCtr = $this->Modelo->registros($this->config->item('raiz_bd') . $this->tablaNombre, 'id', array('correo' => $correo) );
			if (count($correoCtr)) {
				$this->form_validation->set_message('correo_validacion', 'El campo %s debe contener un valor único.');
				return FALSE;	
			} else {
				return TRUE;	
			}
		} else {
			return TRUE;
		}
	}

	public function usuario_before_insert ($post, $id = null) {
		foreach ($post as $key => $value) {
			$post[$key] = $this->security->xss_clean($value);
		}
		$post['fecha_ingreso'] = $this->config->item('YmdHis');
		$post['fecha_cambio_clave'] = $this->config->item('Ymd');
		return $post;
	}   

	public function usuario_before_update ($post, $id = null) {
		foreach ($post as $key => $value) {
			$post[$key] = $this->security->xss_clean($value);
		}           
		return $post;
	}  	

	public function actividad($id) {
		if ($this->session->userdata($this->config->item('raiz') . 'be_usuario_id') > 1) redirect($this->config->item('adminPath') . '/informacion');
		$this->usuario = $id;
		$crud = new grocery_CRUD();
		$crud->set_language($this->session->userdata($this->config->item('raiz') . 'be_lang_value'));

		$crud->set_table($this->config->item('raiz_bd') . $this->tablaNombre . '_actividad');
		$crud->where('usuario', $id);			
		$crud->columns('fecha_ingreso', 'ip', 'pais', 'tipo_agente', 'agente', 'fecha_ultima_accion', 'permanencia');
		$crud->set_relation('pais', $this->config->item('raiz_bd') . 'paises', 'nombre_en');
		$crud->set_relation('tipo_agente', $this->config->item('raiz_bd') . 'datos_valores', 'nombre', 'dato = (SELECT id FROM ' . $this->config->item('raiz_bd') . 'datos WHERE codigo = "tipos_agentes")', 'orden ASC');
		$crud->set_relation('agente', $this->config->item('raiz_bd') . 'datos_valores', 'nombre', 'dato = (SELECT id FROM ' . $this->config->item('raiz_bd') . 'datos WHERE codigo = "agentes")', 'orden ASC');
		$crud->add_action('Detalle', site_url('assets/iconos/configurar.png'), $this->config->item('adminPath') . '/'.$this->tablaNombre.'/usuarios/detalle');
		$crud->unset_operations();
		$crud->order_by('fecha_ingreso','desc');

		$crud->callback_column('permanencia',array($this,'_callback_permanencia'));		

		$crudTabla = $crud->render();

		$nombreUsuario= '';
		$usuario = $this->Modelo->registro($this->config->item('raiz_bd') . $this->tablaNombre, $id);
		if ( count($usuario) ) {
			$nombreUsuario = $usuario->nombre . " " . $usuario->apellidos;
		} else {
			$nombreUsuario = "Usuario no encontrado";
		}

		$this->crudver($crudTabla, 'Actividad (del usuario: "' . $nombreUsuario . '")', '
			<ol class="breadcrumb">
				<li><a href="'.base_url().$this->config->item('adminPath') . '/'.$this->tablaNombre.'/usuarios">Usuarios ('.$this->tablaTitulo.')</a></li>
				<li class="active">Actividad</li>
			</ol>');

	}

	public function _callback_permanencia($value, $row) {
		return $this->utilities->time($value);
	}

	public function detalle($id) {
		if ($this->session->userdata($this->config->item('raiz') . 'be_usuario_id') > 1) redirect($this->config->item('adminPath') . '/informacion');
		$crud = new grocery_CRUD();
		$crud->set_language($this->session->userdata($this->config->item('raiz') . 'be_lang_value'));

		$crud->set_table($this->config->item('raiz_bd') . $this->tablaNombre . '_actividad_detalle');
		$crud->where('actividad', $id);			
		$crud->columns('fecha', 'ruta');
		//$crud->set_relation('ruta', $this->config->item('raiz_bd') . 'datos_valores', 'nombre', 'dato = (SELECT id FROM ' . $this->config->item('raiz_bd') . 'datos WHERE codigo = "rutas")', 'orden ASC');
    $crud->set_relation('ruta', $this->config->item('raiz_bd') . 'rutas', 'nombre');
		$crud->unset_operations();
		$crud->order_by('fecha','desc');
		$crudTabla = $crud->render();

		$usuario_id = 0;
		$actividad_fecha = '';
		$actividad = $this->Modelo->registro($this->config->item('raiz_bd') . $this->tablaNombre . '_actividad', $id);
		if ( count($actividad) ) {
			$usuario_id = $actividad->usuario;
			$actividad_fecha = $actividad->fecha_ingreso;
		} else {
			$actividad_fecha = 'Fecha no encontrada';
		}

		$nombreUsuario= '';
		$usuario = $this->Modelo->registro($this->config->item('raiz_bd') . $this->tablaNombre, $usuario_id);
		if ( count($usuario) ) {
			$nombreUsuario = $usuario->nombre . " " . $usuario->apellidos;
		} else {
			$nombreUsuario = "Usuario no encontrado";
		}

		$this->crudver($crudTabla, 'Actividad del '.$actividad_fecha.' (del usuario: "' . $nombreUsuario . '")', '
			<ol class="breadcrumb">
				<li><a href="'.base_url().$this->config->item('adminPath') . '/'.$this->tablaNombre.'/usuarios">Usuarios ('.$this->tablaTitulo.')</a></li>
				<li><a href="'.base_url().$this->config->item('adminPath') . '/'.$this->tablaNombre.'/usuarios/actividad/'.$usuario_id.'">Actividad</a></li>
				<li class="active">Detalle</li>
			</ol>');

	}

	public function envio_credenciales($id) {
		$usuario = $this->Modelo->registro($this->config->item('raiz_bd') . $this->tablaNombre, $id);
		if (count($usuario)) {
			if ($usuario->estado == 1) {
				if (trim($usuario->clave) == '') {
//					$perfil = $this->Modelo->registro($this->config->item('raiz_bd') . 'datos_valores', $usuario->perfil);
					$dato = $this->Modelo->registro($this->config->item('raiz_bd') . 'datos', 'tablas_usuarios', 'codigo');
					$tipoUsuario = $this->Modelo->registros($this->config->item('raiz_bd') . 'datos_valores', '', array('dato' => $dato->id, 'auxiliar_1' => $this->tablaNombre) );
					$clave = $this->utilities->code(20);
					$datos['clave'] = sha1($clave);
					if ( $this->Modelo->actualizar($this->config->item('raiz_bd') . $this->tablaNombre, $datos, $id) ) {
						$datosCorreo['nombre'] = $usuario->nombre;
						$datosCorreo['apellidos'] = $usuario->apellidos;
						$datosCorreo['correo'] = $usuario->correo;
						$datosCorreo['clave'] = $clave;
						$datosCorreo['tipo_usuario'] = $tipoUsuario[0]['nombre'];
						$datosCorreo['perfil'] = '';
						$vista = $this->load->view($this->config->item('adminPath') . '/correos/enviar_credenciales', $datosCorreo, true);
						if ($this->utilities->sendEmail($usuario->correo, $this->lang->line('be_new_membership_in_company_name'), $vista, $this->config->item('email_member') )) {
							$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>Las credenciales fueron enviadas a '.$usuario->nombre.' '.$usuario->apellidos.'.'); 
							$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
						} else {
							$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>Las credenciales no fueron enviadas a '.$usuario->nombre.' '.$usuario->apellidos.'. No fue posible enviar el correo de confirmación del proceso.<br>'.$this->lang->line('be_please_try_again'));
							$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
						}	
					} else {
						$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible actualizar las credenciales a '.$usuario->nombre.' '.$usuario->apellidos.'. '.$this->lang->line('be_please_try_again'));
						$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
					}
				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible enviar las credenciales a '.$usuario->nombre.' '.$usuario->apellidos.' porque ya tiene una clave definida.');
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				}
			} else {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible enviar las credenciales a '.$usuario->nombre.' '.$usuario->apellidos.', el usuario debe estar activo. '.$this->lang->line('be_please_try_again'));
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
			}
		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>No fue posible enviar las credenciales. '.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
		}
		redirect(base_url() . $this->config->item('adminPath') . '/'.$this->tablaNombre.'/usuarios');
	}

}