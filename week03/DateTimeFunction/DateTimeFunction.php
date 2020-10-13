<?php

// Date in letter
function dateInLetter($date)
{
    return (new DateTime($date))->format('l, F d, Y');
}


// calculate days between two dates
function differenceBetweenTwoDates($date1, $date2)
{
    $dateTime1 = new DateTime($date1);
    $dateTime2 = new DateTime($date2);

    return $dateTime1->diff($dateTime2)->days;
}


// calculate age
function howOld($birthday)
{
    $dateTime = new DateTime($birthday);
    $currentDateTime = new DateTime(date('Y-m-d'));

    return $dateTime->diff($currentDateTime)->y;
}

// difference years
function differenceYears($date1, $date2)
{
    $dateTime1 = new DateTime($date1);
    $dateTime2 = new DateTime($date2);

    return $dateTime1->diff($dateTime2)->y;
}

//validate birthday
function isBirthday($day, $month, $year)
{
    if (strtotime("$year/$month/$day") > strtotime('now'))
        return false;
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
