<style type="text/css">
	.ocultar {display: none;}
</style>

<div class="row">
	<div class="col-sm-12" id="col1" style="display:none;">
		<?php echo form_open_multipart(base_url() . 'admin/cruds/assistants/tablas_importar_datos_subir_archivo', array('id' => 'forma')); ?>
			<input type="hidden" name="cod" id="cod" value="0">
			<div class="panel panel-primary">
				<div class="panel-heading" style="display:block;height: 54px;">
					<div style="float:left;font-weight:bold;font-size: 18px;">Subir Archivos</div>
					<div style="float:right;">
						<button class="btn btn-success" type="submit">Guardar</button>
					</div>
				</div>
				<div class="panel-body">
					
					<div class="row">
						<div class="col-sm-12">

						  <div class="form-group mostrar">
						    <label for="archivo">Archivo (CSV, TXT):</label>
						    <input type="file" class="form-control" id="archivo" name="archivo">
						  </div>

						  <div class="form-group ocultar">
						    <label>Archivo (CSV, TXT):</label>
						    <br><span id="archivo_nombre"></span>
						  </div>

						  <div class="form-group">
						    <label for="tabla">Tabla:</label>
						    <select class="form-control" id="tabla" name="tabla">
						    	<option value='0'></option>
								<?php foreach ($tablas as $reg) { ?>
						    	<option value='<?php echo $reg['id']; ?>'><?php echo $reg['nombre']; ?></option>
								<?php } ?>
						    </select>
						  </div>


						  <div class="form-group">
						    <label for="encabezado">Encabezados:</label>
						    <select class="form-control" id="encabezado" name="encabezado">
						    	<option value='1'>Si</option>
						    	<option value='0'>No</option>
						    </select>
						  </div>

						  <div class="form-group">
						    <label for="separador">Separador:</label>
						    <select class="form-control" id="separador" name="separador">
						    	<option value='1'>Coma</option>
						    	<option value='2'>Punto y Coma</option>
						    	<option value='3'>Tabulador</option>
						    </select>
						  </div>

						  <div class="form-group">
						    <label for="calificador_texto">Calificador de Texto:</label>
						    <select class="form-control" id="calificador_texto" name="calificador_texto">
						    	<option value='1'>Ninguno</option>
						    	<option value='2'>Comillas</option>
						    	<option value='3'>Dobles Comillas</option>
						    </select>
						  </div>

						  <div class="form-group">
						    <label for="descripcion">Descripción:</label>
						    <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
						  </div>

						</div>
					</div>
					
				</div>
			</div>

		</form>

	</div>
	<div class="col-sm-12" id="col2">

		<div class="panel panel-primary">
			<div class="panel-heading"><span style="font-weight:bold;font-size: 18px;">Importar Datos.</span> <span style="font-size: 14px;color:#30fff5;"><b>Archivo seleccionado:</b> <?php echo $archivo_nombre; ?></span> <button class="btn btn-warning btn-xs" type="button" id="funcionalidades" estado="ver">Funcionalidades</button></div>



			<div class="panel-body">

				<ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#archivos">Archivos</a></li>
<?php if ($archivo_seleccionado > 0) { ?>
				  <li><a data-toggle="tab" href="#datos">Datos</a></li>
				  <li><a data-toggle="tab" href="#nueva_tabla">Nueva Tabla</a></li>
	<?php if ($tabla_seleccionada_id > 0) { ?>
				  <li><a data-toggle="tab" href="#formulas">Formula</a></li>
	<?php } ?>
<?php } ?>
				</ul>

				<br>

				<div class="tab-content">

				  <div id="archivos" class="tab-pane fade in active">

					<div class="table-responsive">
					  <table class="table table-striped table-bordered table-hover table-condensed" id="lista_1">
					    <thead>
					      <tr>
					        <th>Comandos</th>
					        <th>Archivo</th>
					        <th>Descripción</th>
					        <th>Tabla</th>
					        <th>Encabezados</th>
					        <th>Separador</th>
					        <th>Calificador de Texto</th>
					        <th>Fecha</th>
					      </tr>
					    </thead>
					    <tbody>
