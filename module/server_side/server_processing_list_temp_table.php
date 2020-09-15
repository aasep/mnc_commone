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
         case '1' : $var_srcby=" and id_temp ='$srckey' "; break; //id_mncpay
         case '2' : $var_srcby=" and customer_name ILIKE '%$srckey%' "; break; //customer_name
         case '3' : $var_srcby=" and credit_card_number ='$srckey' "; break; //id_mncpay
         case '4' : $var_srcby=" and account_number ='$srckey' "; break; //Account_ Number
         case '5' : $var_srcby=" and to_char(tgl_transaksi, 'DD-MM-YYYY') = '".$srckey."' "; break; //Tanggal transaksi


         
         }

} else {
    $var_srcby=" ";  //no filter
}


if (isset($_GET['act1']) && ($_GET['act1'])!="" ) {

    $varsrc= " $var_srcby ";
         

} else {

$varsrc=" ";

}




    $aColumns = array('id_temp','customer_name','tgl_transaksi', 'id_channel','type', 'action' );
	$aColumns_sorting = array('id_temp','customer_name','tgl_transaksi', 'id_channel','type_data', 'id_temp');

    /* Indexed column (used for fast and accurate table cardinality) */
    $sIndexColumn = "id_temp";

  
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
	$sQuery  = " select * from temp_table where status='1' $varsrc ".
    // $searchticket.
	// $searchcustomer.
    $sOrder." ".
	$sLimit;
    $rResult = pg_query( $connection, $sQuery ) or die(pg_last_error());

	
	$sQuery  = " select $sIndexColumn from  temp_table where status='1' $varsrc ";

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
			else if ( $aColumns[$i] == "id_temp" )
            {
               $id_temp="<i class='fa fa-ticket'></i> <b>".$aRow['id_temp']."</b> <br>";
               $id_temp2="<i class='fa fa-calendar'></i> ".date('d-m-Y',strtotime($aRow['adddt']))."<br>";
               $id_temp3="<i class='fa fa-calendar'></i> ".$aRow['tgl_meeting']."";							
			   $row[] = $id_temp.$id_temp2.$id_temp3; 
            }
			else if ($aColumns[$i] == "customer_name")
			{
			   $customer_name=ucwords(strtolower($aRow['customer_name']))."<br>";
               $account_number=$aRow['account_number']."<br>";
               $credit_card_number=$aRow['credit_card_number'];							
			   $row[] = $customer_name.$account_number.$credit_card_number;
			}
			
			else if ($aColumns[$i] == "tgl_transaksi")
			{
			   $tgltrans="<b>".date('d-m-Y',strtotime($aRow['tgl_transaksi']))."</b><br>";	
               $nominal="<b>".$aRow['nominal']."</b><br>";
               
               $kota="<b>".ucwords(strtolower($aRow['kota_domisili']))."</b>";					
			   $row[] = $tgltrans.$nominal.$kota;
			}
			else if ($aColumns[$i] == "id_channel")
			{    
			   $channel="<b>".$aRow['id_channel']."</b><br>";
               $phone="<b>".$aRow['phone']."</b><br>";
               $purpose="<b>".$aRow['id_purpose']."</b><br>";						
			   $row[] = $channel.$phone.$purpose;
			}
		
			else if ($aColumns[$i] == "type") 
			{	
               //$tgl_meeting="".$aRow['type_data']."<br>";
               $type="".$aRow['type_data']."<br>";
			   $keterangan="".$aRow['keterangan']."";					
			   $row[] = $type.$keterangan; 
			}
			else if ($aColumns[$i] == "action") 
			{				
			   
                $nama_action="<input class='icheck'  name='var_send[]' type='checkbox' value='".$aRow['id_temp']."'>"; 

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
