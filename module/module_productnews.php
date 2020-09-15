<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);

if (isset($_GET['act']) && $_GET['act']=='ed'){
	$var_act="edit_productnews";
	$id_pnews=$_GET['idx'];
	$select="";
	$q_cek=" select * from product_news where id_pnews='$id_pnews' ";
	$res_cek=pg_query($connection,$q_cek);
	$row_cek=pg_fetch_array($res_cek);
//echo $q_cek;
	$ket=" Edit ";
} else {

	$var_act="add_productnews";
	$select="select2me";
	$ket=" Add ";
}
?>



<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/jquery-tags-input/jquery.tagsinput.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
<link rel="stylesheet" type="text/css" href="assets/global/plugins/typeahead/typeahead.css">
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>

<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- /.modal -->
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			

			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title bold">
			  Product News  <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">News Page</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#"> Product News </a>
						<i class="fa fa-angle-right"></i>
					</li>
				
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
            <!-- MODAL INSERT -->
							
             <!-- END MODAL INSERT -->


               <!-- MODAL EDIT -->
             

							 <!-- MODAL UPDATE-->
							<div class="modal fade"  id="edit-modal" tabindex="-1"  aria-hidden="true"  role="dialog"  aria-labelledby="myModalLabel">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Edit  Product News </h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN VALIDATION STATES-->
					<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Edit Product News </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="<?php echo "module/actions_master.php?module=$module&act=edit_kategori_faq"; ?>" id="form_sample_2" class="form-horizontal" method="POST">
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
										<label class="control-label col-md-3">Title  <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="ed_title" id="ed_title" placeholder="Title News ..." class="form-control" required/>
										</div>
									</div>
									<div class="form-group last">
										<label class="control-label col-md-3">News Content <span class="required">
										* </span>
										</label>
										<div class="col-md-9" id="ed_news2">
											
											<textarea class="ckeditor form-control" name="ed_news" id="ed_news" rows="6" data-error-container="#editor2_error" placeholder="Kontent Berita ..."></textarea>
										</div>
									</div>
										<div class="form-group last">
										<label class="control-label col-md-3">Image Upload </label>
										<div class="col-md-9">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
													<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
												</div>
												<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
												</div>
												<div>
													<span class="btn default btn-file">
													<span class="fileinput-new">
													Select image </span>
													<span class="fileinput-exists">
													Change </span>
													<input type="file" name="file_img" id="file_img">
													</span>
													<a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
													Remove </a>
												</div>
											</div>
											
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">Category</label>
										<div class="col-md-4">
											<select class="form-control input-medium" name="ed_id_kategori" id="ed_id_kategori" data-placeholder="Choose Category...">
												
												
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
											<h4 class="modal-title" id="myModalLabel"><strong>Delete Product News </strong></h4>
										</div>
										<div class="modal-body">
							<form action="<?php echo "module/actions_master.php?module=$module&act=delete_pronews"; ?>" class="form-horizontal" method="POST">
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
<!--
<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i><?php echo $ket; ?> Product News 
							</div>
							<div class="tools">
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
-->