<?php
foreach ($importar_datos as $reg) {
	$clase_fila = '';
	if ($archivo_seleccionado == $reg['id']) $clase_fila = 'class="info"'; 
?>
					      <tr <?php echo $clase_fila; ?>>
					        <td>
					        	<a href="<?php echo base_url(); ?>admin/cruds/assistants/tablas_importar_datos_seleccionar_archivo/<?php echo $reg['id']; ?>" class="btn btn-primary btn-xs">Seleccionar</a>&nbsp;
					        	<button type="button" 
					        		cod="<?php echo $reg['id']; ?>" 
					        		tabla="<?php echo $reg['tabla']; ?>" 
					        		encabezado="<?php echo $reg['encabezado']; ?>" 
					        		separador="<?php echo $reg['separador']; ?>" 
					        		calificador_texto="<?php echo $reg['calificador_texto']; ?>" 
					        		archivo_nombre="<?php echo $reg['archivo']; ?>" 
					        		class="btn btn-info btn-xs editar">Editar</button>&nbsp;
					        	<a href="<?php echo base_url(); ?>admin/cruds/assistants/tablas_importar_datos_borrar_archivo/<?php echo $reg['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Clic OK para continuar?')">Borrar</a>
					        </td>
					        <td><?php echo $reg['archivo']; ?></td>
					        <td><?php echo $reg['descripcion']; ?></td>
					        <td><?php echo $reg['tabla_nombre']; ?></td>
					        <td><?php echo $encabezados[$reg['encabezado']]; ?></td>
					        <td><?php echo $separadores[$reg['separador']]; ?></td>
					        <td><?php echo $calificadores_texto[$reg['calificador_texto']]; ?></td>
					        <td><?php echo $reg['fecha']; ?></td>
					      </tr>
<?php	
}
?>
					    </tbody>
					  </table>	
					</div>

				  </div>

				  <div id="datos" class="tab-pane fade">

					<textarea style="width:100%;background-color: black;color: lime;" rows="5"><?php echo $plano; ?></textarea><br><br>

<?php
$mat_campos_nombres = array();
$mat_campos_tipos = array();
$mat_campos_tamanos = array();
if (count($archivo)) {
	$thead = "";
	$tbody = "";
	$nuevos_campos = "";

	if ($encabezado == 0) {
		foreach ($archivo as $key => $filas) {
			if ($key == 0) {
				$thead .= "<tr>";
				$i = 0;
				$k = 0;
				foreach ($filas as $valor) {
					$i++;
					$thead .= "<th>Columna_$i</th>";
					$nuevos_campos .= "	`columna_$i` varchar(100) NOT NULL,
";
					$mat_campos_nombres[$k] = "columna_$i";
					$mat_campos_tamanos[$k] = 0;
					$mat_campos_tipos[$k] = '';
					$k++;
				}
				$thead .= "</tr>";
			} 
			$tbody .= "<tr>";
			$k = 0;
			foreach ($filas as $valor) {
				$tbody .= "<td>$valor</td>";
				$largo_campo = strlen($valor);
				if ($mat_campos_tamanos[$k] < $largo_campo) {
					$mat_campos_tamanos[$k] = $largo_campo;	
				}

				if (trim($valor) != '') {
					if ($mat_campos_tipos[$k] != 'varchar') {
						$campos_tipos = 'varchar';
						if (is_numeric($valor)) {
							$campos_tipos = 'int';
						}
						$mat_campos_tipos[$k] = $campos_tipos;
					}
				}

				$k++;
			}
			$tbody .= "</tr>";
		}
	}

	if ($encabezado == 1) {
		foreach ($archivo as $key => $filas) {
			if ($key == 0) {
				$thead .= "<tr>";
				$k = 0;
				foreach ($filas as $valor) {
					$thead .= "<th>$valor</th>";
					$nuevos_campos .= "	`".texttovar($valor)."` varchar(100) NOT NULL,
";
					$mat_campos_nombres[$k] = texttovar($valor);
					$mat_campos_tamanos[$k] = 0;
					$mat_campos_tipos[$k] = '';
					$k++;
				}
				$thead .= "</tr>";
			} else {
				if (count($filas) > 1) {
					$tbody .= "<tr>";
					$k = 0;
					foreach ($filas as $valor) {
						$tbody .= "<td>$valor</td>";
						$largo_campo = strlen($valor);

						if (!isset($mat_campos_tamanos[$k])) {
							$mat_campos_tamanos[$k] = 0;
						}

						if ($mat_campos_tamanos[$k] < $largo_campo) {
							$mat_campos_tamanos[$k] = $largo_campo;	
						}

						if (trim($valor) != '') {
							if ($mat_campos_tipos[$k] != 'varchar') {
								$campos_tipos = 'varchar';
								if (is_numeric($valor)) {
									$campos_tipos = 'int';
								}
								$mat_campos_tipos[$k] = $campos_tipos;
							}
						}

						$k++;
					}
					$tbody .= "</tr>";
				}
			}
		}
	}

?>
					<div class="table-responsive">
					  <table class="table table-striped table-bordered table-hover table-condensed" id="lista_2">
					    <thead>
						<?php echo $thead; ?>
					    </thead>
					    <tbody>
						<?php echo $tbody; ?>
					    </tbody>
					  </table>	
					</div>
<?php
}
?>
				  </div>


				  <div id="nueva_tabla" class="tab-pane fade">

