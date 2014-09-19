String.prototype.trim = function() {
    return this.replace(/(^\s*)|(\s*$)/g, "");
};

//从url(html,jsp)获取参数
function getQueryString(uri,val) { 
	var re = new RegExp("" +val+ "=([^&?]*)", "ig"); 

	return ((uri.match(re))?(uri.match(re)[0].substr(val.length+1)):null); 
}

//js获取项目根路径，如： http://localhost:8083/uimcardprj
function getRootPath(){
    //获取当前网址，如： http://localhost:8083/uimcardprj/share/meun.jsp
    var curWwwPath=window.document.location.href;
    //获取主机地址之后的目录，如： uimcardprj/share/meun.jsp
    var pathName=window.document.location.pathname;
    var pos=curWwwPath.indexOf(pathName);
    //获取主机地址，如： http://localhost:8083
    var localhostPaht=curWwwPath.substring(0,pos);
    //获取带"/"的项目名，如：/uimcardprj
    var projectName=pathName.substring(0,pathName.substr(1).indexOf('/')+1);
    return projectName;
}

//selector,文档中的选择器,默认为id选择器,需为body下的dom元素   ctxPathName: 路径 param: 需要传给登陆窗口的参数
//callback回调函数
function loginBeforeNext(selector,ctxPathName,param,callback){
	$.ajax({
		url: ctxPathName + "/ticketView.do?method=isUserLogin",    				
		type: 'post',
		dataType: 'json',
		success: function(e){
			if (e.result == 'true') //先登录
			{
				//需要加载两次，解决angular的加载问题
				$('#' + selector).load(ctxPathName + "/common/loginWindow.jsp");
				$('#' + selector).load(ctxPathName + "/common/loginWindow.jsp?" + param,function(){
					//angular.bootstrap(document,['exhibitRegistCtrl']);
					var dh = $(window.document).find('body').height();
					$('.graybg').fadeIn().height($(document).height());
					$('.popup').fadeIn();
					$('.regbox').animate({
						'margin-left' : '-587px'
					}, 0);
					$('.graybg').click(function() {
						$('.graybg').fadeOut();
						$('.popup').fadeOut();
					});	
					$('.closelogin').click(function() {
						$('.graybg').fadeOut();
						$('.popup').fadeOut();
					});
				}); 				    						 						    						     				
			}	 
			else if (callback != undefined)
				callback();
		}
	}); 
}

//string转换为Date类型，方便判断时间大小
function toDate(str){
  var sd = str.split("-");
  return new Date(sd[0],sd[1]-1,sd[2]);
}
/**
* yyyy-MM-dd  mm:ss格式 to Date 对象类型
* @param dateStr  yyyy-MM-dd 
* @param timeStr  mm:ss
* @returns {Date}
*/
function toDateObj(dateStr,timeStr){
   var dStr = dateStr.split("-");
   var tStr = null;
   var date = null;
   if(timeStr){
	   tStr = timeStr.split(':');
	   date = new Date(dStr[0],dStr[1]-1,dStr[2],tStr[0],tStr[1]);
   } else {
	   date = toDate(dateStr);
   }
  
   return date;
}
/**
*
* @param date
* @returns {string}  to yyyy年MM月格式
*/
function toChineseDate(date) {
   var year = date.getFullYear();
   var month = date.getMonth();
   var day = date.getDate();
   if(month <= 9) {
       month = "0" + month;
   }
   if(day <= 9) {
       day = "0" + day;
   }
   return year + "年" + month + "月" + day + "日 ";
}

/**
 * 上传本地图片预览
 * @param {} sender input[type="file"] 对象
 * @param {} previewFakeId 要预览图片的div
 * @param {} previewImgId 要预览图片的img
 * @return {Boolean}
 */
function onUploadImgChange(sender,previewFake,previewImg){   
	
	 if( !sender.value){   
	 	//没选中图片，默默退出
        return false;   
    }  
	
    if( !sender.value.toLowerCase().match( /.jpg|.gif|.png|.bmp/i ) ){   
        alert('图片格式无效！');   
        return false;   
    }   
    
    if( sender.files && sender.files[0] ){   
        // Firefox 因安全性问题已无法直接通过 input[file].value 获取完整的文件路径   
        //如果以下语句报错,则替换下面那句
    
    	if(!checkFileSize(sender)){
    		return false;
    	}
    	var UA = navigator.userAgent.toLowerCase();
		var browerKernel = {
			isWebkit : function(){
				if(/webkit/i.test(UA)) return true;
				else return false;
			}
		}
		if(browerKernel.isWebkit()){
			$(sender).siblings('.' + previewFake).children('.' + previewImg).attr('src',window.webkitURL.createObjectURL(sender.files.item(0))).show();
    		$(sender).siblings('.' + previewFake).children('.' + previewImg).attr('ng-src',window.webkitURL.createObjectURL(sender.files.item(0))).show();
		}else{
			$(sender).siblings('.' + previewFake).children('.' + previewImg).attr('src',window.URL.createObjectURL(sender.files.item(0))).show();
    		$(sender).siblings('.' + previewFake).children('.' + previewImg).attr('ng-src',window.URL.createObjectURL(sender.files.item(0))).show();
		}
    }else {  
        // IE7,IE8 在设置本地图片地址为 img.src 时出现莫名其妙的后果   
        //（相同环境有时能显示，有时不显示），因此只能用滤镜来解决   
        sender.select();
        sender.blur();//这个防止IE7，8，9下出现拒绝访问的错误
        var imgSrc = document.selection.createRange().text;   
           
        $(sender).siblings('.' + previewFake).css('filter',"progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src='" + imgSrc + "')");
        $(sender).siblings('.' + previewFake).children('.' + previewImg).hide();

    }   
}

