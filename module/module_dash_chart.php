<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);



?>

<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			
			<h3 class="page-title bold">
			 Chart Inquiry
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Chart</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Chart Inquiry</a>
						<i class="fa fa-angle-right"></i>
					</li>
				
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<!-- BEGIN VALIDATION STATES-->
           
   

                       <div class="portlet light grey-mint bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-haze"></i>
											<span class="caption-subject font-red-haze bold uppercase">Composition Inquiry</span>
											<span class="caption-helper">...</span>
										</div>
										
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										
											<div class="form-body">
												
												<div class="row">
													<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 600px;
}										
</style>

<!-- Resources -->
<script src="assets/global/plugins/amchart2/amcharts.js"></script>
<script src="assets/global/plugins/amchart2/serial.js"></script>
<script src="assets/global/plugins/amchart2/export.min.js"></script>
<link rel="stylesheet" href="assets/global/plugins/amchart2/export.css" type="text/css" media="all" />
<script src="assets/global/plugins/amchart2/light.js"></script>
<script src="assets/global/plugins/amchart2/chalk.js"></script>

<script src="assets/global/plugins/amcharts/amcharts/exporting/amexport.js" type="text/javascript"></script>
<script src="assets/global/plugins/amcharts/amcharts/exporting/canvg.js" type="text/javascript"></script>
<script src="assets/global/plugins/amcharts/amcharts/exporting/rgbcolor.js" type="text/javascript"></script>
<script src="assets/global/plugins/amcharts/amcharts/exporting/filesaver.js" type="text/javascript"></script>

<script src="assets/global/plugins/amcharts/amcharts/exporting/jspdf.plugin.addimage.js" type="text/javascript"></script>
<script src="assets/global/plugins/amcharts/amcharts/exporting/jspdf.js" type="text/javascript"></script>












<!-- Chart code -->
<script>










var chart = AmCharts.makeChart("chartdiv", {
    "theme": "light",
    "type": "serial",
    "dataProvider": [<?php
$date = date_create_from_format("Y/m/d",date("Y/m")."/01");

$opsi_val = array(12);
$opsi_str = array(12);

for ($i=0;$i<12;$i++) {

    	$opsi_val[$i] = date_format($date,"Y-m");
    	$strCategories .= "<category name='" . $opsi_val[$i] . "' />";
       	$opsi_str[$i] = date_format($date,"M-Y");
		$date = date_sub($date,date_interval_create_from_date_string("1 month"));


####### Query Belum dikerjakan (status=1 & Sla on) ########
$query1 =" select count(a.id_lapker) as jml1 from laporan_kerja a  ";
$query1.=" where a.status='1'  and  to_char(a.date_sla, 'YYYY-MM') ='".$opsi_val[$i]."' ";

$result1=pg_query($connection,$query1);
$row1=pg_fetch_array($result1);
$count1=$row1['jml1'];
if(!isset($count1) || $count1==NULL) $count1=0;

####### Query sedang dikerjakan (status=2 & Sla on) ########
$query2 =" select count(a.id_lapker) as jml2 from laporan_kerja a  ";
$query2.="  where a.status='2'  and  to_char(a.date_sla, 'YYYY-MM') ='".$opsi_val[$i]."' ";
$result2=pg_query($connection,$query2);
$row2=pg_fetch_array($result2);
$count2=$row2['jml2'];
if(!isset($count2) || $count2==NULL) $count2=0;
####### Query selesai dikerjakan (status=3 )########
$query3 =" select count(a.id_lapker) as jml3 from laporan_kerja a  ";
$query3.="  where a.status='3' and  to_char(a.date_sla, 'YYYY-MM') ='".$opsi_val[$i]."' ";
$result3=pg_query($connection,$query3);
$row3=pg_fetch_array($result3);
$count3=$row3['jml3'];
if(!isset($count3) || $count3==NULL) $count3=0;
####### Query expire  (status=1 atau 2 & Sla off )########
$query4 =" select count(a.id_lapker) as jml4 from laporan_kerja a  ";
if ($i=='0'){
$query4.=" where a.status in ('1','2')  and  to_char(date_sla, 'YYYY-MM-DD') < '".date('Y-m-d')."' ";	
}else {
$query4.=" where a.status in ('1','2')  and  to_char(date_sla, 'YYYY-MM') < '".$opsi_val[$i]."' ";	
}

//$query4.=" where a.status in ('1','2')  and  to_char(date_sla, 'YYYY-MM-DD') < '".date('Y-m-d')."' ";
//echo $query4;
$result4=pg_query($connection,$query4);
$row4=pg_fetch_array($result4);
$count4=$row4['jml4'];
if(!isset($count4) || $count4==NULL ) $count4=0;


		echo '{';
		echo '"country":"'.$opsi_str[$i] .'",';
		echo '"expired":"'.$count4 .'",';
		echo '"onprogress":"'.$count2 .'",';
		echo '"unprocess":"'.$count1 .'",';
		echo '"done":"'.$count3 .'"';
		echo "},";

}
?>],
    "valueAxes": [{
        "stackType": "3d",
        "unit": " case",
        "position": "left",
        "title": "Performansi Inquiry",
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "EXPIRED in [[category]]: <b>[[value]]</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "2004",
        "type": "column",
        "valueField": "expired"
    }, {
        "balloonText": "ONPROGRESS in [[category]] : <b>[[value]]</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "2005",
        "type": "column",
        "valueField": "onprogress"
    },{
        "balloonText": "UNPROCESS in [[category]]: <b>[[value]]</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "2005",
        "type": "column",
        "valueField": "unprocess"
    },{
        "balloonText": "DONE in [[category]]: <b>[[value]]</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "2006",
        "type": "column",
        "valueField": "done"
    }
    ],
    "plotAreaFillAlphas": 0.1,
    "depth3D": 100,
    "angle": 30,
    "categoryField": "country",
    "categoryAxis": {
        "gridPosition": "start"
    },
    "export": {
    	"enabled": true
     }
});
jQuery('.chart-input').off().on('input change',function() {
	var property	= jQuery(this).data('property');
	var target		= chart;
	chart.startDuration = 0;

	if ( property == 'topRadius') {
		target = chart.graphs[0];
      	if ( this.value == 0 ) {
          this.value = undefined;
      	}
	}

	target[property] = this.value;
	chart.validateNow();
});
</script>

