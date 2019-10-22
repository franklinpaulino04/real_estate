<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CP_Controller extends APP_Controller {

    public $fetch_class;
    public $fetch_method;

    public function __construct()
    {
        parent::__construct();

        $this->securities->cp_is_logged_in($this->session->userdata('cp_is_logged_in'));
        $this->fetch_class  = $this->router->fetch_class().'/'.$this->router->fetch_method();
        $this->fetch_method = $this->router->fetch_method();
    }
}