<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter Date Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/date_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Get "now" time
 *
 * Returns time() or its GMT equivalent based on the config file preference
 *
 * @access	public
 * @return	integer
 */	
if ( ! function_exists('now'))
{
	function now()
	{
		$CI =& get_instance();
	
		if (strtolower($CI->config->item('time_reference')) == 'gmt')
		{
			$now = time();
			$system_time = mktime(gmdate("H", $now), gmdate("i", $now), gmdate("s", $now), gmdate("m", $now), gmdate("d", $now), gmdate("Y", $now));
	
			if (strlen($system_time) < 10)
			{
				$system_time = time();
				log_message('error', 'The Date class could not set a proper GMT timestamp so the local time() value was used.');
			}
	
			return $system_time;
		}
		else
		{
			return time();
		}
	}
}
	
// ------------------------------------------------------------------------

/**
 * Convert MySQL Style Datecodes
 *
 * This function is identical to PHPs date() function,
 * except that it allows date codes to be formatted using
 * the MySQL style, where each code letter is preceded
 * with a percent sign:  %Y %m %d etc...
 *
 * The benefit of doing dates this way is that you don't
 * have to worry about escaping your text letters that
 * match the date codes.
 *
 * @access	public
 * @param	string
 * @param	integer
 * @return	integer
 */	
if ( ! function_exists('mdate'))
{
	function mdate($datestr = '', $time = '')
	{
		if ($datestr == '')
			return '';
	
		if ($time == '')
			$time = now();
		
		$datestr = str_replace('%\\', '', preg_replace("/([a-z]+?){1}/i", "\\\\\\1", $datestr));
		return date($datestr, $time);
	}
}
	
// ------------------------------------------------------------------------

/**
 * Standard Date
 *
 * Returns a date formatted according to the submitted standard.
 *
 * @access	public
 * @param	string	the chosen format
 * @param	integer	Unix timestamp
 * @return	string
 */	
if ( ! function_exists('standard_date'))
{
	function standard_date($fmt = 'DATE_RFC822', $time = '')
	{
		$formats = array(
						'DATE_ATOM'		=>	'%Y-%m-%dT%H:%i:%s%Q',
						'DATE_COOKIE'	=>	'%l, %d-%M-%y %H:%i:%s UTC',
						'DATE_ISO8601'	=>	'%Y-%m-%dT%H:%i:%s%O',
						'DATE_RFC822'	=>	'%D, %d %M %y %H:%i:%s %O',
						'DATE_RFC850'	=>	'%l, %d-%M-%y %H:%m:%i UTC',
						'DATE_RFC1036'	=>	'%D, %d %M %y %H:%i:%s %O',
						'DATE_RFC1123'	=>	'%D, %d %M %Y %H:%i:%s %O',
						'DATE_RSS'		=>	'%D, %d %M %Y %H:%i:%s %O',
						'DATE_W3C'		=>	'%Y-%m-%dT%H:%i:%s%Q'
						);

		if ( ! isset($formats[$fmt]))
		{
			return FALSE;
		}
	
		return mdate($formats[$fmt], $time);
	}
}
	
// ------------------------------------------------------------------------

/**
 * Timespan
 *
 * Returns a span of seconds in this format:
 *	10 days 14 hours 36 minutes 47 seconds
 *
 * @access	public
 * @param	integer	a number of seconds
 * @param	integer	Unix timestamp
 * @return	integer
 */	
