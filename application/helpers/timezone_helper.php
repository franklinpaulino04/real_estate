<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('timezone_list'))
{
    function timezone_list($regions = FALSE)
    {
        if($regions == FALSE)
        {
            static $regions = array(
                DateTimeZone::AFRICA,
                DateTimeZone::AMERICA,
                DateTimeZone::ANTARCTICA,
                DateTimeZone::ASIA,
                DateTimeZone::ATLANTIC,
                DateTimeZone::AUSTRALIA,
                DateTimeZone::EUROPE,
                DateTimeZone::INDIAN,
                DateTimeZone::PACIFIC,
            );
        }

        $timezones              = array();
        $timezone_offsets       = array();
        $timezone_list          = array();

        foreach($regions as $region )
        {
            $timezones = array_merge( $timezones, DateTimeZone::listIdentifiers( $region ) );
        }

        foreach( $timezones as $timezone )
        {
            $tz = new DateTimeZone($timezone);
            $timezone_offsets[$timezone] = $tz->getOffset(new DateTime);
        }

        // sort timezone by offset
        asort($timezone_offsets);

        foreach( $timezone_offsets as $timezone => $offset )
        {
            $offset_prefix              = $offset < 0 ? '-' : '+';
            $offset_formatted           = gmdate( 'H:i', abs($offset) );
            $pretty_offset              = "UTC${offset_prefix}${offset_formatted}";
            $timezone_list[$timezone]   = "(${pretty_offset}) $timezone";
        }

        return $timezone_list;
    }
}