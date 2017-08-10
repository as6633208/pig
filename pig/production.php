<!DOCTYPE html>
<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html"; >
  <meta charset="UTF-8">
  <title>生產資訊</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/w3-theme-teal.css">
 <link rel="stylesheet" href="./css//w3.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/hot-sneaks/jquery-ui.css" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
  <link href='./jquery/jquery-ui-timepicker-addon.css' rel='stylesheet'>
  <script type="text/javascript" src="./jquery/jquery-ui-timepicker-addon.js"></script>
  <script type='text/javascript' src='./jquery/jquery-ui-sliderAccess.js'></script>
  <style>

  </style>
  <style>

    .w3-sidenav a {padding:16px;font-weight:bold}

  </style>
  <script language="JavaScript">
    $(document).ready(function(){ 
      $.datepicker.regional['zh-TW']={
        dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
        dayNamesMin:["日","一","二","三","四","五","六"],
        monthNames:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
        monthNamesShort:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
        prevText:"上月",
        nextText:"次月",
        weekHeader:"週"
      };

      $.datepicker.setDefaults($.datepicker.regional["zh-TW"]);
      $.timepicker.setDefaults($.timepicker.regional["zh-TW"]);
      $("#datetimepicker1").datetimepicker({dateFormat:"yy-mm-dd",
        showSecond:false
      });
    });
  </script>
  <script language="JavaScript">
    $(document).ready(function(){ 
      $.datepicker.regional['zh-TW']={
        dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
        dayNamesMin:["日","一","二","三","四","五","六"],
        monthNames:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
        monthNamesShort:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
        prevText:"上月",
        nextText:"次月",
        weekHeader:"週"
      };
      
      $.datepicker.setDefaults($.datepicker.regional["zh-TW"]);
      $.timepicker.setDefaults($.timepicker.regional["zh-TW"]);
      $("#datetimepicker2").datetimepicker({dateFormat:"yy-mm-dd"
    });
    });
  </script>
  <?php include("connect.php"); ?>
</head>


<body>
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
    <span id="myIntro" class="w3-hide">生產資訊</span>
  </div>
  <div class="w3-container w3-padding-32" style="padding-left:32px">
    <hr>
    <br>
    <h2>生產新增</h2>
    <br>
    <hr>
    
    <div class="w3-container w3-sand w3-padding-32"  style="padding-left:1%">
      <form action="insert.php?id=7" method="post">
       <p>母豬編號：　<input class="w3-input w3-border w3-round-large" name="t3"></input></p>
       <p>生產日期：　<input class="w3-input w3-border w3-round-large" type="date" name="t2"></input></p>
       <p>交配日期：　<input class="w3-input w3-border w3-round-large" type="date" name="t1"></input></p>
       <p>公豬編號：　<input class="w3-input w3-border w3-round-large" name="t4"></input></p>
       <p>母豬第幾胎：　<input class="w3-input w3-border w3-round-large" name="t5"></input></p>
       <p>小豬總數：　<input class="w3-input w3-border w3-round-large" name="t6"></input></p>
       <p>小豬活仔數：　<input class="w3-input w3-border w3-round-large" name="t7"></input></p>
       <p>小豬死仔數：　<input class="w3-input w3-border w3-round-large" name="t8"></input></p>
       <p>小豬離乳仔數：　<input class="w3-input w3-border w3-round-large" name="t9"></input></p>
       <p>小豬總重：　<input class="w3-input w3-border w3-round-large" name="t10"></input></p>
       <p>小豬離乳總重：　<input class="w3-input w3-border w3-round-large" name="t11"></input></p>
       <p>平均小豬重量：　<input class="w3-input w3-border w3-round-large" name="t12"></input></p>
       <p>平均小豬離乳重量：　<input class="w3-input w3-border w3-round-large" name="t13"></input></p>
       <p>備註欄：　<input class="w3-input w3-border w3-round-large" name="t14"></input></p>
       <input class="w3-btn w3-red w3-col s12 m12" id="insertbtn" type="submit" value="送出">
     </form>
   </div>

   
   <hr>
   <br>
 </div>
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


</body></html>