<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cp_docs_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_docs";
        $this->view_name    = "ai_docs";
        $this->primary_key  = "docId";
        $this->order_by     = "docId";
    }
}