/**
 * 检查一个字符是不是中文
 * @param {type} str
 * @returns {@exp;lst@call;test}
 */
function isChinese(str)
{
    var lst = /[u00-uFF]/;
    return !lst.test(str);
}

/**
 * 计算字符串长度，中文字算一个，ancii的算半个
 * @param {type} str
 * @returns {Number|strlen.strlength}
 */
function strlen(str)
{
    var strlength = 0;
    for (var i = 0; i < str.length; ++i)
    {
        if (isChinese(str.charAt(i)) == true)
            strlength = strlength + 1;//中文计算为一个字符
        else
            strlength = strlength + 0.5;
    }
    return Math.floor(strlength);
}

/**
 *   date --> 1990-01-01
 * @param date
 * @returns {string}
 */
function dateToString(date) {
	if(typeof(date) == "string" && date.indexOf("-") >= 0){
		return date;
	}
    var year = date.getFullYear();
    var month = date.getMonth() +1;
    var day = date.getDate();
    if(month <= 9) {
        month = "0" + month;
    }
    if(day <= 9) {
        day = "0" + day;
    }
    return year + "-" + month + "-" + day;
}

/**
 *   date --> 1990-01-01 00:00
 * @param date
 * @returns {string}
 */
function dateToYMDHMStr(date) {
	if(!date){
		console.log("ngoUtil dateToYMDHMStr 处理出错:date=" + date);
		return null;
	}
	if(typeof(date) == "string" && date.indexOf("-") >= 0){
		return date.replace(/ +/," ");
	}
    var year = date.getFullYear();
    var month = date.getMonth() +1;
    var day = date.getDate();
    var hour = date.getHours();
    var minutes = date.getMinutes();
    
    if(month <= 9) {
        month = "0" + month;
    }
    if(day <= 9) {
        day = "0" + day;
    }
    if(hour <= 9){
  	  hour = "0" + hour;
    }
    if(minutes <= 9){
  	  minutes = "0" + minutes;
    }
//    console.log(year + "-" + month + "-" + day + " "+ hour + ":" + minutes);
    return year + "-" + month + "-" + day + " "+ hour + ":" + minutes; 
}




function checkFileSize(fileElem){
	//只支持html5 浏览器的实现
	var size = fileElem.files[0].size;
	//console.log(fileElem.files[0]);
	var _4_MB = 1024 * 200;
	if( _4_MB < size){
		alert("您所选择的图片文件大于200K，请重新选择合适的文件再执行操作");
		$(fileElem).val('');//清空该input[type="file"]选中的文件
		return false;
	} 
	return true;
}

//删除指定下标的元素
Array.prototype.
remove = function(index) {
            if (index > -1) {
                this.splice(index, 1);
            }
        };
//删除ng 数组里的model
Array.prototype.
removeNgModel = function(ngModel) {
			for(var index in this){
				if(ngModel['$$hashKey'] == this[index]['$$hashKey']){
//					console.info("找到" + ngModel['$$hashKey'] + " 的model,并将之删除");
					this.splice(index, 1);
					break;
				}
			}
      };
        
     
// ie String 不支持trim函数
if(!String.prototype.trim) {
        	  String.prototype.trim = function () {
        	    return this.replace(/^\s+|\s+$/g,'');
     };
}        
function inputQueryValidLength(str){
	if (!str) return false;
	if (str.trim().length == 0) return false;
	var pattern = /^([\u4E00-\u9FA5]|[\uFE30-\uFFA0])*$/gi;
	var chinese = 0;
	var char = 0;
	for(var i = 0; i < str.trim().length;i++)
	{
		if (pattern.test(str[i])) 
			chinese ++;
		else
			char ++;			
	}
	return (chinese > 1) || (char > 10);
}
/**
 * Guid
 */
function Guid() {         
    var guid = "";
    for (var i = 1; i <= 32; i++) {
        var n = Math.floor(Math.random() * 16.0).toString(16);
        guid += n;
        if ((i == 8) || (i == 12) || (i == 16) || (i == 20))
            guid += "-";
    }
    return guid;
}   

/**
 * 是否移动电话
 * @param s
 * @returns {Boolean}
 */
function checkMobile(s){
	var regu =/^[1][3-8][0-9]{9}$/;
	var re = new RegExp(regu);
	if (re.test(s)) {
   		 return true;
	}else{
   		return false;
	}
}

/**
 * 是否固话，020-38884888 或02038884888
 * 0774-5112345 或 07745112345
 * @param phone
 * @returns {Boolean}
 */
function isFixedPhone(phone){
	var regu =/\d{3}-?\d{8}|\d{4}-?\d{7}/;
	var re = new RegExp(regu);
	if (re.test(phone)) {
   		 return true;
	}else{
   		return false;
	}
}

/**
 * 输入文本里是否有script脚本
 * @param s
 * @returns {Boolean}
 */
function checkHasScript(s){
	var regu =/[\\s\\S]*?(<script>)[\\s\\S]*?/;
	var re = new RegExp(regu);
	if (re.test(s)) {
   		 return true;
	}else{
   		return false;
	}
}

function isValidEmail(email){
	var strRegex = "^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$";
	var EmailReg = new RegExp(strRegex);
	if (!EmailReg.test(email)) 
		return false;
	else
		return true;
}
       