<?php
require_once '../../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id'];



//########################## CASE ############################
$sql=" select * from master_case where id_case not in ( select id_case from map_pic where id_pic='".$id."' ) order by name asc  ";
$result=pg_query($connection,$sql);
while($row=pg_fetch_array($result))
{
$id_case=$row['id_case'];
$nama_case=$row['name'];
echo "<option value='".$id_case."'>".$nama_case."</option>";;



}
}
?>