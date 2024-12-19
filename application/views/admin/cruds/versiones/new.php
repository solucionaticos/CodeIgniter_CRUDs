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
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $this->lang->line('be_crud_new_record'); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <?php echo form_open($path . '/insert', array('id' => 'form_i', 'class' => 'form-horizontal')); ?>  

<input type="hidden" name="rel_proyecto" id="rel_proyecto" value="<?php echo $data['rel_proyecto']; ?>">

                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success"><?php echo $this->lang->line('be_crud_insert_and_return_to_the_list'); ?></button>

<a href="<?php echo base_url() . $path_rel . '/' . $data['rel_proyecto']; ?>" class="btn btn-default"><?php echo $this->lang->line('be_crud_cancel'); ?></a>

                        </div>
                    </div>

                    <input type='hidden' id='id_i' name='id' value='0'>
                    
                    <div class="form-group">
                    	<label class="control-label col-sm-2" for="nombre_i">Nombre:</label>
                    	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="nombre_i" name="nombre">
                    	</div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="descripcion_i">Descripcion:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="5" id="descripcion_i" name="descripcion"></textarea>
                        </div>
                    </div>

                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success"><?php echo $this->lang->line('be_crud_insert_and_return_to_the_list'); ?></button>

<a href="<?php echo base_url() . $path_rel . '/' . $data['rel_proyecto']; ?>" class="btn btn-default"><?php echo $this->lang->line('be_crud_cancel'); ?></a>

                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>  
<!-- Modal Nuevo - Fin -->

</section>
<!-- /.content -->
