<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);
$page2 = $_SERVER['PHP_SELF']."?";

if(isset($_GET['act']) && ($_GET['act']=='src')){

$id_pic=$_POST['idpic'];
$varpic="";
$id_product=$_POST['idproduct'];


} else if(isset($_GET['idpic']) && ($_GET['idpic']!='')){
$id_pic=$_GET['idpic'];	
$id_product=$_GET['idproduct'];	
} else {
$id_pic="";
$id_product="";		
}


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
            


              



             



                <!-- END MODAL DELETE -->

             
             
 <?php
    if (isset($_GET['message']) && ($_GET['message']=="success")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Successful Data Updated ....! </strong> </div>";
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

<div class="row">
				<div class="col-md-12">	
				<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">List Of Mapping PIC </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>		
<div class="portlet-body form">
<div class="table-scrollable">
							<!-- BEGIN FORM-->
							
								<div class="form-body">
								<form action="<?php echo "$page&act=src";?>" id="form_sample_3" class="form-horizontal" method="POST" >
								<div class="form-group">
										<label class="control-label col-md-3">Product <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control" name="idproduct" id="idproduct" required>
												
												<?php
												$query=" select * from master_product order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if($id_product==$row1['id_product']){
													echo " <option value='$row1[id_product]' selected='selected'>$row1[name]</option> ";
												} else {
													echo " <option value='$row1[id_product]'>$row1[name]</option> ";
												}

												}
												


												?>
												
												
											</select>
										</div>
									</div>
								<div class="form-group">
										<label class="control-label col-md-3">Type PIC <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control select2me" name="idpic" id="idpic" onchange="this.form.submit();" required>
												<option value="">Choose PIC ...</option>
												<?php
												$query=" select * from master_pic order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if($id_pic==$row1['id_pic']){
													echo " <option value='$row1[id_pic]' selected='selected'>$row1[name]</option> ";
												} else {
													echo " <option value='$row1[id_pic]'>$row1[name]</option> ";
												}

												}
												


												?>
												
												
											</select>
										</div>
									</div>
									</form>
								<form action="<?php echo "module/actions_master.php?module=$module&act=add_map_pic2"; ?>" id="form_sample_2" class="form-horizontal" method="POST">
								<div class="form-group last">
										
										<label class="control-label col-md-3">Grouped Options</label>
										<div class="col-md-9" id="m_select">
										<select multiple="multiple" class="multi-select" id="my_multi_select2" name="my_multi_select2[]">	
											<?php
											
												$query_m1=" select * from master_unit order by name asc ";
												
												$r_m1=pg_query($connection,$query_m1);
												while ($row_m1=pg_fetch_array($r_m1)){
													echo " <optgroup label='".strtoupper($row_m1['name'])."'> ";

													$query_m2=" select a.id_case,a.name from master_case a left join map_access b on a.id_case=b.id_case where b.id_unit='$row_m1[id_unit]' order by a.name asc ";

													$r_m2=pg_query($connection,$query_m2);
													while ($row_m2=pg_fetch_array($r_m2)){
														$query_cek=" select count(*) from map_pic where id_case='$row_m2[id_case]' and id_pic='$id_pic' and id_product='$id_product' ";
														$result_cek=pg_query($query_cek);
														$r_found=pg_fetch_array($result_cek);

														if($r_found['count'] >=1){
															echo " <option value='$row_m2[id_case]' selected>$row_m2[name]</option> ";	
														} else{
															echo " <option value='$row_m2[id_case]'>$row_m2[name]</option> ";
															}

													}

													echo " </optgroup> ";
												}
												
												
												
												?>
												
											</select>
										</div>
									</div>	


									
									<div class="form-group">
										<label class="control-label col-md-3"> <span class="required">
										</span>
										</label>
										<div class="col-md-4">
										<input type="hidden" name="id_pic" id="id_pic" value="<?php echo $id_pic;?>" class="form-control" required/>
										<input type="hidden" name="id_product" id="id_product" value="<?php echo $id_product;?>" class="form-control" required/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3"> <span class="required">
										</span>
										</label>
										<div class="col-md-4">
											<button type="submit" class="btn blue"> Submit >> </button>
										</div>
									</div>
									
									
								</div>


							</form>
							<!-- END FORM-->
						
			</div>		
			</div>
									
	</div>
				</div>
