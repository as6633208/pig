<!DOCTYPE html>
<html>
<title>上傳照片</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="./css//w3.css">
<script type="text/javascript">
	window.onload = function()
	{
		document.getElementById('id01').style.display='block';
	}
</script>
<body>
	<div class="w3-container">
		<div id="id01" class="w3-modal">
			<div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:800px">
				<div class="w3-center"><br>
					<img src="img/images.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
				</div>

				<form action="upload.php?Pig_ID=<?php echo $_GET["Pig_ID"];?>" method="post" enctype="multipart/form-data" class="w3-container">
					<div class="w3-section">
						<input name="uploadFile" type="file"/>
						<input class="w3-btn w3-red w3-right" type="submit" value="上傳檔案" />
						<p>上傳檔案 (【請使用jpg格式上傳】檔案最大容量：5MB)</p>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>

