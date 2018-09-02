<body>
<?
	function checkTwID($id){
		$id = strtoupper($id);
		//建立字母分數陣列
		$headPoint = array(
		'A'=>1,'I'=>39,'O'=>48,'B'=>10,'C'=>19,'D'=>28,
		'E'=>37,'F'=>46,'G'=>55,'H'=>64,'J'=>73,'K'=>82,
		'L'=>2,'M'=>11,'N'=>20,'P'=>29,'Q'=>38,'R'=>47,
		'S'=>56,'T'=>65,'U'=>74,'V'=>83,'W'=>21,'X'=>3,
		'Y'=>12,'Z'=>30
		);
		//建立加權基數陣列
		$multiply = array(8,7,6,5,4,3,2,1);
		//檢查身份字格式是否正確
		if (preg_match("/^[a-zA-Z][1-2][0-9]+$/",$id) AND strlen($id) == 10){
			//切開字串
			$stringArray = str_split($id);
			//取得字母分數(取頭)
			$total = $headPoint[array_shift($stringArray)];
			//取得比對碼(取尾)
			$point = array_pop($stringArray);
			//取得數字部分分數
			$len = count($stringArray);
			for($j=0; $j<$len; $j++){
			$total += $stringArray[$j]*$multiply[$j];
			}
			//計算餘數碼並比對
			$last = (($total%10) == 0 )? 0: (10 - ( $total % 10 ));
			if ($last != $point) {
				return false;
			} 
			else {
				return true;
			}
		}  
		else {
		return false;
		}
}
	//SQL connect
	$error="";
	$result="";
	if(isset($_POST["send"])){
		//$member_id = $_POST["member_id"];//取得表單欄位值
		$name = $_POST["name"];
		$account = $_POST["account"];
		$password = $_POST["password"];
		$year = (int)$_POST["year"];
		$month = (int)$_POST["month"];
		$day = (int)$_POST["day"];
		//$birthday = $_POST["birthday"];
		$sex = $_POST["sex"];
		switch($sex){
			case 1:$sexx="男";break;
			case 2:$sexx="女";break;
		}
		$phone = $_POST["phone"];
		$id_number = $_POST["id_number"];
		if(empty($name)){
			$tool->showmessage("姓名欄位不可空白");
			$error = "姓名欄位不可空白<br>";
		}
		else{
			if(empty($account)){
				$error .= "帳號不可為空白<br>";
			}
			else if(empty($password)){
				$error .= "密碼不可為空白<br>";
			}
			else if(strlen($phone)!=8){
				$error .= "手機號碼必須10碼!<br>";
			}
			else if(!checkTwID($id_number)){
				$error .= "身分證字號格式錯誤!<br>";
			}			
			else{
				$db = @mysqli_connect('localhost','root','A12345678');
				mysqli_select_db($db,"member");
				$sql = "INSERT INTO member_profile" . "(name,account,password,birthday,sex,phone,id_number)" . 
				"VALUES('$name','$account','$password','$year/$month/$day','$sexx','09$phone','$id_number')" ;
				if(!mysqli_query($db,$sql)){
					$result = "新增記錄失敗...<br>" . mysqli_error($db);
				}
				else{
					$result = "<font color=blue>新增會員資料成功!!</font><br>";
					$name="";$account="";$password="";$birthday="";$sex="";$phone="";$id_number="";
					header("Refresh: 0.3");
				}
				mysqli_close($db);
			}
		}
	}
	else{
		$name="";$account="";$password="";$birthday="";$sex="";$phone="";$id_number="";
	}
?>
<!DOCTYPE html>
<html><head><meta charset = "utf-8" />
<title>書由線上公司註冊頁面</title>
</head>
<center>
<h1><style type=text/css>h1{color:green}</style></h1>
<h1><style type=text/css>h2{color:blue}</style></h1>
<h1><style type=text/css>h3{color:brown}</style></h1>
<h1><style type=text/css>h4{color:indigo}</style></h1>
<h1><style type=text/css>h5{color:black}</style></h1>
<h1><style type=text/css>h6{color:red}</style></h1>

<h1><font face="標楷體" size="7">書遊線上公司註冊頁面</font></h1>
</center>
<body background = "light-blue-abstract.jpg">

