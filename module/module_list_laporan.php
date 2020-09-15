<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);
$current_date = date('Y-m-d');

error_reporting(1);
if (isset($_GET['act']) && $_GET['act']=='src'){

//product B
$idproduct=$_POST['idproduct'];
$var_product=" where a.id_product='$idproduct' ";

//status========
if(isset($_POST['status']) && $_POST['status']!="" && $_POST['status']!=NULL) { 
	$status=$_POST['status']; 

switch ($status) {
								 case '1' : $var_status=" and  a.status='1' "; break; //ticket_number
		 						 case '2' : $var_status=" and  a.status='2' "; break; //customer_name
		 						 case '3' : $var_status=" and  a.status='3' "; break; //account_number
		 						 case '4' : $var_status=" and  a.status in ('1','2')  and  to_char(a.date_sla, 'YYYY-MM-DD') < '".$current_date."' "; break; //account_number

		 							}
	


} else {
	$var_unit="";
}



//unit C
if(isset($_POST['idunit']) && $_POST['idunit']<>"") { 
	$idunit=$_POST['idunit']; 
	$var_unit=" and  a.id_unit='$idunit' ";
} else {
	$var_unit="";
}
//prosess D
	if(isset($_POST['idproses'])&& $_POST['idproses']<>"") { 
	$idproses=$_POST['idproses'];
	$var_proses=" and  a.id_process='$idproses' ";
} else {
	$var_proses="";
}
//permasalahan E
if(isset($_POST['idpermasalahan'])&& $_POST['idpermasalahan']<>"") { 
	$idpermasalahan=$_POST['idpermasalahan'];
	$var_case=" and  a.id_case='$idpermasalahan' ";
} else{
	$var_case="";
}
//penyebab F
if(isset($_POST['idpenyebab'])&& $_POST['idpenyebab']<>"") { 
	$idpenyebab=$_POST['idpenyebab'];
	$var_cause=" and  a.id_cause_bi='$idpenyebab' ";
} else {
	$var_cause="";
}
//jenis laporan G
if(isset($_POST['idjenis_laporan'])&& $_POST['idjenis_laporan']<>"") { 
	$idjenis_laporan=$_POST['idjenis_laporan'];
	$var_jslaporan=" and a.id_report='$idjenis_laporan' ";
} else {
	$var_jslaporan="";
}
//from
	$from=$_POST['from'];
	//$var_from=" and  ";
//to
	$to=$_POST['to'];
	//$var_to=" and  ";
if ( (isset($_POST['from'])&& $_POST['from']<>"") || (isset($_POST['to'])&& $_POST['to']<>"")){

	if ($from==$to){
				$varperiode=" and to_char(a.date_start, 'YYYY-MM-DD') ='".$from."'";
	}	else {
				$varperiode=" and to_char(a.date_start, 'YYYY-MM-DD') between '".$from."' and '".$to."'";
		}
} else {
	$varperiode="";
}
//channel H
if(isset($_POST['idchannel'])&& $_POST['idchannel']<>"") { 
$idchannel=$_POST['idchannel'];
$var_channel=" and a.id_channel='$idchannel' ";
} else {
$var_channel="";	
}


	$ket=" Filter ";
} else {
$var_product="";
//unit
$var_unit="";
//unit
//prosess
$var_proses="";
//permasalahan
$var_case="";
//penyebab
$var_cause="";
//jenis laporan
$var_jslaporan="";
//from
$var_from="";
//to
$var_to="";
//channel
$var_channel="";
	$ket=" All ";
$varperiode="";
}


?>




