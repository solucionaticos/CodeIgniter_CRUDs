<link href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" rel="stylesheet">
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>

<style type="text/css">
	table {
	    border-spacing: collapse;
	    border-spacing: 0;
	}
	td {
	    width: 50px;
	    height: 25px;
	    border: 1px solid black;
	}	
	table tbody tr {
	    cursor: move;
	}
</style>

<?php echo form_open(base_url() . 'admin/cruds/assistants/campos_validaciones_procesar', array('id' => 'forma', 'class' => 'form-horizontal')); ?>

<div class="row">

	<div class="col-sm-3" id="col1">
		<div class="panel panel-primary">
			<div class="panel-heading" style="display:block;height: 47px;">
				<div style="float:left;font-weight:bold;font-size: 18px;">Tablas</div>
			</div>
			<div class="panel-body">
				<select class="form-control" id="tabla">
					<option value="0">Seleccione una Tabla</option>
<?php
foreach ($tablas as $registro) {
?>
					<option value="<?php echo $registro['id']; ?>"><?php echo $registro['nombre']; ?></option>
<?php	
}
?>
				</select>
			</div>
		</div>

		<div class="panel panel-primary">
			<div class="panel-heading" style="display:block;height: 47px;">
				<div style="float:left;font-weight:bold;font-size: 18px;">Copiar etiquetas en...</div>
			</div>
			<div class="panel-body">
				<div class="checkbox">
				  <label><input type="checkbox" checked="checked" id="copiar_lista">Lista</label>
				</div>
				<div class="checkbox">
				  <label><input type="checkbox" checked="checked" id="copiar_nuevo">Nuevo</label>
				</div>
				<div class="checkbox">
				  <label><input type="checkbox" checked="checked" id="copiar_editar">Editar</label>
				</div>
				<div class="checkbox">
				  <label><input type="checkbox" checked="checked" id="copiar_filtros">Filtros</label>
				</div>
			</div>
		</div>

	</div>

	<div class="col-sm-9" id="col2">
		
		<div class="panel panel-primary">
		  <div class="panel-heading" style="font-weight:bold;font-size: 18px;">Campos</div>
		  <div class="panel-body">

			<div class="table-responsive">
			  <table class="table table-striped table-bordered table-hover table-condensed">
			    <thead>
			    	<tr>
			    		<th width="60">Estado</th>
			    		<th width="200">Campo</th>
			    		<th width="500">Campo Etiqueta</th>
			    	</tr>
			    </thead>
			    <tbody id="campos">
			    </tbody>
			  </table>
			</div>

		  </div>
		</div>

	</div>
</div>

</form>

<script type="text/javascript">
$(function() {

	var crud_tabla = <?php echo $crud_tabla; ?>;
	traer_campos(crud_tabla);

	$( "tbody" ).sortable({
		update: function() {
			var orden = '';
			$(".fila").each(function () {
				orden += $(this).attr("cod") + ',';
			});
			orden += '0';

			$.ajax({
				url: "<?php echo base_url(); ?>admin/cruds/assistants/orden_campos",
				cache: false,
				dataType: "json",
				type: "post",
				data: {"orden":orden, "crud":"<?php echo $crud; ?>"}
			});	

		}
	});

	$(document).on("click", ".Ver", function () {
		var id = $(this).attr("cod");
		var fa = $("#icono_" + id).attr("class");
		if (fa == 'fa fa-eye') {
			$("#icono_"+id).attr("class", "fa fa-eye-slash");
			$("#icono_"+id).css("color", "#ff5050");
			actualiza_dato_campos(id, 5, '<?php echo $crud; ?>');	
		} else {
			$("#icono_"+id).attr("class", "fa fa-eye");
			$("#icono_"+id).css("color", "#3598ff");
			actualiza_dato_campos(id, 4, '<?php echo $crud; ?>');
		}
	});

	$(document).on("blur keyup", ".actDatoCampo", function () {
		var id = $(this).attr("cod");
		var valor = $(this).val();
		var campo = $(this).attr("name");
		$(this).css("background","#dcfff4");

		var lista = 0;
		if ($("#copiar_lista").prop("checked")) lista = 1;
		var nuevo = 0;
		if ($("#copiar_nuevo").prop("checked")) nuevo = 1;
		var editar = 0;
		if ($("#copiar_editar").prop("checked")) editar = 1;
		var filtros = 0;
		if ($("#copiar_filtros").prop("checked")) filtros = 1;

		actualiza_dato_campos(id, valor, campo, lista, nuevo, editar, filtros);
	});

	function actualiza_dato_campos(id, valor, campo, lista, nuevo, editar, filtros) {
		$.ajax({
			url: "<?php echo base_url(); ?>admin/cruds/assistants/actualiza_dato_campos",
			cache: false,
			dataType: "json",
			type: "post",
			data: {id, valor, campo, lista, nuevo, editar, filtros}
		});	
	}

	function traer_campos(tabla) {
		$("#campos").html("");
		$("#tabla").val(tabla);
		if (tabla > 0) {
			$.ajax({
				url: "<?php echo base_url(); ?>admin/cruds/assistants/traer_campos",
				cache: false,
				dataType: "json",
				type: "post",
				data: {"tabla":tabla, "crud":"<?php echo $crud; ?>"},
				success:function(datos) {
					var campos = "";
					for(var i in datos.campos) {
					    campos += '<tr class="fila" cod="'+datos.campos[i].id+'">';
					    campos += '	<td>';
					    campos += '		<div class="btn-group" role="group">';

						if (datos.campos[i].<?php echo $crud; ?> == 4) {
							fa_eye = 'fa-eye';
							fa_eye_color = '#3598ff';
						} else {
							fa_eye = 'fa-eye-slash';
							fa_eye_color = '#ff5050';
						} 

						campos += '<button type="button" class="btn btn-default Ver" cod="'+datos.campos[i].id+'">';
						campos += '<i class="fa '+fa_eye+'" aria-hidden="true" style="color: '+fa_eye_color+';" id="icono_'+datos.campos[i].id+'"></i>';
						campos += '</button>';
					    campos += '		</div>';

					    campos += '	</td>';
					    campos += '	<td>';
					    campos += datos.campos[i].nombre;
					    campos += '	</td>';
					    campos += '	<td>';
					    campos += '		<input cod="'+datos.campos[i].id+'" name="etiqueta_<?php echo $crud; ?>" class="form-control actDatoCampo" type="text" value="'+datos.campos[i].etiqueta_<?php echo $crud; ?>+'">';
					    campos += '	</td>';
					    campos += '</tr>';
					}
					$("#campos").html(campos);

				}
			});	
		}
	}

	$("#tabla").change(function () {
		var tabla = Number($("#tabla").val());
		traer_campos(tabla);
	});

});
</script>
