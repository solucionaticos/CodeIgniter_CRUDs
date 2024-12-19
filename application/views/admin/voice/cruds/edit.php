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

                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('be_crud_update_and_return_to_the_list'); ?></button>
                                <a href="<?php echo base_url() . $path; ?>" class="btn btn-default"><?php echo $this->lang->line('be_crud_cancel'); ?></a>
                                <a href="<?php echo base_url() . $path . '/cruds_detalles/' . $data['id']; ?>" class="btn btn-info">Cruds Campos</a>
                            </div>
                        </div>

	                    <input type='hidden' id='id_g' name='id' value="<?php echo $data['id']; ?>">

	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="script_g">Script:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="script_g" name="script">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="titulo_g">Titulo:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="titulo_g" name="titulo">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="carpeta_1_g">Carpeta 1:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="carpeta_1_g" name="carpeta_1">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="carpeta_2_g">Carpeta 2:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="carpeta_2_g" name="carpeta_2">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="nuevo_g">Nuevo:</label>
	                    	<div class="col-sm-10">
	                    		<select class="form-control" id="nuevo_g" name="nuevo" >
<?php foreach ($data["table_datos_valores_si_no"] as $row) { ?>
	                    			<option value="<?=$row['id']?>"><?=$row['nombre']?></option>
<?php } ?>
	                    		</select>
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="editar_g">Editar:</label>
	                    	<div class="col-sm-10">
	                    		<select class="form-control" id="editar_g" name="editar" >
<?php foreach ($data["table_datos_valores_si_no"] as $row) { ?>
	                    			<option value="<?=$row['id']?>"><?=$row['nombre']?></option>
<?php } ?>
	                    		</select>
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="ver_g">Ver:</label>
	                    	<div class="col-sm-10">
	                    		<select class="form-control" id="ver_g" name="ver" >
<?php foreach ($data["table_datos_valores_si_no"] as $row) { ?>
	                    			<option value="<?=$row['id']?>"><?=$row['nombre']?></option>
<?php } ?>
	                    		</select>
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="borrar_g">Borrar:</label>
	                    	<div class="col-sm-10">
	                    		<select class="form-control" id="borrar_g" name="borrar" >
<?php foreach ($data["table_datos_valores_si_no"] as $row) { ?>
	                    			<option value="<?=$row['id']?>"><?=$row['nombre']?></option>
<?php } ?>
	                    		</select>
	                    	</div>
	                    </div>

                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('be_crud_update_and_return_to_the_list'); ?></button>
                                <a href="<?php echo base_url() . $path; ?>" class="btn btn-default"><?php echo $this->lang->line('be_crud_cancel'); ?></a>
                                <a href="<?php echo base_url() . $path . '/cruds_detalles/' . $data['id']; ?>" class="btn btn-info">Cruds Campos</a>
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
