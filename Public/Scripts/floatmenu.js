var winWide = $(window).width();

$(function() {
  playerTop = $("body").offset().top + 150;
  if ($("#appPlayer")) {
    $("#appPlayer").css({
      "top": playerTop,
      "left": winWide - (winWide - 1004) / 2 - 1100
    });
  }
  $(window).on("scroll", function() {
    goTopInit()
    if ($("#appPlayer")) {
      if ($(window).scrollTop() >= playerTop) {
        $("#appPlayer").css({
          "position": "fixed",
          "top": 0
        });
      } else {
        $("#appPlayer").css({
          "position": "absolute",
          "top": playerTop
        });
      }
    }
  });

  $(window).on("resize", function() {
    goTopInit()
  });
  $("#goTop").on("click", function() {
    $(window).scrollTop(0);
  });

});

function goTopInit() {
  if ($(window).scrollTop() == 0) {
    $("#goTop").hide();
  } else {
    $("#goTop").show();
  }
  $("#goTop").css({
    "left": (winWide - 1004) / 2 + 1040
  });
}
function login(){
    window.location.href=login_url+'?next_url='+encodeURIComponent(window.location.href);
}
