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
$t5=$_REQUEST["t5"];
for ( $i=0 ; $i<count($t0) ; $i++ ) {
$query="UPDATE `KnowPig`.`feed_record`
SET
`ID` = ".$t0[$i].",
`Pig_ID` = '".$t1[$i]."',
`Feed_Category` = '".$t2[$i]."',
`Feed_Value` = '".$t3[$i]."',
`Feed_Time` = '".$t4[$i]."',
`Water` = '".$t5[$i]."'
WHERE `ID` = ".$t0[$i].";
";
mysql_query($query);
}
echo '<script>';
echo 'history.back()';
echo '</script>';
//header("Location:lifelog.php?Pig_ID=".$t0);
//$result_basic = mysql_query($query);
}
if($id==3){
$t0=$_REQUEST["t0"];
$t1=$_REQUEST["t1"];
$t2=$_REQUEST["t2"];
$t3=$_REQUEST["t3"];
for ( $i=0 ; $i<count($t0) ; $i++ ) {
$query="UPDATE `KnowPig`.`feed_record` SET `ID` = 1, `Pig_ID` = '86', `Feed_Category` = '456456', `Feed_Value` = '123', `Feed_Time` = '2016-08-10 00:00:00', `Water` = '11' WHERE `ID` = 1;UPDATE `KnowPig`.`pig_vaccine_record`
SET
`ID` = ".$t0[$i].",
`Pig_ID` = '".$t1[$i]."',
`Vaccine_ID` = '".$t2[$i]."',
`Vaccine_Date` = '".$t3[$i]."'
WHERE `ID` = ".$t0[$i].";
";
echo $query;
mysql_query($query);
}
echo '<script>';
echo 'history.back()';
echo '</script>';
}
if($id==4){
$t0=$_REQUEST["t0"];
$t1=$_REQUEST["t1"];
$t2=$_REQUEST["t2"];
$t3=$_REQUEST["t3"];
$t4=$_REQUEST["t4"];
$t5=$_REQUEST["t5"];
for ( $i=0 ; $i<count($t0) ; $i++ ) {
$query="UPDATE `KnowPig`.`mating_record`
SET
`ID` = ".$t0[$i].",
`Mating_DateTime` = '".$t1[$i]."',
`Sow_ID` = '".$t2[$i]."',
`Boar_ID` = '".$t3[$i]."',
`Days_Of_Frozen_Semen` = '".$t4[$i]."',
`Level_Of_Sow_Estrus_Reaction` = '".$t5[$i]."'
WHERE `ID` = ".$t0[$i].";
";
echo $query;
mysql_query($query);
}
header("Location:lifelog.php?Pig_ID=".$t0);
}
if($id==5){
$t0=$_REQUEST["t0"];
$t1=$_REQUEST["t1"];
$t2=$_REQUEST["t2"];
$t3=$_REQUEST["t3"];
for ( $i=0 ; $i<count($t0) ; $i++ ) {
$query="UPDATE `KnowPig`.`grow_up_record`
SET
`ID` = ".$t0[$i].",
`Pig_ID` = ".$t1[$i].",
`Body_Lenth` = ".$t2[$i].",
`Weight` = ".$t3[$i].",
`DateTime` = ".$t4[$i]."
WHERE `ID` = ".$t0[$i].";
";
echo $query;
mysql_query($query);
}
echo '<script>';
echo 'history.back()';
echo '</script>';
}
if($id==6){
$t0=$_REQUEST["t0"];
$t1=$_REQUEST["t1"];
$t2=$_REQUEST["t2"];
for ( $i=0 ; $i<count($t0) ; $i++ ) {
$query="UPDATE `KnowPig`.`other_record`
SET
`ID` = ".$t0[$i].",
`Datetime` = ".$t1[$i].",
`Record_Name` = ".$t2[$i].",
`Pig_ID` = ".$t3[$i]." 
WHERE `ID` = ".$t0[$i].";
";
echo $query;
mysql_query($query);
}
echo '<script>';
echo 'history.back()';
echo '</script>';
}
?>