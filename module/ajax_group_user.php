<?php
require_once '../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id'];
//$act=$_POST['jenis'];

//select * from master_ver_aplikasi where id_merk_type
$sql="select * from group_type order by name asc ";
$result=pg_query($connection,$sql);
while($row=pg_fetch_array($result))
{
$id_pic=$row['id_group_type'];
$nama_pic=$row['name'];
if ($id_pic==$id){

echo "<option value='".$id_pic."' selected='selected'>".$nama_pic."</option>";
} else {
echo "<option value='".$id_pic."'>".$nama_pic."</option>";
}


}
}
?>