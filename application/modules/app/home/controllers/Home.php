<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends APP_Controller
{
    public $namespace;
    public $title;

    public function __construct()
    {
        parent::__construct();
        $this->namespace                = "app";
        $this->title                    = '';

		//load model
		$this->load->model('home/services_model');
		$this->load->model('properties/properties_model');
    }

    public function index()
    {
        $data ['content']               = 'home/home_view';
        $data['services_rows']			= $this->services_model->get_by(array('hidden' => 0 , 'statusId' => 1));
        $data['properties_rows']		= $this->properties_model->get_properties_data();
        $this->load->view('includes/template', $data);
    }
}
