
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>豬隻資訊</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="./css/w3-theme-teal.css">
 <link rel="stylesheet" href="./css//w3.css">
 <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
 <script src="jquery/jquery-1.8.3.min.js"></script>


 <style>
  .w3-sidenav a {padding:16px;font-weight:bold}

</style>
<?php 
include("connect.php");
?>
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
</div>
<a href="decision1.php">淘汰決策</a>
<a href="predict.php">指數預測</a>
<a href="surroundings.php">環境監控</a>
</nav>

<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

<div class="w3-main" style="margin-left:250px;">

  <div id="myTop" class="w3-top w3-container w3-padding-16 w3-theme w3-large">
    <i class="fa fa-bars w3-opennav w3-hide-large w3-xlarge w3-margin-left w3-margin-right" onclick="w3_open()"></i>
    <span id="myIntro" class="w3-hide">豬隻資訊</span>
  </div>




  <div style="padding-top:32px;padding-Left:32px">
    <hr>
    <br>
    <h2>豬隻資訊-<?php echo $_GET[Pig_ID];?></h2>
    <br>
    <hr>
    <div class="w3-container w3-sand w3-padding-32"  style="padding-left:5%">
     <div class="w3-col s12 m12">
      <div class="w3-center">
      <?php   
      $Pigid = $_GET[Pig_ID];
      $sql_basic = "SELECT * FROM `pig_basic_information` where `Pig_ID` = '$Pigid'";
      $result_basic = mysql_query($sql_basic);
      $row_basic = mysql_fetch_array($result_basic);
      $num="img/pig-img/".$row_basic['Pig_ID'].".jpg";
      if( !is_file($num) )
      {
        $num = "img/pig-img/no_pig.jpg";
      }
      echo "<img src='http://chart.apis.google.com/chart?cht=qr&chs=200x200&chl=".$row_basic['Pig_ID']."' />";
      ?>
        <img class="w3-round w3-striped" id="imgshow" src="<?php echo $num?>" style="height:auto;overflow:hidden;"/>
      </div>
      <script type="text/javascript"> 
        function imgDisplay() 
        { 
          var board = document.getElementById("imgshow"); 
          board.style.display = 'none'; 
        } 
      </script>
      <br>
      <hr>


      <?php
      if($row_basic['Gender']=="公" || $row_basic['Gender']=="男")
        {?>
      <div class="w3-btn w3-grey w3-col s6 m6  w3-center w3-border"><i class="fa fa-lock" aria-hidden="true"></i>指數預測</div>
      <input class="w3-btn w3-red w3-col s6 m6  w3-center w3-border" type="button" value="生活日誌" onclick="location.href='insert_lifelog.php?Pig_ID=<?php echo $row_basic['Pig_ID']; ?>', ''">

      <?php
    }
    else
      {?>
    <input style="width:50%" class="w3-btn w3-red w3-col s6 m6 w3-center w3-border" type="button" target="this" value="指數預測" onclick="location.href='predict.php?value=<?php echo $row_basic['Pig_ID']; ?>', ''">
    <input style="width:50%" class="w3-btn w3-red w3-col s6 m6  w3-center w3-border" type="button" target="this" value="生活日誌" onclick="location.href='insert_lifelog.php?Pig_ID=<?php echo $row_basic['Pig_ID']; ?>', ''">
    <?php
  }
  ?>


