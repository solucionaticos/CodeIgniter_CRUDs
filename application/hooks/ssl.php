<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function redirect_ssl() {
	$CI =& get_instance();
	$class = $CI->router->fetch_class();
	$exclude =  array('client');  // add more controller name to exclude ssl.

	if (ENVIRONMENT === 'production') {

		if(!in_array($class,$exclude)) {
		// redirecting to ssl.
			$CI->config->config['base_url'] = str_replace('http://', 'https://', $CI->config->config['base_url']);
			if (strpos($_SERVER['HTTP_CF_VISITOR'],"https") == 0) redirect($CI->uri->uri_string());
		} else {
		// redirecting with no ssl.
			$CI->config->config['base_url'] = str_replace('https://', 'http://', $CI->config->config['base_url']);
			if (strpos($_SERVER['HTTP_CF_VISITOR'],"https") > 0) redirect($CI->uri->uri_string());
		}

	} else {

		if(!in_array($class,$exclude)) {
		// redirecting to ssl.
			$CI->config->config['base_url'] = str_replace('http://', 'https://', $CI->config->config['base_url']);
			if ($_SERVER['SERVER_PORT'] != 443) redirect($CI->uri->uri_string());
		} else {
		// redirecting with no ssl.
			$CI->config->config['base_url'] = str_replace('https://', 'http://', $CI->config->config['base_url']);
			if ($_SERVER['SERVER_PORT'] == 443) redirect($CI->uri->uri_string());
		}

	}

}
