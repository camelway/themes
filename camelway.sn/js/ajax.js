$(function () {
  $("#submit").on("click", function (e) {
    e.preventDefault();

    $(this).attr("disabled", true);
    var name = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var message = $("#message").val();
    var subject = $("#subject").val();
    var product = $("#product").val();

    if (
      name != "" &&
      phone != "" &&
      email != "" &&
      message != "" &&
      subject != ""
    ) {
      $.ajax({
        url: "email.php",
        method: "POST",
        data: {
          name: name,
          email: email,
          phone: phone,
          subject: subject,
          message: message,
          product: product
        },
        success: function (res) {
          $("#submit").removeAttr("disabled");
          $("#name").val("");
          $("#email").val("");
          $("#phone").val("");
          $("#message").val("");
          $("#subject").val("");
          swal(
            "Your message is received. We will get back to you soon. Thanks", {
              icon: "success"
            }
          );
        }
      });
    } else {
      $("#submit").removeAttr("disabled");
      swal("You must fill all the fields!", {
        icon: "error"
      });
    }
  });
});