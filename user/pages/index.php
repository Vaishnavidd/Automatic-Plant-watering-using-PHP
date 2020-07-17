<?php
session_start();
ob_start();

//Include the database connection file
include "../../config.php";

if (isset($_SESSION["VALID_USER"]) && !empty($_SESSION["VALID_USER"])) 
 {
    //This identifies the owners of pages for Adding and Cancelling Friendship activities
    if (isset($_GET["page_owner"]) && !empty($_GET["page_owner"])) 
	{
        $page_owner = strip_tags(base64_decode($_GET["page_owner"]));
    }
	else 
	{
        $page_owner = strip_tags($_SESSION["VALID_USER"]);
    }
	
	


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <title>User Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
 <link rel="stylesheet" href="http://www.amcharts.com/lib/style.css" type="text/css">
  <script src="http://www.amcharts.com/lib/3/amcharts.js" type="text/javascript"></script>
  <script src="http://www.amcharts.com/lib/3/serial.js" type="text/javascript"></script>

  <!-- cutom functions -->
  <script>
AmCharts.loadJSON = function(url) {
  // create the request
  if (window.XMLHttpRequest) {
    // IE7+, Firefox, Chrome, Opera, Safari
    var request = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    var request = new ActiveXObject('Microsoft.XMLHTTP');
  }

  // load it
  // the last "false" parameter ensures that our code will wait before the
  // data is loaded
  request.open('GET', url, false);
  request.send();

  // parse adn return the output
  return eval(request.responseText);
};
  </script>

</head>
<body  class="sidebar-mini skin-green-light fixed hold-transition"  >
<!-- Site wrapper -->
<div class="wrapper">

  <?php include("header.php"); ?>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Welcome to
       Monitoring and Controlling growth of Plants
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<div class="row">
                
				 <div class="col-md-12">

      <!-- Default box -->
       <div class="box box-success col-md-6">
            <div class="box-header with-border">
              <h3 class="box-title">Temperature Sensor</h3>
            </div>
            <div id="chartdiv" style="width: 600px; height: 300px;"></div>
          </div>
		  </div>
		  
		  <div class="col-md-12">

      <!-- Default box -->
       <div class="box box-success col-md-6">
            <div class="box-header with-border">
              <h3 class="box-title">Humidity Sensor</h3>
            </div>
            <div id="chartdiv1" style="width: 600px; height: 300px;"></div>
          </div>
		  </div>
		  
		  <div class="col-md-12">

      <!-- Default box -->
       <div class="box box-success col-md-6">
            <div class="box-header with-border">
              <h3 class="box-title">Soil Sensor</h3>
            </div>
            <div id="chartdiv2" style="width: 600px; height: 300px;"></div>
          </div>
		  </div>
		  
		  <div class="col-md-12">

      <!-- Default box -->
       <div class="box box-success col-md-6">
            <div class="box-header with-border">
              <h3 class="box-title">Water Level Sensor</h3>
            </div>
            <div id="chartdiv3" style="width: 600px; height: 300px;"></div>
          </div>
		  </div>
		  
		   <div class="col-md-12">

      <!-- Default box -->
       <div class="box box-success col-md-6">
            <div class="box-header with-border">
              <h3 class="box-title">LDR Sensor</h3>
            </div>
            <div id="chartdiv4" style="width: 600px; height: 300px;"></div>
          </div>
		  </div>
		  
		  
		  
		  
		  </div>
		  
             <script>
var chart;
var chart1;
var chart2;
var chart3;
var chart4;

// create chart
AmCharts.ready(function() 
{

 updateChart();
 
});


	var updateInterval = 5000;
	setInterval(function () { updateChart() }, updateInterval);

function updateChart()
{
  	var chartData = AmCharts.loadJSON('data.php?id='+<?php echo $_SESSION['userid']; ?>);

  // SERIAL CHART Temp Sensor
  	chart = new AmCharts.AmSerialChart();
  	chart.pathToImages = "http://www.amcharts.com/lib/images/";
  	chart.dataProvider = chartData;
  	chart.categoryField = "category";
  	chart.dataDateFormat = "YYYY-MM-DD HH:MM:SS";
	chart.categoryAxis.labelRotation = 45;


  // GRAPHS
  	var graph1 = new AmCharts.AmGraph();
  	graph1.valueField = "value1";
  	graph1.bullet = "round";
  	graph1.bulletBorderColor = "#FFFFFF";
  	graph1.bulletBorderThickness = 2;
  	graph1.lineThickness = 2;
  	graph1.lineAlpha = 0.5;
  	chart.addGraph(graph1);

 
  // SERIAL CHART Humidity Sensor
  	chart1 = new AmCharts.AmSerialChart();
  	chart1.pathToImages = "http://www.amcharts.com/lib/images/";
  	chart1.dataProvider = chartData;
  	chart1.categoryField = "category";
  	chart1.dataDateFormat = "YYYY-MM-DD HH:MM:SS";
	chart1.categoryAxis.labelRotation = 45;

  	var graph2 = new AmCharts.AmGraph();
  	graph2.valueField = "value2";
  	graph2.bullet = "round";
  	graph2.bulletBorderColor = "#FFFFFF";
  	graph2.bulletBorderThickness = 2;
  	graph2.lineThickness = 2;
  	graph2.lineAlpha = 0.5;
  	chart1.addGraph(graph2);
	
	
	// SERIAL CHART Soil Sensor
  	chart2 = new AmCharts.AmSerialChart();
  	chart2.pathToImages = "http://www.amcharts.com/lib/images/";
  	chart2.dataProvider = chartData;
  	chart2.categoryField = "category";
  	chart2.dataDateFormat = "YYYY-MM-DD HH:MM:SS";
	chart2.categoryAxis.labelRotation = 45;

  	var graph3 = new AmCharts.AmGraph();
  	graph3.valueField = "value3";
  	graph3.bullet = "round";
  	graph3.bulletBorderColor = "#FFFFFF";
  	graph3.bulletBorderThickness = 2;
  	graph3.lineThickness = 2;
  	graph3.lineAlpha = 0.5;
  	chart2.addGraph(graph3);
  
  // SERIAL CHART Water Sensor
  	chart3 = new AmCharts.AmSerialChart();
  	chart3.pathToImages = "http://www.amcharts.com/lib/images/";
  	chart3.dataProvider = chartData;
  	chart3.categoryField = "category";
  	chart3.dataDateFormat = "YYYY-MM-DD HH:MM:SS";
	chart3.categoryAxis.labelRotation = 45;

  	var graph4 = new AmCharts.AmGraph();
  	graph4.valueField = "value4";
  	graph4.bullet = "round";
  	graph4.bulletBorderColor = "#FFFFFF";
  	graph4.bulletBorderThickness = 2;
  	graph4.lineThickness = 2;
  	graph4.lineAlpha = 0.5;
  	chart3.addGraph(graph4);
  
  	// SERIAL CHART Ldr Sensor
  	chart4 = new AmCharts.AmSerialChart();
  	chart4.pathToImages = "http://www.amcharts.com/lib/images/";
  	chart4.dataProvider = chartData;
  	chart4.categoryField = "category";
  	chart4.dataDateFormat = "YYYY-MM-DD HH:MM:SS";
	chart4.categoryAxis.labelRotation = 45;

  	var graph5 = new AmCharts.AmGraph();
  	graph5.valueField = "value5";
  	graph5.bullet = "round";
  	graph5.bulletBorderColor = "#FFFFFF";
  	graph5.bulletBorderThickness = 2;
  	graph5.lineThickness = 2;
  	graph5.lineAlpha = 0.5;
  	chart4.addGraph(graph5);
	
	 
  
  // CATEGORY AXIS
  //chart.categoryAxis.parseDates = true;

  // WRITE
  chart.write("chartdiv");
  chart1.write("chartdiv1");
  chart2.write("chartdiv2");
  chart3.write("chartdiv3");
  chart4.write("chartdiv4");
  
}


  </script>    
                
                
            </div>
      
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/JavaScript">
<!--
function timedRefresh(timeoutPeriod) {
	setTimeout("location.reload(true);",timeoutPeriod);
}
//   -->
</script>
</body>
</html>

<?php
}
else
{
//echo "hii";
echo $_SESSION["VALID_USER"];
header("location: ../index.php");
}
?>
