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
  <link rel="stylesheet"  href="http://demos.jquerymobile.com/1.3.0-rc.1/css/themes/default/jquery.mobile-1.3.0-rc.1.css">
  <link rel="stylesheet" href="http://demos.jquerymobile.com/1.3.0-rc.1/docs/demos/_assets/css/jqm-demos.css">
  <link rel="shortcut icon" href="http://demos.jquerymobile.com/1.3.0-rc.1/docs/demos/_assets/favicon.ico">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400' rel='stylesheet' type='text/css'>



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


  <form action="production_query.php" method="post">
    <?php
    $key1 = $_POST[key1];
    $key2 = $_POST[key2];
     $ff = $_GET[more];
     $ff=$ff+10;
    ?>

    <div style="padding-top:32px;padding-Left:32px">
      <hr>
      <br>
      <h2>生產查詢</h2>
      <br>
      <hr>
      <p style="padding-left:32px">可輸入編號及日期進行查詢</p>
      
      <div class="w3-container w3-sand w3-padding-32"  style="padding-left:%">
        <p>母豬編號：</p>
        <p><input class="w3-input w3-border w3-round-large w3-center" name="key1" type="text" id="searchsowid" onkeyup="showHint(this.value)"></p>
        <p>生產日期：</p>
        <p><input class="w3-input w3-border w3-round-large w3-center" name="key2" type="date" id="searchdate" onkeydown="onSearch2(this)"></p>
      </div>
      
  </form>
      <input class="w3-btn w3-red w3-col s12 m12" id="btn" type="Submit" value="送出">
      <hr>

      <p>您查詢的母豬編號為:<?php echo $key1; ?></p>
      <p>您查詢的生產日期為:<?php echo $key2; ?></p>
      <h2>查詢紀錄</h2>
      <div id="store">
        <ul class="menu">
          <?php
        if($key1==null && $key2==null )
        {
          $sql_basic = "SELECT * FROM `birth_record` ORDER BY `Birth_Date` DESC limit $ff ";
        }
          elseif ($key1!=null && $key2==null) {
          $sql_basic = "SELECT * FROM `birth_record` where `Sow_ID` = '$key1' ORDER BY `Birth_Date` DESC";
        }
        else
        {
          $newString = split ('[/.-]', $key2);
          $newdate=$newString[0].'-'.$newString[1].'-'.$newString[2];
          $sql_basic = "SELECT * FROM `birth_record` where `Birth_Date`='$newdate' ORDER BY `Birth_Date` DESC";
        }
        $result_basic = mysql_query($sql_basic);
        while($row_basic = mysql_fetch_array($result_basic)){
          ?>

          <li class="level1"> 

            <a href="#none"><?php echo $row_basic['Birth_Date'];?></a>

            <ul class="level2">
              <form action="update_productuon.php" method="post">
              <li>母豬編號:<input  class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Sow_ID'];?>" disabled>
             <input style="display: none" name="Sow_ID" id="Sow_ID" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Sow_ID'];?>">
              <input style="display: none" name="ID" id="ID" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['ID'];?>"></li>
              <li>生產日期:<input name="Birth_Date" id="Birth_Date" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Birth_Date'];?>"></li>
              <li>交配日期:<input name="Mating_Date" id="Mating_Date" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Mating_Date'];?>"></li>
              <li>公豬編號:<input name="Boar_ID" id="Boar_ID" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Boar_ID'];?>"></li>
              <li>母豬第幾胎:<input name="Numbers_Of_Fetus" id="Numbers_Of_Fetus" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Numbers_Of_Fetus'];?>"></li>
              <li>小豬總數:<input name="Numbers_Of_Piggy_Total" id="Numbers_Of_Piggy_Total" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Numbers_Of_Piggy_Total'];?>"></li>
              <li>小豬活仔數:<input name="Numbers_Of_Piggy_Alive" id="Numbers_Of_Piggy_Alive" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Numbers_Of_Piggy_Alive'];?>"></li>
              <li>小豬死仔數:<input name="Numbers_Of_Piggy_Dead" id="Numbers_Of_Piggy_Dead" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Numbers_Of_Piggy_Dead'];?>"></li>
              <li>小豬離乳仔數:<input name="Numbers_Of_Piggy_Wean" id="Numbers_Of_Piggy_Wean" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Numbers_Of_Piggy_Wean'];?>"></li>
              <li>小豬總重:<input name="Total_Piggy_Weight" id="Total_Piggy_Weight" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Total_Piggy_Weight'];?>"></li>
              <li>小豬離乳總重:<input name="Total_Wean_Piggy_Weight" id="Total_Wean_Piggy_Weight" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Total_Wean_Piggy_Weight'];?>"></li>
              <li>平均小豬重量:<input name="Average_Piggy_Weight" id="Average_Piggy_Weight" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Average_Piggy_Weight'];?>"></a></li>
              <li>平均小豬離乳重量:<input name="Average_Wean_Piggy_Weight" id="Average_Wean_Piggy_Weight" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Average_Wean_Piggy_Weight'];?>"></li>
              <li>備註欄:<input name="PS" id="PS" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['P.S'];?>"></li>
               <button class="w3-btn w3-green w3-col s12 m12" type="submit">修改</button>
              </form>
            </ul>

          </li>
          <?php } ?>

        </ul>
          <form action="production_query.php" method="get">
         <input style="display: none" type="text" name="more" id="more" name="more" value="<?php echo $ff;?>">
         <?php
         if($key1==null && $key2==null)
         {
         ?>
       <input class="w3-btn w3-pale-blue w3-col s12 m12" type="submit" value="顯示更多">
       <?php
     }else{};
       ?>
     
      </div>

      <br>


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
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
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
<script type="text/javascript">
function onSearch(obj){//js函数开始
  setTimeout(function(){//因为是即时查询，需要用setTimeout进行延迟，让值写入到input内，再读取
    var storeId = document.getElementById('store');//获取table的id标识
    var rowsLength = storeId.rows.length;//表格总共有多少行
    var key = obj.value;//获取输入框的值
    var searchCol = 1;//要搜索的哪一列，这里是第一列，从0开始数起
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
<script type="text/javascript">
function onSearch2(obj){//js函数开始
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
</body></html>