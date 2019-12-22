<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Cp_properties extends CP_Controller
{
    public $namespace;
    public $columns;
    public $title;
    public $category;

    public function __construct()
    {
        parent::__construct();
        $this->namespace                = "cpanel";
        $this->title                    = '';

        $this->load->model('cp_properties/cp_properties_model');
        $this->load->model('cp_categories/cp_categories_model');

        $this->category                 = $this->cp_categories_model->get_assoc_list('categoryId AS id, name', array('hidden' => 0));
        $this->columns                  = "annulmentId,companyId,type,code,status";
    }

    public function index()
    {
        $data['content']               = 'cp_properties/cp_properties_view';

        $this->load->view('includes/template', $data);
    }

    /* PUBLIC FUCTION *****************************************************************************/

    public function datatables($output = false)
    {
        $result = $this->cp_properties_model->view(FALSE, $this->columns);

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
		$data = array(
			'userId'        => $this->session->userdata('userId'),
			'date_issue'    => timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d"),
			'date_creation' => timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s"),
			'hidden'        => 1
		);

		if($propertyId = $this->cp_properties_model->save($data))
		{
			echo json_encode(array('result' => 1 , 'url' => base_url('cpanel/properties/edit/'.$propertyId)));
		}
    }

    public function edit($propertyId)
    {
		$data = array(
			'row'        => $this->cp_properties_model->get_by(array('propertyId' => $propertyId), TRUE),
			'content'    => 'cp_properties/cp_properties_edit_view',
		);

		$this->load->view('includes/template', $data);
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

            if($this->cp_properties_model->save($data, $annulmentId))
            {
                echo json_encode(array('result' => 1));
            }
        }
    }

    public function hide($annulmentId)
    {
        $result['result'] = ($this->cp_properties_model->save( array('hidden' => 1), $annulmentId) == TRUE )? 1 : 0;

        echo json_encode($result);
    }

    /* PRIVATE FUNCTION *********************************************************************************************/

}
