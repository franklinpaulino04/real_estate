<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Sendmaild_model extends CP_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'ai_sendmaild';
        $this->view_name    = "";
        $this->primary_key  = 'mail_sentId';
        $this->order_by     = 'mail_sentId DESC';
    }
}
