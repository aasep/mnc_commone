<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);
##################### For developer #######################

if ($_SESSION['SESS_GROUP_USER']=='1'){
$var_q=" where id_karyawan not in ('admin')";
} else {
$var_q=" where id_karyawan not in ('admin') ";

}

###########################################################


?>

<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- /.modal -->
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			

			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title bold">
			User Account <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">User Management</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">User Account</a>
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
											<h4 class="modal-title bold">Add User Account</h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN VALIDATION STATES-->
			<!--		<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Add User
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								
							</div>
						</div>
						<div class="portlet-body form">
                        -->
                        <div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase"> ADD USER </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>

						<div class="portlet-body form">
                        
							<!-- BEGIN FORM-->
							<form action="<?php echo "module/actions_master.php?module=$module&act=add_user"; ?>" id="form_sample_3" class="form-horizontal" method="POST">
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
										<label class="control-label col-md-3">Username <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="username" id="username" placeholder="Username" class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Password <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="password" name="password" id="password" placeholder="Password" class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Confirm Password <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="password" name="cpassword" id="cpassword" data-required="1" placeholder="Confirm Password" class="form-control"/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Status Acoount <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control" name="status_account" id="status_account">
												<option value="">Choose Status Account</option>
												<option value="1">Active</option>
												<option value="0">Non Active</option>
												
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Group User <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control" name="group_user" id="group_user">
												<option value="">Choose Group User</option>
												<?php
												$query_group="select * from group_type where name <> 'super' ";
												$result_group=pg_query($connection, $query_group);
												while ($row_group=pg_fetch_array($result_group)) {

												echo "<option value='$row_group[id_group_type]'>$row_group[name]</option>";
												}

												?>
												
												
											</select>
										</div>
									</div>


									<div class="form-group">
										<label class="control-label col-md-3">Branch <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control select2me" name="cabang" id="cabang">
												<option value="">Choose Branch</option>
												<?php
												$query_group="select * from master_branch order by name asc ";
												$result_group=pg_query($connection, $query_group);
												while ($row_group=pg_fetch_array($result_group)) {

												echo "<option value='$row_group[id_cabang]'>$row_group[name]</option>";
												}

												?>
												
												
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">Unit <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control select2me" name="unit" id="unit">
												<option value="">Choose Unit</option>
												<?php
												$query_group="select * from master_unit order by name asc ";
												$result_group=pg_query($connection, $query_group);
												while ($row_group=pg_fetch_array($result_group)) {

												echo "<option value='$row_group[id_unit]'>$row_group[name]</option>";
												}

												?>
												
												
											</select>
										</div>
									</div>


									<div class="form-group">
										<label class="control-label col-md-3">Position <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control select2me" name="jabatan" id="jabatan">
												<option value="">Choose Position</option>
												<?php
												$query_group="select * from master_jabatan order by name asc ";
												$result_group=pg_query($connection, $query_group);
												while ($row_group=pg_fetch_array($result_group)) {

												echo "<option value='$row_group[id_jabatan]'>$row_group[name]</option>";
												}

												?>
												
												
											</select>
										</div>
									</div>


									<div class="form-group">
										<label class="control-label col-md-3">Channel <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control select2me" name="channel" id="channel">
												<option value="">Choose Channel</option>
												<?php
												$query_group="select * from master_channel order by name asc ";
												$result_group=pg_query($connection, $query_group);
												while ($row_group=pg_fetch_array($result_group)) {

												echo "<option value='$row_group[id_channel]'>$row_group[name]</option>";
												}

												?>
												
												
											</select>
										</div>
									</div>


									<div class="form-group">
										<label class="control-label col-md-3">Full Name <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Full Name" class="form-control" required/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">Email <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="email" id="email" placeholder="Email" class="form-control" required/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">Phone / Extension <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="tlp" id="tlp" placeholder="Phone / Extension" class="form-control" required/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">PIC <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control select2me" name="pic" id="pic">
												<option value="">Choose PIC </option>
												<?php
												$query_group="select * from master_pic order by name asc ";
												$result_group=pg_query($connection, $query_group);
												while ($row_group=pg_fetch_array($result_group)) {

												echo "<option value='$row_group[id_pic]'>$row_group[name]</option>";
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
              

							<div class="modal fade" id="view-edit" tabindex="-1" role="basic" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<a href="<?php echo $page; ?>"><button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button> </a>
											<h4 class="modal-title bold">Edit User Account</h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN VALIDATION STATES-->
					<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase"> Edit Users </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="<?php echo "module/actions_master.php?module=$module&act=edit_user"; ?>"  id="form_sample_ed" class="form-horizontal" method="POST">
								<div class="form-body">
									<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										You have some form errors. Please check below.
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										Your form validation is successful!
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Username / Id Karyawan <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="ed_username" id="ed_username"   class="form-control" disabled="disabled" required/>
											<input type="hidden" name="ed_username2" id="ed_username2"   class="form-control"  required/>
										</div>
									</div>
									
									<!--  EDIT PASSWORD -->
									<div class="form-group">
										<label class="control-label col-md-3">Change Password <span class="required">
										 </span>
										</label>
										<div class="col-md-4">
											<input type="password" name="ed_password" id="ed_password" placeholder="Change Password (Optional)" class="form-control" />
										</div>
									</div>
									




									<div class="form-group">
										<label class="control-label col-md-3">Status Acoount <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control" name="ed_status_account" id="ed_status_account">
												
												
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Group User <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control" name="ed_group_user" id="ed_group_user">

											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">Branch <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control" name="ed_cabang" id="ed_cabang">
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">Unit <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control" name="ed_unit" id="ed_unit">
											
											</select>
										</div>
									</div>


									<div class="form-group">
										<label class="control-label col-md-3">Position <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control" name="ed_jabatan" id="ed_jabatan">
											</select>
										</div>
									</div>


									<div class="form-group">
										<label class="control-label col-md-3">Channel <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control" name="ed_channel" id="ed_channel">
											</select>
										</div>
									</div>


									<div class="form-group">
										<label class="control-label col-md-3">Full Name <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="ed_nama_lengkap" id="ed_nama_lengkap" placeholder="Full Name" class="form-control" required/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">Email <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="ed_email" id="ed_email" placeholder="Email" class="form-control" required/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">Tlp <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="ed_tlp" id="ed_tlp" placeholder="Tlp / HP" class="form-control" required/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">PIC <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control" name="ed_pic" id="ed_pic">
											
											</select>
										</div>
									</div>

									
								</div>
								
							
						</div>
					</div>
					<!-- END VALIDATION STATES-->
										</div>
										<div class="modal-footer">
											<a href="<?php echo $page; ?>"><button type="button" class="btn default" data-dismiss="modal">Close</button></a>
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
             <!-- END MODAL EDIT -->

             




             <!-- MODAL DELETE -->

             <div class="modal fade bs-modal-lg" id="delete-modal" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title" id="myModalLabel"><strong>Delete User</strong></h4>
										</div>
										<div class="modal-body">
							<form action="<?php echo "module/actions_master.php?module=$module&act=delete_user"; ?>" class="form-horizontal" method="POST">
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

             <a class="btn blue" data-toggle="modal" href="#basic">Add User <i class="fa fa-plus"></i> </a> </br> </br>
             
 <?php
    if (isset($_GET['message']) && ($_GET['message']=="success")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data User Berhasil ditambahkan ...! </strong> </div>";
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
					
                       <!--  portlet box grey-gallery -->
                        <div class="portlet light grey-steel bordered ">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase"> List Of Users </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>

						<div class="portlet-body form">
                        
                        
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th>
									 No
								</th>
								<th>
									 Username
								</th>
								<th>
									 Status Account
								</th>
								<th>
									 Group User
								</th>
								<th>
									 Branch
								</th>
								<th>
									 Channel
								</th>
								<th>
									 Title
								</th>
								<th>
									 Date Create
								</th>
								<th>
									 Action
								</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$i=1;
                            $query =" select a.nama_lengkap,a.email,a.tlp,a.id_karyawan,b.name as nama_group,a.adddt,a.status_account,a.id_group_type,c.id_cabang,e.id_jabatan,g.id_pic,d.id_channel,f.id_unit,c.name as cabang,d.name as channel,e.name as jabatan from user_account a ";
                            $query.=" left join  group_type b on a.id_group_type=b.id_group_type ";
                            $query.=" left join  master_branch c on c.id_cabang=a.id_cabang ";
                            $query.=" left join  master_channel d on d.id_channel=a.id_channel ";
                            $query.=" left join  master_jabatan e on e.id_jabatan=a.id_jabatan ";
                            $query.=" left join  master_unit f on f.id_unit=a.id_unit ";
                            $query.=" left join  master_pic g on g.id_pic=a.id_pic  $var_q ";
                            $result=pg_query($connection,$query);
                            while ($row=pg_fetch_array($result)) {
                             if ($row['status_account']=='1'){
                             	$status="Active";
                             } else { $status="InActive"; }
                             //class='detail-sumRO'

							echo "<tr>";
							echo "<td>$i</td>";
							echo "<td>$row[id_karyawan]</td>";
							echo "<td>$status</td>";
							echo "<td>$row[nama_group]</td>";
							echo "<td>$row[cabang]</td>";
							echo "<td>$row[channel]</td>";
							echo "<td>$row[jabatan]</td>";
							echo "<td>".date('d-m-Y H:i',strtotime($row['adddt']))."</td>";
							echo "<td><a class='detailEdit' data-toggle='modal' data-target='#view-edit' href='#' id-username='$row[id_karyawan]' 
id-group='$row[id_group_type]' id-cabang='$row[id_cabang]' id-jabatan='$row[id_jabatan]' id-pic='$row[id_pic]' id-channel='$row[id_channel]' id-unit='$row[id_unit]' id-fullname='$row[nama_lengkap]' id-email='$row[email]' id-tlp='$row[tlp]' id-status_account='$row[status_account]'><button class='btn default'>Edit</button></a></a> <a href='#'  data-toggle='modal' id-username='$row[id_karyawan]' data-target='#delete-modal' class='detailDelete' > <button class='btn red'>Delete</button></a></td>";
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
		var id_user = $(this).attr('id-username');
    
		  //alert(id_user);
			$("#list-user").empty();
			$("#list-user").append( 
                '<tr>'+
				'<td>'+'<h5>Yakin Anda Akan Mendelete '+'<strong>' + id_user +'</strong></h5>'+
				'<input type="hidden" name="id_user" value="'+id_user+'">'+
				'</td></tr>');
			  });

	$('.detailEdit').click(function() {


		var id_user = $(this).attr('id-username');
		var id_group = $(this).attr('id-group');
		var id_cabang = $(this).attr('id-cabang');
		var id_jabatan = $(this).attr('id-jabatan');
		var id_pic = $(this).attr('id-pic');
		var id_channel = $(this).attr('id-channel');
		var id_unit = $(this).attr('id-unit');
		var nama_lengkap = $(this).attr('id-fullname');
		var email = $(this).attr('id-email');
		var tlp = $(this).attr('id-tlp');
		var status_account = $(this).attr('id-status_account');

		//alert(status_account);
		document.getElementById('ed_nama_lengkap').value=nama_lengkap;
    	document.getElementById('ed_email').value=email;
    	document.getElementById('ed_tlp').value=tlp;
    	document.getElementById('ed_username').value=id_user;
    	document.getElementById('ed_username2').value=id_user;


			$("#ed_status_account").empty();
			if (status_account=='1'){
				$("#ed_status_account").append( '<option value="1" selected="selected"> Active </option>');
				$("#ed_status_account").append( '<option value="0" > Non Active </option>');
			} else {
				$("#ed_status_account").append( '<option value="1" > Active </option>');
				$("#ed_status_account").append( '<option value="0" selected="selected"> Non Active </option>');
			  }

		var dataString1 = 'id='+id_unit;
		var dataString2 = 'id='+id_pic;
		var dataString3 = 'id='+id_group;
		var dataString4 = 'id='+id_cabang;
		var dataString5 = 'id='+id_channel;
		var dataString6 = 'id='+id_jabatan;
		$.ajax({
		type: "POST",
		url: "module/ajax_unit.php",
		data: dataString1,
		cache: false,
		success: function(html)
		{
			$("#ed_unit").html(html);
		} 
			});	


		$.ajax({
		type: "POST",
		url: "module/ajax_pic.php",
		data: dataString2,
		cache: false,
		success: function(html)
		{
			$("#ed_pic").html(html);
		} 
			});	

		$.ajax({
		type: "POST",
		url: "module/ajax_group_user.php",
		data: dataString3,
		cache: false,
		success: function(html)
		{
			$("#ed_group_user").html(html);
		} 
			});	

		$.ajax({
		type: "POST",
		url: "module/ajax_cabang.php",
		data: dataString4,
		cache: false,
		success: function(html)
		{
			$("#ed_cabang").html(html);
		} 
			});	

		$.ajax({
		type: "POST",
		url: "module/ajax_channel.php",
		data: dataString5,
		cache: false,
		success: function(html)
		{
			$("#ed_channel").html(html);
		} 
			});	

		$.ajax({
		type: "POST",
		url: "module/ajax_jabatan.php",
		data: dataString6,
		cache: false,
		success: function(html)
		{
			$("#ed_jabatan").html(html);
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
        	cabang: {
                required: true
                
            },
            jabatan: {
                required: true
                
            },
            channel: {
                required: true
                
            },
        	pic: {
                required: true
                
            },
		    nama_lengkap: {
                required: true
                
            },
            email: {
                required: true,
                email: true
                
            },
            tlp: {
                required: true
                
            },
            username: {
                required: true,
                nowhitespace: true
                
            },
			password: {
                required: true
            },
            cpassword: {
                required: true,
                equalTo: "#password"
            },
                status_account: {
                required: true
            },
                group_user: {
                required: true
            }
        },

        messages: {
        	cabang: {
                 required: "<span class='label label-warning'><i>Cabang Harus diisi ...! </i></span>"
            },
            jabatan: {
                 required: "<span class='label label-warning'><i>Jabatan Harus diisi ...! </i></span>"
            },
            channel: {
                 required: "<span class='label label-warning'><i>Channel Harus diisi ...! </i></span>"
            },
            pic: {
                 required: "<span class='label label-warning'><i>PIC Harus diisi ...! </i></span>"
            },
        	nama_lengkap: {
                 required: "<span class='label label-warning'><i>Nama Lengkap Harus diisi ...! </i></span>"
            },
            email: {
                 required: "<span class='label label-warning'><i>Email  Harus diisi ...! </i></span>",
                 email: "<span class='label label-warning'><i>Type Email Harus Benar ...! </i></span>"
            },
            tlp: {
                 required: "<span class='label label-warning'><i>No.Tlp Harus diisi ...! </i></span>"
            },
		    username: {
                 required: "<span class='label label-warning'><i>Username  Harus diisi ...! </i></span>",
                 nowhitespace:"<span class='label label-warning'><i>tidak boleh ada spasi...! </i></span>"
            },
		    password: {
                 required: "<span class='label label-warning'><i>Password  Harus diisi ...! </i></span>"
            },     
			cpassword: {
                 required: "<span class='label label-warning'><i>Confirm Password  Harus diisi ...! </i></span>",
                 equalTo: "<span class='label label-warning'> <i>Password Tidak Sama ... !</i></span>"
            },
            status_account: {
                 required: "<span class='label label-warning'><i>Status Account  Harus diisi ...! </i></span>"
            },
            group_user: {
                 required: "<span class='label label-warning'><i>Group User  Harus diisi ...! </i></span>"
            }
        },

        invalidHandler: function (event, validator) { //display error alert on form submit   
            success1.hide();
            $('.alert-danger span').text("Form Belum Komplit, Silahkan cek kembali informasi dibawah ... !");
            $('.alert-danger', $('#form_sample_3')).show();
            Metronic.scrollTo(error1, -200);
        },

        
    });
	

	$('#form_sample_ed').validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
		ignore: "",
        rules: {
        	ed_cabang: {
                required: true
                
            },
            ed_jabatan: {
                required: true
                
            },
            ed_channel: {
                required: true
                
            },
        	ed_pic: {
                required: true
                
            },
		    ed_nama_lengkap: {
                required: true
                
            },
            ed_email: {
                required: true,
                email: true
                
            },
            ed_tlp: {
                required: true
                
            },
            ed_status_account: {
                required: true
            },
            ed_group_user: {
                required: true
            }
        },

        messages: {
        	ed_cabang: {
                 required: "<span class='label label-warning'><i>Cabang Harus diisi ...! </i></span>"
            },
            ed_jabatan: {
                 required: "<span class='label label-warning'><i>Jabatan Harus diisi ...! </i></span>"
            },
            ed_channel: {
                 required: "<span class='label label-warning'><i>Channel Harus diisi ...! </i></span>"
            },
            ed_pic: {
                 required: "<span class='label label-warning'><i>PIC Harus diisi ...! </i></span>"
            },
        	ed_nama_lengkap: {
                 required: "<span class='label label-warning'><i>Nama Lengkap Harus diisi ...! </i></span>"
            },
            ed_email: {
                 required: "<span class='label label-warning'><i>Email  Harus diisi ...! </i></span>",
                 email: "<span class='label label-warning'><i>Type Email Harus Benar ...! </i></span>"
            },
            ed_tlp: {
                 required: "<span class='label label-warning'><i>No.Tlp Harus diisi ...! </i></span>"
            },
		    
            ed_status_account: {
                 required: "<span class='label label-warning'><i>Status Account  Harus diisi ...! </i></span>"
            },
            ed_group_user: {
                 required: "<span class='label label-warning'><i>Group User  Harus diisi ...! </i></span>"
            }
        },

        invalidHandler: function (event, validator) { //display error alert on form submit   
            success1.hide();
            $('.alert-danger span').text("Form Belum Komplit, Silahkan cek kembali informasi dibawah ... !");
            $('.alert-danger', $('#form_sample_ed')).show();
            Metronic.scrollTo(error1, -200);
        },

        
    });
	
});
               
</script>  

