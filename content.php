<?php


      if( isset($_GET['module']) ){

                if($_GET['module']==sha1('2'))			{  // Module user
				   include "module/module_user.php";				   
			     }else if($_GET['module']==sha1('3')){  // Module Group User
				   include "module/module_group_user.php";
				 }else if($_GET['module']==sha1('4')){  // Module Menu
				   include "module/module_menu.php";
				 }else if($_GET['module']==sha1('5')){  // Module Group Menu
				   include "module/module_group_menu.php";
				 }else if($_GET['module']==sha1('17')){  // Ganti Password
				   include "module/module_ganti_password.php";
				 }else if($_GET['module']==sha1('19')){  // Create laporan
				   include "module/module_create_laporan.php";
				 }else if($_GET['module']==sha1('20')){  // search my laporan
				   include "module/module_cari_mylaporan.php";
				 }else if($_GET['module']==sha1('10')){  // master cabang
				   include "module/module_master_cabang.php";
				 }else if($_GET['module']==sha1('14')){  // master case
				   include "module/module_master_case.php";
				 }else if($_GET['module']==sha1('7')){  // master channel
				   include "module/module_master_channel.php";
				 }else if($_GET['module']==sha1('8')){  // master city
				   include "module/module_master_city.php";
				 }else if($_GET['module']==sha1('9')){  // master jabatan
				   include "module/module_master_jabatan.php";
				 }else if($_GET['module']==sha1('21')){  // master laporan
				   include "module/module_master_laporan.php";
				 }else if($_GET['module']==sha1('22')){  // master PIC
				   include "module/module_master_pic.php";
				 }else if($_GET['module']==sha1('13')){  // master process
				   include "module/module_master_process.php";
				 }else if($_GET['module']==sha1('11')){  // master product
				   include "module/module_master_product.php";
				 }else if($_GET['module']==sha1('12')){  // master unit
				   include "module/module_master_unit.php";
				 }else if($_GET['module']==sha1('40')){  // master BI Case
				   include "module/module_master_bicase.php";
				 }else if($_GET['module']==sha1('39')){  // master BI Product
				   include "module/module_master_biproduct.php";
				 }else if($_GET['module']==sha1('28')){  // Mapping SLA Case
				   include "module/module_mapp_unitaccess.php";
				 }else if($_GET['module']==sha1('42')){  // master cause bi
				   include "module/module_master_bicause.php";
				 }else if($_GET['module']==sha1('41')){  // module tambah memo
				   include "module/module_tambah_memo.php";
				 }else if($_GET['module']==sha1('27')){  // Mapping pic 
				   include "module/module_mapp_pic.php";
				 }else if($_GET['module']==sha1('25')){  // module daftar laporan
				   include "module/module_daftar_laporan.php";
				 }else if($_GET['module']==sha1('44')){  // module add sla page
				   include "module/module_tambah_sla.php";
				 }else if($_GET['module']==sha1('33')){  // master category product
				   include "module/module_categori_product.php";
				 }else if($_GET['module']==sha1('34')){  // master category promotion
				   include "module/module_categori_promotion.php";
				 }else if($_GET['module']==sha1('35')){  // master category faq
				   include "module/module_categori_faq.php";
				 }else if($_GET['module']==sha1('30')){  // input product news
				   include "module/module_productnews.php";
				 }else if($_GET['module']==sha1('31')){  // input promotion news
				   include "module/module_promotionnews.php";
				 }else if($_GET['module']==sha1('32')){  // input faq news
				   include "module/module_faqnews.php";
				 }else if($_GET['module']==sha1('45')){  // Module dashboard
				   include "module/module_dashboard.php";
				 }else if($_GET['module']==sha1('47')){  // module list laporan
				   include "module/module_list_laporan.php";
				 }else if($_GET['module']==sha1('48')){  // report bi
				   include "module/module_laporan_format_bi_ojk.php";
				 }else if($_GET['module']==sha1('49')){  // hubungi nasabah
				   include "module/module_konfirmasi_nasabah.php";
				 }else if($_GET['module']==sha1('50')){  // Mapping Unit Access
				   include "module/module_mapp_pic2.php";
				 }else if($_GET['module']==sha1('51')){  // inquiry FL
				   include "module/module_search_laporan.php";
				 }else if($_GET['module']==sha1('52')){  // Edit Profile
				   include "module/module_edit_profile.php";
				 }else if($_GET['module']==sha1('54')){  // Forward Case
				   include "module/module_forward_case.php";
				 }else if($_GET['module']==sha1('57')){  // Export Excel
				   include "module/module_export_dashboard.php";
				 }else if($_GET['module']==sha1('58')){  // inquiry sl popup/modals
				   include "module/module_inquiry_list_ss.php";
				 }else if($_GET['module']==sha1('59')){  // inquiry sl serverside
				   include "module/module_inquiry_list_ver2.php";
				 }else if($_GET['module']==sha1('60')){  // list inquiry branch
				   include "module/module_inquiry_list_branch.php";
				 }else if($_GET['module']==sha1('61')){  // inquiry pending branch
				   include "module/module_inquiry_pending_branch.php";
				 }else if($_GET['module']==sha1('63')){  // Form Request MNC Pay
				   include "module/module_request_mncpay.php";
				 }else if($_GET['module']==sha1('64')){  // List Request MNC Pay
				   include "module/module_list_request_mncpay.php";
				 }else if($_GET['module']==sha1('65')){  // Export Excel Request MNC Pay
				   include "module/module_export_mncpay.php";
				 }else if($_GET['module']==sha1('67')){  // Form Request From Leads
				   include "module/module_request_leads.php";
				 }else if($_GET['module']==sha1('68')){  // List Leads data
				   include "module/module_list_leads_data.php";
				 }else if($_GET['module']==sha1('69')){  // Setting Purpose
				   include "module/module_setting_purpose.php";
				 }else if($_GET['module']==sha1('70')){  // Add Jenis MNC Pay
				   include "module/module_jenis_mncpay.php";
				 }else if($_GET['module']==sha1('71')){  // Verification from temp to Leads
				   include "module/module_verification_tmp.php";
				 }else if($_GET['module']==sha1('72')){  // Edit Inquiry
				   include "module/module_edit_inquiry.php";
				 }else if($_GET['module']==sha1('73')){  // New Dashboard Inquiry
				   include "module/module_dash_chart.php";
				 }else if($_GET['module']==sha1('74')){  // Export Leads Data
				   include "module/module_export_leads.php";
				 }else if($_GET['module']==sha1('75')){  // Export  Inquiry Excel 
				   include "module/module_list_laporan_export.php";
				 }else if($_GET['module']==sha1('76')){  // Export  Inquiry Excel 
				   include "module/module_close_mncpay_upload.php";
				 }else {   // not found mode
				 include "module/notfound.php";
				 }
} else {
	 include "module/module_home.php";
	}

//.module_list_leads_data
//module_upload_adjustment_fr.php
?>