<?php
require_once('../../config/config.php');
require_once('../../function/function.php');
require_once('../session_login.php');
error_reporting(0);
    //require_once '../session_group.php';
date_default_timezone_set("Asia/Jakarta"); 
$current_date = date('Y-m-d');


if (!$connection) {
echo "connection Failed";
exit;
}


$page_tmp = "?module=$_GET[module]&pm=$_GET[pm]";
$page=str_replace(".php","",$page_tmp);




//&srcby=$srcby&srckey=$srckey

################   SRCKEY   ########################
if (isset($_GET['srckey']) ) {
    $srckey=$_GET['srckey'];
} else  {
    $srckey=""; // no filter
}




if (isset($_GET['srcby']) && ($_GET['srcby'])!="" ) {


    switch ($_GET['srcby']) {
         case '1' : $var_srcby=" AND a.ticket_number LIKE '%$srckey%' "; break; //ticket_number
         case '2' : $var_srcby=" AND a.customer_name LIKE '%$srckey%' "; break; //customer_name
         case '3' : $var_srcby=" AND a.account_number LIKE '%$srckey%' "; break; //account_number
         case '4' : $var_srcby=" AND a.credit_card_number LIKE '%$srckey%' "; break; //credit_card_number
         case '5' : $var_srcby=" AND a.atm_number LIKE '%$srckey%' "; break; //atm_number
         }

} else {
    $var_srcby=" ";  //no filter
}




 $varsrc= " WHERE a.var_pic='".getIdPic()."' and a.status in (1,2)  $var_srcby  ";



    $aColumns = array('ticket_number','channel','customer', 'status','sla', 'action' );
	$aColumns_sorting = array('ticket_number','nama_channel','customer_name', 'status','date_start', 'ticket_number');

    /* Indexed column (used for fast and accurate table cardinality) */
    $sIndexColumn = "ticket_number";

  
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




	$id_pic=getIdPic();

    /* Individual column filtering */





	$no=$_GET['iDisplayStart'];
	$sQuery  = " select *, c.name as nama_masalah, c.priority,c.satuan,d.name as nama_channel from laporan_kerja a ";
	$sQuery .=" left join master_channel d on d.id_channel=a.id_channel ";
    $sQuery .=" left join master_case c on c.id_case=a.id_case  $varsrc ".
    // $searchticket.
	// $searchcustomer.
    $sOrder." ".
	$sLimit;
    $rResult = pg_query( $connection, $sQuery ) or die(pg_last_error());

	
	$sQuery  = " select a.$sIndexColumn from laporan_kerja a ";
	$sQuery .=" left join master_channel d on d.id_channel=a.id_channel ";
    $sQuery .=" left join master_case c on c.id_case=a.id_case  $varsrc  ";
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
			else if ( $aColumns[$i] == "ticket_number" )
            {
               $ticket="<i class='fa fa-ticket'></i> <b>".$aRow['ticket_number']."</b><br><i class='fa fa-calendar'></i> ".date('d-m-Y H:i',strtotime($aRow['date_start']));							
			   $row[] = $ticket; 
            }
			else if ($aColumns[$i] == "channel")
			{
			   $nama_channel=$aRow['nama_channel'];							
			   $row[] = $nama_channel;
			}
			
			else if ($aColumns[$i] == "customer")
			{
			   $nama_customer="<b>".$aRow['customer_name']."</b><br>".$aRow['nama_masalah']."<br><i>".$aRow['keterangan'];							
			   $row[] = $nama_customer;
			}
			else if ($aColumns[$i] == "status")
			{    
				switch ($aRow['priority']) {
                                 case '1' : $priority= " <i class='fa fa-warning font-green'></i> <b> Normal </b>"; break; //normal
                                 case '2' : $priority= " <i class='fa fa-warning font-blue'></i> <b> Important </b>"; break; //important
                                 case '3' : $priority= " <i class='fa fa-warning font-red'></i> <b> Urgent </b>"; break; //urgent
         //case '4' : $varsrc= " where credit_card_number='$srckey' "; break; // credit_card_number
                                    }

                              switch ($aRow['status']) {
                                case '1' : $status_lap= "  <span class='label label-danger'> <b> Unprocessed </b> </span>  "; break; //unprocess
                                case '2' : $status_lap= "  <span class='label label-info'> <b> On Progress </b> </span> "; break; //on progress
                                case '3' : $status_lap= "  <span class='label label-success'> <b> Done </b> </span> "; break; //done
                                case '4' : $status_lap= "  <span class='label label-warning'> <b> Pending </b> </span> "; break; //pending
                                    }



               $nama_status="<p align='center'>$status_lap <br><br> <b>$priority <b> </p>";                         
               $row[] = $nama_status;
			}
			
			else if ($aColumns[$i] == "sla") 
			{	
				$jml_intval=$aRow['sla']+$aRow['extend_sla'];
                $date_sla=dateSla($aRow['date_start'],$jml_intval,$aRow['satuan']);

                switch ($aRow['satuan']) {
								 case 'HK' : $satuan= " Hari Kerja "; break; //ticket_number
		 						 case 'HC' : $satuan= " Hari Kalender "; break; //customer_name
		 						 
		 
		 							}

			   $nama_sla="$jml_intval  $satuan <br><i class='fa fa-calendar'></i> <b>".$date_sla."</b>";							
			   $row[] = $nama_sla; 
			}
			else if ($aColumns[$i] == "action") 
			{				
			   // $nama_action="<a href='#'  data-toggle='modal' id-status='".$aRow['status']."' id-call_to_ask='".$aRow['call_to_ask']."' id-ticket='".$aRow['ticket_number']."' id-process='".$aRow['id_process']."' id-nama='".$aRow['name']."' nm-satuan='".$aRow['satuan']."'  data-target='#view-detail' class='detailLaporan' > <button class='btn blue btn-xs' type='button'> <i class='fa fa-check-circle'></i> Detail </button></a>";	
               	 $nama_action="<a href='$page&ext=detail&tn=".$aRow['ticket_number']."&cat=2&ds=$_GET[iDisplayStart]'  target='_blank' > <button class='btn blue' type='button'> <i class='fa fa-check-circle'></i> <b> Detail</b> </button> </a>";  


			   $row[] = $nama_action; 
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
