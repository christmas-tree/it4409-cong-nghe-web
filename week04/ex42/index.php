<?php

$storage_path = 'storage/';

// check method of request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['files'])) {
        // add new files
        foreach ($_FILES['files']['name'] as $key => $name) {
            $fileName = substr($name, 0, strrpos($name, '.'));
            $fileExtension = substr($name, strrpos($name, '.'));

            // edit file name duplicate
            while (file_exists('storage/'.$name)) {
                $name = $fileName . '(' . rand(0, 999999) . ')' . $fileExtension;
            }

            move_uploaded_file($_FILES['files']['tmp_name'][$key], $storage_path . $name);
        }

        require_once 'views/output.php';
    } else
        header('Location: ' . $_SERVER['HTTP_REFERER']);
} else if (isset($_GET['number'])) { // after select number of files
    $number = $_GET['number'];

    require_once 'views/upload.php';
} else if (isset($_GET['view'])) { // go to list files page
    $files = glob('storage/*');

    require_once 'views/list.php';
} else if (isset($_GET['delete'])) { // delete file
    if (file_exists($storage_path . $_GET['delete']))
        unlink($storage_path . $_GET['delete']);

    header('Location: index.php?view=list');
} else {
    require_once 'views/input.php';
}
