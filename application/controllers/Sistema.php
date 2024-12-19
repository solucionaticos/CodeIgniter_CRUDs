<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// https://code.tutsplus.com/es/tutorials/build-your-own-captcha-and-contact-form-in-php--net-5362

// Seguridad:
//	HTTPS
//	Force HTTPS
//	CSRF Valid
//	SQL Injection
//	Password Encrypt
//	XSS Valid
//	Javscritp and PHP Fields Validation
//	Captcha
//	Validacion de usuarios nuevos con el correo
//	Restablecer contraseña con link al correo

// Caracteristicas Generales
//	URLs amigables
//	Manejo de Error 404 y 500
//	Registro e Ingreso con Facebook y Google
//	Diseño adaptativo para Computadore, Tabletas y Celulares
//	Codigo HTML, CSS y Javascript debidamente formado y minimizado
//	Imagenes cacheadas con CDN????
//		Entrega ultrarrápida de contenido estático y dinámico
//		Mayor agilidad y control sobre cómo se almacena el contenido en caché
//		Protección DDoS incorporada de uso no medido

// Links Interesantes
//   linkedin.com/in/jim-parry-b7179325
//   https://www.manuigniter.com/
//   http://www.phpcodebuilder.com/

// Registro con Facebook -> Udemy -> Clase 94
// https://www.udemy.com/course/crea-sistemas-ecommerce-con-php-y-con-pagos-de-paypal-y-payulatam/learn/lecture/8366410#overview

// Registro con Facebook -> Udemy -> Clase 99
// https://www.udemy.com/course/crea-sistemas-ecommerce-con-php-y-con-pagos-de-paypal-y-payulatam/learn/lecture/8366468#overview

class Sistema extends MY_Controller {

	public $parametros;
	public $sistema_id;

	public function __construct() {
		parent::__construct();
		$this->load->helper('cookie');
		$this->load->library('encryption');
		$this->sistema_id = 1;
	}

	public function index() {
		redirect('/sistema/ingreso');
	}

	public function ingreso() {
		$ingreso = false;

		if ($this->session->has_userdata('be_usuario_id')) {
			$id = $this->session->userdata('be_usuario_id');
			$usuario = $this->Model->registros('usuarios', '', array('id' => $id, 'estado_id' => 1) );
			if ( count($usuario) ) {
				$ctrCookie = false;
				$this->credenciales($usuario[0], $ctrCookie);
			} else {
				$ingreso = true;
			}
		} else {
			if ( get_cookie('ctr_user') ) {
				$idEncriptado = get_cookie('ctr_user');
				$id = $this->encryption->decrypt($idEncriptado);
				$usuario = $this->Model->registros('usuarios', '', array('id' => $id, 'estado_id' => 1) );
				if ( count($usuario) ) {
					$ctrCookie = false;
					$this->credenciales($usuario[0], $ctrCookie);
				} else {
					$ingreso = true;
				}
			} else {
				$ingreso = true;
			}
		}

		if ($ingreso) {

			$csrf = md5(uniqid(mt_rand(), true));
			$this->session->set_userdata('csrf', $csrf);
			$data['csrf'] = $csrf;

			$proyVar = array(
				'base_url' => base_url()
			);
			$data['proyVar'] = '<script>var proyVar =' . json_encode($proyVar) . ';</script>';
			$data['txtVar'] = '<script>var txtVar =' .  json_encode($this->lang->language) . ';</script>';
			$data['sistema_id'] = $this->sistema_id;

			$this->load->view('sistema/ingreso', $data);

		}
	}

