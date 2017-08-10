<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html"; >
  <meta charset="UTF-8">
  <title>生活日誌</title>
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
      $.timepicker.regional['zh-TW']={
        timeOnlyTitle:"選擇時分秒",
        timeText:"時間",
        hourText:"時",
        minuteText:"分",
        timezoneText:"時區",
        currentText:"現在時間",
        closeText:"確定",
        amNames:["上午","AM","A"],
        pmNames:["下午","PM","P"]
      };
      $.datepicker.setDefaults($.datepicker.regional["zh-TW"]);
      $.timepicker.setDefaults($.timepicker.regional["zh-TW"]);
      $("#datetimepicker1").datetimepicker({dateFormat:"yy-mm-dd",
        timeFormat:"HH:mm", 
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
      $.timepicker.regional['zh-TW']={
        timeOnlyTitle:"選擇時分秒",
        timeText:"時間",
        hourText:"時",
        minuteText:"分",
        timezoneText:"時區",
        currentText:"現在時間",
        closeText:"確定",
        amNames:["上午","AM","A"],
        pmNames:["下午","PM","P"]
      };
      $.datepicker.setDefaults($.datepicker.regional["zh-TW"]);
      $.timepicker.setDefaults($.timepicker.regional["zh-TW"]);
      $("#datetimepicker2").datetimepicker({dateFormat:"yy-mm-dd",
        timeFormat:"HH:mm", 
        showSecond:false
      });
    });
  </script>

  <script type="text/javascript">
   window.onload = function () {
    var slet1 = document.getElementById('slet1');
    var inp1 = document.getElementById('inp1');
	   var slet2 = document.getElementById('slet2');
    var inp2 = document.getElementById('inp2');
	   var slet3 = document.getElementById('slet3');
    var inp3 = document.getElementById('inp3');
	   var slet4 = document.getElementById('slet4');
    var inp4 = document.getElementById('inp4');
	   var slet5 = document.getElementById('slet5');
    var inp5 = document.getElementById('inp5');
	   var slet6 = document.getElementById('slet6');
    var inp6 = document.getElementById('inp6');
	

      slet1.onchange =  function () {
       inp1.value = slet1.value ;
      }
	   slet2.onchange =  function () {
       inp2.value = slet2.value ;

      }
	   slet3.onchange =  function () {
       inp3.value = slet3.value ;

      }
	   slet4.onchange =  function () {
       inp4.value = slet4.value ;

      }
	   slet5.onchange =  function () {
       inp5.value = slet5.value ;

      }
	   slet6.onchange =  function () {
       inp6.value = slet6.value ;

      }
  }
</script>
<style>
  .mySlides {
   display: none
 }
 .w3-sidenav a {
   padding: 16px;
   font-weight: bold
 }
