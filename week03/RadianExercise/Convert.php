<?php

// Radian to Degree
function convertRadToDeg($rad_val)
{
    return $rad_val * 180 / M_PI;
}

// Degree to Radian
function convertDegToRad($deg_val)
{
    return $deg_val * M_PI / 180;
}
