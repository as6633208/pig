<?php 
include("connect.php");
$text = array("生產參數","母豬品種","母豬年齡","母豬胎次","生產仔數","生產均重","生產活仔數","重新發情次數","離乳育成重量","離乳小豬隻數","流產及死產次數");
//確認是否有勾選
if(isset($_POST['Sow']) && count($_POST['Sow'])>=2)
{
  $temp = $_POST['Sow'];
}else{
  echo "<script type='text/javascript'> ";
  echo "alert('請至少勾選兩項以上');";
  echo "document.location.href='decision1.php';";
  echo "</script> ";
}
//將值往後搬移
for ($i=0; $i < count($temp); $i++) { 
  $Sow[$i+1] = $temp[$i];
}
//確認顯示哪一列或欄
for ($i=0; $i < 11; $i++) {
  if ($i==0) {
    $Sow2[$i]=$i;
  }else{
    //逐一確認
    if(array_search($i, $Sow)!=null){
      //若有則顯示值
      $Sow2[$i]=$i;
    }else{
      $Sow2[$i]=X;
    }
  }
  $Sow_String .= $Sow2[$i];
  if ($i!=10) {
    $Sow_String .= ",";
  }
}
//查詢最新的權重
$sql_decision = "SELECT * FROM `decision` ORDER BY `ID` DESC";
$result_decision = mysql_query($sql_decision);
$row_decision = mysql_fetch_array($result_decision);
$data = $row_decision['Sow_Variety']."/".$row_decision['Sow_Age']."/".$row_decision['Sows_Parity']."/".$row_decision['Production_Number']."/".$row_decision['Production_Heavy']."/".$row_decision['Number_of_Births']."/".$row_decision['Re_Estrus_Number']."/".$row_decision['Weanling_Weight']."/".$row_decision['Weaning_Piglets']."/".$row_decision['Abortion_and_Stillbirth_Number'];
$array = explode("/",$data);
//逐一放入二維陣列中
$Weights_all = array();
//第一列標題
for ($i=0; $i < count($text); $i++) { 
  $Weights_all[0][$i] = $text[$i];
}
//第一欄標題
for ($i=0; $i < count($text); $i++) { 
  $Weights_all[$i][0] = $text[$i];
}
//所有權重
for ($i=1; $i < count($text); $i++) { 
  $array2 = explode(",",$array[$i-1]);
  for ($j=1; $j < count($text); $j++) { 
      $Weights_all[$i][$j] = $array2[$j-1];
  }
}
//比對權重正確性
/*for ($i=1; $i < count($text); $i++) { 
  for ($j=1; $j < count($text); $j++) { 
    if($j>$i){
      if($Weights_all[$i][$j]*$Weights_all[$j][$i]!=1){
        $Weights_all[$j][$i] =  round((1/$Weights_all[$i][$j]),2);
        echo $j."&".$i." = ".$Weights_all[$j][$i]."<br>";
        if($Weights_all[$j][$i]==3.03)
        {
          $Weights_all[$j][$i]=3;
        }
      }
    }
    if($i==$j){
      $Weights_all[$i][$j] = 1;
    }
  }
}*/
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html"; >
  <meta charset="UTF-8">
  <title>權重設定</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/w3-theme-teal.css">
  <link rel="stylesheet" href="./css//w3.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

  <style>
    .w3-sidenav a {padding:16px;font-weight:bold}
  </style>
  <script type="text/javascript"> 
    //即時計算
    function compute(obj, i, j) 
    { 
      var value = obj.value;
      if(value==0.33)
      {
        var temp = 3;
      }else if(value==3){
        var temp = 0.33
      }else{
        var temp = 1/value;
      }
      document.getElementById(j+"&"+i).value=temp;
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
    <span id="myIntro" class="w3-hide">權重設定</span>
  </div>



  <div class="w3-container w3-padding-32" style="padding-left:32px">
    <hr>
    <br>
    <h2>權重設定</h2>
    <br>
    <hr>
    <p style="padding-left:32px">請於下列表格填入以下權重</p>
    <p class='w3-p w3-text-red' style="padding-left:32px">5,  4,  3,  2,  1,  0.5,  0.33,  0.25,  0.2</p>
  </div>
  <form  action="decision3.php" method="post">
  <div class="w3-container w3-sand w3-padding-32">
    <div class="w3-col s12 m12">
      <table class="w3-table-all w3-small w3-hoverable" id="store" style="table-layout:fixed">
        <?php
          for ($i=0; $i < count($text); $i++) { 
            echo "<tr ";
            if($Sow2[$i]=="X" && $i!=0)
            {
              echo "style='display:none'";
            }
            echo " >";
            for ($j=0; $j < count($text); $j++) { 
              echo "<td align='center' ";
              if($Sow2[$j]=="X" && $j!=0)
              {
                echo "style='display:none'";
              }
              echo ">";
              if($i==0 || $j==0){
                echo $Weights_all[$i][$j];
              }else if($j<=$i){
                echo "<input class='w3-input' type='text' style='border:0;background-color:transparent;' id='".$i."&".$j."' name='data[]' value='".round($Weights_all[$i][$j],2)."' readonly>";
              }else{
                echo "<input class='w3-input w3-pale-yellow' type='text' style='border:0' id='".$i."&".$j."' name='data[]' value='".round($Weights_all[$i][$j],2)."' oninput='compute(this, ".$i.", ".$j.")'>";
              }
              echo "<input type='hidden' name='Sow' value='".$Sow_String."' >";
              //echo "<br>".$i."&".$j."";
              echo "</td>";
            }
            echo "</tr>";
          }     
        ?>
      </table>
      <button class="w3-btn w3-red w3-left" onclick="history.back()">上一步</button>
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