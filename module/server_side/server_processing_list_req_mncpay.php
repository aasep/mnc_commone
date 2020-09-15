<?php
require_once('../../config/config.php');
require_once('../../function/function.php');
require_once('../session_login.php');

    //require_once '../session_group.php';
date_default_timezone_set("Asia/Jakarta"); 
$current_date = date('Y-m-d');





if (!$connection) {
echo "connection Failed";
exit;
}


// $page_tmp = "?module=$_GET[module]&pm=$_GET[pm]";
// $page=str_replace(".php","",$page_tmp);


################   SRCKEY   ########################
if (isset($_GET['srckey']) && ($_GET['srckey'])!="") {
    $srckey=$_GET['srckey'];
} else  {
    $srckey=""; // no filter
}




if (isset($_GET['srcby']) && ($_GET['srcby'])!="" ) {


    switch ($_GET['srcby']) {
         case '1' : $var_srcby=" id_mncpay ='$srckey' "; break; //id_mncpay
         case '2' : $var_srcby=" customer_name ='$srckey' "; break; //customer_name
         case '3' : $var_srcby=" credit_card_number ='$srckey' "; break; //id_mncpay
         case '4' : $var_srcby=" merchant_name ILIKE '%$srckey%' "; break; //customer_name
         
         }

} else {
    $var_srcby=" ";  //no filter
}


if (isset($_GET['act1']) && ($_GET['act1'])!="" ) {

    $varsrc= " where status='1' and $var_srcby ";
         

} else {

$varsrc=" where status='1' ";

}




    $aColumns = array('id_mncpay','customer_name', 'status','transaction_date','keterangan','ketadd','action' );
	$aColumns_sorting = array('id_mncpay','customer_name', 'status','transaction_date','keterangan','interest_nominal','id_mncpay');

    /* Indexed column (used for fast and accurate table cardinality) */
    $sIndexColumn = "id_mncpay";

  
    $sLimit = "";
    if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
        $sLimit = "LIMIT ".intval( $_GET['iDisplayLength'] )." OFFSET ".
            intval( $_GET['iDisplayStart'] );
    }

    /*
     * Ordering
     */
    if ( isset( $_GET['iSortCol_0'] ) )
    {
        $sOrder = "ORDER BY  ";
        for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
        {
            if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
            {
                $sOrder .= $aColumns_sorting[ intval( $_GET['iSortCol_'.$i] ) ]."
                    ".($_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc').", ";
            }
        }

        $sOrder = substr_replace( $sOrder, "", -2 );
        if ( $sOrder == "ORDER BY" )
        {
            $sOrder = "";
        }
    }

    /*
     * Filtering
     * NOTE This assumes that the field that is being searched on is a string typed field (ie. one
     * on which ILIKE can be used). Boolean fields etc will need a modification here.
     */

 /*
    $sWhere = "";
    if ( $_GET['sSearch'] != "" )
    {
        $sWhere = "WHERE (";
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
            if ( $_GET['bSearchable_'.$i] == "true" )
            {
                $sWhere .= $aColumns[$i]." ILIKE '%".pg_escape_string( $_GET['sSearch'] )."%' OR ";
            }
        }
        $sWhere = substr_replace( $sWhere, "", -3 );
        $sWhere .= ")";
    }
   */
	// GET TID
	//$num_ticket = $_GET['num_ticket']; 
	//$tid = $_GET['tid']; 
	//$mid = $_GET['mid']; 
	//$jenis = $_GET['jenis']; 
	//$bank = $_GET['name'];
	//$id_ro = $_GET['id_ro'];


    /* Individual column filtering */


