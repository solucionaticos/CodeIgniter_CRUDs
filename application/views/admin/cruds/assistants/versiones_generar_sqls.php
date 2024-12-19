<div class="row">
	<div class="col-sm-4">

		<div class="panel panel-primary">
			<div class="panel-heading" style="display:block;height: 54px;">
				<div style="float:left;font-weight:bold;font-size: 18px;">SQLs</div>
			</div>
			<div class="panel-body">

<pre><?php
foreach ($datos as $reg) echo $reg['tabla_sql'] . '
';
?></pre>

			</div>
		</div>		

	</div>
	<div class="col-sm-8">

		<div class="panel panel-primary">
			<div class="panel-heading" style="display:block;height: 54px;">
				<div style="float:left;font-weight:bold;font-size: 18px;">Tablas + SQLs</div>
			</div>
			<div class="panel-body">

				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover table-condensed" id="lista2">
						<thead>
							<tr>
								<th>Tabla</th>
								<th>SQL</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($datos as $reg) {
							?>
							<tr>
								<td><?php echo $reg['tabla_nombre']; ?></td>
								<td>
									<pre><?php echo $reg['tabla_sql']; ?></pre>
								</td>
							</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>

			</div>
		</div>		

	</div>
</div>


<script type="text/javascript">
$(function() {

    $('#lista2').DataTable({
    	"paging": false,
    	"order": [[ 0, "asc" ]],
    	columnDefs: [{ orderable: false, targets: [1] }]
    });

} );
</script>


