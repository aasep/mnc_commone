<?php
require_once("lib/nusoap.php");
require_once("../config/config.php");
$soap = new soap_server();
$soap->configureWSDL('WEB SERVICE COMMONE SYSTEM','http://www.tangual.info');
$soap->wsdl->schemaTargetNamespace="http://soapinterop.org/xsd/";


$soap->register(
       'getData',
	   array(),
	   array('output'=> 'xsd:json'),
	   'http://soapinterop.org'
);
$soap->register(
       'pushCommone',
	   array('customer_name' => 'xsd:string','account_number' => 'xsd:string','credit_card_number' => 'xsd:string','phone' => 'xsd:string','nominal' => 'xsd:integer','status' => 'xsd:integer','keterangan' => 'xsd:string','email' => 'xsd:string','kota_domisili' => 'xsd:string','id_channel' => 'xsd:integer','tgl_transaksi' => 'xsd:string','tgl_meeting' => 'xsd:string','id_purpose' => 'xsd:string','type_data' => 'xsd:integer'),
	   array('output'=> 'xsd:boolean'),
	   'http://soapinterop.org'
);

$soap->service(isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '');



function getData()
{

    $query = " select * from temp_table ";
    $resultx = pg_query($query);
    // $memberData=array();
    while($rowx=pg_fetch_array($resultx)){

    $memberData[]= $rowx;
    
    }
	header('Content-type: application/json');
    return json_encode($memberData);

    }

function pushCommone($customer_name,$account_number,$credit_card_number,$phone,$nominal,$status,$keterangan,$email,$kota_domisili,$id_channel,$tgl_transaksi,$tgl_meeting,$id_purpose,$type_data) 
{
 global $connection;
    
  if ($tgl_transaksi==NULL || $tgl_transaksi=="" ){
      $var_tgl_transaksi="NULL";
  } else {
      $var_tgl_transaksi="'$tgl_transaksi'";
  }
  if ($tgl_meeting==NULL || $tgl_meeting=="" ){
      $var_tgl_meeting="NULL";
  } else {
      $var_tgl_meeting="'$tgl_meeting'";
  }
  if ($id_purpose==NULL || $id_purpose=="" ){
      $var_id_purpose="NULL";
  } else {
      $var_id_purpose="'$id_purpose'";
  }
  //---------- Customer Name ----------
  if ($customer_name==NULL || $customer_name=="" ){
      $var_customer_name="NULL";
  } else {
      $var_customer_name="'$customer_name'";
  }
//---------- Account Number ----------
  if ($account_number==NULL || $account_number=="" ){
      $var_account_number="NULL";
  } else {
      $var_account_number="'$account_number'";
  }
//---------- Credit Card Number ----------
  if ($credit_card_number==NULL || $credit_card_number=="" ){
      $var_credit_card_number="NULL";
  } else {
      $var_credit_card_number="'$credit_card_number'";
  }
//---------- Nominal ----------
  if ($nominal==NULL || $nominal=="" ){
      $var_nominal="NULL";
  } else {
      $var_nominal="'$nominal'";
  }
  //---------- status ----------
  if ($status==NULL || $status=="" ){
      $var_status="NULL";
  } else {
      $var_status="'$status'";
  }
  //---------- id Channel ----------
  if ($id_channel==NULL || $id_channel=="" ){
      $var_id_channel="NULL";
  } else {
      $var_id_channel="'$id_channel'";
  }
  //---------- Type Data ----------
  if ($type_data==NULL || $type_data=="" ){
      $var_type_data="NULL";
  } else {
      $var_type_data="'$type_data'";
  }
 

  $query = " insert into temp_table (customer_name,account_number,credit_card_number,phone,nominal,status,keterangan,email,kota_domisili,id_channel,tgl_transaksi,tgl_meeting,id_purpose,type_data,adddt) ";
  $query.= " values ($var_customer_name,$var_account_number,$var_credit_card_number,'$phone',$var_nominal,$var_status,'$keterangan','$email','$kota_domisili',$var_id_channel,$var_tgl_transaksi,$var_tgl_meeting,$var_id_purpose,$var_type_data,CURRENT_TIMESTAMP) ";
  $query.= " returning id_temp  ";


  
  $result = pg_query($connection,$query);
  $row1=pg_fetch_array($result); 
  
  if (isset($row1['id_temp']) && ($row1['id_temp']) !="") {
      return 1;
  } else {
     return 0;   
    }

    
 //return $query;


}



?>