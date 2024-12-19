<div class="row">
	<div class="col-sm-12">
		<?php echo $resultado; ?>

		<div class="panel panel-primary">
		  <div class="panel-heading" style="font-weight:bold;font-size: 18px;">Proyectos</div>
		  <div class="panel-body">

			<div class="table-responsive">
			  <table class="table table-striped table-bordered table-hover table-condensed" id="lista">
			    <thead>
			    	<tr>
			    		<th>Proyecto</th>
			    		<th>Descripción</th>
			    		<th>Comandos</th>
			    	</tr>
			    </thead>
			    <tfoot>
			    	<tr>
			    		<th>Proyecto</th>
			    		<th>Descripción</th>
			    		<th>Comandos</th>
			    	</tr>
			    </tfoot>    
			    <tbody>
			<?php	
				foreach ($registros as $key => $reg) {
					echo "<tr>";
					echo "<td>" . $reg['nombre'] . "</td>";
					echo "<td>" . $reg['descripcion'] . "</td>";

					echo "<td>" . 
						'<a href="'.base_url().'admin/cruds/assistants/borrar_projver/' . $reg['id'] . '/0/p" class="btn btn-danger btn-xs" onclick="return confirm(\'Clic OK para continuar?\')">Eliminar</a>' . 
						"</td>";
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

<script type="text/javascript">
$(function() {

    $('#lista').DataTable({
    	"paging": false,
    	"order": [[ 0, "asc" ]],
    	columnDefs: [{ orderable: false, targets: [1] }, { orderable: false, targets: [2] }],
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

});
</script>
