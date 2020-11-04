// validation
$(document).ready(function () {
  // Add email validate rules
  jQuery.validator.addMethod("valid_email", function (value) {
    var regex = /^[a-z0-9]+([-._][a-z0-9]+)*@([a-z0-9]+(-[a-z0-9]+)*\.)+[a-z]{1,5}$/;
    return value.trim().match(regex);
  });

  //bind validate form input
  $(".form").validate({
    rules: {
      name: {
        required: true,
      },
      username: {
        required: true,
      },
      email: {
        required: true,
        valid_email: true,
      },
      class: {
        required: true,
      },
      phone_number: {
        required: true,
        number: true,
      },
      university: {
        required: true,
      },
    },
    messages: {
      name: "Please enter your name",
      username: "Please enter your username",
      email: {
        required: "Please enter your email",
        valid_email: "not an email",
      },
      class: {
        required: "Please enter your class",
      },
      phone_number: {
        required: "Please enter your phone number",
        number: "Phone number wrong",
      },
      university: {
        required: "Please choose your university",
      },
    },
  });
});
