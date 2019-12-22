<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Contacts_model extends APP_Model
{
    public function __construct()
    {
        parent::__construct();
		$this->table_name   = 'ai_contacts';
		$this->view_name    = "ai_contacts_view";
		$this->primary_key  = 'contactId';
		$this->order_by     = 'contactId DESC';
    }
}
