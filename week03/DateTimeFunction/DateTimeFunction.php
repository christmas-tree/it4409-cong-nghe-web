<?php

// Date in letter
function dateInLetter($date) {
    return (new DateTime($date))->format('l, F d, Y');
}


// calculate days between two dates
function differenceBetweenTwoDates($date1, $date2) {
    $dateTime1 = new DateTime($date1);
    $dateTime2 = new DateTime($date2);

    return $dateTime1->diff($dateTime2)->days;
}


// calculate age
function howOld($birthday) {
    $dateTime = new DateTime($birthday);
    $currentDateTime = new DateTime(date('Y-m-d'));

    return $dateTime->diff($currentDateTime)->y;
}

// difference years
function differenceYears($date1, $date2) {
    $dateTime1 = new DateTime($date1);
    $dateTime2 = new DateTime($date2);

    return $dateTime1->diff($dateTime2)->y;
}