</div>
<div class="w3-col s12 m12">
  <div class="w3-center" style="padding-bottom:32px">
    <button class="w3-btn demo  w3-col s12 m3 w3-center w3-border" onclick="currentDiv(1)">基本資訊</button>
    <button class="w3-btn demo  w3-col s12 m3 w3-center w3-border" onclick="currentDiv(2)">豬隻評語</button>
    <button class="w3-btn demo  w3-col s12 m3 w3-center w3-border" onclick="currentDiv(3)">血緣資訊</button>
    <button class="w3-btn demo  w3-col s12 m3 w3-center w3-border" onclick="currentDiv(4)">豬隻淘汰</button>


  </div>
   <form action="update_information.php" method="post">
  <div class="mySlides  w3-animate-bottom" style="width:100%">
   <div class="w3-col s12 m12">
     <table class="w3-table w3-striped w3-border">
      <tr>
        <td>豬隻編號：</td>
        <td> <input class="w3-input w3-border w3-round-large" value="<?php echo $Pigid;?>"  disabled>
        <input  name="s0" id="s0" class="w3-input w3-border w3-round-large" value="<?php echo $Pigid;?>" style="display: none;"></td>

      </tr>
      <tr>
        <td>豬隻性別：</td>
        <td> <input name="s1" id="s1" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Gender'];?>"></td>

      </tr>
      <tr>
        <td>出生日期</td>
        <td><input name="s2" id="s2" class="w3-input w3-border w3-round-large" type="date" value="<?php echo $row_basic['Birthday'];?>"></td> 
      </tr>
      <tr>
        <td>出生胎次</td>
        <td><input name="s3" id="s3" class="w3-input w3-border w3-round-large" type="number" value="<?php echo $row_basic['Numbers_Of_Mother_Fetus'];?>"></td>
      </tr>
      <tr>
        <td>同胎出生頭數</td>
        <td><input name="s4" id="s4" class="w3-input w3-border w3-round-large" type="number"  value="<?php echo $row_basic['Numbers_Of_Brothers_And_Sisters_Total'];?>"></td>
      </tr>
      <tr>
        <td>同胎活仔頭數</td>
        <td><input name="s5" id="s5" class="w3-input w3-border w3-round-large" type="number"  value="<?php echo $row_basic['Numbers_Of_Brothers_And_Sisters_Alive'];?>"></td>
      </tr>
      <tr>
        <td>同胎離乳狀況</td>
        <td><input name="s6" id="s6" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Brothers_And_Sisters_Wean_Information'];?>"></td>
      </tr>
      <tr>
        <td>首次配種日期</td>
        <td><input name="s7" id="s7" class="w3-input w3-border w3-round-large" type="date"  value="<?php echo $row_basic['First_Time_Mating'];?>"></td>
      </tr>
      <tr>
        <td>出生至首次配種天數</td>
        <td><input name="s8" id="s8" class="w3-input w3-border w3-round-large" type="number"  value="<?php echo $row_basic['Days_Of_Born_To_First_Mating'];?>"></td>
      </tr>
    </table>
  </div>
</div>
<div class="mySlides  w3-animate-bottom" style="width:100%">
  <div class="w3-col s12 m12">
    <table class="w3-table w3-striped w3-border">
      <tr>
        <td>身軀等級</td>
        <td> <input name="ss1" id="ss1" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Body_Level'];?>"></td>
      </tr>
      <tr>
        <td>身軀評語</td>
        <td><input name="ss2" id="ss2" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Body_comment'];?>"></td> 
      </tr>
       <tr>
        <td>前胛等級</td>
        <td><input name="ss3" id="ss3" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Front_Shoulder_Blade_Level'];?>"></td> 
      </tr>
       <tr>
        <td>前胛評語</td>
        <td><input name="ss4" id="ss4" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Front_Shoulder_Blade_Comment'];?>"></td> 
      </tr>
       <tr>
        <td>後臂等級</td>
        <td><input name="ss5" id="ss5" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['After_Arm_Level'];?>"></td> 
      </tr>
       <tr>
        <td>後臂評語：</td>
        <td><input name="ss6" id="ss6" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['After_Arm_Comment'];?>"></td> 
      </tr>
       <tr>
        <td>總體等級：</td>
        <td><input name="ss7" id="ss7" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Total_Level'];?>"></td> 
      </tr>
       <tr>
        <td>總體評語：</td>
        <td><input name="ss8" id="ss8" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Total_Comment'];?>"></td> 
      </tr>
      
    </table>
  </div>
