<?php

// check method of request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once('DateTimeFunction.php');

    //get value from request
    $name1 = $_POST['name1'];
    $day1 = $_POST['day1'];
    $month1 = $_POST['month1'];
    $year1 = $_POST['year1'];

    $name2 = $_POST['name2'];
    $day2 = $_POST['day2'];
    $month2 = $_POST['month2'];
    $year2 = $_POST['year2'];

    // validate
    $error_message1 = null;
    $error_message2 = null;
    if (!isBirthday($day1, $month1, $year1))
        $error_message1 = 'This is not a birthday!';
    if (!isBirthday($day2, $month2, $year2))
        $error_message2 = 'This is not a birthday!';
    if ($error_message1 || $error_message2) {
        require_once('views/input.php');
        exit();
    }

    $birthday1 = "$year1/$month1/$day1";
    $birthday2 = "$year2/$month2/$day2";

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
