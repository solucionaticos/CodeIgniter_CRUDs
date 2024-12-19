<?php echo form_open(base_url() . 'admin/cruds/assistants/campos_relaciones_1n_procesar', array('id' => 'forma', 'class' => 'form-horizontal')); ?>

<div class="row">
	<div class="col-sm-12" id="col1" style="display:none;">

		<div class="panel panel-primary">

			<div class="panel-heading" style="display:block;height: 54px;">
				<div style="float:left;font-weight:bold;font-size: 18px;">Relaciones</div>
				<div style="float:right;">
					<button class="btn btn-success" type="submit">Actualizar</button>
				</div>
			</div>

		  <div class="panel-body">

		  	<div class="row">
		  		<div class="col-sm-12">
					<label class="control-label" for="r_tabla">R Tabla:</label><br>
					<select name="r_tabla" id="r_tabla" class="form-control">
						<option value="0"></option>
					<?php
					foreach ($tablas as $registro) {
					?>
						<option value="<?=$registro['id'];?>"><?=$registro['nombre'];?></option>
					<?php
					}
					?>
					</select>
		  		</div>

		  		<div class="col-sm-12">
					<label class="control-label" for="r_campo">R Campo:</label><br>
					<select name="r_campo" id="r_campo" class="form-control">
						<option value="0"></option>
		<?php
		foreach ($tablas as $registroTab) {
		?>
		                <optgroup label="<?=$registroTab['nombre'];?>">
		<?php
		  foreach ($campos as $registroCam) {
		    if ($registroTab['id'] == $registroCam['tabla']) {
		?>
			                <option value="<?=$registroCam['id']?>"><?=$registroCam['nombre']?></option>
		<?php
		    }
		  }
		?>
		                </optgroup>
		<?php
		}
		?>
					</select>
		  		</div>

		  		<div class="col-sm-12">
					<label class="control-label" for="r_nombre">R Nombre:</label><br>
					<select name="r_nombre" id="r_nombre" class="form-control">
						<option value="0"></option>
		<?php
		foreach ($tablas as $registroTab) {
		?>
		                <optgroup label="<?=$registroTab['nombre'];?>">
		<?php
		  foreach ($campos as $registroCam) {
		    if ($registroTab['id'] == $registroCam['tabla']) {
		?>
			                <option value="<?=$registroCam['id']?>"><?=$registroCam['nombre']?></option>
		<?php
		    }
		  }
		?>
		                </optgroup>
		<?php
		}
		?>
					</select>
		  		</div>

		  		<div class="col-sm-12">
					<label class="control-label" for="r_condicion">R Condición:</label><br>
					<input type="text" class="form-control" name="r_condicion" id="r_condicion">
		  		</div>

		  		<div class="col-sm-12">
					<label class="control-label" for="r_orden">R Orden:</label><br>
					<input type="text" class="form-control" name="r_orden" id="r_orden">
		  		</div>
		  	</div>

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
			    		<th>Tabla</th>
			    		<th>Campo</th>
			    		<th>R Tabla</th>
			    		<th>R Campo</th>
			    		<th>R Nombre</th>
			    		<th>R Condición</th>
			    		<th>R Orden</th>
			    	</tr>
			    </thead>
			    <tfoot>
			    	<tr>
			    		<th></th>
			    		<th>Tabla</th>
			    		<th>Campo</th>
			    		<th>R Tabla</th>
			    		<th>R Campo</th>
			    		<th>R Nombre</th>
			    		<th>R Condición</th>
			    		<th>R Orden</th>
			    	</tr>
			    </tfoot>    
			    <tbody>
			<?php	
				foreach ($registros as $key => $reg) {
					if ($reg['relacion_tabla'] > 0) {
						echo "<tr class='bg-teal color-palette'>";
					} else {
						echo "<tr>";
					}

					echo "<td>" . '<input type="checkbox" name="seleccion[]" class="seleccion" value="' . $reg['id'] . '">' . "</td>";


					echo "<td>" . $reg['nombreTabla'] . "</td>";
					echo "<td>" . $reg['nombre'] . "</td>";

					$relacion_tabla = '';
					if ($reg['relacion_tabla'] > 0) {
						$relacion_tabla = searcharray($reg['relacion_tabla'], $tablas, 'id', 'nombre');
					}
					echo "<td>" . $relacion_tabla . "</td>";

					$relacion_campo = '';
					if ($reg['relacion_campo'] > 0) {
						$relacion_campo = searcharray($reg['relacion_campo'], $campos, 'id', 'nombre');
					}
					echo "<td>" . $relacion_campo . "</td>";

					$relacion_nombre = '';
					if ($reg['relacion_nombre'] > 0) {
						$relacion_nombre = searcharray($reg['relacion_nombre'], $campos, 'id', 'nombre');
					}
					echo "<td>" . $relacion_nombre . "</td>";

					echo "<td>" . $reg['relacion_condicion'] . "</td>";
					echo "<td>" . $reg['relacion_orden'] . "</td>";

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
    	"order": [[ 1, "asc" ]],
    	columnDefs: [{ orderable: false, targets: [0] }],
    	initComplete: function () {
				this.api().columns([1,2,3,4,5,6,7]).every( function () {
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

	$("#r_tabla").change(function () {
		var r_tabla = $("#r_tabla").val();
		$.ajax({
			url: "<?php echo base_url(); ?>admin/database/validations/relacion_campo",
			cache: false,
			dataType: "json",
			type: "post",
			data: {"campo_relacion_tabla":r_tabla},
			success:function(datos) {
				$("#r_campo").val(datos.relaciones[0].id);
				$("#r_nombre").val(datos.relaciones[0].id);
			}
		});	
	})

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
