<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader {


    /**
     *  Returns the value of the session of the permission.
     *
     * @access	public
     * @param	mixed string
     * @return	int
     */

    public function verify_permission_session($rules)
    {
        return isset($this->session->userdata('permissions')[$rules])? $this->session->userdata('permissions')[$rules] : 0;
    }
}