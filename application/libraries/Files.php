<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Files {

    protected $CI;
    protected $path;
    protected $url;

    function __construct()
    {
        $this->CI=& get_instance();
        $this->CI->load->library('upload');
        $this->url  = "assets/storage/";
    }

    /**
     * @param array data
     * @param mixed int or string
     * @return bolean
     */

    public function upload($data)
    {
        $this->path = realpath(APPPATH . '../assets/storage/'.$data['folder']);

        if(!empty($_FILES['file']['name']))
        {
            $config = array(
                'allowed_types'         => $data['allowed_types'],
                'upload_path'           => $this->path,
                'file_name'             => generate_code(5).timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "YmdHis").'.'.$data['file_type'],
                'max_size'              => (isset($data['max_size']))? $data['max_size'] : 3000000,
                'overwrite'             => TRUE
            );

            $this->CI->upload->initialize($config);

            if($this->CI->upload->do_upload('file'))
            {

                return array("result" => 1, "file" => $config['file_name']);
            }
            else
            {
                return array("result" => 0, "error" => $this->CI->upload->display_errors());
            }
        }
    }
}