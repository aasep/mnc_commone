<?php

/*######################################################################*\
#            				FUNCTION LIBRARY			                 #
# -----------------------------------------------------------------------#
# 																		 #
#  																		 #
#  	Developed by:	Asep Arifyan						    			 #
#	License:		Commercial											 #
#  	Copyright: 		2016. All Rights Reserved.		                     #
#                                                                        #
#  	Additional modules (embedded): 										 #
#	-- Metronic (Themes) 												 #
#																		 #
#																		 #
# -----------------------------------------------------------------------#
#	Designed and built with all the love and loyalty.					 #
\*######################################################################*/
//date_default_timezone_set("US/Pacific"); 
date_default_timezone_set("Asia/Jakarta");
$user_agent     =   $_SERVER['HTTP_USER_AGENT'];	  

function getUsername(){
		$username = $_SESSION['SESS_USERNAME'];
		return $username;
	}
function getStatusAccount(){
		$status = $_SESSION['SESS_STATUS_ACCOUNT'];
		return $status;
	}
function getPassword(){
		$pass = $_SESSION['SESS_PASSWORD'];
		return $pass;
	}
function getGroupUser(){
		$group = $_SESSION['SESS_GROUP_USER'];
		return $group;
	}

function getIdCabang(){
		$fix_id_cabang = $_SESSION['SESS_ID_CABANG'];
		return $fix_id_cabang;
	}
function getNamaCabang(){
		global $connection;
		$query=" SELECT name FROM master_branch  where id_cabang='$_SESSION[SESS_ID_CABANG]' ";
		$result=pg_query($connection,$query);
		$found = pg_num_rows($result);
		if ($found >=1)
		{
			$row = pg_fetch_array($result);
			$nama=$row['name'];
			return $nama;
			}
	}
function getIdUnit(){
        $fix_id_unit= $_SESSION['SESS_ID_UNIT'];
        return $fix_id_unit;
    }
function getNamaUnit(){
        global $connection;
        $query="SELECT name FROM master_unit  where id_unit='$_SESSION[SESS_ID_UNIT]' ";
        $result=pg_query($connection,$query);
        $found = pg_num_rows($result);
        if ($found >=1)
        {
            $row = pg_fetch_array($result);
            $nama=$row['name'];
            return $nama;
            }
    }
function getIdJabatan(){
		$fix_id_jabatan = $_SESSION['SESS_ID_JABATAN'];
		return $fix_id_jabatan;
	}
function getNamaJabatan(){
		global $connection;
		$query="SELECT name FROM master_jabatan  where id_jabatan='$_SESSION[SESS_ID_JABATAN]' ";
		$result=pg_query($connection,$query);
		$found = pg_num_rows($result);
		if ($found >=1)
		{
			$row = pg_fetch_array($result);
			$nama=$row['name'];
			return $nama;
			}
	}
function getNamaLengkap(){
		$fix_nama_lengkap = $_SESSION['SESS_NAMA_LENGKAP'];
		return $fix_nama_lengkap;
	}
function getEmail(){
		$fix_email = $_SESSION['SESS_EMAIL'];
		return $fix_email;
	}
function getIdChannel(){
		$fix_id_channel = $_SESSION['SESS_ID_CHANNEL'];
		return $fix_id_channel;
	}
function getNamaChannel(){
		global $connection;
		$query=" SELECT name FROM master_channel  where id_channel='$_SESSION[SESS_ID_CHANNEL]' ";
		$result=pg_query($connection,$query);
		$found = pg_num_rows($result);
		if ($found >=1)
		{
			$row = pg_fetch_array($result);
			$nama=$row['name'];
			return $nama;
			}
	}
function getIdPic(){
		$fix_id_pic = $_SESSION['SESS_ID_PIC'];
		return $fix_id_pic;
	}
function getNamaPic(){
        global $connection;
        $query=" SELECT name FROM master_pic  where id_pic='$_SESSION[SESS_ID_PIC]' ";
        $result=pg_query($connection,$query);
        $found = pg_num_rows($result);
        if ($found >=1)
        {
            $row = pg_fetch_array($result);
            $nama=$row['name'];
            return $nama;
            }
    }
