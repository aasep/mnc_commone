<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$current_date = date('Y-m-d');
//error_reporting(1);
if (isset($_GET['act']) && $_GET['act']=='src'){

//product B
	if(isset($_POST['idproduct']) && $_POST['idproduct']<>"") { 
	$idproduct=$_POST['idproduct'];
	$var_product=" where a.id_product='$idproduct' ";
	$var_product1=" and a.id_product='$idproduct' ";
} elseif(isset($_GET['idproduct']) && $_GET['idproduct']<>"") {
	$idproduct=$_GET['idproduct']; 
	$var_product=" where a.id_product='$idproduct' ";
	$var_product1=" and a.id_product='$idproduct' ";
} else { 	$var_product=" ";
			$var_product1="  ";}


//unit C
if(isset($_POST['idunit']) && $_POST['idunit']<>"") { 
	$idunit=$_POST['idunit']; 
	$var_unit=" and  a.id_unit='$idunit' ";
} elseif(isset($_GET['idunit']) && $_GET['idunit']<>"") {
	$idunit=$_GET['idunit']; 
	$var_unit=" and  a.id_unit='$idunit' ";
} else {
	$var_unit=" ";
}
//prosess D
	if(isset($_POST['idproses']) && $_POST['idproses']<>"") { 
	$idproses=$_POST['idproses'];
	$var_proses=" and  a.id_process='$idproses' ";
} elseif(isset($_GET['idproses']) && $_GET['idproses']<>"") {
	$idproses=$_GET['idproses']; 
	$var_proses=" and  a.id_process='$idproses' ";
}else{
	$var_proses="  ";
}
//permasalahan E
if(isset($_POST['idpermasalahan'])&& $_POST['idpermasalahan']<>"") { 
	$idpermasalahan=$_POST['idpermasalahan'];
	$var_case=" and  a.id_case='$idpermasalahan' ";
} elseif(isset($_GET['idpermasalahan'])&& $_GET['idpermasalahan']<>""){
	$idpermasalahan=$_GET['idpermasalahan']; 
	$var_case=" and  a.id_case='$idpermasalahan' ";
}else{
	$var_case=" ";
}
//penyebab F
if(isset($_POST['idpenyebab'])&& $_POST['idpenyebab']<>"") { 
	$idpenyebab=$_POST['idpenyebab'];
	$var_cause=" and  a.id_cause_bi='$idpenyebab' ";
} elseif(isset($_GET['idpenyebab'])&& $_GET['idpenyebab']<>"") {
	$idpenyebab=$_GET['idpenyebab']; 
	$var_cause=" and  a.id_cause_bi='$idpenyebab' ";
}else{
	$var_cause="  ";
}
//jenis laporan G
if(isset($_POST['idjenis_laporan'])&& $_POST['idjenis_laporan']<>"") { 
	$idjenis_laporan=$_POST['idjenis_laporan'];
	$var_jslaporan=" and a.id_report='$idjenis_laporan' ";
} elseif(isset($_GET['idjenis_laporan'])&& $_GET['idjenis_laporan']<>"") {
	$idjenis_laporan=$_GET['idjenis_laporan']; 
	$var_jslaporan=" and a.id_report='$idjenis_laporan' ";
}else{
	$var_jslaporan=" ";
}
//from
	
	//$var_to=" and  ";
if ( (isset($_POST['from'])&& $_POST['from']<>"") || (isset($_POST['to'])&& $_POST['to']<>"")){
$from=$_POST['from'];
	//$var_from=" and  ";
//to
	$to=$_POST['to'];
	if ($from==$to){
				$varperiode=" and to_char(a.date_start, 'YYYY-MM-DD') ='".$from."'";
	}	else {
				$varperiode=" and to_char(a.date_start, 'YYYY-MM-DD') between '".$from."' and '".$to."'";
		}
} elseif ( (isset($_GET['from'])&& $_GET['from']<>"") || (isset($_GET['to'])&& $_GET['to']<>"")) {
	$from=$_GET['from']; 
	$to=$_GET['to']; 
	if ($from==$to){
				$varperiode=" and to_char(a.date_start, 'YYYY-MM-DD') ='".$from."'";
	}	else {
				$varperiode=" and to_char(a.date_start, 'YYYY-MM-DD') between '".$from."' and '".$to."'";
		}
	
	
} else {
	$varperiode=" ";
}
//channel H
if(isset($_POST['idchannel'])&& $_POST['idchannel']<>"") { 
$idchannel=$_POST['idchannel'];
$var_channel=" and a.id_channel='$idchannel' ";
} else {
$var_channel="";	
}


	$ket=" Filter ";
} else {
$var_product="";
//unit
$var_unit="";
//unit
//prosess
$var_proses="";
//permasalahan
$var_case="";
//penyebab
$var_cause="";
//jenis laporan
$var_jslaporan="";
//from
$var_from="";
//to
$var_to="";
//channel
$var_channel="";
	$ket=" All ";
$varperiode="";
//$varperiode1="";
}

