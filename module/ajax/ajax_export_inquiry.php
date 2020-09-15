
<?php
require_once '../../config/config.php';
require_once '../../function/function.php';
//require_once '../../session_login.php';
//require_once '../../session_group.php';
require_once 'Classes/PHPExcel.php';
require_once 'Classes/PHPExcel/IOFactory.php';
date_default_timezone_set("Asia/Bangkok");
error_reporting(0);

$current_date = date('Y-m-d');
$from=$_POST['from'];
$to=$_POST['to'];


// FROM dan TO  (PERIODE)

        if ( (isset($_POST['from']) && $_POST['from']<>"") || (isset($_POST['to'])&& $_POST['to']<>"")){

                if ($from==$to){
                    $varperiode=" and to_char(a.date_start, 'YYYY-MM-DD') ='".$from."'";
                    $label_periode= "$from ";
                }   else {
                        $varperiode=" and to_char(a.date_start, 'YYYY-MM-DD') between '".$from."' and '".$to."'";
                        $label_periode= "$from  s.d  $to ";
                    }
        } else {
                $varperiode="";
            }



//product B
					$p=1;
					$query=" select * from master_product order by name asc ";
					$r_product=pg_query($connection,$query);
					$jml_row=pg_num_rows($r_product);
					while ($row1=pg_fetch_array($r_product)){
						
						if($p==$jml_row){
								$val_prod.=$row1['id_product']."";

						} else {

								$val_prod.=$row1['id_product'].",";
							}
						
						$p++;	
							
					}


        $idproduct=$_POST['id_product'];
		if ($idproduct=='ALL'){
			
			$var_product=" where a.id_product in ($val_prod) ";
			
		}else{
			
			$var_product=" where a.id_product='$idproduct' ";
			
		}
		
        

//status========
        if(isset($_POST['id_status']) && $_POST['id_status']!="" && $_POST['id_status']!=NULL) { 
                $status=$_POST['id_status']; 

                switch ($status) {
                                 case '1' : $var_status=" and  a.status='1' "; break; //ticket_number
                                 case '2' : $var_status=" and  a.status='2' "; break; //customer_name
                                 case '3' : $var_status=" and  a.status='3' "; break; //account_number
                                 case '4' : $var_status=" and  a.status in ('1','2')  and  to_char(a.date_sla, 'YYYY-MM-DD') < '".$current_date."' "; break; //account_number

                                    }
    

        } else {
                 $var_status="";
            }



//unit C
        if(isset($_POST['id_unit']) && $_POST['id_unit']<>"") { 
                $idunit=$_POST['id_unit']; 
                $var_unit=" and  a.id_unit='$idunit' ";
        } else {
                $var_unit="";
            }
//prosess D
        if(isset($_POST['id_process'])&& $_POST['id_process']<>"") { 
                $idproses=$_POST['id_process'];
                $var_proses=" and  a.id_process='$idproses' ";
        } else {
                $var_proses="";
            }
//permasalahan E
        if(isset($_POST['id_case'])&& $_POST['id_case']<>"") { 
                $idpermasalahan=$_POST['id_case'];
                $var_case=" and  a.id_case='$idpermasalahan' ";
        } else{
                $var_case="";
            }
//penyebab F
        if(isset($_POST['id_penyebab'])&& $_POST['id_penyebab']<>"") { 
                $idpenyebab=$_POST['id_penyebab'];
                $var_cause=" and  a.id_cause_bi='$idpenyebab' ";
        } else {
                $var_cause="";
            }
//jenis laporan G
        if(isset($_POST['id_type'])&& $_POST['id_type']<>"") { 
                $idjenis_laporan=$_POST['id_type'];
                $var_jslaporan=" and a.id_report='$idjenis_laporan' ";
        } else {
                $var_jslaporan="";
            }

//channel H
        if(isset($_POST['id_channel'])&& $_POST['id_channel']<>"") { 
                $idchannel=$_POST['id_channel'];
                $var_channel=" and a.id_channel='$idchannel' ";
        } else {
                $var_channel="";    
            }






