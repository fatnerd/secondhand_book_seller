<?php session_start(); ?>
<!DOCTYPE html>
<html><head><meta charset = "utf-8" />
<title>書遊線上公司登入畫面</title>
</head>
<body>
<form method="post" action="">
<center>
<h1><style type=text/css>h1{color:green}</style></h1>
<h1><style type=text/css>h2{color:blue}</style></h1>
<h1><style type=text/css>h3{color:brown}</style></h1>
<h1><style type=text/css>h4{color:indigo}</style></h1>
<h1><style type=text/css>h5{color:black}</style></h1>

<h1><font face="標楷體" size="7">書遊線上公司登入首頁</font></h1>
</center>
<?
	$host="localhost";
	$user="root";
	$ps="A12345678";
	$dbase="member";
	$account="";
	$password="";
	$result="";
	//$db = @mysqli_connect('localhost','root','1111');
	//mysqli_select_db($db,"member");
	if(isset($_POST["uname"])){
		$account = $_POST["uname"];
	}
	if(isset($_POST["upass"])){
		$password = $_POST["upass"];
	}
	//檢查帳密是否有輸入資料
	if($account!="" and $password!=""){
		$link=mysqli_connect('localhost','root','A12345678');
		mysqli_select_db($link,"member");
		//設定SQL字串，並送出查詢
		$sql_str = "select * from member_profile where account='".$account."' AND password='".$password."'";
		$result=mysqli_query($link,$sql_str);
		
		if(mysqli_fetch_row($result)!=Null){
			$_SESSION['username'] = $account;
			header("Location:projectshop.php");
		}
		else{
			$result = "<font color=red>帳號或密碼輸入錯誤，請重新輸入!!</font>";
		}
	}
?>
<body background = "wood.jpg">
<h3><font face="標楷體" size="6.5">現在時刻:</font><font size=+3><b>
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
<span id='clock'></span>
</font>
<center>
<h3><font face="標楷體" size="5"><? print "<a href='home.php'> 回主頁面 </a>" ?></font></h3>
<form>
<section style="margin: 10px;">
<fieldset style="border-radius: 10px; padding: 10px; min-height:100px;">
<h2><font face="標楷體" size="7"><legend>會員登入</legend></font><br>
<p align="center"><font face="標楷體" size="5">帳號:
<input type="text" name="uname" /><br></p>
<p align="center">密碼:
	<input type="password" name="upass" /></p><br>
	<? print $result . "<br>"; ?>
<input type="submit" name="set" class="webgolds flash-button" 
style="width:100px;height:50px;font-family:DFKai-sb;font-size:20px; border:3px  single;background-color:;" 
value="登入">
<input type="reset" name="set" class="webgolds flash-button" 
style="width:105px;height:50px;font-family:DFKai-sb;font-size:20px; border:3px  duble;background-color:lightcorol;"
value="清除重設">
</fieldset></form></p></center></font>

</body>
</html>