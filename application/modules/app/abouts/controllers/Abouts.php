<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Abouts extends APP_Controller
{
    public $namespace;
    public $title;

    public function __construct()
    {
        parent::__construct();
        $this->namespace                = "app";
        $this->title                    = '';


        $this->load->model('abouts/abouts_model');
    }

    public function index()
    {
        $data ['content']               = 'abouts/abouts_view';
        $this->load->view('includes/template', $data);
    }
}
