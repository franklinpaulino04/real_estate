<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Cp_register_model extends CP_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'ai_users';
        $this->view_name    = "ai_user_views";
        $this->primary_key  = 'userId';
        $this->order_by     = 'userId DESC';
    }
}