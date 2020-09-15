<?php
	require_once '../config/config.php';
	require_once '../function/function.php';
	require_once 'session_login.php';

	error_reporting(0);
    //require_once '../session_group.php';
//date_default_timezone_set("US/Pacific"); 
date_default_timezone_set("Asia/Jakarta");
#################################### add user #################################################################################################
if (($_GET['module'])==sha1('2') && ($_GET['act']=='add_user')){
$username=strtolower($_POST['username']);
$password=hashEncrypted($_POST['password']);
$status_account=$_POST['status_account'];
$group_user=$_POST['group_user'];

$id_cabang=$_POST['cabang'];
$id_unit=$_POST['unit'];
$id_jabatan=$_POST['jabatan'];
$id_channel=$_POST['channel'];

$nama_lengkap=$_POST['nama_lengkap'];
$email=$_POST['email'];
$tlp=$_POST['tlp'];
$id_pic=$_POST['pic'];

$query="insert into user_account (id_karyawan,id_cabang,id_jabatan,password,nama_lengkap,email,tlp,id_group_type,id_channel,id_pic,status_account,adddt,addby,id_unit) values ('$username','$id_cabang','$id_jabatan','$password','$nama_lengkap','$email','$tlp','$group_user','$id_channel','$id_pic','$status_account',CURRENT_TIMESTAMP,'".getUsername()."','$id_unit')";

//echo $query;
//die();
$result=pg_query($connection, $query);

	if ($result)
  		{
  			logActivity("add_user","username=$username;status_account=$status_account,group_user=$group_user,id_cabang=$id_cabang,id_jabatan=$id_jabatan,nama_lengkap=$nama_lengkap,email=$email,tlp=$telp,id_group_type=$group_user,id_channel=$id_channel,id_pic=$id_pic,addbyaddby=".getUsername());
  			$from='commone@mncbank.co.id';
        $subject=' Notifikasi Account User ';
        $message =" <b>Notifikasi Email User Aplikasi Commone System</b> <br>";
		    $message.=" ############################################################################ <br><br>";
        $message.=" Selamat Anda telah berhasil membuat Akun Baru dengan identitas sbb: <br>";
        $message.=" Username : <b>$username</b> <br>"; 
        $message.=" Password : $_POST[password] <br>"; 
		    $message.=" PIC : ".getNamaPic2($id_pic)." <br>"; 
        $message.=" <br><br><br><br>"; 
		    $message.=" Untuk Login Klik Link Berikut : <a href='http://10.5.68.104:8012/commone/login'> http://10.5.68.104:8012/commone/login</a><br>";
        $message.=" </i> *catatan: anda bisa mengganti password anda sewaktu-waktu </i><br><br>";
        $message.=" <br><br><br><br>"; 
        $message.=" ---------------------------------- <br>";
		    $message.=" PT. Bank MNC Internasional, Tbk <br>";
		    $message.=" <b>Admin Commone System</b> <br>";
		    $message.=" <i>Email : commone@mncbank.co.id </i> <br>";
        
        $headers = 'From: '.$from. "\r\n" .
              'Reply-To: '.$from . "\r\n" .
              'X-Mailer: PHP/' . phpversion(). "\r\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail($email, $subject, $message, $headers);
        header("location: ../home?module=$_GET[module]&message=success");
  	} else  {
  			header("location: ../home?module=$_GET[module]&message=error");

  		}

}
################################################## edit user #########################################################################################
if (($_GET['module'])==sha1('2') && ($_GET['act']=='edit_user')){

$ed_username2=strtolower($_POST['ed_username2']);
$ed_status_account=$_POST['ed_status_account'];
$ed_group_user=$_POST['ed_group_user'];
$ed_cabang=$_POST['ed_cabang'];
$ed_unit=$_POST['ed_unit'];
$ed_jabatan=$_POST['ed_jabatan'];
$ed_channel=$_POST['ed_channel'];
$ed_nama_lengkap=$_POST['ed_nama_lengkap'];
$ed_email=$_POST['ed_email'];
$ed_tlp=$_POST['ed_tlp'];
$ed_pic=$_POST['ed_pic'];

$ed_password=$_POST['ed_password'];
if (isset($ed_password) && $ed_password!="" ){
  $password=hashEncrypted($ed_password);
  $var_password=" ,password='$password' ";
  $flag_pass=1;
} else {
  $var_password=" ";
  $flag_pass=0;

}


$status_account=$_POST['status_account'];
$group_user=$_POST['group_user'];

$query =" update user_account set  id_cabang='$ed_cabang',id_jabatan='$ed_jabatan',nama_lengkap='$ed_nama_lengkap' ,email='$ed_email',tlp='$ed_tlp',id_group_type='$ed_group_user',";
$query.=" id_channel='$ed_channel',id_pic='$ed_pic',status_account='$ed_status_account',id_unit='$ed_unit' $var_password where  id_karyawan='$ed_username2' ";
//echo $query;
//die();

$result=pg_query($connection, $query);
	if ($result )
  		{

        if ($flag_pass=='1'){


            $from='commone@mncbank.co.id';
            $subject=' Notifikasi Update Password ';
            $message =" <b>Notifikasi Update Password User Aplikasi Commone System</b> <br>";
            $message.=" ############################################################################ <br><br>";
            $message.=" Selamat Anda telah berhasil mengupdate password dg identitas sbb: <br>";
            $message.=" Username : <b>$ed_username2</b> <br>"; 
            $message.=" Password : $_POST[ed_password] <br>"; 
            $message.=" PIC : ".getNamaPic2($ed_pic)." <br>"; 
            $message.=" <br><br><br><br>"; 
            $message.=" Untuk Login Klik Link Berikut : <a href='http://10.5.68.104:8012/commone/login'> Login </a><br>";
            $message.=" </i> *catatan: anda bisa mengganti password anda sewaktu-waktu </i><br><br>";
            $message.=" <br><br><br><br>"; 
            $message.=" ---------------------------------- <br>";
            $message.=" PT. Bank MNC Internasional, Tbk <br>";
            $message.=" <b>Admin Commone System</b> <br>";
            $message.=" <i>Email : commone@mncbank.co.id </i> <br>";
            
            $headers = 'From: '.$from. "\r\n" .
                  'Reply-To: '.$from . "\r\n" .
                  'X-Mailer: PHP/' . phpversion(). "\r\n";
            $headers .= 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            mail($ed_email, $subject, $message, $headers);
        }



  			logActivity("edit_user","id_cabang=$ed_cabang,id_jabatan=$ed_jabatan,nama_lengkap=$ed_nama_lengkap ,email=$ed_email,tlp=$ed_tlp,id_group_type=$ed_group_user,id_channel=$ed_channel,id_pic=$ed_pic,status_account=$ed_status_account,id_unit=$ed_unit $var_password ");
  			header("location: ../home?module=$_GET[module]&message=success3");

  	} else  {
  			header("location: ../home?module=$_GET[module]&message=error3");

  		}


}
###################################################### delete user ###############################################################################
if (($_GET['module'])==sha1('2') && ($_GET['act']=='delete_user')){

$id_user=strtolower($_POST['id_user']);
$query="delete from user_account where id_karyawan='$id_user'";
$result=pg_query($connection, $query);

if ($result)
  		{ 
  			logActivity("delete_user","username=$id_user");
  			header("location: ../home?module=$_GET[module]&message=success2");
  	} else  {
  			header("location: ../home?module=$_GET[module]&message=error2");

  		}



}
####################################################### add group user #########################################################################
if (($_GET['module'])==sha1('3') && ($_GET['act']=='add_group_user')){
$nama_group=$_POST['nama_group'];
$inisial=$_POST['inisial'];

$query="insert into group_type (name,inisial) values ('$nama_group','$inisial')";
$result=pg_query($connection, $query);

//echo $query;
//die();

	if ($result)
  		{
  			logActivity("add_group_user","nama_group=$nama_group,inisial=$inisial");
  			header("location: ../home?module=$_GET[module]&message=success");
  	} else  {
  			header("location: ../home?module=$_GET[module]&message=error");

  		}
}
####################################################### edit group menu #########################################################################
if (($_GET['module'])==sha1('3') && ($_GET['act']=='edit_group_user')){
$id_group=$_POST['id_group'];
$nama_group=$_POST['ed_nama_group'];
$inisial=$_POST['ed_inisial'];

$query="update group_type set name='$nama_group',inisial='$inisial' where id_group_type='$id_group'";
$result=pg_query($connection, $query);

	if ($result)
  		{
  			logActivity("edit_group_user","nama_group=$nama_group,inisial=$inisial,id_group=$id_group");
  			header("location: ../home?module=$_GET[module]&message=success3");
  	} else  {
  			header("location: ../home?module=$_GET[module]&message=error3");
  		}



}
####################################################### delete group menu ######################################################################
//===========================
if (($_GET['module'])==sha1('3') && ($_GET['act']=='delete_group_user')){


$id_group=$_POST['id_group'];
$query="delete from group_type where id_group_type='$id_group'";
$result=pg_query($connection, $query);
//echo $query;
//die();


if ($result)
  		{
  			logActivity("delete_group_user","id_group=$id_group");
  			header("location: ../home?module=$_GET[module]&message=success2");
  	} else  {
  			header("location: ../home?module=$_GET[module]&message=error2");

  		}


}
####################################################### add menu ######################################################################
//===========================
if (($_GET['module'])==sha1('4') && ($_GET['act']=='add_menu')){

$nama_menu=$_POST['nama_menu'];
$parent=$_POST['parent'];

$query="insert into master_menu (name,parent) values ('$nama_menu','$parent') returning id_menu";

//echo $query;
//die();

$result=pg_query($connection, $query);
$row=pg_fetch_array($result);

$query2="select * from master_menu where id_menu='$row[id_menu]' ";
$result2=pg_query($connection, $query2);
while ($row2 = pg_fetch_array($result2))

{
$id_menu=$row2['id_menu'];
$id_menu_encrypt=sha1($row2['id_menu']);
$parent=$row2['parent'];
}

if ($parent != 0) {
$query3="update master_menu set src='$id_menu_encrypt' where id_menu='$id_menu' ";
$result3=pg_query($connection, $query3);
}

//echo $query2."<br>". $query3."<br>".$id_menu;
//die();
	if ($result)
  		{
  			logActivity("add_menu","nama_menu=$nama_menu,parent=$parent");
  			header("location: ../home?module=$_GET[module]&message=success");
  	} else  {
  			header("location: ../home?module=$_GET[module]&message=error");

  		}


}
####################################################### edit menu ######################################################################
//===========================
if (($_GET['module'])==sha1('4') && ($_GET['act']=='edit_menu')){


$id_menu=$_POST['id_menu'];
$parent=$_POST['parent'];
$nama_menu=$_POST['nama_menu'];


$query="update master_menu set   name='$nama_menu',parent='$parent' where  id_menu='$id_menu'";
$result=pg_query($connection, $query);

	if ($result)
  		{
  			logActivity("edit_menu","nama_menu=$nama_menu,parent=$parent,id_menu=$id_menu");
  			header("location: ../home?module=$_GET[module]&message=success3");
  	} else  {
  			header("location: ../home?module=$_GET[module]&message=error3");

  		}


}
####################################################### delete menu ######################################################################
//===========================
if (($_GET['module'])==sha1('4') && ($_GET['act']=='delete_menu')){
$id_menu=$_POST['id_menu'];
$query="delete from master_menu where id_menu='$id_menu'";
$result=pg_query($connection, $query);

if ($result)
  		{	logActivity("delete_menu","id_menu=$id_menu");
  			header("location: ../home?module=$_GET[module]&message=success2");
  	} else  {
  			header("location: ../home?module=$_GET[module]&message=error2");

  		}


}
####################################################### Ganti Password ######################################################################
//===========================
if (($_GET['module'])==sha1('17') && ($_GET['act']=='change-pass')){
	
$username=$_POST['username'];

$password=hashEncrypted($_POST['password']);

$query="update user_account set   password='$password' where  id_karyawan='$username'";
$result=pg_query($connection, $query);

	if ($result)
  		{
  			logActivity("change-pass","username=$username");
  			header("location: ../home?module=$_GET[module]&message=success");
  	} else  {
  			header("location: ../home?module=$_GET[module]&message=error");

  		}


}
####################################################### Create laporan ######################################################################
//==========================
if (($_GET['module'])==sha1('19') && ($_GET['act']=='create_laporan')){
#variabel  data Nasabah


$nama_nasabah=$_POST['nama_nasabah'];
$no_tlp=$_POST['no_tlp'];
$no_creditcard=$_POST['no_creditcard'];
$no_rek=$_POST['no_rek'];
$email=$_POST['email'];
$is_mandatory=$_POST['is_mandatory'];
$atm_number=$_POST['atm_number'];



#variabel  Jenis Laporan
$idproduct=$_POST['idproduct'];
$idunit=$_POST['idunit'];
$idproses=$_POST['idproses'];
$idpermasalahan=$_POST['idpermasalahan'];
$q_case=" select  sla,satuan from master_case where id_case='$idpermasalahan' ";
$rest_case=pg_query($connection,$q_case);
$r_case=pg_fetch_array($rest_case);

$idpenyebab=$_POST['idpenyebab'];
$idjenis_laporan=$_POST['idjenis_laporan']; 

#variabel Keterangan tambahan
$keterangan=$_POST['keterangan'];
$call_to_close=$_POST['call_to_close'];
if (!isset($call_to_close) ||$call_to_close=="")
{ $call_to_close='0';} else { $call_to_close="$_POST[call_to_close]";}

$nominal=$_POST['nominal'];

if (!isset($nominal) ||$nominal=="")
{ $nominal='0';} else { $nominal="$_POST[nominal]";}

$tgl_transaksi=$_POST['tanggal'];

if (!isset($tgl_transaksi) || $tgl_transaksi=="")
{$tgl_transaksi='NULL';} else { $tgl_transaksi="'$_POST[tanggal]'";}

##
$id_karyawan=getUsername();
$id_cabang=getIdCabang();

//$id_channel=getIdChannel();
$id_channel=$_POST['idChannel'];
//$id_report=
date_default_timezone_set("Asia/Jakarta");

if ((($_FILES['file_attach']['name'] =="") || ($_FILES['file_attach']['name'] == NULL)) && ($is_mandatory=='1')) {
$status='4';
} else {
$status='1';  
}



$date_start=date('Y-m-d H:i');
$call_to_ask='0';
//$call_to_close='0';
//$sla=date('Y-m-d H:i');
//$extend_sla=date('Y-m-d H:i');
//$date_finish=date('Y-m-d H:i');

$batas_sla1=date('Y-m-d',strtotime(dateSla($date_start,$r_case['sla'],$r_case['satuan'])));
//dateSla($start_date,$jml_intval,$satuan);


  $query_sec_numticket=" select nextval('seq_numticket') as sec_numticket ";
  $rest_seq=pg_query($connection,$query_sec_numticket);
  $id_sec_numticket=pg_fetch_array($rest_seq);
  $ticket_number=date('Ymd').$id_sec_numticket['sec_numticket'];
  $found_same_ticket=cekSameInquiry($id_karyawan,$nama_nasabah,$idpermasalahan,$keterangan);
  $found_ticket=cekTicket($ticket_number);
  if($found_ticket >=1 || $found_same_ticket >=1 ){
	header("location: ../home?module=$_GET[module]&message=error"); 
		die();
  }else {
  $query=" insert into laporan_kerja (ticket_number,id_unit,id_process,id_case,id_product,id_karyawan,id_cabang,id_channel,id_report,customer_name,account_number,credit_card_number,phone,sla,extend_sla,nominal,tgl_transaksi,status,date_start,keterangan,call_to_ask,call_to_close,id_cause_bi,email,var_case,date_sla,atm_number) values ('$ticket_number','$idunit','$idproses','$idpermasalahan','$idproduct','$id_karyawan','$id_cabang','$id_channel','$idjenis_laporan','$nama_nasabah','$no_rek','$no_creditcard','$no_tlp','$r_case[sla]','0','$nominal',$tgl_transaksi,'$status','$date_start','$keterangan','$call_to_ask','$call_to_close','$idpenyebab','$email','$idpermasalahan','$batas_sla1','$atm_number') returning id_lapker ";
  }
//echo $query;
//die();

  $result=pg_query($connection,$query);
  $row=pg_fetch_array($result);
  $id_lapker=$row['id_lapker'];
  

if (isset($id_lapker) &&  $id_lapker <> "" && $id_lapker <> NULL)
      {
  
  $q_lapker =" select a.status,a.date_sla,a.sla,e.satuan,b.name as produk ,c.name as unit ,d.name as proses ,e.name as case, f.name as laporan,g.name as penyebab_bi,h.name as cabang,a.keterangan from laporan_kerja a ";
  $q_lapker.=" left join master_product b on a.id_product=b.id_product ";
  $q_lapker.=" left join master_unit c on a.id_unit=c.id_unit ";
  $q_lapker.=" left join master_process d on a.id_process=d.id_process ";
  $q_lapker.=" left join master_case e on a.id_case=e.id_case ";
  $q_lapker.=" left join master_report f on a.id_report=f.id_report ";
  $q_lapker.=" left join bi_cause g on a.id_cause_bi=g.id_cause_bi ";
  $q_lapker.=" left join master_branch h on a.id_cabang=h.id_cabang ";
  $q_lapker.=" where a.id_lapker='$id_lapker' ";
  $res_lapker=pg_query($connection,$q_lapker);
  $row_lapker=pg_fetch_array($res_lapker);

  $batas_sla=dateSla($date_start,$row_lapker['sla'],$row_lapker['satuan']);

  if ($row_lapker['status']=='4'){
	  $status_laporan=" PENDING ";
	  $query_memo  =" insert into log_memo (ticket_number,memo_date,id_karyawan,keterangan,id_process )  ";
	  $query_memo .=" values ('$ticket_number', CURRENT_TIMESTAMP,'".getUsername()."','CREATE LAPORAN PENDING : $keterangan','$idproses') returning id_memo ";
  } else {
	  $status_laporan=" ";
	  //logMemo($ticket_number,$idproses,"Create Laporan");
	  $query_memo  =" insert into log_memo (ticket_number,memo_date,id_karyawan,keterangan,id_process )  ";
	  $query_memo .=" values ('$ticket_number', CURRENT_TIMESTAMP,'".getUsername()."','CREATE LAPORAN : $keterangan','$idproses') returning id_memo ";
	  
	      $message =" <b>Information Request</b> <br><br>";
		  $message.=" ################################################################# <br><br>";
		  $message.=" Request Ticket : <b>$ticket_number</b> <br>";
		  $message.=" Tgl Request : <b> $date_start</b> <br>";
		  $message.=" SLA : <b>$row_lapker[sla] $row_lapker[satuan]</b> <br>";
		  $message.=" Batas Akhir SLA : $batas_sla <br>";
		  $message.=" Cabang : $row_lapker[cabang] <br>";
		  $message.=" Produk : $row_lapker[produk]<br>";
		  $message.=" Unit : $row_lapker[unit]<br>";
		  $message.=" Prosess : $row_lapker[proses]<br>";
		  $message.=" Permasalahan : $row_lapker[case]<br>";
		  $message.=" Penyebab Masalah BI : $row_lapker[penyebab_bi]<br>";
		  $message.=" Keterangan : $row_lapker[keterangan]<br>";
		  $message.=" <br><br><br><br>"; 
		  $message.=" ------------------------------- <br>";
		  $message.=" PT. Bank MNC Internasional, Tbk <br>";
		  $message.=" <i>Commone System</i> <br>";
		  $message.=" <i>www.mncbank.co.id</i><br>";
		  broadcastMail("Create Laporan",$message,$_SESSION['SESS_EMAIL'],$idpermasalahan);
    }

  $result_memo=pg_query($connection, $query_memo);
  $row_memo=pg_fetch_array($result_memo);
  $file_output="$row_memo[id_memo]";

  ######-----COPY LAMPIRAN---########
  if(isset($_FILES['file_attach']['tmp_name']) && $_FILES['file_attach']['tmp_name']!="" && $_FILES['file_attach']['tmp_name']!=NULL) {
  //if($_FILES['file_attach']['tmp_name']!="" && $_FILES['file_attach']['tmp_name']!=NULL ) {
  $image_temp=$_FILES['file_attach']['tmp_name'];
  $nama=$_FILES['file_attach']['name'];
  $type=$_FILES['file_attach']['type'];
  $ext = pathinfo($nama, PATHINFO_EXTENSION);

  $query_up_memo=" update  log_memo  set file_memo='$file_output.$ext' where  id_memo='$file_output' ";
  $result_up_memo=pg_query($connection, $query_up_memo);

         $directory="../data/file-attach/".$file_output.".$ext";
         copy($image_temp,$directory);
  }
  ######-----END COPY LAMPIRAN---########
  

  
        logActivity("create_laporan $status_laporan ","id_lapker=$id_lapker, menu=19");
	
        header("location: ../home?module=$_GET[module]&message=success&idx=$id_lapker&stat=$status");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }

}


