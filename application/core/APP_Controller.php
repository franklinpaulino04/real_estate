<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class APP_Controller extends MY_Controller {

    public $fetch_class;
    public $fetch_method;

    public function __construct()
    {
        parent::__construct();
        //$this->secure->is_logged_in($this->session->userdata('is_logged_in'));
        $this->fetch_class  = $this->router->fetch_class().'/'.$this->router->fetch_method();
        $this->fetch_method = $this->router->fetch_method();

//        print_d($this->fetch_class);

    }
}