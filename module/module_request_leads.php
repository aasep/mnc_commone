<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);



?>

<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			
			<h3 class="page-title bold">
			 Form Request for Leads
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Leads Data</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Form Request for Leads</a>
						<i class="fa fa-angle-right"></i>
					</li>
				
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<!-- BEGIN VALIDATION STATES-->
           
                        <?php
    if (isset($_GET['message']) && ($_GET['message']=="success")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Successful Data Added ....! </strong> </div>";
     }
	if (isset($_GET['message']) && ($_GET['message']=="error")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Failed Data Added ....!</strong> </div>";

	}

?>







                       <div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-green-haze"></i>
											<span class="caption-subject font-green-haze bold uppercase">Request Add Leads</span>
											<span class="caption-helper">Form of Leads ...</span>
										</div>
										
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php echo "module/actions_master.php?module=$module&pm=$pm&act=request_form_leads"; ?>" class="form-horizontal" id="form_sample_3" method="POST">
											<div class="form-body">
												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Customer Name</label>
															<div class="input-group col-md-6">
															<span class="input-group-addon">
																<i class="fa fa-user"></i>
															</span>
																<input type="text" name="customer_name" id="customer_name" class="form-control" placeholder="Customer Name ... ">
																
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
																<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number ... ">
																
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Email</label>
															<div class="input-group col-md-6">
															<span class="input-group-addon">
																<i class="fa fa-envelope"></i>
															</span>
																<input type="text" class="form-control" name="email" id="email" placeholder="Email ...">
																
															</div>
														</div>
													</div>
													<!--/span-->

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Time</label>
															<div class="input-group col-md-6">
															<span class="input-group-addon">
																<i class="fa fa-gears"></i>
															</span>
																<select name="tgl_meeting" id="tgl_meeting" class="select2me form-control">
																<option value="">---------- Pilih Time ---------</option>
																<option value="08.00 - 12.00 WIB"> 08.00 - 12.00 WIB </option>
																<option value="12.00 - 13.00 WIB"> 12.00 - 13.00 WIB </option>
																<option value="13.00 - 17.00 WIB"> 13.00 - 17.00 WIB</option>
																<option value="Hanya setelah 17.00 WIB"> Hanya setelah 17.00 WIB </option>


																</select>
																
															</div>
														</div>
													</div>

													<!-- <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Meeting Date </label>
															<div class="input-group col-md-6">
															<div class="input-group input-medium date date-picker" data-date=""  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
												<input type="text" class="form-control" value="<?php echo $ed_tgl_transaksi;?>" readonly>
												<input type="hidden" name="tgl_meeting"  value="<?php echo $ed_tgl_transaksi;?>" class="form-control" >
												<span class="input-group-btn">
												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
																
															</div>
														</div>
													</div> -->
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Channel</label>
															<div class="input-group col-md-6">
															<span class="input-group-addon">
																<i class="fa fa-gears"></i>
															</span>
															
																<select name="id_channel" id="id_channel" class="select2me form-control">
																<option value="">---------- Pilih Channel ---------</option>>
																	<?php
																	$query=" select * from master_channel order by name asc ";
																	$result=pg_query($connection, $query);
																	while ($row=pg_fetch_array($result)) {
																		if(getIdChannel()==$row['id_channel']){
																			echo "<option value='".getIdChannel()."' selected='selected' > $row[name] </option>";

																		} else {
																	
																				echo "<option value='$row[id_channel]' > $row[name] </option>";
																			}



																	}


																	?>
																</select>
																
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Purpose</label>
															<div class="input-group col-md-6">
															<span class="input-group-addon">
																<i class="fa fa-gears"></i>
															</span>
																<select name="id_purpose" id="id_purpose" class="select2me form-control">
																<option value="">---------- Pilih Purpose ---------</option>>
																	<?php
																	$query=" select * from daftar_keperluan order by description asc ";
																	$result=pg_query($connection, $query);
																	while ($row_pr=pg_fetch_array($result)) {
																	
																		echo "<option value='$row_pr[id_purpose]' > $row_pr[description] </option>";



																	}


																	?>
																</select>
																
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">City </label>
															<div class="input-group col-md-6">
															<span class="input-group-addon">
																<i class="fa fa-building"></i>
															</span>
															<select name="city" id="city" class="select2me form-control">
																<option value="">---------- Choose City ---------</option>>
																	<?php
																	$query=" select * from master_city order by name asc ";
																	$result=pg_query($connection, $query);
																	while ($row_pr=pg_fetch_array($result)) {
																	
																		echo "<option value='$row_pr[name]' > $row_pr[name] </option>";



																	}


																	?>
																</select>


																<!-- <input type="text" class="form-control" name="city" id="city" placeholder="Kota Domisili... "> -->
																
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Verfication Date</label>
															<div class="input-group col-md-6">
															<span class="input-group-addon">
																<i class="fa fa-calendar"></i>
															</span>
																<input type="text" name="date_verify" id="date_verify" class="form-control" value="<?php echo date('d-m-Y');?>" disabled>
																
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												
												
												
												
												
											</div>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-offset-3 col-md-9">
																<button type="submit" class="btn green">Submit</button>
																<button type="button" class="btn default">Cancel</button>
															</div>
														</div>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>


<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL STYLES -->
<script src="assets/admin/pages/scripts/form-validation.js"></script>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>

<script>
$(document).ready(function() {








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
        	customer_name: {
                required: true
                
            },
            email: {
                required: true,
                email:true
                
            },
            phone: {
                required: true,
                number: true
            },
            tgl_meeting: {
                required: true
            },
            id_channel: {
                required: true
            },
            id_purpose: {
                required: true
            }
        },

        messages: {
        	customer_name: {
                 required: "<span class='label label-warning'><i>Customer Name Required ...! </i></span>"
            },
            email: {
                 required: "<span class='label label-warning'><i>Email Name Required ...!</i></span>",
                 email: "<span class='label label-warning'><i>Must Email Format ...!</i></span>"
            },
            phone: {
                 required: "<span class='label label-warning'><i>Phone Number Required ...!</i></span>",
                 required: "<span class='label label-warning'><i>Number Only... !</i></span>"
            },
            tgl_meeting: {
                 required: "<span class='label label-warning'><i>Meeting Date Required ...! </i></span>"
            },
            id_channel: {
                 required: "<span class='label label-warning'><i>Channel  Required ...!</i></span>"
            },
            id_purpose: {
                 required: "<span class='label label-warning'><i>Purpose Required ...!</i></span>"
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
