<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Cp_properties extends CP_Controller
{
    public $namespace;
    public $columns;
    public $title;
    public $category;
    public $typeId;
    public $moduleId;

    public function __construct()
    {
        parent::__construct();
        $this->namespace                = "cpanel";
        $this->title                    = '';
		$this->moduleId                 = 4;

		//load model
        $this->load->model('cp_properties/cp_properties_model');
        $this->load->model('cp_properties/cp_categories_model');
        $this->load->model('cp_properties/cp_properties_type_model');
        $this->load->model('cp_properties/cp_docs_model');

		$this->load->module('com_files/controller/com_files');

        $this->category                 = $this->cp_categories_model->get_assoc_list('categoryId AS id, name', array('hidden' => 0));
        $this->typeId                   = $this->cp_properties_type_model->get_assoc_list('typeId AS id, name', FALSE);
        $this->columns                  = "propertyId,name,full_name,category,type,status,class,price";
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
			'userId'		=> $this->session->userdata('user_data')['userId'],
			'date_issue'    => timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d"),
			'date_modifier' => timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d"),
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
			'row'  		=> $this->cp_properties_model->get_by(array('propertyId' => $propertyId), TRUE),
			'docs' 		=> $this->cp_docs_model->get_by(array("documentId" => $propertyId, "hidden" => 0)),
			'content'   => 'cp_properties/cp_properties_edit_view',
		);

		$this->load->view('includes/template', $data);
    }

    public function update($propertyId)
    {
		$row = $this->cp_properties_model->get_by(array('propertyId' => $propertyId), TRUE);

		$this->form_validation->set_rules('name_properies','<strong>Nombre</strong>','trim|required');
		$this->form_validation->set_rules('price','<strong>Precio</strong>','trim|required');
		$this->form_validation->set_rules('categoryId','<strong>Categoria</strong>','is_natural_no_zero');
		$this->form_validation->set_rules('typeId','<strong>Tipo</strong>','is_natural_no_zero');

		if($this->form_validation->run($this) == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error(validation_errors())));
		}
        else
        {
            $data = array(
				'number'				=> 0,
				"name"                  => $this->input->post('name_properies'),
				"address"               => $this->input->post('address'),
				"description"           => $this->input->post('description'),
				"categoryId"            => $this->input->post('categoryId'),
				"typeId"                => $this->input->post('typeId'),
				"price"                 => $this->strip_commas($this->input->post('price')),
				"video"                 => $this->input->post('video'),
				"bathrooms"             => $this->input->post('bathrooms'),
				"rooms"                 => $this->input->post('rooms'),
				"garage"                => $this->input->post('garage'),
				"amenities"             => $this->input->post('amenities'),
				"area"                  => $this->input->post('area'),
				"address_frame"         => $this->input->post('address_frame'),
				'date_modifier' 	    => timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d"),
				"statusId"              => (isset($_POST['statusId']))? $this->input->post('statusId') : 0,
				'hidden'				=> 0
            );

			if(!empty($_FILES))
			{
				$ext                    = substr(strrchr($_FILES['file']['name'], "."), 1);
				$data_file = array(
					'file_name'         => '',
					'file_type'         => $ext,
					'allowed_types'     => 'gif|jpg|png|jpeg',
					'folder'            => 'properties'
				);

				$result            		= $this->com_files->upload($data_file);

				if($result["result"] != 0)
				{
					$data['image']  = $result['file'];
					if($row->image != null || $row->image != "")
					{
						$this->com_files->unlink_image('properties', $row->image);
					}
				}
			}

			if(isset($_POST['statusId']))
			{
				$data['number'] = $this->cp_properties_model->get_last_number(FALSE, array('hidden' => 0), FALSE, '1000');
			}

            if($this->cp_properties_model->save($data, $propertyId))
            {
                echo json_encode(array('result' => 1, 'url' => base_url('cpanel/properties')));
            }
        }
    }

	public function add_documents($propertyId)
	{
		echo json_encode(array('result' => 1, 'view' =>  $this->load->view('cp_properties/widgets/add_document_view', array("propertyId" => $propertyId), TRUE)));
	}

	public function save_files($propertyId)
	{
		if(!empty($_FILES))
		{
			$ext                      = substr(strrchr($_FILES['file']['name'][0], "."), 1);
			$data_file = array(
				'file_name'           => '',
				'file_type'           => $ext,
				'allowed_types'       => 'gif|jpg|png|jpeg',
				'folder'              => 'properties'
			);

			$result            	      = $this->com_files->upload_multiple($data_file);

			if($result["result"] != 0)
			{
				$data['documentId']     = $propertyId;
				$data['name']           = $result['file_name'];
				$data['size']           = $result['file_size'];
				$data['original_name']  = $result['file_name'];
				$data['moduleId']  		= $this->moduleId;

				$this->cp_docs_model->save($data);

				echo json_encode(array("result" => 1, "view" => $this->get_all_documents($propertyId)));
			}
		}
	}

	public function unlink_files($docId)
	{
		$doc_name = $this->cp_docs_model->get_by(array('docId' => $docId, 'moduleId' => $this->moduleId), TRUE);
		if(isset($doc_name))
		{
			$this->cp_docs_model->delete($docId);
			if(file_exists(APPPATH.'../assets/storage/files/properties/'.$doc_name->name))
			{
				unlink(APPPATH.'../assets/storage/files/properties/'.$doc_name->name);
			}

			echo json_encode(array("result" => 1, "view" => $this->get_all_documents($doc_name->documentId, "return")));
		}
		else
		{
			echo json_encode(array("result" => 0));
		}
	}

	public function get_all_documents($propertyId, $output = "json")
	{
		$data['docs']      = $this->cp_docs_model->get_by(array("documentId" => $propertyId));
		$data['clientId']  = $propertyId;
		$return            = $this->load->view('cp_properties/widgets/docs_table_view', $data, TRUE);

		switch($output)
		{
			case "json":
				echo json_encode(array('result' => 1, "view" => $return));
				break;
			default:
				return $return;
		}
	}

	public function docs_preview($propertyId)
	{
		$data['row']       = $this->cp_properties_model->get_by(array('propertyId' => $propertyId), TRUE);
		$data['docs']      = $this->cp_docs_model->get_by(array("documentId" => $propertyId, "hidden" => 0));
		echo json_encode(array('result' => 1, 'view' => $this->load->view('cp_properties/widgets/docs_table_preview_view', $data, TRUE)));
	}

    public function hide($propertyId)
    {
        $result['result'] = ($this->cp_properties_model->save( array('hidden' => 1), $propertyId) == TRUE )? 1 : 0;

        echo json_encode($result);
    }

    /* PRIVATE FUNCTION *********************************************************************************************/

}
