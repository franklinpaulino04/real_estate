<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Agents_model extends ACC_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = ' ';
        $this->view_name    = " ";
        $this->primary_key  = ' ';
        $this->order_by     = '  DESC';
    }
}