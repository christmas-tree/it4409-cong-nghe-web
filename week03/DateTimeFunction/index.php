<?php

// check method of request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once('DateTimeFunction.php');

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