if ( ! function_exists('timespan'))
{
	function timespan($seconds = 1, $time = '')
	{
		$CI =& get_instance();
		$CI->lang->load('date');

		if ( ! is_numeric($seconds))
		{
			$seconds = 1;
		}
	
		if ( ! is_numeric($time))
		{
			$time = time();
		}
	
		if ($time <= $seconds)
		{
			$seconds = 1;
		}
		else
		{
			$seconds = $time - $seconds;
		}
		
		$str = '';
		$years = floor($seconds / 31536000);
	
		if ($years > 0)
		{	
			$str .= $years.' '.$CI->lang->line((($years	> 1) ? 'date_years' : 'date_year')).', ';
		}	
	
		$seconds -= $years * 31536000;
		$months = floor($seconds / 2628000);
	
		if ($years > 0 OR $months > 0)
		{
			if ($months > 0)
			{	
				$str .= $months.' '.$CI->lang->line((($months	> 1) ? 'date_months' : 'date_month')).', ';
			}	
	
			$seconds -= $months * 2628000;
		}

		$weeks = floor($seconds / 604800);
	
		if ($years > 0 OR $months > 0 OR $weeks > 0)
		{
			if ($weeks > 0)
			{	
				$str .= $weeks.' '.$CI->lang->line((($weeks	> 1) ? 'date_weeks' : 'date_week')).', ';
			}
		
			$seconds -= $weeks * 604800;
		}			

		$days = floor($seconds / 86400);
	
		if ($months > 0 OR $weeks > 0 OR $days > 0)
		{
			if ($days > 0)
			{	
				$str .= $days.' '.$CI->lang->line((($days	> 1) ? 'date_days' : 'date_day')).', ';
			}
	
			$seconds -= $days * 86400;
		}
	
		$hours = floor($seconds / 3600);
	
		if ($days > 0 OR $hours > 0)
		{
			if ($hours > 0)
			{
				$str .= $hours.' '.$CI->lang->line((($hours	> 1) ? 'date_hours' : 'date_hour')).', ';
			}
		
			$seconds -= $hours * 3600;
		}
	
		$minutes = floor($seconds / 60);
	
		if ($days > 0 OR $hours > 0 OR $minutes > 0)
		{
			if ($minutes > 0)
			{	
				$str .= $minutes.' '.$CI->lang->line((($minutes	> 1) ? 'date_minutes' : 'date_minute')).', ';
			}
		
			$seconds -= $minutes * 60;
		}
	
		if ($str == '')
		{
			$str .= $seconds.' '.$CI->lang->line((($seconds	> 1) ? 'date_seconds' : 'date_second')).', ';
		}
			
		return substr(trim($str), 0, -1);
	}
}
	
// ------------------------------------------------------------------------

/**
 * Number of days in a month
 *
 * Takes a month/year as input and returns the number of days
 * for the given month/year. Takes leap years into consideration.
 *
 * @access	public
 * @param	integer a numeric month
 * @param	integer	a numeric year
 * @return	integer
 */	
if ( ! function_exists('days_in_month'))
{
	function days_in_month($month = 0, $year = '')
	{
		if ($month < 1 OR $month > 12)
		{
			return 0;
		}
	
		if ( ! is_numeric($year) OR strlen($year) != 4)
		{
			$year = date('Y');
		}
	
		if ($month == 2)
		{
			if ($year % 400 == 0 OR ($year % 4 == 0 AND $year % 100 != 0))
			{
				return 29;
			}
		}

		$days_in_month	= array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
		return $days_in_month[$month - 1];
	}
}
	
// ------------------------------------------------------------------------

/**
 * Converts a local Unix timestamp to GMT
 *
 * @access	public
 * @param	integer Unix timestamp
 * @return	integer
 */	
if ( ! function_exists('local_to_gmt'))
{
	function local_to_gmt($time = '')
	{
		if ($time == '')
			$time = time();
	
		return mktime( gmdate("H", $time), gmdate("i", $time), gmdate("s", $time), gmdate("m", $time), gmdate("d", $time), gmdate("Y", $time));
	}
}
	
// ------------------------------------------------------------------------

/**
 * Converts GMT time to a localized value
 *
 * Takes a Unix timestamp (in GMT) as input, and returns
 * at the local value based on the timezone and DST setting
 * submitted
 *
 * @access	public
 * @param	integer Unix timestamp
 * @param	string	timezone
 * @param	bool	whether DST is active
 * @return	integer
 */	
if ( ! function_exists('gmt_to_local'))
{
	function gmt_to_local($time = '', $timezone = 'UTC', $dst = FALSE)
	{			
		if ($time == '')
		{
			return now();
		}
	
		$time += timezones($timezone) * 3600;

		if ($dst == TRUE)
		{
			$time += 3600;
		}
	
		return $time;
	}
}
	
// ------------------------------------------------------------------------

/**
 * Converts a MySQL Timestamp to Unix
 *
 * @access	public
 * @param	integer Unix timestamp
 * @return	integer
 */	
if ( ! function_exists('mysql_to_unix'))
{
	function mysql_to_unix($time = '')
	{
		// We'll remove certain characters for backward compatibility
		// since the formatting changed with MySQL 4.1
		// YYYY-MM-DD HH:MM:SS
	
		$time = str_replace('-', '', $time);
		$time = str_replace(':', '', $time);
		$time = str_replace(' ', '', $time);
	
		// YYYYMMDDHHMMSS
		return  mktime(
						substr($time, 8, 2),
						substr($time, 10, 2),
						substr($time, 12, 2),
						substr($time, 4, 2),
						substr($time, 6, 2),
						substr($time, 0, 4)
						);
	}
}
	
