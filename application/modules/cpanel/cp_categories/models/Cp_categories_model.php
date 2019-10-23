<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Cp_categories_model extends CP_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'ai_categories';
        $this->view_name    = "";
        $this->primary_key  = 'categoryId';
        $this->order_by     = 'categoryId DESC';
    }
}