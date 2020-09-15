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
			 Form Request
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">MNC Pay</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Form Request</a>
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
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Failed Data Added ....!</strong> 
	<br> code : </div>";

	}

?>







                       <div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-green-haze"></i>
											<span class="caption-subject font-green-haze bold uppercase">Form Request MNC Pay</span>
											<span class="caption-helper">request mnc pay form...</span> 
											<span class="caption-subject font-red-soft bold"> Inputed by <?php echo getNamaLengkap()." (".getUsername().") ";?></span>
											
                									
            
										</div>
										
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="<?php echo "module/actions_master.php?module=$module&pm=$pm&act=request_mncpay"; ?>" class="form-horizontal" id="form_sample_3" method="POST">
											<div class="form-body">
												<!-- FOR HIDDEN INPUT INTEREST RATE -->
												<div class="row" id="input_hidden" >	
												</div>


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
															<label class="control-label col-md-4">Credit Card Number</label>
															<div class="input-group col-md-6">
															<span class="input-group-addon">
																<i class="fa fa-credit-card"></i>
															</span>
																<input type="text" class="form-control" name="credit_card_number" id="credit_card_number" placeholder="Credit Card Number ...">
																
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<hr>
												<div class="row">

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Merchant Name </label>
															<div class="input-group col-md-6">
															<span class="input-group-addon">
																<i class="fa fa-building"></i>
															</span>
																<input type="text" class="form-control" name="merchant_name" id="merchant_name" placeholder="Merchant Name ... ">
																
															</div>
														</div>
													</div>

													
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Transaction Nominal</label>
															<div class="input-group col-md-6">
															<span class="input-group-addon">
																<i class="fa fa-money"></i>
															</span>
																<input type="text" class="form-control" name="nominal_trans" id="nominal_trans" placeholder="Nominal Transaction... ">
																
															</div>
														</div>
													</div>

													
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Approval Code </label>
															<div class="input-group col-md-6">
															<span class="input-group-addon">
																<i class="fa fa-gears"></i>
															</span>
																<input type="text" name="approval_code" id="approval_code"  placeholder="Approval Code ... " class="form-control" >
																<input type="hidden" name="id_employeex" id="id_employeex" value="<?php echo getNamaLengkap();?>" class="form-control" disabled>
																<input type="hidden" name="id_employee" id="id_employee" value="<?php echo getUsername();?>" class="form-control" >
																
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Transaction Date </label>
															<div class="input-group col-md-6">
																<div class="input-group input-medium date date-picker" data-date=""  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
																	<input type="text" class="form-control" value="<?php echo $ed_tgl_transaksi;?>" readonly>
																	<input type="hidden" name="tanggal_transaksi"  value="<?php echo $ed_tgl_transaksi;?>" class="form-control" >
																	<span class="input-group-btn">
																		<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>	
															</div>
														</div>
													</div>

													<!--/span-->
												</div>
												
												<hr>

												<!--/row-->
												<div class="row">
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Product Code</label>
															<div class="input-group col-md-8">
															<span class="input-group-addon">
																<i class="fa fa-gears"></i>
															</span>
																<select name="id_jenis_mncpay" id="id_jenis_mncpay" class="select2me form-control">
																<option value="">---------- Pilih Plan Code ---------</option> 
																	<?php
																	$query=" select * from mncpay_jenis order by product_code asc ";
																	$result=pg_query($connection, $query);
																	while ($row_pr=pg_fetch_array($result)) {
																	
																		echo "<option value='$row_pr[id_jenis_mncpay]' >$row_pr[plan_code] || $row_pr[product_code] || $row_pr[interest_rate] </option>";



																	}


																	?>
																</select>
																
															</div>
														</div>
													</div>

												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Tenor</label>
															<div class="input-group col-md-2">
															<span class="input-group-addon">
																<i class="fa fa-sort-numeric-asc"></i>
															</span>
															<select name="tenor" id="tenor" class="select2me form-control">
																  <option value="">-- Pilih Tenor --</option>
																<option value="3"> 3 </option>
																<option value="6"> 6 </option>
																<option value="12"> 12 </option>
																<option value="24"> 24 </option>


																</select>
																<!-- <input type="text" name="tenor" id="tenor" class="form-control" placeholder="Tenor ... "> -->
																
															</div>
														</div>
													</div>
												</div>

												<div class="row">

													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Interest Nominal</label>
															<div class="input-group col-md-6">
															<span class="input-group-addon">
																<i class="fa fa-money"></i>
															</span>
																<input type="text" name="interest_nominal" id="interest_nominal" class="form-control" placeholder="Interest Nominal ... ">
																
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												
												<div class="row">
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Total Nominal</label>
															<div class="input-group col-md-6">
															<span class="input-group-addon">
																<i class="fa fa-money"></i>
															</span>
																<input type="text" name="total_nominal" id="total_nominal" class="form-control" placeholder="Nominal ... ">
																
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Installment Nominal</label>
															<div class="input-group col-md-6">
															<span class="input-group-addon">
																<i class="fa fa-money"></i>
															</span>
																<input type="text" class="form-control" name="installment_nominal" id="installment_nominal" placeholder="Installment Nominal ... ">
																
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Keterangan</label>
															<div class="input-group col-md-6">
															<span class="input-group-addon">
																<i class="fa fa-th-large  "></i>
															</span>
																<textarea name="keterangan" id="keterangan"   placeholder="Description.." class="form-control" style="width:365px;height:100px;" > <?php echo $row_edit['keterangan'];?></textarea>
																
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												
												<!-- <div class="row" id="input_hidden" style="display: none;" > -->
												
												
												
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

