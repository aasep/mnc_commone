<?php
//require_once '../../config/config.php';
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


//$connection = pg_connect("host=localhost port=5432 dbname=commone_ver2 user=postgres password=password");


$no=1;
$no_succ=1;
$query=" select * from temp_3 ORDER BY ticket_number asc	";
$result=pg_query($connection,$query);
while ($row=pg_fetch_array($result)) {

		//echo $no."  ).".$row['ticket_number']." ---- ".$row['id_report']."<br>";

		//$query2=" select ticket_number,id_report from laporan_kerja where ticket_number='$row[ticket_number]'	";
		$query2=" update laporan_kerja set id_report='$row[id_report]'  where ticket_number='$row[ticket_number]'	";




		$result2=pg_query($connection,$query2);
		//$row2=pg_fetch_array($result2);
		if ($result2) {

			echo $no_succ."  ).".$row['ticket_number']." ---- ".$row['id_report']." Success updated... !<br>";
			$no_succ++;
		}

 
	# code...
		$no++;   
}

echo "Total Execution = ".($no-1)."<br>";

echo "Total Success updated = ".($no_succ-1) ."<br>";




?>