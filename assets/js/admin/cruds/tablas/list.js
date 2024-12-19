$(function () {

var rel_version = $("#rel_version").val();

	$("#list").DataTable( {
		"processing": true,
		"serverSide": true,
"ajax": proyVar.base_url + proyVar.path_rel + "/list_ssp/" + rel_version,
		"order": [[ 3, "asc" ]],
		"columnDefs": [ {"targets": 0,"orderable": false}, {"targets": 1,"orderable": false}, {"targets": 2,"orderable": false}, {"targets": 6,"orderable": false} ],
		"paging": false,
        "language": {
            "url": proyVar.datatablesLang 
        }
	});

});	