function getNamaPic2($idpic){
        global $connection;
        $query=" SELECT name FROM master_pic  where id_pic='$idpic' ";
        $result=pg_query($connection,$query);
        $found = pg_num_rows($result);
        if ($found >=1)
        {
            $row = pg_fetch_array($result);
            $nama=$row['name'];
            return $nama;
            }
    }
function getTlp(){
        $fix_tlp = $_SESSION['SESS_TLP'];
        return $fix_tlp;
    }
function getImage(){
        $fix_image = $_SESSION['SESS_IMG'];
        return $fix_image;
    }

function getGroupUserName(){
		global $connection;
		$query="SELECT name FROM group_type  where id_group_type='$_SESSION[SESS_GROUP_USER]' ";
		$result=pg_query($connection,$query);
		$found = pg_num_rows($result);
		if ($found >=1)
		{
			$row = pg_fetch_array($result);
			$nama_group=$row['name'];
			return $nama_group;
			}
	}

function getIp(){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    		$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
   			 $ip = $_SERVER['REMOTE_ADDR'];
		}

return $ip;

	}

function getBrowser(){
		if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE)
   			$browser='Internet explorer';
 			elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) //For Supporting IE 11
    			$browser='Internet explorer';
				 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
   					$browser='Mozilla Firefox';
 					elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
 					  $browser='Google Chrome';
						 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE)
   							$browser="Opera Mini";
 								elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
   									$browser="Opera";
 									elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE)
   										$browser="Safari";
 											else
  											 $browser='Browser Lain';
return $browser;

	}

function getBrowser2() 
{ 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    } 
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 
    } 
    elseif(preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    } 

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }

    // check if we have a number
    if ($version==null || $version=="") {$version="?";}

    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
} 

function versionBrowser() { 
$ua=getBrowser2();
$yourbrowser= $ua['name'] . " " . $ua['version'] ;
return $yourbrowser;
}
function getOS() { 

    global $user_agent;

    $os_platform    =   "Unknown OS Platform";

    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   

    return $os_platform;

}

function logActivity($name,$info){
		global $connection;
		$query="insert into log_activity (id_karyawan,time_activity,ip,browser,name_activity,info,os,browser_ver) values ('$_SESSION[SESS_USERNAME]',CURRENT_TIMESTAMP,'".getIp()."','".getBrowser()."','$name','$info','".getOS()."','".versionBrowser()."')";
		$result=pg_query($connection,$query);
      // return $query;
	}

function logLogin($name,$user,$info){
        global $connection;
        $query="insert into log_activity (id_karyawan,time_activity,ip,browser,name_activity,info,os,browser_ver) values ('$user',CURRENT_TIMESTAMP,'".getIp()."','".getBrowser()."','$name','$info','".getOS()."','".versionBrowser()."')";
        $result=pg_query($connection,$query);
      // return $query;
    }



function logMemo($ticketNumber,$idProcess,$keterangan){
		global $connection;
		$query="insert into log_memo (ticket_number,memo_date,id_karyawan,keterangan,id_process) values ('$ticketNumber',CURRENT_TIMESTAMP,'".getUsername()."','$keterangan','$idProcess')";
		$result=pg_query($connection,$query);
        return $result;
	}


function lastLogin(){
		global $connection;
		$query="select time_activity from log_activity where name_activity='login' order by time_activity desc limit 2";
		$result=pg_query($connection,$query);
		$found = pg_num_rows($result);
		if ($found >=1)
		{
			$i=1;
			while ($row = pg_fetch_array($result)){
			if ($i==2)
			$last_login=$row['time_activity'];
			$i++;
			}
			return $last_login;
			}

	}



function hitungSla(){



}

function dateSla($start_date,$jml_intval,$satuan){

//$start_date=date('Y-m-d H:i');
//$jml_intval=$_POST['interval'];
$counter=1;
if ($satuan=='HK') {
while ($counter <= $jml_intval ){

    $newdate=date('d-m-Y', strtotime(date('Y-m-d H:i',strtotime($start_date))." $counter day")); //interval hari

    $day=date('D',strtotime($newdate));
        if ( $day=='Sun' || $day =='Sat' ) //jike saturday and sunday
            {   
                $jml_intval++;
            }

$counter++;
}

} else if($satuan=='HC') {

while ($counter <= $jml_intval ){

    $newdate=date('d-m-Y H:i', strtotime(date('Y-m-d H:i',strtotime($start_date))." $counter day")); //interval hari


$counter++;
}


}



return $newdate;

}


