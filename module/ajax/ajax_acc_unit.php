<?php
require_once '../../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id']; //id_product

//########################## unit ############################
echo "<option value=''>Choose Unit...</option>";
$sql="select distinct (a.id_unit),b.name as nama_unit from map_access a left join master_unit b on a.id_unit=b.id_unit where id_product ='$id' order by b.name asc ";
$result=pg_query($connection,$sql);
while($row=pg_fetch_array($result))
{
$id_unit=$row['id_unit'];
$nama_unit=$row['nama_unit'];

echo "<option value='".$id_unit."'>".$nama_unit."</option>";;

}
}
?>