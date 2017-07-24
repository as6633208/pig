<?php
include("connect.php");
$ID=$_REQUEST["ID"]; //ID
$Sow_ID=$_REQUEST["Sow_ID"]; //母豬編號
$Birth_Date=$_REQUEST["Birth_Date"]; //生產日期
$Mating_Date=$_REQUEST["Mating_Date"]; //交配日期
$Boar_ID=$_REQUEST["Boar_ID"]; //公豬編號
$Numbers_Of_Fetus=$_REQUEST["Numbers_Of_Fetus"]; //母豬第幾胎
$Numbers_Of_Piggy_Total=$_REQUEST["Numbers_Of_Piggy_Total"]; //小豬總數
$Numbers_Of_Piggy_Alive=$_REQUEST["Numbers_Of_Piggy_Alive"]; //小豬活仔數
$Numbers_Of_Piggy_Dead=$_REQUEST["Numbers_Of_Piggy_Dead"]; //小豬死仔數
$Numbers_Of_Piggy_Wean=$_REQUEST["Numbers_Of_Piggy_Wean"]; //小豬離乳仔數
$Total_Piggy_Weight=$_REQUEST["Total_Piggy_Weight"]; //小豬總重
$Total_Wean_Piggy_Weight=$_REQUEST["Total_Wean_Piggy_Weight"]; //小豬離乳總重
$Average_Piggy_Weight=$_REQUEST["Average_Piggy_Weight"]; //平均小豬重量
$Average_Wean_Piggy_Weight=$_REQUEST["Average_Wean_Piggy_Weight"]; //平均小豬離乳重量
$PS=$_REQUEST["PS"]; //備註欄

$query="UPDATE `birth_record` SET
`Birth_Date` = '".$Birth_Date."',
`Mating_Date` = '".$Mating_Date."',
`Boar_ID` = '".$Boar_ID."',
`Numbers_Of_Fetus` = '".$Numbers_Of_Fetus."',
`Numbers_Of_Piggy_Total` = '".$Numbers_Of_Piggy_Total."',
`Numbers_Of_Piggy_Alive` = '".$Numbers_Of_Piggy_Alive."',
`Numbers_Of_Piggy_Dead` = '".$Numbers_Of_Piggy_Dead."',
`Numbers_Of_Piggy_Wean` = '".$Numbers_Of_Piggy_Wean."',
`Total_Piggy_Weight` = '".$Total_Piggy_Weight."',
`Total_Wean_Piggy_Weight` = '".$Total_Wean_Piggy_Weight."',
`Average_Piggy_Weight` = '".$Average_Piggy_Weight."',
`Average_Wean_Piggy_Weight` = '".$Average_Wean_Piggy_Weight."',
`P.S` = '".$PS."'
WHERE `ID` = '".$ID."';";

//echo $query;
mysql_query($query);
header("Location:SPI.php?Sow_ID=".$Sow_ID."&Birth_Date=".$Birth_Date."");

?>