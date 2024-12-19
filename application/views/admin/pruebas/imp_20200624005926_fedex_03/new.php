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

                        <div class="form-group"> 
                           <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success"><?php echo $this->lang->line('be_crud_insert_and_return_to_the_list'); ?></button>
                                <a href="<?php echo base_url() . $path; ?>" class="btn btn-default"><?php echo $this->lang->line('be_crud_cancel'); ?></a>
                            </div>
                        </div>

	                    <input type='hidden' id='id_i' name='id' value='0'>
	                    
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="tracking_nbr_i">Tracking Nbr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="tracking_nbr_i" name="tracking_nbr">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="ship__p_u__date_i">Ship  P U  Date:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="ship__p_u__date_i" name="ship__p_u__date">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="service_type_i">Service Type:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="service_type_i" name="service_type">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="ship_co_nm_i">Ship Co Nm:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="ship_co_nm_i" name="ship_co_nm">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="ship_city_i">Ship City:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="ship_city_i" name="ship_city">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="ship_zip_i">Ship Zip:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="ship_zip_i" name="ship_zip">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="ship_state_i">Ship State:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="ship_state_i" name="ship_state">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="ship_country_territory_i">Ship Country Territory:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="ship_country_territory_i" name="ship_country_territory">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="recip_co_nm_i">Recip Co Nm:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="recip_co_nm_i" name="recip_co_nm">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="recip_addr_i">Recip Addr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="recip_addr_i" name="recip_addr">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="recip_city_i">Recip City:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="recip_city_i" name="recip_city">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="recip_zip_i">Recip Zip:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="recip_zip_i" name="recip_zip">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="recip_state_i">Recip State:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="recip_state_i" name="recip_state">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="recip_country_territory_i">Recip Country Territory:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="recip_country_territory_i" name="recip_country_territory">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="nbr_of_pcs_i">Nbr Of Pcs:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="nbr_of_pcs_i" name="nbr_of_pcs">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="recip_addr_qty_i">Recip Addr Qty:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="recip_addr_qty_i" name="recip_addr_qty">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="weight_i">Weight:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="weight_i" name="weight">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="dim_wgt_i">Dim Wgt:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="dim_wgt_i" name="dim_wgt">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="reference_i">Reference:</label>
	                    	<div class="col-sm-10">
	                    		<input type="number" class="form-control" id="reference_i" name="reference">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="p_o__nbr_i">P O  Nbr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="p_o__nbr_i" name="p_o__nbr">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="invoice_nbr_i">Invoice Nbr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="invoice_nbr_i" name="invoice_nbr">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="department_nbr_i">Department Nbr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="department_nbr_i" name="department_nbr">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="shipment_id_nbr_i">Shipment Id Nbr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="shipment_id_nbr_i" name="shipment_id_nbr">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="status_i">Status:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="status_i" name="status">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="cntrymanufact1_i">Cntrymanufact1:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="cntrymanufact1_i" name="cntrymanufact1">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="cntrymanufact2_i">Cntrymanufact2:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="cntrymanufact2_i" name="cntrymanufact2">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="cntrymanufact3_i">Cntrymanufact3:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="cntrymanufact3_i" name="cntrymanufact3">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="cntrymanufact4_i">Cntrymanufact4:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="cntrymanufact4_i" name="cntrymanufact4">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="harmonizedcd1_i">Harmonizedcd1:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="harmonizedcd1_i" name="harmonizedcd1">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="harmonizedcd2_i">Harmonizedcd2:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="harmonizedcd2_i" name="harmonizedcd2">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="harmonizedcd3_i">Harmonizedcd3:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="harmonizedcd3_i" name="harmonizedcd3">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="harmonizedcd4_i">Harmonizedcd4:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="harmonizedcd4_i" name="harmonizedcd4">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="spechandling1_i">Spechandling1:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="spechandling1_i" name="spechandling1">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="spechandling2_i">Spechandling2:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="spechandling2_i" name="spechandling2">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="spechandling3_i">Spechandling3:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="spechandling3_i" name="spechandling3">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="spechandling4_i">Spechandling4:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="spechandling4_i" name="spechandling4">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_tracking_nbr_i">Child Tracking Nbr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_tracking_nbr_i" name="child_tracking_nbr">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_status_i">Child Status:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_status_i" name="child_status">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_customer_nbr_i">Child Customer Nbr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_customer_nbr_i" name="child_customer_nbr">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_recip_co_nm_i">Child Recip Co Nm:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_recip_co_nm_i" name="child_recip_co_nm">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_recip_city_i">Child Recip City:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_recip_city_i" name="child_recip_city">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_recip_address_i">Child Recip Address:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_recip_address_i" name="child_recip_address">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_recip_country_i">Child Recip Country:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_recip_country_i" name="child_recip_country">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_recip_state_i">Child Recip State:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_recip_state_i" name="child_recip_state">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_recip_zip_i">Child Recip Zip:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_recip_zip_i" name="child_recip_zip">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_serv_type_i">Child Serv Type:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_serv_type_i" name="child_serv_type">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_spechandling1_i">Child Spechandling1:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_spechandling1_i" name="child_spechandling1">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_spechandling2_i">Child Spechandling2:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_spechandling2_i" name="child_spechandling2">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_spechandling3_i">Child Spechandling3:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_spechandling3_i" name="child_spechandling3">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="child_spechandling4_i">Child Spechandling4:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="child_spechandling4_i" name="child_spechandling4">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="orig_pcctver_i">Orig Pcctver:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="orig_pcctver_i" name="orig_pcctver">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="dest_pcctver_i">Dest Pcctver:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="dest_pcctver_i" name="dest_pcctver">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="status_add_l_info_i">Status Add L Info:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="status_add_l_info_i" name="status_add_l_info">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="tcn_i">Tcn:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="tcn_i" name="tcn">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="bill_of_lading_nbr_i">Bill Of Lading Nbr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="bill_of_lading_nbr_i" name="bill_of_lading_nbr">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="partner_carrier_nbr_i">Partner Carrier Nbr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="partner_carrier_nbr_i" name="partner_carrier_nbr">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="rma_i">Rma:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="rma_i" name="rma">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="shipper_reference_i">Shipper Reference:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="shipper_reference_i" name="shipper_reference">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="appointment_delivery_i">Appointment Delivery:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="appointment_delivery_i" name="appointment_delivery">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="opco_flag_i">Opco Flag:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="opco_flag_i" name="opco_flag">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="return_authoriz_nm_i">Return Authoriz Nm:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="return_authoriz_nm_i" name="return_authoriz_nm">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="return_tracking_nbr_i">Return Tracking Nbr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="return_tracking_nbr_i" name="return_tracking_nbr">
	                    	</div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="control-label col-sm-2" for="cod_remit_nbr_i">Cod Remit Nbr:</label>
	                    	<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="cod_remit_nbr_i" name="cod_remit_nbr">
	                    	</div>
	                    </div>

                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success"><?php echo $this->lang->line('be_crud_insert_and_return_to_the_list'); ?></button>
                                <a href="<?php echo base_url() . $path; ?>" class="btn btn-default"><?php echo $this->lang->line('be_crud_cancel'); ?></a>
                            </div>
                        </div>

	                </form>

	            </div>
	        </div>
	    </div>
	</div>  

</section>
<!-- /.content -->
