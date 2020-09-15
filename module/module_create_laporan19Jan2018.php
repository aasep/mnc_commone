<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);

# For Edit Laporan # ---------------------
$nama_nasabah=$_GET['nn'];
$no_rek=$_GET['nr'];
$no_kk=$_GET['nk'];
$no_tlp=$_GET['nt'];
$no_atm=$_GET['natm'];
$email=$_GET['em'];
# ----------------------------------------
if (!isset($_GET['act']) || $_GET['act']==""){
	$act="create_laporan";
	$title=" Create Inquiry ";
	$select="select2me";
	$var_lapker="";
	$success="Created !";
} else if(isset($_GET['act']) && $_GET['act']=="edit") {
	$query_edit=" select * from laporan_kerja  where id_lapker='$_GET[dt]' ";
	$res_edit=pg_query($query_edit);
	$row_edit=pg_fetch_array($res_edit);
	$select="";
	$success="Updated !";
	$act="edit_laporan";
	$var_lapker="&id_lapker=$_GET[dt]";
	$title=" Edit Inquiry ";
	if (isset($row_edit['tgl_transaksi']) && ($row_edit['tgl_transaksi'] !="") && ($row_edit['tgl_transaksi'])!=NULL){
	$ed_tgl_transaksi=date('Y-m-d',strtotime($row_edit['tgl_transaksi']));
	}else{
	$ed_tgl_transaksi="";
	}
	if (isset($row_edit['call_to_close']) && ($row_edit['call_to_close'] !="") && ($row_edit['call_to_close'])!=NULL && ($row_edit['call_to_close'])=='1'){
	$check="checked='checked'";
	}else{
	$check="";
	}

} 


?>

<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<?php
			if (!isset($_GET['idx']))
			{
			?>
			<h3 class="page-title bold">
			<?php echo $title;?> <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Data</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#"><?php echo $title;?></a>
						<i class="fa fa-angle-right"></i>
					</li>
				
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<!-- BEGIN VALIDATION STATES-->
            <?php
			
				if ($_GET['message']=='error'){

								echo "<div class='alert alert-danger'><strong>Pembuatan laporan gagal.... !</strong></div>";
								
								}	
				?>  
                        
                        <div class="portlet light grey-steel bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Form <?php echo $title;?></span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
                        
                        
                        
						<div class="portlet-body form">
                        
							<!-- BEGIN FORM-->
							<form action="<?php echo "module/actions_master.php?module=$module&act=$act&mode=1$var_lapker"; ?>" id="form_sample_3" class="form-horizontal" method="POST" enctype="multipart/form-data">
								<div class="form-body">
									<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										Still Wrong, Please Check Again  .... !
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										Your form validation is successful!
									</div>
									<!--
									<div class="alert alert-info">
								<strong>Media Laporan : <?php $channel=getNamaChannel();
										 if (isset($channel) || $channel <> "" || $channel<>NULL ) { echo $channel;} 
										 else { echo " - "; } ?></strong><br>
								<strong>Cabang         : <?php echo getNamaCabang();?>
							    </div> -->
									<table class="table table-bordered table-hover" width="100%">
									<tbody>
									<tr >
									<td width="20%">
										 <b>Channel</b>

									</td>
									<td  width="80%">
						
										 <b>
										 <select class="form-control <?php echo $select;?>" name="idChannel" id="idChannel" required>
												<option value="<?php echo getIdChannel();?>" selected="selected"><?php echo getNamaChannel();?></option>
												<?php
												$query=" select * from master_channel where id_channel not in (".getIdChannel().") order by name asc ";
												$r_channel=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_channel)){
													
													echo " <option value='$row1[id_channel]' >$row1[name]</option> ";
												
												}
												


												?>
												
												
											</select>
										 
										 
										 <?php 
										 
										 //$channel=getNamaChannel();
										 //if (isset($channel) || $channel <> "" || $channel<>NULL ) { echo $channel;} 
										 //else { echo " - "; } 

										 ?></b>

									</td>
									</tr>
									<tr >
									<td>
										 <b>Branch Office</b>

									</td>
									<td>
										 <b><?php echo getNamaCabang(); ?></b>

									</td>
									</tr>
									</table>


									
