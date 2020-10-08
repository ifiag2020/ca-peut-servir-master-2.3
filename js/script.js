$(document).ready(function () {
  // Like button
  $(function () {
    $(".fa-heart").on("click", function () {
      $(this).toggleClass("is-active");
    });
  });

  $("#myModal").on("shown.bs.modal", function () {
    $("#myInput").trigger("focus");
  });

  // carousel
  $(".my-carousel").owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    dots: true,
    merge: true,
    nav: true,
    navText: [
      "<span class='nav-main-slider-btn fa fa-chevron-left'></span>",
      "<span class='nav-main-slider-btn fa fa-chevron-right'></span>",
    ],
    responsive: {
      0: {
        items: 1,
        dots: false,
      },
      1000: {
        items: 1,
      },
    },
  });
});

document.getElementById("detect").onmouseover = function () {
  mouseOver();
};
document.getElementById("detect").onmouseout = function () {
  mouseOut();
};

document.getElementById("detect-check").onmouseover = function () {
  mouseOverCheck();
};
document.getElementById("detect-check").onmouseout = function () {
  mouseOutCheck();
};

document.getElementById("detect-pay").onmouseover = function () {
  mouseOverPay();
};
document.getElementById("detect-pay").onmouseout = function () {
  mouseOutPay();
};

function mouseOver() {
  document.getElementById("title-info").style.color = "#ffe272";
  document.getElementById("shipping").style.color = "#ffe272";
  document.getElementById("info-card").style.borderColor = "#ffe272";
  document.getElementById("rectangle").style.borderColor = "#ffe272";
}
function mouseOverCheck() {
  document.getElementById("title-info-check").style.color = "#ffe272";
  document.getElementById("check").style.color = "#ffe272";
  document.getElementById("info-card-check").style.borderColor = "#ffe272";
  document.getElementById("rectangle-check").style.borderColor = "#ffe272";
}
function mouseOverPay() {
  document.getElementById("title-info-pay").style.color = "#ffe272";
  document.getElementById("pay").style.color = "#ffe272";
  document.getElementById("info-card-pay").style.borderColor = "#ffe272";
  document.getElementById("rectangle-pay").style.borderColor = "#ffe272";
}
function mouseOut() {
  document.getElementById("title-info").style.color = "#009a8f";
  document.getElementById("shipping").style.color = "#009a8f";
  document.getElementById("info-card").style.borderColor = "#009a8f";
  document.getElementById("rectangle").style.borderColor = "#009a8f";
}
function mouseOutCheck() {
  document.getElementById("title-info-check").style.color = "#009a8f";
  document.getElementById("check").style.color = "#009a8f";
  document.getElementById("info-card-check").style.borderColor = "#009a8f";
  document.getElementById("rectangle-check").style.borderColor = "#009a8f";
}
function mouseOutPay() {
  document.getElementById("title-info-pay").style.color = "#009a8f";
  document.getElementById("pay").style.color = "#009a8f";
  document.getElementById("info-card-pay").style.borderColor = "#009a8f";
  document.getElementById("rectangle-pay").style.borderColor = "#009a8f";
}
