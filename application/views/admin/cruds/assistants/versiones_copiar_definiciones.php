<?php echo form_open(base_url() . 'admin/cruds/assistants/versiones_copiar_definiciones_procesar', array('id' => 'forma', 'class' => 'form-horizontal')); ?>

	<div class="row" style="margin-top: 30px;">

		<div class="col-md-4 col-sm-3"></div>

		<div class="col-md-4 col-sm-6">

			<?php echo $resultado; ?>
			<div class="panel panel-primary">
				<div class="panel-heading" style="display:block;height: 54px;">
					<div style="float:left;font-weight:bold;font-size: 18px;">Copiar Definiciones</div>
					<div style="float:right;">
						<button class="btn btn-success" type="submit">Copiar</button>
					</div>
				</div>
				<div class="panel-body">
					
					<div class="row" style="margin-top: 5px;margin-bottom: 5px;">
						<div class="col-sm-12">
							<label class="control-label col-sm-4" for="copiar_proyecto">Proyecto:</label>
							<div class="col-sm-8">
								<select name="copiar_proyecto" id="copiar_proyecto" class="form-control">
									<option value=""></option>
								<?php
								foreach ($proyectos as $registro) {
								?>
									<option value="<?=$registro['id'];?>"><?=$registro['nombre'];?></option>
								<?php
								}
								?>
								</select>
							</div>							
						</div>
					</div>

					<div class="row" style="margin-top: 5px;margin-bottom: 5px;">
						<div class="col-sm-12">
							<label class="control-label col-sm-4" for="copiar_version">Versión:</label>
							<div class="col-sm-8">
								<select class="form-control" name="copiar_version" id="copiar_version">
									<option value="0"></option>
								</select>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
		<div class="col-md-4 col-sm-3"></div>
	</div>

</form>


<script type="text/javascript">
	$(function () {
		$("#copiar_proyecto").change(function () {
			var proyecto = $("#copiar_proyecto").val();
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
					$("#copiar_version").html(versiones);
				}
			});	
		});

	});
</script>
