<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Create Inquiry <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Data Laporan</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Create Inquiry</a>
						<i class="fa fa-angle-right"></i>
					</li>
				
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa"></i>Create Inquiry 
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
							<form action="<?php echo "module/report/flash_report_dev.php"; ?>" id="form_sample_3" class="form-horizontal" method="POST">
								<div class="form-body">
									<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										Still Wrong, Please Check Again  .... !
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										Your form validation is successful!
									</div>






									<div class="col-md-12 col-sm-12">
					<div class="portlet box blue-steel">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa "></i>Data Nasabah
							</div>
							<div class="tools">
								
							</div>
						</div>
						<div class="portlet-body">
							<div class="row">
								
							<table width="100%">
                                   <tr>
                                   <td width="50%" >
									<div class="form-group">
										<label class="control-label col-md-4">Nama Nasabah<span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="nama_nasabah" id="nama_nasabah"  placeholder="Nama Nasabah" class="form-control" required/>
											
										</div>
									</div>
									</td>
									<td width="50%" >
									<div class="form-group">
										<label class="control-label col-md-4">No. Tlp<span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="no_tlp" id="no_tlp"  placeholder="No. Tlp" class="form-control" />
											
										</div>
									</div>
									</td>
									</tr>
									<tr>
									<td>
									<div class="form-group">
										<label class="control-label col-md-4">No. Kartu Kredit<span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="no_creditcard" id="no_creditcard"  placeholder="No. Kartu Kredit" class="form-control" />
											
										</div>
									</div>
									</td>
									<td>
									<div class="form-group">
										<label class="control-label col-md-4">No. Rekening<span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="no_rek" id="no_rek"  placeholder="No. Rekening" class="form-control" />
											
										</div>
									</div>
									</td>
									</tr>
									<tr>
									<td>
									<div class="form-group">
										<label class="control-label col-md-4">Alamat Email<span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="email" id="email" placeholder="Email" class="form-control" />
											
										</div>
									</div>
									</td>
									<td>
									
									</td>
									</tr>
									</table>	
								
								
								
							</div>
						</div>
					</div>
				</div>






									<div class="col-md-12 col-sm-12">
					<div class="portlet box blue-steel">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa "></i>Jenis Laporan
							</div>
							<div class="tools">
								
							</div>
						</div>
						<div class="portlet-body">
							<div class="row">
								
							<table width="100%">
                                   <tr>
                                   <td width="50%" >
									<div class="form-group">
										<label class="control-label col-md-4">Product<span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<select class="form-control select2me" name="product" id="product" required>
												<option value="">Select...</option>
												<option value="Option 1">Option 1</option>
												<option value="Option 2">Option 2</option>
												<option value="Option 3">Option 3</option>
												<option value="Option 4">Option 4</option>
											</select>
										</div>
									</div>
									</td>
									<td width="50%" >
									<div class="form-group">
										<label class="control-label col-md-5">Unit <span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<select class="form-control select2me" name="unit" id="unit" required>
												<option value="">Select...</option>
												<option value="Option 1">Option 1</option>
												<option value="Option 2">Option 2</option>
												<option value="Option 3">Option 3</option>
												<option value="Option 4">Option 4</option>
											</select>
										</div>
									</div>
									</td>
									</tr>
									<tr>
									<td>
									<div class="form-group">
										<label class="control-label col-md-4">Proses<span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<select class="form-control select2me" name="proses" id="proses" required>
												<option value="">Select...</option>
												<option value="Option 1">Option 1</option>
												<option value="Option 2">Option 2</option>
												<option value="Option 3">Option 3</option>
												<option value="Option 4">Option 4</option>
											</select>
										</div>
									</div>
									</td>
									<td>
									<div class="form-group">
										<label class="control-label col-md-5">Permasalahan <span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<select class="form-control select2me" name="permasalahan" id="permasalahan" required>
												<option value="">Select...</option>
												<option value="Option 1">Option 1</option>
												<option value="Option 2">Option 2</option>
												<option value="Option 3">Option 3</option>
												<option value="Option 4">Option 4</option>
											</select>
										</div>
									</div>
									</td>
									</tr>
									<tr>
									<td>
									<div class="form-group">
										<label class="control-label col-md-4">Penyebab <span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<select class="form-control select2me" name="penyebab" id="permasalahan" required>
												<option value="">Select...</option>
												<option value="Option 1">Option 1</option>
												<option value="Option 2">Option 2</option>
												<option value="Option 3">Option 3</option>
												<option value="Option 4">Option 4</option>
											</select>
										</div>
									</div>
									</td>
									<td>
									<div class="form-group">
										<label class="control-label col-md-5">Jenis Laporan <span class="required">
										* </span>
										</label>
										<div class="col-md-5">
											<select class="form-control select2me" name="jenis_laporan" id="jenis_laporan" required>
												<option value="">Select...</option>
												<option value="Option 1">Option 1</option>
												<option value="Option 2">Option 2</option>
												<option value="Option 3">Option 3</option>
												<option value="Option 4">Option 4</option>
											</select>
										</div>
									</div>


									
									</td>
									</tr>
									</table>	
								
								
								
							</div>
						</div>
					</div>
				</div>





									<div class="col-md-12 col-sm-12">
					<div class="portlet box blue-steel">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa "></i>Keterangan Tambahan
							</div>
							<div class="tools">
								
							</div>
						</div>
						<div class="portlet-body">
							<div class="row">
							<div class="form-group">
										<label class="control-label col-md-3">Why Unit to extend SLA Period<span class="required">
										 </span>
										</label>
										<div class="col-md-3">
											<textarea name="nama_menu" id="nama_menu"  value="<?php echo $_GET['nama_menu']?>" placeholder="Nominal Transaksi" class="form-control" style="width:600px;height:100px;" required/> </textarea>
											
										</div>
									</div>
								
							<div class="form-group">
										<label class="control-label col-md-3">
										</label>
										<div class="col-md-6">
											<div class="checkbox-list">
												<label>
												<input type="checkbox" value="1" name="service"/> <i>Nasabah ingin dihubungi apabila laporan telah selesai ditangani </i></label>
												
												
											</div>
											
										</div>
									</div>


							<div class="form-group">
										<label class="control-label col-md-3">Nominal Transaksi<span class="required">
										 </span>
										</label>
										<div class="col-md-3">
											<input type="text" name="nama_menu" id="nama_menu" value="<?php echo $_GET['nama_menu']?>" placeholder="Nominal Transaksi" class="form-control"   required/>
											
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Tanggal Transaksi </label>
										<div class="col-md-3">
											<div class="input-group input-medium date date-picker" data-date="" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
												<input type="text" class="form-control" readonly>
												<input type="hidden" name="tanggal" class="form-control" >
												<span class="input-group-btn">
												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
											<!-- /input-group -->
											
										</div>
									</div>
									

								
								
							</div>
						</div>
					</div>
				</div>

                                   
									
									

								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn blue" type="submit"> Create Inquiry </button>
											
										</div>
									</div>
								</div>


								</div>
								
							
						</div>
					</div>
					<!-- END VALIDATION STATES-->
			<!-- END PAGE CONTENT-->
			<!-- BEGIN PAGE LEVEL STYLES -->
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script src="assets/admin/pages/scripts/form-validation.js"></script>

