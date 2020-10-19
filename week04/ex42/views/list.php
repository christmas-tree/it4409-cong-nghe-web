<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Upload files</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="container">
        <div class="row flex-lg-nowrap">
            <div class="col">
                <div class="row">
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="e-profile">
                                    <div class="row">
                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                            <div class="text-center text-sm-left mb-2 mb-sm-0 alert alert-primary">
                                                <h2 class="pt-sm-2 pb-1 mb-0 text-nowrap">Your files</h2>
                                            </div>
                                        </div>
                                        <div class="col justify-content-end">
                                            <a class="btn btn-primary" href="index.php">Go to upload page ></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <table id="list_files" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Date time</th>
                                                        <th scope="col">Size</th>
                                                        <th scope="col">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if ($files == null) {
                                                        echo "<td colspan=\"5\">You need to upload files</td>";
                                                    } else {
                                                        foreach ($files as $key => $file) {
                                                            echo "
                                                            <tr>
                                                                <th scope=\"row\">" . ($key + 1) . "</th>
                                                                <td><a href=\"$file\" download>" . substr($file, strlen($storage_path)) . "</a></td>
                                                                <td>" . date("F d Y H:i:s", filemtime($file)) . "</td>
                                                                <td>" . (int) (filesize($file) / 1024) . " KB</td>
                                                                <td><button class=\"btn btn-danger delete\" data-link=\"index.php?delete=" . substr($file, strlen($storage_path)) . "\">Delete</button></td>
                                                            </tr>
                                                            ";
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>