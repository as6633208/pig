<?php
include("connect.php");
$s1=$_REQUEST["s1"]; //豬隻編號
$s2=$_REQUEST["s2"]; //豬隻性別
$s3=$_REQUEST["s3"]; //出生日期
$s4=$_REQUEST["s4"]; //出生胎次
$s5=$_REQUEST["s5"]; //同胎出生頭數
$s6=$_REQUEST["s6"]; //同胎活仔頭數
$s7=$_REQUEST["s7"]; //同胎離乳狀況
$s8=$_REQUEST["s8"]; //首次配種日期
$s9=$_REQUEST["s9"]; //出生至首次配種天數
$s10=$_REQUEST["s10"]; //身軀等級
$s11=$_REQUEST["s11"]; //身軀評語
$s12=$_REQUEST["s12"]; //前胛等級
$s13=$_REQUEST["s13"]; //前胛評語
$s14=$_REQUEST["s14"]; //後臂等級
$s15=$_REQUEST["s15"]; //後臂評語
$s16=$_REQUEST["s16"]; //總體等級
$s17=$_REQUEST["s17"]; //總體評語
$s18=$_REQUEST["s18"]; //父親編號
$s19=$_REQUEST["s19"]; //母親編號
$s20=$_REQUEST["s20"]; //祖父編號
$s21=$_REQUEST["s21"]; //祖母編號
$s22=$_REQUEST["s22"]; //曾祖父編號
$s23=$_REQUEST["s23"]; //曾祖母編號
$VarityS = substr($s1,0,1);
$Ear_NumberS=substr($s1,1);
//echo $VarityS.'-'.$Ear_NumberS;
// substr("abcdef", 2, -1); <= 這樣會輸出 cde，因為程式先從第二個字元開始，取得 cdef 這幾個字，再由取得的字串尾扣掉一個。

//`ID`, `Pig_ID`, `Varity`, `Ear_Number`, `Gender`, `Birthday`, `Body_Level`, `Body_comment`, `Front_Shoulder_Blade_Level`, `Front_Shoulder_Blade_Comment`, `After_Arm_Level`, `After_Arm_Comment`, `Total_Level`, `Total_Comment`, `Numbers_Of_Mother_Fetus`, `Numbers_Of_Brothers_And_Sisters_Total`, `Numbers_Of_Brothers_And_Sisters_Alive`, `Brothers_And_Sisters_Wean_Information`, `First_Time_Mating`, `Days_Of_Born_To_First_Mating`, `Father_Id`, `Mother_Id`, `Grandfather_Id`, `Grandmother_Id`, `Great-Grandfather_Id`, `Great-Grandmother_Id`,  `Eliminate_Date`, `Eliminate_Reason`

$query="INSERT INTO `pig_basic_information`(`Pig_ID`,`Varity`, `Ear_Number`, `Gender`, `Birthday`, `Body_Level`, `Body_comment`, `Front_Shoulder_Blade_Level`, `Front_Shoulder_Blade_Comment`, `After_Arm_Level`, `After_Arm_Comment`, `Total_Level`, `Total_Comment`, `Numbers_Of_Mother_Fetus`, `Numbers_Of_Brothers_And_Sisters_Total`, `Numbers_Of_Brothers_And_Sisters_Alive`, `Brothers_And_Sisters_Wean_Information`, `First_Time_Mating`, `Days_Of_Born_To_First_Mating`, `Father_Id`, `Mother_Id`, `Grandfather_Id`, `Grandmother_Id`, `Great-Grandfather_Id`, `Great-Grandmother_Id`) VALUES ('".$s1."','".$VarityS."','".$Ear_NumberS."','".$s2."','".$s3."','".$s10."','".$s11."','".$s12."','".$s13."','".$s14."','".$s15."','".$s16."','".$s17."','".$s4."','".$s5."','".$s6."','".$s7."','".$s8."','".$s9."','".$s18."','".$s19."','".$s20."','".$s21."','".$s22."','".$s23."')";
//echo $query;
mysql_query($query);
header("Location:information.php?Pig_ID=".$s1);

?>