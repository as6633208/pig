<?php 
include("connect.php");
$text = array("母豬編號","母豬品種","母豬年齡","母豬胎次","生產仔數","生產均重","生產活仔數","重新發情次數","離乳育成重量","離乳小豬隻數","流產及死產次數");
$text2 = array("","Varity","Birthday","Numbers_Of_Fetus","Numbers_Of_Piggy_Total","Total_Piggy_Weight","Numbers_Of_Piggy_Alive","Re_Estrus_Number","Total_Wean_Piggy_Weight","Numbers_Of_Piggy_Wean","Abortion_and_Stillbirth_Number");
if(isset($_GET['Weights']))
{
  $Weights = explode("_",$_GET['Weights']);
}
$text2 = Comparison($Weights, $text2);
$SoW_data = select_Sow();
$SoW_data = Age($SoW_data);
$SoW_data = produce($SoW_data);
$SoW_data = Re_Estrus_Number($SoW_data);
$SoW_data = Abortion_and_Stillbirth_Number($SoW_data);
$SoW_data = addition($SoW_data, $Weights);
if(isset($_GET['text'])){
  $SoW_data = bubble_sort($SoW_data, $_GET['text']);
}else {
  $SoW_data = bubble_sort($SoW_data, 11);
}

function bubble_sort($obj, $num) {
  for ($i = 0; $i < count($obj) - 1; $i++){
    for ($j = 0; $j < count($obj) - 1 - $i; $j++){
      if ($obj[$j + 1][$num] < $obj[$j][$num]){
        $t0=$obj[$j][0];
        $t1=$obj[$j][1];
        $t2=$obj[$j][2];
        $t3=$obj[$j][3];
        $t4=$obj[$j][4];
        $t5=$obj[$j][5];
        $t6=$obj[$j][6];
        $t7=$obj[$j][7];
        $t8=$obj[$j][8];
        $t9=$obj[$j][9];
        $t10=$obj[$j][10];
        $t11=$obj[$j][11];
        //
        $obj[$j][0]=$obj[$j + 1][0];
        $obj[$j][1]=$obj[$j + 1][1];
        $obj[$j][2]=$obj[$j + 1][2];
        $obj[$j][3]=$obj[$j + 1][3];
        $obj[$j][4]=$obj[$j + 1][4];
        $obj[$j][5]=$obj[$j + 1][5];
        $obj[$j][6]=$obj[$j + 1][6];
        $obj[$j][7]=$obj[$j + 1][7];
        $obj[$j][8]=$obj[$j + 1][8];
        $obj[$j][9]=$obj[$j + 1][9];
        $obj[$j][10]=$obj[$j + 1][10];
        $obj[$j][11]=$obj[$j + 1][11];
        //
        $obj[$j+1][0]=$t0;
        $obj[$j+1][1]=$t1;
        $obj[$j+1][2]=$t2;
        $obj[$j+1][3]=$t3;
        $obj[$j+1][4]=$t4;
        $obj[$j+1][5]=$t5;
        $obj[$j+1][6]=$t6;
        $obj[$j+1][7]=$t7;
        $obj[$j+1][8]=$t8;
        $obj[$j+1][9]=$t9;
        $obj[$j+1][10]=$t10;
        $obj[$j+1][11]=$t11;
      }
    }
  }
  return $obj;
}


