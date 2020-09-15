
<?php
require_once '../config/config.php';
//include('db.php');


echo "<table class='table table-striped table-bordered table-hover' id='sample_1' width='100%'>";
echo "<thead>
							<tr bgcolor='#D0D0D0'>
							    <th style='font-size:11px'>
									 No
								</th>
								<th style='font-size:11px'>
									 Id Karyawan /
									 Nama Karyawan
								</th>
								<th  style='font-size:11px'>
									 Nama Proses
								</th>
								<th style='font-size:11px'>
									 Keterangan
								</th>
								<th style='font-size:11px'>
									 Time Action
								</th>

							</tr>
							</thead>
							<tbody> ";

if($_POST['id'])
{
$id=$_POST['id'];
//$act=$_POST['jenis'];

//select * from master_ver_aplikasi where id_merk_type

$i=1;
$sql =" select b.id_karyawan,b.nama_lengkap,c.name as nama_proses, a.keterangan,a.memo_date  from log_memo a  ";
$sql.=" left join user_account b on a.id_karyawan=b.id_karyawan ";
$sql.=" left join master_process c on a.id_process=c.id_process ";
$sql.=" where a.ticket_number='$id' order by a.memo_date desc ";
$result=pg_query($connection,$sql);
while($row=pg_fetch_array($result))
{

echo "<tr>";
							echo "<td style='font-size:11px'>$i</td>";
							echo "<td style='font-size:11px'><i class='fa fa-user font-blue'></i> <b>$row[id_karyawan]</b> -  <b>$row[nama_lengkap]</b></td>";
							echo "<td style='font-size:11px'><i>$row[nama_proses]</i></td>";
							echo "<td style='font-size:11px'><i>$row[keterangan]</i></td>";
							echo "<td style='font-size:11px'><i class='fa fa-calendar font-blue'> </i> ".date('d-m-Y H:i',strtotime($row['memo_date']))."</td>";
							echo "</tr>";
							$i++;

}
}


echo "</tbody>";
echo "</table>";
?>
