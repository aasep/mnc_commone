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
			<h3 class="page-title">
			Jenis MNC Pay <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">MNC Pay</a>
						<i class="fa fa-angle-right"></i>
					</li>
					
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Jenis MNC Pay</a>
						<i class="fa fa-angle-right"></i>
					</li>

				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
            <!-- MODAL INSERT -->
							<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										
										<div class="modal-body">
											<!-- BEGIN VALIDATION STATES-->
					<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Add Jenis MNC Pay </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="<?php echo "module/actions_master.php?module=$module&pm=$pm&act=add_jenis_mncpay"; ?>" id="form_sample_3" class="form-horizontal" method="POST">
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
										<label class="control-label col-md-3">Plan Code <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="plan_code" id="plan_code" placeholder="Plan Code.." class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Product Code <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="product_code" id="product_code" placeholder="Product Code..." class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Interest Rate <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="interest_rate" id="interest_rate" placeholder="Interest Rate.." class="form-control" required/>
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
											<h4 class="modal-title">Edit Jenis MNC Pay</h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN VALIDATION STATES-->
					<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Edit MNC Pay </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="<?php echo "module/actions_master.php?module=$module&pm=$pm&act=edit_jenis_mncpay"; ?>" id="form_sample_2" class="form-horizontal" method="POST">
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
										<label class="control-label col-md-3">Plan Code <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="ed_plan_code" id="ed_plan_code" placeholder="Plan Code.." class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Product Code <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="ed_product_code" id="ed_product_code" placeholder="Product Code..." class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Interest Rate <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="ed_interest_rate" id="ed_interest_rate" placeholder="Interest Rate.." class="form-control" required/>
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
											<h4 class="modal-title" id="myModalLabel"><strong>Delete Jenis MNC Pay</strong></h4>
										</div>
										<div class="modal-body">
							<form action="<?php echo "module/actions_master.php?module=$module&pm=$pm&act=delete_jenis_mncpay"; ?>" class="form-horizontal" method="POST">
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

             <a class="btn blue" data-toggle="modal" href="#basic">Add Jenis MNC Pay <i class="fa fa-plus"></i> </a> </br> </br>
             
 <?php
    if (isset($_GET['message']) && ($_GET['message']=="success")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Successful Data Added ....! </strong> </div>";
     }
	if (isset($_GET['message']) && ($_GET['message']=="error")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Failed Data Added ....!</strong> </div>";

	}

if (isset($_GET['message']) && ($_GET['message']=="succDel")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Successful Deleted ....! </strong> </div>";
     }
	if (isset($_GET['message']) && ($_GET['message']=="errDel")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Failed Deleted ....!</strong> </div>";

	}
if (isset($_GET['message']) && ($_GET['message']=="succUp")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Successful Updated ....! </strong> </div>";
     }
	if (isset($_GET['message']) && ($_GET['message']=="errUp")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Failed Updated...!</strong> </div>";

	}




?>
			<!-- BEGIN PAGE CONTENT-->
			
			<!-- END PAGE CONTENT-->
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">List Jenis MNC Pay </span>
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
									 Plan Code
								</th>
								
								<th>
									 Product Code
								</th>
								<th>
									 Interest Rate
								</th>
								<th>
									 Action
								</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$i=1;
                            $query =" select * from mncpay_jenis order by plan_code asc ";
                         
                            $result=pg_query($connection,$query);
                            while ($row=pg_fetch_array($result)) {
                             

							echo "<tr>";
							echo "<td>$i</td>";
							echo "<td>$row[plan_code]</td>";
							echo "<td>$row[product_code]</td>";
							echo "<td>$row[interest_rate]</td>";
							echo "<td><a href='#'  data-toggle='modal' id-jenis='$row[id_jenis_mncpay]' id-plcode='$row[plan_code]' id-prcode='$row[product_code]' id-irate='$row[interest_rate]'  data-target='#edit-modal' class='detailEdit' > <button class='btn default'>Edit</button></a> <a href='#'  data-toggle='modal' id-jenis='$row[id_jenis_mncpay]' id-plcode='$row[plan_code]' id-prcode='$row[product_code]' id-irate='$row[interest_rate]' data-target='#delete-modal' class='detailDelete' > <button class='btn red'>Delete</button></a></td>";
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
		var id = $(this).attr('id-jenis');
		var plan_code = $(this).attr('id-plcode');
		var product_code = $(this).attr('id-prcode');
		var interest_rate = $(this).attr('id-irate');
    
			$("#list-user").empty();
			$("#list-user").append( 
                '<tr>'+
				'<td>'+'<div class="alert alert-danger"><h5>Sure, You Will Delete '+'<strong> Plan Code : ' + plan_code +' , Product Code : '+ product_code + '</strong> !</h5></div>'+
				'<input type="hidden" name="id_jenis_mncpay" value="'+id+'">'+
				'</td></tr>');
			  });




	$('.detailEdit').click(function() {
		var id = $(this).attr('id-jenis');
		var plan_code = $(this).attr('id-plcode');
		var product_code = $(this).attr('id-prcode');
		var interest_rate = $(this).attr('id-irate');


    	document.getElementById('ed_plan_code').value=plan_code;
    	document.getElementById('ed_product_code').value=product_code;
    	document.getElementById('ed_interest_rate').value=interest_rate;

		  //alert(id_user);
			$("#list-user2").empty();
			$("#list-user2").append( '<input type="hidden" name="id_jenis_mncpay" value="'+id+'">');
			
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
        	plan_code: {
                required: true
                
            },
            product_code: {
                required: true
                
            },
            interest_rate: {
                required: true,
                number: true
                
            }
        },

        messages: {
        	plan_code: {
                 required: "<span class='label label-warning'><i>plan code Harus diisi ...! </i></span>"
            },
            product_code: {
                 required: "<span class='label label-warning'><i>product code Harus diisi ...! </i></span>"
            },
            interest_rate: {
                 required: "<span class='label label-warning'><i>interest rate Harus diisi ...! </i></span>",
                 number: "<span class='label label-warning'><i>Harus berupa angka ...! </i></span>"
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

