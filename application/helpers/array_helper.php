<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Array helper
 *
 * Array and Object helper to assist on handling
 *
 * @category	Helpers
 * @version		1.0.0
 */

/**
 * Converts MySQL object to an associative array ej: Dropdown list
 *
 * @access	public
 * @param	object
 * @return	array
 */
if ( ! function_exists('to_assoc_array'))
{
    function to_assoc_array($result)
    {
        $option[0] = '';
        foreach($result as $row)
        {
            $option[$row->id] = $row->name;
        }
        return $option;
    }
}

/**
 *  Removes empty arrays from a multidimentional array. The difference between this and array_filter_recursive is that this does not remove empty array items.
 *  This removes arrays that have all items empty.
 *
 * @access	public
 * @param	array
 * @return	array
 */
if ( ! function_exists('array_filter_empty'))
{
    function array_filter_empty($input)
    {
        foreach ($input as $i => $array)
        {
            $empty = array();
            foreach($array as $key => $value)
            {
                $empty[] = ($value)? FALSE : TRUE;
            }

            if(!in_array(FALSE, $empty))
            {
                unset($input[$i]);
            }
        }
        return $input;
    }
}


/**
 *  Removes empty arrays from a multidimentional array
 *
 * @access	public
 * @param	array
 * @return	array
 */
if ( ! function_exists('array_filter_recursive'))
{
    function array_filter_recursive($input)
    {
        foreach ($input as &$value)
        {
            if (is_array($value))
            {
                $value = array_filter_recursive(array_map('trim', $value));
            }
        }
        return array_filter($input);
    }
}



/**
 * Converts MySQL object to array
 *
 * @access	public
 * @param	object
 * @return	array
 */
if ( ! function_exists('objectToArray'))
{
    function objectToArray($d)
    {
        $d = (is_object($d))? get_object_vars($d) : $d;
        return (is_array($d))? array_map('objectToArray', $d) : $d;
    }
}



/**
 * Flattens a multi-dimentional array.
 *
 * @access	public
 * @param	array
 * @return	array
 */
if ( ! function_exists('array_flatten'))
{
    function array_flatten(array $array)
    {
        $return = array();
        array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
        return $return;
    }
}

/**
 * Converts a Flatten array to an associative array. Takes odd rows as keys and even rows as value.
 *
 * @access	public
 * @param	array
 * @return	array
 */
if ( ! function_exists('flat_to_assoc'))
{
    function flat_to_assoc(array $array)
    {
        $return = array();
        array_unshift($array, false);

        while (false !== $key = next($array))
        {
            $return[$key] = next($array);
        }

        return $return;
    }
}

/**
 * Remove multi-dimentional array duplicates.
 *
 * @access	public
 * @param	array
 * @return	array
 */
if ( ! function_exists('array_multi_unique'))
{
    function array_multi_unique($multiArray){

        $uniqueArray = array();
        foreach($multiArray as $subArray)
        {
            if(!in_array($subArray, $uniqueArray))
            {
                $uniqueArray[] = $subArray;
            }
        }
        return $uniqueArray;
    }
}

/**
 * Convert to rule in array
 *
 * @access public
 * @param  array
 * @return array
 */
if(!function_exists('string_to_array'))
{
    function string_to_array($data)
    {
        $explode_value                        = array();
        $value                                = explode(',', $data);

        foreach ($value AS $key => $values)
        {
            $explode_array                    = explode(':', $value[$key]);
            $explode_value[$explode_array[0]] = $explode_array[1];
        }

        return $explode_value;
    }
}

/**
 * Convert to rule in array
 *
 * @access public
 * @param  array
 * @return array
 */
if(!function_exists('string_to_array2'))
{
    function string_to_array2($data, $glue = ",")
    {
        return explode($glue, $data);
    }
}

/**
 * Convert to regla in array
 *
 * @access public
 * @param  array
 * @return array
 */
if(!function_exists('discompose_rules_str'))
{
    function discompose_rules_str($data)
    {
        $value  = explode('|',$data);
        $data   = array();

        foreach ($value AS $k => $v)
        {
            $data[] = string_to_array($v);
        }

        return $data;
    }
}

/**
 * Converts an object to a flatten array then to an associative array.
 *
 * @access	public
 * @param	array
 * @return	array
 */
if ( ! function_exists('object_flatten_assoc'))
{
    function object_flatten_assoc(array $array)
    {
        return flat_to_assoc(array_flatten(objectToArray($array)));
    }
}

/**
 * Converts an array to an string.
 *
 * @access	public
 * @param	array
 * @return	string
 */

