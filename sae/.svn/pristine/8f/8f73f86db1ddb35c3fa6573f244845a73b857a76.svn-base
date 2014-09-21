<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <title>报名来团宣就有精美小礼品！</title>
    <style type="text/css">

        #lotteryContainer {
			position: absolute;
        }
        #drawPercent {
            color:#F60;
        }
    </style>
    <script>
        window.onload = function () {
        	document.getElementById('button').style.display="none";
        	document.getElementById('returnBtn').style.display="none";
        	var randNum=Math.floor(Math.random()*20)+1;
        	var lotteryNumber = Math.floor(Math.random()*1000)+1;
        	document.getElementById('lotteryNumber').value = lotteryNumber;
        	//document.getElementById('randNum').value = randNum;
            var lottery = new Lottery('lotteryContainer', '#CCC', 'color', 300, 100, drawPercent);
            var picUrl = '';
            if (randNum<15)
            	picUrl = 'generate.php?lottery=1&lotteryNumber='+lotteryNumber;
            else
             	picUrl = 'generate.php?lottery=0&lotteryNumber='+lotteryNumber;
            lottery.init(picUrl, 'image');

            var drawPercentNode = document.getElementById('drawPercent');

			var notify_flag = false;
            function drawPercent(percent) {
                drawPercentNode.innerHTML = percent + '%';
                //刮开70%以上即可
                if(notify_flag==false){
	                if(percent>70){
	                	if(randNum<15){
	                		//获得学号
	                		var stuNum = prompt("恭喜您获得团宣提供的精美小礼品一份，请输入您的学号：");
	                		while (stuNum=="")
	                			stuNum = prompt("恭喜您获得团宣提供的精美小礼品一份，请输入您的学号：");
	                			
	                		document.getElementById('stuNum').value = stuNum;
	  						document.getElementById('button').style.display="block";
	                	}else{
	                		alert('很遗憾此次没有获奖，分享到朋友圈后会再获得一次刮奖机会~');
	                		document.getElementById('returnBtn').style.display="block";
	                		//加上一段话
	                		//....
	                	}
	                	notify_flag = true;
	                }
	            }
            }
        }

    </script>
    <script src="js/Lottery.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
	<div id="background" style="position:absolute; width:100%; height:100%; z-index:-1">    
		<img src="img/secondpage_background.png" height="100%" width="100%"/>    
	</div>
	<div class="container">
		<center><img src="img/zhuyuan.png" width="300"/></center>
		<br />
		<center><img src="img/guajiangqu.png" width="150"/></center>

		<center><label>已刮开 <span id="drawPercent">0%</span> 区域。</label></center>
	    <center><div id="lotteryContainer" style="height: 200;"></div></center>
	    <br /><br /><br /><br /><br /><br /><br /><br /><br />
		<form action="saveLottery.php" method="post">
			<input type="text" name="stuNum" id="stuNum" hidden="hidden"/>
			<input type="text" name="lotteryNumber" id="lotteryNumber" hidden="hidden"/>
			<center><input type="submit" value="恭喜您,点我去领礼品啦" class="btn btn-success btn-lg" id="button"/></center>
		</form> 
		<a href="index.html" class="btn btn-success btn-lg" id="returnBtn">返回首页并分享至朋友圈</a>
		<br />
		<center><a href="sign.php" class="btn btn-primary btn-lg">报名加入团宣大家庭</a></center>
	</div>


</body>
</html>
