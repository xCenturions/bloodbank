$(function () {
  $("#wizard").steps({
    headerTag: "h4",
    bodyTag: "section",
    transitionEffect: "fade",
    enableAllSteps: true,
    enableFinishButton: false,
    transitionEffectSpeed: 300,
    labels: {
      next: "Continue",
      previous: "Back",
    },

    onStepChanging: function (event, currentIndex, newIndex) {
      if (newIndex >= 1) {
        $(".steps ul li:first-child a img").attr("src", "../img/form/st-1.jpg");
      } else {
        $(".steps ul li:first-child a img").attr(
          "src",
          "../img/form/st-1-a.jpg"
        );
      }

      if (newIndex === 1) {
        $(".steps ul li:nth-child(2) a img").attr(
          "src",
          "../img/form/st-2-a.jpg"
        );
      } else {
        $(".steps ul li:nth-child(2) a img").attr(
          "src",
          "../img/form/st-2.jpg"
        );
      }

      if (newIndex === 2) {
        $(".steps ul li:nth-child(3) a img").attr(
          "src",
          "../img/form/st-3-a.jpg"
        );
      } else {
        $(".steps ul li:nth-child(3) a img").attr(
          "src",
          "../img/form/st-3.jpg"
        );
      }

      if (newIndex === 3) {
        $(".steps ul li:nth-child(4) a img").attr(
          "src",
          "../img/form/st-4-a.jpg"
        );
        $(".actions ul").addClass("step-4");
      } else {
        $(".steps ul li:nth-child(4) a img").attr(
          "src",
          "../img/form/st-4.jpg"
        );
        $(".actions ul").removeClass("step-4");
      }
      return true;
    },
  });
  // Custom Button Jquery Steps
  $(".forward").click(function () {
    $("#wizard").steps("next");
  });
  $(".backward").click(function () {
    $("#wizard").steps("previous");
  });

  // Click to see password
  $(".password i").click(function () {
    if ($(".password input").attr("type") === "password") {
      $(this).next().attr("type", "text");
    } else {
      $(".password input").attr("type", "password");
    }
  });
  // Create Steps Image
  $(".steps ul li:first-child")
    .append('<img src="../img/form/step-arrow.png" alt="" class="step-arrow">')
    .find("a")
    .append('<img src="../img/form/st-1-a.jpg" alt=""> ')
    .append('<span class="step-order">Step 01</span>');
  $(".steps ul li:nth-child(2")
    .append('<img src="../img/form/step-arrow.png" alt="" class="step-arrow">')
    .find("a")
    .append('<img src="../img/form/st-2.jpg" alt="">')
    .append('<span class="step-order">Step 02</span>');
  $(".steps ul li:nth-child(3)")
    .append('<img src="../img/form/step-arrow.png" alt="" class="step-arrow">')
    .find("a")
    .append('<img src="../img/form/st-3.jpg" alt="">')
    .append('<span class="step-order">Step 03</span>');
  $(".steps ul li:last-child a")
    .append('<img src="../img/form/st-4.jpg" alt="">')
    .append('<span class="step-order">Step 04</span>');
  // Count input
  $(".quantity span").on("click", function () {
    var $button = $(this);
    var oldValue = $button.parent().find("input").val();

    if ($button.hasClass("plus")) {
      var newVal = parseFloat(oldValue) + 1;
    } else {
      // Don't allow decrementing below zero
      if (oldValue > 0) {
        var newVal = parseFloat(oldValue) - 1;
      } else {
        newVal = 0;
      }
    }
    $button.parent().find("input").val(newVal);
  });
});
