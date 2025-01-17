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
                    <a href="<?php echo base_url(); ?>backend/cruds_detalles/new" class="btn btn-default text-green" id="btnNuevo"><span class="glyphicon glyphicon-plus"></span> Nuevo</a>
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
                                <th>Usuario</th>
                                <th>Proyecto</th>
                                <th>Version</th>
                                <th>Crud</th>
                                <th>Tabla</th>
                                <th>Campo</th>
                                <th>Lista</th>
                                <th>Nuevo</th>
                                <th>Editar</th>
                                <th>Ver</th>
                                <th>Exportar</th>
                                <th>Imprimir</th>

                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th class="tdSeleccion"></th>
                                <th class="tdBotones"></th>
                                <th class="tdBotones"></th>  
                                <th>Usuario</th>
                                <th>Proyecto</th>
                                <th>Version</th>
                                <th>Crud</th>
                                <th>Tabla</th>
                                <th>Campo</th>
                                <th>Lista</th>
                                <th>Nuevo</th>
                                <th>Editar</th>
                                <th>Ver</th>
                                <th>Exportar</th>
                                <th>Imprimir</th>

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

<?php echo form_open('backend/cruds_detalles/delete', array('id' => 'forma_e', 'class' => 'form-horizontal')); ?> 
    <input type='hidden' id='id_e' name='id'>
</form>
