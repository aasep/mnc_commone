<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);
?>

<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- /.modal -->
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			

			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title bold">
			Master Case <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Master</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Case</a>
						<i class="fa fa-angle-right"></i>
					</li>
				
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
            <!-- MODAL INSERT -->
							<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Add Master Case</h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN VALIDATION STATES-->
					<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Add Master Case </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="<?php echo "module/actions_master.php?module=$module&act=add_case"; ?>" id="form_sample_3" class="form-horizontal" method="POST">
								<div class="form-body">
									<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										Please Fill Form Below Completely  ... !
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										Your form validation is successful!
									</div>
									<div class="form-group">
										<label class="control-label col-md-4">Case Name <span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<input type="text" name="casename" id="casename" placeholder="Case Name..." class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-4">SLA <span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<input type="number" name="sla" id="sla" placeholder="SLA" class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-4">Satuan <span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<select class="form-control select2me" name="satuan" id="satuan">
												<option value="">Choose Parameter..</option>
												<option value="HK">Hari Kerja</option>
												<option value="HC">Hari Kalender</option>
												
												
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-4">Priority <span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<select class="form-control" name="prioritas" id="prioritas">
												<option value="">Choose Priority..</option>
												<option value="1">Normal</option>
												<option value="2">Important</option>
												<option value="3">Urgent</option>
												
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-4">BI Product <span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<select class="form-control select2me" name="biproduct" id="biproduct">
												<option value="">Choose BI Product..</option>
												<?php
												$query_bp="select * from bi_product order by name asc ";
												$result_bp=pg_query($connection, $query_bp);
												while ($row_bp=pg_fetch_array($result_bp)) {

												echo "<option value='$row_bp[id_productbi]'>$row_bp[name]</option>";
												}
	
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-4">BI Case <span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<select class="form-control select2me" name="bicase" id="bicase">
												<option value="">Choose BI Case..</option>
												<?php
												$query_bc="select * from bi_case order by name asc ";
												$result_bc=pg_query($connection, $query_bc);
												while ($row_bc=pg_fetch_array($result_bc)) {

												echo "<option value='$row_bc[id_causebi]'>$row_bc[name]</option>";
												}
	
												?>
												
												
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-4">Related by Payment System <span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<div class="radio-list" data-error-container="#form_2_membership_error">
												<label>
												<input type="radio" name="stat_pmb" value="0" checked="checked" />
												NO </label>
												<label>
												<input type="radio" name="stat_pmb" value="1"/>
												YES </label>
											</div>
										</div>
									</div>


									<div class="form-group">
										<label class="control-label col-md-4">Mandatory Document<span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<div class="radio-list" data-error-container="#form_2_membership_error">
												<label>
												<input type="radio" name="is_mandatory" value="0" checked="checked" />
												No Mandatory </label>
												<label>
												<input type="radio" name="is_mandatory" value="1"/>
												Yes  </label>
											</div>
										</div>
									</div>


									<div class="form-group">
										<label class="control-label col-md-4">Jenis Report <span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<select class="form-control select2me" name="is_report" id="is_report">
												<option value="">Choose Report ... </option>
												<?php
												$query_rep="select * from master_report order by id_report asc ";
												$result_rep=pg_query($connection, $query_rep);
												while ($row_rep=pg_fetch_array($result_rep)) {

												echo "<option value='$row_rep[id_report]'>$row_rep[name]</option>";
												}
	
												?>
												
												
											</select>
										</div>
									</div>




									
								</div>
								
							
						</div>
					</div>
					<!-- END VALIDATION STATES-->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn blue">Submit</button>
										</div>
									</div>
									<!-- /.modal-content -->
									</form>
							<!-- END FORM-->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
             <!-- END MODAL INSERT -->


              <!-- MODAL EDIT -->
             

							 <!-- MODAL UPDATE-->
							<div class="modal fade"  id="edit-modal" tabindex="-1"  aria-hidden="true"  role="dialog"  aria-labelledby="myModalLabel">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Edit Master Case</h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN VALIDATION STATES-->
					<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Edit Case </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="<?php echo "module/actions_master.php?module=$module&act=edit_case"; ?>" id="form_sample_2" class="form-horizontal" method="POST">
								<div class="form-body">
									<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										Please Fill Form Below Completely ... !
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										Your form validation is successful!
									</div>
									<div class="form-group">
										<label class="control-label col-md-4">Case Name<span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<input type="text" name="ed_nama" id="ed_nama"  placeholder="Case Name.." class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-4">SLA <span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<input type="number" name="ed_sla" id="ed_sla"  placeholder="SLA" class="form-control" required/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-4">Parameter<span class="required">
										* </span>
										</label>
										<div class="col-md-5">
										<select class="form-control" name="ed_satuan" id="ed_satuan" required>

										</select>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-4">Priority<span class="required">
										* </span>
										</label>
										<div class="col-md-5">
										<select class="form-control" name="ed_prioritas" id="ed_prioritas" required>

										</select>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-4">BI Product<span class="required">
										* </span>
										</label>
										<div class="col-md-5">
										<select class="form-control" name="ed_biproduct" id="ed_biproduct" required>

										</select>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-4">BI Case<span class="required">
										* </span>
										</label>
										<div class="col-md-5">
										<select class="form-control" name="ed_bicase" id="ed_bicase" required>

										</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-4">Related by Payment System <span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<div class="radio-list" data-error-container="#form_2_membership_error" id="ed_stat_pmb">
												
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-4">Mandatory Document <span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<div class="radio-list" data-error-container="#form_2_membership_error" id="ed_ismandatory">
												
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-4">Jenis Report<span class="required">
										* </span>
										</label>
										<div class="col-md-5">
										<select class="form-control" name="ed_is_report" id="ed_is_report" required>
										</select>
										</div>
									</div>
									
									

									<div id="list-user2">
										
									</div>
								</div>
								
							
						</div>
					</div>
					<!-- END VALIDATION STATES-->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn blue">Submit</button>
										</div>
									</div>
									<!-- /.modal-content -->
									</form>
							<!-- END FORM-->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
             
				<!-- END MODAL UPDATE-->
             <!-- END MODAL EDIT -->

          



             <!-- MODAL DELETE -->

             <div class="modal fade bs-modal-lg" id="delete-modal" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title" id="myModalLabel"><strong>Delete Case</strong></h4>
										</div>
										<div class="modal-body">
							<form action="<?php echo "module/actions_master.php?module=$module&act=delete_case"; ?>" class="form-horizontal" method="POST">
                            <div class="table-scrollable">
							<table class="table table-striped table-bordered table-hover" id="list-user">
                            
							</table>
							<!--</div>-->
										</div>
										</div>
										<div class="modal-footer">
											<input type="submit" class="btn default blue" value="Hapus">

										</div>
									</div>
									<!-- /.modal-content -->
									</form>
								</div>
								<!-- /.modal-dialog -->
							 </div>
							<!-- /.modal -->



                <!-- END MODAL DELETE -->

             <a class="btn blue" data-toggle="modal" href="#basic">Add Master Case <i class="fa fa-plus"></i> </a> </br> </br>
             
 <?php
    if (isset($_GET['message']) && ($_GET['message']=="success")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Successful Data Added ....! </strong> </div>";
     }
	if (isset($_GET['message']) && ($_GET['message']=="error")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data tidak berhasil diinput...!</strong> </div>";

	}

