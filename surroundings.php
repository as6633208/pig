<?php
include("connect.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html"; >
  <meta charset="UTF-8">
  <title>環境監控</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/w3-theme-teal.css">
<link rel="stylesheet" href="./css//w3.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <style>
    .myProgress {
      position: relative;
    }

    .myBar {
      width: 10px;
    }
    .w3-sidenav a {padding:16px;font-weight:bold}
    

	.progress-bar div {
	  position: absolute;
	  height: 100px;
	  width: 100px;
	  border-radius: 50%;
	}

	.progress-bar div span {
	  position: absolute;
	  font-family: Arial;
	  font-size: 25px;
	  line-height: 75px;
	  height: 75px;
	  width: 75px;
	  left: 12.5px;
	  top: 12.5px;
	  text-align: center;
	  border-radius: 50%;
	  background-color: white;
	}

	.progress-bar .background { background-color: #b3cef6; }

	.progress-bar .rotate {
	  clip: rect(0 50px 100px 0);
	  background-color: #4b86db;
	}

	.progress-bar .left {
	  clip: rect(0 50px 100px 0);
	  opacity: 1;
	  background-color: #b3cef6;
	}

	.progress-bar .right {
	  clip: rect(0 50px 100px 0);
	  transform: rotate(180deg);
	  opacity: 0;
	  background-color: #4b86db;
	}

	@keyframes 
	toggle {  0% {
	 opacity: 0;
	}
	 100% {
	 opacity: 1;
	}
	}

  </style>
  
<script src="js/canvasjs.min.js"></script>
<script type="text/javascript">
    window.onload = function () {
     select_m();
    }
  </script>
  <script src="../../canvasjs.min.js"></script>
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="jQuery-plugin-progressbar.js"></script>
<script type="text/javascript">
function onSearch(obj){//js函数开始
	alert("aa");
  setTimeout(function(){//因为是即时查询，需要用setTimeout进行延迟，让值写入到input内，再读取
    var storeId = document.getElementById('store');//获取table的id标识
    var rowsLength = storeId.rows.length;//表格总共有多少行
    var key = obj.value;//获取输入框的值
    var searchCol = 0;//要搜索的哪一列，这里是第一列，从0开始数起
    for(var i=1;i<rowsLength;i++){//按表的行数进行循环，本例第一行是标题，所以i=1，从第二行开始筛选（从0数起）
      var searchText = storeId.rows[i].cells[searchCol].innerHTML;//取得table行，列的值
      if(searchText.match(key)){//用match函数进行筛选，如果input的值，即变量 key的值为空，返回的是ture，
        storeId.rows[i].style.display='';//显示行操作，
      }else{
        storeId.rows[i].style.display='none';//隐藏行操作
      }
    }
  },200);//200为延时时间
}
</script>
</head><body>

  <nav class="w3-sidenav w3-collapse w3-white w3-animate-left w3-card-2" style="z-index:3;width:250px;" id="mySidenav">
  <a href="home.php" class="w3-border-bottom w3-large"><img src="./img/logo.png" style="width:100%;"></a>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-text-teal w3-hide-large w3-closenav w3-large">返回 <i class="fa fa-remove"></i></a>
  <a href="home.php">首頁</a>

  <div class="w3-accordion">
    <a onclick="myAccordion(&#39;demo&#39;)" href="javascript:void(0)">豬隻管理<i class="fa fa-caret-down"></i></a>
    <div id="demo" class="w3-accordion-content w3-animate-left w3-padding">
      <a href="information_list.php">豬隻清單</a>
      <a href="information_add.php">豬隻新增</a>
    </div>
  </div>
  <div class="w3-accordion">
    <a onclick="myAccordion(&#39;demo1&#39;)" href="javascript:void(0)">生活日誌<i class="fa fa-caret-down"></i></a>
    <div id="demo1" class="w3-accordion-content w3-animate-left w3-padding">
      <a href="search_lifelog.php">日誌查詢</a>
      <a href="insert_lifelog.php">日誌新增</a>
    </div>
  </div>
  <div class="w3-accordion">
    <a onclick="myAccordion(&#39;demo2&#39;)" href="javascript:void(0)">生產資訊<i class="fa fa-caret-down"></i></a>
    <div id="demo2" class="w3-accordion-content w3-animate-left w3-padding">
      <a href="production_query.php">生產查詢</a>
      <a href="production.php">生產新增</a>
    </div>
  </div>
<a href="decision1.php">淘汰決策</a>
<a href="predict.php">指數預測</a>
<div class="w3-accordion">
    <a onclick="myAccordion(&#39;demo4&#39;)" href="javascript:void(0)">環境監控<i class="fa fa-caret-down"></i></a>
    <div id="demo4" class="w3-accordion-content w3-animate-left w3-padding">
      <a href="surroundings.php">分娩舍(母豬)</a>
      <a href="surroundings2.php">保育舍(小豬)</a>
    </div>
</div>
</nav>


<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

<div class="w3-main" style="margin-left:250px;">

  <div id="myTop" class="w3-top w3-container w3-padding-16 w3-theme w3-large">
    <i class="fa fa-bars w3-opennav w3-hide-large w3-xlarge w3-margin-left w3-margin-right" onclick="w3_open()"></i>
    <span id="myIntro" class="w3-hide">環境數據</span>
  </div>

  <div style="padding-top:32px;padding-Left:32px">
    <hr>
    <br>
    <h2>分娩舍(母豬)</h2>
    <br>
    <hr>
    
	<form action="surroundings.php" method="post">
      起始日期<br>
      <input class="w3-input w3-border w3-large w3-left" name="date11" type="date" id="date11">
      結束日期<br>
      <input class="w3-input w3-border w3-large w3-left" name="date12" type="date" id="date12">
      <br>
      <input class="w3-input w3-border w3-large w3-center w3-red" name="submit1" type="submit" id="submit1" value="查詢">
      <hr>
      目前查詢日期：<?php 
      $start = explode("-",$_POST[date11]);
      $end = explode("-",$_POST[date12]);
      if($start[0]==null || $end[0]==null){
      	if($start[0]==null){
      		$start[0]=date("Y");
        	$start[1]=date("m");
        	$start[2]=date("01");
      	}
        if($end[0]==null){
        	$end[0]=date("Y");
        	$end[1]=date("m");
        	$end[2]=date("t");
        }
        
        echo $start[0]."年".$start[1]."月".$start[2]."號~".$end[0]."年".$end[1]."月".$end[2]."號";
      }
      else{
        echo $start[0]."年".$start[1]."月".$start[2]."號~".$end[0]."年".$end[1]."月".$end[2]."號";
      }
       ?>        
     </form>
  
 <div id="chartContainer" style="height: 400px; width: 100%;"></div>

 <div >

          <ul class="menu">
      
            <?php

            $start = $_POST[date11];
              $end = $_POST[date12];
              if($start==null){
                $start=date("Y-m-01");
              }
              if($end==null){
                $end=date("Y-m-t");
              }
            $sql_basic = "SELECT MAX(CO2) as p6,MAX(Temperature) as p4,MAX(Humity) as p3,Date,round(AVG(Temperature),2) as p1,round(AVG(Humity),2) as p2,round(AVG(CO2),2) as p5 FROM KnowPig.microclimate_record 
              where  Date BETWEEN'".$start."' and '".$end."' and Place='母豬' GROUP BY Date ;";

              $sql_basic1 = "SELECT Humity,Datetime
FROM  KnowPig.microclimate_record
INNER JOIN
(SELECT Date,Max(id) AS MaxDateID From KnowPig.microclimate_record where   Date BETWEEN'".$start."' and '".$end."' and Place='母豬' GROUP BY Date ) xx
ON KnowPig.microclimate_record.date = xx.date 
AND KnowPig.microclimate_record.id = xx.MaxDateID;";
            $result_basic = mysql_query($sql_basic);
            $result_basic1 = mysql_query($sql_basic1);
            while($row_basic = mysql_fetch_array($result_basic)){
              ?>
              <li class="level1"> 

                <a href="#none"><?php echo $row_basic['Date']; ?></a>

                <ul class="level2">

                  <li><a href="#none">平均溫度：<?php echo $row_basic['p1']; ?>度</a></li>

                  <li><a href="#none" >平均濕度：<?php echo $row_basic['p5']; ?>%</a></li>

                  <li><a href="#none" >最高溫度：<?php echo $row_basic['p4']; ?>度</a></li>

                  <li><a href="#none" >最高濕度：<?php echo $row_basic['p6']; ?>%</a></li>

                  <li><a href="#none" >最後電量：<?php 
$row_basic1 = mysql_fetch_array($result_basic1);

                  echo $row_basic1['Humity']; ?>毫安培</a></li>

                </ul>

              </li>
              <?php } ?>
            </ul>

          </div>

    <script>
  var slideIndex = 1;
  showDivs(slideIndex);

  function select_m(){
      var chart = new CanvasJS.Chart("chartContainer", {
         animationEnabled: true,
        title: {
          text: "溫度與濕度",    
fontWeight: "900",          
        },
         legend: {
        horizontalAlign: "left",
        verticalAlign: "top"
      },
        axisX: {
           valueFormatString: "MM/DD",
        interval:1,
        intervalType: "day",
        },
        axisY: {
           valueFormatString: "#0度",
             labelFontColor: "#ff0000" ,
        lineColor: "#ff0000" ,
        lineThickness: 3,
     maximum: 50
          //includeZero: true
          // valueFormatString: "YYYY-MMM-DD"
        },
        axisY2: {
           valueFormatString: "#0",
suffix: "%",           
             labelFontColor: "#0000ff" ,
        lineColor: "#0000ff" ,
        lineThickness: 3,
     maximum: 100
        },
        data: [
        {
           type: "spline",
          color:"#ff0000",
            showInLegend: true,
            toolTipContent: "{x} , {y} 度 ",
           legendText: "溫度",
          dataPoints: [
           
   <?php

             $start = $_POST[date11];
              $end = $_POST[date12];
              if($start==null){
                $start=date("Y-m-01");
              }
              if($end==null){
                $end=date("Y-m-t");
              }
              $sql_tmpmm = "SELECT Date,round(AVG(Temperature),2) as p1 FROM KnowPig.microclimate_record 
              where   Date BETWEEN'".$start."' and '".$end."' and Place='母豬' GROUP BY Date ;";
              $result_tmpmm = mysql_query($sql_tmpmm);

              while($row_tmpmm = mysql_fetch_array($result_tmpmm)){
                $string =explode("-",$row_tmpmm['Date']);
                $ta=(float)$string[1]-1;
                $ya=(string)$ta;
                $y_date=$string[0].','.$ya.','.$string[2];
                echo "{ x:new Date(".$y_date."), y: parseFloat(".$row_tmpmm['p1'].") },"; 
              }
            ?>
          ]
        
        },
          {
           type: "spline",
          //color: "rgba(0, 0, 255, .6)",
          color:"#888888",
      toolTipContent: "{x} , {y} 毫安培",
           showInLegend: true,
           legendText: "最後電量",
           axisYType: "secondary",
          dataPoints: [
        <?php
              $start = $_POST[date11];
              $end = $_POST[date12];
              if($start==null){
                $start=date("Y-m-01");
              }
              if($end==null){
                 $end=date("Y-m-t");
              }
              $sql_tmpmm = "SELECT *
FROM  KnowPig.microclimate_record 
INNER JOIN
(SELECT Date,Max(id) AS MaxDateID From KnowPig.microclimate_record where   Date BETWEEN'".$start."' and '".$end."' and Place='母豬' GROUP BY Date) xx
ON KnowPig.microclimate_record.date = xx.date 
AND KnowPig.microclimate_record.id = xx.MaxDateID;";
              $result_tmpmm = mysql_query($sql_tmpmm);

              while($row_tmpmm = mysql_fetch_array($result_tmpmm)){
                $string =explode("-",$row_tmpmm['Date']);
                $ta=(float)$string[1]-1;
                $ya=(string)$ta;
                $y_date=$string[0].','.$ya.','.$string[2];
                echo "{ x:new Date(".$y_date."), y: parseFloat(".$row_tmpmm['Humity'].") },"; 
              }
            ?>
          
        
            // datava[1].innerHTML
    
          ]
        
        },
{
           type: "spline",
          //color: "rgba(0, 0, 255, .6)",
          color:"#0000ff",
      toolTipContent: "{x} , {y} % ",
           showInLegend: true,
           legendText: "濕度",
           axisYType: "secondary",
          dataPoints: [
        <?php

              $start = $_POST[date11];
              $end = $_POST[date12];
              if($start==null){
                $start=date("Y-m-01");
              }
              if($end==null){
                  $end=date("Y-m-t");
              }
              $sql_tmpmm = "SELECT Date,round(AVG(CO2),2) as p3 FROM KnowPig.microclimate_record
              where Date BETWEEN '".$start."' and '".$end."' and Place='母豬' GROUP BY Date;";
              $result_tmpmm = mysql_query($sql_tmpmm);

              while($row_tmpmm = mysql_fetch_array($result_tmpmm)){
                $string =explode("-",$row_tmpmm['Date']);
                $ta=(float)$string[1]-1;
                $ya=(string)$ta;
                $y_date=$string[0].','.$ya.','.$string[2];
                echo "{ x:new Date(".$y_date."), y: parseFloat(".$row_tmpmm['p3'].") },"; 
              }
            ?>
          
        
            // datava[1].innerHTML
    
          ]
        
        }
        
        ]
        
      });
      chart.render();
  }

  function plusDivs(n) {
    showDivs(slideIndex += n);
  }

  function currentDiv(n) {
    showDivs(slideIndex = n);
  }

  function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    if (n > x.length) {slideIndex = 1}
      if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
         x[i].style.display = "none";
       }
       for (i = 0; i < dots.length; i++) {
         dots[i].className = dots[i].className.replace("w3-blue", "");
       }
       x[slideIndex-1].style.display = "block";
       dots[slideIndex-1].className += " w3-blue";
     }
   </script> 
      <script>
