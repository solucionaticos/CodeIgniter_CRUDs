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

<div class="row">
    <div class="col-xs-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Lista</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

<?php echo form_open($this->config->item('adminPath') . '/database2/administradores_actividad_detalle/insert', array('id' => 'forma_i', 'class' => 'form-horizontal')); ?>  

    <input type='hidden' id='id_i' name='id' value='0'>

    <div class='form-group'><label class='control-label col-sm-2' for='usuario_i'>Usuario:</label><div class='col-sm-10'><input type='text' class='form-control' id='usuario_i' name='usuario'></div></div>
    <div class='form-group'><label class='control-label col-sm-2' for='actividad_i'>Actividad:</label>
    	<div class='col-sm-10'>
    		<select class='form-control' id='actividad_i' name='actividad'>
	    	<?php foreach ($data['tabla_actividades'] as $registro) { ?>
	    		<option value="<?=$registro['id']?>"><?=$registro['ip']?></option>
	    	<?php } ?>
	    	</select>
	    </div>
	</div>

	<div class='form-group'><label class='control-label col-sm-2' for='fecha_i'>Fecha:</label><div class='col-sm-10'><input type='text' class='form-control datepicker' id='fecha_i' name='fecha'></div></div>
	<div class='form-group'><label class='control-label col-sm-2' for='ruta_i'>Ruta:</label><div class='col-sm-10'><input type='text' class='form-control' id='ruta_i' name='ruta'></div></div>

    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Guardar y volver a la lista</button>
            <a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database2/administradores_actividad_detalle" class="btn btn-default">Cancelar</a>
        </div>
    </div>

</form>

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