//$query=" select * from  mncpay_pengajuan $varperiode ";
        $query  =" select a.ticket_number,a.id_karyawan,a.date_start,a.customer_name,a.account_number,a.credit_card_number,a.phone,a.email,a.sla,a.date_sla,a.extend_sla,
a.nominal,a.keterangan,a.status,c.name as nama_unit, d.name as nama_proses, e.name as permasalahan, h.name as nama_channel,e.priority,e.satuan ,i.name as nama_cabang,b.name as nama_produk,";
        $query .=" g.name as tipe ,f.name as cause_bi , j.name as nama_pic  from laporan_kerja a  ";
        $query .=" left join master_product b on b.id_product=a.id_product ";
        $query .=" left join master_unit c  on c.id_unit=a.id_unit ";
        $query .=" left join master_process d  on d.id_process=a.id_process ";
        $query .=" left join master_case e  on e.id_case=a.id_case";
        $query .=" left join bi_cause f on f.id_cause_bi=a.id_cause_bi ";
        $query .=" left join master_report g on g.id_report=a.id_report ";
        $query .=" left join master_channel h on h.id_channel=a.id_channel ";
        $query .=" left join master_branch i on i.id_cabang=a.id_cabang ";
		$query .=" left join master_pic j on j.id_pic=a.var_pic ";
        $query .=" $var_product  $var_unit $var_proses $var_case $var_cause $var_jslaporan $var_channel $varperiode $var_status order by a.id_product asc ";                   

//echo $query;
//die();


$result=pg_query($connection,$query);



$file_eksport=date('Y_m_d_H_i_s');

$objPHPExcel = new PHPExcel();