<!-- HTML -->
<div id="chartdiv"></div>
													


												</div>
												<br><br><br>
												<div class="row">
												<div class="portlet light grey-cascade bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-dark-haze"></i>
											<span class="caption-subject font-dark-haze bold uppercase">Composition Channel </span>
											<span class="caption-helper">...</span>
										</div>
										
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
											<div class="form-body">
												

<!-- Styles -->
<style>
#chartdiv2 {
  width: 100%;
  height: 500px;
}										
</style>



<!-- Chart code -->
<script>
var chart = AmCharts.makeChart("chartdiv2", {
    "theme": "light",
    "type": "serial",
    "dataProvider": [<?php

    $q_all_channel=" select * from master_channel order by name asc ";
    $res_all_channel= pg_query($connection,$q_all_channel);
    while ($row_all_channel=pg_fetch_array($res_all_channel)){
    		
    		$id_channel=$row_all_channel['id_channel'];
    		$nama_channel=$row_all_channel['name'];

    		$q_count=" select count(id_lapker) as jml_channel  from laporan_kerja where id_channel='$id_channel' ";
   			$res_count= pg_query($connection,$q_count);
   			$row_count=pg_fetch_array($res_count);
   			$jml_channel=$row_count['jml_channel'];



    	echo '{';
		echo '"channel":"'.$nama_channel .'",';
		echo '"count":"'.$jml_channel .'"';
		echo "},";
	 }

    ?>],
    "valueAxes": [{
        "title": "Inquiry of Channel "
    }],
    "graphs": [{
        "balloonText": "Inquiry in [[category]]:[[value]]",
        "fillAlphas": 1,
        "lineAlpha": 0.5,
        "title": "Jumlah",
        "type": "column",
        "valueField": "count"
    }],
    "depth3D": 30,
    "angle": 30,
    "rotate": true,
    "categoryField": "channel",
    "categoryAxis": {
        "gridPosition": "start",
        "fillAlpha": 0.05,
        "position": "left"
    },
    "export": {
    	"enabled": true
     }
});
</script>

<!-- HTML -->
<div id="chartdiv2"></div>	




												</div>
												</div>
												</div>
												</div>
												
<br><br><br>
                                                <div class="row">
                                                <div class="portlet light blue-ebonyclay bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-equalizer font-green-haze"></i>
                                            <span class="caption-subject font-green-haze bold uppercase">Composition of PIC </span>
                                            <span class="caption-helper">...</span>
                                        </div>
                                        
                                    </div>
                                    <div class="portlet-body form">
                                        <!-- BEGIN FORM-->

                                            <div class="form-body">
                                                

