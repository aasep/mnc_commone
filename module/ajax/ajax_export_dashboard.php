
<?php
require_once '../../config/config.php';
//require_once '../../session_login.php';
//require_once '../../session_group.php';
require_once 'Classes/PHPExcel.php';
require_once 'Classes/PHPExcel/IOFactory.php';
date_default_timezone_set("Asia/Bangkok");
$current_date = date('Y-m-d');

$produk=strtoupper($_POST['produk']);


//product B
	if(isset($_POST['idproduct']) && $_POST['idproduct']<>"") { 
	$idproduct=$_POST['idproduct'];
	$var_product=" where a.id_product='$idproduct' ";
	$var_product1=" and a.id_product='$idproduct' ";
} elseif(isset($_GET['idproduct']) && $_GET['idproduct']<>"") {
	$idproduct=$_GET['idproduct']; 
	$var_product=" where a.id_product='$idproduct' ";
	$var_product1=" and a.id_product='$idproduct' ";
} else { 	$var_product=" ";
			$var_product1="  ";}


//unit C
if(isset($_POST['idunit']) && $_POST['idunit']<>"") { 
	$idunit=$_POST['idunit']; 
	$var_unit=" and  a.id_unit='$idunit' ";
} elseif(isset($_GET['idunit']) && $_GET['idunit']<>"") {
	$idunit=$_GET['idunit']; 
	$var_unit=" and  a.id_unit='$idunit' ";
} else {
	$var_unit=" ";
}
//prosess D
	if(isset($_POST['idproses']) && $_POST['idproses']<>"") { 
	$idproses=$_POST['idproses'];
	$var_proses=" and  a.id_process='$idproses' ";
} elseif(isset($_GET['idproses']) && $_GET['idproses']<>"") {
	$idproses=$_GET['idproses']; 
	$var_proses=" and  a.id_process='$idproses' ";
}else{
	$var_proses="  ";
}
//permasalahan E
if(isset($_POST['idpermasalahan'])&& $_POST['idpermasalahan']<>"") { 
	$idpermasalahan=$_POST['idpermasalahan'];
	$var_case=" and  a.id_case='$idpermasalahan' ";
} elseif(isset($_GET['idpermasalahan'])&& $_GET['idpermasalahan']<>""){
	$idpermasalahan=$_GET['idpermasalahan']; 
	$var_case=" and  a.id_case='$idpermasalahan' ";
}else{
	$var_case=" ";
}
//penyebab F
if(isset($_POST['idpenyebab'])&& $_POST['idpenyebab']<>"") { 
	$idpenyebab=$_POST['idpenyebab'];
	$var_cause=" and  a.id_cause_bi='$idpenyebab' ";
} elseif(isset($_GET['idpenyebab'])&& $_GET['idpenyebab']<>"") {
	$idpenyebab=$_GET['idpenyebab']; 
	$var_cause=" and  a.id_cause_bi='$idpenyebab' ";
}else{
	$var_cause="  ";
}
//jenis laporan G
if(isset($_POST['idjenis_laporan'])&& $_POST['idjenis_laporan']<>"") { 
	$idjenis_laporan=$_POST['idjenis_laporan'];
	$var_jslaporan=" and a.id_report='$idjenis_laporan' ";
} elseif(isset($_GET['idjenis_laporan'])&& $_GET['idjenis_laporan']<>"") {
	$idjenis_laporan=$_GET['idjenis_laporan']; 
	$var_jslaporan=" and a.id_report='$idjenis_laporan' ";
}else{
	$var_jslaporan=" ";
}
//from

if ( (isset($_POST['from'])&& $_POST['from']<>"") || (isset($_POST['to'])&& $_POST['to']<>"")){
$from=$_POST['from'];

//to
	$to=$_POST['to'];
	if ($from==$to){
				$varperiode=" and to_char(a.date_start, 'YYYY-MM-DD') ='".$from."'";
	}	else {
				$varperiode=" and to_char(a.date_start, 'YYYY-MM-DD') between '".$from."' and '".$to."'";
		}
} elseif ( (isset($_GET['from'])&& $_GET['from']<>"") || (isset($_GET['to'])&& $_GET['to']<>"")) {
	$from=$_GET['from']; 
	$to=$_GET['to']; 
	if ($from==$to){
				$varperiode=" and to_char(a.date_start, 'YYYY-MM-DD') ='".$from."'";
	}	else {
				$varperiode=" and to_char(a.date_start, 'YYYY-MM-DD') between '".$from."' and '".$to."'";
		}
	
	
} else {
	$varperiode=" ";
}
//channel H
if(isset($_POST['idchannel'])&& $_POST['idchannel']<>"") { 
$idchannel=$_POST['idchannel'];
$var_channel=" and a.id_channel='$idchannel' ";
} else {
$var_channel="";	
}







