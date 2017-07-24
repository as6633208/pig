<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html"; >
  <meta charset="UTF-8">
  <title>豬隻新增</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/w3-theme-teal.css">
  <link rel="stylesheet" href="./css//w3.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">



  <style>
    .mySlides {display:none}
    .w3-sidenav a {padding:16px;font-weight:bold}
  </style>
  <script type="text/javascript"> 
    function pigimg() 
    { 
      var board = document.getElementById("s1").value; 
      if(board == ''){
        alert("請先輸入豬隻編號");
      }else{
        window.open('pigimg.php?Pig_ID='+board, 'pigupload', config='height=500,width=500');
      }
    } 
  </script>
  <?php 
  include("connect.php");
  ?>
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
    <span id="myIntro" class="w3-hide">豬隻新增</span>
  </div>



  <div style="padding-top:32px;padding-Left:32px">
    <hr>
    <br>
    <h2 >豬隻新增</h2>
    <br>
    <hr>
    <div class="w3-center" style="padding-bottom:32px">
      <button class="w3-btn demo w3-border w3-col s3 m3 w3-center" onclick="currentDiv(1)">基本資訊</button>
      <button class="w3-btn demo w3-border w3-col s3 m3 w3-center" onclick="currentDiv(2)">豬隻評語</button>
      <button class="w3-btn demo w3-border w3-col s3 m3 w3-center" onclick="currentDiv(3)">血緣資訊</button>
      <button class="w3-btn demo w3-border w3-col s3 m3 w3-center" onclick="pigimg()">上傳照片</button>
    </div>
    <div class="w3-content" >
     <form  action="insert_information.php" method="post">
      <p>豬隻編號：　<input class="w3-input w3-border w3-round-large" name="s1" id="s1" value="" type="text"></input></p>
      <div class="mySlides  w3-animate-left" style="width:100%">
       <div>
         <p>豬隻性別： <select  name="s2" id="s2" class="w3-select w3-border w3-round-large">
           <option value="母">母</option>
           <option value="公">公</option>
         </select></p>
         <p>出生日期：<input name="s3" id="s3" class="w3-input w3-border w3-round-large" type="date"></input></p>
         <p>出生胎次：<input name="s4" id="s4" class="w3-input w3-border w3-round-large" type=number</input></p>
         <p>同胎出生頭數：<input name="s5" id="s5" class="w3-input w3-border w3-round-large" type="number"></input></p>
         <p>同胎活仔頭數：<input name="s6" id="s6" class="w3-input w3-border w3-round-large" type="number"></input></p>
         <p>同胎離乳狀況：<input name="s7" id="s7" class="w3-input w3-border w3-round-large"></input></p>
         <p>首次配種日期：<input name="s8" id="s8" class="w3-input w3-border w3-round-large" type="date"></input></p>
         <p>出生至首次配種天數:<input name="s9" id="s9" class="w3-input w3-border w3-round-large" type="number"></input></p>
       </div>
     </div>
     <div class="mySlides  w3-animate-left" style="width:100%">
      <div>

        <p>身軀等級： <select  name="s10" id="s10" class="w3-select w3-border w3-round-large">
          <option value="請選擇">請選擇</option>
          <option value="上">上</option>
          <option value="中上">中上</option>
          <option value="中">中</option>
          <option value="中下">中下</option>
          <option value="下">下</option>
        </select></p>
        <p>身軀評語：<input name="s11" id="s11" class="w3-input w3-border w3-round-large"></p>
        <p>前胛等級： <select name="s12" id="s12"  class="w3-select w3-border w3-round-large">
          <option value="請選擇">請選擇</option>
          <option value="上">上</option>
          <option value="中上">中上</option>
          <option value="中">中</option>
          <option value="中下">中下</option>
          <option value="下">下</option>
        </select></p>
        <p>前胛評語：<input name="s13" id="s13" class="w3-input w3-border w3-round-large"></p>
        <p>後臂等級： <select name="s14" id="s14" class="w3-select w3-border w3-round-large">
          <option value="請選擇">請選擇</option>
          <option value="上">上</option>
          <option value="中上">中上</option>
          <option value="中">中</option>
          <option value="中下">中下</option>
          <option value="下">下</option>
        </select></p>
        <p>後臂評語：<input name="s15" id="s15" class="w3-input w3-border w3-round-large"></p>
        <p>總體等級：<select name="s16" id="s16" class="w3-select w3-border w3-round-large">
          <option value="請選擇">請選擇</option>
          <option value="上">上</option>
          <option value="中上">中上</option>
          <option value="中">中</option>
          <option value="中下">中下</option>
          <option value="下">下</option>
        </select></p>
        <p>總體評語：<input name="s17" id="s17" class="w3-input w3-border w3-round-large"></p>
      </div>
    </div>
    <div class="mySlides  w3-animate-left" style="width:100%">
      <div>
       <p>父親編號:<input name="s18" id="s18" class="w3-input w3-border w3-round-large"></p>
       <p>母親編號:<input name="s19" id="s19" class="w3-input w3-border w3-round-large"></p>
       <p>祖父編號:<input name="s20" id="s20" class="w3-input w3-border w3-round-large"></p>
       <p>祖母編號:<input name="s21" id="s21" class="w3-input w3-border w3-round-large"></p>
       <p>曾祖父編號:<input name="s22" id="s22" class="w3-input w3-border w3-round-large"></p>
       <p>曾祖母編號:<input name="s23" id="s23" class="w3-input w3-border w3-round-large"></p>
     </div>
   </div>
   <button class="w3-btn w3-green w3-col s12 m12 w3-center" type="submit">送出</button>
 </form>
</div>


<script>
  var slideIndex = 1;
  showDivs(slideIndex);

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
    if (n > x.length) {
      slideIndex = 1
    }
    if (n < 1) {
      slideIndex = x.length
    }
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" w3-blue", "");
    }
    x[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " w3-blue";
  }
</script>

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