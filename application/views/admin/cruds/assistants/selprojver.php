<div class="row" style="margin-top: 30px;">
	<div class="col-md-4 col-sm-3"></div>
	<div class="col-md-4 col-sm-6">
		<div class="panel panel-primary">
			<div class="panel-heading">Seleccionar Proyecto + Versión</div>
			<div class="panel-body">

				<div class="row" style="margin-top: 15px;margin-bottom: 5px;">
					<div class="col-sm-12">
						<label class="control-label col-sm-4" for="proyecto">Proyecto:</label>
						<div class="col-sm-8">
							<select class="form-control" name="proyecto" id="proyecto">
								<option value="0"></option>
<?php
foreach ($projects as $reg1) {
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
						<label class="control-label col-sm-4" for="version">Versión:</label>
						<div class="col-sm-8">
							<select class="form-control" name="version" id="version">
								<option value="0"></option>
							</select>
						</div>
					</div>
				</div>

				<div class="row" style="margin-top: 25px;margin-bottom: 15px;">
					<div class="col-sm-12">
						<div class="col-sm-4"></div>
						<div class="col-sm-8" style="text-align: right;">
							<button id="seleccionar" class="btn btn-success">Seleccionar</button>
						</div>
					</div>
				</div>

			</div>
		</div>		
	</div>
	<div class="col-md-4 col-sm-3"></div>
</div>

<script type="text/javascript">
	$(function () {
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

		$("#seleccionar").click(function () {
			var proyecto = $("#proyecto").val();
			var version = $("#version").val();
			window.location.href = "<?php echo base_url(); ?>admin/cruds/assistants/projver/"+proyecto+"/"+version+"/a";
		});
	});
</script>