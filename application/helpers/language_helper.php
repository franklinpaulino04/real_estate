<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( !function_exists('translate'))
{
    function translate($string, $lang_file = 'import', $folder = 'system')
    {
        $CI =& get_instance();
        $CI->lang->load($lang_file, $folder);

        return $CI->lang->line($string, FALSE);
    }
}