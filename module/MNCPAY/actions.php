<?php

    require_once '../../config/config.php';
	require_once '../../function/function.php';
	require_once '../session_login.php';

	include 'Classes/PHPExcel.php';
	include 'Classes/PHPExcel/IOFactory.php';

					//$report_type=$_POST['report_type'];
					$nama_file=$_FILES["nama_file"]["name"];
					$file=$_FILES['nama_file']['tmp_name'];
					
					$directory= "file/";
					
					copy ($file,$directory.$nama_file);
					
					
    //$dataFfile = "file/TEMPtable_2017_08_18_23_55_02.xls";
    //$dataFfile = "file/TEMPtable__.xlsx";
    $dataFile = $directory.$nama_file;

    //echo $dataFile;
	//die();
    $objPHPExcel = PHPExcel_IOFactory::load($dataFile);
    $sheet = $objPHPExcel->getActiveSheet();
    $data = $sheet->rangeToArray('B7:C107');
    $i=7;

   
    //echo "<br>Rows available: " . count($data) . "<br>";
    foreach ($data as $row=>$value) {
        
        if( $value['0']!="" || $value['0']!=NULL ){
			
			$date_c = date_create(date('Y-m-d',strtotime($value['1'])),timezone_open("Asia/Jakarta"));
			$date3=date_add($date_c, date_interval_create_from_date_string("0 minutes"));
			$sys_date3 = date_format($date3, 'Y-m-d');
			$var_tglfinish=" date_finish=date_trunc('second', TIMESTAMP '$sys_date3') ";
			//echo $value['0'].",".$value['1'];
			
					$query=" update mncpay_pengajuan set  status='2',finish_by='$_SESSION[SESS_USERNAME]', $var_tglfinish  where id_mncpay='$value[0]' ";
					$result=pg_query($connection,$query);

					///echo $query."<br>";
            $i++;
        }

		
		
		
		
    }
	
	
$jumlahData=$i-(7);
header("location: ../../home.php?module=$_GET[module]&pm=$_GET[pm]&message=success&count=$jumlahData");
//echo "Jumlah data= ".($i-(7))." baris";

?>