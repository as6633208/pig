<?php
$target_path = "img/pig-img/"; //指定上傳資料夾
// 上傳成功
if( $_FILES["uploadFile"]["error"] == 0 )
{
	/*echo "File Temp: " . $_FILES["uploadFile"]["tmp_name"] . "<br>";
	echo "File Name: " . $_FILES["uploadFile"]["name"] . "<br>";
	echo "File Type: " . $_FILES["uploadFile"]["type"] . "<br>";
	echo "File Size: " . $_FILES["uploadFile"]["size"] . "<br>";*/

    // 將檔案從暫存區搬到你指定的目錄中
   // move_uploaded_file( $_FILES["uploadFile"]["tmp_name"], $target_path.$_FILES["uploadFile"]["name"] );
	move_uploaded_file($_FILES['uploadFile']['tmp_name'], $target_path.iconv('utf-8','big5', $_GET["Pig_ID"].".jpg"));
	echo '<script>';
	echo 'alert("上傳成功");';
	echo 'window.close();';
	echo '</script>';

}
// 上傳失敗 (排除 "沒有上傳檔案" 因素)
else if( $_FILES["uploadFile"]["error"] <> 4 )
{
	//echo $_FILES["uploadFile"]["name"] . " 檔案上傳失敗";

	echo '<script>';
	echo 'alert("上傳失敗 請重新上傳");';
	echo 'window.close();';
	echo '</script>';
}
?>

