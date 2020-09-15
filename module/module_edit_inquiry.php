<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);
$page2 = $_SERVER['PHP_SELF']."?";
$current_date = date('Y-m-d');



// ####### PENDING COUNT LIST INQURY  ########
// $query3 =" select count(id_lapker) as jml3 from laporan_kerja  ";
// $query3.=" where status='4' and id_cabang='".getIdCabang()."' ";
// $result3=pg_query($connection,$query3);
// $row3=pg_fetch_array($result3);
// $count3=$row3['jml3'];
// if(!isset($count3) || $count3==NULL) $count3=0;


########################  KLIK STATUS VIEW DASHBOARD  #################################
$varsrc= " "; 




if (isset($_GET['act1']) ) {
	$act1=$_GET['act1'];
} else if (isset($_POST['act1']) ){
	$act1=$_POST['act1'];
} else {
	$act1="4";
}
                            
################   SRCBY   ###################
if (isset($_POST['srcby']) ) {


	switch ($_POST['srcby']) {
		 case '1' : $srcby='1'; break; //ticket_number
		 case '2' : $srcby='2'; break; //customer_name
		 case '3' : $srcby='3'; break; //account_number
		 case '4' : $srcby='4'; break; //credit_card_number
		 case '5' : $srcby='5'; break; //ATM card number
		 }

} //else {
	//$srcby='0';  //no filter
//}


################   SRCKEY   ########################
if (isset($_POST['srckey']) ) {
	$srckey=$_POST['srckey'];
} //else  {
	//$srckey=""; // no filter
//}

if (isset($_GET['iDisplayStart']) && ($_GET['iDisplayStart'] !='0')  ) {
	$displayStart=$_GET['iDisplayStart'];
} else {
	$displayStart=0;
}




?>

<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>


<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>

<!--<script type="text/javascript" src="../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>-->


<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/chosen.css">

<link rel="shortcut icon" href="favicon.ico"/>
<!-- <link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables.css">  
	<link rel="stylesheet" type="text/css" href="extensions/TableTools/css/dataTables.tableTools.css">  -->
	
	
	<style type="text/css" class="init">
	</style>
	<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="extensions/TableTools/js/dataTables.tableTools.js"></script>
	<script type="text/javascript" language="javascript" src="examples/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="examples/resources/demo.js"></script>

<script type="text/javascript" charset="utf-8">


	


$(document).ready( function() {
	
  	$('#list_ticket').dataTable({
		"bFilter": false,
		"bInfo": true,		
		"processing": true,
		"serverSide": true,
	    "sAjaxSource": "../commone/module/server_side/server_processing_edit_inquiry.php?act1=<?php echo "$act1&srcby=$srcby&srckey=$srckey&module=$module&pm=$pm";?>",
		"iDisplayLength": 10,
	  	"iDisplayStart": <?php echo $displayStart;?>
  	});

	


	
	
	
}); // document ready	$(document).ready(function() {
</script> 

<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- /.modal -->
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			

			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			<b>Edit Inquiry </b><small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Inquiry </a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Edit Inquiry</a>
						<i class="fa fa-angle-right"></i>
					</li>
				
				</ul>
				
			</div>

			

 
 






<?php



    if (isset($_GET['message']) && ($_GET['message']=="succUp")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Inquiry has been updated document ...! </strong> </div>";
     }

	if (isset($_GET['message']) && ($_GET['message']=="errUp")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Inquiry Failed Updated...!</strong> </div>";

	}
	


?>



<!-- END SAME AS DASHBOARD --> 