<div class="portlet light  bordered">
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
																<input type="text" name="nama_nasabah" id="nama_nasabah"  placeholder="Customer Name.." class="form-control" value="<?php echo $nama_nasabah;?>" required/>
																
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
																<input type="text" name="no_tlp" id="no_tlp"  placeholder="Phone.." class="form-control" value="<?php echo $no_tlp; ?>"/>
																
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
																<input type="text" name="no_creditcard" id="no_creditcard"  placeholder="No. Credit card.." class="form-control" value="<?php echo $no_kk; ?>"/>
																
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
																<input type="text" name="no_rek" id="no_rek"  placeholder="Account Number.." class="form-control" value="<?php echo $no_rek; ?>" />
																
															</div>
														</div>
													</div>
													<!--/span-->
												</div>


												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Email</label>
															<div class="input-group col-md-6">
															<span class="input-group-addon">
																<i class="fa fa-envelope"></i>
															</span>
																<input type="text" name="email" id="email" placeholder="Email" class="form-control" value="<?php echo $email; ?>" />
																
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
																<input type="text" name="atm_number" id="atm_number"  placeholder="ATM Number.." class="form-control" value="<?php echo $no_atm; ?>" />
																
															</div>
														</div>
													</div>
													<!--/span-->
												</div>



</div>

