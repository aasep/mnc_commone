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
			Master BI Cause of Complaint <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Master</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">BI Cause</a>
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
											<h4 class="modal-title">Add Master BI Cause</h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN VALIDATION STATES-->
					<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Add BI Cause </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="<?php echo "module/actions_master.php?module=$module&act=add_causebi"; ?>" id="form_sample_3" class="form-horizontal" method="POST">
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
										<label class="control-label col-md-3">Cause BI Code <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="kd_case" id="kd_case" placeholder="Cause BI Code.." class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Cause BI Name <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="nama_case" id="nama_case" placeholder="Cause BI Code.." class="form-control" required/>
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
											<h4 class="modal-title">Edit Master BI Cause</h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN VALIDATION STATES-->
					<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Edit BI Cause </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="<?php echo "module/actions_master.php?module=$module&act=edit_causebi"; ?>" id="form_sample_2" class="form-horizontal" method="POST">
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
										<label class="control-label col-md-3">Cause BI Code <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="ed_kd" id="ed_kd" placeholder="Cause BI Code.." class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Cause BI Name<span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="ed_nama" id="ed_nama"  placeholder="Cause BI Name.." class="form-control" required/>
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
											<h4 class="modal-title" id="myModalLabel"><strong>Delete BI Cause</strong></h4>
										</div>
										<div class="modal-body">
							<form action="<?php echo "module/actions_master.php?module=$module&act=delete_causebi"; ?>" class="form-horizontal" method="POST">
                            <div class="table-scrollable">
							<table class="table table-striped table-bordered table-hover" id="list-user">
                            
							</table>
							<!--</div>-->
										</div>
										</div>
										<div class="modal-footer">
											<input type="submit" class="btn default blue" value="Delete">

										</div>
									</div>
									<!-- /.modal-content -->
									</form>
								</div>
								<!-- /.modal-dialog -->
							 </div>
							<!-- /.modal -->



                <!-- END MODAL DELETE -->

             <a class="btn blue" data-toggle="modal" href="#basic">Add Master BI Cause of Complaint <i class="fa fa-plus"></i> </a> </br> </br>
             
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
											<span class="caption-subject font-red-sunglo bold uppercase">List Master BI Cause</span>
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
									 BI Cause Code
								</th>
								<th>
									 BI Cause Name
								</th>
								
								<th>
									 Date Create
								</th>
								<th>
									 Created By
								</th>
								<th>
									 Action
								</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$i=1;
                            $query =" select * from bi_cause order by name asc ";
                         
                            $result=pg_query($connection,$query);
                            while ($row=pg_fetch_array($result)) {
                           

							echo "<tr>";
							echo "<td>$i</td>";
							echo "<td>$row[kd_cause_bi]</td>";
							echo "<td>$row[name]</td>";
							echo "<td>".date('d-m-Y H:i',strtotime($row['adddt']))."</td>";
							echo "<td>$row[addby]</td>";
							echo "<td><a href='#'  data-toggle='modal' id-causebi='$row[id_cause_bi]' kd-causebi='$row[kd_cause_bi]' id-nama='$row[name]'  data-target='#edit-modal' class='detailEdit' > <button class='btn default'>Edit</button></a> <a href='#'  data-toggle='modal' id-causebi='$row[id_cause_bi]' kd-causebi='$row[kd_cause_bi]' id-nama='$row[name]' data-target='#delete-modal' class='detailDelete' > <button class='btn red'>Delete</button></a></td>";
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
		var id_causebi = $(this).attr('id-causebi');
		var kd_causebi = $(this).attr('kd-causebi');
		var nama_causebi = $(this).attr('id-nama');
    
		  //alert(id_user);
			$("#list-user").empty();
			$("#list-user").append( 
                '<tr>'+
				'<td>'+'<h5>Sure, You Will Delete '+'<strong>' + nama_causebi +'</strong>'+ ' with CODE : <b>'+ kd_causebi +'</b> !</h5>'+
				'<input type="hidden" name="id_causebi" value="'+id_causebi+'">'+
				'</td></tr>');
			  });



	$('.detailEdit').click(function() {
		var id_causebi= $(this).attr('id-causebi');
		var kd_causebi= $(this).attr('kd-causebi');
		var nama_causebi= $(this).attr('id-nama');


		//document.getElementById('ed_nama_cabang').value=id_cabang;
    	document.getElementById('ed_nama').value=nama_causebi;
    	document.getElementById('ed_kd').value=kd_causebi;

		  //alert(id_user);
			$("#list-user2").empty();
			$("#list-user2").append( '<input type="hidden" name="id_causebi" value="'+id_causebi+'">');
			
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
        	nama_case: {
                required: true
                
            },
            kd_case: {
                required: true,
                integer : true
                
            }
        },

        messages: {
        	nama_case: {
                 required: "<span class='label label-warning'><i>Nama Cause BI Harus diisi ...! </i></span>"
            },
            kd_case: {
                 required: "<span class='label label-warning'><i>Nama Cause BI Harus diisi ...! </i></span>",
                 integer: "<span class='label label-warning'><i>Harus Angka ...! </i></span>"
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