	public function ingreso_validacion() {

		$post = $this->input->post(NULL, TRUE);
		if (!empty($post)) {
			foreach ($post as $key => $value) {
				$post[$key] = $this->security->xss_clean($value);
			}

			$xss = false;
			if ( isset($post['email']) ) if (!$this->urlnoxss ($post['email'])) $xss = true;
			if ( isset($post['password']) ) if (!$this->urlnoxss ($post['password'])) $xss = true;
			if ( isset($post['sistema_id']) ) if (!$this->urlnoxss ($post['sistema_id'])) $xss = true;
			if ($xss) {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_data_could_not_be_processed').'<br>'.$this->lang->line('be_please_try_again'));
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				redirect('/sistema/ingreso');   
			}

			if ( isset($post['csrf']) && $post['csrf'] == $this->session->userdata('csrf') ) {
				$this->session->unset_userdata('csrf');
			} else {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_data_could_not_be_processed').'<br>'.$this->lang->line('be_please_try_again'));
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				redirect('/sistema/ingreso');   
			}

			if ( isset($post['captcha_challenge']) && strtoupper($post['captcha_challenge']) == $this->session->userdata('captcha_text') ) {
				$this->session->unset_userdata('captcha_text');
			} else {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_you_must_write_correctly_the_text_of_the_image').'<br>'.$this->lang->line('be_please_try_again'));
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				redirect('/sistema/ingreso');   
			}

// ------------------------------------------------------------------------------------------
			$this->form_validation->set_rules('email', 'Correo', 'max_length[70]|valid_email|required|trim|xss_clean', 
				array(
					'required' => $this->lang->line('be_the_email_field_is_required'),
					'valid_email' => $this->lang->line('be_your_email_must_be_in_the_format_name_domain_com')
				)                       
			);
			$this->form_validation->set_rules('password', 'Clave', 'min_length[7]|max_length[20]|required|trim|xss_clean',
				array(
					'required' => $this->lang->line('be_the_password_field_is_required'),
					'min_length' => $this->lang->line('be_your_password_must_have_at_least_7_characters'), 
					'max_length' => $this->lang->line('be_your_password_must_have_a_maximum_of_20_characters')
				)                       
			);
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.validation_errors().$this->lang->line('be_please_try_again'));
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				redirect('/sistema/ingreso');           
			} else {
				$usuario = $this->Model->registros('usuarios', '', array('email' => $post['email'], 'sistema_id' => $post['sistema_id'] ) );
				if ( count($usuario) ) {
					// if ( $usuario[0]['password'] === $post['password'] ) {
					if (password_verify($post['password'], $usuario[0]['password'])) {
						if ($usuario[0]['estado_id'] == 1) {
							$ctrCookie = false;
							if (isset($post['recuerdame'])) {
								$ctrCookie = true;
							}
							$this->credenciales($usuario[0], $ctrCookie);
						} else {
							$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_user_disabled__contact_your_system_administrator'));
							$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
							redirect('/sistema/ingreso');    
						}
					} else {
						$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_invalid_password').'<br>'.$this->lang->line('be_please_try_again'));
						$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
						redirect('/sistema/ingreso');    
					}
				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_invalid_email').'<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
					redirect('/sistema/ingreso');    
				}
			}
// ------------------------------------------------------------------------------------------
		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
			redirect('/sistema/ingreso');
		}

	}

	public function olvido() {

		$csrf = md5(uniqid(mt_rand(), true));
		$this->session->set_userdata('csrf', $csrf);
		$data['csrf'] = $csrf;

		$proyVar = array(
			'base_url' => base_url()
		);
		$data['proyVar'] = '<script>var proyVar =' . json_encode($proyVar) . ';</script>';
		$data['txtVar'] = '<script>var txtVar =' .  json_encode($this->lang->language) . ';</script>';
		$data['sistema_id'] = $this->sistema_id;

		$this->load->view('sistema/olvido', $data);

	}

	public function validacion_olvido() {
		$post = $this->input->post(NULL, TRUE);
		if (!empty($post)) {
			foreach ($post as $key => $value) {
				$post[$key] = $this->security->xss_clean($value);
			}

			$xss = false;
			if ( isset($post['email']) ) if (!$this->urlnoxss ($post['email'])) $xss = true;
			if ( isset($post['sistema_id']) ) if (!$this->urlnoxss ($post['sistema_id'])) $xss = true;
			if ($xss) {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_data_could_not_be_processed').'<br>'.$this->lang->line('be_please_try_again'));
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				redirect('/sistema/ingreso');   
			}

			if ( isset($post['csrf']) && $post['csrf'] == $this->session->userdata('csrf') ) {
				$this->session->unset_userdata('csrf');
			} else {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_data_could_not_be_processed').'<br>'.$this->lang->line('be_please_try_again'));
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				redirect('/sistema/olvido');   
			}

			if ( isset($post['captcha_challenge']) && strtoupper($post['captcha_challenge']) == $this->session->userdata('captcha_text') ) {
				$this->session->unset_userdata('captcha_text');
			} else {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_you_must_write_correctly_the_text_of_the_image').'<br>'.$this->lang->line('be_please_try_again'));
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				redirect('/sistema/olvido');   
			}

// ------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------
              // $this->form_validation->set_rules('tu_id', 'Tabla de Usuario', 'numeric|required|trim|xss_clean');
              $this->form_validation->set_rules('email', 'Correo', 'max_length[70]|valid_email|required|trim|xss_clean');
              if ($this->form_validation->run() == FALSE) {
                  $this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.validation_errors().'<br>'.$this->lang->line('be_please_try_again'));
                  $this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
                  redirect('/sistema/olvido');           
              } else {


                  $usuario = $this->Model->registros('usuarios', '', array('email' => $post['email']) );
                  if ( count($usuario) ) {

					$permitted_chars = '1234567890qwertyuiopasdfghjklzxcvbnm';
					$string_length = 20;
					$codigo = $this->generate_string($permitted_chars, $string_length);

					$data['usuario_id'] = $usuario[0]['id'];
					$data['sistema_id'] = $post['sistema_id'];
					$data['codigo'] = $codigo;
					$data['fecha_solicitud'] = $this->config->item('Ymd2His'); // + 2 horas

					if ( $this->Model->insertar('usuarios_cambios_claves', $data, $usuario[0]['id']) ) {
              // -----------------------------------------------------------------------------------
						$data_email = array(
							'codigo' =>  $codigo,
							'nombre'=> $usuario[0]['nombre']
						);

                      $message = $this->load->view('sistema/correos/nueva_clave', $data_email, true);
                      if ($this->sendEmail($usuario[0]['email'], $this->lang->line('be_define_a_new_password'), $message)) {

                        $this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>'.$this->lang->line('be_we_have_sent_a_message_to_your_email_to_define_a_new_password')); 
                        $this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
                        redirect('/sistema/ingreso'); 
                      } else {
                        $this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_it_was_not_possible_to_process_your_request').'<br>'.$this->lang->line('be_please_try_again'));
                        $this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
                        redirect('/sistema/olvido');  
                      }
              // -----------------------------------------------------------------------------------
                    } else {
                      $this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_it_was_not_possible_to_process_your_request').'<br>'.$this->lang->line('be_please_try_again'));
                      $this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
                      redirect('/sistema/olvido');  
                    }
                  } else {
                    $this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_email_not_found'));
                    $this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
                    redirect('/sistema/olvido');    
                  }
              }
// ------------------------------------------------------------------------------------------

			echo "<pre>";
			print_r($post);
			echo "</pre>";

		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
			redirect('/sistema/olvido');
		}

	}

	public function nueva_clave($codigo_clave_cambio) {

		$csrf = md5(uniqid(mt_rand(), true));
		$this->session->set_userdata('csrf', $csrf);
		$data['csrf'] = $csrf;

		$data['codigo'] = $codigo_clave_cambio;

		$proyVar = array(
			'base_url' => base_url()
		);
		$data['proyVar'] = '<script>var proyVar =' . json_encode($proyVar) . ';</script>';
		$data['txtVar'] = '<script>var txtVar =' .  json_encode($this->lang->language) . ';</script>';
		$data['sistema_id'] = $this->sistema_id;

// ---------------------------------------------------------------------------------------------------------------

		$usuario_cambio_clave = $this->Model->registros('usuarios_cambios_claves', '', array('codigo'=>$codigo_clave_cambio, 'sistema_id'=>$this->sistema_id) );
		if (count($usuario_cambio_clave)) {
			if ( $usuario_cambio_clave[0]['fecha_solicitud'] > $this->config->item('YmdHis') ) {   

				$data['u_id'] = $usuario_cambio_clave[0]['usuario_id'];

				$this->load->view('sistema/nueva_clave', $data);

			} else {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_you_have_exceeded_the_time_limit_to_define_your_password').'<br>'.$this->lang->line('be_please_try_again'));
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				redirect('/sistema/olvido');    
			}
		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_user_not_found').'<br>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
			redirect('/sistema/olvido');    
		}

// ---------------------------------------------------------------------------------------------------------------

	}

	public function validacion_nueva_clave() {
		$post = $this->input->post(NULL, TRUE);
		if (!empty($post)) {
			foreach ($post as $key => $value) {
				$post[$key] = $this->security->xss_clean($value);
			}

			$xss = false;
			if ( isset($post['codigo']) ) if (!$this->urlnoxss ($post['codigo'])) $xss = true;
			if ( isset($post['u_id']) ) if (!$this->urlnoxss ($post['u_id'])) $xss = true;
			if ( isset($post['password']) ) if (!$this->urlnoxss ($post['password'])) $xss = true;
			if ( isset($post['sistema_id']) ) if (!$this->urlnoxss ($post['sistema_id'])) $xss = true;
			if ($xss) {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_data_could_not_be_processed').'<br>'.$this->lang->line('be_please_try_again'));
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				redirect('/sistema/ingreso');   
			}

			if ( isset($post['csrf']) && $post['csrf'] == $this->session->userdata('csrf') ) {
				$this->session->unset_userdata('csrf');
			} else {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_data_could_not_be_processed').'<br>'.$this->lang->line('be_please_try_again'));
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				redirect('/sistema/nueva_clave');   
			}

			if ( isset($post['captcha_challenge']) && strtoupper($post['captcha_challenge']) == $this->session->userdata('captcha_text') ) {
				$this->session->unset_userdata('captcha_text');
			} else {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_you_must_write_correctly_the_text_of_the_image').'<br>'.$this->lang->line('be_please_try_again'));
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				redirect('/sistema/nueva_clave');   
			}

// ------------------------------------------------------------------------------------------

			$this->form_validation->set_rules('codigo', 'Codigo', 'required|trim|xss_clean');
			$this->form_validation->set_rules('u_id', 'Usuario', 'numeric|required|trim|xss_clean');
			$this->form_validation->set_rules('sistema_id', 'Sistema', 'numeric|required|trim|xss_clean');
			$this->form_validation->set_rules('password', 'Clave', 'min_length[7]|max_length[20]|required|trim|xss_clean');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.validation_errors().'<br>'.$this->lang->line('be_please_try_again'));
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				redirect('/sistema/nueva_clave/' . $post['codigo']);           
			} else {
				$usuario = $this->Model->registros('usuarios', '', array('id'=>$post['u_id']) );
				if (count($usuario)) {
					$usuario_cambio_clave = $this->Model->registros('usuarios_cambios_claves', '', array('codigo'=>$post['codigo'], 'sistema_id'=>$post['sistema_id']) );
					if (count($usuario_cambio_clave) and $usuario_cambio_clave[0]['fecha_solicitud'] > $this->config->item('YmdHis') ) {  
						  $password = password_hash($post['password'], PASSWORD_BCRYPT, array('cost' => 10));	
	                      $datos['password'] = $password;
	                      if ( $this->Model->actualizar('usuarios', $datos, $usuario[0]['id']) ) {
	                        $datosCorreo['nombre'] = $usuario[0]['nombre'];
	                        $message = $this->load->view('sistema/correos/nueva_clave_actualizada', $datosCorreo, true);
							if ($this->sendEmail($usuario[0]['email'], $this->lang->line('be_new_updated_password'), $message)) {
								$data_ucc['codigo'] = '';
								$data_ucc['fecha_cambio'] = $this->config->item('YmdHis');
								$this->Model->actualizar('usuarios_cambios_claves', '', '', array('codigo'=>$post['codigo']));
	                            $this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>'.$this->lang->line('be_your_new_password_has_been_updated'));
	                            $this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
	                        } else {
	                            $this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_your_new_password_has_been_updated').' '.$this->lang->line('be_it_was_not_possible_to_send_the_process_confirmation_email').'<br>'.$this->lang->line('be_please_try_again'));
	                            $this->session->set_flashdata('alertaTipo', 'info'); // success, info, warning, danger
	                        }
	                        redirect('/sistema/ingreso');    
	                      } else {
	                        $this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_it_was_not_possible_to_update_your_new_password').'<br>'.$this->lang->line('be_please_try_again'));
	                        $this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
	                        redirect('/sistema/nueva_clave/' . $post['codigo']);    
	                      }
                    } else {
                        $this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_it_was_not_possible_to_update_your_new_password_because_you_have_exceeded_the_time_limit_to_do_so').'<br>'.$this->lang->line('be_please_try_again'));
                        $this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
                        redirect('/sistema/nueva_clave/' . $post['codigo']);    
                    }
				} else {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_it_was_not_possible_to_update_your_new_password_because_your_user_was_not_found').'<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
					redirect('/sistema/nueva_clave/' . $post['codigo']);    
				}
			}

