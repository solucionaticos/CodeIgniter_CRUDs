$(function () {

  $(".button").click(function () {
    var urlBtn = $(this).attr("url");
    location.href = urlBtn;
  });

});