function broadcastMail($subject,$message,$from,$case){
global $connection;

$headers = 'From: '.$from. "\r\n" .
    'Reply-To: '.$from . "\r\n" .
    'X-Mailer: PHP/' . phpversion(). "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$query =" select distinct (a.email) from user_account a ";
$query.=" left join map_pic b on a.id_pic=b.id_pic where  b.id_case='$case' and a.status_account='1' ";
//$query.=" left join map_pic b on a.id_pic=b.id_pic where b.id_product='$product' and b.id_unit='$unit' and b.id_process='$process' and b.id_case='$case' ";
//$query.=" left join map_pic b on a.id_pic=b.id_pic where  b.id_case='$case' ";
$result=pg_query($connection,$query);
$jumlah=pg_num_rows($result);

$email_to="";
$i=1;
        while ($row=pg_fetch_array($result)) {

                if($i==$jumlah){
                        $email_to.=$row['email']."";

                } else {

                        $email_to.=$row['email'].",";
                    }

                    //mail($row['email'], $subject, $message, $headers);
            $i++;
        }


// kirim email=====>>
mail("$email_to", $subject, $message, $headers);

}

function BlasttMailCase($subject,$message,$from,$case){
global $connection;

$headers = 'From: '.$from. "\r\n" .
    'Reply-To: '.$from . "\r\n" .
    'X-Mailer: PHP/' . phpversion(). "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$query =" select distinct (a.email) from user_account a ";
$query.=" left join map_pic b on a.id_pic=b.id_pic where  b.id_case='$case' and a.status_account='1' ";
$result=pg_query($connection,$query);
$jumlah=pg_num_rows($result);

$email_to="";
$i=1;
        while ($row=pg_fetch_array($result)) {

                if($i==$jumlah){
                        $email_to.=$row['email']."";

                } else {

                        $email_to.=$row['email'].",";
                    }

            $i++;
        }


// kirim email=====>>
mail("$email_to", $subject, $message, $headers);

}


function BlasttMailPic($subject,$message,$from,$id_pic){
global $connection;

$headers = 'From: '.$from. "\r\n" .
    'Reply-To: '.$from . "\r\n" .
    'X-Mailer: PHP/' . phpversion(). "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$query =" select distinct (a.email) from user_account a ";
$query.=" left join map_pic b on a.id_pic=b.id_pic where  a.id_pic='$id_pic' and a.status_account='1' ";
$result=pg_query($connection,$query);
$jumlah=pg_num_rows($result);

$email_to="";
$i=1;
        while ($row=pg_fetch_array($result)) {

                if($i==$jumlah){
                        $email_to.=$row['email']."";

                } else {

                        $email_to.=$row['email'].",";
                    }

            $i++;
        }


// kirim email=====>>
mail("$email_to", $subject, $message, $headers);

}



function SendMailPicAndCase($subject,$message,$from,$id_pic,$id_case){
global $connection;

$headers = 'From: '.$from. "\r\n" .
    'Reply-To: '.$from . "\r\n" .
    'X-Mailer: PHP/' . phpversion(). "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$query =" select distinct (a.email) from user_account a ";
$query.=" left join map_pic b on a.id_pic=b.id_pic where  b.id_case='$id_case' and a.status_account='1' ";
$query.=" union ";
$query.=" select distinct (a.email) from user_account a ";
$query.=" left join map_pic b on a.id_pic=b.id_pic where  a.id_pic='$id_pic' and a.status_account='1' ";

$result=pg_query($connection,$query);
$jumlah=pg_num_rows($result);

$email_to="";
$i=1;
        while ($row=pg_fetch_array($result)) {

                if($i==$jumlah){
                        $email_to.=$row['email']."";

                } else {

                        $email_to.=$row['email'].",";
                    }

            $i++;
        }


// kirim email=====>>
mail("$email_to", $subject, $message, $headers);

}





