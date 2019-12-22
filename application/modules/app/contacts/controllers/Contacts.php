<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Contacts extends APP_Controller
{
    public $namespace;
    public $title;

    public function __construct()
    {
        parent::__construct();
        $this->namespace                = "app";
        $this->title                    = '';

        $this->load->model('contacts/contacts_model');
    }

    public function index()
    {
        $data ['content']               = 'contacts/contacts_view';
        $this->load->view('includes/template', $data);
    }

    public function sent_mail()
	{
		$this->form_validation->set_rules('name_contacts', '<strong>Nombre</strong>', 'trim|required');
		$this->form_validation->set_rules('email', '<strong>Correo</strong>', 'trim|required|valid_email');
		$this->form_validation->set_rules('message', '<strong>Mensaje</strong>', 'trim|required');

		if($this->form_validation->run($this) == FALSE)
		{
			$error = '<div class="alert alert-danger" role="alert">
					   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					   </button>
					  	<h4 class="opacity-message">Errores de Validación</h4>
					  	<ol>'.validation_errors().'</ol>
					  </div>';

			echo json_encode(array('result' => 0, 'error' => $error));
		}
		else
		{
			$data = array(
				"name"                  => $this->input->post('name_contacts'),
				"email"                 => $this->input->post('email'),
				"message"               => $this->input->post('message'),
				"date_now"              => date("Y-m-d"),
				"date_time"             => date("Y-m-d h:i:s"),
			);

			if($this->contacts_model->save($data))
			{
				echo json_encode(array('result' => 1));
			}
		}
	}
}
