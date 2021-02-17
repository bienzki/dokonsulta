// Sidebar

!(function ($) {
  "use strict";
  var Sidemenu = function () {
    this.$menuItem = $("#sidebar-menu a");
  };

  (Sidemenu.prototype.init = function () {
    var $this = this;
    $this.$menuItem.on("click", function (e) {
      if ($(this).parent().hasClass("submenu")) {
        e.preventDefault();
      }
      if (!$(this).hasClass("subdrop")) {
        $("ul", $(this).parents("ul:first")).slideUp(350);
        $("a", $(this).parents("ul:first")).removeClass("subdrop");
        $(this).next("ul").slideDown(350);
        $(this).addClass("subdrop");
      } else if ($(this).hasClass("subdrop")) {
        $(this).removeClass("subdrop");
        $(this).next("ul").slideUp(350);
      }
    });
    $("#sidebar-menu ul li.submenu a.active")
      .parents("li:last")
      .children("a:first")
      .addClass("active")
      .trigger("click");
  }),
    ($.Sidemenu = new Sidemenu());
})(window.jQuery),
  $(document).ready(function ($) {
    // Sidebar Initiate

    $.Sidemenu.init();

    // Sidebar overlay

    var $sidebarOverlay = $(".sidebar-overlay");
    $("#mobile_btn, .task-chat").on("click", function (e) {
      var $target = $($(this).attr("href"));
      if ($target.length) {
        $target.toggleClass("opened");
        $sidebarOverlay.toggleClass("opened");
        $("html").toggleClass("menu-opened");
        $sidebarOverlay.attr("data-reff", $(this).attr("href"));
      }
      e.preventDefault();
    });

    $sidebarOverlay.on("click", function (e) {
      var $target = $($(this).attr("data-reff"));
      if ($target.length) {
        $target.removeClass("opened");
        $("html").removeClass("menu-opened");
        $(this).removeClass("opened");
        $(".main-wrapper").removeClass("slide-nav");
      }
      e.preventDefault();
    });

    // Select 2

    if ($(".select").length > 0) {
      $(".select").select2({
        minimumResultsForSearch: 0,
        width: "100%",
      });
    }

    // if ($("#clinic").length > 0) {
    //   $("#clinic").select2({
    //     minimumResultsForSearch: 0,
    //     width: "100%",
    //   });
    // }

    // Modal

    if ($(".modal").length > 0) {
      var modalUniqueClass = ".modal";
      $(".modal").on("shown.bs.modal", function (e) {
        var $element = $(this);
        var $uniques = $(modalUniqueClass + ":visible").not($(this));
        if ($uniques.length) {
          $uniques.modal("hide");
          $uniques.one("hidden.bs.modal", function (e) {
            $element.modal("show");
            $("body").addClass("modal-open");
          });
          return false;
        }
      });
    }

    // Floating Label

    if ($(".floating").length > 0) {
      $(".floating")
        .on("focus blur", function (e) {
          $(this)
            .parents(".form-focus")
            .toggleClass(
              "focused",
              e.type === "focus" || this.value.length > 0
            );
        })
        .trigger("blur");
    }

    // Right Sidebar Scroll

    if ($(".msg-list-scroll").length > 0) {
      $(".msg-list-scroll").slimscroll({
        height: "100%",
        color: "#878787",
        disableFadeOut: true,
        borderRadius: 0,
        size: "4px",
        alwaysVisible: false,
        touchScrollStep: 100,
      });
      var h = $(window).height() - 124;
      $(".msg-list-scroll").height(h);
      $(".msg-sidebar .slimScrollDiv").height(h);

      $(window).resize(function () {
        var h = $(window).height() - 124;
        $(".msg-list-scroll").height(h);
        $(".msg-sidebar .slimScrollDiv").height(h);
      });
    }

    // Left Sidebar Scroll

    if ($(".slimscroll").length > 0) {
      $(".slimscroll").slimScroll({
        height: "auto",
        width: "100%",
        position: "right",
        size: "7px",
        color: "#ccc",
        wheelStep: 10,
        touchScrollStep: 100,
      });
      var hei = $(window).height() - 60;
      $(".slimscroll").height(hei);
      $(".sidebar .slimScrollDiv").height(hei);

      $(window).resize(function () {
        var hei = $(window).height() - 60;
        $(".slimscroll").height(hei);
        $(".sidebar .slimScrollDiv").height(hei);
      });
    }

    // Page wrapper height

    if ($(".page-wrapper").length > 0) {
      var height = $(window).height();
      $(".page-wrapper").css("min-height", height);
    }

    $(window).resize(function () {
      if ($(".page-wrapper").length > 0) {
        var height = $(window).height();
        $(".page-wrapper").css("min-height", height);
      }
    });

    // Datetimepicker
    date = new Date();

    $(".datetimepicker").daterangepicker(
      {
        singleDatePicker: true,
        autoUpdateInput: false,
        autoApply: true,
        timePicker: true,
        locale: {
          format: "YYYY-MM-DD HH:mm",
        },
      },
      function (chosen_date) {
        $(".datetimepicker").val(chosen_date.format("YYYY-MM-DD HH:mm"));
      }
    );

    // Datatable

    if ($(".datatable").length > 0) {
      $(".datatable").DataTable({
        bFilter: false,
      });
    }

    // Bootstrap Tooltip

    if ($('[data-toggle="tooltip"]').length > 0) {
      $('[data-toggle="tooltip"]').tooltip();
    }

    // Toggle Button

    if ($(".btn-toggle").length > 0) {
      $(".btn-toggle").click(function () {
        $(this).find(".btn").toggleClass("active");
        if ($(this).find(".btn-success").size() > 0) {
          $(this).find(".btn").toggleClass("btn-success");
        }
      });
    }

    // Mobile Menu

    if ($(".main-wrapper").length > 0) {
      var $wrapper = $(".main-wrapper");
      $("#mobile_btn").click(function () {
        $wrapper.toggleClass("slide-nav");
        $("#chat_sidebar").removeClass("opened");
        $(".dropdown.open > .dropdown-toggle").dropdown("toggle");
        return false;
      });
      $("#open_msg_box").click(function () {
        $wrapper.toggleClass("open-msg-box");
        $(".dropdown").removeClass("open");
        return false;
      });
    }

    // Product thumb images

    if ($(".proimage-thumb li a").length > 0) {
      var full_image = $(this).attr("href");
      $(".proimage-thumb li a").click(function () {
        full_image = $(this).attr("href");
        $(".pro-image img").attr("src", full_image);
        return false;
      });
    }

    // Lightgallery

    if ($("#pro_popup").length > 0) {
      $("#pro_popup").lightGallery({
        thumbnail: true,
        selector: "a",
      });
    }

    if ($("#lightgallery").length > 0) {
      $("#lightgallery").lightGallery({
        thumbnail: true,
        selector: "a",
      });
    }

    // Incoming call popup

    if ($("#incoming_call").length > 0) {
      $(window).on("load", function () {
        $("#incoming_call").modal("show");
        $("body").addClass("call-modal");
      });
    }

    // Summernote

    if ($(".summernote").length > 0) {
      $(".summernote").summernote({
        height: 200,
        minHeight: null,
        maxHeight: null,
        focus: false,
      });
    }

    // Check all email

    if ($(".checkbox-all").length > 0) {
      $(".checkbox-all").click(function () {
        $(".checkmail").click();
      });
    }
    if ($(".checkmail").length > 0) {
      $(".checkmail").each(function () {
        $(this).click(function () {
          if ($(this).closest("tr").hasClass("checked")) {
            $(this).closest("tr").removeClass("checked");
          } else {
            $(this).closest("tr").addClass("checked");
          }
        });
      });
    }

    // Mail important

    if ($(".mail-important").length > 0) {
      $(".mail-important").click(function () {
        $(this).find("i.fa").toggleClass("fa-star");
        $(this).find("i.fa").toggleClass("fa-star-o");
      });
    }

    if ($(".dropdown-toggle").length > 0) {
      $(".dropdown-toggle").click(function () {
        if ($(".main-wrapper").hasClass("open-msg-box")) {
          $(".main-wrapper").removeClass("open-msg-box");
        }
      });
    }

    /* Custom Modal */

    if ($(".custom-modal").length > 0) {
      $(".custom-modal .modal-content").prepend(
        '<button data-dismiss="modal" class="close" type="button">×</button>'
      );
    }

    // Custom Backdrop for modal popup

    $('a[data-toggle="modal"]').on("click", function () {
      setTimeout(function () {
        if ($(".modal.custom-modal").hasClass("show")) {
          $(".modal-backdrop").addClass("custom-backdrop");
        }
      }, 500);
    });

    // Task function

    var notificationTimeout;

    //Shows updated notification popup
    var updateNotification = function (task, notificationText, newClass) {
      var notificationPopup = $(".notification-popup ");
      notificationPopup.find(".task").text(task);
      notificationPopup.find(".notification-text").text(notificationText);
      notificationPopup.removeClass("hide success");
      // If a custom class is provided for the popup, add It
      if (newClass) notificationPopup.addClass(newClass);
      // If there is already a timeout running for hiding current popup, clear it.
      if (notificationTimeout) clearTimeout(notificationTimeout);
      // Init timeout for hiding popup after 3 seconds
      notificationTimeout = setTimeout(function () {
        notificationPopup.addClass("hide");
      }, 3000);
    };

    // Adds a new Task to the todo list
    var addTask = function () {
      // Get the new task entered by user
      var newTask = $("#new-task").val();
      // If new task is blank show error message
      if (newTask === "") {
        $("#new-task").addClass("error");
        $(".new-task-wrapper .error-message").removeClass("hidden");
      } else {
        var todoListScrollHeight = $(".task-list-body").prop("scrollHeight");
        // Make a new task template
        var newTemplate = $(taskTemplate).clone();
        // update the task label in the new template
        newTemplate.find(".task-label").text(newTask);
        // Add new class to the template
        newTemplate.addClass("new");
        // Remove complete class in the new Template in case it is present
        newTemplate.removeClass("completed");
        //Append the new template to todo list
        $("#task-list").append(newTemplate);
        // Clear the text in textarea
        $("#new-task").val("");
        // As a new task is added, hide the mark all tasks as incomplete button & show the mark all finished button
        $("#mark-all-finished").removeClass("move-up");
        $("#mark-all-incomplete").addClass("move-down");
        // Show notification
        updateNotification(newTask, "added to list");
        // Smoothly scroll the todo list to the end
        $(".task-list-body").animate(
          {
            scrollTop: todoListScrollHeight,
          },
          1000
        );
      }
    };

    // Closes the panel for entering new tasks & shows the button for opening the panel
    var closeNewTaskPanel = function () {
      $(".add-task-btn").toggleClass("visible");
      $(".new-task-wrapper").toggleClass("visible");
      if ($("#new-task").hasClass("error")) {
        $("#new-task").removeClass("error");
        $(".new-task-wrapper .error-message").addClass("hidden");
      }
    };

    // Initalizes HTML template for a given task
    //var taskTemplate = $($('#task-template').html());
    var taskTemplate =
      '<li class="task"><div class="task-container"><span class="task-action-btn task-check"><span class="action-circle large complete-btn" title="Mark Complete"><i class="material-icons">check</i></span></span><span class="task-label" contenteditable="true"></span><span class="task-action-btn task-btn-right"><span class="action-circle large" title="Assign"><i class="material-icons">person_add</i></span> <span class="action-circle large delete-btn" title="Delete Task"><i class="material-icons">delete</i></span></span></div></li>';
    // Shows panel for entering new tasks
    $(".add-task-btn").click(function () {
      var newTaskWrapperOffset = $(".new-task-wrapper").offset().top;
      $(this).toggleClass("visible");
      $(".new-task-wrapper").toggleClass("visible");
      // Focus on the text area for typing in new task
      $("#new-task").focus();
      // Smoothly scroll to the text area to bring the text are in view
      $("body").animate(
        {
          scrollTop: newTaskWrapperOffset,
        },
        1000
      );
    });

    // Deletes task on click of delete button
    $("#task-list").on("click", ".task-action-btn .delete-btn", function () {
      var task = $(this).closest(".task");
      var taskText = task.find(".task-label").text();
      task.remove();
      updateNotification(taskText, " has been deleted.");
    });

    // Marks a task as complete
    $("#task-list").on("click", ".task-action-btn .complete-btn", function () {
      var task = $(this).closest(".task");
      var taskText = task.find(".task-label").text();
      var newTitle = task.hasClass("completed")
        ? "Mark Complete"
        : "Mark Incomplete";
      $(this).attr("title", newTitle);
      task.hasClass("completed")
        ? updateNotification(taskText, "marked as Incomplete.")
        : updateNotification(taskText, " marked as complete.", "success");
      task.toggleClass("completed");
    });

    // Adds a task on hitting Enter key, hides the panel for entering new task on hitting Esc. key
    $("#new-task").keydown(function (event) {
      // Get the code of the key that is pressed
      var keyCode = event.keyCode;
      var enterKeyCode = 13;
      var escapeKeyCode = 27;
      // If error message is already displayed, hide it.
      if ($("#new-task").hasClass("error")) {
        $("#new-task").removeClass("error");
        $(".new-task-wrapper .error-message").addClass("hidden");
      }
      // If key code is that of Enter Key then call addTask Function
      if (keyCode == enterKeyCode) {
        event.preventDefault();
        addTask();
      }
      // If key code is that of Esc Key then call closeNewTaskPanel Function
      else if (keyCode == escapeKeyCode) closeNewTaskPanel();
    });

    // Add new task on click of add task button
    $("#add-task").click(addTask);

    // Close new task panel on click of close panel button
    $("#close-task-panel").click(closeNewTaskPanel);

    // Mark all tasks as complete on click of mark all finished button
    $("#mark-all-finished").click(function () {
      $("#task-list .task").addClass("completed");
      $("#mark-all-incomplete").removeClass("move-down");
      $(this).addClass("move-up");
      updateNotification("All tasks", "marked as complete.", "success");
    });

    // Mark all tasks as incomplete on click of mark all incomplete button
    $("#mark-all-incomplete").click(function () {
      $("#task-list .task").removeClass("completed");
      $(this).addClass("move-down");
      $("#mark-all-finished").removeClass("move-up");
      updateNotification("All tasks", "marked as Incomplete.");
    });

    // Dropfiles

    if ($("#drop-zone").length > 0) {
      var dropZone = document.getElementById("drop-zone");
      var uploadForm = document.getElementById("js-upload-form");
      var startUpload = function (files) {};

      uploadForm.addEventListener("submit", function (e) {
        var uploadFiles = document.getElementById("js-upload-files").files;
        e.preventDefault();

        startUpload(uploadFiles);
      });

      dropZone.ondrop = function (e) {
        e.preventDefault();
        this.className = "upload-drop-zone";

        startUpload(e.dataTransfer.files);
      };

      dropZone.ondragover = function () {
        this.className = "upload-drop-zone drop";
        return false;
      };

      dropZone.ondragleave = function () {
        this.className = "upload-drop-zone";
        return false;
      };
    }

    // Coming Soon

    function getTimeRemaining(endtime) {
      var t = Date.parse(endtime) - Date.parse(new Date());
      var seconds = Math.floor((t / 1000) % 60);
      var minutes = Math.floor((t / 1000 / 60) % 60);
      var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
      var days = Math.floor(t / (1000 * 60 * 60 * 24));
      return {
        total: t,
        days: days,
        hours: hours,
        minutes: minutes,
        seconds: seconds,
      };
    }

    function initializeClock(id, endtime) {
      var clock = document.getElementById(id);
      var daysSpan = clock.querySelector(".days");
      var hoursSpan = clock.querySelector(".hours");
      var minutesSpan = clock.querySelector(".minutes");
      var secondsSpan = clock.querySelector(".seconds");

      function updateClock() {
        var t = getTimeRemaining(endtime);

        daysSpan.innerHTML = t.days;
        hoursSpan.innerHTML = ("0" + t.hours).slice(-2);
        minutesSpan.innerHTML = ("0" + t.minutes).slice(-2);
        secondsSpan.innerHTML = ("0" + t.seconds).slice(-2);

        if (t.total <= 0) {
          clearInterval(timeinterval);
        }
      }

      updateClock();
      var timeinterval = setInterval(updateClock, 1000);
    }

    var deadline = new Date(Date.parse(new Date()) + 256 * 24 * 60 * 60 * 1000);
    if ($("#countdown").length > 0) initializeClock("countdown", deadline);

    // Chart

    if ($("#areaChart, #bar-example, #donutChart, #area-chart").length > 0) {
      var colors = ["#E94B3B", "#39C7AA", "#1C7EBB", "#F98E33", "#ad96da"];
      var data = [
          {
            y: "2014",
            a: 50,
            b: 90,
          },
          {
            y: "2015",
            a: 65,
            b: 75,
          },
          {
            y: "2016",
            a: 50,
            b: 50,
          },
          {
            y: "2017",
            a: 75,
            b: 60,
          },
          {
            y: "2018",
            a: 80,
            b: 65,
          },
          {
            y: "2019",
            a: 90,
            b: 70,
          },
          {
            y: "2020",
            a: 100,
            b: 75,
          },
          {
            y: "2021",
            a: 115,
            b: 75,
          },
          {
            y: "2022",
            a: 120,
            b: 85,
          },
          {
            y: "2023",
            a: 145,
            b: 85,
          },
          {
            y: "2024",
            a: 160,
            b: 95,
          },
        ],
        config = {
          data: data,
          xkey: "y",
          ykeys: ["a", "b"],
          labels: ["Total Income", "Total Outcome"],
          fillOpacity: 0.6,
          hideHover: "auto",
          behaveLikeLine: true,
          resize: true,
          pointFillColors: ["#ffffff"],
          pointStrokeColors: ["black"],
          gridLineColor: "#eef0f2",
          lineColors: ["gray", "#00bf6f"],
        };
      config.element = "area-chart";
      Morris.Area(config);
      Morris.Line({
        lineColors: colors,
        element: "areaChart",

        data: [
          {
            y: "6",
            a: 100,
            b: 40,
            c: 70,
            d: 40,
          },
          {
            y: "7",
            a: 120,
            b: 60,
            c: 50,
            d: 50,
          },
          {
            y: "8",
            a: 120,
            b: 90,
            c: 80,
            d: 60,
          },
          {
            y: "9",
            a: 130,
            b: 120,
            c: 120,
            d: 80,
          },
        ],
        xkey: "y",
        ykeys: ["a", "b", "c", "d"],
        resize: true,
        labels: ["Target", "Starbucks", "test3", "test4"],
      });
      config.element = "stacked";
      config.stacked = true;
      Morris.Bar({
        lineColors: colors,
        element: "bar-example",
        data: [
          {
            y: "2006",
            a: 100,
            b: 90,
          },
          {
            y: "2007",
            a: 75,
            b: 65,
            c: 20,
            d: 55,
          },
          {
            y: "2008",
            a: 50,
            b: 40,
            c: 10,
            d: 55,
          },
          {
            y: "2009",
            a: 75,
            b: 65,
            c: 25,
            d: 55,
          },
          {
            y: "2010",
            a: 50,
            b: 40,
            c: 30,
            d: 55,
          },
          {
            y: "2011",
            a: 75,
            b: 65,
            c: 60,
            d: 55,
          },
          {
            y: "2012",
            a: 100,
            c: 80,
            d: 55,
          },
        ],
        xkey: "y",
        ykeys: ["a", "b", "c", "d"],
        resize: true,
        labels: ["test1", "test2", "test3", "test4"],
      });
      Morris.Donut({
        element: "donutChart",
        data: [
          {
            value: 40,
            label: "Tasks",
          },
          {
            value: 15,
            label: "Clients",
          },
          {
            value: 45,
            label: "Projects",
          },
          {
            value: 30,
            label: "Employees",
          },
          {
            value: 15,
            label: "Messages",
          },
        ],
        labelColor: "#333",
        resize: true,
        colors: colors,
      });
    }
  });

