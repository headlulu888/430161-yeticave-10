<?php

    function format_amount($number)
    {
        $number = ceil($number);

        if ($number >= 1000) {
            $number = number_format($number, 0, '', ' ');
        }

        return $number . '₽';
    }

    function get_dt_range($format)
    {
        $time_now = strtotime("2019-10-10 14:31");
        $time_last = strtotime($format);

        $diff_time = $time_last - $time_now;
        $a = floor($diff_time / 3600);
        $b = floor($diff_time % 3600 / 60);
        $hours = str_pad($a, 2, "0", STR_PAD_LEFT);
        $mins = str_pad($b, 2, "0", STR_PAD_LEFT);
        $array = [$hours, $mins];
        return $array;
    }
//    $arr = get_dt_range('2019-10-15');
//    print($arr[0] . ':' . $arr[1]);