<?
	$error="";$result="";
	session_start();
	//die("錯誤: 無法選擇資料庫!" . mysqli_error($db));	
?>
<?
	if(isset($_POST["send"])){
		$sb=$_POST["sb"];
		if(empty($sb))
			$error="書名欄位空白<br>";
		else{
			$db = mysqli_connect("localhost","root","A12345678");
			mysqli_select_db($db,"member");
			$searchtitle = "SELECT * FROM book_member WHERE title like '%". $sb ."%'"; 
			$rows = mysqli_query($db,$searchtitle);
			$num = mysqli_num_rows($rows);//取得記錄數
			mysqli_close($db);			
		}
	}
?>
<!DOCTYPE html>
<html><head><meta charset = "utf-8" />
<title>書遊線上公司搜尋頁面</title>
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

<h1><font face="標楷體" size="7">書遊線上公司搜尋頁面</font></h1>
<br><br><? print "<a href='projectshop.php'>  回商品首頁 </a>" ?><br><br>
<body background = "f.jpg">
<? echo " " . $_SESSION["name"] . " 您好，您現在在搜尋介面!<br>"; ?>
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
	<img src="search_book.jpg">
</figure>
<h2><font face="標楷體" size="6">目前書籍清單:</font></h1>
<h6><font face="標楷體" size="6">請輸入欲搜尋書名:<input type="text" name="sb" id="sb" ><input type="submit" 
name="send" value="搜尋"></font></h6>

<table border="1" style="border:3px #8B4513 dashed;" >
	<thead>
		<tr>
			<th><font size=5 face=標楷體>書籍編號</font></th>
			<th><font size=5 face=標楷體>書名</font></th>
			<th><font size=5 face=標楷體>作者</font></th>
			<th><font size=5 face=標楷體>ISBN</font></th>
			<th><font size=5 face=標楷體>價格</font></th>
			<th><font size=5 face=標楷體>狀態</font></th>
			<th><font size=5 face=標楷體>書籍上架日期</font></th>
			<th><font size=5 face=標楷體>賣方會員帳號</font></th>
		</tr>
	</thead>
	<tbody>
	<?
		if($num > 0){
			
			while($row = mysqli_fetch_array($rows)){
				$book_id=$row["book_id"];
				$title=$row["title"];
				$author=$row["author"];
				$ISBN=$row["ISBN"];
				$price=$row["price"];
				$status=$row["status"];
				$book_date=$row["book_date"];
				$seller_account=$row["seller_account"];
				echo "<tr>";
				echo "<td><font size=5 face=標楷體>" . $book_id . "</font></td>";
				echo "<td><font size=5 face=標楷體>" . $title . "</font></td>";
				echo "<td><font size=5 face=標楷體>" . $author . "</font></td>";
				echo "<td><font size=5 face=標楷體>" . $ISBN . "</font></td>";
				echo "<td><font size=5 face=標楷體>" . $price . "$</font></td>";
				switch($status){
					case 1:echo "<td><font size=5 face=標楷體>已登錄，未送達</font><br></td>";break;
					case 2:echo "<td><font size=5 face=標楷體>已送達，未訂</font><br></td>";break;
					case 3:echo "<td><font size=5 face=標楷體>已訂，未付款</font><br></td>";break;
					case 4:echo "<td><font size=5 face=標楷體>已下架</font><br></td>";break;
				}
				echo "<td><font size=5 face=標楷體>" . $book_date . "</font></td>";
				echo "<td><font size=5 face=標楷體>" . $seller_account . "</font></td>";
				echo "</td>";
				echo "</tr>";
			}
		}
		//mysqli_free_result($rows);
	?>
	</tbody>
</center>
