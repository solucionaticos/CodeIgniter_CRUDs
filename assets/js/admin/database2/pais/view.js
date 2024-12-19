$(function () {
/*
	$('#lista').DataTable({
		"ajax":proyVar.base_url + proyVar.admin_path + "/database2/pais/lista",
		'deferRender': true,
		'retrieve': true,
		'processing': true,   
		"language": {
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "NingÃºn dato disponible en esta tabla",
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
				"sLast":     "Ãšltimo",
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
*/

     $('#lista').DataTable( {
		"processing": true,
		"serverSide": true,
		"ajax": proyVar.base_url + proyVar.admin_path + "/database2/pais/lista_ssp"
      });


	$(".tdBotones").css("width","1px");

	$(".tdSeleccion").css("width","1px");

});