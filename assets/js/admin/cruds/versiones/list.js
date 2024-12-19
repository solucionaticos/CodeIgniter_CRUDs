$(function () {

var rel_proyecto = $("#rel_proyecto").val();

	$("#list").DataTable( {
		"processing": true,
		"serverSide": true,
"ajax": proyVar.base_url + proyVar.path_rel + "/list_ssp/" + rel_proyecto,
		"order": [[ 3, "asc" ]],
		"columnDefs": [ {"targets": 0,"orderable": false}, {"targets": 1,"orderable": false}, {"targets": 2,"orderable": false}, {"targets": 5,"orderable": false} ],
		"paging": false,
        "language": {
            "url": proyVar.datatablesLang 
        }
	});

});	