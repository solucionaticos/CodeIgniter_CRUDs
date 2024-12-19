<div class="row" style="margin-top: 30px;">
	<div class="col-sm-4"></div>
	<div class="col-sm-4">
		
		<div class="panel panel-primary">
			<div class="panel-heading">Menú</div>
			<div class="panel-body">
				<ul>
<!-- 					<li><a href="<?php echo base_url(); ?>admin/cruds/assistants/versiones_procesos">Procesos</a></li>  -->
					<li><a href="<?php echo base_url(); ?>admin/cruds/assistants/versiones_copiar_definiciones">Copiar Definiciones</a>
						<ul>
							<li>Copia todas las definiciones hechas sobre las tablas y los campos a las tablas de la nueva versión</li>
							<li>Internamente para hacer la copia de definiciones primero actualiza las tablas y luego los campos</li>
							<li>Actualiza nombres, estiquetas, validaciones, relaciones, etc</li>
							<li>La actualizaciones se toman sobre los nombres reales de las tablas y de los campos, asi que si alguno de estos cambio de nombre real no lo actualiza, si se borro o si es un campo nuevo por supuesto</li>
						</ul>
					</li>
					<li><a href="<?php echo base_url(); ?>admin/cruds/assistants/versiones_copiar_tablas">Copiar Tablas</a>
						<ul>
							<li>Permite copiar tablas de otros proyectos/versiones</li>
							<li>Permite tambien eliminar definiciones de tablas del proyecto/version actual</li>
							<li>Para copiar tablas
								<ul>
									<li>Primero se debe dar clic en "Funcionalidades"</li>
									<li>Luego se debe seleccionar el proyecto y su version</li>
									<li>Luego se le da clic en "Ver Tablas"</li>
									<li>Luego si salen las tablas y ya seleccionandolas se pueden copiar</li>
								</ul>
							</li>
							<li><span style="color:red;"><b>Nota:</b></span> Seria bueno poder ver que tablas existen ya en el proyecto actual, para esto se podria poner una marca o una columna nueva</li>
						</ul>
					</li>
					<li><a href="<?php echo base_url(); ?>admin/cruds/assistants/versiones_generar_sqls">Generar SQLs</a>
						<ul>
							<li>Crea los SQLs de las tablas del proyecto/version</li>
							<li>Se puede filtrar por nombre de tabla, campo o tipo de campo para traer los SQLs de las tablas que coincidan</li>
						</ul>
					</li>
					<li><a href="<?php echo base_url(); ?>admin/cruds/assistants/versiones_generar_menus">Generar Menus</a>
						<ul>
							<li>Facilita la creación del HTML de menús para ser copiados rapidamente</li>
							<li>Permite crear menús anidados, ordenarlos y editarlos</li>
							<li>Permite crear menús guardados del proyecto/version actual o de otros proyectos/versiones</li>
							<li>Para gestionar un menú es importante primero o seleccionar uno existente o crear uno nuevo</li>
						</ul>
					</li>
					<li><a href="<?php echo base_url(); ?>admin/database/tables_fields/sql" target="_blank">Cargar BDs*</a>
						<ul>
							<li>Permite crear/seleccionar versiones de proyectos</li>
							<li>Permite crear las tablas y los campos a partir de los SQLs de creacion de tablas de MySQL de un proyecto/version</li>
							<li>Permite ver/exportar/buscar los campos del proyecto/version </li>
						</ul>
					</li>

					<li><a href="<?php echo base_url(); ?>admin/cruds/assistants/versiones_comparar_bds">Comparar BDs</a>
						<ul>
							<li>Muestra las tablas y campos actuales contra los del proyecto/version actual</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>

	</div>
	<div class="col-sm-4"></div>
</div>

