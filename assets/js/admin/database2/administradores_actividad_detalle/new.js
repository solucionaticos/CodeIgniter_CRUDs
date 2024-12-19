$(function() {

  //Date picker
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    todayBtn: "linked",
    language: "es",
    todayHighlight: true,
    autoclose: true
  });

/*
	$( "#forma_i" ).validate( {
		rules: {
			usuario: {
				required: true,
				minlength: 7,
				maxlength: 20
			},
		},
		messages: {       
			usuario: {
				required: "El campo usuario es obligatorio.",
				minlength: "Tu usuario al menos debe tener 7 caracteres.",
				maxlength: "Tu usuario debe tener máximo 20 caracteres."
			},                  
		},
		errorElement: "em",
		errorPlacement: function ( error, element ) {
			error.addClass( "help-block" );
			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.parent( "label" ) );
			} else {
				error.insertAfter( element );
			}
		},
		highlight: function ( element, errorClass, validClass ) {
			$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
		},
		unhighlight: function (element, errorClass, validClass) {
			$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
		}
	} );   
*/

});
