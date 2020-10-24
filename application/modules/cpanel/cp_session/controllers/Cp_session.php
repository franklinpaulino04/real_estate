<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Cp_session extends MY_Controller
{
    public $namespace;
    public $columns;
    public $title;

    public function __construct()
    {
        parent::__construct();
        $this->namespace                = "cpanel";
        $this->title                    = '';

        //load Module
        $this->load->module('com_auth/controllers/com_auth');
    }

    public function index()
    {
        $this->redirect_if_logged_in($this->session->userdata('cp_is_logged_in'));
        $data['redirect'] = $this->uri->segment(1).'/'.$this->uri->segment(3);
        $this->load->view('cp_session/cp_session_view', $data);
    }

    function js_session()
    {
        header('Content-Type: text/javascript');
        echo $this->com_auth->js_session();
    }

    public function cp_auth($username = FALSE, $password = FALSE)
    {
        $username       = ($username == FALSE) ? strtolower($this->input->post('username')) : $username;
        $password       = ($password == FALSE) ? md5($this->input->post('password')) : $password;
        $redirect       = $this->input->post('redirect');
        $encrypted      = FALSE;
        $result         = $this->com_auth->cp_auth($username, $password, $encrypted);

        if($result['valid'] == 1)
        {
            $controller = ($redirect == '')? 'admin/home' : $redirect;

            echo json_encode(array('result' => 1, 'controller' => $controller));
        }
        else
        {
            $result = array('result' => 0, 'error' => '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><div class="alert-icon"><i class="ti-alert"></i></div><p>'.$result['message'].'</p>');
            echo json_encode($result);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/', 'refresh');
    }

    private function redirect_if_logged_in($is_logged_in)
    {
        if(isset($is_logged_in) || ($is_logged_in === TRUE))
        {
            $redirect = "admin/home";
            redirect(base_url().$redirect);
        }
    }

}
