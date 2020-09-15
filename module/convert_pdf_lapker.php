<?php
session_start();
require_once '../config/config.php';
require_once '../function/function.php';
// require_once 'session_login_page.php';
require('../data/lib/fpdf/fpdf.php');
error_reporting(0);
#################################### QUERY ####################################################
$id=$_GET['tn'];
$module=$_GET['module'];
$pm=$_GET['pm'];


$query_laporan =" select *,z.name as nama_cabang, c.name as nama_proses,d.name as nama_channel, e.name as nama_product,f.name as nama_unit,g.name as nama_case,h.name as jenis_laporan,g.priority,g.sla,g.satuan,a.extend_sla ,a.id_process,g.stat_pmb from  laporan_kerja a  ";
$query_laporan.=" left join master_process c on a.id_process=c.id_process ";
$query_laporan.=" left join master_channel d on a.id_channel=d.id_channel ";
$query_laporan.=" left join master_product e on a.id_product=e.id_product ";
$query_laporan.=" left join master_unit f on a.id_unit=f.id_unit ";
$query_laporan.=" left join master_case g on a.id_case=g.id_case ";
$query_laporan.=" left join master_report h on a.id_report=h.id_report ";
$query_laporan.=" left join master_branch z on a.id_cabang=z.id_cabang ";
$query_laporan.=" where a.ticket_number='$id' ";

$result_laporan= pg_query($connection,$query_laporan);
$found= pg_num_rows($result_laporan);


//echo $query_laporan;
//die();



