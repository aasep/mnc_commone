<?php
require_once('config.php');


if (!$connection2) {
echo "connection2 Failed";
exit;
}




    $aColumns = array('no','checklist','tid','nama_merchant', 'name','duedate', 'flag', 'example' );
	$aColumns_sorting = array('id_spk','id_spk','tid', 'nama_merchant', 'name','duedate', 'flag', 'example');

    /* Indexed column (used for fast and accurate table cardinality) */
    $sIndexColumn = "tid";

  
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
	// GET TID
	//$id = $_GET['id']; 
	//$tid = $_GET['tid']; 
	//$mid = $_GET['mid']; 
	//$jenis = $_GET['jenis']; 
	//$bank = $_GET['name'];
	//$id_ro = $_GET['id_ro'];
	$id = ""; 
	$tid = ""; 
	$mid = ""; 
	$jenis = ""; 
	$bank = "";
	$id_ro = 277;

    /* Individual column filtering */
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
	


	$current_date = date('Y-m');
	
	
	$searchtid = "";
	if ($tid != "") {
		$searchtid = "AND tid LIKE '%$tid%' ";
	}
	$searchmid = "";
	if ($mid != "") {
		$searchmid = "AND mid LIKE '%$mid%' ";
	}
	$searchjenis = "";
	if ($jenis != "") {
		$searchjenis = "AND jenis LIKE '%".strtoupper($jenis)."%'";
	}
	$searchbank = "";
	if ($bank != "") {
		$searchbank = "AND name LIKE '%".strtoupper($bank)."%'";
	}

	$no=$_GET['iDisplayStart'];
	$sQuery = " SELECT * FROM spk a ".
             " LEFT JOIN partners b on a.id_bank=b.id ".
             " WHERE a.status in (0,9) ".
			 $searchtid.
			 $searchmid.
			 $searchjenis.
			 $searchbank.
             " AND a.id_ro=$id_ro ".
			 " AND ((jenis IN('PM','COLLECT') and to_char(tgl_upload, 'YYYY-MM')='".$current_date."') OR (jenis NOT IN('PM','COLLECT') and to_char(tgl_upload, 'YYYY-MM')<='".$current_date."'))".
			 $sOrder." ".
			 $sLimit;
    $rResult = pg_query( $connection2, $sQuery ) or die(pg_last_error());

	
	$sQuery = " SELECT $sIndexColumn FROM spk a ".
             " LEFT JOIN partners b on a.id_bank=b.id ".
             " WHERE a.status in (0,9) ".
			 $searchtid.
			 $searchmid.
			 $searchjenis.
			 $searchbank.
             " AND a.id_ro=$id_ro ".
			 " AND ((jenis IN('PM','COLLECT') and to_char(tgl_upload, 'YYYY-MM')='".$current_date."') OR (jenis NOT IN('PM','COLLECT') and to_char(tgl_upload, 'YYYY-MM')<='".$current_date."'))";
			 	 
	$rResultTotal = pg_query( $connection2, $sQuery ) or die(pg_last_error());
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
			else if ( $aColumns[$i] == "no" )
            {
                /* Special output formatting for 'version' column */
				$no++;
                $row[] = $no;
            }
			else if ($aColumns[$i] == "checklist")
			{
				$row[] = "<input name='checkbox[]' id='checkbox[]' type='checkbox' class='form-check[]' value='".$aRow[id_spk]."'/>";
			}
			
			else if ($aColumns[$i] == "flag")
			{
				$query_notify = "select * from log_spk where id in(select max(id) as id  from log_spk where id_spk=".$aRow['id_spk'].")";
				$result_notify = pg_query($connection2, $query_notify);
				$row_ket = pg_fetch_array($result_notify);
				if (isset($row_ket['act']) && $row_ket['descr']=='Sukses Upload')
				{
					$flag = "<span class='label label-success'><i>Uploaded by CA </i></span>";
				}
				else
				{
					$flag = "<span class='label label-danger'>".$row_ket[act]."</span>";
				}
				$row[] = $flag;
			}
			else if ($aColumns[$i] == "example")
			{    
				$module=$_GET['module'];
				$page = "home.php?module=$module";
				$infospk = "<a href='$page&id_spk=$aRow[id_spk]&no_spk=$aRow[no_spk]&tid=$aRow[tid]&mid=$aRow[mid]&merk=$aRow[merk]&sn=$aRow[sn_terminal]'><span class='badge badge-info'>INFORMASI</span></a>";
				$row[] = $infospk;
				//$infospk = "<input name='spkinfo[]' id='spkinfo[]' type='hidden' value='".$aRow['id_spk']."'><span class='badge badge-info'>INFORMASI</span>";
				//$row[] = $infospk;
			}
			
			else if ($aColumns[$i] == "tid") 
			{				
				$joborder="<p><B><font size='2' color='black'>".$aRow['jenis']."</font></B> : <font size='2' color='black'>".$aRow['no_spk']."</font>	</p>			
				<p><font size='2' color='black'>".$aRow['tid']."</font></p>
				<p><font size='2' color='black'>".$aRow['mid']."</font></p>";							
				$row[] = $joborder; 
			}
			else if ($aColumns[$i] == "nama_merchant") 
			{				
				$nama_merchant="<p><B><font size='2' color='black'>".$aRow['nama_merchant']."</font></B></p>				
				<p><font size='2' color='black'>".$aRow['alamat_merchant']."</font></p>
				<p><font size='2' color='black'>".$aRow['nama_kota']."</font></p>";				
				$row[] = $nama_merchant; 
			}		
				
			else if ($aColumns[$i] == "duedate")
			{
					
			date_default_timezone_set("Asia/Jakarta"); 
			$tanggal = date('Y-m-d h:i');
					$duedate="";
					if ($aRow['duedate']!="" && $aRow['duedate']<date('Y-m-d h:i')){					
					$duedate="<p><font size='2' color='red'><b>".date('d-m-Y H:i',strtotime($aRow['duedate']))."</b></font></p>";					
					}
					if ($aRow['duedate']!="" && $aRow['duedate']>date('Y-m-d h:i')){					
					$duedate="<p><font size='2' color='black'><b>".date('d-m-Y H:i',strtotime($aRow['duedate']))."</b></font></p>";					
					}
					
					if ($aRow['duedate']=="NULL" || $aRow['duedate']=="null" || $aRow['duedate']=="")		
					{
					$duedate="<p><font size='2' color='black'>---</font></p>";		
					}	
			
				$row[] = $duedate;
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

    // Closing connection2
    pg_close( $connection2 );



?>
