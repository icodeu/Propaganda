<?PHP
header("Content-type:image/jpeg");
$lottery = $_GET['lottery'];
$number = $_GET['lotteryNumber'];
function mark_text($background, $text, $x, $y, $size) {
	$back = imagecreatefromjpeg($background);
	$color = imagecolorallocate($back, 0, 0, 0);
	imagettftext($back, $size, 0, $x, $y, $color, "./font/fangzheng.ttf", $text);
	imagejpeg($back, NULL, 100);
	imagedestroy($back);
}

function bjtu_pic($background){
	$back = imagecreatefromjpeg($background);
	imagejpeg($back, NULL, 100);
	imagedestroy($back);
}

//	$number = "";
//	$number = rand(0,9);
//	$number .= rand(0,9);
//	$number .= rand(0,9);

	if($lottery==1)
		mark_text("./img/zhongjiangxiaoguotu.jpg", "您的获奖编号为  ".$number, 20, 30, 15);
	else{
		$i = rand(1, 22);
		bjtu_pic("./img/bjtu_" . $i . ".jpg");
	}
?>