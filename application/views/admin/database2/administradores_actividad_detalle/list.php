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
                <div class="btn-groupx" style="margin-bottom: 10px;">
                    <a href="<?php echo base_url() . $this->config->item('adminPath'); ?>/database2/administradores_actividad_detalle/new" class="btn btn-default text-green" id="btnNuevo"><span class="glyphicon glyphicon-plus"></span> Nuevo</a>
                    <button type="button" class="btn btn-default text-red" id="btnEliminar"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
                </div> 
                <div class="table-responsive">
                    <!-- dt-responsive -->

                    <table id="lista" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="tdSeleccion"><input type="checkbox" id="seleccionarTodos"></th>
                                <th class="tdBotones"></th>
                                <th class="tdBotones"></th>  
                                <th>Usuario</th><th>Actividad</th><th>Fecha</th><th>Ruta</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th class="tdSeleccion"></th>
                                <th class="tdBotones"></th>
                                <th class="tdBotones"></th>  
                                <th>Usuario</th><th>Actividad</th><th>Fecha</th><th>Ruta</th>
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

<?php echo form_open($this->config->item('adminPath') . '/database2/administradores_actividad_detalle/delete', array('id' => 'forma_e', 'class' => 'form-horizontal')); ?> 
    <input type='hidden' id='id_e' name='id'>
</form>

