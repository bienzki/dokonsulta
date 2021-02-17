/*
Author       : Dreamguys
Template Name: Medifab - Health & Medical HTML Template
Version      : 1.2
*/

$(document).ready(function () {
  // Mobile menu overlay

  $(".toggle-menu").on("click", function () {
    var $target = $($(this).attr("href"));
    if ($target.length) {
      $target.toggleClass("opened");
      $(".sidebar-overlay").toggleClass("opened");
      $("body").toggleClass("menu-opened");
      $(".sidebar-overlay").attr("data-reff", $(this).attr("href"));
    }
  });

  $(".sidebar-overlay").on("click", function () {
    var $target = $($(this).attr("data-reff"));
    if ($target.length) {
      $target.removeClass("opened");
      $("body").removeClass("menu-opened");
      $(this).removeClass("opened");
    }
  });

  $("#signup-mobile").on("click", function () {
    var $target = $($(".sidebar-overlay").attr("data-reff"));
    if ($target.length) {
      $target.removeClass("opened");
      $("body").removeClass("menu-opened");
      $(".sidebar-overlay").removeClass("opened");
    }
  });

  // Mobile Menu

  $(".menu-toggle").on("click", function () {
    $(this).parents("li").children(".mobile-submenu-wrapper").slideToggle(300);
    return false;
  });

  // Testimonial Carousel

  if ($("#testimonial_slider").length > 0) {
    $("#testimonial_slider").owlCarousel({
      autoPlay: false,
      nav: true,
      margin: 30,
      pagination: false,
      loop: true,
      navText: [
        "<i class='fa fa-angle-left'></i>",
        "<i class='fa fa-angle-right'></i>",
      ],
      responsive: {
        0: {
          items: 1,
        },
        768: {
          items: 2,
        },
        992: {
          items: 3,
        },
      },
    });
  }

  // Doctor Carousel

  if ($("#our_doctor").length > 0) {
    $("#our_doctor").owlCarousel({
      autoplay: true,
      autoplayTimeout: 5000,
      autoplayHoverPause: false,
      nav: true,
      margin: 10,
      pagination: false,
      loop: true,
      navText: [
        "<i class='fa fa-angle-left'></i>",
        "<i class='fa fa-angle-right'></i>",
      ],
      responsive: {
        0: {
          items: 1,
        },
        768: {
          items: 2,
        },
        992: {
          items: 4,
        },
      },
    });
  }

  // Header menu dropdown

  if ($(".header .dropdown").length > 0) {
    $(".header .dropdown").hover(
      function () {
        $(this).addClass("show").attr("aria-expanded", "true");
        $(this).find(".dropdown-menu").addClass("show");
      },
      function () {
        $(this).removeClass("show").attr("aria-expanded", "false");
        $(this).find(".dropdown-menu").removeClass("show");
      }
    );
  }

  // Date Time Picker
  date = new Date();

  $('input[name="birthday"]').daterangepicker(
    {
      singleDatePicker: true,
      autoUpdateInput: false,
      autoApply: true,
      showDropdowns: true,
      minYear: 1901,
      maxYear: date.getFullYear(),
      locale: {
        format: "YYYY-MM-DD",
      },
    },
    function (chosen_date) {
      $('input[name="birthday"]').val(chosen_date.format("YYYY-MM-DD"));
    }
  );

  // Toastr
  toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: false,
    progressBar: false,
    positionClass: "toast-top-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
  };

  // Select2

  if ($(".select2").length > 0) {
    $(".select2").select2({
      minimumResultsForSearch: -1,
      width: "100%",
      theme: "bootstrap4",
      width: $(this).data("width")
        ? $(this).data("width")
        : $(this).hasClass("w-100")
        ? "100%"
        : "style"
    });
  }

  if ($(".select").length > 0) {
    $(".select").select2({
      width: "100%",
      theme: "bootstrap4",
      width: $(this).data("width")
        ? $(this).data("width")
        : $(this).hasClass("w-100")
        ? "100%"
        : "style"
    });
  }

  // Dynamic Select

  const capitalizeFirstLetter = (
    [first, ...rest],
    locale = navigator.language
  ) => first.toLocaleUpperCase(locale) + rest.join("");
  $("#province").change(function () {
    let provinceId = $("#province").val();
    if (provinceId != "") {
      $.ajax({
        url: "/home/city",
        method: "post",
        data: "provinceId=" + provinceId,
      }).done(function (city) {
        city = JSON.parse(city);
        $("#city").empty();
        city.forEach(function (city) {
          $("#city").append(
            '<option value="' +
              city.cityId +
              '">' +
              capitalizeFirstLetter(city.name.toLowerCase()) +
              "</option>"
          );
        });
      });
    }
  });
  $("#city").change(function () {
    let cityId = $("#city").val();
    if (cityId != "") {
      $.ajax({
        url: "/home/barangay",
        method: "post",
        data: "cityId=" + cityId,
      }).done(function (barangay) {
        barangay = JSON.parse(barangay);
        $("#barangay").empty();
        barangay.forEach(function (barangay) {
          $("#barangay").append(
            '<option value="' +
              barangay.name +
              '">' +
              barangay.name +
              "</option>"
          );
        });
      });
    }
  });

  // Toast

  $(".toast").toast({ autohide: true, animation: true, delay: 5000 });
  $(".toast").toast("show");

  // Patient Registration
  $("#patientRegistrationForm").on("submit", function (event) {
    event.preventDefault();
    $.ajax({
      url: "/ajax/patient",
      method: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      beforeSend: function () {
        $(".loading-icon").removeClass("hide");
        $("#submitPatientRegistrationForm").attr("disabled", true);
        $(".btn-txt").text("wait...");
      },
      success: function (data) {
        $(".loading-icon").addClass("hide");
        $("#submitPatientRegistrationForm").attr("disabled", false);
        $(".btn-txt").text("Submit");
        if (data.error == "yes") {
          toastr["error"](
            data.errors,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        } else {
          document.getElementById("patientRegistrationForm").reset();
          $("#signup-success").modal({
            backdrop: "static",
            keyboard: false,
            show: true,
          });
        }
      },
    });
  });

  // Dctor Registration
  $("#doctorRegistrationForm").on("submit", function (event) {
    event.preventDefault();
    $.ajax({
      url: "/ajax/doctor",
      method: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      dataType: "JSON",
      beforeSend: function () {
        $(".loading-icon").removeClass("hide");
        $("#submitDoctorRegistrationForm").attr("disabled", true);
        $(".btn-txt").text("wait...");
      },
      success: function (data) {
        $(".loading-icon").addClass("hide");
        $("#submitDoctorRegistrationForm").attr("disabled", false);
        $(".btn-txt").text("Submit");
        if (data.error == "yes") {
          toastr["error"](
            data.errors,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        }
      },
    });
  });

  $("#firstName").on("change", function () {
    $.ajax({
      url: "/ajax/firstName",
      method: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      success: function (data) {
        if (data.error == "yes") {
          toastr["error"](
            data.firstNameError,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        }
      },
    });
  });

  $("#lastName").on("change", function () {
    $.ajax({
      url: "/ajax/lastName",
      method: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      success: function (data) {
        if (data.error == "yes") {
          toastr["error"](
            data.lastNameError,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        }
      },
    });
  });

  $("#birthday").on("focusout", function () {
    $.ajax({
      url: "/ajax/birthday",
      method: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      success: function (data) {
        if (data.error == "yes") {
          toastr["error"](
            data.birthdayError,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        }
      },
    });
  });

  $("#gender").on("change", function () {
    $.ajax({
      url: "/ajax/gender",
      method: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      success: function (data) {
        if (data.error == "yes") {
          toastr["error"](
            data.genderError,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        }
      },
    });
  });

  $("#civilStatus").on("change", function () {
    $.ajax({
      url: "/ajax/civilStatus",
      method: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      success: function (data) {
        if (data.error == "yes") {
          toastr["error"](
            data.civilStatusError,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        }
      },
    });
  });

  $("#bloodType").on("change", function () {
    $.ajax({
      url: "/ajax/bloodType",
      method: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      success: function (data) {
        if (data.error == "yes") {
          toastr["error"](
            data.bloodTypeError,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        }
      },
    });
  });

  $("#mobile").on("change", function () {
    $.ajax({
      url: "/ajax/mobile",
      method: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      success: function (data) {
        if (data.error == "yes") {
          toastr["error"](
            data.mobileError,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        } else {
          toastr["success"](
            "Mobile number is valid",
            '<i class="fa fa-check"></i> Success'
          );
        }
      },
    });
  });

  $("#email").on("change", function () {
    $.ajax({
      url: "/ajax/email",
      method: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      success: function (data) {
        if (data.error == "yes") {
          toastr["error"](
            data.emailError,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        } else {
          toastr["success"](
            "Email address is valid",
            '<i class="fa fa-check"></i> Success'
          );
        }
      },
    });
  });

  $("#password").on("change", function () {
    $.ajax({
      url: "/ajax/password",
      method: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      success: function (data) {
        if (data.error == "yes") {
          toastr["error"](
            data.passwordError,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        } else {
          toastr["success"](
            "Password is valid",
            '<i class="fa fa-check"></i> Success'
          );
        }
      },
    });
  });

  $("#confirm_password").on("change", function () {
    $.ajax({
      url: "/ajax/confirm_password",
      method: "POST",
      data: $(patientRegistrationForm).serialize(),
      dataType: "JSON",
      success: function (data) {
        if (data.error == "yes") {
          toastr["error"](
            data.confirm_passwordError,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        } else {
          toastr["success"](
            "Password matched",
            '<i class="fa fa-check"></i> Success'
          );
        }
      },
    });
  });

  $("#confirm_password2").on("change", function () {
    $.ajax({
      url: "/ajax/confirm_password2",
      method: "POST",
      data: $(doctorRegistrationForm).serialize(),
      dataType: "JSON",
      success: function (data) {
        if (data.error == "yes") {
          toastr["error"](
            data.confirm_password2Error,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        } else {
          toastr["success"](
            "Password matched",
            '<i class="fa fa-check"></i> Success'
          );
        }
      },
    });
  });

  $("#province").on("change", function () {
    $.ajax({
      url: "/ajax/province",
      method: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      success: function (data) {
        if (data.error == "yes") {
          toastr["error"](
            data.provinceError,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        }
      },
    });
  });

  $("#city").on("change", function () {
    $.ajax({
      url: "/ajax/city",
      method: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      success: function (data) {
        if (data.error == "yes") {
          toastr["error"](
            data.cityError,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        }
      },
    });
  });

  $("#barangay").on("change", function () {
    $.ajax({
      url: "/ajax/barangay",
      method: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      success: function (data) {
        if (data.error == "yes") {
          toastr["error"](
            data.barangayError,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        }
      },
    });
  });

  $("#street").on("change", function () {
    $.ajax({
      url: "/ajax/street",
      method: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      success: function (data) {
        if (data.error == "yes") {
          toastr["error"](
            data.streetError,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        }
      },
    });
  });

  $("#prcLicense").on("change", function () {
    $.ajax({
      url: "/ajax/prcLicense",
      method: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      success: function (data) {
        if (data.error == "yes") {
          toastr["error"](
            data.prcLicenseError,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        }
      },
    });
  });

  $("#prcId").on("change", function (event) {
    $.ajax({
      url: "/ajax/prcId",
      method: "POST",
      data: new FormData(doctorRegistrationForm),
      contentType: false,
      cache: false,
      processData: false,
      dataType: "json",
      success: function (data) {
        if (data.error == "yes") {
          toastr["error"](
            data.prcIdError,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        } else {
          if (event.target.files.length > 0) {
            let src = URL.createObjectURL(event.target.files[0]);
            let preview = document.getElementById("prcIdPreview");
            let previewDiv = document.getElementById("preview1");
            preview.src = src;
            preview.style.display = "block";
            previewDiv.style.display = "block";
          }
        }
      },
    });
  });

  $("#signature").on("change", function (event) {
    $.ajax({
      url: "/ajax/signature",
      method: "POST",
      data: new FormData(doctorRegistrationForm),
      contentType: false,
      cache: false,
      processData: false,
      dataType: "json",
      success: function (data) {
        if (data.error == "yes") {
          toastr["error"](
            data.signatureError,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        } else {
          if (event.target.files.length > 0) {
            let src = URL.createObjectURL(event.target.files[0]);
            let preview = document.getElementById("signaturePreview");
            let previewDiv = document.getElementById("preview2");
            preview.src = src;
            preview.style.display = "block";
            previewDiv.style.display = "block";
          }
        }
      },
    });
  });

  $("#specialty").on("change", function () {
    $.ajax({
      url: "/ajax/specialty",
      method: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      success: function (data) {
        if (data.error == "yes") {
          toastr["error"](
            data.specialtyError,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        }
      },
    });
  });

  $("#loginForm").on("submit", function (event) {
    event.preventDefault();
    $.ajax({
      url: "/ajax/login",
      method: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      beforeSend: function () {
        $(".loading-icon").removeClass("hide");
        $("#submitloginForm").attr("disabled", true);
        $(".btn-txt").text("wait...");
      },
      success: function (data) {
        $(".loading-icon").addClass("hide");
        $("#submitloginForm").attr("disabled", false);
        $(".btn-txt").text("login");
        if (data.error == "yes") {
          toastr["error"](
            data.errors,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        }
        if (data.status == "unverified") {
          toastr["error"](
            "Account is unverified.",
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        } else {
          if (data.type == "admin") {
            window.location.href = "/admin/dashboard";
          }
          if (data.type == "patient") {
            window.location.href = "/patients/appointments";
          }
          if (data.type == "doctor") {
            window.location.href = "/physicians/dashboard";
          }
        }
      },
    });
  });

  let limit = 8;
  let offset = 0;
  let action = "inactive";

  if (window.location.href != "http://localhost/doctors") {
    action = "active";
  }

  function load_data(searchName, searchCity, searchSpecialty, limit, offset) {
    $.ajax({
      url: "ajax/search",
      method: "post",
      data: {
        searchName: searchName,
        searchCity: searchCity,
        searchSpecialty: searchSpecialty,
        limit: limit,
        offset: offset,
      },
      dataType: "json",
      cache: false,
      success: function (data) {
        $("#found").html(data.found);
        $("#searchResult").append(data.a).fadeIn("slow");
        if (data.a == "") {
          $("#searchMessage").html(
            '<div class="col-12 text-center animate__animated animate__zoomIn"><img src="/assets-blue/img/doctor.png" class="rounded-circle img-thumbnail" width="100"/><h3 class="pt-4">No More Doctors</h3></div>'
          );
          action = "active";
        } else {
          $("#searchMessage").html("");
          action = "inactive";
        }
      },
    });
  }

  $("#searchDoctor").on("submit", function (event) {
    event.preventDefault();
    let searchName = $("#searchName").val();
    let searchCity = $("#searchCity").val();
    let searchSpecialty = $("#searchSpecialty").val();
    limit = 8;
    offset = 0;

    if (searchName != "" || searchCity != "" || searchSpecialty != "") {
      load_data_2(searchName, searchCity, searchSpecialty, limit, offset);
    } else {
      load_data_2(null, null, null, 8, 0);
    }
  });

  if (action == "inactive") {
    action = "active";
    load_data(
      $("#searchName").val(),
      $("#searchCity").val(),
      $("#searchSpecialty").val(),
      limit,
      offset
    );
  }
  $(window).scroll(function () {
    if (
      $(window).scrollTop() + $(window).height() >
        $("#searchResult").height() &&
      action == "inactive"
    ) {
      action = "active";
      offset = offset + limit;
      $("#searchMessage").html(
        '<img src="/assets-blue/img/beat.gif" width="150">'
      );
      setTimeout(function () {
        load_data(
          $("#searchName").val(),
          $("#searchCity").val(),
          $("#searchSpecialty").val(),
          limit,
          offset
        );
      }, 2000);
    }
  });

  function load_data_2(searchName, searchCity, searchSpecialty, limit, offset) {
    $.ajax({
      url: "ajax/search",
      method: "post",
      data: {
        searchName: searchName,
        searchCity: searchCity,
        searchSpecialty: searchSpecialty,
        limit: limit,
        offset: offset,
      },
      dataType: "json",
      success: function (data) {
        $("#searchMessage").html("");
        action = "inactive";
        $("#found").html(data.found);
        if (data.found < 6) {
          action = "active";
        }
        if (data.a == "") {
          $("#searchResult").html(
            '<div class="col-12 text-center animate__animated animate__zoomIn"><img src="/assets-blue/img/doctor.png" class="rounded-circle img-thumbnail" width="100"/><h3 class="pt-4">No Doctors Found</h3><p>Try another name or specialty to find a doctor in your search</p></div>'
          );
          action = "active";
        } else {
          $("#searchResult").html(data.a);
        }
      },
    });
  }

  $("#forgotPasswordForm").on("submit", function (event) {
    event.preventDefault();

    $.ajax({
      url: "/ajax/forgotpassword",
      method: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      beforeSend: function () {
        $(".loading-icons").removeClass("hide");
        $("#submitForgotPassword").attr("disabled", true);
        $(".btn-txts").text("Sending...");
      },
      success: function (data) {
        $(".loading-icons").addClass("hide");
        $("#submitForgotPassword").attr("disabled", false);
        $(".btn-txts").text("Reset Password");
        if (data.error == "yes") {
          toastr["error"](
            data.errors,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        }
        if (data.success == "yes") {
          toastr["success"](
            "Email sent.",
            '<i class="fa fa-check"></i> Success'
          );
          document.getElementById("forgotPasswordForm").reset();
          $("#forgotPasswordModal").modal("hide");
        }
      },
    });
  });

  $("#changePasswordForm").on("submit", function (event) {
    event.preventDefault();

    $.ajax({
      url: "/ajax/changepassword",
      method: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      beforeSend: function () {
        $(".loading-icon").removeClass("hide");
        $("#submitChangePasswordForm").attr("disabled", true);
        $(".btn-txt").text("Wait...");
      },
      success: function (data) {
        $(".loading-icon").addClass("hide");
        $("#submitChangePasswordForm").attr("disabled", false);
        $(".btn-txt").text("Submit");
        if (data.error == "yes") {
          toastr["error"](
            data.errors,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        }
        if (data.success == "yes") {
          toastr["success"](
            "Password changed.",
            '<i class="fa fa-check"></i> Success'
          );
          document.getElementById("changePasswordForm").reset();
          setTimeout(function () {
            window.location.href = "/login";
          }, 2000);
        }
      },
    });
  });

  $("#resendEmail").on("click", function (event) {
    event.preventDefault();
    $.ajax({
      url: "/ajax/resend",
      method: "POST",
      dataType: "JSON",
      beforeSend: function () {
        $(".loading-icons").removeClass("hide");
        $("#resendEmail").attr("disabled", true);
        $(".btn-txts").text("Sending...");
      },
      success: function (data) {
        $(".loading-icons").addClass("hide");
        $("#resendEmail").attr("disabled", false);
        $(".btn-txts").text("Resend Email");
        if (data.error == "yes") {
          toastr["error"](
            data.errors,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        } else {
          toastr["success"](
            "Email sent",
            '<i class="fa fa-check"></i> Success'
          );
        }
      },
    });
  });

  $("#resendForm").on("submit", function (event) {
    event.preventDefault();

    $.ajax({
      url: "/ajax/resendConfirmation",
      method: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      beforeSend: function () {
        $(".loading-icons").removeClass("hide");
        $("#submitResendForm").attr("disabled", true);
        $(".btn-txts").text("Wait...");
      },
      success: function (data) {
        $(".loading-icons").addClass("hide");
        $("#submitResendForm").attr("disabled", false);
        $(".btn-txts").text("Verify Email");
        if (data.error == "yes") {
          toastr["error"](
            data.errors,
            '<i class="fa fa-exclamation-triangle"></i> Warning'
          );
        }
        if (data.success == "yes") {
          toastr["success"](
            "Email sent.",
            '<i class="fa fa-check"></i> Success'
          );
          document.getElementById("resendForm").reset();
          $("#resendModal").modal("hide");
        }
      },
    });
  });
});
