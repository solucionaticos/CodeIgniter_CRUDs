<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilities {
  
  // Code Method
  public function code($num) {
      $str = "0123456789bcdfghjkmnpqrstvwxyz";
      $code = "";
      for($i=0;$i<20;$i++) $code .= substr($str,rand(0,30),1);
      return $code;
  }
  
  // public function sendEmail($to, $subject, $message, $bcc = '') {
  // 	$CI =& get_instance();
  // 	$CI->load->library('email');

  // 	$CI->email->initialize(array(
  // 		'protocol' => 'smtp',
  // 		'smtp_host' => $CI->config->item('email_smtp_host'),
  // 		'smtp_user' => $CI->config->item('email_smtp_user'),
  // 		'smtp_pass' => $CI->config->item('email_smtp_pass'),
  // 		'smtp_port' => 587,
  // 		'crlf' => "\r\n",
  // 		'newline' => "\r\n"
  // 	));

  // 	$CI->email->set_mailtype("html"); 

  // 	$CI->email->from($CI->config->item('email'), $CI->config->item('email_smtp_user_name'));
  // 	if ($bcc != '') $CI->email->bcc($bcc); 
  // 	$CI->email->to($to); 
  // 	$CI->email->subject($subject);
  // 	$CI->email->message($message);  
  // 	if ( $CI->email->send() ) {
  // 		return true;
  // 	} else {
  // 		show_error($CI->email->print_debugger());
  // 	}
  // }

}