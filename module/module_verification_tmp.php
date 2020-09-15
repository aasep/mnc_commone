<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);

if (isset($_GET['act1']) ) {
	$act1=$_GET['act1'];
} else if (isset($_POST['act1']) ){
	$act1=$_POST['act1'];
} else {
	$act1="";
}



if (isset($_POST['srckey']) ) {
	$srckey=$_POST['srckey'];
} 


if (isset($_POST['srcby']) ) {


	switch ($_POST['srcby']) {
		 case '1' : $srcby='1'; break; //ticket_number
		 case '2' : $srcby='2'; break; //customer_name
		 case '3' : $srcby='3'; break; //Credit card
		 case '4' : $srcby='4'; break; //Account Number
		 case '5' : $srcby='5'; break; //Tanggal transaksi
		
		 }

}

##########################################################
/*

if (isset($_POST['verify']) && ($_POST['verify']) !="" ) {
	$fetch="ok";
	echo "ada klik button verify.....";

	echo "<pre>";
	var_dump($_POST['var_send']);
	echo "</pre>";
$jum_array=0;
foreach ($_POST['var_send'] as $key => $value) {
	echo $value."<br>";
$jum_array++;
}
echo "<br>jumlah array :".$jum_array."<br>";

} else {
	$fetch="";

	echo "ga ada klik........";
}


*/






?>



<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>


<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>

<!--<script type="text/javascript" src="../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>-->


<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/chosen.css">

<link rel="shortcut icon" href="favicon.ico"/>
<!-- <link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables.css">  
	<link rel="stylesheet" type="text/css" href="extensions/TableTools/css/dataTables.tableTools.css">  -->
	
	
	<style type="text/css" class="init">
	</style>
	<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="extensions/TableTools/js/dataTables.tableTools.js"></script>
	<script type="text/javascript" language="javascript" src="examples/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="examples/resources/demo.js"></script>


<?php
if (isset($_POST['verify']) && ($_POST['verify']) !="" ) {
?>
<script>
$(document).ready(function() {
		$("#success").hide();
		var id=[];
		 <?php foreach ($_POST['var_send'] as $key => $value) { ?>
		 id.push(<?php echo $value; ?>);
		 <?php }?>

		if (id.length > 0 ) {

		 			dataString2={id: id};
		 			$.ajax({
						type: "POST",
						url: "module/ajax/ajax_verification_temp.php",
						data: dataString2,
						cache: false,
						success: function(html)
							{   
								$("#success").show();
								$("#success").html(html);
							} 
					});


		 		//alert(id);
    	} else {
    		$("#success").hide();
     			//alert('Ga ada variabel....');	
    		}
		


}); // document ready	$(document).ready(function() {

    </script>
<?php


} else {

}
?>


<script type="text/javascript" charset="utf-8">

$(document).ready( function() {
	
  	$('#list_request').dataTable({
		"bFilter": false,
		"bInfo": true,		
		"processing": true,
		"serverSide": true,
		//"sAjaxSource": "../commone/module/server_side/server_processing_list_req_mncpay.php",
	    "sAjaxSource": "../commone/module/server_side/server_processing_list_temp_table.php?act1=<?php echo "$act1&srcby=$srcby&srckey=$srckey&module=$module&pm=$pm";?>",
		"iDisplayLength": 10,
	  	"iDisplayStart": 0
  	});

	


	
	
	
}); // document ready	$(document).ready(function() {
</script> 




<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			
			<h3 class="page-title bold">
			 Verification TMP to Leads 
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Leads Data</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Verification tmp to Leads</a>
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
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Failed Data Added ....!</strong> </div>";

	}

?>
						<div class="alert alert-success" style="display:none" id="success">
						</div>	

                       <div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-green-haze"></i>
											<span class="caption-subject font-green-haze bold uppercase">List Temporary Table</span>
											<span class="caption-helper">request from other application ...</span>
										</div>
										
									</div>
									<div class="portlet-body form">
										<div class="portlet light bordered">
									                      


                            <div class="portlet-body form">    
  <form action="" method="POST">                         
                        <div class="form-group">
												
												<div class="col-md-3">
													<select class="form-control select2me" name="srcby" id="srcby" required>
														<option value="">Choose Base On...</option>
														<option value="1" <?php if ($srcby=='1') echo "selected='selected'"; ?>>ID TEMP </option>
														<option value="2" <?php if ($srcby=='2') echo "selected='selected'"; ?>>Customer Name</option>
														<option value="3" <?php if ($srcby=='3') echo "selected='selected'"; ?>>Credit Card Number</option>
														<option value="4" <?php if ($srcby=='4') echo "selected='selected'"; ?>>Account Number</option>
														<option value="5" <?php if ($srcby=='5') echo "selected='selected'"; ?>>Transaction Date (dd-mm-yyyy) </option>
														
													</select>
												</div>
											</div>
<div class="input-group col-md-3">
<div class="input-cont">
<input class="form-control" type="text" name="srckey" value="<?php echo $srckey;?>" placeholder="Key Word..." required>
</div>
<!-- TYPE HIDDEN  optional -->
<input type="hidden" name="act1" value="request">
<span class="input-group-btn">
<button class="btn green-haze" type="submit">Search <i class="m-icon-swapright m-icon-white"></i></button>
</span>
</div>
</form>

					<form action="" method="POST">
                    <div class="table-scrollable">
                    
    					<table class="table table-striped table-bordered table-hover" id="list_request" width="150%">

							<thead>
								<tr>
								<th style="font-size:13px" width="15%"> ID Request <br> Input Date <br> Tgl Meeting  </th>
								<th style="font-size:13px" width="10%">Customer Name <br> Account Number <br> Credit Card Number </th>
								<th style="font-size:13px" width="15%">Tgl. Transaksi <br> Nominal Trans. <br> Kota Domisili</th>
								<th style="font-size:13px" width="15%" align="center">Channel <br> Phone <br> Purpose </th>
								<th style="font-size:13px" width="40%">Type <br> Keterangan <br> </th>
								<th style="font-size:13px" width="5%" align="center">ACTION</th>
								</tr>
							</thead>
							<tbody>                   
							</tbody>
						</table>  

   					</div>

                        <div align="center">
                        <button  class="btn blue " type="submit" name="verify" id="verify" value="ok"> Verification to Leads Data <i class="fa fa-sign-in"> </i></button>
                        </div>
                        <br>
   						<br>
						</form>


							
						</div>
					</div>
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
            credit_card_number: {
                required: true
            },
            tanggal_transaksi: {
                required: true
            },
            id_jenis_mncpay: {
                required: true
            },
            nominal_trans: {
                required: true
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
            credit_card_number: {
                 required: "<span class='label label-warning'><i>Credit Card Number Required ...!</i></span>"
            },
            tanggal_transaksi: {
                 required: "<span class='label label-warning'><i>Transaction Date Required ...! </i></span>"
            },
            id_jenis_mncpay: {
                 required: "<span class='label label-warning'><i>CPlan Code Required ...!</i></span>"
            },
            nominal_trans: {
                 required: "<span class='label label-warning'><i>Nominal Transaction Required ...!</i></span>"
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
