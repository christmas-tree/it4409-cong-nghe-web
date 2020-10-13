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
                                            <div class="text-center text-sm-left mb-2 mb-sm-0 alert alert-secondary">
                                                <h2 class="pt-sm-2 pb-1 mb-0 text-nowrap">Hi!</h2>
                                                <p class="mb-0">Enter their information</p>
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
                                                            <input class="form-control" type="text" id="name1" name="name1" placeholder="name" <?php echo isset($name1) ? "value=\"$name1\"" : ''; ?> required></input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col"><label>Birthday<span>*</span></label></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12 col-sm-4">
                                                                    <input class="form-control" type="number" id="day1" list="day1s" name="day1" placeholder="day" <?php echo isset($day1) ? "value=\"$day1\"" : ''; ?> required></input>
                                                                    <datalist id=day1s>
                                                                        <?php
                                                                        for ($i = 1; $i <= 31; $i++) {
                                                                            echo "<option value=\"$i\"></option>\n";
                                                                        }
                                                                        ?>
                                                                    </datalist>
                                                                </div>

                                                                <div class="col-12 col-sm-4">
                                                                    <input class="form-control" type="number" id="month1" list="month1s" name="month1" placeholder="month" <?php echo isset($month1) ? "value=\"$month1\"" : ''; ?> required></input>
                                                                    <datalist id=month1s>
                                                                        <?php
                                                                        for ($i = 1; $i <= 12; $i++) {
                                                                            echo "<option value=\"$i\"></option>\n";
                                                                        }
                                                                        ?>
                                                                    </datalist>
                                                                </div>

                                                                <div class="col-12 col-sm-4">
                                                                    <input class="form-control" type="number" id="year1" list="year1s" name="year1" placeholder="year" <?php echo isset($year1) ? "value=\"$year1\"" : ''; ?> required></input>
                                                                    <datalist id=year1s>
                                                                        <?php
                                                                        for ($i = 1980; $i <= 2010; $i++) {
                                                                            echo "<option value=\"$i\"></option>\n";
                                                                        }
                                                                        ?>
                                                                    </datalist>
                                                                </div>
                                                            </div>
                                                            <?php echo isset($error_message1) ? "<p class=\"error\">$error_message1</p>" : ''; ?>
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
                                                            <input class="form-control" type="text" id="name2" name="name2" placeholder="name" <?php echo isset($name2) ? "value=\"$name2\"" : ''; ?> required></input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col"><label>Birthday<span>*</span></label></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12 col-sm-4">
                                                                    <input class="form-control" type="number" id="day2" list="day2s" name="day2" placeholder="day" <?php echo isset($day2) ? "value=\"$day2\"" : ''; ?> required></input>
                                                                    <datalist id=day2s>
                                                                        <?php
                                                                        for ($i = 1; $i <= 31; $i++) {
                                                                            echo "<option value=\"$i\"></option>\n";
                                                                        }
                                                                        ?>
                                                                    </datalist>
                                                                </div>

                                                                <div class="col-12 col-sm-4">
                                                                    <input class="form-control" type="number" id="month2" list="month2s" name="month2" placeholder="month" <?php echo isset($month2) ? "value=\"$month2\"" : ''; ?> required></input>
                                                                    <datalist id=month2s>
                                                                        <?php
                                                                        for ($i = 1; $i <= 12; $i++) {
                                                                            echo "<option value=\"$i\"></option>\n";
                                                                        }
                                                                        ?>
                                                                    </datalist>
                                                                </div>

                                                                <div class="col-12 col-sm-4">
                                                                    <input class="form-control" type="number" id="year2" list="year2s" name="year2" placeholder="year" <?php echo isset($year2) ? "value=\"$year2\"" : ''; ?> required></input>
                                                                    <datalist id=year2s>
                                                                        <?php
                                                                        for ($i = 1980; $i <= 2010; $i++) {
                                                                            echo "<option value=\"$i\"></option>\n";
                                                                        }
                                                                        ?>
                                                                    </datalist>
                                                                </div>
                                                            </div>
                                                            <?php echo isset($error_message2) ? "<p class=\"error\">$error_message2</p>" : ''; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col d-flex justify-content-center">
                                                <button class="btn btn-primary" type="submit">Submit</button>
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