// ------------------------------------------------------------------------------------------

		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
			redirect('/sistema/ingreso');
		}

	}

	public function registro() {

		$csrf = md5(uniqid(mt_rand(), true));
		$this->session->set_userdata('csrf', $csrf);
		$data['csrf'] = $csrf;

		$proyVar = array(
			'base_url' => base_url()
		);
		$data['proyVar'] = '<script>var proyVar =' . json_encode($proyVar) . ';</script>';
		$data['txtVar'] = '<script>var txtVar =' .  json_encode($this->lang->language) . ';</script>';
		$data['sistema_id'] = $this->sistema_id;

	    $this->load->view('sistema/registro', $data);

	}

	public function validacion_registro() {

		$post = $this->input->post(NULL, TRUE);
		if (!empty($post)) {
			foreach ($post as $key => $value) {
				$post[$key] = $this->security->xss_clean($value);
			}

			$xss = false;
			if ( isset($post['password']) ) if (!$this->urlnoxss ($post['password'])) $xss = true;
			if ( isset($post['nombre']) ) if (!$this->urlnoxss ($post['nombre'])) $xss = true;
			if ( isset($post['apellidos']) ) if (!$this->urlnoxss ($post['apellidos'])) $xss = true;
			if ( isset($post['email']) ) if (!$this->urlnoxss ($post['email'])) $xss = true;
			if ( isset($post['sistema_id']) ) if (!$this->urlnoxss ($post['sistema_id'])) $xss = true;
			if ($xss) {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_data_could_not_be_processed').'<br>'.$this->lang->line('be_please_try_again'));
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				redirect('/sistema/ingreso');   
			}

			if ( isset($post['csrf']) && $post['csrf'] == $this->session->userdata('csrf') ) {
				$this->session->unset_userdata('csrf');
			} else {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_data_could_not_be_processed').'<br>'.$this->lang->line('be_please_try_again'));
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				redirect('/sistema/registro');   
			}

			if ( isset($post['captcha_challenge']) && strtoupper($post['captcha_challenge']) == $this->session->userdata('captcha_text') ) {
				$this->session->unset_userdata('captcha_text');
			} else {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_you_must_write_correctly_the_text_of_the_image').'<br>'.$this->lang->line('be_please_try_again'));
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				redirect('/sistema/registro');   
			}

			if ( isset($post['terminos']) ) {

				// $this->form_validation->set_rules('tu_id', 'Tabla de Usuario', 'numeric|required|trim|xss_clean');
				$this->form_validation->set_rules('nombre', 'Nombre', 'max_length[50]|required|trim|xss_clean');
				$this->form_validation->set_rules('apellidos', 'Apellidos', 'max_length[50]|required|trim|xss_clean');
				$this->form_validation->set_rules('email', 'Correo', 'max_length[70]|valid_email|required|trim|xss_clean');
				$this->form_validation->set_rules('password', 'Clave', 'min_length[7]|max_length[20]|required|trim|xss_clean');
				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.validation_errors().'<br>'.$this->lang->line('be_please_try_again'));
					$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
					redirect('/sistema/registro');    
				} else {

					$permitted_chars = '1234567890qwertyuiopasdfghjklzxcvbnm';
					$string_length = 20;
					$codigo_activacion = $this->generate_string($permitted_chars, $string_length);

					$password = password_hash($post['password'], PASSWORD_BCRYPT, array('cost' => 10));	

		            $data = array(
		            	'sistema_id' => $post['sistema_id'], 
						'nombre_completo' => $post['nombre'] . ' ' . $post['apellidos'], 
		                'nombre' => $post['nombre'], 
		                'apellidos' => $post['apellidos'], 
		                'email' => $post['email'], 
		                'password' => $password, 
		                'estado_id' => 0, 
		                'fecha_registro' => $this->config->item('YmdHis'), 
		                'codigo_activacion' => $codigo_activacion 
		            );
		            $id = $this->Model->insertar('usuarios', $data);
		            if ($id > 0) {

						echo "Aqui ya quedo registrado, ahora o bien puede ingresar al sistema o esperar una activacion al correo para que pueda entrar";

						echo "<br>";
						$data_email = array(
							'nombre' => $post['nombre'],
							'codigo_activacion'=> $codigo_activacion
						);
						$message = $this->load->view('sistema/correos/bienvenida',$data_email,true);
						if ($this->sendEmail($post['email'], $this->lang->line('be_welcome'), $message)) {
							echo "Correo enviado";
						} else {
							echo "Correo no enviado";
						}

						echo "<pre>";
						print_r($post);
						echo "</pre>";

						// $datosCorreo['codigo'] = $codigo;
						// $datosCorreo['nombre'] = $post['nombre'];
						// $datosCorreo['apellidos'] = $post['apellidos'];
						// $vista = $this->load->view('admin/correos/bienvenida', $datosCorreo, true);

						// if ($this->sendEmail($post['correo'], $this->lang->line('be_welcome'), $vista, 'solucionaticos@gmail.com')) {
						// 	$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-check"></i> '.$this->lang->line('be_successful_operation').'</h4>'.$this->lang->line('be_we_have_sent_a_message_to_your_email_to_activate_your_membership'));
						// 	$this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
						// } else {
						// 	$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_it_was_not_possible_to_send_the_process_confirmation_email').'<br>'.$this->lang->line('be_please_try_again'));
						// 	$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
						// }

						// redirect('/sistema');    

		            } else {

						$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_it_was_not_possible_to_create_your_membership').'<br>'.$this->lang->line('be_please_try_again'));
						$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
						redirect('/sistema/registro');

		            }


				}


			} else {
				$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_please_try_again'));
				$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
				redirect('/sistema/registro');
			}

		} else {
			$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_please_try_again'));
			$this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
			redirect('/sistema/registro');
		}

	}

