<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" ;>

    <meta charset="UTF-8">
    <title>生活日誌</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/w3-theme-teal.css">
    <link rel="stylesheet" href="./css//w3.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/hot-sneaks/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
    <link href='./jquery/jquery-ui-timepicker-addon.css' rel='stylesheet'>
    <script type="text/javascript" src="./jquery/jquery-ui-timepicker-addon.js"></script>
    <script type='text/javascript' src='./jquery/jquery-ui-sliderAccess.js'></script>
    <script language="JavaScript">

        $(document).ready(function () {

            $.datepicker.regional['zh-TW'] = {

                dayNames: ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"],

                dayNamesMin: ["日", "一", "二", "三", "四", "五", "六"],

                monthNames: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],

                monthNamesShort: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],

                prevText: "上月",

                nextText: "次月",

                weekHeader: "週"

            };

            $.timepicker.regional['zh-TW'] = {

                timeOnlyTitle: "選擇時分秒",

                timeText: "時間",

                hourText: "時",

                minuteText: "分",

                timezoneText: "時區",

                currentText: "現在時間",

                closeText: "確定",

                amNames: ["上午", "AM", "A"],

                pmNames: ["下午", "PM", "P"]

            };

            $.datepicker.setDefaults($.datepicker.regional["zh-TW"]);

            $.timepicker.setDefaults($.timepicker.regional["zh-TW"]);

            $("#datetimepicker1").datetimepicker({
                dateFormat: "yy-mm-dd",

                timeFormat: "HH:mm",

                showSecond: false

            });

        });

    </script>
    <script language="JavaScript">

        $(document).ready(function () {

            $.datepicker.regional['zh-TW'] = {

                dayNames: ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"],

                dayNamesMin: ["日", "一", "二", "三", "四", "五", "六"],

                monthNames: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],

                monthNamesShort: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],

                prevText: "上月",

                nextText: "次月",

                weekHeader: "週"

            };

            $.timepicker.regional['zh-TW'] = {

                timeOnlyTitle: "選擇時分秒",

                timeText: "時間",

                hourText: "時",

                minuteText: "分",

                timezoneText: "時區",

                currentText: "現在時間",

                closeText: "確定",

                amNames: ["上午", "AM", "A"],

                pmNames: ["下午", "PM", "P"]

            };

            $.datepicker.setDefaults($.datepicker.regional["zh-TW"]);

            $.timepicker.setDefaults($.timepicker.regional["zh-TW"]);

            $("#datetimepicker2").datetimepicker({
                dateFormat: "yy-mm-dd",

                timeFormat: "HH:mm",

                showSecond: false

            });

        });

    </script>
    <style type="text/css">


        .w3-sidenav a {
            padding: 16px;
            font-weight: bold
        }
    </style>
    <?php

    include("connect.php");

    ?>
</head>

<body>
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
<a href="decision1.php">淘汰決策</a>
<a href="predict.php">指數預測</a>
<div class="w3-accordion">
    <a onclick="myAccordion(&#39;demo4&#39;)" href="javascript:void(0)">環境監控<i class="fa fa-caret-down"></i></a>
    <div id="demo4" class="w3-accordion-content w3-animate-left w3-padding">
      <a href="surroundings.php">分娩舍(母豬)</a>
      <a href="surroundings2.php">保育舍(小豬)</a>
    </div>
</div>
</nav>

<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
     id="myOverlay"></div>
