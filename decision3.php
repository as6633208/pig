<?php 
include("connect.php");
$text = array("生產參數","母豬品種","母豬年齡","母豬胎次","生產仔數","生產均重","生產活仔數","重新發情次數","離乳育成重量","離乳小豬隻數","流產及死產次數");
$text2 = array("Sow_Variety","Sow_Age","Sows_Parity","Production_Number","Production_Heavy","Number_of_Births","Re_Estrus_Number","Weanling_Weight","Weaning_Piglets","Abortion_and_Stillbirth_Number");

if(isset($_POST["data"]))
{
  $Weights = $_POST["data"];
  $Sow_array = $_POST["Sow"];
  $Sow = explode(",",$Sow_array);
  //
  $Weights_all = array();
  $sql_query = array();
  //計數用
  $k=0;
  //將值放入二維陣列
  for ($i=0; $i < count($text); $i++) { 
    $Weights_all[0][$i] = $text[$i];
  }
  for ($i=0; $i < count($text); $i++) { 
    $Weights_all[$i][0] = $text[$i];
  }
  for ($i=1; $i < count($text); $i++) { 
    for ($j=1; $j < count($text); $j++) { 
      //儲存用的陣列
      $sql_query[$i-1] .= $Weights[$k];
      if($j!=(count($text)-1)){
        $sql_query[$i-1] .=", ";
      }
      $Weights_all[$i][$j] = $Weights[$k];
      $k++;
    }
  }
  //儲存新增的權重
  $query .= "INSERT INTO `decision` (`Date`, ";
  for ($i=0; $i < count($sql_query); $i++) {
    $query .= "`".$text2[$i]."`";
    if ($i!=(count($sql_query)-1)) {
      $query .= ", ";
    }
  }
  $query .= ") VALUES ('".date("Y-m-d")."', ";
  for ($i=0; $i < count($sql_query); $i++) {
    $query .= "'".$sql_query[$i]."'";
    if ($i!=(count($sql_query)-1)) {
      $query .= ", ";
    }
  }
  $query .= ")";
  mysql_query($query);
  //篩選二維陣列
  for ($i=1; $i < count($text); $i++) { 
    if($Sow[$i]!="X"){
      for ($j=1; $j < count($text); $j++) {
        if($Sow[$j]!="X"){
          $Weights_select[$i][$j] = $Weights_all[$i][$j];
          //分母
          $Denominator += $Weights_select[$i][$j];
          //分子
          $molecular[$i] += $Weights_select[$i][$j];
        }
      }
    }
  }
  for ($i=1; $i < count($text); $i++) { 
    $molecular[$i] = round(($molecular[$i]/$Denominator),2);
    $url .= $molecular[$i];
    if ($i!=(count($text)-1)) {
      $url .= "_";
    }
  }
  header("location:decision4.php?Weights=th_".$url); 
}
?>