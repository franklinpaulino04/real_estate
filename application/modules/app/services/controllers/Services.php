<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Services extends APP_Controller
{
    public $namespace;
    public $title;

    public function __construct()
    {
        parent::__construct();
        $this->namespace                = "app";
        $this->title                    = '';

		//load model
		$this->load->model('services/services_model');
    }

    public function index()
    {
        $data ['content']               = 'services/services_view';
		$data['services_rows']			= $this->services_model->get_by(array('hidden' => 0 , 'statusId' => 1));
        $this->load->view('includes/template', $data);
    }

    public function preview($serviceId)
    {
		$data ['content'] = 'services/services_preview_view';
		$data['row']      = $this->services_model->get_by(array('hidden' => 0 , 'statusId' => 1, 'serviceId' => $serviceId), TRUE);
		$this->load->view('includes/template', $data);
    }
}
