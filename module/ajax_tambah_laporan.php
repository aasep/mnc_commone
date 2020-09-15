

<?php
session_start();
require_once '../config/config.php';
require_once '../function/function.php';

error_reporting(0);

//include('db.php');
if($_POST['id'])
{
$id=$_POST['id'];

$query_laporan =" select *,z.name as nama_cabang, c.name as nama_proses,d.name as nama_channel, e.name as nama_product,f.name as nama_unit,g.name as nama_case,h.name as jenis_laporan,g.priority,g.sla,g.satuan,a.extend_sla  from  laporan_kerja a  ";
//$query_laporan.=" left join user_account b on a.id_karyawan=b.id_karyawan ";
$query_laporan.=" left join master_process c on a.id_process=c.id_process ";
$query_laporan.=" left join master_channel d on a.id_channel=d.id_channel ";
$query_laporan.=" left join master_product e on a.id_product=e.id_product ";
$query_laporan.=" left join master_unit f on a.id_unit=f.id_unit ";
$query_laporan.=" left join master_case g on a.id_case=g.id_case ";
$query_laporan.=" left join master_report h on a.id_report=h.id_report ";
$query_laporan.=" left join master_branch z on a.id_cabang=z.id_cabang ";
$query_laporan.=" where a.ticket_number='$id' ";

$result_laporan= pg_query($query_laporan);
$found= pg_num_rows($result_laporan);

if ($found >=1){
$row_lap=pg_fetch_array($result_laporan);



switch ($row_lap['priority']) {
		 case '1' : $priority= " <i class='fa fa-warning font-green'> Normal "; break; //ticket_number
		 case '2' : $priority= " <i class='fa fa-warning font-blue'> Important "; break; //customer_name
		 case '3' : $priority= " <i class='fa fa-warning font-red'> Urgent "; break; //account_number
		 //case '4' : $varsrc= " where credit_card_number='$srckey' "; break; // credit_card_number
		 }
switch ($row_lap['status']) {
		 case '1' : $status= " <i class='fa fa-warning font-red'> <span class='label label-danger'> <i> Unprocessed</i> </span>  "; break; //ticket_number
		 case '2' : $status= " <i class='fa fa-refresh font-green'> <span class='label label-info'> <i> On Progress</i> </span> "; break; //customer_name
		 case '3' : $status= " <i class='fa fa-check-square font-blue'> <span class='label label-success'> <i> Done</i> </span> "; break; //account_number
		 //case '4' : $varsrc= " where credit_card_number='$srckey' "; break; // credit_card_number
		 }


$jml_intval=$row_lap['sla']+$row_lap['extend_sla'];
$date_sla=dateSla($row_lap['date_start'],$jml_intval,$row_lap['satuan']);



$batas_sla=dateSla($row_lap['date_start'],$row_lap['sla'],$row_lap['satuan']);




?>


<!--- start-->
<div class="table-scrollable">

									 <table class="table table-bordered table-hover" width="100%">
									<tr bgcolor="#F0F0F0">
									<td >
										<span class="caption-subject font-sunglo bold "> <i class="icon icon-settings"></i> <b>Status Inquiry :   </b> <i><?php echo $status; ?> </i></span>
									</td>
									<!-- <td width="70%">
										 <b>CHANNEL </b> 
									</td> -->
									</tr>
									</table> 

	
								    <table width="100%" class="table table-bordered table-hover" >
                                   
									<tr>
                                    <td width="20%"><b>Inquiry Date</b></td>
                                    <td width="30%">: <?php  echo date('d-m-Y',strtotime($row_lap['date_start'])); ?></td>
                                    <td width="20%"><b>Channel</b></td>
                                    <td width="30%">: <?php  echo $row_lap['nama_channel']; ?></td>
									</tr>
									<tr>
                                    <td width="20%"><b>SLA </b></td>
                                    <td width="30%">: <?php echo $row_lap['sla']." ".$row_lap['satuan']; ?></td>
                                    <td width="20%"><b>Branch</b></td>
                                    <td width="30%">: <?php  echo $row_lap['nama_cabang']; ?></td>
									</tr>
									<tr>
                                    <td width="20%"><b>Additional SLA </b></td>
                                    <td width="30%">: <?php  echo $row_lap['extend_sla']." ".$row_lap['satuan']; ?> 
                                  <!--  <a class="btn btn-circle red-stripe btn-sm grey-cascade" href="#" id-ticketx=<?php echo $id; ?> id-processx=<?php echo $row_lap['id_process'];?> data-toggle="modal" data-dismiss="modal" data-target="#forward-case" id="fwd-case"> <i>Lanjtutkan Laporan Ke Permasalahan Lainnya</i> <i class="fa fa-sign-out"></i></a> -->
                                  	<?php //if (getGroupUser() !='4') { ?>
                                    <a href='#'  data-toggle="modal" data-dismiss="modal"  data-target="#tambah_sla" class="addsla" > <button class="btn btn-circle grey-cascade-stripe green-haze btn-xs">  Extend SLA   <i class="fa fa-plus"></i></button></a>
                                    <?php //} ?>

                                    </td>
                                    <td width="20%"></td>
                                    <td width="30%"></td>
									</tr>
									<tr>
                                    <td width="20%"><b>Limit / Expire</b></td>
                                    <td width="30%">: <?php echo $date_sla; ?></td>
                                    <td width="20%"></td>
                                    <td width="30%"></td>
									</tr>
									

									</table>
										
							
								
																			
											

</div>
<div class="table-scrollable">
									<table class="table table-bordered table-hover" width="100%">
									<tr bgcolor="#F0F0F0">
									<td>
										 <i class="icon icon-settings"></i> <b>  Basic Information Customer</b>
									</td>
									</tr>
									</table>
									
								    <table width="100%" class="table table-bordered table-hover">
                                   
									<tr>
                                    <td width="20%"><b>Customer Name</b></td>
                                    <td width="30%">: <?php if (!isset($row_lap['customer_name'])) { echo " - "; } else{ echo $row_lap['customer_name'];} ?></td>
                                    <td width="20%"><b>Account Number</b></td>
                                    <td width="30%">: <?php if (!isset($row_lap['account_number'])) { echo " - "; } else{ echo $row_lap['account_number'];} ?></td>
									</tr>
									<tr>
                                    <td width="20%"><b>Phone</b></td>
                                    <td width="30%">: <?php if (!isset($row_lap['phone'])) { echo " - "; } else{ echo $row_lap['phone'];} ?></td>
                                    <td width="20%"><b>Email</b></td>
                                    <td width="30%">: <?php if (!isset($row_lap['mail'])) { echo " - "; } else{ echo $row_lap['mail'];} ?></td>
									</tr>
									<tr> <td width="20%"><b>Credit Card Number</b></td>
                                    <td width="30%">: <?php if (!isset($row_lap['credit_card_number'])) { echo " - "; } else{ echo $row_lap['credit_card_number'];} ?></td>
                                    <td width="20%"></td>
                                    <td width="30%"></td>
									</tr>
									

									</table>
									
								
								
									</div>
<!--  end-->

<!--- start-->

<!--  end-->

<!--- start-->
<div class="table-scrollable">
								<table class="table table-bordered table-hover" width="100%">
									<tr bgcolor="#F0F0F0">
									<td>
										<i class="icon icon-settings"></i><b> Inquiry Type</b>
									</td>
									</tr>
									</table>



							
								
							
								    <table width="100%" class="table table-bordered table-hover">
                                   
									<tr>
                                    <td width="20%"><b>Product</b></td>
                                    <td width="80%">: <?php if (!isset($row_lap['nama_product'])) { echo " - "; } else{ echo $row_lap['nama_product'];} ?></td>
									</tr>
									<tr>
                                    <td width="20%"><b>Unit</b></td>
                                    <td width="80%">: <?php echo $row_lap['nama_unit']; ?></td>
									</tr>
									<tr>
                                    <td width="20%"><b>Process</b></td>
                                    <td width="80%">: <?php echo $row_lap['nama_proses']; ?></td>
									</tr>
									<tr>
                                    <td width="20%"><b>Case</b></td>
                                    <td width="80%">: <?php echo $row_lap['nama_case']; ?> <a class="btn btn-circle red-stripe btn-sm grey-cascade" href="#" id-ticketx=<?php echo $id; ?> id-processx=<?php echo $row_lap['id_process'];?> data-toggle="modal" data-dismiss="modal" data-target="#forward-case" id="fwd-case"> <i> Forward to Other PIC </i> <i class="fa fa-sign-out"></i></a></td>
									</tr>
									<tr>
                                    <td width="20%"><b>Inquiry Type</b></td>
                                    <td width="80%">: <?php echo $row_lap['jenis_laporan']; ?></td>
									</tr>
									<tr>
                                    <td width="20%"><b>Priority</b></td>
                                    <td width="80%">: <?php echo $priority; ?></td>
									</tr>

									</table>
										

									</div>
<!--  end-->

<!--- start-->
<div class="table-scrollable">
									<table class="table table-bordered table-hover" width="100%">
									<tr bgcolor="#F0F0F0">
									<td>
										 <i class="icon icon-settings"></i><b> Additional Info</b>
									</td>
									</tr>
									</table>
									
									
								    <table width="100%" class="table table-bordered table-hover">
                                   
									<tr>
                                    <td width="20%"><b>Description</b></td>
                                    <td width="80%">: <?php if (!isset($row_lap['keterangan'])) { echo " - "; } else{ echo $row_lap['keterangan'];} ?></td>
									</tr>
									<tr>
                                    <td width="20%"><b>Nominal Transaction</b></td>
                                    <td width="80%">: <?php echo $row_lap['nominal']; ?></td>
									</tr>
									<tr>
                                    <td width="20%"><b>Transaction Date</b></td>
                                    <td width="80%">: <?php echo $row_lap['tgl_transaksi']; ?></td>
									</tr>
									<tr>
                                    <td width="20%"></td>
                                    <td width="80%" ><button class="btn btn-circle blue-hoki red-stripe btn-sm " data-toggle="modal" data-dismiss="modal" data-target="#lampiran-file" id="lampir-file"> <i class="fa fa-chain"> </i> <i>Attach file</i> </button></td>
									</tr>
									</table>
										
									</div>
<!--  end-->



<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">LIST MEMO </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
						<div class="portlet-body form">
						<div class="form-body">
									<div class="table-scrollable">

<?php
}







echo "<table class='table table-bordered table-hover' id='sample_1' width='100%'>";
echo "<thead>
							
							    <th style='font-size:11px' width='30%'>
									 Date / User 
								</th>
								<th style='font-size:11px' width='60%'>
									Description
								</th>
								<th style='font-size:11px' width='10%'>
									 File
								</th>

							
							</thead>
							<tbody> ";

$i=1;
$sql =" select a.file_memo,b.id_karyawan,b.nama_lengkap,c.name as nama_proses, a.keterangan,a.memo_date,d.name as nama_channel ,z.name as nama_pic from log_memo a  ";
$sql.=" left join user_account b on a.id_karyawan=b.id_karyawan ";
$sql.=" left join master_process c on a.id_process=c.id_process ";
$sql.=" left join master_channel d on b.id_channel=d.id_channel ";
$sql.=" left join master_pic z on z.id_pic=b.id_pic ";
$sql.=" where a.ticket_number='$id' order by a.memo_date desc ";
$result=pg_query($connection,$sql);
while($row=pg_fetch_array($result))
{
$hasil=$i%2;
if ($hasil >= 1){
$color="warning";
} else {
$color="";
}







if (isset($row['file_memo']) && $row['file_memo'] != ""){
	$file_attachment="<a href='data/file-attach/$row[file_memo]'  download> <img src='images/file-icon.png' width='35'> </a> ";
} else {
	$file_attachment="-";
}

echo "<tr class='$color'>";
							echo "<td style='font-size:11px' ><i class='fa fa-calendar font-blue'></i><b class='font-red'> ".date('d-m-Y H:i',strtotime($row['memo_date']))." WIB </b></br>"."
							<i class='fa fa-user font-blue'></i> <b class='font-blue'> $row[nama_lengkap] - ( $row[nama_pic] )</b></td>";
							//echo "<td style='font-size:11px'><i>$row[nama_proses]</i></td>";
							echo "<td style='font-size:11px'><i>$row[keterangan]</i></td>";
							echo "<td style='font-size:11px' align='center'><i>$file_attachment</i></td>";
							
							echo "</tr>";
							$i++;

}
}


echo "</tbody>";
echo "</table>";



?>
</div>
								</div>
								
							
						</div>
					</div>

					