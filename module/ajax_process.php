<?php
require_once '../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id'];
//$act=$_POST['jenis'];

//select * from master_ver_aplikasi where id_merk_type
$sql="select * from master_process order by name asc ";
$result=pg_query($connection,$sql);
while($row=pg_fetch_array($result))
{
$id_product=$row['id_process'];
$nama_product=$row['name'];
if ($id_product==$id){

echo "<option value='".$id_product."' selected='selected'>".$nama_product."</option>";
} else {
echo "<option value='".$id_product."'>".$nama_product."</option>";;
}


}
}
?>