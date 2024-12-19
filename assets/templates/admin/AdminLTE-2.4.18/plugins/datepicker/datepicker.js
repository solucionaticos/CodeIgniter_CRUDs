$(function () {

  //Date picker
  $('.datepicker').datepicker({
    format: proyVar.dateFormat,
    todayBtn: "linked",
    language: proyVar.lang,
    todayHighlight: true,
    autoclose: true
  });

})