<?php
require_once '../../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id'];//id_jenis_mnc_pay

$query=" select * from mncpay_jenis where id_jenis_mncpay='$id' ";
$result=pg_query($connection, $query);
$row=pg_fetch_array($result);
$plan_code=$row['plan_code'];
$product_code=$row['product_code'];
$interest_rate=$row['interest_rate'];

}
?>
<input type="hidden" name="plan_code" id="plan_code" value="<?php echo $plan_code; ?>"> <br>
<input type="hidden" name="product_code" id="product_code" value="<?php echo $product_code; ?>"> <br>
<input type="hidden" name="interest_rate" id="interest_rate" value="<?php echo $interest_rate; ?>"> <br>
