
<?php
require_once '../../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id'];



//########################## CASE ############################

#--------

			$query_m1=" select * from master_unit order by name asc ";
											
			$r_m1=pg_query($connection,$query_m1);
			while ($row_m1=pg_fetch_array($r_m1)){
				echo " <optgroup label='".strtoupper($row_m1['name'])."'> ";

				$query_m2=" select a.id_case,a.name from master_case a left join map_access b on a.id_case=b.id_case where b.id_unit='$row_m1[id_unit]' order by a.name asc ";
				$r_m2=pg_query($connection,$query_m2);
				while ($row_m2=pg_fetch_array($r_m2)){
					$query_cek=" select count(*) from map_pic where id_case='$row_m2[id_case]' and id_pic='$id' ";
					$result_cek=pg_query($query_cek);
					$r_found=pg_fetch_array($result_cek);

						if($r_found['count'] >=1){
							echo " <option value='$row_m2[id_case]' selected>$row_m2[name]</option> ";	
						} else{
								echo " <option value='$row_m2[id_case]'>$row_m2[name]</option> ";
							}

				}

													echo " </optgroup> ";
			}


			//echo "ok.........";


}

?>