<?php
//if (isset($_GET['act1']) ) {
if ( !isset($_GET['ext']) ) {
?>
			<!-- BEGIN PAGE CONTENT-->
			
			<!-- END PAGE CONTENT-->
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
		
                        
                    <div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">List Inquiry </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>                       


                            <div class="portlet-body form">    
  <form action="" method="POST">                         
                        <div class="form-group">
												
												<div class="col-md-3">
													<select class="form-control select2me" name="srcby" id="srcby" required>
														<option value="">Choose Base On...</option>
														<option value="1" <?php if ($srcby=='1') echo "selected='selected'"; ?>>Ticket Number </option>
														<option value="2" <?php if ($srcby=='2') echo "selected='selected'"; ?>>Customer Name</option>
														<option value="3" <?php if ($srcby=='3') echo "selected='selected'"; ?>>Account Number</option>
														<option value="4" <?php if ($srcby=='4') echo "selected='selected'"; ?>>Credit Card Number</option>
														<option value="5" <?php if ($srcby=='5') echo "selected='selected'"; ?>>ATM Card Number</option>
													</select>
												</div>
											</div>
<div class="input-group col-md-3">
<div class="input-cont">
<input class="form-control" type="text" name="srckey" value="<?php echo $srckey;?>" placeholder="Key Word..." required>
</div>
<!-- TYPE HIDDEN  optional -->
<input type="hidden" name="act1" value="<?php echo $_POST['act1'];?>">
<span class="input-group-btn">
<button class="btn green-haze" type="submit">Search <i class="m-icon-swapright m-icon-white"></i></button>
</span>
</div>
</form>


                    <div class="table-scrollable">
    					<table class="table table-striped table-bordered table-hover" id="list_ticket" width="100%">

							<thead>
								<tr>
								<th style="font-size:12px" width="12%"> TICKET NUMBER / <br> INQUIRY DATE</th>
								<th style="font-size:14px" width="10%">CHANNEL</th>
								<th style="font-size:13px" width="49%">CUSTOMER / CASE / DETAIL</th>
								<th style="font-size:12px" width="10%" align="center">STATUS / PRIORITY</th>
								<th style="font-size:12px" width="12%">SLA</th>
								<th style="font-size:12px" width="7%">ACTION</th>
								</tr>
							</thead>
							<tbody>                   
							</tbody>
						</table>  
   					</div>
                        


							
						</div>
					</div>
		<?php
			}

			?>




<!--  FORM  MEMO -->

