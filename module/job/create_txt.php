<?php
require_once '../../config/config.php';
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



//$connection = pg_connect("host=localhost port=5432 dbname=commone user=postgres password=Instance12");


//$query="select restart_numticket2()";
$query=" select * from laporan_kerja where id_lapker='1052' ";
$result=pg_query($connection,$query);
$row=pg_fetch_array($result);

$nilai_random=rand(1,999);
$myfile = fopen("newfile_$nilai_random.txt", "w") or die("Unable to open file!");
$txt = "$row[customer_name] \n";
$txt.= "$row[keterangan] \n";
fwrite($myfile, $txt);
fclose($myfile);


?>