<?php
require_once '../../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id'];

echo "<table class='table table-bordered table-hover' id='sample_1' width='100%'>";
echo "<thead>
							
							    <th  width='30%'>
									 Date / User 
								</th>
								<th  width='60%'>
									Description
								</th>
								<th  width='10%'>
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
							echo "<td  ><i class='fa fa-calendar font-blue'></i><b class='font-red'> ".date('d-m-Y H:i',strtotime($row['memo_date']))." WIB </b></br>"."
							<i class='fa fa-user font-blue'></i> <b class='font-blue'> $row[nama_lengkap] - ( $row[nama_pic] )</b></td>";
							//echo "<td style='font-size:11px'><i>$row[nama_proses]</i></td>";
							echo "<td ><i>$row[keterangan]</i></td>";
							echo "<td  align='center'><i>$file_attachment</i></td>";
							
							echo "</tr>";
							$i++;

}
//}


echo "</tbody>";
echo "</table>";

}
?>