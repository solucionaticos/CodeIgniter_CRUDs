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
	        <div class="box box-primary box-solid">
	            <div class="box-header with-border">
	                <h3 class="box-title"><?php echo $this->lang->line('be_crud_edit_record'); ?></h3>
	            </div>
	            <!-- /.box-header -->

                <div id="overlay-section">
                    <br /><br /><br /><br />
                </div>

	            <div class="box-body">

	                <?php echo form_open($path . '/update', array('id' => 'form_g', 'class' => 'form-horizontal')); ?>              

<input type="hidden" name="rel_tabla" id="rel_tabla" value="<?php echo $data['rel_tabla']; ?>">

                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('be_crud_update_and_return_to_the_list'); ?></button>

<a href="<?php echo base_url() . $path_rel . '/' . $data['rel_tabla']; ?>" class="btn btn-default"><?php echo $this->lang->line('be_crud_cancel'); ?></a>

                            </div>
                        </div>

	                    <input type='hidden' id='id_g' name='id' value="<?php echo $data['id']; ?>">

	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="nombre_g">Nombre:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="nombre_g" name="nombre">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="etiqueta_g">Etiqueta:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="etiqueta_g" name="etiqueta">
	                    	</div>
	                    </div>

	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="tipo_dato_g">Tipo Dato:</label>
	                    	<div class="col-sm-10">
	                            <select class='form-control' id='tipo_dato_g' name='tipo_dato'>
	                                <?php foreach ($data["tabla_tipo_dato"] as $cod => $registro) { ?><option value="<?=$cod?>"><?=$registro?></option><?php } ?>
	                            </select>	                    		
	                    	</div>
	                    </div>

	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="tamano_g">Tamaño:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="tamano_g" name="tamano">
	                    	</div>
	                    </div>

	                    <div class='form-group'>
	                        <label class="control-label col-sm-2" for="llave_primaria_g">Llave primaria:</label>
	                        <div class='col-sm-10'>
	                            <select class='form-control' id='llave_primaria_g' name='llave_primaria'>
	                                <?php foreach ($data["tabla_datos_valores_si_no"] as $registro) { ?><option value="<?=$registro['id']?>"><?=$registro['nombre']?></option><?php } ?>
	                            </select>
	                        </div>
	                    </div>

	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="orden_g">Orden:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="orden_g" name="orden">
	                    	</div>
	                    </div>

                        <div class="form-group">
                        	<label class="control-label col-sm-2" for="comentarios_g">Comentarios:</label>
                        	<div class="col-sm-10">
    	                    	<textarea class="form-control" rows="5" id="comentarios_g" name="comentarios"></textarea>
                        	</div>
                        </div>

                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('be_crud_update_and_return_to_the_list'); ?></button>

<a href="<?php echo base_url() . $path_rel . '/' . $data['rel_tabla']; ?>" class="btn btn-default"><?php echo $this->lang->line('be_crud_cancel'); ?></a>

                            </div>
                        </div>

	                </form>

	            </div>

                <div class="overlay">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>

	        </div>
	    </div>
	</div>  

</section>
<!-- /.content -->
