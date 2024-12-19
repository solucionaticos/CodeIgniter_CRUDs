<?php echo form_open(base_url() . 'admin/cruds/assistants/tablas_etiquetas_notas_procesar', array('id' => 'forma', 'class' => 'form-horizontal')); ?>

<div class="row">
	<div class="col-sm-12" id="col1" style="display:none;">

		<div class="panel panel-primary">

			<div class="panel-heading" style="display:block;height: 54px;">
				<div style="float:left;font-weight:bold;font-size: 18px;">Etiqueta</div>
				<div style="float:right;">
					<button class="btn btn-success" type="submit">Actualizar</button>
				</div>
			</div>
			<div class="panel-body">
				<input type="text" name="etiqueta" class="form-control" placeholder="Etiqueta">
				<textarea name="comentarios" class="form-control" placeholder="Comentarios"></textarea>
				<textarea name="antes_insertar" class="form-control" placeholder="Antes de insertar"></textarea>
				<textarea name="antes_actualizar" class="form-control" placeholder="Antes de actualizar"></textarea>
				<textarea name="antes_eliminar" class="form-control" placeholder="Antes de eliminar"></textarea>
				<textarea name="despues_insertar" class="form-control" placeholder="Después de insertar"></textarea>
				<textarea name="despues_actualizar" class="form-control" placeholder="Después de actualizar"></textarea>
				<textarea name="despues_eliminar" class="form-control" placeholder="Después de eliminar"></textarea>
			</div>
		</div>

	</div>

	<div class="col-sm-12" id="col2">
		
		<div class="panel panel-primary">
		  <div class="panel-heading" style="font-weight:bold;font-size: 18px;">Tablas <button class="btn btn-warning btn-xs" type="button" id="funcionalidades" estado="ver">Funcionalidades</button></div>
		  <div class="panel-body">

			<div class="table-responsive">
			  <table class="table table-striped table-bordered table-hover table-condensed" id="lista">
			    <thead>
			    	<tr>
			    		<th><input type='checkbox' value='' id='selector'></th>
			    		<th>Id</th>
			    		<th>Nombre</th>
			    		<th>Etiqueta</th>

			    		<th>PK</th>

			    		<th>Comentarios</th>
			    		<th>Antes de Insertar</th>
			    		<th>Antes de Actualizar</th>
			    		<th>Antes de Eliminar</th>
			    		<th>Después de Insertar</th>
			    		<th>Después de Actualizar</th>
			    		<th>Después de Eliminar</th>
			    	</tr>
			    </thead>
			    <tfoot>
			    	<tr>
			    		<th></th>
			    		<th>Id</th>
			    		<th>Nombre</th>
			    		<th>Etiqueta</th>

			    		<th>PK</th>

			    		<th>Comentarios</th>
			    		<th>Antes de Insertar</th>
			    		<th>Antes de Actualizar</th>
			    		<th>Antes de Eliminar</th>
			    		<th>Después de Insertar</th>
			    		<th>Después de Actualizar</th>
			    		<th>Después de Eliminar</th>
			    	</tr>
			    </tfoot>    
			    <tbody>
			<?php	
				foreach ($registros as $key => $reg) {

					$pk = '';
					if (isset($mat_pks[$reg['id']])) {
						$pk = $mat_pks[$reg['id']];
					}

					echo "<tr>";
					echo "<td>" . '<input type="checkbox" name="seleccion[]" class="seleccion" value="' . $reg['id'] . '">' . "</td>";
					echo "<td>" . $reg['id'] . "</td>";
					echo "<td>" . $reg['nombre'] . "</td>";
					echo "<td>" . $reg['etiqueta'] . "</td>";

					echo "<td>" . $pk . "</td>";

					echo "<td>" . $reg['comentarios'] . "</td>";
					echo "<td>" . $reg['antes_insertar'] . "</td>";
					echo "<td>" . $reg['antes_actualizar'] . "</td>";
					echo "<td>" . $reg['antes_eliminar'] . "</td>";
					echo "<td>" . $reg['despues_insertar'] . "</td>";
					echo "<td>" . $reg['despues_actualizar'] . "</td>";
					echo "<td>" . $reg['despues_eliminar'] . "</td>";
					echo "</tr>";
				}
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
    $('#lista').DataTable({
    	"paging": false,
    	"order": [[ 2, "asc" ]],
    	columnDefs: [
    		{ orderable: false, targets: [0] },
    		{ orderable: false, targets: [5] },
    		{ orderable: false, targets: [6] },
    		{ orderable: false, targets: [7] },
    		{ orderable: false, targets: [8] },
    		{ orderable: false, targets: [9] },
    		{ orderable: false, targets: [10] },
    		{ orderable: false, targets: [11] }]
    });


	$(document).on('change', '#selector', function () {
		if( $('#selector').prop('checked') ) {
		    $('.seleccion').each(function () {
			    if (!$(this).attr('disabled')) {
				    $(this).prop('checked', true);
				}
		    });
		} else {
		    $('.seleccion').each(function () {
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
			$('#col1').attr('class', 'col-sm-3');
			$('#col2').attr('class', 'col-sm-9');
			$('#funcionalidades').attr('estado', 'ocultar');
			$('#col1').fadeIn('slow');
		}
	});


} );
</script>
