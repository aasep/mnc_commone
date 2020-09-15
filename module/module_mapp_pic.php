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
			Mapping PIC <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Mapping</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">PIC</a>
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
											<h4 class="modal-title">Add Mapping PIC</h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Add Mapping PIC
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
							<!-- BEGIN FORM-->
							<form action="<?php echo "module/actions_master.php?module=$module&act=add_map_pic"; ?>" id="form_sample_3" class="form-horizontal" method="POST">
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
										<label class="control-label col-md-4">Type PIC <span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<select class="form-control select2me" name="idpic" id="idpic" required>
												<option value="">Choose PIC ...</option>
												<?php
												$query=" select * from master_pic order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){

													echo " <option value='$row1[id_pic]'>$row1[name]</option> ";


												}
												


												?>
												
												
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-4">Product<span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<select class="form-control select2me" name="idproduct" id="idproduct" required>
												<option value="">choose Product...</option>
												<?php
												$query=" select * from master_product order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){

													echo " <option value='$row1[id_product]'>$row1[name]</option> ";


												}
												


												?>
												
												
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-4">Unit <span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<select class="form-control select2me" name="idunit" id="idunit" required>
												<option value="">Pilih Unit...</option>
												<?php
												$query=" select * from master_unit order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){

													echo " <option value='$row1[id_unit]'>$row1[name]</option> ";


												}
												


												?>
											</select>
										</div>
									</div>


									<div class="form-group">
										<label class="control-label col-md-4">Proses<span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<select class="form-control select2me" name="idproses" id="idproses" required>
												<option value="">Pilih Proses...</option>
												<?php
												$query=" select * from master_process order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){

													echo " <option value='$row1[id_process]'>$row1[name]</option> ";


												}
												


												?>
											</select>
										</div>
									</div>


									<div class="form-group">
										<label class="control-label col-md-4">Permasalahan <span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<select class="form-control select2me" name="idpermasalahan" id="idpermasalahan" required>
												<option value="">Permasalahan...</option>
												<?php
												$query=" select * from master_case order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){

													echo " <option value='$row1[id_case]'>$row1[name]</option> ";


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
             

							 <!-- MODAL UPDATE-->
							<div class="modal fade"  id="edit-modal" tabindex="-1"  aria-hidden="true"  role="dialog"  aria-labelledby="myModalLabel">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Edit Mapping PIC</h4>
										</div>
										<div class="modal-body">
											<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Edit Mapping PIC
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="<?php echo "module/actions_master.php?module=$module&act=edit_map_pic"; ?>" id="form_sample_2" class="form-horizontal" method="POST">
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
										<label class="control-label col-md-4">Type PIC <span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<select class="form-control " name="ed_pic" id="ed_pic" required>
												
												<?php
												$query=" select * from master_pic order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){

													echo " <option value='$row1[id_product]'>$row1[name]</option> ";


												}
												


												?>
												
												
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-4">Product<span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<select class="form-control " name="ed_product" id="ed_product" required>
												
												<?php
												$query=" select * from master_product order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){

													echo " <option value='$row1[id_product]'>$row1[name]</option> ";


												}
												


												?>
												
												
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-4">Unit <span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<select class="form-control" name="ed_unit" id="ed_unit" required>
												<option value="">Pilih Unit...</option>
												<?php
												$query=" select * from master_unit order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){

													echo " <option value='$row1[id_unit]'>$row1[name]</option> ";


												}
												


												?>
											</select>
										</div>
									</div>


									<div class="form-group">
										<label class="control-label col-md-4">Proses<span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<select class="form-control" name="ed_process" id="ed_process" required>
												<option value="">Pilih Proses...</option>
												<?php
												$query=" select * from master_process order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){

													echo " <option value='$row1[id_process]'>$row1[name]</option> ";


												}
												


												?>
											</select>
										</div>
									</div>


									<div class="form-group">
										<label class="control-label col-md-4">Permasalahan <span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<select class="form-control" name="ed_case" id="ed_case" required>
												<option value="">Permasalahan...</option>
												<?php
											$query=" select * from master_case where id_case not in (select id_case from map_pic where id_pic='".getIdPic()."' ) order by name asc ";
												       //select * from master_case where id_case not in (select id_case from map_access) order by name asc
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){

													echo " <option value='$row1[id_case]'>$row1[name]</option> ";


												}
												


												?>
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
								<div class="modal-dialog modal-lg" >
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title" id="myModalLabel"><strong>Delete Mapping Product Access</strong></h4>
										</div>
										<div class="modal-body">
							<form action="<?php echo "module/actions_master.php?module=$module&act=delete_map_pic"; ?>" class="form-horizontal" method="POST">
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

             <a class="btn blue" data-toggle="modal" href="#basic">Add Mapping PIC <i class="fa fa-plus"></i> </a> </br> </br>
             
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
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Daftar Mapping PIC
							</div>
							<div class="tools">
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
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
									 Jenis PIC
								</th>
								<th>
									 Nama Produk
								</th>
								
								<th>
									 Unit
								</th>
								<th>
									 Process
								</th>
								<th>
									 Case
								</th>
								<th>
									 Action
								</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$i=1;
                            $query  =" select z.id_map_pic,e.id_pic, e.name as nama_pic,a.id_product, a.name as nama_produk, b.id_unit, b.name as nama_unit, c.id_process, ";
                            $query .=" c.name as nama_proses, d.id_case, d.name as nama_kasus from map_pic z ";
                            $query .=" left join master_product a on a.id_product=z.id_product ";
                            $query .=" left join master_unit b on b.id_unit=z.id_unit ";
                            $query .=" left join master_process c on c.id_process=z.id_process ";
                            $query .=" left join master_case d on d.id_case=z.id_case ";
                            $query .=" left join master_pic e on e.id_pic=z.id_pic ";
                          
                         
                            $result=pg_query($connection,$query);
                            while ($row=pg_fetch_array($result)) {
                           

							echo "<tr>";
							echo "<td>$i</td>";
							echo "<td>$row[nama_pic]</td>";
							echo "<td>$row[nama_produk]</td>";
							echo "<td>$row[nama_unit]</td>";
							echo "<td>$row[nama_proses]</td>";
							echo "<td>$row[nama_kasus]</td>";
							echo "<td><a href='#'  data-toggle='modal' id-access='$row[id_map_pic]' id-pic='$row[id_pic]' id-namapic='$row[nama_pic]' id-product='$row[id_product]' id-namaproduk='$row[nama_produk]' id-unit='$row[id_unit]' id-namaunit='$row[nama_unit]' id-process='$row[id_process]' id-namaproses='$row[nama_proses]' id-case='$row[id_case]' id-namakasus='$row[nama_kasus]'  data-target='#edit-modal' class='detailEdit' > <button class='btn default'>Edit</button></a> <a href='#'  data-toggle='modal' id-access='$row[id_map_pic]' id-pic='$row[id_pic]' id-namapic='$row[nama_pic]' id-product='$row[id_product]' id-namaproduk='$row[nama_produk]' id-unit='$row[id_unit]' id-namaunit='$row[nama_unit]' id-process='$row[id_process]' id-namaproses='$row[nama_proses]' id-case='$row[id_case]' id-namakasus='$row[nama_kasus]' data-target='#delete-modal' class='detailDelete' > <button class='btn red'>Delete</button></a></td>";
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

	$('#idpic').change(function() {
		var idpic=$(this).val();
		var dataString = 'id='+idpic;
		
		//alert(dataString);
		

		$.ajax({
		type: "POST",
		url: "module/ajax/ajax_map_pic_case.php",
		data: dataString,
		cache: false,
		success: function(html)
		{
			$("#idpermasalahan").html(html);
		} 
			});	


		});




	$('.detailDelete').click(function() {
		var id_access = $(this).attr('id-access');
		var id_product = $(this).attr('id-product');
		var nama_product = $(this).attr('id-namaproduk');
		var id_unit = $(this).attr('id-unit');
		var nama_unit = $(this).attr('id-namaunit');
		var id_process = $(this).attr('id-process');
		var nama_process = $(this).attr('id-namaproses');
		var id_case = $(this).attr('id-case');
		var nama_case = $(this).attr('id-namakasus');
		var id_pic = $(this).attr('id-pic');
		var nama_pic = $(this).attr('id-namapic');
    
		  //alert(id_user);
			$("#list-user").empty();
			$("#list-user").append( 
                '<tr>'+
				'<td>'+'<h5><div class="alert alert-warning alert-dismissable"><b>Yakin Anda Akan Mendelete Relasi :</b> <p></p><p>'+'<strong> Type PIC : </strong><i>' + nama_pic +'<strong> Product : </strong><i>' + nama_product + '</i>, <strong>Unit : </strong><i>' +nama_unit +'</i>, <strong>Process : </strong> <i>'+nama_process+'</i>, <strong>Case : </strong><i>'+nama_case+'</i></p></div></h5>'+
				'<input type="hidden" name="id_access" value="'+id_access+'">'+
				'</td></tr>');
			  });



	$('.detailEdit').click(function() {
		var id_access = $(this).attr('id-access');
		var id_product = $(this).attr('id-product');
		var id_unit = $(this).attr('id-unit');
		var id_process = $(this).attr('id-process');
		var id_case = $(this).attr('id-case');
		var id_pic = $(this).attr('id-pic');

		var id_causebi= $(this).attr('id-causebi');
		var nama_causebi= $(this).attr('id-nama');
		//alert(id_product);

		//document.getElementById('ed_nama_cabang').value=id_cabang;
    	//document.getElementById('ed_nama').value=nama_causebi;

		  //alert(id_user);
			$("#list-user2").empty();
			$("#list-user2").append( '<input type="hidden" name="id_access" value="'+id_access+'">');
			
			  

		var dataString1 = 'id='+id_product;
		var dataString2 = 'id='+id_unit;
		var dataString3 = 'id='+id_process;
		var dataString4 = 'id='+id_case;
		var dataString5 = 'id='+id_pic;
		//alert(dataString1);
		$.ajax({
		type: "POST",
		url: "module/ajax_product.php",
		data: dataString1,
		cache: false,
		success: function(html)
		{
			$("#ed_product").html(html);
		} 
			});	


		$.ajax({
		type: "POST",
		url: "module/ajax_unit.php",
		data: dataString2,
		cache: false,
		success: function(html)
		{
			$("#ed_unit").html(html);
		} 
			});	

		$.ajax({
		type: "POST",
		url: "module/ajax_process.php",
		data: dataString3,
		cache: false,
		success: function(html)
		{
			$("#ed_process").html(html);
		} 
			});	

		$.ajax({
		type: "POST",
		url: "module/ajax_case.php",
		data: dataString4,
		cache: false,
		success: function(html)
		{
			$("#ed_case").html(html);
		} 
			});	

		$.ajax({
		type: "POST",
		url: "module/ajax_pic.php",
		data: dataString5,
		cache: false,
		success: function(html)
		{
			$("#ed_pic").html(html);
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
        	idproduct: {
                required: true
                
            },
            idunit: {
                required: true
                
            },
            idproses: {
                required: true
                
            },
            idpermasalahan: {
                required: true
                
            }
        },

        messages: {
        	idproduct: {
                 required: "<span class='label label-warning'><i>Nama Produk Harus diisi ...! </i></span>"
            },
            idunit: {
                 required: "<span class='label label-warning'><i>Nama Unit Harus diisi ...! </i></span>"
            },
            idproses: {
                 required: "<span class='label label-warning'><i>Nama Proses Harus diisi ...! </i></span>"
            },
            idpermasalahan: {
                 required: "<span class='label label-warning'><i>Nama Permasalahan Harus diisi ...! </i></span>"
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