####################################################### Edit laporan ######################################################################
//==========================
if (($_GET['module'])==sha1('19') && ($_GET['act']=='edit_laporan')){
#variabel  data Nasabah
$id_lapker=$_GET['id_lapker'];

$nama_nasabah=$_POST['nama_nasabah'];
$no_tlp=$_POST['no_tlp'];
$no_creditcard=$_POST['no_creditcard'];
$no_rek=$_POST['no_rek'];
$email=$_POST['email'];
$atm_number=$_POST['atm_number'];
#variabel  Jenis Laporan
$idproduct=$_POST['idproduct'];
$idunit=$_POST['idunit'];
$idproses=$_POST['idproses'];
$idpermasalahan=$_POST['idpermasalahan'];
$q_case=" select  sla,satuan from master_case where id_case='$idpermasalahan' ";
$rest_case=pg_query($connection,$q_case);
$r_case=pg_fetch_array($rest_case);

$idpenyebab=$_POST['idpenyebab'];
$idjenis_laporan=$_POST['idjenis_laporan']; 

#variabel Keterangan tambahan
$keterangan=$_POST['keterangan'];
$call_to_close=$_POST['call_to_close'];
if (!isset($_POST['call_to_close']) || $_POST['call_to_close']=="" || $_POST['call_to_close']==NULL)
{ $call_to_close='0';} else { $call_to_close="$_POST[call_to_close]";}

$nominal=$_POST['nominal'];

if (!isset($nominal) ||$nominal=="")
{ $nominal='0';} else { $nominal="$_POST[nominal]";}

$tgl_transaksi=$_POST['tanggal'];
/*
if (!isset($tgl_transaksi) || $tgl_transaksi=="")
{$tgl_transaksi=NULL;} else { $tgl_transaksi="$_POST[tanggal]";}
*/
##
$id_karyawan=getUsername();
$id_cabang=getIdCabang();
$id_channel=getIdChannel();
//$id_report=

$status='1';
$date_start=date('Y-m-d H:i');
$call_to_ask='0';
//$call_to_close='0';
//$sla=date('Y-m-d H:i');
//$extend_sla=date('Y-m-d H:i');
//$date_finish=date('Y-m-d H:i');




//dateSla($start_date,$jml_intval,$satuan);




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
  
  

if ($result)
      {
  //logMemo($row_date['ticket_number'],$idproses,"EDIT LAPORAN : ".$keterangan);
  $query_memo  =" insert into log_memo (ticket_number,memo_date,id_karyawan,keterangan,id_process )  ";
  $query_memo .=" values ('$row_date[ticket_number]', CURRENT_TIMESTAMP,'".getUsername()."','EDIT LAPORAN : $keterangan','$idproses') returning id_memo ";

  $result_memo=pg_query($connection, $query_memo);
  $row_memo=pg_fetch_array($result_memo);
  $file_output="$row_memo[id_memo]";

  ######-----COPY LAMPIRAN---########
  if(isset($_FILES['file_attach']['tmp_name']) && $_FILES['file_attach']['tmp_name']!="" && $_FILES['file_attach']['tmp_name']!=NULL) {
  //if(is_uploaded_file($_FILES['file_attach']['tmp_name'])) {

  $image_temp=$_FILES['file_attach']['tmp_name'];
  $nama=$_FILES['file_attach']['name'];
  $type=$_FILES['file_attach']['type'];
  $ext = pathinfo($nama, PATHINFO_EXTENSION);

  $query_up_memo=" update  log_memo  set file_memo='$file_output.$ext' where  id_memo='$file_output' ";
  $result_up_memo=pg_query($connection, $query_up_memo);


         $directory="../data/file-attach/".$file_output.".$ext";
         copy($image_temp,$directory);
  }
  ######-----END COPY LAMPIRAN---########


  logActivity("edit_laporan","id_lapker=$id_lapker,id_unit=$idunit,id_process=$idproses,id_case=$idpermasalahan,id_product=$idproduct,id_report=$idjenis_laporan,customer_name=$nama_nasabah,account_number=$no_rek,credit_card_number=$no_creditcard,phone=$no_tlp,atm_number=$atm_number,sla=$r_case[sla],nominal=$nominal,tgl_transaksi=$tgl_transaksi,keterangan=$keterangan,call_to_close='$call_to_close,id_cause_bi=$idpenyebab,email=$email,var_case=$idpermasalahan,date_sla=$batas_sla1");

        header("location: ../home?module=$_GET[module]&message=success&idx=$id_lapker&act=edit");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error&act=edit");

      }

}

####################################################### CONFIRM LAPORAN SELESAI ######################################################################
//===========================  utama
if (isset($_GET['module']) && ($_GET['act']=='confirm_done')){

if (isset($_POST['id_lapker'])) $id_lapker=$_POST['id_lapker'];
$keterangan=$_POST['ket_finish'];
$ticket_number=$_POST['conf_ticket_number'];
$id_process=$_POST['conf_id_process'];


$query=" update laporan_kerja set status='3', date_finish=CURRENT_TIMESTAMP where ticket_number='$ticket_number' ";

//echo $query;
//die();

$result=pg_query($connection, $query);


logMemo($ticket_number,$id_process,"CLOSE : ".$keterangan);
//echo $query;
//die();

  if ($result)
      {
        logActivity("Done","id_lapker=$id_lapker,ticket_number=$ticket_number, keterangan=$keterangan");
         header("location: ../home?module=$_GET[module]&message=successzx&idxzx=$id_lapker");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }


}

//===========================  kedua===

if (isset($_GET['module']) && ($_GET['act']=='confirm_done_dlaporan')){

if (isset($_POST['id_lapker'])) $id_lapker=$_POST['id_lapker'];
$keterangan=$_POST['ket_finish'];
$ticket_number=$_POST['conf_ticket_number'];
$id_process=$_POST['conf_id_process'];


$query=" update laporan_kerja set status='3', date_finish=CURRENT_TIMESTAMP where ticket_number='$ticket_number' ";

//echo $query;
//die();

$result=pg_query($connection, $query);


logMemo($ticket_number,$id_process,"CLOSE : ".$keterangan);
//echo $query;
//die();

  if ($result)
      {
        logActivity("Done","id_lapker=$id_lapker,ticket_number=$ticket_number, keterangan=$keterangan");
         header("location: ../home?module=$_GET[module]&message=success&idx=$id_lapker");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }


}


####################################################### FORWARD KASUS LAPORAN  ######################################################################
//===========================
if (isset($_GET['module']) && ($_GET['act']=='fwd-case')){

$keterangan=$_POST['ket_finish'];
$ticket_number=$_POST['fwd_ticket_number'];
$id_process=$_POST['fwd_id_process'];
$idpermasalahan=$_POST['idpermasalahan'];
$q_cek_case=" select name from master_case where id_case='$idpermasalahan' ";
$res_cek_case=pg_query($connection, $q_cek_case);
$row_case=pg_fetch_array($res_cek_case);

$query=" update laporan_kerja set var_case='$idpermasalahan' where ticket_number='$ticket_number' ";

//echo $query;
//die();

$result=pg_query($connection, $query);


logMemo($ticket_number,$id_process,"FORWARD CASE TO  : <b>$row_case[name]</b> ".$keterangan);
//echo $query;
//die();

  if ($result)

      {

        //konfirmasi email

  $q_lapker =" select a.status,a.date_start,a.extend_sla,a.date_sla,a.sla,e.satuan,b.name as produk ,c.name as unit ,d.name as proses ,e.name as case, f.name as laporan,g.name as penyebab_bi,h.name as cabang,a.keterangan from laporan_kerja a ";
  $q_lapker.=" left join master_product b on a.id_product=b.id_product ";
  $q_lapker.=" left join master_unit c on a.id_unit=c.id_unit ";
  $q_lapker.=" left join master_process d on a.id_process=d.id_process ";
  $q_lapker.=" left join master_case e on a.id_case=e.id_case ";
  $q_lapker.=" left join master_report f on a.id_report=f.id_report ";
  $q_lapker.=" left join bi_cause g on a.id_cause_bi=g.id_cause_bi ";
  $q_lapker.=" left join master_branch h on a.id_cabang=h.id_cabang ";
  $q_lapker.=" where a.ticket_number='$ticket_number' ";
  $res_lapker=pg_query($connection,$q_lapker);
  $row_lapker=pg_fetch_array($res_lapker);

  $jml_intval=$row_lapker['sla']+$row_lapker['extend_sla'];
  $batas_sla=dateSla($row_lapker['date_start'],$jml_intval,$row_lapker['satuan']);

  if ($row_lapker['status']=='1') {
  $q_update=" update laporan_kerja set status='2' where ticket_number='$ticket_number' ";
  $res_update=pg_query($connection,$q_update);
  logActivity("Update laporan_kerja","num_ticket=$ticket_number,status=2");
  }

  //$batas_sla=dateSla($date_start,$row_lapker['sla'],$row_lapker['satuan']);
  $message.="  <b> Confirmation Forward Case to  $row_case[name] </b> <br>";
  $message.="  Keterangan : <i>$keterangan</i><br>";
  $message.="  <br>";
  $message.="  <br>";
  $message.=" ------------------------------------------- Information Inquiry ----------------------------------------------------------- <br><br>";        
  $message.=" Request Ticket : <b>$ticket_number</b> <br>";
  $message.=" Tgl Request : <b>". date('d-m-Y',strtotime($row_lapker['date_start'])) ."</b> <br>";
  $message.=" SLA : <b>$row_lapker[sla] $row_lapker[satuan]</b> <br>";
  $message.=" Batas Akhir SLA : ".date('d-m-Y',strtotime($row_lapker['date_sla'])) ."<br>";
  $message.=" Cabang : $row_lapker[cabang] <br>";
  $message.=" Produk : $row_lapker[produk]<br>";
  $message.=" Unit : $row_lapker[unit]<br>";
  $message.=" Prosess : $row_lapker[proses]<br>";
  $message.=" Permasalahan : $row_lapker[case]<br>";
  $message.=" Penyebab Masalah BI : $row_lapker[penyebab_bi]<br>";
  $message.=" Keterangan : $row_lapker[keterangan]<br>";
  $message.=" <br><br><br><br>"; 
  $message.=" ----------------------------------------- <br>";
  $message.=" PT. Bank MNC Internasional, Tbk <br>";
  $message.=" <i>Commone System</i> <br>";
  $message.=" <i>www.mncbank.co.id</i><br>";
  broadcastMail2("Konfirmasi Forward Case",$message,$_SESSION['SESS_EMAIL'],$idpermasalahan);

        logActivity("Forward Case ","ticket_number=$ticket_number, keterangan=$keterangan");
         header("location: ../home?module=$_GET[module]&message=success_forward&act=src&srcby=1&srckey=$ticket_number&idx=$id_lapker");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error_forward&act=src&srcby=1&srckey=$ticket_number");

      }


}



####################################################### FORWARD KASUS LAPORAN ONLY TO PIC ######################################################################
//===========================
if (isset($_GET['module']) && ($_GET['act']=='fwd-case-pic')){

$keterangan=$_POST['ket_finish'];
$ticket_number=$_POST['fwd_ticket_number'];
$id_process=$_POST['fwd_id_process'];
$id_pic=$_POST['id_pic'];


$q_cek_case=" select name from master_pic where id_pic='$id_pic' ";
$res_cek_case=pg_query($connection, $q_cek_case);
$row_case=pg_fetch_array($res_cek_case);

$query=" update laporan_kerja set var_pic='$id_pic',status='2' where ticket_number='$ticket_number' ";
$result=pg_query($connection, $query);


logMemo($ticket_number,$id_process,"FORWARD CASE TO : ".strtoupper($row_case['name'])."<br>".$keterangan);

  if ($result)

      {
        logActivity("Forward Case ","ticket_number=$ticket_number, keterangan=$keterangan");
         header("location: ../home?module=$_GET[module]&message=success_forward&act=src&srcby=1&srckey=$ticket_number&idx=$id_lapker");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error_forward&act=src&srcby=1&srckey=$ticket_number");

      }


}

####################################################### CONFIRM FORWARD FROM PIC ######################################################################
//===========================
if (isset($_GET['module']) && ($_GET['act']=='confirm-forward')){

$keterangan=$_POST['ket_memo'];
$ticket_number=$_POST['num_ticket'];
$id_process=$_POST['id_process'];
$id_pic=$_POST['id_pic'];


$q_cek_case=" select name from master_pic where id_pic='$id_pic' ";
$res_cek_case=pg_query($connection, $q_cek_case);
$row_case=pg_fetch_array($res_cek_case);

$query=" update laporan_kerja set var_pic=NULL where ticket_number='$ticket_number' ";
$result=pg_query($connection, $query);


logMemo($ticket_number,$id_process,"CONFIRM FORWARD FROM PIC : ".strtoupper($row_case['name'])."<br>".$keterangan);

  if ($result)

      {
        logActivity("Confirm Forward Case ","ticket_number=$ticket_number, keterangan=$keterangan");
         header("location: ../home?module=$_GET[module]&message=success_forward");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error_forward");

      }


}


####################################################### Add Cabang ######################################################################
//===========================
if (($_GET['module'])==sha1('10') && ($_GET['act']=='add_cabang')){

$nama_cabang=$_POST['nama_cabang'];
$alamat=$_POST['alamat'];
$idkota=$_POST['kota'];

$query=" insert into master_branch (name,alamat,id_city,adddt,addby) values ('$nama_cabang','$alamat','$idkota',CURRENT_TIMESTAMP,'".getUsername()."') ";
$result=pg_query($connection, $query);

//echo $query;
//die();

  if ($result)
      {
        logActivity("Add Cabang","name=$nama_cabang, alamat=$alamat, id_city=$id_kota ");
        header("location: ../home?module=$_GET[module]&message=success");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }


}
####################################################### Edit Cabang ######################################################################
//===========================
if (($_GET['module'])==sha1('10') && ($_GET['act']=='edit_cabang')){
$id_cabang=$_POST['id_cabang'];
$ed_nama_cabang=$_POST['ed_nama_cabang'];
$ed_alamat=$_POST['ed_alamat'];
$id_kota=$_POST['ed_kota'];

$query=" update  master_branch set name='$ed_nama_cabang',alamat='$ed_alamat',id_city='$id_kota' where id_cabang='$id_cabang' ";
$result=pg_query($connection, $query);

if ($result)
      { logActivity("update_cabang","id_cabang=$id_cabang, nama=$ed_nama_cabang, alamat=$ed_alamat, id_city=$id_kota ");
        header("location: ../home?module=$_GET[module]&message=success3");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error3");

      }


}
####################################################### Delete Cabang ######################################################################
//===========================
if (($_GET['module'])==sha1('10') && ($_GET['act']=='delete_cabang')){


$id_cabang=$_POST['id_cabang'];
$query=" delete from master_branch where id_cabang='$id_cabang' ";
$result=pg_query($connection, $query);

if ($result)
      { logActivity("delete_cabang","id_cabang=$id_cabang");
        header("location: ../home?module=$_GET[module]&message=success2");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error2");

      }


}




