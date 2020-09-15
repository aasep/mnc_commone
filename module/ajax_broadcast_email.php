<?php
require_once '../config/config.php';
require_once '../function/function.php';
require_once 'session_login.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id'];
$status=$_POST['status'];

if (isset($status) && $status!='4'){


//select * from master_ver_aplikasi where id_merk_type
  $q_lapker =" select a.date_start,a.id_product,a.id_unit,a.id_process,a.id_case,a.ticket_number,a.date_sla,a.sla,e.satuan,b.name as produk ,c.name as unit ,d.name as proses ,e.name as case, f.name as laporan,g.name as penyebab_bi,h.name as cabang,a.keterangan from laporan_kerja a ";
  $q_lapker.=" left join master_product b on a.id_product=b.id_product ";
  $q_lapker.=" left join master_unit c on a.id_unit=c.id_unit ";
  $q_lapker.=" left join master_process d on a.id_process=d.id_process ";
  $q_lapker.=" left join master_case e on a.id_case=e.id_case ";
  $q_lapker.=" left join master_report f on a.id_report=f.id_report ";
  $q_lapker.=" left join bi_cause g on a.id_cause_bi=g.id_cause_bi ";
  $q_lapker.=" left join master_branch h on a.id_cabang=h.id_cabang ";
  $q_lapker.=" where a.ticket_number='$id' ";
  $res_lapker=pg_query($connection,$q_lapker);
  $row_lapker=pg_fetch_array($res_lapker);

//echo $q_lapker;
//die ();

  $found=pg_num_rows($res_lapker);

  if ($found >=1 ) {
  //$batas_sla=dateSla($date_start,$row_lapker['sla'],$row_lapker['satuan']);


  $message =" <b>Information Request</b> <br><br>";
  $message.=" ######################################################################## <br><br>";
  $message.=" Request Ticket : <b>$row_lapker[ticket_number]</b> <br>";
  $message.=" Tgl Request : <b> ".date('d-m-Y',strtotime($row_lapker['date_start']))."</b> <br>";
  $message.=" SLA : <b>$row_lapker[sla] $row_lapker[satuan]</b> <br>";
  $message.=" Batas Akhir SLA : ".date('d-m-Y',strtotime($row_lapker['date_sla']))." <br>";
  $message.=" Cabang : $row_lapker[cabang] <br>";
  $message.=" Produk : $row_lapker[produk]<br>";
  $message.=" Unit : $row_lapker[unit]<br>";
  $message.=" Prosess : $row_lapker[proses]<br>";
  $message.=" Permasalahan : $row_lapker[case]<br>";
  $message.=" Penyebab Masalah BI : $row_lapker[penyebab_bi]<br>";
  $message.=" Keterangan : $row_lapker[keterangan]<br>";
  $message.=" <br><br>"; 
  $message.=" Untuk Login Klik Link Berikut : <a href='http://10.5.68.104:8012/commone/login'> http://10.5.68.104:8012/commone/login</a><br>";
  $message.=" <br><br><br><br>"; 
  $message.=" ----------------------------------------------------------------------- <br>";
  $message.=" PT. Bank MNC Internasional, Tbk <br>";
  $message.=" <b><i>Admin Commone System</i></b> <br>";
  $message.=" <i>Email : commone@mncbank.co.id </i> <br>";

  broadcastMail("Create Inquiry [commone]",$message,$_SESSION['SESS_EMAIL'],$row_lapker['id_product'],$row_lapker['id_unit'],$row_lapker['id_process'],$row_lapker['id_case']);

  echo "<div class='alert alert-success' align='center'> <strong> Create Inquiry Successfull ...... ! </strong></div>";

} else {
  echo "<div class='alert alert-danger' align='center'> <strong> Failed Inquiry ...... ! </strong></div>";

}





} else {

  echo "<div class='alert alert-success' align='center'> <strong> Create Inquiry Pending Successfull ...... ! </strong></div>";
}








}
?>