if (isset($_GET['message']) && ($_GET['message']=="success2")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Successful Deleted ....! </strong> </div>";
     }
	if (isset($_GET['message']) && ($_GET['message']=="error2")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data Gagal Dihapus...!</strong> </div>";

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
					<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">List Of SLA Case Type </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th>
									 No
								</th>
								<th>
									 Case Name / BI Product <br>/  BI Case
								</th>
								
								<th>
									 SLA (Satuan) <br>/ Mandatory File
								</th>
								
								<th>
									 Prioritas / Stat.Pembayaran <br>/ Jenis Laporan
								</th>
								
								<th>
									 Action
								</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$i=1;
                            $query  =" select d.name as jenis_lap , a.id_report,a.id_case, a.name, a.sla, a.satuan, a.priority,b.name as nama_bicase,c.name as nama_biproduct,c.id_productbi,b.id_causebi,a.stat_pmb,a.flag_mandatory from master_case a ";
                            $query .=" left join bi_case b on b.id_causebi=a.id_causebi ";
                            $query .=" left join bi_product c on c.id_productbi=a.id_productbi  ";
                            $query .=" left join master_report d on a.id_report=d.id_report order by a.name asc";
                            $result=pg_query($connection,$query);
                            while ($row=pg_fetch_array($result)) {
                           
                             //class='detail-sumRO'
                            switch ($row['satuan']) {

		 						case 'HK' : $satuan= "<b> Hari Kerja </b>"; break; //hari kerja
		 						case 'HC' : $satuan= "<b> Hari Kalender </b>";break; //hari kalender
		 						
									 }

                             switch ($row['priority']) {

		 						case '1' : $prioritas= "<span class='label label-primary'> Normal </span>"; break; //ticket_number
		 						case '2' : $prioritas= "<span class='label label-warning'> Important </span>";break; //customer_name
		 						case '3' : $prioritas= "<span class='label label-danger'> Urgent </span>"; break; //account_number
									 }
							switch ($row['stat_pmb']) {

		 						case '0' : $status_pmb= "<span class='font-red'><b> Tidak Terkait Pembayaran</b></span>"; break; //ticket_number
		 						case '1' : $status_pmb= "<span class='font-blue'><b> Terkait Pembayaran </b></span>";break; //customer_name
		 						
									 }

							switch ($row['flag_mandatory']) {

		 						case '0' : $mandatory= "<span class='label label-success'> No mandatory document </span>"; break; //hari kerja
		 						case '1' : $mandatory= "<span class='label label-danger'> mandatory document </span>";break; //hari kalender
		 						
									 }
							echo "<tr>";
							echo "<td>$i</td>";
							echo "<td><b>$row[name]</b><br>$row[nama_biproduct]<br>$row[nama_bicase]</td>";
							
							echo "<td>$row[sla] ($satuan) <br><br> $mandatory </td>";
							
							echo "<td align='center'>$prioritas<br> <br>$status_pmb <br> <span class='font-green'> <b>$row[jenis_lap] </b></span> </td>";
							echo "<td><a href='#'  data-toggle='modal' id-report='$row[id_report]' id-case='$row[id_case]' id-stat_pmb='$row[stat_pmb]' id-ismandatory='$row[flag_mandatory]' id-nama='$row[name]' id-sla='$row[sla]' id-priority='$row[priority]' id-satuan='$row[satuan]' id-bicase='$row[id_causebi]' id-namabicase='$row[nama_bicase]  id-biproduct='$row[id_productbi]' id-namabiproduct='$row[nama_biproduct]' data-target='#edit-modal' class='detailEdit' > <button class='btn default'>Edit</button></a> <a href='#'  data-toggle='modal' id-report='$row[id_report]' id-case='$row[id_case]' id-name='$row[name]' id-bicase='$row[id_causebi]' id-namabicase='$row[nama_bicase]  id-biproduct='$row[id_productbi]' id-namabiproduct='$row[nama_biproduct]' data-target='#delete-modal' class='detailDelete' > <button class='btn red'>Delete</button></a></td>";
							echo "</tr>";
							$i++;
							
									}
							?>
							

							</tbody>
							</table>
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
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL STYLES -->
<script src="assets/admin/pages/scripts/form-validation.js"></script>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function() {







	$('.detailDelete').click(function() {
		var id_case = $(this).attr('id-case');
		var nama = $(this).attr('id-name');
    
		  //alert(id_user);
			$("#list-user").empty();
			$("#list-user").append( 
                '<tr>'+
				'<td>'+'<h5>Sure, You Will Delete '+'<strong>' + nama +'</strong> !</h5>'+
				'<input type="hidden" name="id_case" value="'+id_case+'">'+
				'</td></tr>');
			  });


	$('.detailEdit').click(function() {
		var id_case = $(this).attr('id-case');
		var nama_case= $(this).attr('id-nama');
		var satuan = $(this).attr('id-satuan');
		var sla = $(this).attr('id-sla');
		var prioritas = $(this).attr('id-priority');
		var id_bicase = $(this).attr('id-bicase');
		var nama_bicase = $(this).attr('id-namabicase');
		var id_biproduct = $(this).attr('id-biproduct');
		var nama_biproduct = $(this).attr('id-namabiproduct');
		var stat_pmb = $(this).attr('id-stat_pmb');
		var is_mandatory = $(this).attr('id-ismandatory');
		var id_report = $(this).attr('id-report');
		//buat ajax
		//alert(satuan);
		//alert(id_report);
		//document.getElementById('ed_nama_cabang').value=id_cabang;
    	document.getElementById('ed_nama').value=nama_case;
    	document.getElementById('ed_sla').value=sla;
    	//document.getElementById('ed_kota').value=id_kota;
    		//alert(stat_pmb);

    		if (stat_pmb=='0') {
    		$("#ed_stat_pmb").empty();
    		$("#ed_stat_pmb").append('<label ><input type="radio" name="stat_pmb" value="0" checked="checked" /> Tidak </label><label>');
    		$("#ed_stat_pmb").append('<label ><input type="radio" name="stat_pmb" value="1" /> Ya </label>');							
    		} else {
    		$("#ed_stat_pmb").empty();
    		$("#ed_stat_pmb").append('<label ><input type="radio" name="stat_pmb" value="0"  /> Tidak </label><label>');
    		$("#ed_stat_pmb").append('<label ><input type="radio" name="stat_pmb" value="1" checked="checked" /> Ya </label>');	
    		}
    		// MANDATORY DOCUMENT -------
    		if (is_mandatory=='0') {
    		$("#ed_ismandatory").empty();
    		$("#ed_ismandatory").append('<label ><input type="radio" name="is_mandatory" value="0" checked="checked" /> No Mandatory </label><label>');
    		$("#ed_ismandatory").append('<label ><input type="radio" name="is_mandatory" value="1" /> Ya </label>');							
    		} else {
    		$("#ed_ismandatory").empty();
    		$("#ed_ismandatory").append('<label ><input type="radio" name="is_mandatory" value="0"  /> Tidak </label><label>');
    		$("#ed_ismandatory").append('<label ><input type="radio" name="is_mandatory" value="1" checked="checked" /> Yes </label>');	
    		}



		  //alert(id_user);
			$("#list-user2").empty();
			$("#list-user2").append( '<input type="hidden" name="id_case" value="'+id_case+'">');
			$("#ed_satuan").empty();
			if (satuan=='HK'){
				$("#ed_satuan").append( '<option value="HK" selected="selected"> Hari Kerja </option>');
				$("#ed_satuan").append( '<option value="HC" > Hari Kalender </option>');
			} else {
				$("#ed_satuan").append( '<option value="HK" > Hari Kerja </option>');
				$("#ed_satuan").append( '<option value="HC" selected="selected"> Hari Kalender </option>');
			}
			// $("#ed_is_report").empty();
			// if (id_report=='6'){
			// 	$("#ed_is_report").append( '<option value="6" selected="selected"> Keluhan </option>');
			// 	$("#ed_is_report").append( '<option value="7" > Permintaan </option>');
			// } else {
			// 	$("#ed_is_report").append( '<option value="6" > Keluhan </option>');
			// 	$("#ed_is_report").append( '<option value="7" selected="selected"> Permintaan </option>');
			// }






			$("#ed_prioritas").empty();
			if (prioritas=='1'){
			$("#ed_prioritas").append( '<option value="1" selected="selected" > Normal</option>');
			$("#ed_prioritas").append( '<option value="2" > Important </option>');
			$("#ed_prioritas").append( '<option value="3" > Urgent </option>');
			} else if (prioritas=='2')
					{
						$("#ed_prioritas").append( '<option value="1" > Normal</option>');
						$("#ed_prioritas").append( '<option value="2" selected="selected"> Important </option>');
						$("#ed_prioritas").append( '<option value="3" > Urgent </option>');
					} else {

						$("#ed_prioritas").append( '<option value="1" > Normal</option>');
						$("#ed_prioritas").append( '<option value="2" > Important </option>');
						$("#ed_prioritas").append( '<option value="3" selected="selected"> Urgent </option>');
					}


					
					var dataString1 = 'id='+id_biproduct;
					var dataString2 = 'id='+id_bicase;
					var dataString3 = 'id='+id_report;
					//alert(dataString);
					$.ajax({
					type: "POST",
					url: "module/ajax_biproduct.php",
					data: dataString1,
					cache: false,
					success: function(html)
					{
						$("#ed_biproduct").html(html);
					} 
						});

					$.ajax({
					type: "POST",
					url: "module/ajax_bicase.php",
					data: dataString2,
					cache: false,
					success: function(html)
					{
						$("#ed_bicase").html(html);
					} 
						});


					$.ajax({
					type: "POST",
					url: "module/ajax_is_report.php",
					data: dataString3,
					cache: false,
					success: function(html)
					{
						$("#ed_is_report").html(html);
					} 
						});




	
			  });




}); // document ready	$(document).ready(function() {

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
        	casename: {
                required: true
                
            },
            sla: {
                required: true,
                integer: true
                
            },
            satuan: {
                required: true
                
            },
            prioritas: {
                required: true
                
            }
        },

        messages: {
        	casename: {
                 required: "<span class='label label-warning'><i>Nama Kasus Harus diisi ...! </i></span>"
            },
            sla: {
                 required: "<span class='label label-warning'><i>SLA Harus diisi ...! </i></span>",
                 integer: "<span class='label label-warning'><i>Harus Angka ...! </i></span>"

            },
            satuan: {
                 required: "<span class='label label-warning'><i>Satuan Harus diisi ...! </i></span>"
            },
            prioritas: {
                 required: "<span class='label label-warning'><i>Prioritas Harus diisi ...! </i></span>"
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