####################################################### Add Case ######################################################################
//===========================
if (($_GET['module'])==sha1('14') && ($_GET['act']=='add_case')){

$casename=$_POST['casename'];
$sla=$_POST['sla'];
$satuan=$_POST['satuan'];
$prioritas=$_POST['prioritas'];
$biproduct=$_POST['biproduct'];
$bicase=$_POST['bicase'];
$stat_pmb=$_POST['stat_pmb'];
$is_mandatory=$_POST['is_mandatory'];

$query=" insert into master_case (name,sla,satuan,priority,id_productbi,id_causebi,adddt,addby,stat_pmb,flag_mandatory) values ('$casename','$sla','$satuan','$prioritas','$biproduct','$bicase',CURRENT_TIMESTAMP,'".getUsername()."','$stat_pmb','$is_mandatory') ";
$result=pg_query($connection, $query);

//echo $query;
//die();
  if ($result)
      {
        logActivity("Add Case","name=$casename, satuan=$satuan, sla=$sla, prioritas=$prioritas id_productbi=$biproduct,id_causebi=$bicase, stat_pmb=$stat_pmb, flag_mandatory=$is_mandatory ");
        header("location: ../home?module=$_GET[module]&message=success");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }


}
####################################################### Edit Case ######################################################################
//===========================
if (($_GET['module'])==sha1('14') && ($_GET['act']=='edit_case')){
$id_case=$_POST['id_case'];
$ed_nama=$_POST['ed_nama'];
$ed_sla=$_POST['ed_sla'];
$ed_satuan=$_POST['ed_satuan'];
$ed_prioritas=$_POST['ed_prioritas'];

$ed_bicase=$_POST['ed_bicase'];
$ed_biproduct=$_POST['ed_biproduct'];
$stat_pmb=$_POST['stat_pmb'];
$is_mandatory=$_POST['is_mandatory'];

$query="  update  master_case set stat_pmb='$stat_pmb',id_causebi='$ed_bicase',id_productbi='$ed_biproduct',name='$ed_nama',sla='$ed_sla', ";
$query.=" priority='$ed_prioritas',satuan='$ed_satuan',flag_mandatory='$is_mandatory' where id_case='$id_case' ";

//echo $query;
//die();
$result=pg_query($connection, $query);

if ($result)
      { logActivity("update_case","id_case=$id_case, nama=$ed_nama, sla=$ed_sla, priority=$ed_prioritas, satuan=ed_satuan id_productbi=$ed_biproduct,id_causebi=$ed_bicase,stat_pmb=$stat_pmb, flag_mandatory=$is_mandatory ");
        header("location: ../home?module=$_GET[module]&message=success3");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error3");

      }

}
####################################################### Delete Case ######################################################################
//===========================
if (($_GET['module'])==sha1('14') && ($_GET['act']=='delete_case')){


$id_case=$_POST['id_case'];
$query=" delete from master_case where id_case='$id_case' ";
$result=pg_query($connection, $query);

if ($result)
      { logActivity("delete_case","id_cabang=$id_case");
        header("location: ../home?module=$_GET[module]&message=success2");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error2");

      }


}

####################################################### Add Channel ######################################################################
//==========================
if (($_GET['module'])==sha1('7') && ($_GET['act']=='add_channel')){

$nama_channel=$_POST['nama_channel'];


$query=" insert into master_channel (name,adddt,addby) values ('$nama_channel',CURRENT_TIMESTAMP,'".getUsername()."') ";
$result=pg_query($connection, $query);
//echo $query;
//die();
//echo $query;
//die();

  if ($result)
      {
        logActivity("Add Channel","nama_channel=$nama_channel");
        header("location: ../home?module=$_GET[module]&message=success");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }


}
####################################################### Edit Channel ######################################################################
//========== =================
if (($_GET['module'])==sha1('7') && ($_GET['act']=='edit_channel')){
$id_channel=$_POST['id_channel'];
$ed_nama=$_POST['ed_nama'];

$query=" update  master_channel set name='$ed_nama' where id_channel='$id_channel' ";


//echo $query;
//die();
$result=pg_query($connection, $query);

if ($result)
      { logActivity("update_channel","id_channel=$id_channel, nama=$ed_nama");
        header("location: ../home?module=$_GET[module]&message=success3");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error3");

      }


}
####################################################### Delete Channel ######################################################################
//===========================
if (($_GET['module'])==sha1('7') && ($_GET['act']=='delete_channel')){


$id_channel=$_POST['id_channel'];
$query=" delete from master_channel where id_channel='$id_channel' ";
$result=pg_query($connection, $query);

if ($result)
      { logActivity("delete_channel","id_cabang=$id_case");
        header("location: ../home?module=$_GET[module]&message=success2");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error2");

      }


}
####################################################### Add Product ######################################################################
//==========================
if (($_GET['module'])==sha1('11') && ($_GET['act']=='add_product')){

$nama_produk=$_POST['nama_produk'];


$query=" insert into master_product (name,adddt,addby) values ('$nama_produk',CURRENT_TIMESTAMP,'".getUsername()."') ";
$result=pg_query($connection, $query);
//echo $query;
//die();
//echo $query;
//die();

  if ($result)
      {
        logActivity("Add Product","nama_product=$nama_produk");
        header("location: ../home?module=$_GET[module]&message=success");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }


}
####################################################### Edit Product ######################################################################
//========== =================
if (($_GET['module'])==sha1('11') && ($_GET['act']=='edit_product')){
$id_product=$_POST['id_product'];
$ed_nama=$_POST['ed_nama'];

$query=" update  master_product set name='$ed_nama' where id_product='$id_product' ";


//echo $query;
//die();
$result=pg_query($connection, $query);

if ($result)
      { logActivity("update_product","id_product=$id_product, nama=$ed_nama");
        header("location: ../home?module=$_GET[module]&message=success3");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error3");

      }


}
####################################################### Delete Product ######################################################################
//===========================
if (($_GET['module'])==sha1('11') && ($_GET['act']=='delete_product')){


$id_product=$_POST['id_product'];
$query=" delete from master_product where id_product='$id_product' ";
$result=pg_query($connection, $query);

if ($result)
      { logActivity("delete_product","id_product=$id_product");
        header("location: ../home?module=$_GET[module]&message=success2");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error2");

      }


}
####################################################### Add Unit ######################################################################
//==========================
if (($_GET['module'])==sha1('12') && ($_GET['act']=='add_unit')){

$nama_unit=$_POST['nama_unit'];


$query=" insert into master_unit (name,adddt,addby) values ('$nama_unit',CURRENT_TIMESTAMP,'".getUsername()."') ";
$result=pg_query($connection, $query);
//echo $query;
//die();
//echo $query;
//die();

  if ($result)
      {
        logActivity("Add Unit","nama_unit=$nama_unit");
        header("location: ../home?module=$_GET[module]&message=success");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }


}
####################################################### Edit Unit ######################################################################
//========== =================
if (($_GET['module'])==sha1('12') && ($_GET['act']=='edit_unit')){
$id_unit=$_POST['id_unit'];
$ed_nama=$_POST['ed_nama'];

$query=" update  master_unit set name='$ed_nama' where id_unit='$id_unit' ";


//echo $query;
//die();
$result=pg_query($connection, $query);

if ($result)
      { logActivity("update_unit","id_unit=$id_unit, nama=$ed_nama");
        header("location: ../home?module=$_GET[module]&message=success3");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error3");

      }


}
####################################################### Delete Unit ######################################################################
//===========================
if (($_GET['module'])==sha1('12') && ($_GET['act']=='delete_unit')){


$id_unit=$_POST['id_unit'];
$query=" delete from master_unit where id_unit='$id_unit' ";
$result=pg_query($connection, $query);

if ($result)
      { logActivity("delete_unit","id_unit=$id_unit");
        header("location: ../home?module=$_GET[module]&message=success2");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error2");

      }


}

####################################################### Add Process ######################################################################
//==========================
if (($_GET['module'])==sha1('13') && ($_GET['act']=='add_process')){

$nama_process=$_POST['nama_proses'];


$query=" insert into master_process (name,adddt,addby) values ('$nama_process',CURRENT_TIMESTAMP,'".getUsername()."') ";
$result=pg_query($connection, $query);
//echo $query;
//die();
//echo $query;
//die();

  if ($result)
      {
        logActivity("Add Process","nama_process=$nama_process");
        header("location: ../home?module=$_GET[module]&message=success");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }


}
####################################################### Edit Process ######################################################################
//========== =================
if (($_GET['module'])==sha1('13') && ($_GET['act']=='edit_process')){
$id_process=$_POST['id_process'];
$ed_nama=$_POST['ed_nama'];

$query=" update  master_process set name='$ed_nama' where id_process='$id_process' ";


//echo $query;
//die();
$result=pg_query($connection, $query);

if ($result)
      { logActivity("update_process","id_process=$id_process, nama=$ed_nama");
        header("location: ../home?module=$_GET[module]&message=success3");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error3");

      }


}
####################################################### Delete Process ######################################################################
//===========================
if (($_GET['module'])==sha1('13') && ($_GET['act']=='delete_process')){


$id_process=$_POST['id_process'];
$query=" delete from master_process where id_process='$id_process' ";
$result=pg_query($connection, $query);

if ($result)
      { logActivity("delete_process","id_process=$id_process");
        header("location: ../home?module=$_GET[module]&message=success2");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error2");

      }


}


####################################################### Add Kota ######################################################################
//==========================
if (($_GET['module'])==sha1('8') && ($_GET['act']=='add_city')){

$nama_kota=$_POST['nama_kota'];


$query=" insert into master_city (name,adddt,addby) values ('$nama_kota',CURRENT_TIMESTAMP,'".getUsername()."') ";
$result=pg_query($connection, $query);
//echo $query;
//die();
//echo $query;
//die();

  if ($result)
      {
        logActivity("Add Kota","nama_kota=$nama_kota");
        header("location: ../home?module=$_GET[module]&message=success");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }


}
####################################################### Edit Kota ######################################################################
//========== =================
if (($_GET['module'])==sha1('8') && ($_GET['act']=='edit_city')){
$id_city=$_POST['id_city'];
$ed_nama=$_POST['ed_nama'];

$query=" update  master_city set name='$ed_nama' where id_city='$id_city' ";


//echo $query;
//die();
$result=pg_query($connection, $query);

if ($result)
      { logActivity("update_city","id_city=$id_city, nama_kota=$ed_nama");
        header("location: ../home?module=$_GET[module]&message=success3");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error3");

      }


}
####################################################### Delete Kota ######################################################################
//===========================
if (($_GET['module'])==sha1('8') && ($_GET['act']=='delete_city')){


$id_city=$_POST['id_city'];
$query=" delete from master_city where id_city='$id_city' ";
$result=pg_query($connection, $query);

if ($result)
      { logActivity("delete_city","id_city=$id_city");
        header("location: ../home?module=$_GET[module]&message=success2");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error2");

      }


}
####################################################### Add Laporan ######################################################################
//==========================
if (($_GET['module'])==sha1('21') && ($_GET['act']=='add_report')){

$nama_laporan=$_POST['nama_laporan'];


$query=" insert into master_report (name,adddt,addby) values ('$nama_laporan',CURRENT_TIMESTAMP,'".getUsername()."') ";
$result=pg_query($connection, $query);


  if ($result)
      {
        logActivity("Add Laporan","nama_laporan=$nama_laporan");
        header("location: ../home?module=$_GET[module]&message=success");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }


}
####################################################### Edit Laporan ######################################################################
//========== =================
if (($_GET['module'])==sha1('21') && ($_GET['act']=='edit_report')){
$id_report=$_POST['id_report'];
$ed_nama=$_POST['ed_nama'];

$query=" update  master_report set name='$ed_nama' where id_report='$id_report' ";


$result=pg_query($connection, $query);

if ($result)
      { logActivity("update_report","id_report=$id_report, nama_laporan=$ed_nama");
        header("location: ../home?module=$_GET[module]&message=success3");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error3");

      }


}
####################################################### Delete Laporan ######################################################################
//===========================
if (($_GET['module'])==sha1('21') && ($_GET['act']=='delete_report')){


$id_report=$_POST['id_report'];
$query=" delete from master_report where id_report='$id_report' ";
$result=pg_query($connection, $query);

if ($result)
      { logActivity("delete_report","id_report=$id_report");
        header("location: ../home?module=$_GET[module]&message=success2");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error2");

      }


}


####################################################### Add Jabatan ######################################################################
//==========================
if (($_GET['module'])==sha1('9') && ($_GET['act']=='add_jabatan')){

$nama_jabatan=$_POST['nama_jabatan'];


$query=" insert into master_jabatan (name,adddt,addby) values ('$nama_jabatan',CURRENT_TIMESTAMP,'".getUsername()."') ";
$result=pg_query($connection, $query);


  if ($result)
      {
        logActivity("Add jabatan","nama_jabatan=$nama_jabatan");
        header("location: ../home?module=$_GET[module]&message=success");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }


}
####################################################### Edit Jabatan ######################################################################
//========== =================
if (($_GET['module'])==sha1('9') && ($_GET['act']=='edit_jabatan')){
$id_jabatan=$_POST['id_jabatan'];
$ed_nama=$_POST['ed_nama'];

$query=" update  master_jabatan set name='$ed_nama' where id_jabatan='$id_jabatan' ";

$result=pg_query($connection, $query);

if ($result)
      { logActivity("update_jabatan","id_jabatan=$id_jabatan, nama_jabatan=$ed_nama");
        header("location: ../home?module=$_GET[module]&message=success3");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error3");

      }


}
####################################################### Delete jabatan ######################################################################
//===========================
if (($_GET['module'])==sha1('9') && ($_GET['act']=='delete_jabatan')){


$id_jabatan=$_POST['id_jabatan'];
$query=" delete from master_jabatan where id_jabatan='$id_jabatan' ";
$result=pg_query($connection, $query);

if ($result)
      { logActivity("delete_jabatan","id_jabatan=$id_jabatan");
        header("location: ../home?module=$_GET[module]&message=success2");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error2");

      }


}
####################################################### Add PIC ######################################################################

if (($_GET['module'])==sha1('22') && ($_GET['act']=='add_pic')){

$nama_pic=$_POST['nama_pic'];


$query=" insert into master_pic (name,adddt,addby) values ('$nama_pic',CURRENT_TIMESTAMP,'".getUsername()."') ";
$result=pg_query($connection, $query);

  if ($result)
      {
        logActivity("Add PIC","nama_pic=$nama_pic");
        header("location: ../home?module=$_GET[module]&message=success");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }


}
####################################################### Edit PIC ######################################################################

if (($_GET['module'])==sha1('22') && ($_GET['act']=='edit_pic')){
$id_pic=$_POST['id_pic'];
$ed_nama=$_POST['ed_nama'];

$query=" update master_pic set name='$ed_nama' where id_pic='$id_pic' ";


//echo $query;
//die();
$result=pg_query($connection, $query);

if ($result)
      { logActivity("update_pic","id_pic=$id_pic, nama_pic=$ed_nama");
        header("location: ../home?module=$_GET[module]&message=success3");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error3");

      }


}
####################################################### Delete PIC ######################################################################
//===========================
if (($_GET['module'])==sha1('22') && ($_GET['act']=='delete_pic')){


$id_pic=$_POST['id_pic'];
$query=" delete from master_pic where id_pic='$id_pic' ";
$result=pg_query($connection, $query);

if ($result)
      { logActivity("delete_pic","id_pic=$id_pic");
        header("location: ../home?module=$_GET[module]&message=success2");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error2");

      }


}

####################################################### Add BI Product ######################################################################

if (($_GET['module'])==sha1('39') && ($_GET['act']=='add_productbi')){
$kd_product=$_POST['kd_product'];
$nama_product=$_POST['nama_product'];


$query=" insert into bi_product (kd_productbi,name,adddt,addby) values ('$kd_product','$nama_product',CURRENT_TIMESTAMP,'".getUsername()."') ";
$result=pg_query($connection, $query);

  if ($result)
      {
        logActivity("Add productbi","kode product=$kd_product, nama_product=$nama_product");
        header("location: ../home?module=$_GET[module]&message=success");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }


}
####################################################### Edit BI Product ######################################################################

if (($_GET['module'])==sha1('39') && ($_GET['act']=='edit_productbi')){
$id_productbi=$_POST['id_productbi'];
$ed_kd=$_POST['ed_kd'];
$ed_nama=$_POST['ed_nama'];

$query=" update bi_product set kd_productbi='$ed_kd',name='$ed_nama' where id_productbi='$id_productbi' ";


//echo $query;
//die();
$result=pg_query($connection, $query);

if ($result)
      { logActivity("update_productbi","id_productbi=$id_productbi, kd_productbi=$ed_kd,  nama_productbi=$ed_nama");
        header("location: ../home?module=$_GET[module]&message=success3");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error3");

      }


}
####################################################### Delete BI Product ######################################################################

if (($_GET['module'])==sha1('39') && ($_GET['act']=='delete_productbi')){


$id_productbi=$_POST['id_productbi'];
$query=" delete from bi_product where id_productbi='$id_productbi' ";
$result=pg_query($connection, $query);

if ($result)
      { logActivity("delete_productbi","id_productbi=$id_productbi");
        header("location: ../home?module=$_GET[module]&message=success2");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error2");

      }


}


####################################################### Add BI Case ######################################################################

if (($_GET['module'])==sha1('40') && ($_GET['act']=='add_casebi')){

$kd_case=$_POST['kd_case'];
$nama_case=$_POST['nama_case'];


$query=" insert into bi_case (kd_causebi,name,adddt,addby) values ('$kd_case','$nama_case',CURRENT_TIMESTAMP,'".getUsername()."') ";
$result=pg_query($connection, $query);

  if ($result)
      {
        logActivity("Add casebi","kd_causebi=$kd_case,nama_case=$nama_case");
        header("location: ../home?module=$_GET[module]&message=success");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }


}
####################################################### Edit BI Case ######################################################################

