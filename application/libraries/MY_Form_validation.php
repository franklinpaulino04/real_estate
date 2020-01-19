<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

	public $CI;
	function __construct($config = array())
	{
		parent::__construct($config);
	}

	function run($module = '', $group = '')
	{
		(is_object($module)) AND $this->CI =& $module;
		return parent::run($group);

	}
}
