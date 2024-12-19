<?php echo form_open(base_url() . 'admin/cruds/assistants/versiones_copiar_tablas_procesar', array('id' => 'forma', 'class' => 'form-horizontal')); ?>

<div class="row">
	<div class="col-sm-12" id="col1" style="display:none;">

		<div class="panel panel-primary">

			<div class="panel-heading" style="display:block;height: 54px;">
				<div style="float:left;font-weight:bold;font-size: 18px;">Proyecto + Versión</div>
				<div style="float:right;">
					<button class="btn btn-success" type="button" id="ver_tablas">Ver Tablas</button>
				</div>
			</div>
			<div class="panel-body">

				<div class="row" style="margin-top: 15px;margin-bottom: 5px;">
					<div class="col-sm-12">
						<label class="control-label col-sm-2" for="proyecto">Proyecto:</label>
						<div class="col-sm-10">
							<select class="form-control" name="proyecto" id="proyecto">
								<option value="0"></option>
<?php
foreach ($proyectos as $reg1) {
?>
								<option value="<?php echo $reg1['id']; ?>"><?php echo $reg1['nombre']; ?></option>
<?php
}
?>
							</select>
						</div>
					</div>
				</div>

				<div class="row" style="margin-top: 5px;margin-bottom: 5px;">
					<div class="col-sm-12">
						<label class="control-label col-sm-2" for="version">Versión:</label>
						<div class="col-sm-10">
							<select class="form-control" name="version" id="version">
								<option value="0"></option>
							</select>
						</div>
					</div>
				</div>

			</div>
		</div>

		<div id="filas_tablas"></div>

	</div>

	<div class="col-sm-12" id="col2">
		
		<?php echo $resultado; ?>
		<div class="panel panel-primary">
		  <div class="panel-heading" style="font-weight:bold;font-size: 18px;">Tablas <button class="btn btn-warning btn-xs" type="button" id="funcionalidades" estado="ver">Funcionalidades</button></div>
		  <div class="panel-body">

