<div class="row">
	<div class="col-sm-6">
		<div class="panel panel-primary">
			<div class="panel-heading" style="display:block;height: 54px;">
				<div style="float:left;font-weight:bold;font-size: 18px;">BDs</div>
			</div>
			<div class="panel-body" style="overflow-y: scroll;height: 700px;">

				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover table-condensed" id="lista1">
						<thead>
							<tr>
								<th>Tabla</th>
								<th>Campos</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($datos[0] as $reg) {
							?>
							<tr>
								<td><?php echo $reg['tabla_nombre']; ?></td>
								<td><?php echo $reg['tabla_sql']; ?></td>
							</tr>
							<?php
							}
							?>
						</tbody>
						<tfoot>
							<tr>
								<th>Tabla</th>
								<th>SQL</th>
							</tr>
						</tfoot>
					</table>
				</div>

			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="panel panel-primary">
			<div class="panel-heading" style="display:block;height: 54px;">
				<div style="float:left;font-weight:bold;font-size: 18px;">Tablas + SQLs</div>
			</div>
			<div class="panel-body" style="overflow-y: scroll;height: 700px;">

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
							foreach ($datos[1] as $reg) {
							?>
							<tr>
								<td><?php echo $reg['tabla_nombre']; ?></td>
								<td><?php echo $reg['tabla_sql']; ?></td>
							</tr>
							<?php
							}
							?>
						</tbody>
						<tfoot>
							<tr>
								<th>Tabla</th>
								<th>SQL</th>
							</tr>
						</tfoot>
					</table>
				</div>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(function() {

    $('#lista1').DataTable({
    	"paging": false,
    	"order": [[ 0, "asc" ]],
    	columnDefs: [{ orderable: false, targets: [1] }],
        initComplete: function () {
            this.api().columns([0]).every( function () {
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

    $('#lista2').DataTable({
    	"paging": false,
    	"order": [[ 0, "asc" ]],
    	columnDefs: [{ orderable: false, targets: [1] }],
        initComplete: function () {
            this.api().columns([0]).every( function () {
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

    $('.listas').DataTable({
    	"paging": false
    });

} );
</script>
