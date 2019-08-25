<?php
    require_once('helpers.php');

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
        $time_now = time();
        $time_last = strtotime($format);

        $diff_time = $time_last - $time_now;
        $a = floor($diff_time / 3600);
        $b = floor($diff_time % 3600 / 60);
        $hours = str_pad($a, 2, "0", STR_PAD_LEFT);
        $mins = str_pad($b, 2, "0", STR_PAD_LEFT);
        $array = [$hours, $mins];
        return $array;
    }

    function db_fetch_data($link, $sql, $data = [])
    {
        $result = [];
        $stmt = db_get_prepare_stmt($link, $sql, $data);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        if ($res) {
            $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
        }

        return $result;
    }

    function db_insert_data($link, $sql, $data = [])
    {
        $stmt = db_get_prepare_stmt($link, $sql, $data);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $result = mysqli_insert_id($link);
        }

        return $result;
    }