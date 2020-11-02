<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="../icon/map1.ico" type="image/x-icon"/>  
    <style>
        .animate /*地图操作动画延时效果*/ 
		{
            -webkit-transition: all .3s;
            -moz-transition: all .3s;
            transition: all .3s;
        }
		.animate3 /*地图操作动画延时效果*/ 
		{
            -webkit-transition: all .1s;
            -moz-transition: all .1s;
            transition: all .1s;
        }   
    </style>
    <!--jq mb-->
    <link rel="stylesheet" href="../../css/jquery.mobile-1.4.5.min.css">
    <script src="../../userJs/jquery-1.11.0.min.js"></script>
    <script src="../../userJs/jquery.mobile-1.4.5.min.js"></script> 
    <!--开关按钮-->
	<link rel="stylesheet" href="../../css/honeySwitch.css">
	<script src="../../userJs/honeySwitch.js"></script>
    <!--snap.svg.js-->
    <script type="text/javascript" src="../../userJs/snap.svg.js"></script>
</head>
<body style="overflow: hidden;  margin: 0; text-shadow:none">
    <div data-role="page"  style="overflow: hidden;  margin: 0; text-shadow:none">  
            <div style=" z-index:10000; position:fixed ; right::5px; top:60px; font-size:x-small;">
                    <strong id="fillImf">
                   
                    </strong>
             </div>
    
    
            <div id="conSvg" class="conSvg"  style="text-shadow:none" >
            <!--svg代码-->
            <?php
						$mapName="example_picture";
						$path="../../uploadFiles/" .$mapName.".svg";//获取文件路径
						//$path="../手绘地图.svg";//获取文件路径
                        //删除最后一行</svg>
                        $fp=file($path); 
                        $total=count($fp); //取得文件总行数
                        $num=$total-1; //要删除的行序号 
                        foreach ($fp as $line) { //按行分解内容并 
                        $tmp[]=$line; //逐行写入数组 
                        } 
                        for($i=0;$i<$total;$i++){ //若$i的值不等于要删除的行序号 
                        if($i<>$num) 
                        $savestr.=$tmp[$i]; } //写入文件 
						
                        echo $savestr;//显示
						
			?>
            <g id="locationMove" transform="translate(0,0)" display="">	
                <polygon class="zhizheng" style="transform:scale(1) rotate(0deg);" fill="#04AEDA" points="0,-8.5 -6.5,8.5 0,4 6.5,8.5 "></polygon>
                <circle id="circleAr" fill="none" stroke="#04AEDA" stroke-width="0.5" stroke-miterlimit="10" cx="0" cy="0" r="16.5"></circle>	
            </g> 
            
			<g id="searchMove" transform="translate(0,0)" display=""  onclick="tipGOSearch()" >
			<path fill="#38c" d="M0-12c-4.4,0-8,3.6-8,8c0,1.4,0.4,2.8,1,3.9c0.1,0.2,0.2,0.4,0.3,0.6L0,12L6.6,0.5C6.7,0.3,6.8,0.2,6.9,0 L7-0.1C7.6-1.3,8-2.6,8-4C8-8.4,4.4-12,0-12z M0-8c2.2,0,4,1.8,4,4S2.2,0,0,0s-4-1.8-4-4S-2.2-8,0-8z"/>
	        </g>
            
			<g id="touchTemp" transform="translate(0,0)">
			<path fill="none" d="M0,0"/>
	        </g>
         </svg>            </div>
            
            
            
            <div style=" position:fixed ;left:5px; top:60px; font-size:xx-small;">
            
                    <div> <!--定位调试信息-->
                    <p id="testp"></p>                     
                    <p id="locationP"></p> 
                    <p id="pointerTransformP"></p>  
                    <p id="alphaP"></p>                         
                    </div>
                    
                    <!--svg文档调试信息-->
                    <div>
                    <p id="mapImfP"></p>
                    <p id="svgImfP"></p>
					<strong id="svgIdP1"></strong>  
                    <strong id="svgIdP2"></strong>  
                    <strong id="svgIdP3"></strong>  
                    <strong id="svgIdP4"></strong>
	          
          
                    </div>
                    
                    <div><!--样式改变调试信息-->
                    <p id="mapTransformP"></p>
                    
                    </div>
                    <div>
                     
                    <p id="errP"></p>
                    <p id="log2"></p>
                    <p id="log3"></p>
                    <p id="log4"></p>
                    <p id="log5"></p>
                    
                    </div>
            
            </div>
			          
            <div>  <!--jqm图标按钮-->
                
                <!--放大缩小组合按钮--> 
                <div id="mapbtn" data-role="controlgroup" data-type="vertical" style="position:fixed;bottom:10px;right:10px;">   
                 <a href="#none" data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow  ui-icon-plus ui-btn-icon-notext ui-nodisc-icon ui-alt-icon"onclick="mapPlus()">放大</a>
                 <a href="#none" data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow  ui-icon-minus ui-btn-icon-notext ui-nodisc-icon ui-alt-icon"onclick= "mapMinus()">缩小</a>
                </div>
                
                <!--其他按钮-->
                
                
                <!--定位导航--> 
                <div style="position:  fixed;bottom:10px;left:10px;">
                     <a id="lcbtn"   href="#none"  data-rel="popup"  data-position-to="window"onClick="getLocation();showNow();" class="ui-btn ui-corner-all ui-shadow ui-icon-location   ui-nodisc-icon ui-alt-icon ui-btn-icon-notext ui-btn-inline">定位</button>
                     <a id="goAbtn"  href="#myPopupsearchgo"  data-rel="popup"  data-position-to="window"     class="ui-btn ui-corner-all ui-shadow ui-icon-navigation ui-nodisc-icon ui-alt-icon ui-btn-icon-notext ui-btn-inline " >导航</a>             
                </div>
                
                <!--设置-->
                <div style="position:  fixed;bottom:110px;right:12px;">
                     <a id="setbtn"  href="#overlayPane_set" data-rel="popup"  data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-icon-gear ui-nodisc-icon ui-alt-icon ui-btn-icon-notext" data-transition="pop">设置</a>
                </div>
                
                <!--搜索-->
                <div style="position:  fixed;top:10px;right:10px;">
                     <a id="searchBtn"  onClick="searchFun()" href="#nonoe" data-rel="popup"  data-position-to="window" class="ui-btn  ui-corner-all ui-shadow ui-icon-search ui-nodisc-icon ui-alt-icon ui-btn-icon-notext" data-transition="pop"></a>
                </div>
                
                <!--返回-->
                <div style="position:  fixed;top:10px;left:10px;">
                     <a  href="../../home.html" data-ajax="false"  class="ui-btn ui-corner-all ui-shadow ui-icon-carat-l ui-nodisc-icon ui-alt-icon ui-btn-icon-notext">设置</a>
                </div>
           </div>
           
           
           <div id="seachdiv" style="position:  fixed;top:8px;right:50px; width:200px"><!--搜索-->
           
                <form class="ui-filterable">
                  <input id="searchText" data-type="search" value="">
                </form>
                <script>
				$("#seachdiv").hide();//初始化隐藏搜索栏
				
				var temp_a=0;
				function inputopen(){
					$("#seachdiv").slideDown();
					temp_a=1;
				}
				//$("#seachalldiv").animate({ left:'0%'},times)
				function inputclose(){
					$("#seachdiv").hide();
					temp_a=0; 
				}
				function inputfun(){
					if(temp_a==0)inputopen();
					else inputclose();
					
				}
				</script>
                
                <ul id="seachUl" style=
                "position: fixed;z-index:10; height:150px;overflow:scroll;
                 margin: 0; text-shadow:none "  
                data-role="listview" data-filter="true" data-input="#searchText" data-inset="true">
                  <!--
                  
                  <li><a href="#"></a></li>
                  <li><a href="#">Valarie</a></li>
                  
                  js 添加标签生成列表
                  -->
                  
                </ul>
                
           
           </div>
           
           
		  <style>
		   /*honeySwitch  css*/
				.common-row {
					width: 100%;
					height: 50px;
					border-bottom: 1px solid lightgrey;
				}
				.cell-left, .cell-right {
					width: 49%;
					height: 100%;
					float: left;
					line-height: 50px;
				}
				.cell-right {
					text-align: right;
				}
				.switch-on, .switch-off {
					margin-top: 9px;
				}
				.showBox {
					width: 100%;
					border: 1px solid lightgrey;
					border-radius: 6px;
					font-size: 16px;
					background: #CCFF99;
				}
				.paragraph {
					white-space: pre-wrap;
					margin: 15px 0;
					word-break: break-all;
					word-wrap: break-word;
				}
				textarea {
					width: 80%;
					border: none;
					outline: none;
					resize: none;
					font-size: 16px;
					height: auto;
					overflow: visible;
				}
				.hidden {
					display: none;
				}
          </style>
		  <script>
            
                   /*honeySwitch  js*/
                //honeySwitch.themeColor="lightblue";
                $(function(){
					imftmp=1;//默认显示调试信息
                    switchEvent("#imfBtn",function(){
                        imftmp=1;
						printSvgImf();//显示svg信息
						printOtherImf();
                    },function(){
                        imftmp=0;
						hideSvgImf();//隐藏svg信息
						hideOtherImf();
                    });
					
					$("#directory_content").fadeOut();//说明默认关闭
                    switchEvent("#directory",function(){
                        $("#directory_content").fadeIn();scrollSet();
                    },function(){
                        $("#directory_content").fadeOut();scrollSet();
                    });
					
					$("#setDate").fadeOut();//设置参数默认关闭
					switchEvent("#setDate_btn",function(){
				     $("#setDate").fadeIn();scrollSet();
			        },function(){
				    $("#setDate").fadeOut();scrollSet();
			        }); 
					
					$("#simulationDate").fadeOut();//模拟位置默认关闭
					switchEvent("#simulationDate_btn",function(){
				     $("#simulationDate").fadeIn();scrollSet();
			        },function(){
				    $("#simulationDate").fadeOut();scrollSet();
			        });
					
					$("#mapColor").fadeOut();//修改颜色默认关闭
					switchEvent("#mapColor_btn",function(){
				     $("#mapColor").fadeIn(); scrollSet();              

			        },function(){
				    $("#mapColor").fadeOut();scrollSet();
			        });
					
					switchEvent("#fullBtn",function(){
                       requestFullScreen();
                    },function(){
                        exitFullscreen();
                    });
                });
				
				
               
				
				function requestFullScreen() {
				      var de = document.documentElement;
				      if (de.requestFullscreen) {
				          de.requestFullscreen();
				      } else if (de.mozRequestFullScreen) {
				          de.mozRequestFullScreen();
				      } else if (de.webkitRequestFullScreen) {
				          de.webkitRequestFullScreen();
				     }
				 }
				 //退出全屏
				 function exitFullscreen() {
				     var de = document;
				     if (de.exitFullscreen) {
				         de.exitFullscreen();
				     } else if (de.mozCancelFullScreen) {
				         de.mozCancelFullScreen();
				     } else if (de.webkitCancelFullScreen) {
				         de.webkitCancelFullScreen();
				     }
				 }
				 
				 
				
           </script>
           <!--设置面板-->
           <div data-role="panel" id="overlayPane_set" data-display="overlay" data-position="right" the data-position-fixed="true">
            <div id="setDiv" style="height:auto">
                   <h2>设置</h2>
                 
                    <div class="common-row">
                        <div class="cell-left">信息</div>
                        <div class="cell-right"><span class="switch-on" themeColor="gold" id="imfBtn"></span></div>
                    </div>
                    
                    <div class="common-row">
                        <div class="cell-left">使用说明</div>
                        <div class="cell-right"><span class="switch-off" themeColor="gold" id="directory"></span></div>
                    </div>
                    <div id="directory_content">
                    <h4>1、参数设置</h4>
                    <p>经度输入-180到180，负数代表西经</p>
                    <p>纬度输入-90到90，负数代表南纬</p>
                    <h4>2、模拟位置</h4>
                    <p>模拟地理位置数据，根据需要来设置</p>
                    <h4>3、调试信息</h4>
                    <p>显示地图各个数据，不需要点击调试信息按钮关闭</p>
                    <a href="../earlyVersion/help.html"   data-ajax="false">查看更多帮助</a>
                    </div>
                               
                    
                    
                    <div class="common-row">
                        <div class="cell-left">地图参数</div>
                        <div class="cell-right"><span class="switch-off" id="setDate_btn"></span></div>
                    </div>
                    
                    <!--地图数据表单-->
                    <div  id="setDate" >
                         <form method="post" action="../saveDate.php"   data-ajax='false' >
                                     <label for="mapName">地图名称：</label>
                                     <input type="text" name="mapName"  id="mapName"  placeholder="请输入地图名称：" value="">       
                        
                                     <label for="initScale">初始缩放倍数：</label>
                                     <input type="text" name="initScale" id="initScale" value="3">
                                 
                                     <label for="minScale">最小缩放倍数：</label>
                                     <input type="text" name="minScale" id="minScale" value="0.5">
                                     
                                     <label for="maxScale">最大缩放倍数：</label>
                                     <input type="text" name="maxScale" id="maxScale" value="20">
                                    
                                     <label for="chgScale">递增递减倍数：</label>
                                     <input type="text" name="chgScale" id="chgScale" placeholder="请输入大于1的值：" value="1.5">
                                     
                                     <label for="referenceX">参考点位于svg中x坐标：</label>
                                     <input type="text" name="referenceX" id="referenceX" value="">
                                    
                                     <label for="referenceY">参考点位于svg中y坐标：</label>
                                     <input  type="text" name="referenceY" id="referenceY" value="">
                                    
                                     <label for="referenceLongitude">参考点经度：</label>
                                     <input type="text" name="referenceLongitude" id="referenceLongitude" placeholder="请输入-180到180的值：" value="">
                               
                                     <label for="referenceLatitude">参考点纬度：</label>
                                     <input type="text" name="referenceLatitude" id="referenceLatitude" placeholder="请输入-90到90的值：" value="">
                                  
                                     <div style="display:none">
                                     <label for="svgData">svg文档：</label>
                                     <input type="text" name="svgData" id="svgData" value="不要修改">
                                     
                                     <label for="pointNum">点数量：</label>
                                     <input type="text" name="pointNum" id="pointNum" value="不要修改">
                                     </div>
                                  
                                     <input onClick="ApplicationData()" type="button" data-inline="true" value="应用参数">
                                     <input type="submit" data-inline="true" value="保存数据">
                      </form>
                    </div>
                    
                    <div class="common-row">
                        <div class="cell-left">模拟位置</div>
                        <div class="cell-right"><span class="switch-off" id="simulationDate_btn"></span></div>
                    </div>
                   
                    <!--模拟地理位置数据-->
                    <div id="simulationDate"  >
                                   <label for="simulationLongitude">模拟经度：</label>
                                   <input type="text" name="simulationLongitude" id="simulationLongitude" placeholder="请输入-180到180的值：" value="">
                                  
                                   <label for="simulationLatitude">模拟纬度：</label>
                                   <input type="text" name="simulationLatitude" id="simulationLatitude"  placeholder="请输入-90到90的值：" value="">
                                  
                                   <label for="simulationAccuracy">模拟精度：</label>
                                   <input type="text" name="simulationAccuracy" id="simulationAccuracy"  value="">

                                   <label for="simulationAlpha">模拟方向：</label>
                                   <input type="text" name="simulationAlpha" id="simulationAlpha"  value="">
                              
                                   <input onClick="ApplicationSimulationData()" type="button" data-inline="true" value="使用数据">

                    </div>
                    
                    <div class="common-row">
                        <div class="cell-left">地图颜色</div>
                        <div class="cell-right"><span class="switch-off" id="mapColor_btn"></span></div>
                    </div>
                    <div id=mapColor>
                    <p>功能还未添加</p>
                    
                    </div>
                    
                    <div class="common-row">
                        <div class="cell-left">旋转</div>
                        <div class="cell-right"><span class="switch-off switch-disabled" id="bluetooth"></span></div>
                    </div>
                    
                    <div class="common-row">
                        <div class="cell-left">全屏</div>
                        <div class="cell-right"><span class="switch-off" id="fullBtn"></span></div>
                    </div>

                    
 
                    <div class="common-row" id="network">
                        <div class="cell-left">主页</div>
                        <div class="cell-right"><a  href="../../home.html" data-ajax="false">></a></div>
                    </div>
                    
                    <div class="common-row" id="more">
                        <div class="cell-left">关于</div>
                        <div class="cell-right"><a  href="../../home.html" data-ajax="false">></a></div>
                    </div>
                    </div>
                    <script>
					function scrollSet(){
   					if(parseInt($("#setDiv").css("height"))>window.innerHeight){
						$("#setDiv").css("overflow","scroll");
						$("#setDiv").css("height",window.innerHeight);
					}else{
						$("#setDiv").css("overflow","hidden");
						$("#setDiv").css("height","auto");
						}
					
					}
						
                    </script>
            </div> 
              
			  
			
            
            
            
            
            
            
            
           
            
            <a href="#errCode1" id="alerterr1" data-rel="popup"  data-transition="slideup"></a>
            <a href="#errCode2" id="alerterr2" data-rel="popup"  data-transition="slideup"></a>
            <a href="#errCode3" id="alerterr3" data-rel="popup"  data-transition="slideup"></a>
            <a href="#errCode4" id="alerterr4" data-rel="popup"  data-transition="slideup"></a>

            <div  style="width:150px" data-role="popup" id="errCode1" data-position-to="window" class="ui-content">
            <p>定位失败了!无定位原因：用户不允许地理定位，请开启浏览器位置权限打开GPS，刷新页面并选择允许共享位置信息。</p>
            </div>
            <div  style="width:150px" data-role="popup" id="errCode2" data-position-to="window" class="ui-content">
            <p>定位失败了!原因：暂时获取不了当前位置，请确认gps信号正常，到开阔地再试试</p>
            </div>
            <div  style="width:150px" data-role="popup" id="errCode3" data-position-to="window" class="ui-content">
            <p>定位失败了!原因：获取gps超时</p>
            </div>
            <div  style="width:150px" data-role="popup" id="errCode4" data-position-to="window" class="ui-content">
            <p>定位失败了!原因：未知错误</p>
            </div>
              
            <a href="#goTip" id='goTipa' data-rel="popup"data-transition="slidedown" data-position-to="#touchTemp"></a>
            <div data-role="popup" id="goTip" class="ui-content" data-arrow="b">
              
                 <h3 onClick="goThere()">去这里</h3>
                 <p id="tx"></p>
                 <p id="ty"></p>
            </div>
            
            
            
            
      <div data-role="popup" id="myPopupsearchgo">

      <div data-role="main" class="ui-content">
      <p></p>
      <p id="demo2"></p>
      <p id="demo1"></p>
      <p id="demo"></p>

                                  <div class="ui-field-contain" >

终点：<input id="end" data-role="none"  data-type="search" value="">
<br>
起点：<input  data-role="none"  type="text" name="referenceY" id="beg" value="当前位置">
<br>
</div>
<button  onClick="displayDate()">开始导航</button>


      </div>

      </div>
            

</div>

</body>
<?php
echo 
"<script type='text/javascript'>".
"document.title ='".$mapName."--编辑';".
"$('#mapName').val('".$mapName."');".
"</script>"
?>
<!--初始化Idjs-->
<script type="text/javascript" src="../js/initId.js"></script>
<!--初始化数据js-->
<script type="text/javascript" src="../js/initData.js"></script>

<!--手势控制js-->
<script type="text/javascript" src="../../userJs/hammer.min.js"></script>
<script type="text/javascript" src="../../userJs/consvg.js"></script>
<!--定位js-->
<script type="text/javascript" src="../../userJs/location.js"></script>

<!--其他js-->
<script type="text/javascript"  src="../../userJs/conmap.js"></script>
<script type="text/javascript"  src="../../userJs/dateEdit.js"></script>
<!--导航js-->
<script type="text/javascript"  src="../../userJs/mustPath/must.js"></script>


</html>