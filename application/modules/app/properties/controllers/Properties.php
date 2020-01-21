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
		$this->load->model('properties/sendmaild_model');
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

	public function send_mail()
	{
		$data                = array();
		$data['to']      	 = $this->input->post('to');
		$data['to_name']     = $this->input->post('to_name');
		$data['title']       = $this->input->post('title');
		$data['body']        = $this->input->post('message');
		$data['alt_body']    = $this->input->post('message');

		$sent_mail = array(
			'correo'	=> $data['to'],
			'title' 	=> $data['title'],
			'to_name' 	=> $data['to_name'],
			'message' 	=> $data['body'],
		);

		if($this->sendmaild_model->save($sent_mail))
		{
			echo json_encode(array('result' => 1));
		}
	}
}


//        print_d($this->sendmaild->send_mail(array('to'        => 'edelacruz9713@gmail.com',
//                                                  'to_name'  => 'franklin paulino ',
//                                                  'title'    => 'coreo enviado',
//                                                  'body'     => 'coreo enviado correctamente',
//                                                  'alt_body' => 'coreo enviado ssss',
//                                                 ), FALSE));
