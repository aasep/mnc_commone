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
			 Export Leads Data
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Leads Data</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Export Excel</a>
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
											
											<span class="caption-subject font-green-haze bold uppercase">Export</span>
											<span class="caption-helper">for Export Leads Data  ...</span>
										</div>
										
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php echo "module/actions_master.php?module=$module&pm=$pm&act=request_mncpay"; ?>" class="form-horizontal" id="form_sample_3" method="POST">
											<div class="form-body">
											<div class="alert alert-danger" style="display:none" id="kosong">
												<button class="close" data-close="alert"></button>
												Periode is empty , Must be inserted all  ... !
											</div>	
											
												
												
												
												<div class="row">
													
													<!--/span-->
												<div class="col-md-12">
													<div class="form-group">
															<label class="control-label col-md-4">Periode <span class="required">* </span></label>
														<div class="input-group col-md-4">
																	<span class="input-group-addon"><i class="fa fa-gears"></i></span>
															
																	<div class="input-group input-large date-picker input-daterange" data-date="" data-date-format="yyyy-mm-dd">
																	<input type="text" class="form-control" name="from" id="from"  required="required">
																<span class="input-group-addon">to </span>
																<input type="text" class="form-control" name="to" id="to"  required="required">
																</div>
																<!-- /input-group -->
															
														</div>
													</div>
												</div>
													<!--/span-->
												</div>

												




												
												
												
											</div>

											<!-- <div align="center" class="loading2" style="display:none">
												<img src="images/loading_image.gif"  width="100" id="loading" align="center" >
													</br></br></br></br>
											</div> -->
											<div align="center" class="loading2" style="display:none">
												<img src="images/loading_image.gif"  width="100" id="loading" align="center" >
													</br></br></br></br>
											</div>
											<div  class="excel" align="center"></div>

											<div class="form-actions">
												<div class="row">
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-offset-3 col-md-9">
																<!-- <button type="submit" class="btn green">Submit</button> -->
																<button type="button" class="btn green-haze" id="export-excel"> <i class="fa fa-download "></i> Export Excel </button>
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

<script>
$(document).ready(function() {


$("#export-excel").click(function()
{

	


var from=document.getElementById("from").value;
var to=document.getElementById("to").value;

//alert (from);
//alert (to);


	if (from !='' && to !='' ){
				$("#kosong").hide();
				$(".excel").hide();
				var dataString1 ='from='+ from +'&to='+ to;

				$(".loading2").show(); 
				//alert (dataString1);	
					$.ajax
						({
							type: "POST",
							url: "module/ajax/ajax_export_leads.php",
							data: dataString1,
							cache: false,
							success: function(html) {   
								$(".loading2").hide(); 
								$(".excel").show();
								$(".excel").html(html);
							} 



						});
	} else {
			$("#kosong").show();
		}

});





}); // document ready	$(document).ready(function() {

    </script>
