<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Properties extends APP_Controller
{
    public $namespace;
    public $title;

    public function __construct()
    {
        parent::__construct();
        $this->namespace                = "app";
        $this->title                    = '';

		$this->load->model('properties/properties_model');
		$this->load->model('properties/docs_model');
		$this->load->model('properties/register_model');
    }

    public function index()
    {
        $data ['content']               = 'properties/properties_view';
        $this->load->view('includes/template', $data);
    }

	public function preview($propertyId)
	{
		$data ['content']  = 'properties/properties_preview_view';
		$data['row']       = $this->properties_model->get_properties_by($propertyId);
		$data['row_docs']  = $this->docs_model->get_by(array('documentId' => $propertyId));
		$data['row_users'] = $this->register_model->get_by(array('userId' => $data['row']->userId), TRUE);
		$this->load->view('includes/template', $data);
	}
}
