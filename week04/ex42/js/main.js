$(document).ready(function () {
  //name of the file appear on select
  $(".custom-file-input").on("change", function () {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });

  // validate
  $(".form").validate({
    rules: {
      "files[]": {
        required: true,
      },
    },
  });

  // alert when delete
  $(".delete").on("click", function () {
    var here = this;
    Swal.fire({
      title: "Do you want to delete this file?",
      showDenyButton: true,
      confirmButtonText: `Yes`,
    }).then((result) => {
      if (result.isConfirmed) {
        location.href = $(here).attr("data-link");
      }
    });
  });

  // sort table
  $("#list_files").DataTable();
});