<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- /.modal -->
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			

			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			  Inquiry Report  <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Monitoring</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#"> Inquiry Report </a>
						<i class="fa fa-angle-right"></i>
					</li>
				
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
         

               <!-- MODAL EDIT -->
             

							
               <div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-green-haze"></i>
											<span class="caption-subject font-green-haze bold uppercase">Filter Report</span>
											<span class="caption-helper">for Show List Report by filter ...</span>
										</div>
										
									</div>



							<form action="<?php echo $page."&act=src";?>" id="form_sample_3" class="form-horizontal" method="POST">
								
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
											<select class="form-control" name="idpermasalahan" id="idpermasalahan">
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
										<label class="control-label col-md-3">BI Cause <span class="required">
										 </span>
										</label>
										<div class="col-md-8">
											<select class="form-control select2me" name="idpenyebab" id="idpenyebab">
												<option value="">Choose Cause of Complaint...</option>
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
										<label class="control-label col-md-4">Inquiry Type <span class="required">
										 </span>
										</label>
										<div class="col-md-6">
											<select class="form-control select2me" name="idjenis_laporan" id="idjenis_laporan">
												<option value="">Choose Inquiry Type...</option>
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
										<label class="control-label col-md-3">Period <span class="required">*
										 </span></label>
										<div class="col-md-8">
											<div class="input-group input-large date-picker input-daterange" data-date="" data-date-format="yyyy-mm-dd">
												<input type="text" class="form-control" name="from" value="<?php if (isset($_POST['from'])&& $_POST['from']<>"") {echo $_POST['from'];} ;?>" required="required">
												<span class="input-group-addon">
												to </span>
												<input type="text" class="form-control" name="to" value="<?php if (isset($_POST['to'])&& $_POST['to']<>"") {echo $_POST['to'];} ;?>" required="required">
											</div>
											<!-- /input-group -->
											
										</div>
									</div>

									
									</td>

									<td>
									
									
										<div class="form-group">
										<label class="control-label col-md-4">Status <span class="required">
										 </span>
										</label>
										<div class="col-md-6">
											<select class="form-control select2me" name="status" id="status" >
												<option value="">Choose Inquiry Status...</option>
												<option value="3" <?php if ($status=='3') echo "selected='selected'";?>>Done</option>
												<option value="2" <?php if ($status=='2') echo "selected='selected'";?>>On Progress</option>
												<option value="1" <?php if ($status=='1') echo "selected='selected'";?>>Unprocessed</option>
												<option value="4" <?php if ($status=='4') echo "selected='selected'";?>>Expired</option>
												
											</select>
										</div>
									</div>
									
									</td>
									</tr>
									
									<tr>
									<td width="50%" ><div class="form-group">
										<label class="control-label col-md-3">Channel <span class="required">
										 </span>
										</label>
										<div class="col-md-6">
											<select class="form-control select2me" name="idchannel" id="idchannel" >
												<option value="">Choose Channel...</option>
												<?php
												$query=" select * from master_channel order by name asc ";
												$r_product=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_product)){
													if ($idchannel==$row1['id_channel']){
														echo " <option value='$row1[id_channel]' selected='selected'>$row1[name]</option> ";
													}else {
														echo " <option value='$row1[id_channel]'>$row1[name]</option> ";
													}
												}
												


												?>
											</select>
										</div>
									</div>
									</td>
									<td width="50%" align="center" ><button class="btn blue" type="submit"> Show Data <i class="fa  fa-sign-out"></i> </button>
									
									</td>
                                    
									</tr>
									<tr>
                                   <td width="50%" >&nbsp;
									
									</td>
									<td width="50%" >&nbsp;
									
									</td>
									</tr>
									
									</table>
									</form>	
									</div>

