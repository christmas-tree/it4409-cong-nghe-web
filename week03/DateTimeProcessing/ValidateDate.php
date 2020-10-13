<?php

function isValidDate($day, $month, $year)
{
    if ($day > 31 || $month > 12) {
        return false;
    } else if ($month == 4 || $month == 6 || $month == 9 || $month == 11) {
        if ($day == 31)
            return false;
    } else if ($month == 2) {
        if (($year % 100 == 0 && $year % 400 != 0) || $year % 4 != 0)
            if ($day > 28)
                return false;
            else if ($day > 29)
                return false;
    }
    return true;
}