####### Query Belum dikerjakan (status=1 & Sla on) ########
$query1 =" select count(a.id_lapker) as jml1 from laporan_kerja a  where a.status='1'  and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' ";
$query1.=" $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";

$result1=pg_query($connection,$query1);
$row1=pg_fetch_array($result1);
$count1=$row1['jml1'];
if(!isset($count1)) $count1=0;

####### Query sedang dikerjakan (status=2 & Sla on) ########
$query2 =" select count(a.id_lapker) as jml2 from laporan_kerja a  where a.status='2'  and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' ";
$query2.=" $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";
$result2=pg_query($connection,$query2);
$row2=pg_fetch_array($result2);
$count2=$row2['jml2'];
if(!isset($count2)) $count2=0;
####### Query selesai dikerjakan (status=3 )########
$query3 =" select count(a.id_lapker) as jml3 from laporan_kerja a where a.status='3' ";
$query3.=" $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";
$result3=pg_query($connection,$query3);
$row3=pg_fetch_array($result3);
$count3=$row3['jml3'];
if(!isset($count3)) $count3=0;
####### Query expire  (status=1 atau 2 & Sla off )########
$query4 =" select count(a.id_lapker) as jml4 from laporan_kerja a  where a.status in ('1','2')  and  to_char(a.date_sla, 'YYYY-MM-DD') < '".$current_date."' ";
$query4.=" $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";
//echo $query4;
$result4=pg_query($connection,$query4);
$row4=pg_fetch_array($result4);
$count4=$row4['jml4'];
if(!isset($count4)) $count4=0;

$jml_total=$count1+$count2+$count3+$count4;






$file_eksport=date('Y_m_d_H_i_s');


$objPHPExcel = new PHPExcel();

$styleArrayFont = array('font' => array('bold'  => true,'color' => array('rgb' => ''),'size'  => 11,'name'  => 'Calibri'));
$styleArrayAlignment = array('alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        ));

//DIMENSION D
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(100);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:F1');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A2:F2');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A3:F3');

$styleArrayFontBold = array('font' => array('bold'  => true,'color' => array('rgb' => ''),'size'  => 11,'name'  => 'Calibri'));
$styleArrayFontItalic = array('font' => array('italic'  => true,'color' => array('rgb' => ''),'size'  => 10,'name'  => 'Calibri'));
$styleArrayAlignment1 = array('alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        ));
$styleArrayAlignment2 = array('alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        ));

$styleArrayColorFont = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => 'FFFFFF'),
        'size'  => 11,
        'name'  => 'Calibri'
    ));



$objPHPExcel->getActiveSheet()->getStyle('A1:F4')->applyFromArray($styleArrayFontBold);



