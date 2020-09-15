<?php
######################################################################################
######################################################################################
#################################### Config Database ########## ######################
############### OS : CENTOS 7
############### DB : Postgresql
error_reporting(E_ERROR);
date_default_timezone_set("Asia/Jakarta");

$conn_string = "host=localhost port=5432 dbname=womdb2 user=postgres password=Instance12";
$connection2 = pg_connect($conn_string);

if (!$connection2) {
	echo "System sedang down atau dalam masa maintenance, harap hubungi System Administrator WOM.";
	die();
}

######################################################################################
######################################################################################
?>