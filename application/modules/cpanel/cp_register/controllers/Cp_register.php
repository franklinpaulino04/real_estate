<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Cp_register extends CP_Controller
{
    public $namespace;
    public $title;
    public $columns;
    public $statusId;

    public function __construct()
    {
        parent::__construct();
        $this->namespace                = "cpanel";
        $this->title                    = '';
		$this->moduleId                 = 5;

        $this->load->model('cp_register/cp_register_model');
        $this->load->model('cp_register/cp_user_register_model');

		$this->load->module('com_files/controller/com_files');

		$this->columns                  = "userId,email,image,first_name,last_name,statusId,`status`,owers,class";
    }

    public function index()
    {
        $data ['content']               = 'cp_register/cp_register_view';

        $this->load->view('includes/template', $data);
    }

    /* PUBLIC FUCTION *****************************************************************************/

    public function datatables($output = false)
    {
        $result = $this->cp_register_model->view(FALSE, $this->columns);

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
        echo json_encode(array('result' => 1, 'view' => $this->load->view('cp_register/cp_register_new_view', array(), TRUE)));
    }

    public function edit($cp_registerId)
    {
        $data                           = array();
        $data['row']                    = $this->cp_register_model->get_by(array('userId' => $cp_registerId), TRUE);
        echo json_encode(array('result' => 1, 'view' => $this->load->view('cp_register/cp_register_edit_view', $data, TRUE)));
    }

    public function insert()
    {
		$this->form_validation->set_rules('first_name', '<strong>Nombre</strong>', 'required');
		$this->form_validation->set_rules('last_name', '<strong>Apellido</strong>', 'required');
		$this->form_validation->set_rules('username', '<strong>Usuario</strong>', 'trim|required|callback_user_email_check');
		$this->form_validation->set_rules('password', '<strong>Contraseña</strong>', 'required|trim');

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
				"first_name"            => $this->input->post('first_name'),
				"last_name"             => $this->input->post('last_name'),
				"username"              => $this->input->post('username'),
				"email"                 => $this->input->post('email'),
				"phone"                 => $this->input->post('phone'),
				"mobile"                => $this->input->post('mobile'),
				'password' 				=> md5($this->input->post('password')),
				"statusId"              => (isset($_POST['active']))? $this->input->post('active') : 0,
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

				$result            	      = $this->com_files->upload($data_file);

				if($result["result"] != 0)
				{
					$data['image']  = $result['file'];
				}
			}

			if($this->cp_register_model->save($data))
			{
				echo json_encode(array('result' => 1));
			}
		}
    }

    public function update($cp_registerId)
    {
		$this->form_validation->set_rules('first_name', '<strong>Nombre</strong>', 'required');
		$this->form_validation->set_rules('last_name', '<strong>Apellido</strong>', 'required');
		$this->form_validation->set_rules('username', '<strong>Usuario</strong>', 'trim|required|callback_user_email_check');

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
				"first_name"            => $this->input->post('first_name'),
				"last_name"             => $this->input->post('last_name'),
				"username"              => $this->input->post('username'),
				"email"                 => $this->input->post('email'),
				"phone"                 => $this->input->post('phone'),
				"mobile"                => $this->input->post('mobile'),
				"statusId"              => (isset($_POST['active']))? $this->input->post('active') : 0,
            );

            if(isset($_POST['password']) && !empty($_POST['password']))
            {
            	$data['password'] = md5($this->input->post('password'));
			}

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

            if($this->cp_register_model->save($data, $cp_registerId))
            {
                echo json_encode(array('result' => 1));
            }
        }
    }

    public function hide($cp_registerId)
    {
        if($this->cp_register_model->save(array('hidden' => 1), $cp_registerId))
        {
            echo json_encode(array('result' => 1));
        }
    }

    /* PRIVATE FUNCTION *********************************************************************************************/

	public function user_email_check()
	{
		$where = array(
			'LOWER(REPLACE(username," ",""))=' => clear_space($this->input->post('email')),
			'hidden'                           => 0,
			'userId !='                        => (isset($_POST['userId']) && $_POST['userId'] != 0)? $_POST['userId'] : 0
		);

		return ($this->cp_register_model->in_table_by($where) > 0)? FALSE : TRUE;
	}
}