var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function (e) {
      /*when an item is clicked, update the original select box,
        and the selected item:*/
      var y, i, k, s, h, sl, yl;
      s = this.parentNode.parentNode.getElementsByTagName("select")[0];
      sl = s.length;
      h = this.parentNode.previousSibling;
      for (i = 0; i < sl; i++) {
        if (s.options[i].innerHTML == this.innerHTML) {
          s.selectedIndex = i;
          h.innerHTML = this.innerHTML;
          y = this.parentNode.getElementsByClassName("same-as-selected");
          yl = y.length;
          for (k = 0; k < yl; k++) {
            y[k].removeAttribute("class");
          }
          this.setAttribute("class", "same-as-selected");
          break;
        }
      }
      h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function (e) {
    /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
    e.stopPropagation();
    closeAllSelect(this);
    this.nextSibling.classList.toggle("select-hide");
    this.classList.toggle("select-arrow-active");
  });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x,
    y,
    i,
    xl,
    yl,
    arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i);
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);

$(function () {
  // Multiple images preview in browser
  var imagesPreview = function (input, placeToInsertImagePreview) {
    if (input.files) {
      var filesAmount = input.files.length;

      for (i = 0; i < filesAmount; i++) {
        var reader = new FileReader();

        reader.onload = function (event) {
          $($.parseHTML("<img>"))
            .attr("src", event.target.result)
            .appendTo(placeToInsertImagePreview);
        };

        reader.readAsDataURL(input.files[i]);
      }
    }
  };

  $("#image").on("change", function () {
    imagesPreview(this, "div.gallery");
  });
});

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

