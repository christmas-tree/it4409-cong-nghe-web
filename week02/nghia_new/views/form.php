<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>User Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <style type="text/css">
    body {
      margin-top: 20px;
      background: #f8f8f8
    }
  </style>
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
                      <div class="text-center text-sm-left mb-2 mb-sm-0">
                        <h2 class="pt-sm-2 pb-1 mb-0 text-nowrap">Hi there!</h2>
                        <p class="mb-0">We need some information about you.</p>
                      </div>
                    </div>
                  </div>
                  <p class="text-danger" id="warning"><?= $warning_message ?></p>

                  <form class="form" method="POST" action="index.php" novalidate>
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="name">Full Name*</label>
                              <input class="form-control" type="text" id="name" name="name" placeholder="Your name" required>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label for="username">Username*</label>
                              <input class="form-control" type="text" id="username" name="username" placeholder="your.username" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="email">Email*</label>
                              <input class="form-control" type="text" id="email" name="email" placeholder="user@example.com" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="class">Class*</label>
                              <input class="form-control" type="text" id="class" name="class" placeholder="Class" required>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label for="university">University*</label>
                              <select class="form-control" id="university" name="university" required>
                                <option selected>Choose...</option>
                                <option value="1">Hanoi Royal University of Science and Technology</option>
                                <option value="2">Vietnam National University, Hanoi</option>
                                <option value="3">National Economics University</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <div class="form-group">
                              <label for="about">About</label>
                              <textarea class="form-control" id="about" name="about" rows="5" placeholder="My Bio"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-6 mb-3">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="address">Address*</label>
                              <textarea class="form-control" id="address" name="address" rows="3" placeholder="Address" required></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-5 mb-3">
                        <div class="row">
                          <div class="col checkbox-group required">
                            <label>Hobbies*</label>
                            <div class="row">
                              <div class="col-12 col-sm-6">
                                <div class="custom-controls-stacked px-2">
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="hobby[]" value="music" id="hobby[music]">
                                    <label class="custom-control-label" for="hobby[music]">Listening to music</label>
                                  </div>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="hobby[]" value="football" id="hobby[football]">
                                    <label class="custom-control-label" for="hobby[football]">Football</label>
                                  </div>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="hobby[]" value="movies" id="hobby[movies]">
                                    <label class="custom-control-label" for="hobby[movies]">Movies</label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-12 col-sm-6">
                                <div class="custom-controls-stacked px-2">
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="hobby[]" value="coding" id="hobby[coding]">
                                    <label class="custom-control-label" for="hobby[coding]">Coding</label>
                                  </div>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="hobby[]" value="eating" id="hobby[eating]">
                                    <label class="custom-control-label" for="hobby[eating]">Eating</label>
                                  </div>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="hobby[]" value="flirting" id="hobby[flirting]">
                                    <label class="custom-control-label" for="hobby[flirting]">Flirting</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script>
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          var form = document.getElementsByClassName('form')[0];
          var warningText = $('#warning');

          form.addEventListener('submit', function(event) {
            var checkedHobbyBoxes = $('div.checkbox-group.required :checkbox:checked');
            if (form.checkValidity() === false || checkedHobbyBoxes.length === 0) {
              event.preventDefault();
              event.stopPropagation();

              warningText.text('Please complete the required fields.');
            }
          }, false);
        }, false);
      })();
    </script>
</body>

</html>