####### Query Belum dikerjakan (status=1 & Sla on) ########
$query1 =" select count(a.id_lapker) as jml1 from laporan_kerja a  where a.status='1'  and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' ";
$query1.=" $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";

$result1=pg_query($connection,$query1);
$row1=pg_fetch_array($result1);
$count1=$row1['jml1'];
if(!isset($count1)) $count1=0;

####### Query sedang dikerjakan (status=2 & Sla on) ########
$query2 =" select count(a.id_lapker) as jml2 from laporan_kerja a  where a.status='2'  and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' ";
$query2.=" $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";
$result2=pg_query($connection,$query2);
$row2=pg_fetch_array($result2);
$count2=$row2['jml2'];
if(!isset($count2)) $count2=0;
####### Query selesai dikerjakan (status=3 )########
$query3 =" select count(a.id_lapker) as jml3 from laporan_kerja a where a.status='3' ";
$query3.=" $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";
$result3=pg_query($connection,$query3);
$row3=pg_fetch_array($result3);
$count3=$row3['jml3'];
if(!isset($count3)) $count3=0;
####### Query expire  (status=1 atau 2 & Sla off )########
$query4 =" select count(a.id_lapker) as jml4 from laporan_kerja a  where a.status in ('1','2')  and  to_char(a.date_sla, 'YYYY-MM-DD') < '".$current_date."' ";
$query4.=" $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";
//echo $query4;
$result4=pg_query($connection,$query4);
$row4=pg_fetch_array($result4);
$count4=$row4['jml4'];
if(!isset($count4)) $count4=0;

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
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>




