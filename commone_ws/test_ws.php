<?php
require_once("lib/nusoap.php");
$wsdl ="http://10.5.68.69:81/commone/commone_ws/index.php?wsdl";
$client = new nusoap_client($wsdl, true);

echo "<a href='../download/commone/download/commone_ws.zip'> <b>download ws example code </b></a> <br>";

echo "<br>";



#####################---------- Parameter Input ---------- #######################

$random1=rand(111,'99999');
$random2=rand(222,'99999');
$random3=rand(333,'99999');
$random4=rand(444,'99999');
$customer_name="John Doe";
$account_number="$random1";
$credit_card_number="$random2";
$phone="$random4";
$nominal="$random3";
$tgl_transaksi="";
$status=1;
$keterangan="xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$email="sss@yy.com";
$kota_domisili="JAKARTA";
$tgl_meeting="";
$id_purpose="3";
$id_channel=1;



$param_insert=array("$customer_name","$account_number","$credit_card_number","$phone","$nominal","$status","$keterangan","$email","$kota_domisili","$id_channel","$tgl_transaksi","$tgl_meeting","$id_purpose");
$result_insert = $client->call('pushCommone', $param_insert); // call function
print_r("<pre>");
print_r ($param_insert);
print_r("</pre>");
echo "status insert : ";

if ($result_insert=='1'){
	echo "INSERTED... SUCCESS... ! <br>";
} else { echo "INSERTED... FAILED... ! <br>";
	}



	################------- GET DATA ------------------#################
echo "<br>";
$result_data = $client->call('getData'); // call function
echo "data :";
//print_r("<pre>");
//print_r(json_decode($result_data)); // print output
echo $result_data;
//print_r("</pre>");
echo "<br>";
?>