$('#id_jenis_mncpay').change(function() {
		var id=$(this).val();

		var dataString = 'id='+id;
		
		//alert(dataString);
		 $.ajax({
		 type: "POST",
		 url: "module/ajax/ajax_id_jenis_mncpay.php",
		 data: dataString,
		 cache: false,
		 success: function(html)
		 {
		 	$("#input_hidden").html(html); 


		 						var e = document.getElementById("tenor");
								var tenor = e.options[e.selectedIndex].value;
								var f = document.getElementById("id_jenis_mncpay");
								var irate = f.options[f.selectedIndex].value;

								var interest_rate=document.getElementById('interest_rate').value;
								var nominal_transaction = document.getElementById("nominal_trans").value;
								//alert(interest_rate);
								if ( tenor =="" || irate=="" || interest_rate==0 || interest_rate=="" || nominal_transaction=="" || nominal_transaction==0){
											var interest_nominal=0;
											document.getElementById('interest_nominal').value= Math.round(parseFloat(interest_nominal));

											var total_nominal=parseFloat(nominal_transaction)+parseFloat(interest_nominal);
											document.getElementById('total_nominal').value=Math.round(parseFloat(total_nominal));

											var installment_nominal=total_nominal/tenor ;
											document.getElementById('installment_nominal').value=Math.round(parseFloat(installment_nominal));

								} else {

											var interest_nominal=((interest_rate*nominal_transaction)/100)*tenor;
											document.getElementById('interest_nominal').value= Math.round(parseFloat(interest_nominal));

											var total_nominal=parseFloat(nominal_transaction)+parseFloat(interest_nominal);
											document.getElementById('total_nominal').value=Math.round(parseFloat(total_nominal));

											var installment_nominal=total_nominal/tenor ;
											document.getElementById('installment_nominal').value=Math.round(parseFloat(installment_nominal));

						}
		 } 
		 	});	
		 						



		});




