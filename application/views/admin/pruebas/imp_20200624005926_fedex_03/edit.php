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
                            </div>
                        </div>

	                    <input type='hidden' id='id_g' name='id' value="<?php echo $data['id']; ?>">
	                    
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="tracking_nbr_g">Tracking Nbr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="tracking_nbr_g" name="tracking_nbr">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="ship__p_u__date_g">Ship  P U  Date:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="ship__p_u__date_g" name="ship__p_u__date">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="service_type_g">Service Type:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="service_type_g" name="service_type">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="ship_co_nm_g">Ship Co Nm:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="ship_co_nm_g" name="ship_co_nm">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="ship_city_g">Ship City:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="ship_city_g" name="ship_city">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="ship_zip_g">Ship Zip:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="ship_zip_g" name="ship_zip">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="ship_state_g">Ship State:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="ship_state_g" name="ship_state">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="ship_country_territory_g">Ship Country Territory:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="ship_country_territory_g" name="ship_country_territory">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="recip_co_nm_g">Recip Co Nm:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="recip_co_nm_g" name="recip_co_nm">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="recip_addr_g">Recip Addr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="recip_addr_g" name="recip_addr">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="recip_city_g">Recip City:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="recip_city_g" name="recip_city">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="recip_zip_g">Recip Zip:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="recip_zip_g" name="recip_zip">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="recip_state_g">Recip State:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="recip_state_g" name="recip_state">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="recip_country_territory_g">Recip Country Territory:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="recip_country_territory_g" name="recip_country_territory">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="nbr_of_pcs_g">Nbr Of Pcs:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="nbr_of_pcs_g" name="nbr_of_pcs">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="recip_addr_qty_g">Recip Addr Qty:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="recip_addr_qty_g" name="recip_addr_qty">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="weight_g">Weight:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="weight_g" name="weight">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="dim_wgt_g">Dim Wgt:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="dim_wgt_g" name="dim_wgt">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="reference_g">Reference:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="reference_g" name="reference">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="p_o__nbr_g">P O  Nbr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="p_o__nbr_g" name="p_o__nbr">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="invoice_nbr_g">Invoice Nbr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="invoice_nbr_g" name="invoice_nbr">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="department_nbr_g">Department Nbr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="department_nbr_g" name="department_nbr">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="shipment_id_nbr_g">Shipment Id Nbr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="shipment_id_nbr_g" name="shipment_id_nbr">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="status_g">Status:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="status_g" name="status">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="cntrymanufact1_g">Cntrymanufact1:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="cntrymanufact1_g" name="cntrymanufact1">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="cntrymanufact2_g">Cntrymanufact2:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="cntrymanufact2_g" name="cntrymanufact2">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="cntrymanufact3_g">Cntrymanufact3:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="cntrymanufact3_g" name="cntrymanufact3">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="cntrymanufact4_g">Cntrymanufact4:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="cntrymanufact4_g" name="cntrymanufact4">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="harmonizedcd1_g">Harmonizedcd1:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="harmonizedcd1_g" name="harmonizedcd1">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="harmonizedcd2_g">Harmonizedcd2:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="harmonizedcd2_g" name="harmonizedcd2">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="harmonizedcd3_g">Harmonizedcd3:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="harmonizedcd3_g" name="harmonizedcd3">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="harmonizedcd4_g">Harmonizedcd4:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="harmonizedcd4_g" name="harmonizedcd4">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="spechandling1_g">Spechandling1:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="spechandling1_g" name="spechandling1">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="spechandling2_g">Spechandling2:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="spechandling2_g" name="spechandling2">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="spechandling3_g">Spechandling3:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="spechandling3_g" name="spechandling3">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="spechandling4_g">Spechandling4:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="spechandling4_g" name="spechandling4">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_tracking_nbr_g">Child Tracking Nbr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_tracking_nbr_g" name="child_tracking_nbr">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_status_g">Child Status:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_status_g" name="child_status">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_customer_nbr_g">Child Customer Nbr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_customer_nbr_g" name="child_customer_nbr">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_recip_co_nm_g">Child Recip Co Nm:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_recip_co_nm_g" name="child_recip_co_nm">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_recip_city_g">Child Recip City:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_recip_city_g" name="child_recip_city">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_recip_address_g">Child Recip Address:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_recip_address_g" name="child_recip_address">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_recip_country_g">Child Recip Country:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_recip_country_g" name="child_recip_country">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_recip_state_g">Child Recip State:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_recip_state_g" name="child_recip_state">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_recip_zip_g">Child Recip Zip:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_recip_zip_g" name="child_recip_zip">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_serv_type_g">Child Serv Type:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_serv_type_g" name="child_serv_type">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_spechandling1_g">Child Spechandling1:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_spechandling1_g" name="child_spechandling1">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_spechandling2_g">Child Spechandling2:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_spechandling2_g" name="child_spechandling2">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_spechandling3_g">Child Spechandling3:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_spechandling3_g" name="child_spechandling3">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_spechandling4_g">Child Spechandling4:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_spechandling4_g" name="child_spechandling4">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="orig_pcctver_g">Orig Pcctver:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="orig_pcctver_g" name="orig_pcctver">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="dest_pcctver_g">Dest Pcctver:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="dest_pcctver_g" name="dest_pcctver">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="status_add_l_info_g">Status Add L Info:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="status_add_l_info_g" name="status_add_l_info">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="tcn_g">Tcn:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="tcn_g" name="tcn">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="bill_of_lading_nbr_g">Bill Of Lading Nbr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="bill_of_lading_nbr_g" name="bill_of_lading_nbr">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="partner_carrier_nbr_g">Partner Carrier Nbr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="partner_carrier_nbr_g" name="partner_carrier_nbr">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="rma_g">Rma:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="rma_g" name="rma">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="shipper_reference_g">Shipper Reference:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="shipper_reference_g" name="shipper_reference">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="appointment_delivery_g">Appointment Delivery:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="appointment_delivery_g" name="appointment_delivery">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="opco_flag_g">Opco Flag:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="opco_flag_g" name="opco_flag">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="return_authoriz_nm_g">Return Authoriz Nm:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="return_authoriz_nm_g" name="return_authoriz_nm">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="return_tracking_nbr_g">Return Tracking Nbr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="return_tracking_nbr_g" name="return_tracking_nbr">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="cod_remit_nbr_g">Cod Remit Nbr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="cod_remit_nbr_g" name="cod_remit_nbr">
	                    	</div>
	                    </div>

                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('be_crud_update_and_return_to_the_list'); ?></button>
                                <a href="<?php echo base_url() . $path; ?>" class="btn btn-default"><?php echo $this->lang->line('be_crud_cancel'); ?></a>
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