function broadcastMail2($subject,$message,$from,$case){
global $connection;

$headers = 'From: '.$from. "\r\n" .
    'Reply-To: '.$from . "\r\n" .
    'X-Mailer: PHP/' . phpversion(). "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$query =" select distinct (a.email) from user_account a ";
$query.=" left join map_pic b on a.id_pic=b.id_pic where  b.id_case='$case' and a.status_account='1' ";
$result=pg_query($connection,$query);
$jumlah=pg_num_rows($result);

/*
while ($row=pg_fetch_array($result)) {
        mail($row['email'], $subject, $message, $headers);
}
*/

$email_to="";
$i=1;
        while ($row=pg_fetch_array($result)) {

                if($i==$jumlah){
                        $email_to.=$row['email']."";

                } else {

                        $email_to.=$row['email'].",";
                    }

            $i++;
        }
// kirim email=====>>
mail("$email_to", $subject, $message, $headers);




    }

function hashEncrypted($password){

		$encrypted = hash('sha256',$password);
		return $encrypted;
	}


function Milion_format($n) {
        // first strip any formatting;
        $n = (0+str_replace(",","",$n));
        
        // is this a number?
        if(!is_numeric($n)) return false;
        
       // $n=round(($n/1000000),9);
        // now filter it;
        /*
        if($n>1000000000000) return round(($n/1000000000000),1).' trillion';
        else if($n>1000000000) return round(($n/1000000000),1).' billion';
        else if($n>1000000) return round(($n/1000000),1).' million';
        else if($n>1000) return round(($n/1000),1).' thousand';
        */
        return  number_format($n,2,",",".");
        //return number_format($n);
    }


function shortNews( $str, $wordCount = 20 ) {
  $str=explode(' ', strip_tags($str)); 
  return implode( 
    '', 
    array_slice( 
      preg_split(
        '/([\s,\.;\?\!]+)/', 
        $str, 
        $wordCount*2+1, 
        PREG_SPLIT_DELIM_CAPTURE
      ),
      0,
      $wordCount*2-1
    )
  );
}

function wordlimit($string,$words=20 ) { 
   $length = 20;
   $ellipsis = "...";
   $words = explode(' ', strip_tags($string)); 
   if (count($words) > $length) 
       return implode(' ', array_slice($words, 0, $length)) . $ellipsis; 
   else 
       return $string; 
}



function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function inputLeads($id_temp){
    global $connection;

    $search=" select * from temp_table where  id_temp='$id_temp' ";
    $res_search=pg_query($connection,$search);
    $row_search=pg_fetch_array($res_search);

  $customer_name=$row_search['customer_name'];
  $phone =$row_search['phone'];
  $email =$row_search['email'];
  $city =$row_search['kota_domisili'];
  $tgl_meeting =$row_search['tgl_meeting'];
  $id_channel =$row_search['id_channel'];
  $id_purpose =$row_search['id_purpose'];
 

    $query =" insert into  data_leads (customer_name,phone,email,kota_domisili,tgl_meeting,id_channel,id_purpose,status,adddt,tgl_verifikasi ) ";
    $query.=" VALUES ('$customer_name','$phone','$email','$city','$tgl_meeting','$id_channel','$id_purpose','1',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP) ";
    $result=pg_query($connection,$query);

    if ($result){
        return 1;
    } else {
        return 0;
    }

}


function EmailUpdateinquiry($ticket_number) {
    global $connection;

  $q_lapker =" select a.date_start,a.id_product,a.id_unit,a.id_process,a.id_case,a.ticket_number,a.date_sla,a.sla,e.satuan,b.name as produk ,c.name as unit ,d.name as proses ,e.name as case, f.name as laporan,g.name as penyebab_bi,h.name as cabang,a.keterangan from laporan_kerja a ";
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

  $found=pg_num_rows($res_lapker);

  if ($found >=1 ) {


  $message =" <b>Information Update Inquiry Request </b> <br><br>";
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

BlasttMailCase("Update Inquiry [commone]",$message,$_SESSION['SESS_EMAIL'],$row_lapker['id_case']);  
//broadcastMail("Update Inquiry [commone]",$message,$_SESSION['SESS_EMAIL'],$row_lapker['id_product'],$row_lapker['id_unit'],$row_lapker['id_process'],$row_lapker['id_case']);

  $succes=1;
} else {
  $succes=0;
}


return $succes;
    
}



function sendMailTempTable($subject,$message){
global $connection;
//$to      = 'aseparifyan@gmail.com';
//$subject = 'ini adalah subject';
//$message = 'ini adalah pesan...';


    }

