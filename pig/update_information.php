<?php
include("connect.php");

$s0=$_REQUEST["s0"]; //豬隻編號
$s1=$_REQUEST["s1"]; //豬隻性別
$s2=$_REQUEST["s2"]; //出生日期
$s3=$_REQUEST["s3"]; //出生胎次
$s4=$_REQUEST["s4"]; //同胎出生頭數
$s5=$_REQUEST["s5"]; //同胎活仔頭數
$s6=$_REQUEST["s6"]; //同胎離乳狀況
$s7=$_REQUEST["s7"]; //首次配種日期
$s8=$_REQUEST["s8"]; //出生至首次配種天數
$ss1=$_REQUEST["ss1"]; //身軀等級
$ss2=$_REQUEST["ss2"]; //身軀評語
$ss3=$_REQUEST["ss3"]; //前胛等級
$ss4=$_REQUEST["ss4"]; //前胛評語
$ss5=$_REQUEST["ss5"]; //後臂等級
$ss6=$_REQUEST["ss6"]; //後臂評語
$ss7=$_REQUEST["ss7"]; //總體等級
$ss8=$_REQUEST["ss8"]; //總體評語
$sss1=$_REQUEST["sss1"]; //父親編號
$sss2=$_REQUEST["sss2"]; //母親編號
$sss3=$_REQUEST["sss3"]; //祖父編號
$sss4=$_REQUEST["sss4"]; //祖母編號
$sss5=$_REQUEST["sss5"]; //曾祖父編號
$sss6=$_REQUEST["sss6"]; //曾祖母編號
$ssss1=$_REQUEST["ssss1"]; //淘汰日期
$ssss2=$_REQUEST["ssss2"]; //淘汰原因
if($ssss1!=null)
{
	$query="UPDATE `pig_basic_information` SET
`Gender` = '".$s1."',
`Birthday` = '".$s2."',
`Body_Level` = '".$ss1."',
`Body_comment` = '".$ss2."',
`Front_Shoulder_Blade_Level` = '".$ss3."',
`Front_Shoulder_Blade_Comment` = '".$ss4."',
`After_Arm_Level` = '".$ss5."',
`After_Arm_Comment` = '".$ss6."',
`Total_Level` = '".$ss7."',
`Total_Comment` = '".$ss8."',
`Numbers_Of_Mother_Fetus` = '".$s3."',
`Numbers_Of_Brothers_And_Sisters_Total` = '".$s4."',
`Numbers_Of_Brothers_And_Sisters_Alive` = '".$s5."',
`Brothers_And_Sisters_Wean_Information` = '".$s6."',
`First_Time_Mating` = '".$s7."',
`Days_Of_Born_To_First_Mating` = '".$s8."',
`Father_Id` = '".$sss1."',
`Mother_Id` = '".$sss2."',
`Grandfather_Id` ='".$sss3."',
`Grandmother_Id` ='".$sss4."',
`Great-Grandfather_Id` = '".$sss5."',
`Great-Grandmother_Id` = '".$sss6."',
`Eliminate_Date` = '".$ssss1."',
`Eliminate_Reason` = '".$ssss2."'
WHERE `Pig_ID` = '".$s0."';";
}
else{

$query="UPDATE `pig_basic_information` SET
`Gender` = '".$s1."',
`Birthday` = '".$s2."',
`Body_Level` = '".$ss1."',
`Body_comment` = '".$ss2."',
`Front_Shoulder_Blade_Level` = '".$ss3."',
`Front_Shoulder_Blade_Comment` = '".$ss4."',
`After_Arm_Level` = '".$ss5."',
`After_Arm_Comment` = '".$ss6."',
`Total_Level` = '".$ss7."',
`Total_Comment` = '".$ss8."',
`Numbers_Of_Mother_Fetus` = '".$s3."',
`Numbers_Of_Brothers_And_Sisters_Total` = '".$s4."',
`Numbers_Of_Brothers_And_Sisters_Alive` = '".$s5."',
`Brothers_And_Sisters_Wean_Information` = '".$s6."',
`First_Time_Mating` = '".$s7."',
`Days_Of_Born_To_First_Mating` = '".$s8."',
`Father_Id` = '".$sss1."',
`Mother_Id` = '".$sss2."',
`Grandfather_Id` ='".$sss3."',
`Grandmother_Id` ='".$sss4."',
`Great-Grandfather_Id` = '".$sss5."',
`Great-Grandmother_Id` = '".$sss6."',
`Eliminate_Date` = NULL,
`Eliminate_Reason` = '".$ssss2."'
WHERE `Pig_ID` = '".$s0."';";
}


mysql_query($query) ;
header("Location:information.php?Pig_ID=".$s0);

?>