if ($found =='0'){

echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Data Not Found.... !')
    window.location.href='../home?module=$module&pm=$pm';
    </SCRIPT>");

} else {

$row_lap=pg_fetch_array($result_laporan);


// switch (variable) {
// 	case '0':
// 		# code...
// 		break;
// 	case '1':
// 		$status
// 		break;

// }








class PDF extends FPDF
{


// function Footer()
// {
// 	global $var;
//     // Go to 1.5 cm from bottom
//     $this->SetY(-15);
//     // Select Arial italic 8
//     $this->SetFont('Arial','I',8);
//     // Print centered page number
//     $this->Cell(0,10,"No : ".$var,0,0,'R');
// 	//$pdf->setvar('12345');
// }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);

	
	$pdf->SetFont('Arial','',8);
	$pdf->SetLineWidth(0.3);
	$pdf->Line(10,38,200,38);

	$pdf->Line(70,38,70,52);
	$pdf->Line(130,38,130,52);
	


	

//===========LOGO BANK======
	$pdf->Image("../images/new_logo_mc.jpg",15,12,0,15);
	//$pdf->Image("../images/new_logo_mc.png",60,30,90,0,'PNG');
	$pdf->SetFont('Arial','B',14);

	//$pdf->SetY(10);
	$pdf->Cell(100,7,'',0,1,'R',0);
	$pdf->SetX(100);
	$pdf->Cell(100,7,'FORMULIR PENGADUAN NASABAH',0,1,'R',0);
	$pdf->SetFont('Arial','',11);
	$pdf->SetX(100);
	$pdf->Cell(100,7,"Nomor Pengaduan $id",0,1,'R',0);
	$pdf->ln(10);
	$pdf->SetFont('Arial','B',10);
	//$pdf->SetXY(15,40);
	$pdf->Cell(60,4,"CABANG",0,0,'L',0);
	$pdf->Cell(60,4,"Tanggal Pengaduan",0,0,'L',0);
	$pdf->Cell(60,4,"Tanggal Penyelesaian",0,1,'L',0);
	$pdf->ln(2);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(60,3,$row_lap['nama_cabang'],0,0,'L',0);
	$pdf->Cell(60,3,date('d-m-Y',strtotime($row_lap['date_start'])),0,0,'L',0);
	$pdf->Cell(60,3,date('d-m-Y',strtotime($row_lap['date_sla'])),0,1,'L',0);
	//$pdf->Cell(100,4,"Nomor Pengaduan 20160930100432",0,1,'L',0);
	$pdf->ln(12);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(60,4,"Informasi Nasabah ",0,1,'L',0);
	$pdf->SetFont('Arial','',8);
	$pdf->ln(4);
	$pdf->Cell(30,8,"Nama Lengkap ",1,0,'L',0);
	$pdf->Cell(70,8,ucwords(strtolower($row_lap['customer_name'])),1,0,'L',0);
	$pdf->Cell(5,8," ",0,0,'L',0);
	$pdf->Cell(30,8,"Nomor Rekening ",1,0,'L',0);
	$pdf->Cell(55,8,$row_lap['account_number'],1,1,'L',0);
	$pdf->Cell(30,8,"Nomor Telpon ",1,0,'L',0);
	$pdf->Cell(70,8,$row_lap['phone'],1,0,'L',0);
	$pdf->Cell(5,8," ",0,0,'L',0);
	$pdf->Cell(30,8,"Nomor Kartu ATM ",1,0,'L',0);
	$pdf->Cell(55,8,$row_lap['atm_number'],1,1,'L',0);
	$pdf->Cell(30,8,"Alamat Email ",1,0,'L',0);
	$pdf->Cell(70,8,$row_lap['email'],1,0,'L',0);
	$pdf->Cell(5,8," ",0,0,'L',0);
	$pdf->Cell(30,8,"Nomor Kartu Kredit ",1,0,'L',0);
	$pdf->Cell(55,8,$row_lap['credit_card_number'],1,1,'L',0);

	$pdf->ln(12);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(60,4,"Informasi Pengaduan ",0,1,'L',0);
	$pdf->SetFont('Arial','',8);
	$pdf->ln(4);
	$pdf->Cell(30,8,"Jenis Produk ",1,0,'L',0);
	$pdf->Cell(160,8,$row_lap['nama_product'],1,1,'L',0);
	$pdf->Cell(30,8,"Unit ",1,0,'L',0);
	$pdf->Cell(160,8,$row_lap['nama_unit'],1,1,'L',0);
	$pdf->Cell(30,8,"Proses ",1,0,'L',0);
	$pdf->Cell(160,8,$row_lap['nama_proses'],1,1,'L',0);
	$pdf->Cell(30,8,"Jenis Pengaduan ",1,0,'L',0);
	$pdf->Cell(160,8,$row_lap['nama_case'],1,1,'L',0);



	$pdf->ln(8);

	if ($row_lap['stat_pmb']=='1'){
	$pdf->Image("../images/check2.jpg",70,153,0,5);
	} else {
	$pdf->Image("../images/check2.jpg",96,153,0,5);
	}

	

	


	$pdf->Cell(60,4,"Terkait Sistem Pembayaran ",0,0,'L',0);
	$pdf->Cell(5,4,"",1,0,'L',0);
	$pdf->Cell(10,4,"Ya",0,0,'R',0);
	$pdf->Cell(10,4," ",0,0,'L',0);
	$pdf->Cell(5,4," ",1,0,'L',0);
	$pdf->Cell(10,4,"Tidak",0,1,'R',0);

	$pdf->ln(4);

	$pdf->Cell(30,8,"Nominal Transaksi ",1,0,'L',0);
	$pdf->Cell(70,8,$row_lap['nominal'],1,0,'L',0);
	$pdf->Cell(5,8," ",0,0,'L',0);
	$pdf->Cell(35,8,"Tanggal Transaksi ",1,0,'L',0);
	$pdf->Cell(50,8,$row_lap['tgl_transaksi'],1,1,'L',0);
	// $pdf->Cell(40,8,"Nomor Telpon ",1,0,'L',0);
	// $pdf->Cell(60,8,"0856456456123 ",1,1,'L',0);
	// $pdf->Cell(40,8,"Alamat Email ",1,0,'L',0);
	// $pdf->Cell(60,8,"testmnc@mncbank.co.id ",1,1,'L',0);
	$pdf->ln(12);

	$pdf->MultiCell(190,4,str_replace(array("\r","\n")," ",strtoupper($row_lap['keterangan'])),0,'J');

	$pdf->ln(12);
	$pdf->SetXY(10,213);
	$pdf->Cell(90,50,"",1,0,'L',0);
	$pdf->SetXY(100,213);
	$pdf->Cell(50,50,"",1,0,'L',0);
	$pdf->SetXY(150,213);
	$pdf->Cell(50,50,"",1,1,'L',0);

	$pdf->SetXY(103,216);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(50,5,"Nasabah ",0,1,'L',0);
	$pdf->SetXY(153,216);
	$pdf->Cell(50,5,"Petugas Bank",0,1,'L',0);

	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(103,255);
	$pdf->Cell(45,5,ucwords(strtolower($row_lap['customer_name'])),0,1,'L',0);
	$pdf->SetXY(153,255);
	$pdf->Cell(45,5,ucwords(strtolower($_SESSION['SESS_NAMA_LENGKAP'])),0,1,'L',0);

	$pdf->Output();

//header("Content-disposition: inline; filename=".basename('theme/assets/pdf/ci.pdf'));


}


?>