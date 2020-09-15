<?php
require_once '../../config/config.php';
require_once '../../function/function.php';

if($_POST['id'])
{
$id=$_POST['id'];//id_temp


 foreach ($_POST['id'] as $key => $value) {

 	$query =" update temp_table set status='2' where id_temp='$value' ";
 	$result=pg_query($connection, $query);

 	###########  Insert into Leads #########
 	inputLeads($value);
 	########################################
 }
}
?>
<button class="close" data-close="alert"></button>
												Verification Data is Successed  ... !
