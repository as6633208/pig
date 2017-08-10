<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html"; >
  <meta charset="UTF-8">
  <title>首頁</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/w3-theme-teal.css">
  <link rel="stylesheet" href="./css//w3.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <script src="jquery/jquery-1.8.3.min.js"></script>
  <link rel="stylesheet" href="css/flexslider.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script src="js/jquery.flexslider.js"></script>

  <style>
    .w3-sidenav a {padding:16px;font-weight:bold}

  </style>
</head><body>


  <nav class="w3-sidenav w3-collapse w3-white w3-animate-left w3-card-2" style="z-index:5;width:250px;" id="mySidenav">
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

  <div id="myTop" class="w3-top w3-container w3-padding-16 w3-theme w3-large" style="z-index:4">
    <i class="fa fa-bars w3-opennav w3-hide-large w3-xlarge w3-margin-left w3-margin-right" onclick="w3_open()"></i>
    <span id="myIntro" class="w3-hide">首頁</span>
  </div>

  


  <div class="w3-container w3-padding-32" style="padding-left:32px">

    <script type="text/javascript" charset="utf-8">
      $(window).load(function() {
        $('.flexslider').flexslider(
        {
       slideshowSpeed: 4000, //展示时间间隔ms
       animationSpeed: 400, //滚动时间ms

       touch: true //是否支持触屏滑动

     }
     );
      });
    </script>
   
    <div class="flexslider w3-hide-small w3-hide-medium" style="margin-top:0%;position: relative;z-index:3">
      <ul class="slides">
        <li>
        <img  src="img/home/p11.png" />
        </li>
        <li>
          <img  src="img/home/p12.png" />
        </li>
        <li>
          <img  src="img/home/p13.png" />
        </li>
        <li>
          <img  src="img/home/p14.png" />
        </li>
        <li>
          <img  src="img/home/p15.png" />
        </li>
        <li>
          <img  src="img/home/p16.png" />
        </li>
        <li>
          <img  src="img/home/p17.png" />
        </li>
        <li>
          <img  src="img/home/p18.png" />
        </li>
        <li>
          <img src="img/home/p19.png" />
        </li>
        <li>
          <img src="img/home/p20.png" />
        </li>
      </ul>
    </div>




    <div class="flexslider w3-hide-large " style="margin-top:10%;position: relative;z-index:3">

      <ul class="slides">
        <li>
          <img  src="img/home/p1.png" />
        </li>
        <li>
          <img  src="img/home/p2.png" />
        </li>
        <li>
          <img  src="img/home/p3.png" />
        </li>
        <li>
          <img  src="img/home/p4.png" />
        </li>
        <li>
          <img  src="img/home/p5.png" />
        </li>
        <li>
          <img  src="img/home/p6.png" />
        </li>
        <li>
          <img  src="img/home/p7.png" />
        </li>
        <li>
          <img  src="img/home/p8.png" />
        </li>
        <li>
          <img  src="img/home/p9.png" />
        </li>
        <li>
          <img  src="img/home/p10.png" />
        </li>
      </ul>
</div>

    <h2 style="font-family:DFKai-sb;0066FF">知豬網簡介</h2>
	<p style="font-family:DFKai-sb;font-size:18px;">本系統之目的為改善傳統養豬場的管理效率，經由導入資通訊技術，將以往紙本管理的方式改為電子化，並加上相關的分析方法，預測母豬未來的生產指數，以及利用權重排序分析母豬的優劣，提供養豬農作為淘汰時之參考，根據上述，本系統可分為以下功能：</p>
	
	<div class="" style="font-family:DFKai-sb;">	
	 <p style="color:#0066FF;font-size:20px">環境數據：</p>
	 <p style="font-size:15px;">本計畫將於實驗場域架設環境感測器，透過行動裝置可即時監控環境狀況，一旦發生異常，系統將會發出警示，以利排除異常狀況。</p><hr>
	 <p style="color:#0066FF;font-size:20px">豬隻基本資訊：</p>
	 <p style="font-size:15px;">透過掃描QR Code的方式對豬隻進行身分辨識，也可藉此查詢該豬隻的基本諮詢，如品種、年齡及性別等。</p><hr>
	 <p style="color:#0066FF;font-size:20px"> 生活日誌：</p>
	 <p style="font-size:15px;">提供電子化介面並搭配行動裝置，取代傳統的紙本記錄，以利改進以往養豬農日常管理的記錄方式。</p><hr>
	 <p style="color:#0066FF;font-size:20px">  母豬生產資訊：</p>
	 <p style="font-size:15px;">此功能為針對母豬生產時之相關資料進行設計，包含生產仔數、生產均重及發情次數等，藉由此資料可進行後續之相關分析。</p><hr>
	 <p style="color:#0066FF;font-size:20px">  母豬生產指數預測模組：</p>
	 <p style="font-size:15px;">此功能為預測母豬未來的生產指數，利用過去的歷史資料找出相關規則，並透過圖形化介面，幫助養豬農可一目瞭然其相關資訊。</p><hr>
	 <p style="color:#0066FF;font-size:20px"> 母豬淘汰決策模組：</p>
	 <p style="font-size:15px;">以往養豬農在決定豬隻汰換的決策時，僅能憑藉自身的經驗來進行判斷，為了改進此狀況，本系統提出一汰換決策建議，利用層級分析法(Analytic Hierarchy Process, AHP)進行多準則決策，提供母豬優劣排序，以利作為淘汰之參考。</p><hr>
	</div>
   


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