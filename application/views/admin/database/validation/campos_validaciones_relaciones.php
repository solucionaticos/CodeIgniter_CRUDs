<?php
function searcharray($value, $array, $key, $field) {
   foreach ($array as $k => $val) {
       if ($val[$key] == $value) {
           return $val[$field];
       }
   }
   return null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Campos Validaciones Relaciones 1-n</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>

</head>
<body>
<div class="container-fluid">

<div class="jumbotron">
	<h1>Campos Validaciones Relaciones 1-n</h1>
</div>

<?php echo form_open(base_url() . 'admin/database/validations/campos_validaciones_relaciones_actualizar', array('id' => 'forma', 'class' => 'form-horizontal')); ?>

<input type="hidden" name="proyecto" value="<?php echo $proyecto; ?>">
<input type="hidden" name="version" value="<?php echo $version; ?>">


<div class="row">
	<div class="col-sm-3">
		
		<div class="panel panel-primary">

			<div class="panel-heading" style="display:block;height: 54px;">
				<div style="float:left;font-weight:bold;font-size: 24px;">Proyecto + Versión</div>
				<div style="float:right;">
					<button class="btn btn-success">Copiar de...</button>
				</div>
			</div>

		  <div class="panel-body">

		  	<div class="row">
		  		<div class="col-sm-12">
					<label class="control-label" for="copiar_proyecto">Proyecto:</label><br>
					<input type="text" class="form-control" name="copiar_proyecto" id="copiar_proyecto">
		  		</div>
		  		<div class="col-sm-12">
					<label class="control-label" for="copiar_version">Versión:</label><br>
					<input type="text" class="form-control" name="copiar_version" id="copiar_version">
		  		</div>
		  	</div>

		  </div>
		</div>

	</div>
	<div class="col-sm-9">
		


		<div class="panel panel-primary">

			<div class="panel-heading" style="display:block;height: 54px;">
				<div style="float:left;font-weight:bold;font-size: 24px;">Relaciones</div>
				<div style="float:right;">
					<button class="btn btn-success">Actualizar</button>
				</div>
			</div>


		  <div class="panel-body">

		  	<div class="row">

		  		<div class="col-sm-4">
					<label class="control-label" for="r_tabla">R Tabla:</label><br>
					<select name="r_tabla" id="r_tabla" class="form-control">
						<option value=""></option>
					<?php
					foreach ($tablas as $registro) {
					?>
						<option value="<?=$registro['id'];?>"><?=$registro['nombre'];?></option>
					<?php
					}
					?>
					</select>
		  		</div>
		  		<div class="col-sm-4">
					<label class="control-label" for="r_campo">R Campo:</label><br>
					<select name="r_campo" id="r_campo" class="form-control">
						<option value=""></option>
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
		  		<div class="col-sm-4">
					<label class="control-label" for="r_nombre">R Nombre:</label><br>
					<select name="r_nombre" id="r_nombre" class="form-control">
						<option value=""></option>
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
		  	</div>

		  	<div class="row">
		  		<div class="col-sm-4">
					<label class="control-label" for="r_datos">R Datos:</label><br>
					<select name="r_datos" id="r_datos" class="form-control">
						<option value=""></option>
					<?php
					foreach ($datos as $registro) {
					?>
						<option value="<?=$registro['id'];?>"><?=$registro['nombre'];?></option>
					<?php
					}
					?>
					</select>
		  		</div>
		  		<div class="col-sm-4">
					<label class="control-label" for="r_condicion">R Condición:</label><br>
					<input type="text" class="form-control" name="r_condicion" id="r_condicion">
		  		</div>
		  		<div class="col-sm-4">
					<label class="control-label" for="r_orden">R Orden:</label><br>
					<input type="text" class="form-control" name="r_orden" id="r_orden">
		  		</div>
		  	</div>


		  </div>
		</div>



	</div>
</div>





<div class="panel panel-primary">
  <div class="panel-heading" style="font-weight:bold;font-size: 24px;">Campos</div>
  <div class="panel-body">

<div class="table-responsive">
  <table class="table table-striped table-bordered table-hover table-condensed" id="lista">
    <thead>
    	<tr>
    		<th><input type='checkbox' value='' id='selector'></th>
    		<th>Tabla</th>
    		<th>Campo</th>
    		<th>R Datos</th>
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
    		<th>R Datos</th>
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
		echo "<tr>";

		echo "<td>" . '<input type="checkbox" name="seleccion[]" class="seleccion" value="' . $reg['id'] . '">' . "</td>";


		echo "<td>" . $reg['nombreTabla'] . "</td>";
		echo "<td>" . $reg['nombre'] . "</td>";

		$relacion_datos = '';
		if ($reg['relacion_datos'] > 0) {
			$relacion_datos = searcharray($reg['relacion_datos'], $datos, 'id', 'nombre');
		}
		echo "<td>" . $relacion_datos . "</td>";

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

</form>

<script type="text/javascript">
$(document).ready(function() {
    $('#lista').DataTable({
    	"paging": false,
    	"order": [[ 1, "asc" ]],
    	columnDefs: [{ orderable: false, targets: [0] }],
    	initComplete: function () {
				this.api().columns([1,2,3,4,5,6,7,8]).every( function () {
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


} );
</script>

</div>
</body>
</html>