// ------------------------------------------------------------------------

/**
 * Unix to "Human"
 *
 * Formats Unix timestamp to the following prototype: 2006-08-21 11:35 PM
 *
 * @access	public
 * @param	integer Unix timestamp
 * @param	bool	whether to show seconds
 * @param	string	format: us or euro
 * @return	string
 */	
if ( ! function_exists('unix_to_human'))
{
	function unix_to_human($time = '', $seconds = FALSE, $fmt = 'us')
	{
		$r  = date('Y', $time).'-'.date('m', $time).'-'.date('d', $time).' ';
		
		if ($fmt == 'us')
		{
			$r .= date('h', $time).':'.date('i', $time);
		}
		else
		{
			$r .= date('H', $time).':'.date('i', $time);
		}
	
		if ($seconds)
		{
			$r .= ':'.date('s', $time);
		}
	
		if ($fmt == 'us')
		{
			$r .= ' '.date('A', $time);
		}
		
		return $r;
	}
}
	
// ------------------------------------------------------------------------

/**
 * Convert "human" date to GMT
 *
 * Reverses the above process
 *
 * @access	public
 * @param	string	format: us or euro
 * @return	integer
 */	
if ( ! function_exists('human_to_unix'))
{
	function human_to_unix($datestr = '')
	{
		if ($datestr == '')
		{
			return FALSE;
		}
	
		$datestr = trim($datestr);
		$datestr = preg_replace("/\040+/", "\040", $datestr);

		if ( ! preg_match('/^[0-9]{2,4}\-[0-9]{1,2}\-[0-9]{1,2}\s[0-9]{1,2}:[0-9]{1,2}(?::[0-9]{1,2})?(?:\s[AP]M)?$/i', $datestr))
		{
			return FALSE;
		}

		$split = preg_split("/\040/", $datestr);

		$ex = explode("-", $split['0']);
	
		$year  = (strlen($ex['0']) == 2) ? '20'.$ex['0'] : $ex['0'];
		$month = (strlen($ex['1']) == 1) ? '0'.$ex['1']  : $ex['1'];
		$day   = (strlen($ex['2']) == 1) ? '0'.$ex['2']  : $ex['2'];

		$ex = explode(":", $split['1']);
	
		$hour = (strlen($ex['0']) == 1) ? '0'.$ex['0'] : $ex['0'];
		$min  = (strlen($ex['1']) == 1) ? '0'.$ex['1'] : $ex['1'];

		if (isset($ex['2']) && preg_match('/[0-9]{1,2}/', $ex['2']))
		{
			$sec  = (strlen($ex['2']) == 1) ? '0'.$ex['2'] : $ex['2'];
		}
		else
		{
			// Unless specified, seconds get set to zero.
			$sec = '00';
		}
	
		if (isset($split['2']))
		{
			$ampm = strtolower($split['2']);
		
			if (substr($ampm, 0, 1) == 'p' AND $hour < 12)
				$hour = $hour + 12;
			
			if (substr($ampm, 0, 1) == 'a' AND $hour == 12)
				$hour =  '00';
			
			if (strlen($hour) == 1)
				$hour = '0'.$hour;
		}
			
		return mktime($hour, $min, $sec, $month, $day, $year);
	}
}
	
// ------------------------------------------------------------------------

/**
 * Timezone Menu
 *
 * Generates a drop-down menu of timezones.
 *
 * @access	public
 * @param	string	timezone
 * @param	string	classname
 * @param	string	menu name
 * @return	string
 */	
if ( ! function_exists('timezone_menu'))
{
	function timezone_menu($default = 'UTC', $class = "", $name = 'timezones')
	{
		$CI =& get_instance();
		$CI->lang->load('date');
	
		if ($default == 'GMT')
			$default = 'UTC';

		$menu = '<select name="'.$name.'"';
	
		if ($class != '')
		{
			$menu .= ' class="'.$class.'"';
		}
	
		$menu .= ">\n";
	
		foreach (timezones() as $key => $val)
		{
			$selected = ($default == $key) ? " selected='selected'" : '';
			$menu .= "<option value='{$key}'{$selected}>".$CI->lang->line($key)."</option>\n";
		}

		$menu .= "</select>";

		return $menu;
	}
}
	
// ------------------------------------------------------------------------

/**
 * Timezones
 *
 * Returns an array of timezones.  This is a helper function
 * for various other ones in this library
 *
 * @access	public
 * @param	string	timezone
 * @return	string
 */	
