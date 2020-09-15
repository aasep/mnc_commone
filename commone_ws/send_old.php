<?php
require_once("lib/nusoap.php");
$wsdl ="http://10.5.68.69:81/commone/commone_ws/index.php?wsdl";
$client = new nusoap_client($wsdl, true);

#####################---------- Parameter Input ---------- #######################

$client_data = json_decode(file_get_contents('php://input'));

if($client_data){
	
	$customer_name= $client_data->{"customer_name"};
	$account_number= $client_data->{"account_number"};
	$credit_card_number= $client_data->{"card_number"};
	$phone= $client_data->{"phone"};
	$nominal= $client_data->{"nominal"};
	$tgl_transaksi= $client_data->{"tgl_transaksi"};
	$status=1;
	$keterangan= $client_data->{"keterangan"};
	$email= $client_data->{"email"};
	$kota_domisili = $client_data->{"kota"};
	$tgl_meeting = $client_data->{"tgl_meeting"};
	$tgl_purpose= $client_data->{"tgl_purpose"};
	$id_channel=1;
	$type_data=$client_data->{"type_data"};
	
	$param_insert=array("$customer_name","$account_number","$credit_card_number","$phone","$nominal","$status","$keterangan","$email","$kota_domisili","$id_channel","$tgl_transaksi","$tgl_meeting","$tgl_purpose","$type_data");
	$result_insert = $client->call('pushCommone', $param_insert);
	
	
	if ($result_insert=='1'){
		$responses = array("status"=>true, "desc"=>"Berhasil");
			
		// set header as json
		header("Content-type: application/json");
		 
		// send response
		echo json_encode($responses);
		
	} else {
		$responses = array("status"=>false, "desc"=>"Gagal");
		
		// set header as json
		header("Content-type: application/json");
		 
		// send response
		echo json_encode($responses);
	}
	
}else
{
	$responses = array("status"=>false, "desc"=>"Gagal");
	
	// set header as json
	header("Content-type: application/json");
	 
	// send response
	echo json_encode($responses);
}

?>