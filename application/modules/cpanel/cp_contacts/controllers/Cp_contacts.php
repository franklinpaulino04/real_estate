<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Cp_contacts extends CP_Controller
{
    public $namespace;
    public $columns;
    public $title;

    public function __construct()
    {
        parent::__construct();
        $this->namespace                = "cpanel";
        $this->title                    = '';
		$this->moduleId                 = 2;

        $this->load->model('cp_contacts/cp_contacts_model');

        $this->columns                  = "contactId,name,email,message,date_time,date_now";
    }

    public function index()
    {
        $data['content']               = 'cp_contacts/cp_contacts_view';
        $this->load->view('includes/template', $data);
    }

    /* PUBLIC FUCTION *****************************************************************************/

    public function datatables($output = false)
    {
        $result = $this->cp_contacts_model->view(FALSE, $this->columns);

        switch($output)
        {
            case"return":
                return $result;
                break;
            default:
                echo json_encode(array('data' => $result));
        }
    }
}


