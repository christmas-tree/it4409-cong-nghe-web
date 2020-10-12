<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Date Time Processing</title>
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
                                            <div class="text-center text-sm-left mb-2 mb-sm-0 alert alert-info">
                                                <h2 class="pt-sm-2 pb-1 mb-0 text-nowrap">Thank you!</h2>
                                                <p class="mb-0">Result below</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- start form -->
                                <form class="form" method="POST" action="index.php" novalidate>
                                    <div class="row">
                                        <div class="col-12 col-sm-6 mb-3">
                                            <h5>First person</h5>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="name1">Name<span>*</span></label>
                                                        <input class="form-control" type="text" id="name1" name="name1" value="<?php echo $name1 ?>" placeholder="name" required></input>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="birthday1">Birthday<span>*</span></label>
                                                        <input class="form-control" type="date" id="birthday1" name="birthday1" value="<?php echo $birthday1 ?>" placeholder="birthday" required></input>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-3">
                                            <h5>Second person</h5>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="name2">Name<span>*</span></label>
                                                        <input class="form-control" type="text" id="name2" name="name2" value="<?php echo $name2 ?>" placeholder="name" required></input>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="birthday2">Birthday<span>*</span></label>
                                                        <input class="form-control" type="date" id="birthday2" name="birthday2" value="<?php echo $birthday2 ?>" placeholder="birthday" required></input>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col d-flex justify-content-center">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                        <div class="col d-flex justify-content-center">
                                            <a class="btn btn-success" href="index.php">Reset</a>
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
    <div class="container">
        <div class="row flex-lg-nowrap">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="text-center text-sm-left mb-2 mb-sm-0 alert alert-success">
                                    <h2 class="pt-sm-2 pb-1 mb-0 text-nowrap">Result:</h2>
                                    <h5>Birthday in letter:</h5>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title"><b><?php echo $name1 ?></b></h5>
                                                    <p class="card-title"><?php echo $birthdayLetter1 ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title"><b><?php echo $name2 ?></b></h5>
                                                    <p class="card-title"><?php echo $birthdayLetter2 ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h5>The difference in days between two dates:</h5>
                                    <div class="row">
                                        <div class="col">
                                            <p><b><?php echo $differenceDays ?></b> days.</p>
                                        </div>
                                    </div>
                                    <h4>Their ages:</h4>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <p class="card-title"><b><?php echo $age1 ?></b> years old</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <p class="card-title"><b><?php echo $age2 ?></b> years old</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h5>The difference years between two persons:</h5>
                                    <div class="row">
                                        <div class="col">
                                            <p><b><?php echo $differenceYears ?></b> years.</p>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="js/validate.js"></script>
</body>

</html>
