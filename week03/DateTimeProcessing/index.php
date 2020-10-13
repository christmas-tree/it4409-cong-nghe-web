<?php

// check method of request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //get value from request
    $name = $_POST['name'];
    $hour = $_POST['hour'];
    $minute = $_POST['minute'];
    $second = $_POST['second'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];

    // validate date
    require_once('ValidateDate.php');
    if (!isValidDate($day, $month, $year)) {
        $error_message = 'This is not a date';
        require_once('views/input.php');
        exit();
    }
    
    // in 12-hours
    $hour12 = $hour % 12;
    $AMorPM = $hour > 12 ? "PM" : "AM";

    // calculate number of days
    switch ($month) {
        case '1': $numberOfDays = 31; break;
        case '2':
            $numberOfDays = ((($year % 4) == 0) && ((($year % 100) != 0) || (($year %400) == 0))) ? 29 : 28;
        break;
        case '3': $numberOfDays = 31; break;
        case '4': $numberOfDays = 30; break;
        case '5': $numberOfDays = 31; break;
        case '6': $numberOfDays = 30; break;
        case '7': $numberOfDays = 31; break;
        case '8': $numberOfDays = 31; break;
        case '9': $numberOfDays = 30; break;
        case '10': $numberOfDays = 31; break;
        case '11': $numberOfDays = 30; break;
        case '12': $numberOfDays = 31; break;
    }

    require_once 'views/output.php';
} else {
    require_once 'views/input.php';
}
