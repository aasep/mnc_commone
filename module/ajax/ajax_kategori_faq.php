<?php
require_once '../../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id'];
$sql="select * from category_faq order by name_category asc ";
$result=pg_query($connection,$sql);
while($row=pg_fetch_array($result))
{
$id_faq=$row['id_catfaq'];
$nama=$row['name_category'];
if ($id_faq==$id){

echo "<option value='".$id_faq."' selected='selected'>".$nama."</option>";
} else {
echo "<option value='".$id_faq."'>".$nama."</option>";;
}


}
}
?>