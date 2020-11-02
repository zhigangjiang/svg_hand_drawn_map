<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ch">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>我的地图-在线手绘地图</title>
        <!-- 引入 WeUI 注：1.0版本 -->
        <link rel="stylesheet" href="css/weui.min.css"/>
        <!-- 引入 swiper -->
        <link rel="stylesheet" href="css/swiper-3.4.2.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <script src="js/zepto.min.js"></script> 

    </head>
<body>
<style>
html{
height:100%;
}  
body{   
	max-width:1080px;   /*pc最大宽度*/
	margin: 0 auto;
	height:100%;
	border-right: 1px solid #c5c5c5;
	border-left: 1px solid #c5c5c5;
	box-shadow:2px 2px 3px #aaaaaa;
}

.img1{
    color: #a0b95d;
	font-size: 15px;
	text-align: center; 
}
.img2{
    color: #13aed6;
	font-size: 12px;
	text-align: center;   
}
.img3{
    color: #63d9f7;
	font-size: 12px;
	text-align: center;   
}
</style>
<div class="weui-tab" id="weuitab" ><!--继承body 、height100%-->
    <div class="swiper-container2 weui-tab__panel" ><!--Swiper的容器-->
       <div class="swiper-wrapper" ><!--触控的对象--> 
          
          <!----------------weui-panel1----首页-------------------->          
          <div class="swiper-slide" ><!--切换的滑块-->
            <div class="weui-panel"  id="weui-panel1">
                        <!--logo-->
                        <div class="page__hd" style=""><!--logo标题-->
                                <h1 class="page__title">
                                    <img src="logo/logo.svg"  alt="wodeditu.com" >
                                    <?php
									   if(!isset($_SESSION["accounts"])){ //判断当前会话变量是否注册
											//session_register("accounts");    //注册变量
											echo '<a  style="position:absolute; right:5px; top:10px;" href="html/Login/" class="weui-btn weui-btn_mini weui-btn_default">登录</a>';
											$state="登录";
										}else{
											$state=$_SESSION['accounts'];
											$str="$('#tabbar3').trigger('click');";
											echo '<a  style="position:absolute; right:5px; top:10px;" href="javascript:'.$str.'"class="weui-btn weui-btn_mini weui-btn_default">'.'用户：'.$_SESSION['accounts'].'</a>';
											
											
										}
									 ?>
                                </h1>
                                
                        </div>
                        <!--分割线-->
                        <HR style="FILTER: alpha(opacity=100,finishopacity=0,style=3)" width="99%" color=#987cb9 SIZE=3>
                        <!--Swiper-->
                        <div class="swiper-container swiper-container-horizontal"><!--Swiper的容器-->
                            <div class="swiper-wrapper"><!--触控的对象-->    
                                <div class="swiper-slide"><!--切换的滑块-->
                                    <div class="swiper-zoom-container">	<!--zoom调焦的容器-->			
                                    <img data-src="image/1.png" class="swiper-lazy swiper-zoom-container ">
                                    <p class="ani img1" swiper-animate-effect="zoomInUp"     swiper-animate-delay="0.0s" style=" position:absolute; top:10px;  right:4%; ">旅游景点地图</p> 
                                    <p class="ani img1" swiper-animate-effect="rollIn"       swiper-animate-delay="0.6s" style=" position:absolute; top:75%;   left:10%;">手绘地点详细</p> 
                                    <p class="ani img1" swiper-animate-effect="rollIn"       swiper-animate-delay="1.2s" style=" position:absolute; top:24%;   left:16%;">矢量图高清显示</p> 
                                    <div class="swiper-lazy-preloader"></div>
                                    </div>
                               </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">	
                                    <img data-src="image/2.png" class="swiper-lazy swiper-zoom-container " >
                                    <p class="ani img2" swiper-animate-effect="flash" style=" position:absolute; top:45%; left:60%;">地理定位</p> 
                                    <div class="swiper-lazy-preloader"></div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-zoom-container">	
                                    <img data-src="image/3.png" class="swiper-lazy swiper-zoom-container">
                                    <p class="ani img3" swiper-animate-effect="bounceInDown" swiper-animate-delay="0.6s" style=" position:absolute; top:46%; left:80%;">导航</p> 
                                    <p class="ani img3" swiper-animate-effect="bounceInDown"  style=" position:absolute; top:10%; left:68%;">搜索</p> 
                                    <div class="swiper-lazy-preloader"></div>
                                    </div>
                               </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <!--gaode info--->
                        <p id="tip"  class="weui-panel__hd">amap info</p>
                        <!-- 使用weui九宫格样式-->
                        <div class="weui-grids">
                             <a href="map/fjnufq-sz" class="weui-grid">
                                <div class="weui-grid__icon">
                                    <img src="icon/当前.png" alt="">
                                </div>
                                <p class="weui-grid__label">
                                    当前地图
                                </p>
                             </a>
                             <a href="html/schoolMapList" class="weui-grid">
                                <div class="weui-grid__icon">
                                    <img src="icon/校园.png" alt="">
                                </div>
                                <p class="weui-grid__label">
                                    校园地图
                                </p>
                             </a>
                             <a href="html/scenicMapList" class="weui-grid">
                                <div class="weui-grid__icon">
                                    <img src="icon/景点.png" alt="">
                                </div>
                                <p class="weui-grid__label">
                                    景区地图
                                </p>
                             </a>
                             <a href="map/upload" class="weui-grid">
                                <div class="weui-grid__icon">
                                    <img src="icon/制作.png" alt="">
                                </div>
                                <p class="weui-grid__label">
                                    制作地图 </p>
                             </a>
                             <a href="html/aboutMessage" class="weui-grid">
                                <div class="weui-grid__icon">
                                    <img src="icon/建议.png" alt="">
                                </div>
                                <p class="weui-grid__label">
                                    留言反馈
                                </p>
                              </a>
                             <a href="../index.html" class="weui-grid">
                                <div class="weui-grid__icon">
                                    <img src="icon/更多.png" alt="">
                                </div>
                                <p class="weui-grid__label">
                                   访问电脑版
                                </p>
                              </a>
                        </div>
                        
                        <!--cnzz统计代码样式隐藏-->
                        <div class="cnzz" style="display:none;">
                            <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1261543828'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/z_stat.php%3Fid%3D1261543828%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));</script>       
                        </div>
            </div>
          </div>
          
          <!----------------weui-panel2-------地图----------------->
          <div class="swiper-slide"><!--切换的滑块-->
            <div class="weui-panel" id="weui-panel2">
                        <!--weui-panel__hd--->
                        <div class="weui-panel__hd">
                        <h2 class="page__title">地图列表</h2>
                        </div>
                        <!--gaode-分装在swiper-->
                        <div class="swiper-container3 swiper-container-horizontal"><!--Swiper的容器-->
                            <div class="swiper-wrapper"><!--触控的对象-->  
                             
                        		<div id='container' class="swiper-zoom-container " style="height:250px; width:100%; "></div>
                            
                            </div>
                        </div>
                        <!--weui-panel__hd--->
                        <div class="weui-panel__hd">
                        附近的地图:
                        </div>
                        <!--weui-panel__bd--->
                        <div class="weui-panel__bd">
                            <a href="map/fjnufq-sz" class="weui-media-box weui-media-box_appmsg">
                                <div class="weui-media-box__hd">
                                    <img class="weui-media-box__thumb" src="icon/地图小图.png" alt="">
                                </div>
                                <div class="weui-media-box__bd">
                                    <h4 class="weui-media-box__title">福建师范大学福清分校石竹校区地图</h4>
                                    <p class="weui-media-box__desc">
                                    福建师范大学福清分校石竹校区地图
                                    福建师范大学福清分校石竹校区地图
                                    </p>
                                </div>
                                <!--其他信息-->
                                <div style="position:absolute; bottom:-3px; right:0px; ">
                                    <ul class="weui-media-box__info">
                                        <li class="weui-media-box__info__meta">jzg</li>
                                        <li class="weui-media-box__info__meta">2017.4.19</li>
                                        <li class="weui-media-box__info__meta weui-media-box__info__meta_extra">无</li>
                                    </ul>
                                </div>
                            </a>
                            
                            <a href="map/fjnufq-wm" class="weui-media-box weui-media-box_appmsg">
                                <div class="weui-media-box__hd">
                                	<img class="weui-media-box__thumb" src="icon/地图小图.png" alt="">                                </div>
                                <div class="weui-media-box__bd">
                                    <h4 class="weui-media-box__title">福建师范大学福清分校五马校区地图</h4>
                                    <p class="weui-media-box__desc">
                                    福建师范大学福清分校五马校区地图
                                    福建师范大学福清分校五马校区地图
                                    </p>
                                </div>
                                <!--其他信息-->
                                <div style="position:absolute; bottom:-3px; right:0px; ">
                                    <ul class="weui-media-box__info">
                                        <li class="weui-media-box__info__meta">jzg</li>
                                        <li class="weui-media-box__info__meta">2017.4.19</li>
                                        <li class="weui-media-box__info__meta weui-media-box__info__meta_extra">无</li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                        <!--weui-panel__ft--->
                        <div class="weui-panel__ft">
                            <a href="map/uploadFiles/手绘地图.svg" class="weui-cell weui-cell_access weui-cell_link">
                                <div class="weui-cell__bd">查看更多</div>
                                <span class="weui-cell__ft"></span>
                            </a>    
                        </div>
            </div>             
          </div>
          
          <!----------------weui-panel2-------地图----------------->
          <div class="swiper-slide"><!--切换的滑块-->
            <div class="weui-panel" id="weui-panel3" >
              <!---------------------------------------------------->
             	    <?php
					if(!isset($_SESSION["accounts"])){
                    echo  '
					<!---------------------------------------------------->
					<div style="height:25px">
                    </div>
                    <div align="center">
                    <img src="icon/头像.png" width="25%" height="25%"  />
                    </div>
                    <div align="center">
                    <a  style=" " href="html/Login/" class="weui-btn weui-btn_mini weui-btn_default">登录</a>
                    <a  style=" " href="html/Register/" class="weui-btn weui-btn_mini weui-btn_default">注册</a>
                    </div>
					<!---------------------------------------------------->
                    <div class="weui-media-box weui-media-box_small-appmsg">
                            <div class="weui-cells">
                                <div class="weui-panel__hd">地图管理</div>
                                <a class="weui-cell weui-cell_access" href="javascript:ShowWarnAlert();">
                                    <div class="weui-cell__hd"><img src="icon/上传2.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
                                    <div class="weui-cell__bd weui-cell_primary">
                                        <p>上传新地图</p>
                                    </div>
                                    <span class="weui-cell__ft"></span>
                                </a>
                                <a class="weui-cell weui-cell_access" href="javascript:ShowWarnAlert();">
                                    <div class="weui-cell__hd"><img src="icon/编辑2.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
                                    <div class="weui-cell__bd weui-cell_primary">
                                        <p>编辑地图</p>
                                    </div>
                                    <span class="weui-cell__ft"></span>
                                </a>
                                <a class="weui-cell weui-cell_access" href="javascript:ShowWarnAlert();">
                                    <div class="weui-cell__hd"><img src="icon/收藏2.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
                                    <div class="weui-cell__bd weui-cell_primary">
                                        <p>我的收藏</p>
                                    </div>
                                    <span class="weui-cell__ft"></span>
                                </a>
                            </div>
                    </div>
					<!---------------------------------------------------->
					';
					}
					else//***********************************************************
					{
					echo '
					<div class="weui-panel_access">
                        <div class="weui-panel__bd">
                            <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                                <div class="weui-media-box__hd">
                                    <img class="weui-media-box__thumb" src="icon/头像.png" alt="">
                                </div>
                                <div class="weui-media-box__bd">
                                    <h4 class="weui-media-box__title">用户：'
									.$_SESSION['accounts'].'
                                    </h4>
                                    <p class="weui-media-box__desc">
                                    简介：这个人很懒，什么也没留下。'
									.$_SESSION['introduce'].'
                                    </p>
                                </div>
                           </a>
                        </div>
                        <div class="weui-panel__ft">
                            <a href="javascript:void(0);" class="weui-cell weui-cell_access weui-cell_link">
                                <div class="weui-cell__bd">修改资料</div>
                                <span class="weui-cell__ft"></span>
                            </a>    
                        </div>
                    </div>
					<!---------------------------------------------------->
                    <div class="weui-media-box weui-media-box_small-appmsg">
                            <div class="weui-cells">
                                <div class="weui-panel__hd">地图管理</div>
                                <a class="weui-cell weui-cell_access" href="map/upload/">
                                    <div class="weui-cell__hd"><img src="icon/上传2.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
                                    <div class="weui-cell__bd weui-cell_primary">
                                        <p>上传新地图</p>
                                    </div>
                                    <span class="weui-cell__ft"></span>
                                </a>
                                <a class="weui-cell weui-cell_access" href="javascript:;">
                                    <div class="weui-cell__hd"><img src="icon/编辑2.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
                                    <div class="weui-cell__bd weui-cell_primary">
                                        <p>编辑我的地图</p>
                                    </div>
                                    <span class="weui-cell__ft"></span>
                                </a>
                                <a class="weui-cell weui-cell_access" href="javascript:;">
                                    <div class="weui-cell__hd"><img src="icon/收藏2.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
                                    <div class="weui-cell__bd weui-cell_primary">
                                        <p>我的收藏</p>
                                    </div>
                                    <span class="weui-cell__ft"></span>
                                </a>
                            </div>
                    </div>
					<!---------------------------------------------------->
                    <div class="weui-form-preview">
                        <div class="weui-form-preview__ft">
                            <a class="weui-form-preview__btn weui-form-preview__btn_primary" id="cancellation" href="html/Cancellation/">注销账号</a>
                        </div>
                    </div>
                    <!---------------------------------------------------->
					';
					}
                    ?>
                    
             
            </div> 
          </div>
      </div>
   </div>
    
    <!----------------weui-tabbar------------------------>
    <div class="weui-tabbar swiper-no-swiping">
        <a href="javascript:;" class="weui-tabbar__item weui-bar__item_on" id="tabbar1">
            <img src="icon/首页.png" alt="" class="weui-tabbar__icon">
            <p class="weui-tabbar__label">首页</p>
        </a>
        <a href="javascript:;" class="weui-tabbar__item" id="tabbar2">
            <img src="icon/地图.png" alt="" class="weui-tabbar__icon" >
            <p class="weui-tabbar__label">地图</p>
        </a>
        <a href="javascript:;" class="weui-tabbar__item" id="tabbar3">
            <img src="icon/我的.png" alt="" class="weui-tabbar__icon">
            <p class="weui-tabbar__label">我的</p>
        </a>
    </div>
    <!--------------------加载图标------------------------------->
    <div id="loadingToast" style="display:none;">
            <div class="weui-mask_transparent"></div>
            <div class="weui-toast">
                <i class="weui-loading weui-icon_toast"></i>
                <p class="weui-toast__content">注销中</p>
            </div>
    </div>
    <script>
	$("#cancellation").click( function(){document.getElementById("loadingToast").setAttribute("style","display:");});
	</script>
    <!---------------------提示------------------------------>
    <div id="warnAlert" style="display: none;">
            <div class="weui-mask"></div>
            <div class="weui-dialog">
                <div class="weui-dialog__hd"><strong id="dialogHd" class="weui-dialog__title"></strong></div>
                <div class="weui-dialog__bd" id="dialogBd" ></div>
                <div class="weui-dialog__ft">
                    <a href="javascript:HiddenWarnAlert('warnAlert');" class="weui-dialog__btn weui-dialog__btn_primary">确定</a>
                </div>
            </div>
    </div>
    <script>
    function ShowWarnAlert(str1,str2){
		
		str1="提示";
		str2="还未登陆哦！<a href='html/Login.html'>点此</a>登陆";
		document.getElementById("dialogHd").innerHTML=str1; 
		document.getElementById("dialogBd").innerHTML=str2; 
		document.getElementById("warnAlert").setAttribute("style","");
	}
	function HiddenWarnAlert(obj){
		document.getElementById("dialogHd").innerHTML=null; 
		document.getElementById("dialogBd").innerHTML=null;
		document.getElementById("warnAlert").setAttribute("style","display:none");
	}
    </script>
    <!--------------------------------------------------->
    <script type="text/javascript">
    $(function(){
        $('.weui-tabbar__item').on('click', function () {
            $(this).addClass('weui-bar__item_on').siblings('.weui-bar__item_on').removeClass('weui-bar__item_on');
			//点击底部导航图标转到指定页面
			mySwiper2.slideTo($(this).attr('id').charAt(6)-1,500,false);//索引编号，时间延时，onSlideChange回调函数
		});
    });
	
	</script>
