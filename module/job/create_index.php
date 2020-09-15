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


#################################  JOB INDEX  CBR 16 ####################################

$dsn3="cbr16";
$usr3="dwhadm";
$pass3="dwhadm123";
$connection3 = odbc_connect($dsn3, $usr3, $pass3);
	
	if(!$connection3)
		die('Failed to connect to server: ' . odbc_error());	

$query1=" CREATE INDEX idxcus_org ON M4CUS (cus_org) ";
$result1=odbc_exec($connection3, $query1);
$query2=" CREATE INDEX idx2cus_org ON M4ACCLN (cus_org) ";
$result2=odbc_exec($connection3, $query2);
$query3=" CREATE INDEX idxacc_org ON M4ACCLN (acc_org) ";
$result3=odbc_exec($connection3, $query3);
$query4=" CREATE INDEX idx3cus_org ON M4ACCDD (cus_org) ";
$result4=odbc_exec($connection3, $query4);
$query5=" CREATE INDEX idxacc_org ON M4ACCDD (acc_org) ";
$result5=odbc_exec($connection3, $query5);


?>