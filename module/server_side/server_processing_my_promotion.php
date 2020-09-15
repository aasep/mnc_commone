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


//$page_tmp = "?module=$_GET[module]&pm=$_GET[pm]";
//$page=str_replace(".php","",$page_tmp);




//&srcby=$srcby&srckey=$srckey
/*
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


if (isset($_GET['act1']) ) {

    //$srcby=$_POST['srcby'];
    //$srckey=$_POST['srckey'];

    switch ($_GET['act1']) {
         case '1' : $varsrc= " where a.status='1' and b.id_pic='".getIdPic()."' and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' $var_srcby  "; $ket="Unprocessed"; break; //ticket_number
         case '2' : $varsrc= " where a.status='2' and b.id_pic='".getIdPic()."' and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' $var_srcby "; $ket="OnProgress"; break; //customer_name
         case '3' : $varsrc= " where a.status='3' and b.id_pic='".getIdPic()."' $var_srcby "; $ket="Done"; break; //account_number
         case '4' : $varsrc= " where a.status in ('1','2') and b.id_pic='".getIdPic()."' and  to_char(date_sla, 'YYYY-MM-DD') < '".$current_date."' $var_srcby "; $ket=" Exipred "; break; // credit_card_number
         }

}
*/


/*
<th style="font-size:12px" width="15%"> TICKET NUMBER / <br> INQUIRY DATE</th>
					<th style="font-size:14px" width="10%">CHANNEL</th>
					<th style="font-size:13px" width="45%">CUSTOMER / CASE / DETAIL</th>
					<th style="font-size:12px" width="10%" align="center">STATUS / PRIORITY</th>
					<th style="font-size:12px" width="10%">SLA</th>
					<th style="font-size:12px" width="10%">ACTION</th>

*/

    $aColumns = array('id_pronews','title' );
	$aColumns_sorting = array('id_pronews','title');

    /* Indexed column (used for fast and accurate table cardinality) */
    $sIndexColumn = "id_pronews";

  

    $sWhere = " where a.status='1' ";


   // $aColumnsSearch= array('cfsnme','cfcif','acctno','type','jenis' );
    $aColumnsSearch= array('title');
    if ( $_GET['sSearch'] != "" )
    {
        $sWhere = "WHERE (";
        for ( $i=0 ; $i<count($aColumnsSearch) ; $i++ )
        {
            if ( $_GET['bSearchable_'.$i] == "true" )
            {
                $sWhere .= "a.".$aColumnsSearch[$i]." ILIKE '%".pg_escape_string( $_GET['sSearch'] )."%' ";
            }
        }
        //$sWhere = substr_replace( $sWhere, "", -3 );
        $sWhere .= ")  and a.status='1' ";


        
    }




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
/*	$var_ticket = ""; 
	$var_customer = ""; 
	$mid = ""; 
	$jenis = ""; 
	$bank = "";
	//$id_ro = 277;

	$id_pic=getIdPic();
*/
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





	//$no=$_GET['iDisplayStart'];
	$sQuery  = " select a.id_pronews,a.title,a.news,a.image,a.adddt,a.addby,a.id_cat_pronews,a.status,b.name_category from promotion_news a 
left join category_promotion b on b.id_cat_pronews=a.id_cat_pronews  $sWhere   ".
    // $searchticket.
	// $searchcustomer.
    $sOrder." ".
	$sLimit;
   // echo $sQuery;
    $rResult = pg_query( $connection, $sQuery ) or die(pg_last_error());

	
	$sQuery  = " select a.$sIndexColumn  from promotion_news a 
left join category_promotion b on b.id_cat_pronews=a.id_cat_pronews  $sWhere  ";
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
			else if ( $aColumns[$i] == "id_pronews" )
            {
                $filename='images/img-promnews/$aRow[image]';
                    if (!file_exists($filename)) {
                       $ticket=" ";
                    }else{
                       $ticket="<img src='images/img-promnews/$aRow[image]' alt='' class='img-responsive'>";
                    }
               							
			   $row[] = $ticket; 
            }
			else if ($aColumns[$i] == "title")
			{
			   $nama_channel ="<div class='page-bar2'>";
               $nama_channel.= "  <ul class='page-breadcrumb'>";
               $nama_channel.= "      <li>";
               $nama_channel.="          <i class='fa fa-calendar'></i>";
               $nama_channel.= "              <a href='#' class='bold'>".date('j F Y',strtotime($aRow['adddt']))."</a>";
               $nama_channel.= "          <i class='fa fa-angle-right'></i>";
               $nama_channel.= "      </li>";
               $nama_channel.= "      <li>";
               $nama_channel.= "          <i class='fa fa-tags'></i>";
               $nama_channel.= "              <a href='#' class='bold'>".$aRow['name_category']."</a>";
               $nama_channel.= "          <i class='fa fa-angle-right'></i>";
               $nama_channel.= "      </li>";
               $nama_channel.= "  </ul>";
               $nama_channel.= "</div>";
               $nama_channel.="<hr></b><h3 class='page-title font-blue-steel font-lg bold' >".$aRow['title']."</h3>".shortNews( $aRow['news'], $wordCount = 30 )."...."."<hr> <a class='beritaPromosi' href='#' id-promosi='$aRow[id_pronews]' id-title2='$aRow[title]' data-toggle='modal' data-target='#news-promotion'><button class='btn blue'> Read more <i class='m-icon-swapright m-icon-white'></i> </button> </a>";							
			   $row[] = $nama_channel;
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
