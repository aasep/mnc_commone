
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
				$varperiode=" where to_char(input_date, 'YYYY-MM-DD') ='".$from."'";
	}	else {
				$varperiode=" where to_char(input_date, 'YYYY-MM-DD') between '".$from."' and '".$to."'";
				}

$query=" select * from  mncpay_pengajuan $varperiode ";
$result=pg_query($connection,$query);



$file_eksport=date('Y_m_d_H_i_s');

$objPHPExcel = new PHPExcel();


$styleArrayFont = array('font' => array('bold'  => true,'color' => array('rgb' => ''),'size'  => 11,'name'  => 'Calibri'));
$styleArrayAlignment = array('alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        ));

//DIMENSION D
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(7);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(37);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(20);

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



$objPHPExcel->getActiveSheet()->getStyle('A1:T6')->applyFromArray($styleArrayFontBold);



$objPHPExcel->getActiveSheet()->getStyle('A6:T6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('A6:T6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



//=======BORDER

$styleArrayBorder1 = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' => array('argb' => ''),),),);
$styleArrayBorder2 = array('borders' => array('outline' => array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' => array('argb' => ''),),),);



//FILL COLOR

$objPHPExcel->getActiveSheet()->getStyle('A1:Z500')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF');

$objPHPExcel->getActiveSheet()->getStyle('A6:T6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('808080');


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



$objPHPExcel->getActiveSheet()->setCellValue('B3', 'FORM INSTALLMENT TRANSAKSI MNCPAY');
$objPHPExcel->getActiveSheet()->setCellValue('B4', "KODE PROGRAM : PM0002");



$objPHPExcel->getActiveSheet()->setCellValue('A6', 'NO');
$objPHPExcel->getActiveSheet()->setCellValue('B6', 'ID_REQ');
$objPHPExcel->getActiveSheet()->setCellValue('C6', 'TANGGAL');
$objPHPExcel->getActiveSheet()->setCellValue('D6', 'NO KARTU KREDIT');
$objPHPExcel->getActiveSheet()->setCellValue('E6', 'NAMA CHARDHOLDER');
$objPHPExcel->getActiveSheet()->setCellValue('F6', 'TANGGAL TRANSAKSI');
$objPHPExcel->getActiveSheet()->setCellValue('G6', 'APPROVAL CODE');

$objPHPExcel->getActiveSheet()->setCellValue('H6', 'MERCHANT NAME');
$objPHPExcel->getActiveSheet()->setCellValue('I6', 'JUMLAH TRANSAKSI');
$objPHPExcel->getActiveSheet()->setCellValue('J6', 'PLAN');
$objPHPExcel->getActiveSheet()->setCellValue('K6', 'KODE PRODUCT');

$objPHPExcel->getActiveSheet()->setCellValue('L6', 'TENOR CICILAN ( BULAN )');
$objPHPExcel->getActiveSheet()->setCellValue('M6', 'JUMLAH BUNGA %');
$objPHPExcel->getActiveSheet()->setCellValue('N6', 'JUMLAH BUNGA');
$objPHPExcel->getActiveSheet()->setCellValue('O6', 'JUMLAH TRANSAKSI (INCLUDE BUNGA)');

$objPHPExcel->getActiveSheet()->setCellValue('P6', 'JUMLAH CICILAN PER BULAN');
$objPHPExcel->getActiveSheet()->setCellValue('Q6', 'KET');
$objPHPExcel->getActiveSheet()->setCellValue('R6', 'INPUTED BY');
$objPHPExcel->getActiveSheet()->setCellValue('S6', 'FINISHED BY');
$objPHPExcel->getActiveSheet()->setCellValue('T6', 'DATE FINISH');

##############################  PROSES EXCEL =================================================  abcde

		$nomor=1;
		$i=7;
		while ($row_mncpay=pg_fetch_array($result)) {


                $objPHPExcel->getActiveSheet()->setCellValue("A$i", $nomor);
				$objPHPExcel->getActiveSheet()->setCellValue("B$i", $row_mncpay['id_mncpay']);
                $objPHPExcel->getActiveSheet()->setCellValue("C$i", date('d-m-Y',strtotime($row_mncpay['input_date'])));
                $objPHPExcel->getActiveSheet()->setCellValueExplicit("D$i", $row_mncpay['credit_card_number'],PHPExcel_Cell_DataType::TYPE_STRING);
                //$objPHPExcel->getActiveSheet()->setCellValue("D$i", $row_mncpay['credit_card_number']);
                $objPHPExcel->getActiveSheet()->setCellValue("E$i", $row_mncpay['customer_name']);
                $objPHPExcel->getActiveSheet()->setCellValue("F$i", date('d-m-Y',strtotime($row_mncpay['transaction_date'])));
                $objPHPExcel->getActiveSheet()->setCellValue("G$i", $row_mncpay['approval_code']);
                $objPHPExcel->getActiveSheet()->setCellValue("H$i", $row_mncpay['merchant_name']);
                $objPHPExcel->getActiveSheet()->setCellValue("I$i", $row_mncpay['transaction_nominal']);
                $objPHPExcel->getActiveSheet()->setCellValue("J$i", $row_mncpay['plan_code']);
                $objPHPExcel->getActiveSheet()->setCellValue("K$i", $row_mncpay['product_code']);
                $objPHPExcel->getActiveSheet()->setCellValue("L$i", $row_mncpay['tenor']);
                $objPHPExcel->getActiveSheet()->setCellValue("M$i", $row_mncpay['interest_rate']);
                $objPHPExcel->getActiveSheet()->setCellValue("N$i", floatval($row_mncpay['interest_nominal']));
                $objPHPExcel->getActiveSheet()->setCellValue("O$i", floatval($row_mncpay['total_nominal']));
                $objPHPExcel->getActiveSheet()->setCellValue("P$i", floatval($row_mncpay['installment_nominal']));
                $objPHPExcel->getActiveSheet()->setCellValue("Q$i", $row_mncpay['keterangan']);
                $objPHPExcel->getActiveSheet()->setCellValue("R$i", $row_mncpay['id_karyawan']);
                if ( !isset($row_mncpay['finish_by']) || $row_mncpay['finish_by'] == "" || $row_mncpay['finish_by'] ==NULL) {

                    $objPHPExcel->getActiveSheet()->setCellValue("S$i", " - ");
                    $objPHPExcel->getActiveSheet()->setCellValue("T$i", " - ");

                } else {
                    $objPHPExcel->getActiveSheet()->setCellValue("S$i", $row_mncpay['finish_by']);
                    $objPHPExcel->getActiveSheet()->setCellValue("T$i", date('d-m-Y',strtotime($row_mncpay['date_finish'])));

                }
                

           $i++;
		   $nomor++;
        }

$garis_akhir=$i-1;

$objPHPExcel->getActiveSheet()->getStyle("A6:T$garis_akhir")->applyFromArray($styleArrayBorder1);

$line_signature=$i+5;
$end_line_signature=$line_signature+7;

$objPHPExcel->getActiveSheet()->setCellValue("E$line_signature", 'PROCESS');
$objPHPExcel->getActiveSheet()->setCellValue("F$line_signature", 'APPROVAL');
$objPHPExcel->getActiveSheet()->setCellValue("H$line_signature", 'PROCESS');


$objPHPExcel->getActiveSheet()->getStyle("E$line_signature:H$line_signature")->applyFromArray($styleArrayFontBold);
$objPHPExcel->getActiveSheet()->getStyle("E$line_signature:H$line_signature")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);





 $objPHPExcel->setActiveSheetIndex(0)->mergeCells("E".($line_signature+1).":E".($line_signature+6));
 $objPHPExcel->setActiveSheetIndex(0)->mergeCells("F".($line_signature+1).":F".($line_signature+6));
 $objPHPExcel->setActiveSheetIndex(0)->mergeCells("H".($line_signature+1).":H".($line_signature+6));

$objPHPExcel->getActiveSheet()->getStyle("E$line_signature:F$end_line_signature")->applyFromArray($styleArrayBorder1);
$objPHPExcel->getActiveSheet()->getStyle("H$line_signature:H$end_line_signature")->applyFromArray($styleArrayBorder1);


$objPHPExcel->getActiveSheet()->getStyle("N7:P$garis_akhir")->getNumberFormat()->setFormatCode('#,##0_0;(#,##0);"-"');
//$objPHPExcel->getActiveSheet()->getStyle("N7:P$garis_akhir")->getNumberFormat()->setFormatCode('0.00'); 

//Done	Unprocessed	On Progress	Expired
$objPHPExcel->getActiveSheet()->setTitle('Request MNC Pay');


//header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//$objWriter->save('php://output');
$objWriter->save("../../data/download/MNCPay"."_".$file_eksport.".xls");


//$jml_baris_txt=0;


//10  NOP101000001    Aktiva Tidak Termasuk Giro Pada Bank Lain
//$objPHPExcel = PHPExcel_IOFactory::load("../../data/download/MNCPay"."_".$file_eksport.".xls");
//$objWorksheet = $objPHPExcel->getActiveSheet();


?>

										
<div class="center" style="font-size:12px">
	<a href="<?php echo "http://".$_SERVER['HTTP_HOST']."/commone/data/download/MNCPay"."_".$file_eksport.".xls";?>" class="btn btn-sm green" download> Download Excel <i class="fa fa-arrow-circle-o-down"></i> </a> <br><br>
</div>
										
									
                        
                      