<div class="portlet light  bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-settings font-green-haze"></i>
											<span class="caption-subject font-green-haze bold ">Inquiry Type </span>
											<span class="caption-helper">...</span>
										</div>
										
									</div>

								


							
								
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
										<label class="control-label col-md-4">Product<span class="required">
										* </span>
										</label>
										<div class="col-md-6">
											<select class="form-control <?php echo $select;?>" name="idproduct" id="idproduct" required>
												<option value="">Choose Product...</option>
												<?php
												$query=" select * from master_product order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($row_edit['id_product']==$row1['id_product']){
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
										<label class="control-label col-md-3">Unit <span class="required">
										* </span>
										</label>
										<div class="col-md-6">
											<select class="form-control" name="idunit" id="idunit" required>
												<option value="">Choose Unit...</option>
												<?php
												$query=" select * from master_unit order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($row_edit['id_unit']==$row1['id_unit']){
													echo " <option value='$row1[id_unit]' selected='selected'>$row1[name]</option> ";
												} else {
													echo " <option value='$row1[id_unit]'>$row1[name]</option> ";
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
										<label class="control-label col-md-4">Process<span class="required">
										* </span>
										</label>
										<div class="col-md-6">
											<select class="form-control" name="idproses" id="idproses" required>
												<option value="">Choose Process...</option>
												<?php
												$query=" select * from master_process order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($row_edit['id_process']==$row1['id_process']){
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
										<label class="control-label col-md-3">Case <span class="required">
										* </span>
										</label>
										<div class="col-md-6">
											<select class="form-control" name="idpermasalahan" id="idpermasalahan" required>
												<option value="">Choose Case...</option>
												<?php
												$query=" select * from master_case order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($row_edit['id_case']==$row1['id_case']){
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
										<label class="control-label col-md-4">Cause BI <span class="required">
										* </span>
										</label>
										<div class="col-md-6">
											<select class="form-control <?php echo $select;?>" name="idpenyebab" id="idpenyebab" required>
												<option value="">Choose Cause...</option>
												<?php
												$query=" select * from bi_cause order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($row_edit['id_cause_bi']==$row1['id_cause_bi']){
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
										<label class="control-label col-md-3">Inquiry Type <span class="required">
										* </span>
										</label>
										<div class="col-md-6">
											<select class="form-control <?php echo $select;?>" name="idjenis_laporan" id="idjenis_laporan" required>
												<option value="">Choose Inquiry Type...</option>
												<?php
												$query=" select * from master_report order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($row_edit['id_report']==$row1['id_report']){
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
									</table>	
									
					

</div>

<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-settings font-green-haze"></i>
											<span class="caption-subject font-green-haze bold ">Additional Information </span>
											<span class="caption-helper">...</span>
										</div>
										
									</div>

		
							
							<div class="form-group">
										<label class="control-label col-md-3">Description<span class="required">
										 </span>
										</label>
										
										<div class="col-md-3">
											<textarea name="keterangan" id="keterangan"   placeholder="Description.." class="form-control" style="width:600px;height:100px;" > <?php echo $row_edit['keterangan'];?></textarea>
											
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
											<input type="text" name="nominal" id="nominal"  value="<?php echo $row_edit['nominal'];?>" placeholder="Nominal Transaksi" class="form-control" />
										</div>	
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Transaction Date </label>
										<div class="col-md-3">
											<div class="input-group input-medium date date-picker" data-date=""  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
												<input type="text" class="form-control" value="<?php echo $ed_tgl_transaksi;?>" readonly>
												<input type="hidden" name="tanggal"  value="<?php echo $ed_tgl_transaksi;?>" class="form-control" >
												<span class="input-group-btn">
												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
											<!-- /input-group -->
											
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3">Attach File<span class="required">
										 </span>
										</label>
										<div class="col-md-3">
											<input type="file" class="form-control " name="file_attach" id="file_attach"  />
											
										</div>
									</div>

									<!-- MANDATORY CASE IN AJAX -->
									<div id="mandatory_case">
									</div>

									</div>
								
					


								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn blue" type="submit"> <?php echo $title;?> </button>
											
										</div>
									</div>
								</div>


								</div>
								</form>

							
						</div>
					</div>


					<?php
			} // if jika idx not exist ===== before insert
						else {  if ($_GET['message']=='success'){  // if idx exist ====== after insert success...

							$queryidx=" select *,b.satuan from laporan_kerja a left join master_case b on b.id_case=a.id_case where a.id_lapker='$_GET[idx]' ";
							$residx=pg_query($queryidx);
							$found=pg_num_rows($residx);

							if ($found ==0){
								echo "<div class='alert alert-danger'><strong>data tidak ditemukan ... !</strong></div>";
							    die();
							} else {

							$rowidx=pg_fetch_array($residx);
							$jml_intval=$rowidx['sla']+$rowidx['extend_sla'];
							$date_sla=dateSla($rowidx['date_start'],$jml_intval,$rowidx['satuan']);

							}


			?>

<!-- TAMBAHAN MODAL SLIPAN 1-->
							<div class="modal show"  id="view-memo" tabindex="-1"  aria-hidden="true"  role="dialog"  aria-labelledby="myModalLabel">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										
										<div class="modal-body">

<!-- END SELIPAN 1 -->




             <div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">CONFIRMATION </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>

						<div class="portlet-body form">
            
						<div class="alert alert-block alert-success fade in">
							
							<?php if ($rowidx['status'] == '3' ) { 

										echo "<h4 class='alert-heading'><b>Laporan telah Selesai Dikerjakan ... ! </b></h4>";

									} else {
										echo "<h4 class='alert-heading'><b>Inquiry has been $success  </b></h4>";

									}
								?>
								<div class="alert alert-warning">
								<strong>Ticket Number : <?php echo $rowidx['ticket_number'];?></strong>
							    </div>


								<table class="table table-condensed table-hover">
									<thead>
										<tr>
											<th width="15%" class="active">Customer Name</th>
											<th width="1%" class="active">:</th>
											<th width="20%" class="active"><?php echo $rowidx['customer_name'];?></th>
											<th width="15%" class="active">SLA</th>
											<th width="1%" class="active">:</th>
											<th width="40%" class="active"><?php echo $jml_intval." ".$rowidx['satuan']; if ($rowidx['satuan']=='HK') {echo " <i>(Hari Kerja)</i>";} else { echo " (<i>Hari Kalender</i>)";} ?></th>
										</tr>
										<tr>
											<th width="15%" class="active">Date Create</th>
											<th width="1%" class="active">:</th>
											<th width="40%" class="active"><?php echo date('d-m-Y H:i',strtotime($rowidx['date_start']))." WIB";?></th>
											<th width="15%" class="active">Limit/Expire</th>
											<th width="1%" class="active">:</th>
											<th width="40%" class="active"><?php echo $date_sla."";?></th>
										</tr>
									</thead>
								
								</table>
									<p> <b>Description : </b></p>
									<p> <i> <div class="alert alert-warning">
										<?php echo $rowidx['keterangan'];?>
									</div></i></p><br>
									<p>
										<a class="btn green" href="<?php echo "$page&act=edit&nn=$rowidx[customer_name]&nr=$rowidx[account_number]&nk=$rowidx[credit_card_number]&nt=$rowidx[phone]&em=$rowidx[email]&dt=$rowidx[id_lapker]&natm=$rowidx[atm_number]"; ?>"> Edit Inquiry <i class="fa fa-edit"></i> </a>
										<a class="btn blue" href="<?php echo "$page&nn=$rowidx[customer_name]&nr=$rowidx[account_number]&nk=$rowidx[credit_card_number]&nt=$rowidx[phone]&em=$rowidx[email]&natm=$rowidx[atm_number]"; ?>"> <i class="fa fa-plus"></i> Create Other Inquiry </a>
										<?php if ($rowidx['status'] !=3) { ?>
										<!--<a href="#"  data-toggle="modal" id-ticket="" id-nama=''  data-target="#view-modal" class="detailMemo"> <button class="btn red pull-right"><i class="fa fa-check-square-o"></i> Finish Inquiry [ close ticket ]</button> </a> -->
                                        <?php } ?>
										
									</p>

						</div>
                        </div>
                        </div>
<!--  NYELIP 2 -->             <div align="center" class="loading2" style="display:none">
								<img src="images/loading_image.gif"  width="100" id="loading" align="center" >
								
								</div>
								<div  id="tabel-broadcast" align="center"></div>
								

</div>
										<div class="modal-footer" style="text-align: center;"> 
											<a href="#" class="brodcastemail" idx-ticket="<?php echo $rowidx['ticket_number']; ?>" idx-status="<?php echo $rowidx['status']; ?>"> <button type="button" class="btn blue" data-dismiss="modal"> Lanjut  <i class="fa fa-sign-in"></i> </button> </a>
											<a href="#"  data-toggle="modal" id-ticket="" id-nama=''  data-target="#view-modal" class="detailMemo"> <button class="btn red "><i class="fa fa-check-square-o"></i> Finish Inquiry [ close ticket ]</button> </a>
										</div>
									</div>
									<!-- /.modal-content -->
									<!--</form> -->
							<!-- END FORM-->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->


<!-- END NYELIP2-->




						<!-- BEGIN VALIDATION STATES-->	
                        




                         <!-- MODAL VERIFICATION CLOSE TICKET -->
                         
							<div class="modal fade"  id="view-modal" tabindex="-1"  aria-hidden="true"  role="dialog"  aria-labelledby="myModalLabel">
								<div class="modal-dialog ">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"><b>Verification Close Ticket </b></h4>

											
											
										</div>
										<div class="modal-body">
										<form action="<?php echo "module/actions_master.php?module=$module&act=confirm_done"; ?>" id="form_close" class="form-horizontal" method="POST">
											<!-- BEGIN VALIDATION STATES-->
										<div class='alert alert-danger alert-dismissable'>
											Are You Sure Completing this Case ...!
										</div>
									<div class="form-group">
										<label class="control-label col-md-3">Description<span class="required">
										 </span>
										</label>
										
										<div class="col-md-3">
                                        <input type="hidden" name="id_lapker" value="<?php echo "$_GET[idx]"; ?>">
                                        <input type="hidden" name="conf_ticket_number" value="<?php echo "$rowidx[ticket_number]"; ?>">
                                        <input type="hidden" name="conf_id_process" value="<?php echo "$rowidx[id_process]"; ?>">
											<textarea name="ket_finish" id="ket_finish"   placeholder="Keterangan...." class="form-control" style="width:400px;height:50px;" > </textarea>
											
										</div>

									</div>
									<br>
									<br>
									<br>
									<br>

					<!-- END VALIDATION STATES-->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn red" data-dismiss="modal">No </button>
											<button type="submit" class="btn blue" > Yes </button>
										</div>
									</div>
									<!-- /.modal-content -->
									</form>
							<!-- END FORM-->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
             
				
             <!-- END MODAL VERIFICATION CLOSE TICKET -->

                        

								<?php
							}  // end insert success
							else  { 
								if ($_GET['message']=='error'){

								echo "<div class='alert alert-danger'><strong>Pembuatan laporan gagal.... !</strong></div>";
								die();
								} else 
								{

								echo "<div class='alert alert-danger'><strong>Failed Acess... !</strong></div>";
								die();
								}
							}//end if   message error
			}  // end idx exist and insert success...
				
				
			
			?>


