<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);
$current_date = date('Y-m-d');
//error_reporting(1);


/*

####### Query Belum dikerjakan (status=1 & Sla on) ########
$query1 =" select count(a.id_lapker) as jml1 from laporan_kerja a  where a.status='1'  and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' ";
$query1.=" $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";

$result1=pg_query($connection,$query1);
$row1=pg_fetch_array($result1);
$count1=$row1['jml1'];
if(!isset($count1)) $count1=0;

####### Query sedang dikerjakan (status=2 & Sla on) ########
$query2 =" select count(a.id_lapker) as jml2 from laporan_kerja a  where a.status='2'  and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' ";
$query2.=" $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";
$result2=pg_query($connection,$query2);
$row2=pg_fetch_array($result2);
$count2=$row2['jml2'];
if(!isset($count2)) $count2=0;
####### Query selesai dikerjakan (status=3 )########
$query3 =" select count(a.id_lapker) as jml3 from laporan_kerja a where a.status='3' ";
$query3.=" $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";
$result3=pg_query($connection,$query3);
$row3=pg_fetch_array($result3);
$count3=$row3['jml3'];
if(!isset($count3)) $count3=0;
####### Query expire  (status=1 atau 2 & Sla off )########
$query4 =" select count(a.id_lapker) as jml4 from laporan_kerja a  where a.status in ('1','2')  and  to_char(a.date_sla, 'YYYY-MM-DD') < '".$current_date."' ";
$query4.=" $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";
//echo $query4;
$result4=pg_query($connection,$query4);
$row4=pg_fetch_array($result4);
$count4=$row4['jml4'];
if(!isset($count4)) $count4=0;

$jml_total=$count1+$count2+$count3+$count4;
#persen belum
$per_c1=($count1/$jml_total)*100;
#persen sedang
$per_c2=($count2/$jml_total)*100;
#persen selesai
$per_c3=($count3/$jml_total)*100;
#kaladuarsa
$per_c4=($count4/$jml_total)*100;



*/







