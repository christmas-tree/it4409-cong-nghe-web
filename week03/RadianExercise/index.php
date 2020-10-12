<?php

function convertRadToDeg($rad_val)
{
    return $rad_val * 180 / M_PI;
}

function convertDegToRad($deg_val)
{
    return $deg_val * M_PI / 180;
}

// check method of request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //get value from request
    $value = $_POST['value'];
    $from_unit = $_POST['unit'];
    $result = null;
    $to_unit = null;

    if (!empty($value) && in_array($from_unit, array('rad', 'deg'))) {

        if ($from_unit === 'rad') {
            $result = number_format(convertRadToDeg($value), 3);
            $to_unit = 'Degree';
        } else {
            $result = number_format(convertDegToRad($value), 3);
            $to_unit = 'Radian';
        }
        require_once 'views/output.php';
    } else {
        require_once 'views/input.php';
    }
} else {
    require_once 'views/input.php';
}
