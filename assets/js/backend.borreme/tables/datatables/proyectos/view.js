$(document).ready(function() {
	jQuery.extend(jQuery.validator.messages, {
		required: "Este campo es obligatorio.",
		remote: "Por favor, rellena este campo.",
		email: "Por favor, escribe una dirección de correo válida",
		url: "Por favor, escribe una URL válida.",
		date: "Por favor, escribe una fecha válida.",
		dateISO: "Por favor, escribe una fecha (ISO) válida.",
		number: "Por favor, escribe un número entero válido.",
		digits: "Por favor, escribe sólo dígitos.",
		creditcard: "Por favor, escribe un número de tarjeta válido.",
		equalTo: "Por favor, escribe el mismo valor de nuevo.",
		accept: "Por favor, escribe un valor con una extensión aceptada.",
		maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
		minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
		rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
		range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
		max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
		min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
	});
});

$(function () {
	var tksec = proyVarS.sgch;

	//Date picker
	$('.datepicker').datepicker({
		format: 'yyyy-mm-dd',
		todayBtn: "linked",
		language: "es",
		todayHighlight: true,
		autoclose: true
	});  

  
	$('#lista').DataTable({
		"ajax":proyVar.base_url + proyVar.admin_path + "/proyectos/lista",
		'deferRender': true,
		'retrieve': true,
		'processing': true,   
		"language": {
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
		},
		'order': [[ 3, 'asc' ]],
		'columnDefs': [ {'targets': 0,'orderable': false}, {'targets': 1,'orderable': false}, {'targets': 2,'orderable': false} ]  
	});

	$("#seleccionarTodos").click(function () {
		var checkedCtr = $(this).prop("checked");
		$(".seleccion").each(function () {
			$(this).prop("checked", checkedCtr);
		});
	});

	$("#btnNuevo").click(function(){
		$("#modalNuevo").modal({backdrop: "static"});
	});

	$("#btnEditar").click(function(){
		var id ="";
		$(".seleccion").each(function () {
			if ($(this).prop("checked")) {
				id = $(this).attr("cod");
				return false;
			}
		});
		if (id !== "") {
			$("#id_g").val(id);
			traerRegistro(id);
		} else {
			swal({
				type: 'error',
				title: 'Ups...',
				text: 'Debes seleccionar un registro'
			});
		}
	});

	$(document).on("click", ".btnEditar", function(){
		var id ="";
		id = $(this).attr("cod");
		$("#id_g").val(id);
		traerRegistro(id);
	});

	function traerRegistro(id) {
		$.ajax({
			url: proyVar.base_url + proyVar.admin_path + "/proyectos/traerRegistro",
			cache: false,
			dataType: "json",
			type: "post",
			data: {"id":id, slcnts:tksec},
			success:function(datos) {
				tksec = datos.tksec;
				if (datos.registro != null) {
					for (var campoId in datos.registro) {
						if ( $("#"+campoId+"_g") ) {
							var tipo = $("#"+campoId+"_i").attr("type");
							if (tipo != "file") {
								$("#"+campoId+"_g").val(datos.registro[campoId]);
							} 
						}
					}
					$("#modalEditar").modal({backdrop: "static"});
				} else {
					swal({
						type: 'error',
						title: 'Ups...',
						text: 'No fue posible cargar el registro'
					});  
				}
			},
			error: function (request, status, error) {
				swal({
					type: 'error',
					title: 'Ups...',
					text: request.responseText
				});                    
			}
		});
	}

	$("#btnEliminar").click(function(){
		var id ="";
		$(".seleccion").each(function () {
			if ($(this).prop("checked")) {
				id += $(this).attr("cod") + ";";
			}
		});
		if (id !== "") {
			id += "0";
			$("#id_e").val(id);
			swal({
				title: 'Seguro que deseas eliminar?',
				text: "No podras revertir esta operación!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Si, eliminar!'
			}).then((result) => {
				if (result.value) {
					if (result.value) {
						$("#forma_e").submit();
					}
				}
			});
		} else {
			swal({
				type: 'error',
				title: 'Ups...',
				text: 'Debes seleccionar al menos un registro'
			});              
		}
	});

	$(document).on("click", ".btnEliminar", function(){
		var id ="";
		id = $(this).attr("cod");
		$("#id_e").val(id);
		swal({
			title: 'Seguro que deseas eliminar?',
			text: "No podras revertir esta operación!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, eliminar!'
		}).then((result) => {
			if (result.value) {
				$("#forma_e").submit();
			}
		});
	});      

	$( "#forma_i" ).validate( {
		rules: {

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

	$( "#forma_g" ).validate( {
		rules: {

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