
var positionbeg=0;//init 起点
var temp_bg_end=0;
var positionnowname='';
function showNowPositionName(){
	positionnowname=getNameByxy(744+x,704+y);
	document.getElementById("nowposition").innerHTML='当前位置：'+ positionnowname+'附近';
	
}


function  setBgPositionNow(){//将地图上x，y像素坐标，转化为编码
        var positionbegname='';
	    positionbeg=addPositionByxy(744+x,704+y);
}
function  setEndPositionmap(){
	if(temp_bg_end){
		//上setBgPositionNow()
	   document.getElementById("demo1").innerHTML="在地图上选取终点";//提示，弹窗消失，看不到。。
	   temp_setEndPositionmap=1;//可以点击开始导航按钮了
	   setTextIdAndAttributeByclass();//执行text类 函数
	   //具体传值在onTap函数 if(temp_setEndPositionmap=1){}
	   //设置好终点
	   }
	   else {
		   document.getElementById("demo1").innerHTML="请先选择起点";//如果没输入起点 提示
		   }
	
	
	
}
function  addPositionByxy(xg,yg){
	var i,j,k,c,c1,s,s1,Sh,St,Sht,Smin=Infinity,yn,xn,cmin,yn1,xn1;
		
		
		  var temp=0,cmin_temp=0;      
			  
			  for (k = 0; k < 133; k++) {
				for (j = k; j < 133; j++) {
				  s=k+"_"+j;
				  s1=j+"_"+k;
				  c = document.getElementById(s);
				  if(c==null)
				  {}
				  else
				  {
				  xn=c.getPointAtLength(0).x;
				  yn=c.getPointAtLength(0).y;
				  xn1= c.getPointAtLength(c.getTotalLength()).x;
				  yn1= c.getPointAtLength(c.getTotalLength()).y;
				  Sh=(xg-xn)*(xg-xn)+(yg-yn)*(yg-yn);
				  St=(xg-xn1)*(xg-xn1)+(yg-yn1)*(yg-yn1);
				  
				  if(Sh>St)
				  {
				   Sht=St;
				   temp=k;
				  }
				  else
				  {
				  Sht=Sh;
				  temp=j;
				  }
				  
				  if(Sht!=0)
				  {
				   if(Smin>Sht)
					 {
					   Smin=Sht;
					   cmin=c;
					   cmin_temp=temp;
					 }
				   }
				  }
				  
				  c1 = document.getElementById(s1);
				   if(c1==null)
				  {}
				 else
				  {
				  xn=c1.getPointAtLength(0).x;
				  yn=c1.getPointAtLength(0).y;
				  xn1= c1.getPointAtLength(c1.getTotalLength()).x;
				  yn1= c1.getPointAtLength(c1.getTotalLength()).y;
				  Sh=(xg-xn)*(xg-xn)+(yg-yn)*(yg-yn);
				  St=(xg-xn1)*(xg-xn1)+(yg-yn1)*(yg-yn1);
				  
				  if(Sh>St)
				  {
				   Sht=St;
				   temp=j;
				  }
				  else
				  {
				  Sht=Sh;
				  temp=k;
				  }
				  
				  if(Sht!=0)
				  {
				   if(Smin>Sht)
					 {
					   Smin=Sht;
					   cmin=c1;
					   cmin_temp=temp;
					 }
				   }
				  }
				
				
		}
		}
		//cmin.setAttribute('stroke','red');
	    //positionbeg=cmin_temp;
		
		return cmin_temp;
	
	
	}