<?php
if ($tabla_generada == 0) {
?>
						<a href="<?php echo base_url(); ?>admin/cruds/assistants/tablas_importar_datos_crear_tabla/<?php echo $archivo_seleccionado; ?>" class="btn btn-success" onclick="return confirm('Clic OK para continuar?')">Crear Tabla + Campos</a>
						<br><br>
<?php
}
?>

<pre>
<?php 

echo "CREATE TABLE `imp_".$fecha."_" . texttovar($archivo_nombre_sin_extension) . "` (<br>";
echo "    `id` int(11) NOT NULL AUTO_INCREMENT,<br>";
foreach ($mat_campos_nombres as $key => $campo_nombre) {
	$campo_tamano = $mat_campos_tamanos[$key] * 1;
	$campo_tipo = $mat_campos_tipos[$key];
	if ($campo_tipo == '') $campo_tipo = 'varchar';
	if ($campo_tipo == 'varchar') {
		if ($campo_tamano > 0) {
			if ($campo_tamano < 7) {
				$campo_tipo = 'char';
				$campo_tamano = 10;
			} else {
				$campo_tamano = (round($campo_tamano/10))*10+10;
			}
			if ($campo_tamano >= 250) {
				$campo_tipo = 'text';
				$campo_tamano = '';
			}
		} else {
			$campo_tipo = 'char';
			$campo_tamano = 10;
		}
	}
	if ($campo_tipo == 'int') {
		if ($campo_tamano > 10) {
			$campo_tipo = 'varchar';
			$campo_tamano = (round($campo_tamano/10))*10+10;
		} else {
			$campo_tamano = '11';	
		}
	}		
	echo "    `$campo_nombre` $campo_tipo($campo_tamano) NOT NULL,<br>"; 
}
echo "    PRIMARY KEY (`id`) USING BTREE<br>";
echo ") ENGINE=InnoDB CHARSET=utf8;<br>";
?>	
</pre>


				  </div>

				  <div id="formulas" class="tab-pane fade">

					  <div class="row">
					  	<div class="col-sm-4">

							<button class="btn btn-info" id="auto_asignar_campos" type="button">Auto Asignar Campos</button>
							<button class="btn btn-default" id="limpiar_campos" type="button">Limpiar Campos</button>
							<button class="btn btn-warning" id="procesar_formula" type="button">Procesar</button>
							<br><br>

							<input type="hidden" id="tabla_seleccionada_nombre" value="<?php echo $tabla_seleccionada_nombre; ?>">

							<b>Operación: </b> 
							<label class="radio-inline"><input type="radio" name="operacion" value="1" checked>Insertar</label>
							<label class="radio-inline"><input type="radio" name="operacion" value="2">Actualizar</label>
							<label class="radio-inline"><input type="radio" name="operacion" value="3">Eliminar</label>
							<br><br>

							<b>Archivo:</b> <?php echo $archivo_nombre; ?><br>
							<b>Tabla:</b> <?php echo $tabla_seleccionada_nombre; ?><br>

							<div class="table-responsive">
							  <table class="table table-striped table-bordered table-hover table-condensed">
							    <thead>
							      <tr>
							        <th>Cond.</th>
							        <th>Archivo</th>
							        <th>Tabla</th>
							      </tr>
							    </thead>
							    <tbody>

