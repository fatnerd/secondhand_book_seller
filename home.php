<!DOCTYPE html>
<html><head><meta charset = "utf-8" />
<title>歡迎來到書遊線上公司~~</title>
</head>
<body>
<form method="post" action="">
<center>
<h1><style type=text/css>h1{color:green}</style></h1>
<h1><style type=text/css>h2{color:blue}</style></h1>
<h1><style type=text/css>h3{color:brown}</style></h1>
<h1><style type=text/css>h4{color:maroon}</style></h1>
<h1><style type=text/css>h5{color:black}</style></h1>
<h1><style type=text/css>h6{color:firebrick}</style></h1>
<h1><style type=text/css>h7{color:mintcream}</style></h1>
<h1><style type=text/css>h8{color:darkslategray}</style></h1>
<h6><font face="標楷體" size="7">歡迎來到書遊線上公司~~</font></h6>
</center>
<h4><font face="標楷體" size="6">現在時刻:</font><font size=+3><b>
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

<style>
        html {
            height: 100%;
        }

        body {
            background-image: url(bookbg.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size:cover;
			<?//1280px 589px?>
        }

</style>
<center>
<h5><font face="標楷體" size="7">簡介:</font></h5>
<h8><font face="標楷體" size="5">為了服務學生族群，讓學生在有限預算內，<br>
以最適價格購買所需要的二手書，<br>擬創「書遊線上公司」<br>
作為在學學生二手書交流的市場平台。</hr></font></h8></center>
<section style="margin: 130px;">
<fieldset style="border-radius: 10px; padding: 10px; min-height:100px;">
<legend><center><h7><font face="標楷體" size="6">請選擇以下功能</font></h7></center></legend>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font face="標楷體" size="5">
<input name="new" type="button" id="loginmenber"  class="webgolds flash-button"  
style="width:200px;height:100px;font-family:DFKai-sb;font-size:45px; border:3px chocolate double;background-color:lightblue;" 
value="會員登入" onClick="location.replace('projectmain.php')"/></font>
<br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font face="標楷體" size="5">
<input name="new" type="button" id="newmenber"  class="webgolds flash-button"  
style="width:200px;height:100px;font-family:DFKai-sb;font-size:45px; border:3px chocolate double;background-color:limegreen;" 
value="會員註冊" onClick="location.replace('project1.php')"/></font>

</fieldset>
</form>
