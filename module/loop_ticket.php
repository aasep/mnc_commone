<?php 
/*
161;"2016093010007"
162;"2016093010008"
163;"2016093010009"
164;"2016093010010"
165;"2016093010011"
166;"2016093010012"
167;"2016093010013"
168;"2016093010014"
169;"2016093010015"
170;"2016093010016"
171;"2016093010017"
172;"2016093010018"
173;"2016093010019"
174;"2016093010020"
175;"2016093010021"
176;"2016093010022"
177;"2016093010023"
178;"2016093010024"
179;"2016093010025"
180;"2016093010026"
181;"2016093010027"
182;"2016093010028"
183;"2016093010029"
184;"2016093010030"
185;"2016093010031"
186;"2016093010032"
187;"2016093010033"
188;"2016093010034"
189;"2016093010035"
190;"2016093010036"
191;"2016093010037"
192;"2016093010038"
193;"2016093010039"
194;"2016093010040"
195;"2016093010041"
196;"2016093010042"
197;"2016093010043"
198;"2016093010044"
199;"2016093010045"
200;"2016093010046"
201;"2016093010047"
202;"2016093010048"
203;"2016093010049"
204;"2016093010050"
205;"2016093010051"
206;"2016093010052"
207;"2016093010053"
208;"2016093010054"
*/
require_once '../config/config.php';
date_default_timezone_set("Asia/Jakarta");

//echo date('Y-m-d :H:i:s');
/*
date_default_timezone_set("Asia/Jakarta");
$no=1;
$ticket=10007;
for ($i=161; $i <=208 ; $i++) { 
$new_ticket="20160930".$ticket;

	//$query=" update laporan_kerja set ticket_number='$new_ticket', date_start='2016-09-30 :10:00:00' where id_lapker='$i' <br> ";
	//$result=pg_query($connection, $query);
	//echo "$no    20161001".$ticket."   ==> 20160930$ticket  <br>";
	$query=" update laporan_kerja set date_start='2016-09-30 :00:00:00' where id_lapker='$i' ";
	$result=pg_query($connection, $query);
	echo "sukses $no ";
	//echo $query."<br>";

	//$query=" update log_memo set ticket_number='$new_ticket' where id_lapker='$i' <br> ";
	
	
$ticket++;
$no++;
}
*/
/*
date_default_timezone_set("Asia/Jakarta");
$no=1;
$ticket=10007;
for ($i=333; $i <=403 ; $i++) { 
$new_ticket="20160930".$ticket;

	//$query=" update laporan_kerja set ticket_number='$new_ticket', date_start='2016-09-30 :10:00:00' where id_lapker='$i' <br> ";
	//$result=pg_query($connection, $query);
	//echo "$no    20161001".$ticket."   ==> 20160930$ticket  <br>";
	$query=" update laporan_kerja set date_start='2016-10-01 :00:00:00' where id_lapker='$i' ";
	$result=pg_query($connection, $query);
	echo "sukses $no <br>";
	//echo $query."<br>";

	//$query=" update log_memo set ticket_number='$new_ticket' where id_lapker='$i' <br> ";
	
	
$ticket++;
$no++;
}

*/
//*/



?>