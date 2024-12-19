<?php
// Define la sesion
$this->session->set_userdata('fe_lista_deseos', $post['producuto']);

// Dato de la sesion
if ($this->session->userdata('be_usuario_id') > 1)
$this->session->userdata('fe_lista_deseos');

// Borrar sesion
$this->session->unset_userdata('be_usuario_id');

// pregunta si existe esta sesion
if ($this->session->has_userdata('fe_lista_deseos')) {
if ( !$this->session->has_userdata('be_user_id') ) {

------------- FLASH

print_r($this->session->flashdata());

$this->session->flashdata('flash_welcome');

$this->session->set_flashdata('flash_welcome', 'Hey, welcome to the site!');

if ( $this->session->flashdata('alertaMensaje') ) {



