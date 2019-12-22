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

        $this->load->model('cp_register/cp_register_model');
        $this->load->model('cp_register/cp_user_register_model');

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

        $data = array(
            "first_name"            => $this->input->post('first_name'),
            "last_name"             => $this->input->post('last_name'),
            "email"                 => $this->input->post('email'),
            "password"              => $this->input->post('password'),
            "statusId"              => 1,
        );

        if($this->cp_register_model->save($data))
        {
            echo json_encode(array('result' => 1));
        }
    }

    public function update($cp_registerId)
    {

        if($this->validation->run($this) == FALSE)
        {
            echo json_encode(array('result' => 0, 'error' => display_errors($this->validation->errors())));
        }
        else
        {
            $data = array(
                'companyId'             => $this->companyId,
                "code"                  => $this->input->post('code'),
                "type"                  => $this->input->post('type'),
                "description"           => $this->input->post('description'),
                "status"                => (isset($_POST['active']))? $this->input->post('active') : 0 ,
            );

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

    private function cp_register_email_check($cp_register_email = FALSE, $cp_registerId = FALSE)
    {
        $where = array(
            'LOWER(REPLACE(email," ",""))=' => clear_space($cp_register_email),
            'hidden'                        => 0,
            'userId !='                     => ($cp_registerId != FALSE)? $cp_registerId : 0
        );

        return ($this->cp_register_model->in_table_by($where) > 0)? FALSE : TRUE;
    }
}
