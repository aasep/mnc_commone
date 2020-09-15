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
		 case '1' : $varsrc= " where a.ticket_number='$srckey' "; break; //ticket_number
		 case '2' : $varsrc= " where a.customer_name ILIKE '%$srckey%' "; break; //customer_name
		 case '3' : $varsrc= " where a.account_number='$srckey'  "; break; //account_number
		 case '4' : $varsrc= " where a.credit_card_number='$srckey'  "; break; // credit_card_number
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
						<a href="#">Data</a>
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

            	<!-- MODAL TAMBAH SLA-->
							<div class="modal fade"  id="tambah_sla" tabindex="-1"  aria-hidden="true"  role="dialog"  aria-labelledby="myModalLabel">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"><b>Add SLA  </b></h4>

											
											
										</div>
										<div class="modal-body">
										<div class='alert alert-danger alert-dismissable'>
											<p class="id-numticket"><b></b></p>
											</div>
											<form action="<?php echo "module/actions_master.php?module=$module&pm=$pm&act=add_sla"; ?>" id="form_add_sla" class="form-horizontal" method="POST">
											<div class="form-group">
											
													<label class="control-label col-md-3">Additional SLA <span class="required">
													* </span>
													</label>
													<div class="col-md-2">
													    <input type="hidden" name="numticket" id="numticket" class="form-control" />
														<input type="number" name="ext_sla" id="ext_sla" class="form-control" required/>
														
													</div>
													<div class="col-md-3">
											   <select class="form-control" name="idsatuan" id="idsatuan" >
											</select>
										</div>
												</div>

												<div class="form-group">
										<label class="control-label col-md-3">Description<span class="required">
										 </span>
										</label>
										
										<div class="col-md-6">
											<textarea name="ket_finish" id="ket_finish"   placeholder="Description...." class="form-control" style="height:70px;" > </textarea>
											
										</div>

									</div>

											<!-- BEGIN VALIDATION STATES-->
				

											<br>
											<br>
											
					<!-- END VALIDATION STATES-->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn blue" >Submit</button>
										</div>
									</div>
									</form>
									<!-- /.modal-content -->
									<!--</form> -->
							<!-- END FORM-->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
						<!-- END MODAL TAMBAH SLA-->


            	<!-- MODAL LAMPIR FILE-->
							<div class="modal fade"  id="lampiran-file" tabindex="-1"  aria-hidden="true"  role="dialog"  aria-labelledby="myModalLabel">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"><b>Attach File  </b></h4>

											
											
										</div>
										<div class="modal-body">
										<div class='alert alert-danger alert-dismissable'>
											<p class="id-numticket"><b></b></p>
											</div>
										<form action="<?php echo "module/actions_master.php?module=$module&act=lampir-file"; ?>" id="form_close3" class="form-horizontal" method="POST" enctype="multipart/form-data">
											<!-- BEGIN VALIDATION STATES-->
											 
						
										<table width="100%">
                                   <tr>
                                   <td width="50%" >&nbsp;
									
									</td>
									<td width="50%" >&nbsp;
									
									</td>
									</tr>
									<tr>
                                   <td width="50%" >
									
									</td>
									<td width="50%" >
									
									</td>
									</tr>
									<tr>
									<td colspan="2">
									<div class="form-group">
										<label class="control-label col-md-3">File<span class="required">
										 </span>
										</label>
										<div class="col-md-6">
											<input type="file" class="form-control " name="file_attach" id="file_attach" required />
											
										</div>
									</div>
									</td>
									
									</tr>
									<tr>
									<td colspan="2">
									<div class="form-group">
										<label class="control-label col-md-3">Description<span class="required">
										 </span>
										</label>
										
										<div class="col-md-6">
                                        
                                        <input type="hidden" name="fwd_ticket_number2" id="fwd_ticket_number2">
                                        <input type="hidden" name="fwd_id_process2" id="fwd_id_process2">
											<textarea name="ket_finish" id="ket_finish"   placeholder="Description...." class="form-control" style="height:70px;" > </textarea>
											
										</div>

									</div>
									</td>
									
									</tr>
									</table>
										
									


									<div align="center" class="loading2" style="display:none">
									<img src="images/loading_image.gif"  width="100" id="loading" align="center" >
									</br></br>
									</div>

					<!-- END VALIDATION STATES-->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn red" data-dismiss="modal">Close</button>
											<button type="submit" class="btn blue" id="loading"> Submit </button>
										</div>
									</div>
									<!-- /.modal-content -->
									</form>
							<!-- END FORM-->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
             
				
             <!-- END MODAL LAMPIR FILE -->	









            		<!-- MODAL FORWARD CASE-->
							<div class="modal fade"  id="forward-case" tabindex="-1"  aria-hidden="true"  role="dialog"  aria-labelledby="myModalLabel">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"><b>Continue This Inquiry To Other Case [Unit] </b></h4>

											
											
										</div>
										<div class="modal-body">
										<div class='alert alert-danger alert-dismissable'>
											<p class="id-numticket"><b></b></p>
											</div>
										<form action="<?php echo "module/actions_master.php?module=$module&act=fwd-case"; ?>" id="form_close" class="form-horizontal" method="POST">
											<!-- BEGIN VALIDATION STATES-->
											<div class="table-scrollable">
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
										 </span>
										</label>
										<div class="col-md-6">
											<select class="form-control" name="idproduct" id="idproduct" required>
												<option value="">Choose Product...</option>
												<?php
												$query=" select * from master_product order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){

													echo " <option value='$row1[id_product]'>$row1[name]</option> ";


												}
												


												?>
												
												
											</select>
										</div>
									</div>
									</td>
									<td width="50%" >
									<div class="form-group">
										<label class="control-label col-md-3">Unit <span class="required">
										 </span>
										</label>
										<div class="col-md-6">
											<select class="form-control" name="idunit" id="idunit" >
												<option value="">Choose Unit...</option>
												<?php
												$query=" select * from master_unit order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){

													echo " <option value='$row1[id_unit]'>$row1[name]</option> ";


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
										<label class="control-label col-md-4">Proses<span class="required">
										 </span>
										</label>
										<div class="col-md-6">
											<select class="form-control" name="idproses" id="idproses" >
												<option value="">Choose Proses...</option>
												<?php
												$query=" select * from master_process order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){

													echo " <option value='$row1[id_process]'>$row1[name]</option> ";


												}
												


												?>
											</select>
										</div>
									</div>
									</td>
									<td>
									<div class="form-group">
										<label class="control-label col-md-3"> Case <span class="required">
										* </span>
										</label>
										<div class="col-md-6">
											<select class="form-control" name="idpermasalahan" id="idpermasalahan" >
												<option value="">Choose Case ...</option>
												<?php
												$query=" select * from master_case order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){

													echo " <option value='$row1[id_case]'>$row1[name]</option> ";


												}
												


												?>
											</select>
										</div>
									</div>
									</td>
									</tr>
									<tr>
									<td colspan="2">
									<div class="form-group">
										<label class="control-label col-md-2">Description<span class="required">
										 </span>
										</label>
										
										<div class="col-md-7">
                                        
                                        <input type="hidden" name="fwd_ticket_number" id="fwd_ticket_number">
                                        <input type="hidden" name="fwd_id_process" id="fwd_id_process">
											<textarea name="ket_finish" id="ket_finish"   placeholder="Description...." class="form-control" style="height:70px;" > </textarea>
											
										</div>

									</div>
									</td>
									
									</tr>
									</table>	
									</div>


									<div align="center" class="loading2" style="display:none">
									<img src="images/loading_image.gif"  width="100" id="loading" align="center" >
									</br></br>
									</div>

					<!-- END VALIDATION STATES-->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn red" data-dismiss="modal">Close</button>
											<button type="submit" class="btn blue" id="loading"> Submit </button>
										</div>
									</div>
									<!-- /.modal-content -->
									</form>
							<!-- END FORM-->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
             
				
             <!-- END MODAL FORWARD CASE -->	

						<!-- MODAL VIEW-->
							<div class="modal fade"  id="view-confirmation" tabindex="-1"  aria-hidden="true"  role="dialog"  aria-labelledby="myModalLabel">
								<div class="modal-dialog ">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"><b>Verification Close Ticket  </b></h4>

											
											
										</div>
										<div class="modal-body">
										<form action="<?php echo "module/actions_master.php?module=$module&act=confirm_done"; ?>" id="form_close" class="form-horizontal" method="POST">
											<!-- BEGIN VALIDATION STATES-->
										<div class='alert alert-danger alert-dismissable'>
											Are You Sure Completing this Inquiry ... !
										</div>
									<div class="form-group">
										<label class="control-label col-md-3">Description<span class="required">
										 </span>
										</label>
										
										<div class="col-md-9">
                                        
                                        <input type="hidden" name="conf_ticket_number" id="conf_ticket_number">
                                        <input type="hidden" name="conf_id_process" id="conf_id_process">
											<textarea name="ket_finish" id="ket_finish"   placeholder="Description...." class="form-control" style="height:70px;" > </textarea>
											
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
             
				
             <!-- END MODAL VIEW -->	
             <!-- END MODAL CONFIRMATION FINISH  -->


              <!-- MODAL EDIT -->
             

              <!-- MODAL VIEW-->
							<div class="modal fade"  id="view-modal" tabindex="-1"  aria-hidden="true"  role="dialog"  aria-labelledby="myModalLabel">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"><b>View Memo  </b></h4>

											<div class='alert alert-info alert-dismissable'>
											<p class="id-numticket"><b></b></p>
											</div>
											
										</div>
										<div class="modal-body">
										
											<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cube"></i> Add Memo  
								
							</div>
							<div class="tools">
								
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<!--<form action="<?php echo "module/actions_master.php?module=$module&act=edit_productbi"; ?>" id="form_sample_2" class="form-horizontal" method="POST"> -->
								<div class="form-body">
									<div class="table-scrollable">
									<!--<table class="table table-striped table-bordered table-hover" id="sample_1">

									</table> -->
										<div id="tabel-memo"> </div> 
									</div>
								</div>
								
							
						</div>
					</div>


					<!-- END VALIDATION STATES-->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn blue" data-dismiss="modal">Submit</button>
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

              <!-- MODAL DETAIL LAPORAN-->
							<div class="modal fade"  id="view-detail" class="detail-view" tabindex="-1"  aria-hidden="true"  role="dialog"  aria-labelledby="myModalLabel">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"><b> Inquiry Details </b></h4>
											
											
										</div>
										<div class="modal-body">
										<div class='alert alert-danger alert-dismissable'>
											<p class="id-numticket"><b></b></p>
											</div>
										
											<!-- BEGIN VALIDATION STATES-->
					
										<div class="scroller" style="height: 500px;" data-always-visible="1" data-rail-visible="0">
										<div id="tabel-memo2"> </div> 

										<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">ADD MEMO </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
						<div class="portlet-body form">
						<div class="form-body">
								<div class="table-scrollable">
								<form action="<?php echo "module/actions_master.php?module=$module&act=add_memo"; ?>" id="form_sample_3" class="form-horizontal" method="POST">
								<table class="table table-bordered table-hover" width="100%">
								<tr>
								<td>
										<div class="form-group">
										<label class="control-label col-md-3">Add Memo <span class="required">
										* </span>
										</label>
										<div class="col-md-6">
											<textarea  name="ket_memo" id="ket_memo" placeholder="Description .... " class="form-control" style="width:500px;height:100px;"required/></textarea>
										</div>
										
									</div>
									<div class="in-numticket"></div>
									<div class="in-process"></div>
								</td>
								</tr>
								<tr>
								<td>

											<div class="form-group">
										
										<div class="col-md-12">
										
											<div class="checkbox-list">
												<label class="call_to_ask">
												
												</label>
												
												
											</div>
											
										</div>
									</div>
								</td>
								</tr>
								<tr>
								<td>

											<div class="form-group">
										
										<div class="col-md-12">
											<div class="checkbox-list">
												<label class="btn-confirm">
												<!--
												<a href="#"  data-toggle="modal" id-ticket="" id-nama=''  data-target="#view-confirmation" class="detailConfirmation"> <button class="btn red pull-right"><i class="fa fa-check-square-o"></i> Laporan Selesai</button> </a>
												-->
												</label>
												
												
											</div>
											
										</div>
									</div>

								</td>
								</tr>
								</table>
								</form>
								</div>
									
								</div>
								
							
						</div>
					</div>
										</div>
										
										
					<!-- END VALIDATION STATES-->
										</div>
										<div class="modal-footer">
										<!--
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn blue" data-dismiss="modal">Submit</button>
										-->
										</div>
									</div>
									<!-- /.modal-content -->
									<!--</form> -->
							<!-- END FORM-->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
             
				
             <!-- END MODAL DETAIL LAPORAN -->


                <!-- END MODAL DELETE -->
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
														<option value="">Choose Base On ...</option>
														<option value="1" <?php if ($srcby=='1') echo "selected='selected'"; ?>>Ticket Number</option>
														<option value="2" <?php if ($srcby=='2') echo "selected='selected'"; ?>>Customer Name</option>
														<option value="3" <?php if ($srcby=='3') echo "selected='selected'"; ?>>Account Number</option>
														<option value="4" <?php if ($srcby=='4') echo "selected='selected'"; ?>>No Credit Card</option>
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

 	if (isset($_GET['message']) && ($_GET['message']=="success_sla")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>SLA Extended ...! </strong> </div>";
     }
	if (isset($_GET['message']) && ($_GET['message']=="error_sla")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Failed to Extend SLA ...!</strong> </div>";
	}
    if (isset($_GET['message']) && ($_GET['message']=="success_memo")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Memo  Added  Successful ...! </strong> </div>";
     }
	if (isset($_GET['message']) && ($_GET['message']=="error_memo")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Failed to Add Memo...!</strong> </div>";

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

if (isset($_GET['message']) && ($_GET['message']=="success")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Inquiry Closed Successful ... ! </strong> </div>";
     }
	if (isset($_GET['message']) && ($_GET['message']=="error")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Failed to Close Inquiry...!</strong> </div>";

	}
if (isset($_GET['message']) && ($_GET['message']=="success3")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Successful Updated ....! </strong> </div>";
     }
	if (isset($_GET['message']) && ($_GET['message']=="error3")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data Gagal Diupdate...!</strong> </div>";

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
						 			}

							echo "<tr>";
							echo "<td style='font-size:13px'><i class='fa fa-ticket'></i> <b>$row[ticket_number]</b><br><i class='fa fa-calendar'></i> ".date('d-m-Y H:i',strtotime($row['date_start']))."</td>";
							echo "<td style='font-size:11px'><i>$row[nama_channel]</i></td>";
							echo "<td style='font-size:12px'><i class='fa fa-user'></i> <b>$row[customer_name]</b><br> $row[nama_masalah]<br><i> $row[keterangan]</i></td>";
							echo "<td style='font-size:11px' align='center'> $status_lap <br><br> <b>$priority <b></td>";
							echo "<td style='font-size:12px' ><b>$jml_intval  $satuan <br><i class='fa fa-calendar'></i> ".$date_sla."</b></td>";
							echo "<td style='font-size:11px' align='center'> <a href='#'  data-toggle='modal' id-call_to_ask='$row[call_to_ask]' id-ticket='$row[ticket_number]' id-process='$row[id_process]' id-nama='$row[name]' id-status='$row[status]' nm-satuan='$row[satuan]' data-target='#view-detail' class='detailLaporan' > <button class='btn blue btn-xs' type='button'> <i class='fa fa-check-circle'></i> <b> Detail</b> </button> </a></td>";
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

		
		/*
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
		*/


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

			if ( status =='3' || status =='1' || status =='2' ) {
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
		url: "module/ajax_search_laporan.php",
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


     $('#form_sample_3').validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
		ignore: "",
        rules: {
        	ket_memo: {
                required: true
                
            },
            srckey: {
                required: true
                
            }
        },

        messages: {
        	ket_memo: {
                 required: "<span class='label label-warning'><i>Keterangan Memo Wajib Diisi ...! </i></span>"
            },
            srckey: {
                 required: "<span class='label label-warning'><i>Kata Kunci Harus diisi ...! </i></span>"
            }
        },

        invalidHandler: function (event, validator) { //display error alert on form submit   
            success1.hide();
            $('.alert-danger span').text("Form Belum Komplit, Silahkan cek kembali informasi dibawah ... !");
            $('.alert-danger', $('#form_sample_3')).show();
            Metronic.scrollTo(error1, -200);
        },

        
    });
	

     $('#form_close').validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
		ignore: "",
        rules: {
        	ket_finish: {
                required: true
                
            },
            idproduct: {
                required: true
                
            }
        },

        messages: {
        	ket_finish: {
                 required: "<span class='label label-warning'><i>Keterangan  Wajib Diisi ...! </i></span>"
            },
            idproduct: {
                 required: "<span class='label label-warning'><i>Product Harus dipilih ...! </i></span>"
            }
        },

        invalidHandler: function (event, validator) { //display error alert on form submit   
            success1.hide();
            $('.alert-danger span').text("Form Belum Komplit, Silahkan cek kembali informasi dibawah ... !");
            $('.alert-danger', $('#form_close')).show();
            Metronic.scrollTo(error1, -200);
        },

        
    });


