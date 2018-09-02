<?
	$book_id = $_GET["id"];
	session_start();
	if(isset($_POST["send"])){
		$db = @mysqli_connect('localhost','root','A12345678');
		mysqli_select_db($db,"member");
		
		$buyer_account=$_SESSION["username"];
		$sqll = "UPDATE book_member SET buyer_account=NULL,status=2,buy_date=NULL WHERE book_id='" . $book_id . "'" ;
		if(!mysqli_query($db,$sqll)){
					$result = "取消失敗...<br>" . mysqli_error($db);
				}
		else{
			$result = "<font color=blue>取消成功!!</font><br>";
			mysqli_close($db);
		}
		header("Refresh: 0.3;url=buybook.php");
	}
?>

<!DOCTYPE html>
<html><head><meta charset = "utf-8" />
<title>購買取消頁面</title>
</head>
<body>
<form method="post" action="">
<center>
<h1><style type=text/css>h1{color:green}</style></h1>
<h1><style type=text/css>h2{color:blue}</style></h1>
<h1><style type=text/css>h3{color:brown}</style></h1>
<h1><style type=text/css>h4{color:indigo}</style></h1>
<h1><style type=text/css>h5{color:black}</style></h1>

<h1><font face="標楷體" size="7">您確定要取消購買?</font></h1>
<br><br><? print "<a href='buybook.php'>  返回上一頁 </a>" ?><br><br>
<? echo $result ?>
<body background = "f.jpg">
<input type="submit" name="send" value="確認取消購買" />