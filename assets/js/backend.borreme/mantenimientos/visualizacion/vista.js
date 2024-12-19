$(function () {
  
	$(".collapsed").click(function () {
		var carga1 = $(this).attr("carga1");
		fs_estructructura($(this), carga1);
		 $(this).attr("carga1", "1");
	});
	$(document).on("click", ".estructura", function () {
		var carga = $(this).attr("carga");
		fs_estructructura($(this), carga);
		 $(this).attr("carga", "1");
	});
  
  var tksec = proyVarS.sgch;
  
	function fs_estructructura (esto, carga) {
		var tabla = esto.attr("tabla");
		esto.addClass('text-primary');
		if (carga == "0") {
			$("#collapse-"+tabla).attr("carga1", "1");
			$.ajax({
				url: proyVar.base_url + proyVar.admin_path + "/mantenimientos/visualizacion/tabla",
				dataType: "json",
				type: "post",
        data: {"tabla":tabla, slcnts:tksec},
        cache: false,
				success:function(datos) {
					tksec = datos.tksec;
					var tabla_html = "";
					for (var i = 0; i < datos.campos.length; i++) {
						tabla_html += 
							"<tr>" + 
								"<td>" + datos.campos[i].name + "</td>" + 
								"<td>" + datos.campos[i].type + "</td>" + 
								"<td>" + datos.campos[i].max_length + "</td>" + 
								"<td>" + datos.campos[i].default + "</td>" + 
								"<td>" + datos.campos[i].primary_key + "</td>" + 
							"</tr>"; 
					}
					if (tabla_html !== "") {
						var language = proyVar.language;
						language = language.replace(/^[a-z]/, function (x) {return x.toUpperCase()});
						var languagePath = "'language': {'url': '" + proyVar.base_url + "assets/" + proyVar.admin_path + "/adminlte/plugins/datatables/langs/" + language + ".lang.js'}";
						tabla_html = 
						"<br><div class='table-responsive'>" + 
						"<table class='table table-striped' id='tabla_estructura_"+tabla+"'>" + 
							"<thead>" + 
								"<tr>" + 
									"<th>Nombre</th>" + 
									"<th>Tipo</th>" + 
									"<th>Tamaño</th>" + 
									"<th>Valor por Defecto</th>" + 
									"<th>Llave Primaria</th>" + 
								"</tr>" + 
							"</thead>" + 
							"<tbody>" + tabla_html + "</tbody>" + 
						"</table>" + 
						"</div>" + 
						"<script>"+
							"$(function() {"+ 
								"$('#tabla_estructura_"+tabla+"').DataTable({"+
										languagePath +
								"});"+
							"});"+
						"</script>"; 						
						
						tabla_html = 
								'<div>' + 
									'<ul class="nav nav-pills" role="tablist">' + 
										'<li role="presentation" class="active"><a href="#estructura_'+tabla+'" aria-controls="estructura_'+tabla+'" role="tab" data-toggle="tab" tabla="'+tabla+'" class="estructura">Estructura</a></li>' + 
										'<li role="presentation"><a href="#indices_'+tabla+'" aria-controls="indices_'+tabla+'" role="tab" data-toggle="tab" tabla="'+tabla+'" class="indices">Indices</a></li>' + 
										'<li role="presentation"><a href="#relaciones_'+tabla+'" aria-controls="relaciones_'+tabla+'" role="tab" data-toggle="tab" tabla="'+tabla+'" class="relaciones">Relaciones</a></li>' + 
										'<li role="presentation"><a href="#datos_'+tabla+'" aria-controls="datos_'+tabla+'" role="tab" data-toggle="tab" tabla="'+tabla+'" class="datos">Datos</a></li>' + 
									'</ul>' + 
									'<div class="tab-content">' + 
										'<div role="tabpanel" class="tab-pane active" id="estructura_'+tabla+'">' + tabla_html + '</div>' + 
										'<div role="tabpanel" class="tab-pane" id="indices_'+tabla+'"><i class="fa fa-spinner fa-spin"></i></div>' + 
										'<div role="tabpanel" class="tab-pane" id="relaciones_'+tabla+'"><i class="fa fa-spinner fa-spin"></i></div>' + 
										'<div role="tabpanel" class="tab-pane" id="datos_'+tabla+'"><i class="fa fa-spinner fa-spin"></i></div>' + 
									'</div>' + 
								'</div>';
						$("#"+tabla).html(tabla_html);
					}
				}
			});
		}
	}

	$(document).on("click", ".indices", function () {
		var tabla = $(this).attr("tabla");
		fs_datos(tabla, "indices", 2);
	});	
	$(document).on("click", ".relaciones", function () {
		var tabla = $(this).attr("tabla");
		fs_datos(tabla, "relaciones", 3);
	});	
	$(document).on("click", ".datos", function () {
		var tabla = $(this).attr("tabla");
		$.ajax({
			url: proyVar.base_url + proyVar.admin_path + "/mantenimientos/visualizacion/datos",
			cache: false,
			dataType: "json",
			type: "post",
			data: {"tabla":tabla, slcnts:tksec},
			success:function(datos) {
				tksec = datos.tksec;
				location.href = proyVar.base_url + proyVar.admin_path + "/mantenimientos/visualizacion/crud";
			}
		});		
	});	
	
	function fs_datos (tabla, info, seccion) {
		var carga = $("#collapse-"+tabla).attr("carga" + seccion);
		if (carga == '0') {
			if (tabla !== "") {
				$("#collapse-"+tabla).attr("carga" + seccion, "1");
				$.ajax({
					url: proyVar.base_url + proyVar.admin_path + "/mantenimientos/visualizacion/" + info,
					cache: false,
					dataType: "json",
					type: "post",
					data: {"tabla":tabla, slcnts:tksec},
					success:function(datos) {
						tksec = datos.tksec;
						var tabla_html = "";

							var etiquetas = '';
							etiquetas += "<tr>";
							for (var i in datos.campos) {
								etiquetas += "<th>" + datos.campos[i] + "</th>";
							}          
							etiquetas += "</tr>";          

							var tabla_datos = '';
							for (var k in datos.datos) {
								tabla_datos += "<tr>"; 
								for (var m in datos.campos) {
										tabla_datos += "<td>" + datos.datos[k][datos.campos[m]] + "</td>";
								}          
								tabla_datos += "</tr>"; 
							}

						if (tabla_datos !== "") {
							
								var language = proyVar.language;
								language = language.replace(/^[a-z]/, function (x) {return x.toUpperCase()});
								var languagePath = "'language': {'url': '" + proyVar.base_url + "assets/" + proyVar.admin_path + "/adminlte/plugins/datatables/langs/" + language + ".lang.js'}";
/*
							// Solo para los datos
							var ssp = "";
							if (info === "datos") {
								ssp += ',"processing": true,';
								ssp += '"serverSide": true,';
								ssp += '"deferLoading": 208,';
								ssp += '"ajax": {';
								ssp += '    "url": proyVar.base_url + "/" + proyVar.admin_path + "/mantenimientos/visualizacion/ssp",';
								ssp += '	"cache": false,';
								ssp += '	"dataType": "json",';
								ssp += '	"type": "post",';
								ssp += '	"data": {"tabla":"'+tabla+'", slcnts:"'+tksec+'"},';
								ssp += '	success:function(datos) {tksec = datos.tksec;}';
								ssp += '}';
							}
*/
							tabla_html = 
							"<br><div class='table-responsive'>" + 
							"<table class='table table-striped' id='tabla_"+info+"_"+tabla+"'>" + 
								"<thead>" + etiquetas + "</thead>" + 
								"<tbody>" + tabla_datos + "</tbody>" + 
							"</table>" + 
							"</div>" + 
							"<script>"+
								"$(function() {"+ 
									"$('#tabla_"+info+"_"+tabla+"').DataTable({"+
											languagePath +
									"});"+
								"});"+
							"</script>"; 
						} else {
							tabla_html = 
							'<br><div class="alert alert-info">' + 
							'<h4>Atención</h4> No hay datos.' +
							'</div>';
						}
						$("#"+info+"_"+tabla).html(tabla_html);
					}
				});
			}
		}
	}
	
});