$objPHPExcel->getActiveSheet()->getStyle('A1:F3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('A1:F4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



//=======BORDER

$styleArrayBorder1 = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' => array('argb' => ''),),),);
$styleArrayBorder2 = array('borders' => array('outline' => array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' => array('argb' => ''),),),);



//FILL COLOR

$objPHPExcel->getActiveSheet()->getStyle('A1:Z500')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF');

$objPHPExcel->getActiveSheet()->getStyle('A4:F4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('808080');


$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setCellValue('A1', "DASBOARD COMMONE  Periode $from s.d $to ");
$objPHPExcel->getActiveSheet()->setCellValue('A2', 'PT. BANK MNC INTERNASIONAL, TBK');
$objPHPExcel->getActiveSheet()->setCellValue('A3', " PRODUK : $produk ");


$objPHPExcel->getActiveSheet()->setCellValue('A4', 'No');
$objPHPExcel->getActiveSheet()->setCellValue('B4', 'Unit / Process / Case ');
$objPHPExcel->getActiveSheet()->setCellValue('C4', 'Done ');
$objPHPExcel->getActiveSheet()->setCellValue('D4', 'Unprocessed ');
$objPHPExcel->getActiveSheet()->setCellValue('E4', 'On Progress ');
$objPHPExcel->getActiveSheet()->setCellValue('F4', 'Expired ');






##############################  PROSES EXCEL =================================================



$i=1;
//mulai dari baris ke 5
$nomer_unit=5;

                            $q_unit  =" select distinct (b.id_unit),b.name as nama_unit from laporan_kerja a, master_unit b where a.id_unit=b.id_unit $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode order by b.name asc ";
                            $res_unit=pg_query($connection,$q_unit);
                          
                            while ($row_unit=pg_fetch_array($res_unit)) {
                            $objPHPExcel->getActiveSheet()->setCellValue("B$nomer_unit", "$row_unit[nama_unit]");
                            $objPHPExcel->getActiveSheet()->setCellValue("A$nomer_unit", "$i");
                            $objPHPExcel->getActiveSheet()->getStyle("A$nomer_unit:F$nomer_unit")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('E6E6FA');
                            $objPHPExcel->getActiveSheet()->getStyle("A$nomer_unit:F$nomer_unit")->applyFromArray($styleArrayFontBold);
                            
                            
                            	$q_proses  =" select distinct (b.id_process),b.name as nama_proses from laporan_kerja a, master_process b ";	
                            	$q_proses .=" where a.id_process=b.id_process and a.id_unit='$row_unit[id_unit]' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode order by b.name asc  ";
                            	$res_proses=pg_query($connection,$q_proses);
                            	while ($row_proses=pg_fetch_array($res_proses)) {
                            	$nomer_unit++;
                            	$objPHPExcel->getActiveSheet()->setCellValue("B$nomer_unit", "$row_proses[nama_proses]");
                            	

								$q_case  =" select distinct (b.id_case),b.name as nama_case from laporan_kerja a, master_case b ";	
                            	$q_case .=" where a.id_case=b.id_case and a.id_unit='$row_unit[id_unit]'  and a.id_process='$row_proses[id_process]' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode order by b.name asc  ";
                            	$res_case=pg_query($connection,$q_case);
                            		$z=1;
                            		while ($row_case=pg_fetch_array($res_case)) {
                            		$nomer_unit++;
                            		####### Query Belum dikerjakan (status=1 & Sla on) ########
								$q_belum =" select count(a.id_lapker) as jml1 from laporan_kerja a  where a.status='1' and a.id_case='$row_case[id_case]' and a.id_unit='$row_unit[id_unit]'  and a.id_process='$row_proses[id_process]' and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";

								$res_belum=pg_query($connection,$q_belum);
								$row_belum=pg_fetch_array($res_belum);
								$count_belum=$row_belum['jml1'];
								if(!isset($count_belum)) {$count_belum=0;}

								####### Query sedang dikerjakan (status=2 & Sla on) ########
								$q_sedang =" select count(a.id_lapker) as jml2 from laporan_kerja a  where a.status='2' and a.id_case='$row_case[id_case]' and a.id_unit='$row_unit[id_unit]'  and a.id_process='$row_proses[id_process]' and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";
								$res_sedang=pg_query($connection,$q_sedang);
								$row_sedang=pg_fetch_array($res_sedang);
								$count_sedang=$row_sedang['jml2'];
								if(!isset($count_sedang)) {$count_sedang=0;}
								####### Query selesai dikerjakan (status=3 )########
								$q_selesai =" select count(a.id_lapker) as jml3 from laporan_kerja a where a.status='3' and a.id_case='$row_case[id_case]' and a.id_unit='$row_unit[id_unit]'  and a.id_process='$row_proses[id_process]' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";
								$res_selesai=pg_query($connection,$q_selesai);
								$row_selesai=pg_fetch_array($res_selesai);
								$count_selesai=$row_selesai['jml3'];
								if(!isset($count_selesai)) {$count_selesai=0;}
								####### Query expire  (status=1 atau 2 & Sla off )########
								$q_expire =" select count(a.id_lapker) as jml4 from laporan_kerja a  where a.status in ('1','2') and a.id_case='$row_case[id_case]' and a.id_unit='$row_unit[id_unit]'  and a.id_process='$row_proses[id_process]' and  to_char(date_sla, 'YYYY-MM-DD') < '".$current_date."' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";

								$result_expire=pg_query($connection,$q_expire);
								$row_expire=pg_fetch_array($result_expire);
								$count_expire=$row_expire['jml4'];
								if(!isset($count_expire)) {$count_expire=0;}

								$per_media=(($count_belum+$count_sedang+$count_selesai+$count_expire)/$jml_total)*100;
								
									$objPHPExcel->getActiveSheet()->setCellValue("B$nomer_unit", "$z.) $row_case[nama_case]");
									$objPHPExcel->getActiveSheet()->getStyle("B$nomer_unit")->applyFromArray($styleArrayFontItalic);
									$objPHPExcel->getActiveSheet()->setCellValue("C$nomer_unit", "$count_selesai");
									$objPHPExcel->getActiveSheet()->setCellValue("D$nomer_unit", "$count_belum");
									$objPHPExcel->getActiveSheet()->setCellValue("E$nomer_unit", "$count_sedang");
									$objPHPExcel->getActiveSheet()->setCellValue("F$nomer_unit", "$count_expire");
								

									$z++;

							
                            }



                            }


							
							$nomer_unit++;
							$i++;
							
									}

$garis_akhir=$nomer_unit-1;
$objPHPExcel->getActiveSheet()->getStyle("A4:F$garis_akhir")->applyFromArray($styleArrayBorder1);
$objPHPExcel->getActiveSheet()->setTitle("SUMMARY PRODUK $produk");



#################################################################################################################################################################################################
### SHEET 2 (FOR PIVOT) --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
#################################################################################################################################################################################################
$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(1);

//DIMENSION D
$objPHPExcel->getActiveSheet(1)->getColumnDimension('A')->setWidth(40);
$objPHPExcel->getActiveSheet(1)->getColumnDimension('B')->setWidth(30);
$objPHPExcel->getActiveSheet(1)->getColumnDimension('C')->setWidth(70);
$objPHPExcel->getActiveSheet(1)->getColumnDimension('D')->setWidth(15);
$objPHPExcel->getActiveSheet(1)->getColumnDimension('E')->setWidth(15);
$objPHPExcel->getActiveSheet(1)->getColumnDimension('F')->setWidth(15);
$objPHPExcel->getActiveSheet(1)->getColumnDimension('G')->setWidth(15);
##### MERGE CELL  ---------
$objPHPExcel->setActiveSheetIndex(1)->mergeCells('A1:G1');
$objPHPExcel->setActiveSheetIndex(1)->mergeCells('A2:G2');
$objPHPExcel->setActiveSheetIndex(1)->mergeCells('A3:G3');





$objPHPExcel->getActiveSheet()->getStyle('A1:G4')->applyFromArray($styleArrayFontBold);
$objPHPExcel->getActiveSheet()->getStyle('A1:G3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('A1:G4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('A1', "DASBOARD COMMONE  Periode $from s.d $to ");
$objPHPExcel->getActiveSheet()->setCellValue('A2', 'PT. BANK MNC INTERNASIONAL, TBK');
$objPHPExcel->getActiveSheet()->setCellValue('A3', " PRODUK : $produk ");
//FILL COLOR

$objPHPExcel->getActiveSheet()->getStyle('A1:I300')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF');
$objPHPExcel->getActiveSheet()->getStyle('A4:G4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('808080');

$objPHPExcel->getActiveSheet()->setCellValue('A4', 'Unit');
$objPHPExcel->getActiveSheet()->setCellValue('B4', 'Process');
$objPHPExcel->getActiveSheet()->setCellValue('C4', 'Case ');
$objPHPExcel->getActiveSheet()->setCellValue('D4', 'Done ');
$objPHPExcel->getActiveSheet()->setCellValue('E4', 'Unprocessed ');
$objPHPExcel->getActiveSheet()->setCellValue('F4', 'On Progress ');
$objPHPExcel->getActiveSheet()->setCellValue('G4', 'Expired ');


##############################  PROSES EXCEL =================================================


$new_number=5;
$i=1;
//mulai dari baris ke 5
$nomer_unit=5;

                            $q_unit  =" select distinct (b.id_unit),b.name as nama_unit from laporan_kerja a, master_unit b where a.id_unit=b.id_unit $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode order by b.name asc ";
                            $res_unit=pg_query($connection,$q_unit);
                          
                    while ($row_unit=pg_fetch_array($res_unit)) {
                            //$objPHPExcel->getActiveSheet()->setCellValue("B$nomer_unit", "$row_unit[nama_unit]");
                            //$objPHPExcel->getActiveSheet()->setCellValue("A$nomer_unit", "$i");
                            //$objPHPExcel->getActiveSheet()->getStyle("A$nomer_unit:F$nomer_unit")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('E6E6FA');
                            //$objPHPExcel->getActiveSheet()->getStyle("A$nomer_unit:F$nomer_unit")->applyFromArray($styleArrayFontBold);
                            
                            
                            	$q_proses  =" select distinct (b.id_process),b.name as nama_proses from laporan_kerja a, master_process b ";	
                            	$q_proses .=" where a.id_process=b.id_process and a.id_unit='$row_unit[id_unit]' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode order by b.name asc  ";
                            	$res_proses=pg_query($connection,$q_proses);
                            while ($row_proses=pg_fetch_array($res_proses)) {
                            	$nomer_unit++;
								//$objPHPExcel->getActiveSheet()->setCellValue("A$nomer_unit", "$row_unit[nama_unit]");
								//$objPHPExcel->getActiveSheet()->setCellValue("B$nomer_unit", "$row_proses[nama_proses]");
                            	//$objPHPExcel->getActiveSheet()->setCellValue("C$nomer_unit", "$row_proses[nama_proses]");
                            	

								$q_case  =" select distinct (b.id_case),b.name as nama_case from laporan_kerja a, master_case b ";	
                            	$q_case .=" where a.id_case=b.id_case and a.id_unit='$row_unit[id_unit]'  and a.id_process='$row_proses[id_process]' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode order by b.name asc  ";
                            	$res_case=pg_query($connection,$q_case);
                            		$z=1;
                            		while ($row_case=pg_fetch_array($res_case)) {
												$nomer_unit++;
												####### Query Belum dikerjakan (status=1 & Sla on) ########
												$q_belum =" select count(a.id_lapker) as jml1 from laporan_kerja a  where a.status='1' and a.id_case='$row_case[id_case]' and a.id_unit='$row_unit[id_unit]'  and a.id_process='$row_proses[id_process]' and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";

												$res_belum=pg_query($connection,$q_belum);
												$row_belum=pg_fetch_array($res_belum);
												$count_belum=$row_belum['jml1'];
												if(!isset($count_belum)) {$count_belum=0;}

												####### Query sedang dikerjakan (status=2 & Sla on) ########
												$q_sedang =" select count(a.id_lapker) as jml2 from laporan_kerja a  where a.status='2' and a.id_case='$row_case[id_case]' and a.id_unit='$row_unit[id_unit]'  and a.id_process='$row_proses[id_process]' and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";
												$res_sedang=pg_query($connection,$q_sedang);
												$row_sedang=pg_fetch_array($res_sedang);
												$count_sedang=$row_sedang['jml2'];
												if(!isset($count_sedang)) {$count_sedang=0;}
												####### Query selesai dikerjakan (status=3 )########
												$q_selesai =" select count(a.id_lapker) as jml3 from laporan_kerja a where a.status='3' and a.id_case='$row_case[id_case]' and a.id_unit='$row_unit[id_unit]'  and a.id_process='$row_proses[id_process]' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";
												$res_selesai=pg_query($connection,$q_selesai);
												$row_selesai=pg_fetch_array($res_selesai);
												$count_selesai=$row_selesai['jml3'];
												if(!isset($count_selesai)) {$count_selesai=0;}
												####### Query expire  (status=1 atau 2 & Sla off )########
												$q_expire =" select count(a.id_lapker) as jml4 from laporan_kerja a  where a.status in ('1','2') and a.id_case='$row_case[id_case]' and a.id_unit='$row_unit[id_unit]'  and a.id_process='$row_proses[id_process]' and  to_char(date_sla, 'YYYY-MM-DD') < '".$current_date."' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";

												$result_expire=pg_query($connection,$q_expire);
												$row_expire=pg_fetch_array($result_expire);
												$count_expire=$row_expire['jml4'];
												if(!isset($count_expire)) {$count_expire=0;}

												$per_media=(($count_belum+$count_sedang+$count_selesai+$count_expire)/$jml_total)*100;
													$objPHPExcel->getActiveSheet()->setCellValue("A$new_number", "$row_unit[nama_unit]");
													$objPHPExcel->getActiveSheet()->setCellValue("B$new_number", "$row_proses[nama_proses]");
													$objPHPExcel->getActiveSheet()->setCellValue("C$new_number", "$row_case[nama_case]");
													//$objPHPExcel->getActiveSheet()->getStyle("$nomer_unit")->applyFromArray($styleArrayFontItalic);
													
													
													$objPHPExcel->getActiveSheet()->setCellValue("D$new_number", "$count_selesai");
													$objPHPExcel->getActiveSheet()->setCellValue("E$new_number", "$count_belum");
													$objPHPExcel->getActiveSheet()->setCellValue("F$new_number", "$count_sedang");
													$objPHPExcel->getActiveSheet()->setCellValue("G$new_number", "$count_expire");
												

													$z++;
													$new_number++;

							
									}



                            }


							
							$nomer_unit++;
							$i++;
							
					}

$garis_akhir=$new_number-1;
$objPHPExcel->getActiveSheet()->getStyle("A4:G$garis_akhir")->applyFromArray($styleArrayBorder1);


$objPHPExcel->getActiveSheet()->setTitle("OTHERS");





$objPHPExcel->setActiveSheetIndex(0);




//Done	Unprocessed	On Progress	Expired


//header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//$objWriter->save('php://output');
$objWriter->save("../../data/download/DASHBOARD"."_".$file_eksport.".xls");


$jml_baris_txt=0;


//10  NOP101000001    Aktiva Tidak Termasuk Giro Pada Bank Lain
$objPHPExcel = PHPExcel_IOFactory::load("../../data/download/DASHBOARD"."_".$file_eksport.".xls");
$objWorksheet = $objPHPExcel->getActiveSheet();


if($_POST['idproduct'])
{

?>

<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Dashboard Data Inquiry of " <?php echo $produk; ?> "</span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											<div class="pull-right" style="font-size:12px">
<a href="<?php echo "http://".$_SERVER['HTTP_HOST']."/commone/data/download/DASHBOARD"."_".$file_eksport.".xls";?>" class="btn btn-sm green" download> Download Excel <i class="fa fa-arrow-circle-o-down"></i> </a> <br></div>
										</div>
									</div>
                        
                        
						<div class="portlet-body">

					   <div class="table-scrollable">
					 
					<table class="table table-striped table-bordered table-hover" id="sample_2" width="100%">
							<thead>
							<tr class='active'>
								<th style="font-size:11px" width="5%">
									 No
								</th>
								<th style="font-size:11px" width="55%">
									 Unit / Process / Case
								</th>
								<th  style="font-size:11px" width="10%">
									 Done
								</th>
								<th style="font-size:11px" width="10%">
									 Unprocessed
								</th>
								<th style="font-size:11px" width="10%">
									 On Progress
								</th>
								<th style="font-size:11px" width="10%">
									 Expired
								</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$i=1;
                            $q_unit  =" select distinct (b.id_unit),b.name as nama_unit from laporan_kerja a, master_unit b where a.id_unit=b.id_unit $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode order by b.name asc ";
                            $res_unit=pg_query($connection,$q_unit);
                          
                            while ($row_unit=pg_fetch_array($res_unit)) {
                            echo "<tr >";
							echo "<td style='font-size:11px'></td>";
							echo "<td style='font-size:13px'><b>$row_unit[nama_unit]</b></td>";
							echo "<td style='font-size:11px'></td>";
							echo "<td style='font-size:11px'></td>";
							echo "<td style='font-size:11px'></td>";
							echo "<td style='font-size:11px'></td>";
							echo "</tr>";

                            	$q_proses  =" select distinct (b.id_process),b.name as nama_proses from laporan_kerja a, master_process b ";	
                            	$q_proses .=" where a.id_process=b.id_process and a.id_unit='$row_unit[id_unit]' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode order by b.name asc  ";
                            	$res_proses=pg_query($connection,$q_proses);
                            	while ($row_proses=pg_fetch_array($res_proses)) {

                            	echo "<tr class='success'>";
								echo "<td style='font-size:11px'></td>";
								echo "<td style='font-size:11px'><i><b>$row_proses[nama_proses]</b></i></td>";
								echo "<td style='font-size:11px'></td>";
								echo "<td style='font-size:11px'></td>";
								echo "<td style='font-size:11px'></td>";
								echo "<td style='font-size:11px'></td>";
								echo "</tr>";

								$q_case  =" select distinct (b.id_case),b.name as nama_case from laporan_kerja a, master_case b ";	
                            	$q_case .=" where a.id_case=b.id_case and a.id_unit='$row_unit[id_unit]'  and a.id_process='$row_proses[id_process]' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode order by b.name asc  ";
                            	$res_case=pg_query($connection,$q_case);
                            		$z=1;
                            		while ($row_case=pg_fetch_array($res_case)) {

                            		####### Query Belum dikerjakan (status=1 & Sla on) ########
								$q_belum =" select count(a.id_lapker) as jml1 from laporan_kerja a  where a.status='1' and a.id_case='$row_case[id_case]' and a.id_unit='$row_unit[id_unit]'  and a.id_process='$row_proses[id_process]' and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";

								$res_belum=pg_query($connection,$q_belum);
								$row_belum=pg_fetch_array($res_belum);
								$count_belum=$row_belum['jml1'];
								if(!isset($count_belum)) {$count_belum=0;}

								####### Query sedang dikerjakan (status=2 & Sla on) ########
								$q_sedang =" select count(a.id_lapker) as jml2 from laporan_kerja a  where a.status='2' and a.id_case='$row_case[id_case]' and a.id_unit='$row_unit[id_unit]'  and a.id_process='$row_proses[id_process]' and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";
								$res_sedang=pg_query($connection,$q_sedang);
								$row_sedang=pg_fetch_array($res_sedang);
								$count_sedang=$row_sedang['jml2'];
								if(!isset($count_sedang)) {$count_sedang=0;}
								####### Query selesai dikerjakan (status=3 )########
								$q_selesai =" select count(a.id_lapker) as jml3 from laporan_kerja a where a.status='3' and a.id_case='$row_case[id_case]' and a.id_unit='$row_unit[id_unit]'  and a.id_process='$row_proses[id_process]' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";
								$res_selesai=pg_query($connection,$q_selesai);
								$row_selesai=pg_fetch_array($res_selesai);
								$count_selesai=$row_selesai['jml3'];
								if(!isset($count_selesai)) {$count_selesai=0;}
								####### Query expire  (status=1 atau 2 & Sla off )########
								$q_expire =" select count(a.id_lapker) as jml4 from laporan_kerja a  where a.status in ('1','2') and a.id_case='$row_case[id_case]' and a.id_unit='$row_unit[id_unit]'  and a.id_process='$row_proses[id_process]' and  to_char(date_sla, 'YYYY-MM-DD') < '".$current_date."' $var_product1  $var_unit $var_proses $var_case $var_cause $var_jslaporan $varperiode ";

								$result_expire=pg_query($connection,$q_expire);
								$row_expire=pg_fetch_array($result_expire);
								$count_expire=$row_expire['jml4'];
								if(!isset($count_expire)) {$count_expire=0;}

								$per_media=(($count_belum+$count_sedang+$count_selesai+$count_expire)/$jml_total)*100;

                            		echo "<tr class='warning'>";
									echo "<td style='font-size:11px' ></td>";
									echo "<td style='font-size:11px'>$z.) $row_case[nama_case]</td>";
									echo "<td style='font-size:11px' align='right'>$count_selesai</td>";
									echo "<td style='font-size:11px' align='right'>$count_belum</td>";
									echo "<td style='font-size:11px' align='right'>$count_sedang</td>";
									echo "<td style='font-size:11px' align='right'>$count_expire</td>";
									echo "</tr>";

									$z++;

							
                            }



                            }


							
							
							$i++;
							
									}
							?>


							</tbody>
							</table>
						
							</div>

					    	

					    	
					    </div>

						</div>
					</div>



<?php
}

?>