if ( ! function_exists('timezones'))
{
	function timezones($tz = '')
	{
		// Note: Don't change the order of these even though
		// some items appear to be in the wrong order
		
		$zones = array( 
						'UM12'		=> -12,
						'UM11'		=> -11,
						'UM10'		=> -10,
						'UM95'		=> -9.5,
						'UM9'		=> -9,
						'UM8'		=> -8,
						'UM7'		=> -7,
						'UM6'		=> -6,
						'UM5'		=> -5,
						'UM45'		=> -4.5,
						'UM4'		=> -4,
						'UM35'		=> -3.5,
						'UM3'		=> -3,
						'UM2'		=> -2,
						'UM1'		=> -1,
						'UTC'		=> 0,
						'UP1'		=> +1,
						'UP2'		=> +2,
						'UP3'		=> +3,
						'UP35'		=> +3.5,
						'UP4'		=> +4,
						'UP45'		=> +4.5,
						'UP5'		=> +5,
						'UP55'		=> +5.5,
						'UP575'		=> +5.75,
						'UP6'		=> +6,
						'UP65'		=> +6.5,
						'UP7'		=> +7,
						'UP8'		=> +8,
						'UP875'		=> +8.75,
						'UP9'		=> +9,
						'UP95'		=> +9.5,
						'UP10'		=> +10,
						'UP105'		=> +10.5,
						'UP11'		=> +11,
						'UP115'		=> +11.5,
						'UP12'		=> +12,
						'UP1275'	=> +12.75,
						'UP13'		=> +13,
						'UP14'		=> +14
					);
				
		if ($tz == '')
		{
			return $zones;
		}
	
		if ($tz == 'GMT')
			$tz = 'UTC';
	
		return ( ! isset($zones[$tz])) ? 0 : $zones[$tz];
	}
}

/**
* Convert MySQL's DATE (YYYY-MM-DD) or DATETIME (YYYY-MM-DD hh:mm:ss) to timestamp
*
* Returns the timestamp equivalent of a given DATE/DATETIME
*
* @todo add regex to validate given datetime
* @author Clemens Kofler <clemens.kofler@chello.at>
* @access    public
* @return    integer
*/
function mysqldatetime_to_timestamp($datetime = "")
{
  // function is only applicable for valid MySQL DATETIME (19 characters) and DATE (10 characters)
  $l = strlen($datetime);
    if(!($l == 10 || $l == 19))
      return 0;

    //
    $date = $datetime;
    $hours = 0;
    $minutes = 0;
    $seconds = 0;

    // DATETIME only
    if($l == 19)
    {
      list($date, $time) = explode(" ", $datetime);
      list($hours, $minutes, $seconds) = explode(":", $time);
    }

    list($year, $month, $day) = explode("-", $date);

    return mktime($hours, $minutes, $seconds, $month, $day, $year);
}

/**
* Convert MySQL's DATE (YYYY-MM-DD) or DATETIME (YYYY-MM-DD hh:mm:ss) to date using given format string
*
* Returns the date (format according to given string) of a given DATE/DATETIME
*
* @author Clemens Kofler <clemens.kofler@chello.at>
* @access    public
* @return    integer
*/
function mysqldatetime_to_date($datetime = "", $format = "d.m.Y, H:i:s")
{
    return date($format, mysqldatetime_to_timestamp($datetime));
}

/**
* Convert timestamp to MySQL's DATE or DATETIME (YYYY-MM-DD hh:mm:ss)
*
* Returns the DATE or DATETIME equivalent of a given timestamp
*
* @author Clemens Kofler <clemens.kofler@chello.at>
* @access    public
* @return    string
*/
function timestamp_to_mysqldatetime($timestamp = "", $datetime = true)
{
  if(empty($timestamp) || !is_numeric($timestamp)) $timestamp = time();

    return ($datetime) ? date("Y-m-d H:i:s", $timestamp) : date("Y-m-d", $timestamp);
}



/**
* Convert timestamp to Human Date
*
* Returns the date (format according to given string) of a given timestamp
*
* @author    Cleiton Francisco V. Gomes <http://www.cleitonfco.com.br/>
* @access    public
* @param     string
* @param     string
* @return    string
*/
function timestamp_to_date($timestamp = "", $format = "d/m/Y H:i:s")
{
  if(empty($timestamp) || !is_numeric($timestamp)) $timestamp = time();
  return date($format, $timestamp);
}

