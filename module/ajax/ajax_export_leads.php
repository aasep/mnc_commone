
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

	if ($from==$to){
				$varperiode=" where to_char(a.adddt, 'YYYY-MM-DD') ='".$from."'";
	}	else {
				//$varperiode=" where to_char(a.adddt, 'YYYY-MM-DD') between '".$from."' and '".$to."'";
				$varperiode=" where to_char(a.adddt, 'YYYY-MM-DD') >= '$from' and to_char(a.adddt, 'YYYY-MM-DD') <= '$to' "; 
				}

//$query=" select *,a.adddt,b.description as ket_purpose, c.name as nama_channel from  data_leads a  ";
$query =" select a.adddt,a.customer_name,a.phone,a.email,a.kota_domisili,a.tgl_meeting,b.description as ket_purpose, c.name as nama_channel from  data_leads a ";
$query.=" left join  daftar_keperluan b on a.id_purpose=b.id_purpose ";
$query.=" left join master_channel c on a.id_channel=c.id_channel ";
$query.=" $varperiode  ";

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
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);


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



$objPHPExcel->getActiveSheet()->getStyle('A1:J6')->applyFromArray($styleArrayFontBold);



$objPHPExcel->getActiveSheet()->getStyle('B6:Q6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('B6:Q6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



//=======BORDER

$styleArrayBorder1 = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' => array('argb' => ''),),),);
$styleArrayBorder2 = array('borders' => array('outline' => array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' => array('argb' => ''),),),);



//FILL COLOR

$objPHPExcel->getActiveSheet()->getStyle('A1:Z500')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF');

$objPHPExcel->getActiveSheet()->getStyle('B6:J6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('808080');


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



$objPHPExcel->getActiveSheet()->setCellValue('B3', 'LEADS DATA');
$objPHPExcel->getActiveSheet()->setCellValue('B4', "TANGGAL : $from s/d $to ");



$objPHPExcel->getActiveSheet()->setCellValue('B6', 'NO');
$objPHPExcel->getActiveSheet()->setCellValue('C6', 'TANGGAL');
$objPHPExcel->getActiveSheet()->setCellValue('D6', 'CUSTOMER NAME');
$objPHPExcel->getActiveSheet()->setCellValue('E6', 'PHONE');
$objPHPExcel->getActiveSheet()->setCellValue('F6', 'EMAIL');
$objPHPExcel->getActiveSheet()->setCellValue('G6', 'KOTA DOMISILI');
$objPHPExcel->getActiveSheet()->setCellValue('H6', 'TGL MEETING ');
$objPHPExcel->getActiveSheet()->setCellValue('I6', 'CHANNEL');
$objPHPExcel->getActiveSheet()->setCellValue('J6', 'PURPOSE');

##############################  PROSES EXCEL =================================================

		$i=7;
		while ($row_mncpay=pg_fetch_array($result)) {


                $objPHPExcel->getActiveSheet()->setCellValue("B$i", $i);
                $objPHPExcel->getActiveSheet()->setCellValue("C$i", date('d-m-Y',strtotime($row_mncpay['adddt'])));
                $objPHPExcel->getActiveSheet()->setCellValue("D$i", $row_mncpay['customer_name']);
                $objPHPExcel->getActiveSheet()->setCellValue("E$i", $row_mncpay['phone']);
                $objPHPExcel->getActiveSheet()->setCellValue("F$i", $row_mncpay['email']);
                $objPHPExcel->getActiveSheet()->setCellValue("G$i", $row_mncpay['kota_domisili']);
                $objPHPExcel->getActiveSheet()->setCellValue("H$i", $row_mncpay['tgl_meeting']);
                $objPHPExcel->getActiveSheet()->setCellValue("I$i", $row_mncpay['nama_channel']);
                $objPHPExcel->getActiveSheet()->setCellValue("J$i", $row_mncpay['ket_purpose']);
           $i++;
        }

$garis_akhir=$i-1;

$objPHPExcel->getActiveSheet()->getStyle("B6:J$garis_akhir")->applyFromArray($styleArrayBorder1);
$objPHPExcel->getActiveSheet()->getStyle("E6:E$garis_akhir")->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);

//$objPHPExcel->getActiveSheet()->getStyle("N7:P$garis_akhir")->getNumberFormat()->setFormatCode('#,##0_0.00;(#,##0.00);"-"');
//$objPHPExcel->getActiveSheet()->getStyle("N7:P$garis_akhir")->getNumberFormat()->setFormatCode('0.00'); 

//Done	Unprocessed	On Progress	Expired
$objPHPExcel->getActiveSheet()->setTitle('Leads Data');


//header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//$objWriter->save('php://output');
$objWriter->save("../../data/download/LeadsData"."_".$file_eksport.".xls");


//$jml_baris_txt=0;


//10  NOP101000001    Aktiva Tidak Termasuk Giro Pada Bank Lain
//$objPHPExcel = PHPExcel_IOFactory::load("../../data/download/MNCPay"."_".$file_eksport.".xls");
//$objWorksheet = $objPHPExcel->getActiveSheet();


?>

										
<div class="center" style="font-size:12px">
	<a href="<?php echo "http://".$_SERVER['HTTP_HOST']."/commone/data/download/LeadsData"."_".$file_eksport.".xls";?>" class="btn btn-sm green" download> Download Excel <i class="fa fa-arrow-circle-o-down"></i> </a> <br><br>
</div>
										
									
                        
                      