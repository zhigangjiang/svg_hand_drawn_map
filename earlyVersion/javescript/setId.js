// JavaScript Document



var textNumberAll=0;
function setTextIdAndAttributeByclass(){//获取text类，给每个text标签设置id，并添加点击函数
    textNumberAll=0;
	var textId=document.getElementsByTagName("text");
	var setname="TextId";
	
	
	for(var x=0 in textId){//alert(textNumberAll);
	textId[x].id=setname+x;
	textNumberAll++;
	document.getElementById(setname+x).setAttribute("onclick","onTap(this)");
	
	}
	
}
setTextIdAndAttributeByclass();

function inIdGetNameByText(id){//得到当前id对应text标签html内容也就是建筑名称
	id=document.getElementById(id);
	name=id.innerHTML;
	
	//alert('你选择了'+name+'现在可以点击开始导航了');
	document.getElementById("demo1").innerHTML="可以开始导航了";//加到其他地方
	return name;
	
}
function inIdGetXByText(id){//得到x坐标
	var temp=1;
	var x='';
	id=document.getElementById(id);
	var array=id.getAttribute("transform");
	for(var i=15;array[i]!=")";i++){
		if(temp)x=x.concat(array[i]);
		if(array[i]==' '){temp=0;}
	}return x;
	
}
function inIdGetYByText(id){//得到y坐标
	var temp=1;
	var y='';
	id=document.getElementById(id);
	var array=id.getAttribute("transform");
	for(var i=15;array[i]!=")";i++){
		if(!temp)y=y.concat(array[i]);
		if(array[i]==' '){temp=0;}
	}return y;
	
}

function getNameByxy(x,y){
	Number(x);
	Number(y);
	
	var x_text=0,y_text=0,distanceMin=1000000000,distance=0;
	var distanceMinId="TextId"+0;
	for(var i=0;i<textNumberAll-1;i++){
		
		x_text=inIdGetXByText("TextId"+i);
		y_text=inIdGetYByText("TextId"+i);
		distance=Math.sqrt(Math.pow(x_text-x,2)+Math.pow(y_text-y,2));
		if(distance<distanceMin){distanceMin=distance;distanceMinId="TextId"+i;}
		//alert('i:'+i+'name:'+inIdGetNameByText(distanceMinId)+'distance'+distanceMin);
	}//return distanceMin;
	
	return inIdGetNameByText(distanceMinId);
	
	
}
