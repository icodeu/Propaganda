<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
		<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<title>
			快速加入团宣报名通道
		</title>
	</head>
	<script>
		function doCheck() {
		var flag = 1;
		if (document.register.citName.value == "") {
			alert('大侠您怎么称呼呢~');
			flag = 0;
		}
		if (document.register.citNumber.value == "") {
			alert('大侠还未留下英雄编号~');
			flag = 0;
		}
		if (document.register.citTel.value == "") {
			alert('不给我手机号，怎么跟你表白.....');
			flag = 0;
		}
		if (document.register.citGroup.value == "") {
			alert('进哪个组，学什么武功呢？');
			flag = 0;
		}
		if (flag == 1)
			return true;
		else return false;
		}
		
		function showGuide(){
			document.getElementById('sharemcover0').style.display='block';
			sleep(1);
		}
		
		  function sleep(n)
  		  {
		    var start=new Date().getTime();
		    while(true) if(new Date().getTime()-start>n) break;
		  }
	</script>
	<body>
		<div id="background" style="position:absolute; width:100%; height:100%; z-index:-1">
			<img src="img/sign_bg.jpg" height="100%" width="100%"/>
		</div>
		<div class="container">
			<center><img src="img/pg_01.png" width="300px"/></center>
			<form role="form" action="save.php" method="post" onsubmit="return doCheck()" name="register">
				<div class="form-group">
					<label for="exampleInputEmail1">姓名</label>
					<input type="text" name="citName" id="citName" class="form-control" placeholder="客官怎么称呼"/>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">学号</label>
					<input type="number" name="citNumber" id="citNumber" class="form-control" placeholder="大侠编号是多少"/>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">手机号</label>
					<input type="number" name="citTel" id="citTel" class="form-control" placeholder="我喜欢你，可不知道怎么联系你...."/>
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1">我想加入</label>
				</div>
				<div class="checkbox">
					<input type="radio" name="citGroup" value="bianji"  checked="checked"/>
					编辑组
					<input type="radio" name="citGroup" value="haibao"/>
					海报组
					<br />
					<input type="radio" name="citGroup" value="huodong"/>
					活动组
					<input type="radio" name="citGroup" value="shipin"/>
					视频组
					<input type="radio" name="citGroup" value="xinmeiti"/>
					新媒体组
				</div>
				
				<center>
					<button type="submit" class="btn btn-success btn-lg">
						提交
					</button>
				</center>

			</form>
			
			
			
		</div>
	</body>
</html>
