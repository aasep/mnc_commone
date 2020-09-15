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

error_reporting(-1);

// FOR USER


$connection = pg_connect("host=localhost port=5432 dbname=commone_ver2 user=postgres password=Instance12");
//$connection = pg_connect("host=10.5.68.129 port=5432 dbname=commone_ver2 user=postgres password=Instance12");

if (!$connection) {
	header('location: 123456789?status=failed_conn');
	//echo "System sedang down atau dalam masa maintenance...!, harap hubungi System Administrator COMMONE.";
	//echo "koneksi gagal...!";
	die();
}

$quer_timezone=" set timezone TO 'Asia/Jakarta' " ;
$rest_timezone=pg_query($connection,$quer_timezone);


?>