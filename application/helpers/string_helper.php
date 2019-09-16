<?php
/**
 * Created by PhpStorm.
 * User: Jesus Enmanuel
 * Date: 26/08/2018
 * Time: 11:17
 */

if( ! function_exists('clear_space')){
    function clear_space($string)
    {
        return strtolower(str_replace(' ', '', $string));
    }
}

if ( ! function_exists('objectToString'))
{
    function objectToString($object, $field)
    {
        $string = '';
        foreach ($object AS $key)
        {
            $string .= $key->$field.",";
        }

        return trim($string,',');
    }
}

if ( ! function_exists('getColor'))
{
    function getColor($days)
    {
        $string = "";
        if($days <= 16 && $days >= 10)
        {
            $string = "28a745";
        }
        if($days <= 9 && $days >= 5)
        {
            $string = "ffc107";
        }
        if($days <= 4)
        {
            $string = "dc3545";
        }
        return $string;
    }
}