<?php
$filas_campos = '';
if (count($archivo)) {

	$opciones_campos_tabla_seleccionada = '';
	foreach ($campos as $regCampos) {
		$opciones_campos_tabla_seleccionada .= '<option value="'.trim($regCampos['nombre']).'">'.trim($regCampos['nombre']).'</option>';
	}

	if ($encabezado == 0) {
		foreach ($archivo as $key => $filas) {
			if ($key == 0) {
				$i = 0;
				foreach ($filas as $key_filas => $valor) {
					$i++;
					$filas_campos .= "<tr>";
					$filas_campos .= "<td><input type='radio' name='condicion' value='".$key_filas."'></td>";
					$filas_campos .= "<td>Columna_$i</td>";
					$filas_campos .= "<td>";
					$filas_campos .= "<select class='form-control campo_formula' origen='Columna_$i' id='cf_".$key_filas."' cod='".$key_filas."' destino='".texttovar($valor)."'>";
					$filas_campos .= "<option value=''></option>";
					$filas_campos .= $opciones_campos_tabla_seleccionada;
					$filas_campos .= "</select>";
					$filas_campos .= "</td>";
					$filas_campos .= "</tr>";
				}
			} else {
				break;
			} 
		}
	}

	if ($encabezado == 1) {
		foreach ($archivo as $key => $filas) {
			if ($key == 0) {
				foreach ($filas as $key_filas => $valor) {
					$valor = str_replace("'", " ", $valor);
					$filas_campos .= "<tr>";
					$filas_campos .= "<td><input type='radio' name='condicion' value='".$key_filas."'></td>";
					$filas_campos .= "<td>".$valor."</td>";
					$filas_campos .= "<td>";
					$filas_campos .= "<select class='form-control campo_formula' origen='".$valor."' id='cf_".$key_filas."' cod='".$key_filas."' destino='".texttovar($valor)."'>";
					$filas_campos .= "<option value=''></option>";
					$filas_campos .= $opciones_campos_tabla_seleccionada;
					$filas_campos .= "</select>";
					$filas_campos .= "</td>";
					$filas_campos .= "</tr>";
				}
			} else {
				break;
			}
		}
	}
}
echo $filas_campos;
?>
							    </tbody>
							  </table>	
							</div>
					  		
					  	</div>
					  	<div class="col-sm-8">

							<?php echo form_open(base_url() . 'admin/cruds/assistants/tablas_importar_datos_guardar_generar_formulas', array('id' => 'forma_2')); ?>
 						        <input type="hidden" name="archivo_seleccionado" value="<?php echo $archivo_seleccionado; ?>">

								<ul class="nav nav-tabs">
								  <li class="active"><a data-toggle="tab" href="#code">Código PHP</a></li>
								  <li><a data-toggle="tab" href="#sqls">SQLs</a></li>
								</ul>

								<br>

								<div class="tab-content">
								  <div id="code" class="tab-pane fade in active">
								  	<div class="row">
								  		<div class="col-md-6">
										  <div class="form-group">
										  	<label for="algoritmo">Fórmula:</label>
										    <textarea class="form-control" id="algoritmo" name="algoritmo" placeholder="Ingresa el código" rows="20" style="width:100%;"><?php echo $algoritmo; ?></textarea>
										  </div>
								  		</div>
								  		<div class="col-md-6">
										  <div class="form-group">
										  	<label for="algoritmo_generado">Generado:</label>
										    <textarea class="form-control" id="algoritmo_generado" name="algoritmo_generado" placeholder="Ingresa el código" rows="20" style="width:100%;"><?php echo $algoritmo_generado; ?></textarea>
										  </div>
								  		</div>
								  	</div>
								  </div>
								  <div id="sqls" class="tab-pane fade">
								  	<div class="row">
								  		<div class="col-md-6">
										  <div class="form-group">
										  	<label for="sql">Fórmula:</label>
										    <textarea class="form-control" id="sql" name="sql" placeholder="Ingresa el SQL" rows="20" style="width:100%;"><?php echo $sql; ?></textarea>
										  </div>
								  		</div>
								  		<div class="col-md-6">
										  <div class="form-group">
										  	<label for="sql_generado">Generado:</label>
										    <textarea class="form-control" id="sql_generado" name="sql_generado" placeholder="Ingresa el SQL" rows="20" style="width:100%;"><?php echo $sql_generado; ?></textarea>
										  </div>
								  		</div>
								  	</div>
								  </div>
								  <button type="submit" class="btn btn-success">Guardar + Generar</button>

								</div>				  

							</form>

					  	</div>
					  </div>

				  </div>


				</div>

			</div>
		</div>

	</div>
</div>

<script type="text/javascript">
	
