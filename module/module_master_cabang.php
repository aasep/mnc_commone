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
			Master Branch Office <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Master</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Branch Office</a>
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
											<h4 class="modal-title">Add Branch Office</h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN VALIDATION STATES-->
					

						<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Add Branch Office</span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>


						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="<?php echo "module/actions_master.php?module=$module&act=add_cabang"; ?>" id="form_sample_3" class="form-horizontal" method="POST">
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
										<label class="control-label col-md-3">Branch Name <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="nama_cabang" id="nama_cabang" placeholder="Branch Name .." class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Address  <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="alamat" id="alamat" placeholder="Address .." class="form-control" required/>
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3">City <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
										<select class="form-control select2me" name="kota" id="kota" required>
											
											<option value="">Pilih Kota</option>
												<?php
												$query_city="select * from master_city order by name asc ";
												$result_city=pg_query($connection, $query_city);
												while ($row_city=pg_fetch_array($result_city)) {

												echo "<option value='$row_city[id_city]'>$row_city[name]</option>";
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


              <!-- MODAL UPDATE-->
							<div class="modal fade"  id="edit-modal" tabindex="-1"  aria-hidden="true"  role="dialog"  aria-labelledby="myModalLabel">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Edit Branch</h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN VALIDATION STATES-->
					<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Edit Branch Office</span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>

						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="<?php echo "module/actions_master.php?module=$module&act=edit_cabang"; ?>" id="form_sample_2" class="form-horizontal" method="POST">
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
										<label class="control-label col-md-3">Branch Name <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="ed_nama_cabang" id="ed_nama_cabang"  class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Address <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="ed_alamat" id="ed_alamat"  class="form-control" required/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">City <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
										<select class="form-control" name="ed_kota" id="ed_kota" required>

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


             <!-- MODAL DELETE -->

             <div class="modal fade bs-modal-lg" id="delete-modal" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title" id="myModalLabel"><strong>Delete Branch</strong></h4>
										</div>
										<div class="modal-body">
							<form action="<?php echo "module/actions_master.php?module=$module&act=delete_cabang"; ?>" class="form-horizontal" method="POST">
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

             <a class="btn blue" data-toggle="modal" href="#basic">Add Master Branch <i class="fa fa-plus"></i> </a> </br> </br>
             
 <?php
    if (isset($_GET['message']) && ($_GET['message']=="success")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data Cabang Berhasil ditambahkan ...! </strong> </div>";
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
											<span class="caption-subject font-red-sunglo bold uppercase">List Of Branch Office</span>
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
									 Branch Name
								</th>
								<th>
									 Address
								</th>
								<th>
									 City
								</th>
								<th>
									 Add By
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
                            $query =" select a.id_cabang,a.name,a.alamat,a.adddt,a.addby,a.id_city,b.name as nama_kota from master_branch a  ";
                            $query.=" left join master_city b on a.id_city=b.id_city ";
                            
                            
                            $result=pg_query($connection,$query);
                            while ($row=pg_fetch_array($result)) {
                             
                             //class='detail-sumRO'

							echo "<tr>";
							echo "<td>$i</td>";
							echo "<td>".strtoupper($row['name'])."</td>";
							echo "<td>$row[alamat]</td>";
							echo "<td>".strtoupper($row['nama_kota'])."</td>";
							echo "<td>$row[addby]</td>";
							echo "<td>".date('d-m-Y H:i',strtotime($row['adddt']))."</td>";
							echo "<td><a href='#'  data-toggle='modal' id-cabang='$row[id_cabang]' id-nama='$row[name]' id-namakota='$row[nama_kota]' id-kota='$row[id_city]' id-alamat='$row[alamat]' data-target='#edit-modal' class='detailEdit' > <button class='btn default'>Edit</button></a> <a href='#'  data-toggle='modal' id-cabang='$row[id_cabang]' id-name='$row[name]' data-target='#delete-modal' class='detailDelete' > <button class='btn red'>Delete</button></a></td>";
							echo "</tr>";
							$i++;
							
									}
							?>


							</tbody>
							</table>
						</div>
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
		var id_cabang = $(this).attr('id-cabang');
		var nama_cabang = $(this).attr('id-name');
    
		  //alert(id_user);
			$("#list-user").empty();
			$("#list-user").append( 
                '<tr>'+
				'<td>'+'<h5>Sure, You Will Delete '+'<strong>' + nama_cabang +'</strong> !</h5>'+
				'<input type="hidden" name="id_cabang" value="'+id_cabang+'">'+
				'</td></tr>');
			  });






	$('.detailEdit').click(function() {
		var id_cabang = $(this).attr('id-cabang');
		var nama_cabang= $(this).attr('id-nama');
		var alamat = $(this).attr('id-alamat');
		var id_kota = $(this).attr('id-kota');
		var nama_kota = $(this).attr('id-namakota');

		//buat ajax
		

		//document.getElementById('ed_nama_cabang').value=id_cabang;
    	document.getElementById('ed_nama_cabang').value=nama_cabang;
    	document.getElementById('ed_alamat').value=alamat;
    	//document.getElementById('ed_kota').value=id_kota;
		  //alert(id_user);
			$("#list-user2").empty();
			$("#list-user2").append( '<input type="hidden" name="id_cabang" value="'+id_cabang+'">');

			//$("#ed_kota").empty();
			//$("#ed_kota").append( '<option value="">Pilih Kota</option>');
		var id=$(this).attr('id-kota');
		var dataString = 'id='+id;
		//alert(dataString);
		$.ajax({
		type: "POST",
		url: "module/ajax_city.php",
		data: dataString,
		cache: false,
		success: function(html)
		{
			$("#ed_kota").html(html);
		} 
			});									
		
			//$("#ed_kota").append( '<option value="'+id_kota+'" selected="selected" >'+nama_kota+'</option>');
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
        	nama_cabang: {
                required: true
                
            },
            alamat: {
                required: true
                
            },
            kota: {
                required: true
                
            }
        },

        messages: {
        	nama_cabang: {
                 required: "<span class='label label-warning'><i>Nama Cabang Harus diisi ...! </i></span>"
            },
            alamat: {
                 required: "<span class='label label-warning'><i>Alamat Harus diisi ...! </i></span>"
            },
            kota: {
                 required: "<span class='label label-warning'><i>Kota Harus diisi ...! </i></span>"
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

