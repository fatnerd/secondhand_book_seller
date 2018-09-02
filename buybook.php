<?
	session_start();
	$db = mysqli_connect("localhost","root","A12345678");
	if(!$db)
		die("錯誤: 無法連接MySQL伺服器!" . mysqli_connect_error());
	mysqli_select_db($db,"member");
	//die("錯誤: 無法選擇資料庫!" . mysqli_error($db));
	$sql = "SELECT * FROM book_member";
	
	$rows = mysqli_query($db,$sql);
	$num = mysqli_num_rows($rows);//取得記錄數
	$record_per_page = 10;
	if(isset($_GET["Pages"]))
		$pages = $_GET["Pages"];
	else
		$pages = 1;
	$total_pages = ceil($num/$record_per_page);
	$offset=($pages-1)*$record_per_page;
	mysqli_data_seek($rows,$offset);
	mysqli_close($db);
?>
<!DOCTYPE html>
<html><head><meta charset = "utf-8" />
<title>書遊線上公司買書頁面</title>
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
<h1><font face="標楷體" size="7">書遊線上公司買書頁面</font></h1>
<br><br><? print "<a href='projectshop.php'>  回商品首頁 </a>" ?><br><br>
<body background = "f.jpg">
<? echo " " . $_SESSION["name"] . " 您好，您現在在購買介面!<br>"; ?>
<? //echo "您的帳號為:" . $_SESSION["username"] . "<br>";?>
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
<h1><font face="標楷體" size="6">目前書籍清單:</font></h1>
<table border="1" style="border:3px #8B4513 dashed;" >
	<thead>
		<tr>
			<th>書籍編號</th>
			<th>書名</th>
			<th>作者</th>
			<th>ISBN</th>
			<th>價格</th>
			<th>狀態</th>
			<th>書籍上架日期</th>
			<th>是否購買</th>
		</tr>
	</thead>
	<tbody>
	<?
	$i=1;
		if($num > 0){
			
			while($row = mysqli_fetch_array($rows) and $i<=$record_per_page){
				$book_id=$row["book_id"];
				$title=$row["title"];
				$author=$row["author"];
				$ISBN=$row["ISBN"];
				$price=$row["price"];
				$status=$row["status"];
				$buyer_account=$row["buyer_account"];
				$book_date=$row["book_date"];
				echo "<tr>";
				echo "<td><font size=5 face=標楷體>" . $book_id . "</font></td>";
				echo "<td><font size=5 face=標楷體>" . $title . "</font></td>";
				echo "<td><font size=5 face=標楷體>" . $author . "</font></td>";
				echo "<td><font size=5 face=標楷體>" . $ISBN . "</font></td>";
				echo "<td><font size=5 face=標楷體>" . $price . "$</font></td>";
				//echo "<td>" . $buyer_account . "</td>";

				switch($status){
					case 1:echo "<td><font size=5 face=標楷體>已登錄，未送達</font><br></td>";break;
					case 2:echo "<td><font size=5 face=標楷體>已送達，未訂</font><br></td>";break;
					case 3:echo "<td><font size=5 face=標楷體>已訂，未付款</font><br></td>";break;
					case 4:echo "<td><font size=5 face=標楷體>已下架</font><br></td>";break;
				}
				echo "<td><font size=5 face=標楷體>" . $book_date . "</td>";
				echo "<td>";
				
				if($status==1 || $status==4){
					echo "目前無法購買!<br>";
				}
				else{ 
					if($status==3 and strcmp($buyer_account,$_SESSION["username"])!=0 )
					{
						echo "已經被別人訂走了!<br>";
					}
					else if($status==3 and strcmp($buyer_account,$_SESSION["username"])==0 ) 
					{
						echo "<a href='shopcancel.php?id=" . $book_id . "'> 取消購買 </a> ";
					}
					else{
						echo "<a href='shopsecond.php?id=" . $book_id . "'> 購買 </a> ";
					}
				}
				
				echo "</td>";
				echo "</tr>";
				$i++;
			}
		}
		mysqli_free_result($rows);
	?>
	</tbody>
</center>
<figure>
	<img src="buybook.jpg">
</figure>
<?
	if($pages>1){
		echo "<a href='buybook.php?Pages=" . ($pages-1) . "'>上一頁</a>|";
	}
	for($i=1;$i<=$total_pages;$i++)
		if($i!=$pages)
			echo "<a href='buybook.php?Pages=" . $i . "'>" . $i . "</a>";
		else
			echo "$i";
	if($pages<$total_pages)
		echo "|<a href='buybook.php?Pages=" . ($pages+1) . "'>下一頁</a>";
?>
</body>
</html>