<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Com_files extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('com_files/com_files_model');
        $this->load->library('upload');
    }

    /**
     * Upload files
     *
     * @param $data
     * @return mixed
     */
    public function upload($data)
    {
        $image                          = FALSE;

        if(!empty($_FILES))
        {
            $upload_data = array(
                'allowed_types'         => (isset($data['allowed_types'])) ? $data['allowed_types'] : 'csv|xls|xlsx|txt|docx|doc|pdf|pptx|ppt|gif|jpg|png|jpeg',
                'file_type'             => $data['file_type'],
                'max_size'              => (isset($data['max_size'])) ? $data['max_size'] : 4000000,
                'folder'                => $data['folder']
            );

            $image = $this->files->upload($upload_data);
        }

        return $image;
    }

    /** delete image the folder in selerct....
     * @param $folder
     * @param $data_image
     * @return bool
     */
    public function unlink_image($folder, $image)
    {
        if(file_exists(APPPATH.'../assets/storage/'.$folder.'/'.$image))
        {
            unlink(APPPATH.'../assets/storage/'.$folder.'/'.$image);
        }
    }
}
