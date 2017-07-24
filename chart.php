<?php
include("connect.php");
if (isset($_GET["chart"])) {
	if ($_GET["chart"]==0) {
		$_GET["chart"]="SPI";
	}else if ($_GET["chart"]==1){
		$_GET["chart"]="MPSP";
	}else if ($_GET["chart"]==2) {
		$_GET["chart"]="BVSP";
	}
}
$sql_basic = "SELECT DISTINCT `Sow_ID` FROM `birth_record` ORDER BY `Sow_ID` ASC";
$result_basic = mysql_query($sql_basic);
$count = 0;
while($row_basic = mysql_fetch_array($result_basic)){
	$sql_chart = "SELECT * FROM `birth_record` WHERE `Sow_ID` = '".$row_basic["Sow_ID"]."' ORDER BY `Numbers_Of_Fetus` DESC, `Birth_Date` DESC";
	$result_chart = mysql_query($sql_chart);
	$row_chart = mysql_fetch_array($result_chart);
	$chart[$count][0] = $row_chart["Sow_ID"];
	$chart[$count][1] = $row_chart[$_GET["chart"]];
	$count++;
}
$chart = bubble_sort($chart, 1);
function bubble_sort($obj, $num) {
  for ($i = 0; $i < count($obj) - 1; $i++){
    for ($j = 0; $j < count($obj) - 1 - $i; $j++){
      if ($obj[$j + 1][$num] > $obj[$j][$num]){
        $t0=$obj[$j][0];
        $t1=$obj[$j][1];
        //
        $obj[$j][0]=$obj[$j + 1][0];
        $obj[$j][1]=$obj[$j + 1][1];
        //
        $obj[$j+1][0]=$t0;
        $obj[$j+1][1]=$t1;
      }
    }
  }
  return $obj;
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        <?php
        	echo "['Sow_ID', '".$_GET["chart"]."', { role: 'style' } ],";
        	for($i=0; $i<count($chart); $i++){
				echo "[";
				echo "'".$chart[$i][0]."', ";
				echo "".$chart[$i][1].", ";
				echo "'color: #88C8E1' ";
				echo "]";
				if($i!=(count($chart)-1)){
					echo ", ";
				}
			}
        ?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {

      	chartArea:{top:1,width:'90%',height:'90%'},
        legend: { position: "none" }
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }
  </script>
  
</head>
<body>
	<div id="barchart_values" style="width:100%;height:500px;"></div>
</body>
</html>