?>
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
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
			<h3 class="page-title">
			  Export Excel Dashboard  <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Monitoring</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#"> Export Excel</a>
						<i class="fa fa-angle-right"></i>
					</li>
				
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
         


							
               <div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-green-haze"></i>
											<span class="caption-subject font-green-haze bold uppercase">Export Monitoring </span>
											<span class="caption-helper">for Export Excel value ...</span>
										</div>
										
									</div>



						<form action="<?php echo $page."&act=src";?>" id="form_sample_3" class="form-horizontal" method="POST"> 
								
							<!--  alert id kosong -->
								<div class="alert alert-danger" style="display:none" id="kosong">
										<button class="close" data-close="alert"></button>
										Product and Periode is required ... !
									</div>



							<table width="100%">
                                   <tr>
                                   <td width="50%" >&nbsp;
									
									</td>
									<td width="50%" >&nbsp;
									
									</td>
									</tr>
									<tr>
                                   <td width="50%" >
									<div class="form-group">
										<label class="control-label col-md-3">Product<span class="required">
										* </span>
										</label>
										<div class="col-md-6">
											<select class="form-control select2me" name="idproduct" id="idproduct" required>
												<option value="">Choose Product...</option>
												<?php
												$query=" select * from master_product order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($idproduct==$row1['id_product']){
														echo " <option value='$row1[id_product]' selected='selected'>$row1[name]</option> ";
													} else {
														echo " <option value='$row1[id_product]'>$row1[name]</option> ";
													}
												}
												?>
												
												
											</select>
										</div>
									</div>
									</td>
									<td width="50%" >
									<div class="form-group">
										<label class="control-label col-md-4">Unit <span class="required">
										 </span>
										</label>
										<div class="col-md-6">
											<select class="form-control" name="idunit" id="idunit" >
												<option value="">Choose Unit...</option>
												<?php
												$query=" select * from master_unit order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($idunit==$row1['id_unit']){
														echo " <option value='$row1[id_unit]' selected='selected'>$row1[name]</option> ";
													} else {
														echo " <option value='$row1[id_unit]' >$row1[name]</option> ";
													}

												}
												


												?>
											</select>
										</div>
									</div>
									</td>
									</tr>
									
									<tr>
									<td>
									<div class="form-group">
										<label class="control-label col-md-3">Process<span class="required">
										 </span>
										</label>
										<div class="col-md-8">
											<select class="form-control" name="idproses" id="idproses" >
												<option value="">Choose Process...</option>
												<?php
												$query=" select * from master_process order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($idproses==$row1['id_process']){
														echo " <option value='$row1[id_process]' selected='selected'>$row1[name]</option> ";

													} else {
														echo " <option value='$row1[id_process]'>$row1[name]</option> ";
													}
												}
												


												?>
											</select>
										</div>
									</div>
									</td>
									<td>
									<div class="form-group">
										<label class="control-label col-md-4">Case <span class="required">
										 </span>
										</label>
										<div class="col-md-6">
											<select class="form-control" name="idpermasalahan" id="idpermasalahan" >
												<option value="">Choose Case...</option>
												<?php
												$query=" select * from master_case order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($idpermasalahan==$row1['id_case']){
														echo " <option value='$row1[id_case]' selected='selected'>$row1[name]</option> ";
													} else {
														echo " <option value='$row1[id_case]'>$row1[name]</option> ";
													}

												}
												


												?>
											</select>
										</div>
									</div>
									</td>
									</tr>
									
									<tr>
									<td>
									<div class="form-group">
										<label class="control-label col-md-3">Cause <span class="required">
										 </span>
										</label>
										<div class="col-md-8">
											<select class="form-control select2me" name="idpenyebab" id="idpenyebab" >
												<option value="">Choose Cause...</option>
												<?php
												$query=" select * from bi_cause order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($idpenyebab==$row1['id_cause_bi']){
														echo " <option value='$row1[id_cause_bi]' selected='selected'>$row1[name]</option> ";
													} else {
														echo " <option value='$row1[id_cause_bi]'>$row1[name]</option> ";
													}

												}
												


												?>
											</select>
										</div>
									</div>
									</td>
									<td>
									<div class="form-group">
										<label class="control-label col-md-4">Inquiry Type 
										</label>
										<div class="col-md-6">
											<select class="form-control select2me" name="idjenis_laporan" id="idjenis_laporan" >
												<option value="">Choose Type...</option>
												<?php
												$query=" select * from master_report order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($idjenis_laporan==$row1['id_report']){
														echo " <option value='$row1[id_report]' selected='selected'>$row1[name]</option> ";
													} else {
														echo " <option value='$row1[id_report]'>$row1[name]</option> ";
													}
												}
												?>
											</select>
										</div>
									</div>


									
									</td>
									</tr>
									
									<tr>
									<td>
									<div class="form-group">
										<label class="control-label col-md-3">Periode <span class="required">
										* </span></label>
										<div class="col-md-6">
											<div class="input-group input-large date-picker input-daterange" data-date="" data-date-format="yyyy-mm-dd">
												<input type="text" class="form-control" name="from" id="from" value="<?php echo $from;?>" required="required">
												<span class="input-group-addon">
												to </span>
												<input type="text" class="form-control" name="to" id="to" value="<?php echo $to;?>" required="required">
											</div>
											<!-- /input-group -->
											
										</div>
									</div>

									
									</td>

									<td>
									
									     <button class="btn blue" type="button" id="exp-flash"><i class="fa  fa-sign-out"></i> Export to Excel </button>
										<!--<<button class="btn blue " > Show Data <i class="fa  fa-sign-out"></i> </button> -->
									
									</td>
									</tr>
									<tr>
                                   <td width="50%" >&nbsp;
									
									</td>
									<td width="50%" >&nbsp;
									
									</td>
									</tr>
									
									<tr>
                                   <td colspan="2" width="100%" >
                                   
								</br>
								<div align="center" class="loading2" style="display:none">
								<img src="images/loading_image.gif"  width="100" id="loading" align="center" >
								</br></br></br></br>
								</div>
									
									</td>
									
									</tr>
									
									</table>
									</form>
									</div>


					    <div  class="excel"></div>

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
<script src="assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<script src="assets/admin/pages/scripts/form-validation.js"></script>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>

