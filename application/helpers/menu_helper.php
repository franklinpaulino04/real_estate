<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Array helper
 *
 * Array and Object helper to assist on handling
 *
 * @category	Helpers
 * @version		1.0.0
 */
if ( ! function_exists('menu_active'))
{
	function menu_active($controller, $method)
	{
		if($controller == $method)
		{
			return 'active';
		}
		return '';
	}
}