<!-- Styles -->

<style>
body { background-color: #3f3e3b; color: #fff; }
#chartdiv3 {
  width: 100%;
  height: 1000px;
}                                       
</style>


<!-- Chart code -->
<script>
var chart = AmCharts.makeChart("chartdiv3", {
    "theme": "chalk",
    "type": "serial",
    "dataProvider": [<?php

    $q_pic=" select * from master_pic order by name asc ";
    $res_pic= pg_query($connection,$q_pic);
    while ($row_pic=pg_fetch_array($res_pic)){
            
            $id_pic=$row_pic['id_pic'];
            $nama_pic=$row_pic['name'];

            $q_count=" select count(a.id_lapker) as jml_pic  from laporan_kerja a ";
            $q_count.=" left join map_pic b on b.id_case=a.id_case where  b.id_pic='$id_pic' ";
            $res_count= pg_query($connection,$q_count);
            $row_count=pg_fetch_array($res_count);
            $jml_pic=$row_count['jml_pic'];



        echo '{';
        echo '"pic":"'.$nama_pic .'",';
        echo '"count":"'.$jml_pic .'"';
        echo "},";
     }

    ?>],
    "valueAxes": [{
        "title": "Inquiry of PIC "
    }],
    "graphs": [{
        "balloonText": "Inquiry in [[category]]:[[value]]",
        "fillAlphas": 1,
        "lineAlpha": 0.5,
        "title": "Jumlah",
        "type": "column",
        "valueField": "count"
    }],
    "depth3D": 30,
    "angle": 30,
    "rotate": true,
    "categoryField": "pic",
    "categoryAxis": {
        "gridPosition": "start",
        "fillAlpha": 0.05,
        "position": "left"
    },
    "export": {
        "enabled": true
     }
});
</script>








<!-- HTML -->
<div id="chartdiv3"></div>  




                                                </div>
                                                </div>
                                                </div>
                                                </div>
<br><br><br>
<div class="row">
                                                <div class="portlet light grey-cascade bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-equalizer font-dark-haze"></i>
                                            <span class="caption-subject font-dark-haze bold uppercase">Composition All Case  </span>
                                            <span class="caption-helper">...</span>
                                        </div>
                                        
                                    </div>
                                    <div class="portlet-body form">
                                        <!-- BEGIN FORM-->

                                            <div class="form-body">
                                                

<!-- Styles -->
<style>
#chartdiv4 {
  width: 100%;
  height: 3500px;
}                                       
</style>



<!-- Chart code -->
<script>
var chart = AmCharts.makeChart("chartdiv4", {
    "theme": "light",
    "type": "serial",
    "dataProvider": [<?php

    $q_all_case ="select distinct a.id_case ,b.name as nama_case, count (a.id_lapker) from laporan_kerja a ";
    $q_all_case.="left join master_case b on a.id_case=b.id_case ";
    $q_all_case.="group by a.id_case, b.name order by a.id_case asc ";
    $res_all_case= pg_query($connection,$q_all_case);
    while ($row_all_case=pg_fetch_array($res_all_case)){
            
            $id_case=$row_all_case['id_case'];
            $nama_case=$row_all_case['nama_case'];
            $jml_case=$row_all_case['count'];



        echo '{';
        echo '"channel":"'.$nama_case .'",';
        echo '"count":"'.$jml_case .'"';
        echo "},";
     }

    ?>],
    "valueAxes": [{
        "title": "List Of Case "
    }],
    "graphs": [{
        "balloonText": "Inquiry in [[category]]:[[value]]",
        "fillAlphas": 1,
        "lineAlpha": 0.5,
        "title": "Jumlah",
        "type": "column",
        "valueField": "count"
    }],
    "depth3D": 30,
    "angle": 30,
    "rotate": true,
    "categoryField": "channel",
    "categoryAxis": {
        "gridPosition": "start",
        "fillAlpha": 0.05,
        "position": "left"
    },
    "export": {
        "enabled": true
     }
});
</script>

<!-- HTML -->
<div id="chartdiv4"></div>  




                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                
<br><br><br>













											</div>
											
										
									</div>
								</div>


<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL STYLES -->
<script src="assets/admin/pages/scripts/form-validation.js"></script>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>

<script>
$(document).ready(function() {


}); // document ready	$(document).ready(function() {

    </script>



