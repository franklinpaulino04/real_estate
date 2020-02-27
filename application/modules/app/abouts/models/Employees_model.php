<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Employees_model extends CP_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'ai_employees';
        $this->view_name    = "ai_employees_views";
        $this->primary_key  = 'employeId';
        $this->order_by     = 'userId DESC';
    }
}
