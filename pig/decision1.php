<?php 
include("connect.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html"; >
  <meta charset="UTF-8">
  <title>淘汰決策</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/w3-theme-teal.css">
  <link rel="stylesheet" href="./css//w3.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

  <style>
    .w3-sidenav a {padding:16px;font-weight:bold}

  </style>
  <script type="text/javascript"> 
    var check = false;
    function check_all(obj) 
    { 
        var checkboxs = document.getElementsByName(obj); 
        for(var i=0;i<checkboxs.length;i++){
          if(check){
            checkboxs[i].checked = false;
          }else{
            checkboxs[i].checked = true;
          }
        } 
        check = checkboxs[0].checked;
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
    <span id="myIntro" class="w3-hide">決策參數</span>
  </div>



  <div class="w3-container w3-padding-32" style="padding-left:32px">
    <hr>
    <br>
    <h2>決策參數</h2>
    <br>
    <hr>
  <p style="padding-left:32px">請選擇欲分析之決策參數</p>
  </div>
  <form  action="decision2.php" method="post">
  <div class="w3-container w3-sand w3-padding-32">
    <div class="w3-col s12 m12">
      <label class="w3-btn w3-blue w3-left" name="all" onclick="check_all('Sow[]')" />全部選取/取消全選</label>
      <table class="w3-table-all w3-xlarge" id="store">
        <?php
          $text = array("生產參數","母豬品種","母豬年齡","母豬胎次","生產仔數","生產均重","生產活仔數","重新發情次數","離乳育成重量","離乳小豬隻數","流產及死產次數");
          for($i=1;$i<11;$i++)
          {
            echo "<tr>";
            echo "<td align='center'><input class='w3-check' type='checkbox' name='Sow[]'' value='".$i."'><label>".$text[$i]."</label></td>";
            echo "</tr>";
          }
        ?>
      </table>
      <button class="w3-btn w3-blue w3-left" type="submit">下一步</button>
    </div>
  </div>
  </form>

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


</body></html>