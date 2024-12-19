$(function () {

	$( "#form_g" ).validate( {
		rules: {
			telefono_1 {
				maxlength: 20,
				minlength: 7,
			},
			telefono_2 {
				maxlength: 20,
				minlength: 7,
			},
			correo {
				maxlength: 100,
			},
			pais_id {
				required: true,
			},
			direccion_1 {
				maxlength: 100,
			},
			direccion_2 {
				maxlength: 100,
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

});