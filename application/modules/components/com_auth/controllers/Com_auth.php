<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Com_auth extends MY_Controller
{
    public $namespace;
    public $columns;
    public $title;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('com_auth/com_user_model');
    }

    public function cp_auth($username = FALSE, $password = FALSE, $encrypted = FALSE)
    {
        if($username !== FALSE && $password !== FALSE)
        {
            if($user = $this->com_user_model->cp_auth($username, $password, TRUE))
            {
                $data = array(
                    'namespace'             => 'cpanel',
                    'cp_is_logged_in'       => TRUE,
                    'lockout'               => FALSE,
                    'blocked_session'       => FALSE,
                    'old_url'               => "",
                    'sessionId'             => md5(uniqid($this->input->server('REMOTE_ADDR'), TRUE)),
                    'user_data'             => objectToArray($user),
                    'base_url'              => base_url(),
                );

                $this->session->set_userdata($data);
                $return = array('valid' => TRUE);
            }
            else
            {
                $return = array('valid' => FALSE, 'message' => "La combinación de usuario/contraseña es incorrecta.");
            }
        }

        return $return;
    }

    public function js_session()
    {
        return 'var session = '.json_encode($this->session->userdata()).';';
    }
}