/**
* Convert Human Date to Timestamp
*
* Returns the timestamp equivalent of a given HUMAN DATE/DATETIME
*
* @author    Cleiton Francisco V. Gomes <http://www.cleitonfco.com.br/>
* @access    public
* @param     string
* @return    integer
*/
function date_to_timestamp($datetime = "")
{
  if (!preg_match("/^(\d{1,2})[.\- \/](\d{1,2})[.\- \/](\d{2}(\d{2})?)( (\d{1,2}):(\d{1,2})(:(\d{1,2}))?)?$/", $datetime, $date))
    return FALSE;
    
  $day = $date[1];
  $month = $date[2];
  $year = $date[3];
  $hour = (empty($date[6])) ? 0 : $date[6];
  $min = (empty($date[7])) ? 0 : $date[7];
  $sec = (empty($date[9])) ? 0 : $date[9];

  return mktime($hour, $min, $sec, $month, $day, $year);
}

/**
* Convert HUMAN DATE to MySQL's DATE or DATETIME (YYYY-MM-DD hh:mm:ss)
*
* Returns the DATE or DATETIME equivalent of a given HUMAN DATE/DATETIME
*
* @author    Cleiton Francisco V. Gomes <http://www.cleitonfco.com.br/>
* @access    public
* @param     string
* @param     boolean
* @return    string
*/
function date_to_mysqldatetime($date = "", $datetime = TRUE)
{
  return timestamp_to_mysqldatetime(date_to_timestamp($date), $datetime);
} 

function zero($value) {  
	$zero=5-strlen($value);
	for ($i = 1; $i <= $zero; $i++) {
	   $value = "0".$value;
	}
	return("1101".$value);//"1101".$value);
}

function last_day_of_month($date="")
{
	return date('Y-m-d',strtotime('-1 second',strtotime('+1 month',strtotime($date.' 00:00:00'))));
}


function human_friendly_date($date)
{
    $today = timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s");
    $ago = abs(strtotime($today) - strtotime($date));

    if($date != '')
    {
        if($ago >= 31636000){
            return 'hace '.floor($ago/31636000).' años';
        }elseif($ago >= 2628000) {
            return 'hace '.floor($ago/2628000).' meses';
        }elseif($ago >= 604800) {
            return 'hace '.floor($ago/604800).' semanas';
        }elseif($ago >= 86400) {
            return 'hace '.floor($ago/86400).' días';
        } elseif ($ago >= 3600) {
            return 'hace '.floor($ago/3600).' horas';
        } elseif ($ago >= 60) {
            return 'hace '.floor($ago/60).' minutos';
        } else {
            return 'hace '.$ago.' segundos';
        }
    }
    else
    {
        return 'N/A';
    }

}

// ------------------------------------------------------------------------

/**
 * Timespan
 *
 * Returns a span of seconds in this format:
 *	10 days 14 hours 36 minutes 47 seconds
 *
 * @access	public
 * @param	integer	a number of seconds
 * @param	integer	Unix timestamp
 * @return	integer
 */
if ( ! function_exists('format_time'))
{
    function format_time($t, $f=':') // t = seconds, f = separator
    {
        return ($t < 0 ? '-' : '') . sprintf("%02d%s%02d%s%02d", floor(abs($t)/3600), $f, (abs($t)/60)%60, $f, abs($t)%60);
    }
}

// ------------------------------------------------------------------------
/**
 * Month Names
 *
 * Returns a month name
 *
 * @access	public
 * @param	integer	a number
 * @return	string
 */
if ( ! function_exists('month_name'))
{
    function month_name($num)
    {
        $months = array(
            '01' => 'Enero',
            '02' => 'Febrero',
            '03' => 'Marzo',
            '04' => 'Abril',
            '05' => 'Mayo',
            '06' => 'Junio',
            '07' => 'Julio',
            '08' => 'Agosto',
            '09' => 'Septiembre',
            '10' => 'Octubre',
            '11' => 'Noviembre',
            '12' => 'Diciembre'
        );

        return $months[$num];
    }
}


/**
 * Month Names Abreviated
 *
 * Returns a month name in abbriviated form
 *
 * @access	public
 * @param	integer	a number
 * @return	string
 */

if ( ! function_exists('month_name_abrev'))
{
    function month_name_abrev($num)
    {
        $months = array(
            '01' => 'Ene',
            '02' => 'Feb',
            '03' => 'Mar',
            '04' => 'Abr',
            '05' => 'May',
            '06' => 'Jun',
            '07' => 'Jul',
            '08' => 'Ago',
            '09' => 'Sep',
            '10' => 'Oct',
            '11' => 'Nov',
            '12' => 'Dic'
        );

        return $months[$num];
    }
}

