<?php
require_once '../../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id'];
$sql="select * from category_productnews order by name_category asc ";
$result=pg_query($connection,$sql);
while($row=pg_fetch_array($result))
{
$id_pnews=$row['id_cat_pnews'];
$nama=$row['name_category'];
if ($id_pnews==$id){

echo "<option value='".$id_pnews."' selected='selected'>".$nama."</option>";
} else {
echo "<option value='".$id_pnews."'>".$nama."</option>";;
}


}
}
?>