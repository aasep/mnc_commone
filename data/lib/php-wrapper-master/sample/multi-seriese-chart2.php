<?php
$date = date_create_from_format("Y/m/d",date("Y/m")."/01");

$opsi_val = array(12);
$opsi_str = array(12);
$connection = pg_connect("host=localhost port=5432 dbname=commone user=postgres password=Instance12");
error_reporting(-1);
$strCategories=array();
$dataset = array();
//

$q_all_case= " select distinct(a.id_case),b.name from laporan_kerja a , master_case b where a.id_case=b.id_case order by b.name asc ";
  $res_all_case=pg_query($connection,$q_all_case);
  $z=1;
  while ($row_all_case=pg_fetch_array($res_all_case)){

      $strCat['label'] =$row_all_case['name'];
      array_push($strCategories,$strCat);

    }

$label_category=json_encode($strCategories); 
//echo "<br>";
//die();




 for ($i=0;$i<3;$i++) {
        //$value_dataset[] ="";
        $value_dataset = array();
        $opsi_val[$i] = date_format($date,"Y-m");
        $q_all_case2 = " select distinct(a.id_case),b.name from laporan_kerja a , master_case b where a.id_case=b.id_case order by b.name asc ";

        $res_all_case2=pg_query($connection,$q_all_case2);
        while ($row_all_case2=pg_fetch_array($res_all_case2)){
        
          $q_value_case= " select count(id_lapker) from laporan_kerja where id_case='$row_all_case2[id_case]' and  to_char(date_start, 'YYYY-MM')='".$opsi_val[$i]."'  ";
          //echo $q_value_case."<br>";
          $res_value_case= pg_query($connection,$q_value_case);

              $row_value_case=pg_fetch_array($res_value_case);
              $value['value']=$row_value_case['count'];
              array_push($value_dataset,$value);
            
      }
      //$fix_dataset=json_encode($value_dataset);
      $dataset[] = array("seriesname" => "$opsi_val[$i]","data" => $value_dataset);
      //array_push($dataset,$value_dataset);
     
      $opsi_str[$i] = date_format($date,"F-Y");
      $date = date_sub($date,date_interval_create_from_date_string("1 month"));
      
  }

 $label_dataset=json_encode($dataset);


//die()
?>


<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
<style>

.code-block-holder pre {
      max-height: 188px;  
      min-height: 188px; 
      overflow: auto;
      border: 1px solid #ccc;
      border-radius: 5px;
}


.tab-btn-holder {
	width: 100%;
	margin: 20px 0 0;
	border-bottom: 1px solid #dfe3e4;
	min-height: 30px;
}

.tab-btn-holder a {
	background-color: #fff;
	font-size: 14px;
	text-transform: uppercase;
	color: #006bb8;
	text-decoration: none;
	display: inline-block;
	*zoom:1; *display:inline;


}

.tab-btn-holder a.active {
	color: #858585;
    padding: 9px 10px 8px;
    border: 1px solid #dfe3e4;
    border-bottom: 1px solid #fff;
    margin-bottom: -1px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    position: relative;
    z-index: 300;
}

</style>

</head>
<body>
<?php

/**
* This example describes the multi seriese chart preparation using FusionCharts PHP wrapper
*/


// Including the wrapper file in the page
include("../src/fusioncharts.php");

    // Preparing the object of FusionCharts with needed informations
    /**
    * The parameters of the constructor are as follows
    * chartType   {String}  The type of chart that you intend to plot. e.g. Column3D, Column2D, Pie2D etc.
    * chartId     {String}  Id for the chart, using which it will be recognized in the HTML page. Each chart on the page should have a unique Id.
    * chartWidth  {String}  Intended width for the chart (in pixels). e.g. 400
    * chartHeight {String}  Intended height for the chart (in pixels). e.g. 300
    * containerId {String}  The id of the chart container. e.g. chart-1
    * dataFormat  {String}  Type of data used to render the chart. e.g. json, jsonurl, xml, xmlurl
    * dataSource  {String}  Actual data for the chart. e.g. {"chart":{},"data":[{"label":"Jan","value":"420000"}]}
    */
$columnChart = new FusionCharts("msbar3d", "ex1" , "100%", 500, "chart-1", "json", '{
      "chart": {
        "caption": "Permasalahan Produk MNC BANK",
        "subCaption": " 3 Bulan Terakhir ",
        "captionPadding": "15",
        "numberPrefix": "",
        "showvalues": "1",
        "valueFontColor": "#ffffff",
        "placevaluesInside": "1",
        "usePlotGradientColor": "0",
        "legendShadow": "0",
        "showXAxisLine": "1",
        "xAxisLineColor": "#999999",
        "divlineColor": "#999999",
        "divLineIsDashed": "1",
        "showAlternateVGridColor": "0",
        "alignCaptionWithCanvas": "0",
        "legendPadding": "15",
        "plotToolText": "<div><b>$label</b><br/>Product : <b>$seriesname</b><br/>Sales : <b>$value</b></div>",
        "theme": "fint"
      },
      "categories": [{
        "category": '.$label_category.'
      }],
      "dataset": '.$label_dataset.'
    }');
// Render the chart
$columnChart->render();
?>
<div id="chart-1"><!-- Fusion Charts will render here--></div>
