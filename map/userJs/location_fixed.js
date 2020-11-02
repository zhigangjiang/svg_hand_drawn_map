
			    var longitude,latitude,accuracy,err1=0;
                var alpha,err2=0;
				var ifmBtn_temp=0;
				var longitude1,latitude1;
                
                //LBS : 基于地图信息的应用
                
                var fristinit=1;
                
                var timer = null;
                
                function getLocation(){
					document.getElementById("errP").innerHTML='';
					document.getElementById("locationP").innerHTML='正在获取位置信息...';
                    timer = navigator.geolocation.watchPosition(
						
						function(position){
						longitude= 119.30666;
						latitude= 25.7074;//维度
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
							document.getElementById("locationP").innerHTML = 
							'---gps定位数据---'+'<br>'+
							str_tip_gps.join('<br>');
					    }
						   else document.getElementById("locationP").innerHTML='';
						}
						
						,
						
						function(err){ //err.code // 失败所对应的编号  
					            document.getElementById("locationP").innerHTML='';							
								navigator.geolocation.clearWatch(timer);//取消监控						
								switch(err.code){
											case 1:
											document.getElementById("errP").innerHTML ="无定位原因：用户不允许地理定位";	
											$("#alerterr1").trigger("click");
											break;
											case 2:document.getElementById("errP").innerHTML ="无定位原因：无法获取当前位置";
											$("#alerterr2").trigger("click");
											break;
											case 3:document.getElementById("errP").innerHTML ="无定位原因：定位超时";
											$("#alerterr3").trigger("click");
											break;
											case 4:document.getElementById("errP").innerHTML ="无定位原因：未知错误";
											$("#alerterr4").trigger("click");
											break;
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
							document.getElementById("alphaP").innerHTML=
							'---方向传感器数据---'+'<br>'+
							"获取不到方向传感器数据数据";
						}else
							document.getElementById("alphaP").innerHTML='';
					}
			    }
				
				 var d_pxx=139855.6,d_pxy=140309.8;//1经纬度对应px
				 var d_mix=100000,d_miy=110929;//1经纬度对应米
				 var mapx=0,mapy=0;
				
				/*
				*
				*移动地图指针图标
				*改变指针反向及圆的半径
				*
				*/ 
			function locationMap(){	 
					  
			   x=(-(ReferencePoint_longitude-longitude))*d_pxx+ReferencePoint_x;/*-300;*/
			   y=(ReferencePoint_latitude-latitude)*d_pxy+ReferencePoint_y;/*200;*/
			   mapx=x;
			   mapy=y;
			   x=x.toFixed(2);//保留2位小数
			   y=y.toFixed(2);
			   var str="translate(".concat(x.toString());
			   str=str.concat(",");
			   str=str.concat(y.toString());
			   str=str.concat(")");//转化为字符串"translate(x,y)"
			   document.getElementById("locationMove").setAttribute("transform",str);//地图定位图标移动svg transform	   
			   document.getElementById("circleAr").setAttribute("r",accuracy);
			   if(imftmp)document.getElementById("pointerTransformP").innerHTML=
			   '---指针移动信息----'+'<br>'+
			   '指针改变(transform):'+str+'<br>'+//显示指针图标移动transform
			   '指针半径(r):'+accuracy;
			   else document.getElementById("pointerTransformP").innerHTML='';
	    	   	  
			}
			
			function alphaMap(){
				var str1="rotate("+(-alpha)+'deg)';
				var str2="scale("+1/transform.scale+')';
				$("polygon.zhizheng").css("transform",str1+str2);//方向控制 css3 transform
				//alert("rotate("+(-alpha)+'deg)')
				if(imftmp){
						var str_tip_alpha=['指北针方向传感器数据:'];
						str_tip_alpha.push('左右:' + alpha);
						document.getElementById("alphaP").innerHTML = 
						'---方向传感器数据---'+'<br>'+
						str_tip_alpha.join('<br>')+'<br>'+'<br>'
						'---指针方向及大小信息---'+'<br>'+
						'方向(rotate):'+str1+'<br>'+
						'大小(scale):'+str2;
				}else document.getElementById("alphaP").innerHTML='';	
           }
getLocation();
/////////////////////////////////////////////////////////////////////////////////////////////
	
	