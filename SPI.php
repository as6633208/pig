<?php
 
include("connect.php");
$sql_SPI = "SELECT * FROM `birth_record` WHERE `Sow_ID` = '".$_REQUEST["Sow_ID"]."'AND `Birth_Date`<= '".$_REQUEST["Birth_Date"]."' ORDER BY `Birth_Date` DESC";
$result_SPI = mysql_query($sql_SPI);
$num=mysql_num_rows($result_SPI);
$array[$num][10] = array();
$count = 0;
while($row_SPI = mysql_fetch_array($result_SPI))
{
	$array[$count][0] = $row_SPI['ID'];
	$array[$count][1] = $row_SPI['Sow_ID'];
	$array[$count][2] = $row_SPI['Numbers_Of_Piggy_Alive'];
	$array[$count][3] = $row_SPI['Total_Wean_Piggy_Weight'];
	$array[$count][4] = $row_SPI['Numbers_Of_Fetus'];
	$array[$count][5] = $row_SPI['Birth_Date'];
	$Numbers_Of_Piggy += $array[$count][2];
	$Weight_Of_Piggy += $array[$count][3];
	$count++;
}
$Avg_Numbers_Of_Piggy = round(($Numbers_Of_Piggy/$count),2);
$Avg_Weight_Of_Piggy = round(($Weight_Of_Piggy/$count),2);
for($i=0;$i<$count;$i++)
{
	$SPI = 100+6.5*($array[$i][2]-$Avg_Numbers_Of_Piggy)+2.2*($array[$i][3]-$Avg_Weight_Of_Piggy);
	$array[$i][6] = $SPI;
	$Avg_SPI += $SPI;
}
$Avg_SPI = round(($Avg_SPI/$count),2);
for($i=0;$i<$count;$i++)
{
	$B = number_format(($array[$i][4]*0.25)/(1+($array[$i][4]-1)*0.25),2);
	$array[$i][7] = $B;
	$C = number_format(($array[$i][4]*0.2)/(1+($array[$i][4]-1)*0.25),2);
	$array[$i][8] = $C;
	$MPSP = 100+$B*($Avg_SPI-100);
	$array[$i][9] = $MPSP;
	$BVSP = 100+$C*($Avg_SPI-100);
	$array[$i][10] = $BVSP;
}
for($i=0;$i<$count;$i++)
{
	$sql_query = "UPDATE `birth_record` SET ";
	$sql_query .= "`SPI`='".$array[$i][6]."',";
	$sql_query .= "`MPSP`='".$array[$i][9]."',";
	$sql_query .= "`BVSP`='".$array[$i][10]."' ";
	$sql_query .= "WHERE `Sow_ID`= '".$array[$i][1]."' AND `Birth_Date` = '".$array[$i][5]."'";	
	echo $sql_query."<br>";
	mysql_query($sql_query);
}
header("Location:production_query.php");
?>