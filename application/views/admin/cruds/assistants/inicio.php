<div class="row">
	<div class="col-sm-12">

		<div class="row" style="margin-bottom: 10px;margin-left: 10px;">
			<div class="col-sm-6">
				<h3>Asistentes<?php if ($projectVersionTitle != '') { ?> <span style="font-size: 14px; color: grey;">Proyecto: <?php echo $projectVersionTitle; ?> <a class="btn btn-info btn-xs" href="<?php echo base_url(); ?>admin/cruds/assistants/selprojver" style="position: relative; top: -4px; height: 19px; font-size: 10px; margin-left: 3px;">Cambiar</a></span><?php } ?></h3>
			</div>
			<div class="col-sm-6">
				<ul class="nav nav-tabs">
					<li><a href="#">Cotizaciones <span style="color:red;">(Pendiente)</span></a></li>
					<li<?php echo $tab_class[0]; ?>><a href="<?php echo base_url(); ?>admin/cruds/assistants/proyectos">Proyectos</a></li>
					<li<?php echo $tab_class[1]; ?>><a href="<?php echo base_url(); ?>admin/cruds/assistants/versiones">Versiones</a></li>
					<li<?php echo $tab_class[2]; ?>><a href="<?php echo base_url(); ?>admin/cruds/assistants/tablas">Tablas</a></li>
					<li<?php echo $tab_class[3]; ?>><a href="<?php echo base_url(); ?>admin/cruds/assistants/campos">Campos</a></li>
					<li><a href="#">Repositorio <span style="color:red;">(Pendiente)</span></a></li>
				</ul>			
			</div>
		</div>


		<?php echo $resultado; ?>
	</div>
</div>