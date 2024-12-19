$(function() {

  //Date picker
  $('.datepicker').datepicker({
  	format: 'yyyy-mm-dd',
  	todayBtn: "linked",
  	language: "es",
  	todayHighlight: true,
  	autoclose: true
  });

  var id = $("#id_g").val();
  getRecord(id);

  function getRecord(id) {
		// , slcnts:tksec
		$.ajax({
			url: proyVar.base_url + proyVar.admin_path + "/database2/administradores_actividad_detalle/getRecord",
			cache: false,
			dataType: "json",
			type: "post",
			data: {"id":id},
			success:function(datos) {
				//tksec = datos.tksec;
				if (datos.registro != null) {
					for (var campoId in datos.registro) {
						if ( $("#"+campoId+"_g") ) {
							var tipo = $("#"+campoId+"_i").attr("type");
							if (tipo != "file") {
								$("#"+campoId+"_g").val(datos.registro[campoId]);
							} 
						}
					}
				} else {
					swal({
						type: 'error',
						title: 'Ups...',
						text: 'No fue posible cargar el registro',
						confirmButtonText: 'Ok'
					}).then((result) => {
						if (result.value) {
							location.href = proyVar.base_url + proyVar.admin_path + "/database2/administradores_actividad_detalle";
						}
					});
				}
			},
			error: function (request, status, error) {
				swal({
					type: 'error',
					title: 'Ups...',
					text: request.responseText
				}).then((result) => {
					if (result.value) {
						location.href = proyVar.base_url + proyVar.admin_path + "/database2/administradores_actividad_detalle";
					}
				});                    
			}
		});
	}

/*
	$( "#forma_g" ).validate( {
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