if (($_GET['module'])==sha1('40') && ($_GET['act']=='edit_casebi')){
$id_causebi=$_POST['id_causebi'];
$ed_kd=$_POST['ed_kd'];
$ed_nama=$_POST['ed_nama'];

$query=" update bi_case set kd_causebi='$ed_kd', name='$ed_nama' where id_causebi='$id_causebi' ";


//echo $query;
//die();
$result=pg_query($connection, $query);

if ($result)
      { logActivity("update_casebi","id_causebi=$id_causebi,kd_causebi=$ed_kd,nama_casebi=$ed_nama");
        header("location: ../home?module=$_GET[module]&message=success3");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error3");

      }


}
####################################################### Delete BI Case ######################################################################

if (($_GET['module'])==sha1('40') && ($_GET['act']=='delete_casebi')){

$id_causebi=$_POST['id_causebi'];
$query=" delete from bi_case where id_causebi='$id_causebi' ";
$result=pg_query($connection, $query);

if ($result)
      { logActivity("delete_casebi","id_causebi=$id_causebi");
        header("location: ../home?module=$_GET[module]&message=success2");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error2");

      }


}

####################################################### Add BI CAUSE ######################################################################

if (($_GET['module'])==sha1('42') && ($_GET['act']=='add_causebi')){

$kd_case=$_POST['kd_case'];
$nama_case=$_POST['nama_case'];


$query=" insert into bi_cause (kd_cause_bi,name,adddt,addby) values ('$kd_case','$nama_case',CURRENT_TIMESTAMP,'".getUsername()."') ";
$result=pg_query($connection, $query);

  if ($result)
      {
        logActivity("Add Cause BI","kd_cause_bi=$kd_case,nama=$nama_case");
        header("location: ../home?module=$_GET[module]&message=success");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }


}
####################################################### Edit BI CAUSE ######################################################################

if (($_GET['module'])==sha1('42') && ($_GET['act']=='edit_causebi')){
$id_causebi=$_POST['id_causebi'];

$ed_kd=$_POST['ed_kd'];
$ed_nama=$_POST['ed_nama'];

$query=" update bi_cause set kd_cause_bi='$ed_kd',name='$ed_nama' where id_cause_bi='$id_causebi' ";


//echo $query;
//die();
$result=pg_query($connection, $query);

if ($result)
      { logActivity("update Cause BI","id_cause_bi=$id_causebi, kd_cause_bi=$ed_kd , nama=$ed_nama");
        header("location: ../home?module=$_GET[module]&message=success3");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error3");

      }


}
####################################################### Delete BI CAUSE ######################################################################

if (($_GET['module'])==sha1('42') && ($_GET['act']=='delete_causebi')){

$id_causebi=$_POST['id_causebi'];
$query=" delete from bi_cause where id_cause_bi='$id_causebi' ";
$result=pg_query($connection, $query);

if ($result)
      { logActivity("delete Cause BI","id_causebi=$id_causebi");
        header("location: ../home?module=$_GET[module]&message=success2");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error2");

      }


}
####################################################### Add MAP ACCESS ######################################################################

if (($_GET['module'])==sha1('28') && ($_GET['act']=='add_map_pua')){

$id_product=$_POST['idproduct'];
$id_unit=$_POST['idunit'];
$id_process=$_POST['idproses'];
$id_case=$_POST['idpermasalahan'];

$query=" insert into map_access (id_product,id_unit,id_process,id_case,adddt,addby) values ('$id_product','$id_unit','$id_process','$id_case',CURRENT_TIMESTAMP,'".getUsername()."') ";
$result=pg_query($connection, $query);
//echo $query;
//die();
  if ($result)
      {
        logActivity("Add Mapping Access","id_product=$id_product,id_unit=$id_unit,id_process=$id_process,id_case=$id_case");
        header("location: ../home?module=$_GET[module]&message=success");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }


}

####################################################### EDIT MAP ACCESS ######################################################################

if (($_GET['module'])==sha1('28') && ($_GET['act']=='edit_map_pua')){
$id_access=$_POST['id_access'];
$ed_case=$_POST['ed_case'];
$ed_process=$_POST['ed_process'];
$ed_unit=$_POST['ed_unit'];
$ed_product=$_POST['ed_product'];

//$query1=" delete from map_access where id='$id_access' ";
//$result1=pg_query($connection, $query2);

//if ($result1)
//{
$query2=" update map_access set id_product='$ed_product',id_unit='$ed_unit',id_process='$ed_process',id_case='$ed_case' where id='$id_access' ";
//$query=" insert into map_access (id_product,id_unit,id_process,id_case,adddt,addby) values ('$id_product','$id_unit','$id_process','$id_case',CURRENT_TIMESTAMP,'".getUsername()."') ";
$result2=pg_query($connection, $query2);

  if ($result2)
      {
        logActivity("Edit Mapping Access","id=$id_access,id_product=$ed_product,id_unit=$ed_unit,id_process=$ed_process,id_case=$ed_case");
        header("location: ../home?module=$_GET[module]&message=success");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }

//} else {
//        header("location: ../index.php?module=$_GET[module]&message=error");

//}

}

####################################################### Delete MAP ACCESS ######################################################################

if (($_GET['module'])==sha1('28') && ($_GET['act']=='delete_map_pua')){

$id_access=$_POST['id_access'];
$query=" delete from map_access where id='$id_access' ";
$result=pg_query($connection, $query);

if ($result)
      { logActivity("delete Mapping Access","id=$id_access");
        header("location: ../home?module=$_GET[module]&message=success2");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error2");

      }


}
####################################################### Add ,edit MAP PIC ######################################################################

if (($_GET['module'])==sha1('50') && ($_GET['act']=='add_map_pic2')){


if (isset($_POST['id_pic']) && ($_POST['id_pic'])!="" && isset($_POST['id_product']) && ($_POST['id_product'])!=""){
//delete map_pic where id_pic and product
$query_delete =" delete from map_pic where id_pic='$_POST[id_pic]' and id_product='$_POST[id_product]' ";
$result_delete =pg_query($connection, $query_delete);

foreach ($_POST['my_multi_select2'] as $id_case)
{
  //select distinc id_unit,map_access where id_case 
  $query_cek =" select distinct(id_unit) from map_access where id_case='$id_case' ";
  $result_cek =pg_query($connection, $query_cek);
  $row_cek=pg_fetch_array($result_cek);

 
//insert into map_pic
  $query =" insert into map_pic (id_pic,id_product,id_unit,id_process,id_case,adddt,addby) ";
  $query.=" values ('$_POST[id_pic]','$_POST[id_product]','$row_cek[id_unit]','0','$id_case',CURRENT_TIMESTAMP,'".getUsername()."') ";
  $result=pg_query($connection, $query);

  logActivity("Add Mapping PIC","id_pic=$_POST[id_pic],id_product=$_POST[id_product],id_unit=$row_cek[id_unit], id_case=$id_case");
}

header("location: ../home?module=$_GET[module]&message=success&idpic=$_POST[id_pic]&idproduct=$_POST[id_product]");

//die();
} else {

header("location: ../home?module=$_GET[module]&message=error");

}

}

####################################################### Add MAP PIC ######################################################################

if (($_GET['module'])==sha1('27') && ($_GET['act']=='add_map_pic')){

$id_pic=$_POST['idpic'];
$id_product=$_POST['idproduct'];
$id_unit=$_POST['idunit'];
$id_process=$_POST['idproses'];
$id_case=$_POST['idpermasalahan'];

$query=" insert into map_pic (id_pic,id_product,id_unit,id_process,id_case,adddt,addby) values ('$id_pic','$id_product','$id_unit','$id_process','$id_case',CURRENT_TIMESTAMP,'".getUsername()."') ";
$result=pg_query($connection, $query);

  if ($result)
      {
        logActivity("Add Mapping PIC","Menu=27, id_pic=$id_pic,id_product=$id_product,id_unit=$id_unit,id_process=$id_process,id_case=$id_case");
        header("location: ../home?module=$_GET[module]&message=success");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }


}

####################################################### EDIT MAP PIC ######################################################################

if (($_GET['module'])==sha1('27') && ($_GET['act']=='edit_map_pic')){
$id_access=$_POST['id_access'];
$ed_case=$_POST['ed_case'];
$ed_process=$_POST['ed_process'];
$ed_unit=$_POST['ed_unit'];
$ed_product=$_POST['ed_product'];
$ed_pic=$_POST['ed_pic'];

//$query1=" delete from map_access where id='$id_access' ";
//$result1=pg_query($connection, $query2);

//if ($result1)
//{
$query2=" update map_pic set id_pic='$ed_pic',id_product='$ed_product',id_unit='$ed_unit',id_process='$ed_process',id_case='$ed_case' where id_map_pic='$id_access' ";
//$query=" insert into map_access (id_product,id_unit,id_process,id_case,adddt,addby) values ('$id_product','$id_unit','$id_process','$id_case',CURRENT_TIMESTAMP,'".getUsername()."') ";
$result2=pg_query($connection, $query2);

  if ($result2)
      {
        logActivity("Edit Mapping PIC","Menu=27, id_map_pic=$id_access,id_pic=$ed_pic,id_product=$ed_product,id_unit=$ed_unit,id_process=$ed_process,id_case=$ed_case");
        header("location: ../home?module=$_GET[module]&message=success");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }

//} else {
//        header("location: ../home?module=$_GET[module]&message=error");

//}

}

####################################################### Delete MAP PIC ######################################################################

if (($_GET['module'])==sha1('27') && ($_GET['act']=='delete_map_pic')){

$id_access=$_POST['id_access'];
$query=" delete from map_pic where id_map_pic='$id_access' ";
$result=pg_query($connection, $query);

if ($result)
      { logActivity("delete Mapping PIC","id=$id_access");
        header("location: ../home?module=$_GET[module]&message=success2");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error2");

      }


}



####################################################### Add MEMO ######################################################################

if (isset($_GET['module']) && ($_GET['act']=='add_memo')){
$ket_memo=$_POST['ket_memo'];
$num_ticket=$_POST['num_ticket'];
$id_process=$_POST['id_process'];

$q_cek=" select call_to_ask,status from laporan_kerja where ticket_number='$num_ticket' ";
$res_cek=pg_query($connection,$q_cek);
$row_cek=pg_fetch_array($res_cek);


if (isset($_POST['call_to_ask'])) {
$call_to_ask=$_POST['call_to_ask']; 

      if ($row_cek['call_to_ask']=='0' || $row_cek['call_to_ask']=='2')
            { 
              $ask=1;
      }             else { 
                    $ask=2; 
                  }
$queryup=" update laporan_kerja set call_to_ask='$ask' where ticket_number='$num_ticket' ";
$resultup=pg_query($connection,$queryup);
logActivity("Update Laporan Kerja","num_ticket=$num_ticket,call_to_ask=$ask ");

} 


#### update onprogress
if ($row_cek['status']=='1') {
$q_update=" update laporan_kerja set status='2' where ticket_number='$num_ticket' ";
$res_update=pg_query($connection,$q_update);
logActivity("Update laporan_kerja","num_ticket=$num_ticket,status=2");
}


$result=logMemo($num_ticket,$id_process,$ket_memo);


  if ($result)
      {
        logActivity("Add Memo","num_ticket=$num_ticket,ket_memo=$ket_memo,id_process=$id_process");
        header("location: ../home?module=$_GET[module]&message=success_memo&act=src&srcby=1&srckey=$num_ticket");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error_memo&act=src&srcby=1&srckey=$num_ticket");

      }


}

####################################################### Add MEMO GLOBAL ######################################################################

if (isset($_GET['module']) && ($_GET['act']=='add_memo2')){
$ket_memo=$_POST['ket_memo'];
$num_ticket=$_POST['num_ticket'];
$id_process=$_POST['id_process'];
$call_to_close=$_POST['call_to_close'];
//echo $call_to_close;
//die();
$q_cek=" select call_to_ask,status from laporan_kerja where ticket_number='$num_ticket' ";
$res_cek=pg_query($connection,$q_cek);
$row_cek=pg_fetch_array($res_cek);
$status_act=$row_cek['status'];


if (!isset($call_to_close) || $call_to_close==NULL)
{

if (isset($_POST['call_to_ask']) ) {
$call_to_ask=$_POST['call_to_ask']; // update laporan

//cek call_to_ask
//$q_cek=" select call_to_ask,status from laporan_kerja where ticket_number='$num_ticket' ";
//$res_cek=pg_query($connection,$q_cek);
//$row_cek=pg_fetch_array($res_cek);
//$status_act=$row_cek['status'];

      if ($row_cek['call_to_ask']=='0' || $row_cek['call_to_ask']=='2')
            { 
              $ask=1;
      }             else { 
                    $ask=2; 
                  }
$queryup=" update laporan_kerja set call_to_ask='$ask' where ticket_number='$num_ticket' ";
$resultup=pg_query($connection,$queryup);
logActivity("Update Laporan Kerja","num_ticket=$num_ticket,call_to_ask=$ask ");

//if ($row_cek['status']=='1') {
//$q_update=" update laporan_kerja set status='2' where ticket_number='$num_ticket' ";
//$res_update=pg_query($connection,$q_update);
//logActivity("Update laporan_kerja","num_ticket=$num_ticket,status=2");
//}



} //else {
//$q_cek=" select call_to_ask,status from laporan_kerja where ticket_number='$num_ticket' ";
//$res_cek=pg_query($connection,$q_cek);
//$row_cek=pg_fetch_array($res_cek);
//if ($row_cek['status']=='1') {
//$q_update=" update laporan_kerja set status='2' where ticket_number='$num_ticket' ";
//$res_update=pg_query($connection,$q_update);
//logActivity("Update laporan_kerja","num_ticket=$num_ticket,status=2");
//}	
	
//}

} else {
// update call to close
// $q_cek=" select call_to_ask,status from laporan_kerja where ticket_number='$num_ticket' ";
// $res_cek=pg_query($connection,$q_cek);
// $row_cek=pg_fetch_array($res_cek);
// $status_act=$row_cek['status'];

$queryup=" update laporan_kerja set call_to_close='0' where ticket_number='$num_ticket' ";
$resultup=pg_query($connection,$queryup);




}



if ($row_cek['status']=='1') {
$q_update=" update laporan_kerja set status='2' where ticket_number='$num_ticket' ";
$res_update=pg_query($connection,$q_update);
logActivity("Update laporan_kerja","num_ticket=$num_ticket,status=2");
}



/*
if ($status_act=='1') {
$q_update=" update laporan_kerja set status='2' where ticket_number='$num_ticket' ";
$res_update=pg_query($connection,$q_update);
logActivity("Update laporan_kerja","num_ticket=$num_ticket,status=2");
}

*/
$result=logMemo($num_ticket,$id_process,$ket_memo);

//$query="insert into log_memo (ticket_number,memo_date,id_karyawan,keterangan,id_process) values ('$num_ticket',CURRENT_TIMESTAMP,'".getUsername()."','$ket_memo','$id_process')";
//$result=pg_query($connection,$query);

  if ($result)
      {
        logActivity("Add Memo","num_ticket=$num_ticket,ket_memo=$ket_memo,id_process=$id_process");
        header("location: ../home?module=$_GET[module]&message=success_memo&act=$status_act");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error_memos&act=$status_act");

      }


}
###########################  CONFIRM FORWARD CASE #########################################

############################### -------------- ####################################