// --------------------------------------------------------------------------------------------------------------------------

	public function credenciales($usuario, $ctrCookie) {

		if ($ctrCookie) {
			$idEncriptado = $this->encryption->encrypt($usuario['id']);
			$cookie = array(
				'name'   => 'ctr_user',
				'value'  => $idEncriptado,
				'expire' => $this->config->item('1month')
			);
			$this->input->set_cookie($cookie);
		}

// ---------------------------------------------------------------------------
$permitted_chars = '1234567890#$%&()=<>*[];:_+{},.-qwertyuiopasdfghjklzxcvbnm';
$string_length = 20;
$session = $this->generate_string($permitted_chars, $string_length);

$data_1['ultimo_ingreso'] = $this->config->item('YmdHis'); // date('Y-m-d H:i:s');
$data_1['ultima_ip'] = $this->input->ip_address();
$data_1['sesion'] = $session;
$this->Model->actualizar('usuarios', $data_1, $usuario['id']);

$this->session->set_userdata('be_usuario_id', $usuario['id']);
$this->session->set_userdata('be_usuario_nombre', $usuario['nombre']);
$this->session->set_userdata('be_usuario_apellidos', $usuario['apellidos']);
$this->session->set_userdata('be_usuario_correo', $usuario['email']);
$this->session->set_userdata('be_usuario_session', $session);

// ---------------------------------------------------------------------------
$html_inicio = '
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Sistema</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h1>Sistema</h1>
';

$html_fin = '
</div>
</body>
</html>
';
// ---------------------------------------------------------------------------

		echo $html_inicio;
		echo "<p><b>Nota:</b> ";
		if ($ctrCookie) {
			echo "Recuerdame: " . $idEncriptado;
		} else {
			if ( get_cookie('ctr_user') ) {
				echo "Entre x la cookie";
			} else {
				echo "No me recuerdes";
			}
		}
		echo "</p>";
		echo "<br>";
		echo "<a href='".base_url()."sistema/salir' class='btn btn-primary btn-xs' role='button'>Salir</a>";
		echo $html_fin;

	}

	public function salir() {
		if (get_cookie('ctr_user')) {
			delete_cookie('ctr_user');
		}

		$this->session->unset_userdata('be_usuario_id');
		$this->session->unset_userdata('be_usuario_nombre');
		$this->session->unset_userdata('be_usuario_apellidos');
		$this->session->unset_userdata('be_usuario_correo');
		$this->session->unset_userdata('be_usuario_session');

		$this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-info"></i> '.$this->lang->line('be_successful_exit').'</h4>'.$this->lang->line('be_see_you_soon'));
		$this->session->set_flashdata('alertaTipo', 'info'); // success, info, warning, danger

		redirect('/sistema/ingreso');
	}

	public function correo_registro() {
		$post = $this->input->post(NULL, TRUE);
		if (!empty($post)) {
			foreach ($post as $key => $value) {
				$post[$key] = $this->security->xss_clean($value);
			}
			$usuarioCorreoCtr = $this->Model->registros('usuarios', '', array('email'=>$post['email'], 'sistema_id' => $post['sistema_id']) );
			if (count($usuarioCorreoCtr)) {
				echo "false"; // ya existe
			} else {
				echo "true"; // no existe
			}
		} else {
			echo "false"; // error
		}
	}

	public function activacion($codigo_activacion) {

	    $usuario = $this->Model->registros('usuarios', '', array('codigo_activacion'=>$codigo_activacion, 'estado_id' => 0) );
	    if (count($usuario)) {
	        $datos['estado_id'] = 1;
	        $datos['fecha_activacion'] = $this->config->item('YmdHis');
	        if ( $this->Model->actualizar('usuarios', $datos, $usuario[0]['id']) ) {
// -----------------------------------------------------------------------------------
				$data_email = array(
					'nombre' => $usuario[0]['nombre']
				);
				$message = $this->load->view('sistema/correos/membresia_activada',$data_email,true);
				if ($this->sendEmail($usuario[0]['email'], $this->lang->line('be_congratulations_your_membership_has_been_activated'), $message)) {
	                $this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_successful_operation').'</h4>'.$this->lang->line('be_your_membership_has_been_activated'));
	                $this->session->set_flashdata('alertaTipo', 'success'); // success, info, warning, danger
	            } else {
	                $this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_your_membership_has_been_activated').' '.$this->lang->line('be_it_was_not_possible_to_send_the_process_confirmation_email').'<br>'.$this->lang->line('be_please_try_again'));
	                $this->session->set_flashdata('alertaTipo', 'info'); // success, info, warning, danger
	            }	          

	            redirect('/sistema/ingreso');    
	        } else {
	          $this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_it_was_not_possible_to_activate_your_membership').'<br>'.$this->lang->line('be_please_try_again'));
	          $this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
	          redirect('/sistema/ingreso');    
	        }
	    } else {
	      $this->session->set_flashdata('alertaMensaje', '<h4><i class="icon fa fa-ban"></i> '.$this->lang->line('be_error').' </h4>'.$this->lang->line('be_data_could_not_be_processed').'<br>'.$this->lang->line('be_please_try_again'));
	      $this->session->set_flashdata('alertaTipo', 'danger'); // success, info, warning, danger
	      redirect('/sistema/ingreso');    
	    }

	}

	function generate_string($input, $strength = 10) {
	    $input_length = strlen($input);
	    $random_string = '';
	    for($i = 0; $i < $strength; $i++) {
	        $random_character = $input[mt_rand(0, $input_length - 1)];
	        $random_string .= $random_character;
	    }
	  
	    return $random_string;
	}

	public function captcha () {

		$permitted_chars = 'ABCDEFHJKMNPQRTUVWXY34789';

		$image = imagecreatetruecolor(150, 29);

		imageantialias($image, true);

		$red = 200;
		$green = 200;
		$blue = 200;

		$colors = imagecolorallocate($image, $red, $green, $blue);

		imagefill($image, 0, 0, $colors);

		$black = imagecolorallocate($image, 0, 0, 0);
		$white = imagecolorallocate($image, 255, 255, 255);
		$textcolors = [$black, $white];

		if (ENVIRONMENT === 'production') {
			$ruta_fuentes = $this->config->item('ruta_fuentes_produccion');
		} else {
			$ruta_fuentes = $this->config->item('ruta_fuentes_desarrollo');
		}

		$fonts = [$ruta_fuentes.'Acme-Regular.ttf', $ruta_fuentes.'Ubuntu-Regular.ttf', $ruta_fuentes.'Merriweather-Regular.ttf'];

		$string_length = 6;
		$captcha_string = $this->generate_string($permitted_chars, $string_length);

		$this->session->set_userdata('captcha_text', $captcha_string);

		$letter_space = 120/$string_length;
		$initial = 20;

		for($i = 0; $i < $string_length; $i++) {
			imagettftext($image, 14, 
				rand(-27, 27), 
				$initial + $i*$letter_space, 
				rand(18, 22), 
				$textcolors[rand(0, 1)], 
				$fonts[array_rand($fonts)], 
				$captcha_string[$i]);
		}

		header('Content-type: image/png');
		imagepng($image);
		imagedestroy($image);

	}

	public function urlnoxss ($str) {
		$str_url = urldecode($str);
		$str_no_doubles_spaces = str_replace("  ", " ", $str_url);
		$str_lower = strtolower($str_no_doubles_spaces);
		if (strpos($str_lower, 'select ') !== false) {
		    return false;
		} else {
			return true;
		}
	}