<!-- MODAL VIEW-->
							<div class="modal fade"  id="view-memo" tabindex="-1"  aria-hidden="true"  role="dialog"  aria-labelledby="myModalLabel">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										
										<div class="modal-body">
										
											<!-- BEGIN VALIDATION STATES-->
					<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">CONFIRMATION </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
                        
                        
                        
						<div class="portlet-body form">
						</div>
						</div>

					<!-- END VALIDATION STATES-->
										</div>
										<div class="modal-footer" style="text-align: center;"> 
											<button type="button" class="btn blue" data-dismiss="modal"> Lanjut  <i class="fa fa-sign-in"></i> </button>
											<a href="#"  data-toggle="modal" id-ticket="" id-nama=''  data-target="#view-modal" class="detailMemo"> <button class="btn red "><i class="fa fa-check-square-o"></i> Finish Inquiry [ close ticket ]</button> </a>
										</div>
									</div>
									<!-- /.modal-content -->
									<!--</form> -->
							<!-- END FORM-->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
             
				
             <!-- END MODAL VIEW -->
			 


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
    	var status = $(this).attr('idx-status');
		  //alert(id_numticket);
		  $(".loading2").show();
			//$(".id-numticket").empty();
			//$(".id-numticket").append( '<strong> Ticket Number : ' + id_numticket +'</strong>');



		var dataString1 = 'id='+id_numticket+'&status='+status;
		
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
		
		setTimeout(function(){location="<?php echo $page; ?>"}, 1000);


			  });








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


	$('.detailDelete').click(function() {
		var id_access = $(this).attr('id-access');
		var id_product = $(this).attr('id-product');
		var nama_product = $(this).attr('id-namaproduk');
		var id_unit = $(this).attr('id-unit');
		var nama_unit = $(this).attr('id-namaunit');
		var id_process = $(this).attr('id-process');
		var nama_process = $(this).attr('id-namaproses');
		var id_case = $(this).attr('id-case');
		var nama_case = $(this).attr('id-namakasus');
    
		  //alert(id_user);
			$("#list-user").empty();
			$("#list-user").append( 
                '<tr>'+
				'<td>'+'<h5><div class="alert alert-warning alert-dismissable"><b>Yakin Anda Akan Mendelete Relasi :</b> <p></p><p>'+'<strong> Product : </strong><i>' + nama_product + '</i>, <strong>Unit : </strong><i>' +nama_unit +'</i>, <strong>Process : </strong> <i>'+nama_process+'</i>, <strong>Case : </strong><i>'+nama_case+'</i></p></div></h5>'+
				'<input type="hidden" name="id_access" value="'+id_access+'">'+
				'</td></tr>');
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



	$('.detailEdit').click(function() {
		var id_access = $(this).attr('id-access');
		var id_product = $(this).attr('id-product');
		var id_unit = $(this).attr('id-unit');
		var id_process = $(this).attr('id-process');
		var id_case = $(this).attr('id-case');

		var id_causebi= $(this).attr('id-causebi');
		var nama_causebi= $(this).attr('id-nama');
		//alert(id_product);

		//document.getElementById('ed_nama_cabang').value=id_cabang;
    	//document.getElementById('ed_nama').value=nama_causebi;

		  //alert(id_user);
			$("#list-user2").empty();
			$("#list-user2").append( '<input type="hidden" name="id_access" value="'+id_access+'">');
			
			  

		var dataString1 = 'id='+id_product;
		var dataString2 = 'id='+id_unit;
		var dataString3 = 'id='+id_process;
		var dataString4 = 'id='+id_case;
		//alert(dataString1);
		$.ajax({
		type: "POST",
		url: "module/ajax_product.php",
		data: dataString1,
		cache: false,
		success: function(html)
		{
			$("#ed_product").html(html);
		} 
			});	


		$.ajax({
		type: "POST",
		url: "module/ajax_unit.php",
		data: dataString2,
		cache: false,
		success: function(html)
		{
			$("#ed_unit").html(html);
		} 
			});	

		$.ajax({
		type: "POST",
		url: "module/ajax_process.php",
		data: dataString3,
		cache: false,
		success: function(html)
		{
			$("#ed_process").html(html);
		} 
			});	

		$.ajax({
		type: "POST",
		url: "module/ajax_case.php",
		data: dataString4,
		cache: false,
		success: function(html)
		{
			$("#ed_case").html(html);
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
        	
        	nama_nasabah: {
			   required: true	
            },
            nominal: {
			   integer: true	
            },
        	no_tlp: {
			   integer: true	
            },
            no_creditcard: {
			   integer: true	
            },
            no_rek: {
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
        	nama_nasabah: {
			  //integer: true
			   required: "<span class='label label-warning'> <i>Nama Nasabah Wajib </i></span>"	
            },
        	nominal: {
			  //integer: true
			   integer: "<span class='label label-warning'> <i>Nominal Harus Angka.. !</i></span>"	
            },
        	no_tlp: {
			  //integer: true
			   integer: "<span class='label label-warning'> <i>No Tlp Harus Angka.. !</i></span>"	
            },
            no_creditcard: {
			   ///integer: true
			   integer: "<span class='label label-warning'> <i>Credit Card Harus Angka.. !</i></span>"	
            },
            no_rek: {
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
						