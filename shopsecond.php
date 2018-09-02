<?
	session_start();
	$book_id = $_GET["id"];
	$db=mysqli_connect("localhost","root","A12345678");
	mysqli_select_db($db,"member");
	$sql="SELECT * FROM book_member WHERE book_id='" . $book_id . "'";
	$rows=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($rows);
	mysqli_free_result($rows);
	mysqli_close($db);
?>
<?
	if(isset($_POST["send"])){
		$db = @mysqli_connect('localhost','root','A12345678');
		mysqli_select_db($db,"member");
		$buyer_account=$_SESSION["username"];
		$sqll = "UPDATE book_member SET buyer_account='$buyer_account',status=3 WHERE book_id='" . $book_id . "'" ;
		if(!mysqli_query($db,$sqll)){
					$result = "購買失敗...<br>" . mysqli_error($db);
				}
		else{
			$result = "<font color=blue>購買成功!!</font><br>";
		}
		header("Refresh: 0.3");
	}
?>
<!DOCTYPE html>
<html><head><meta charset = "utf-8" />
<title>購買完成頁面</title>
</head>
<body>
<form method="post" action="">
<center>
<h1><style type=text/css>h1{color:green}</style></h1>
<h1><style type=text/css>h2{color:blue}</style></h1>
<h1><style type=text/css>h3{color:brown}</style></h1>
<h1><style type=text/css>h4{color:indigo}</style></h1>
<h1><style type=text/css>h5{color:black}</style></h1>

<h1><font face="標楷體" size="7">購買確認!!</font></h1>
<br><br><? print "<a href='buybook.php'>  返回上一頁 </a>" ?><br><br>
<? echo $result ?>
<body background = "f.jpg">
<table border="1" style="border:3px #8B4513 dashed;" >
<h1>詳細圖書資料</h1><hr/>

<u1>
	<? echo "<tr>"; ?>
	<? echo "<td>書籍編號:" . $book_id . "</td>"?>
	<? echo "<td>書名:" . $row[1] . "</td>"?>
	<? echo "<td>作者:" . $row[2] . "</td>"?>
	<? echo "<td>ISBN:" . $row[3] . "</td>" ?>
	<? echo "<td>價格:" . $row[4] . "</td>" ?><?
	$status=$row[5];
	
	switch($status){
					case 1:echo "<td>狀態:已登錄，未送達<br></td>";break;
					case 2:echo "<td>狀態:已送達，未訂<br></td>";break;
					case 3:echo "<td>狀態:已訂，未付款<br></td>";break;
					case 4:echo "<td>狀態:已下架<br></td>";break;
				}?>
	<? echo "<td>賣方會員帳號:" . $row[6] . "</td>" ?>
	<? echo "</tr>"; ?>
</u1>
<br>
<? if($status!=1 and $status!=2){
	echo "已被訂或者下架!<br>";
}
else{?>
<input type="submit" name="send" value="確認購買" /><?
}
?>
</body></html>