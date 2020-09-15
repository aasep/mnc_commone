<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);
//$page_=str_replace(".php","",$page_tmp);
$page2 = $_SERVER['PHP_SELF']."?";



if (isset($_GET['act']) && $_GET['act']=='src') {

	$srcby=$_POST['srcby'];
	$srckey=$_POST['srckey'];

	switch ($srcby) {
		 case '1' : $varsrc= " where a.ticket_number='$srckey'  "; break; //ticket_number
		 case '2' : $varsrc= " where a.customer_name ILIKE '%$srckey%'  "; break; //customer_name
		 case '3' : $varsrc= " where a.account_number='$srckey' "; break; //account_number
		 case '4' : $varsrc= " where a.credit_card_number='$srckey' "; break; // credit_card_number
		 }

} else  {
$varsrc= "  ";
}

?>

<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- /.modal -->
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			

			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Find Inquiry <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Data </a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Find Inquiry</a>
						<i class="fa fa-angle-right"></i>
					</li>
				
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
            <!-- MODAL INSERT -->
							
             <!-- END MODAL INSERT -->


              <!-- MODAL EDIT -->
             

              <!-- MODAL VIEW-->
							<div class="modal fade"  id="view-modal" tabindex="-1"  aria-hidden="true"  role="dialog"  aria-labelledby="myModalLabel">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"><b>View Memo Inquiry </b></h4>

											<div class='alert alert-info alert-dismissable'>
											<p class="id-numticket"><b></b></p>
											</div>
											
										</div>
										<div class="modal-body">
										
											<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cube"></i> Detail Memo  
								
							</div>
							<div class="tools">
								
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<!--<form action="<?php echo "module/actions_master.php?module=$module&act=edit_productbi"; ?>" id="form_sample_2" class="form-horizontal" method="POST"> -->
								<div class="form-body">
									<div class="table-scrollable">
									<!--<table class="table table-striped table-bordered table-hover" id="sample_1">

									</table> -->
										<div id="tabel-memo"> </div> 
									</div>
								</div>
								
							
						</div>
					</div>


					<!-- END VALIDATION STATES-->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn blue" data-dismiss="modal">Submit</button>
										</div>
									</div>
									<!-- /.modal-content -->
									<!--</form> -->
							<!-- END FORM-->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
             
				
             <!-- END MODAL VIEW -->

              <!-- MODAL DETAIL LAPORAN-->
							<div class="modal fade"  id="view-detail" tabindex="-1"  aria-hidden="true"  role="dialog"  aria-labelledby="myModalLabel">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"><b>Detail Inquiry </b></h4>
											
											
										</div>
										<div class="modal-body">
										<div class='alert alert-danger alert-dismissable'>
											<p class="id-numticket"><b></b></p>
											</div>
										
											<!-- BEGIN VALIDATION STATES-->
					
										<div class="scroller" style="height: 400px;" data-always-visible="1" data-rail-visible="0">
										<div id="tabel-memo2"> </div> 
										</div>
										
										
					<!-- END VALIDATION STATES-->
										</div>
										<div class="modal-footer">
											
											<button type="button" class="btn blue" data-dismiss="modal">Close</button>
										</div>
									</div>
									<!-- /.modal-content -->
									<!--</form> -->
							<!-- END FORM-->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
             
				
             <!-- END MODAL DETAIL LAPORAN -->


                <!-- END MODAL DELETE -->
                
                <div class="table-scrollable">
                <form action="<?php echo "$page&act=src";?>" id="form_sample_src" class="form-horizontal" method="POST">
                <table class="table table-condensed table-hover">
                <tr>
                <td width="40%">
                <div class="form-group">
												
												<div class="col-md-8">
													<select class="form-control select2me" name="srcby" id="srcby" required>
														<option value="">Choose Base On...</option>
														<option value="1" <?php if ($srcby=='1') echo "selected='selected'"; ?>>Ticket Number</option>
														<option value="2" <?php if ($srcby=='2') echo "selected='selected'"; ?>>Customer Name</option>
														<option value="3" <?php if ($srcby=='3') echo "selected='selected'"; ?>>Account Number</option>
														<option value="4" <?php if ($srcby=='4') echo "selected='selected'"; ?>>No Credit Card</option>
													</select>
												</div>
											</div>
				</td>
				<td width="55%">							
                <div class="form-group">
												
												<div class="col-md-8">
													
<div class="input-group">
<div class="input-cont">
<input class="form-control" type="text" name="srckey" value="<?php echo $srckey;?>" placeholder="Key Word..." required>
</div>
<span class="input-group-btn">
<button class="btn green-haze" type="submit">Search<i class="m-icon-swapright m-icon-white"></i></button>
</span>
</div>
												</div>

											</div>
											</td>
			<td width="5%">
          <!--  <a href="<?php echo $page2."module=".sha1('19')."&pm=".sha1('18'); ?>" class="btn blue" >Buat Laporan Baru  <i class="fa fa-plus"></i> </a> -->

             </td>
             </tr>
             </table>
