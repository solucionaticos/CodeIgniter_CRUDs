<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        // if (strpos($_SERVER['HTTP_CF_VISITOR'],"https") == 0) {
        //     $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        //     redirect($url);
        //     exit;
        // }
        
    }
  
    public function ctrSegAdmin() {
        if ( !$this->session->has_userdata('be_user_id') ) {
            // Error. You must authenticate to enter the application
            $this->session->set_flashdata('alertMessage', '<h4><i class="icon fa fa-ban"></i> Error </h4>Debes autenticarse para ingresar la aplicación.');
            $this->session->set_flashdata('alertType', 'danger'); // success, info, warning, danger
            redirect ('admin');
        }
    }
  
}