// ----------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------

	public function sendEmail($email, $subject, $message, $bcc = '') {

		$config = array(
			'protocol' => 'smtp',
			'mailpath' => '/usr/sbin/sendmail',
			'useragent' => 'Solucionáticos',
			'smtp_timeout' => 30,		
			'smtp_keepalive' => FALSE,
			'smtp_crypto' => 'tls',
			'wordwrap' => TRUE,
			'wrapchars' => 76,
			'priority' => 3,
			'charset' => 'iso-8859-1',	
			'validate' => FALSE,
			'smtp_host' => $this->config->item('email_smtp_host'),
			'smtp_user' => $this->config->item('email_smtp_user'),
			'smtp_pass' => $this->config->item('email_smtp_pass'),
			'smtp_port' => $this->config->item('email_smtp_port'),
			'crlf' => "\r\n",
			'newline' => "\r\n"
		);
		// port: 25, 465, 587
		$this->load->library('email', $config);
        $this->email->set_mailtype("html"); 

		$this->email->from($this->config->item('email_company'), $this->config->item('email_company_name'));
		if ($bcc != '') 
			$this->email->bcc($bcc); 
		else 
			$this->email->bcc($this->config->item('email_bbc')); 
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($message);  

		if ( $this->email->send() ) {
			return true;
		} else {
			return false;
		}

	}

}