<?php
if ( isset($_GET['ext']) && ($_GET['ext'] =="detail")) {

$id=$_GET['tn'];

$query_laporan =" select *,z.name as nama_cabang, c.name as nama_proses,d.name as nama_channel, e.name as nama_product,f.name as nama_unit,g.name as nama_case,h.name as jenis_laporan,g.priority,g.sla,g.satuan,a.extend_sla ,a.id_process from  laporan_kerja a  ";
//$query_laporan.=" left join user_account b on a.id_karyawan=b.id_karyawan ";
$query_laporan.=" left join master_process c on a.id_process=c.id_process ";
$query_laporan.=" left join master_channel d on a.id_channel=d.id_channel ";
$query_laporan.=" left join master_product e on a.id_product=e.id_product ";
$query_laporan.=" left join master_unit f on a.id_unit=f.id_unit ";
$query_laporan.=" left join master_case g on a.id_case=g.id_case ";
$query_laporan.=" left join master_report h on a.id_report=h.id_report ";
$query_laporan.=" left join master_branch z on a.id_cabang=z.id_cabang ";
$query_laporan.=" where a.ticket_number='$id' ";

$result_laporan= pg_query($query_laporan);
$found= pg_num_rows($result_laporan);

if ($found >=1){
$row_lap=pg_fetch_array($result_laporan);



switch ($row_lap['priority']) {
		 case '1' : $priority= " <i class='fa fa-warning font-green'> Normal "; break; //ticket_number
		 case '2' : $priority= " <i class='fa fa-warning font-blue'> Important "; break; //customer_name
		 case '3' : $priority= " <i class='fa fa-warning font-red'> Urgent "; break; //account_number
		 //case '4' : $varsrc= " where credit_card_number='$srckey' "; break; // credit_card_number
		 }
switch ($row_lap['status']) {
		 case '1' : $status= " <button type='button' class='btn btn-circle btn-danger' disabled > <span class='label label-danger'> </i> <b>Unprocessed </b> </span> </button> "; break; //ticket_number
		 case '2' : $status= " <button type='button' class='btn btn-circle btn-info' disabled>  <span class='label label-info'> </i> <b> On Progress </b> </span> </button> "; break; //customer_name
		 case '3' : $status= " <button type='button' class='btn btn-circle btn-success' disabled>  <span class='label label-success'> </i> <b> Done </b> </span> </button> "; break; //account_number
		 //case '4' : $varsrc= " where credit_card_number='$srckey' "; break; // credit_card_number
		 }


$jml_intval=$row_lap['sla']+$row_lap['extend_sla'];
$date_sla=dateSla($row_lap['date_start'],$jml_intval,$row_lap['satuan']);


$batas_sla=dateSla($row_lap['date_start'],$row_lap['sla'],$row_lap['satuan']);


	if (isset($row_lap['call_to_close']) && ($row_lap['call_to_close'] !="") && ($row_lap['call_to_close'])!=NULL && ($row_lap['call_to_close'])=='1'){
			$check="checked='checked'";
	}else{
			$check="";
		}

		if (isset($row_lap['tgl_transaksi']) && $row_lap['tgl_transaksi']!="") {	
			$tgl_transaksi=date('Y-m-d',strtotime($row_lap['tgl_transaksi']));
		} else {
			$tgl_transaksi="";
			}


}


?>
<div class="portlet light grey-steel bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="font-green-haze"></i>
											<span class="caption-subject font-dark-haze bold uppercase">Form Edit Inquiry</span>
											<span class="caption-helper font-red-pink bold">  With Ticket Number : <?php echo $id;?> </span>
										</div>
										
									</div>
									<div class="portlet-body form">




										<!-- BEGIN FORM-->
										<form action="<?php echo "module/actions_master.php?module=$module&pm=$pm&act=edit_inquirysl"; ?>" class="form-horizontal" id="form_sample_3" method="POST">
											<div class="form-body">
											<input type="hidden" name="ticket_number"  value="<?php echo $id; ?>" >
							<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-settings font-green-haze"></i>
											<span class="caption-subject font-green-haze bold ">Basic Information </span>
											<span class="caption-helper">Basic Information Customer...</span>
										</div>
										
									</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Customer Name</label>
															<div class="input-group col-md-6">
															<span class="input-group-addon">
																<i class="fa fa-user"></i>
															</span>
																<input type="text" name="customer_name" id="customer_name" class="form-control" value="<?php echo $row_lap['customer_name']; ?>" placeholder="Customer Name ... ">
																
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Phone </label>
															<div class="input-group col-md-6">
															<span class="input-group-addon">
																<i class="fa fa-phone"></i>
															</span>
																<input type="text" class="form-control" name="phone" id="phone" value="<?php echo $row_lap['phone']; ?>" placeholder="Phone Number ... ">
																
															</div>
														</div>
													</div>
													<!--/span-->
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">No. Credit Card</label>
															<div class="input-group col-md-6">
															<span class="input-group-addon">
																<i class="fa fa-credit-card"></i>
															</span>
																<input type="text" name="credit_card_number" id="credit_card_number" value="<?php echo $row_lap['credit_card_number']; ?>" class="form-control" placeholder="Credit Card Number ... ">
																
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Account Number </label>
															<div class="input-group col-md-6">
															<span class="input-group-addon">
																<i class="fa fa-credit-card"></i>
															</span>
																<input type="text" class="form-control" name="account_number" id="account_number" value="<?php echo $row_lap['account_number']; ?>" placeholder="Account Number... ">
																
															</div>
														</div>
													</div>
													<!--/span-->
												</div>

												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Email </label>
															<div class="input-group col-md-6">
															<span class="input-group-addon">
																<i class="fa fa-envelope"></i>
															</span>
																<input type="text" class="form-control" name="email" id="email" value="<?php echo strtolower($row_lap['email']); ?>" placeholder="Email ...">
																
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">ATM Number </label>
															<div class="input-group col-md-6">
															<span class="input-group-addon">
																<i class="fa fa-credit-card"></i>
															</span>
																<input type="text" class="form-control" name="atm_number" id="atm_number" value="<?php echo $row_lap['atm_number']; ?>" placeholder="ATM Number... ">
																
															</div>
														</div>
													</div>
													<!--/span-->
												</div>

			</div>
			<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-tag font-green-haze"></i>
											<span class="caption-subject font-green-haze bold uppercase">Inquiry Type </span>
											<span class="caption-helper">Product, Unit, Process, Case ...</span>
										</div>
										
									</div>									
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Product</label>
															<div class="input-group col-md-7">
															<span class="input-group-addon">
																<i class="fa fa-gears"></i>
															</span>
																<select class="select2me form-control" name="idproduct" id="idproduct" required>
												<option value="">Choose Product...</option>
												<?php
												$query=" select * from master_product order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($row_lap['id_product']==$row1['id_product']){
													echo " <option value='$row1[id_product]' selected='selected'>$row1[name]</option> ";
												} else {
													echo " <option value='$row1[id_product]'>$row1[name]</option> ";
												}
												}
												


												?>
												
												
											</select>
																
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Unit</label>
															<div class="input-group col-md-7">
															<span class="input-group-addon">
																<i class="fa fa-gears"></i>
															</span>
																<select class="form-control" name="idunit" id="idunit" required>
												<option value="">Choose Unit...</option>
												<?php
												$query=" select * from master_unit order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($row_lap['id_unit']==$row1['id_unit']){
													echo " <option value='$row1[id_unit]' selected='selected'>$row1[name]</option> ";
												} else {
													echo " <option value='$row1[id_unit]'>$row1[name]</option> ";
												}


												}
												


												?>
											</select>
																
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Process </label>
															<div class="input-group col-md-7">
															<span class="input-group-addon">
																<i class="fa fa-gears"></i>
															</span>
																<select class="form-control" name="idproses" id="idproses" required>
												<option value="">Choose Process...</option>
												<?php
												$query=" select * from master_process order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($row_lap['id_process']==$row1['id_process']){
													echo " <option value='$row1[id_process]' selected='selected'>$row1[name]</option> ";
												} else {
													echo " <option value='$row1[id_process]'>$row1[name]</option> ";
												}


												}
												


												?>
											</select>
																
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Case </label>
															<div class="input-group col-md-7">
															<span class="input-group-addon">
																<i class="fa fa-gears"></i>
															</span>
																<select class="form-control" name="idpermasalahan" id="idpermasalahan" required>
												<option value="">Choose Case...</option>
												<?php
												$query=" select * from master_case order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($row_lap['id_case']==$row1['id_case']){
													echo " <option value='$row1[id_case]' selected='selected'>$row1[name]</option> ";
												} else {
													echo " <option value='$row1[id_case]'>$row1[name]</option> ";
												}


												}
												


												?>
											</select>
																
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Cause BI </label>
															<div class="input-group col-md-7">
															<span class="input-group-addon">
																<i class="fa fa-gears"></i>
															</span>
																<select class="form-control select2me" name="idpenyebab" id="idpenyebab" required>
												<option value="">Choose Cause...</option>
												<?php
												$query=" select * from bi_cause order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($row_lap['id_cause_bi']==$row1['id_cause_bi']){
													echo " <option value='$row1[id_cause_bi]' selected='selected'>$row1[name]</option> ";
												} else {
													echo " <option value='$row1[id_cause_bi]'>$row1[name]</option> ";
												}


												}
												


												?>
											</select>
																
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Inquiry Type </label>
															<div class="input-group col-md-7">
															<span class="input-group-addon">
																<i class="fa fa-gears"></i>
															</span>
																<select class="form-control select2me" name="idjenis_laporan" id="idjenis_laporan" required>
												<option value="">Choose Inquiry Type...</option>
												<?php
												$query=" select * from master_report order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($row_lap['id_report']==$row1['id_report']){
													echo " <option value='$row1[id_report]' selected='selected'>$row1[name]</option> ";
												} else {
													echo " <option value='$row1[id_report]'>$row1[name]</option> ";
												}

												}
												


												?>
											</select>
																
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												
												

						</div>


						<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-fire font-green-haze"></i>
											<span class="caption-subject font-green-haze bold uppercase">Additional Information</span>
											<span class="caption-helper">...</span>
										</div>
										
									</div>									
												<div class="form-group">
										<label class="control-label col-md-3">Description<span class="required">
										 </span>
										</label>
										
										<div class="col-md-3">
											<textarea name="keterangan" id="keterangan"   placeholder="Description.." class="form-control" style="width:600px;height:100px;" > <?php echo $row_lap['keterangan'];?></textarea>
											
										</div>

									</div>
								
							<div class="form-group">
										<label class="control-label col-md-3">
										</label>
										<div class="col-md-6">
											<div class="checkbox-list">
												<label>
												<input type="checkbox" value="1" name="call_to_close" <?php echo $check;?>/> <i>Call Customer , if the problem has been Finished </i></label>
												
												
											</div>
											
										</div>
									</div>


							<div class="form-group">
										<label class="control-label col-md-3">Nominal Transaction<span class="required">
										 </span>
										</label>
										<div class="col-md-3">
										<div class="input-group input-medium margin-top-10">
											<span class="input-group-addon">
											<i class="fa fa-money"></i>
											</span>
											<input type="text" name="nominal" id="nominal"  value="<?php echo $row_lap['nominal'];?>" placeholder="Nominal Transaksi" class="form-control" />
										</div>	
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Transaction Date </label>
										<div class="col-md-3">
											<div class="input-group input-medium date date-picker" data-date=""  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
												<input type="text" class="form-control" value="<?php echo $tgl_transaksi;?>" readonly>
												<input type="hidden" name="tanggal_transaksi"  value="<?php echo $tgl_transaksi;?>" class="form-control" >
												<span class="input-group-btn">
												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
											<!-- /input-group -->
											
										</div>
									</div>
									
									<!-- <div class="form-group">
										<label class="control-label col-md-3">Attach File<span class="required">
										 </span>
										</label>
										<div class="col-md-3">
											<input type="file" class="form-control " name="file_attach" id="file_attach"  />
											
										</div>
									</div> -->

						</div>



												<!-- <div class="row" id="input_hidden" style="display: none;" > -->
												<div class="row" id="input_hidden" >	
												</div>
												
												
											</div>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-offset-3 col-md-9">
																<button type="submit" class="btn green">Submit</button>
																<button type="button" class="btn default">Cancel</button>
															</div>
														</div>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>


