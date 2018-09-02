<?
	$error="";$result="";
	session_start();
?>
<?
	$db = mysqli_connect("localhost","root","A12345678");
	mysqli_select_db($db,"member");
	$searchname = "SELECT * FROM book_member WHERE seller_account='" . $_SESSION["username"] . "'";
	$ibuy = "SELECT * FROM book_member WHERE buyer_account='" . $_SESSION["username"] . "'";
	$rows = mysqli_query($db,$searchname);
	$rowss = mysqli_query($db,$ibuy);
	$num = mysqli_num_rows($rows);//取得記錄數
	$nums = mysqli_num_rows($rowss);
	mysqli_close($db);
?>
<!DOCTYPE html>
<html><head><meta charset = "utf-8" />
<title>您的買賣清單</title>
</head>
<body>
<form method="post" action="">
<center>
<h1><style type=text/css>h1{color:green}</style></h1>
<h1><style type=text/css>h2{color:blue}</style></h1>
<h1><style type=text/css>h3{color:brown}</style></h1>
<h1><style type=text/css>h4{color:indigo}</style></h1>
<h1><style type=text/css>h5{color:black}</style></h1>
<h1><style type=text/css>h6{color:darkgreen}</style></h1>

<h1><font face="標楷體" size="7">您的買賣清單</font></h1>
<br><br><? print "<a href='projectshop.php'>  回商品首頁 </a>" ?><br><br>
<body background = "f.jpg">
<? echo " " . $_SESSION["name"] . " 您好，您現在在個人買賣清單介面!<br>" ; ?>
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
<figure>
	<img src="rec_book.jpg">
</figure>
<h2><font face="標楷體" size="6">目前您的買賣清單:</font></h1>

<table border="1" style="border:3px #8B4513 dashed;" >
	<thead>
		<tr>
			<th><font size=5 color=red>您賣的書以及ISBN</font></th>
			<th><font size=5 color=red> 刪除 </font></th>
		</tr>
	</thead>
	<tbody>
	<?
		if($num > 0){
			while($row = mysqli_fetch_array($rows)){
				$title=$row["title"];
				$ISBN=$row["ISBN"];
				$book_id=$row["book_id"];
				echo "<tr>";
				echo "<td><font size=5 face=標楷體> " . $title . " || ". $ISBN . "</font></td>";
				echo "<td><a href='selldelete.php?id=" . $book_id . "'>是否刪除</a></td>";
				echo "</tr>";
			}
		}
		mysqli_free_result($rows);
	?>
	</tbody>
	<thead>
		<tr>
			<th><font size=5 color=red>您買的書以及ISBN</font></th>
		</tr>
	</thead>
	<tbody>
	<?
		if($nums > 0){
			while($r = mysqli_fetch_array($rowss)){
				$ttitle=$r["title"];
				$IISBN=$r["ISBN"];
				echo "<tr>";
				echo "<td><font size=5 face=標楷體>" . $ttitle . " || ". $IISBN . "</font></td>";
				echo "</tr>";
			}
		}
		mysqli_free_result($rowss);
	?>
	</tbody>
</center>