$("#nominal_trans").keyup(function() 
{ 
	//alert('okeeh');
								var e = document.getElementById("tenor");
								var tenor = e.options[e.selectedIndex].value;
								var f = document.getElementById("id_jenis_mncpay");
								var irate = f.options[f.selectedIndex].value;

								var interest_rate=document.getElementById('interest_rate').value;
								var nominal_transaction = document.getElementById("nominal_trans").value;
								//alert(interest_rate);
								if ( tenor =="" || irate=="" || interest_rate==0 || interest_rate=="" || interest_rate==null || nominal_transaction=="" || nominal_transaction==0){
											var interest_nominal=0;
											document.getElementById('interest_nominal').value= Math.round(parseFloat(interest_nominal));

											var total_nominal=parseFloat(nominal_transaction)+parseFloat(interest_nominal);
											document.getElementById('total_nominal').value=Math.round(parseFloat(total_nominal));

											var installment_nominal=total_nominal/tenor ;
											document.getElementById('installment_nominal').value=Math.round(parseFloat(installment_nominal));
											//alert('0');

								} else {

											var interest_nominal=((interest_rate*nominal_transaction)/100)*tenor;
											document.getElementById('interest_nominal').value= Math.round(parseFloat(interest_nominal));

											var total_nominal=parseFloat(nominal_transaction)+parseFloat(interest_nominal);
											document.getElementById('total_nominal').value=Math.round(parseFloat(total_nominal));

											var installment_nominal=total_nominal/tenor ;
											document.getElementById('installment_nominal').value=Math.round(parseFloat(installment_nominal));
											//alert('ada....');

						            }


});

$('#tenor').change(function() {
								var e = document.getElementById("tenor");
								var tenor = e.options[e.selectedIndex].value;
								var f = document.getElementById("id_jenis_mncpay");
								var irate = f.options[f.selectedIndex].value;

								var interest_rate=document.getElementById('interest_rate').value;
								var nominal_transaction = document.getElementById("nominal_trans").value;
								//alert(interest_rate);
								if ( tenor =="" || irate=="" || interest_rate==0 || interest_rate=="" || nominal_transaction=="" || nominal_transaction==0){
											var interest_nominal=0;
											document.getElementById('interest_nominal').value= Math.round(parseFloat(interest_nominal));

											var total_nominal=parseFloat(nominal_transaction)+parseFloat(interest_nominal);
											document.getElementById('total_nominal').value=Math.round(parseFloat(total_nominal));

											var installment_nominal=total_nominal/tenor ;
											document.getElementById('installment_nominal').value=Math.round(parseFloat(installment_nominal));

								} else {

											var interest_nominal=((interest_rate*nominal_transaction)/100)*tenor;
											document.getElementById('interest_nominal').value= Math.round(parseFloat(interest_nominal));

											var total_nominal=parseFloat(nominal_transaction)+parseFloat(interest_nominal);
											document.getElementById('total_nominal').value=Math.round(parseFloat(total_nominal));

											var installment_nominal=total_nominal/tenor ;
											document.getElementById('installment_nominal').value=Math.round(parseFloat(installment_nominal));

						}




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
        	customer_name: {
                required: true
                
            },
            merchant_name: {
                required: true
                
            },
            approval_code: {
                required: true,
				number: true
                
            },
            credit_card_number: {
                required: true,
				integer: true
            },
            tanggal_transaksi: {
                required: true
            },
            id_jenis_mncpay: {
                required: true
            },
            nominal_trans: {
                required: true,
				integer: true
            },
            keterangan: {
                required: true
            }
        },

        messages: {
        	customer_name: {
                 required: "<span class='label label-warning'><i>Customer Name Required ...! </i></span>"
            },
            merchant_name: {
                 required: "<span class='label label-warning'><i>Customer Name Required ...!</i></span>"
            },
            approval_code: {
                 required: "<span class='label label-warning'><i>Approval Code Required ...!</i></span>",
				 number: "<span class='label label-warning'><i>Must Number ( ex: 0123 ) ...!</i></span>"
            },
            credit_card_number: {
                 required: "<span class='label label-warning'><i>Credit Card Number Required ...!</i></span>",
				 integer: "<span class='label label-warning'><i>Must Number ( ex: 0123 ) Without Special Char ...!</i></span>"
            },
            tanggal_transaksi: {
                 required: "<span class='label label-warning'><i>Transaction Date Required ...! </i></span>"
            },
            id_jenis_mncpay: {
                 required: "<span class='label label-warning'><i>CPlan Code Required ...!</i></span>"
            },
            nominal_trans: {
                 required: "<span class='label label-warning'><i>Nominal Transaction Required ...!</i></span>",
				 integer: "<span class='label label-warning'><i>Must Number ( ex: 0123 ) Without Special Char ...!</i></span>"
            },
            keterangan: {
                 required: "<span class='label label-warning'><i>Description Required ...!</i></span>"
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