<?php
			if (isset($_GET['act']) && $_GET['act']=='src') {


			?>



						<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">List Laporan</span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
						<div class="portlet-body">
							


					  <div class="table-scrollable">
					<table class="table table-striped table-bordered table-hover" id="sample_2" width="230%">
							<thead>
							<tr class='active'>
								<th style="font-size:11px" width="5%" align="center">No</th>
								<th style="font-size:11px" width="10%" align="center">No. Tiket</th>
								<th style="font-size:11px" width="10%" align="center">Inputer</th>
								<th style="font-size:11px" width="10%" align="center">Channel</th>
								<th style="font-size:11px" width="10%" align="center">Branch</th>
								<th style="font-size:11px" width="10%" align="center">Tanggal Input</th>
								<th style="font-size:11px" width="10%" align="center">Nama Customer</th>
								<th style="font-size:11px" width="10%" align="center">Account Number</th>
								<th style="font-size:11px" width="10%" align="center">Credit Card Number</th>
								<th style="font-size:11px" width="10%" align="center">Phone</th>
								<th style="font-size:11px" width="10%" align="center">Email</th>
								<th style="font-size:11px" width="10%" align="center">Product</th>
								<th style="font-size:11px" width="10%" align="center">Unit</th>
								<th style="font-size:11px" width="10%" align="center">Process</th>
								<th style="font-size:11px" width="10%" align="center">Case</th>
								<th style="font-size:11px" width="10%" align="center">SLA</th>
								<th style="font-size:11px" width="10%" align="center">Limit/Expire</th>
								<th style="font-size:11px" width="10%" align="center">Inquiry Type</th>
								<th style="font-size:11px" width="10%" align="center">Priority</th>
								<th style="font-size:11px" width="10%" align="center">Cause BI</th>
								<th style="font-size:11px" width="10%" align="center">Nominal</th>
								<th style="font-size:11px" width="10%" align="center">Transaction Date</th>
								<th style="font-size:11px" width="10%" align="center">Description</th>
								<th style="font-size:11px" width="10%" align="center">Status</th>
							</tr>
							</thead>
							<tbody>
							<?php



							$i=1;
                            $query  =" select *,c.name as nama_unit, d.name as nama_proses, e.name as permasalahan, h.name as nama_channel,e.priority,e.satuan ,i.name as nama_cabang,b.name as nama_produk,";
                            $query .=" g.name as tipe,f.name as cause_bi   from laporan_kerja a  ";
                            $query .=" left join master_product b on b.id_product=a.id_product ";
                            $query .=" left join master_unit c  on c.id_unit=a.id_unit ";
                            $query .=" left join master_process d  on d.id_process=a.id_process ";
                            $query .=" left join master_case e  on e.id_case=a.id_case";
                            $query .=" left join bi_cause f on f.id_cause_bi=a.id_cause_bi ";
                            $query .=" left join master_report g on g.id_report=a.id_report ";
                            $query .=" left join master_channel h on h.id_channel=a.id_channel ";
                            $query .=" left join master_branch i on i.id_cabang=a.id_cabang ";

                            $query .=" $var_product  $var_unit $var_proses $var_case $var_cause $var_jslaporan $var_channel $varperiode $var_status ";
                            //echo $query;
                            $result=pg_query($connection,$query);
                            $i=1;
                            while ($row=pg_fetch_array($result)) {

                            	$hasil= $i%2;
                            	if($hasil==0){
                            		$row_class="class='warning'";
                            	} else {
                            		$row_class="";
                            	}
                             $jml_intval=$row['sla']+$row['extend_sla'];
                             $date_sla=dateSla($row['date_start'],$jml_intval,$row['satuan']);
                            	
                             switch ($row['priority']) {
								 case '1' : $priority= " <i class='fa fa-warning font-green'></i> <i> Normal </i>"; break; //ticket_number
		 						 case '2' : $priority= " <i class='fa fa-warning font-blue'></i> <i> Important </i>"; break; //customer_name
		 						 case '3' : $priority= " <i class='fa fa-warning font-red'></i> <i> Urgent </i>"; break; //account_number

		 							}

		 							

		 					if ( ($row['status']=='1') && (date('Y-m-d',strtotime($row['date_sla'])) >= $current_date) ){
		 						$status_lap= "  <span class='label label-danger'> <i> Unprocessed </i> </span>  ";
		 					} elseif(($row['status']=='2') && (date('Y-m-d',strtotime($row['date_sla'])) >= $current_date) ){
		 						$status_lap= "  <span class='label label-info'> <i> On Progress </i> </span> ";
		 					}elseif(($row['status']=='3')){
		 						$status_lap= "  <span class='label label-success'> <i> Done </i> </span> ";
		 					}elseif((($row['status']=='1')||($row['status']=='2')) && (date('Y-m-d',strtotime($row['date_sla'])) < $current_date)){	
						 		$status_lap= "  <span class='label label-warning'> <i> Expired </i> </span> ";
						 	}
							
							if($row['tgl_transaksi']=="" || $row['tgl_transaksi']==NULL){
								$tanggal_transaksi="-";
							}else {
								$tanggal_transaksi=date('Y-m-d',strtotime($row['tgl_transaksi']));
							}
							
							
							
							echo "<tr $row_class >";
							echo "<td style='font-size:11px'>$i</td>";
							echo "<td style='font-size:11px'><b>$row[ticket_number]</b></td>";
							echo "<td style='font-size:11px'>$row[id_karyawan]</td>";
							echo "<td style='font-size:11px'>$row[nama_channel]</td>";
							echo "<td style='font-size:11px'>$row[nama_cabang]</td>";
							echo "<td style='font-size:11px'>".date('d-m-Y H:i',strtotime($row['date_start']))."</td>";
							echo "<td style='font-size:11px'>$row[customer_name]</td>";
							echo "<td style='font-size:11px'>$row[account_number]</td>";
							echo "<td style='font-size:11px'>"."'"."$row[credit_card_number]</td>";

							echo "<td style='font-size:11px'>$row[phone]</td>";
							echo "<td style='font-size:11px'>$row[email]</td>";
							echo "<td style='font-size:11px'>$row[nama_produk]</td>";
							echo "<td style='font-size:11px'>$row[nama_unit]</td>";
							echo "<td style='font-size:11px'>$row[nama_proses]</td>";
							echo "<td style='font-size:11px'>$row[permasalahan]</td>";

							echo "<td style='font-size:11px'>$row[sla]</td>";
							echo "<td style='font-size:11px'><b>".date('Y-m-d',strtotime($row['date_sla']))."</b></td>";
							echo "<td style='font-size:11px'>$row[tipe]</td>";
							echo "<td style='font-size:11px'>$priority</td>";
							echo "<td style='font-size:11px'>$row[cause_bi]</td>";
							echo "<td style='font-size:11px'>$row[nominal]</td>";
							echo "<td style='font-size:11px'>".$tanggal_transaksi."</td>";
							echo "<td style='font-size:11px'>$row[keterangan]</td>";
							echo "<td style='font-size:11px'>$status_lap</td>";
							
							
							
							echo "</tr>";
							$i++;
							
									}
							?>



							</tbody>
							</table>
						
							</div>
		 					
		 					


						</div>
					</div>


<?php
			}
			
			?>


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
/*
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
*/

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
/*
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
*/

		});

			  });

 
    </script>





<!-- END CORE PLUGINS -->



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