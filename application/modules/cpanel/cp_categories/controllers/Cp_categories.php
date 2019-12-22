<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Cp_categories extends CP_Controller
{
    public $namespace;
    public $columns;
    public $title;

    public function __construct()
    {
        parent::__construct();
        $this->namespace                = "cpanel";
        $this->title                    = '';

        $this->load->model('cp_categories/cp_categories_model');

        $this->columns                  = "categoryId,name,description,status,system";
    }

    public function index()
    {
        $data['content']               = 'cp_categories/cp_categories_view';

        $this->load->view('includes/template', $data);
    }

    /* PUBLIC FUCTION *****************************************************************************/

    public function datatables($output = false)
    {
        $result = $this->cp_categories_model->view(FALSE, $this->columns);

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
        echo json_encode(array('result' => 1, 'view' => $this->load->view('cp_categories/cp_categories_new_view', array(), TRUE)));
    }

    public function edit($categoryId)
    {
        $data                           = array();
        $data['row']                    = $this->cp_categories_model->get_by(array('categoryId' => $categoryId, 'hidden' => 0), TRUE);
        echo json_encode(array('result' => 1, 'view' => $this->load->view('cp_categories/cp_categories_edit_view',$data,true)));
    }

    public function insert()
    {
		$this->form_validation->set_rules('name_category', '<strong>Nombre</strong>', 'trim|required');

		if($this->form_validation->run($this) == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error(validation_errors())));
		}
        else
        {
            $data = array(
                "name"                  => $this->input->post('name_category'),
                "description"           => $this->input->post('description'),
                "status"                => (isset($_POST['active']))? $this->input->post('active') : 0 ,
                "system"                => 1,
            );

            if($this->cp_categories_model->save($data))
            {
                echo json_encode(array('result' => 1));
            }
        }
    }

    public function update($categoryId)
    {
		$this->form_validation->set_rules('name_category', '<strong>Nombre</strong>', 'trim|required|callback_exists_category_check');

		if($this->form_validation->run($this) == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error(validation_errors())));
		}
        else
        {
			$data = array(
				"name"                  => $this->input->post('name_category'),
				"description"           => $this->input->post('description'),
				"status"                => (isset($_POST['active']))? $this->input->post('active') : 0 ,
			);

            if($this->cp_categories_model->save($data, $categoryId))
            {
                echo json_encode(array('result' => 1));
            }
        }
    }

    public function hide($categoryId)
    {
        $result['result'] = ($this->cp_categories_model->save( array('hidden' => 1), $categoryId) == TRUE )? 1 : 0;

        echo json_encode($result);
    }

    /* PRIVATE FUNCTION *********************************************************************************************/

	public function exists_category_check()
	{
		$where = array(
			'LOWER(REPLACE(name," ",""))=' => clear_space($this->input->post('name_category')),
			'hidden'                       => 0,
			'categoryId !='                => (isset($_POST['categoryId']) && $_POST['categoryId'] != 0)? $_POST['categoryId'] : 0
		);

		return ($this->cp_categories_model->in_table_by($where) > 0)? FALSE : TRUE;
	}
}