</div>
									
									
						



			<!-- BEGIN PAGE CONTENT-->
			
			<!-- END PAGE CONTENT-->
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">List Of Mapping PIC </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover"  width="100%">
							<thead>
							<tr>
								<th width="10%">
									 No
								</th>
								<th width="10%">
									 #
								</th>
								<th width="80%">
									 PIC / Unit / Case
								</th>
								
								
							</tr>
							</thead>
							<tbody>
							<?php
							#######################----- query product--------#################################
							 	$query_product=" select * from master_product order by name asc ";
								$result_product=pg_query($connection,$query_product);
								while ($row_product=pg_fetch_array($result_product)) {
							 	echo "<tr>";
							 	echo "<td></td>";
							 	echo "<td>PRODUCT</td>";
							 	echo "<td><b><i class='fa fa-cubes'></i> ".strtoupper($row_product['name'])."</b></td>";
							 	echo "</tr>";

							$alfabet=array(1=>'A',2=>'B',3=>'C',4=>'D',5=>'E',6=>'F',7=>'G',8=>'H',9=>'I',10=>'J',11=>'K',12=>'L',13=>'M',14=>'N',15=>'O',16=>'P',17=>'Q',18=>'R',19=>'S',20=>'T',21=>'U',22=>'V',23=>'W',24=>'X',25=>'Y',26=>'Z',27=>'AA',28=>'AB',29=>'AC',30=>'AD',31=>'AE',32=>'AF',33=>'AG',34=>'AH',35=>'AI',36=>'AJ');
							$query=" select distinct(a.id_pic), b.name from map_pic a , master_pic b where  a.id_pic=b.id_pic and a.id_product='$row_product[id_product]' order by b.name asc ";
							$result=pg_query($connection,$query);
							$y=1;
							$z=1;
							$i=1;
							 while ($row=pg_fetch_array($result)) {
							 	echo "<tr class='info' >";
							 	echo "<td>$z</td>";
							 	echo "<td>PIC</td>";
							 	echo "<td ><i class='fa fa-group'> </i><b> $i. ".strtoupper($row['name'])."</b></td>";
							 	echo "</tr>";
							 	#######################----- query unit--------#################################
							 		$query_unit =" select distinct(a.id_unit),b.name from map_pic a, master_unit b";
							 		$query_unit.=" where a.id_unit=b.id_unit and a.id_pic='$row[id_pic]' and a.id_product='$row_product[id_product]' order by b.name asc  ";
									$result_unit=pg_query($connection,$query_unit);
									$x=1;
									$z++;
									while ($row_unit=pg_fetch_array($result_unit)) {
										echo "<tr class='danger'>";
							 			echo "<td>$z</td>";
							 			echo "<td>UNIT</td>";
							 			echo "<td ><b><i class='fa fa-institution'></i> $i.$x. $row_unit[name]</b></td>";
							 			echo "</tr>";
							 	#####################-------- query case -------################################
							 			$query_case =" select distinct(a.id_case),b.name from map_pic a, master_case b ";
							 			$query_case.=" where a.id_case=b.id_case and a.id_pic='$row[id_pic]' and a.id_unit='$row_unit[id_unit]' and a.id_product='$row_product[id_product]' order by b.name asc  ";
										$result_case=pg_query($connection,$query_case);
										$y=1;
										$z++;
										while ($row_case=pg_fetch_array($result_case)) {
											echo "<tr class='warning'>";
							 				echo "<td>$z</td>";
							 				echo "<td></td>";
							 				echo "<td ><i class='fa fa-square'></i> <i>$i.$x.$y. $row_case[name]</i></td>";
							 				echo "</tr>";
							 				$y++;
							 				$z++;
							 			}
							 		$x++;
							 		//$z++;
									}


							 	$i++;
							 	//$z++;
							 }
							}
							/*
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
							*/
							

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

<!-- END PAGE LEVEL SCRIPTS -->
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script src="assets/admin/pages/scripts/form-validation.js"></script>
<script>
$(document).ready(function() {

	$('#idpic').change(function() {
		var idpic=$(this).val();
		var dataString = 'id='+idpic;
		
		//alert(dataString);
		/*
			$("#m_select").empty();
			$("#m_select").append('<select multiple="multiple" class="multi-select" id="my_multi_select2" name="my_multi_select2[]">');
			$("#m_select").append('<optgroup label="ACCOUNT MAINTENANCE">  <option value="17" selected>Kenaikan Limit Permanent</option>'+  
				'<option value="18">Kenaikan Limit Temporary</option>  <option value="16">Pengajuan Renewal</option>'+  
				'<option value="15">Pengajuan Replace Kartu</option>  </optgroup>');
			$("#m_select").append('</select>');
		*/
		//$("#my_multi_select2").multiselect('destroy');
		//$("#my_multi_select2").multiselect();
		//$("#my_multi_select2").multiselect("refresh");
		$('#my_multi_select2').multiSelect({ selectableOptgroup: true });
		$.ajax({
		type: "POST",
		url: "module/ajax/ajax_map_pic2.php",
		data: dataString,
		cache: false,
		success: function(html)
		{
			$("#my_multi_select2").html(html);
		} 
			});	


		});



}); // document ready	$(document).ready(function() {

    </script>

 <script>
jQuery(document).ready(function () {
    var form1 = $('#form_sample_2');
    var error1 = $('.alert-danger', form1);
    var success1 = $('.alert-success', form1);
	

    $('#form_sample_2').validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
		ignore: "",
        rules: {
        	id_pic: {
                required: true
                
            },
            id_product: {
                required: true
                
            }
        },

        messages: {
        	id_pic: {
                 required: "<span class='label label-warning'><i>PIC Name Harus diisi ...! </i></span>"
            },
            id_product: {
                 required: "<span class='label label-warning'><i>Nama Produk Harus diisi ...! </i></span>"
            }

        },

        invalidHandler: function (event, validator) { //display error alert on form submit   
            success1.hide();
            $('.alert-danger span').text("Form Belum Komplit, Silahkan cek kembali informasi dibawah ... !");
            $('.alert-danger', $('#form_sample_2')).show();
            Metronic.scrollTo(error1, -200);
        },

        
    });
	
	
});
               
</script>  
