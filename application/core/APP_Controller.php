<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class APP_Controller extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->secure->is_logged_in($this->session->userdata('is_logged_in'));
    }
}