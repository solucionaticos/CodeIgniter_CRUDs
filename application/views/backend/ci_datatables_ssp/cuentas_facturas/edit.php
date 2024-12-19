<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    {title}
    <small>{subtitle}</small>
  </h1>
  {breadcrumb}
</section>

<?php
// Bloque de codigo para presentar mensajes de alerta
if ( $this->session->flashdata('alertaMensaje') ) {
?>
<section class="content-header">
	<div class="alert alert-<?php echo $this->session->flashdata('alertaTipo'); ?> alert-dismissible">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	    <?php echo $this->session->flashdata('alertaMensaje'); ?>
	</div>
</section>
<?php
}
?>


<!-- Main content -->
<section class="content">

<!-- Modal Editar - Inicio -->
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Lista</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <?php echo form_open('backend/ci_datatables_ssp/cuentas_facturas/update', array('id' => 'forma_g', 'class' => 'form-horizontal')); ?>              

                    <input type='hidden' id='id_g' name='id' value="<?php echo $data['id']; ?>">
                    
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="numero_factura_g">Numero Factura:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="numero_factura_g" name="numero_factura">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="fecha_factura_g">Fecha Factura:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control datepicker" id="fecha_factura_g" name="fecha_factura">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="concepto_g">Concepto:</label>
                    	<div class="col-sm-10">
	                    	<textarea class="form-control" rows="5" id="concepto_g" name="concepto"></textarea>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="subtotal_g">Subtotal:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="subtotal_g" name="subtotal">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="impuesto_g">Impuesto:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="impuesto_g" name="impuesto">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="total_g">Total:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="total_g" name="total">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="archivo_g">Archivo:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="archivo_g" name="archivo">
                    	</div>
                    </div>

				    <div class="form-group"> 
				        <div class="col-sm-offset-2 col-sm-10">
				            <button type="submit" class="btn btn-primary">Actualizar y volver a la lista</button>
				            <a href="<?php echo base_url(); ?>backend/ci_datatables_ssp/cuentas_facturas" class="btn btn-default">Cancelar</a>
				        </div>
				    </div>

				</form>


            </div>
        </div>
    </div>
</div>  
<!-- Modal Editar - Fin -->

</section>
<!-- /.content -->