</form>
             </div>
            
              </br> </br>
             
 <?php
    if (isset($_GET['message']) && ($_GET['message']=="success")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data User Berhasil ditambahkan ...! </strong> </div>";
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


<?php
if (isset($_GET['act']) && $_GET['act']=='src') {
?>
			<!-- BEGIN PAGE CONTENT-->
			
			<!-- END PAGE CONTENT-->
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
			
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Data Inquiry 
							</div>
							<div class="tools">
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2" width="100%">
							<thead>
							<tr>
								<th style="font-size:11px" width="10%">
									 Ticket Number
								</th>
								<th style="font-size:11px" width="10%">
									 Inquiry date
								</th>
								<th  style="font-size:11px" width="10%">
									 Channel
								</th>
								<th style="font-size:11px" width="35%">
									 Customer Name / Case / Description
								</th>
								<th style="font-size:11px" width="10%">
									 Status
								</th>
								
								<th style="font-size:11px" width="10%">
									 Limit /<br> Expire
								</th>
								<th style="font-size:11px" width="15%">
									 Action
								</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$i=1;
                            $query  =" select *, b.name as nama_masalah, b.priority,b.satuan from laporan_kerja a ";
                            $query .=" left join master_case b on b.id_case=a.id_case  $varsrc   order by a.ticket_number asc ";
                            
                            $result=pg_query($connection,$query);
                            while ($row=pg_fetch_array($result)) {
                             
                               $jml_intval=$row['sla']+$row['extend_sla'];
                             $date_sla=dateSla($row['date_start'],$jml_intval,$row['satuan']);
                             //$batas_sla=dateSla($row_lap['date_start'],$row_lap['sla'],$row_lap['satuan']);
                             //class='detail-sumRO'
                             switch ($row['priority']) {
								 case '1' : $priority= " <i class='fa fa-warning font-green'></i> <i> Normal </i>"; break; //ticket_number
		 						 case '2' : $priority= " <i class='fa fa-warning font-blue'></i> <i> Important </i>"; break; //customer_name
		 						 case '3' : $priority= " <i class='fa fa-warning font-red'></i> <i> Urgent </i>"; break; //account_number
		 //case '4' : $varsrc= " where credit_card_number='$srckey' "; break; // credit_card_number
		 							}

                              switch ($row['status']) {
		 				 		case '1' : $status_lap= "  <span class='label label-danger'> <i> Belum Ditangani </i> </span>  "; break; //ticket_number
		 				 		case '2' : $status_lap= "  <span class='label label-info'> <i> Sedang Ditangani </i> </span> "; break; //customer_name
						 		case '3' : $status_lap= "  <span class='label label-success'> <i> Selesai Ditangani </i> </span> "; break; //account_number
						 			}
							echo "<tr>";
							echo "<td style='font-size:11px'><b>$row[ticket_number]</b></td>";
							echo "<td style='font-size:11px'>".date('d-m-Y H:i',strtotime($row['date_start']))."</td>";
							echo "<td style='font-size:11px'>Call Center</td>";
							echo "<td style='font-size:11px'><b>$row[customer_name]</b><br>$row[nama_masalah]<br><i>$row[keterangan]</i></td>";
							echo "<td style='font-size:11px'>$status_lap</td>";
							echo "<td style='font-size:11px' align='center'>$jml_intval  $row[satuan] <br>".$date_sla."</td>";
							echo "<td style='font-size:11px'><a href='#'  data-toggle='modal' id-ticket='$row[ticket_number]' id-nama='$row[name]'  data-target='#view-modal' class='detailMemo' > <button class='btn green-haze btn-xs'> Memo </button></a><a href='#'  data-toggle='modal' id-ticket='$row[ticket_number]' id-nama='$row[name]'  data-target='#view-detail' class='detailLaporan' > <button class='btn blue btn-xs' type='button'> Detail </button></a></td>";
							echo "</tr>";
							$i++;
							
									}
							?>


							</tbody>
							</table>
						</div>
					</div>

					<?php } ?>
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

	$('.detailMemo').click(function() {
		var id_numticket = $(this).attr('id-ticket');
    
		  //alert(id_user);
			$(".id-numticket").empty();
			$(".id-numticket").append( '<strong> Ticket Number : ' + id_numticket +'</strong>');



		var dataString1 = 'id='+id_numticket;
		
		//alert(dataString1);
		$.ajax({
		type: "POST",
		url: "module/ajax_log_memo.php",
		data: dataString1,
		cache: false,
		success: function(html)
		{
			$("#tabel-memo").html(html);
		} 
			});	



			  });



	$('.detailLaporan').click(function() {
		var id_numticket = $(this).attr('id-ticket');
    
		  //alert(id_user);
			$(".id-numticket").empty();
			$(".id-numticket").append( '<strong> Ticket Number : ' + id_numticket +'</strong>');



		var dataString2 = 'id='+id_numticket;
		
		//alert(dataString1);
		$.ajax({
		type: "POST",
		url: "module/ajax_detail_laporan.php",
		data: dataString2,
		cache: false,
		success: function(html)
		{
			$("#tabel-memo2").html(html);
		} 
			});	



			  });

}); // document ready	$(document).ready(function() {

    </script>

 <script>
jQuery(document).ready(function () {
    var form1 = $('#form_sample_src');
    var error1 = $('.alert-danger', form1);
    var success1 = $('.alert-success', form1);
	

    $('#form_sample_src').validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
		ignore: "",
        rules: {
        	srcby: {
                required: true
                
            },
            srckey: {
                required: true
                
            }
        },

        messages: {
        	srcby: {
                 required: "<span class='label label-warning'><i>Select Item ...! </i></span>"
            },
            srckey: {
                 required: "<span class='label label-warning'><i>Key Word Must be inserted ...! </i></span>"
            }
        },

        invalidHandler: function (event, validator) { //display error alert on form submit   
            success1.hide();
            $('.alert-danger span').text("Form Belum Komplit, Silahkan cek kembali informasi dibawah ... !");
            $('.alert-danger', $('#form_sample_src')).show();
            Metronic.scrollTo(error1, -200);
        },

        
    });
	
	
});
               
</script>  

