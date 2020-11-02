                var longitude,latitude,accuracy,err1=0;
                var alpha,err2=0;
				var ifmBtn_temp=0;
				var longitude1,latitude1;
                
                //LBS : 基于地图信息的应用
                
                
                
                var timer = null;
                
                function getLocation(){
                    timer = navigator.geolocation.watchPosition(
					function(position){
					longitude= position.coords.longitude;
					latitude= position.coords.latitude;
					accuracy= position.coords.accuracy;
					err1=0;
					},
					
					function(err){ //err.code // 失败所对应的编号  
					err1=err.code;
					navigator.geolocation.clearWatch(timer);
					},
					
					{  
					enableHighAcuracy : true,  
					timeout : 5000,  
					maximumAge : 5000,  
					frequency : 1000 
					});  
					if (window.DeviceOrientationEvent) {
						window.addEventListener("deviceorientation", 
												function (event) {
												alpha= event.alpha;
												//beta= event.beta;
												//gamma= event.gamma;
												},
												false);
												err2=0;
					}else err2=1;
                };
           
			
	
				
				
				function imformation(){
                if(!err1){
                var str_tip_gps=['gps数据:'];
                str_tip_gps.push('经度:' + longitude);
                str_tip_gps.push('纬度:' + latitude);
                str_tip_gps.push('精度:' + accuracy + ' 米');
                document.getElementById("locationP").innerHTML = str_tip_gps.join('<br>');
                }
                else {
				    switch(err1){
                    case 1:document.getElementById("locationP").innerHTML ="原因：用户不允许地理定位";break;
                    case 2:document.getElementById("locationP").innerHTML ="原因：无法获取当前位置";break;
                    case 3:document.getElementById("locationP").innerHTML ="原因：操作超时";break;
                    case 4:document.getElementById("locationP").innerHTML ="原因：未知错误";break;
					}navigator.geolocation.clearWatch(timer);}
                if(!err2){
                var str_tip_alpha=['指北针方向传感器数据:'];
                str_tip_alpha.push('左右:' + alpha);
                document.getElementById("alphaP").innerHTML = str_tip_alpha.join('<br>');}
                else
                document.getElementById("alphaP").innerHTML="获取不到方向传感器数据数据";
				document.getElementById("ifmBtn").innerHTML="刷新数据信息"
				var w=document.getElementById("switch").value
		document.getElementById("locationP").innerHTML="缩放倍数："+w;
				}
				
			
////////////////////////////////////////////////////////////////////////////////////////////
	/*
x1=172.644 px
y1=695.911 px

location1{119.303910,25.708270}

x2=789.407 px
y2=1209.445 px

location2{119.308320,25.704610}

119.308320-119.303910=0.00441
789.407-172.644=616.763
dx=616.763/0.00441=139855.5555555556

25.704610-25.708270=-0.00366
1209.445-695.911=513.534
dy=513.534/0.00366=140309.8360655738

location3={119.307970,25.709570}//参考点
600m
x=441 y=406
441/0.00441=100000
406/0.00366=110929

movex=742.334;
movey=511.536;*/
/////////////////////////////////////////////////////////////////////////////////////////////
 var ReferencePoint_longitude=119.307970,ReferencePoint_latitude=25.709570;
 var d_pxx=139855.5555555556,d_pxy=140309.8360655738;//1经纬度对应px
 var d_mix=100000,d_miy=110929;//1经纬度对应米
 var x=0,y=0;
 function locationMap(){
   
       if(longitude&&latitude){//如果得到数据则进行坐标转换
		  // if(1){
	   x=(-(ReferencePoint_longitude-longitude))*d_pxx;/*-300;*/
	   y=(ReferencePoint_latitude-latitude)*d_pxy;/*200;*/

       //(参考点-当前经)*单位d=地图定位图标移动px
	 
	   var str1="translate(",str_x,k=",",str_y,k2=")",str;
	 
	   str_x=x.toString();
	   str=str1.concat(str_x);
	   str=str.concat(k);
	   str_y=y.toString();
	   str=str.concat(str_y);
	   str=str.concat(k2);//转化为字符串"translate(x,y)"
	   ar_px=(accuracy/((d_mix+d_miy)*0.5))*((d_pxx+d_pxy)*0.5)
	   circlear=ar_px.toString()
	   document.getElementById("locationMove").setAttribute("display","");
       document.getElementById("locationMove").setAttribute("transform",str);//地图定位图标移动
	   document.getElementById("circleAr").setAttribute("r",circlear);
	   }
	   else {
		   x=-204;//图标居中 地图显示居中
		   y=146;
		   document.getElementById("locationMove").setAttribute("transform","translate(-204,146)");//无数据时图标居中
		   //document.getElementById("locationMove").setAttribute("display","none");//图标隐藏
		     
		   }
		  
	   var str1="rotate(",str_alpha,movex,movey,str_movex,str_movey,space=" ";//方向转换
	   str_alpha=(-alpha).toString();
	   
	   str=str1.concat(str_alpha);
	   str=str.concat(k);
	   movex=744;
	   movey=704;
	   str_movex=movex.toString();
	   str_movey=movey.toString();
	   str=str.concat(space);
	   str=str.concat(str_movex);
	   str=str.concat(space);
	   str=str.concat(str_movey);
	   str=str.concat(k2);
	   
	   document.getElementById("alphAr").setAttribute("transform",str);
	 
	   
	   
		
}

locationMap();
/////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////////////


var i=0;
function loop() //间隔1s 更新经纬度 if(jm)改变图标位置
{ 
   i++;
   if(i<10000000&&err1==0) setTimeout(function(){locationMap();loop();},1000);
   }
getLocation();
loop();


var map_Proportion=100,sign="%";
/*function mapPlus(){
	map_Proportion=map_Proportion+50;
	var str_mapPlus=map_Proportion.toString();
	str_mapPlus=str_mapPlus.concat(sign);
	
	
	document.getElementById("svgmap").style.width=str_mapPlus;
	document.getElementById("svgmap").style.height=str_mapPlus;
	}*/
/*function mapMinus(){
	map_Proportion=map_Proportion-50;
	var str_mapMinus=map_Proportion.toString();
	str_mapMinus=str_mapMinus.concat(sign);
	
	document.getElementById("svgmap").style.width=str_mapMinus;
	document.getElementById("svgmap").style.height=str_mapMinus;
}*/

/////////////////////////////////////////////////////////////////////////////////////////////	
	