<?php
}
?>

<!-- END FORM MEMO -->






					<!-- END EXAMPLE TABLE PORTLET-->



					<!-- END VALIDATION STATES-->
			<!-- END PAGE CONTENT-->
			<!-- BEGIN PAGE LEVEL STYLES -->
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script src="assets/admin/pages/scripts/form-validation.js"></script>

<!-- END PAGE LEVEL STYLES -->

<script>
$(document).ready(function() {


		$('.brodcastemail').click(function() {
		var id_numticket = $(this).attr('idx-ticket');

		  $(".loading2").show();

		var dataString1 = 'id='+id_numticket;
		
		//alert(dataString1);

		
		$.ajax({
		type: "POST",
		url: "module/ajax_broadcast_email.php",
		data: dataString1,
		cache: false,
		success: function(html)
		{
			$(".loading2").hide();
			$("#tabel-broadcast").html(html);
		} 
			});	
		
		setTimeout(function(){location="<?php echo $page; ?>"}, 2000);


			  });










	$('#idproses').change(function() {
		var id3=$(this).val();
		var e = document.getElementById("idunit");
		var id2 = e.options[e.selectedIndex].value;
		var e = document.getElementById("idproduct");
		var id = e.options[e.selectedIndex].value;
		var dataString = 'id='+id+'&id2='+id2+'&id3='+id3;
		
		//alert(dataString);
		

		$.ajax({
		type: "POST",
		url: "module/ajax/ajax_acc_case.php",
		data: dataString,
		cache: false,
		success: function(html)
		{
			$("#idpermasalahan").html(html);
		} 
			});	


		});



	$('#idpermasalahan').change(function() {

		var z = document.getElementById("idpermasalahan");
		var id = z.options[z.selectedIndex].value;
		var dataString = 'id='+id;
		//alert(dataString);

		$.ajax({
		type: "POST",
		url: "module/ajax/ajax_mandatory_case.php",
		data: dataString,
		cache: false,
		success: function(html)
		{
			$("#mandatory_case").html(html);
		} 
			});	





		});



	$('#idunit').change(function() {
		var id2=$(this).val();
		var e = document.getElementById("idproduct");
		var id = e.options[e.selectedIndex].value;
		var dataString = 'id='+id+'&id2='+id2;
		
		//alert(dataString);
		$.ajax({
		type: "POST",
		url: "module/ajax/ajax_acc_proses.php",
		data: dataString,
		cache: false,
		success: function(html)
		{
			$("#idproses").html(html);
		} 
			});	

		});





	$('#idproduct').change(function() {
		var id=$(this).val();

		var dataString = 'id='+id;
		
		//alert(dataString1);
		$.ajax({
		type: "POST",
		url: "module/ajax/ajax_acc_unit.php",
		data: dataString,
		cache: false,
		success: function(html)
		{
			$("#idunit").html(html);
		} 
			});	


		$.ajax({
		type: "POST",
		url: "module/ajax/ajax_acc_proses.php",
		data: dataString,
		cache: false,
		success: function(html)
		{
			$("#idproses").html(html);
		} 
			});	


		});



}); // document ready	$(document).ready(function() {

    </script>



 <script>
