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
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Lista</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

<?php echo form_open($this->config->item('adminPath') . '/database2/administradores_actividad_detalle/update', array('id' => 'forma_g', 'class' => 'form-horizontal')); ?>              

    <input type='hidden' id='id_g' name='id' value="<?php echo $data['id']; ?>">

    <div class='form-group'><label class='control-label col-sm-2' for='usuario_g'>Usuario:</label><div class='col-sm-10'><input type='text' class='form-control' id='usuario_g' name='usuario'></div></div>
    <div class='form-group'><label class='control-label col-sm-2' for='actividad_g'>Actividad:</label>
    	<div class='col-sm-10'>
    		<select class='form-control' id='actividad_g' name='actividad'>
			<?php foreach ($data['tabla_actividades'] as $registro) { ?>
				<option value="<?=$registro['id']?>"><?=$registro['ip']?> (<?=$registro['id']?>)</option>
			<?php } ?>
    		</select>
    	</div>
    </div>

    <div class='form-group'><label class='control-label col-sm-2' for='fecha_g'>Fecha:</label><div class='col-sm-10'><input type='text' class='form-control datepicker' id='fecha_g' name='fecha'></div></div>
    <div class='form-group'><label class='control-label col-sm-2' for='ruta_g'>Ruta:</label><div class='col-sm-10'><input type='text' class='form-control' id='ruta_g' name='ruta'></div></div>

    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Actualizar y volver a la lista</button>
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
