<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Cp_properties_model extends CP_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'ai_properties';
        $this->view_name    = "ai_properties_view";
        $this->primary_key  = 'propertyId';
        $this->order_by     = 'propertyId DESC';
    }
}