// Open and close the sidenav on medium and small screens
function w3_open() {
  document.getElementById("mySidenav").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
function w3_close() {
  document.getElementById("mySidenav").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Change style of top container on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("myTop").classList.add("w3-card-4");
    document.getElementById("myIntro").classList.add("w3-show-inline-block");
  } else {
    document.getElementById("myIntro").classList.remove("w3-show-inline-block");
    document.getElementById("myTop").classList.remove("w3-card-4");
  }
}

// Accordions
function myAccordion(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme", "");
  }
}
</script>

<meta charset=" utf-8">
<style type="text/css">

  body{

    margin:0;

    padding:0 0 12px 0;

    background:#fff;

  }

  form, ul, p, h1, h2, h3, h4, h5, h6{

    margin:0;

    padding:0;

  }



  ul, li{list-style-type:none;}

  a{

    text-decoration:none;

  }


  .menu{

    overflow:hidden;

    border-color:#C4D5DF;

    border-style:solid;

    border-width:0 1px 1px;

  }

  .menu li.level1 a{

    display:block;

    height:28px;

    line-height:28px;

    background:#EBF3F8;

    font-weight:700;

    text-indent:14px;

    border-top:1px solid #C4D5DF;

  }

  .menu li.level1 a:hover{

    text-decoration:none;

  }

  .menu li.level1 a.current{

    background:#B1D7EF;

  }

  

  .menu li ul{

    overflow:hidden;

  }

  .menu li ul.level2{

    display:none;

  }

  .menu li ul.level2 li a{

    display:block;

    height:28px;

    line-height:28px;

    background:#ffffff;

    font-weight:400;

    color:#42556B;

    text-indent:18px;

    border-top:0px solid #ffffff;

    overflow:hidden;

  }

</style>
<script type="text/javascript">

  $(document).ready(function(){

    $(".level1 > a").click(function(){

      $(this).addClass("current") 

      .next().show() 

      .parent().siblings().children("a").removeClass("current")

      .next().hide(); 

      return false;

    }); 

  });

</script>
</body></html>