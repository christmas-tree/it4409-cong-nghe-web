<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Unit Converter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
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
                                            <div class="text-center text-sm-left mb-2 mb-sm-0 alert alert-secondary">
                                                <h2 class="pt-sm-2 pb-1 mb-0 text-nowrap">Angle Unit Converter</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- start form -->
                                    <form class="form" method="POST" action="index.php" novalidate>
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Convert from<span>*</span></label>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input class="form-control" type="number" name="value" placeholder="value" required>
                                                                </div>
                                                                <div class="col">
                                                                    <select class="form-control" name="unit">
                                                                        <option value="rad" selected>Radian</option>
                                                                        <option value="deg">Degree</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col equal">
                                                                </div>
                                                                <div class="col">
                                                                </div>
                                                                <div class="col">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col d-flex justify-content-center">
                                                <button class="btn btn-primary" type="submit">Convert</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="js/validate.js"></script>
</body>

</html>