<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);
$page2 = $_SERVER['PHP_SELF']."?";



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
	switch ($srcby) {
		 case '1' : $varsrc= " where a.status <> 4 and a.ticket_number='$srckey'  "; break; //ticket_number
		 case '2' : $varsrc= " where a.status <> 4 and a.customer_name ILIKE '%$srckey%' "; break; //customer_name
		 case '3' : $varsrc= " where a.status <> 4 and a.account_number='$srckey' "; break; //account_number
		 case '4' : $varsrc= " where a.status <> 4 and a.credit_card_number='$srckey'  "; break; // credit_card_number
		 case '5' : $varsrc= " where a.status <> 4 and a.atm_number='$srckey'  "; break; // credit_card_number
		 }

} else  {
$varsrc= " where a.status <> 3 ";
}

?>

<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- /.modal -->
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			

			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			<b>Find Inquiry</b>  <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Data </a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Find Inquiry</a>
						<i class="fa fa-angle-right"></i>
					</li>
				
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
            <!-- MODAL CONFIRMATION FINISH -->

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



















            	




					
            


               
                <div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">FORM SEARCH </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>

						<div class="portlet-body form">
                <div class="table-scrollable">
                <form action="<?php echo "$page&act=src";?>" id="form_sample_src" class="form-horizontal" method="POST">
                <table class="table table-condensed table-hover">
                <tr>
                <td width="40%">
                <div class="form-group">
												
												<div class="col-md-8">
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
				</td>
				<td width="55%">							
                <div class="form-group">
												
												<div class="col-md-8">
													
<div class="input-group">
<div class="input-cont">
<input class="form-control" type="text" name="srckey" value="<?php echo $srckey;?>" placeholder="Key Word..." required>
</div>
<span class="input-group-btn">
<button class="btn green-haze" type="submit">Search <i class="m-icon-swapright m-icon-white"></i></button>
</span>
</div>
												</div>

											</div>
											</td>
			<td width="5%">
            <!-- <a href="<?php echo $page2."module=".sha1('19')."&pm=".sha1('18'); ?>" class="btn blue" >Buat Laporan Baru  <i class="fa fa-plus"></i> </a> -->

             </td>
             </tr>
             </table>
</form>
             </div>
             </div>
             </div>
              </br> </br>
             
 <?php

    if (isset($_GET['message']) && ($_GET['message']=="success")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Memo  Added  Successful ...! </strong> </div>";
     }

	if (isset($_GET['message']) && ($_GET['message']=="error")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Laporan gagal diselesaikan...!</strong> </div>";

	}



