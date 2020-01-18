<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Blogs extends APP_Controller
{
    public $namespace;
    public $title;

    public function __construct()
    {
        parent::__construct();
        $this->namespace                = "app";
        $this->title                    = '';


        $this->load->model('blogs/blogs_model');
    }

    public function index()
    {
        $data ['content']               = 'blogs/blogs_view';
        $this->load->view('includes/template', $data);
    }
}
