<?php
require_once '../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id'];
//$act=$_POST['jenis'];

//select * from master_ver_aplikasi where id_merk_type
$sql="select * from master_city order by name asc ";
$result=pg_query($connection,$sql);
while($row=pg_fetch_array($result))
{
$id_kota=$row['id_city'];
$nama_kota=$row['name'];
if ($id_kota==$id){

echo "<option value='".$id_kota."' selected='selected'>".$nama_kota."</option>";
} else {
echo "<option value='".$id_kota."'>".$nama_kota."</option>";;
}


}
}
?>