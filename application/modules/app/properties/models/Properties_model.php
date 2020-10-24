<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Properties_model extends APP_Model
{
    public function __construct()
    {
        parent::__construct();
		$this->table_name   = 'ai_properties';
		$this->view_name    = "ai_properties_view";
		$this->primary_key  = 'propertyId';
		$this->order_by     = 'propertyId DESC';
    }

    public function get_properties_data()
	{
		return $this->db->query("SELECT a.*,
								 b.`name` AS category,
								 c.`typeId` AS typeId,
								 c.`name` AS type,
								 e.`name` AS `status`,
								 e.class AS class,
								 f.original_name AS original_name,
								 CONCAT(d.first_name, ' ', d.last_name) AS full_name
								 FROM ai_properties AS a 
								 	  LEFT JOIN ai_categories AS b ON b.categoryId = a.categoryId
								 	  LEFT JOIN ai_type_properties AS c ON c.typeId = a.typeId
								 	  LEFT JOIN ai_users AS d ON d.userId = a.userId AND d.hidden = 0
								 	  LEFT JOIN ai_properties_status AS e ON e.statusId = a.statusId
								 	  LEFT JOIN ai_docs AS f ON f.documentId = a.propertyId 
								 WHERE a.hidden = 0 GROUP BY a.propertyId DESC")->result();
	}

	public function get_Pagination($data)
	{
		return $this->db->query("SELECT a.*,
								 b.`name` AS category,
								 c.`name` AS type,
								 e.`name` AS `status`,
								 e.class AS class,
								 f.original_name AS original_name,
								 CONCAT(d.first_name, ' ', d.last_name) AS full_name
								 FROM ai_properties AS a 
								 	  LEFT JOIN ai_categories AS b ON b.categoryId = a.categoryId
								 	  LEFT JOIN ai_type_properties AS c ON c.typeId = a.typeId
								 	  LEFT JOIN ai_users AS d ON d.userId = a.userId AND d.hidden = 0
								 	  LEFT JOIN ai_properties_status AS e ON e.statusId = a.statusId
								 	  LEFT JOIN ai_docs AS f ON f.documentId = a.propertyId 
								 WHERE a.hidden = 0 GROUP BY a.propertyId  DESC LIMIT ".$data['initial'].",".$data['per_page']." ")->result();
	}
	public function get_properties_by($propertyId)
	{
		return $this->db->query("SELECT a.*,
								 b.`name` AS category,
								 c.`name` AS type,
								 e.`name` AS `status`,
								 e.class AS class,
								 CONCAT(d.first_name, ' ', d.last_name) AS full_name
								 FROM ai_properties AS a 
								 	  LEFT JOIN ai_categories AS b ON b.categoryId = a.categoryId
								 	  LEFT JOIN ai_type_properties AS c ON c.typeId = a.typeId
								 	  LEFT JOIN ai_users AS d ON d.userId = a.userId AND d.hidden = 0
								 	  LEFT JOIN ai_properties_status AS e ON e.statusId = a.statusId
								 WHERE a.hidden = 0 AND a.propertyId = $propertyId GROUP BY a.propertyId")->row();
	}
}
