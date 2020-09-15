<?php

##########################################################################
#            -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE -=              #
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
##########################################################################

// FOR USER
/*
//$connection = pg_connect("host=localhost port=5432 dbname=commone_ver2 user=postgres password=Instance12");
$connection = pg_connect("host=localhost port=5432 dbname=commone_ver2 user=postgres password=password");

if (!$connection) {
	header('location: 123456789?status=failed_conn');
	//echo "System sedang down atau dalam masa maintenance...!, harap hubungi System Administrator COMMONE.";
	die();
}

$quer_timezone=" set timezone TO 'Asia/Jakarta' " ;
$rest_timezone=pg_query($connection,$quer_timezone);

//$query=" select char_length(info) as panjang,info from log_activity where name_activity='INPUT REQUEST MNCPAY' order by time_activity desc limit 10 ";
$query =" insert into  mncpay_pengajuan (id_karyawan,customer_name,credit_card_number,transaction_date,input_date,approval_code,merchant_name, ";
$query.=" transaction_nominal,plan_code,product_code,interest_rate,interest_nominal,tenor,total_nominal,installment_nominal,keterangan,status  )";
$query.=" VALUES ('$id_karyawan','$customer_name','$credit_card_number','$transaction_date',CURRENT_TIMESTAMP,'$approval_code','$merchant_name', ";
$query.=" '$transaction_nominal','$plan_code','$product_code','$interest_rate','$interest_nominal','$tenor','$total_nominal',";
$query.=" '$installment_nominal','CM : CH REQ MNC PAY 1. TANGGAL TRANSAKSI : 03/07/2017 2. APPROVAL CODE : 112607 3. KODE PRODUK : PAYU 4. TENOR CICILAN : 06 BULAN 5. PLAN : MNPU 6. JUMLAH TRANSAKSI : RP 4,639,200 7.MERCHANT NAME : GEMILANG CAR CARE 8. JUMLAH BUNGA % : 0.99 % 9. JUMLAH CICILAN PERBULAN : RP 819.128 CH AGREE DENGAN SYARAT DAN KETENTUAN .. ','1' ) ";

echo 
$result=pg_query($connection, $query);
while($row=pg_fetch_array($result)){
echo $row['panjang']."---".$row['info']."<br>";

}

*/

?>