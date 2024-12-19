$(function () {

	$(".box-body").hide();

	var id = $("#id_g").val();

	getRecord(id);

	function getRecord(id) {
		// , slcnts:tksec
		$.ajax({
			url: proyVar.base_url + proyVar.path + "/getRecord",
			cache: false,
			dataType: "json",
			type: "post",
			data: {"id":id},
			success:function(data) {
				//tksec = data.tksec;
				if (data.row != null) {
					for (var field in data.row) {
						if ( $("#"+field+"_g") ) {
							var tipo = $("#"+field+"_i").attr("type");
							if (tipo != "file") {
								$("#"+field+"_g").val(data.row[field]);
							} 
						}
					}
					$("#overlay-section").hide();
					$(".box-body").fadeIn();
					$(".overlay").remove();				
				} else {
					swal({
						type: 'error',
						title: txtVar.be_crud_oops,
						text: txtVar.be_crud_could_not_load_record,
						confirmButtonText: 'Ok'
					}).then((result) => {
						if (result.value) {
							location.href = proyVar.base_url + proyVar.path;
						}
					});
				}
			},
			error: function (request, status, error) {
				swal({
					type: 'error',
					title: txtVar.be_crud_oops,
					text: request.responseText
				}).then((result) => {
					if (result.value) {
						location.href = proyVar.base_url + proyVar.path;
					}
				});
			}
		});
	}

});