<?php
if ( count($registros) > 0 ) {
?>
<div style="padding-bottom: 10px;">
	<button type="submit" class="btn btn-danger">Eliminar</button>
</div>

<?php
}
?>

			<div class="table-responsive">
			  <table class="table table-striped table-bordered table-hover table-condensed" id="lista2">
			    <thead>
			    	<tr>
			    		<th><input type='checkbox' value='' id='selector2'></th>
			    		<th>Nombre</th>
			    		<th>Etiqueta</th>
			    	</tr>
			    </thead>
			    <tfoot>
			    	<tr>
			    		<th></th>
			    		<th>Nombre</th>
			    		<th>Etiqueta</th>
			    	</tr>
			    </tfoot>    
			    <tbody>
			<?php	
				$tablas = '';
				foreach ($registros as $key => $reg) {
					echo "<tr>";
					echo "<td>" . '<input type="checkbox" name="seleccion2[]" class="seleccion2" value="' . $reg['id'] . '">' . "</td>";
					echo "<td>" . $reg['nombre'] . "</td>";
					echo "<td>" . $reg['etiqueta'] . "</td>";
					echo "</tr>";
					$tablas .= '"' . $reg['nombre'] . '",';
				}
				$tablas = substr($tablas, 0, -1);
			?>
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

	var tablas = ["",<?php echo $tablas; ?>]; 

    $('#lista').DataTable({
    	"paging": false,
    	"order": [[ 1, "asc" ]],
    	columnDefs: [{ orderable: false, targets: [0] }]
    });

	$(document).on('change', '#selector1', function () {
		if( $('#selector1').prop('checked') ) {
		    $('.seleccion1').each(function () {
			    if (!$(this).attr('disabled')) {
				    $(this).prop('checked', true);
				}
		    });
		} else {
		    $('.seleccion1').each(function () {
			    $(this).prop('checked', false);
		    });
		}
	});

	$(document).on('change', '#selector2', function () {
		if( $('#selector2').prop('checked') ) {
		    $('.seleccion2').each(function () {
			    if (!$(this).attr('disabled')) {
				    $(this).prop('checked', true);
				}
		    });
		} else {
		    $('.seleccion2').each(function () {
			    $(this).prop('checked', false);
		    });
		}
	});

	$('#funcionalidades').click(function () {
		var estado = $('#funcionalidades').attr('estado');
		if (estado == 'ocultar') {
			$('#col1').fadeOut('fast', function() {
				$('#col1').attr('class', 'col-sm-12');
				$('#col2').attr('class', 'col-sm-12');
				$('#funcionalidades').attr('estado', 'ver');
			});
		}
		if (estado == 'ver') {
			$('#col1').attr('class', 'col-sm-6');
			$('#col2').attr('class', 'col-sm-6');
			$('#funcionalidades').attr('estado', 'ocultar');
			$('#col1').fadeIn('slow');
		}
	});

	$("#proyecto").change(function () {
		var proyecto = $("#proyecto").val();
		$("#version").html('<option>Cargando...</option>');
		$.ajax({
			url: "<?php echo base_url(); ?>admin/cruds/assistants/traer_version",
			cache: false,
			dataType: "json",
			type: "post",
			data: {"proyecto":proyecto},
			success:function(datos) {
				var versiones = '';
				for(var i in datos.versions) {
				    versiones += '<option value="'+datos.versions[i].id+'">'+datos.versions[i].nombre+'</option>';
				}
				$("#version").html(versiones);
			}
		});	
	});

	$('#ver_tablas').click(function () {
		var proyecto = $('#proyecto').val();
		var version = $('#version').val();
		var existe = '';
		var indice = 0;
		$.ajax({
			url: "<?php echo base_url(); ?>admin/cruds/assistants/traer_tablas",
			cache: false,
			dataType: "json",
			type: "post",
			data: {proyecto, version},
			success:function(datos) {
				var filas_tablas = '';

				filas_tablas += '		<div class="panel panel-primary">';
				filas_tablas += '			<div class="panel-heading" style="display:block;height: 54px;">';
				filas_tablas += '				<div style="float:left;font-weight:bold;font-size: 18px;">Tablas</div>';
				filas_tablas += '				<div style="float:right;">';
				filas_tablas += '					<button class="btn btn-success" type="submit">Copiar Tablas</button>';
				filas_tablas += '				</div>';
				filas_tablas += '			</div>';
				filas_tablas += '			<div class="panel-body">';
				filas_tablas += '				<div class="table-responsive">';
				filas_tablas += '				  <table class="table table-striped table-bordered table-hover table-condensed" id="lista1">';
				filas_tablas += '				    <thead>';
				filas_tablas += '				    	<tr>';
				filas_tablas += '				    		<th><input type=\"checkbox\" value=\"\" id=\"selector1\"></th>';
				filas_tablas += '				    		<th>Nombre</th>';
				filas_tablas += '				    		<th>Etiqueta</th>';
				filas_tablas += '				    		<th>Existe</th>';
				filas_tablas += '				    	</tr>';
				filas_tablas += '				    </thead>';
				filas_tablas += '				    <tfoot>';
				filas_tablas += '				    	<tr>';
				filas_tablas += '				    		<th></th>';
				filas_tablas += '				    		<th>Nombre</th>';
				filas_tablas += '				    		<th>Etiqueta</th>';
				filas_tablas += '				    		<th>Existe</th>';
				filas_tablas += '				    	</tr>';
				filas_tablas += '				    </tfoot>';  
				filas_tablas += '				    <tbody>';
				for(var i in datos.tablas) {
				    filas_tablas += '<tr>';
				    filas_tablas += '<td><input type=\"checkbox\" name=\"seleccion1[]\" class=\"seleccion1\" value=\"' + datos.tablas[i].id + '\"></td>';
				    filas_tablas += '<td>'+datos.tablas[i].nombre+'</td>';
				    filas_tablas += '<td>'+datos.tablas[i].etiqueta+'</td>';

					indice = tablas.indexOf(datos.tablas[i].nombre);
					if (indice > 0) {
						existe = "Si";
					} else {
						existe = "No";
					}

				    filas_tablas += '<td>'+existe+'</td>';
				    filas_tablas += '</tr>';
				}
				filas_tablas += '				    </tbody>';
				filas_tablas += '				  </table>';
				filas_tablas += '				</div>';
				filas_tablas += '			</div>';
				filas_tablas += '		</div>';

				$("#filas_tablas").html(filas_tablas);
			}
		});	
	});

	$('#forma').submit(function() {
	    var c = confirm("Clic OK para continuar?");
	    return c; //you can just return c because it will be true or false
	});

});
</script>
