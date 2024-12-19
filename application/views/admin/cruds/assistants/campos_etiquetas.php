<?php echo form_open(base_url() . 'admin/cruds/assistants/campos_etiquetas_procesar', array('id' => 'forma', 'class' => 'form-horizontal')); ?>

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
			</div>
		</div>

	</div>

	<div class="col-sm-12" id="col2">
		
		<div class="panel panel-primary">
		  <div class="panel-heading" style="font-weight:bold;font-size: 18px;">Campos <button class="btn btn-warning btn-xs" type="button" id="funcionalidades" estado="ver">Funcionalidades</button></div>
		  <div class="panel-body">

			<div class="table-responsive">
			  <table class="table table-striped table-bordered table-hover table-condensed" id="lista">
			    <thead>
			    	<tr>
			    		<th><input type='checkbox' value='' id='selector'></th>
			    		<th>Etiqueta Lista</th>
			    		<th>Comentarios</th>
			    		<th>Tabla</th>
			    		<th>Campo</th>
			    		<th>Tipo Dato</th>
			    		<th>Tamaño</th>
			    	</tr>
			    </thead>
			    <tfoot>
			    	<tr>
			    		<th></th>
			    		<th>Etiqueta Lista</th>
			    		<th>Comentarios</th>
			    		<th>Tabla</th>
			    		<th>Campo</th>
			    		<th>Tipo Dato</th>
			    		<th>Tamaño</th>
			    	</tr>
			    </tfoot>    
			    <tbody>
			<?php	
				foreach ($registros as $key => $reg) {
					echo "<tr>";
					echo "<td>" . '<input type="checkbox" name="seleccion[]" class="seleccion" value="' . $reg['id'] . '">' . "</td>";
					echo "<td>" . $reg['etiqueta_lista'] . "</td>";
					echo "<td>" . $reg['comentarios'] . "</td>";
					echo "<td>" . $reg['nombreTabla'] . "</td>";
					echo "<td>" . $reg['nombre'] . "</td>";
					echo "<td>" . $reg['tipo_dato'] . "</td>";
					echo "<td>" . $reg['tamano'] . "</td>";
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
    	"order": [[ 3, "asc" ]],
    	columnDefs: [{ orderable: false, targets: [0] }],
    	initComplete: function () {
				this.api().columns([1,3,4,5,6]).every( function () {
                var column = this;
                var select = $('<select><option value=\"\"></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value=\"'+d+'\">'+d+'</option>' )
                } );
            } );
        }

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