</div> 
    <!-- 引入 swiper -->
     <script src="js/swiper-3.4.2.min.js"></script> 
     <script src="js/swiper.animate1.0.2.min.js"></script>
     <script type="text/javascript">
	    //首页图片js
	    var mySwiper = new Swiper('.swiper-container',{
		lazyLoading : true,//懒惰加载
		autoplay: 10000,//5s自动滑动
		autoplayDisableOnInteraction : true,//点击取消自动滑动
		zoom : true,//调焦
		loop : true,//循环
		pagination : '.swiper-pagination',//圆点分页器
		paginationClickable :true,//点击圆点切换
		paginationHide :true,//圆点自动隐藏
		lazyLoading : true,//延迟加载
		/////////////////////////////
		onInit: function(swiper){ //Swiper2.x的初始化是onFirstInit
		swiperAnimateCache(swiper); //隐藏动画元素 
		swiperAnimate(swiper); //初始化完成开始动画
		}, 
		onSlideChangeEnd: function(swiper){ 
			swiperAnimate(swiper); //每个slide切换结束时也运行当前slide动画
		},
		  });
		//////////////////////////////////////////////////////
		//页面导航js
		var mySwiper2 = new Swiper('.swiper-container2', {
		//autoplay: 5000,//可选选项，自动滑动
		touchRatio : 0.5,
		onSlideChangeStart: function(swiper){
			switch(swiper.activeIndex){//滑动页面时底部导航文字也跟着激活
				case 0: $("#tabbar1").trigger("click");break;
				case 1: $("#tabbar2").trigger("click");break;
				case 2: $("#tabbar3").trigger("click");break;
			}
			//alert(swiper.activeIndex);
				
		},
	   

		
		})
		
		//
		var mySwiper3 = new Swiper('.swiper-container3', {
		//autoplay: 5000,//可选选项，自动滑动
		})
		mySwiper3.lockSwipes();
	</script>
    <script>
	
	 
	</script>
    
    <script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=36c222d43ab9f95da47215dfca03885c"></script>
	<script type="text/javascript">
     var map, geolocation;
    //加载地图，调用浏览器定位服务
    map = new AMap.Map('container', {
        resizeEnable: true
    });
    map.plugin('AMap.Geolocation', function() {
        geolocation = new AMap.Geolocation({
            enableHighAccuracy: true,//是否使用高精度定位，默认:true
            timeout: 10000,          //超过10秒后停止定位，默认：无穷大
            buttonOffset: new AMap.Pixel(10, 20),//定位按钮与设置的停靠位置的偏移量，默认：Pixel(10, 20)
            zoomToAccuracy: true,      //定位成功后调整地图视野范围使定位位置及精度范围视野内可见，默认：false
            buttonPosition:'RB'
        });
        map.addControl(geolocation);
        geolocation.getCurrentPosition();
        AMap.event.addListener(geolocation, 'complete', onComplete);//返回定位信息
        AMap.event.addListener(geolocation, 'error', onError);      //返回定位出错信息
    });
    //解析定位结果
    function onComplete(data) {
        var str=[];
        //str.push('经度：' + data.position.getLng());
        //str.push('纬度：' + data.position.getLat());
        if(data.accuracy){
             //str.push('精度：' + data.accuracy + ' 米');
        }//如为IP精确定位结果则没有精度信息
        //str.push('是否经过偏移：' + (data.isConverted ? '是' : '否'));
		str.push('当前位置:'+data.formattedAddress+'附近');
        document.getElementById('tip').innerHTML = str.join('<br>');
		document.getElementById('tip2').innerHTML = str.join('<br>');
    }
    //解析定位错误信息
    function onError(data) {
        document.getElementById('tip').innerHTML = '定位失败';
    }
   </script>
    </body>
</html>