?>
			<!-- BEGIN PAGE CONTENT-->
			
			<!-- END PAGE CONTENT-->
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<?php
			if (isset($_GET['act']) && $_GET['act']=='src') {


			?>
					 <div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Data Inquiry </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2" width="100%">
							<thead>
							<tr>
								<th style="font-size:12px" width="15%"> TICKET NUMBER / <br> INQUIRY DATE
								</th>
								
								<th  style="font-size:14px" width="10%">
									 CHANNEL
								</th>
								<th style="font-size:13px" width="45%">
									 CUSTOMER / CASE / DETAIL
								</th>
								<th style="font-size:12px" width="10%" align="center">
									 STATUS / PRIORITY
								</th>
								
								<th style="font-size:12px" width="10%">
									 SLA
								</th>
								<th style="font-size:12px" width="10%">
									 ACTION
								</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$i=1;
                            $query  =" select *, b.name as nama_masalah, b.priority,b.satuan,c.name as nama_channel from laporan_kerja a ";
                            $query .=" left join master_channel c on c.id_channel=a.id_channel ";
                            $query .=" left join master_case b on b.id_case=a.id_case  $varsrc   order by a.ticket_number asc ";
                            //echo $query;
                            $result=pg_query($connection,$query);
                            while ($row=pg_fetch_array($result)) {
                            

                             $jml_intval=$row['sla']+$row['extend_sla'];
                             $date_sla=dateSla($row['date_start'],$jml_intval,$row['satuan']);
                             //$batas_sla=dateSla($row_lap['date_start'],$row_lap['sla'],$row_lap['satuan']);
                             //class='detail-sumRO'

                             switch ($row['satuan']) {
								 case 'HK' : $satuan= " Hari Kerja "; break; //ticket_number
		 						 case 'HC' : $satuan= " Hari Kalender "; break; //customer_name
		 						 
		 
		 							}
                             switch ($row['priority']) {
								 case '1' : $priority= " <i class='fa fa-warning font-green'></i> <b> Normal </b>"; break; //ticket_number
		 						 case '2' : $priority= " <i class='fa fa-warning font-blue'></i> <b> Important </b>"; break; //customer_name
		 						 case '3' : $priority= " <i class='fa fa-warning font-red'></i> <b> Urgent </b>"; break; //account_number
								 
		 
		 							}

                              switch ($row['status']) {
		 				 		case '1' : $status_lap= "  <span class='label label-danger'> <b> Unprocessed </b> </span>  "; break; //ticket_number
		 				 		case '2' : $status_lap= "  <span class='label label-info'> <b> On Progress </b> </span> "; break; //customer_name
						 		case '3' : $status_lap= "  <span class='label label-success'> <b> Done </b> </span> "; break; //account_number
								case '5' : $status_lap= "  <span class='label label-success'> <b> Cancel </b> </span> "; break; //account_number
						 			}

							echo "<tr>";
							echo "<td style='font-size:13px'><i class='fa fa-ticket'></i> <b>$row[ticket_number]</b><br><i class='fa fa-calendar'></i> ".date('d-m-Y H:i',strtotime($row['date_start']))."</td>";
							echo "<td style='font-size:11px'><i>$row[nama_channel]</i></td>";
							echo "<td style='font-size:12px'><i class='fa fa-user'></i> <b>$row[customer_name]</b><br> $row[nama_masalah]<br><i> $row[keterangan]</i></td>";
							echo "<td style='font-size:11px' align='center'> $status_lap <br><br> <b>$priority <b></td>";
							echo "<td style='font-size:12px' ><b>$jml_intval  $satuan <br><i class='fa fa-calendar'></i> ".$date_sla."</b></td>";
							echo "<td style='font-size:11px' align='center'> <a href='$page&ext=detail&tn=$row[ticket_number]&cat=$_GET[act1]&ds=$_GET[iDisplayStart]'  target='_blank' > <button class='btn blue' type='button'> <i class='fa fa-check-circle'></i> <b> Detail</b> </button> </a> <br> <br> <a href='module/convert_pdf_lapker.php?module=$module&pm=$pm&tn=$row[ticket_number]' target='_blank' > <button class='btn red ' type='button'> Print <span aria-hidden='true' class='icon-printer'></span> </button></a> </td>";
							//<br> <br> <a href='module/convert_pdf_lapker.php?module=$module&pm=$pm&tn=$row[ticket_number]' > <button class='btn red ' type='button'> Print <span aria-hidden='true' class='icon-printer'></span> </button></a>
							echo "</tr>";
							$i++;
							
									}
							?>


							</tbody>
							</table>
						</div>
					</div>
					<?php
						}
					?>
					<!-- END EXAMPLE TABLE PORTLET-->





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
		 case '1' : $status= " <button type='button' class='btn btn-circle btn-danger' disabled > <span class='label label-danger'> </i> <b>Unprocessed </b> </span> </button> "; break; //unprocess
		 case '2' : $status= " <button type='button' class='btn btn-circle btn-info' disabled>  <span class='label label-info'> </i> <b> On Progress </b> </span> </button> "; break; //on progress
		 case '3' : $status= " <button type='button' class='btn btn-circle btn-success' disabled>  <span class='label label-success'> </i> <b> Done </b> </span> </button> "; break; //done
		 case '5' : $status= " <button type='button' class='btn btn-circle btn-success' disabled>  <span class='label label-success'> </i> <b> Cancel </b> </span> </button> "; break; //done
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

                                                    
                                        <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form action="<?php echo "module/actions_master.php?module=$module&pm=$pm&act=memo_branch&ds=$_GET[ds]"; ?>" id="form_sample_1" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                    <div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										Still Wrong, Please Check Again  .... !
									</div>

									<!--  
                                    <div class="form-group">
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
											
											-->
                                            
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

										<!-- <div class="form-group">
										<label class="control-label col-md-3">
										</label>
										<div class="col-md-6">
											<div class="checkbox-list">
												<label>
												<input type="checkbox" value="1" name="call_to_ask" /> <strong>Note :</strong> <i>Call customer to gather more information....! </i></label>
												
												
											</div>
											
										</div>
									</div> -->
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
                                                    <!-- <button type="button" class="btn blue pull-center"> Close ticket </button> -->
                                                    <!-- <button type="submit" class="btn red pull-right" name="act_memo" value="close" > <i class="fa fa-arrow-circle-up"> </i> Close ticket </button> -->


													<!-- 
                                                    <a href='#'  data-toggle="modal" data-dismiss="modal"  data-target="#view-confirmation"  <button class="btn red pull-right" > <i class="fa fa-arrow-circle-up"> </i> Close Inquiry  </button></a> -->
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











                                    </form>
                                    </div>
 </div>



</div>

<?php
}
?>


















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











$('#loading').click(function() {
		$(".loading2").show(); 
		
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

/*
	$('.detailConfirmation').click(function() {
		//alert('hore...');
		var id_numticket = $(this).attr('id-ticket');
		document.getElementById('conf_ticket_number').value=id_numticket;
		var id_process = $(this).attr('id-process');
		document.getElementById('conf_id_process').value=id_process;
		
			
		//$('.modal-backdrop').hide();

			  });

*/


	$('.detailMemo').click(function() {
		var id_numticket = $(this).attr('id-ticket');
    
		  //alert(id_user);
			$(".id-numticket").empty();
			$(".id-numticket").append( '<strong> Ticket Number : ' + id_numticket +'</strong>');

		



		var dataString1 = 'id='+id_numticket;
		
		//alert(dataString1);
		$.ajax({
		type: "POST",
		url: "module/ajax_log_memo.php",
		data: dataString1,
		cache: false,
		success: function(html)
		{
			$("#tabel-memo").html(html);
		} 
			});	



			  });

/*
$('#fwd-case').click(function() {
	alert ('fwd-case...........');
		var id_numticket = $(this).attr('id-ticketx');
		var id_process = $(this).attr('id-processx');

		document.getElementById('fwd_ticket_number').value=id_numticket;
		document.getElementById('fwd_id_process').value=id_process;
 });
 */
	$('.detailLaporan').click(function() {
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

