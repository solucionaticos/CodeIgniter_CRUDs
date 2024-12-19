$(function () {

	$( "#form_g" ).validate( {
		rules: {
			datos_comunicados_correo {
				maxlength: 100,
			},
			datos_comunicados_telefono_movil {
				maxlength: 20,
				minlength: 7,
			},
			datos_comunicados_telefono_fijo {
				maxlength: 20,
				minlength: 7,
			},
			datos_comunicados_telefono_contacto_emergencia {
				maxlength: 20,
				minlength: 7,
			},
			clave {
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