<div class="w3-main" style="margin-left:250px;">
    <div id="myTop" class="w3-top w3-container w3-padding-16 w3-theme w3-large"><i
            class="fa fa-bars w3-opennav w3-hide-large w3-xlarge w3-margin-left w3-margin-right"
            onclick="w3_open()"></i> <span id="myIntro" class="w3-hide">生活日誌</span></div>
    <div class="w3-container w3-padding-32" style="padding-left:32px">
        <hr>
        <br>
        <h2>生活日誌</h2>
        <br>
        <hr>
        <div class="w3-center" style="padding-bottom:32px">
            <button class="w3-btn w3-black " onclick="javascript:location.href='search_lifelog.php'">餵養紀錄</button>
            <button class="w3-btn w3-black" style="display:none" onclick="currentDiv(2)">用藥紀錄</button>
            <button class="w3-btn w3-black" onclick="javascript:location.href='search_lifelog2.php'">疫苗施打</button>
            <button class="w3-btn w3-black" onclick="javascript:location.href='search_lifelog3.php'">交配紀錄</button>
            <button class="w3-btn w3-red" onclick="javascript:location.href='search_lifelog4.php'">生長資訊</button>
            <button class="w3-btn w3-black" onclick="javascript:location.href='search_lifelog5.php'">其他紀錄</button>
        </div>
        <div class="w3-content">

            <div class="mySlides  w3-animate-left" style="width:100%">
                <p style="padding-left:32px">可輸入時間進行篩選</p>
                <form action="search_lifelog4.php" method="post">
				紀錄時間
                    <input class="w3-input w3-border w3-round-large" name="key" type="date" id="key" value=""/>
					豬隻編號
                    <input class="w3-input w3-border w3-round-large" name="key1" type="text" id="key1" value=""/>
                    <input type="submit" class="w3-input w3-border w3-round-large w3-red">
                    <?php
                    $key = $_POST[key];
                    $key1 = $_POST[key1];
                    ?>
                </form>
                <div class="w3-container w3-sand w3-padding-32">
                    <div class="w3-col s12 m12">
                        <form action="update_lifelog.php?id=5" method="post">
                            <input class="w3-input w3-border w3-round-large w3-green" type="submit" value="修改"/>

                            <table class="w3-table" id="store5">
                                <tr>
                                    <th class="w3-blue w3-center">豬隻編號</th>
                                    <th class="w3-blue w3-center">紀錄時間</th>
                                    <th class="w3-blue w3-center">體重</th>
                                    <th class="w3-blue w3-center">體型</th>
                                </tr>
                                <?php
                                if ($key == null && $key1 == null) {
                                    $sql_basic = "SELECT * FROM `grow_up_record`";
                                }
                                if ($key != null) {
                                    $sql_basic = "SELECT * FROM `grow_up_record` where DateTime LIKE '" . $key . "%'";
                                }
                                if ($key1 != null) {
                                    $sql_basic = "SELECT * FROM `grow_up_record` where Pig_ID='" . $key1 . "'";
                                }
                                $result_basic = mysql_query($sql_basic);
                                while ($row_basic = mysql_fetch_array($result_basic)) {

                                    ?>
                                    <tr>
                                        <input type="hidden" name="t0[]" value="<?php echo $row_basic['ID']; ?>">
                                        <td><input class="w3-input w3-border w3-round-large" type="text" name="t1[]"
                                                   value="<?php echo $row_basic['Pig_ID']; ?>" disabled></td>
                                        <td><input class="w3-input w3-border w3-round-large" type="text" name="t2[]"
                                                   value="<?php echo $row_basic['DateTime']; ?>"></td>
                                        <td><input class="w3-input w3-border w3-round-large" type="text" name="t3[]"
                                                   value="<?php echo $row_basic['Weight']; ?>"></td>
                                        <td><input class="w3-input w3-border w3-round-large" type="text" name="t4[]"
                                                   value="<?php echo $row_basic['Body_Lenth']; ?>"></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </form>
                    </div>
                </div>
            </div>


            <hr>
            <br>
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

        window.onscroll = function () {
            myFunction()
        };

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
    <script type="text/javascript">
        function onSearch(obj) {//js函数开始
            setTimeout(function () {//因为是即时查询，需要用setTimeout进行延迟，让值写入到input内，再读取
                var storeId = document.getElementById('store');//获取table的id标识
                var rowsLength = storeId.rows.length;//表格总共有多少行
                var key = obj.value;//获取输入框的值
                var searchCol = 3;//要搜索的哪一列，这里是第一列，从0开始数起
                for (var i = 1; i < rowsLength; i++) {//按表的行数进行循环，本例第一行是标题，所以i=1，从第二行开始筛选（从0数起）
                    var searchText = storeId.rows[i].cells[searchCol].innerHTML;//取得table行，列的值
                    if (searchText.match(key)) {//用match函数进行筛选，如果input的值，即变量 key的值为空，返回的是ture，
                        storeId.rows[i].style.display = '';//显示行操作，
                    } else {
                        storeId.rows[i].style.display = 'none';//隐藏行操作
                    }
                }
            }, 200);//200为延时时间
        }
    </script>
    <script type="text/javascript">
        function onSearch2(obj) {//js函数开始
            setTimeout(function () {//因为是即时查询，需要用setTimeout进行延迟，让值写入到input内，再读取
                var storeId = document.getElementById('store');//获取table的id标识
                var rowsLength = storeId.rows.length;//表格总共有多少行
                var key = obj.value;//获取输入框的值
                var searchCol = 0;//要搜索的哪一列，这里是第一列，从0开始数起
                for (var i = 1; i < rowsLength; i++) {//按表的行数进行循环，本例第一行是标题，所以i=1，从第二行开始筛选（从0数起）
                    var searchText = storeId.rows[i].cells[searchCol].innerHTML;//取得table行，列的值
                    if (searchText.match(key)) {//用match函数进行筛选，如果input的值，即变量 key的值为空，返回的是ture，
                        storeId.rows[i].style.display = '';//显示行操作，
                    } else {
                        storeId.rows[i].style.display = 'none';//隐藏行操作
                    }
                }
            }, 200);//200为延时时间
        }
    </script>
    <script type="text/javascript">
        function onSearch3(obj) {//js函数开始
            setTimeout(function () {//因为是即时查询，需要用setTimeout进行延迟，让值写入到input内，再读取
                var storeId = document.getElementById('store3');//获取table的id标识
                var rowsLength = storeId.rows.length;//表格总共有多少行
                var key = obj.value;//获取输入框的值
                var searchCol = 2;//要搜索的哪一列，这里是第一列，从0开始数起
                for (var i = 1; i < rowsLength; i++) {//按表的行数进行循环，本例第一行是标题，所以i=1，从第二行开始筛选（从0数起）
                    var searchText = storeId.rows[i].cells[searchCol].innerHTML;//取得table行，列的值
                    if (searchText.match(key)) {//用match函数进行筛选，如果input的值，即变量 key的值为空，返回的是ture，
                        storeId.rows[i].style.display = '';//显示行操作，
                    } else {
                        storeId.rows[i].style.display = 'none';//隐藏行操作
                    }
                }
            }, 200);//200为延时时间
        }
    </script>
    <script type="text/javascript">
        function onSearch4(obj) {//js函数开始
            setTimeout(function () {//因为是即时查询，需要用setTimeout进行延迟，让值写入到input内，再读取
                var storeId = document.getElementById('store4');//获取table的id标识
                var rowsLength = storeId.rows.length;//表格总共有多少行
                var key = obj.value;//获取输入框的值
                var searchCol = 0;//要搜索的哪一列，这里是第一列，从0开始数起
                for (var i = 1; i < rowsLength; i++) {//按表的行数进行循环，本例第一行是标题，所以i=1，从第二行开始筛选（从0数起）
                    var searchText = storeId.rows[i].cells[searchCol].innerHTML;//取得table行，列的值
                    if (searchText.match(key)) {//用match函数进行筛选，如果input的值，即变量 key的值为空，返回的是ture，
                        storeId.rows[i].style.display = '';//显示行操作，
                    } else {
                        storeId.rows[i].style.display = 'none';//隐藏行操作
                    }
                }
            }, 200);//200为延时时间
        }
    </script>
    <script type="text/javascript">
        function onSearch5(obj) {//js函数开始
            setTimeout(function () {//因为是即时查询，需要用setTimeout进行延迟，让值写入到input内，再读取
                var storeId = document.getElementById('store5');//获取table的id标识
                var rowsLength = storeId.rows.length;//表格总共有多少行
                var key = obj.value;//获取输入框的值
                var searchCol = 1;//要搜索的哪一列，这里是第一列，从0开始数起
                for (var i = 1; i < rowsLength; i++) {//按表的行数进行循环，本例第一行是标题，所以i=1，从第二行开始筛选（从0数起）
                    var searchText = storeId.rows[i].cells[searchCol].innerHTML;//取得table行，列的值
                    if (searchText.match(key)) {//用match函数进行筛选，如果input的值，即变量 key的值为空，返回的是ture，
                        storeId.rows[i].style.display = '';//显示行操作，
                    } else {
                        storeId.rows[i].style.display = 'none';//隐藏行操作
                    }
                }
            }, 200);//200为延时时间
        }
    </script>
    <script type="text/javascript">
        function onSearch6(obj) {//js函数开始
            setTimeout(function () {//因为是即时查询，需要用setTimeout进行延迟，让值写入到input内，再读取
                var storeId = document.getElementById('store6');//获取table的id标识
                var rowsLength = storeId.rows.length;//表格总共有多少行
                var key = obj.value;//获取输入框的值
                var searchCol = 1;//要搜索的哪一列，这里是第一列，从0开始数起
                for (var i = 1; i < rowsLength; i++) {//按表的行数进行循环，本例第一行是标题，所以i=1，从第二行开始筛选（从0数起）
                    var searchText = storeId.rows[i].cells[searchCol].innerHTML;//取得table行，列的值
                    if (searchText.match(key)) {//用match函数进行筛选，如果input的值，即变量 key的值为空，返回的是ture，
                        storeId.rows[i].style.display = '';//显示行操作，
                    } else {
                        storeId.rows[i].style.display = 'none';//隐藏行操作
                    }
                }
            }, 200);//200为延时时间
        }
    </script>
</body>
</html>