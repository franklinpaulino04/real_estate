<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Faqs extends APP_Controller
{
    public $namespace;

    public function __construct()
    {
        parent::__construct();
        $this->namespace                = "app";
        $this->title                    = '';

        $this->load->model('faqs/fags_model');

//        $this->load->module('com_accounts/controllers/com_accounts');

        $this->columns                  = "annulmentId,companyId,type,code,status";
    }

    public function index()
    {
        $data ['content']               = 'agents/agents_view';

        $this->load->view('includes/template', $data);
    }

    /* PUBLIC FUCTION *****************************************************************************/

    public function datatables($output = false)
    {
        $result = $this->annulment_model->ignitedtables($this->columns);

        switch($output)
        {
            case"return":
                return $result;
                break;
            default:
                echo $result;
        }
    }

    public function add()
    {
        echo json_encode(array('result' => $this->load->view('annulment/annulment_new_view', array(), TRUE)));
    }

    public function edit($annulmentId)
    {
        $data                           = array();
        $data['row']                    = $this->annulment_model->get($annulmentId);
        $result['result']               = $this->load->view('annulment/annulment_edit_view',$data,true);

        echo json_encode($result);
    }

    public function insert()
    {
        $annulment_type = trim($this->input->post('type'));
        $annulment_code = $this->input->post('code');
        $this->validation->set_rule('type', $this->lang->line('valid_annulment_type'), array("required",
            'annulment_check_callback' => (function() use($annulment_type) { return $this->annulment_type_check($annulment_type);}),
        ));

        $this->validation->set_rule('code', $this->lang->line('valid_annulment_code'), array("required",
            'annulment_code_check_callback' => (function() use($annulment_code) { return $this->annulment_code_check($annulment_code);}),
        ));

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

            if($this->annulment_model->save($data))
            {
                echo json_encode(array('result' => 1));
            }
        }
    }

    public function update($annulmentId)
    {
        $annulment_code = $this->input->post('code');
        $annulment_type = trim($this->input->post('type'));

        $this->validation->set_rule('type', $this->lang->line('valid_annulment_type'), array("required",
            'annulment_check_callback' => (function() use($annulment_type, $annulmentId) { return $this->annulment_type_check($annulment_type, $annulmentId);}),
        ));
        $this->validation->set_rule('code', $this->lang->line('valid_annulment_code'), array("required",
            'annulment_code_check_callback' => (function() use($annulment_code, $annulmentId) { return $this->annulment_code_check($annulment_code, $annulmentId);}),
        ));

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

            if($this->annulment_model->save($data, $annulmentId))
            {
                echo json_encode(array('result' => 1));
            }
        }
    }

    public function hide($annulmentId)
    {
        $result['result'] = ($this->annulment_model->save( array('hidden' => 1), $annulmentId) == TRUE )? 1 : 0;

        echo json_encode($result);
    }

    /* PRIVATE FUNCTION *********************************************************************************************/

    private function annulment_type_check($annulment_type = FALSE, $annulmentId = FALSE)
    {
        $where = array(
            'LOWER(REPLACE(type," ",""))=' => clear_space($annulment_type),
            'companyId'                    => $this->companyId,
            'hidden'                       => 0,
            'annulmentId !='               => ($annulmentId != FALSE)? $annulmentId : 0
        );

        return ($this->annulment_model->in_table_by($where) > 0)? FALSE : TRUE;
    }

    private function annulment_code_check($annulment_code = FALSE, $annulmentId = FALSE)
    {
        $where = array(
            'LOWER(REPLACE(code," ",""))=' => clear_space($annulment_code),
            'companyId'                    => $this->companyId,
            'hidden'                       => 0,
            'annulmentId !='               => ($annulmentId != FALSE)? $annulmentId : 0
        );

        return ($this->annulment_model->in_table_by($where) > 0)? FALSE : TRUE;
    }
}