if (($_GET['module'])==sha1('54') && ($_GET['act']=='memo_conf_fwdcase')) {

$ticket_number=$_POST['ticket_number'];
$cat=$_POST['cat'];
$id_process=$_POST['id_process'];
$id_pic=$_POST['id_pic'];

# MANDATORY
$keterangan=$_POST['keterangan'];
$act_memo=$_POST['act_memo'];

# NO MANDATORY
$nama_file=$_FILES['file_attach']['name'];

   ###// jika terdapat attach file
    if (isset($nama_file) && ($nama_file != "") && ($nama_file != NULL) ) {
           

          $image_temp=$_FILES['file_attach']['tmp_name'];
          $nama=$_FILES['file_attach']['name'];
          $type=$_FILES['file_attach']['type'];
          $ext = pathinfo($nama, PATHINFO_EXTENSION);

          $query  =" insert into log_memo (ticket_number,memo_date,id_karyawan,keterangan,id_process )  ";
          $query .=" values ('$ticket_number', CURRENT_TIMESTAMP,'".getUsername()."','ATTACH FILE : $keterangan','$id_process') returning id_memo ";

          $result=pg_query($connection, $query);
          $row=pg_fetch_array($result);
          $file_output="$row[id_memo]";

          $query2=" update  log_memo  set file_memo='$file_output.$ext' where  id_memo='$file_output' ";
          $result2=pg_query($connection, $query2);


                 if ($result){
                         $directory="../data/file-attach/".$file_output.".$ext";
                         copy($image_temp,$directory);
                 }

          $ket__.="  <b> Has been Uploaded File </b> , <br>";

    } 


     // jika terdapat forward case
    if (isset($id_pic) && ($id_pic != "") && ($id_pic != NULL) ) {
            $var_forward=" set  var_pic='$id_pic' ";
            // $email_message.="  <b>  Forward Case to  PIC ".getNamaPic2($id_pic)." </b> <br>";

            $ket__.= " Forward Case to  PIC ,  ".getNamaPic2($id_pic)." , ";
   
    } else {
      $var_forward=" set  var_pic=NULL ";
      $ket__.= "";
    }



			switch ($act_memo) {
			  case 'memo':
				$var_update=" ";
				$ket_memo= " <br> ADD MEMO : $ket__  $keterangan ";
				$var_type=" ";
				break;
				
			  case 'close':
			  
				$var_update=" , date_finish=CURRENT_TIMESTAMP , status='3' ";
				$ket_memo= " <br> CLOSE : $ket__  $keterangan ";
				$var_type=" and Close ";
				break;
			  
			}

 





 // UPDATE VAR_PIC =======
$query_memo =" update laporan_kerja  $var_forward  $var_update ";
$query_memo.=" WHERE ticket_number='$ticket_number' ";
$result_memo=pg_query($connection,$query_memo);

//=== for email ====
            $q_lapker =" select a.id_case,a.status,a.date_start,a.extend_sla,a.date_sla,a.sla,e.satuan,b.name as produk ,c.name as unit ,d.name as proses ,e.name as case, f.name as laporan,g.name as penyebab_bi,h.name as cabang,a.keterangan,e.name as nama_case from laporan_kerja a ";
            $q_lapker.=" left join master_product b on a.id_product=b.id_product ";
            $q_lapker.=" left join master_unit c on a.id_unit=c.id_unit ";
            $q_lapker.=" left join master_process d on a.id_process=d.id_process ";
            $q_lapker.=" left join master_case e on a.id_case=e.id_case ";
            $q_lapker.=" left join master_report f on a.id_report=f.id_report ";
            $q_lapker.=" left join bi_cause g on a.id_cause_bi=g.id_cause_bi ";
            $q_lapker.=" left join master_branch h on a.id_cabang=h.id_cabang ";
            $q_lapker.=" where a.ticket_number='$ticket_number' ";
            $res_lapker=pg_query($connection,$q_lapker);
            $row_lapker=pg_fetch_array($res_lapker);

            $jml_intval=$row_lapker['sla']+$row_lapker['extend_sla'];
            $batas_sla=dateSla($row_lapker['date_start'],$jml_intval,$row_lapker['satuan']);
            $email_message.="  Confirm  $ket__  $var_type : <i>$keterangan</i><br>";
            $email_message.="  <br>";
            $email_message.="  <br>";
            $email_message.=" ------------------------------------------- Information Inquiry ----------------------------------------------------------- <br><br>";        
            $email_message.=" Request Ticket : <b>$ticket_number</b> <br>";
            $email_message.=" Tgl Request : <b>". date('d-m-Y',strtotime($row_lapker['date_start'])) ."</b> <br>";
            $email_message.=" SLA : <b>$row_lapker[sla] $row_lapker[satuan]</b> <br>";
            $email_message.=" Batas Akhir SLA : ".date('d-m-Y',strtotime($row_lapker['date_sla'])) ."<br>";
            $email_message.=" Cabang : $row_lapker[cabang] <br>";
            $email_message.=" Produk : $row_lapker[produk]<br>";
            $email_message.=" Unit : $row_lapker[unit]<br>";
            $email_message.=" Prosess : $row_lapker[proses]<br>";
            $email_message.=" Permasalahan : $row_lapker[case]<br>";
            $email_message.=" Penyebab Masalah BI : $row_lapker[penyebab_bi]<br>";
            $email_message.=" Keterangan : $row_lapker[keterangan]<br>";
            $email_message.=" <br><br><br><br>"; 
            $email_message.=" ----------------------------------------- <br>";
            $email_message.=" PT. Bank MNC Internasional, Tbk <br>";
            $email_message.=" <i>Commone System</i> <br>";
            $email_message.=" <i>www.mncbank.co.id</i><br>";

            BlasttMailCase("Confirmation Add Memo ",$email_message,$_SESSION['SESS_EMAIL'],$row_lapker['case']);

             // jika terdapat forward case
            if (isset($id_pic) && ($id_pic != "") && ($id_pic != NULL) ) {
                
                BlasttMailPic("Confirmation Add Memo ",$email_message,$_SESSION['SESS_EMAIL'],$id_pic);
   
            } 

         

//=====================

	if ($result_memo){

   
				$result=logMemo($ticket_number,$id_process,$ket_memo);
		
        
        logActivity("Add Memo","num_ticket=$ticket_number, $ket_memo, MENU=54 ");
        header("location: ../home?module=$_GET[module]&message=success&act1=$cat&iDisplayStart=$_GET[ds]");
    } else  {
			header("location: ../home?module=$_GET[module]&message=error&act1=$cat&iDisplayStart=$_GET[ds]");

		}


}

############


############################### ADD MEMO NOT MODALS ####################################

if ((($_GET['module'])==sha1('59') || ($_GET['module'])==sha1('41')) && ($_GET['act']=='addx_memo')) {

$ticket_number=$_POST['ticket_number'];
$cat=$_POST['cat'];
$id_process=$_POST['id_process'];
# MANDATORY
$keterangan=$_POST['keterangan'];

# NO MANDATORY
$act_memo=$_POST['act_memo'];
$ext_addsla=$_POST['ext_addsla'];
$param_sla=$_POST['param_sla'];
$id_pic=$_POST['id_pic'];
$nama_file=$_FILES['file_attach']['name'];
$call_to_ask=$_POST['call_to_ask'];


switch ($act_memo) {
  case 'memo':
    $status=2;
    $ket_memo= " ADD MEMO : ";
    $message="success_memo";
    break;
  case 'close':
    $status=3;
    $ket_memo= " CLOSE : ";
    $message="memo_close";
    break;

}







    // jika terdapat penambahan sla
    if (isset($ext_addsla) && ($ext_addsla != "") && ($ext_addsla != NULL) ) {
          //======= OLD get sla, extend_sla =========
            $q_get= " select * from laporan_kerja where ticket_number='$ticket_number' ";
            $res_get=pg_query($connection, $q_get);
            $row_get=pg_fetch_array($res_get);
            $start_date=date('Y-m-d',strtotime($row_get['date_start']));
            $tot_sla=$row_get['sla']+$row_get['extend_sla']+$ext_addsla;
            $tot_extend=$row_get['extend_sla']+$ext_addsla;
            $tgl_sla=date('Y-m-d',strtotime(dateSla($start_date,$tot_sla,$param_sla)));
                $date_b = date_create($tgl_sla,timezone_open("Asia/Jakarta"));
                $date2 =date_add($date_b, date_interval_create_from_date_string("0 minutes"));
                $sys_date2 = date_format($date2, 'Y-m-d H:i:s');
                $var_extsla=" ,extend_sla='$tot_extend',date_sla=date_trunc('second', TIMESTAMP '$sys_date2') ";
                  //$query=" update laporan_kerja set extend_sla='$tot_extend',date_sla=date_trunc('second', TIMESTAMP '$sys_date2') where ticket_number='$numticket' ";
                $ket_memo.= " Add SLA , ";

    } else {
      $var_extsla="";
      $ket_memo.= "";
    }

    // jika terdapat forward case
    if (isset($id_pic) && ($id_pic != "") && ($id_pic != NULL) ) {
            $var_forward=" ,var_pic='$id_pic' ";
             $email_message.="  <b> Confirmation Forward Case to  PIC ".getNamaPic2($id_pic)." </b> <br>";


            
            //BlasttMailPic("Konfirmasi Forward Case",$email_message,$_SESSION['SESS_EMAIL'],$id_pic)
            $ket_memo.= " Forward Case to  PIC , ".getNamaPic2($id_pic)." , ";
   
    } else {
      $var_forward="";
      $ket_memo.= "";
    }

    
    // jika terdapat call to ask 
    if (isset($call_to_ask) && ($call_to_ask != "") && ($call_to_ask != NULL) && ($call_to_ask =='1') ) {
          $q_cek=" select call_to_ask,status from laporan_kerja where ticket_number='$ticket_number' ";
          $res_cek=pg_query($connection,$q_cek);
          $row_cek=pg_fetch_array($res_cek);


              if (isset($call_to_ask)) {
                  //$call_to_ask=$_POST['call_to_ask']; 

                      if ($row_cek['call_to_ask']=='0' || $row_cek['call_to_ask']=='2'){ 
                          $ask=1;
                      }  else { 
                              $ask=1; 
                          }
                  //$queryup=" update laporan_kerja set  where ticket_number='$ticket_number' ";
                  //$resultup=pg_query($connection,$queryup);
                  //logActivity("Update Laporan Kerja","num_ticket=$num_ticket,call_to_ask=$ask ");
               }
          $var_call_to_ask=" ,call_to_ask='$ask' ";
          $ket_memo.= " Call to Ask , ";

}  else {
          $var_call_to_ask="";
          $ket_memo.= "";
}

   // jika terdapat attach file
    if (isset($nama_file) && ($nama_file != "") && ($nama_file != NULL) ) {
           

          $image_temp=$_FILES['file_attach']['tmp_name'];
          $nama=$_FILES['file_attach']['name'];
          $type=$_FILES['file_attach']['type'];
          $ext = pathinfo($nama, PATHINFO_EXTENSION);

          $query  =" insert into log_memo (ticket_number,memo_date,id_karyawan,keterangan,id_process )  ";
          $query .=" values ('$ticket_number', CURRENT_TIMESTAMP,'".getUsername()."','ATTACH FILE : $keterangan','$id_process') returning id_memo ";

          $result=pg_query($connection, $query);
          $row=pg_fetch_array($result);
          $file_output="$row[id_memo]";

          $query2=" update  log_memo  set file_memo='$file_output.$ext' where  id_memo='$file_output' ";
          $result2=pg_query($connection, $query2);


                 if ($result){
                         $directory="../data/file-attach/".$file_output.".$ext";
                         copy($image_temp,$directory);
                 }
          //$ket_memo.= " Attach File , ";


          $email_message.="  <b> Confirmation Has been Uploaded File </b> <br>";






    } 





$ket_memo.= " <br> $keterangan ";

if ($act_memo =='close') {
$query_memo =" update laporan_kerja set date_finish=CURRENT_TIMESTAMP, status='3' ";
$query_memo.=" WHERE ticket_number='$ticket_number' ";
} else  { 

$query_memo =" update laporan_kerja set status='$status' $var_extsla  $var_forward  $var_call_to_ask  ";
$query_memo.=" WHERE ticket_number='$ticket_number' ";

}


//echo $query_memo."<br>";
//echo $_GET['ds'];
//die();
$result_memo=pg_query($connection,$query_memo);



//=== for email ====
            $q_lapker =" select a.id_case,a.status,a.date_start,a.extend_sla,a.date_sla,a.sla,e.satuan,b.name as produk ,c.name as unit ,d.name as proses ,e.name as case, f.name as laporan,g.name as penyebab_bi,h.name as cabang,a.keterangan,e.name as nama_case from laporan_kerja a ";
            $q_lapker.=" left join master_product b on a.id_product=b.id_product ";
            $q_lapker.=" left join master_unit c on a.id_unit=c.id_unit ";
            $q_lapker.=" left join master_process d on a.id_process=d.id_process ";
            $q_lapker.=" left join master_case e on a.id_case=e.id_case ";
            $q_lapker.=" left join master_report f on a.id_report=f.id_report ";
            $q_lapker.=" left join bi_cause g on a.id_cause_bi=g.id_cause_bi ";
            $q_lapker.=" left join master_branch h on a.id_cabang=h.id_cabang ";
            $q_lapker.=" where a.ticket_number='$ticket_number' ";
            $res_lapker=pg_query($connection,$q_lapker);
            $row_lapker=pg_fetch_array($res_lapker);

            $jml_intval=$row_lapker['sla']+$row_lapker['extend_sla'];
            $batas_sla=dateSla($row_lapker['date_start'],$jml_intval,$row_lapker['satuan']);

            //$email_message.="  <b> Confirmation Forward Case to  $row_lapker[nama_case] </b> <br>";
            //$email_message.="   $row_lapker[nama_case] </b> <br>";
            //$email_message.="   $row_lapker[nama_case] </b> <br>";
            $email_message.="  Keterangan : <i>$keterangan</i><br>";
            $email_message.="  <br>";
            $email_message.="  <br>";
            $email_message.=" ------------------------------------------- Information Inquiry ----------------------------------------------------------- <br><br>";        
            $email_message.=" Request Ticket : <b>$ticket_number</b> <br>";
            $email_message.=" Tgl Request : <b>". date('d-m-Y',strtotime($row_lapker['date_start'])) ."</b> <br>";
            $email_message.=" SLA : <b>$row_lapker[sla] $row_lapker[satuan]</b> <br>";
            $email_message.=" Batas Akhir SLA : ".date('d-m-Y',strtotime($row_lapker['date_sla'])) ."<br>";
            $email_message.=" Cabang : $row_lapker[cabang] <br>";
            $email_message.=" Produk : $row_lapker[produk]<br>";
            $email_message.=" Unit : $row_lapker[unit]<br>";
            $email_message.=" Prosess : $row_lapker[proses]<br>";
            $email_message.=" Permasalahan : $row_lapker[case]<br>";
            $email_message.=" Penyebab Masalah BI : $row_lapker[penyebab_bi]<br>";
            $email_message.=" Keterangan : $row_lapker[keterangan]<br>";
            $email_message.=" <br><br><br><br>"; 
            $email_message.=" ----------------------------------------- <br>";
            $email_message.=" PT. Bank MNC Internasional, Tbk <br>";
            $email_message.=" <i>Commone System</i> <br>";
            $email_message.=" <i>www.mncbank.co.id</i><br>";


             if (isset($id_pic) && ($id_pic != "") && ($id_pic != NULL) ) {
                    BlasttMailPic("Konfirmasi Forward Case",$email_message,$_SESSION['SESS_EMAIL'],$id_pic);
              }

            BlasttMailCase("Confirmation Add Memo ",$email_message,$_SESSION['SESS_EMAIL'],$row_lapker['case']);
//=====================

  if ($result_memo)
      {
        if (isset($nama_file) && ($nama_file != "") && ($nama_file != NULL) ) {

        } else {
                $result=logMemo($ticket_number,$id_process,$ket_memo);
            }
        
        logActivity("Add Memo","num_ticket=$ticket_number, $ket_memo, MENU=59 atau 41");
        header("location: ../home?module=$_GET[module]&message=$message&act1=$cat&iDisplayStart=$_GET[ds]");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error_memo&act1=$cat&iDisplayStart=$_GET[ds]");

      }


}

//memo_call_customer
############################### CALL CUSTOMER IF FINISHED and  Call To ASK to get information ####################################

if (   $_GET['module']==sha1('49')    && ($_GET['act']=='memo_call_customer')) {

$ticket_number=$_POST['ticket_number'];
$var_note=$_POST['var_note'];
$categori=$_POST['categori'];
$id_process=$_POST['id_process'];
$keterangan="<br>".$_POST['keterangan'];



//      $result=logMemo($ticket_number,$id_process,$ket_memo);
//echo $var_note;
//die();





if ($categori=='1'){
$var_note=" call_to_close='$var_note' ";
$ket_memo= "ADD MEMO : Has been already Called Customer ( confirm finish ).. $keterangan ";
}else {
$var_note=" call_to_ask='$var_note'";
$ket_memo= "ADD MEMO : confirm get information ... $keterangan ";

}

$q_update=" update laporan_kerja set $var_note  where ticket_number='$ticket_number' ";
$result_update=pg_query($connection, $q_update);

$result=logMemo($ticket_number,$id_process,$ket_memo);


//=== for email ====
									$q_lapker =" select a.id_case,a.status,a.date_start,a.extend_sla,a.date_sla,a.sla,e.satuan,b.name as produk ,c.name as unit ,d.name as proses ,e.name as case, f.name as laporan,g.name as penyebab_bi,h.name as cabang,a.keterangan,e.name as nama_case from laporan_kerja a ";
									$q_lapker.=" left join master_product b on a.id_product=b.id_product ";
									$q_lapker.=" left join master_unit c on a.id_unit=c.id_unit ";
									$q_lapker.=" left join master_process d on a.id_process=d.id_process ";
									$q_lapker.=" left join master_case e on a.id_case=e.id_case ";
									$q_lapker.=" left join master_report f on a.id_report=f.id_report ";
									$q_lapker.=" left join bi_cause g on a.id_cause_bi=g.id_cause_bi ";
									$q_lapker.=" left join master_branch h on a.id_cabang=h.id_cabang ";
									$q_lapker.=" where a.ticket_number='$ticket_number' ";
									$res_lapker=pg_query($connection,$q_lapker);
									$row_lapker=pg_fetch_array($res_lapker);

									$jml_intval=$row_lapker['sla']+$row_lapker['extend_sla'];
									$batas_sla=dateSla($row_lapker['date_start'],$jml_intval,$row_lapker['satuan']);
									$email_message.="  Update Call Customer : <i>$ket_memo</i><br>";
									$email_message.="  <br>";
									$email_message.="  <br>";
									$email_message.=" ------------------------------------------- Information Inquiry ----------------------------------------------------------- <br><br>";        
									$email_message.=" Request Ticket : <b>$ticket_number</b> <br>";
									$email_message.=" Tgl Request : <b>". date('d-m-Y',strtotime($row_lapker['date_start'])) ."</b> <br>";
									$email_message.=" SLA : <b>$row_lapker[sla] $row_lapker[satuan]</b> <br>";
									$email_message.=" Batas Akhir SLA : ".date('d-m-Y',strtotime($row_lapker['date_sla'])) ."<br>";
									$email_message.=" Cabang : $row_lapker[cabang] <br>";
									$email_message.=" Produk : $row_lapker[produk]<br>";
									$email_message.=" Unit : $row_lapker[unit]<br>";
									$email_message.=" Prosess : $row_lapker[proses]<br>";
									$email_message.=" Permasalahan : $row_lapker[case]<br>";
									$email_message.=" Penyebab Masalah BI : $row_lapker[penyebab_bi]<br>";
									$email_message.=" Keterangan : $row_lapker[keterangan]<br>";
									$email_message.=" <br><br><br><br>"; 
									$email_message.=" ----------------------------------------- <br>";
									$email_message.=" PT. Bank MNC Internasional, Tbk <br>";
									$email_message.=" <i>Commone System</i> <br>";
									$email_message.=" <i>www.mncbank.co.id</i><br>";

									BlasttMailCase("Update Inquiry ",$email_message,$_SESSION['SESS_EMAIL'],$row_lapker['case']);








  if ($result)
      {
        
        logActivity("Add Memo","num_ticket=$ticket_number, $ket_memo , MENU=49");
        header("location: ../home?module=$_GET[module]&message=success&act1=$cat&iDisplayStart=$_GET[ds]");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error&act1=$cat&iDisplayStart=$_GET[ds]");

      }


}




