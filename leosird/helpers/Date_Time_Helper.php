<?php

namespace helpers;

class Date_Time_Helper
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    function get_current_datetime($format_pattern = 'd/m/Y h:i:s a') {
        return date($format_pattern, time());
    }

    public function fmt_datetime2date($datetime, $format_pattern = 'd/m/Y')
    {
        $dt = new \DateTime($datetime);

        return $dt->format($format_pattern);
    }

    // comparing day or week or month or year number
    function is_same_dwmy_number($date, $x) {
        /**
         * W = number of week
         * m = number of month
         */
        return (date($x) == date($x, strtotime($date)) ? true : false);
    }
}