<script>
$(document).ready(function() {


$("#exp-flash").click(function()
{

//alert ("oke...");	
var e = document.getElementById("idproduct");
var idproduct = e.options[e.selectedIndex].value;
var nama_produk = e.options[e.selectedIndex].text;
//idunit
var e = document.getElementById("idunit");
var idunit = e.options[e.selectedIndex].value;
//idproses
var e = document.getElementById("idproses");
var idproses = e.options[e.selectedIndex].value;
//idpermasalahan
var e = document.getElementById("idpermasalahan");
var idpermasalahan = e.options[e.selectedIndex].value;
//idpenyebab
var e = document.getElementById("idpenyebab");
var idpenyebab = e.options[e.selectedIndex].value;
//idjenis_laporan
var e = document.getElementById("idjenis_laporan");
var idjenis_laporan = e.options[e.selectedIndex].value;

var from=document.getElementById("from").value;
var to=document.getElementById("to").value;





if (from !='' && to !='' ){
$("#kosong").hide();
$(".excel").hide();
var dataString1 = 'produk='+ nama_produk +'&idproduct='+ idproduct +'&idunit='+ idunit + '&idproses='+ idproses + '&idpermasalahan='+ idpermasalahan + '&idpenyebab='+ idpenyebab + '&idjenis_laporan='+ idjenis_laporan +'&from='+ from +'&to='+ to;
//alert(id);
$(".loading2").show(); 
//alert (dataString1);	
$.ajax
({
type: "POST",
url: "module/ajax/ajax_export_dashboard.php",
data: dataString1,
cache: false,
success: function(html)
{   
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




<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<!-- END CORE PLUGINS -->

<script>
$(document).ready(function() {

$('#idproses').change(function() {
		var id3=$(this).val();
		var e = document.getElementById("idunit");
		var id2 = e.options[e.selectedIndex].value;
		var e = document.getElementById("idproduct");
		var id = e.options[e.selectedIndex].value;
		var dataString = 'id='+id+'&id2='+id2+'&id3='+id3;
		
		//alert(dataString);
		

		$.ajax({
		type: "POST",
		url: "module/ajax/ajax_acc_case.php",
		data: dataString,
		cache: false,
		success: function(html)
		{
			$("#idpermasalahan").html(html);
		} 
			});	


		});



	$('#idunit').change(function() {
		var id2=$(this).val();
		var e = document.getElementById("idproduct");
		var id = e.options[e.selectedIndex].value;
		var dataString = 'id='+id+'&id2='+id2;
		
		//alert(dataString);
		$.ajax({
		type: "POST",
		url: "module/ajax/ajax_acc_proses.php",
		data: dataString,
		cache: false,
		success: function(html)
		{
			$("#idproses").html(html);
		} 
			});	



		});





	$('#idproduct').change(function() {
		var id=$(this).val();

		var dataString = 'id='+id;
		
		//alert(dataString);
		$.ajax({
		type: "POST",
		url: "module/ajax/ajax_acc_unit.php",
		data: dataString,
		cache: false,
		success: function(html)
		{
			$("#idunit").html(html);
		} 
			});	




		});

			  });

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
            //kontent: {
            //    required: true
                
           // },
           // file_img: {
              //  required: true
                
           // },
            from: {
                required: true
                
            },
            to: {
                required: true
                
            }
        },

        messages: {
        	idproduct: {
                 required: "<span class='label label-warning'><i>Produk Harus dipilih ...! </i></span>"
            },
           // kontent: {
            //     required: "<span class='label label-warning'><i>Kontent Harus diisi ...! </i></span>"
           // },
           /// file_img: {
           //      required: "<span class='label label-warning'><i>Image Harus diisi ...! </i></span>"
           // },
            from: {
                 required: "<span class='label label-warning'><i>isi tgl range 1 ...! </i></span>"
            },
            to: {
                 required: "<span class='label label-warning'><i>isi tgl range 2 ...! </i></span>"
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


<!-- END PAGE LEVEL SCRIPTS -->