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


$page_tmp = "?module=$_GET[module]&pm=$_GET[pm]";
$page=str_replace(".php","",$page_tmp);


################   SRCKEY   ########################
if (isset($_GET['srckey']) && ($_GET['srckey'])!="") {
    $srckey=$_GET['srckey'];
} else  {
    $srckey=""; // no filter
}




if (isset($_GET['srcby']) && ($_GET['srcby'])!="" ) {


    switch ($_GET['srcby']) {
         case '1' : $var_srcby=" id_data_leads ='$srckey' "; break; //id
         case '2' : $var_srcby=" customer_name ILIKE '%$srckey%' "; break; //customer_name
         case '3' : $var_srcby=" phone ='$srckey' "; break; //phone
         case '4' : $var_srcby=" email ='$srckey' "; break; //email
         case '5' : $var_srcby=" tgl_meeting ='$srckey' "; break; //Tanggal meeting


         
         }

} else {
    $var_srcby=" ";  //no filter
}


if (isset($_GET['act1']) && ($_GET['act1'])!="" ) {

    $varsrc= " where $var_srcby ";
         

} else {

$varsrc=" ";

}




    $aColumns = array('id_data_leads','customer_name','tgl_meeting' );
	$aColumns_sorting = array('id_data_leads','customer_name','tgl_meeting');

    /* Indexed column (used for fast and accurate table cardinality) */
    $sIndexColumn = "id_data_leads";

  
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

    




	$no=$_GET['iDisplayStart'];
	$sQuery   = " select a.id_data_leads,a.adddt,a.customer_name,a.phone,a.email,a.tgl_meeting,a.kota_domisili,b.description from data_leads a ";
    $sQuery  .= " left join daftar_keperluan b on a.id_purpose=b.id_purpose ";
    $sQuery  .= " $varsrc ".
    // $searchticket.
	// $searchcustomer.
    $sOrder." ".
	$sLimit;
    $rResult = pg_query( $connection, $sQuery ) or die(pg_last_error());

	
	$sQuery  = " select $sIndexColumn from data_leads $varsrc ";

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

// $aColumns = array('id_temp','customer_name','tgl_transaksi', 'id_channel','type', 'action' );

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
			else if ( $aColumns[$i] == "id_data_leads" )
            {
               $id_temp="<i class='fa fa-ticket'></i> <b>".$aRow['id_data_leads']."</b> <br>";
               $id_temp2="<i class='fa fa-calendar'></i> ".date('d-m-Y',strtotime($aRow['adddt']))."<br>";
               					
			   $row[] = $id_temp.$id_temp2; 
            }
			else if ($aColumns[$i] == "customer_name")
			{
			   $customer_name=$aRow['customer_name']."<br>";
               $account_number=$aRow['phone']."<br>";
               $credit_card_number=$aRow['email'];							
			   $row[] = $customer_name.$account_number.$credit_card_number;
			}
			
			else if ($aColumns[$i] == "tgl_meeting")
			{
			   $tgltrans="<b>".$aRow['tgl_meeting']."</b><br>";	
               $nominal="<b>".$aRow['description']."</b><br>";
               $kota="<b>".$aRow['kota_domisili']."</b>";					
			   $row[] = $tgltrans.$nominal.$kota;
			}
            /*
			else if ($aColumns[$i] == "action") 
			{				
			   
            $nama_action="<a href='$page&ext=detail&id=$aRow[id_data_leads]' > <button class='btn blue ' type='button'> <i class='fa fa-check-circle'></i> Detail </button></a>";   

			   $row[] = $nama_action; 
			}		
				
			*/
			
			
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
