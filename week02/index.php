<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $UNIVERSITY_DICT = array(
        "1" => "Hanoi Royal University of Science and Technology",
        "2" => "Vietnam National University, Hanoi",
        "3" => "National Economics University",
    );

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $class = $_POST['class'];
    $university = $_POST['university'];
    $about = $_POST['about'];
    $address = $_POST['address'];
    $hobby = $_POST['hobby'];

    if (
        empty($name)
        || empty($username)
        || empty($email)
        || empty($class)
        || empty($university)
        || empty($address)
        || empty($hobby)
    ) {
        $warning_message = "Please enter all of the required fields.";
        include 'views/info.php';
    } else {
        $address = str_replace(PHP_EOL, "<br>", $address);
        $about = str_replace(PHP_EOL, "<br>", $about);

        include 'views/info.php';
    }
} else {
    include 'views/form.php';
}
