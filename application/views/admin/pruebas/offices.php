<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
// Bloque de codigo para presentar mensajes de alerta
if ( $this->session->flashdata('alertaMensaje') ) {
?>
<div class="alert alert-<?php echo $this->session->flashdata('alertaTipo'); ?> alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $this->session->flashdata('alertaMensaje'); ?>
</div>
<?php
}
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Lista</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="btn-groupx" style="margin-bottom: 10px;">
                    <button type="button" class="btn btn-default text-green" id="btnNuevo"><span class="glyphicon glyphicon-plus"></span> Nuevo</button>
                    <button type="button" class="btn btn-default text-light-blue" id="btnEditar"><span class="glyphicon glyphicon-pencil"></span> Editar</button>
                    <button type="button" class="btn btn-default text-red" id="btnEliminar"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
                </div> 
                <div class="table-responsive">
                    <!-- dt-responsive -->
                    <table id="lista" class="table table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th class="tdSeleccion"><input type="checkbox" id="seleccionarTodos"></th>
                                <th class="tdBotones"></th>
                                <th class="tdBotones"></th>  
                                <th>OfficeCode</th>
                                <th>City</th>
                                <th>Phone</th>
                                <th>AddressLine1</th>
                                <th>AddressLine2</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>PostalCode</th>
                                <th>Territory</th>

                            </tr>
                        </thead>
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

<!-- Modal Nuevo - Inicio -->
<div class="modal fade" id="modalNuevo" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #008d4c !important;">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title" style="color:white;">Nuevo</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open($this->config->item('adminPath') . '/pruebas/offices/ingresar', array('id' => 'forma_i', 'class' => 'form-horizontal')); ?>  

                    <input type='hidden' id='id_i' name='id' value='0'>
                    
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="officeCode_i">OfficeCode:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="officeCode_i" name="officeCode">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="city_i">City:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="city_i" name="city">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="phone_i">Phone:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="phone_i" name="phone">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="addressLine1_i">AddressLine1:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="addressLine1_i" name="addressLine1">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="addressLine2_i">AddressLine2:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="addressLine2_i" name="addressLine2">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="state_i">State:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="state_i" name="state">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="country_i">Country:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="country_i" name="country">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="postalCode_i">PostalCode:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="postalCode_i" name="postalCode">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="territory_i">Territory:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="territory_i" name="territory">
                    	</div>
                    </div>

                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Ingresar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>  
<!-- Modal Nuevo - Fin -->

<!-- Modal Editar - Inicio -->
<div class="modal fade" id="modalEditar" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #357ca5 !important;">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title" style="color:white;">Editar</h4>
            </div>
            <div class="modal-body">

                <?php echo form_open($this->config->item('adminPath') . '/pruebas/offices/guardar', array('id' => 'forma_g', 'class' => 'form-horizontal')); ?>              

                    <input type='hidden' id='id_g' name='id'>
                    
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="officeCode_g">OfficeCode:</label>
                    	<div class="col-sm-10">
	                    	<input type="number" class="form-control" id="officeCode_g" name="officeCode">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="city_g">City:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="city_g" name="city">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="phone_g">Phone:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="phone_g" name="phone">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="addressLine1_g">AddressLine1:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="addressLine1_g" name="addressLine1">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="addressLine2_g">AddressLine2:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="addressLine2_g" name="addressLine2">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="state_g">State:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="state_g" name="state">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="country_g">Country:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="country_g" name="country">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="postalCode_g">PostalCode:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="postalCode_g" name="postalCode">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="territory_g">Territory:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="territory_g" name="territory">
                    	</div>
                    </div>

                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>  
<!-- Modal Editar - Fin -->

<!-- Modal Eliminar - Inicio -->
<div class="modal fade" id="modalEliminar" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #d33724 !important;">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title" style="color:white">Confirmación de Eliminación</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open($this->config->item('adminPath') . '/pruebas/offices/eliminar', array('id' => 'forma_e', 'class' => 'form-horizontal')); ?> 
                    <input type='hidden' id='id_e' name='id'>          
                    <p class="lead text-danger text-center">Esta seguro de eliminar el(los) registro(s)?<br><br><button type="button" class="btn btn-lg btn-danger">Si, eliminar el(los) registro(s)</button></p>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>  
<!-- Modal Eliminar - Fin -->

</section>
<!-- /.content -->
