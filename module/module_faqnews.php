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
			  FAQ  <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">News Page</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#"> FAQ </a>
						<i class="fa fa-angle-right"></i>
					</li>
				
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
          


               <!-- MODAL EDIT -->
             

							 <!-- MODAL UPDATE-->
							<div class="modal fade"  id="edit-modal" tabindex="-1"  aria-hidden="true"  role="dialog"  aria-labelledby="myModalLabel">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Edit  FAQ </h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN VALIDATION STATES-->
					<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">EDIT FAQ</span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>

						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="<?php echo "module/actions_master.php?module=$module&act=edit_faq"; ?>" id="form_sample_2" class="form-horizontal" method="POST">
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
										<label class="control-label col-md-3">Question  <span class="required">
										* </span>
										</label>
										<div class="col-md-6">
											<input type="text" name="ed_question" id="ed_question" placeholder="Input Question ..." class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Answer  <span class="required">
										* </span>
										</label>
										<div class="col-md-6">
											<textarea name="ed_answer" id="ed_answer" placeholder="Input Answer ..." class="form-control" required="required" rows="3"></textarea>
										</div>
									</div>
									
										
									<div class="form-group">
										<label class="control-label col-md-3">Category</label>
										<div class="col-md-4">
											<select class="form-control input-medium" name="ed_id_kategori" id="ed_id_kategori" >
												
											</select>
											
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Publish</label>
										<div class="col-md-4">
											<select class="form-control input-medium" name="ed_publish" id="ed_publish">
											
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
											<h4 class="modal-title" id="myModalLabel"><strong>Delete Faq </strong></h4>
										</div>
										<div class="modal-body">
							<form action="<?php echo "module/actions_master.php?module=$module&act=delete_faq"; ?>" class="form-horizontal" method="POST">
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

            <!-- <a class="btn blue" data-toggle="modal" href="#basic">Add  Product News  <i class="fa fa-plus"></i> </a> </br> </br> -->
             
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
<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Add FAQ</span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>

			<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="<?php echo "module/actions_master.php?module=$module&act=add_faqnews"; ?>" id="form_sample_3" class="form-horizontal" method="POST" enctype="multipart/form-data">
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
										<label class="control-label col-md-3">Question  <span class="required">
										* </span>
										</label>
										<div class="col-md-6">
											<input type="text" name="pertanyaan" id="pertanyaan" placeholder="Input Question ..." class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Answer  <span class="required">
										* </span>
										</label>
										<div class="col-md-6">
											<textarea name="jawaban" id="jawaban" placeholder="Input Answer ..." class="form-control" required="required" rows="3"></textarea>
										</div>
									</div>
									
										
									<div class="form-group">
										<label class="control-label col-md-3">Category</label>
										<div class="col-md-4">
											<select class="form-control input-medium select2me" name="id_kategori" id="id_kategori" data-placeholder="Choose Category...">
												<option value=""></option>
												<?php
												$query=" select * from category_faq order by name_category asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){

													echo " <option value='$row1[id_catfaq]'>$row1[name_category]</option> ";


												}
												


												?>
											</select>
											
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Publish</label>
										<div class="col-md-4">
											<select class="form-control input-medium" name="publish" id="publish">
												<option value="">Publish  ... </option>

												
												<option value="0">No Publish</option>
												<option value="1">Publish</option>
											</select>
											
										</div>
									</div>


									<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green"><i class="fa fa-check"></i> Submit</button>
											
										</div>
									</div>
								</div>
								</div>
								</form>
									<!--
									<div class="form-group last">
										<label class="control-label col-md-3">Image Upload #2</label>
										<div class="col-md-9">
											<div>
													<a class="btn blue" data-toggle="modal" href="#basic">Upload <i class="fa fa-upload"></i> </a>
													
												</div>

											
										</div>
									</div>
									-->

								</div>
								
							
						</div>

						<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">List Of FAQ</span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>

						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2" width="100%">
							<thead>
							<tr>
								<th style="font-size:11px" width="5%">
									 No
								</th>
								<th style="font-size:11px" width="40%">
									 Question /  Answer 
								</th>
								<th  style="font-size:11px" width="20%">
									 Category
								</th>
								<th style="font-size:11px" width="10%">
									 Publish
								</th>
								<th style="font-size:11px" width="10%">
									 Addby / Time
								</th>
								<th style="font-size:11px" width="15%">
									 Action
								</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$i=1;
                            $query  =" select *, b.name_category from faq a ";
                            $query .=" left join category_faq b on b.id_catfaq=a.id_catfaq  order by b.name_category asc ";
                            
                            $result=pg_query($connection,$query);
                            $i=1;
                            while ($row=pg_fetch_array($result)) {


                              switch ($row['status']) {
		 				 		case '0' : $status= "  <span class='label label-danger'> <i> No Publish </i> </span>  "; break; 
						 		case '1' : $status= "  <span class='label label-success'> <i> Publish </i> </span> "; break; 
						 			}
							echo "<tr>";
							echo "<td style='font-size:11px'>$i</td>";
							echo "<td style='font-size:11px'><b>$row[question]</b><br><i>$row[answer]</i></td>";
							echo "<td style='font-size:11px'>$row[name_category]</td>";
							echo "<td style='font-size:11px'>$status</td>";
							echo "<td style='font-size:11px'><b>$row[addby]</b><br>".date('d-m-Y H:i',strtotime($row['adddt']))."</td>";
							echo "<td style='font-size:11px'><a href='#'  data-toggle='modal' id-faq='$row[id_faq]' id-status='$row[status]' id-quest='$row[question]' id-answr='$row[answer]' id-catfaq='$row[id_catfaq]'  data-target='#edit-modal' class='detailEdit' > <button class='btn green-haze btn-xs'> Edit </button></a><a href='#'  data-toggle='modal' id-faq='$row[id_faq]' id-nama='$row[question]'  data-target='#delete-modal' class='deleteFAQ' > <button class='btn red btn-xs' type='button'> Delete </button></a></td>";
							echo "</tr>";
							$i++;
							
									}
							?>


							</tbody>
							</table>
						</div>
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

