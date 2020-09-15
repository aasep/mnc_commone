<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);
$page2 = $_SERVER['PHP_SELF']."?";
$current_date = date('Y-m-d');


#################


if (isset($_GET['act']) && $_GET['act']=='src') {
	if (isset($_POST['srcby']) && $_POST['srcby']!=""){
		$srcby=$_POST['srcby'];
	} else {
		$srcby=$_GET['srcby'];
	}
	if (isset($_POST['srckey']) && $_POST['srckey']!=""){
	$srckey=$_POST['srckey'];
	} else{
	$srckey=$_GET['srckey'];	
	}

$varsrc= " where a.call_to_close='1' and a.status='3' ";


} else  {
$varsrc= " where a.call_to_close='1' and a.status='3' ";
//$varsrc= " where a.call_to_ask='1' ";
}


###############










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
	    "sAjaxSource": "../commone/module/server_side/server_processing_forward_inquiry.php?act1=<?php echo "$act1&srcby=$srcby&srckey=$srckey&module=$module&pm=$pm";?>",
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
			<b>Forward Inquiry </b><small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Inquiry </a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Forward Inquiry </a>
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
if ( !isset($_GET['ext'])&& ($_GET['ext'] !="detail") ) {
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

<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Detail Inquiry </span>
											<span class="caption-helper bold"> With Ticket Number : <?php echo $id;?> </span> 
										</div>
										<div class="actions">
											
										</div>
									</div>                       
                            
                            <div class="portlet-body form">
                            
								<div class="table-scrollable">

									<table class="table table-bordered table-hover" width="100%">
									<tr bgcolor="#e1e5ec">
									<td bgcolor="#e1e5ec">
										<span class="caption-subject font-sunglo bold "> <i class="icon icon-settings"> </i> <b>Status Inquiry    </b> <?php echo $status; ?> </span>
									</td>
									<!-- <td width="70%">
										 <b>CHANNEL </b> 
									</td> -->
									</tr>
									</table> 

	
								    <table width="100%" class="table table-bordered table-hover" >
                                   
									<tr>
                                    <td width="20%" bgcolor="#F0F0F0"><b>Inquiry Date</b></td>
                                    <td width="30%"> <?php  echo date('d-m-Y',strtotime($row_lap['date_start'])); ?></td>
                                    <td width="20%" bgcolor="#F0F0F0"><b>Channel</b></td>
                                    <td width="30%"> <?php  echo $row_lap['nama_channel']; ?></td>
									</tr>
									<tr>
                                    <td width="20%" bgcolor="#F0F0F0"><b>SLA </b></td>
                                    <td width="30%"> <?php echo $row_lap['sla']." ".$row_lap['satuan']; ?></td>
                                    <td width="20%" bgcolor="#F0F0F0"><b>Branch</b></td>
                                    <td width="30%"> <?php  echo $row_lap['nama_cabang']; ?></td>
									</tr>
									<tr>
                                    <td width="20%" bgcolor="#F0F0F0"><b>Additional SLA </b></td>
                                    <td width="30%"> <?php  echo $row_lap['extend_sla']." ".$row_lap['satuan']; ?> 

                                    </td>
                                    <td width="20%" bgcolor="#F0F0F0"><b>Limit / Expire</b></td>
                                    <td width="30%"><?php echo date('Y-m-d',strtotime($row_lap['date_sla'])); ?></td>
									</tr>
									
									

									</table>

					



						</div>
					



<div class="table-scrollable">
									<table class="table table-bordered table-hover" width="100%">
									<tr bgcolor="#e1e5ec">
									<td bgcolor="#e1e5ec">
										 <i class="icon icon-settings"></i> <b>  Basic Information Customer</b>
									</td>
									</tr>
									</table>
									
								    <table width="100%" class="table table-bordered table-hover">
                                   
									<tr>
                                    <td width="20%" bgcolor="#F0F0F0"><b>Customer Name</b></td>
                                    <td width="30%"> <?php if (!isset($row_lap['customer_name'])) { echo " - "; } else{ echo $row_lap['customer_name'];} ?></td>
                                    <td width="20%" bgcolor="#F0F0F0"><b>Account Number</b></td>
                                    <td width="30%"> <?php if (!isset($row_lap['account_number'])) { echo " - "; } else{ echo $row_lap['account_number'];} ?></td>
									</tr>
									<tr>
                                    <td width="20%" bgcolor="#F0F0F0"><b>Phone</b></td>
                                    <td width="30%"> <?php if (!isset($row_lap['phone'])) { echo " - "; } else{ echo $row_lap['phone'];} ?></td>
                                    <td width="20%" bgcolor="#F0F0F0"><b>Email</b></td>
                                    <td width="30%"> <?php if (!isset($row_lap['email'])) { echo " - "; } else{ echo $row_lap['email'];} ?></td>
									</tr>
									<tr> 
									<td width="20%" bgcolor="#F0F0F0"><b>Credit Card Number</b></td>
                                    <td width="30%"> <?php if (!isset($row_lap['credit_card_number'])) { echo " - "; } else{ echo $row_lap['credit_card_number'];} ?></td>
                                    <td width="20%" bgcolor="#F0F0F0"><b>ATM Card Number</b></td>
                                    <td width="30%"><?php if (!isset($row_lap['atm_number'])) { echo " - "; } else{ echo $row_lap['atm_number'];} ?></td>
									</tr>
									<tr>
                                    <td width="20%" bgcolor="#F0F0F0"><b>Product </b></td>
                                    <td width="30%"> <?php if (!isset($row_lap['nama_product'])) { echo " - "; } else{ echo $row_lap['nama_product'];} ?></td>
                                    <td width="20%" bgcolor="#F0F0F0"><b>Unit</b></td>
                                    <td width="30%"> <?php if (!isset($row_lap['nama_unit'])) { echo " - "; } else{ echo $row_lap['nama_unit'];} ?></td>
									</tr>
									<tr>
                                    <td width="20%" bgcolor="#F0F0F0"><b>Process </b></td>
                                    <td width="80%" colspan="3"> <?php if (!isset($row_lap['nama_proses'])) { echo " - "; } else{ echo $row_lap['nama_proses'];} ?></td>
                                    
									</tr>
									<tr>
                                    <td width="20%" bgcolor="#F0F0F0"><b>Case </b></td>
                                    <td width="80%" colspan="3"> <?php if (!isset($row_lap['nama_case'])) { echo " - "; } else{ echo $row_lap['nama_case'];} ?></td>
                                    
									</tr>
									<tr> <td width="20%" bgcolor="#F0F0F0"><b>Inquiry Tape </b></td>
                                    <td width="30%"> <?php if (!isset($row_lap['jenis_laporan'])) { echo " - "; } else{ echo $row_lap['jenis_laporan'];} ?></td>
                                    <td width="20%" bgcolor="#F0F0F0"><b>Priority </b></td>
                                    <td width="30%"> <?php echo $priority; ?></td>
									</tr>
									</tr>
									<tr> <td width="20%" bgcolor="#F0F0F0"><b>Nominal Transaction</b></td>
                                    <td width="30%"> <?php if (!isset($row_lap['nominal'])) { echo " - "; } else{ echo $row_lap['nominal'];} ?></td>
                                    <td width="20%" bgcolor="#F0F0F0"><b>Transaction Date</b></td>
                                    <td width="30%"> <?php if (!isset($row_lap['tgl_transaksi'])) { echo " - "; } else{ echo $row_lap['tgl_transaksi'];} ?></td>
									</tr>
									<tr>
                                    <td width="20%" bgcolor="#F0F0F0"><b>Description </b></td>
                                    <td width="80%" colspan="3"> <?php if (!isset($row_lap['keterangan'])) { echo " - "; } else{ echo $row_lap['keterangan'];} ?></td>
                                    
									</tr>
									</table>
									
								
								
									</div>




<a href="#"    data-toggle="modal" data-target="#view-History" class="detailHistory" id-ticketNumber="<?php echo $id;?>"> <button class="btn blue-hoki pull-right"  ><i class="fa fa-history"></i> History Inquiry </button> </a>





</div>
<div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-equalizer font-green-haze"></i>
                                                    <span class="caption-subject font-green-haze bold uppercase">Feedback Forward Case </span>
                                                    <span class="caption-helper"> Confirmation Forward Case ...</span>

                                                </div>

                                            </div>

                                                    
                                        <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form action="<?php echo "module/actions_master.php?module=$module&pm=$pm&act=memo_conf_fwdcase&ds=$_GET[ds]"; ?>" id="form_sample_1" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                    <div class="alert alert-danger display-hide" id="kosong">
										<button class="close" data-close="alert"></button>
										Still Wrong, Please Check form  .... !
									</div>

									<div class="form-group">
                                                <label class="control-label col-md-3">Forward To PIC
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-5">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-cogs"></i>
                                                        </span>
                                                    <select class="form-control " name="id_pic" id="id_pic" >
												<option value="">Choose PIC...</option>
												<?php
												$query=" select * from master_pic order by name asc ";
												$r_pic=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_pic)){

													echo " <option value='$row1[id_pic]'>$row1[name]</option> ";
												}

												?>
											</select>
                                                </div>
                                                </div>
                                            </div>
                                            
                                     <div class="form-group">
										<label class="control-label col-md-3">Attach File<span class="required">
										 </span>
										</label>
										<div class="col-md-3">
											<input type="file" class="form-control " name="file_attach" id="file_attach"  />
											<input type="hidden" class="form-control " name="ticket_number" id="ticket_number"  value="<?php echo $id;?>" />
											<input type="hidden" class="form-control " name="cat" id="cat"  value="<?php echo $_GET[cat];?>" />
											<input type="hidden" class="form-control " name="id_process" id="id_process"  value="<?php echo $row_lap['id_process'];?>" />
										</div>
									</div> 

										
									


									



                                            <div class="form-group">
                                                <label class="control-label col-md-3">Keterangan 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <textarea class="wysihtml5 form-control" rows="6" name="keterangan" id="keterangan" data-error-container="#editor1_error" ></textarea>
                                                    <div id="editor1_error"> </div>
                                                </div>
                                            </div>






                                            <div class="form-actions">
                                            <div class="row">
                                            <div class="col-md-offset-3 col-md-6">

                                                    <button type="submit" class="btn green pull-left" name="act_memo" value="memo" id="submit_conf"> <i class="fa fa-forward"> </i> Submit Memo </button> 
                                                    <!-- <button type="button" class="btn blue pull-center"> Close ticket </button> -->
                                                    <!-- <button type="submit" class="btn red pull-right" name="act_memo" value="close" > <i class="fa fa-arrow-circle-up"> </i> Close ticket </button> -->

												
													 <a href='#'  data-toggle="modal" data-dismiss="modal"  data-target="#view-confirmation"  <button class="btn red pull-right" > <i class="fa fa-arrow-circle-up"> </i> Close Inquiry  </button></a>  
                                                
												</div>
                                                
                                            </div>
                                        </div>
                                        <!-- </form> -->



				
             <!-- END MODAL VIEW -->