$styleArrayFont = array('font' => array('bold'  => true,'color' => array('rgb' => ''),'size'  => 11,'name'  => 'Calibri'));
$styleArrayAlignment = array('alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        ));

//DIMENSION D
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(17);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(17);
$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(17);
$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(50);

$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(20);

$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(15);

$objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(50);

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



$objPHPExcel->getActiveSheet()->getStyle('A1:AE6')->applyFromArray($styleArrayFontBold);



$objPHPExcel->getActiveSheet()->getStyle('B6:AE6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('B6:AE6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



//=======BORDER

$styleArrayBorder1 = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' => array('argb' => ''),),),);
$styleArrayBorder2 = array('borders' => array('outline' => array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' => array('argb' => ''),),),);



//FILL COLOR

$objPHPExcel->getActiveSheet()->getStyle('A1:AE5')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF');

$objPHPExcel->getActiveSheet()->getStyle('B6:AE6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('808080');


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



$objPHPExcel->getActiveSheet()->setCellValue('B3', 'INQUIRY EXPORT');
$objPHPExcel->getActiveSheet()->setCellValue('B4', "$label_periode");


$objPHPExcel->getActiveSheet()->setCellValue('B6', 'NO');
$objPHPExcel->getActiveSheet()->setCellValue('C6', 'No. Tiket');
$objPHPExcel->getActiveSheet()->setCellValue('D6', 'Inputer');
$objPHPExcel->getActiveSheet()->setCellValue('E6', 'Channel');
$objPHPExcel->getActiveSheet()->setCellValue('F6', 'Branch');
$objPHPExcel->getActiveSheet()->setCellValue('G6', 'Tanggal Input');
$objPHPExcel->getActiveSheet()->setCellValue('H6', 'Nama Customer');
$objPHPExcel->getActiveSheet()->setCellValue('I6', 'Account Number');
$objPHPExcel->getActiveSheet()->setCellValue('J6', 'Credit Card Number');
$objPHPExcel->getActiveSheet()->setCellValue('K6', 'Phone');
$objPHPExcel->getActiveSheet()->setCellValue('L6', 'Email');
$objPHPExcel->getActiveSheet()->setCellValue('M6', 'Product');
$objPHPExcel->getActiveSheet()->setCellValue('N6', 'Unit');
$objPHPExcel->getActiveSheet()->setCellValue('O6', 'Process');
$objPHPExcel->getActiveSheet()->setCellValue('P6', 'Case');
$objPHPExcel->getActiveSheet()->setCellValue('Q6', 'SLA');
$objPHPExcel->getActiveSheet()->setCellValue('R6', 'Limit/Expire');
$objPHPExcel->getActiveSheet()->setCellValue('S6', 'Inquiry Type');
$objPHPExcel->getActiveSheet()->setCellValue('T6', 'Priority');
$objPHPExcel->getActiveSheet()->setCellValue('U6', 'Cause BI');
$objPHPExcel->getActiveSheet()->setCellValue('V6', 'Nominal');
$objPHPExcel->getActiveSheet()->setCellValue('W6', 'Transaction Date');
$objPHPExcel->getActiveSheet()->setCellValue('X6', 'Description');

$objPHPExcel->getActiveSheet()->setCellValue('Y6', 'Tanggal Close');
$objPHPExcel->getActiveSheet()->setCellValue('Z6', 'Last Memo');
$objPHPExcel->getActiveSheet()->setCellValue('AA6', 'Tgl Last Memo');
$objPHPExcel->getActiveSheet()->setCellValue('AB6', 'Last PIC/Inputer');

$objPHPExcel->getActiveSheet()->setCellValue('AC6', 'Status');
$objPHPExcel->getActiveSheet()->setCellValue('AD6', 'Waktu Selesai');
$objPHPExcel->getActiveSheet()->setCellValue('AE6', 'Forward');
##############################  PROSES EXCEL =================================================  abcde


        $i=7;
        $z=1;
        while ($row_mncpay=pg_fetch_array($result)) {


                            $jml_intval=$row_mncpay['sla']+$row_mncpay['extend_sla'];
                             $date_sla=dateSla($row_mncpay['date_start'],$jml_intval,$row['satuan']);
                                
                             switch ($row_mncpay['priority']) {
                                 case '1' : $priority= " Normal "; break; //ticket_number
                                 case '2' : $priority= " Important "; break; //customer_name
                                 case '3' : $priority= " Urgent "; break; //account_number

                                    }

                            $current_date = date('Y-m-d');        

                            if ( ($row_mncpay['status']=='1') && (date('Y-m-d',strtotime($row_mncpay['date_sla'])) >= $current_date) ){
                                $status_lap= "Unprocessed";
                            } else if(($row_mncpay['status']=='2') && (date('Y-m-d',strtotime($row_mncpay['date_sla'])) >= $current_date) ){
                                $status_lap= "On Progress";
                            }else if(($row_mncpay['status']=='3')){
                                $status_lap= "Done";
                            }elseif((($row_mncpay['status']=='1')||($row_mncpay['status']=='2')) && (date('Y-m-d',strtotime($row_mncpay['date_sla'])) < $current_date)){ 
                                $status_lap= "Expired";
                            }else if(($row_mncpay['status']=='4')){
                                $status_lap= "Pending";
                            }else if(($row_mncpay['status']=='5')){
                                $status_lap= "Cancel";
                            }
                            
 
 
                $objPHPExcel->getActiveSheet()->setCellValue("B$i", $z);
               //$objPHPExcel->getActiveSheet()->setCellValue("C$i", $row_mncpay['ticket_number']);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit("C$i", $row_mncpay['ticket_number'], PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValue("D$i", $row_mncpay['id_karyawan']);
                $objPHPExcel->getActiveSheet()->setCellValue("E$i", $row_mncpay['nama_channel']);
                $objPHPExcel->getActiveSheet()->setCellValue("F$i", $row_mncpay['nama_cabang']);
                $objPHPExcel->getActiveSheet()->setCellValue("G$i", date('d-m-Y',strtotime($row_mncpay['date_start'])));
                $objPHPExcel->getActiveSheet()->setCellValue("H$i", $row_mncpay['customer_name']);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit("I$i", $row_mncpay['account_number'], PHPExcel_Cell_DataType::TYPE_STRING);
                //$objPHPExcel->getActiveSheet()->setCellValue("I$i", $row_mncpay['account_number']);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit("J$i", $row_mncpay['credit_card_number'], PHPExcel_Cell_DataType::TYPE_STRING);
               // $objPHPExcel->getActiveSheet()->setCellValue("J$i", $row_mncpay['credit_card_number']);
                $objPHPExcel->getActiveSheet()->setCellValueExplicit("K$i", $row_mncpay['phone'], PHPExcel_Cell_DataType::TYPE_STRING);
               //$objPHPExcel->getActiveSheet()->setCellValue("K$i", $row_mncpay['phone']);
                $objPHPExcel->getActiveSheet()->setCellValue("L$i", $row_mncpay['email']);
                $objPHPExcel->getActiveSheet()->setCellValue("M$i", $row_mncpay['nama_produk']);
                $objPHPExcel->getActiveSheet()->setCellValue("N$i", $row_mncpay['nama_unit']);
                $objPHPExcel->getActiveSheet()->setCellValue("O$i", $row_mncpay['nama_proses']);
                $objPHPExcel->getActiveSheet()->setCellValue("P$i", $row_mncpay['permasalahan']);
                $objPHPExcel->getActiveSheet()->setCellValue("Q$i", $row_mncpay['sla']);
                $objPHPExcel->getActiveSheet()->setCellValue("R$i", date('d-m-Y',strtotime($row_mncpay['date_sla'])));
                $objPHPExcel->getActiveSheet()->setCellValue("S$i", $row_mncpay['tipe']);
                $objPHPExcel->getActiveSheet()->setCellValue("T$i", $priority);
                $objPHPExcel->getActiveSheet()->setCellValue("U$i", $row_mncpay['cause_bi']);
                $objPHPExcel->getActiveSheet()->setCellValue("V$i", $row_mncpay['nominal']);
                //$objPHPExcel->getActiveSheet()->setCellValue("W$i", date('Y-m-d',strtotime($row['tgl_transaksi'])));
                if ( !isset($row_mncpay['tgl_transaksi']) || $row_mncpay['tgl_transaksi'] == "" || $row_mncpay['tgl_transaksi'] ==NULL) {
                    $objPHPExcel->getActiveSheet()->setCellValue("W$i", " - ");
                } else {
                    $objPHPExcel->getActiveSheet()->setCellValue("W$i", date('d-m-Y',strtotime($row_mncpay['tgl_transaksi'])));
                }
				#$objPHPExcel->getActiveSheet()->setCellValue("X$i", str_replace(array("<br>","br"), " ", $row_mncpay['keterangan']));
                //$objPHPExcel->getActiveSheet()->setCellValue("X$i", cleanStr(str_replace(array("<br>","br"), " ", $row_mncpay['keterangan'])));
                //$objPHPExcel->getActiveSheet()->setCellValue("X$i", (str_replace(array("<br>","br","*","#","@","`","'"), " ", $row_mncpay['keterangan'])));
                $objPHPExcel->getActiveSheet()->setCellValue("X$i", (str_replace(array("<br>","<br/>","</br>","*","#","`","'",";","\\","="), " ", $row_mncpay['keterangan'])));
                 //$objPHPExcel->getActiveSheet()->setCellValue("X$i", (str_replace(array("="), " ", $row_mncpay['keterangan'])));
				/*
				//$tgl_finish=date('d-m-Y',strtotime(dateFinishInquiry($row_mncpay['ticket_number'])));
				//$tgl_finish=$row_mncpay['date_finish'];
				
				if( $tgl_finish!="" && $tgl_finish!=NULL ){
					
					if (date('d-m-Y',strtotime($tgl_finish))!='01-01-1970'){
						$objPHPExcel->getActiveSheet()->setCellValue("Y$i", date('d-m-Y',strtotime(dateFinishInquiry($row_mncpay['ticket_number']))));
							
					}else {
						
						$objPHPExcel->getActiveSheet()->setCellValue("Y$i", " - ");	
						
					}
						
				//$objPHPExcel->getActiveSheet()->setCellValue("Y$i", date('d-m-Y',strtotime(dateFinishInquiry($row_mncpay['ticket_number']))));
				//$objPHPExcel->getActiveSheet()->setCellValue("Y$i", " - ");	
				}else {
				$objPHPExcel->getActiveSheet()->setCellValue("Y$i", " - ");
				//$objPHPExcel->getActiveSheet()->setCellValue("Y$i", date('d-m-Y',strtotime(dateFinishInquiry($row_mncpay['ticket_number']))));	
				} 
                */
				$tgl_finish=date('d-m-Y',strtotime(dateFinishInquiry($row_mncpay['ticket_number'])));
				if( $tgl_finish=="01-01-1970" ){
				$tanggalClose=" - ";	
				}else{
				$tanggalClose=$tgl_finish;	
				}
				
				 
				$objPHPExcel->getActiveSheet()->setCellValue("Y$i", "$tanggalClose" );
				
                #$objPHPExcel->getActiveSheet()->setCellValue("Z$i", str_replace(array("<br>","br"), " ", lastMemoInfo($row_mncpay['ticket_number'])));
                //$objPHPExcel->getActiveSheet()->setCellValue("Z$i", cleanStr(str_replace(array("<br>","br"), " ", lastMemoInfo($row_mncpay['ticket_number']))) );
                $objPHPExcel->getActiveSheet()->setCellValue("Z$i",  str_replace(array("<br>","<br/>","</br>","*","#","`","'",";","\\","="), " ", lastMemoInfo($row_mncpay['ticket_number'])));
                $objPHPExcel->getActiveSheet()->setCellValue("AA$i", date('d-m-Y',strtotime(lastMemoDate($row_mncpay['ticket_number']))));
                $objPHPExcel->getActiveSheet()->setCellValue("AB$i", lastMemoInputer($row_mncpay['ticket_number']));

                $objPHPExcel->getActiveSheet()->setCellValue("AC$i", $status_lap);
				
				if( $tgl_finish=="" || $tgl_finish==NULL || $tgl_finish =='01-01-1970' ){
					$waktu_selesai=" - ";
				
				}else {
					$start_date=date('Y-m-d',strtotime($row_mncpay['date_start']));
					$end_date=date('Y-m-d',strtotime(dateFinishInquiry($row_mncpay['ticket_number'])));
					$waktu_selesai=hitungHariKerja($start_date,$end_date);
				//$objPHPExcel->getActiveSheet()->setCellValue("Y$i", date('d-m-Y',strtotime(dateFinishInquiry($row_mncpay['ticket_number']))));	
				}
				$objPHPExcel->getActiveSheet()->setCellValue("AD$i", $waktu_selesai);
				
				$pic_forward=$row_mncpay['nama_pic'];
				
				$objPHPExcel->getActiveSheet()->setCellValue("AE$i", $pic_forward);


           $i++;
           $z++; 
        }

$garis_akhir=$i-1;

$objPHPExcel->getActiveSheet()->getStyle("B6:AE$garis_akhir")->applyFromArray($styleArrayBorder1);
$objPHPExcel->getActiveSheet()->getStyle("H7:K$garis_akhir")->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
//$objPHPExcel->getActiveSheet()->getStyle("C7:C$garis_akhir")->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
//$objPHPExcel->getActiveSheet()->getStyle("I7:K$garis_akhir")->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
//$objPHPExcel->getActiveSheet()->setCellValueExplicit("C7", ' ',  PHPExcel_Cell_DataType::TYPE_STRING);


 
$objPHPExcel->getActiveSheet()->setTitle('INQUIRY REPORT');


//header('Cache-Control: max-age=0');
//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//ob_end_clean();
//$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//$objWriter->save('php://output');
$objWriter->save("../../data/download/INQUIRY"."_".$file_eksport.".xlsx");



?>

                                        
<div class="center" style="font-size:12px">
    <a href="<?php echo "http://".$_SERVER['HTTP_HOST']."/commone/data/download/INQUIRY"."_".$file_eksport.".xlsx";?>" class="btn btn-sm green" download> Download Excel <i class="fa fa-arrow-circle-o-down"></i> </a> <br><br>
</div>
                                        
                                    
                        
                      