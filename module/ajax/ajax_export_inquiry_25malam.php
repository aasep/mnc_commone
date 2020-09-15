
<?php
require_once '../../config/config.php';
require_once '../../function/function.php';
//require_once '../../session_login.php';
//require_once '../../session_group.php';
require_once 'Classes/PHPExcel.php';
require_once 'Classes/PHPExcel/IOFactory.php';
date_default_timezone_set("Asia/Bangkok");
error_reporting(-1);

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
        $query  =" select *,c.name as nama_unit, d.name as nama_proses, e.name as permasalahan, h.name as nama_channel,e.priority,e.satuan ,i.name as nama_cabang,b.name as nama_produk, cast (a.credit_card_number as varchar) as credit_card_number2,  ";
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
        $query .=" $var_product  $var_unit $var_proses $var_case $var_cause $var_jslaporan $var_channel $varperiode $var_status order by a.id_lapker asc ";                   

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

$objPHPExcel->getActiveSheet()->getStyle('A1:AE500')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF');

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

?>

<table class="table table-striped table-bordered table-hover" id="sample_2">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>No. Tiket</th>
                                <th>Inputer</th>
                                <th>Channel</th>
                                <th>Branch</th>
                                <th>Tanggal Input</th>
                                <th>Nama Customer</th>
                                <th>Account Number</th>
                                <th>Credit Card Number</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Product</th>
                                <th>Unit</th>
                                <th>Process</th>
                                <th>Case</th>
                                <th>SLA</th>
                                <th>Limit/Expire</th>
                                <th>Inquiry Type</th>
                                <th>Priority</th>
                                <th>Cause BI</th>
                                <th>Nominal</th>
                                <th>Transaction Date</th>
                                <th>Description</th>
                                <th>Tanggal Close</th>
                                <th>Last Memo</th>
                                <th>Tgl Last Memo</th>
                                <th>Last PIC/Inputer</th>
                                <th>Status</th>
                                <th>Waktu Selesai</th>
                                <th>Forward</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                           // $i=1;
                            
                            $result=pg_query($connection,$query);
                            while ($row=pg_fetch_array($result)) {


                            $jml_intval=$row['sla']+$row['extend_sla'];
                             $date_sla=dateSla($row['date_start'],$jml_intval,$row['satuan']);
                                
                             switch ($row['priority']) {
                                 case '1' : $priority= " Normal "; break; //ticket_number
                                 case '2' : $priority= " Important "; break; //customer_name
                                 case '3' : $priority= " Urgent "; break; //account_number

                                    }

                            $current_date = date('Y-m-d');        

                            if ( ($row['status']=='1') && (date('Y-m-d',strtotime($row['date_sla'])) >= $current_date) ){
                                $status_lap= "Unprocessed";
                            } else if(($row['status']=='2') && (date('Y-m-d',strtotime($row['date_sla'])) >= $current_date) ){
                                $status_lap= "On Progress";
                            }else if(($row['status']=='3')){
                                $status_lap= "Done";
                            }elseif((($row['status']=='1')||($row['status']=='2')) && (date('Y-m-d',strtotime($row['date_sla'])) < $current_date)){ 
                                $status_lap= "Expired";
                            }else if(($row['status']=='4')){
                                $status_lap= "Pending";
                            }else if(($row['status']=='5')){
                                $status_lap= "Cancel";
                            }
                            





                if ( !isset($row['tgl_transaksi']) || $row['tgl_transaksi'] == "" || $row['tgl_transaksi'] ==NULL) {
                    $vartrans=" - ";
                } else {
                     $vartrans=date('d-m-Y',strtotime($row['tgl_transaksi']));
                    

                }
                
                $tgl_finish=date('d-m-Y',strtotime(dateFinishInquiry($row['ticket_number'])));
                if( $tgl_finish=="01-01-1970" ){
                $tanggalClose=" - ";    
                }else{
                $tanggalClose=$tgl_finish;  
                }
                
                if( $tgl_finish=="" || $tgl_finish==NULL || $tgl_finish =='01-01-1970' ){
                    $waktu_selesai=" - ";
                
                }else {
                    $start_date=date('Y-m-d',strtotime($row['date_start']));
                    $end_date=date('Y-m-d',strtotime(dateFinishInquiry($row['ticket_number'])));
                    $waktu_selesai=hitungHariKerja($start_date,$end_date);
                //$objPHPExcel->getActiveSheet()->setCellValue("Y$i", date('d-m-Y',strtotime(dateFinishInquiry($row_mncpay['ticket_number']))));    
                }
                
                
                $pic_forward=$row['nama_pic'];
                

                            echo "<tr>";
                            echo "<td>$z</td>";
                            echo "<td>$row[ticket_number]</td>";
                            echo "<td>$row[id_karyawan]</td>";
                            echo "<td>$row[nama_channel]</td>";
                            echo "<td>$row[nama_cabang]</td>";
                            echo "<td>".date('d-m-Y',strtotime($row['date_start']))."</td>";
                            echo "<td>$row[customer_name]</td>";
                            echo "<td>$row[account_number]</td>";
                            echo "<td>".strval($row['credit_card_number2'])."</td>";
                            echo "<td>$row[phone]</td>";
                            echo "<td>$row[email]</td>";
                            echo "<td>$row[nama_produk]</td>";
                            echo "<td>$row[nama_unit]</td>";
                            echo "<td>$row[nama_proses]</td>";
                            echo "<td>$row[permasalahan]</td>";
                            echo "<td>$row[sla]</td>";
                            echo "<td>".date('d-m-Y',strtotime($row['date_sla']))."</td>";
                            echo "<td>$row[tipe]</td>";
                            echo "<td>$priority</td>";
                            echo "<td>$row[cause_bi]</td>";
                            echo "<td>$row[nominal]</td>";
                            echo "<td>$vartrans</td>";
                            echo "<td>$row[keterangan]</td>";
                            echo "<td>$tanggalClose</td>";
                            echo "<td>".str_replace(array("<br>","br")," ", lastMemoInfo($row['ticket_number'])) ."</td>";
                            echo "<td>".date('d-m-Y',strtotime(lastMemoDate($row['ticket_number'])))."</td>";
                            echo "<td>".lastMemoInputer($row['ticket_number'])."</td>";
                            echo "<td>$status_lap</td>";
                            echo "<td>$waktu_selesai</td>";
                            echo "<td>$pic_forward</td>";
                            echo "</tr>";
                                       $i++;
           $z++; 
                            
                                    }
                            ?>

                            </tbody>
                            </table>
<?php

$garis_akhir=$i-1;





?>

                                        
<div class="center" style="font-size:12px">
    <a href="<?php echo "http://".$_SERVER['HTTP_HOST']."/commone/data/download/INQUIRY"."_".$file_eksport.".xls";?>" class="btn btn-sm green" download> Download Excel <i class="fa fa-arrow-circle-o-down"></i> </a> <br><br>
</div>
                                        
                                    
                        
                      