<div class="panel panel-primary">
	<div class="panel-heading"><b>CRUDs</b></div>
	<div class="panel-body">

		<?php echo form_open(base_url() . 'admin/cruds/assistants/tablas_ver_cruds_seleccionar_tabla', array()); ?>
		<div class="input-group">
			<select class="form-control" id="tabla" name="tabla">
				<option value="0">Selecciona la tabla</option>
				<?php
				foreach ($tablas as $regTabla) {
					$seleccionado = '';
					if ($tabla_seleccionada == $regTabla['id']) $seleccionado = " selected='selected'";
					echo "<option value='".$regTabla['id']."'".$seleccionado.">".$regTabla['etiqueta']." (".$regTabla['nombre'].")</option>";
				}
				?>
			</select>
			<div class="input-group-btn">
				<button class="btn btn-success" type="submit">Seleccionar</button>
			</div>
		</div>
		</form>
		<br>

		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#lista">Lista</a></li>
			<li><a data-toggle="tab" href="#nuevo">Nuevo</a></li>
			<li><a data-toggle="tab" href="#editar">Editar</a></li>
			<li><a data-toggle="tab" href="#filtros">Filtros</a></li>
		</ul>
		<br>

		<div class="tab-content">
			<div id="lista" class="tab-pane fade in active">
