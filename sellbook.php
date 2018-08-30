<?
session_start();
	//SQL connect
	$error="";
	$result="";
	if(isset($_POST["send"])){
		//$member_id = $_POST["member_id"];//取得表單欄位值
		$title = $_POST["title"];
		$ISBN = $_POST["ISBN"];
		$price = $_POST["price"];
		$author = $_POST["author"];
		$seller_account = $_SESSION["username"];
		if(empty($title)){
			$error = "書名欄位不可空白<br>";
		}
		else{
			if(empty($ISBN)){
				$error .= "ISBN不可為空白<br>";
			}
			else if(empty($price)){
				$error .= "價格不可為空白<br>";
			}
			else if(empty($author)){
			$error .= "書名欄位不可空白<br>";
			}
			else{
				$db = @mysqli_connect('localhost','root','A12345678');
				mysqli_select_db($db,"member");
				$sql = "INSERT INTO book_member" . "(title,ISBN,price,seller_account,author)" . 
				"VALUES('$title','$ISBN','$price','$seller_account','$author')" ;
				
				if(!mysqli_query($db,$sql)){
					$result = "新增記錄失敗...<br>" . mysqli_error($db);
				}
				else{
					$result = "<font color=blue>新增書籍資料成功!!</font><br>";
					$title="";$ISBN="";$price="";$author="";
					header("Refresh: 0.3");
					mysqli_close($db);
				}				
			}
		}
			
	}
	else{
		$title="";$ISBN="";$price="";$author="";
	}
?>
<!DOCTYPE html>
<html><head><meta charset = "utf-8" />
<title>書遊線上公司賣書頁面</title>
</head>
<body>
<form method="post" action="">
<center>

<h1><style type=text/css>h1{color:green}</style></h1>
<h1><style type=text/css>h2{color:blue}</style></h1>
<h1><style type=text/css>h3{color:brown}</style></h1>
<h1><style type=text/css>h4{color:indigo}</style></h1>
<h1><style type=text/css>h5{color:black}</style></h1>

<h1><font face="sans-serif" size="7">SECOND HAND BOOK SELLER</font></h1>
<body background = "f.jpg">
<h4><font face="sans-serif" size="6">TIME:</font><font size=+3><b>
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
<? echo " " . $_SESSION["name"] . " 您好，您現在在書籍販售頁面!<br>"; ?>
<? print "<br><a href='projectshop.php'> 回商品首頁 </a>" ?>
<h1><font face="標楷體" size="6" color="indigo">新增商品資料:</font></h1>
<font color=red>*</font>為必填欄位<br> 
<? echo $error ?>
<font face="標楷體" size="5"><label for="title"><span class="require"><font color=red>*</font></span>書名:</label></font><input type="text" name="title" id="title" value="<? echo $title ?> " required /><br>
<font face="標楷體" size="5"><label for="ISBN"><span class="require"><font color=red>*</font></span>ISBN:</label></font><input type="text" name="ISBN" id="ISBN" value="<? echo $ISBN ?>" required /><br>
<font face="標楷體" size="5"><label for="price"><span class="require"><font color=red>*</font></span>價格:</label></font><input type="text" name="price" id="price" value="<? echo $price ?>" required /><br>
<font face="標楷體" size="5"><label for="author"><span class="require"><font color=red>*</font></span>作者:</label></font><input type="text" name="author" id="author" value="<? echo $author ?>" required /><br>
 
<input type="submit" name="send" value="確認送出" />
<input type="reset" name="send" value="清除" />
</p></hr></center>
<center><? echo $result ?>
	
	<br><br><br>
	<figure>
	<img src="book-sale1.jpg">
	</figure>
</center>
