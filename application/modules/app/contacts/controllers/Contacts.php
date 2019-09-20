<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Contacts extends APP_Controller
{
    public $namespace;
    public $title;

    public function __construct()
    {
        parent::__construct();
        $this->namespace                = "app";
        $this->title                    = '';

//        $this->load->model('agents/agents_model');

//        $this->load->module('com_accounts/controllers/com_accounts');
    }

    public function index()
    {
        $data ['content']               = 'contacts/contacts_view';

        $this->load->view('includes/template', $data);
    }

}