<!-- END PAGE LEVEL STYLES -->
 <script>
jQuery('.numbersOnly').keyup(function () {
    this.value = this.value.replace(/[^0-9\.]/g,'');
});

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
        	
        	product: {
			   required: true	
            },
            unit: {
			   required: true	
            },
            proses: {
			   required: true	
            },
            permasalahan: {
			   required: true	
            },
            penyebab: {
			   required: true	
            },
        	jenis_laporan: {
			   required: true	
            },
			nama_nasabah: {
			   required: true	
            }
	
        },
		

        messages: {
        	product: {
			   required: "<span class='label label-warning'> <i>Product Harus Ada.. !</i></span>"	
            },
            unit: {
			   required: "<span class='label label-warning'> <i>Unit Harus Ada.. !</i></span>"	
            },
            proses: {
			   required: "<span class='label label-warning'> <i>Proses Harus Ada.. !</i></span>"	
            },
            permasalahan: {
			   required: "<span class='label label-warning'> <i>Permasalahan Harus Ada.. !</i></span>"	
            },
            penyebab: {
			   required: "<span class='label label-warning'> <i>Penyebab Harus Ada.. !</i></span>"	
            },
        	jenis_laporan: {
			   required: "<span class='label label-warning'> <i>Jenis Laporan Harus Ada.. !</i></span>"	
            },
        	nama_nasabah: {
			   required: "<span class='label label-warning'> <i>Nama Nasabah Harus ada.. !</i></span>"	
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
			<!-- END PAGE CONTENT-->
						