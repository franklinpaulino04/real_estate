<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Cp_contacts_model extends CP_Model
{
    public function __construct()
    {
        parent::__construct();
		$this->table_name   = 'ai_sendmaild';
		$this->view_name    = "ai_sendmaild_view";
		$this->primary_key  = 'mail_sentId';
		$this->order_by     = 'mail_sentId DESC';
    }
}
