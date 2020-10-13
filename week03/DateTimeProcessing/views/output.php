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
                                    <!-- start form -->
                                    <form class="form" method="POST" action="index.php" novalidate>
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="name">Your Name<span>*</span></label>
                                                            <input class="form-control" type="text" id="name" name="name" value="<?php echo $name ?>" placeholder="Your name" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Select time<span>*</span></label>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input class="form-control" type="text" name="hour" list="hours" <?php echo isset($hour) ? "value=\"$hour\"" : ''; ?> placeholder="hour" required>
                                                                    <datalist id=hours>
                                                                        <?php
                                                                        for ($i = 0; $i < 24; $i++) {
                                                                            echo "<option value=\"$i\"></option>\n";
                                                                        }
                                                                        ?>
                                                                    </datalist>
                                                                </div>
                                                                <div class="col">
                                                                    <input class="form-control" type="text" name="minute" list="minutes" <?php echo isset($minute) ? "value=\"$minute\"" : ''; ?> placeholder="minute" required>
                                                                    <datalist id=minutes>
                                                                        <?php
                                                                        for ($i = 0; $i < 60; $i++) {
                                                                            echo "<option value=\"$i\"></option>\n";
                                                                        }
                                                                        ?>
                                                                    </datalist>
                                                                </div>
                                                                <div class="col">
                                                                    <input class="form-control" type="text" name="second" list="seconds" <?php echo isset($second) ? "value=\"$second\"" : ''; ?> placeholder="second" required>
                                                                    <datalist id=seconds>
                                                                        <?php
                                                                        for ($i = 0; $i < 60; $i++) {
                                                                            echo "<option value=\"$i\"></option>\n";
                                                                        }
                                                                        ?>
                                                                    </datalist>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label>Select date<span>*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 col-sm-4">
                                                            <input class="form-control" type="number" id="day" list="days" name="day" placeholder="day" <?php echo isset($day) ? "value=\"$day\"" : ''; ?> required></input>
                                                            <datalist id=days>
                                                                <?php
                                                                for ($i = 1; $i <= 31; $i++) {
                                                                    echo "<option value=\"$i\"></option>\n";
                                                                }
                                                                ?>
                                                            </datalist>
                                                        </div>

                                                        <div class="col-12 col-sm-4">
                                                            <input class="form-control" type="number" id="month" list="months" name="month" placeholder="month" <?php echo isset($month) ? "value=\"$month\"" : ''; ?> required></input>
                                                            <datalist id=months>
                                                                <?php
                                                                for ($i = 1; $i <= 12; $i++) {
                                                                    echo "<option value=\"$i\"></option>\n";
                                                                }
                                                                ?>
                                                            </datalist>
                                                        </div>

                                                        <div class="col-12 col-sm-4">
                                                            <input class="form-control" type="number" id="year" list="years" name="year" placeholder="year" <?php echo isset($year) ? "value=\"$year\"" : ''; ?> required></input>
                                                            <datalist id=years>
                                                                <?php
                                                                for ($i = 1980; $i <= 2010; $i++) {
                                                                    echo "<option value=\"$i\"></option>\n";
                                                                }
                                                                ?>
                                                            </datalist>
                                                        </div>
                                                    </div>
                                                    <?php echo isset($error_message) ? "<p class=\"error\">$error_message</p>" : ''; ?>
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
                <div class="row">
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Hi <b><?php echo $name ?></b>!</h5>
                                <p>You have choose to have an appointment on <b><?php echo "$hour:$minute:$second, $day/$month/$year" ?></b></p>
                                <h6 class="card-subtitle mb-2 text-muted">More information</h6>
                                <p>In 12 hours, the time and date is <b><?php echo "$hour12:$minute:$second $AMorPM, $day/$month/$year" ?></b></p>
                                <p>This month has <b><?php echo $numberOfDays ?></b> days!</p>
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