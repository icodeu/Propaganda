<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>保存数据</title>
</head>
<body>
<?php
	$citName = $_POST['citName'];
	$citNumber = $_POST['citNumber'];
	$citTel = $_POST['citTel'];
	$citGroup = $_POST['citGroup'];

	include 'mysql_connect.php';
	//插入student的报名表
	mysql_query("insert into student (citName, citNumber, citTel, citGroup) values ('$citName', '$citNumber', '$citTel', '$citGroup')") or die(mysql_error());
	
	function Post($data, $target) {
	    $url_info = parse_url($target);
	    $httpheader = "POST " . $url_info['path'] . " HTTP/1.0\r\n";
	    $httpheader .= "Host:" . $url_info['host'] . "\r\n";
	    $httpheader .= "Content-Type:application/x-www-form-urlencoded\r\n";
	    $httpheader .= "Content-Length:" . strlen($data) . "\r\n";
	    $httpheader .= "Connection:close\r\n\r\n";
	    //$httpheader .= "Connection:Keep-Alive\r\n\r\n";
	    $httpheader .= $data;
	
	    $fd = fsockopen($url_info['host'], 80);
	    fwrite($fd, $httpheader);
	    $gets = "";
	    while(!feof($fd)) {
	        $gets .= fread($fd, 128);
	    }
	    fclose($fd);
	    return $gets;
	}
		
	$target = "http://sms.106jiekou.com/utf8/sms.aspx";
	$post_data = "account=icodeyou&password=qinaidaqiqi&mobile=".$tel1."&content=".rawurlencode("您的订单编码：【"."恭喜！您成功报名加入团宣".$citGroup."组,期待你面试的精彩表现~】。如需帮助请联系客服。");
	$gets = Post($post_data, $target);
	
	echo "<script language='javascript' type='text/javascript'>";
	echo '
			alert("恭喜，报名成功！");
			var index_url = "index.html";
			window.location.href = index_url;
		';
	echo "</script>";
?>
</body>
</html>