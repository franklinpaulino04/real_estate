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
        $this->path = realpath(APPPATH . '../assets/storage/files/'.$data['folder']);

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

	public function upload_multiple($data)
	{
		$this->path = realpath(APPPATH . '../assets/storage/files/'.$data['folder']);

		if(!empty($_FILES['file']['name']))
		{
			$config = array(
				'allowed_types'         	=> $data['allowed_types'],
				'upload_path'           	=> $this->path,
				'file_name'             	=> generate_code(5).timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "YmdHis").'.'.$data['file_type'],
				'max_size'              	=> (isset($data['max_size']))? $data['max_size'] : 3000000,
				'overwrite'             	=> TRUE
			);

			$files  						= $_FILES;
			$cpt 							= count($_FILES['file']['name']);

			for($i= 0; $i < $cpt; $i++)
			{
				$_FILES['file']['name']		= $files['file']['name'][$i];
				$_FILES['file']['type']		= $files['file']['type'][$i];
				$_FILES['file']['tmp_name']	= $files['file']['tmp_name'][$i];
				$_FILES['file']['error']	= $files['file']['error'][$i];
				$_FILES['file']['size']		= $files['file']['size'][$i];

				$this->CI->upload->initialize($config);
				if($this->CI->upload->do_upload('file'))
				{
					return array("result" => 1, "file_name" => $config['file_name'], 'file_size' => $files['file']['size'][$i]);
				}
				else
				{
					return array("result" => 0, "error" => $this->CI->upload->display_errors());
				}
			}
		}
	}
}