let limit = 8;
let offset = 0;
let action = "inactive";

if (window.location.href != "http://localhost/patients/doctors") {
  action = "active";
}

function load_data(searchName, searchCity, searchSpecialty, limit, offset) {
  $.ajax({
    url: "/patientsAjax/search",
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
      ``;
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
    $(window).scrollTop() + $(window).height() > $("#searchResult").height() &&
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
    url: "/patientsAjax/search",
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

$("#clinicVisit").on("click", function () {
  $("#clinicDiv").removeClass("hide");
  $("#agreeDiv").addClass("hide");
  $("#agree").attr("checked", true);
  $(this).addClass("btn-active");
  $("#eConsult").removeClass("btn-active");
  $("#appointmentType").val("clinic");
});

$("#eConsult").on("click", function () {
  $("#clinicDiv").addClass("hide");
  $("#agreeDiv").removeClass("hide");
  $("#agree").attr("checked", false);
  $(this).addClass("btn-active");
  $("#clinicVisit").removeClass("btn-active");
  $("#appointmentType").val("e-consult");
});

$("#favorite").on("click", function () {
  doctorId = $("#doctorId").val();
  $.ajax({
    url: "/patientsajax/favorite",
    method: "post",
    data: { doctorId: doctorId },
    dataType: "json",
    success: function (data) {
      if (data.success == "yes") {
        toastr["success"](
          "Added to your favorites",
          '<i class="fa fa-check"></i> Success'
        );
        $("#favorite").addClass("hide");
      }
    },
  });
});

// Dctor Registration
$("#appointmentForm").on("submit", function (event) {
  event.preventDefault();
  $.ajax({
    url: "/patientsajax/appointment",
    method: "POST",
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    dataType: "JSON",
    beforeSend: function () {
      $(".loading-icon").removeClass("hide");
      $("#submitAppointmentForm").attr("disabled", true);
      $(".btn-txt").text("wait...");
    },
    success: function (data) {
      $(".loading-icon").addClass("hide");
      $("#submitAppointmentForm").attr("disabled", false);
      $(".btn-txt").text("Submit");
      if (data.error == "yes") {
        toastr["error"](
          data.errors,
          '<i class="fa fa-exclamation-triangle"></i> Warning'
        );
      } else {
        toastr["success"](
          "Appointment Booked",
          '<i class="fa fa-check"></i> Success'
        );
        document.getElementById("appointmentForm").reset();
        setTimeout(function () {
          window.location.href = "/patients/appointments";
        }, 1000);
      }
    },
  });
});

$("#date").on("focusout", function () {
  $.ajax({
    url: "/patientsAjax/date",
    method: "post",
    data: $(this).serialize(),
    dataType: "json",
    success: function (data) {
      if (data.error == "yes") {
        toastr["error"](
          data.dateError,
          '<i class="fa fa-exclamation-triangle"></i> Warning'
        );
      }
    },
  });
});

$("#problem").on("focusout", function () {
  $.ajax({
    url: "/patientsAjax/problem",
    method: "post",
    data: $(this).serialize(),
    dataType: "json",
    success: function (data) {
      if (data.error == "yes") {
        toastr["error"](
          data.problemError,
          '<i class="fa fa-exclamation-triangle"></i> Warning'
        );
      }
    },
  });
});

$("#problemStart").on("focusout", function () {
  $.ajax({
    url: "/patientsAjax/problemStart",
    method: "post",
    data: $(this).serialize(),
    dataType: "json",
    success: function (data) {
      if (data.error == "yes") {
        toastr["error"](
          data.problemStartError,
          '<i class="fa fa-exclamation-triangle"></i> Warning'
        );
      }
    },
  });
});

$("#height").on("change", function () {
  $.ajax({
    url: "/patientsAjax/height",
    method: "post",
    data: $(this).serialize(),
    dataType: "json",
    success: function (data) {
      if (data.error == "yes") {
        toastr["error"](
          data.heightError,
          '<i class="fa fa-exclamation-triangle"></i> Warning'
        );
      }
    },
  });
});

$("#weight").on("change", function () {
  $.ajax({
    url: "/patientsAjax/weight",
    method: "post",
    data: $(this).serialize(),
    dataType: "json",
    success: function (data) {
      if (data.error == "yes") {
        toastr["error"](
          data.weightError,
          '<i class="fa fa-exclamation-triangle"></i> Warning'
        );
      }
    },
  });
});

$("#temperature").on("change", function () {
  $.ajax({
    url: "/patientsAjax/temperature",
    method: "post",
    data: $(this).serialize(),
    dataType: "json",
    success: function (data) {
      if (data.error == "yes") {
        toastr["error"](
          data.temperatureError,
          '<i class="fa fa-exclamation-triangle"></i> Warning'
        );
      }
    },
  });
});

function notification(result, seen) {
  $("#notificationResult").html(result);
  $("#notif-found").text(seen);
  if (seen != 0) {
    $("#notif-found").removeClass("hide");
  } else {
    $("#notif-found").addClass("hide");
  }
}

current = 0;

$(document).ready(function () {
  $.ajax({
    url: "/doctorsajax/notification",
    type: "get",
    dataType: "json",
    cache: false,
    success: function (data) {
      current = data.seen;
      notification(data.result, data.seen)
    },
  });
});

setInterval(() => {
  $.ajax({
    url: "/doctorsajax/notification",
    type: "get",
    dataType: "json",
    cache: false,
    success: function (data) {
      if (current != data.seen) {
        notification(data.result, data.seen)
        current = data.seen
      }
    },
  });
}, 1000);
