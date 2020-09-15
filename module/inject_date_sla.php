<?php
	require_once '../config/config.php';
	require_once '../function/function.php';
	require_once 'session_login.php';

	error_reporting(0);
    //require_once '../session_group.php';
//date_default_timezone_set("US/Pacific"); 


date_default_timezone_set("Asia/Jakarta");

/*$q_case=" select  sla,satuan from master_case where id_case='$idpermasalahan' ";
$rest_case=pg_query($connection,$q_case);
$r_case=pg_fetch_array($rest_case);

 $query_date=" select date_start,ticket_number from laporan_kerja where id_lapker='$id_lapker' ";
  $rest_date=pg_query($connection,$query_date);
  $row_date=pg_fetch_array($rest_date);

  $batas_sla1=date('Y-m-d',strtotime(dateSla(date('Y-m-d',strtotime($row_date['date_start'])),$r_case['sla'],$r_case['satuan'])));
  


      $date_b = date_create($batas_sla1,timezone_open("Asia/Jakarta"));
      $date2=date_add($date_b, date_interval_create_from_date_string("0 minutes"));
      $sys_date2 = date_format($date2, 'Y-m-d H:i:s');


      $date_c = date_create(date('Y-m-d',strtotime($tgl_transaksi)),timezone_open("Asia/Jakarta"));
      $date3=date_add($date_c, date_interval_create_from_date_string("0 minutes"));
      $sys_date3 = date_format($date3, 'Y-m-d H:i:s');

if (!isset($tgl_transaksi) || $tgl_transaksi=="" || $tgl_transaksi==NULL)
{$var_tgl_transaksi="";} else { $var_tgl_transaksi=" tgl_transaksi=date_trunc('second', TIMESTAMP '$sys_date3'), ";}

//echo $var_tgl_transaksi;
//die();


  $query=" update laporan_kerja set id_unit='$idunit',id_process='$idproses',id_case='$idpermasalahan',id_product='$idproduct',id_report='$idjenis_laporan',customer_name='$nama_nasabah',account_number='$no_rek',credit_card_number='$no_creditcard',phone='$no_tlp',sla='$r_case[sla]',nominal='$nominal',$var_tgl_transaksi keterangan='$keterangan',call_to_close='$call_to_close',id_cause_bi='$idpenyebab',email='$email',var_case='$idpermasalahan',date_sla=date_trunc('second', TIMESTAMP '$sys_date2'), atm_number='$atm_number' where id_lapker='$id_lapker' ";

//echo $query;
//die();

  $result=pg_query($connection,$query);
  $row=pg_fetch_array($result);
  */


#### ------------------------------------------------------------------------
$query = " select a.id_lapker,a.date_start,a.ticket_number,a.id_case,b.sla,b.satuan from laporan_kerja a  ";
$query.= " left join master_case b on a.id_case=b.id_case where a.id_lapker >='200372' and a.id_lapker <='200618'  ";

$i=1;
							$result=pg_query($connection,$query);
                            while ($row=pg_fetch_array($result)) {
                             
      $batas_sla1=date('Y-m-d',strtotime(dateSla(date('Y-m-d',strtotime($row['date_start'])),$row['sla'],$row['satuan'])));
      $date_b = date_create($batas_sla1,timezone_open("Asia/Jakarta"));
      $date2=date_add($date_b, date_interval_create_from_date_string("0 minutes"));
      $sys_date2 = date_format($date2, 'Y-m-d H:i:s');


      $query2= " update laporan_kerja set date_sla=date_trunc('second', TIMESTAMP '$sys_date2') where id_lapker='".$row['id_lapker']."' ";
      pg_query($connection,$query2);
       echo "$i). ".$row['id_lapker']." | ".$row['sla']." | ".date('Y-m-d',strtotime($row['date_start']))." | ".$sys_date2 ."<br>";
       echo $query2."<br>";
								$i++;
							
							}

?>
