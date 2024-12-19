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
            <div class="box box-primary">
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
                                <a href="<?php echo base_url() . $path . '/campos/' . $data['id']; ?>" class="btn btn-info">Campos</a>
                                <a href="<?php echo base_url() . $path . '/cruds/' . $data['id']; ?>" class="btn btn-info">Cruds</a>
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
                        	<label class="control-label col-sm-2" for="comentarios_g">Comentarios:</label>
                        	<div class="col-sm-10">
    	                    	<textarea class="form-control" rows="5" id="comentarios_g" name="comentarios"></textarea>
                        	</div>
                        </div>

    				    <div class="form-group"> 
    				        <div class="col-sm-offset-2 col-sm-10">
    				            <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('be_crud_update_and_return_to_the_list'); ?></button>
    				            <a href="<?php echo base_url() . $path; ?>" class="btn btn-default"><?php echo $this->lang->line('be_crud_cancel'); ?></a>
                                <a href="<?php echo base_url() . $path . '/campos/' . $data['id']; ?>" class="btn btn-info">Campos</a>
                                <a href="<?php echo base_url() . $path . '/cruds/' . $data['id']; ?>" class="btn btn-info">Cruds</a>
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