############################### ADD MEMO FOR BRANCH (LIST INQUIRY FL and FIND INQUIRY FL ) ####################################

if (  ( $_GET['module']==sha1('60') || $_GET['module']==sha1('51')   ) && ($_GET['act']=='memo_branch')) {
/*
if (isset($_GET['module']==sha1('60'))){
	$menu="60";
}else if (isset($_GET['module']==sha1('51'))){
	$menu="51";
}
*/




$ticket_number=$_POST['ticket_number'];
$cat=$_POST['cat'];
$id_process=$_POST['id_process'];
# MANDATORY
$keterangan=$_POST['keterangan'];

# NO MANDATORY
$act_memo=$_POST['act_memo'];
$nama_file=$_FILES['file_attach']['name'];



   // jika terdapat attach file
    if (isset($nama_file) && ($nama_file != "") && ($nama_file != NULL) ) {
           

          $image_temp=$_FILES['file_attach']['tmp_name'];
          $nama=$_FILES['file_attach']['name'];
          $type=$_FILES['file_attach']['type'];
          $ext = pathinfo($nama, PATHINFO_EXTENSION);

          $query  =" insert into log_memo (ticket_number,memo_date,id_karyawan,keterangan,id_process )  ";
          $query .=" values ('$ticket_number', CURRENT_TIMESTAMP,'".getUsername()."','ATTACH FILE : $keterangan','$id_process') returning id_memo ";

          $result=pg_query($connection, $query);
          $row=pg_fetch_array($result);
          $file_output="$row[id_memo]";

          $query2=" update  log_memo  set file_memo='$file_output.$ext' where  id_memo='$file_output' ";
          $result2=pg_query($connection, $query2);

                 if ($result){
                         $directory="../data/file-attach/".$file_output.".$ext";
                         copy($image_temp,$directory);
                 }
          
		  if(inquiryStatus($ticket_number)=='4'){
					$query_update=" update  laporan_kerja set status='1' where  ticket_number='$ticket_number' ";
					$res_update=pg_query($connection, $query_update);
					
					$q_get= " select *,b.satuan from laporan_kerja a  ";
					$q_get.= " left join master_case b on a.id_case=b.id_case where a.ticket_number='$ticket_number' ";
					$res_get=pg_query($connection, $q_get);
					$row_get=pg_fetch_array($res_get);
					$start_date=date('Y-m-d');
					$tot_sla=$row_get['sla']+$row_get['extend_sla']+0;
					$tot_extend=$row_get['extend_sla']+0;
					$tgl_sla=date('Y-m-d',strtotime(dateSla($start_date,$tot_sla,$row_get['satuan'])));
					$date_b = date_create($tgl_sla,timezone_open("Asia/Jakarta"));
					$date2 =date_add($date_b, date_interval_create_from_date_string("0 minutes"));
					$sys_date2 = date_format($date2, 'Y-m-d H:i:s');
					//$var_extsla=" ,extend_sla='$tot_extend',date_sla=date_trunc('second', TIMESTAMP '$sys_date2') ";
					$query_sla=" update laporan_kerja set extend_sla='$tot_extend',date_sla=date_trunc('second', TIMESTAMP '$sys_date2') where ticket_number='$ticket_number' ";
					$res_sla=pg_query($connection, $query_sla);
					
					//=== for email ====
            $q_lapker =" select a.id_case,a.status,a.date_start,a.extend_sla,a.date_sla,a.sla,e.satuan,b.name as produk ,c.name as unit ,d.name as proses ,e.name as case, f.name as laporan,g.name as penyebab_bi,h.name as cabang,a.keterangan,e.name as nama_case from laporan_kerja a ";
            $q_lapker.=" left join master_product b on a.id_product=b.id_product ";
            $q_lapker.=" left join master_unit c on a.id_unit=c.id_unit ";
            $q_lapker.=" left join master_process d on a.id_process=d.id_process ";
            $q_lapker.=" left join master_case e on a.id_case=e.id_case ";
            $q_lapker.=" left join master_report f on a.id_report=f.id_report ";
            $q_lapker.=" left join bi_cause g on a.id_cause_bi=g.id_cause_bi ";
            $q_lapker.=" left join master_branch h on a.id_cabang=h.id_cabang ";
            $q_lapker.=" where a.ticket_number='$ticket_number' ";
            $res_lapker=pg_query($connection,$q_lapker);
            $row_lapker=pg_fetch_array($res_lapker);

            $jml_intval=$row_lapker['sla']+$row_lapker['extend_sla'];
            $batas_sla=dateSla($row_lapker['date_start'],$jml_intval,$row_lapker['satuan']);
            $email_message.="  Update From Pending Inquiry : <i>$keterangan</i><br>";
            $email_message.="  <br>";
            $email_message.="  <br>";
            $email_message.=" ------------------------------------------- Information Inquiry ----------------------------------------------------------- <br><br>";        
            $email_message.=" Request Ticket : <b>$ticket_number</b> <br>";
            $email_message.=" Tgl Request : <b>". date('d-m-Y',strtotime($row_lapker['date_start'])) ."</b> <br>";
            $email_message.=" SLA : <b>$row_lapker[sla] $row_lapker[satuan]</b> <br>";
            $email_message.=" Batas Akhir SLA : ".date('d-m-Y',strtotime($row_lapker['date_sla'])) ."<br>";
            $email_message.=" Cabang : $row_lapker[cabang] <br>";
            $email_message.=" Produk : $row_lapker[produk]<br>";
            $email_message.=" Unit : $row_lapker[unit]<br>";
            $email_message.=" Prosess : $row_lapker[proses]<br>";
            $email_message.=" Permasalahan : $row_lapker[case]<br>";
            $email_message.=" Penyebab Masalah BI : $row_lapker[penyebab_bi]<br>";
            $email_message.=" Keterangan : $row_lapker[keterangan]<br>";
            $email_message.=" <br><br><br><br>"; 
            $email_message.=" ----------------------------------------- <br>";
            $email_message.=" PT. Bank MNC Internasional, Tbk <br>";
            $email_message.=" <i>Commone System</i> <br>";
            $email_message.=" <i>www.mncbank.co.id</i><br>";

            BlasttMailCase("Create Inquiry ",$email_message,$_SESSION['SESS_EMAIL'],$row_lapker['case']);

//=====================
					
					
					
					
					
		  }else {
					//$query_update=" update  laporan_kerja set status='2' where  ticket_number='$ticket_number' ";
					//$res_update=pg_query($connection, $query_update);
		  }
		  
		  


    } else {
      $ket_memo= "ADD MEMO : $keterangan ";
      $result=logMemo($ticket_number,$id_process,$ket_memo);

    }



  if ($result)
      {
        
        logActivity("Add Memo","num_ticket=$ticket_number, $ket_memo, MENU=60 atau 51 ");
        header("location: ../home?module=$_GET[module]&message=success&act1=$cat&iDisplayStart=$_GET[ds]");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error&act1=$cat&iDisplayStart=$_GET[ds]");

      }


}


############################### ADD MEMO PENDING FOR BRANCH  ####################################

if (($_GET['module'])==sha1('61') && ($_GET['act']=='memo_pending_branch')) {
/*	
if (isset($_GET['module']==sha1('61'))){
	$menu="61";
}
*/


$ticket_number=$_POST['ticket_number'];
$cat=$_POST['cat'];
$id_process=$_POST['id_process'];
# MANDATORY
$keterangan=$_POST['keterangan'];
$nama_file=$_FILES['file_attach']['name'];
# NO MANDATORY
$act_memo=$_POST['act_memo'];



	switch ($act_memo) {
		case 'memo':
			$message="success";

					  // jika terdapat attach file
				if (isset($nama_file) && (($nama_file != "") || ($nama_file != NULL) )) {
				   

				  $image_temp=$_FILES['file_attach']['tmp_name'];
				  $nama=$_FILES['file_attach']['name'];
				  $type=$_FILES['file_attach']['type'];
				  $ext = pathinfo($nama, PATHINFO_EXTENSION);

				  $query  =" insert into log_memo (ticket_number,memo_date,id_karyawan,keterangan,id_process )  ";
				  $query .=" values ('$ticket_number', CURRENT_TIMESTAMP,'".getUsername()."','ATTACH FILE : $keterangan','$id_process') returning id_memo ";

				  $result=pg_query($connection, $query);
				  $row=pg_fetch_array($result);
				  $file_output="$row[id_memo]";

				  

						 if ($result){
								 $directory="../data/file-attach/".$file_output.".$ext";
								 $sukses_copy=copy($image_temp,$directory);
								 //logMemo($ticket_number,$id_process,"CLOSE : ".$keterangan);
								 if(!$sukses_copy){
									 $query2=" update  log_memo  set keterangan='FAILED UPLOAD' where  id_memo='$file_output' ";
									 $result2=pg_query($connection, $query2);
									 logActivity("Failed Upload document","num_ticket=$ticket_number, $keterangan ");
									 header("location: ../home?module=$_GET[module]&message=error&act1=$cat&iDisplayStart=$_GET[ds]");
									 
								 }else {
									 $query2=" update  log_memo  set file_memo='$file_output.$ext' where  id_memo='$file_output' ";
									 $result2=pg_query($connection, $query2);
									 $query_update=" update  laporan_kerja set status='1' where  ticket_number='$ticket_number' ";
									 $res_update=pg_query($connection, $query_update);
									 
									 
									 
									 
									$q_get= " select *,b.satuan from laporan_kerja a  ";
									$q_get.= " left join master_case b on a.id_case=b.id_case where a.ticket_number='$ticket_number' ";
									$res_get=pg_query($connection, $q_get);
									$row_get=pg_fetch_array($res_get);
									$start_date=date('Y-m-d');
									$tot_sla=$row_get['sla']+$row_get['extend_sla']+0;
									$tot_extend=$row_get['extend_sla']+0;
									$tgl_sla=date('Y-m-d',strtotime(dateSla($start_date,$tot_sla,$row_get['satuan'])));
										$date_b = date_create($tgl_sla,timezone_open("Asia/Jakarta"));
										$date2 =date_add($date_b, date_interval_create_from_date_string("0 minutes"));
										$sys_date2 = date_format($date2, 'Y-m-d H:i:s');
										//$var_extsla=" ,extend_sla='$tot_extend',date_sla=date_trunc('second', TIMESTAMP '$sys_date2') ";
										$query_sla=" update laporan_kerja set extend_sla='$tot_extend',date_sla=date_trunc('second', TIMESTAMP '$sys_date2'), adddt=CURRENT_TIMESTAMP where ticket_number='$ticket_number' ";
										$res_sla=pg_query($connection, $query_sla);
										
										
										

									//=== for email ====
									$q_lapker =" select a.id_case,a.status,a.date_start,a.extend_sla,a.date_sla,a.sla,e.satuan,b.name as produk ,c.name as unit ,d.name as proses ,e.name as case, f.name as laporan,g.name as penyebab_bi,h.name as cabang,a.keterangan,e.name as nama_case from laporan_kerja a ";
									$q_lapker.=" left join master_product b on a.id_product=b.id_product ";
									$q_lapker.=" left join master_unit c on a.id_unit=c.id_unit ";
									$q_lapker.=" left join master_process d on a.id_process=d.id_process ";
									$q_lapker.=" left join master_case e on a.id_case=e.id_case ";
									$q_lapker.=" left join master_report f on a.id_report=f.id_report ";
									$q_lapker.=" left join bi_cause g on a.id_cause_bi=g.id_cause_bi ";
									$q_lapker.=" left join master_branch h on a.id_cabang=h.id_cabang ";
									$q_lapker.=" where a.ticket_number='$ticket_number' ";
									$res_lapker=pg_query($connection,$q_lapker);
									$row_lapker=pg_fetch_array($res_lapker);

									$jml_intval=$row_lapker['sla']+$row_lapker['extend_sla'];
									$batas_sla=dateSla($row_lapker['date_start'],$jml_intval,$row_lapker['satuan']);
									$email_message.="  Update From Pending Inquiry : <i>$keterangan</i><br>";
									$email_message.="  <br>";
									$email_message.="  <br>";
									$email_message.=" ------------------------------------------- Information Inquiry ----------------------------------------------------------- <br><br>";        
									$email_message.=" Request Ticket : <b>$ticket_number</b> <br>";
									$email_message.=" Tgl Request : <b>". date('d-m-Y',strtotime($row_lapker['date_start'])) ."</b> <br>";
									$email_message.=" SLA : <b>$row_lapker[sla] $row_lapker[satuan]</b> <br>";
									$email_message.=" Batas Akhir SLA : ".date('d-m-Y',strtotime($row_lapker['date_sla'])) ."<br>";
									$email_message.=" Cabang : $row_lapker[cabang] <br>";
									$email_message.=" Produk : $row_lapker[produk]<br>";
									$email_message.=" Unit : $row_lapker[unit]<br>";
									$email_message.=" Prosess : $row_lapker[proses]<br>";
									$email_message.=" Permasalahan : $row_lapker[case]<br>";
									$email_message.=" Penyebab Masalah BI : $row_lapker[penyebab_bi]<br>";
									$email_message.=" Keterangan : $row_lapker[keterangan]<br>";
									$email_message.=" <br><br><br><br>"; 
									$email_message.=" ----------------------------------------- <br>";
									$email_message.=" PT. Bank MNC Internasional, Tbk <br>";
									$email_message.=" <i>Commone System</i> <br>";
									$email_message.=" <i>www.mncbank.co.id</i><br>";

									BlasttMailCase("Create Inquiry ",$email_message,$_SESSION['SESS_EMAIL'],$row_lapker['case']);

									//=====================




									logActivity("COMPLETE DOCUMENT","num_ticket=$ticket_number, $keterangan, MENU=61 ");
									header("location: ../home?module=$_GET[module]&message=success&act1=$cat&iDisplayStart=$_GET[ds]");
									 
								 }
								 
								 
								 
								 
						 }



				} else {
						logActivity("Failed Upload document","num_ticket=$ticket_number, $keterangan, MENU=61 ");
						header("location: ../home?module=$_GET[module]&message=error&act1=$cat&iDisplayStart=$_GET[ds]");

					}


				break;

		case 'close':
			$message="memo_close";
		
			$query_update=" update  laporan_kerja set status='5', date_finish=CURRENT_TIMESTAMP  where  ticket_number='$ticket_number' ";
			
			//echo $query_update;
			//die();
			$res_update=pg_query($connection, $query_update);
			$result=logMemo($ticket_number,$id_process,"CANCEL : ".$keterangan);

				if ($result){
					  logActivity("CANCEL INQUIRY ","num_ticket=$ticket_number, $keterangan ,MENU=61 ");
					  header("location: ../home?module=$_GET[module]&message=memo_close&act1=$cat&iDisplayStart=$_GET[ds]");
				} else {
					  logActivity("ERROR CANCEL INQUIRY ","num_ticket=$ticket_number, $keterangan, MENU=61 ");
					  header("location: ../home?module=$_GET[module]&message=error_close&act1=$cat&iDisplayStart=$_GET[ds]");
					}
    
		break;
		
		//submit_memo_only
		case 'submit_memo_only':
			$message="submit_memo_only";
			$result=logMemo($ticket_number,$id_process,"ADD MEMO PENDING : ".$keterangan);

				if ($result){
					  logActivity("ADD MEMO PENDING ","num_ticket=$ticket_number, $keterangan ,MENU=61 ");
					  header("location: ../home?module=$_GET[module]&message=submit_memo_only&act1=$cat&iDisplayStart=$_GET[ds]");
				} else {
					  logActivity("ADD MEMO PENDING ","num_ticket=$ticket_number, $keterangan, MENU=61 ");
					  header("location: ../home?module=$_GET[module]&message=e_submit_memo_only&act1=$cat&iDisplayStart=$_GET[ds]");
					}
    
		break;

	}



   



}

####################################################### ADD SLA  ######################################################################

//if (isset($_GET['module'])==sha1('44') && ($_GET['act']=='add_sla')){
if (isset($_GET['module']) && ($_GET['act']=='add_sla')){

$numticket="$_POST[numticket]";
$ext_sla="$_POST[ext_sla]";
$idsatuan="$_POST[idsatuan]";
$keterangan=$_POST['ket_finish'];

//======= OLD get sla, extend_sla =========
$q_get= " select * from laporan_kerja where ticket_number='$numticket' ";
$res_get=pg_query($connection, $q_get);
$row_get=pg_fetch_array($res_get);
$start_date=date('Y-m-d',strtotime($row_get['date_start']));
$tot_sla=$row_get['sla']+$row_get['extend_sla']+$ext_sla;
$tot_extend=$row_get['extend_sla']+$ext_sla;
$tgl_sla=date('Y-m-d',strtotime(dateSla($start_date,$tot_sla,$idsatuan)));
      $date_b = date_create($tgl_sla,timezone_open("Asia/Jakarta"));
      $date2=date_add($date_b, date_interval_create_from_date_string("0 minutes"));
      $sys_date2 = date_format($date2, 'Y-m-d H:i:s');
// resolution_time_start=date_trunc('second', TIMESTAMP '$sys_date_start')
#####-----------------------
if ($row_get['status']=='1') {
$q_update=" update laporan_kerja set status='2' where ticket_number='$numticket' ";
$res_update=pg_query($connection,$q_update);
logActivity("Update laporan_kerja","num_ticket=$numticket,status=2");
}
#####-----------------------
$query=" update laporan_kerja set extend_sla='$tot_extend',date_sla=date_trunc('second', TIMESTAMP '$sys_date2') where ticket_number='$numticket' ";

//echo $query;
//die();
$result=pg_query($connection, $query);

if ($result)
      { 
        logMemo($numticket,$row_get['id_process'],"ADD SLA : $ext_sla $idsatuan, $keterangan");
        logActivity("ADD SLA","ticket_number=$numticket, extend_sla=$ext_sla");
        header("location: ../home?module=$_GET[module]&message=success_sla&act=src&srcby=1&srckey=$numticket");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error_sla&act=src&srcby=1&srckey=$numticket");

      }


}