function getDatestart($ticket_number){
global $connection;

$query= " select date_start from laporan_kerja where ticket_number='$ticket_number' ";
$result=pg_query($connection,$query);
$row=pg_fetch_array($result);

if ($result){
	return date('Y-m-d',strtotime($row['date_start']));
}else {
	return NULL;
}


    }
	
function cekTicket($ticket_number){
global $connection;

$query= " select count (ticket_number) as jml from laporan_kerja where ticket_number='$ticket_number' ";
$result=pg_query($connection,$query);
$row=pg_fetch_array($result);

	return $row['jml'];


    }	
	
function inquiryStatus($ticket_number){
global $connection;

$query= " select status  from laporan_kerja where ticket_number='$ticket_number' ";
$result=pg_query($connection,$query);
$row=pg_fetch_array($result);

	return $row['status'];


    }	
	
function cekSameInquiry($inputer,$cutomer_name,$id_case,$keterangan){
global $connection;
$current_date=date('Y-m-d');
$query = " select count (ticket_number) as jml from laporan_kerja where id_karyawan='$inputer' and customer_name='$cutomer_name' ";
$query.= " and id_case='$id_case' and to_char(date_start, 'YYYY-MM-DD') = '$current_date' and keterangan='$keterangan'  ";
$result=pg_query($connection,$query);
$row=pg_fetch_array($result);

	return $row['jml'];


    }
	
function lastMemoInputer($ticket_number){
global $connection;
$query = " select id_karyawan from log_memo  where ticket_number='$ticket_number' order by memo_date desc limit 1 ";
$result=pg_query($connection,$query);
$row=pg_fetch_array($result);

    return $row['id_karyawan'];


    }

function lastMemoDate($ticket_number){
global $connection;
$query = " select memo_date from log_memo  where ticket_number='$ticket_number' order by memo_date desc limit 1 ";
$result=pg_query($connection,$query);
$row=pg_fetch_array($result);

    return $row['memo_date'];


    }

function lastMemoInfo($ticket_number){
global $connection;
$query = " select keterangan from log_memo  where ticket_number='$ticket_number' order by memo_date desc limit 1 ";
$result=pg_query($connection,$query);
$row=pg_fetch_array($result);

    return $row['keterangan'];


    }
	
function dateFinishInquiry($ticket_number){
global $connection;
$query = " select status, date_finish from laporan_kerja where  ticket_number='$ticket_number' ";
$result=pg_query($connection,$query);
$row=pg_fetch_array($result);

if ($row['status']=='3'){

         //if ($row['date_finish']=="" || $row['date_finish']==NULL || date('Y-m-d',strtotime($row['date_finish']))=='1970-01-01'  ){
		 if (date('Y-m-d',strtotime($row['date_finish']))=='1970-01-01'  ){

                    $query2 = " select memo_date from log_memo  where ticket_number='$ticket_number' and keterangan like '%CLOSE :%' order by memo_date desc limit 1 ";
                    $result2=pg_query($connection,$query2);
                    $row2=pg_fetch_array($result2);

                    return date('Y-m-d',strtotime($row2['memo_date']));

          } else {
                    return date('Y-m-d',strtotime($row['date_finish']));
            }
    



}else{

return date('Y-m-d',strtotime(''));

}


   


    }	
	

function hitungHariKerja($start_date,$end_date){

    $startTimeStamp = strtotime($start_date);
    $endTimeStamp = strtotime($end_date);

    $start_date=date('Y-m-d',strtotime($startTimeStamp));

    $timeDiff = abs($endTimeStamp - $startTimeStamp);

    $numberDays = $timeDiff/86400;  // 86400 seconds in one day

    // and you might want to convert to integer
    $numberDays = intval($numberDays);

    //echo "Interval Hari= ".$numberDays;
    $jml_intval=$numberDays;

    $counter=1;
    $jml_hari=0;
                    while ($counter <= $jml_intval ){

                            $newdate=date('d-m-Y', strtotime(date('Y-m-d H:i',strtotime($start_date))." $counter day")); //interval hari

                            $day=date('D',strtotime($newdate));

                                if ( $day=='Sun' || $day =='Sat' ) //jike saturday and sunday
                                        {   
                                            $jml_hari=$jml_hari;
                                } else {
                                            $jml_hari++;
                                }

                        $counter++;
                    }

    //echo "<br>"."Jumlah Hari Kerja =".$jml_hari;

    return $jml_hari;

}

function cleanStr($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

	
	
	
?>