if ( ! function_exists('array_to_string'))
{
    function array_to_string($array, $glue = ",")
    {
        $string = '';
        if($array)
        {
            $string = implode($glue, $array);
        }

        return $string;
    }
}

/**
 * Converts an array to an string.
 *
 * @access	public
 * @param	array
 * @return	string
 */

if ( ! function_exists('array_to_string2'))
{
    function array_to_string2($array, $glue = ",")
    {
        $string = null;
        if($array)
        {
            foreach ($array AS $val)
            {
                $string .= "'".$val."',";
            }
        }

        return trim($string,",'");
    }
}

/**
 * Converts an array to an string.
 *
 * @access	public
 * @param	array
 * @return	string
 */

if ( ! function_exists('object_multiple'))
{
    function object_multiple($array)
    {
        $string = '';
        foreach ($array AS $key)
        {
            $string .= $key->currencyId.",";
        }

        return trim($string,',');
    }
}

/**
 * Checks if any of the values in one array is in another array.
 *
 * @access	public
 * @param	array
 * @param	array
 * @return	array
 */

if ( ! function_exists('is_array_in_array'))
{
    function is_array_in_array($needle, $haystack)
    {
        foreach ($needle as $stack)
        {
            if (in_array($stack, $haystack))
            {
                return true;
            }
        }
        return false;
    }
}

/**
 * Checks if any of the values in one array is in another array.
 *
 * @access	public
 * @param	array
 * @param	array
 * @return	array
 */

if ( ! function_exists('arrayToObject'))
{
    function arrayToObject($array)
    {
        $object = new stdClass();
        foreach ($array AS $key => $value)
        {
            $object->$key = $value;
        }
        return $object;
    }
}

/**
 * translante language lang line.
 *
 * @access	public
 * @param	object
 * @return	object
 */
if ( ! function_exists('array_line'))
{
    function array_line($data)
    {
        $CI = get_instance();
        $arr = $data;

        foreach ($data AS $key => $value)
        {
            if((strpos($value, 'db_') !== FALSE))
            {
                $arr->$key = $CI->lang->line($value);
            }
        }

        return $arr;
    }
}

/**
 * Compare two arrays, returns the difference.
 *
 * @access	public
 * @param	array1
 * @param	array2
 * @return	array
 */

if ( ! function_exists('array_compare'))
{
    function array_compare($array1, $array2)
    {
        $CI = get_instance();
        $change = array();

        foreach ($array2 AS $key => $value)
        {
            if(isset($array1[$key]))
            {
                if($array1[$key] != $array2[$key])
                {
                    $old                 =  str_replace(',', '¬', $array1[$key]);
                    $new                 =  str_replace(',', '¬', $value);
                    $old_data            = (strpos($old, 'db_') !== FALSE)? $CI->lang->line($old) : $old;
                    $new_data            = (strpos($new, 'db_') !== FALSE)? $CI->lang->line($new): $new;

                    $change['old'][$key] = $old_data;
                    $change['new'][$key] = $new_data;
                }
            }
            else
            {
                $new                 =  str_replace(',', '¬', $value);
                $new_data            = (strpos($new, 'db_') !== FALSE)? $CI->lang->line($new): $new;
                $change['old'][$key] = 'N/A';
                $change['new'][$key] = (!empty($value))? $new_data : 'N/A';
            }
        }

        if(!empty($change))
        {
            $change['old'] = rule_composer($change['old']);
            $change['new'] = rule_composer($change['new']);
        }

        return $change;
    }
}

/**
 * Checks if any of the values in one array is in another array.
 *
 * @access	public
 * @param	array
 * @param	array
 * @return	array
 */

if ( ! function_exists('array_merge_children'))
{
    function array_merge_children($array)
    {
        $data = array();
        foreach ($array AS $key => $value)
        {
            foreach($value AS $k => $v)
            {
                $data[$k] = $v;
            }
        }
        return $data;
    }
}


/**
 * Converts an array to an string.
 *
 * @access	public
 * @param	array
 * @return	string
 */

if ( ! function_exists('string_to_array_dinamic'))
{
    function string_to_array_dinamic($data, $glue_first = ',' , $glue_second = '--')
    {
        $explode_value                        = array();
        $return_value                         = '';
        $value                                = explode($glue_first, $data);

        foreach ($value AS $key => $values)
        {
            $explode_array                    = explode($glue_second, $value[$key]);
            $return_value                    .= number_format($explode_array[4]).'%, ';
        }

        return trim($return_value,', ');
    }
}

if ( ! function_exists('count_item_in_string'))
{
    function count_item_in_string($string)
    {
        $value  = explode(',', $string);
        return count($value);
    }
}

/* End of file array_helper.php */
/* Location: ./application/helpers/array_helper.php */