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
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Clave</th>
                                <th>Correo</th>
                                <th>Documento Tipo Id</th>
                                <th>Documento Numero</th>
                                <th>Documento Fecha Expedicion</th>
                                <th>Pais Id</th>
                                <th>Estado Id</th>
                                <th>Ciudad Id</th>
                                <th>Direccion 1</th>
                                <th>Direccion 2</th>
                                <th>Nacimiento Fecha</th>
                                <th>Nacimiento Pais Id</th>
                                <th>Nacimiento Ciudad Id</th>
                                <th>Numero Posicion</th>
                                <th>Posicion</th>
                                <th>Vicepresidencia</th>
                                <th>Moneda Id</th>
                                <th>Sueldo</th>
                                <th>Centro Costo Id</th>
                                <th>Frecuencia Pago Id</th>
                                <th>Compania</th>
                                <th>Genero Id</th>
                                <th>Estado Civil Id</th>
                                <th>Contratos Tipos Id</th>
                                <th>Fecha Finalizacion</th>
                                <th>Correo Externo</th>
                                <th>Correo Interno</th>
                                <th>Nomina Area Id</th>
                                <th>Banda Salarial</th>
                                <th>Jefe Codigo</th>
                                <th>Jefe Nombre</th>
                                <th>Banco Deposito Id</th>
                                <th>Banco Deposito Tipo Cuenta Id</th>
                                <th>Banco Deposito Cuenta</th>
                                <th>Eps</th>
                                <th>Fecha Creacion</th>
                                <th>Activo</th>
                                <th>Arl Id</th>
                                <th>Fondo Cesantias Id</th>
                                <th>Fondo Pensiones Id</th>
                                <th>Afc Entidad Id</th>
                                <th>Afc Cuenta Id</th>
                                <th>Fondo Pensiones Voluntario Id</th>
                                <th>Celular</th>
                                <th>Telefono Emergencia</th>
                                <th>Tipo Medida Id</th>
                                <th>Tipo Compensacion Variable Id</th>
                                <th>Procentaje Compensacion Variable</th>
                                <th>Nivel Educativo</th>
                                <th>Especialidad</th>

                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th class="tdSeleccion"></th>
                                <th class="tdBotones"></th>
                                <th class="tdBotones"></th>  
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Clave</th>
                                <th>Correo</th>
                                <th>Documento Tipo Id</th>
                                <th>Documento Numero</th>
                                <th>Documento Fecha Expedicion</th>
                                <th>Pais Id</th>
                                <th>Estado Id</th>
                                <th>Ciudad Id</th>
                                <th>Direccion 1</th>
                                <th>Direccion 2</th>
                                <th>Nacimiento Fecha</th>
                                <th>Nacimiento Pais Id</th>
                                <th>Nacimiento Ciudad Id</th>
                                <th>Numero Posicion</th>
                                <th>Posicion</th>
                                <th>Vicepresidencia</th>
                                <th>Moneda Id</th>
                                <th>Sueldo</th>
                                <th>Centro Costo Id</th>
                                <th>Frecuencia Pago Id</th>
                                <th>Compania</th>
                                <th>Genero Id</th>
                                <th>Estado Civil Id</th>
                                <th>Contratos Tipos Id</th>
                                <th>Fecha Finalizacion</th>
                                <th>Correo Externo</th>
                                <th>Correo Interno</th>
                                <th>Nomina Area Id</th>
                                <th>Banda Salarial</th>
                                <th>Jefe Codigo</th>
                                <th>Jefe Nombre</th>
                                <th>Banco Deposito Id</th>
                                <th>Banco Deposito Tipo Cuenta Id</th>
                                <th>Banco Deposito Cuenta</th>
                                <th>Eps</th>
                                <th>Fecha Creacion</th>
                                <th>Activo</th>
                                <th>Arl Id</th>
                                <th>Fondo Cesantias Id</th>
                                <th>Fondo Pensiones Id</th>
                                <th>Afc Entidad Id</th>
                                <th>Afc Cuenta Id</th>
                                <th>Fondo Pensiones Voluntario Id</th>
                                <th>Celular</th>
                                <th>Telefono Emergencia</th>
                                <th>Tipo Medida Id</th>
                                <th>Tipo Compensacion Variable Id</th>
                                <th>Procentaje Compensacion Variable</th>
                                <th>Nivel Educativo</th>
                                <th>Especialidad</th>

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

<?php echo form_open($this->config->item('adminPath') . '/backend/ci_datatables_ssp/empleados/delete', array('id' => 'forma_e', 'class' => 'form-horizontal')); ?> 
    <input type='hidden' id='id_e' name='id'>
</form>
