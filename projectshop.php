<?php
session_start();
if (isset($_POST['Logout']) and $_POST['Logout'] == "true") {
    unset($_SESSION['username']);
    header("Refresh: 0; url=projectmain.php");
    exit;
}
?>
<?
	$db = mysqli_connect("localhost","root","A12345678");
	mysqli_select_db($db,"member");
	$searchname = "SELECT * FROM member_profile WHERE account='" . $_SESSION["username"] . "'";
	$rows = mysqli_query($db,$searchname);
	$row = mysqli_fetch_array($rows);
	$name = $row["name"];
	$username = $row["account"];
	$_SESSION['name'] = $name;
	$_SESSION['username'] = $username;
	mysqli_free_result($rows);
?>
<!DOCTYPE html>
<html><head><meta charset = "utf-8" />
<title>書遊線上公司商品頁面</title>
</head>
<body>
<form method="post" action="">
<center>
<h1><style type=text/css>h1{color:green}</style></h1>
<h1><style type=text/css>h2{color:blue}</style></h1>
<h1><style type=text/css>h3{color:brown}</style></h1>
<h1><style type=text/css>h4{color:indigo}</style></h1>
<h1><style type=text/css>h5{color:black}</style></h1>

<h1><font face="標楷體" size="7">書遊線上公司商品頁面</font></h1>
<h4><font face="標楷體" size="6.5">現在時刻:</font><font size=+3><b>
<script language="JavaScript">
<!-- 
var now,hours,minutes,seconds,timeValue;
function showtime(){
now = new Date();
hours = now.getHours();
minutes = now.getMinutes();
seconds = now.getSeconds();
timeValue = (hours >= 12) ? "下午 " : "上午 ";
timeValue += ((hours > 12) ? hours - 12 : hours) + " 點";
timeValue += ((minutes < 10) ? " 0" : " ") + minutes + " 分";
timeValue += ((seconds < 10) ? " 0" : " ") + seconds + " 秒";
clock.innerHTML = timeValue;
setTimeout("showtime()",1000);
}
showtime();
//-->
</script>
<body onload="showtime();" >
<span id='clock'></span></h4>
</font>
<br><br><br><br><br><br>
<body background = "f.jpg">
<? echo " " . $_SESSION["name"] . " 您好，歡迎光臨!<br>"; ?>
<? //echo "您的帳號為: " . $_SESSION["username"] . "<br>"; ?>
<button type="button" class="webgolds flash-button"  onClick="location.replace('buybook.php')"
style="width:200px;height:100px; border:3px orange double;background-color:pink;" >
<font face="標楷體" size="6">我要買書</font></button>&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;

<button type="button" class="webgolds flash-button"  onClick="location.replace('sellbook.php')"
style="width:200px;height:100px; border:3px orange double;background-color:pink;" >
<font face="標楷體" size="6">我要賣書</font></button>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<button type="button" class="webgolds flash-button"  onClick="location.replace('searchbook.php')"
style="width:200px;height:100px; border:3px orange double;background-color:pink;" >
<font face="標楷體" size="6">搜尋書籍</font></button>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<button type="button" class="webgolds flash-button"  onClick="location.replace('bslist.php')"
style="width:200px;height:100px; border:3px orange double;background-color:pink;" >
<font face="標楷體" size="6">買賣記錄</font></button>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
    <p>&nbsp;<?php echo $name; ?>&nbsp;已登入</p>
    <input type="submit" value="登出"/>
    <input type="hidden" name="Logout" value="true"/>
</form>

</center>
</body>
</html>