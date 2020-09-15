<?php
require_once '../../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id'];//

//########################## CASE ############################
 $sql=" select flag_mandatory,id_report from master_case where id_case='$id' ";

 $result=pg_query($connection,$sql);
 $row=pg_fetch_array($result);


if ($row['flag_mandatory']=='1' ) {
	?>

<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                         This Is Mandatory Case for attach file,  You Need to  Attach File for through  to Solution desk, if No  inqury status is <b>pending</b> ....!
                                        <input type="hidden" name="is_mandatory" value="1">
                                        <input type="hidden" name="idjenis_laporan" value="<?php echo $row['id_report'];?>">

                                    </div>	
<?php
} else {

echo "<input type='hidden' name='is_mandatory' value='0'>";
echo "<input type='hidden' name='idjenis_laporan' value='$row[id_report]'>";
}




} 



?>

