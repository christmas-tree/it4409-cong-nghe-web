<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>User Information</title>
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
                <div class="container">
                  <div class="e-profile">
                    <div class="row">
                      <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                        <div class="text-center text-sm-left mb-2 mb-sm-0 alert alert-info">
                          <h2 class="pt-sm-2 pb-1 mb-0 text-nowrap">Hey!</h2>
                          <p class="mb-0">Thanks for submitting your information. Here's a recap:</p>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-borderless table-hover">
                        <tbody>
                          <tr class="d-flex">
                            <th class="col-3">Full name: </th>
                            <td class="col-9"><?= $name ?></td>
                          </tr>
                          <tr class="d-flex">
                            <th class="col-3">Username: </th>
                            <td class="col-9"><?= $username ?></td>
                          </tr>
                          <tr class="d-flex">
                            <th class="col-3">Email address: </th>
                            <td class="col-9"><?= $email ?></td>
                          </tr>
                          <tr class="d-flex">
                            <th class="col-3">Class: </th>
                            <td class="col-9"><?= $class ?></td>
                          </tr>
                          <tr class="d-flex">
                            <th class="col-3">University: </th>
                            <td class="col-9"><?= $UNIVERSITY_DICT[$university] ?></td>
                          </tr>
                          <tr class="d-flex">
                            <th class="col-3">About: </th>
                            <td class="col-9"><?= $about ?></td>
                          </tr>
                          <tr class="d-flex">
                            <th class="col-3">Address: </th>
                            <td class="col-9"><?= $address ?></td>
                          </tr>
                          <tr class="d-flex">
                            <th class="col-3">Hobby: </th>
                            <td class="col-9"><?= join(", ", $hobby) ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="row">
                      <div class="col">
                        <a class="btn btn-secondary" href="index.php">Back</a>
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
</body>

</html>