####################################################### ADD KATEGORI FAQ ######################################################################

if (($_GET['module'])==sha1('35') && ($_GET['act']=='add_kategori_faq')){

$nama_kategori=$_POST['nama_kategori'];


$query=" insert into category_faq (name_category,adddt,addby) values ('$nama_kategori',CURRENT_TIMESTAMP,'".getUsername()."') ";
$result=pg_query($connection, $query);


  if ($result)
      {
        logActivity("Add Catgory FAQ","Nama kategori=$nama_kategori");
        header("location: ../home?module=$_GET[module]&message=success");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }


}
####################################################### EDIT KATEGORI FAQ ######################################################################

if (($_GET['module'])==sha1('35') && ($_GET['act']=='edit_kategori_faq')){
$id_kategori=$_POST['id_kategori'];
$ed_nama=$_POST['ed_nama'];

$query=" update  category_faq set name_category='$ed_nama' where id_catfaq='$id_kategori' ";


$result=pg_query($connection, $query);

if ($result)
      { logActivity("Update_category_faq","id_catfaq=$id_kategori, nama_kategori=$ed_nama");
        header("location: ../home?module=$_GET[module]&message=success3");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error3");

      }


}
####################################################### DELETE KATEGORI FAQ ######################################################################

if (($_GET['module'])==sha1('35') && ($_GET['act']=='delete_kategori_faq')){


$id_kategori=$_POST['id_kategori'];
$query=" delete from category_faq where id_catfaq='$id_kategori' ";
$result=pg_query($connection, $query);

if ($result)
      { logActivity("delete_category_faq","id_catfaq=$id_kategori");
        header("location: ../home?module=$_GET[module]&message=success2");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error2");

      }


}

####################################################### ADD KATEGORI PROMOTION ######################################################################

if (($_GET['module'])==sha1('34') && ($_GET['act']=='add_kategori_promotion')){

$nama_kategori=$_POST['nama_kategori'];


$query=" insert into category_promotion (name_category,adddt,addby) values ('$nama_kategori',CURRENT_TIMESTAMP,'".getUsername()."') ";
$result=pg_query($connection, $query);


  if ($result)
      {
        logActivity("Add Catgory Promotion","Nama kategori=$nama_kategori");
        header("location: ../home?module=$_GET[module]&message=success");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }


}
####################################################### EDIT KATEGORI PROMOTION  ######################################################################

if (($_GET['module'])==sha1('34') && ($_GET['act']=='edit_kategori_promotion')){
$id_kategori=$_POST['id_kategori'];
$ed_nama=$_POST['ed_nama'];

$query=" update  category_promotion set name_category='$ed_nama' where id_cat_pronews='$id_kategori' ";


$result=pg_query($connection, $query);

if ($result)
      { logActivity("Update_category_promotion","id_cat_pronews=$id_kategori, nama_kategori=$ed_nama");
        header("location: ../home?module=$_GET[module]&message=success3");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error3");

      }


}
####################################################### DELETE KATEGORI PROMOTION  ######################################################################

if (($_GET['module'])==sha1('34') && ($_GET['act']=='delete_kategori_promotion')){


$id_kategori=$_POST['id_kategori'];
$query=" delete from category_promotion where id_cat_pronews='$id_kategori' ";
$result=pg_query($connection, $query);

if ($result)
      { logActivity("delete_category_promotion","id_cat_pronews=$id_kategori");
        header("location: ../home?module=$_GET[module]&message=success2");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error2");

      }


}

####################################################### ADD KATEGORI PRODUCT ######################################################################

if (($_GET['module'])==sha1('33') && ($_GET['act']=='add_kategori_product')){

$nama_kategori=$_POST['nama_kategori'];


$query=" insert into category_productnews (name_category,adddt,addby) values ('$nama_kategori',CURRENT_TIMESTAMP,'".getUsername()."') ";
$result=pg_query($connection, $query);


  if ($result)
      {
        logActivity("Add Catgory Product","Nama kategori=$nama_kategori");
        header("location: ../home?module=$_GET[module]&message=success");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }


}

####################################################### EDIT KATEGORI PRODUCT  ######################################################################

if (($_GET['module'])==sha1('33') && ($_GET['act']=='edit_kategori_product')){
$id_kategori=$_POST['id_kategori'];
$ed_nama=$_POST['ed_nama'];

$query=" update  category_productnews set name_category='$ed_nama' where id_cat_pnews='$id_kategori' ";


$result=pg_query($connection, $query);

if ($result)
      { logActivity("Update_category_product","id_cat_pnews=$id_kategori, nama_kategori=$ed_nama");
        header("location: ../home?module=$_GET[module]&message=success3");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error3");

      }


}
####################################################### DELETE KATEGORI PRODUCT  ######################################################################

if (($_GET['module'])==sha1('33') && ($_GET['act']=='delete_kategori_product')){


$id_kategori=$_POST['id_kategori'];
$query=" delete from category_productnews where id_cat_pnews='$id_kategori' ";
$result=pg_query($connection, $query);

if ($result)
      { logActivity("delete_category_product","id_cat_pnews=$id_kategori");
        header("location: ../home?module=$_GET[module]&message=success2");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error2");

      }


}

//add_productnews 30
####################################################### ADD  PRODUCT NEWS ######################################################################

if (($_GET['module'])==sha1('30') && ($_GET['act']=='add_productnews')){

//echo "add_productnews";
//die();


$judul=$_POST['judul'];
$kontent=$_POST['kontent'];
$file_img=$_POST['file_img'];
$id_kategori=$_POST['id_kategori'];
$publish=$_POST['publish'];

if(isset($_FILES['file_img']['tmp_name']) && $_FILES['file_img']['tmp_name']!="" && $_FILES['file_img']['tmp_name']!=NULL) {
//if(is_uploaded_file($_FILES['file_img']['tmp_name'])) {

  $image_temp=$_FILES['file_img']['tmp_name'];
  $nama=$_FILES['file_img']['name'];
  $type=$_FILES['file_img']['type'];
  $ext = pathinfo($nama, PATHINFO_EXTENSION);
//echo $ext;

  }

$query=" insert into product_news (title,news,id_cat_pnews,status,adddt,addby) values ('$judul','$kontent','$id_kategori','$publish',CURRENT_TIMESTAMP,'".getUsername()."') returning id_pnews ";
$result=pg_query($connection, $query);
$row=pg_fetch_array($result);
$image_name="$row[id_pnews]";

$directory="../images/img-prodnews/".$image_name.".$ext";
copy($image_temp,$directory);

$query2=" update product_news set image='$image_name.$ext'  where id_pnews='$row[id_pnews]' ";
$result2=pg_query($connection, $query2);

  if ($result2)
      {
        logActivity("Add Product News","Judul=$judul,id_kategori=$id_kategori,id=$row[id_pnews]");
        header("location: ../home?module=$_GET[module]&message=success");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }


}

####################################################### DELETE  PRODUCT NEWS  ######################################################################

if (($_GET['module'])==sha1('30') && ($_GET['act']=='delete_pronews')){

$id_pnews=$_POST['id_pnews'];


$query=" delete from product_news where id_pnews='$id_pnews' ";
$result=pg_query($connection, $query);

  if ($result)
      {
        logActivity("Delete PRODUCT NEWS","id_pnews=$id_pnews");
        header("location: ../home?module=$_GET[module]&message=success2");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error2");

      }


}

####################################################### EDIT  PRODUCT NEWS  ######################################################################

if (($_GET['module'])==sha1('30') && ($_GET['act']=='edit_productnews')){
$pm=$_GET['pm'];
$id_pnews=$_POST['id_pnews'];
$judul=$_POST['judul'];
$kontent=$_POST['kontent'];
$file_img=$_POST['file_img'];
$id_kategori=$_POST['id_kategori'];
$publish=$_POST['publish'];

$gambar=$_POST['gambar'];


if(isset($_FILES['file_img']['tmp_name']) && $_FILES['file_img']['tmp_name']!="" && $_FILES['file_img']['tmp_name']!=NULL){
//if(is_uploaded_file($_FILES['file_img']['tmp_name'])) {


//echo "edit product...!";
//die();
  $image_temp=$_FILES['file_img']['tmp_name'];
  $nama=$_FILES['file_img']['name'];
  $type=$_FILES['file_img']['type'];
  $ext = pathinfo($nama, PATHINFO_EXTENSION);
//echo $ext;


  //echo $gambar;
  //die();

         if (file_exists("../images/img-prodnews/$gambar")){
           unlink("../images/img-prodnews/$gambar");
          }
           
            $directory="../images/img-prodnews/".$id_pnews.".$ext";
             //echo $directory;
  //die();
            copy($image_temp,$directory);

            $var_img=" ,image='$id_pnews.$ext' ";
          
  } else {
    $var_img=" ";
  }


$query=" update product_news set title='$judul',news='$kontent', id_cat_pnews='$id_kategori', status='$publish' $var_img where  id_pnews='$id_pnews' ";
$result=pg_query($connection, $query);


//$query2=" update product_news set image='$image_name.$ext'  where id_pnews='$row[id_pnews]' ";
//$result2=pg_query($connection, $query2);



  if ($result)
      {
        
            

        logActivity("EDIT PRODUCT NEWS","id_pnews=$id_pnews,title=$judul,news=$kontent, id_cat_pnews=$id_kategori, status=$publish ");
        header("location: ../home?module=$_GET[module]&message=success3&pm=$pm&act=ed&idx=$id_pnews");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error3&pm=$pm&act=ed&idx=$id_pnews");

      }


}


####################################################### ADD  PROMOTION NEWS ######################################################################

if (($_GET['module'])==sha1('31') && ($_GET['act']=='add_promotionnews')){

$judul=$_POST['judul'];
$kontent=$_POST['kontent'];
$file_img=$_POST['file_img'];
$id_kategori=$_POST['id_kategori'];
$publish=$_POST['publish'];

if(isset($_FILES['file_img']['tmp_name']) && $_FILES['file_img']['tmp_name']!="" && $_FILES['file_img']['tmp_name']!=NULL){

//if(is_uploaded_file($_FILES['file_img']['tmp_name'])) {

  $image_temp=$_FILES['file_img']['tmp_name'];
  $nama=$_FILES['file_img']['name'];
  $type=$_FILES['file_img']['type'];
  $ext = pathinfo($nama, PATHINFO_EXTENSION);
//echo $ext;
//die();

  }

$query=" insert into promotion_news (title,news,id_cat_pronews,status,adddt,addby) values ('$judul','$kontent','$id_kategori','$publish',CURRENT_TIMESTAMP,'".getUsername()."') returning id_pronews ";
$result=pg_query($connection, $query);
$row=pg_fetch_array($result);
$image_name="$row[id_pronews]";

$directory="../images/img-promnews/".$image_name.".$ext";
copy($image_temp,$directory);

$query2=" update promotion_news set image='$image_name.$ext'  where id_pronews='$row[id_pronews]' ";
$result2=pg_query($connection, $query2);

  if ($result2)
      {
        logActivity("Add Promotion News","Judul=$judul,id_kategori=$id_kategori,id=$row[id_pronews]");
        header("location: ../home?module=$_GET[module]&message=success");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }


}

####################################################### DELETE  PROMOTION NEWS  ######################################################################

if (($_GET['module'])==sha1('31') && ($_GET['act']=='delete_promotionnews')){

$id_pronews=$_POST['id_pnews'];

$query=" delete from promotion_news where id_pronews='$id_pronews' ";
$result=pg_query($connection, $query);

  if ($result)
      {
        logActivity("Delete PROMOTION NEWS","id_pronews=$id_pronews");
        header("location: ../home?module=$_GET[module]&message=success2");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error2");

      }


}
####################################################### EDIT  PROMOTION NEWS  ######################################################################

if (($_GET['module'])==sha1('31') && ($_GET['act']=='edit_promotionnews')){
$pm=$_GET['pm'];
$id_pronews=$_POST['id_pronews'];
$judul=$_POST['judul'];
$kontent=$_POST['kontent'];
$file_img=$_POST['file_img'];
$id_kategori=$_POST['id_kategori'];
$publish=$_POST['publish'];

$gambar=$_POST['gambar'];

if(isset($_FILES['file_img']['tmp_name']) && $_FILES['file_img']['tmp_name']!="" && $_FILES['file_img']['tmp_name']!=NULL){
//if(is_uploaded_file($_FILES['file_img']['tmp_name'])) {

  $image_temp=$_FILES['file_img']['tmp_name'];
  $nama=$_FILES['file_img']['name'];
  $type=$_FILES['file_img']['type'];
  $ext = pathinfo($nama, PATHINFO_EXTENSION);
//echo $ext;


  //echo $gambar;
  //die();
            if (file_exists("../images/img-promnews/$gambar")){
            unlink("../images/img-promnews/$gambar");
          }
            $directory="../images/img-promnews/".$id_pronews.".$ext";
             //echo $directory;
  //die();
            copy($image_temp,$directory);

            $var_img=" ,image='$id_pronews.$ext' ";
          
  } else {
    $var_img=" ";
  }


$query=" update promotion_news set title='$judul',news='$kontent', id_cat_pronews='$id_kategori', status='$publish' $var_img  where  id_pronews='$id_pronews' ";

//echo "$query";
//die();

$result=pg_query($connection, $query);


//$query2=" update product_news set image='$image_name.$ext'  where id_pnews='$row[id_pnews]' ";
//$result2=pg_query($connection, $query2);



  if ($result)
      {
        
            

        logActivity("EDIT PROMOTION NEWS","id_pronews=$id_pronews,title=$judul,news=$kontent, id_cat_pnews=$id_kategori, status=$publish ");
        header("location: ../home?module=$_GET[module]&message=success3&pm=$pm&act=ed&idx=$id_pronews");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error3&pm=$pm&act=ed&idx=$id_pronews");

      }


}

####################################################### ADD  FAQ  ######################################################################

if (($_GET['module'])==sha1('32') && ($_GET['act']=='add_faqnews')){

$pertanyaan=$_POST['pertanyaan'];
$jawaban=$_POST['jawaban'];
$id_kategori=$_POST['id_kategori'];
$publish=$_POST['publish'];

$query=" insert into faq (question,answer,id_catfaq,status,adddt,addby) values ('$pertanyaan','$jawaban','$id_kategori','$publish',CURRENT_TIMESTAMP,'".getUsername()."') ";
$result=pg_query($connection, $query);

  if ($result)
      {
        logActivity("Add FAQ","pertanyaan=$pertanyaan,Jawaban=$jawaban,id_kategori=$id_kategoris");
        header("location: ../home?module=$_GET[module]&message=success");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error");

      }


}
####################################################### DELETE  FAQ  ######################################################################

if (($_GET['module'])==sha1('32') && ($_GET['act']=='delete_faq')){

$id_faq=$_POST['id_faq'];


$query=" delete from faq where id_faq='$id_faq' ";
$result=pg_query($connection, $query);

  if ($result)
      {
        logActivity("Delete FAQ","id_faq=$id_faq");
        header("location: ../home?module=$_GET[module]&message=success2");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error2");

      }


}

####################################################### EDIT  FAQ  ######################################################################

if (($_GET['module'])==sha1('32') && ($_GET['act']=='edit_faq')){
$ed_question=$_POST['ed_question'];
$ed_answer=$_POST['ed_answer'];
$ed_id_kategori=$_POST['ed_id_kategori'];
$ed_publish=$_POST['ed_publish'];
$id_faq=$_POST['id_faq'];

$query=" update faq set question='$ed_question', answer='$ed_answer',id_catfaq='$ed_id_kategori',status='$ed_publish' where id_faq='$id_faq' ";
$result=pg_query($connection, $query);

  if ($result)
      {
        logActivity("EDIT FAQ","id_faq=$id_faq,question=$ed_question, answer=$ed_answer,id_catfaq=$ed_id_kategori,status=$ed_publish ");
        header("location: ../home?module=$_GET[module]&message=success3");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error3");

      }


}


####################################################### ATTACH FILE  ######################################################################
//===========================
if (isset($_GET['module']) && ($_GET['act']=='lampir-file')){

if(isset($_FILES['file_attach']['tmp_name']) && $_FILES['file_attach']['tmp_name']!="" && $_FILES['file_attach']['tmp_name']!=NULL){

//if(is_uploaded_file($_FILES['file_attach']['tmp_name'])) {

  $image_temp=$_FILES['file_attach']['tmp_name'];
  $nama=$_FILES['file_attach']['name'];
  $type=$_FILES['file_attach']['type'];
  $ext = pathinfo($nama, PATHINFO_EXTENSION);

  }


$keterangan=$_POST['ket_finish'];
$ticket_number=$_POST['fwd_ticket_number2'];
$id_process=$_POST['fwd_id_process2'];

$query  =" insert into log_memo (ticket_number,memo_date,id_karyawan,keterangan,id_process )  ";
$query .=" values ('$ticket_number', CURRENT_TIMESTAMP,'".getUsername()."','ATTACH FILE : $keterangan','$id_process') returning id_memo ";

$result=pg_query($connection, $query);
$row=pg_fetch_array($result);
$file_output="$row[id_memo]";

$query2=" update  log_memo  set file_memo='$file_output.$ext' where  id_memo='$file_output' ";
$result2=pg_query($connection, $query2);
//echo $query;
//die();
/*
if ($row_cek['status']=='1') {
$q_update=" update laporan_kerja set status='2' where ticket_number='$ticket_number' ";
$res_update=pg_query($connection,$q_update);
logActivity("Update laporan_kerja","num_ticket=$num_ticket,status=2");
}
*/



  if ($result)

      {
         $directory="../data/file-attach/".$file_output.".$ext";
         copy($image_temp,$directory);

        logActivity("Lampirkan File","ticket_number=$ticket_number, keterangan=$keterangan, file_memo=$file_output.$ext");
         header("location: ../home?module=$_GET[module]&message=success_attach&act=src&srcby=1&srckey=$ticket_number&idx=$id_lapker");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error_attach&act=src&srcby=1&srckey=$ticket_number ");

      }


}
####################################################### EDIT PROFILE  ######################################################################