</div>
<div class="mySlides  w3-animate-bottom" style="width:100%">
  <div class="w3-col s12 m12">
  <table class="w3-table w3-striped w3-border" style="display:none">
      <tr>
        <td  style="width: 50%">父親編號</td>
        <td  style="width: 50%"><a href="information.php?Pig_ID=<?php echo $row_basic['Father_Id']; ?>"><?php echo $row_basic['Father_Id'];?></a></td>
      </tr>
      <tr>
        <td>母親編號</td>
        <td><a href="information.php?Pig_ID=<?php echo $row_basic['Mother_Id']; ?>"><?php echo $row_basic['Mother_Id'];?></a></td> 
      </tr>
       <tr>
        <td>祖父編號</td>
        <td><a href="information.php?Pig_ID=<?php echo $row_basic['Grandfather_Id']; ?>"><?php echo $row_basic['Grandfather_Id'];?></a></td> 
      </tr>
       <tr>
        <td>祖母編號</td>
        <td><a href="information.php?Pig_ID=<?php echo $row_basic['Grandmother_Id']; ?>"><?php echo $row_basic['Grandmother_Id'];?></a></td> 
      </tr>
       <tr>
        <td>曾祖父編號</td>
        <td><a href="information.php?Pig_ID=<?php echo $row_basic['Great-Grandfather_Id']; ?>"><?php echo $row_basic['Great-Grandfather_Id'];?></a></td> 
      </tr>
       <tr>
        <td>曾祖母編號</td>
        <td><a href="information.php?Pig_ID=<?php echo $row_basic['Great-Grandmother_Id']; ?>"><?php echo $row_basic['Great-Grandmother_Id'];?></a></td> 
      </tr>
    </table>


      <table class="w3-table w3-striped w3-border">
      <tr>
        <td>父親編號</td>
        <td><input name="sss1" id="sss1" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Father_Id']; ?>"></a></td>
      </tr>
      <tr>
        <td>母親編號</td>
        <td><input name="sss2" id="sss2" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Mother_Id']; ?>"></td> 
      </tr>
       <tr>
        <td>祖父編號</td>
        <td><input name="sss3" id="sss3" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Grandfather_Id']; ?>"></a></td> 
      </tr>
       <tr>
        <td>祖母編號</td>
        <td><input name="sss4" id="sss4" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Grandmother_Id']; ?>"></td> 
      </tr>
       <tr>
        <td>曾祖父編號</td>
        <td><input name="sss5" id="sss5" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Great-Grandfather_Id'];?>"></a></td> 
      </tr>
       <tr>
        <td>曾祖母編號</td>
        <td><input name="sss6" id="sss6" class="w3-input w3-border w3-round-large" value="<?php echo $row_basic['Great-Grandmother_Id'];?>"></td> 
      </tr>
    </table>


  </div>
</div>
<div class="mySlides  w3-animate-bottom" style="width:100%">
  <div class="w3-col s12 m12">
    <table class="w3-table w3-striped w3-border">
      <tr>
        <td>淘汰時間</td>
        <td> <input name="ssss1" id="ssss1" class="w3-input w3-border w3-round-large" type="date" value="<?php echo $row_basic['Eliminate_Date'];?>"></td>
      </tr>
      <tr>
        <td>淘汰原因</td>
        <td> <input name="ssss2" id="ssss2" class="w3-input w3-border w3-round-large"  type="text" value="<?php echo $row_basic['Eliminate_Reason'];?>"></td>
      </tr>
    </table>
  </div>
</div>
   <button class="w3-btn w3-green w3-col s12 m12" type="submit">修改</button>
</form>



</div>


<hr>
<br>


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
         dots[i].className = dots[i].className.replace(" w3-blue", "");
       }
       x[slideIndex-1].style.display = "block";
       dots[slideIndex-1].className += " w3-blue";
     }
   </script>



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