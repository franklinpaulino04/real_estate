<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Cp_user_register_model extends CP_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'ai_users_status';
        $this->view_name    = "";
        $this->primary_key  = 'statusId';
        $this->order_by     = 'statusId DESC';
    }
}