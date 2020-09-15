
<?php
require_once '../../config/config.php';
//require_once '../../session_login.php';
//require_once '../../session_group.php';
require_once 'Classes/PHPExcel.php';
require_once 'Classes/PHPExcel/IOFactory.php';
date_default_timezone_set("Asia/Bangkok");
$current_date = date('Y-m-d');
$from=$_POST['from'];
$to=$_POST['to'];
//echo $from."<br>";
//echo $to;
//die();
$current_date='2017-01-12';
$to='2017-02-31';


//	if ($from==$to){
				$varperiode=" where to_char(adddt, 'YYYY-MM-DD') ='".$current_date."'";
//	}	else {
//				$varperiode=" where to_char(adddt, 'YYYY-MM-DD') between '".$from."' and '".$to."'";
//				}

$query=" select * from temp_table $varperiode ";
$result=pg_query($connection,$query);



$file_eksport=date('Y_m_d_H_i_s');

$objPHPExcel = new PHPExcel();


$styleArrayFont = array('font' => array('bold'  => true,'color' => array('rgb' => ''),'size'  => 11,'name'  => 'Calibri'));
$styleArrayAlignment = array('alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        ));

//DIMENSION D
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(7);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(16);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
// $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
// $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
// $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
// $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
// $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
// $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(37);
// $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
// $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(10);

$objPHPExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(50);
$objPHPExcel->getActiveSheet()->getRowDimension(6)->setRowHeight(30);
// $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:F1');
// $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A2:F2');
// $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A3:F3');

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



$objPHPExcel->getActiveSheet()->getStyle('A1:I6')->applyFromArray($styleArrayFontBold);



$objPHPExcel->getActiveSheet()->getStyle('B6:I6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('B6:I6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



//=======BORDER

$styleArrayBorder1 = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' => array('argb' => ''),),),);
$styleArrayBorder2 = array('borders' => array('outline' => array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' => array('argb' => ''),),),);



//FILL COLOR

$objPHPExcel->getActiveSheet()->getStyle('A1:Z500')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF');

$objPHPExcel->getActiveSheet()->getStyle('B6:I6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('808080');


$objPHPExcel->setActiveSheetIndex(0);
//$objPHPExcel->getActiveSheet()->setCellValue('A1', "DASBOARD COMMONE  Periode $from s.d $to ");

$gdImage = imagecreatefromjpeg('../../images/new_logo_mc.jpg');
// Add a drawing to the worksheetecho date('H:i:s') . " Add a drawing to the worksheet\n";
$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
$objDrawing->setName('Sample image');
$objDrawing->setDescription('Sample image');
$objDrawing->setImageResource($gdImage);
$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
$objDrawing->setHeight(50);
$objDrawing->setCoordinates('B2');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());




//$objDrawing->setPath('../../images/new_logo_mc.jpg');

//$objDrawing->setCoordinates('A15');







$objPHPExcel->getActiveSheet()->setCellValue('B3', 'TEMP TABLE');
$objPHPExcel->getActiveSheet()->setCellValue('B4', "TANGGAL : $current_date");

  	  



$objPHPExcel->getActiveSheet()->setCellValue('B6', 'NO');
$objPHPExcel->getActiveSheet()->setCellValue('C6', 'TANGGAL INPUT');
$objPHPExcel->getActiveSheet()->setCellValue('D6', 'CUSTOMER NAME');
$objPHPExcel->getActiveSheet()->setCellValue('E6', 'PHONE');
$objPHPExcel->getActiveSheet()->setCellValue('F6', 'EMAIL');
$objPHPExcel->getActiveSheet()->setCellValue('G6', 'KOTA DOMISILI');
$objPHPExcel->getActiveSheet()->setCellValue('H6', 'TGL. MEETING');
$objPHPExcel->getActiveSheet()->setCellValue('I6', 'ID PURPOSE');


##############################  PROSES EXCEL =================================================

		$i=7;
        $z=1;
		while ($row_mncpay=pg_fetch_array($result)) {


                $objPHPExcel->getActiveSheet()->setCellValue("B$i", $z);
                $objPHPExcel->getActiveSheet()->setCellValue("C$i", date('d-m-Y',strtotime($row_mncpay['adddt'])));
                $objPHPExcel->getActiveSheet()->setCellValue("D$i", $row_mncpay['customer_name']);
                $objPHPExcel->getActiveSheet()->setCellValue("E$i", $row_mncpay['phone']);
                $objPHPExcel->getActiveSheet()->setCellValue("F$i", $row_mncpay['email']);
                $objPHPExcel->getActiveSheet()->setCellValue("G$i", $row_mncpay['kota_domisili']);
                $objPHPExcel->getActiveSheet()->setCellValue("H$i", $row_mncpay['tgl_meeting']);
                $objPHPExcel->getActiveSheet()->setCellValue("I$i", $row_mncpay['id_purpose']);
               



           $i++;
           $z++;
        }

$garis_akhir=$i-1;

$objPHPExcel->getActiveSheet()->getStyle("B6:I$garis_akhir")->applyFromArray($styleArrayBorder1);


$objPHPExcel->getActiveSheet()->getStyle("C7:H$garis_akhir")->getNumberFormat()->setFormatCode(
        PHPExcel_Style_NumberFormat::FORMAT_TEXT);

//Done	Unprocessed	On Progress	Expired
$objPHPExcel->getActiveSheet()->setTitle('TEMP_TABLE');


//header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//$objWriter->save('php://output');
$objWriter->save("../../download/autoexcel/TEMPtable"."_".$file_eksport.".xls");


?>

										
<div class="center" style="font-size:12px">
	<a href="<?php echo "http://".$_SERVER['HTTP_HOST']."/commone/download/autoexcel/TEMPtable"."_".$file_eksport.".xls";?>" class="btn btn-sm green" download> Download Excel <i class="fa fa-arrow-circle-o-down"></i> </a> <br><br>
</div>
										
									
                        
                      