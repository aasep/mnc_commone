<?php
require_once '../config/config.php';
//include('db.php');
//if($_POST['id'])
//{
$id=$_POST['id'];
//$act=$_POST['jenis'];

//select * from master_ver_aplikasi where id_merk_type
$sql="select * from master_report order by name asc ";
$result=pg_query($connection,$sql);
while($row=pg_fetch_array($result))
{
$id_bp=$row['id_report'];
$nama=$row['name'];
if ($id_bp==$id){

echo "<option value='".$id_bp."' selected='selected'>".$nama."</option>";
} else {
echo "<option value='".$id_bp."'>".$nama."</option>";;
}


}
//}
?>