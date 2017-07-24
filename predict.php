<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html"; >
  <meta charset="UTF-8">
  <title>指數預測</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/w3-theme-teal.css">
  <link rel="stylesheet" href="./css//w3.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <script src="jquery/jquery-1.8.3.min.js"></script>
  <style type="text/css">
  .rwd-table {
     background: #fff;
     overflow: hidden;
   }

   .rwd-table tr:nth-of-type(2n){
    background: #eee;
  }
  .rwd-table th, 
  .rwd-table td {
    margin: 0.5em 1em;
  }
  .rwd-table {
    min-width: 100%;
  }

  .rwd-table th {
    display: none;
  }

  .rwd-table td {
    display: block;
  }

  .rwd-table td:before {
    content: attr(data-th) " : ";
    font-weight: bold;
    width: 6.5em;
    display: inline-block;
  }

  .rwd-table th, .rwd-table td {
    text-align: left;
  }

  .rwd-table th, .rwd-table td:before {
    color: #D20B2A;
    font-weight: bold;
  }

  @media (min-width: 480px) {
    .rwd-table td:before {
      display: none;
    }
    .rwd-table th, .rwd-table td {
      display: table-cell;
      padding: 0.25em 0.5em;
    }
    .rwd-table th:first-child, 
    .rwd-table td:first-child {
      padding-left: 0;
    }
    .rwd-table th:last-child, 
    .rwd-table td:last-child {
      padding-right: 0;
    }
    .rwd-table th, 
    .rwd-table td {
      padding: 1em !important;
    }
  }
  .w3-sidenav a {padding:16px;font-weight:bold}
</style>

<?php 
include("connect.php");
?>
</head>

<body onload="currentDiv(0)">
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
    <span id="myIntro" class="w3-hide">指數預測</span>
  </div>
  <div style="padding-top:32px;padding-Left:32px">
   <hr>
   <br>
   <h2>指數預測</h2>
   <br>
   <hr>
   <p style="padding-left:10px">可透過母豬編號進行篩選</p>
   <div class="w3-center" style="padding-bottom:32px">
      <button class="w3-btn w3-border w3-col s12 m4 w3-center w3-black predict" onclick="currentDiv(0)">SPI</button>
      <button class="w3-btn w3-border w3-col s12 m4 w3-center w3-black predict" onclick="currentDiv(1)">MPSP</button>
      <button class="w3-btn w3-border w3-col s12 m4 w3-center w3-black predict" onclick="currentDiv(2)">BVSP</button>
    </div>
    <iframe src="chart.php?chart=0" width="100%" height="320px" frameborder="0" style="margin-top:10px;" id="chart"></iframe>
    <hr>
    <form action="predict.php" method="post">
    <select id="slet1" class="w3-select w3-border w3-round-large" name="option" onchange="location.href='predict.php?value='+this.value">
      <option value="0" <?php if(!isset($_REQUEST['value'])){ echo "SELECTED"; } ?>>請選擇編號</option>
      <?php
        $sql_basic = "SELECT DISTINCT `Sow_ID` FROM `birth_record` ORDER BY `Sow_ID` ASC";
        $result_basic = mysql_query($sql_basic);
        while($row_basic = mysql_fetch_array($result_basic))
        {
          echo "<option value=".$row_basic['Sow_ID']." ";
          if(isset($_REQUEST['value']) && $_REQUEST['value']==$row_basic['Sow_ID'])
          { 
            echo "SELECTED"; 
          }
          echo ">".$row_basic['Sow_ID']."</option>";
        } 
      ?>
    </select>
    <div class="w3-container w3-sand w3-padding-32">
      <div class="w3-col s12 m12">
        <table class="rwd-table" id="store">

          <tr>
            <th  class="w3-blue" align="center">母豬編號</th>
            <th  class="w3-blue" align="center">交配日期</th>
            <th  class="w3-blue" align="center">生產日期</th>
            <th  class="w3-blue" align="center">生產胎次</th>
            <th  class="w3-blue" align="center">SPI</th>
            <th  class="w3-blue" align="center">MPSP</th>
            <th  class="w3-blue" align="center">BVSP</th>
          </tr>
        </div>

     <?php
        $sql_basic = "SELECT * FROM `birth_record` ";
        if(isset($_REQUEST['value'])){
          $sql_basic .= "WHERE `Sow_ID` = '".$_REQUEST['value']."' ";
        }
        $sql_basic .= "ORDER BY `Numbers_Of_Fetus` DESC, `Birth_Date` DESC";
        $result_basic = mysql_query($sql_basic);
        while($row_basic = mysql_fetch_array($result_basic)){
          ?>
          <tr>
            <td data-th="母豬編號" align="center"><a href="#" onclick="window.open('information.php?Sow_ID=<?php echo $row_basic['Sow_ID']; ?>', '');"><?php echo $row_basic['Sow_ID'];?></a></td>
            <td data-th="交配日期" align="center"><?php echo $row_basic['Mating_Date'];?></td>
            <td data-th="生產日期" align="center"><?php echo $row_basic['Birth_Date'];?></a></td>
            <td data-th="生產胎次" align="center"><?php echo $row_basic['Numbers_Of_Fetus'];?></a></td>
            <td data-th="SPI" align="center"><?php echo $row_basic['SPI'];?></td>
            <td data-th="MPSP" align="center"><?php echo $row_basic['MPSP'];?></td>
            <td data-th="BVSP" align="center"><?php echo $row_basic['BVSP'];?></td>
          </tr>
       <?php }?>
        </table>
      </div>
    </div>
    <hr>
    <br>
  </div>
  </form>
</div>
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
<script>
  var a = 0;
  currentDiv(a);
  function currentDiv(obj){
    var predict = document.getElementsByClassName("predict");
    var chart = document.getElementById("chart");
    chart.src="chart.php?chart="+obj;
    for (var i = 0; i < predict.length; i++) {
      if (i==obj) {
        //chart[i].style.display = "";
        //chart.src="chart2.php?chart="+i;
        predict[i].className = predict[i].className.replace(" w3-black", " w3-blue");
      }else{
        //chart[i].style.display = "none";
        
        predict[i].className = predict[i].className.replace(" w3-blue", " w3-black");

      }
    }
  }
  </script>
</body>

</html>