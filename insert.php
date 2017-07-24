<?php
 
include("connect.php");

$id=$_REQUEST["id"];
if($id==1){
$t0=$_REQUEST["t0"];
$t1=$_REQUEST["t1"];
$t2=$_REQUEST["t2"];
$t2=$_REQUEST["t2"];
$t3=$_REQUEST["t3"];
$t4=$_REQUEST["t4"];
$query="INSERT INTO `feed_record`(`Pig_ID`, `Feed_Category`, `Feed_Value`, `Feed_Time`, `Water`) VALUES ('".$t0."','".$t1."','".$t2."','".$t3."','".$t4."')";
echo $query;
mysql_query($query);
header("Location:lifelog.php?Pig_ID=".$t0);
//$result_basic = mysql_query($query);
}
if($id==2){
$t0=$_REQUEST["t0"];
$t1=$_REQUEST["t1"];
$t2=$_REQUEST["t2"];
$query="INSERT INTO `feed_record`(`Pig_ID`, `Feed_Category`, `Feed_Value`, `Feed_Time`, `Water`) VALUES ('"+$t0+"','"+$t1+"','".$t2+"')";
echo $query;
mysql_query($query);
header("Location:lifelog.php?Pig_ID=".$t0);
}
if($id==3){
$t0=$_REQUEST["t0"];
$t1=$_REQUEST["t1"];
$t2=$_REQUEST["t2"];
$query="INSERT INTO `pig_vaccine_record`(`Pig_ID`, `Vaccine_ID`, `Vaccine_Date`) VALUES ('".$t0."','".$t1."','".$t2."')";
echo $query;
mysql_query($query);
header("Location:lifelog.php?Pig_ID=".$t0);

}
if($id==4){
$t0=$_REQUEST["t0"];
$t1=$_REQUEST["t1"];
$t2=$_REQUEST["t2"];
$t3=$_REQUEST["t3"];
$t4=$_REQUEST["t4"];
$query="INSERT INTO `mating_record`(`Mating_DateTime`, `Sow_ID`, `Boar_ID`, `Days_Of_Frozen_Semen`, `Level_Of_Sow_Estrus_Reaction`) VALUES ('".$t1."','".$t0."','".$t2."','".$t3."','".$t4."')";
echo $query;
mysql_query($query);
header("Location:lifelog.php?Pig_ID=".$t0);
}
if($id==5){
$t0=$_REQUEST["t0"];
$t1=$_REQUEST["t1"];
$t2=$_REQUEST["t2"];
$t3=$_REQUEST["t3"];
$query="INSERT INTO `grow_up_record`(`Pig_ID`, `Body_Lenth`, `Weight`, `DateTime`) VALUES ('".$t0."','".$t3."','".$t2."','".$t1."')";
echo $query;
mysql_query($query);
header("Location:lifelog.php?Pig_ID=".$t0);

}
if($id==6){
$t0=$_REQUEST["t0"];
$t1=$_REQUEST["t1"];
$t2=$_REQUEST["t2"];
$query="INSERT INTO `other_record`(`Datetime`, `Record_Name`, `Pig_ID`) VALUES ('".$t1."','".$t2."','".$t0."')";
echo $query;
mysql_query($query);
header("Location:lifelog.php?Pig_ID=".$t0);
}
if($id==7){
$t0=$_REQUEST["t0"];
$t1=$_REQUEST["t1"];
$t2=$_REQUEST["t2"];
$t3=$_REQUEST["t3"];
$t4=$_REQUEST["t4"];
$t5=$_REQUEST["t5"];
$t6=$_REQUEST["t6"];
$t7=$_REQUEST["t7"];
$t8=$_REQUEST["t8"];
$t9=$_REQUEST["t9"];
$t10=$_REQUEST["t10"];
$t11=$_REQUEST["t11"];
$t12=$_REQUEST["t12"];
$t13=$_REQUEST["t13"];
$t14=$_REQUEST["t14"];
$query="INSERT INTO `birth_record`(`Mating_Date`, `Birth_Date`, `Sow_ID`, `Boar_ID`, `Numbers_Of_Fetus`, `Numbers_Of_Piggy_Total`, `Numbers_Of_Piggy_Alive`, `Numbers_Of_Piggy_Dead`, `Numbers_Of_Piggy_Wean`, `Total_Piggy_Weight`, `Total_Wean_Piggy_Weight`, `Average_Piggy_Weight`, `Average_Wean_Piggy_Weight`, `P.S`) VALUES ('".$t1."','".$t2."','".$t3."','".$t4."','".$t5."','".$t6."','".$t7."','".$t8."','".$t9."','".$t10."','".$t11."','".$t12."','".$t13."','".$t14."')";
echo $query;
header("Location:SPI.php?Sow_ID=".$t3."&Birth_Date=".$t1."");
}
if($id==11){
$t0=$_REQUEST["t0"];
$t1=$_REQUEST["t1"];
$t2=$_REQUEST["t2"];
$t2=$_REQUEST["t2"];
$t3=$_REQUEST["t3"];
$t4=$_REQUEST["t4"];
$query="INSERT INTO `feed_record`(`Pig_ID`, `Feed_Category`, `Feed_Value`, `Feed_Time`, `Water`) VALUES ('".$t0."','".$t1."','".$t2."','".$t3."','".$t4."')";
echo $query;
mysql_query($query);
echo '<script>';
echo 'history.back()';
echo '</script>';
}
if($id==12){
$t0=$_REQUEST["t0"];
$t1=$_REQUEST["t1"];
$t2=$_REQUEST["t2"];
$query="INSERT INTO `feed_record`(`Pig_ID`, `Feed_Category`, `Feed_Value`, `Feed_Time`, `Water`) VALUES ('"+$t0+"','"+$t1+"','".$t2+"')";
echo $query;
mysql_query($query);
echo '<script>';
echo 'history.back()';
echo '</script>';
}
if($id==13){
$t0=$_REQUEST["t0"];
$t1=$_REQUEST["t1"];
$t2=$_REQUEST["t2"];
$query="INSERT INTO `pig_vaccine_record`(`Pig_ID`, `Vaccine_ID`, `Vaccine_Date`) VALUES ('".$t0."','".$t1."','".$t2."')";
echo $query;
mysql_query($query);
echo '<script>';
echo 'history.back()';
echo '</script>';

}
if($id==14){
$t0=$_REQUEST["t0"];
$t1=$_REQUEST["t1"];
$t2=$_REQUEST["t2"];
$t3=$_REQUEST["t3"];
$t4=$_REQUEST["t4"];
$query="INSERT INTO `mating_record`(`Mating_DateTime`, `Sow_ID`, `Boar_ID`, `Days_Of_Frozen_Semen`, `Level_Of_Sow_Estrus_Reaction`) VALUES ('".$t1."','".$t0."','".$t2."','".$t3."','".$t4."')";
echo $query;
mysql_query($query);
echo '<script>';
echo 'history.back()';
echo '</script>';
}
if($id==15){
$t0=$_REQUEST["t0"];
$t1=$_REQUEST["t1"];
$t2=$_REQUEST["t2"];
$t3=$_REQUEST["t3"];
$query="INSERT INTO `grow_up_record`(`Pig_ID`, `Body_Lenth`, `Weight`, `DateTime`) VALUES ('".$t0."','".$t3."','".$t2."','".$t1."')";
echo $query;
mysql_query($query);
echo '<script>';
echo 'history.back()';
echo '</script>';

}
if($id==16){
$t0=$_REQUEST["t0"];
$t1=$_REQUEST["t1"];
$t2=$_REQUEST["t2"];
$query="INSERT INTO `other_record`(`Datetime`, `Record_Name`, `Pig_ID`) VALUES ('".$t1."','".$t2."','".$t0."')";
echo $query;
mysql_query($query);
echo '<script>';
echo 'history.back()';
echo '</script>';
}
//$_SERVER[javascript:history.go(-1);];
?>