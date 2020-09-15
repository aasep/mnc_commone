<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);
$page2 = $_SERVER['PHP_SELF']."?";
$current_date = date('Y-m-d');
####### Query Belum dikerjakan (status=1 & Sla on) ########
$query1 =" select count(a.id_lapker) as jml1 from laporan_kerja a  ";
$query1.=" left join map_pic b on b.id_case=a.id_case where a.status='1' and b.id_pic='".getIdPic()."' and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' ";

$result1=pg_query($connection,$query1);
$row1=pg_fetch_array($result1);
$count1=$row1['jml1'];
if(!isset($count1) || $count1==NULL) $count1=0;

####### Query sedang dikerjakan (status=2 & Sla on) ########
$query2 =" select count(a.id_lapker) as jml2 from laporan_kerja a  ";
$query2.=" left join map_pic b on b.id_case=a.id_case where a.status='2' and b.id_pic='".getIdPic()."' and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' ";
$result2=pg_query($connection,$query2);
$row2=pg_fetch_array($result2);
$count2=$row2['jml2'];
if(!isset($count2) || $count2==NULL) $count2=0;
####### Query selesai dikerjakan (status=3 )########
$query3 =" select count(a.id_lapker) as jml3 from laporan_kerja a  ";
$query3.=" left join map_pic b on b.id_case=a.id_case where a.status='3' and b.id_pic='".getIdPic()."' ";
$result3=pg_query($connection,$query3);
$row3=pg_fetch_array($result3);
$count3=$row3['jml3'];
if(!isset($count3) || $count3==NULL) $count3=0;
####### Query expire  (status=1 atau 2 & Sla off )########
$query4 =" select count(a.id_lapker) as jml4 from laporan_kerja a  ";
$query4.=" left join map_pic b on b.id_case=a.id_case where a.status in ('1','2') and b.id_pic='".getIdPic()."' and  to_char(date_sla, 'YYYY-MM-DD') < '".$current_date."' ";

$result4=pg_query($connection,$query4);
$row4=pg_fetch_array($result4);
$count4=$row4['jml4'];
if(!isset($count4) || $count4==NULL ) $count4=0;



########################  KLIK STATUS VIEW DASHBOARD  #################################

