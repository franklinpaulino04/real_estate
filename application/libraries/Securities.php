<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Securities
{
    var $CI;

    function __construct()
    {
        $this->CI =& get_instance();
    }

    function is_logged_in($is_logged_in)
    {

        if(!isset($is_logged_in) || $is_logged_in != 1)
        {
            $redirect = $this->CI->uri->segment(1);

            if($this->CI->input->is_ajax_request())
            {
                echo json_encode(array('result' => 0, 'is_logged_in' => false, 'redirect' => $redirect));
                exit();
            }

            redirect(base_url().'login/'.$redirect, 'refresh');
        }
    }

    function is_admin($user_type)
    {
        if($user_type != 1)
        {
            show_cumston_error("No tienes permiso para esta aqui", 500, "No tiene permiso para estar aqui");
        }
    }

    /**
     *  Checks if the current requesting user is the owner of the document. Returns a javascript redirect if document is not owned by this user.
     *
     * @access	public
     * @return string
     */

    function is_owner($id, $field, $model)
    {
        $controller = $this->CI->uri->segments[1];
        $this->CI->load->model($model);
        if($this->CI->$model->if_owner($field, $id) == FALSE)
        {
            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']))
            {
                echo json_encode(array('result' => 0, 'error' => 'Al parecer este registro no pertenece a su cuenta.'));
                return FALSE;
            }
            else
            {
                echo '<script type="application/javascript">window.location="'.base_url($controller).'";</script>';
                exit();
            }
        }
        return TRUE;
    }
}