if (($_GET['module'])==sha1('52') && ($_GET['act']=='edit_profile')){

$id_karyawan=$_POST['id_karyawan'];

$nama_lengkap=$_POST['nama_lengkap'];
$myemail=$_POST['myemail'];
$tlp=$_POST['tlp'];

if(isset($_FILES['file_img']['tmp_name']) && $_FILES['file_img']['tmp_name']!="" && $_FILES['file_img']['tmp_name']!=NULL){
//if(is_uploaded_file($_FILES['file_img']['tmp_name'])) {

  $image_temp=$_FILES['file_img']['tmp_name'];
  $nama=$_FILES['file_img']['name'];
  $type=$_FILES['file_img']['type'];
  $ext = pathinfo($nama, PATHINFO_EXTENSION);
//echo $ext;
  $directory="../images/profile/".$id_karyawan.".$ext";
  copy($image_temp,$directory);
  $_SESSION['SESS_IMG'] = $id_karyawan.".$ext";
  }


$query=" update user_account set nama_lengkap='$nama_lengkap', email='$myemail', tlp='$tlp',image='".$id_karyawan.".$ext' where id_karyawan='$id_karyawan' ";
$result=pg_query($connection, $query);

  if ($result)
      {
        $_SESSION['SESS_NAMA_LENGKAP'] = $nama_lengkap;
        $_SESSION['SESS_EMAIL'] = $myemail;
        $_SESSION['SESS_TLP'] = $tlp;
        //$_SESSION['SESS_IMG'] = $fix_image;
        logActivity("Edit PROFILE","id_karyawan=$id_karyawan,nama_lengkap=$nama_lengkap, email=$myemail, tlp=$tlp");
        header("location: ../home?module=$_GET[module]&message=success3");
    } else  {
        header("location: ../home?module=$_GET[module]&message=error3");

      }


}



####################################################### ADD JENIS MNC PAY ######################################################################

if (($_GET['module'])==sha1('70') && ($_GET['act']=='add_jenis_mncpay')){

$plan_code=$_POST['plan_code'];
$product_code=$_POST['product_code'];
$interest_rate=$_POST['interest_rate'];


$query=" insert into mncpay_jenis (plan_code,product_code,interest_rate) values ('$plan_code','$product_code','$interest_rate') ";
$result=pg_query($connection, $query);

  if ($result)
      {
        logActivity("ADD JENIS MNCPAY","plan_code=$plan_code,product_code=$product_code,interest_rate=$interest_rate ");
        header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
    } else  {
        logActivity("ADD JENIS MNCPAY","plan_code=$plan_code,product_code=$product_code,interest_rate=$interest_rate ");
        header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error");

      }


}

####################################################### DELETE JENIS MNC PAY  ######################################################################

if (($_GET['module'])==sha1('70') && ($_GET['act']=='delete_jenis_mncpay')){

$id_jenis_mncpay=$_POST['id_jenis_mncpay'];
//$product_code=$_POST['product_code'];
//$interest_rate=$_POST['interest_rate'];


$query=" delete from mncpay_jenis where  id_jenis_mncpay ='$id_jenis_mncpay' ";
$result=pg_query($connection, $query);

  if ($result)
      {
        logActivity("DELETE JENIS MNCPAY","id_jenis_mncpay =$id_jenis_mncpay ");
        header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=succDel");
    } else  {
        logActivity("DELETE JENIS MNCPAY","id_jenis_mncpay =$id_jenis_mncpay ");
        header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=errDel");

      }


}




####################################################### UPDATE JENIS MNC PAY  ######################################################################

if (($_GET['module'])==sha1('70') && ($_GET['act']=='edit_jenis_mncpay')){

$id_jenis_mncpay=$_POST['id_jenis_mncpay'];

$plan_code=$_POST['ed_plan_code'];
$product_code=$_POST['ed_product_code'];
$interest_rate=$_POST['ed_interest_rate'];


$query=" update mncpay_jenis set plan_code='$plan_code',product_code='$product_code',interest_rate='$interest_rate' where id_jenis_mncpay='$id_jenis_mncpay' ";

$result=pg_query($connection, $query);

  if ($result)
      {
        logActivity("UPDATE JENIS MNCPAY","plan_code=$plan_code,product_code=$product_code,interest_rate=$interest_rate,id_jenis_mncpay =$id_jenis_mncpay ");
        header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=succUp");
    } else  {
        logActivity("UPDATE JENIS MNCPAY","plan_code=$plan_code,product_code=$product_code,interest_rate=$interest_rate,id_jenis_mncpay =$id_jenis_mncpay ");
        header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=errUp");

      }


}

####################################################### REQUEST MNC PAY  ######################################################################

if (($_GET['module'])==sha1('63') && ($_GET['act']=='request_mncpay')){




  $id_karyawan=$_POST['id_employee'];
  $customer_name=$_POST['customer_name'];
  $credit_card_number =$_POST['credit_card_number'];
  $transaction_date =$_POST['tanggal_transaksi'];
  //$input_date 
  $approval_code =$_POST['approval_code'];
  $merchant_name =$_POST['merchant_name'];
  $transaction_nominal =$_POST['nominal_trans'];
  $plan_code =$_POST['plan_code'];
  $product_code =$_POST['product_code'];
  $interest_rate =$_POST['interest_rate'];
  $interest_nominal =$_POST['interest_nominal'];
  $tenor =$_POST['tenor'];
  $total_nominal =$_POST['total_nominal'];
  $installment_nominal =$_POST['installment_nominal'];
  $keterangan =$_POST['keterangan'];
  $status =1;

$query =" insert into  mncpay_pengajuan (id_karyawan,customer_name,credit_card_number,transaction_date,input_date,approval_code,merchant_name, ";
$query.=" transaction_nominal,plan_code,product_code,interest_rate,interest_nominal,tenor,total_nominal,installment_nominal,keterangan,status  )";
$query.=" VALUES ('$id_karyawan','$customer_name','$credit_card_number','$transaction_date',CURRENT_TIMESTAMP,'$approval_code','$merchant_name', ";
$query.=" '$transaction_nominal','$plan_code','$product_code','$interest_rate','$interest_nominal','$tenor','$total_nominal',";
$query.=" '$installment_nominal','$keterangan','$status' ) ";


//echo $query;
//die();


$result=pg_query($connection, $query);
 
  if ($result)
      {
        logActivity("INPUT REQUEST MNCPAY","id_karyawan=$id_karyawan,customer_name=$customer_name,credit_card_number=$credit_card_number,transaction_date=$transaction_date,input_date=,approval_code=$approval_code,merchant_name=$merchant_name,transaction_nominal=$transaction_nominal,plan_code=$plan_code,product_code=$product_code,interest_rate=$interest_rate,interest_nominal=$interest_nominal,tenor=$tenor,total_nominal=$total_nominal,installment_nominal=$installment_nominal,keterangan=$keterangan,status=$status");
        //logActivity("INPUT REQUEST MNCPAY","$query");
		header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
    } else  {
        logActivity("INPUT REQUEST MNCPAY","id_karyawan=$id_karyawan,customer_name=$customer_name,credit_card_number=$credit_card_number,transaction_date=$transaction_date,input_date=,approval_code=$approval_code,merchant_name=$merchant_name,transaction_nominal=$transaction_nominal,plan_code=$plan_code,product_code=$product_code,interest_rate=$interest_rate,interest_nominal=$interest_nominal,tenor=$tenor,total_nominal=$total_nominal,installment_nominal=$installment_nominal,keterangan=$keterangan,status=$status");
        //logActivity("INPUT REQUEST MNCPAY","$query");
        
		header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error");

      }


}


####################################################### REQUEST FORM LEADS  ######################################################################

if (($_GET['module'])==sha1('67') && ($_GET['act']=='request_form_leads')){




$customer_name=$_POST['customer_name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$tgl_meeting=$_POST['tgl_meeting'];
$id_channel=$_POST['id_channel'];
$id_purpose=$_POST['id_purpose'];
$city=$_POST['city'];


$query =" insert into  data_leads (customer_name,phone,email,kota_domisili,tgl_meeting,id_channel,id_purpose,status,adddt,tgl_verifikasi ) ";
$query.=" VALUES ('$customer_name','$phone','$email','$city','$tgl_meeting','$id_channel','$id_purpose','1',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP) ";


//echo $query;
//die();


$result=pg_query($connection, $query);

  if ($result)
      {
        logActivity("REQUEST LEADS","customer_name=$customer_name,phone=$phone,email=$email,kota_domisili=$city,tgl_meeting=$tgl_meeting,id_channel=$id_channel,id_purpose=$id_purpose");
        header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
    } else  {
        logActivity("REQUEST LEADS","customer_name=$customer_name,phone=$phone,email=$email,kota_domisili=$city,tgl_meeting=$tgl_meeting,id_channel=$id_channel,id_purpose=$id_purpose");
        header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error");

      }


}


####################################################### ADD DAFTAR KEPERLUAN ######################################################################

if (($_GET['module'])==sha1('69') && ($_GET['act']=='add_daftar_keperluan')){

$description=$_POST['description'];

$query=" insert into daftar_keperluan (description) values ('$description') ";
//echo $query;
//die();

$result=pg_query($connection, $query);

  if ($result)
      {
        logActivity("ADD DAFTAR KEPERLUAN","description=$description");
        header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
    } else  {
        logActivity("ADD DAFTAR KEPERLUAN","description=$description ");
        header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error");

      }


}

####################################################### DELETE DAFTAR KEPERLUAN  ######################################################################

if (($_GET['module'])==sha1('69') && ($_GET['act']=='delete_daftar_keperluan')){

$id_purpose=$_POST['id_purpose'];



$query=" delete from daftar_keperluan where  id_purpose ='$id_purpose' ";
$result=pg_query($connection, $query);

  if ($result)
      {
        logActivity("DELETE DAFTAR KEPERLUAN","id_purpose =$id_purpose ");
        header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=succDel");
    } else  {
        logActivity("DELETE DAFTAR KEPERLUAN","id_purpose =$id_purpose ");
        header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=errDel");

      }


}




####################################################### UPDATE DAFTAR KEPERLUAN  ######################################################################

if (($_GET['module'])==sha1('69') && ($_GET['act']=='edit_daftar_keperluan')){

$id_purpose=$_POST['id_purpose'];

$description=$_POST['ed_description'];


$query=" update daftar_keperluan set description='$description' where id_purpose='$id_purpose' ";

$result=pg_query($connection, $query);

  if ($result)
      {
        logActivity("UPDATE DAFTAR KEPERLUAN","description=$description,id_purpose=$id_purpose ");
        header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=succUp");
    } else  {
        logActivity("UPDATE DAFTAR KEPERLUAN","description=$description,id_purpose=$id_purpose ");
        header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=errUp");

      }


}



####################################################### EDIT INQUIRY  ######################################################################

if (($_GET['module'])==sha1('72') && ($_GET['act']=='edit_inquirysl')) {

$ticket_number=$_POST['ticket_number'];

$customer_name=$_POST['customer_name'];
$phone=$_POST['phone'];
$credit_card_number=$_POST['credit_card_number'];
$account_number=$_POST['account_number'];
$email=$_POST['email'];
$atm_number=$_POST['atm_number'];

$idproduct=$_POST['idproduct'];
$idunit=$_POST['idunit'];
$idproses=$_POST['idproses'];
$idpermasalahan=$_POST['idpermasalahan'];

$idpenyebab=$_POST['idpenyebab'];
$idjenis_laporan=$_POST['idjenis_laporan'];

$keterangan=$_POST['keterangan'];
$call_to_close=$_POST['call_to_close'];
$nominal=$_POST['nominal'];
$tanggal_transaksi=date('Y-m-d',strtotime($_POST['tanggal_transaksi']));

# customer name
  if (isset($customer_name) && $customer_name!="" && $customer_name !=NULL){
        $var_cusname=" set customer_name='$customer_name' ";
  } else {  
        $var_cusname=" ";
      }
# phone
  if (isset($phone) && $phone!="" && $phone !=NULL){
        $var_phone=", phone='$phone' ";
  } else {  
        $var_phone=" ";
      }
# Credit card
  if (isset($credit_card_number) && $credit_card_number!="" && $credit_card_number !=NULL){
        $var_ccn=", credit_card_number='$credit_card_number' ";
  } else {  
        $var_ccn=" ";
      }
# Account Number
  if (isset($account_number) && $account_number!="" && $account_number !=NULL){
        $var_accnumber=", account_number='$account_number' ";
  } else {  
        $var_accnumber=" ";
      }
# Email
  if (isset($email) && $email!="" && $email !=NULL){
        $var_email=", email='$email' ";
  } else {  
        $var_email=" ";
      }
# ATM Number
  if (isset($atm_number) && $atm_number!="" && $atm_number !=NULL){
        $var_atm_number=", atm_number='$atm_number' ";
  } else {  
        $var_atm_number=" ";
      }

# Product
  if (isset($idproduct) && $idproduct!="" && $idproduct !=NULL){
        $var_product=", id_product='$idproduct' ";
  } else {  
        $var_product=" ";
      }
# Unit
  if (isset($idunit) && $idunit!="" && $idunit !=NULL){
        $var_unit=", id_unit='$idunit' ";
  } else {  
        $var_unit=" ";
      }
# Process
  if (isset($idproses) && $idproses!="" && $idproses !=NULL){
        $var_process=", id_process='$idproses' ";
  } else {  
        $var_process=" ";
      }
# Case 
  if (isset($idpermasalahan) && $idpermasalahan!="" && $idpermasalahan !=NULL){
        $var_case=", id_case='$idpermasalahan' ";
  } else {  
        $var_case=" ";
      }
# Penyebab BI 
  if (isset($idpenyebab) && $idpenyebab!="" && $idpenyebab !=NULL){
        $var_penyebab=", id_cause_bi='$idpenyebab' ";
  } else {  
        $var_penyebab=" ";
      }
# jenis Laporan 
  if (isset($idjenis_laporan) && $idjenis_laporan!="" && $idjenis_laporan !=NULL){
        $var_laporan=", id_report='$idjenis_laporan' ";
  } else {  
        $var_laporan=" ";
      }
# Keterangan 
  if (isset($keterangan) && $keterangan!="" && $keterangan !=NULL){
        $var_keterangan=", keterangan='$keterangan' ";
  } else {  
        $var_keterangan=" ";
      }
# Call to Close 
  if (isset($call_to_close) && $call_to_close!="" && $call_to_close !=NULL){
        $var_calltoclose=", call_to_close='$call_to_close' ";
  } else {  
        $var_calltoclose=" ";
      }
# Nominal
  if (isset($nominal) && $nominal!="" && $nominal !=NULL){
        $var_nominal=", nominal='$nominal' ";
  } else {  
        $var_nominal=" ";
      }
# Tgl Transaksi 

  if (isset($tanggal_transaksi) && $tanggal_transaksi!="" && $tanggal_transaksi !=NULL && $tanggal_transaksi !="1970-01-01" ){
        $date_c = date_create(date('Y-m-d',strtotime($tanggal_transaksi)),timezone_open("Asia/Jakarta"));
        $date3=date_add($date_c, date_interval_create_from_date_string("0 minutes"));
        $sys_date3 = date_format($date3, 'Y-m-d');
        $var_tgltrans=", tgl_transaksi=date_trunc('second', TIMESTAMP '$sys_date3') ";
  } else {  
        $var_tgltrans=", tgl_transaksi=NULL ";
      }
# SLA Perhitugan
$date_start=getDatestart($ticket_number);
$q_case=" select  sla,satuan from master_case where id_case='$idpermasalahan' ";
$rest_case=pg_query($connection,$q_case);
$r_case=pg_fetch_array($rest_case);
$batas_sla1=date('Y-m-d',strtotime(dateSla($date_start,$r_case['sla'],$r_case['satuan'])));

		$date_temp = date_create(date('Y-m-d',strtotime($batas_sla1)),timezone_open("Asia/Jakarta"));
        $date_=date_add($date_temp, date_interval_create_from_date_string("0 minutes"));
        $sys_date = date_format($date_, 'Y-m-d');
        $var_dateSLA=", date_sla=date_trunc('second', TIMESTAMP '$sys_date') ";




$query =" update laporan_kerja $var_cusname $var_phone $var_ccn $var_accnumber $var_email $var_atm_number $var_product $var_unit ";
$query.=" $var_process $var_case $var_penyebab $var_laporan $var_keterangan $var_calltoclose $var_nominal $var_tgltrans $var_dateSLA ";
$query.=" where ticket_number='$ticket_number' ";
$result=pg_query($connection, $query); 
//echo $query;
//die();

EmailUpdateinquiry($ticket_number);  


  if ($result)
      {
        logActivity("EDIT INQUIRY","ticket_number='$ticket_number'");
        header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=succUp");
    } else  {
        logActivity("EDIT INQUIRY","ticket_number='$ticket_number'");
        header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=errUp");

      }


}



####################################################### UPDATE DONE MNCPAY ######################################################################

if (($_GET['module'])==sha1('64') && ($_GET['act']=='verify_mncpay')){

$id_mncpay=$_POST['id_mncpay'];

$query=" update mncpay_pengajuan set status='2', date_finish=CURRENT_TIMESTAMP , finish_by='".getUsername()."' where id_mncpay='$id_mncpay' ";

$result=pg_query($connection, $query);

  if ($result)
      {
        logActivity("VERIFY MNCPAY SUCCESS "," id_mncpay=$id_mncpay , finish_by=".getUsername()." ");
        header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=succUp");
    } else  {
        logActivity("VERIFY MNCPAY FAILED ","id_mncpay=$id_mncpay");
        header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=errUp");

      }


}

?>