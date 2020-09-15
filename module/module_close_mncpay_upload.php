<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);

$jum_data=$_GET['count'];

?>

<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			
			<h3 class="page-title bold">
			 Close Request MNC Pay
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">MNC Pay</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Close Request Upload </a>
						<i class="fa fa-angle-right"></i>
					</li>
				
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<!-- BEGIN VALIDATION STATES-->
           
                        <?php
    if (isset($_GET['message']) && ($_GET['message']=="success")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Successful $jum_data Data is Closed ....! </strong> </div>";
     }
	if (isset($_GET['message']) && ($_GET['message']=="error")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Failed Data Added ....!</strong> </div>";

	}

?>





<a href="http://10.5.68.104:8012/commone/data/format/template.xlsx"><button type="submit" class="btn blue pull-right" id="export-excel">  Download Format Excel for upload </button> </a>
                       <div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
										
											<i class="icon-equalizer font-green-haze"></i>
											
											<span class="caption-subject font-green-haze bold uppercase">Upolad</span>
											<span class="caption-helper">for Upload Close Request MNC Pay ...</span>
											
										</div>
										
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php echo "module/MNCPAY/actions.php?module=$module&pm=$pm&act=request_mncpay"; ?>" class="form-horizontal" id="form_sample_3" method="POST" enctype="multipart/form-data">
											<div class="form-body">
											<div class="alert alert-danger" style="display:none" id="kosong">
												<button class="close" data-close="alert"></button>
												File Must be attached  ... !
											</div>	
											
									
												<div class="row">
													
												
												<div class="form-group">
													<label class="control-label col-md-3">File <span class="required">
													* </span>
													</label>
													<div class="col-md-6">
														<input type="file" name="nama_file" id="nama_file" class="form-control" required/>
														
													</div>
												</div>

												</div>

												
											</div>

											
											
											

											<div class="form-actions">
												<div class="row">
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-offset-3 col-md-9">
																<!-- <button type="submit" class="btn green">Submit</button> -->
																<button type="submit" class="btn green-haze" id="export-excel">  Upload Excel </button>
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


<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script src="assets/admin/pages/scripts/form-validation.js"></script>

<!-- END PAGE LEVEL STYLES -->
 <script>


jQuery(document).ready(function () {
    var form1 = $('#form_sample_3');
    var error1 = $('.alert-danger', form1);
    var success1 = $('.alert-success', form1);


    $('#form_sample_3').validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        rules: {

			
			nama_file: {
			    required: true,
                extension: "xls","xslx"
            }

			
        },
		

        messages: {
			
			nama_file: {
			required: "<span class='label label-warning'> <i>Lampirkan File ... !</i></span>",
            extension: "<span class='label label-warning'> <i>extension file harus '.xls','xlsx'  ... !</i></span>"
			
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