/**
 * WEEKDAYS ABREV
 *
 * Returns a weekday name in abbriviated form
 *
 * @access	public
 * @param	string weekday 2 caracters
 * @return	string
 */

if ( ! function_exists('weekdays'))
{
    function weekdays()
    {
        $weekdays = array(
            'SU' => 'D',
            'MO' => 'L',
            'TU' => 'M',
            'WE' => 'M',
            'TH' => 'J',
            'FR' => 'V',
            'SA' => 'S'
        );

        return $weekdays;
    }
}

/**
 * Weekdays names
 *
 * Returns a weekday name
 *
 * @access	public
 * @param	interger a day number
 * @return	string
 */

if ( ! function_exists('day_week_name'))
{
    function day_week_name($num)
    {
        $name = array(
            '1' => 'Lunes',
            '2' => 'Martes',
            '3' => 'Miercoles',
            '4' => 'Jueves',
            '5' => 'Viernes',
            '6' => 'Sabado',
            '7' => 'Domingo'
        );

        return $name[$num];
    }
}

/**
 * Human readable format
 *
 * Returns a date in this format:
 *	10 enero, 2018
 *
 * @access	public
 * @param	string a date
 * @return	integer
 */
if ( ! function_exists('human_date_format'))
{
    function human_date_format($date)
    {
        $d = explode("-", $date);
        return $d[2] . ' de ' . month_name($d[1]) . ', ' . $d[0];
    }
}

/**
 * Human readable format
 *
 * Returns a time in this format:
 *	10:00am
 *
 * @access	public
 * @param	string a date
 * @return	integer
 */
if ( ! function_exists('human_time_format'))
{
    function human_time_format($time)
    {
        return date('h:ia', strtotime($time));
    }
}


if ( ! function_exists('date_diff_month'))
{
    function date_diff_month($date_from = FALSE, $date_to = FALSE)
    {
        $date_from      = ($date_from == FALSE)? date('Y-m-d') : $date_from;
        $date_to        = ($date_to == FALSE)? date('Y-m-d') : $date_to;
        $date_from      = new DateTime($date_from);
        $date_to        = new DateTime($date_to);
        $interval       = $date_from->diff($date_to);

        return ($interval->y * 12) + $interval->m;
    }
}

if ( ! function_exists('get_last_day_month'))
{
    function get_last_day_month($month, $year)
    {
        return date("d",(mktime(0,0,0,$month+1,1,$year)-1));
    }
}

if ( ! function_exists('human_file_size'))
{
    function human_file_size($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= (1 << (10 * $pow));

        return number_format(round($bytes, $precision),2) . ' ' . $units[$pow];
    }
}

if ( ! function_exists('last_day_month'))
{
    function last_day_month($date)
    {
        return date("Y-m-t", strtotime($date));
    }
}

if ( ! function_exists('first_day_month'))
{
    function first_day_month($date)
    {
        return date("Y-m", strtotime($date))."-01";
    }
}

if ( ! function_exists('_date_add'))
{
    function _date_add($date, $str)
    {
        return date('Y-m-d', strtotime($date." ".$str));
    }
}

if ( ! function_exists('range_month'))
{
    function range_month()
    {
        $data['to'] = timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-t");
        $from = timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d");
        $data['from']= date("Y-m", strtotime($from))."-01";

        return $data;
    }
}

if ( ! function_exists('_dateRange'))
{
    function _dateRange( $start_date, $start_end, $step = '+1 month', $format = 'Y-m-d' )
    {

        $dates      = array();
        $current    = strtotime($start_date);
        $last       = strtotime($start_end);

        while($current <= $last)
        {
            $dates[] = date($format, $current);
            $current = strtotime($step, $current);
        }

        return $dates;
    }
}

if ( ! function_exists('_monthly_periods'))
{
    function _monthly_periods()
    {
        $month[1] = "1 Mes";
        for ($i=2; $i <= 12; $i++) {
            $month[$i] = "{$i} Meses";
        }
        return $month;
    }
}

if ( ! function_exists('_month_name'))
{
    function _month_name($num)
    {
        $months = array(
            '01'    =>'Enero',
            '02'    =>'Febrero',
            '03'    =>'Marzo',
            '04'    =>'Abril',
            '05'    =>'Mayo',
            '06'    =>'Junio',
            '07'    =>'Julio',
            '08'    =>'Agosto',
            '09'    =>'Septiembre',
            '10'    =>'Octubre',
            '11'    =>'Noviembre',
            '12'    =>'Diciembre'
        );

        return $months[$num];
    }
}

