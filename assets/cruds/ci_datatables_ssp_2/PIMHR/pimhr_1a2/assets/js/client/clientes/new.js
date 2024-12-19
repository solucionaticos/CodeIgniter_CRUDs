$(function () {

	$( "#form_i" ).validate( {
		rules: {
			nombre {
				required: true,
				maxlength: 50,
				minlength: 1,
			},
			apellidos {
				required: true,
				maxlength: 50,
				minlength: 1,
			},
			compania {
				required: true,
				maxlength: 100,
			},
			correo {
				email: true,
				required: true,
				maxlength: 100,
			},
			tipo_documento_id {
				required: true,
			},
			documento {
				required: true,
				maxlength: 30,
			},
			telefono {
				required: true,
				maxlength: 20,
			},
			pais_id {
				required: true,
			},
			ciudad_id {
				required: true,
			},
			direccion_1 {
				required: true,
				maxlength: 100,
			},
			direccion_2 {
				maxlength: 100,
			},
			estado_cliente_id {
				required: true,
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