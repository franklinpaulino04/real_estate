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
		if($this->uri->segment(3))
		{
			$page 					= $this->uri->segment(3);
		}
		else
		{
			$page 					= 1;
		}

		$data['per_page'] 			= 6; //por pagina
		$data['segment'] 			= $page; //segment
		$initial					= (($page - 1)* $data['per_page']);
		$data['count'] 			 	= $this->services_model->count(array('hidden' => 0 , 'statusId' => 1));
		$data['page']    			= ceil(($data['count'] / $data['per_page'])); //total pagina
		$data['rows']			 	= $this->services_model->get_Pagination(array('per_page' => $data['per_page'], 'initial' => $initial));
		$data['services_rows']	    = $data['rows'];
		$data['content']            = 'services/services_view';
		$this->load->view('includes/template', $data);
    }

    public function preview($serviceId = FALSE)
    {
    	$count = $this->services_model->count(array('hidden' => 0 , 'statusId' => 1, 'serviceId' => $serviceId));
		if($serviceId == FALSE || $count == 0)
		{
			redirect(base_url('services/index'));
		}
		else
		{
			$data ['content'] = 'services/services_preview_view';
			$data['row']      = $this->services_model->get_by(array('hidden' => 0 , 'statusId' => 1, 'serviceId' => $serviceId), TRUE);
			$this->load->view('includes/template', $data);
		}
    }
}
