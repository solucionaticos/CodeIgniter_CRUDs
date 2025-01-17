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
if ( $this->session->flashdata('alertMessage') ) {
?>
<!-- Alert Messages -->
<section class="content-header">
    <div class="alert alert-<?php echo $this->session->flashdata('alertType'); ?> alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $this->session->flashdata('alertMessage'); ?>
    </div>
</section>
<?php
}
?>

<!-- Main content -->
<section class="content">

	<div class="row">
	    <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $this->lang->line('be_crud_list'); ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="btnCommands">
                        <a href="<?php echo base_url() . $path; ?>/new" class="btn btn-default text-green" id="btnNew"><span class="glyphicon glyphicon-plus"></span> <?php echo $this->lang->line('be_crud_new'); ?></a>
                        <button type="button" class="btn btn-default text-red" id="btnDelete"><span class="glyphicon glyphicon-trash"></span> <?php echo $this->lang->line('be_crud_delete'); ?></button>
                    </div> 
                    <div class="table-responsive">
	                    <!-- dt-responsive -->
	                    <table id="list" class="table table-bordered table-striped" width="100%">
	                        <thead>
	                            <tr>
	                                <th class="tdSelection"><input type="checkbox" id="selectAll"></th>
	                                <th class="tdButtons"></th>
	                                <th class="tdButtons"></th>  
                                    <th>Cliente Id</th>
                                    <th>Referido</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Compania</th>
                                    <th>Posicion</th>
                                    <th>Pais Id</th>
                                    <th>Pais Estado Id</th>
                                    <th>Ciudad</th>
                                    <th>Direccion 1</th>
                                    <th>Direccion 2</th>
                                    <th>Idioma Id</th>
                                    <th>Plan Id</th>
                                    <th>Plazo Meses</th>
                                    <th>Moneda Id</th>
                                    <th>Subtotal</th>
                                    <th>Descuento Id</th>
                                    <th>Descuento</th>
                                    <th>Impuesto</th>
                                    <th>Envio</th>
                                    <th>Total</th>
                                    <th>Ip</th>
                                    <th>Ip Pais</th>
                                    <th>Fecha Correo</th>
                                    <th>Fecha Creacion</th>
                                    <th>Fecha Orden</th>

	                            </tr>
	                        </thead>

	                        <tfoot>
	                            <tr>
	                                <th class="tdSelection"></th>
	                                <th class="tdButtons"></th>
	                                <th class="tdButtons"></th>  
                                    <th>Cliente Id</th>
                                    <th>Referido</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Compania</th>
                                    <th>Posicion</th>
                                    <th>Pais Id</th>
                                    <th>Pais Estado Id</th>
                                    <th>Ciudad</th>
                                    <th>Direccion 1</th>
                                    <th>Direccion 2</th>
                                    <th>Idioma Id</th>
                                    <th>Plan Id</th>
                                    <th>Plazo Meses</th>
                                    <th>Moneda Id</th>
                                    <th>Subtotal</th>
                                    <th>Descuento Id</th>
                                    <th>Descuento</th>
                                    <th>Impuesto</th>
                                    <th>Envio</th>
                                    <th>Total</th>
                                    <th>Ip</th>
                                    <th>Ip Pais</th>
                                    <th>Fecha Correo</th>
                                    <th>Fecha Creacion</th>
                                    <th>Fecha Orden</th>

	                            </tr>
	                        </tfoot>

	                    </table>
	                </div>
	            </div>
	            <!-- /.box-body -->
	        </div>
	        <!-- /.box -->
	    </div>
	    <!-- /.col -->
	</div>
	<!-- /.row -->

</section>
<!-- /.content -->

<?php echo form_open($path . '/delete', array('id' => 'form_e', 'class' => 'form-horizontal')); ?> 
    <input type='hidden' id='id_e' name='id'>
</form>
