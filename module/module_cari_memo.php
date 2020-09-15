<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);
$page2 = $_SERVER['PHP_SELF']."?";

if (isset($_GET['act']) && $_GET['act']=='src') {

	$srcby=$_POST['srcby'];
	$srckey=$_POST['srckey'];

	switch ($srcby) {
		 case '1' : $varsrc= " where ticket_number='$srckey' "; break; //ticket_number
		 case '2' : $varsrc= " where customer_name ILIKE '%$srckey%' "; break; //customer_name
		 case '3' : $varsrc= " where account_number='$srckey' "; break; //account_number
		 case '4' : $varsrc= " where credit_card_number='$srckey' "; break; // credit_card_number
		 }

} else  {
$varsrc= " ";
}

?>

<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- /.modal -->
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			

			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Pencarian Memo <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Data Laporan</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Cari Memo</a>
						<i class="fa fa-angle-right"></i>
					</li>
				
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
            <!-- MODAL INSERT -->
							
             <!-- END MODAL INSERT -->


              <!-- MODAL EDIT -->
             



             


                <!-- END MODAL DELETE -->
                <div class="table-scrollable">
                <form action="<?php echo "$page&act=src";?>" id="form_sample_src" class="form-horizontal" method="POST">
                <table class="table table-condensed table-hover">
                <tr>
                <td width="40%">
                <div class="form-group">
												
												<div class="col-md-6">
													<select class="form-control select2me" name="srcby" id="srcby" required>
														<option value="">Pilih Berdasarkan...</option>
														<option value="1" <?php if ($srcby=='1') echo "selected='selected'"; ?>>Nomor Tiket</option>
														<option value="2" <?php if ($srcby=='2') echo "selected='selected'"; ?>>Nama Nasabah</option>
														<option value="3" <?php if ($srcby=='3') echo "selected='selected'"; ?>>Nomor Rekening</option>
														<option value="4" <?php if ($srcby=='4') echo "selected='selected'"; ?>>No Kartu Kredit</option>
													</select>
												</div>
											</div>
				</td>
				<td width="55%">							
                <div class="form-group">
												
												<div class="col-md-6">
													
<div class="input-group">
<div class="input-cont">
<input class="form-control" type="text" name="srckey" value="<?php echo $srckey;?>" placeholder="Kata Kunci..." required>
</div>
<span class="input-group-btn">
<button class="btn green-haze" type="submit">Search<i class="m-icon-swapright m-icon-white"></i></button>
</span>
</div>
												</div>

											</div>
											</td>
			<td width="5%">
             <a href="<?php echo $page2."module=".sha1('19')."&pm=".sha1('18'); ?>" class="btn blue" >Buat Laporan Baru  <i class="fa fa-plus"></i> </a>

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
			<!-- BEGIN PAGE CONTENT-->
			
			<!-- END PAGE CONTENT-->
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
			
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Data Laporan  
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
								<th style="font-size:11px">
									 Ticket Number
								</th>
								<th style="font-size:11px">
									 Tgl laporan
								</th>
								<th  style="font-size:11px">
									 Channel
								</th>
								<th style="font-size:11px">
									 Nama Nasabah / Permasalahan
								</th>
								<th style="font-size:11px">
									 Status
								</th>
								
								<th style="font-size:11px">
									 Batas Akhir
								</th>
								<th style="font-size:11px">
									 Action
								</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$i=1;
                            $query =" select * from laporan_kerja  $varsrc  order by ticket_number asc";
                            
                            $result=pg_query($connection,$query);
                            while ($row=pg_fetch_array($result)) {
                             if ($row['status_account']=='1'){
                             	$status="Active";
                             } else { $status="InActive"; }
                             //class='detail-sumRO'

							echo "<tr>";
							echo "<td style='font-size:11px'><b>$row[ticket_number]</b></td>";
							echo "<td style='font-size:11px'>".date('d-m-Y H:i',strtotime($row['date_start']))."</td>";
							echo "<td style='font-size:11px'>Call Center</td>";
							echo "<td style='font-size:11px'><b>$row[customer_name]</b><br>Pengajuan replace kartu</td>";
							echo "<td style='font-size:11px'><i class='fa fa-check-square font-blue'></i> <i class='fa fa-refresh font-green'><i class='fa fa-warning font-red'></i></td>";
							echo "<td style='font-size:11px'>".date('d-m-Y H:i',strtotime($row['date_finish']))."</td>";
							echo "<td style='font-size:11px'><button class='btn green' style='font-size:11px'>LIHAT</button></td>";
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
		var id_user = $(this).attr('id-username');
    
		  //alert(id_user);
			$("#list-user").empty();
			$("#list-user").append( 
                '<tr>'+
				'<td>'+'<h5>Yakin Anda Akan Mendelete '+'<strong>' + id_user +'</strong></h5>'+
				'<input type="hidden" name="id_user" value="'+id_user+'">'+
				'</td></tr>');
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
                 required: "<span class='label label-warning'><i>Pilih Jenis Pencarian ...! </i></span>"
            },
            srckey: {
                 required: "<span class='label label-warning'><i>Kata Kunci Harus diisi ...! </i></span>"
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

