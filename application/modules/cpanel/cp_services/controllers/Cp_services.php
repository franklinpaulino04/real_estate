<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Cp_services extends CP_Controller
{
    public $namespace;
    public $columns;
    public $title;

    public function __construct()
    {
        parent::__construct();
        $this->namespace                = "cpanel";
        $this->title                    = '';
		$this->moduleId                 = 6;

        $this->load->model('cp_services/cp_services_model');
		$this->load->module('com_files/controller/com_files');

        $this->columns                  = "serviceId,name,description,phone,mobile,correo,image,class,status";
    }

    public function index()
    {
        $data['content']               = 'cp_services/cp_services_view';

        $this->load->view('includes/template', $data);
    }

    /* PUBLIC FUCTION *****************************************************************************/

	public function datatables($output = false)
	{
		$result = $this->cp_services_model->view(FALSE, $this->columns);

		switch($output)
		{
			case"return":
				return $result;
				break;
			default:
				echo json_encode(array('data' => $result));
		}
	}

	public function add()
	{
		echo json_encode(array('result' => 1, 'view' => $this->load->view('cp_services/cp_services_new_view', array(), TRUE)));
	}

	public function edit($serviceId)
	{
		$data                           = array();
		$data['row']                    = $this->cp_services_model->get_by(array('serviceId' => $serviceId), TRUE);
		echo json_encode(array('result' => 1, 'view' => $this->load->view('cp_services/cp_services_edit_view', $data, TRUE)));
	}

	public function insert()
	{
		$this->form_validation->set_rules('name_services', '<strong>Nombre</strong>', 'required|callback_service_name_check');
		$this->form_validation->set_rules('description', '<strong>Descripción</strong>', 'required');
		$this->form_validation->set_rules('mobile', '<strong>Telefono</strong>', 'trim|required');
		$this->form_validation->set_rules('phone', '<strong>Celular</strong>', 'trim|required');
		$this->form_validation->set_rules('correo', '<strong>Correo</strong>', 'required|valid_email');

		if($this->form_validation->run($this) == FALSE)
		{
			echo json_encode(array('result' => 0,
				'error' => '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
													<h4 class="opacity-message">Errores de Validación</h4>
													<ol>'.validation_errors().'</ol>
                								</div>'));
		}
		else
		{
			$data = array(
				"name"                   => $this->input->post('name_services'),
				"description"            => $this->input->post('description'),
				"mobile"                 => $this->input->post('mobile'),
				"phone"             	 => $this->input->post('phone'),
				"correo"                 => $this->input->post('correo'),
				'date_issue'    		 => timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d"),
				'date_modifier'    		 => timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d"),
				"statusId"               => (isset($_POST['active']))? $this->input->post('active') : 0,
			);

			if(!empty($_FILES))
			{
				$ext                      = substr(strrchr($_FILES['file']['name'], "."), 1);
				$data_file = array(
					'file_name'           => '',
					'file_type'           => $ext,
					'allowed_types'       => 'gif|jpg|png|jpeg',
					'folder'              => 'services'
				);

				$result            	      = $this->com_files->upload($data_file);

				if($result["result"] != 0)
				{
					$data['image']  = $result['file'];
				}
			}

			if($this->cp_services_model->save($data))
			{
				echo json_encode(array('result' => 1));
			}
		}
	}

	public function update($serviceId)
	{
		$this->form_validation->set_rules('name_services', '<strong>Nombre</strong>', 'required|callback_service_name_check');
		$this->form_validation->set_rules('description', '<strong>Descripción</strong>', 'required');
		$this->form_validation->set_rules('mobile', '<strong>Telefono</strong>', 'trim|required');
		$this->form_validation->set_rules('phone', '<strong>Celular</strong>', 'trim|required');
		$this->form_validation->set_rules('correo', '<strong>Correo</strong>', 'required|valid_email');

		if($this->form_validation->run($this) == FALSE)
		{
			echo json_encode(array('result' => 0,
				'error' => '<div class="alert alert-danger alert-dismissible fade show" role="alert">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
																<h4 class="opacity-message">Errores de Validación</h4>
																<ol>'.validation_errors().'</ol>
                											   </div>'));
		}
		else
		{
			$data = array(
				"name"                   => $this->input->post('name_services'),
				"description"            => $this->input->post('description'),
				"mobile"                 => $this->input->post('mobile'),
				"phone"             	 => $this->input->post('phone'),
				"correo"                 => $this->input->post('correo'),
				'date_modifier'    		 => timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d"),
				"statusId"               => (isset($_POST['active']))? $this->input->post('active') : 0,
			);

			if(!empty($_FILES))
			{
				$ext                      = substr(strrchr($_FILES['file']['name'], "."), 1);
				$data_file = array(
					'file_name'           => '',
					'file_type'           => $ext,
					'allowed_types'       => 'gif|jpg|png|jpeg',
					'folder'              => 'avatars'
				);

				$result            		  = $this->com_files->upload($data_file);

				if($result["result"] != 0)
				{
					$data['image']  = $result['file'];
				}
			}

			if($this->cp_services_model->save($data, $serviceId))
			{
				echo json_encode(array('result' => 1));
			}
		}
	}

	public function hide($serviceId)
	{
		if($this->cp_services_model->save(array('hidden' => 1), $serviceId))
		{
			echo json_encode(array('result' => 1));
		}
	}

    /* PRIVATE FUNCTION *********************************************************************************************/
	public function service_name_check()
	{
		$where = array(
			'LOWER(REPLACE(name," ",""))='  => clear_space($this->input->post('name_services')),
			'hidden'                        => 0,
			'serviceId !='                  => (isset($_POST['serviceId']) && $_POST['serviceId'] != 0)? $_POST['serviceId'] : 0
		);

		return ($this->cp_services_model->in_table_by($where) > 0)? FALSE : TRUE;
	}
}