<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase"><?php echo $ket; ?> Product News </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>



			<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="<?php echo "module/actions_master.php?module=$module&pm=$pm&act=$var_act"; ?>" id="form_sample_3" class="form-horizontal" method="POST" enctype="multipart/form-data">
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
										<label class="control-label col-md-3">Title  <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="judul" id="judul" value="<?php echo $row_cek['title'];?>" placeholder="Title News ..." class="form-control" required/>
										</div>
									</div>
									<div class="form-group last">
										<label class="control-label col-md-3">News Content <span class="required">
										* </span>
										</label>
										<div class="col-md-9">
											<textarea class="ckeditor form-control" name="kontent" id="kontent" rows="6" data-error-container="#editor2_error" placeholder="Kontent Berita ..."><?php echo $row_cek['news'];?></textarea>
											
										</div>
									</div>
										<div class="form-group last">
										<label class="control-label col-md-3">Image Upload </label>
										<div class="col-md-9">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
												<?php if (isset($row_cek['image'])) { 
													$random=rand(1,999999999);
													echo "<img src='images/img-prodnews/$row_cek[image]?var=$random' alt=''/>";
												} else {
													?>
													<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
													<?php 
														}
													?>		
												</div>
												<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
												</div>
												<div>
													<span class="btn default btn-file">
													<span class="fileinput-new">
													Select image </span>
													<span class="fileinput-exists">
													Change </span>
													<input type="file" name="file_img" id="file_img">
													</span>
													<a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
													Remove </a>
												</div>
											</div>
											
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">Category</label>
										<div class="col-md-4">
											<select class="form-control input-medium <?php echo $select;?>" name="id_kategori" id="id_kategori" data-placeholder="Choose Category...">
												
												<?php
												$query=" select * from category_productnews order by name_category asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($row_cek['id_cat_pnews']=="$row1[id_cat_pnews]"){
													   echo "<option value='$row1[id_cat_pnews]' selected='selected'>$row1[name_category]</option> ";
												     } else {

												     	echo "<option value='$row1[id_cat_pnews]'>$row1[name_category]</option> ";
												     }

												}
												


												?>
											</select>
											
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Publish</label>
										<div class="col-md-4">
											<select class="form-control input-medium" name="publish" id="publish">

												<option value="0" <?php if($row_cek['status']=='0') echo "selected='selected'"; ?> >No Publish</option>
												<option value="1" <?php if($row_cek['status']=='1') echo "selected='selected'"; ?> >Publish</option>
											</select>
											
										</div>
									</div>

									<?php

									if (isset($id_pnews)) {

										echo "<input type='hidden' name='id_pnews' value='$id_pnews'>";
										echo "<input type='hidden' name='gambar' value='$row_cek[image]'>";
									}

									?>

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
											<span class="caption-subject font-red-sunglo bold uppercase">List Of Product News </span>
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
									 Title  
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
							//
							$i=1;
                            $query  =" select a.title,a.status,a.addby,a.id_pnews,a.id_cat_pnews,a.news,a.adddt, b.name_category from product_news a ";
                            $query .=" left join category_productnews b on b.id_cat_pnews=a.id_cat_pnews  order by b.name_category asc ";
                            
                            $result=pg_query($connection,$query);
                            $i=1;
                            while ($row=pg_fetch_array($result)) {


                              switch ($row['status']) {
		 				 		case '0' : $status= "  <span class='label label-danger'> <i> No Publish </i> </span>  "; break; 
						 		case '1' : $status= "  <span class='label label-success'> <i> Publish </i> </span> "; break; 
						 			}
							echo "<tr>";
							echo "<td style='font-size:11px'>$i</td>";
							echo "<td style='font-size:11px'><b>$row[title]</b></td>";
							echo "<td style='font-size:11px'>$row[name_category]</td>";
							echo "<td style='font-size:11px'>$status</td>";
							echo "<td style='font-size:11px'><b>$row[addby]</b><br>".date('d-m-Y',strtotime($row['adddt']))."</td>";
							echo "<td style='font-size:11px'><a href='$page&act=ed&idx=$row[id_pnews]' > <button class='btn green-haze btn-xs'> Edit </button></a><a href='#'  data-toggle='modal' id-pronews='$row[id_pnews]' id-status='$row[status]' id-title='$row[title]' id-news='$row[news]' id-cat='$row[id_cat_pnews]'  data-target='#delete-modal' class='deletePronews' > <button class='btn red btn-xs' type='button'> Delete </button></a></td>";
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

	$('.deletePronews').click(function() {
		var id_prodnews = $(this).attr('id-pronews');
		var nama = $(this).attr('id-title');
    
		  //alert(nama_kategori);
			$("#list-user").empty();
			$("#list-user").append( 
                '<tr>'+
				'<td>'+'<h5>Sure, You Will Delete Product News ! , title  : <br> <br> "'+'<strong>' + nama +' "</strong></h5>'+
				'<input type="hidden" name="id_pnews" value="'+id_prodnews+'"> '+
				'</td></tr>');
			  });



	$('.detailEdit').click(function() {
		var id_prodnews = $(this).attr('id-pronews');
		var nama = $(this).attr('id-title');
		var news = $(this).attr('id-news');
		var status = $(this).attr('id-status');
		var id_cat = $(this).attr('id-cat');
		//alert (news);
		//document.getElementById('ed_nama_cabang').value=id_cabang;
		document.getElementById('ed_title').value=nama;
    	document.getElementById('ed_news').value=news;
    	//$("#ed_news2").empty();
    	//$("#ed_news2").append();
    	
    	$("#ed_publish").empty();
			if (status=='0'){
				$("#ed_publish").append( '<option value="0" selected="selected"> No Publish </option>');
				$("#ed_publish").append( '<option value="1" > Publish </option>');
			} else {
				$("#ed_publish").append( '<option value="0" > No Publish </option>');
				$("#ed_publish").append( '<option value="1" selected="selected"> Publish </option>');			
			}
			var dataString1 = 'id='+id_cat;
					//alert(dataString);
					$.ajax({
					type: "POST",
					url: "module/ajax/ajax_kategori_prodnews.php",
					data: dataString1,
					cache: false,
					success: function(html)
					{
						$("#ed_id_kategori").html(html);
					} 
						});
		  //alert(id_user);
			$("#list-user2").empty();
			$("#list-user2").append( '<input type="hidden" name="id_prodnews" value="'+id_prodnews+'">');
			
			  });


}); // document ready	$(document).ready(function() {

    </script>


<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/fuelux/js/spinner.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
<script src="assets/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-tags-input/jquery.tagsinput.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script src="assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/global/plugins/ckeditor/ckeditor.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/components-form-tools.js"></script>

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
        	judul: {
                required: true
                
            },
            //kontent: {
             //   required: true
                
           // },
           /// file_img: {
            ///    required: true
                
           /// },
            id_kategori: {
                required: true
                
            },
            publish: {
                required: true
                
            }
        },

        messages: {
        	judul: {
                 required: "<span class='label label-warning'><i>Judul Harus diisi ...! </i></span>"
            },
           // kontent: {
           //      required: "<span class='label label-warning'><i>Kontent Harus diisi ...! </i></span>"
           // },
            //file_img: {
            //     required: "<span class='label label-warning'><i>Image Harus diisi ...! </i></span>"
            //},
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
