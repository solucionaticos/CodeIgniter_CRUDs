$(function () {

	var tksec = proyVarS.sgch;

	$("#tabla").change(function () {
		var tabla = Number($(this).val());
		$("#tabla_id").val(tabla);
		if (tabla > 0) {
			$("#campos_formularios").css("display","inline");
			$("#propiedades_campo").css("display","none");
			var tablaTexto = $("#tabla option:selected").text();
			$("#tabla_seleccionada").html(tablaTexto);
			if (tabla > 0) {
				$.ajax({
					url: proyVar.base_url + proyVar.admin_path + "/mantenimientos/configuracion/campos",
					cache: false,
					dataType: "json",
					type: "post",
					data: {"tabla":tabla, slcnts:tksec},
					success:function(datos) {
						tksec = datos.tksec;

						var campos = "";
						for(var i in datos.campos) {
						    campos += '<tr>';
						    campos += '	<td>';
						    campos += '		<div class="btn-group" role="group"><a href="#campos_panel">';
						    campos += '			<button type="button" class="btn btn-default selectorCampo"';
						    campos += ' id="'+datos.campos[i].id+'"';
						    campos += '><i class="fa fa-cog campos_cog" aria-hidden="true" style="color: #3879b7;" id="cog_'+datos.campos[i].id+'"></i></button>';

						    campos += '		</a></div>';
						    campos += '	</td>';
						    campos += '	<td>';
						    campos += '		<input cod="'+datos.campos[i].id+'" name="etiqueta" id="campo_etiqueta_'+datos.campos[i].id+'" class="form-control actDatoCampo" type="text" value="'+datos.campos[i].etiqueta+'">';
						    campos += '	</td>';
						    campos += '	<td>';
						    campos += '		<select cod="'+datos.campos[i].id+'" name="tipo_campo" id="campo_tipo_campo" class="form-control actDatoCampo">';
						    campos += '			<option value="">Seleccione un tipo</option>';

						    campos += '			<option value="23"';
						    if (datos.campos[i].tipo_campo == "23") {campos += ' selected="selected"';}
						    campos += '>INT</option>';

						    campos += '			<option value="24"';
						    if (datos.campos[i].tipo_campo == "24") {campos += ' selected="selected"';}
						    campos += '>VARCHAR</option>';

						    campos += '			<option value="25"';
						    if (datos.campos[i].tipo_campo == "25") {campos += ' selected="selected"';}
						    campos += '>TEXT</option>';

						    campos += '			<option value="26"';
						    if (datos.campos[i].tipo_campo == "26") {campos += ' selected="selected"';}
						    campos += '>DATE</option>';

						    campos += '			<option value="27"';
						    if (datos.campos[i].tipo_campo == "27") {campos += ' selected="selected"';}
						    campos += '>DATETIME</option>';

						    campos += '		</select>';
						    campos += '	</td>';
						    campos += '	<td>';
						    if (datos.campos[i].llave_primaria == 4) {
							    campos += '		<div class="btn-group" role="group">';
							    campos += '			<button type="button" class="btn btn-default"><i class="fa fa-key" aria-hidden="true" style="color: #ff9800;"></i></button>';
							    campos += '		</div>';
							}
						    campos += '	</td>';
						    campos += '</tr>';
						}
						$("#campos").html(campos);

					}
				});	
			}
		} else {
			$("#campos_formularios").css("display","none");
		}
	})

	$("#tabla_propiedades").click(function () {
		$("#modal_tabla_propiedades").modal({backdrop: "static"});
	})

	$("#tabla_asistente").click(function () {
		$("#modal_tabla_asistente").modal({backdrop: "static"});
	})

	$("#campo_asistente").click(function () {
		$("#modal_campo_asistente").modal({backdrop: "static"});
	})

	$("#campo_eliminar").click(function () {
		$("#modal_campo_eliminar").modal({backdrop: "static"});
	})

//	$(".validacion_eliminar").click(function () {
	$(document).on("click", ".validacion_eliminar", function () {
		var id = $(this).attr("campos_val_id");
		$("#validacion_eliminar").attr("cod", id);
		$("#modal_validacion_eliminar").modal({backdrop: "static"});
	})

	$("#validacion_asistente").click(function () {
		$("#modal_validacion_asistente").modal({backdrop: "static"});
	})

	$(".actDato").change(function () {
		var id = $("#campo_id").val();
		var valor = $(this).val();
		var campo = $(this).attr("name");

		if (campo == "etiqueta") {
			$("#campo_etiqueta_seleccionado").html(valor);
			$("#campo_etiqueta_" + id).val(valor);
		}

		actDato(id, valor, campo);
	})

	$(".actDato").keyup(function () {
		var id = $("#campo_id").val();
		var valor = $(this).val();
		var campo = $(this).attr("name");

		if (campo == "etiqueta") {
			$("#campo_etiqueta_seleccionado").html(valor);
			$("#campo_etiqueta_" + id).val(valor);
		}

		actDato(id, valor, campo);
	})

	function actDato(id, valor, campo) {
		$.ajax({
			url: proyVar.base_url + proyVar.admin_path + "/mantenimientos/configuracion/actdato",
			cache: false,
			dataType: "json",
			type: "post",
			data: {"id":id, "campo":campo, "valor":valor, slcnts:tksec},
			success:function(datos) {
//				tksec = datos.tksec;
			}
		});	
	}	

	// document
	$(document).on("focus", ".actDatoCampo", function () {
		var id = $(this).attr("cod");
		mostrarCampo(id);
	})

	$(document).on("change", ".actDatoCampo", function () {
		var id = $(this).attr("cod");
		var valor = $(this).val();
		var campo = $(this).attr("name");

		if (campo == "etiqueta") {
			$("#campo_etiqueta_seleccionado").html(valor);
			$("#campo_etiqueta").val(valor);
		}

		$.ajax({
			url: proyVar.base_url + proyVar.admin_path + "/mantenimientos/configuracion/actdato",
			cache: false,
			dataType: "json",
			type: "post",
			data: {"id":id, "campo":campo, "valor":valor, slcnts:tksec},
			success:function(datos) {

			}
		});	
	})

	$(document).on("click", ".selectorCampo", function () {
		var id = $(this).attr("id");
		mostrarCampo(id);
	})

	function mostrarCampo(id) {
		$("#propiedades_campo").css("display","inline");
		$("#campo_id").val(id);
		$(".campos_cog").css("color","#3879b7");
		$("#cog_"+id).css("color","yellow");
		var tabla = $("#tabla_id").val();
		$.ajax({
			url: proyVar.base_url + proyVar.admin_path + "/mantenimientos/configuracion/campo",
			cache: false,
			dataType: "json",
			type: "post",
			data: {"id":id, "tabla":tabla, slcnts:tksec},
			success:function(datos) {
				tksec = datos.tksec;
				$("#campo_etiqueta").val(datos.campo.etiqueta);
				$("#campo_etiqueta_seleccionado").html(datos.campo.etiqueta);
				$("#campo_nombre").val(datos.campo.nombre);
				$("#campo_tamano").val(datos.campo.tamano);
				$("#campo_valor_predeterminado").val(datos.campo.valor_predeterminado);

				$("#campo_tipo_entrada").val(datos.campo.tipo_entrada);
				$("#campo_tipo_entrada_parametro").val(datos.campo.tipo_entrada_parametro);

				$("#campo_autonumerico").val(datos.campo.autonumerico);
				$("#campo_comentarios").val(datos.campo.comentarios);

				$("#campo_llave_primaria").val(datos.campo.llave_primaria);
				$("#campo_indice").val(datos.campo.indice);
				$("#campo_unico").val(datos.campo.unico);

				$("#campo_archivo").val(datos.campo.archivo);
				$("#campo_archivo_ruta").val(datos.campo.archivo_ruta);

				$("#campo_relacion_datos").val(datos.campo.relacion_datos);
				$("#campo_relacion_tabla").val(datos.campo.relacion_tabla);
				$("#campo_relacion_campo").val(datos.campo.relacion_campo);
				$("#campo_relacion_nombre").val(datos.campo.relacion_nombre);
				$("#campo_relacion_condicion").val(datos.campo.relacion_condicion);
				$("#campo_relacion_orden").val(datos.campo.relacion_orden);

				$("#campo_relacion_etiqueta_nm").val(datos.campo.relacion_etiqueta_nm);
				$("#campo_relacion_tabla_n").val(datos.campo.relacion_tabla_n);
				$("#campo_relacion_campo_n").val(datos.campo.relacion_campo_n);
				$("#campo_relacion_tabla_m").val(datos.campo.relacion_tabla_m);
				$("#campo_relacion_campo_m_tabla_a").val(datos.campo.relacion_campo_m_tabla_a);
				$("#campo_relacion_campo_m_tabla_b").val(datos.campo.relacion_campo_m_tabla_b);
				$("#campo_relacion_campo_m_prioridad").val(datos.campo.relacion_campo_m_prioridad);
				$("#campo_relacion_campo_nm_condicion").val(datos.campo.relacion_campo_nm_condicion);

				$("table.validaciones tbody").html("");
				var campo_validaciones = "";
				for(var i in datos.campo_validaciones) {
					campo_validaciones += 
						'<tr id="tr_val_'+datos.campo_validaciones[i].id+'">'+
							'<td>'+
								'<div class="btn-group" role="group">'+
									'<button type="button" class="btn btn-default validacion_eliminar" type="button" campos_val_id="'+datos.campo_validaciones[i].id+'"><span class="glyphicon glyphicon-trash" style="color:red;"></span></button>'+
								'</div>'+
							'</td>'+
							'<td>'+
								'<select name="validacion" class="form-control actValidacion" campos_val_id="'+datos.campo_validaciones[i].id+'" id="validacion_sel_'+datos.campo_validaciones[i].id+'">'+
									'<option value="">Seleccione una validacion</option>'+
									validaciones +
								'</select>'+
							'</td>'+
							'<td>'+
								'<input name="parametro" class="form-control actValidacion" type="text" value="'+datos.campo_validaciones[i].parametro+'" campos_val_id="'+datos.campo_validaciones[i].id+'">'+
							'</td>'+
							'<td></td>'+
						'</tr>'+
						'<script>$("#validacion_sel_'+datos.campo_validaciones[i].id+'").val('+datos.campo_validaciones[i].validacion+');</script>';
				}
				$("table.validaciones tbody").append(campo_validaciones);
			}
		});	
	}

	$("#validacion_nuevo").click(function () {
		var tabla = $("#tabla_id").val();
		var campo = $("#campo_id").val();

		$.ajax({
			url: proyVar.base_url + proyVar.admin_path + "/mantenimientos/configuracion/insvalidacion",
			cache: false,
			dataType: "json",
			type: "post",
			data: {"tabla":tabla, "campo":campo, slcnts:tksec},
			success:function(datos) {
				tksec = datos.tksec;
				$("table.validaciones tbody").append(
				'<tr id="tr_val_'+datos.id+'">'+
					'<td>'+
						'<div class="btn-group" role="group">'+
							'<button type="button" class="btn btn-default validacion_eliminar" type="button" campos_val_id="'+datos.id+'"><span class="glyphicon glyphicon-trash" style="color:red;"></span></button>'+
						'</div>'+
					'</td>'+
					'<td>'+
						'<select name="validacion" class="form-control actValidacion" campos_val_id="'+datos.id+'">'+
							'<option value="">Seleccione una validacion</option>'+
							validaciones +
						'</select>'+
					'</td>'+
					'<td>'+
						'<input name="parametro" class="form-control actValidacion" type="text" value="" campos_val_id="'+datos.id+'">'+
					'</td>'+
					'<td></td>'+
				'</tr>');
			}
		});	
	})

	$(document).on("change", ".actValidacion", function () {
		var id = $(this).attr("campos_val_id");
		var valor = $(this).val();
		var campo = $(this).attr("name");
		actValidacion(id, valor, campo);
	})

	$(document).on("keyup", ".actValidacion", function () {
		var id = $(this).attr("campos_val_id");
		var valor = $(this).val();
		var campo = $(this).attr("name");
		actValidacion(id, valor, campo);
	})

	function actValidacion(id, valor, campo) {
		$.ajax({
			url: proyVar.base_url + proyVar.admin_path + "/mantenimientos/configuracion/actvalidacion",
			cache: false,
			dataType: "json",
			type: "post",
			data: {"id":id, "campo":campo, "valor":valor, slcnts:tksec},
			success:function(datos) {
//				tksec = datos.tksec;
			}
		});	
	}

/*
	$(document).on("click", ".validacion_eliminar", function () {
		var id = $(this).attr("campos_val_id");
		$.ajax({
			url: proyVar.base_url + proyVar.admin_path + "/mantenimientos/configuracion/delvalidacion",
			cache: false,
			dataType: "json",
			type: "post",
			data: {"id":id, slcnts:tksec},
			success:function(datos) {
//				tksec = datos.tksec;
				$("#tr_val_").remove();
			}
		});	
	})
*/

	$("#validacion_eliminar").click(function () {
		var id = $(this).attr("cod");
		$.ajax({
			url: proyVar.base_url + proyVar.admin_path + "/mantenimientos/configuracion/delvalidacion",
			cache: false,
			dataType: "json",
			type: "post",
			data: {"id":id, slcnts:tksec},
			success:function(datos) {
//				tksec = datos.tksec;
				$("#tr_val_"+datos).remove();
			}
		});		
	})

// al cargar el campo tambien debe cargar las validaciones
	// siempre toca limpiar esta tabla antes de actualizar para que no acumule


	$("#campo_relacion_tabla").change(function () {
		var campo_relacion_tabla = $("#campo_relacion_tabla").val();
		var campo_relacion_campo = $("#campo_relacion_campo").val();
		//if (campo_relacion_campo == '' || campo_relacion_campo == null) {
			$.ajax({
				url: proyVar.base_url + proyVar.admin_path + "/mantenimientos/configuracion/relacion_campo",
				cache: false,
				dataType: "json",
				type: "post",
				data: {"campo_relacion_tabla":campo_relacion_tabla, slcnts:tksec},
				success:function(datos) {
					var id = $("#campo_id").val();
					$("#campo_relacion_campo").val(datos.relaciones[0].id);
					actDato(id, datos.relaciones[0].id, "relacion_campo");
					$("#campo_relacion_nombre").val(datos.relaciones[0].id);
					actDato(id, datos.relaciones[0].id, "relacion_nombre");
				}
			});	
		//}
	})


});