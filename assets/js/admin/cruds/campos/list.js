$(function () {

var rel_tabla = $("#rel_tabla").val();

	$('#list').DataTable( {
		"processing": true,
		"serverSide": true,
"ajax": proyVar.base_url + proyVar.path_rel + "/list_ssp/" + rel_tabla,
		"order": [[ 6, "asc" ]],
		"columnDefs": [ {"targets": 0,"orderable": false}, {"targets": 1,"orderable": false}, {"targets": 2,"orderable": false} ],
		"paging": false,
		"language": {
			"url": proyVar.datatablesLang 
		}
	});

});