<!-- MODAL CONFIRMATION FINISH -->
						<!-- MODAL VIEW-->
							<div class="modal fade"  id="view-confirmation" tabindex="-1"  aria-hidden="true"  role="dialog"  aria-labelledby="myModalLabel">
								<div class="modal-dialog ">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"><b>Verification Close Ticket  </b></h4>

											
											
										</div>
										<div class="modal-body">
											<!-- BEGIN VALIDATION STATES-->
										<div class='alert alert-danger alert-dismissable'>
											Are You Sure Completing this Case ...!
										</div>


					<!-- END VALIDATION STATES-->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn red" data-dismiss="modal"> <i class="fa fa-times"> </i>  No </button>
											<button type="submit" class="btn blue pull-right" name="act_memo" value="close" > <i class="fa fa-arrow-circle-up"> </i> Yes  </button>
										</div>
									</div>
									<!-- /.modal-content -->
									</form>
							<!-- END FORM-->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
             
				
             <!-- END MODAL VIEW -->	
             <!-- END MODAL CONFIRMATION FINISH  -->			 
          











                                    </form>
                                    </div>
 </div>



</div>



<?php
}
?>

<!-- END FORM MEMO -->




<!-- MODAL HISTORY -->
						<!-- MODAL VIEW-->
							<div class="modal fade"  id="view-History" tabindex="-1"  aria-hidden="true"  role="dialog"  aria-labelledby="myModalLabel">
								<div class="modal-dialog modal-full">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"><b>History Inquiry   </b></h4>

											
											
										</div>
										<div class="modal-body">
											<!-- BEGIN VALIDATION STATES-->
										
									<div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-equalizer font-green-haze"></i>
                                                    <span class="caption-subject font-green-haze bold uppercase">List History </span>
                                                   
                                                    <span class="caption-helper bold uppercase" id="idNumticket"></span>
                                                </div>
                                                
                                            </div>
                                    <div class="portlet-body form" id="list_log_history">
                                    
                                                
                                    </div>
                                    </div> 
									

					<!-- END VALIDATION STATES-->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn red" data-dismiss="modal"> Close  </button>
											
										</div>
									</div>
									<!-- /.modal-content -->
									</form>
							<!-- END FORM-->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
             
				
             <!-- END MODAL VIEW -->	
             <!-- END MODAL CONFIRMATION FINISH  -->








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


		
$('.detailHistory').click(function() {
		var id_numticket = $(this).attr('id-ticketNumber');
    
		  //alert(id_numticket);
			$("#idNumticket").empty();
			$("#idNumticket").append( '<strong> Ticket Number : ' + id_numticket +'</strong>');

		



		var dataString1 = 'id='+id_numticket;
		
		//alert(dataString1);
		 $.ajax({
		 type: "POST",
		 url: "module/ajax/ajax_history_inquiry.php",
		 data: dataString1,
		 cache: false,
		 success: function(html)
		 {
		 	$("#list_log_history").html(html);
		 } 
		 	});	



			  });












}); // document ready	$(document).ready(function() {

    </script>


 </script>

 <script>
jQuery(document).ready(function () {
    var form1 = $('#form_sample_1');
    var error1 = $('.alert-danger', form1);
    var success1 = $('.alert-success', form1);
	

    $('#form_sample_1').validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
		ignore: "",
        rules: {
        	keterangan: {
                required: true
                
            }
        },

        messages: {
        	keterangan: {
                 required: "<span class='label label-warning'><i>Keteragan Harus diisi ...! </i></span>"
            }
        },

        invalidHandler: function (event, validator) { //display error alert on form submit   
            success1.hide();
            $('.alert-danger span').text("Form Belum Komplit, Silahkan cek kembali informasi dibawah ... !");
            $('.alert-danger', $('#form_sample_1')).show();
            Metronic.scrollTo(error1, -200);
        },

        
    });


 
	




 
	
});
               
</script>  