<center>
<hr align="left" width="2000" size="5"><br>
<form method="post" action="">
<h3><font face="標楷體" size="6">會員註冊</font><br>
<font color=red>*</font>為必填欄位<br>
<h6><font face="標楷體" size="6"><? echo $error ?></font></h6>
<font face="標楷體" size="5"><label for="name"><span class="require"><font color=red>*</font></span>姓名:</label></font><input type="text" name="name" id="name" value="<? echo $name ?>" required /><br>
<font face="標楷體" size="5"><label for="account"><span class="require"><font color=red>*</font></span>帳號:</label></font><input type="text" name="account" id="account" value="<? echo $account ?>" required /><br>
<font face="標楷體" size="5"><label for="password"><span class="require"><font color=red>*</font></span>密碼:</label></font><input type="password" name="password" id="password" value="<? echo $password ?>" required /><br>



<table>
<tr>
    <td> <font face="標楷體" size="5"><label for="birthday">生日:</label></font>
 <select id="year" onchange="changeday()" name="year"> <option value="">年</option></select><select id="month" name="month"  onchange="changeday()"><option value="">月</option> </select><select id="day" name="day" ><option value="">日</option> </select>
    <script type="text/javascript" language="javascript">
                            var curdate = new Date();
                            var year = document.getElementById("year");
                            var month = document.getElementById("month");
                            var day = document.getElementById("day");
                            //
                            function add() {
                                var curyear = curdate.getFullYear();
                                var minyear = curyear - 100;
                                var maxyear = curyear - 0;
							for (maxyear; maxyear >= minyear; maxyear = maxyear - 1) {
                                    year.options.add(new Option(maxyear, maxyear));
                                }
                                for (var mindex = 1; mindex <= 12; mindex++) {
                                    month.options.add(new Option(mindex, mindex));
                                }
                            }

                            //
                            function leapyear(intyear) {
                                var result = false;
                                if (((intyear % 400 == 0) && (intyear % 100 != 0)) || (intyear % 4 == 0)) {
                                    result = true;
                                }
                                else {
                                    result = false;
                                }
                                return result;
                            }
                            //
                            function addday(maxday) {
                                day.options.length = 1;
                                for (var dindex = 1; dindex <= maxday; dindex++) {
                                    day.options.add(new Option(dindex, dindex));
                                }
                            }
                            function changeday() {
                                if (year.value == null || year.value == "") {
                                    alert("請先選擇年份！");
                                    return false;
                                }
                                else {
                                    if (month.value == 1 || month.value == 3 || month.value == 5 || month.value == 7 || month.value == 8 || month.value == 10 || month.value == 12) {
                                        addday(31);
                                    }
                                    else {
                                        if (month.value == 4 || month.value == 6 || month.value == 9 || month.value == 11) {
                                            addday(30);
                                        }
                                        else {
                                            if (leapyear(year.value)) {
                                                addday(29);
                                            }
                                            else {
                                                addday(28);
                                            }
                                        }
                                    }
                                }
                            }
                            window.onload = add;
                        </script></td>
  </tr>
</table>
</table>

<? //<input type="text" name="birthday" id="birthday" value="<? echo $birthday " /><br>  ?>
<font face="標楷體" size="5">性別:</font>
<input type="radio" name="sex" id="boy" value="1" checked/ >
<label for="boy">男</label>
<input type="radio" name="sex" id="girl" value="2" checked/ >
<label for="boy">女</label>
<br>
<font face="標楷體" size="5"><label for="phone"><span class="require"><font color=red>*</font></span>手機:09-</label></font><input type="text" name="phone" id="phone" value="<? echo $phone ?>" required /><br>
<font face="標楷體" size="5"><label for="id_number"><span class="require"><font color=red>*</font></span>身分證字號:</label></font><input type="text" name="id_number" id="id_number" value="<? echo $id_number ?>" required /><br></h3>
 
<input type="submit" name="send" class="webgolds flash-button" 
style="width:100px;height:50px;font-family:DFKai-sb;font-size:20px; border:3px  single;background-color:;" value="確認送出" />
<input type="reset" name="send" class="webgolds flash-button" 
style="width:100px;height:50px;font-family:DFKai-sb;font-size:20px; border:3px  single;background-color:;" value="清除" />
</p></hr></center>
<center><h6><? echo "<font face=標楷體 size=6> " . $result; ?></h6>
<h3><font face="標楷體" size="6"><? print "<a href='home.php'> 回主頁面 </a>" ?></font></h3>

</center>
</body>
</html>