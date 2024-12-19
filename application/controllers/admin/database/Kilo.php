<?php
defined("BASEPATH") OR exit("Direct access to this script is not allowed.");

class Kilo extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
    	echo "Kilo";
    	die();
    }

}

