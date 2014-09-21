<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css">
<title>保存数据</title>
</head>
<body>
<?php
	$stuNum = $_POST['stuNum'];
	$lotteryNumber = $_POST['lotteryNumber'];
	include 'mysql_connect.php';
	$result = mysql_query("SELECT COUNT(*) FROM lottery WHERE stuNum='$stuNum'");
	$row = mysql_fetch_array($result);
	if($row[0]==0){//该用户第一次中奖
		mysql_query("INSERT INTO lottery(stuNum) VALUES ('$stuNum')") or die(mysql_error());
	}else{//该用户第二次中奖 直接返回吧。。。
		echo "<script language='javascript' type='text/javascript'>";
		echo '
			alert("您运气太好了，已经中奖过一次了，把更多的机会留给其他同学吧~~~");
			var index_url = "index.php";
			window.location.href = index_url;
			';
		echo "</script>";
	}
	echo "<script language='javascript' type='text/javascript'>";
	echo '
			var lottery_url = "lottery_back.php?lotteryNumber='.$lotteryNumber.'"'.';
			window.location.href = lottery_url;
		';
	echo "</script>";
?>
</body>
</html>