$(function () {

	$("#auto_asignar_campos").click(function () {
		$(".campo_formula").each(function () {
			var destino = $(this).attr("destino");
			$(this).val(destino);
		});	
	});

	$("#limpiar_campos").click(function () {
		$('#algoritmo').val('');
		$('#algoritmo_generado').val('');
		$('#sql').val('');
		$('#sql_generado').val('');
	});	

	$('#procesar_formula').click(function () {
		var algoritmo = '';
		var sql_formula = '';
		var origen = '';
		var destino = '';
		var alg = '';
		var sql = '';
		var where = '';
		var tabla_seleccionada_nombre = $('#tabla_seleccionada_nombre').val();
		var operacion = $('input:radio[name=operacion]:checked').val();
		var condicion = $('input:radio[name=condicion]:checked').val();
		var condicion_id = '';
		var cod = '';

		if (operacion == '1') {
			$('.campo_formula').each(function () {
				destino = $(this).val();
				if (destino != '') {
					origen = $(this).attr('origen');
					alg += "	'"+destino+"' => $reg[<<"+origen+">>], " + "\n";
					if (sql != '') sql += ", " + "\n"; 
					sql += "	" + destino + " = '<<" + origen + ">>'";
				}
			});


			algoritmo = "$data = array(" + "\n";
			algoritmo += alg;
			algoritmo += ");" + "\n";

			algoritmo = algoritmo + "$this->Model->insert('" + tabla_seleccionada_nombre + "', $data);";
			sql_formula = 'INSERT INTO ' + tabla_seleccionada_nombre + ' SET ' + "\n" + sql + ';';
		}

		if (operacion == '2') {
			$('.campo_formula').each(function () {
				destino = $(this).val();
				if (destino != '') {
					cod = $(this).attr('cod');
					origen = $(this).attr('origen');
					if (cod != condicion) {
						alg += "	'"+destino+"' => $reg[<<"+origen+">>], " + "\n";
						if (sql != '') sql += ", " + "\n"; 
						sql += "	" + destino + " = '<<" + origen + ">>'";
					} else {
						condicion_id = "$reg[<<"+origen+">>]";
						where = "	" + destino + " = '<<" + origen + ">>'";
					}
				}
			});

			algoritmo = "$data = array(" + "\n";
			algoritmo += alg;
			algoritmo += ");" + "\n";

			algoritmo = algoritmo + "$this->Model->update('" + tabla_seleccionada_nombre + "', $data, " + condicion_id + ");";
			sql_formula = 'UPDATE ' + tabla_seleccionada_nombre + ' SET ' + "\n" + sql + "\n" + ' WHERE ' + "\n" + where + ';';
		}

		if (operacion == '3') {

			$('.campo_formula').each(function () {
				destino = $(this).val();
				if (destino != '') {
					cod = $(this).attr('cod');
					origen = $(this).attr('origen');
					if (cod == condicion) {
						condicion_id = "$reg[<<"+origen+">>]";
						where = "	" + destino + " = '<<" + origen + ">>'";
					}
				}
			});


			algoritmo = algoritmo + "$this->Model->delete('" + tabla_seleccionada_nombre + "', " + condicion_id + ");";
			sql_formula = 'DELETE FROM ' + tabla_seleccionada_nombre + ' WHERE ' + "\n" + where + ';';
		}

		$('#algoritmo').val(algoritmo);
		$('#sql').val(sql_formula);

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
			$('#cod').val('0');
    		$('#tabla').val('0');
	    	$('#encabezado').val('1');
	    	$('#separador').val('1');
	    	$('#calificador_texto').val('1');
			$('.mostrar').css('display', 'block');
			$('.ocultar').css('display', 'none');
		}
	});

    $('#lista_1').DataTable({
    	"paging": false,
    	"order": [[ 7, "desc" ]],
    	columnDefs: [{ orderable: false, targets: [0] }]
    });

    $('#lista_2').DataTable({
    	"order": [[ 0, "asc" ]]
    });


    $('.editar').click(function () {
		$('#col1').attr('class', 'col-sm-3');
		$('#col2').attr('class', 'col-sm-9');
		$('#funcionalidades').attr('estado', 'ocultar');
		$('#col1').fadeIn('slow');

		$('.mostrar').css('display', 'none');
		$('.ocultar').css('display', 'block');

    	var cod = $(this).attr("cod");
    	$('#cod').val(cod);

    	var archivo_nombre = $(this).attr("archivo_nombre");
    	$('#archivo_nombre').html(archivo_nombre);

    	var tabla = $(this).attr("tabla");
    	$('#tabla').val(tabla);

    	var encabezado = $(this).attr("encabezado");
    	$('#encabezado').val(encabezado);

    	var separador = $(this).attr("separador");
    	$('#separador').val(separador);

    	var calificador_texto = $(this).attr("calificador_texto");
    	$('#calificador_texto').val(calificador_texto);

    });

});

</script>
