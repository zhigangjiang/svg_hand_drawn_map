

var colorAll='#99CCFF';//全局颜色







//onclick='onTap(this)';

var tempTap=0;//目前屏幕上没有变色的建筑
var precolor; //上一次点击的建筑的颜色
var preid; //上一次点击的id
var temp_setEndPositionmap=0;//地图上点击文字可以传值 设置为终点 标记
var x_end=0,y_end=0,name_end='';
var positionend=0;
var searchid='';
var searchBgid='';

function onTap(obj){//获得自身id
	
	var getedId=obj.id;
	if(0){
		  //alert('获得了id：'+getedId);
		  if(tempTap==0){//第一次点击
			  
		  saveColorAndId(getedId); //保存当前颜色id 
		  
		  changeColor(getedId,colorAll);//变色
		  
		  tempTap=1;//屏幕上有变色的建筑
		  }
		  else {
			  changeColor(preid,precolor);//恢复上一次点击的建筑颜色
			  
			  saveColorAndId(getedId);//保存本次颜色id
			  
			  changeColor(getedId,colorAll);//变色
			  
			  temp=1;//屏幕上有变色的建筑
			  
		  }
	
	}
	if(temp_setEndPositionmap==1){//如果点击了获取终点（在地图上标记）按钮，执行
		//上接setEndPositionmap(){}
		x_end=inIdGetXByText(getedId);//x坐标等于text x坐标
		y_end=inIdGetYByText(getedId);
		name_end=inIdGetNameByText(getedId);//获得选定的text标签上html内容（建筑名字）
		positionend=addPositionByxy(x_end,y_end);//讲x，y转化为编码 赋给末位置
		document.getElementById("end").innerHTML='终点：'+name_end;//提示当前	选择的终点
		 $("#goAbtn").trigger("click");  //弹出导航窗口
		
		 temp_goNgBtn=1;//可以点击按钮发生事件了
		 //下接开始导航按钮函数 displayDate()if(temp_goNgBtn){}
	}
	if(searchAllTemp==1){
	document.getElementById("searchAll").value=obj.innerHTML;
	searchid=obj.id;
	}
	
	
	
	if(searchBgAllTemp==1){
		//alert("搜索开始");
	document.getElementById("searchBgAll").value=obj.innerHTML;
	var textId=document.getElementsByTagName("text");
	for(var x=0 in textId)
		if(obj.innerHTML==textId[x].innerHTML){
	        var bgx=inIdGetXByText(textId[x].id);
			var bgy=inIdGetYByText(textId[x].id);
			positionbeg=addPositionByxy(bgx,bgy);
			positionbegname=obj.innerHTML;
			}
	}
	
	
	
	if(searchEndAllTemp==1){
	 document.getElementById("searchEndAll").value=obj.innerHTML;
	var textId=document.getElementsByTagName("text");
	for(var x=0 in textId)
		if(obj.innerHTML==textId[x].innerHTML){
	        var endx=inIdGetXByText(textId[x].id);
			var endy=inIdGetYByText(textId[x].id);
			 positionend=addPositionByxy(endx,endy);
			 positionendname=obj.innerHTML;
			}	
	}
}
function onTapClass(obj){
	
	}
	
	
function saveColorAndId(id){
	
	precolor=document.getElementById(id).getAttribute('fill');
	preid=id;
	
	//alert('保存id：'+preid+'保存颜色'+precolor);
}

function changeColor(id,color){//变色
	
	document.getElementById(id).setAttribute('fill',color);
	//alert('执行了变色'+color);
}