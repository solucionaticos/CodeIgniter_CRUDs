$(function () {
	// var tksec = proyVarS.sgch; 

	$("#selectAll").click(function () {
		var checkedCtr = $(this).prop("checked");
		$(".selection").each(function () {
			$(this).prop("checked", checkedCtr);
		});
	});

	$(document).on("click", ".btnEdit", function(){
		var id = $(this).attr("cod");
		location.href = proyVar.base_url + proyVar.path + "/edit/" + id;
	});

	$(document).on("click", ".btnEdit_rel", function(){
		var id = $(this).attr("cod");
		location.href = proyVar.base_url + proyVar.path_rel + "/edit/" + id;
	});


	$("#btnDelete").click(function(){
		var id ="";
		$(".selection").each(function () {
			if ($(this).prop("checked")) {
				id += $(this).attr("cod") + ";";
			}
		});
		if (id !== "") {
			id += "0";
			$("#id_e").val(id);
			swal({
				title: txtVar.be_crud_are_you_sure_you_want_to_delete_it,
				text: txtVar.be_crud_you_will_not_be_able_to_reverse_this_operation,
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: txtVar.be_crud_yes_delete
			}).then((result) => {
				if (result.value) {
					if (result.value) {
						$("#form_e").submit();
					}
				}
			});
		} else {
			swal({
				type: 'error',
				title: txtVar.be_crud_oops,
				text: txtVar.be_crud_you_must_select_at_least_one_record
			});              
		}
	});

	$(document).on("click", ".btnDelete", function(){
		var id ="";
		id = $(this).attr("cod");
		$("#id_e").val(id);
		swal({
			title: txtVar.be_crud_are_you_sure_you_want_to_delete_it,
			text: txtVar.be_crud_you_will_not_be_able_to_reverse_this_operation,
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: txtVar.be_crud_yes_delete
		}).then((result) => {
			if (result.value) {
				$("#form_e").submit();
			}
		});
	}); 

});