<?php
if (count($lista_etiquetas)) {
?>
				<h3>{tabla_etiqueta}</h3>
				<div class="panel panel-default">
					<div class="panel-heading"><b>Lista de Registros</b></div>
					<div class="panel-body">
						<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus text-success"></span> <span class="text-success">Nuevo registro</span></button>
						<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-trash text-danger"></span> <span class="text-danger">Eliminar</span></button>
						<div class="table-responsive">
							<table id="lista" class="table table-bordered table-striped dataTable">
								<thead>
									<tr>
										<th style="width: 35px;"><input type="checkbox" id="selectAll"></th>
										<th style="width: 35px;"></th>
										<th style="width: 35px;"></th>
<?php
	foreach ($lista_etiquetas as $campos) {
?>
										<th><?php echo $campos['etiqueta_lista']; ?></th>
<?php
	}
?>
									</tr>
								</thead>

								<tfoot>
									<tr>
										<th style="width: 35px;"></th>
										<th style="width: 35px;"></th>
										<th style="width: 35px;"></th>
<?php
	foreach ($lista_etiquetas as $campos) {
?>
										<th><?php echo $campos['etiqueta_lista']; ?></th>
<?php
	}
?>
									</tr>
								</tfoot>

								<tbody>
<?php
	for ($i=0; $i < 3; $i++) { 
?>
									<tr>
										<td><input type="checkbox"></td>
										<td><button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></td>
										<td><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash text-danger"></span></button></td>
<?php
	foreach ($lista_etiquetas as $campos) {
?>
										<th></th>
<?php
	}
?>
									</tr>
<?php
	}
?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="panel panel-default">
				  <div class="panel-heading"><b>Relaciones</b></div>
				  <div class="panel-body">

					<div class="table-responsive">
					  <table class="table table-striped table-bordered table-hover table-condensed">
					    <thead>
					    	<tr>
					    		<th>Etiqueta</th>
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
					    		<th>Etiqueta</th>
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
						foreach ($registros_relaciones_lista as $key => $reg) {
							echo "<tr>";

							echo "<td>" . $reg['etiqueta_lista'] . "</td>";
							echo "<td>" . $reg['nombre'] . "</td>";

							$relacion_tabla = '';
							if ($reg['relacion_tabla'] > 0) {
								$relacion_tabla = searcharray($reg['relacion_tabla'], $tablas_relaciones, 'id', 'nombre');
							}
							echo "<td>" . $relacion_tabla . "</td>";

							$relacion_campo = '';
							if ($reg['relacion_campo'] > 0) {
								$relacion_campo = searcharray($reg['relacion_campo'], $campos_relaciones, 'id', 'nombre');
							}
							echo "<td>" . $relacion_campo . "</td>";

							$relacion_nombre = '';
							if ($reg['relacion_nombre'] > 0) {
								$relacion_nombre = searcharray($reg['relacion_nombre'], $campos_relaciones, 'id', 'nombre');
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

<?php
}
?>
			</div>
			<div id="nuevo" class="tab-pane fade">

<?php
if (count($nuevo_etiquetas)) {
?>
				<h3>{tabla_etiqueta}</h3>

				<div class="panel panel-default">
					<div class="panel-heading"><b>Nuevo Registro</b></div>
					<div class="panel-body">
						<form class="form-horizontal">

	                        <div class="form-group"> 
	                           <div class="col-sm-offset-2 col-sm-10">
	                                <button type="button" class="btn btn-success">Insertar y volver a la lista</button>
	                                <button type="button" class="btn btn-default">Cancelar</button>
	                            </div>
	                        </div>

<?php
	foreach ($nuevo_etiquetas as $campos) {
?>
		                    <div class="form-group">
		                    	<label class="control-label col-sm-2"><?php echo $campos['etiqueta_nuevo']; ?>:</label>
		                    	<div class="col-sm-10">
<?php	
		$dropdown = false;
		foreach ($registros_relaciones_nuevo as $key => $reg) {
			if ($reg['nombre'] == $campos['nombre']) {
				$dropdown = true;
				break;
			}
		}
		if ($dropdown) {
?>
		                    		<select class="form-control"><option></option></select>
<?php
		} else {
?>
		                    		<input type="text" class="form-control">
<?php
		}
?>						
		                    	</div>
		                    </div>
<?php
	}
?>

	                        <div class="form-group"> 
	                           <div class="col-sm-offset-2 col-sm-10">
	                                <button type="button" class="btn btn-success">Insertar y volver a la lista</button>
	                                <button type="button" class="btn btn-default">Cancelar</button>
	                            </div>
	                        </div>

						</form>


					</div>
				</div>

				<div class="panel panel-default">
				  <div class="panel-heading"><b>Relaciones</b></div>
				  <div class="panel-body">

					<div class="table-responsive">
					  <table class="table table-striped table-bordered table-hover table-condensed">
					    <thead>
					    	<tr>
					    		<th>Etiqueta</th>
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
					    		<th>Etiqueta</th>
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
						foreach ($registros_relaciones_nuevo as $key => $reg) {
							echo "<tr>";

							echo "<td>" . $reg['etiqueta_nuevo'] . "</td>";
							echo "<td>" . $reg['nombre'] . "</td>";

							$relacion_tabla = '';
							if ($reg['relacion_tabla'] > 0) {
								$relacion_tabla = searcharray($reg['relacion_tabla'], $tablas_relaciones, 'id', 'nombre');
							}
							echo "<td>" . $relacion_tabla . "</td>";

							$relacion_campo = '';
							if ($reg['relacion_campo'] > 0) {
								$relacion_campo = searcharray($reg['relacion_campo'], $campos_relaciones, 'id', 'nombre');
							}
							echo "<td>" . $relacion_campo . "</td>";

							$relacion_nombre = '';
							if ($reg['relacion_nombre'] > 0) {
								$relacion_nombre = searcharray($reg['relacion_nombre'], $campos_relaciones, 'id', 'nombre');
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


				<div class="panel panel-default">
				  <div class="panel-heading"><b>Validaciones</b></div>
				  <div class="panel-body">


					<div class="table-responsive">
					  <table class="table table-striped table-bordered table-hover table-condensed" id="lista">
					    <thead>
					    	<tr>
					    		<th>Etiqueta</th>
					    		<th>Campo</th>
					    		<th>Tipo Dato</th>
					    		<th>Tamaño</th>
					    		<th>Archivo</th>
					    		<th>Archivo Ruta</th>
								<?php echo $validaciones_cabeceras_nuevo; ?>
					    	</tr>
					    </thead>
					    <tfoot>
					    	<tr>
					    		<th>Etiqueta</th>
					    		<th>Campo</th>
					    		<th>Tipo Dato</th>
					    		<th>Tamaño</th>
					    		<th>Archivo</th>
					    		<th>Archivo Ruta</th>
								<?php echo $validaciones_cabeceras_nuevo; ?>
					    	</tr>
					    </tfoot>    
					    <tbody>
					<?php	
						foreach ($registros_nuevo as $key => $reg) {
							echo "<tr>";
							echo "<td>" . $reg['etiqueta_nuevo'] . "</td>";
							echo "<td>" . $reg['nombre'] . "</td>";
							echo "<td>" . $reg['tipo_dato'] . "</td>";
							echo "<td>" . $reg['tamano'] . "</td>";
							echo "<td>" . ($reg['archivo'] == 4 ? 'Si' : '') . "</td>";
							echo "<td>" . $reg['archivo_ruta'] . "</td>";
							foreach ($validaciones_datos_nuevo[$reg['id']] as $key2 => $reg2) {
								echo "<td>" . $reg2 . "</td>";
							}
							echo "</tr>";
						}
					?>
					    </tbody>
					  </table>
					</div>



				  </div>
				</div>



<?php
}
?>

			</div>


			<div id="editar" class="tab-pane fade">


<?php
if (count($editar_etiquetas)) {
?>
				<h3>{tabla_etiqueta}</h3>

				<div class="panel panel-default">
					<div class="panel-heading"><b>Editar Registro</b></div>
					<div class="panel-body">
						<form class="form-horizontal">

	                        <div class="form-group"> 
	                           <div class="col-sm-offset-2 col-sm-10">
	                                <button type="button" class="btn btn-primary">Actualizar y volver a la lista</button>
	                                <button type="button" class="btn btn-default">Cancelar</button>
	                            </div>
	                        </div>
<?php
	foreach ($editar_etiquetas as $campos) {
?>
		                    <div class="form-group">
		                    	<label class="control-label col-sm-2"><?php echo $campos['etiqueta_editar']; ?>:</label>
		                    	<div class="col-sm-10">
<?php	
		$dropdown = false;
		foreach ($registros_relaciones_editar as $key => $reg) {
			if ($reg['nombre'] == $campos['nombre']) {
				$dropdown = true;
				break;
			}
		}
		if ($dropdown) {
?>
		                    		<select class="form-control"><option></option></select>
<?php
		} else {
?>
		                    		<input type="text" class="form-control">
<?php
		}
?>
		                    	</div>
		                    </div>
<?php
	}
?>

	                        <div class="form-group"> 
	                           <div class="col-sm-offset-2 col-sm-10">
	                                <button type="button" class="btn btn-primary">Actualizar y volver a la lista</button>
	                                <button type="button" class="btn btn-default">Cancelar</button>
	                            </div>
	                        </div>

						</form>

					</div>
				</div>

				<div class="panel panel-default">
				  <div class="panel-heading"><b>Relaciones</b></div>
				  <div class="panel-body">

					<div class="table-responsive">
					  <table class="table table-striped table-bordered table-hover table-condensed">
					    <thead>
					    	<tr>
					    		<th>Etiqueta</th>
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
					    		<th>Etiqueta</th>
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
						foreach ($registros_relaciones_editar as $key => $reg) {
							echo "<tr>";

							echo "<td>" . $reg['etiqueta_editar'] . "</td>";
							echo "<td>" . $reg['nombre'] . "</td>";

							$relacion_tabla = '';
							if ($reg['relacion_tabla'] > 0) {
								$relacion_tabla = searcharray($reg['relacion_tabla'], $tablas_relaciones, 'id', 'nombre');
							}
							echo "<td>" . $relacion_tabla . "</td>";

							$relacion_campo = '';
							if ($reg['relacion_campo'] > 0) {
								$relacion_campo = searcharray($reg['relacion_campo'], $campos_relaciones, 'id', 'nombre');
							}
							echo "<td>" . $relacion_campo . "</td>";

							$relacion_nombre = '';
							if ($reg['relacion_nombre'] > 0) {
								$relacion_nombre = searcharray($reg['relacion_nombre'], $campos_relaciones, 'id', 'nombre');
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


				<div class="panel panel-default">
				  <div class="panel-heading"><b>Validaciones</b></div>
				  <div class="panel-body">


					<div class="table-responsive">
					  <table class="table table-striped table-bordered table-hover table-condensed" id="lista">
					    <thead>
					    	<tr>
					    		<th>Etiqueta</th>
					    		<th>Campo</th>
					    		<th>Tipo Dato</th>
					    		<th>Tamaño</th>
					    		<th>Archivo</th>
					    		<th>Archivo Ruta</th>
								<?php echo $validaciones_cabeceras_editar; ?>
					    	</tr>
					    </thead>
					    <tfoot>
					    	<tr>
					    		<th>Etiqueta</th>
					    		<th>Campo</th>
					    		<th>Tipo Dato</th>
					    		<th>Tamaño</th>
					    		<th>Archivo</th>
					    		<th>Archivo Ruta</th>
								<?php echo $validaciones_cabeceras_editar; ?>
					    	</tr>
					    </tfoot>    
					    <tbody>
					<?php	
						foreach ($registros_editar as $key => $reg) {
							echo "<tr>";
							echo "<td>" . $reg['etiqueta_editar'] . "</td>";
							echo "<td>" . $reg['nombre'] . "</td>";
							echo "<td>" . $reg['tipo_dato'] . "</td>";
							echo "<td>" . $reg['tamano'] . "</td>";
							echo "<td>" . ($reg['archivo'] == 4 ? 'Si' : '') . "</td>";
							echo "<td>" . $reg['archivo_ruta'] . "</td>";
							foreach ($validaciones_datos_editar[$reg['id']] as $key2 => $reg2) {
								echo "<td>" . $reg2 . "</td>";
							}
							echo "</tr>";
						}
					?>
					    </tbody>
					  </table>
					</div>



				  </div>
				</div>

<?php
}
?>

			</div>







			<div id="filtros" class="tab-pane fade">


<?php
if (count($filtros_etiquetas)) {
?>
				<h3>{tabla_etiqueta}</h3>

				<div class="panel panel-default">
					<div class="panel-heading"><b>Filtros</b></div>
					<div class="panel-body">
						<form class="form-horizontal">

	                        <div class="form-group"> 
	                           <div class="col-sm-offset-2 col-sm-10">
	                                <button type="button" class="btn btn-info">Filtrar</button>
	                                <button type="button" class="btn btn-default">Cancelar</button>
	                            </div>
	                        </div>
<?php
	foreach ($filtros_etiquetas as $campos) {
?>
		                    <div class="form-group">
		                    	<label class="control-label col-sm-2"><?php echo $campos['etiqueta_filtros']; ?>:</label>
		                    	<div class="col-sm-10">
<?php	
		$dropdown = false;
		foreach ($registros_relaciones_editar as $key => $reg) {
			if ($reg['nombre'] == $campos['nombre']) {
				$dropdown = true;
				break;
			}
		}
		if ($dropdown) {
?>
		                    		<select class="form-control"><option></option></select>
<?php
		} else {
?>
		                    		<input type="text" class="form-control">
<?php
		}
?>
		                    	</div>
		                    </div>
<?php
	}
?>

	                        <div class="form-group"> 
	                           <div class="col-sm-offset-2 col-sm-10">
	                                <button type="button" class="btn btn-info">Filtrar</button>
	                                <button type="button" class="btn btn-default">Cancelar</button>
	                            </div>
	                        </div>

						</form>

					</div>
				</div>

				<div class="panel panel-default">
				  <div class="panel-heading"><b>Relaciones</b></div>
				  <div class="panel-body">

					<div class="table-responsive">
					  <table class="table table-striped table-bordered table-hover table-condensed">
					    <thead>
					    	<tr>
					    		<th>Etiqueta</th>
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
					    		<th>Etiqueta</th>
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
						foreach ($registros_relaciones_filtros as $key => $reg) {
							echo "<tr>";

							echo "<td>" . $reg['etiqueta_filtros'] . "</td>";
							echo "<td>" . $reg['nombre'] . "</td>";

							$relacion_tabla = '';
							if ($reg['relacion_tabla'] > 0) {
								$relacion_tabla = searcharray($reg['relacion_tabla'], $tablas_relaciones, 'id', 'nombre');
							}
							echo "<td>" . $relacion_tabla . "</td>";

							$relacion_campo = '';
							if ($reg['relacion_campo'] > 0) {
								$relacion_campo = searcharray($reg['relacion_campo'], $campos_relaciones, 'id', 'nombre');
							}
							echo "<td>" . $relacion_campo . "</td>";

							$relacion_nombre = '';
							if ($reg['relacion_nombre'] > 0) {
								$relacion_nombre = searcharray($reg['relacion_nombre'], $campos_relaciones, 'id', 'nombre');
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


				<div class="panel panel-default">
				  <div class="panel-heading"><b>Validaciones</b></div>
				  <div class="panel-body">


					<div class="table-responsive">
					  <table class="table table-striped table-bordered table-hover table-condensed" id="lista">
					    <thead>
					    	<tr>
					    		<th>Etiqueta</th>
					    		<th>Campo</th>
					    		<th>Tipo Dato</th>
					    		<th>Tamaño</th>
					    		<th>Archivo</th>
					    		<th>Archivo Ruta</th>
								<?php echo $validaciones_cabeceras_filtros; ?>
					    	</tr>
					    </thead>
					    <tfoot>
					    	<tr>
					    		<th>Etiqueta</th>
					    		<th>Campo</th>
					    		<th>Tipo Dato</th>
					    		<th>Tamaño</th>
					    		<th>Archivo</th>
					    		<th>Archivo Ruta</th>
								<?php echo $validaciones_cabeceras_filtros; ?>
					    	</tr>
					    </tfoot>    
					    <tbody>
					<?php	
						foreach ($registros_filtros as $key => $reg) {
							echo "<tr>";
							echo "<td>" . $reg['etiqueta_filtros'] . "</td>";
							echo "<td>" . $reg['nombre'] . "</td>";
							echo "<td>" . $reg['tipo_dato'] . "</td>";
							echo "<td>" . $reg['tamano'] . "</td>";
							echo "<td>" . ($reg['archivo'] == 4 ? 'Si' : '') . "</td>";
							echo "<td>" . $reg['archivo_ruta'] . "</td>";
							foreach ($validaciones_datos_filtros[$reg['id']] as $key2 => $reg2) {
								echo "<td>" . $reg2 . "</td>";
							}
							echo "</tr>";
						}
					?>
					    </tbody>
					  </table>
					</div>



				  </div>
				</div>

<?php
}
?>

			</div>







		</div>

	</div>
</div>
