<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Com_user_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'ai_users';
        $this->view_name    = "";
        $this->primary_key  = 'userId';
        $this->order_by     = 'userId DESC';
    }

    public function cp_auth($username, $password, $encrypted = FALSE, $userId = FALSE)
    {
        $password_user  = ($encrypted == TRUE)? $password : md5($password);
        $query          = $this->db->query("SELECT a.userId,a.image, a.first_name,a.last_name,a.statusId
                                            FROM ai_users AS a 
                                                LEFT JOIN ai_users_status AS b ON b.statusId = a.statusId
                                            WHERE email = '$username' AND `password` = '$password_user' AND a.hidden = 0 AND a.statusId = 1");

        if($query->num_rows() == 1);
        {
            return $query->row();
        }
    }
}