<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- /.modal -->
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			

			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			  Dashboard  <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Monitoring</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#"> Dashboard </a>
						<i class="fa fa-angle-right"></i>
					</li>
				
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
         

               <!-- MODAL VIEW-->
               <?php if (isset($_GET['showdet']) && ($_GET['showdet']=='1' || $_GET['showdet']=='2' || $_GET['showdet']=='3' || $_GET['showdet']=='4')&& ($_GET['act']=='src')) { 

               	switch ($_GET['showdet']) {
								 case '1' : $title= " Selesai Ditangani"; $var_modal=" and a.status='3' "; break; 
		 						 case '2' : $title= " Belum Ditangani"; $var_modal=" and a.status='1'  and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."'  "; break; 
		 						 case '3' : $title= " Sedang Ditangani"; $var_modal=" and a.status='2'  and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' "; break; 
		 						 case '4' : $title= " Kadaluarsa ";$var_modal=" and a.status in ('1','2')  and  to_char(a.date_sla, 'YYYY-MM-DD') < '".$current_date."' "; break; 
		
		 							}
               	?>

							<div class="modal show"  id="view-confirmation" tabindex="-1"  aria-hidden="true"  role="dialog"  aria-labelledby="myModalLabel">
								<div class="modal-dialog modal-lg ">
									<div class="modal-content">
										<div class="modal-header">
											<a href="<?php echo "$page&act=src&idproduct=$idproduct&idunit=$idunit&idproses=$idproses&idpermasalahan=$idpermasalahan&idpenyebab=$idpenyebab&idjenis_laporan=$idjenis_laporan&from=$from&to=$to";?>"><button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button></a>
											<h4 class="modal-title"><b>List Inquiry <?php echo " ".$title." "."Periode : $from s/d $to ";?></b></h4>

											
											
										</div>
										<div class="modal-body">
										
											<!-- BEGIN VALIDATION STATES-->
                                            <!--
											<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Dashboard Data Inquiry   
							</div>
							<div class="tools">
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
                        </div> -->
                        
                        
                        
                        <div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Dashboard Data Inquiry</span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
						<div class="portlet-body form">
										
										<table class="table table-striped table-bordered table-hover" id="sample_1">
							
							<thead>
							<tr>
								<th style="font-size:11px" width="10%">
									 Ticket Number/<br>Date Time
								</th>
								
								<th  style="font-size:11px" width="10%">
									 Channel /<br>Customer Name
								</th>
								<th style="font-size:11px" width="40%">
									 Unit / Process / Case
								</th>
								<th style="font-size:11px" width="30%">
									 Description
								</th>
								
								<th style="font-size:11px" width="10%">
									 Limit/<br> Expire
								</th>
								
							</tr>
							</thead>
							<tbody>
							<?php
							$i=1;
                            $query_modal  =" select *,c.name as nama_unit, d.name as nama_proses, e.name as permasalahan, h.name as nama_channel,e.priority,e.satuan from laporan_kerja a  ";
                            $query_modal .=" left join master_product b on b.id_product=a.id_product ";
                            $query_modal .=" left join master_unit c  on c.id_unit=a.id_unit ";
                            $query_modal .=" left join master_process d  on d.id_process=a.id_process ";
                            $query_modal .=" left join master_case e  on e.id_case=a.id_case";
                            $query_modal .=" left join bi_cause f on f.id_cause_bi=a.id_cause_bi ";
                            $query_modal .=" left join master_report g on g.id_report=a.id_report ";
                            $query_modal .=" left join master_channel h on h.id_channel=a.id_channel ";
                            $query_modal .=" $var_product  $var_unit $var_proses $var_case $var_cause $var_jslaporan $var_channel $var_modal $varperiode  ";
                            //echo $query_modal;
                            
                            $result_mod=pg_query($connection,$query_modal);
                            while ($row_mod=pg_fetch_array($result_mod)) {
                             
                             $jml_intval=$row_mod['sla']+$row_mod['extend_sla'];
                             $date_sla=dateSla($row_mod['date_start'],$jml_intval,$row_mod['satuan']);
                             //$batas_sla=dateSla($row_lap['date_start'],$row_lap['sla'],$row_lap['satuan']);
                             //class='detail-sumRO'
                             switch ($row['priority']) {
								 case '1' : $priority= " <i class='fa fa-warning font-green'></i> <i> Normal </i>"; break; //ticket_number
		 						 case '2' : $priority= " <i class='fa fa-warning font-blue'></i> <i> Important </i>"; break; //customer_name
		 						 case '3' : $priority= " <i class='fa fa-warning font-red'></i> <i> Urgent </i>"; break; //account_number
		 
		 							}
		 					/*		
                            if ( ($row_mod['status']=='1') && (date('Y-m-d',strtotime($row_mod['date_sla'])) >= $current_date) ){
		 						$status_lap_mod= "  <span class='label label-danger'> <i> Belum Ditangani </i> </span>  ";
		 					} elseif(($row_mod['status']=='2') && (date('Y-m-d',strtotime($row_mod['date_sla'])) >= $current_date) ){
		 						$status_lap_mod= "  <span class='label label-info'> <i> Sedang Ditangani </i> </span> ";
		 					}elseif(($row_mod['status']=='3')){
		 						$status_lap_mod= "  <span class='label label-success'> <i> Selesai Ditangani </i> </span> ";
		 					}elseif((($row_mod['status']=='1')||($row_mod['status']=='2')) && (date('Y-m-d',strtotime($row_mod['date_sla'])) < $current_date)){	
						 		$status_lap_mod= "  <span class='label label-warning'> <i> Kadaluarsa </i> </span> ";
						 	}
						 	*/
							echo "<tr>";
							echo "<td style='font-size:11px'><b>$row_mod[ticket_number] <br>".date('d-m-Y H:i',strtotime($row_mod['date_start']))."</b></td>";
							echo "<td style='font-size:11px'><b>Call Center</b><br>$row_mod[customer_name]</td>";
							echo "<td style='font-size:11px'><b>$row_mod[nama_unit]</b><br>$row_mod[nama_proses]<br><i>$row_mod[permasalahan]</i></td>";
							echo "<td style='font-size:11px'>$row_mod[keterangan]</td>";
							echo "<td style='font-size:11px' align='center'>$jml_intval  $row_mod[satuan] <br>".$date_sla."</td>";
							
							echo "</tr>";
							$i++;
							
									}
							?>


							</tbody>
							</table>
							</div>
							</div>
							
									
									

					<!-- END VALIDATION STATES-->
										</div>
										<div class="modal-footer">
											<a href="<?php echo "$page&act=src&idproduct=$idproduct&idunit=$idunit&idproses=$idproses&idpermasalahan=$idpermasalahan&idpenyebab=$idpenyebab&idjenis_laporan=$idjenis_laporan&from=$from&to=$to";?>"><button type="button" class="btn red" data-dismiss="modal">Close</button></a>
											
										</div>
									</div>
									<!-- /.modal-content -->
									
							<!-- END FORM-->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
             
				
             <!-- END MODAL VIEW -->	
             
              <?php } ?>










							
               <div class="table-scrollable">
								<table class="table table-bordered table-hover" width="100%">
									<tbody><tr class="active">
									<td>
										 <b> Filter  </b>
									</td>
									</tr>
									</table>



							<form action="<?php echo $page."&act=src";?>" id="form_sample_3" class="form-horizontal" method="POST">
								
							<table width="100%">
                                   <tr>
                                   <td width="50%" >&nbsp;
									
									</td>
									<td width="50%" >&nbsp;
									
									</td>
									</tr>
									<tr>
                                   <td width="50%" >
									<div class="form-group">
										<label class="control-label col-md-3">Product<span class="required">
										* </span>
										</label>
										<div class="col-md-6">
											<select class="form-control select2me" name="idproduct" id="idproduct" required>
												<option value="">Choose Product...</option>
												<?php
												$query=" select * from master_product order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($idproduct==$row1['id_product']){
														echo " <option value='$row1[id_product]' selected='selected'>$row1[name]</option> ";
													} else {
														echo " <option value='$row1[id_product]'>$row1[name]</option> ";
													}
												}
												?>
												
												
											</select>
										</div>
									</div>
									</td>
									<td width="50%" >
									<div class="form-group">
										<label class="control-label col-md-4">Unit <span class="required">
										 </span>
										</label>
										<div class="col-md-6">
											<select class="form-control" name="idunit" id="idunit" >
												<option value="">Choose Unit...</option>
												<?php
												$query=" select * from master_unit order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($idunit==$row1['id_unit']){
														echo " <option value='$row1[id_unit]' selected='selected'>$row1[name]</option> ";
													} else {
														echo " <option value='$row1[id_unit]' >$row1[name]</option> ";
													}

												}
												


												?>
											</select>
										</div>
									</div>
									</td>
									</tr>
									
									<tr>
									<td>
									<div class="form-group">
										<label class="control-label col-md-3">Process<span class="required">
										 </span>
										</label>
										<div class="col-md-8">
											<select class="form-control" name="idproses" id="idproses" >
												<option value="">Choose Process...</option>
												<?php
												$query=" select * from master_process order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($idproses==$row1['id_process']){
														echo " <option value='$row1[id_process]' selected='selected'>$row1[name]</option> ";

													} else {
														echo " <option value='$row1[id_process]'>$row1[name]</option> ";
													}
												}
												


												?>
											</select>
										</div>
									</div>
									</td>
									<td>
									<div class="form-group">
										<label class="control-label col-md-4">Case <span class="required">
										 </span>
										</label>
										<div class="col-md-6">
											<select class="form-control" name="idpermasalahan" id="idpermasalahan" >
												<option value="">Choose Case...</option>
												<?php
												$query=" select * from master_case order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($idpermasalahan==$row1['id_case']){
														echo " <option value='$row1[id_case]' selected='selected'>$row1[name]</option> ";
													} else {
														echo " <option value='$row1[id_case]'>$row1[name]</option> ";
													}

												}
												


												?>
											</select>
										</div>
									</div>
									</td>
									</tr>
									
									<tr>
									<td>
									<div class="form-group">
										<label class="control-label col-md-3">Cause <span class="required">
										 </span>
										</label>
										<div class="col-md-8">
											<select class="form-control select2me" name="idpenyebab" id="idpenyebab" >
												<option value="">Choose Cause...</option>
												<?php
												$query=" select * from bi_cause order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($idpenyebab==$row1['id_cause_bi']){
														echo " <option value='$row1[id_cause_bi]' selected='selected'>$row1[name]</option> ";
													} else {
														echo " <option value='$row1[id_cause_bi]'>$row1[name]</option> ";
													}

												}
												


												?>
											</select>
										</div>
									</div>
									</td>
									<td>
									<div class="form-group">
										<label class="control-label col-md-4">Inquiry Type 
										</label>
										<div class="col-md-6">
											<select class="form-control select2me" name="idjenis_laporan" id="idjenis_laporan" >
												<option value="">Choose Type...</option>
												<?php
												$query=" select * from master_report order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($idjenis_laporan==$row1['id_report']){
														echo " <option value='$row1[id_report]' selected='selected'>$row1[name]</option> ";
													} else {
														echo " <option value='$row1[id_report]'>$row1[name]</option> ";
													}
												}
												?>
											</select>
										</div>
									</div>


									
									</td>
									</tr>
									
									<tr>
									<td>
									<div class="form-group">
										<label class="control-label col-md-3">Periode <span class="required">
										* </span></label>
										<div class="col-md-6">
											<div class="input-group input-large date-picker input-daterange" data-date="" data-date-format="yyyy-mm-dd">
												<input type="text" class="form-control" name="from" value="<?php echo $from;?>" required="required">
												<span class="input-group-addon">
												to </span>
												<input type="text" class="form-control" name="to" value="<?php echo $to;?>" required="required">
											</div>
											<!-- /input-group -->
											
										</div>
									</div>

									
									</td>

									<td>
									
									
										<button class="btn blue " type="submit"> Show Data <i class="fa  fa-sign-out"></i> </button>
									
									</td>
									</tr>
									<tr>
                                   <td width="50%" >&nbsp;
									
									</td>
									<td width="50%" >&nbsp;
									
									</td>
									</tr>
									
									<tr>
                                   <td width="50%" >&nbsp;
									
									</td>
									<td width="50%" >&nbsp;
									
									</td>
									</tr>
									
									</table>
									</form>	
									</div>




						<?php if (isset($_GET['act']) && $_GET['act']=='src') {?>
						<!--<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Dashboard Data Inquiry  
							</div>
							<div class="tools">
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div> -->
                        
                        <div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Dashboard Data Inquiry</span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
                        
                        
						<div class="portlet-body">
							
								<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					
					<div class="dashboard-stat green-haze">
						<div class="visual">
							<i class="fa fa-comments"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $count3;?>
							</div>
							
							<div class="desc">
								 Done <?php echo " ( ".number_format((float)$per_c3, 2, '.', '')." %)";?>
							</div>
						</div>
						<a class="more" href="<?php echo "$page&act=src&showdet=1&idproduct=$idproduct&idunit=$idunit&idproses=$idproses&idpermasalahan=$idpermasalahan&idpenyebab=$idpenyebab&idjenis_laporan=$idjenis_laporan&from=$from&to=$to";?>">
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
							<div class="number">
								 <?php echo $count1;?>
							</div>
							<div class="desc">
								 Unprocessed <?php echo " ( ".number_format((float)$per_c1, 2, '.', '')." %)";?>
							</div>
						</div>
						<a class="more" href="<?php echo "$page&act=src&showdet=2&idproduct=$idproduct&idunit=$idunit&idproses=$idproses&idpermasalahan=$idpermasalahan&idpenyebab=$idpenyebab&idjenis_laporan=$idjenis_laporan&from=$from&to=$to";?>">
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
							<div class="number">
								<?php echo $count2;?>
							</div>
							<div class="desc">
								 On Progress <?php echo " ( ".number_format((float)$per_c2, 2, '.', '')." %)";?>
							</div>
						</div>
						<a class="more" href="<?php echo "$page&act=src&showdet=3&idproduct=$idproduct&idunit=$idunit&idproses=$idproses&idpermasalahan=$idpermasalahan&idpenyebab=$idpenyebab&idjenis_laporan=$idjenis_laporan&from=$from&to=$to";?>">
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
							<div class="number">
								 <?php echo $count4;?>
							</div>
							<div class="desc">
								 Expired <?php echo " ( ".number_format((float)$per_c4, 2, '.', '')." %)";?>
							</div>
						</div>
						<a class="more" href="<?php echo "$page&act=src&showdet=4&idproduct=$idproduct&idunit=$idunit&idproses=$idproses&idpermasalahan=$idpermasalahan&idpenyebab=$idpenyebab&idjenis_laporan=$idjenis_laporan&from=$from&to=$to";?>">
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

								####### Query Belum dikerjakan (status=1 & Sla on) ########
								$queryA =" select count(a.id_lapker) as jml1 from laporan_kerja a  where a.status='1' and a.id_channel='$r_media[id_channel]' and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";
								//echo $queryA;
								$resultA=pg_query($connection,$queryA);
								$rowA=pg_fetch_array($resultA);
								$countA=$rowA['jml1'];
								if(!isset($countA)) {$countA=0;}

								####### Query sedang dikerjakan (status=2 & Sla on) ########
								$queryB =" select count(a.id_lapker) as jml2 from laporan_kerja a  where a.status='2' and a.id_channel='$r_media[id_channel]' and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";
								$resultB=pg_query($connection,$queryB);
								$rowB=pg_fetch_array($resultB);
								$countB=$rowB['jml2'];
								if(!isset($countB)) {$countB=0;}
								####### Query selesai dikerjakan (status=3 )########
								$queryC =" select count(a.id_lapker) as jml3 from laporan_kerja a where a.status='3' and a.id_channel='$r_media[id_channel]' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";
								$resultC=pg_query($connection,$queryC);
								$rowC=pg_fetch_array($resultC);
								$countC=$rowC['jml3'];
								if(!isset($countC)) {$countC=0;}
								####### Query expire  (status=1 atau 2 & Sla off )########
								$queryD =" select count(a.id_lapker) as jml4 from laporan_kerja a  where a.status in ('1','2') and a.id_channel='$r_media[id_channel]' and  to_char(date_sla, 'YYYY-MM-DD') < '".$current_date."' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";

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


					 <div class="table-scrollable">
					 
					<table class="table table-striped table-bordered table-hover" id="sample_2" width="100%">
							<thead>
							<tr class='active'>
								<th style="font-size:11px" width="5%">
									 No
								</th>
								<th style="font-size:11px" width="55%">
									 Unit / Process / Case
								</th>
								<th  style="font-size:11px" width="10%">
									 Done
								</th>
								<th style="font-size:11px" width="10%">
									 Unprocessed
								</th>
								<th style="font-size:11px" width="10%">
									 On Progress
								</th>
								<th style="font-size:11px" width="10%">
									 Expired
								</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$i=1;
                            $q_unit  =" select distinct (b.id_unit),b.name as nama_unit from laporan_kerja a, master_unit b where a.id_unit=b.id_unit $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode order by b.name asc ";
                            $res_unit=pg_query($connection,$q_unit);
                          
                            while ($row_unit=pg_fetch_array($res_unit)) {
                            echo "<tr >";
							echo "<td style='font-size:11px'></td>";
							echo "<td style='font-size:13px'><b>$row_unit[nama_unit]</b></td>";
							echo "<td style='font-size:11px'></td>";
							echo "<td style='font-size:11px'></td>";
							echo "<td style='font-size:11px'></td>";
							echo "<td style='font-size:11px'></td>";
							echo "</tr>";

                            	$q_proses  =" select distinct (b.id_process),b.name as nama_proses from laporan_kerja a, master_process b ";	
                            	$q_proses .=" where a.id_process=b.id_process and a.id_unit='$row_unit[id_unit]' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode order by b.name asc  ";
                            	$res_proses=pg_query($connection,$q_proses);
                            	while ($row_proses=pg_fetch_array($res_proses)) {

                            	echo "<tr class='success'>";
								echo "<td style='font-size:11px'></td>";
								echo "<td style='font-size:11px'><i><b>$row_proses[nama_proses]</b></i></td>";
								echo "<td style='font-size:11px'></td>";
								echo "<td style='font-size:11px'></td>";
								echo "<td style='font-size:11px'></td>";
								echo "<td style='font-size:11px'></td>";
								echo "</tr>";

								$q_case  =" select distinct (b.id_case),b.name as nama_case from laporan_kerja a, master_case b ";	
                            	$q_case .=" where a.id_case=b.id_case and a.id_unit='$row_unit[id_unit]'  and a.id_process='$row_proses[id_process]' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode order by b.name asc  ";
                            	$res_case=pg_query($connection,$q_case);
                            		$z=1;
                            		while ($row_case=pg_fetch_array($res_case)) {

                            		####### Query Belum dikerjakan (status=1 & Sla on) ########
								$q_belum =" select count(a.id_lapker) as jml1 from laporan_kerja a  where a.status='1' and a.id_case='$row_case[id_case]' and a.id_unit='$row_unit[id_unit]'  and a.id_process='$row_proses[id_process]' and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";

								$res_belum=pg_query($connection,$q_belum);
								$row_belum=pg_fetch_array($res_belum);
								$count_belum=$row_belum['jml1'];
								if(!isset($count_belum)) {$count_belum=0;}

								####### Query sedang dikerjakan (status=2 & Sla on) ########
								$q_sedang =" select count(a.id_lapker) as jml2 from laporan_kerja a  where a.status='2' and a.id_case='$row_case[id_case]' and a.id_unit='$row_unit[id_unit]'  and a.id_process='$row_proses[id_process]' and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";
								$res_sedang=pg_query($connection,$q_sedang);
								$row_sedang=pg_fetch_array($res_sedang);
								$count_sedang=$row_sedang['jml2'];
								if(!isset($count_sedang)) {$count_sedang=0;}
								####### Query selesai dikerjakan (status=3 )########
								$q_selesai =" select count(a.id_lapker) as jml3 from laporan_kerja a where a.status='3' and a.id_case='$row_case[id_case]' and a.id_unit='$row_unit[id_unit]'  and a.id_process='$row_proses[id_process]' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";
								$res_selesai=pg_query($connection,$q_selesai);
								$row_selesai=pg_fetch_array($res_selesai);
								$count_selesai=$row_selesai['jml3'];
								if(!isset($count_selesai)) {$count_selesai=0;}
								####### Query expire  (status=1 atau 2 & Sla off )########
								$q_expire =" select count(a.id_lapker) as jml4 from laporan_kerja a  where a.status in ('1','2') and a.id_case='$row_case[id_case]' and a.id_unit='$row_unit[id_unit]'  and a.id_process='$row_proses[id_process]' and  to_char(date_sla, 'YYYY-MM-DD') < '".$current_date."' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";

								$result_expire=pg_query($connection,$q_expire);
								$row_expire=pg_fetch_array($result_expire);
								$count_expire=$row_expire['jml4'];
								if(!isset($count_expire)) {$count_expire=0;}

								$per_media=(($count_belum+$count_sedang+$count_selesai+$count_expire)/$jml_total)*100;

                            		echo "<tr class='warning'>";
									echo "<td style='font-size:11px' ></td>";
									echo "<td style='font-size:11px'>$z.) $row_case[nama_case]</td>";
									echo "<td style='font-size:11px' align='right'>$count_selesai</td>";
									echo "<td style='font-size:11px' align='right'>$count_belum</td>";
									echo "<td style='font-size:11px' align='right'>$count_sedang</td>";
									echo "<td style='font-size:11px' align='right'>$count_expire</td>";
									echo "</tr>";

									$z++;

							
                            }



                            }


							
							
							$i++;
							
									}
							?>


							</tbody>
							</table>
						
							</div>


						</div>
					</div>

					<?php } ?>



					</div>


					</div>
			
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

