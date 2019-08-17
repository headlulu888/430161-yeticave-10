<?php

    function format_amount($number)
    {
        $number = ceil($number);

        if ($number >= 1000) {
            $number = number_format($number, 0, '', ' ');
        }

        return $number . '₽';
    }