$('#form_close3').validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
		ignore: "",
        rules: {
        	ket_finish: {
                required: true
                
            },
            file_attach: {
                required: true
                
            }
        },

        messages: {
        	ket_finish: {
                 required: "<span class='label label-warning'><i>Keterangan  Wajib Diisi ...! </i></span>"
            },
            file_attach: {
                 required: "<span class='label label-warning'><i>File Tidak Boleh kosong ...! </i></span>"
            }
        },

        invalidHandler: function (event, validator) { //display error alert on form submit   
            success1.hide();
            $('.alert-danger span').text("Form Belum Komplit, Silahkan cek kembali informasi dibawah ... !");
            $('.alert-danger', $('#form_close3')).show();
            Metronic.scrollTo(error1, -200);
        },

        
    });

 $('#form_add_sla').validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
		ignore: "",
        rules: {
        	ext_sla: {
                required: true
                
            },
            ket_finish: {
                required: true
                
            }
        },

        messages: {
        	ext_sla: {
                 required: "<span class='label label-warning'><i>Penambahan Sla harus diisi ...! </i></span>"
            },
            ket_finish: {
                 required: "<span class='label label-warning'><i>Keterangan Harus Diisi ...! </i></span>"
            }
        },

        invalidHandler: function (event, validator) { //display error alert on form submit   
            success1.hide();
            $('.alert-danger span').text("Form Belum Komplit, Silahkan cek kembali informasi dibawah ... !");
            $('.alert-danger', $('#form_sample_src')).show();
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