if ( ! function_exists('_month_name_abrev'))
{
    function _month_name_abrev($num)
    {
        $months = array(
            '01'    =>'Ene',
            '02'    =>'Feb',
            '03'    =>'Mar',
            '04'    =>'Abr',
            '05'    =>'May',
            '06'    =>'Jun',
            '07'    =>'Jul',
            '08'    =>'Ago',
            '09'    =>'Sep',
            '10'    =>'Oct',
            '11'    =>'Nov',
            '12'    =>'Dic'
        );

        return $months[$num];
    }
}

if ( ! function_exists('_weekdays'))
{
    function _weekdays()
    {
        $weekdays = array(
            'SU'    =>'D',
            'MO'    =>'L',
            'TU'    =>'M',
            'WE'    =>'M',
            'TH'    =>'J',
            'FR'    =>'V',
            'SA'    =>'S'
        );

        return $weekdays;
    }
}

if ( ! function_exists('_day_week_name'))
{
    function _day_week_name($num)
    {
        $name = array(
            '1'    =>'Lunes',
            '2'    =>'Martes',
            '3'    =>'Miercoles',
            '4'    =>'Jueves',
            '5'    =>'Viernes',
            '6'    =>'Sabado',
            '7'    =>'Domingo'
        );

        return $name[$num];
    }
}

if ( ! function_exists('_years'))
{
    function _years()
    {
        for($i=date('Y'); $i>2009; $i--)
        {
            $years[$i] = $i;
        }

        return $years;
    }
}

if ( ! function_exists('_years_ASC'))
{
    function _years_ASC($old_date)
    {
        $date       = date('Y-m-j');
        $end_date   = strtotime('+2 year', strtotime($date));
        $start_year = $old_date;
        $end_year   = date ('Y', $end_date);

        for($i=$start_year; $i<=$end_year; $i++)
        {
            $years[$i] = $i;
        }

        return $years;
    }
}

if ( ! function_exists('_hours'))
{
    function _hours($interval = '+30 minutes')
    {
        $hours = array();
        $current = strtotime('00:00');
        $end = strtotime('23:59');
        while ($current <= $end) {
            $time = date('H:i', $current);
            $hours[$time] = date('h:i A', $current);
            $current = strtotime($interval, $current);
        }
        return $hours;
    }
}

if ( ! function_exists('_12hours'))
{
    function _12hours ($time){
        $hour =  date( "h:i a", strtotime($time));
        return $hour;
    }
}

if ( ! function_exists('_days'))
{
    function _days()
    {
        $days[0] = 'Dias';
        for ($i=1; $i <= 31; $i++) {
            $days[$i] = $i;
        }
        return $days;
    }
}

if ( ! function_exists('_months'))
{
    function _months()
    {
        $months = array(
            '01'  => 'Enero',
            '02'  => 'Febrero',
            '03'  => 'Marzo',
            '04'  => 'Abril',
            '05'  => 'Mayo',
            '06'  => 'Junio',
            '07'  => 'Julio',
            '08'  => 'Agosto',
            '09'  => 'Septiembre',
            '10'  => 'Octubre',
            '11'  => 'Noviembre',
            '12'  => 'Diciembre'
        );

        return $months;
    }
}

if ( ! function_exists('_months_abrev'))
{
    function _months_abrev()
    {
        $months = array(
            '01'  => 'Ene',
            '02'  => 'Feb',
            '03'  => 'Mar',
            '04'  => 'Abr',
            '05'  => 'May',
            '06'  => 'Jun',
            '07'  => 'Jul',
            '08'  => 'Ago',
            '09'  => 'Sep',
            '10'  => 'Oct',
            '11'  => 'Nov',
            '12'  => 'Dic'
        );

        return $months;
    }
}

