<?php

if (count($_POST) > 0) {
    $name = $_POST['name'];
    $class = $_POST['class'];
    $school = $_POST['school'];
    $bdate = $_POST['bdate'];
    $hobbies = [];
    if ($_POST['hb-music'] == true) array_push($hobbies, 'Music');
    if ($_POST['hb-football'] == true) array_push($hobbies, 'Football');
    if ($_POST['hb-photography'] == true) array_push($hobbies, 'Photography');
    if ($_POST['hb-movie'] == true) array_push($hobbies, 'Movie');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student information</title>
</head>
<body>
    <table>
        <tr>
            <td>Name</td>
            <td><?php echo $name; ?></td>
        </tr>
        <tr>
            <td>Class</td>
            <td><?php echo $class; ?></td>
        </tr>
        <tr>
            <td>School</td>
            <td><?php echo $school; ?></td>
        </tr>
        <tr>
            <td>Birth Date</td>
            <td><?php echo $bdate; ?></td>
        </tr>
        <tr>
            <td>Hobbies</td>
            <td>
                <?php
                    foreach ($hobbies as $hobbies) echo $hobbies.',';
                ?>
            </td>
        </tr>
    </table>
</body>
</html>