/*
    for ( $i=0 ; $i<count($aColumns) ; $i++ )
    {
        if ( $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
        {
            if ( $sWhere == "" )
            {
                $sWhere = "WHERE ";
            }
            else
            {
                $sWhere .= " AND ";
            }
            $sWhere .= $aColumns[$i]." ILIKE '%".pg_escape_string($_GET['sSearch_'.$i])."%' ";
        }
    }

	//$id_ro = 236;
	
*/
/*
	$current_date = date('Y-m');
	
	
	$searchticket = "";
	if ($var_ticket != "") {
		$searchticket = "AND a.ticket_number LIKE '%$var_ticket%' ";
	}
	
	$searchcustomer = " ";
	if ($var_customer != "") {
		$searchcustomer = "AND a.customer_name LIKE '%$var_customer%' ";
	}



	$searchjenis = "";
	if ($jenis != "") {
		$searchjenis = "AND jenis LIKE '%".strtoupper($jenis)."%'";
	}
	$searchbank = "";
	if ($bank != "") {
		$searchbank = "AND name LIKE '%".strtoupper($bank)."%'";
	}

$query  =" select *, c.name as nama_masalah, c.priority,c.satuan,d.name as nama_channel from laporan_kerja a ";
							$query .=" left join master_channel d on d.id_channel=a.id_channel ";
                            $query .=" left join map_pic b on b.id_case=a.var_case ";
                            $query .=" left join master_case c on c.id_case=a.var_case  $varsrc   order by a.ticket_number asc ";




*/





	$no=$_GET['iDisplayStart'];
	$sQuery  = " select * from mncpay_pengajuan  $varsrc ".
    // $searchticket.
	// $searchcustomer.
    $sOrder." ".
	$sLimit;
    $rResult = pg_query( $connection, $sQuery ) or die(pg_last_error());

	
	$sQuery  = " select $sIndexColumn from mncpay_pengajuan $varsrc ";

    //	$searchticket.
	//    $searchcustomer." " ;
			 	 
	$rResultTotal = pg_query( $connection, $sQuery ) or die(pg_last_error());
    $iTotal = pg_num_rows($rResultTotal);
    pg_free_result($rResultTotal);
    $iFilteredTotal = $iTotal;

    /*
     * Output
     */
    $output = array(
        "sEcho" => intval($_GET['sEcho']),
        "iTotalRecords" => $iTotal,
        "iTotalDisplayRecords" => $iFilteredTotal,
        "aaData" => array()
    );

    while ( $aRow = pg_fetch_array($rResult, null, PGSQL_ASSOC) )
    {
        $row = array();
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
            if ( $aColumns[$i] == "version" )
            {
                /* Special output formatting for 'version' column */
                $row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
            }
			else if ( $aColumns[$i] == "id_mncpay" )
            {
               $ticket="<i class='fa fa-ticket'></i> <b>".$aRow['id_mncpay']."</b><br>";
               $ticket.="<i class='fa fa-user'></i> <b>".$aRow['id_karyawan']."</b><br>";
               $ticket.="<i class='fa fa-calendar'></i> ".date('d-m-Y',strtotime($aRow['input_date']))."";							
			   $row[] = $ticket; 
            }
			else if ($aColumns[$i] == "customer_name")
			{
			   //$nama_channel="<b>".$aRow['merchant_name']."</b>"."<br>";
               $nama_channel="<b>".$aRow['customer_name']."</b>"."<br>";
               $nama_channel.="<b>".$aRow['credit_card_number']."</b>";							
			   $row[] = $nama_channel;
			}
			else if ($aColumns[$i] == "status")
			{    
			   //$nama_status="<b>".$aRow['product_code']."</b>"."<br>";
               $nama_status="<b>".$aRow['merchant_name']."</b>"."<br>";
               $nama_status.="<b>".$aRow['approval_code']."</b>"."<br>";
               $nama_status.="<b>".date('d-m-Y',strtotime($aRow['transaction_date']))."</b>";
               //$nama_status.="<b>".$aRow['plan_code']."</b>";
               						
			   $row[] = $nama_status;
			}
			else if ($aColumns[$i] == "transaction_date")
            {    
               //$transaction_date="<b>".date('d-m-Y',strtotime($aRow['transaction_date']))."</b>"."<br>"; 
               $transaction_date="".number_format((float)$aRow['transaction_nominal'], 2, '.', ',').""."<br>";
               $transaction_date.="<b>".$aRow['tenor']."</b>"."<br>";
               $transaction_date.="<i>".$aRow['keterangan']."</i>"."";
               //$transaction_date.="<b>".number_format((float)$aRow['interest_nominal'], 2, '.', '')."</b>";                      
               $row[] = $transaction_date;
            }
			else if ($aColumns[$i] == "keterangan") 
			{  //$keterangan="<b>".number_format((float)$aRow['total_nominal'], 2, '.', '')."</b>"."<br>";
               $keterangan="<b>".$aRow['plan_code']."</b><br>";
               $keterangan.="<b>".$aRow['product_code']."</b><br>";
			   $keterangan.="".number_format((float)$aRow['interest_rate'], 2, '.', ',')."";					
			   $row[] = $keterangan; 
			}
            else if ($aColumns[$i] == "ketadd") 
            {  //$keterangan="<b>".number_format((float)$aRow['total_nominal'], 2, '.', '')."</b>"."<br>";
               $keterangan1="".number_format((float)$aRow['interest_nominal'], 2, '.', ',')." <br>";
               $keterangan1.="".number_format((float)$aRow['total_nominal'], 2, '.', ',')." <br>";
               $keterangan1.="".number_format((float)$aRow['installment_nominal'], 2, '.', ',')."";                 
               $row[] = $keterangan1; 
            }
			else if ($aColumns[$i] == "action") 
            {  $action="<a href='#'  class='verification_mncpay' data-toggle='modal' data-dismiss='modal'  data-target='#view-confirmation' id-mncpay='$aRow[id_mncpay]'> <b><button class='btn blue' type='button'> <i class='fa fa-check-circle'></i> Done </button></b>"."</a> <br><br>";

              // $action.="<b>".."</b>";
              // $action.="".."";                  
               $row[] = $action; 
            }	
				
			
			
			
            else if ( $aColumns[$i] != ' ' )
            {
                /* General output */
                $row[] = $aRow[ $aColumns[$i] ];
            }
        }
        $output['aaData'][] = $row;

    }

    echo json_encode( $output );

    // Free resultset
    pg_free_result( $rResult );

    // Closing connection
    pg_close( $connection );



?>
