<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends MX_Controller {

    public $companyId;
    public $userId;

    public function __construct()
    {
        parent::__construct();
        setlocale(LC_ALL, "UTF-8");

        $this->userId                           = (isset($this->session->userdata('user_data')['userId']))? $this->session->userdata('user_data')['userId'] : '';
		$this->form_validation->CI =& $this;
		$this->form_validation->set_error_delimiters('<li>', '</li>');
    }

    // End ----------------------------------------------------------------------------- //

    public function is_called_via_url($controller_object)
    {
        return $this->uri->segment(1) === strtolower(get_class($controller_object));
    }

    public function _upload($data, $project = FALSE)
    {
        $file_name =  timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "YmdHis").preg_replace('/[^\w\._]+/', '', $_FILES['file']['name']);

        if($project != FALSE)
        {
            $file_name =  timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "YmdH").preg_replace('/[^\w\._]+/', '', $_FILES['file']['name']);
        }

        if(!empty($_FILES['file']['name']) )
        {
            $config = array(
                'allowed_types'     => $data['allowed_types'],
                'upload_path'       => $data['upload_path'],
                'file_name'         => $file_name,
                'max_size'          => 10048,
                'max_width'         => 1600,
                'max_height'        => 1600,
                'overwrite'         => TRUE
            );

            /**
             * Disposed by erickson.
             * This initialize is disposed for upload file excel of clients, suppliers...
             */
            $this->upload->initialize($config);
            $this->load->library('upload', $config);

            if($this->upload->do_upload('file'))
            {
                return array('result' => TRUE, 'file' => $data['upload_path'].'/'.$config['file_name'], 'ext' => $_FILES['file']['type']);
            }
            else
            {
                return array('result' => FALSE, 'error' => $this->upload->display_errors());
            }
        }
    }

    public function _output($data, $landscape = FALSE)
    {
        if($data['result'] !== FALSE)
        {
            switch($data['output'])
            {
                case "word":
                    header("Content-Type: application/msword");
                    header('Content-Disposition: attachment;filename="'.$data['file_name'].'.doc"');
                    header("Pragma: no-cache");
                    header("Expires: 0");
                    echo $data['result'];
                break;

                case "excel":
                    $this->load->library('export');
                    $this->export->html_to_excel($data);
                break;

                case "print":
                    echo $data['result'];
                break;

                case "html":
                    echo $data['result'];
                break;

                case "pdf":

                    $pdf = new Mpdf\Mpdf(array('mode' => 'c', 'default_font' => 'Arial', 'default_font_size' => 9));
                    $file_name = ucfirst(str_replace(" ", "_", $data['file_name'])).'.pdf';
                    if($landscape != FALSE)
                    {
                        $pdf->AddPage('L', // L - landscape, P - portrait
                            '', '', '', '',
                            10, // margin_left
                            10, // margin right
                            10, // margin top
                            10, // margin bottom
                            18, // margin header
                            12  // margin footer
                        );
                    }

                    $pdf->WriteHTML($data['pdf_view']);
                    $pdf->Output($file_name,'I');
                break;

                default:
                    $return = array('result' => 1, 'view' => $data['result']);
                    echo json_encode($return);
            }
        }
    }

    public function strip_commas($string)
    {
        return str_replace(',','', $string);
    }

    public function strip_currency($string){
        $chars = array(",", "$");
        return str_replace($chars, "", $string);
    }

    public function math($val1, $val2, $operator)
    {
        switch($operator)
        {
            case "+":
                $result = $val1 + $val2;
                break;

            case "-":
                $result = $val1 - $val2;
                break;

            case "/":
                $result = $val1 / $val2;
                break;
        }
        return $result;
    }

    public function _numbers($limit = 31)
    {
        for ($i=1; $i <= $limit; $i++) {
            $numbers[$i] = $i;
        }
        return $numbers;
    }


    //---------------------------------------------------------------------

    public function report_columns($to, $format = FALSE)
    {
        $data = array('1 a 30','31 a 60','61 a 90', '90+');
        if($format == 'monthly')
        {
            $to_time = strtotime($to);
            $data = array('0' => 'Corriente');
            for($i=1; $i<=3; $i++)
            {
                $data[$i] = _month_name(date('m', mktime(0, 0, 0, date("m", $to_time)-$i, date("d"), date("Y", $to_time))));
            }
            $data['4'] = "Anteriores";
        }

        return $data;
    }

    function _send_mail($data, $postman = 'mandrill')
    {
        switch($postman)
        {
            case "mandrill":
                $result = $this->sendmail->_mandrill($data);
                break;

            case "sendmail":
                $this->sendmail->_sendbymail($data);
                break;

            default:
                $result = $this->sendmail->_mandrill($data);
        }

        $return =  array('result' => 1, 'response' => $result[0]);

        return $return;
    }

    //*** TODO: MOVED TO HELPER *** --------------------------------------------------------
    public function to_assoc_array($result)
    {
        $option[0] = '';
        foreach($result as $row)
        {
            $option[$row->id] = $row->name;
        }
        return $option;
    }
    // TODO END ----------------------------------------------------------------------------


    //*** TODO: MOVED TO HELPER *** --------------------------------------------------------
    function array_filter_recursive($input)
    {
        foreach ($input as &$value)
        {
            if (is_array($value))
            {
                $value = $this->array_filter_recursive(array_map('trim', $value));
            }
        }

        return array_filter($input);
    }
    // TODO END ----------------------------------------------------------------------------


    function human_file_size($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= (1 << (10 * $pow));

        return number_format(round($bytes, $precision),2) . ' ' . $units[$pow];
    }

    // TODO END ----------------------------------------------------------------------------

    /*
    * Array Manipulation functions
    */

    //*** TODO: MOVED TO HELPER *** --------------------------------------------------------
    function objectToArray($d)
    {
        if (is_object($d))
        {
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
        }

        if (is_array($d)) {
            /*
            * Return array converted to object
            * Using __FUNCTION__ (Magic constant)
            * for recursive call
            */
            return array_map(array($this, 'objectToArray'), $d);
            //$this->d = get_object_vars($d);
        }
        else {
            // Return array
            return $d;
        }
    }

    //*** TODO: MOVED TO HELPER *** --------------------------------------------------------
    function array_flatten(array $array)
    {
        $return = array();
        array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
        return $return;
    }

    // TODO END ----------------------------------------------------------------------------

    //*** TODO: MOVED TO HELPER *** --------------------------------------------------------
    function flat_to_assoc(array $array)
    {
        $return = array();
        array_unshift($array, false);

        while (false !== $key = next($array)) {
            $return[$key] = next($array);
        }
        return $return;
    }

    // TODO END ----------------------------------------------------------------------------

    //*** TODO: MOVED TO HELPER *** --------------------------------------------------------
    function array_multi_unique($multiArray){

        $uniqueArray = array();

        foreach($multiArray as $subArray){

            if(!in_array($subArray, $uniqueArray)){
                $uniqueArray[] = $subArray;
            }
        }
        return $uniqueArray;
    }

    // TODO END ----------------------------------------------------------------------------

    //*** TODO: MOVED TO HELPER *** --------------------------------------------------------
    function object_flatten_assoc(array $array)
    {
        return $this->flat_to_assoc($this->array_flatten($this->objectToArray($array)));
    }
    // TODO END ----------------------------------------------------------------------------

}
