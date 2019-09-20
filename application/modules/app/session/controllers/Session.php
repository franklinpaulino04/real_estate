<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Session extends APP_Controller
{
    public $namespace;
    public $title;

    public function __construct()
    {
        parent::__construct();
        $this->namespace                = "app";
        $this->title                    = '';
    }

    public function index()
    {
        $data ['content']               = 'session/session_view';

        $this->load->view('includes/template', $data);
    }

}