function Comparison($obj1, $obj2){
  for ($i=0; $i < count($obj1); $i++) {
    if ($obj1[$i]==0) {
      $obj2[$i] = "th";
    }
  }
  return $obj2;
}
function select_Sow(){
  $sql_id = "SELECT DISTINCT `Pig_ID`, `Varity`, `Birthday` FROM `pig_basic_information` WHERE `Gender` = '母' ORDER BY `Pig_ID` ASC";
  $result_id = mysql_query($sql_id);
  $num=0;
  while($row_id = mysql_fetch_array($result_id)){
    $Sow_Id[$num][0] = $row_id["Pig_ID"];
    if ($row_id["Varity"]=="D") {
      $Sow_Id[$num][1] = 1;
    }else if($row_id["Varity"]=="F"){
      $Sow_Id[$num][1] = 2;
    }else if($row_id["Varity"]=="L"){
      $Sow_Id[$num][1] = 3;
    }
    $Sow_Id[$num][2] = $row_id["Birthday"];
    $num++;
  }
  return $Sow_Id;
}
function Age($obj){
  for ($i=0; $i < count($obj); $i++) { 
    $temp = explode("-",$obj[$i][2]);
    $age = $temp[0];
    $year = date("Y");
    $obj[$i][2] = 10-($year-$age);
  }
  return $obj;
}
function produce($obj){
  for ($i=0; $i < count($obj); $i++) {
    $sql_produce = "SELECT `Numbers_Of_Fetus`, `Numbers_Of_Piggy_Total`, `Total_Piggy_Weight`, `Numbers_Of_Piggy_Alive`, `Total_Wean_Piggy_Weight`, `Numbers_Of_Piggy_Wean`";
    $sql_produce .= "FROM `birth_record` WHERE `Sow_ID` = '".$obj[$i][0]."' ORDER BY `Numbers_Of_Fetus` DESC, `Birth_Date` DESC";
    $result_produce = mysql_query($sql_produce);
    $row_produce = mysql_fetch_array($result_produce);
    //
    $obj[$i][3] = $row_produce["Numbers_Of_Fetus"];
    $obj[$i][4] = $row_produce["Numbers_Of_Piggy_Total"];
    $obj[$i][5] = $row_produce["Total_Piggy_Weight"]/100;
    $obj[$i][6] = $row_produce["Numbers_Of_Piggy_Alive"];
    $obj[$i][8] = $row_produce["Total_Wean_Piggy_Weight"]/100;
    $obj[$i][9] = $row_produce["Numbers_Of_Piggy_Wean"];
  }
  return $obj;
}
function Re_Estrus_Number($obj){
  for ($i=0; $i < count($obj); $i++) {
    $sql_Estrus = "SELECT * FROM `mating_record` WHERE `Sow_ID` = '".$obj[$i][0]."' ORDER BY `Mating_DateTime` DESC";
    $result_Estrus = mysql_query($sql_Estrus);
    $num=mysql_num_rows($result_Estrus);
    if($num>=2){
      $count = 0;
      while($row_Estrus = mysql_fetch_array($result_Estrus)){
        $temp = explode(" ",$row_Estrus["Mating_DateTime"]);
        $array[$count] = $temp[0];//日期
        //$array[$count]."<br>";
        $count++;
      }
    }
    $count2 = 0;
    for ($j=1; $j < $count; $j++) { 
      if ($array[$j]==$array[0]) {
        $count2++;
      }
    }
    if($count2==0){
      $obj[$i][7] = 1;
    }else{
      $obj[$i][7] = 0;
    }
  }
  return $obj;
}
function Abortion_and_Stillbirth_Number($obj){
  for ($i=0; $i < count($obj); $i++) {
    $sql_Abortion = "SELECT * FROM `birth_record` WHERE `Sow_ID` = '".$obj[$i][0]."' AND `P.S` = '流產' OR `P.S` = '死產' ORDER BY `Numbers_Of_Fetus` DESC, `Birth_Date` DESC";
    $result_Abortion = mysql_query($sql_Abortion);
    $num=mysql_num_rows($result_Abortion);
    if($num==0){
      $obj[$i][10] = 1;
    }else{
      $obj[$i][10] = 0;
    }
  }
  return $obj;
}
function addition($obj, $obj2){
  for ($i=0; $i < count($obj); $i++) {
    if ($obj[$i][3]!=null && $obj[$i][4]!=null && $obj[$i][5]!=null && $obj[$i][6]!=null && $obj[$i][8]!=null && $obj[$i][9]!=null) {
      $addition = 0;
      for ($j=0; $j < 11; $j++) {
        if($text2[$j]!="th" && $j!=0){ 
            $multiplication = $obj[$i][$j]*$obj2[$j];
            $addition += $multiplication;
        }
      }
      $obj[$i][11] = $addition; 
    }
  }
  return $obj;
}


?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html"; >
  <meta charset="UTF-8">
  <title>決策建議</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/w3-theme-teal.css">
  <link rel="stylesheet" href="./css//w3.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

  <style>
    .w3-sidenav a {padding:16px;font-weight:bold}
  </style>

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
    <span id="myIntro" class="w3-hide">決策建議</span>
  </div>
  <div class="w3-container w3-padding-32" style="padding-left:32px">
    <hr>
    <br>
    <h2>決策建議</h2>
    <br>
    <hr>
    <p style="padding-left:32px">以下為各母豬之權重分數，點選欄位標題可進行遞增排序(預設為總分遞增)</p>
  </div>
  <div class="w3-container w3-sand w3-padding-32">
    <div class="w3-col s12 m12">
      <table class="w3-table-all w3-small w3-hoverable" id="store" style="table-layout:fixed">
        <tr> 
          <?php
            for ($i=0; $i < count($text); $i++) { 
              echo "<td align='center' ";
                if ($text2[$i]=="th" && $i!=0) {
                  echo "style='display:none'";
                }  
              echo " >";
              if($text2[$i]=="th" && $i==0){
                echo "母豬編號";
              }else if($text2[$i]!="th" && $i>0){
                echo "<a href='decision5.php?Weights=".$_GET['Weights']."&text=".$i."'>";
                if ($i==$_GET['text']) {
                  echo "<font color='blue'>";
                }
                echo $text[$i]."(".$Weights[$i].")";
                echo "</a>";
              }
              echo "</td>";
            }
          ?>
          <td>
            <a href="decision5.php?Weights=<?php echo $_GET['Weights']; ?>&text=11">
              <?php
                if (!isset($_GET['text']) || $_GET['text']==11) {
                  echo "<font color='blue'>";
                }
              ?>
              總分
            </a>
          </td>
        </tr>
        <?php
          for ($i=0; $i < count($SoW_data); $i++) {
              echo "<tr ";
              if ($SoW_data[$i][3]==null && $SoW_data[$i][4]==null && $SoW_data[$i][5]==null && $SoW_data[$i][6]==null && $SoW_data[$i][8]==null && $SoW_data[$i][9]==null) {
                echo "style='display:none'";
              }
              echo ">";
              for ($j=0; $j < count($text2)+1; $j++) {
                  echo "<td align='center' ";
                  if ($text2[$j]=="th" && $j!=0) {
                    echo "style='display:none'";
                  }  
                  echo " >";
                    if($j==0){
                      echo "<a href='information.php?Pig_ID=".$SoW_data[$i][$j]."' >".$SoW_data[$i][$j]."</a>";
                    }else{
                      if($text2[$j]!="th"){
                        echo $SoW_data[$i][$j];
                        if($j!=11){
                          echo "  X".$Weights[$j];
                        }
                        $final[$i][$j];
                      }
                    }
                  //echo "<br>".$i."&".$j;
                  echo "</td>";
              }
              echo "</tr>";
          }
        ?>
      </table>
      <button class="w3-btn w3-red w3-left" onclick="javascript:location.href='decision4.php?Weights=<?php echo $_GET['Weights']; ?>'">上一步</button>
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