<!-- BEGIN PAGE LEVEL PLUGINS -->


<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL STYLES -->
<script src="assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<script src="assets/admin/pages/scripts/form-validation.js"></script>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>

<script>
$(document).ready(function() {

	$('.deletePronews').click(function() {
		var id_prodnews = $(this).attr('id-pronews');
		var nama = $(this).attr('id-title');
    
		  //alert(nama_kategori);
			$("#list-user").empty();
			$("#list-user").append( 
                '<tr>'+
				'<td>'+'<h5>Yakin Anda Akan Mendelete Product News dengan Judul : <br> <br> "'+'<strong>' + nama +' "</strong></h5>'+
				'<input type="hidden" name="id_pnews" value="'+id_prodnews+'"> '+
				'</td></tr>');
			  });




	$('.detailEdit').click(function() {
		var id_kategori= $(this).attr('id-catfaq');
		var nama_kategori= $(this).attr('id-nama');


		//document.getElementById('ed_nama_cabang').value=id_cabang;
    	document.getElementById('ed_nama').value=nama_kategori;

		  //alert(id_user);
			$("#list-user2").empty();
			$("#list-user2").append( '<input type="hidden" name="id_kategori" value="'+id_kategori+'">');
			
			  });


}); // document ready	$(document).ready(function() {

    </script>




<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<!-- END CORE PLUGINS -->

<script>
$(document).ready(function() {

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

/*
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

*/


		});





	$('#idproduct').change(function() {
		var id=$(this).val();

		var dataString = 'id='+id;
		
		//alert(dataString);
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

/*
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

*/


		});

			  });

 </script>


    <script>
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
        	idproduct: {
                required: true
                
            },
            //kontent: {
            //    required: true
                
           // },
           // file_img: {
              //  required: true
                
           // },
            from: {
                required: true
                
            },
            to: {
                required: true
                
            }
        },

        messages: {
        	idproduct: {
                 required: "<span class='label label-warning'><i>Produk Harus dipilih ...! </i></span>"
            },
           // kontent: {
            //     required: "<span class='label label-warning'><i>Kontent Harus diisi ...! </i></span>"
           // },
           /// file_img: {
           //      required: "<span class='label label-warning'><i>Image Harus diisi ...! </i></span>"
           // },
            from: {
                 required: "<span class='label label-warning'><i>isi tgl range 1 ...! </i></span>"
            },
            to: {
                 required: "<span class='label label-warning'><i>isi tgl range 2 ...! </i></span>"
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


<!-- END PAGE LEVEL SCRIPTS -->