<?php
require_once '../../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id']; //id_product

if(isset($_POST['id2'])){

$var1=" and a.id_unit ='$_POST[id2]' "; //id_unit
} else {
$var1="";

}
echo "<option value=''>Choose Process...</option>";
//########################## PROCESS ############################
$sql="select distinct (a.id_process),b.name as nama_process from map_access a left join master_process b on a.id_process=b.id_process where a.id_product ='$id' $var1 order by b.name asc ";
$result=pg_query($connection,$sql);
while($row=pg_fetch_array($result))
{
$id_process=$row['id_process'];
$nama_prosess=$row['nama_process'];

echo "<option value='".$id_process."'>".$nama_prosess."</option>";;


}
}
?>