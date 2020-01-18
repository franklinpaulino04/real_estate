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
		$this->moduleId                 = 4;

		//load model
        $this->load->model('cp_properties/cp_properties_model');
        $this->load->model('cp_categories/cp_categories_model');

        //load module
		$this->load->module('com_files/controller/com_files');

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

    public function update($propertyId)
    {

		$this->form_validation->set_rules('name_properies','<strong>Nombre</strong>','trim|required');
		$this->form_validation->set_rules('price','<strong>Precio</strong>','trim|required');
		$this->form_validation->set_rules('categoryId','<strong>Categoria</strong>','is_natural_no_zero');


		if($this->form_validation->run($this) == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error(validation_errors())));
		}
        else
        {
            $data = array(
                "name"                  => $this->input->post('name_properies'),
                "price"                 => $this->strip_commas($this->input->post('price')),
                "categoryId"            => $this->input->post('categoryId'),
//                "status"                => (isset($_POST['active']))? $this->input->post('active') : 0 ,
            );

			if(!empty($_FILES))
			{
				foreach ($_FILES AS $key => $values)
				{
					$ext                        = substr(strrchr($_FILES['file']['name'][$key], "."), 1);
					$data_file = array(
						'file_name'             => '',
						'file_type'             => $ext,
						'folder'                => 'files',
						'max_size'              => 5000000
					);

					$result            			= $this->com_files->multiple($data_file);

					if($result["result"] != 0)
					{
						$data['documentId']     = $propertyId;
						$data['documentId']     = $this->moduleId;
						$data['name']           = $result['file'];
						$data['size']           = $_FILES['file']['size'][$key];
						$data['original_name']  = $_FILES['file']['name'][$key];

						$this->docs_model->save($data);
					}
				}
			}

            if($this->cp_properties_model->save($data, $propertyId))
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
