<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html"; >
  <meta charset="UTF-8">
  <title>豬隻清單</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/w3-theme-teal.css">
  <link rel="stylesheet" href="./css//w3.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <script src="jquery/jquery-1.8.3.min.js"></script>
  <link rel="stylesheet" href="css/flexslider.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script src="js/jquery.flexslider.js"></script>
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

<script type="text/javascript">
function onSearch(obj){//js函数开始
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

function onSearch1(obj){//js函数开始
  setTimeout(function(){//因为是即时查询，需要用setTimeout进行延迟，让值写入到input内，再读取
    var storeId = document.getElementById('store1');//获取table的id标识
    var rowsLength = storeId.rows.length;//表格总共有多少行
    var key1 = obj.value;//获取输入框的值
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
    <span id="myIntro" class="w3-hide">豬隻清單</span>
  </div>
  <div style="padding-top:32px;padding-Left:32px">

    <hr>
    <br>
    <h2 >豬隻清單</h2>
    <br>
    <hr>
    <button class="w3-btn demo" onclick="currentDiv(1)">正常豬隻清單</button>
    <button class="w3-btn demo" onclick="currentDiv(2)">淘汰豬隻清單</button>
    <p style="padding-left:32px">可輸入編號進行篩選</p>


    <div class="mySlides  w3-animate-left">
      <input  class="w3-input w3-border w3-round-large" name="key" type="text" id="key" onkeydown="onSearch(this)" value="" />

      <div class="w3-container w3-sand w3-padding-32">
        <div class="w3-col s12 m12">
          <table class="rwd-table w3-hoverable" id="store" style="table-layout:fixed">

            <tr>
              <th  class="w3-blue" align="center">豬隻編號</th>
              <th  class="w3-blue" align="center">出生日期</th>
              <th  class="w3-blue" align="center">首次配種</th>
              <th  class="w3-blue" align="center">父親編號</th>
              <th  class="w3-blue" align="center">母親編號</th>
              <th  class="w3-blue" align="center">出生胎次</th>
              <th  class="w3-blue" align="center">同胎活仔數</th>
              <th  class="w3-blue" align="center">離乳後異常</th>

            </tr>
            <?php

            $sql_basic1 = "SELECT * FROM `pig_basic_information` where `Eliminate_Date` IS NULL";
            $result_basic1 = mysql_query($sql_basic1);
            while($row_basic1 = mysql_fetch_array($result_basic1)){
              ?>
              <tr>
                <td data-th="豬隻編號" align="center"><a href="information.php?Pig_ID=<?php echo $row_basic1['Pig_ID']; ?>"><?php echo $row_basic1['Pig_ID'];?></a></td>
                <td data-th="出生日期" align="center"><?php echo $row_basic1['Birthday'];?></td>
                <td data-th="首次配種" align="center"><?php echo $row_basic1['First_Time_Mating'];?></td>
                <td data-th="父親編號" align="center"><a href="information.php?Pig_ID=<?php echo $row_basic1['Father_Id']; ?>"><?php echo $row_basic1['Father_Id'];?></a></td>
                <td data-th="母親編號" align="center"><a href="information.php?Pig_ID=<?php echo $row_basic1['Mother_Id']; ?>"><?php echo $row_basic1['Mother_Id'];?></a></td>
                <td data-th="出生胎次" align="center"><?php echo $row_basic1['Numbers_Of_Mother_Fetus'];?></td>
                <td data-th="同胎活仔數" align="center"><?php echo $row_basic1['Numbers_Of_Brothers_And_Sisters_Alive'];?></td>
                <td data-th="離乳後異常" align="center"><?php echo $row_basic1['Brothers_And_Sisters_Wean_Information'];?></td>
              </tr>
              <?php }?>
            </table>
          </div>
        </div>
        <hr>
        <br>
      </div>
    </div>

    <div class="mySlides  w3-animate-left">
      <input  class="w3-input w3-border w3-round-large" name="key1" type="text" id="key1" onkeydown="onSearch1(this)" value="" />

      <div class="w3-container w3-sand w3-padding-32">
        <div class="w3-col s12 m12">
          <table class="rwd-table w3-hoverable" id="store1" style="table-layout:fixed">

            <tr>
              <th  class="w3-blue" align="center">豬隻編號</th>
              <th  class="w3-blue" align="center">出生日期</th>
              <th  class="w3-blue" align="center">首次配種</th>
              <th  class="w3-blue" align="center">父親編號</th>
              <th  class="w3-blue" align="center">母親編號</th>
              <th  class="w3-blue" align="center">出生胎次</th>
              <th  class="w3-blue" align="center">同胎活仔數</th>
              <th  class="w3-blue" align="center">離乳後異常</th>
              <th  class="w3-blue" align="center">淘汰日期</th>

            </tr>
            <?php

            $sql_basic = "SELECT * FROM `pig_basic_information` where `Eliminate_Date` IS NOT NULL";
            $result_basic = mysql_query($sql_basic);
            while($row_basic = mysql_fetch_array($result_basic)){
              ?>
              <tr>
                <td data-th="豬隻編號" align="center"><a href="information.php?Pig_ID=<?php echo $row_basic['Pig_ID']; ?>"><?php echo $row_basic['Pig_ID'];?></a></td>
                <td data-th="出生日期" align="center"><?php echo $row_basic['Birthday'];?></td>
                <td data-th="首次配種" align="center"><?php echo $row_basic['First_Time_Mating'];?></td>
                <td data-th="父親編號" align="center"><a href="information.php?Pig_ID=<?php echo $row_basic['Father_Id']; ?>"><?php echo $row_basic['Father_Id'];?></a></td>
                <td data-th="母親編號" align="center"><a href="information.php?Pig_ID=<?php echo $row_basic['Mother_Id']; ?>"><?php echo $row_basic['Mother_Id'];?></a></td>
                <td data-th="出生胎次" align="center"><?php echo $row_basic['Numbers_Of_Mother_Fetus'];?></td>
                <td data-th="同胎活仔數" align="center"><?php echo $row_basic['Numbers_Of_Brothers_And_Sisters_Alive'];?></td>
                <td data-th="離乳後異常" align="center"><?php echo $row_basic['Brothers_And_Sisters_Wean_Information'];?></td>
                 <td data-th="淘汰日期" align="center"><?php echo $row_basic['Eliminate_Date'];?></td>
              </tr>
              <?php }?>
            </table>
          </div>
        </div>
        <hr>
        <br>
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