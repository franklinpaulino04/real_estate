<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Cp_session_model extends CP_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'ai_annulment';
        $this->view_name    = "ai_annulment_view";
        $this->primary_key  = 'annulmentId';
        $this->order_by     = 'annulmentId DESC';
    }
}