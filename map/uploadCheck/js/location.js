
			    var longitude,latitude,accuracy,err1=0;
                var alpha,err2=0;
				var ifmBtn_temp=0;
				var longitude1,latitude1;
                
                //LBS : 基于地图信息的应用
                
                var fristinit=1;
                
                var timer = null;
                
                function getLocation(){
					
					document.getElementById("locationP").innerHTML='正在获取位置信息...';
                    timer = navigator.geolocation.watchPosition(
						
						function(position){
						longitude= position.coords.longitude;//经度
						latitude= position.coords.latitude;//维度
						accuracy= position.coords.accuracy;//精确度
						locationMap();//改变地图指针坐标
						if(fristinit)showNow();//将地图中心拖到指针位置
						fristinit=0;
						//显示信息
						if(imftmp){
							var str_tip_gps=['gps数据:'];
							str_tip_gps.push('经度:' + longitude);
							str_tip_gps.push('纬度:' + latitude);
							str_tip_gps.push('精度:' + accuracy + ' 米');
							document.getElementById("locationP").innerHTML = str_tip_gps.join('<br>');
					    }
						   else document.getElementById("locationP").innerHTML='';
						}
						
						,
						
						function(err){ //err.code // 失败所对应的编号  
								
								$("#alerterr").trigger("click");//提示框
								navigator.geolocation.clearWatch(timer);//取消监控
								err1=err.code;


								//显示信息
								if(imftmp){
									switch(err.code){
											case 1:document.getElementById("locationP").innerHTML ="无定位原因：用户不允许地理定位";break;
											case 2:document.getElementById("locationP").innerHTML ="无定位原因：无法获取当前位置";break;
											case 3:document.getElementById("locationP").innerHTML ="无定位原因：pc端操作超时";break;
											case 4:document.getElementById("locationP").innerHTML ="无定位原因：未知错误";break;
									}
								}
								else{ 
									 document.getElementById("locationP").innerHTML='';
									 
									 //alert('定位失败了，请开启浏览器位置权限打开GPS，刷新页面并选择允许共享位置信息');
								}
						}
						,
						{ //其他参数 
						enableHighAcuracy : true,  
						timeout : 5000,  
						maximumAge : 5000,  
						frequency : 1000 
						}
					);  
					showNow();//将地图中心拖到指针位置
					if (window.DeviceOrientationEvent) {
						window.addEventListener("deviceorientation", function (event) {
						alpha= event.alpha;
						alpha=alpha.toFixed(2);
						alphaMap();
						}
						,
						false);
						
						
					}else{ 
						
						if(imftmp){
							document.getElementById("alphaP").innerHTML="获取不到方向传感器数据数据"+'<br>'+'可能设备不支持';
						}else
							document.getElementById("alphaP").innerHTML='';
					}
			    };
           
			   
	
				
 				
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
//经度：119.30665　纬度：25.70742
//433.1992 760.5879
/////////////////////////////////////////////////////////////////////////////////////////////
// var ReferencePoint_longitude=119.30665,ReferencePoint_latitude=25.70742;//参考坐标经纬度
 var d_pxx=139855.6,d_pxy=140309.8;//1经纬度对应px
 var d_mix=100000,d_miy=110929;//1经纬度对应米
 var x=0,y=0;
 //var ReferencePoint_x=Snap("#Name5").getBBox().cx+15,ReferencePoint_y=Snap("#Name5").getBBox().cy-5;
 
 

//console.dir(Snap("#tex").getBBox());
//console.dir(Snap("#zhizheng").getBBox());

/*
*
*移动地图指针图标
*改变指针反向及圆的半径
*
*/ 
function locationMap(){	 
	  
			   x=(-(ReferencePoint_longitude-longitude))*d_pxx+ReferencePoint_x;/*-300;*/
			   y=(ReferencePoint_latitude-latitude)*d_pxy+ReferencePoint_y;/*200;*/
			   x=x.toFixed(2);//保留2位小数
			   y=y.toFixed(2);
			   var str="translate(".concat(x.toString());
			   str=str.concat(",");
			   str=str.concat(y.toString());
			   str=str.concat(")");//转化为字符串"translate(x,y)"
			   document.getElementById("locationMove").setAttribute("transform",str);//地图定位图标移动svg transform	   
			   document.getElementById("circleAr").setAttribute("r",accuracy);
			   if(imftmp)document.getElementById("transformP").innerHTML=str//显示指针图标移动transform
			   else document.getElementById("transformP").innerHTML='';
	    	   	  
}
function alphaMap(){
				var str1="rotate("+(-alpha)+'deg)';
				var str2="scale("+1/transform.scale+')';
				$("polygon.zhizheng").css("transform",str1+str2);//方向控制 css3 transform
				//alert("rotate("+(-alpha)+'deg)')
				if(imftmp){
						var str_tip_alpha=['指北针方向传感器数据:'];
						str_tip_alpha.push('左右:' + alpha);
						document.getElementById("alphaP").innerHTML = str_tip_alpha.join('<br>');
				}else 
						document.getElementById("alphaP").innerHTML='';	
}
getLocation();
/////////////////////////////////////////////////////////////////////////////////////////////
	
	