<?php
require_once '../../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id'];//id_product

if(isset($_POST['id2'])){

$var1=" and a.id_unit ='$_POST[id2]' "; // id_unit
} else {
$var1="";

}
if(isset($_POST['id3'])){

$var2=" and a.id_process ='$_POST[id3]' "; // id_process
} else {
$var2="";

}
echo "<option value=''> - Choose Case - </option>";
//########################## CASE ############################
$sql="select distinct (a.id_case),b.name as nama_case from map_access a left join master_case b on a.id_case=b.id_case where id_product ='$id' $var1 $var2 order by b.name asc ";
$result=pg_query($connection,$sql);
while($row=pg_fetch_array($result))
{
$id_case=$row['id_case'];
$nama_case=$row['nama_case'];
echo "<option value='".$id_case."'>".$nama_case."</option>";



}
}
?>