<!-- BEGIN PAGE LEVEL PLUGINS -->


<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL STYLES -->

<script src="assets/admin/pages/scripts/form-validation.js"></script>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function() {

	$('.deleteFAQ').click(function() {
		var id_faq = $(this).attr('id-faq');
		var question = $(this).attr('id-nama');
    
		  //alert(nama_kategori);
			$("#list-user").empty();
			$("#list-user").append( 
                '<tr>'+
				'<td>'+'<h5>Sure, You Will Delete Question : '+'<strong>' + question +'</strong> !</h5>'+
				'<input type="hidden" name="id_faq" value="'+id_faq+'">'+
				'</td></tr>');
			  });



	$('.detailEdit').click(function() {
		var id_faq = $(this).attr('id-faq');
		var question = $(this).attr('id-quest');
		var answer = $(this).attr('id-answr');
		var status = $(this).attr('id-status');
		var id_catfaq = $(this).attr('id-catfaq');
   

		//document.getElementById('ed_nama_cabang').value=id_cabang;
    	document.getElementById('ed_question').value=question;
    	document.getElementById('ed_answer').value=answer;

		  //alert(id_user);

		 	$("#ed_publish").empty();
			if (status=='0'){
				$("#ed_publish").append( '<option value="0" selected="selected"> No Publish </option>');
				$("#ed_publish").append( '<option value="1" > Publish </option>');
			} else {
				$("#ed_publish").append( '<option value="0" > No Publish </option>');
				$("#ed_publish").append( '<option value="1" selected="selected"> Publish </option>');			
			}

					var dataString1 = 'id='+id_catfaq;
					//alert(dataString);
					$.ajax({
					type: "POST",
					url: "module/ajax/ajax_kategori_faq.php",
					data: dataString1,
					cache: false,
					success: function(html)
					{
						$("#ed_id_kategori").html(html);
					} 
						});

		  	
			$("#list-user2").empty();
			$("#list-user2").append( '<input type="hidden" name="id_faq" value="'+id_faq+'">');
			




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
        	pertanyaan: {
                required: true
                
            },
            jawaban: {
                required: true
                
            },
            id_kategori: {
                required: true
                
            },
            publish: {
                required: true
                
            }
        },

        messages: {
        	pertanyaan: {
                 required: "<span class='label label-warning'><i>Pertanyaan Harus diisi ...! </i></span>"
            },
            jawaban: {
                 required: "<span class='label label-warning'><i>Jawaban Harus diisi ...! </i></span>"
            },
            id_kategori: {
                 required: "<span class='label label-warning'><i>Kategori Harus diisi ...! </i></span>"
            },
            publish: {
                 required: "<span class='label label-warning'><i>Publish Harus diisi ...! </i></span>"
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
