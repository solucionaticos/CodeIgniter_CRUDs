$(document).ready(function() {
  jQuery.extend(jQuery.validator.messages, {
  required: "Tento údaj je povinný.",
    remote: "Prosím, opravte tento údaj.",
    email: "Prosím, zadejte platný e-mail.",
    url: "Prosím, zadejte platné URL.",
    date: "Prosím, zadejte platné datum.",
    dateISO: "Prosím, zadejte platné datum (ISO).",
    number: "Prosím, zadejte číslo.",
    digits: "Prosím, zadávejte pouze číslice.",
    creditcard: "Prosím, zadejte číslo kreditní karty.",
    equalTo: "Prosím, zadejte znovu stejnou hodnotu.",
    extension: "Prosím, zadejte soubor se správnou příponou.",
    maxlength: $.validator.format( "Prosím, zadejte nejvíce {0} znaků." ),
    minlength: $.validator.format( "Prosím, zadejte nejméně {0} znaků." ),
    rangelength: $.validator.format( "Prosím, zadejte od {0} do {1} znaků." ),
    range: $.validator.format( "Prosím, zadejte hodnotu od {0} do {1}." ),
    max: $.validator.format( "Prosím, zadejte hodnotu menší nebo rovnu {0}." ),
    min: $.validator.format( "Prosím, zadejte hodnotu větší nebo rovnu {0}." ),
    step: $.validator.format( "Musí být násobkem čísla {0}." )
  });
});

$(document).ready(function(){
  $("#login").click(function(){
    $("#myModalLogin").modal({backdrop: "static"});
  });
  $(".metodiky").click(function () {
      var code = $(this).attr("code");
      location.href = base_url + "detail_metodiky/" + code;
  });      
});

$(function () {
    $("#form-prihlasit_se").validate({
        rules: {
            email: {
                required: true,
                email: true,
                minlength: 10,
                maxlength: 70
            },
            pwd: {
                required: true,
                minlength: 7,
                maxlength: 20
            }
        }
    });
});

$(function () {
  $(".procUserMaterial").click(function () {
    var code = $(this).attr("code");
    //$("#material_" + code).fadeOut();
    var status = $(this).attr("status");
    if (status == "1") {
      $(this).attr("status", "0");
      $(this).html('<i class="fa fa-heart-o"></i> Uložit do knihovny');
    } else {
      $(this).attr("status", "1");
      $(this).html('<i class="fa fa-heart"></i> Odebrat z knihovny');
    }
    
    $.ajax({
      url: base_url + "knihovna/user_materials",
      cache: false,
      type: "post",
      data: {"material_id":code}
    });
  })


  $(".procUserMaterialRemove").click(function () {
    var code = $(this).attr("code");
    //$("#material_" + code).fadeOut();
    var status = $(this).attr("status");
    if (status == "1") {
      $(this).attr("status", "0");
      $(this).html('<i class="fa fa-heart-o"></i> Uložit do knihovny');
      $("#material_" + code).remove();
    } else {
      $(this).attr("status", "1");
      $(this).html('<i class="fa fa-heart"></i> Odebrat z knihovny');
    }
    
    $.ajax({
      url: base_url + "knihovna/user_materials",
      cache: false,
      type: "post",
      data: {"material_id":code}
    });
  })

});

$(function () {

  $("#sort_materials_methodology_and_guidance").change(function () {
    var val = $(this).val();
    location.href = base_url + "sort/methodology_and_guidance/" + val;
  });

  $("#sort_materials_library").change(function () {
    var val = $(this).val();
    location.href = base_url + "sort/library/" + val;
  });

  $("#sort_similar_projects").change(function () {
    var val = $(this).val();
    location.href = base_url + "sort/about_the_project/" + val;
  });


});