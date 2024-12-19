<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

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

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $data['datos']['titulo']; ?>
    <small><?php echo $data['datos']['subtitulo']; ?></small>
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
                                <th>Razon Social</th>
                                <th>Numero Identificacion</th>
                                <th>Telefono 1</th>
                                <th>Telefono 2</th>
                                <th>Correo</th>
                                <th>Pais Id</th>
                                <th>Estado Id</th>
                                <th>Ciudad Id</th>
                                <th>Direccion 1</th>
                                <th>Direccion 2</th>

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
                <?php echo form_open('backend/ci_datatables/empresa/ingresar', array('id' => 'forma_i', 'class' => 'form-horizontal')); ?>  

                    <input type='hidden' id='id_i' name='id' value='0'>
                    
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="razon_social_i">Razon Social:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="razon_social_i" name="razon_social">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="numero_identificacion_i">Numero Identificacion:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="numero_identificacion_i" name="numero_identificacion">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="telefono_1_i">Telefono 1:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="telefono_1_i" name="telefono_1">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="telefono_2_i">Telefono 2:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="telefono_2_i" name="telefono_2">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="correo_i">Correo:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="correo_i" name="correo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="pais_id_i">Pais Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="pais_id_i" name="pais_id" >
<?php foreach ($data["datos"]["tabla_datos_paises"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="estado_id_i">Estado Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="estado_id_i" name="estado_id" >
<?php foreach ($data["datos"]["tabla_datos_paises_estados"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="ciudad_id_i">Ciudad Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="ciudad_id_i" name="ciudad_id" >
<?php foreach ($data["datos"]["tabla_datos_ciudades"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="direccion_1_i">Direccion 1:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="direccion_1_i" name="direccion_1">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="direccion_2_i">Direccion 2:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="direccion_2_i" name="direccion_2">
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

                <?php echo form_open('backend/ci_datatables/empresa/guardar', array('id' => 'forma_g', 'class' => 'form-horizontal')); ?>              

                    <input type='hidden' id='id_g' name='id'>
                    
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="razon_social_g">Razon Social:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="razon_social_g" name="razon_social">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="numero_identificacion_g">Numero Identificacion:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="numero_identificacion_g" name="numero_identificacion">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="telefono_1_g">Telefono 1:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="telefono_1_g" name="telefono_1">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="telefono_2_g">Telefono 2:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="telefono_2_g" name="telefono_2">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="correo_g">Correo:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="correo_g" name="correo">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="pais_id_g">Pais Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="pais_id_g" name="pais_id" >
<?php foreach ($data["datos"]["tabla_datos_paises"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="estado_id_g">Estado Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="estado_id_g" name="estado_id" >
<?php foreach ($data["datos"]["tabla_datos_paises_estados"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="ciudad_id_g">Ciudad Id:</label>
                    	<div class="col-sm-10">
	                    	<select class="form-control" id="ciudad_id_g" name="ciudad_id" >
<?php foreach ($data["datos"]["tabla_datos_ciudades"] as $registro) { ?>
	                    		<option value="<?=$registro['id']?>"><?=$registro['nombre']?></option>
<?php } ?>
	                    	</select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="direccion_1_g">Direccion 1:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="direccion_1_g" name="direccion_1">
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="direccion_2_g">Direccion 2:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="direccion_2_g" name="direccion_2">
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
                <?php echo form_open('backend/ci_datatables/empresa/eliminar', array('id' => 'forma_e', 'class' => 'form-horizontal')); ?> 
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
