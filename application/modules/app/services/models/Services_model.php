<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Services_model extends APP_Model
{
    public function __construct()
    {
        parent::__construct();
		$this->table_name   = 'ai_services';
		$this->view_name    = "ai_services_views";
		$this->primary_key  = 'serviceId';
		$this->order_by     = 'serviceId DESC';
    }


    public function get_Pagination($data)
	{
		return $this->db->query("SELECT * FROM `ai_services` WHERE `hidden` = 0 AND `statusId` = 1 ORDER BY `serviceId` DESC LIMIT ".$data['initial'].",".$data['per_page']." ")->result();
	}
}
