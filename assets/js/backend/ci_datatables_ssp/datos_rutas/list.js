$(function () {
	var tksec = proyVarS.sgch; 

	$("#seleccionarTodos").click(function () {
		var checkedCtr = $(this).prop("checked");
		$(".seleccion").each(function () {
			$(this).prop("checked", checkedCtr);
		});
	});

	$('#lista').DataTable( {
		"processing": true,
		"serverSide": true,
		"ajax": proyVar.base_url + proyVar.admin_path + "/backend/ci_datatables_ssp/datos_rutas/list_ssp",
		'order': [[ 3, 'asc' ]],
		'columnDefs': [ {'targets': 0,'orderable': false}, {'targets': 1,'orderable': false}, {'targets': 2,'orderable': false} ],
		'iDisplayLength': 25, 
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
		}
	});

	$(document).on("click", ".btnEditar", function(){
		var id = $(this).attr("cod");
		location.href = proyVar.base_url + proyVar.admin_path + "/backend/ci_datatables_ssp/datos_rutas/edit/" + id;
	});

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

});