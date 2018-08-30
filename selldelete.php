<?
	$book_id = $_GET["id"];
	session_start();
	if(isset($_POST["send"])){
		$db = @mysqli_connect('localhost','root','A12345678');
		mysqli_select_db($db,"member");
		$buyer_account=$_SESSION["username"];
		$sqll = "DELETE FROM book_member WHERE book_id='" . $book_id . "'" ;
		if(!mysqli_query($db,$sqll)){
					$result = "刪除失敗...<br>" . mysqli_error($db);
				}
		else{
			$result = "<font color=blue>刪除成功!!</font><br>";
			mysqli_close($db);
		}
		header("Refresh: 0.3;url=bslist.php");
	}
?>

<!DOCTYPE html>
<html><head><meta charset = "utf-8" />
<title>商品確認刪除頁面</title>
</head>
<body>
<form method="post" action="">
<center>
<h1><style type=text/css>h1{color:green}</style></h1>
<h1><style type=text/css>h2{color:blue}</style></h1>
<h1><style type=text/css>h3{color:brown}</style></h1>
<h1><style type=text/css>h4{color:indigo}</style></h1>
<h1><style type=text/css>h5{color:black}</style></h1>
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
<h1><font face="標楷體" size="7">您確定要刪除此筆賣書紀錄??</font></h1>
<br><br><? print "<a href='bslist.php'>  返回上一頁 </a>" ?><br><br>
<? echo $result ?>
<body background = "f.jpg">
<input type="submit" name="send" value="確認刪除此筆賣書紀錄" />