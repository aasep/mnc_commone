<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);

if (isset($_GET['act']) && $_GET['act']=='src'){

	$tgl_from=$_POST['from'];
	$tgl_to=$_POST['to'];
	$type_report=$_POST['type_report'];
	$var_priode=" ";
	if ($tgl_from==$tgl_to ){
				$var_priode=" and to_char(a.date_start, 'YYYY-MM-DD') ='".$tgl_from."'  and a.id_report='$type_report' ";
	}	else {
				$var_priode=" and to_char(a.date_start, 'YYYY-MM-DD') between '".$tgl_from."' and '".$tgl_to."'  and a.id_report='$type_report'  ";
		}



$last_day=date('Y-m-t', strtotime(date('Y-m',strtotime($tgl_from))." -1 month")); // tanggal terakhir pada bulan sebelumnya 
$first_day=date('Y-m-01', strtotime(date('Y-m',strtotime($tgl_from))." -3 month")); 

$curr_label_from=date('Y (M-d)',strtotime($tgl_from));
$curr_label_to=date('Y (M-d)',strtotime($tgl_to));

$label_last_day=date('Y (M-t)', strtotime(date('Y-m',strtotime($tgl_from))." -1 month"));
$label_first_day=date('Y (M-01)', strtotime(date('Y-m',strtotime($tgl_from))." -3 month")); 
$var_priode2=" and to_char(a.date_start, 'YYYY-MM-DD') between '".$last_day."' and '".$first_day."'";

//echo $first_day ."<br>";
//echo $last_day ."<br>";

} else {
	$tgl_from="";
	$tgl_to="";
	$var_priode=" ";
}








?>


