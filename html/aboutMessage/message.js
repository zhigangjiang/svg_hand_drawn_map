var xmlHttp

function BeginSend(){
	var title = $("#title").val();
	var content = $("#content").val();
	xmlHttp=GetXmlHttpObject();

	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
 
	var url="SendMessage.php";

	url=url+"?title="+title+"&content="+content;//多个值用“&”分割
	url=url+"&sid="+Math.random()//添加一个随机数，以防服务器使用缓存文件

	xmlHttp.onreadystatechange=stateChanged 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null);
	
	ShowLoading( "留言成功！",2000,"weui-icon-success-no-circle");
	$("#title").val("");
	$("#content").val("");
}
function SendMessage(){

	var title = $("#title").val();
	var content = $("#content").val();
	if(title == ""){
		ShowWarnAlert('提示','您还没有输入标题哦！');
		return false;
	}else if(content == ""){
		ShowWarnAlert('提示','您还没有输入内容哦！');
		return false;
	}else if($("#state").html() == "当前用户：访客"){
		ShowWarnAlert2(
			'请选择',
			'您当前未登陆，继续将以访客身份留言。注意：其他用户可以删除您的留言，点击<a href="../Login">登陆</a>。',
			'BeginSend()');
		return false;
	}
	BeginSend();
	
	

}
function Reply( obj ){
	var reTitle = $(obj).parent().prev().prev().html();
	var floor = $(obj).prev().html();
	var reply = $(obj).html();
	$("#title").val(reply+"："+floor+" 标题："+reTitle);
	$("#content").val("");
}
function BeginDelet( Nu ){
			xmlHttp=GetXmlHttpObject();
			if (xmlHttp==null)
			{
				alert ("Browser does not support HTTP Request")
				return
			}
			var url="DeleteMessage.php"
			url=url+"?Nu="+Nu+"&sid="+Math.random()//添加一个随机数，以防服务器使用缓存文件
			xmlHttp.onreadystatechange=stateChanged //onreadystatechange 是一个事件句柄。它的值 (stateChange) 是一个函数的名称，当 XMLHttpRequest 对象的状态发生改变时，会触发此函数。状态从 0 (uninitialized) 到 4 (complete) 进行变化。仅在状态为 4 时，我们才执行代码。
			xmlHttp.open("GET",url,true);
			xmlHttp.send(null);
			ShowLoading( "删除成功！",500,"weui-icon-success-no-circle");
}
function DeleteOne( Nu ){
			ShowWarnAlert2(
			'删除确认',
			'确定删除该留言？',
			'BeginDelet('+Nu+')');			
}

function ShowMessage()
{
	xmlHttp=GetXmlHttpObject();

if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
var url="ShowMessage.php"
url=url+"?sid="+Math.random()//添加一个随机数，以防服务器使用缓存文件

xmlHttp.onreadystatechange=stateChanged 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function stateChanged() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")

 { 
 document.getElementById("txtHint").innerHTML=xmlHttp.responseText //执行的代码：这里输出文本到"txtHint"
 } 
}

function GetXmlHttpObject()//创建XmlHttp对象
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}