if (isset($_GET['act1']) ) {


	switch ($_GET['act1']) {
		 case '1' : $varsrc= " where a.status='1' and b.id_pic='".getIdPic()."' and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."'   "; $ket="Unprocessed"; break; //ticket_number
		 case '2' : $varsrc= " where a.status='2' and b.id_pic='".getIdPic()."' and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."'  "; $ket="OnProgress"; break; //customer_name
		 case '3' : $varsrc= " where a.status='3' and b.id_pic='".getIdPic()."' "; $ket="Done"; break; //account_number
		 case '4' : $varsrc= " where a.status in ('1','2') and b.id_pic='".getIdPic()."' and  to_char(date_sla, 'YYYY-MM-DD') < '".$current_date."' "; $ket=" Exipred "; break; // credit_card_number
		 }

}
if (isset($_GET['act1']) ) {
	$act1=$_GET['act1'];
} else if (isset($_POST['act1']) ){
	$act1=$_POST['act1'];
} else {
	$act1="";
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



$jml_total=$count1+$count2+$count3+$count4;
#persen belum
$per_c1=($count1/$jml_total)*100;
#persen sedang
$per_c2=($count2/$jml_total)*100;
#persen selesai
$per_c3=($count3/$jml_total)*100;
#kaladuarsa
$per_c4=($count4/$jml_total)*100;

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
	    "sAjaxSource": "../commone/module/server_side/server_processing_inquiry_list_ver2.php?act1=<?php echo "$act1&srcby=$srcby&srckey=$srckey&module=$module&pm=$pm";?>",
		//"fnServerParams": function (aoData) {
        	//var includeUsuallyIgnored = $("#include-checkbox").is(":checked");
        	//aoData.push({name: "id_pic", value: $("#id_pic").val()});
			//aoData.push({name: "action_status", value: action_status});
			//aoData.push({name: "customer", value: $("#search_customer").val()});
			//aoData.push({name: "jenis", value: $("#search_jenis").val()});
			//aoData.push({name: "id_pic", value: $("#search_pic").val()});
			//aoData.push({name: "infospk", value: $("#infospk").val()});
    	//},
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
			<b>List Inquiry </b><small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Data </a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">List Inquiry</a>
						<i class="fa fa-angle-right"></i>
					</li>
				
				</ul>
				
			</div>

			

 
 <!-- MODAL CONFIRMATION FINISH -->
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








<?php

	if (isset($_GET['message']) && ($_GET['message']=="success_sla")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>SLA Extended ...! </strong> </div>";
     }
	if (isset($_GET['message']) && ($_GET['message']=="error_sla")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Failed to Extend SLA ...!</strong> </div>";
	}
	if (isset($_GET['message']) && ($_GET['message']=="success_attach")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>File Uploaded Successful ...! </strong> </div>";
     }
	if (isset($_GET['message']) && ($_GET['message']=="error_attach")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Failed to upload file...!</strong> </div>";
	}
	if (isset($_GET['message']) && ($_GET['message']=="success_forward")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Inquiry Forwarded ... ! </strong> </div>";
     }
	if (isset($_GET['message']) && ($_GET['message']=="error_forward")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Failed to Forward Inquiry ...!</strong> </div>";

	}

    if (isset($_GET['message']) && ($_GET['message']=="success_memo")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Memo  Added  Successful ...! </strong> </div>";
     }
	if (isset($_GET['message']) && ($_GET['message']=="error_memo")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Failed Memo Updated ...!</strong> </div>";

	}
 if (isset($_GET['message']) && ($_GET['message']=="memo_close")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Inquiry has been closed ...! </strong> </div>";
     }
	if (isset($_GET['message']) && ($_GET['message']=="error")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Laporan gagal diselesaikan...!</strong> </div>";

	}





?>

<?php
if ( !isset($_GET['ext']) && ($_GET['ext'] !="detail")) {


?>
    						
     <div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">List Inquiry</span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>                       
                            
                            <div class="portlet-body form">
                            
								<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					
					<div class="dashboard-stat green-haze">
						<div class="visual">
							<i class="fa fa-comments"></i>
						</div>
						<div class="details">
							<div class="number bold">
								 <?php echo $count3;?>
							</div>
							
							<div class="desc bold">
								 Done <?php echo " ( ".number_format((float)$per_c3, 2, '.', '')." %)";?>
							</div>
						</div>
						<a class="more bold" href="<?php echo "$page&act1=3";?>"  id-action_status="3" >
						VIEW REPORT <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
					
						<div class="visual">
							<i class="fa fa-bar-chart-o"></i>
						</div>
						<div class="details">
							<div class="number bold">
								 <?php echo $count1;?>
							</div>
							<div class="desc bold">
								 Unprocessed <?php echo " ( ".number_format((float)$per_c1, 2, '.', '')." %)";?>
							</div>
						</div>
						<a class="more bold" href="<?php echo "$page&act1=1";?>" id-action_status="1">
						VIEW REPORT <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple-plum">
						<div class="visual">
							<i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number bold">
								<?php echo $count2;?>
							</div>
							<div class="desc bold">
								 On Progress <?php echo " ( ".number_format((float)$per_c2, 2, '.', '')." %)";?>
							</div>
						</div>
						<a class="more bold" href="<?php echo "$page&act1=2";?>" id-action_status="2">
						VIEW REPORT <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					
					<div class="dashboard-stat red-intense">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number bold">
								 <?php echo $count4;?>
							</div>
							<div class="desc bold">
								 Expired <?php echo " ( ".number_format((float)$per_c4, 2, '.', '')." %)";?>
							</div>
						</div>
						<a class="more bold" href="<?php echo "$page&act1=4";?>" id-action_status="4">
						VIEW REPORT <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			</div>

					<div class="table-scrollable">
								<table class="table table-striped table-bordered table-advance table-hover" width="100%">
								<thead>
								<tr>
									<th width="20%">
										<i class="fa fa-briefcase"></i> Channel
									</th>
									<th width="20%" class="hidden-xs">
										 (%)
									</th>
									<th width="15%">
									 <i class="fa fa-check-square"> </i> Done
									</th>
									<th width="15%">
									<i class="fa fa-sign-out"> </i>Unprocessed
									</th>
									<th width="15%">
									<i class="fa fa-refresh"></i> On Progress
									</th>
									<th width="15%">
									<i class="fa fa-warning"></i> Expire
									</th>
								</tr>
								</thead>
								<tbody>
								<?php

								$q_media  = " select id_channel,name from master_channel order by name asc ";
								$res_media= pg_query($connection,$q_media);
								while ($r_media=pg_fetch_array($res_media)){
$countA=0;
$countB=0;
$countC=0;
$countD=0;								####### Query Belum dikerjakan (status=1 & Sla on) ########


$queryA =" select count(a.id_lapker) as jml1 from laporan_kerja a  ";
$queryA.=" left join map_pic b on b.id_case=a.id_case where a.status='1' and b.id_pic='".getIdPic()."' and a.id_channel='$r_media[id_channel]' and to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' ";
								//echo $queryA; die ();
								$resultA=pg_query($connection,$queryA);
								$rowA=pg_fetch_array($resultA);
								$countA=$rowA['jml1'];
								if(!isset($countA)) {$countA=0;}

								####### Query sedang dikerjakan (status=2 & Sla on) ########

$queryB =" select count(a.id_lapker) as jml2 from laporan_kerja a  ";
$queryB.=" left join map_pic b on b.id_case=a.id_case where a.status='2' and b.id_pic='".getIdPic()."' and a.id_channel='$r_media[id_channel]' and to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' ";
								$resultB=pg_query($connection,$queryB);
								$rowB=pg_fetch_array($resultB);
								$countB=$rowB['jml2'];
								if(!isset($countB)) {$countB=0;}
								####### Query selesai dikerjakan (status=3 )########


$queryC =" select count(a.id_lapker) as jml3 from laporan_kerja a  ";
$queryC.=" left join map_pic b on b.id_case=a.id_case where a.status='3' and b.id_pic='".getIdPic()."' and a.id_channel='$r_media[id_channel]' ";
//echo $queryC; die();
								$resultC=pg_query($connection,$queryC);
								$rowC=pg_fetch_array($resultC);
								$countC=$rowC['jml3'];
								if(!isset($countC)) {$countC=0;}
								####### Query expire  (status=1 atau 2 & Sla off )########

$queryD =" select count(a.id_lapker) as jml4 from laporan_kerja a  ";
$queryD.=" left join map_pic b on b.id_case=a.id_case where a.status in ('1','2') and b.id_pic='".getIdPic()."' and a.id_channel='$r_media[id_channel]' and  to_char(date_sla, 'YYYY-MM-DD') < '".$current_date."' ";
								$resultD=pg_query($connection,$queryD);
								$rowD=pg_fetch_array($resultD);
								$countD=$rowD['jml4'];
								if(!isset($countD)) {$countD=0;}

								$per_media=(($countA+$countB+$countC+$countD)/$jml_total)*100;
								
								?>
								<tr>
									<th class="highlight">
										<div class="success">
										</div>
										
									<i class="fa fa-globe"> </i>  <?php echo $r_media['name'];?>
									</th>
									<td class="hidden-xs" align="right">
										 <?php echo " ( ".number_format((float)$per_media, 2, '.', '')." %)";?>
									</td>
									<td align="right">
										 <?php echo $countC;?>
									</td>
									<td align="right">
										<?php echo $countA;?>
									</td>
									<td align="right">
										 <?php echo $countB;?>
									</td>
									<td align="right">
										 <?php echo $countD;?>
									</td>
								</tr>
								<?php
								}
								?>
								</tbody>
								</table>
							</div>




						</div>
					</div>


<?php
} 
?>

<!-- END SAME AS DASHBOARD --> 



<?php
if (isset($_GET['act1']) ) {
?>
			<!-- BEGIN PAGE CONTENT-->
			
			<!-- END PAGE CONTENT-->
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
		
                        
                    <div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Data Inquiry <?php echo $ket;?></span>
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
								<th style="font-size:12px" width="15%"> TICKET NUMBER / <br> INQUIRY DATE</th>
								<th style="font-size:14px" width="10%">CHANNEL</th>
								<th style="font-size:13px" width="45%">CUSTOMER / CASE / DETAIL</th>
								<th style="font-size:12px" width="10%" align="center">STATUS / PRIORITY</th>
								<th style="font-size:12px" width="10%">SLA</th>
								<th style="font-size:12px" width="10%">ACTION</th>
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
                                                    <span class="caption-subject font-green-haze bold uppercase">FORM MEMO </span>
                                                    <span class="caption-helper"> Form Additional Memo ...</span>

                                                </div>

                                            </div>
<?php   
if ($row_lap['status'] !='3') {

?>
                                                    
                                        <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form action="<?php echo "module/actions_master.php?module=$module&pm=$pm&act=addx_memo&ds=$_GET[ds]"; ?>" id="form_sample_1" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                    <div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										Still Wrong, Please Check Again  .... !
									</div>

                                    <!-- <div class="form-group">
                                                <label class="control-label col-md-3">Add SLA
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-2">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    <input type="number" name="ext_addsla" id="ext_addsla" data-required="1" class="form-control" /> </div>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Parameter SLA 
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-3">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-cogs"></i>
                                                        </span>
                                                    <select class="form-control select2" name="param_sla" id="param_sla">
                                                        
                                                        <option value="HK">Hari Kerja (HK) </option>
                                                        <option value="HC">Hari Kalender (HC) </option>
                                                        
                                                    </select>
                                                </div>
                                                </div>
                                            </div>
 -->
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
										<label class="control-label col-md-3">
										</label>
										<div class="col-md-6">
											<div class="checkbox-list">
												<label>
												<input type="checkbox" value="1" name="call_to_ask" /> <strong>Note :</strong> <i>Call customer to gather more information....! </i></label>
												
												
											</div>
											
										</div>
									</div>

											<?php
										if ($row_lap['call_to_close']=='1') {
											?>
									        <div class="form-group">
                                                <label class="control-label col-md-3"> 
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <strong> <i>“ Customer will be contacted when the inquiry has been closed " </i> </strong>
                                                </div>
                                            </div>
											<?php
										}
											?>
											
											
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Keterangan 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <textarea class="wysihtml5 form-control" rows="6" name="keterangan" id="keterangan" data-error-container="#editor1_error" required></textarea>
                                                    <div id="editor1_error"> </div>
                                                </div>
                                            </div>

                                            <div class="form-actions">
                                            <div class="row">
                                            <div class="col-md-offset-3 col-md-6">

                                                    <button type="submit" class="btn green pull-left" name="act_memo" value="memo"> <i class="fa fa-forward"> </i> Submit Memo </button> 
                                                    



                                                    <a href='#'  data-toggle="modal" data-dismiss="modal"  data-target="#view-confirmation">  <button class="btn red pull-right" > <i class="fa fa-arrow-circle-up"> </i> Close Inquiry  </button></a>
                                                </div>
                                                
                                            </div>
                                        </div>




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











                                    <!-- </form> -->
                                    </div>
 </div>

<?php
}

?>


</div>



<?php
}
?>

<!-- END FORM MEMO -->






					<!-- END EXAMPLE TABLE PORTLET-->



<!-- END PAGE LEVEL STYLES -->

<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<!--<script src="assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL STYLES -->
<script src="assets/admin/pages/scripts/form-validation.js"></script>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
//detailConfirmation




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


$(document).on('click', '.detailLaporan', function(){
	//$('.detailLaporan').click(function() {
		var id_numticket = $(this).attr('id-ticket');
		var status = $(this).attr('id-status');
		var id_process = $(this).attr('id-process');
		var nama_satuan = $(this).attr('nm-satuan');
		var call_to_ask = $(this).attr('id-call_to_ask'); 
        //var id_numticket = $(this).attr('id-ticket');
		document.getElementById('conf_ticket_number').value=id_numticket;
		//var id_process = $(this).attr('id-process');
		document.getElementById('conf_id_process').value=id_process;

		document.getElementById('fwd_ticket_number').value=id_numticket;
		document.getElementById('fwd_id_process').value=id_process;

		document.getElementById('fwd_ticket_number2').value=id_numticket;
		document.getElementById('fwd_id_process2').value=id_process;
		
		document.getElementById('numticket').value=id_numticket;

		if (call_to_ask =='0'){

			$(".call_to_ask").empty();
			$(".call_to_ask").append( '<input type="checkbox" value="1" name="call_to_ask"/> Please call customer  to gather more information   ');
		}else if (call_to_ask =='2'){

			$(".call_to_ask").empty();
			$(".call_to_ask").append( '<div class="alert alert-success alert-dismissable"><blink> <center>I have already called customer </center></blink></div>');
			$(".call_to_ask").append( '<input type="checkbox" value="1" name="call_to_ask"/> Please call customer  to gather more information ');
		} else{
			$(".call_to_ask").empty();
			$(".call_to_ask").append( '<div class="alert alert-danger alert-dismissable"><blink> <center><b>Note : Call customer to gather more information....!</b> </center></blink></div>');
			$(".call_to_ask").append( '<input type="checkbox" value="2" name="call_to_ask"/> I have already called customer ');
		}


		if (nama_satuan =='HK'){
			satuan='Hari Kerja';
		} else{
			satuan='Hari Kalender';
		}

    		$("#idsatuan").empty();
			$("#idsatuan").append( '<option value="'+nama_satuan+'">'+ satuan +' </option>');
		  
		 
		  //alert(id_user);
			$(".id-numticket").empty();
			$(".id-numticket").append( '<strong> Ticket Number : ' + id_numticket +'</strong>');
			$(".in-numticket").empty();
			$(".in-numticket").append( '<input type="hidden" name="num_ticket" value="'+id_numticket+'">');
			$(".in-process").empty();
			$(".in-process").append( '<input type="hidden" name="id_process" value="'+id_process+'">');


			if ( status =='3' ) {
				$(".btn-confirm").empty();
				$(".btn-confirm").append( '<input type="submit" value="Add Memo" class="btn blue" />');
			} else {
				$(".btn-confirm").empty();
				$(".btn-confirm").append( '<input type="submit" value="Add Memo" class="btn blue" />' + 
				'<a href="#"  data-toggle="modal" id-ticket='+id_numticket+' id-process='+id_process+'  data-dismiss="modal" data-target="#view-confirmation" class="detailConfirmation"> <button class="btn red pull-right"><i class="fa fa-check-square-o"></i> Finish Inquiry [ close ticket ]</button> </a>');
			}
			/*
			$(".btn-confirm").empty();
			$(".btn-confirm").append( '<input type="submit" value="Tambah Memo" class="btn blue" />' + 
				'<a href="#"  data-toggle="modal" id-ticket='+id_numticket+' id-process='+id_process+'  data-dismiss="modal" data-target="#view-confirmation" class="detailConfirmation"> <button class="btn red pull-right"><i class="fa fa-check-square-o"></i> Laporan Selesai</button> </a>');
			*/


		var dataString2 = 'id='+id_numticket;
		
		//alert(dataString1);
		$.ajax({
		type: "POST",
		url: "module/ajax_tambah_laporan.php",
		data: dataString2,
		cache: false,
		success: function(html)
		{
			$("#tabel-memo2").html(html);
		} 
			});	



			  });

}); // document ready	$(document).ready(function() {

    </script>

 <script>