jQuery('.numbersOnly').keyup(function () {
    this.value = this.value.replace(/[^0-9\.]/g,'');
});

jQuery(document).ready(function () {
    var form1 = $('#form_sample_3');
    var error1 = $('.alert-danger', form1);
    var success1 = $('.alert-success', form1);


    $('#form_sample_3').validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
		ignore: "",
        rules: {
        	
        	customer_name: {
			   required: true	
            },
            nominal: {
			   integer: true	
            },
        	phone: {
			   integer: true	
            },
            credit_card_number: {
			   integer: true	
            },
            account_number: {
			   integer: true	
            },
            email: {
			   email: true	
            },
        	idproduct: {
			   required: true	
            },
            idunit: {
			   required: true	
            },
            idproses: {
			   required: true	
            },
            idpermasalahan: {
			   required: true	
            },
            idpenyebab: {
			   required: true	
            },
        	idjenis_laporan: {
			   required: true	
            }
	
        },
		

        messages: {
        	customer_name: {
			  //integer: true
			   required: "<span class='label label-warning'> <i>Nama Nasabah Wajib </i></span>"	
            },
        	nominal: {
			  //integer: true
			   integer: "<span class='label label-warning'> <i>Nominal Harus Angka.. !</i></span>"	
            },
        	phone: {
			  //integer: true
			   integer: "<span class='label label-warning'> <i>No Tlp Harus Angka.. !</i></span>"	
            },
            credit_card_number: {
			   ///integer: true
			   integer: "<span class='label label-warning'> <i>Credit Card Harus Angka.. !</i></span>"	
            },
            account_number: {
			   //integer: true
			   integer: "<span class='label label-warning'> <i>No Rek. Harus Angka.. !</i></span>"	
            },
            email: {
			  // email: true	
			   email: "<span class='label label-warning'> <i>Harus Format Email.. !</i></span>"
            },
        	idproduct: {
			   required: "<span class='label label-warning'> <i>Product Harus Ada.. !</i></span>"	
            },
            idunit: {
			   required: "<span class='label label-warning'> <i>Unit Harus Ada.. !</i></span>"	
            },
            idproses: {
			   required: "<span class='label label-warning'> <i>Proses Harus Ada.. !</i></span>"	
            },
            idpermasalahan: {
			   required: "<span class='label label-warning'> <i>Permasalahan Harus Ada.. !</i></span>"	
            },
            idpenyebab: {
			   required: "<span class='label label-warning'> <i>Penyebab Harus Ada.. !</i></span>"	
            },
        	idjenis_laporan: {
			   required: "<span class='label label-warning'> <i>Jenis Laporan Harus Ada.. !</i></span>"	
            }
        },

        invalidHandler: function (event, validator) { //display error alert on form submit
            success1.hide();
            $('.alert-danger span').text("Form Belum Komplit, Silahkan cek kembali informasi dibawah ... !");
            $('.alert-danger', $('#form_sample_3')).show();
            Metronic.scrollTo(error1, -200);
        },


    });


});

</script>
			<!-- END PAGE CONTENT-->
						