</style>
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
      <div id="myTop" class="w3-top w3-container w3-padding-16 w3-theme w3-large"> <i class="fa fa-bars w3-opennav w3-hide-large w3-xlarge w3-margin-left w3-margin-right" onclick="w3_open()"></i> <span id="myIntro" class="w3-hide">生活日誌</span> </div>
      <div class="w3-container w3-padding-32" style="padding-left:32px">
        <hr>
        <br>
        <h2>生活日誌</h2>
        <br>
        <hr>
        <div class="w3-center" style="padding-bottom:32px">
          <button class="w3-btn demo" onclick="currentDiv(1)">餵養紀錄</button>
          <button class="w3-btn demo" style="display:none"  onclick="currentDiv(2)">用藥紀錄</button>
          <button class="w3-btn demo"  onclick="currentDiv(3)">疫苗施打</button>
          <button class="w3-btn demo"  onclick="currentDiv(4)">交配紀錄</button>
          <button class="w3-btn demo"  onclick="currentDiv(5)">生長資訊</button>
          <button class="w3-btn demo"  onclick="currentDiv(6)">其他紀錄</button>
        </div>
        <div class="w3-content" >
          <div class="mySlides  w3-animate-left" style="width:50%; margin:0px auto;"> 
            <form action="insert.php?id=11" method="post">
              <div class="w3-center"> 
               <p>豬隻編號：</p>
               <p><input id="inp1" type="text" name="t0" class="w3-left w3-input w3-border" style="width:80%" value="<?php echo $_GET[Pig_ID];?>"></input>
                 <select id="slet1" class="w3-select w3-border" style="width:20%" name="option">
                 <?php
                   $sql_basic = "SELECT * FROM `pig_basic_information`";
                   $result_basic = mysql_query($sql_basic);
                   while($row_basic = mysql_fetch_array($result_basic)){
                    ?>
                    <option value="<?php echo $row_basic['Pig_ID']; ?>"><?php echo $row_basic['Pig_ID']; ?></option>
                    <?php } ?>
                  </select></p>  
                  <p>　</p>
                  <p>餵養種類：<input name="t1" class="w3-input w3-border" ></input></p>
                  <p>餵養量：<input name="t2"  class="w3-input w3-border"  type="number"step=0.01></input></p>
                  <p>餵養時間：<input name="t3" id="datetimepicker1"  class="w3-input w3-border"  ></input></p>
                  <p>餵水量：<input name="t4"  class="w3-input w3-border" type="number"step=0.01></input></p>
                  <button class="w3-btn w3-center w3-green w3-col s12 m12" type="submit">送出</button>
                </div>
              </form>
            </div>
            <div class="mySlides  w3-animate-left"  style="width:50%; margin:0px auto;">
              <div class="w3-center">
                <form action="insert.php?id=12" method="post">
                  <p>豬隻編號：</p>
               <p><input id="inp2" type="text" name="t0" class="w3-left w3-input w3-border" style="width:80%" value="<?php echo $_GET[Pig_ID];?>"></input>
                 <select id="slet2" class="w3-select w3-border" style="width:20%" name="option">
                 <?php
                   $sql_basic = "SELECT * FROM `pig_basic_information`";
                   $result_basic = mysql_query($sql_basic);
                   while($row_basic = mysql_fetch_array($result_basic)){
                    ?>
                    <option value="<?php echo $row_basic['Pig_ID']; ?>"><?php echo $row_basic['Pig_ID']; ?></option>
                    <?php } ?>
                  </select></p>  
                  <p>　</p>
                  <p>藥品種類：<input name="t1" class="w3-input w3-border" ></input></p>
                  <p>藥品數量：<input name="t2" class="w3-input w3-border" ></input></p>
                  <p>餵藥頻率：<input name="t3"class="w3-input w3-border"  ></input></p>
                  <button class="w3-btn w3-col s12 m12" type="submit">送出</button>
                </form>
              </div>		
            </div>
            <div class="mySlides  w3-animate-left" style="width:50%; margin:0px auto;">  
              <div class="w3-center">
                <form action="insert.php?id=13" method="post">
                  <p>豬隻編號：</p>
               <p><input id="inp3" type="text" name="t0" class="w3-left w3-input w3-border" style="width:80%" value="<?php echo $_GET[Pig_ID];?>"></input>
                 <select id="slet3" class="w3-select w3-border" style="width:20%" name="option">
                 <?php
                   $sql_basic = "SELECT * FROM `pig_basic_information`";
                   $result_basic = mysql_query($sql_basic);
                   while($row_basic = mysql_fetch_array($result_basic)){
                    ?>
                    <option value="<?php echo $row_basic['Pig_ID']; ?>"><?php echo $row_basic['Pig_ID']; ?></option>
                    <?php } ?>
                  </select></p>  
                  <p>　</p>
				  <p>豬隻編號：<input type="text" name="t0"  class="w3-input w3-border"  value="<?php echo $_GET[Pig_ID];?>"></p>
                  <p>疫苗名稱：
				  <select class="w3-select w3-border" style="width:100%" name="t1">
				   <?php
                   $sql_basic = "SELECT * FROM `vaccine`";
                   $result_basic = mysql_query($sql_basic);
                   while($row_basic = mysql_fetch_array($result_basic)){
                    ?>
                    <option value="<?php echo $row_basic['ID']; ?>"><?php echo $row_basic['Vaccine_Name']; ?></option>
                    <?php } ?>				  
				  </select></p>
                  <p>施打疫苗日期：<input name="t2"type="date" class="w3-input w3-border"></input></p>
                  <button class="w3-btn w3-center w3-green w3-col s12 m12" type="submit">送出</button>
                </form>
              </div>
            </div>
            <div class="mySlides  w3-animate-left"style="width:50%; margin:0px auto;">  
              <div class="w3-center">
                <form action="insert.php?id=14" method="post">
				<p>母豬編號：</p>
               <p><input id="inp4" type="text" name="t0" class="w3-left w3-input w3-border" style="width:80%" value="<?php echo $_GET[Pig_ID];?>"></input>
                 <select id="slet4" class="w3-select w3-border" style="width:20%" name="option">
                 <?php
                   $sql_basic = "SELECT * FROM `pig_basic_information`";
                   $result_basic = mysql_query($sql_basic);
                   while($row_basic = mysql_fetch_array($result_basic)){
                    ?>
                    <option value="<?php echo $row_basic['Pig_ID']; ?>"><?php echo $row_basic['Pig_ID']; ?></option>
                    <?php } ?>
                  </select></p>  
                  <p>　</p>
                  <p>配種日期：<input name="t1" id="datetimepicker2" type="text"  class="w3-input w3-border" ></input></p>
                  <p>公豬編號：<input name="t2" class="w3-input w3-border" ></input></p>
                  <p>精液冷凍天數:<input name="t3" class="w3-input w3-border"type="number"step=0.01 ></input></p>
                  <p>母豬發情等級:<input name="t4" class="w3-input w3-border"type="number"step=0.01 ></input></p>
                  <button class="w3-btn w3-center w3-green w3-col s12 m12" type="submit">送出</button>
                </form>
              </div>
            </div>
            <div class="mySlides  w3-animate-left" style="width:50%; margin:0px auto;"> 
              <div class="w3-center">
                <form action="insert.php?id=15" method="post">
                 <p>豬隻編號：</p>
               <p><input id="inp5" type="text" name="t0" class="w3-left w3-input w3-border" style="width:80%" value="<?php echo $_GET[Pig_ID];?>"></input>
                 <select id="slet5" class="w3-select w3-border" style="width:20%" name="option">
                 <?php
                   $sql_basic = "SELECT * FROM `pig_basic_information`";
                   $result_basic = mysql_query($sql_basic);
                   while($row_basic = mysql_fetch_array($result_basic)){
                    ?>
                    <option value="<?php echo $row_basic['Pig_ID']; ?>"><?php echo $row_basic['Pig_ID']; ?></option>
                    <?php } ?>
                  </select></p>  
                  <p>　</p>
                 <p>紀錄時間：<input name="t1"class="w3-input w3-border"  type="date" class="w3-input"></input></p>
                 <p>體重：<input name="t2"  class="w3-input w3-border" type="number"step=0.01></input></p>
                 <p>體型：<input name="t3"  class="w3-input w3-border" type="number"step=0.01></input></p>
                 <button class="w3-btn w3-center w3-green w3-col s12 m12" type="submit">送出</button>
               </form>
             </div>
           </div>
           <div class="mySlides  w3-animate-left" style="width:50%; margin:0px auto;"> 
            <div class="w3-center">
              <form action="insert.php?id=16" method="post">
               <p>豬隻編號：</p>
               <p><input id="inp6" type="text" name="t0" class="w3-left w3-input w3-border" style="width:80%" value="<?php echo $_GET[Pig_ID];?>"></input>
                 <select id="slet6" class="w3-select w3-border" style="width:20%" name="option">
                 <?php
                   $sql_basic = "SELECT * FROM `pig_basic_information`";
                   $result_basic = mysql_query($sql_basic);
                   while($row_basic = mysql_fetch_array($result_basic)){
                    ?>
                    <option value="<?php echo $row_basic['Pig_ID']; ?>"><?php echo $row_basic['Pig_ID']; ?></option>
                    <?php } ?>
                  </select></p>  
                  <p>　</p>
               <p>紀錄時間：<input name="t1" type="date" class="w3-input w3-border" ></input></p>
               <p>紀錄名稱：
			   <select  class="w3-select w3-border" style="width:100%" name="t2">
				   <?php
                   $sql_basic = "SELECT * FROM `other_record_list`";
                   $result_basic = mysql_query($sql_basic);
                   while($row_basic = mysql_fetch_array($result_basic)){
                    ?>
                    <option value="<?php echo $row_basic['ID']; ?>"><?php echo $row_basic['Other_Record_Name']; ?></option>
                    <?php } ?>				  
				  </select></p>
               <button class="w3-btn w3-center w3-green w3-col s12 m12" type="submit">送出</button>
             </form>
           </div>
         </div>
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
          if (n > x.length) {slideIndex = 1}
            if (n < 1) {slideIndex = x.length}
              for (i = 0; i < x.length; i++) {
               x[i].style.display = "none";
             }
             for (i = 0; i < dots.length; i++) {
               dots[i].className = dots[i].className.replace(" w3-red", "");
             }
             x[slideIndex-1].style.display = "block";
             dots[slideIndex-1].className += " w3-red";
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
</body>
</html>