if ( ! function_exists('generate_range'))
{
    function generate_range($from, $period, $count, $until = FALSE)
    {
        $current = $count + 1;

        switch($period)
        {
            case 1:
                // Mes
                $count                      = $current*1;
                $from                       = strtotime ("-$count month" , strtotime($from));
                $from                       = date ('Y-m-d', $from);
                $date                       = explode('-', $from);
                $month                      = $date[1];
                $year                       = $date[0];
                $param['name_date']         = month_name($month);
                $param['from']              = $year.'-'.$month.'-01';
                $param['to']                = date("Y-m-t", strtotime($param['from']));
                $param['from']              = ($until == FALSE)? $param['from'] : '';
                break;

            case 2:
                // Trimestre
                $count                      = $current*3;
                $from                       = strtotime ("-$count month" , strtotime($from));
                $from                       = date ('Y-m-d', $from);
                $date                       = explode('-', $from);
                $month                      = $date[1];
                $year                       = $date[0];
                $param['from']              = $year.'-'.$month.'-01';
                $to                         = strtotime("CURRENT()" , strtotime($from));print_d($to);
                $param['to']                = date("Y-m-t", strtotime($param['from']));
                $param['name_date']         = 'T'.$current;
                break;

            case 3:
                // Cuatrimestre
                $count                      = $current*4;
                $from                       = strtotime ("-$count month" , strtotime($from));
                $from                       = date ('Y-m-d', $from);
                $date                       = explode('-', $from);
                $month                      = $date[1];
                $year                       = $date[0];
                $param['from']              = $year.'-'.$month.'-01';
                $param['to']                = date("Y-m-t", strtotime($param['from']));
                $param['name_date']         = 'C'.$current;
                break;

            case 4:
                // Semestre
                $count                      = $current*6;
                $from                       = strtotime ("-$count month" , strtotime($from));
                $from                       = date ('Y-m-d', $from);
                $date                       = explode('-', $from);
                $month                      = $date[1];
                $year                       = $date[0];
                $param['from']              = $year.'-'.$month.'-01';
                $param['to']                = date("Y-m-t", strtotime($param['from']));
                $param['name_date']         = 'S'.$current;
                break;

            case 5:
                // Anual
                $from                       = strtotime ("-$count year" , strtotime($from));
                $from                       = date ('Y-m-d', $from);
                $date                       = explode('-', $from);
                $year                       = $date[0];
                $param['from']              = ($until == FALSE)? $year.'-01-01' : '';
                $param['to']                = $year.'-12-31';
                $param['name_date']         = $year;
                break;
        }

        return $param;
    }
}


/**
 *  Returns an array of generated periods form a start date, interval and the number of periods requested.
 *
 *  $start_fiscal_year = first day of fiscal year.
 *  $interval = php interval format ej: P3M (every 3 months) or P1D (every day).
 *  $count = Number of periods to generate starting from $start_fiscal_year and $interval.
 *
 *  PHP Interval format ej: Day = P1D, Month = P1M, Quarter = P3M, Year = P1Y, where 1 is the number of periods.
 *
 * @access	public
 * @param	mixed string
 * @param	mixed string
 * @param	mixed int
 * @return	array
 */
if ( ! function_exists('generate_period'))
{
    function generate_period($data)
    {

        $valid                                  = TRUE;
        $periods                                = array();
        $valid                                  = ($data == FALSE)? FALSE : $valid;
        $valid                                  = (!isset($data['start_date']) || $data['start_date'] == '')? FALSE : $valid;
        $valid                                  = (!isset($data['interval']) || $data['interval'] == '')? FALSE : $valid;
        $valid                                  = (!isset($data['count']) || $data['count'] == '')? FALSE : $valid;

        if($valid !== FALSE)
        {
            $p                                  = explode(':', $data['interval']);
            $int_end                            = $p[1];

            for($i=1; $i <= $data['count']; $i++)
            {
                $int_start                      = ($i!==1)? $int_end : 0;
                $p_start                        = $p[0].$int_start.$p[2];
                $int_end                        = $p[1] * $i;
                $p_end                          = $p[0].$int_end.$p[2];
                $date                           = new DateTime($data['start_date']);

                $date->add(new DateInterval('P1D'));

                $period_start                   = clone $date;
                $period_end                     = clone $date;

                $period_start->sub(new DateInterval($p_end));
                $period_end->sub(new DateInterval($p_start));
                $period_end->sub(new DateInterval('P1D'));

                $code                           = get_code($period_start, $p[2]);

                $periods[$code] = array(
                    'end_date'                  => $period_end->format('Y-m-d'),
                    'start_date'                => $period_start->format('Y-m-d'),
                );
            }
        }

        return $periods;

    }
}

if ( ! function_exists('get_code'))
{
    function get_code($date, $interval)
    {
        switch($interval)
        {
            case "Y":
                $code = $date->format('Y');
                break;

            case "M":
            default:
                $code = $date->format('Y-m');
                break;

            case "D":
                $code = $date->format('Y-m-d');
                break;
        }

        return $code;
    }
}

/* End of file date_helper.php */
/* Location: ./system/helpers/date_helper.php */