<?php

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

// check method of request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //get value from request
    $name1 = $_POST['name1'];
    $name2 = $_POST['name2'];
    $birthday1 = $_POST['birthday1'];
    $birthday2 = $_POST['birthday2'];

    $birthdayLetter1 = dateInLetter($birthday1);
    $birthdayLetter2 = dateInLetter($birthday2);
    
    $differenceDays = differenceBetweenTwoDates($birthday1, $birthday2);

    $age1 = howOld($birthday1);
    $age2 = howOld($birthday2);
    
    $differenceYears = differenceYears($birthday1, $birthday2);

    require_once 'views/output.php';
} else {
    require_once 'views/input.php';
}
