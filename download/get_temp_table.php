
<?php
require_once '../config/config.php';
require_once '../function/function.php';
require_once '../module/ajax/Classes/PHPExcel.php';
require_once '../module/ajax/Classes/PHPExcel/IOFactory.php';
error_reporting(0);
date_default_timezone_set("Asia/Bangkok");

logActivity("GENERATE SCHEDULE EXCEL","Temp_Table and Broadcast Email...");

$current_date = date('Y-m-d');

//$current_date = date('Y-m-d',strtotime("2018-09-19"));

$varperiode=" where to_char(adddt, 'YYYY-MM-DD') ='".$current_date."'";

//$varperiode=" where to_char(adddt, 'YYYY-MM-DD') >='2017-12-30' and to_char(adddt, 'YYYY-MM-DD') <='2017-12-31'";				



$query=" select * from temp_table $varperiode order by adddt desc  ";


$result=pg_query($connection,$query);



$file_eksport=date('Y_m_d_H_i_s');
//$file_eksport="2017_05_30_backup";

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


$objPHPExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(50);
$objPHPExcel->getActiveSheet()->getRowDimension(6)->setRowHeight(30);

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

$gdImage = imagecreatefromjpeg('../images/new_logo_mc.jpg');
$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
$objDrawing->setName('Sample image');
$objDrawing->setDescription('Sample image');
$objDrawing->setImageResource($gdImage);
$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
$objDrawing->setHeight(50);
$objDrawing->setCoordinates('B2');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());




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
                $objPHPExcel->getActiveSheet()->setCellValue("D$i", ucwords(strtolower($row_mncpay['customer_name'])));
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


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

$objWriter->save("autoexcel/TEMPtable"."_".$file_eksport.".xls");



####################  EMAIL   ################################################################
$from="commone@mncbank.co.id";

$email="diah.pandansari@mncbank.co.id,service_quality@mncbank.co.id,harlistyo@mncbank.co.id,asep.arifyan@mncbank.co.id";
//$email="januar.rizki@mncbank.co.id,service_quality@mncbank.co.id,puncel_fu@mncbank.co.id,asep.arifyan@mncbank.co.id";
//$email="asep.arifyan@mncbank.co.id";

$headers = 'From: '.$from. "\r\n" .
    'Reply-To: '.$from . "\r\n" .
    'X-Mailer: PHP/' . phpversion(). "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$subject="NOTIFICATION : Export Excel from temp_table";

  $message =" <b>Notification Get Temp Table</b> <br><br>";
  $message.=" ######################################################################## <br><br>";
  $message.=" Tgl Generate : <b> ".date('d-m-Y',strtotime($current_date))."</b> <br>";
 
  $message.=" <br><br>"; 
  $message.=" Untuk Download Klik Link Berikut : <a href='http://10.5.68.104:8012/commone/download/autoexcel/TEMPtable"."_".$file_eksport.".xls'> Download </a><br>";
  $message.=" <br><br><br><br>"; 
  $message.=" ----------------------------------------------------------------------- <br>";
  $message.=" PT. Bank MNC Internasional, Tbk <br>";
  $message.=" <b><i>Admin Commone System</i></b> <br>";
  $message.=" <i>Email : commone@mncbank.co.id </i> <br>";


		mail($email, $subject, $message, $headers);





?>
               
                      