jQuery(document).ready(function () {
    var form1 = $('#form_sample_src');
    var error1 = $('.alert-danger', form1);
    var success1 = $('.alert-success', form1);
	

    $('#form_sample_src').validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
		ignore: "",
        rules: {
        	srcby: {
                required: true
                
            },
            srckey: {
                required: true
                
            }
        },

        messages: {
        	srcby: {
                 required: "<span class='label label-warning'><i>Pilih Jenis Pencarian ...! </i></span>"
            },
            srckey: {
                 required: "<span class='label label-warning'><i>Kata Kunci Harus diisi ...! </i></span>"
            }
        },

        invalidHandler: function (event, validator) { //display error alert on form submit   
            success1.hide();
            $('.alert-danger span').text("Form Belum Komplit, Silahkan cek kembali informasi dibawah ... !");
            $('.alert-danger', $('#form_sample_src')).show();
            Metronic.scrollTo(error1, -200);
        },

        
    });


     $('#form_sample_1').validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
		ignore: "",
        rules: {
        	keterangan: {
                required: true
                
            },
            ext_addsla: {
                number: true
                
            },
        },

        messages: {
        	keterangan: {
                 required: "<span class='label label-warning'><i>Keterangan / deskripsi Memo Wajib Diisi ...! </i></span>"
            },
            ext_addsla: {
                 number: "<span class='label label-warning'><i>Harus Berupa Angka 0-9 ...! </i></span>"
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
<script type="text/javascript">
  function blink() {
  var blinks = document.getElementsByTagName('blink');
  for (var i = blinks.length - 1; i >= 0; i--) {
  var s = blinks[i];
  s.style.visibility = (s.style.visibility === 'visible') ? 'hidden' : 'visible';
}
window.setTimeout(blink, 500);
}
if (document.addEventListener) document.addEventListener("DOMContentLoaded", blink, false);
else if (window.addEventListener) window.addEventListener("load", blink, false);
else if (window.attachEvent) window.attachEvent("onload", blink);
else window.onload = blink;
</script>