<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- /.modal -->
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			

			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			  Laporan Format BI - OJK <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Monitoring</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#"> Laporan Format BI - OJK </a>
						<i class="fa fa-angle-right"></i>
					</li>
				
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
         

               <!-- MODAL EDIT -->
             
							<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Form <?php echo $title;?></span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
                                    
                                    <div class="portlet-body form">
							
               <div class="table-scrollable">
								<table class="table table-bordered table-hover" width="100%">
									<tbody>
									</table>
									<form action="<?php echo $page."&act=src";?>" id="form_sample_3" class="form-horizontal" method="POST">
							<table width="100%">
                                   <tr>
                                   <td width="50%" >&nbsp;
									
									</td>
									<td width="50%" >&nbsp;
									
									</td>
									</tr>
									<tr>
									<td>
									<div class="form-group">
										<label class="control-label col-md-3">Periode</label>
										<div class="col-md-6">
											<div class="input-group input-large date-picker input-daterange" data-date="" data-date-format="yyyy-mm-dd">
												<input type="text" class="form-control" name="from" value="<?php echo $tgl_from;?>">
												<span class="input-group-addon">
												to </span>
												<input type="text" class="form-control" name="to" value="<?php echo $tgl_to;?>">
											</div>
											<!-- /input-group -->
											
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Type <span class="required">
										 </span>
										</label>
										<div class="col-md-6">
											<select class="form-control" name="type_report" id="type_report" >
												<option value=""> --Inquiry Type-- </option>
												<?php
												$query=" select * from master_report order by name asc ";
												$r_report=pg_query($connection,$query);
												while ($row1=pg_fetch_array($r_report)){
													if($row1['id_report']==$type_report){
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

									<td>
									
									
										
									</tr>
									<tr>
                                   <td width="50%" >&nbsp;
									
									</td>
									<td width="50%" >&nbsp;
									
									</td>
									</tr>
									<tr>
									<td width="50%"  ><button class="btn blue pull-right" type="submit"> Show Data <i class="fa  fa-sign-out"></i> </button>
									
									</td>
                                    <td width="50%" >&nbsp;
									</td>
									</tr>
									<tr>
                                   <td width="50%" >&nbsp;
									
									</td>
									<td width="50%" >&nbsp;
									
									</td>
									</tr>
									<tr>
									</table>
									</form>	
									</div>
									<?php

if (isset($_GET['act']) && $_GET['act']=='src')
{

?>


						<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Laporan Format BI - OJK  
							</div>
							<div class="tools">
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							


					 <div class="table-scrollable">
					<table class="table table-striped table-bordered table-hover" id="sample_2" width="100%">
							<thead>
							<tr class='active'>
							<?php
							$id_column=array();
							$val_column=array();
							$q_case_bi=" select * from bi_case order by id_causebi asc ";
							$r_case_bi=pg_query($q_case_bi);
							$i=1;
							while($row_case_bi=pg_fetch_array($r_case_bi)){
								$id_column[$i]=$row_case_bi['id_causebi'];
								$val_column[$i]=$row_case_bi['name'];
								$i++;
							}
							$jml_column=count($id_column);
							/*
							echo "<br>";
							var_dump($id_column);
							echo "<br>";
							var_dump($val_column);
							*/

							echo "<th style='font-size:11px' align='center'>No </th>";
							echo "<th style='font-size:11px' align='center'>Jenis Produk BI </th>";
							for ($i=1; $i <= $jml_column ; $i++) { 

								echo "<th style='font-size:11px' align='center' width='10%'>".$val_column[$i] ."</th>";

								
							}
							?>
							
								<th style="font-size:11px" width="7%" align="center">
									 Jumlah
								</th>
							</tr>
							</thead>
							<tbody>
							<?php
							//$i=1;
                            $query  =" select * from bi_product a order by name asc ";
                           // $query .=" left join category_promotion b on b.id_cat_pronews=a.id_cat_pronews  order by b.name_category asc ";
                            $result=pg_query($connection,$query);
                            $z=1;
                            while ($row=pg_fetch_array($result)) {

                            	$hasil= $i%2;
                            	if($hasil==0){
                            		$row_class="class='warning'";
                            	} else {
                            		$row_class="";
                            	}

                              switch ($row['status']) {
		 				 		case '0' : $status= "  <span class='label label-danger'> <i> No Publish </i> </span>  "; break; 
						 		case '1' : $status= "  <span class='label label-success'> <i> Publish </i> </span> "; break; 
						 			}

						 	


							echo "<tr $row_class>";
							echo "<td style='font-size:11px' width='5%'>$z</td>";
							echo "<td style='font-size:11px' width='20%'>$row[name]</td>";
							$jml_case=0;
							for ($idx=1; $idx <= $jml_column ; $idx++) { 

								$q_count =" select count(a.id_lapker) from laporan_kerja a , master_case b ";
								$q_count.=" where a.id_case=b.id_case and b.id_causebi='$id_column[$idx]' and b.id_productbi='$row[id_productbi]' $var_priode ";
								//echo $q_count."<br>";
						 		$r_count=pg_query($q_count);
						 		$row_count=pg_fetch_array($r_count);
						 		$jml_case=$jml_case+$row_count['count'];
								echo "<td style='font-size:11px' align='right'>".$row_count['count'] ."</td>";

								
							}
							echo "<td style='font-size:11px' width='7%' align='right'>$jml_case</td>";
							echo "</tr>";
							$z++;
							
									}
							?>


							</tbody>
							</table>
						
							</div>


						</div>
					</div>
						<?php
				//		1. Pengaduan dalam periode laporan Sebelumnya
						##################-------SELESAI  <= 20 HARI KERJA ----- ################

						$q_pengaduan_npmb1 =" select count(a.id_lapker) from laporan_kerja a, master_case b where a.id_case=b.id_case ";
						$q_pengaduan_npmb1.=" and (a.sla + a.extend_sla) <='20' and a.status='3' and b.stat_pmb='0' $var_priode2 ";
						$res_pnpb1=pg_query($q_pengaduan_npmb1);
						$row_pnpb1=pg_fetch_array($res_pnpb1);
						$jml_pnpb1=$row_pnpb1['count'];

						$q_pengaduan_pmb1 =" select count(a.id_lapker)  from laporan_kerja a, master_case b where a.id_case=b.id_case ";
						$q_pengaduan_pmb1.=" and (a.sla + a.extend_sla) <='20' and a.status='3' and b.stat_pmb='1' $var_priode2 ";
						$res_ppb1=pg_query($q_pengaduan_pmb1);
						$row_ppb1=pg_fetch_array($res_ppb1);
						$jml_ppb1=$row_ppb1['count'];

						$tot_pengaduan1=$jml_pnpb1+$jml_ppb1;

						##################-------SELESAI  <= 40 HARI KERJA ----- ################
						$q_pengaduan_npmb2 =" select count(a.id_lapker)  from laporan_kerja a, master_case b where a.id_case=b.id_case ";
						$q_pengaduan_npmb2.=" and (a.sla + a.extend_sla) > '20' and a.status='3' and b.stat_pmb='0' $var_priode2 ";
						$res_pnpb2=pg_query($q_pengaduan_npmb2);
						$row_pnpb2=pg_fetch_array($res_pnpb2);
						$jml_pnpb2=$row_pnpb2['count'];

						$q_pengaduan_pmb2 =" select count(a.id_lapker)  from laporan_kerja a, master_case b where a.id_case=b.id_case ";
						$q_pengaduan_pmb2.=" and (a.sla + a.extend_sla) > '20' and a.status='3' and b.stat_pmb='1' $var_priode2 ";
						$res_ppb2=pg_query($q_pengaduan_pmb2);
						$row_ppb2=pg_fetch_array($res_ppb2);
						$jml_ppb2=$row_ppb2['count'];

						$tot_pengaduan2=$jml_pnpb2+$jml_ppb2;
						##################------- SEDANG DALAM PROSES PENYELESAIAN ----- ################
						$q_pengaduan_sdg_npmb1 =" select count(a.id_lapker)  from laporan_kerja a, master_case b where a.id_case=b.id_case ";
						$q_pengaduan_sdg_npmb1.=" and a.status='2' $var_priode2 ";
						$res_sdg_npb1=pg_query($q_pengaduan_sdg_npmb1);
						$row_sdg_pnpb1=pg_fetch_array($res_sdg_npb1);
						$jml_sdg_pnpb1=$row_sdg_pnpb1['count'];


						$q_pengaduan_sdg_pmb1 =" select count(a.id_lapker)  from laporan_kerja a, master_case b where a.id_case=b.id_case ";
						$q_pengaduan_sdg_pmb1.=" and a.status='2' $var_priode2 ";
						$res_sdg_pb1=pg_query($q_pengaduan_sdg_pmb1);
						$row_sdg_ppb1=pg_fetch_array($res_sdg_pb1);
						$jml_sdg_ppb1=$row_sdg_ppb1['count'];
						$tot_sdg_pengaduan1=$jml_sdg_pnpb1+$jml_sdg_ppb1;

				//		2. Pengaduan dalam periode laporan

						##################-------SELESAI  <= 20 HARI KERJA ----- ################

						$q_pengaduan_npmb1a =" select count(a.id_lapker) from laporan_kerja a, master_case b where a.id_case=b.id_case ";
						$q_pengaduan_npmb1a.=" and (a.sla + a.extend_sla) <='20' and a.status='3' and b.stat_pmb='0' $var_priode ";
						$res_pnpb1a=pg_query($q_pengaduan_npmb1a);
						$row_pnpb1a=pg_fetch_array($res_pnpb1a);
						$jml_pnpb1a=$row_pnpb1a['count'];

						$q_pengaduan_pmb1a =" select count(a.id_lapker)  from laporan_kerja a, master_case b where a.id_case=b.id_case ";
						$q_pengaduan_pmb1a.=" and (a.sla + a.extend_sla) <='20' and a.status='3' and b.stat_pmb='1' $var_priode ";
						$res_ppb1a=pg_query($q_pengaduan_pmb1a);
						$row_ppb1a=pg_fetch_array($res_ppb1a);
						$jml_ppb1a=$row_ppb1a['count'];

						$tot_pengaduan1a=$jml_pnpb1a+$jml_ppb1a;

						##################-------SELESAI  <= 40 HARI KERJA ----- ################
						$q_pengaduan_npmb2a =" select count(a.id_lapker)  from laporan_kerja a, master_case b where a.id_case=b.id_case ";
						$q_pengaduan_npmb2a.=" and (a.sla + a.extend_sla) > '20' and a.status='3' and b.stat_pmb='0' $var_priode ";
						$res_pnpb2a=pg_query($q_pengaduan_npmb2a);
						$row_pnpb2a=pg_fetch_array($res_pnpb2a);
						$jml_pnpb2a=$row_pnpb2a['count'];

						$q_pengaduan_pmb2a =" select count(a.id_lapker)  from laporan_kerja a, master_case b where a.id_case=b.id_case ";
						$q_pengaduan_pmb2a.=" and (a.sla + a.extend_sla) > '20' and a.status='3' and b.stat_pmb='1' $var_priode ";
						$res_ppb2a=pg_query($q_pengaduan_pmb2a);
						$row_ppb2a=pg_fetch_array($res_ppb2a);
						$jml_ppb2a=$row_ppb2a['count'];

						$tot_pengaduan2a=$jml_pnpb2a+$jml_ppb2a;
						##################------- SEDANG DALAM PROSES PENYELESAIAN ----- ################
						$q_pengaduan_sdg_npmb1a =" select count(a.id_lapker)  from laporan_kerja a, master_case b where a.id_case=b.id_case ";
						$q_pengaduan_sdg_npmb1a.=" and a.status='2' $var_priode ";
						$res_sdg_npb1a=pg_query($q_pengaduan_sdg_npmb1a);
						$row_sdg_pnpb1a=pg_fetch_array($res_sdg_npb1a);
						$jml_sdg_pnpb1a=$row_sdg_pnpb1a['count'];


						$q_pengaduan_sdg_pmb1a =" select count(a.id_lapker)  from laporan_kerja a, master_case b where a.id_case=b.id_case ";
						$q_pengaduan_sdg_pmb1a.=" and a.status='2' $var_priode ";
						$res_sdg_pb1a=pg_query($q_pengaduan_sdg_pmb1a);
						$row_sdg_ppb1a=pg_fetch_array($res_sdg_pb1a);
						$jml_sdg_ppb1a=$row_sdg_ppb1a['count'];
						$tot_sdg_pengaduan1a=$jml_sdg_pnpb1a+$jml_sdg_ppb1a;



						?>




					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Pengaduan yang diselesaikan dalam masa laporan
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							<tr>
								<th>No</th>
								<th>Nama Pengaduan</th>
								<th>Diluar <br>Sistem Pembayaran</th>
								<th>Terkait <br>Sistem Pembayaran</th>
								<th>Jumlah</th>
								
							</tr>
							</thead>
							<tbody>
							<tr class="active">
							<td></td>
								<td ><b>Pengaduan yang diterima dalam periode pelaporan sebelumnya<br><?php echo "Periode ".$label_first_day." s.d ".$label_last_day; ?></b></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
							<td></td>
								<td>Telah selesaikan tanpa perpanjangan waktu(maksimal 20 Hari Kerja)</td>
								<td align="right"><?php echo $jml_pnpb1;?></td>
								<td align="right"><?php echo $jml_ppb1;?></td>
								<td align="right"><?php echo $tot_pengaduan1;?></td>
							</tr>
							<tr>
							<td></td>
								<td>Telah selesaikan tanpa perpanjangan waktu(maksimal 40 Hari Kerja)</td>
								<td align="right"><?php echo $jml_pnpb2;?></td>
								<td align="right"><?php echo $jml_ppb2;?></td>
								<td align="right"><?php echo $tot_pengaduan2;?></td>
							</tr>
							<tr>
								<td></td>
								<td>sedang dalam proses penyelesaian</td>
								<td align="right"><?php echo $jml_sdg_pnpb1;?></td>
								<td align="right"><?php echo $jml_sdg_ppb1;?></td>
								<td align="right"><?php echo $tot_sdg_pengaduan1;?></td>
							</tr>
							<tr class="active">
								<td>	
								</td>
								<td><b>Pengaduan yang diterima dalam periode pelaporan<br><?php echo "Periode ".$curr_label_from." s.d ".$curr_label_to; ?></b></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td>Telah selesaikan tanpa perpanjangan waktu(maksimal 20 Hari Kerja)</td>
								<td align="right"><?php echo $jml_pnpb1a;?></td>
								<td align="right"><?php echo $jml_ppb1a;?></td>
								<td align="right"><?php echo $tot_pengaduan1a;?></td>
								
							</tr>
							<tr>
								<td></td>
								<td>Telah selesaikan tanpa perpanjangan waktu(maksimal 40 Hari Kerja)</td>
								<td align="right"><?php echo $jml_pnpb2a;?></td>
								<td align="right"><?php echo $jml_ppb2a;?></td>
								<td align="right"><?php echo $tot_pengaduan2a;?></td>
								
							</tr>
							<tr>
								<td></td>
								<td>sedang dalam proses penyelesaian</td>
								<td align="right"><?php echo $jml_sdg_pnpb1a;?></td>
								<td align="right"><?php echo $jml_sdg_ppb1a;?></td>
								<td align="right"><?php echo $tot_sdg_pengaduan1a;?></td>
							</tr>
							
							</tbody>
							</table>
						</div>
					</div>





						<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Penyebab pengaduan
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_6">
							<thead>
							<tr>
								<th>
									 No
								</th>
								<th>
									 Nama Pengaduan
								</th>
								<th>
									 Diluar <br>Sistem Pembayaran
								</th>
								<th>
									 Terkait <br>Sistem Pembayaran
								</th>
								<th>
									 Jumlah
								</th>
								
							</tr>
							</thead>
							<tbody>
							<?php 
							$q_penyebab_bi=" select * from bi_cause order by name asc ";
							$res_penyebab=pg_query($q_penyebab_bi);
							$q=1;
							while ($row_penyebab=pg_fetch_array($res_penyebab)){


								$q_count_penyebab_a =" select count(a.id_lapker) from laporan_kerja a, master_case b where a.id_case=b.id_case ";
								$q_count_penyebab_a.=" and a.id_cause_bi='$row_penyebab[id_cause_bi]' and b.stat_pmb='0' $var_priode ";
								$res_penyebab_a=pg_query($q_count_penyebab_a);
								$row_cause_a=pg_fetch_array($res_penyebab_a);

								$q_count_penyebab_b =" select count(a.id_lapker) from laporan_kerja a, master_case b where a.id_case=b.id_case ";
								$q_count_penyebab_b.=" and a.id_cause_bi='$row_penyebab[id_cause_bi]' and b.stat_pmb='1' $var_priode ";
								$res_penyebab_b=pg_query($q_count_penyebab_b);
								$row_cause_b=pg_fetch_array($res_penyebab_b);

								$jml_penyebab=$row_cause_a['count']+$row_cause_b['count'];

								echo "<tr>";
								echo "<td>$q</td>";
								echo "<td >$row_penyebab[name]</td>";
								echo "<td align='right'>$row_cause_a[count]</td>";
								echo "<td align='right'>$row_cause_b[count]</td>";
								echo "<td align='right'>$jml_penyebab</td>";
								echo "</tr>";

								$q++;
							}


							?>
							
							
							</tbody>
							</table>
						</div>
					</div>
</div>
					</div>

<?php

}

?>

					
			
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
				'<td>'+'<h5>Yakin Anda Akan Mendelete Product News dengan Judul : <br> <br> "'+'<strong>' + nama +' "</strong></h5>'+
				'<input type="hidden" name="id_pnews" value="'+id_prodnews+'"> '+
				'</td></tr>');
			  });




	$('.detailEdit').click(function() {
		var id_kategori= $(this).attr('id-catfaq');
		var nama_kategori= $(this).attr('id-nama');


		//document.getElementById('ed_nama_cabang').value=id_cabang;
    	document.getElementById('ed_nama').value=nama_kategori;

		  //alert(id_user);
			$("#list-user2").empty();
			$("#list-user2").append( '<input type="hidden" name="id_kategori" value="'+id_kategori+'">');
			
			  });


}); // document ready	$(document).ready(function() {

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
        	from: {
                required: true
                
            },
            
            to: {
                required: true
                
            },

            type_report: {
                required: true
                
            }
        },

        messages: {
        	from: {
                 required: "<span class='label label-warning'><i>From Harus diisi ...! </i></span>"
            },
            type_report: {
                 required: "<span class='label label-warning'><i>Type Inquiry Harus Diisi ...! </i></span>"
            },
          
            to: {
                 required: "<span class='label label-warning'><i>To Harus diisi ...! </i></span>"
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